# Production Email Notification Logs - Setup & Testing Checklist

This guide will help you verify that the email notification logging system is working correctly in production.

## 📋 Pre-Deployment Checklist

### 1. Database Migration
```bash
# Run the migration to create the email_notification_logs table
php artisan migrate
```

**Verify:**
- Check that the `email_notification_logs` table exists in your database
- Verify all columns are present (notification_type, recipient_email, subject, status, error_message, etc.)

### 2. Verify Event Listeners are Registered
The event listeners are automatically registered in `AppServiceProvider`. Verify they exist:
- ✅ `LogEmailNotificationFailure` - Listens to `MessageSending` event
- ✅ `LogEmailNotification` - Listens to `MessageSent` event  
- ✅ `LogNotificationSent` - Listens to `NotificationSent` event

**Location:** `app/Providers/AppServiceProvider.php`

### 3. Schedule the Cleanup Command (IMPORTANT)
Add the cleanup command to your scheduler to mark old pending emails as failed.

**Edit `bootstrap/app.php`** and add this to the `withSchedule` method:

```php
->withSchedule(function (\Illuminate\Console\Scheduling\Schedule $schedule): void {
    // Existing schedule...
    $schedule->command('sequences:send-emails')
        ->daily()
        ->at('20:00')
        ->withoutOverlapping()
        ->runInBackground();
    
    // Add this new scheduled command
    $schedule->command('emails:mark-pending-failed')
        ->everyFiveMinutes()
        ->withoutOverlapping();
})
```

**Why:** This ensures emails that fail silently (no MessageSent event) are marked as failed after 30 minutes.

---

## 🧪 Testing in Production

### Test 1: Send a Test Email
1. **Send a test email** through your application (e.g., password reset, welcome email, etc.)
2. **Check the database:**
   ```sql
   SELECT * FROM email_notification_logs ORDER BY created_at DESC LIMIT 5;
   ```
3. **Verify:**
   - ✅ A log entry was created
   - ✅ Status is either 'pending' or 'success'
   - ✅ Recipient email is correct
   - ✅ Subject is captured
   - ✅ Notification type is identified

### Test 2: Check Email Logs Page
1. Navigate to **Clients** → Select a client → Click **Email Logs** icon (FileText icon)
2. **Verify:**
   - ✅ Page loads without errors
   - ✅ Email logs are displayed (if any exist)
   - ✅ Summary cards show correct counts
   - ✅ Pagination works
   - ✅ Filters work (Status, Notification Type, Date Range)

### Test 3: Test Failed Email Logging
1. **Temporarily break email configuration** (e.g., wrong SMTP password)
2. **Send a test email**
3. **Check the logs:**
   ```sql
   SELECT * FROM email_notification_logs WHERE status = 'failed' ORDER BY created_at DESC LIMIT 5;
   ```
4. **Verify:**
   - ✅ Failed email is logged
   - ✅ Error message is captured
   - ✅ Error trace is stored (if available)

### Test 4: Test Cleanup Command
1. **Manually run the cleanup command:**
   ```bash
   php artisan emails:mark-pending-failed
   ```
2. **Verify:**
   - ✅ Command runs without errors
   - ✅ Old pending emails (older than 30 minutes) are marked as failed
   - ✅ Recent pending emails are not affected

### Test 5: Test Scheduled Command
1. **Wait for the scheduled task to run** (if scheduled every 5 minutes)
2. **Or manually trigger the scheduler:**
   ```bash
   php artisan schedule:run
   ```
3. **Check logs:**
   ```sql
   SELECT * FROM email_notification_logs WHERE status = 'failed' AND error_message LIKE '%timed out%';
   ```

---

## 🔍 Monitoring & Verification

### Daily Checks

1. **Check for Failed Emails:**
   ```sql
   SELECT COUNT(*) as failed_count 
   FROM email_notification_logs 
   WHERE status = 'failed' 
   AND DATE(created_at) = CURDATE();
   ```

2. **Check for Pending Emails (should be minimal):**
   ```sql
   SELECT COUNT(*) as pending_count 
   FROM email_notification_logs 
   WHERE status = 'pending' 
   AND created_at < DATE_SUB(NOW(), INTERVAL 1 HOUR);
   ```
   - If you see many old pending emails, the cleanup command may not be running

3. **Check Email Volume:**
   ```sql
   SELECT 
       DATE(created_at) as date,
       COUNT(*) as total,
       SUM(CASE WHEN status = 'success' THEN 1 ELSE 0 END) as successful,
       SUM(CASE WHEN status = 'failed' THEN 1 ELSE 0 END) as failed
   FROM email_notification_logs
   WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
   GROUP BY DATE(created_at)
   ORDER BY date DESC;
   ```

### Common Issues & Solutions

#### Issue 1: No logs are being created
**Possible Causes:**
- Event listeners not registered
- Emails are being sent via a different method (not using Laravel Mail/Notifications)
- Queue worker not processing jobs

**Solution:**
- Check `AppServiceProvider` has event listeners
- Verify emails are sent using `Mail::send()` or `$user->notify()`
- Check queue worker is running

#### Issue 2: All emails show as "pending"
**Possible Causes:**
- `MessageSent` event not firing
- Queue worker not processing jobs
- Email sending is failing silently

**Solution:**
- Check queue worker status
- Verify mail configuration is correct
- Check Laravel logs for errors

#### Issue 3: Cleanup command not running
**Possible Causes:**
- Not scheduled in `bootstrap/app.php`
- Cron job not set up
- Scheduler not running

**Solution:**
- Add command to schedule (see step 3 above)
- Verify cron job is running: `* * * * * php artisan schedule:run`
- Check Laravel logs for scheduler errors

---

## 📊 Performance Considerations

### Database Indexes
The migration already includes indexes for:
- `recipient_email`
- `status`
- `created_at`
- Composite indexes for common queries

### Table Size Management
For high-volume applications, consider:
1. **Archive old logs** (older than 90 days) to a separate table
2. **Delete very old logs** (older than 1 year) periodically
3. **Monitor table size** and optimize if needed

### Example Archive Command:
```php
// Create a command: php artisan emails:archive-old-logs
// Archive logs older than 90 days
```

---

## ✅ Final Verification Checklist

Before considering the system production-ready:

- [ ] Migration has been run
- [ ] Event listeners are registered
- [ ] Cleanup command is scheduled
- [ ] Cron job is running (`schedule:run`)
- [ ] Test email was sent and logged successfully
- [ ] Email Logs page loads and displays data
- [ ] Filters work correctly
- [ ] Pagination works correctly
- [ ] Failed emails are logged with error messages
- [ ] Cleanup command marks old pending emails as failed
- [ ] No errors in Laravel logs related to email logging

---

## 🆘 Support

If you encounter issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Check database for email logs
3. Verify event listeners are registered
4. Test email sending manually
5. Verify queue worker is running (if using queues)

---

**Last Updated:** 2025-01-26
**Version:** 1.0

