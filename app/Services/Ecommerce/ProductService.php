<?php

namespace App\Services\Ecommerce;

use App\Models\Product;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ProductService
{
    public function create(array $data): Product
    {
        return DB::transaction(function () use ($data) {
            $specifications = $data['specifications'] ?? [];
            unset($data['specifications']);

            // Handle image upload
            if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $data['image'] = $this->storeImage($data['image']);
            }

            $product = Product::create($data);

            if (!empty($specifications)) {
                foreach ($specifications as $index => $spec) {
                    ProductSpecification::create([
                        'product_id' => $product->id,
                        'spec_key' => $spec['spec_key'],
                        'spec_value' => $spec['spec_value'],
                        'display_order' => $index,
                    ]);
                }
            }

            return $product->load('specifications', 'category');
        });
    }

    public function update(Product $product, array $data): Product
    {
        return DB::transaction(function () use ($product, $data) {
            $specifications = $data['specifications'] ?? null;
            unset($data['specifications']);

            // Handle image upload
            if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                // Delete old image if exists
                if ($product->image) {
                    $this->deleteImage($product->image);
                }
                $data['image'] = $this->storeImage($data['image']);
            } elseif (!isset($data['image'])) {
                // Keep existing image if not provided
                unset($data['image']);
            }

            $product->update($data);

            if ($specifications !== null) {
                $product->specifications()->delete();
                foreach ($specifications as $index => $spec) {
                    ProductSpecification::create([
                        'product_id' => $product->id,
                        'spec_key' => $spec['spec_key'],
                        'spec_value' => $spec['spec_value'],
                        'display_order' => $index,
                    ]);
                }
            }

            return $product->load('specifications', 'category');
        });
    }

    public function delete(Product $product): bool
    {
        return DB::transaction(function () use ($product) {
            $product->specifications()->delete();
            return $product->delete();
        });
    }

    public function getLowStockProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::whereColumn('stock', '<=', 'low_stock_threshold')
            ->where('is_active', true)
            ->get();
    }

    private function storeImage(UploadedFile $file): string
    {
        $path = $file->store('products', 'public');
        return $path;
    }

    private function deleteImage(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}

