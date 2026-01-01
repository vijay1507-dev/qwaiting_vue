<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define CRM modules and their permissions (only main modules from sidebar)
        $modules = [
            'Dashboard' => ['read'],
            'Clients' => ['read', 'create', 'update', 'delete'],
            'Marketing' => ['read', 'create', 'update', 'delete'],
            'E-Commerce' => ['read', 'create', 'update', 'delete'],
            'Subscription Management' => ['read', 'create', 'update', 'delete'],
            'User Management' => ['read', 'create', 'update', 'delete'],
        ];

        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = strtolower(str_replace(' ', '_', $module)).'.'.$action;
                Permission::firstOrCreate(
                    ['name' => $permissionName, 'guard_name' => 'web'],
                    ['name' => $permissionName, 'guard_name' => 'web']
                );
            }
        }
    }
}
