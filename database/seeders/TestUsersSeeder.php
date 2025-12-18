<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $externalConnection = 'mysql_external';

        // Get the current date for calculations
        $today = Carbon::now();
        $timestamp = $today->format('YmdHis');

        // Clean up any existing test users first (optional - comment out if you want to keep them)
        $this->cleanupTestUsers($externalConnection);

        // ============================================
        // TEST USER 1: Recently Registered (1 day ago)
        // Should receive: Email 1 (Welcome - 1 day), Email 2 (Feature Highlight - 1 day)
        // ============================================

        // Create Tenant 1 (tenants table only has id, created_at, updated_at, data)
        $tenant1Id = DB::connection($externalConnection)->table('tenants')->insertGetId([
            'data' => json_encode(['name' => 'Test Company 1 - Recent Registration']),
            'created_at' => $today->copy()->subDays(1),
            'updated_at' => $today->copy()->subDays(1),
        ]);

        // Create Domain 1 (trial_ends_at set to 14 days from registration)
        // team_id is varchar, so convert to string
        $domain1Id = DB::connection($externalConnection)->table('domains')->insertGetId([
            'domain' => "test-company-1-{$timestamp}.qwaiting.test",
            'team_id' => (string) $tenant1Id, // team_id = tenant id (as varchar)
            'trial_ends_at' => $today->copy()->addDays(13), // 14 days from registration (1 day ago + 13 = 14 days total)
            'created_at' => $today->copy()->subDays(1),
            'updated_at' => $today->copy()->subDays(1),
        ]);

        // Create User 1
        $user1Id = DB::connection($externalConnection)->table('users')->insertGetId([
            'name' => 'John Doe - Recent User',
            'username' => 'johndoe_test1',
            'email' => 'john.doe.test1@qwaiting.test',
            'phone' => '+1234567890',
            'team_id' => $tenant1Id, // team_id is bigint in users table
            'is_active' => 1,
            'created_at' => $today->copy()->subDays(1), // Registered 1 day ago
            'updated_at' => $today->copy()->subDays(1),
            'deleted_at' => null,
        ]);

        $this->command->info('Created Test User 1:');
        $this->command->info('  - Name: John Doe - Recent User');
        $this->command->info('  - Email: john.doe.test1@qwaiting.test');
        $this->command->info('  - Registered: 1 day ago');
        $this->command->info('  - Trial Ends: '.$today->copy()->addDays(13)->format('Y-m-d'));
        $this->command->info('  - Expected Emails: Welcome (1 day), Feature Highlight (1 day)');

        // ============================================
        // TEST USER 2: Registered 4 Days Ago
        // Should receive: Email 1, 2, 3, 4, 5 (all registration-based emails)
        // ============================================

        // Create Tenant 2
        $tenant2Id = DB::connection($externalConnection)->table('tenants')->insertGetId([
            'data' => json_encode(['name' => 'Test Company 2 - Mid Trial']),
            'created_at' => $today->copy()->subDays(4),
            'updated_at' => $today->copy()->subDays(4),
        ]);

        // Create Domain 2
        $domain2Id = DB::connection($externalConnection)->table('domains')->insertGetId([
            'domain' => "test-company-2-{$timestamp}.qwaiting.test",
            'team_id' => (string) $tenant2Id,
            'trial_ends_at' => $today->copy()->addDays(10), // 14 days from registration
            'created_at' => $today->copy()->subDays(4),
            'updated_at' => $today->copy()->subDays(4),
        ]);

        // Create User 2
        $user2Id = DB::connection($externalConnection)->table('users')->insertGetId([
            'name' => 'Jane Smith - Mid Trial User',
            'username' => 'janesmith_test2',
            'email' => 'jane.smith.test2@qwaiting.test',
            'phone' => '+1234567891',
            'team_id' => $tenant2Id,
            'is_active' => 1,
            'created_at' => $today->copy()->subDays(4), // Registered 4 days ago
            'updated_at' => $today->copy()->subDays(4),
            'deleted_at' => null,
        ]);

        $this->command->info("\nCreated Test User 2:");
        $this->command->info('  - Name: Jane Smith - Mid Trial User');
        $this->command->info('  - Email: jane.smith.test2@qwaiting.test');
        $this->command->info('  - Registered: 4 days ago');
        $this->command->info('  - Trial Ends: '.$today->copy()->addDays(10)->format('Y-m-d'));
        $this->command->info('  - Expected Emails: Welcome (1 day), Feature Highlight (1 day), Social Proof (2 days), Trial Reminder (3 days), Sales Outreach (4 days)');

        // ============================================
        // TEST USER 3: Trial Expiring Tomorrow (1 day before expiry)
        // Should receive: Email 6 (Offer - 1 Day Before Expiry), Email 7 (On Expired - when expired)
        // ============================================

        // Create Tenant 3
        $tenant3Id = DB::connection($externalConnection)->table('tenants')->insertGetId([
            'data' => json_encode(['name' => 'Test Company 3 - Expiring Trial']),
            'created_at' => $today->copy()->subDays(13),
            'updated_at' => $today->copy()->subDays(13),
        ]);

        // Create Domain 3 (trial expires tomorrow)
        $domain3Id = DB::connection($externalConnection)->table('domains')->insertGetId([
            'domain' => "test-company-3-{$timestamp}.qwaiting.test",
            'team_id' => (string) $tenant3Id,
            'trial_ends_at' => $today->copy()->addDay(), // Expires tomorrow (1 day before expiry)
            'created_at' => $today->copy()->subDays(13),
            'updated_at' => $today->copy()->subDays(13),
        ]);

        // Create User 3
        $user3Id = DB::connection($externalConnection)->table('users')->insertGetId([
            'name' => 'Bob Johnson - Expiring Trial User',
            'username' => 'bobjohnson_test3',
            'email' => 'bob.johnson.test3@qwaiting.test',
            'phone' => '+1234567892',
            'team_id' => $tenant3Id,
            'is_active' => 1,
            'created_at' => $today->copy()->subDays(13), // Registered 13 days ago
            'updated_at' => $today->copy()->subDays(13),
            'deleted_at' => null,
        ]);

        $this->command->info("\nCreated Test User 3:");
        $this->command->info('  - Name: Bob Johnson - Expiring Trial User');
        $this->command->info('  - Email: bob.johnson.test3@qwaiting.test');
        $this->command->info('  - Registered: 13 days ago');
        $this->command->info('  - Trial Ends: '.$today->copy()->addDay()->format('Y-m-d').' (Tomorrow - 1 Day Before Expiry)');
        $this->command->info('  - Expected Emails: Offer (1 Day Before Expiry), Trial Reminder (On Expired)');

        $this->command->info("\n✅ All 3 test users created successfully!");
        $this->command->info("\nNext steps:");
        $this->command->info('  1. Run: php artisan sequences:send-emails');
        $this->command->info('  2. Ensure queue worker is running: php artisan queue:work');
        $this->command->info('  3. Check email_sends table to verify emails were queued');
    }

    /**
     * Clean up existing test users (optional).
     */
    private function cleanupTestUsers(string $connection): void
    {
        // Delete test users by email pattern
        $testEmails = [
            'john.doe.test1@qwaiting.test',
            'jane.smith.test2@qwaiting.test',
            'bob.johnson.test3@qwaiting.test',
        ];

        foreach ($testEmails as $email) {
            $user = DB::connection($connection)->table('users')->where('email', $email)->first();
            if ($user) {
                // Delete domain if exists
                DB::connection($connection)->table('domains')
                    ->where('team_id', (string) $user->team_id)
                    ->delete();

                // Delete tenant if exists
                DB::connection($connection)->table('tenants')
                    ->where('id', $user->team_id)
                    ->delete();

                // Delete user
                DB::connection($connection)->table('users')
                    ->where('email', $email)
                    ->delete();
            }
        }
    }
}
