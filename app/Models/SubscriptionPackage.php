<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'subtitle',
        'description',
        'status',
        'trial_days',
        'credit_card_required',
        'monthly_enabled',
        'annual_enabled',
        'sort_order',
        'is_most_popular',
    ];

    protected function casts(): array
    {
        return [
            'credit_card_required' => 'boolean',
            'monthly_enabled' => 'boolean',
            'annual_enabled' => 'boolean',
            'is_most_popular' => 'boolean',
            'trial_days' => 'integer',
            'sort_order' => 'integer',
            'status' => 'string',
        ];
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(
            SubscriptionFeature::class,
            'subscription_package_features',
            'package_id',
            'feature_id'
        )->withPivot('limit_type', 'limit_value')
            ->withTimestamps();
    }

    public function pricings(): HasMany
    {
        return $this->hasMany(SubscriptionPricing::class, 'package_id');
    }

    public function packageFeatures(): HasMany
    {
        return $this->hasMany(SubscriptionPackageFeature::class, 'package_id');
    }

    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(
            SubscriptionCoupon::class,
            'subscription_coupon_packages',
            'package_id',
            'coupon_id'
        )->withTimestamps();
    }
}
