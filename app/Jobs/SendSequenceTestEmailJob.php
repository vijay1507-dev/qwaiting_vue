<?php

namespace App\Jobs;

use App\Models\EmailNotificationTemplate;
use App\Services\EmailTemplateWrapper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendSequenceTestEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     */
    public int $tries = 5;

    /**
     * The number of seconds to wait before retrying the job.
     */
    public int $backoff = 60;

    /**
     * Determine the time at which the job should timeout.
     */
    public int $timeout = 60;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public EmailNotificationTemplate $emailTemplate,
        public string $testEmail,
        public array $testVariables = []
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $subject = $this->replaceVariables($this->emailTemplate->subject);
            $content = $this->replaceVariables($this->emailTemplate->content ?? '');

            // Wrap content with email template wrapper
            $wrapper = new EmailTemplateWrapper;
            $wrappedContent = $wrapper->wrap($content);

            Mail::html($wrappedContent, function ($message) use ($subject) {
                $message->to($this->testEmail)
                    ->subject($subject);
            });

            Log::info('Test email sent successfully', [
                'email_template_id' => $this->emailTemplate->id,
                'test_email' => $this->testEmail,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send test email', [
                'email_template_id' => $this->emailTemplate->id,
                'test_email' => $this->testEmail,
                'error' => $e->getMessage(),
                'attempt' => $this->attempts(),
            ]);

            // If it's a rate limit error, handle it gracefully
            if (str_contains($e->getMessage(), 'Too many emails') ||
                str_contains($e->getMessage(), 'rate limit') ||
                str_contains($e->getMessage(), '550')) {

                // Calculate exponential backoff: 60s, 120s, 180s, etc.
                $delaySeconds = 60 * $this->attempts();

                // If we've exceeded max tries, fail gracefully
                if ($this->attempts() >= $this->tries) {
                    Log::warning('Test email failed after maximum attempts due to rate limiting - giving up', [
                        'email_template_id' => $this->emailTemplate->id,
                        'test_email' => $this->testEmail,
                        'attempts' => $this->attempts(),
                        'max_tries' => $this->tries,
                    ]);

                    // Don't throw - mark as failed gracefully to prevent MaxAttemptsExceededException
                    return;
                }

                Log::info('Rate limit hit, releasing job with delay', [
                    'email_template_id' => $this->emailTemplate->id,
                    'attempt' => $this->attempts(),
                    'delay_seconds' => $delaySeconds,
                ]);

                // Release the job back to the queue with exponential backoff delay
                $this->release($delaySeconds);

                return;
            }

            // For other errors, throw to trigger retry mechanism
            throw $e;
        }
    }

    /**
     * Replace template variables with test values.
     */
    private function replaceVariables(string $text): string
    {
        $variables = array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'full_name' => 'John Doe',
            'email' => $this->testEmail,
            'company_name' => 'Test Company',
            'dashboard_url' => config('app.url').'/dashboard',
            'unsubscribe_url' => config('app.url').'/unsubscribe',
            'preferences_url' => config('app.url').'/preferences',
            'support_email' => config('mail.support_email', 'support@qwaiting.com'),
            'website_url' => config('mail.website_url', 'https://www.qwaiting.com'),
        ], $this->testVariables);

        foreach ($variables as $key => $value) {
            $text = str_replace('{{'.$key.'}}', $value, $text);
        }

        return $text;
    }
}
