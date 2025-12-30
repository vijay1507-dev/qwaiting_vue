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
        $starterBundle = new Bundle([
            'name' => 'Starter Bundle',
            'slug' => Str::slug('Starter Bundle'),
            'description' => 'Perfect starter package for small businesses',
            'discount_percentage' => 15,
            'is_active' => true,
            'original_price' => 0,
            'price' => 0,
            'savings' => 0,
        ]);
        $starterBundle->save();

        $starterBundle->products()->attach([
            $qk15->id => ['quantity' => 1],
            $ds32->id => ['quantity' => 1],
            $tp80->id => ['quantity' => 1],
        ]);

        $starterBundle->refresh();
        $starterBundle->calculatePrice();
        $starterBundle->save();

        // Pro Bundle
        $proBundle = new Bundle([
            'name' => 'Pro Bundle',
            'slug' => Str::slug('Pro Bundle'),
            'description' => 'Complete professional solution for larger operations',
            'discount_percentage' => 20,
            'is_active' => true,
            'original_price' => 0,
            'price' => 0,
            'savings' => 0,
        ]);
        $proBundle->save();

        $proBundle->products()->attach([
            $qk22->id => ['quantity' => 1],
            $ds55->id => ['quantity' => 1],
            $tp80->id => ['quantity' => 1],
            $kbNum->id => ['quantity' => 1],
        ]);

        $proBundle->refresh();
        $proBundle->calculatePrice();
        $proBundle->save();
    }
}
