# Test Users Setup Documentation

## Overview

This document describes the creation of 3 dummy test users in the database to test all email sequence scenarios. These users are designed to cover different stages of the trial user journey and ensure all 7 emails in the sequence are properly tested.

## Database Structure

The test users are created in the `mysql_external` database connection with the following table relationships:

- **tenants** table: Stores tenant/company information
  - `id` (bigint, primary key)
  - `data` (longtext, JSON - stores company name)
  - `created_at`, `updated_at` (timestamps)

- **domains** table: Stores domain information linked to tenants
  - `id` (int, primary key)
  - `domain` (varchar, unique)
  - `team_id` (varchar) - **This is the tenant ID**
  - `trial_ends_at` (timestamp) - Trial expiration date
  - `created_at`, `updated_at` (timestamps)

- **users** table: Stores user information
  - `id` (bigint, primary key)
  - `name` (varchar)
  - `username` (varchar, required)
  - `email` (varchar)
  - `phone` (varchar)
  - `team_id` (bigint) - Links to tenant ID
  - `is_active` (int)
  - `created_at`, `updated_at` (timestamps)
  - `deleted_at` (timestamp, nullable)

## Test Users Created

### Test User 1: Recently Registered User
**Purpose:** Test registration-based emails (1 day timing)

- **Name:** John Doe - Recent User
- **Email:** john.doe.test1@qwaiting.test
- **Username:** johndoe_test1
- **Phone:** +1234567890
- **Registration Date:** 1 day ago
- **Trial Ends:** 13 days from now (14 days total trial)
- **Expected Emails:**
  - ✅ Email 1: "Welcome to Qwaiting - Your Journey Starts Here" (Welcome - 1 day)
  - ✅ Email 2: "5 Features That Will Transform Your Customer Experience" (Feature Highlight - 1 day)

**Test Case:** Verifies that users who registered 1 day ago receive the initial welcome and feature highlight emails.

---

### Test User 2: Mid-Trial User
**Purpose:** Test all registration-based emails (1, 2, 3, 4 days)

- **Name:** Jane Smith - Mid Trial User
- **Email:** jane.smith.test2@qwaiting.test
- **Username:** janesmith_test2
- **Phone:** +1234567891
- **Registration Date:** 4 days ago
- **Trial Ends:** 10 days from now (14 days total trial)
- **Expected Emails:**
  - ✅ Email 1: "Welcome to Qwaiting - Your Journey Starts Here" (Welcome - 1 day)
  - ✅ Email 2: "5 Features That Will Transform Your Customer Experience" (Feature Highlight - 1 day)
  - ✅ Email 3: "How Qwaiting Reduced Wait Times by 60%" (Social Proof - 2 days)
  - ✅ Email 4: "Your Trial is Halfway Through - Are You Making the Most of It?" (Trial Reminder - 3 days)
  - ✅ Email 5: "Let's Talk About Your Queue Management Goals" (Sales Outreach - 4 days)

**Test Case:** Verifies that users who registered 4 days ago receive all registration-based emails in the sequence.

---

### Test User 3: Expiring Trial User
**Purpose:** Test expiry-based emails (1 Day Before Expiry, On Expired)

- **Name:** Bob Johnson - Expiring Trial User
- **Email:** bob.johnson.test3@qwaiting.test
- **Username:** bobjohnson_test3
- **Phone:** +1234567892
- **Registration Date:** 13 days ago
- **Trial Ends:** Tomorrow (1 day from now)
- **Expected Emails:**
  - ✅ Email 6: "Exclusive: 20% Off Your First Year" (Offer - 1 Day Before Expiry)
  - ✅ Email 7: "Your Qwaiting Trial Has Expired" (Trial Reminder - On Expired)

**Test Case:** Verifies that users whose trial expires tomorrow receive the "1 Day Before Expiry" email, and will receive the "On Expired" email when the trial actually expires.

---

## Email Sequence Reference

The complete email sequence consists of 7 emails:

1. **Welcome** - "Welcome to Qwaiting - Your Journey Starts Here" (1 day)
2. **Feature Highlight** - "5 Features That Will Transform Your Customer Experience" (1 day)
3. **Social Proof** - "How Qwaiting Reduced Wait Times by 60%" (2 days)
4. **Trial Reminder** - "Your Trial is Halfway Through - Are You Making the Most of It?" (3 days)
5. **Sales Outreach** - "Let's Talk About Your Queue Management Goals" (4 days)
6. **Offer** - "Exclusive: 20% Off Your First Year" (1 Day Before Expiry)
7. **Trial Reminder** - "Your Qwaiting Trial Has Expired" (On Expired)

## Implementation Details

### Seeder File
- **Location:** `database/seeders/TestUsersSeeder.php`
- **Connection:** Uses `mysql_external` database connection
- **Cleanup:** Automatically removes existing test users before creating new ones

### Key Implementation Notes

1. **Tenant Creation:**
   - Tenants are created with company name stored in JSON format in the `data` column
   - Tenant ID is used as `team_id` in both `domains` and `users` tables

2. **Domain Creation:**
   - `team_id` in domains table is stored as VARCHAR (converted from tenant ID)
   - `trial_ends_at` is set based on the test scenario
   - Domain names include timestamp to ensure uniqueness

3. **User Creation:**
   - `team_id` in users table is stored as BIGINT (tenant ID)
   - `username` field is required and must be provided
   - `created_at` is set to simulate registration date
   - `is_active` is set to 1 (active)
   - `deleted_at` is set to null

4. **Date Calculations:**
   - All dates are calculated relative to the current date using Carbon
   - Registration dates are set in the past
   - Trial end dates are set in the future based on the test scenario

## Running the Seeder

To create the test users, run:

```bash
php artisan db:seed --class=TestUsersSeeder
```

This will:
1. Clean up any existing test users (by email pattern)
2. Create 3 tenants
3. Create 3 domains (linked to tenants via team_id)
4. Create 3 users (linked to tenants via team_id)
5. Display summary information about each created user

## Testing the Email Sequence

After creating the test users:

1. **Queue the emails:**
   ```bash
   php artisan sequences:send-emails
   ```

2. **Process the queue (keep running):**
   ```bash
   php artisan queue:work
   ```

3. **Verify emails were queued:**
   ```sql
   SELECT * FROM email_sends ORDER BY created_at DESC;
   ```

4. **Check which emails should be sent:**
   - User 1 should have 2 emails queued (Welcome, Feature Highlight)
   - User 2 should have 5 emails queued (Welcome, Feature Highlight, Social Proof, Trial Reminder, Sales Outreach)
   - User 3 should have 1 email queued (Offer - 1 Day Before Expiry)

## Database Queries to Verify

### Check Test Users
```sql
SELECT u.id, u.name, u.email, u.created_at, d.trial_ends_at, 
       DATEDIFF(d.trial_ends_at, CURDATE()) as days_until_expiry
FROM users u
JOIN domains d ON d.team_id = u.team_id
WHERE u.email LIKE '%test%@qwaiting.test'
ORDER BY u.created_at;
```

### Check Queued Emails
```sql
SELECT es.*, u.email, u.name, ent.subject, ent.timing_unit, ent.timing_value
FROM email_sends es
JOIN users u ON u.id = es.external_user_id
JOIN email_notification_templates ent ON ent.id = es.email_template_id
WHERE u.email LIKE '%test%@qwaiting.test'
ORDER BY u.email, es.created_at;
```

## Cleanup

To remove all test users manually:

```sql
-- Delete test users
DELETE FROM users WHERE email LIKE '%test%@qwaiting.test';

-- Delete associated domains
DELETE FROM domains WHERE domain LIKE 'test-company-%';

-- Delete associated tenants (if needed)
-- Note: Only delete if no other users reference these tenants
```

Or run the seeder again - it automatically cleans up existing test users before creating new ones.

## Notes

- The seeder uses timestamps in domain names to ensure uniqueness
- All test users have `is_active = 1` and `deleted_at = NULL`
- The `team_id` relationship is critical: `domains.team_id` (VARCHAR) = `users.team_id` (BIGINT) = `tenants.id` (BIGINT)
- Trial expiry dates are calculated to test specific email timing scenarios
- The seeder can be run multiple times safely (it cleans up first)

## Troubleshooting

If emails are not being sent:

1. **Check if users exist:**
   ```bash
   php artisan tinker
   >>> DB::connection('mysql_external')->table('users')->where('email', 'like', '%test%@qwaiting.test')->get();
   ```

2. **Check if domains have trial_ends_at:**
   ```bash
   >>> DB::connection('mysql_external')->table('domains')->where('domain', 'like', 'test-company-%')->get(['domain', 'team_id', 'trial_ends_at']);
   ```

3. **Verify sequence is active:**
   ```bash
   >>> \App\Models\Sequence::where('status', 'active')->with('emailTemplates')->first();
   ```

4. **Check queue for jobs:**
   ```bash
   >>> DB::table('jobs')->count();
   ```

5. **Check email_sends table:**
   ```bash
   >>> \App\Models\EmailSend::with('emailTemplate')->latest()->take(10)->get();
   ```
