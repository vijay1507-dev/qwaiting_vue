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
            'Clients' => ['read', 'update', 'reset_password'],
            'Marketing' => [
                'sequences.read',
                'sequences.create',
                'sequences.update',
                'sequences.delete',
                'system_templates.read',
                'system_templates.create',
                'system_templates.update',
            ],
            'Ecommerce' => [
                'overview.read',
                'product_catalog.read',
                'bundle_offers.read',
                'shopping_cart.read',
                'orders.read',
            ],
            'Subscription Management' => [
                'features.read',
                'packages.read',
                'configuration.read',
                'pricing.read',
                'coupons.read',
                'preview.read',
            ],
            'User Management' => [
                'users.read',
                'users.create',
                'users.update',
                'users.delete',
                'users.reset_password',
                'roles.read',
                'roles.create',
                'roles.update',
                'roles.delete',
            ],
        ];

        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                // Handle nested permissions (e.g. marketing.sequences.read)
                if (str_contains($action, '.')) {
                    $permissionName = strtolower(str_replace(' ', '_', $module)) . '.' . $action;
                } else {
                    $permissionName = strtolower(str_replace(' ', '_', $module)) . '.' . $action;
                }

                Permission::firstOrCreate(
                    ['name' => $permissionName, 'guard_name' => 'web'],
                    ['name' => $permissionName, 'guard_name' => 'web']
                );
            }
        }

        // Cleanup obsolete permissions
        $obsoletePermissions = [
            'clients.create',
            'clients.delete',
            'marketing.read',
            'marketing.create',
            'marketing.update',
            'marketing.delete',
            'sequence.read',
            'sequence.create',
            'sequence.update',
            'sequence.delete',
            'system_templates.read',
            'system_templates.read',
            'system_templates.update',
            'e-commerce.read',
            'e-commerce.create',
            'e-commerce.update',
            'e-commerce.delete',
            'ecommerce.shopping_cart.create',
            'ecommerce.shopping_cart.update',
            'ecommerce.shopping_cart.delete',
            'ecommerce.orders.create',
            'ecommerce.orders.update',
            'ecommerce.orders.delete',
            'ecommerce.product_catalog.create',
            'ecommerce.product_catalog.update',
            'ecommerce.product_catalog.delete',
            'ecommerce.bundle_offers.create',
            'ecommerce.bundle_offers.update',
            'ecommerce.bundle_offers.delete',
            'subscription_management.read',
            'subscription_management.create',
            'subscription_management.update',
            'subscription_management.delete',
            'subscription_management.features.create',
            'subscription_management.features.update',
            'subscription_management.features.delete',
            'subscription_management.packages.create',
            'subscription_management.packages.update',
            'subscription_management.packages.delete',
            'subscription_management.configuration.update',
            'subscription_management.pricing.create',
            'subscription_management.pricing.update',
            'subscription_management.pricing.delete',
            'subscription_management.coupons.create',
            'subscription_management.coupons.update',
            'subscription_management.coupons.delete',
            'user_management.read',
            'user_management.create',
            'user_management.update',
            'user_management.delete',
        ];

        Permission::whereIn('name', $obsoletePermissions)->where('guard_name', 'web')->delete();
    }
}
