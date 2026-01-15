<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kiosks', 'description' => 'Touch kiosk solutions', 'display_order' => 1],
            ['name' => 'Displays', 'description' => 'Queue display screens', 'display_order' => 2],
            ['name' => 'Accessories', 'description' => 'Supporting accessories', 'display_order' => 3],
        ];

        foreach ($categories as $category) {
            ProductCategory::firstOrCreate(
                ['slug' => Str::slug($category['name'])], // Check for existing slug
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'is_active' => true,
                    'display_order' => $category['display_order'],
                ]
            );
        }
    }
}
