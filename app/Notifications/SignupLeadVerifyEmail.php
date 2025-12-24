<?php

namespace App\Notifications;

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

        // Use custom view to ensure link opens in same tab
        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->view('emails.signup-verify', ['verificationUrl' => $verificationUrl]);
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
