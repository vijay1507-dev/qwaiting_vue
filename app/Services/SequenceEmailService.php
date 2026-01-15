<?php

namespace App\Services;

use App\Jobs\SendSequenceEmailToUserJob;
use App\Models\Sequence;
use App\Models\SignupLead;
use Illuminate\Support\Facades\Log;

class SequenceEmailService
{
    /**
     * Send event-based emails for a signup lead.
     *
     * @param  string  $event  The event type: 'on_signup', 'on_verification', 'if_not_verified', 'after_verification'
     * @param  SignupLead  $signupLead  The signup lead to send emails for
     */
    public function sendEventBasedEmails(string $event, SignupLead $signupLead): void
    {
        // Get all active sequences targeting incomplete signups
        $sequences = Sequence::where('status', 'active')
            ->where('target_user_type', 'incomplete_signups')
            ->with(['emailTemplates' => function ($query) use ($event) {
                $query->where('status', 'active')
                    ->withoutTrashed()
                    ->where('timing_unit', $event);
            }])
            ->get();

        // Also get sequences with registeration_complete emails for registration complete
        // This handles cases where registration complete email is in a different sequence
        if (($event === 'after_verification' || $event === 'immediate') && $signupLead->signup_step === 6) {
            $completionSequences = Sequence::where('status', 'active')
                ->with(['emailTemplates' => function ($query) use ($event) {
                    $query->where('status', 'active')
                        ->withoutTrashed()
                        ->where('type', 'registeration_complete')
                        ->where(function ($q) use ($event) {
                            if ($event === 'immediate') {
                                $q->where('timing_unit', 'immediate');
                            } else {
                                $q->where('timing_unit', 'immediate')
                                    ->orWhere('timing_unit', 'after_verification');
                            }
                        });
                }])
                ->get();

            // Merge sequences, avoiding duplicates
            $sequenceIds = $sequences->pluck('id')->toArray();
            $completionSequences = $completionSequences->reject(function ($seq) use ($sequenceIds) {
                return in_array($seq->id, $sequenceIds);
            });

            $sequences = $sequences->merge($completionSequences);
        }

        if ($sequences->isEmpty()) {
            return;
        }

        // Prepare user data for email template
        $userData = $this->prepareUserData($signupLead);
        $daysSinceRegistration = $this->calculateDaysSinceRegistration($signupLead->created_at);

        foreach ($sequences as $sequence) {
            foreach ($sequence->emailTemplates as $emailTemplate) {
                // Check if email was already sent or is queued
                $alreadySent = \App\Models\EmailSend::where('email_template_id', $emailTemplate->id)
                    ->where('external_user_id', $signupLead->id)
                    ->whereIn('status', ['sent', 'success', 'queued'])
                    ->exists();

                if ($alreadySent) {
                    Log::info('Event-based email already sent or queued, skipping', [
                        'event' => $event,
                        'email_template_id' => $emailTemplate->id,
                        'signup_lead_id' => $signupLead->id,
                    ]);

                    continue;
                }

                // For conditional events, check if condition is met
                if ($event === 'if_not_verified' && $signupLead->hasVerifiedEmail()) {
                    // Skip if_not_verified emails for verified users
                    continue;
                }

                if ($event === 'on_verification' && ! $signupLead->hasVerifiedEmail()) {
                    // Skip on_verification emails for unverified users
                    continue;
                }

                // Mark as queued immediately to prevent race conditions
                \App\Models\EmailSend::create([
                    'sequence_id' => $sequence->id,
                    'email_template_id' => $emailTemplate->id,
                    'external_user_id' => $signupLead->id,
                    'user_email' => $signupLead->email,
                    'days_after_registration' => $daysSinceRegistration,
                    'status' => 'queued',
                    'scheduled_at' => now()->addSeconds(5),
                ]);

                // Dispatch email job
                SendSequenceEmailToUserJob::dispatch(
                    $emailTemplate,
                    $signupLead->id,
                    $signupLead->email,
                    $userData,
                    $daysSinceRegistration
                )->delay(now()->addSeconds(5)); // Small delay to prevent rate limiting

                Log::info('Event-based email queued', [
                    'event' => $event,
                    'email_template_id' => $emailTemplate->id,
                    'signup_lead_id' => $signupLead->id,
                    'email' => $signupLead->email,
                    'email_type' => $emailTemplate->type,
                    'timing_unit' => $emailTemplate->timing_unit,
                    'has_password_in_userdata' => ! empty($userData['password']),
                    'password_length' => strlen($userData['password'] ?? ''),
                ]);
            }
        }
    }

    /**
     * Prepare user data array from signup lead.
     */
    private function prepareUserData(SignupLead $signupLead): array
    {
        // Refresh to get latest data including temp_password
        $signupLead->refresh();

        // Get temp_password directly from database to ensure we have the latest value
        $tempPassword = $signupLead->temp_password ?? '';

        Log::info('Preparing user data for email', [
            'lead_id' => $signupLead->id,
            'has_temp_password' => ! empty($tempPassword),
            'temp_password_length' => strlen($tempPassword),
        ]);

        return [
            'id' => $signupLead->id,
            'name' => $signupLead->name ?? '',
            'email' => $signupLead->email ?? '',
            'phone' => $signupLead->phone_number ?? '',
            'password' => $tempPassword, // Get plain password from temp_password field
            'team_id' => null,
            'is_active' => 1,
            'created_at' => $signupLead->created_at,
            'domain' => $signupLead->domain_name ?? '',
            'company_name' => $signupLead->company_name ?? '',
            'plan_expiry' => null,
            'days_until_expiry' => null,
            'trial_ends_at' => null,
            'signup_step' => $signupLead->signup_step ?? 0,
        ];
    }

    /**
     * Calculate days since registration.
     */
    private function calculateDaysSinceRegistration($createdAt): int
    {
        $createdDate = \Carbon\Carbon::parse($createdAt)->startOfDay();
        $today = now()->startOfDay();

        return $createdDate->diffInDays($today);
    }
}
