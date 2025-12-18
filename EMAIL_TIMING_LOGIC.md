# Email Timing Logic - Complete Explanation

This document explains how the system calculates and finds matching records for each timing unit to determine which emails should be sent to which users.

## Overview

The system uses a **3-step process** to determine which emails to send:

1. **Fetch Users**: Get all trial users from the database
2. **Calculate Metrics**: For each user, calculate relevant time-based metrics
3. **Match & Send**: Compare user metrics with email timing requirements

---

## Step-by-Step Process

### Step 1: Fetch Users

```php
// Gets ALL trial users (those with trial_ends_at not null)
$trialDomains = DB::connection('mysql_external')
    ->table('domains')
    ->whereNotNull('trial_ends_at')
    ->get();
```

**Result**: All users who have a `trial_ends_at` date set.

### Step 2: Calculate User Metrics

For each user, the system calculates:

```php
$daysSinceRegistration = calculateDaysSinceRegistration($user['created_at']);
// Example: User registered 5 days ago → $daysSinceRegistration = 5

$daysUntilExpiry = DATEDIFF(trial_ends_at, CURDATE());
// Example: Trial ends in 3 days → $daysUntilExpiry = 3
```

### Step 3: Match Emails

For each email template, the system checks if the user matches the timing criteria.

---

## Timing Units Explained

### 1. **Immediate**

**Configuration:**
- Timing Unit: `immediate`
- Timing Value: `0` (ignored)

**Calculation:**
```php
$targetDay = 0; // Always day 0 (registration day)
```

**Matching Logic:**
```php
if ($daysSinceRegistration >= 0 && $daysPastTarget <= 30) {
    // Send email
}
```

**Example:**
- User registered: **Today** (Day 0)
- `daysSinceRegistration = 0`
- `targetDay = 0`
- **Match**: `0 >= 0` ✅ → **Email sent**

**Real-World Scenario:**
- User signs up at 2:00 PM today
- Command runs at 3:00 PM today
- Email is sent immediately

---

### 2. **Minutes**

**Configuration:**
- Timing Unit: `minutes`
- Timing Value: `30` (example: 30 minutes)

**Calculation:**
```php
$targetDay = 0; // Minutes are treated as "same day"
```

**Matching Logic:**
```php
// Currently, minutes are converted to day 0
// This means emails with "minutes" timing are sent on registration day
if ($daysSinceRegistration >= 0 && $daysPastTarget <= 30) {
    // Send email
}
```

**Example:**
- User registered: **Today** (Day 0)
- Timing: 30 minutes
- `daysSinceRegistration = 0`
- `targetDay = 0`
- **Match**: `0 >= 0` ✅ → **Email sent**

**Note**: Current implementation treats minutes as "same day". For true minute-based timing, you'd need to calculate hours/minutes since registration.

---

### 3. **Hours**

**Configuration:**
- Timing Unit: `hours`
- Timing Value: `24` (example: 24 hours = 1 day)

**Calculation:**
```php
$targetDay = 0; // Hours are treated as "same day"
```

**Matching Logic:**
```php
// Currently, hours are converted to day 0
// This means emails with "hours" timing are sent on registration day
if ($daysSinceRegistration >= 0 && $daysPastTarget <= 30) {
    // Send email
}
```

**Example:**
- User registered: **Today** (Day 0)
- Timing: 24 hours
- `daysSinceRegistration = 0`
- `targetDay = 0`
- **Match**: `0 >= 0` ✅ → **Email sent**

**Note**: Current implementation treats hours as "same day". For true hour-based timing, you'd need to calculate hours since registration.

---

### 4. **Days** ⭐ Most Common

**Configuration:**
- Timing Unit: `days`
- Timing Value: `1`, `2`, `3`, `4`, etc.

**Calculation:**
```php
$targetDay = $emailTemplate->timing_value;
// Example: timing_value = 3 → targetDay = 3
```

**Matching Logic:**
```php
$daysPastTarget = $daysSinceRegistration - $targetDay;

if ($daysSinceRegistration >= $targetDay && $daysPastTarget <= 30) {
    // Send email
}
```

**Examples:**

**Example A: Email set to "1 Day"**
- User registered: **2 days ago**
- `daysSinceRegistration = 2`
- `targetDay = 1`
- `daysPastTarget = 2 - 1 = 1`
- **Match**: `2 >= 1` ✅ AND `1 <= 30` ✅ → **Email sent**

**Example B: Email set to "3 Days"**
- User registered: **5 days ago**
- `daysSinceRegistration = 5`
- `targetDay = 3`
- `daysPastTarget = 5 - 3 = 2`
- **Match**: `5 >= 3` ✅ AND `2 <= 30` ✅ → **Email sent**

**Example C: Email set to "1 Day" (Too Old)**
- User registered: **35 days ago**
- `daysSinceRegistration = 35`
- `targetDay = 1`
- `daysPastTarget = 35 - 1 = 34`
- **Match**: `35 >= 1` ✅ BUT `34 > 30` ❌ → **Email NOT sent** (too old)

**Real-World Scenario:**
- Email: "Welcome" - 1 day after registration
- User registered: December 15
- Today: December 16
- **Result**: Email sent ✅

---

### 5. **Weeks**

**Configuration:**
- Timing Unit: `weeks`
- Timing Value: `1`, `2`, etc. (number of weeks)

**Calculation:**
```php
$targetDay = $emailTemplate->timing_value * 7;
// Example: timing_value = 2 weeks → targetDay = 14 days
```

**Matching Logic:**
```php
$daysPastTarget = $daysSinceRegistration - $targetDay;

if ($daysSinceRegistration >= $targetDay && $daysPastTarget <= 30) {
    // Send email
}
```

**Example:**
- User registered: **15 days ago**
- Timing: 2 weeks (14 days)
- `daysSinceRegistration = 15`
- `targetDay = 2 * 7 = 14`
- `daysPastTarget = 15 - 14 = 1`
- **Match**: `15 >= 14` ✅ AND `1 <= 30` ✅ → **Email sent**

**Real-World Scenario:**
- Email: "Monthly Check-in" - 4 weeks after registration
- User registered: November 20
- Today: December 18 (28 days later)
- **Result**: Email sent ✅

---

### 6. **Days Before Expiry** ⭐ Trial-Specific

**Configuration:**
- Timing Unit: `days_before_expiry`
- Timing Value: `1`, `3`, `7`, etc. (days before trial ends)

**Calculation:**
```php
$trialEndsAt = Carbon::parse($user['trial_ends_at']);
$today = now()->startOfDay();
$daysUntilExpiry = $today->diffInDays($trialEndsAt, false);
// Positive = days until expiry
// Negative = already expired
```

**Matching Logic:**
```php
if ($emailTemplate->timing_unit === 'days_before_expiry') {
    // Send when: daysUntilExpiry <= timing_value AND daysUntilExpiry >= 0
    return $daysUntilExpiry <= $emailTemplate->timing_value && $daysUntilExpiry >= 0;
}
```

**Examples:**

**Example A: "1 Day Before Expiry"**
- Trial ends: **Tomorrow** (December 19)
- Today: **December 18**
- `daysUntilExpiry = 1`
- `timing_value = 1`
- **Match**: `1 <= 1` ✅ AND `1 >= 0` ✅ → **Email sent**

**Example B: "3 Days Before Expiry"**
- Trial ends: **December 22**
- Today: **December 19**
- `daysUntilExpiry = 3`
- `timing_value = 3`
- **Match**: `3 <= 3` ✅ AND `3 >= 0` ✅ → **Email sent**

**Example C: "1 Day Before Expiry" (Too Early)**
- Trial ends: **December 25**
- Today: **December 18**
- `daysUntilExpiry = 7`
- `timing_value = 1`
- **Match**: `7 <= 1` ❌ → **Email NOT sent** (too early)

**Example D: "1 Day Before Expiry" (Already Expired)**
- Trial ended: **Yesterday** (December 17)
- Today: **December 18**
- `daysUntilExpiry = -1` (negative = expired)
- `timing_value = 1`
- **Match**: `-1 <= 1` ✅ BUT `-1 >= 0` ❌ → **Email NOT sent** (already expired, use "on_expired" instead)

**Real-World Scenario:**
- Email: "Exclusive: 20% Off Your First Year" - 1 day before expiry
- Trial ends: December 19
- Today: December 18
- **Result**: Email sent ✅

---

### 7. **On Expired** ⭐ Trial-Specific

**Configuration:**
- Timing Unit: `on_expired`
- Timing Value: `0` (ignored)

**Calculation:**
```php
$trialEndsAt = Carbon::parse($user['trial_ends_at']);
$today = now()->startOfDay();
$daysUntilExpiry = $today->diffInDays($trialEndsAt, false);
// Negative = expired
// 0 = expires today
// Positive = not yet expired
```

**Matching Logic:**
```php
if ($emailTemplate->timing_unit === 'on_expired') {
    // Send when: daysUntilExpiry <= 0 (expired or expiring today)
    return $daysUntilExpiry <= 0;
}
```

**Examples:**

**Example A: Trial Expired Yesterday**
- Trial ended: **Yesterday** (December 17)
- Today: **December 18**
- `daysUntilExpiry = -1` (negative = expired)
- **Match**: `-1 <= 0` ✅ → **Email sent**

**Example B: Trial Expires Today**
- Trial ends: **Today** (December 18)
- Today: **December 18**
- `daysUntilExpiry = 0` (expires today)
- **Match**: `0 <= 0` ✅ → **Email sent**

**Example C: Trial Not Yet Expired**
- Trial ends: **Tomorrow** (December 19)
- Today: **December 18**
- `daysUntilExpiry = 1` (still active)
- **Match**: `1 <= 0` ❌ → **Email NOT sent** (not expired yet)

**Real-World Scenario:**
- Email: "Your Qwaiting Trial Has Expired"
- Trial ended: December 17
- Today: December 18
- **Result**: Email sent ✅

---

## Complete Flow Example

Let's trace through a complete example:

### User Profile
- **Name**: Jane Smith
- **Email**: jane@example.com
- **Registered**: December 14, 2025 (4 days ago)
- **Trial Ends**: December 28, 2025 (10 days from now)
- **Today**: December 18, 2025

### Email Sequence
1. Welcome - 1 day
2. Feature Highlight - 1 day
3. Social Proof - 2 days
4. Trial Reminder - 3 days
5. Sales Outreach - 4 days
6. Offer - 1 day before expiry
7. On Expired

### Calculation Process

**Step 1: Calculate Metrics**
```php
$daysSinceRegistration = 4; // Registered 4 days ago
$daysUntilExpiry = 10; // Trial ends in 10 days
```

**Step 2: Check Each Email**

**Email 1: Welcome (1 day)**
- `targetDay = 1`
- `daysSinceRegistration = 4`
- `daysPastTarget = 4 - 1 = 3`
- Check: `4 >= 1` ✅ AND `3 <= 30` ✅
- **Result**: ✅ **SEND** (already past due, but within 30-day window)

**Email 2: Feature Highlight (1 day)**
- `targetDay = 1`
- `daysSinceRegistration = 4`
- `daysPastTarget = 4 - 1 = 3`
- Check: `4 >= 1` ✅ AND `3 <= 30` ✅
- **Result**: ✅ **SEND**

**Email 3: Social Proof (2 days)**
- `targetDay = 2`
- `daysSinceRegistration = 4`
- `daysPastTarget = 4 - 2 = 2`
- Check: `4 >= 2` ✅ AND `2 <= 30` ✅
- **Result**: ✅ **SEND**

**Email 4: Trial Reminder (3 days)**
- `targetDay = 3`
- `daysSinceRegistration = 4`
- `daysPastTarget = 4 - 3 = 1`
- Check: `4 >= 3` ✅ AND `1 <= 30` ✅
- **Result**: ✅ **SEND**

**Email 5: Sales Outreach (4 days)**
- `targetDay = 4`
- `daysSinceRegistration = 4`
- `daysPastTarget = 4 - 4 = 0`
- Check: `4 >= 4` ✅ AND `0 <= 30` ✅
- **Result**: ✅ **SEND** (exactly on target day)

**Email 6: Offer (1 day before expiry)**
- `daysUntilExpiry = 10`
- `timing_value = 1`
- Check: `10 <= 1` ❌ AND `10 >= 0` ✅
- **Result**: ❌ **DON'T SEND** (too early, will send when `daysUntilExpiry = 1`)

**Email 7: On Expired**
- `daysUntilExpiry = 10`
- Check: `10 <= 0` ❌
- **Result**: ❌ **DON'T SEND** (trial not expired yet)

**Final Result**: Emails 1-5 are queued for sending. Emails 6-7 will be sent later when conditions are met.

---

## Important Rules

### 1. Duplicate Prevention
```php
// Check if email was already sent successfully
$alreadySent = EmailSend::where('email_template_id', $emailTemplate->id)
    ->where('external_user_id', $userId)
    ->where('status', 'sent')
    ->exists();
```
**Rule**: Each email is only sent once per user. If status is 'sent', it won't be sent again.

### 2. 30-Day Past-Due Limit
```php
if ($daysPastTarget <= 30) {
    // Send email
}
```
**Rule**: Registration-based emails won't be sent if they're more than 30 days past their target date. This prevents sending very old emails.

### 3. Expiry-Based Emails Don't Use Registration Date
**Rule**: Emails with `days_before_expiry` or `on_expired` timing are calculated based on `trial_ends_at`, NOT `created_at`.

### 4. Timezone Considerations
**Rule**: All date calculations use `startOfDay()` to ensure consistent day-based comparisons regardless of time of day.

---

## Database Queries for Verification

### Check Which Emails Should Be Sent to a User

```sql
SELECT 
    u.email,
    u.name,
    DATEDIFF(CURDATE(), u.created_at) as days_since_reg,
    DATEDIFF(d.trial_ends_at, CURDATE()) as days_until_expiry,
    ent.sequence_number,
    ent.subject,
    ent.timing_unit,
    ent.timing_value,
    CASE 
        WHEN ent.timing_unit = 'immediate' THEN 'Send if days_since_reg >= 0'
        WHEN ent.timing_unit = 'days' THEN CONCAT('Send if days_since_reg >= ', ent.timing_value, ' AND (days_since_reg - ', ent.timing_value, ') <= 30')
        WHEN ent.timing_unit = 'weeks' THEN CONCAT('Send if days_since_reg >= ', ent.timing_value * 7, ' AND (days_since_reg - ', ent.timing_value * 7, ') <= 30')
        WHEN ent.timing_unit = 'days_before_expiry' THEN CONCAT('Send if days_until_expiry <= ', ent.timing_value, ' AND days_until_expiry >= 0')
        WHEN ent.timing_unit = 'on_expired' THEN 'Send if days_until_expiry <= 0'
        ELSE 'Unknown timing unit'
    END as matching_rule
FROM users u
JOIN domains d ON d.team_id = u.team_id
CROSS JOIN email_notification_templates ent
WHERE u.email = 'jane@example.com'
  AND ent.sequence_id = 1
  AND ent.status = 'active'
ORDER BY ent.sequence_number;
```

### Check Which Emails Were Actually Sent

```sql
SELECT 
    es.*,
    u.email,
    ent.subject,
    ent.timing_unit,
    ent.timing_value,
    ent.sequence_number
FROM email_sends es
JOIN users u ON u.id = es.external_user_id
JOIN email_notification_templates ent ON ent.id = es.email_template_id
WHERE u.email = 'jane@example.com'
ORDER BY es.created_at;
```

---

## Troubleshooting

### Email Not Being Sent?

1. **Check if user matches criteria:**
   ```php
   // Calculate manually
   $daysSinceRegistration = Carbon::parse($user->created_at)->diffInDays(now());
   $daysUntilExpiry = Carbon::parse($user->trial_ends_at)->diffInDays(now(), false);
   ```

2. **Check if email was already sent:**
   ```sql
   SELECT * FROM email_sends 
   WHERE external_user_id = {user_id} 
   AND email_template_id = {template_id};
   ```

3. **Check if email is too old:**
   ```php
   $daysPastTarget = $daysSinceRegistration - $targetDay;
   // If > 30, email won't be sent
   ```

4. **Check expiry-based logic:**
   ```php
   // For days_before_expiry
   $daysUntilExpiry <= $timing_value && $daysUntilExpiry >= 0
   
   // For on_expired
   $daysUntilExpiry <= 0
   ```

---

## Summary Table

| Timing Unit | Calculation | Matching Condition | Example |
|------------|-------------|-------------------|---------|
| **Immediate** | `targetDay = 0` | `daysSinceReg >= 0` | Day 0 (registration day) |
| **Minutes** | `targetDay = 0` | `daysSinceReg >= 0` | Day 0 (treated as same day) |
| **Hours** | `targetDay = 0` | `daysSinceReg >= 0` | Day 0 (treated as same day) |
| **Days** | `targetDay = value` | `daysSinceReg >= targetDay && (daysSinceReg - targetDay) <= 30` | 1 day = send on day 1+ |
| **Weeks** | `targetDay = value * 7` | `daysSinceReg >= targetDay && (daysSinceReg - targetDay) <= 30` | 2 weeks = send on day 14+ |
| **Days Before Expiry** | `daysUntilExpiry = DATEDIFF(trial_ends_at, today)` | `daysUntilExpiry <= value && daysUntilExpiry >= 0` | 1 day before = send when 1 day left |
| **On Expired** | `daysUntilExpiry = DATEDIFF(trial_ends_at, today)` | `daysUntilExpiry <= 0` | Send when expired or expiring today |

---

This system ensures that emails are sent at the right time based on user registration date and trial expiry date, with proper duplicate prevention and age limits.
