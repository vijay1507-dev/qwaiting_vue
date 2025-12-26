<?php

namespace App\Services;

use App\Models\EmailNotificationLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EmailNotificationService
{
    /**
     * Send email and log the result.
     * This is a helper method that can be used to send emails with automatic logging.
     */
    public static function sendWithLogging($mailable, string $notificationType = 'system_email'): bool
    {
        try {
            Mail::send($mailable);

            return true;
        } catch (Throwable $e) {
            // Extract recipient from mailable if possible
            $recipient = self::extractRecipientFromMailable($mailable);

            if ($recipient) {
                EmailNotificationLog::create([
                    'notification_type' => $notificationType,
                    'recipient_email' => $recipient,
                    'subject' => method_exists($mailable, 'getSubject') ? $mailable->getSubject() : null,
                    'status' => 'failed',
                    'error_message' => $e->getMessage(),
                    'error_trace' => $e->getTraceAsString(),
                    'mailer' => config('mail.default'),
                ]);
            }

            Log::error('Email sending failed', [
                'notification_type' => $notificationType,
                'recipient' => $recipient,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Extract recipient email from mailable.
     */
    private static function extractRecipientFromMailable($mailable): ?string
    {
        // Try to get recipient from mailable's to property or method
        if (property_exists($mailable, 'to') && ! empty($mailable->to)) {
            return is_array($mailable->to) ? $mailable->to[0] : $mailable->to;
        }

        if (method_exists($mailable, 'to')) {
            $to = $mailable->to();
            if (is_array($to) && ! empty($to)) {
                return is_string($to[0]) ? $to[0] : $to[0]['email'] ?? null;
            }
        }

        return null;
    }

    /**
     * Mark old pending email logs as failed.
     * This should be run periodically (e.g., via scheduled command) to clean up
     * pending entries that never got updated (likely due to silent failures).
     */
    public static function markOldPendingAsFailed(int $minutesOld = 30): int
    {
        $cutoffTime = now()->subMinutes($minutesOld);

        $updated = EmailNotificationLog::where('status', 'pending')
            ->where('created_at', '<', $cutoffTime)
            ->update([
                'status' => 'failed',
                'error_message' => 'Email sending timed out or failed silently. No MessageSent event was received.',
            ]);

        return $updated;
    }
}
