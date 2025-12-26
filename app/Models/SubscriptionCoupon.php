<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'currency',
        'duration_type',
        'number_of_months',
        'usage_limit',
        'valid_from',
        'valid_until',
        'status',
        'applicable_packages',
    ];

    protected function casts(): array
    {
        return [
            'discount_value' => 'decimal:2',
            'number_of_months' => 'integer',
            'usage_limit' => 'integer',
            'valid_from' => 'date',
            'valid_until' => 'date',
            'discount_type' => 'string',
            'duration_type' => 'string',
            'status' => 'string',
        ];
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(
            SubscriptionPackage::class,
            'subscription_coupon_packages',
            'coupon_id',
            'package_id'
        )->withTimestamps();
    }

    public function usages(): HasMany
    {
        return $this->hasMany(SubscriptionCouponUsage::class, 'coupon_id');
    }

    public function getUsageCountAttribute(): int
    {
        return $this->usages()->count();
    }

    public function isValid(): bool
    {
        if ($this->status !== 'active') {
            return false;
        }

        $today = now()->startOfDay();
        $validFrom = \Carbon\Carbon::parse($this->valid_from)->startOfDay();
        $validUntil = \Carbon\Carbon::parse($this->valid_until)->endOfDay();

        return $today->between($validFrom, $validUntil);
    }

    public function hasReachedUsageLimit(): bool
    {
        if ($this->usage_limit === null) {
            return false;
        }

        return $this->usage_count >= $this->usage_limit;
    }
}
