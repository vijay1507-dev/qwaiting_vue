<?php

namespace App\Services\Ecommerce;

use App\Models\Bundle;
use Illuminate\Support\Facades\DB;

class BundleService
{
    public function create(array $data): Bundle
    {
        return DB::transaction(function () use ($data) {
            $products = $data['products'] ?? [];
            unset($data['products']);

            if (empty($data['slug'])) {
                $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
            }

            $bundle = Bundle::create($data);
            $bundle->calculatePrice();
            $bundle->save();

            if (!empty($products)) {
                foreach ($products as $productData) {
                    $bundle->products()->attach($productData['product_id'], [
                        'quantity' => $productData['quantity'] ?? 1,
                    ]);
                }
                $bundle->refresh();
                $bundle->calculatePrice();
                $bundle->save();
            }

            return $bundle->load('products');
        });
    }

    public function update(Bundle $bundle, array $data): Bundle
    {
        return DB::transaction(function () use ($bundle, $data) {
            $products = $data['products'] ?? null;
            unset($data['products']);

            if (isset($data['name']) && empty($data['slug'])) {
                $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
            }

            $bundle->update($data);

            if ($products !== null) {
                $bundle->products()->detach();
                foreach ($products as $productData) {
                    $bundle->products()->attach($productData['product_id'], [
                        'quantity' => $productData['quantity'] ?? 1,
                    ]);
                }
                $bundle->refresh();
                $bundle->calculatePrice();
                $bundle->save();
            }

            return $bundle->load('products');
        });
    }

    public function delete(Bundle $bundle): bool
    {
        return DB::transaction(function () use ($bundle) {
            $bundle->products()->detach();
            return $bundle->delete();
        });
    }
}

