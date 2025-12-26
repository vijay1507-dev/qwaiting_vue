<?php

namespace App\Listeners;

use App\Models\EmailNotificationLog;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Log;

class LogEmailNotification
{
    /**
     * Handle the event.
     */
    public function handle(MessageSent $event): void
    {
        try {
            $message = $event->message;
            $recipients = $this->extractRecipients($message);

            // Log for each recipient
            foreach ($recipients as $recipient) {
                $subject = $message->getSubject();

                // Try to find matching pending log by recipient, subject, and recent timestamp
                $log = EmailNotificationLog::where('recipient_email', $recipient)
                    ->where('status', 'pending')
                    ->whereNull('sent_at')
                    ->where('created_at', '>=', now()->subMinutes(10))
                    ->when($subject, function ($query) use ($subject) {
                        return $query->where('subject', $subject);
                    })
                    ->latest()
                    ->first();

                if ($log) {
                    // Update existing pending log
                    $log->update([
                        'status' => 'success',
                        'sent_at' => now(),
                        'mailer' => config('mail.default'),
                        'metadata' => $this->extractMetadata($message),
                    ]);
                } else {
                    // Create new log entry if not found (shouldn't happen, but safety net)
                    EmailNotificationLog::create([
                        'notification_type' => $this->getNotificationType($event),
                        'recipient_email' => $recipient,
                        'subject' => $subject,
                        'status' => 'success',
                        'mailer' => config('mail.default'),
                        'metadata' => $this->extractMetadata($message),
                        'sent_at' => now(),
                    ]);
                }
            }
        } catch (\Exception $e) {
            // Log the error but don't break the email sending process
            Log::error('Failed to log email notification', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    /**
     * Extract all recipient email addresses from the message.
     */
    private function extractRecipients($message): array
    {
        $recipients = [];

        // Get To recipients
        foreach ($message->getTo() as $email => $name) {
            $recipients[] = $email;
        }

        // Get CC recipients
        foreach ($message->getCc() as $email => $name) {
            $recipients[] = $email;
        }

        // Get BCC recipients
        foreach ($message->getBcc() as $email => $name) {
            $recipients[] = $email;
        }

        return array_unique($recipients);
    }

    /**
     * Extract metadata from the message.
     */
    private function extractMetadata($message): array
    {
        $metadata = [
            'to' => [],
            'cc' => [],
            'bcc' => [],
            'reply_to' => [],
            'from' => [],
            'attachments_count' => count($message->getAttachments()),
        ];

        foreach ($message->getTo() as $email => $name) {
            $metadata['to'][] = ['email' => $email, 'name' => $name];
        }

        foreach ($message->getCc() as $email => $name) {
            $metadata['cc'][] = ['email' => $email, 'name' => $name];
        }

        foreach ($message->getBcc() as $email => $name) {
            $metadata['bcc'][] = ['email' => $email, 'name' => $name];
        }

        foreach ($message->getReplyTo() as $email => $name) {
            $metadata['reply_to'][] = ['email' => $email, 'name' => $name];
        }

        foreach ($message->getFrom() as $email => $name) {
            $metadata['from'][] = ['email' => $email, 'name' => $name];
        }

        return $metadata;
    }

    /**
     * Get notification type from the event.
     */
    private function getNotificationType(MessageSent $event): ?string
    {
        // Try to get notification class name from the event
        if (isset($event->data['notification'])) {
            $notification = $event->data['notification'];
            if (is_object($notification)) {
                return class_basename($notification);
            }
        }

        // Try to get from Swift message headers
        $message = $event->message;
        $headers = $message->getHeaders();

        // Check for X-Laravel-Notification header
        if ($headers->has('X-Laravel-Notification')) {
            return $headers->get('X-Laravel-Notification')->getValue();
        }

        return 'system_email';
    }
}
