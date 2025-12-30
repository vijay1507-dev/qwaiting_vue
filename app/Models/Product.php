<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'description',
        'price',
        'stock',
        'low_stock_threshold',
        'image',
        'category_id',
        'features',
        'is_active',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
            'low_stock_threshold' => 'integer',
            'category_id' => 'integer',
            'features' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id')->orderBy('display_order');
    }

    public function bundleProducts()
    {
        return $this->belongsToMany(Bundle::class, 'bundle_products', 'product_id', 'bundle_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'product_id');
    }

    public function isLowStock(): bool
    {
        return $this->stock <= $this->low_stock_threshold;
    }
}
