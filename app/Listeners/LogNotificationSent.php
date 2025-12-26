<?php

namespace App\Listeners;

use App\Models\EmailNotificationLog;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Log;

class LogNotificationSent
{
    /**
     * Handle the event.
     * This updates the notification type for pending logs when a notification is sent.
     */
    public function handle(NotificationSent $event): void
    {
        try {
            // Only handle mail channel notifications
            if ($event->channel !== 'mail') {
                return;
            }

            $notificationType = class_basename($event->notification);
            $notifiable = $event->notifiable;

            // Try to get email from notifiable
            $email = null;
            if (method_exists($notifiable, 'getEmailForPasswordReset')) {
                $email = $notifiable->getEmailForPasswordReset();
            } elseif (isset($notifiable->email)) {
                $email = $notifiable->email;
            } elseif (method_exists($notifiable, 'email')) {
                $email = $notifiable->email();
            }

            if (! $email) {
                return;
            }

            // Update the most recent pending log for this recipient
            // We match by email and recent timestamp (within last 5 minutes)
            $log = EmailNotificationLog::where('recipient_email', $email)
                ->where('status', 'pending')
                ->where('created_at', '>=', now()->subMinutes(5))
                ->latest()
                ->first();

            if ($log) {
                $log->update([
                    'notification_type' => $notificationType,
                ]);
            }
        } catch (\Exception $e) {
            // Log the error but don't break the notification process
            Log::error('Failed to update notification type in log', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
