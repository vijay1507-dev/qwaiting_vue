<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bundle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'discount_percentage',
        'original_price',
        'price',
        'savings',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'discount_percentage' => 'decimal:2',
            'original_price' => 'decimal:2',
            'price' => 'decimal:2',
            'savings' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'bundle_products', 'bundle_id', 'product_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'bundle_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'bundle_id');
    }

    public function calculatePrice(): void
    {
        $this->load('products');
        $totalPrice = $this->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });

        $this->original_price = $totalPrice;
        $this->savings = $totalPrice * ($this->discount_percentage / 100);
        $this->price = $totalPrice - $this->savings;
    }
}
