<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionCouponUsage extends Model
{
    use HasFactory;

    protected $table = 'subscription_coupon_usage';

    protected $fillable = [
        'coupon_id',
        'package_id',
        'user_id',
        'external_user_id',
        'user_email',
        'user_name',
        'discount_amount',
        'currency',
        'used_at',
    ];

    protected function casts(): array
    {
        return [
            'coupon_id' => 'integer',
            'package_id' => 'integer',
            'user_id' => 'integer',
            'external_user_id' => 'integer',
            'discount_amount' => 'decimal:2',
            'used_at' => 'datetime',
        ];
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(SubscriptionCoupon::class, 'coupon_id');
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPackage::class, 'package_id');
    }
}
