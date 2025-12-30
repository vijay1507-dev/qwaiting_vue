<?php

namespace App\Services\Ecommerce;

use App\Models\Product;
use App\Models\Bundle;
use Illuminate\Support\Facades\Session;

class CartService
{
    private function getCartKey(): string
    {
        return 'cart_items';
    }

    public function getCartItems(): array
    {
        $cartItems = Session::get($this->getCartKey(), []);
        $items = [];

        foreach ($cartItems as $key => $item) {
            $cartItem = [
                'id' => $key,
                'product_id' => $item['product_id'] ?? null,
                'bundle_id' => $item['bundle_id'] ?? null,
                'quantity' => $item['quantity'],
            ];

            // Load product or bundle data
            if ($item['product_id']) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $cartItem['product'] = [
                        'id' => (string) $product->id,
                        'name' => $product->name,
                        'sku' => $product->sku,
                        'price' => (float) $product->price,
                        'image' => $product->image,
                    ];
                }
            } elseif ($item['bundle_id']) {
                $bundle = Bundle::with('products')->find($item['bundle_id']);
                if ($bundle) {
                    $cartItem['bundle'] = [
                        'id' => (string) $bundle->id,
                        'name' => $bundle->name,
                        'price' => (float) $bundle->price,
                        'products' => $bundle->products->map(function ($product) {
                            return [
                                'id' => (string) $product->id,
                                'name' => $product->name,
                                'sku' => $product->sku,
                                'price' => (float) $product->price,
                            ];
                        })->toArray(),
                    ];
                }
            }

            $items[] = $cartItem;
        }

        return $items;
    }

    public function addItem(array $data): array
    {
        $cartItems = Session::get($this->getCartKey(), []);
        
        $productId = $data['product_id'] ?? null;
        $bundleId = $data['bundle_id'] ?? null;
        $quantity = $data['quantity'] ?? 1;

        // Generate a unique key for this item
        $itemKey = $productId ? "product_{$productId}" : "bundle_{$bundleId}";

        // Check if item already exists
        if (isset($cartItems[$itemKey])) {
            $cartItems[$itemKey]['quantity'] += $quantity;
        } else {
            $cartItems[$itemKey] = [
                'product_id' => $productId,
                'bundle_id' => $bundleId,
                'quantity' => $quantity,
            ];
        }

        Session::put($this->getCartKey(), $cartItems);

        // Return formatted cart item
        return $this->formatCartItem($itemKey, $cartItems[$itemKey]);
    }

    public function updateItem(string $id, int $quantity): ?array
    {
        if ($quantity <= 0) {
            return $this->removeItem($id);
        }

        $cartItems = Session::get($this->getCartKey(), []);
        
        if (!isset($cartItems[$id])) {
            return null;
        }

        $cartItems[$id]['quantity'] = $quantity;
        Session::put($this->getCartKey(), $cartItems);

        return $this->formatCartItem($id, $cartItems[$id]);
    }

    public function removeItem(string $id): bool
    {
        $cartItems = Session::get($this->getCartKey(), []);
        
        if (!isset($cartItems[$id])) {
            return false;
        }

        unset($cartItems[$id]);
        Session::put($this->getCartKey(), $cartItems);

        return true;
    }

    public function clearCart(): int
    {
        $count = count(Session::get($this->getCartKey(), []));
        Session::forget($this->getCartKey());
        return $count;
    }

    public function getCartTotal(): float
    {
        $items = $this->getCartItems();
        $total = 0;

        foreach ($items as $item) {
            if (isset($item['product'])) {
                $total += $item['product']['price'] * $item['quantity'];
            } elseif (isset($item['bundle'])) {
                $total += $item['bundle']['price'] * $item['quantity'];
            }
        }

        return $total;
    }

    private function formatCartItem(string $key, array $item): array
    {
        $formatted = [
            'id' => $key,
            'product_id' => $item['product_id'] ?? null,
            'bundle_id' => $item['bundle_id'] ?? null,
            'quantity' => $item['quantity'],
        ];

        // Load product or bundle data
        if ($item['product_id']) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $formatted['product'] = [
                    'id' => (string) $product->id,
                    'name' => $product->name,
                    'sku' => $product->sku,
                    'price' => (float) $product->price,
                    'image' => $product->image,
                ];
            }
        } elseif ($item['bundle_id']) {
            $bundle = Bundle::with('products')->find($item['bundle_id']);
            if ($bundle) {
                $formatted['bundle'] = [
                    'id' => (string) $bundle->id,
                    'name' => $bundle->name,
                    'price' => (float) $bundle->price,
                    'products' => $bundle->products->map(function ($product) {
                        return [
                            'id' => (string) $product->id,
                            'name' => $product->name,
                            'sku' => $product->sku,
                            'price' => (float) $product->price,
                        ];
                    })->toArray(),
                ];
            }
        }

        return $formatted;
    }
}

