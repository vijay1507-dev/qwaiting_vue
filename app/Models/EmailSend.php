<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailSend extends Model
{
    use HasFactory;

    protected $fillable = [
        'sequence_id',
        'email_template_id',
        'external_user_id',
        'user_email',
        'days_after_registration',
        'status',
        'scheduled_at',
        'sent_at',
        'error_message',
    ];

    protected function casts(): array
    {
        return [
            'days_after_registration' => 'integer',
            'status' => 'string',
            'scheduled_at' => 'datetime',
            'sent_at' => 'datetime',
        ];
    }

    public function sequence(): BelongsTo
    {
        return $this->belongsTo(Sequence::class, 'sequence_id');
    }

    public function emailTemplate(): BelongsTo
    {
        return $this->belongsTo(EmailNotificationTemplate::class, 'email_template_id');
    }
}
