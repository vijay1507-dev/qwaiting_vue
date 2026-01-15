<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $kiosksCategory = ProductCategory::where('slug', 'kiosks')->first();
        $displaysCategory = ProductCategory::where('slug', 'displays')->first();
        $accessoriesCategory = ProductCategory::where('slug', 'accessories')->first();

        $products = [
            [
                'name' => '15-inch Touch Kiosk',
                'sku' => 'QK-15',
                'description' => 'Floor-standing kiosk with ticket printer',
                'price' => 1299.00,
                'stock' => 45,
                'low_stock_threshold' => 10,
                'image' => '/images/products/qk-15.jpg',
                'category_id' => $kiosksCategory->id,
                'features' => [
                    'High-resolution touchscreen display',
                    'Built-in thermal ticket printer',
                    'Durable floor-standing design',
                    'Easy to install and configure',
                ],
                'specifications' => [
                    ['spec_key' => 'Screen Size', 'spec_value' => '15 inches'],
                    ['spec_key' => 'Resolution', 'spec_value' => '1920x1080'],
                    ['spec_key' => 'Touch', 'spec_value' => 'Capacitive'],
                    ['spec_key' => 'Printer', 'spec_value' => 'Included'],
                ],
            ],
            [
                'name' => '22-inch Touch Kiosk',
                'sku' => 'QK-22',
                'description' => 'Premium floor-standing kiosk',
                'price' => 1899.00,
                'stock' => 32,
                'low_stock_threshold' => 10,
                'image' => '/images/products/qk-22.jpg',
                'category_id' => $kiosksCategory->id,
                'features' => [
                    'Larger premium display',
                    'Enhanced processing power',
                    'Advanced security features',
                    'Extended warranty included',
                ],
                'specifications' => [
                    ['spec_key' => 'Screen Size', 'spec_value' => '22 inches'],
                    ['spec_key' => 'Resolution', 'spec_value' => '1920x1080'],
                    ['spec_key' => 'Touch', 'spec_value' => 'Capacitive'],
                    ['spec_key' => 'Printer', 'spec_value' => 'Included'],
                ],
            ],
            [
                'name' => 'Wall-Mount Kiosk',
                'sku' => 'QK-WALL',
                'description' => 'Space-saving wall mount solution',
                'price' => 899.00,
                'stock' => 28,
                'low_stock_threshold' => 10,
                'image' => '/images/products/qk-wall.jpg',
                'category_id' => $kiosksCategory->id,
                'features' => [
                    'Space-saving design',
                    'Wall mountable',
                    'Compact footprint',
                ],
                'specifications' => [
                    ['spec_key' => 'Screen Size', 'spec_value' => '15 inches'],
                    ['spec_key' => 'Resolution', 'spec_value' => '1920x1080'],
                    ['spec_key' => 'Touch', 'spec_value' => 'Capacitive'],
                    ['spec_key' => 'Mount', 'spec_value' => 'Wall'],
                ],
            ],
            [
                'name' => '32-inch Queue Display',
                'sku' => 'DS-32',
                'description' => 'HD display for queue status',
                'price' => 499.00,
                'stock' => 67,
                'low_stock_threshold' => 10,
                'image' => '/images/products/ds-32.jpg',
                'category_id' => $displaysCategory->id,
                'features' => [
                    'HD display quality',
                    'VESA mount compatible',
                    'Energy efficient',
                ],
                'specifications' => [
                    ['spec_key' => 'Screen Size', 'spec_value' => '32 inches'],
                    ['spec_key' => 'Resolution', 'spec_value' => '1920x1080'],
                    ['spec_key' => 'Type', 'spec_value' => 'LED'],
                    ['spec_key' => 'Mount', 'spec_value' => 'VESA'],
                ],
            ],
            [
                'name' => '55-inch Queue Display',
                'sku' => 'DS-55',
                'description' => 'Large format queue display',
                'price' => 899.00,
                'stock' => 24,
                'low_stock_threshold' => 10,
                'image' => '/images/products/ds-55.jpg',
                'category_id' => $displaysCategory->id,
                'features' => [
                    '4K Ultra HD',
                    'Large format display',
                    'Professional quality',
                ],
                'specifications' => [
                    ['spec_key' => 'Screen Size', 'spec_value' => '55 inches'],
                    ['spec_key' => 'Resolution', 'spec_value' => '3840x2160'],
                    ['spec_key' => 'Type', 'spec_value' => 'LED'],
                    ['spec_key' => 'Mount', 'spec_value' => 'VESA'],
                ],
            ],
            [
                'name' => 'Thermal Ticket Printer',
                'sku' => 'TP-80',
                'description' => 'High-speed ticket printer',
                'price' => 299.00,
                'stock' => 89,
                'low_stock_threshold' => 10,
                'image' => '/images/products/tp-80.jpg',
                'category_id' => $accessoriesCategory->id,
                'features' => [
                    'High-speed printing',
                    'Multiple connectivity options',
                    'Reliable performance',
                ],
                'specifications' => [
                    ['spec_key' => 'Type', 'spec_value' => 'Thermal'],
                    ['spec_key' => 'Speed', 'spec_value' => '80mm/s'],
                    ['spec_key' => 'Connectivity', 'spec_value' => 'USB, Ethernet'],
                    ['spec_key' => 'Paper Width', 'spec_value' => '80mm'],
                ],
            ],
            [
                'name' => 'Numeric Keyboard',
                'sku' => 'KB-NUM',
                'description' => 'Customer input keyboard',
                'price' => 79.00,
                'stock' => 156,
                'low_stock_threshold' => 10,
                'image' => '/images/products/kb-num.jpg',
                'category_id' => $accessoriesCategory->id,
                'features' => [
                    'Durable construction',
                    'Easy to clean',
                    'USB connectivity',
                ],
                'specifications' => [
                    ['spec_key' => 'Type', 'spec_value' => 'Numeric'],
                    ['spec_key' => 'Keys', 'spec_value' => '12'],
                    ['spec_key' => 'Connectivity', 'spec_value' => 'USB'],
                    ['spec_key' => 'Material', 'spec_value' => 'Plastic'],
                ],
            ],
        ];

        foreach ($products as $index => $productData) {
            $specifications = $productData['specifications'];
            unset($productData['specifications']);

            $product = Product::firstOrCreate(
                ['sku' => $productData['sku']], // Check uniqueness by SKU
                $productData
            );

            // Only add specifications if they don't exist yet (prevent duplicates on re-run)
            // Or just sync them. Since we don't have a sync method for hasMany efficiently here without relationships loaded,
            // we'll check if any specs exist, if not, create them. 
            // Better yet, updateOrCreate them based on key + product_id
            foreach ($specifications as $specIndex => $spec) {
                ProductSpecification::firstOrCreate(
                    [
                        'product_id' => $product->id,
                        'spec_key' => $spec['spec_key'],
                    ],
                    [
                        'spec_value' => $spec['spec_value'],
                        'display_order' => $specIndex,
                    ]
                );
            }
        }
    }
}
