<?php

namespace App\Notifications;

use App\Models\SystemEmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     */
    public string $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
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
    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = URL::route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        // Get system template for forgot password
        $template = SystemEmailTemplate::getByKey('forgot_password');

        if ($template && $template->is_active) {
            // Replace variables in subject and content
            $subject = $this->replaceVariables($template->subject, $notifiable, $resetUrl);
            $content = $this->replaceVariables($template->content, $notifiable, $resetUrl);

            // Return MailMessage with HTML content from template
            return (new MailMessage)
                ->subject($subject)
                ->view('emails.system-template', ['content' => $content]);
        }

        // Fallback to default Laravel password reset notification
        return (new MailMessage)
            ->subject('Reset Password Notification')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', $resetUrl)
            ->line('This password reset link will expire in 60 minutes.')
            ->line('If you did not request a password reset, no further action is required.');
    }

    /**
     * Replace template variables with actual values.
     */
    private function replaceVariables(string $text, object $notifiable, string $resetUrl): string
    {
        // Get name from user
        $name = $notifiable->name ?? 'User';

        // Split name into first and last name
        $nameParts = explode(' ', $name, 2);
        $firstName = $nameParts[0] ?? 'User';
        $lastName = $nameParts[1] ?? '';

        $variables = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'full_name' => $name,
            'email' => $notifiable->email,
            'username' => $notifiable->email,
            'reset_url' => $resetUrl,
            'company_name' => config('mail.company_name', 'Qwaiting'),
            'dashboard_url' => rtrim(config('app.url'), '/').'/dashboard',
            'support_email' => config('mail.support_email', 'support@qwaiting.com'),
            'website_url' => config('mail.website_url', 'https://www.qwaiting.com'),
            'domain' => parse_url(config('app.url'), PHP_URL_HOST) ?? '',
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
