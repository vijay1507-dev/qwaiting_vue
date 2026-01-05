<?php

namespace Database\Seeders;

use App\Models\Bundle;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BundleSeeder extends Seeder
{
    public function run(): void
    {
        $qk15 = Product::where('sku', 'QK-15')->first();
        $ds32 = Product::where('sku', 'DS-32')->first();
        $tp80 = Product::where('sku', 'TP-80')->first();
        $qk22 = Product::where('sku', 'QK-22')->first();
        $ds55 = Product::where('sku', 'DS-55')->first();
        $kbNum = Product::where('sku', 'KB-NUM')->first();

        // Starter Bundle
        $starterBundle = Bundle::firstOrCreate(
            ['slug' => Str::slug('Starter Bundle')],
            [
                'name' => 'Starter Bundle',
                'description' => 'Perfect starter package for small businesses',
                'discount_percentage' => 15,
                'is_active' => true,
                'original_price' => 0,
                'price' => 0,
                'savings' => 0,
            ]
        );

        // Sync products (this handles both creating new relations and updating existing ones safely)
        if ($qk15 && $ds32 && $tp80) {
            $starterBundle->products()->syncWithoutDetaching([
                $qk15->id => ['quantity' => 1],
                $ds32->id => ['quantity' => 1],
                $tp80->id => ['quantity' => 1],
            ]);
        }

        $starterBundle->refresh();
        $starterBundle->calculatePrice();
        $starterBundle->save();

        // Pro Bundle
        $proBundle = Bundle::firstOrCreate(
            ['slug' => Str::slug('Pro Bundle')],
            [
                'name' => 'Pro Bundle',
                'description' => 'Complete professional solution for larger operations',
                'discount_percentage' => 20,
                'is_active' => true,
                'original_price' => 0,
                'price' => 0,
                'savings' => 0,
            ]
        );

        if ($qk22 && $ds55 && $tp80 && $kbNum) {
            $proBundle->products()->syncWithoutDetaching([
                $qk22->id => ['quantity' => 1],
                $ds55->id => ['quantity' => 1],
                $tp80->id => ['quantity' => 1],
                $kbNum->id => ['quantity' => 1],
            ]);
        }

        $proBundle->refresh();
        $proBundle->calculatePrice();
        $proBundle->save();
    }
}
