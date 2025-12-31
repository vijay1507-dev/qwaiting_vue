<?php

namespace App\Jobs;

use App\Models\EmailNotificationLog;
use App\Models\EmailNotificationTemplate;
use App\Models\EmailSend;
use App\Models\SignupLead;
use App\Services\EmailTemplateWrapper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendSequenceEmailToUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     */
    public int $tries = 3;

    /**
     * The number of seconds to wait before retrying the job.
     */
    public int $backoff = 60;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public EmailNotificationTemplate $emailTemplate,
        public int $externalUserId,
        public string $userEmail,
        public array $userData,
        public int $daysAfterRegistration
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Check if email was already sent (prevent duplicates)
            $alreadySent = EmailSend::where('email_template_id', $this->emailTemplate->id)
                ->where('external_user_id', $this->externalUserId)
                ->where('status', 'sent')
                ->exists();

            if ($alreadySent) {
                Log::info('Email already sent, skipping', [
                    'email_template_id' => $this->emailTemplate->id,
                    'external_user_id' => $this->externalUserId,
                ]);

                return;
            }

            $subject = $this->replaceVariables($this->emailTemplate->subject);
            $content = $this->replaceVariables($this->emailTemplate->content ?? '');

            // Wrap content with email template wrapper
            // Commented out - now using direct HTML template from editor
            // $wrapper = new EmailTemplateWrapper;
            // $wrappedContent = $wrapper->wrap($content);

            Mail::html($content, function ($message) use ($subject) {
                $message->to($this->userEmail)
                    ->subject($subject);

                // CC admin emails if configured
                $adminCcEmails = $this->getAdminCcEmails();
                if (! empty($adminCcEmails)) {
                    $message->cc($adminCcEmails);
                }
            });

            // Mark as sent in email_sends table (for sequence tracking)
            EmailSend::updateOrCreate(
                [
                    'email_template_id' => $this->emailTemplate->id,
                    'external_user_id' => $this->externalUserId,
                    'days_after_registration' => $this->daysAfterRegistration,
                ],
                [
                    'sequence_id' => $this->emailTemplate->sequence_id,
                    'user_email' => $this->userEmail,
                    'status' => 'sent',
                    'sent_at' => now(),
                ]
            );

            // Also log to email_notification_logs (for comprehensive logging)
            EmailNotificationLog::create([
                'notification_type' => 'sequence_email',
                'recipient_email' => $this->userEmail,
                'subject' => $subject,
                'status' => 'success',
                'mailer' => config('mail.default'),
                'metadata' => [
                    'sequence_id' => $this->emailTemplate->sequence_id,
                    'email_template_id' => $this->emailTemplate->id,
                    'external_user_id' => $this->externalUserId,
                    'days_after_registration' => $this->daysAfterRegistration,
                ],
                'sent_at' => now(),
            ]);

            Log::info('Sequence email sent successfully', [
                'email_template_id' => $this->emailTemplate->id,
                'external_user_id' => $this->externalUserId,
                'user_email' => $this->userEmail,
                'days_after_registration' => $this->daysAfterRegistration,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send sequence email', [
                'email_template_id' => $this->emailTemplate->id,
                'external_user_id' => $this->externalUserId,
                'user_email' => $this->userEmail,
                'error' => $e->getMessage(),
                'attempt' => $this->attempts(),
            ]);

            // Update email_send record with error (for sequence tracking)
            EmailSend::updateOrCreate(
                [
                    'email_template_id' => $this->emailTemplate->id,
                    'external_user_id' => $this->externalUserId,
                    'days_after_registration' => $this->daysAfterRegistration,
                ],
                [
                    'sequence_id' => $this->emailTemplate->sequence_id,
                    'user_email' => $this->userEmail,
                    'status' => 'failed',
                    'error_message' => $e->getMessage(),
                ]
            );

            // Also log to email_notification_logs (for comprehensive logging)
            EmailNotificationLog::create([
                'notification_type' => 'sequence_email',
                'recipient_email' => $this->userEmail,
                'subject' => $this->replaceVariables($this->emailTemplate->subject ?? 'Sequence Email'),
                'status' => 'failed',
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'mailer' => config('mail.default'),
                'metadata' => [
                    'sequence_id' => $this->emailTemplate->sequence_id,
                    'email_template_id' => $this->emailTemplate->id,
                    'external_user_id' => $this->externalUserId,
                    'days_after_registration' => $this->daysAfterRegistration,
                ],
            ]);

            // If it's a rate limit error, release with longer delay
            if (str_contains($e->getMessage(), 'Too many emails') ||
                str_contains($e->getMessage(), 'rate limit') ||
                str_contains($e->getMessage(), '550')) {

                if ($this->attempts() >= $this->tries) {
                    // Mark as failed after max attempts
                    return;
                }

                // Exponential backoff: 60s, 120s, 180s
                $delaySeconds = 60 * $this->attempts();
                $this->release($delaySeconds);

                Log::info('Email rate limited, releasing with delay', [
                    'email_template_id' => $this->emailTemplate->id,
                    'user_email' => $this->userEmail,
                    'attempt' => $this->attempts(),
                    'delay_seconds' => $delaySeconds,
                ]);

                return;
            }

            throw $e;
        }
    }

    /**
     * Replace template variables with user-specific values.
     */
    private function replaceVariables(string $text): string
    {
        // Build dashboard URL from user's domain
        $userDomain = $this->userData['domain'] ?? '';
        $dashboardUrl = $this->buildDashboardUrl($userDomain);

        // Generate verification URL for SignupLead users
        $verificationUrl = $this->buildVerificationUrl();

        // Generate signup URL with step parameter for incomplete registrations
        $signupUrl = $this->buildSignupUrl();

        $variables = array_merge([
            'first_name' => $this->userData['name'] ?? 'User',
            'last_name' => '',
            'full_name' => $this->userData['name'] ?? 'User',
            'email' => $this->userEmail,
            'company_name' => $this->userData['company_name'] ?? 'Your Company',
            'dashboard_url' => $dashboardUrl,
            'unsubscribe_url' => rtrim($dashboardUrl, '/').'/unsubscribe',
            'preferences_url' => rtrim($dashboardUrl, '/').'/preferences',
            'support_email' => config('mail.support_email', 'support@qwaiting.com'),
            'website_url' => config('mail.website_url', 'https://www.qwaiting.com'),
            'phone' => $this->userData['phone'] ?? '',
            'domain' => $userDomain,
            'plan_expiry' => $this->userData['plan_expiry'] ?? '',
            'days_until_expiry' => $this->userData['days_until_expiry'] ?? '',
            'verification_url' => $verificationUrl,
            'incomplete_signup_step_url' => $signupUrl,
        ], $this->userData);

        // Ensure incomplete_signup_step_url is set after merging userData to prevent override
        $variables['incomplete_signup_step_url'] = $signupUrl;

        // Log for debugging
        Log::info('Replacing variables in email', [
            'has_incomplete_signup_step_url' => isset($variables['incomplete_signup_step_url']),
            'incomplete_signup_step_url_value' => $variables['incomplete_signup_step_url'] ?? 'NOT SET',
            'signup_url_value' => $signupUrl,
        ]);

        foreach ($variables as $key => $value) {
            // Replace with exact match
            $text = str_replace('{{'.$key.'}}', (string) $value, $text);
            // Also replace with spaces around the variable name (handle template formatting)
            $text = str_replace('{{ '.$key.' }}', (string) $value, $text);
            // Replace with spaces inside (handle cases like {{incomplete signup step url}})
            $text = str_replace('{{'.str_replace('_', ' ', $key).'}}', (string) $value, $text);
        }

        return $text;
    }

    /**
     * Build verification URL for SignupLead users.
     */
    private function buildVerificationUrl(): string
    {
        // Check if this is a SignupLead user
        $signupLead = SignupLead::find($this->externalUserId);

        if ($signupLead) {
            // Generate verification URL for signup lead
            $hash = sha1($signupLead->email);

            return URL::route('signup.verify', [
                'id' => $signupLead->id,
                'hash' => $hash,
            ]);
        }

        // Return empty string if not a SignupLead (external users don't need verification URL)
        return '';
    }

    /**
     * Build dashboard URL from user's domain.
     */
    private function buildDashboardUrl(string $domain): string
    {
        // If domain is empty, fallback to app URL
        if (empty($domain)) {
            return rtrim(config('app.url'), '/').'/dashboard';
        }

        // Check if domain already includes protocol
        if (str_starts_with($domain, 'http://') || str_starts_with($domain, 'https://')) {
            return rtrim($domain, '/').'/dashboard';
        }

        // Determine protocol based on environment
        $protocol = config('app.env') === 'local' ? 'http://' : 'https://';

        return $protocol.rtrim($domain, '/').'/dashboard';
    }

    /**
     * Build signup URL with step parameter for incomplete registrations.
     */
    private function buildSignupUrl(): string
    {
        // Check if this is a SignupLead user with incomplete registration
        $signupLead = SignupLead::query()->find($this->externalUserId);

        if ($signupLead && $signupLead->hasVerifiedEmail() && $signupLead->signup_step < 6) {
            // Refresh to get the latest signup_step from database
            $signupLead->refresh();

            // Step mapping: 1: 'basic_info', 2: 'business_info', 3: 'usage_preference',
            // 4: 'industry', 5: 'daily_footfall', 6: 'current_solution'
            $stepQueryMap = [
                1 => 'basic_info',
                2 => 'business_info',
                3 => 'usage_preference',
                4 => 'industry',
                5 => 'daily_footfall',
                6 => 'current_solution',
            ];

            // Get the next step they need to complete (signup_step + 1)
            // signup_step represents the last completed step
            // If signup_step = 2, they completed step 2, so they need to continue at step 3
            $currentStep = (int) $signupLead->signup_step;
            $nextStep = $currentStep + 1;
            $stepQuery = $stepQueryMap[$nextStep] ?? 'basic_info';

            // Generate signup URL using URL::route() same as verification_url
            // Use hash only (no lead_id in URL for security)
            // Hash includes email + ID + app key for verification
            $hash = sha1($signupLead->email.$signupLead->id.config('app.key'));
            // Format: ?step_query&hash=Y (no lead_id shown)
            $url = URL::route('signup', [], true).'?'.$stepQuery.'&hash='.$hash;

            Log::info('Building signup URL', [
                'signup_lead_id' => $signupLead->id,
                'current_signup_step' => $currentStep,
                'next_step' => $nextStep,
                'step_query' => $stepQuery,
                'url' => $url,
            ]);

            return $url;
        }

        // Return default signup URL if not applicable
        return URL::route('signup', [], true);
    }

    /**
     * Get admin CC emails from configuration.
     */
    private function getAdminCcEmails(): array
    {
        $ccEmails = config('mail.admin_cc_emails', '');

        if (empty($ccEmails)) {
            return [];
        }

        // Split by comma and trim each email
        $emails = array_map('trim', explode(',', $ccEmails));

        // Filter out empty values and validate email format
        return array_filter($emails, function ($email) {
            return ! empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
        });
    }
}
