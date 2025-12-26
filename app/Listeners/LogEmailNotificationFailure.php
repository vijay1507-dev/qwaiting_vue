<?php

namespace App\Listeners;

use App\Models\EmailNotificationLog;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Log;

class LogEmailNotificationFailure
{
    /**
     * Handle the event.
     * This creates a pending log entry that will be updated by MessageSent on success.
     */
    public function handle(MessageSending $event): void
    {
        try {
            $message = $event->message;
            $recipients = $this->extractRecipients($message);

            // Create pending log entries for each recipient
            foreach ($recipients as $recipient) {
                EmailNotificationLog::create([
                    'notification_type' => $this->getNotificationType($event),
                    'recipient_email' => $recipient,
                    'subject' => $message->getSubject(),
                    'status' => 'pending',
                    'mailer' => config('mail.default'),
                    'metadata' => $this->extractMetadata($message),
                ]);
            }
        } catch (\Exception $e) {
            // Log the error but don't break the email sending process
            Log::error('Failed to create email notification log', [
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
    private function getNotificationType(MessageSending $event): ?string
    {
        // Try to get notification class name from the event
        if (isset($event->data['notification'])) {
            $notification = $event->data['notification'];
            if (is_object($notification)) {
                return class_basename($notification);
            }
        }

        return 'system_email';
    }
}
