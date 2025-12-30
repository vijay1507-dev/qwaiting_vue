<?php

namespace App\Services\Ecommerce;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Bundle;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function create(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            $items = $data['items'] ?? [];
            unset($data['items']);

            $data['order_number'] = Order::generateOrderNumber();
            $data['order_date'] = $data['order_date'] ?? now()->toDateString();

            $subtotal = 0;
            $orderItems = [];

            foreach ($items as $itemData) {
                if (isset($itemData['product_id'])) {
                    $product = Product::findOrFail($itemData['product_id']);
                    $unitPrice = $product->price;
                    $itemName = $product->name;
                    $itemSku = $product->sku;
                } elseif (isset($itemData['bundle_id'])) {
                    $bundle = Bundle::findOrFail($itemData['bundle_id']);
                    $unitPrice = $bundle->price;
                    $itemName = $bundle->name;
                    $itemSku = 'BUNDLE-' . $bundle->id;
                } else {
                    continue;
                }

                $quantity = $itemData['quantity'] ?? 1;
                $totalPrice = $unitPrice * $quantity;
                $subtotal += $totalPrice;

                $orderItems[] = [
                    'product_id' => $itemData['product_id'] ?? null,
                    'bundle_id' => $itemData['bundle_id'] ?? null,
                    'item_name' => $itemName,
                    'item_sku' => $itemSku,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total_price' => $totalPrice,
                ];
            }

            $tax = ($subtotal * 0.08); // 8% tax
            $shipping = $data['shipping'] ?? 0;
            $discount = $data['discount'] ?? 0;
            $total = $subtotal + $tax + $shipping - $discount;

            $data['subtotal'] = $subtotal;
            $data['tax'] = $tax;
            $data['total'] = $total;

            $order = Order::create($data);

            foreach ($orderItems as $item) {
                $item['order_id'] = $order->id;
                OrderItem::create($item);
            }

            return $order->load('items.product', 'items.bundle');
        });
    }

    public function update(Order $order, array $data): Order
    {
        $order->update($data);
        return $order->load('items.product', 'items.bundle');
    }

    public function delete(Order $order): bool
    {
        return DB::transaction(function () use ($order) {
            $order->items()->delete();
            return $order->delete();
        });
    }
}

