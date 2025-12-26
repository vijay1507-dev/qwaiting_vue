<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailNotificationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_type',
        'recipient_email',
        'subject',
        'status',
        'error_message',
        'error_trace',
        'mailer',
        'metadata',
        'sent_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
            'metadata' => 'array',
            'sent_at' => 'datetime',
        ];
    }

    /**
     * Scope a query to only include successful emails.
     */
    public function scopeSuccessful($query)
    {
        return $query->where('status', 'success');
    }

    /**
     * Scope a query to only include failed emails.
     */
    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    /**
     * Scope a query to only include pending emails.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to filter by recipient email.
     */
    public function scopeForRecipient($query, string $email)
    {
        return $query->where('recipient_email', $email);
    }

    /**
     * Scope a query to filter by notification type.
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('notification_type', $type);
    }
}
