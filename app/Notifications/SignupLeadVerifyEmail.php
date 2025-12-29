<?php

namespace App\Notifications;

use App\Models\SystemEmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class SignupLeadVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Indicates if the notification should be sent immediately.
     */
    public bool $shouldSendImmediately = true;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'signup.verify',
            now()->addMinutes(60),
            ['id' => $notifiable->id, 'hash' => sha1($notifiable->email)]
        );

        // Get system template for email verification
        $template = SystemEmailTemplate::getByKey('email_verification');

        if ($template && $template->is_active) {
            // Replace variables in subject and content
            $subject = $this->replaceVariables($template->subject, $notifiable, $verificationUrl);
            $content = $this->replaceVariables($template->content, $notifiable, $verificationUrl);

            // Return MailMessage with HTML content from template
            return (new MailMessage)
                ->subject($subject)
                ->view('emails.system-template', ['content' => $content]);
        }

        // Fallback to default view if template not found or inactive
        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->view('emails.signup-verify', ['verificationUrl' => $verificationUrl]);
    }

    /**
     * Replace template variables with actual values.
     */
    private function replaceVariables(string $text, object $notifiable, string $verificationUrl): string
    {
        // Get name from signup form data in session or from notifiable
        $sessionData = session('signup_form_data', []);
        $name = $sessionData['name'] ?? $notifiable->name ?? 'User';
        
        // Split name into first and last name
        $nameParts = explode(' ', $name, 2);
        $firstName = $nameParts[0] ?? 'User';
        $lastName = $nameParts[1] ?? '';

        // Get company name from session or notifiable
        $companyName = $sessionData['company_name'] ?? $notifiable->company_name ?? 'Your Company';

        $variables = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'full_name' => $name,
            'email' => $notifiable->email,
            'verification_url' => $verificationUrl,
            'company_name' => $companyName,
            'dashboard_url' => rtrim(config('app.url'), '/').'/dashboard',
            'support_email' => config('mail.support_email', 'support@qwaiting.com'),
            'website_url' => config('mail.website_url', 'https://www.qwaiting.com'),
        ];

        foreach ($variables as $key => $value) {
            $text = str_replace('{{'.$key.'}}', (string) $value, $text);
        }

        return $text;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
