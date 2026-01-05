<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SyncRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $this->command->info("Found {$users->count()} users to sync roles for.");

        foreach ($users as $user) {
            if ($user->role) {
                // Ensure the role exists in Spatie roles table
                $role = Role::firstOrCreate(['name' => $user->role, 'guard_name' => 'web']);

                // Sync the role
                $user->syncRoles([$role]);
                $this->command->info("Synced role '{$user->role}' for user {$user->email}");
            } else {
                $this->command->warn("User {$user->email} has no role defined in column.");
            }
        }
    }
}
