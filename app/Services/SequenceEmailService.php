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
                    ->where('timing_unit', $event);
            }])
            ->get();

        if ($sequences->isEmpty()) {
            return;
        }

        // Prepare user data for email template
        $userData = $this->prepareUserData($signupLead);
        $daysSinceRegistration = $this->calculateDaysSinceRegistration($signupLead->created_at);

        foreach ($sequences as $sequence) {
            foreach ($sequence->emailTemplates as $emailTemplate) {
                // Check if email was already sent
                $alreadySent = \App\Models\EmailSend::where('email_template_id', $emailTemplate->id)
                    ->where('external_user_id', $signupLead->id)
                    ->where('status', 'sent')
                    ->exists();

                if ($alreadySent) {
                    Log::info('Event-based email already sent, skipping', [
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
                ]);
            }
        }
    }

    /**
     * Prepare user data array from signup lead.
     */
    private function prepareUserData(SignupLead $signupLead): array
    {
        return [
            'id' => $signupLead->id,
            'name' => $signupLead->name ?? '',
            'email' => $signupLead->email ?? '',
            'phone' => $signupLead->phone_number ?? '',
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
