<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'bundle_id',
        'quantity',
    ];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'product_id' => 'integer',
            'bundle_id' => 'integer',
            'quantity' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function bundle()
    {
        return $this->belongsTo(Bundle::class, 'bundle_id');
    }

    public function getPriceAttribute(): float
    {
        if ($this->product_id) {
            return $this->product->price * $this->quantity;
        }

        if ($this->bundle_id) {
            return $this->bundle->price * $this->quantity;
        }

        return 0;
    }
}
