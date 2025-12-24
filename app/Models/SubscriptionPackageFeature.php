<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionPackageFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'feature_id',
        'limit_type',
        'limit_value',
    ];

    protected function casts(): array
    {
        return [
            'package_id' => 'integer',
            'feature_id' => 'integer',
            'limit_value' => 'integer',
            'limit_type' => 'string',
        ];
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPackage::class, 'package_id');
    }

    public function feature(): BelongsTo
    {
        return $this->belongsTo(SubscriptionFeature::class, 'feature_id');
    }
}
