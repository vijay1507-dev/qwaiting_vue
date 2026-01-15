<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminFixSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin Role
        $role = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web'], ['status' => 'Active']);

        // Sync all permissions
        $role->syncPermissions(Permission::all());

        // Find Admin User
        $user = User::where('email', 'admin@qwaiting.com')->first();

        if ($user) {
            $user->assignRole($role);
            $this->command->info('Admin role assigned to ' . $user->email);
        } else {
            // Create if not exists (fallback)
            $user = User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@qwaiting.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
            ]);
            $user->assignRole($role);
            $this->command->info('Admin user created and role assigned.');
        }
    }
}
