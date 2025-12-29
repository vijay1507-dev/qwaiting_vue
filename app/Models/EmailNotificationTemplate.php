<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailNotificationTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sequence_id',
        'sequence_number',
        'timing_value',
        'timing_unit',
        'subject',
        'type',
        'content',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'sequence_number' => 'integer',
            'timing_value' => 'integer',
            'timing_unit' => 'string',
            'type' => 'string',
            'status' => 'string',
        ];
    }

    public function sequence(): BelongsTo
    {
        return $this->belongsTo(Sequence::class, 'sequence_id');
    }
}
