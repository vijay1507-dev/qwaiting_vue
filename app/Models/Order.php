<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_number',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'billing_address',
        'subtotal',
        'tax',
        'shipping',
        'discount',
        'total',
        'status',
        'payment_status',
        'payment_method',
        'payment_transaction_id',
        'order_date',
        'shipped_date',
        'delivered_date',
        'tracking_number',
        'invoice_number',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'subtotal' => 'decimal:2',
            'tax' => 'decimal:2',
            'shipping' => 'decimal:2',
            'discount' => 'decimal:2',
            'total' => 'decimal:2',
            'order_date' => 'date',
            'shipped_date' => 'date',
            'delivered_date' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public static function generateOrderNumber(): string
    {
        $year = date('Y');
        $lastOrder = self::where('order_number', 'like', "ORD-{$year}-%")
            ->orderBy('id', 'desc')
            ->first();

        if ($lastOrder) {
            $lastNumber = (int) substr($lastOrder->order_number, -3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        return "ORD-{$year}-{$newNumber}";
    }
}
