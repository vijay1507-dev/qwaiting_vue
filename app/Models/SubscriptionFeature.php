<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SubscriptionFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'data_type',
        'is_metered',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'is_metered' => 'boolean',
            'data_type' => 'string',
            'status' => 'string',
        ];
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(
            SubscriptionPackage::class,
            'subscription_package_features',
            'feature_id',
            'package_id'
        )->withPivot('limit_type', 'limit_value')
            ->withTimestamps();
    }
}
