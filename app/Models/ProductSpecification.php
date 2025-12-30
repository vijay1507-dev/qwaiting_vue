<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    protected $fillable = [
        'product_id',
        'spec_key',
        'spec_value',
        'display_order',
    ];

    protected function casts(): array
    {
        return [
            'product_id' => 'integer',
            'display_order' => 'integer',
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
