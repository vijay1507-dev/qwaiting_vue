<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed E-commerce data
        $this->call([
            PermissionsSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            BundleSeeder::class,
        ]);

        $role = \App\Models\Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web', 'status' => 'Active']);
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@qwaiting.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole($role);
    }
}
