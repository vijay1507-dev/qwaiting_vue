<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionPricing extends Model
{
    use HasFactory;

    protected $table = 'subscription_pricing';

    protected $fillable = [
        'package_id',
        'currency',
        'billing_cycle',
        'price',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'package_id' => 'integer',
            'price' => 'decimal:2',
            'billing_cycle' => 'string',
            'status' => 'string',
        ];
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPackage::class, 'package_id');
    }
}
