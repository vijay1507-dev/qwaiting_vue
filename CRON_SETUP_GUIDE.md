# Cron Job Setup Guide

This guide will help you set up cron jobs on your server to run Laravel's scheduled tasks and queue workers.

## Overview

Your Laravel application has the following scheduled tasks:
- **Sequence Emails**: Runs daily at 9:00 AM (`sequences:send-emails` command)
- **Queue Worker**: Processes background jobs (email sending, etc.)

---

## Required Cron Jobs

### 1. Laravel Scheduler (REQUIRED)

This is the main cron job that runs Laravel's scheduled tasks. It should run **every minute**.

#### For cPanel:

1. Log into your cPanel
2. Navigate to **Cron Jobs** (under Advanced section)
3. Click **Add New Cron Job**
4. Use the following settings:
   - **Minute**: `*`
   - **Hour**: `*`
   - **Day**: `*`
   - **Month**: `*`
   - **Weekday**: `*`
   - **Command**: 
     ```bash
     /usr/bin/php /home/yourusername/public_html/artisan schedule:run >> /dev/null 2>&1
     ```
   - Replace `/home/yourusername/public_html` with your actual path to the Laravel project root

#### For VPS/Dedicated Server (SSH):

1. SSH into your server
2. Edit the crontab:
   ```bash
   crontab -e
   ```
3. Add this line:
   ```bash
   * * * * * cd /path/to/your/project && php artisan schedule:run >> /dev/null 2>&1
   ```
   - Replace `/path/to/your/project` with your actual project path
   - Example: `/var/www/html/qwaiting_vue`

4. Save and exit (in vi/vim: press `Esc`, type `:wq`, press Enter)

#### For Shared Hosting (via SSH):

If you have SSH access:
```bash
crontab -e
```

Add:
```bash
* * * * * cd /home/username/public_html && /usr/bin/php artisan schedule:run >> /dev/null 2>&1
```

---

### 2. Queue Worker (REQUIRED if using queues)

Since your application uses database queues for sending emails, you need a queue worker running continuously.

#### Option A: Supervisor (Recommended for Production)

Supervisor keeps the queue worker running and automatically restarts it if it crashes.

**Install Supervisor (Ubuntu/Debian):**
```bash
sudo apt-get update
sudo apt-get install supervisor
```

**Create Supervisor Configuration:**

1. Create a config file:
   ```bash
   sudo nano /etc/supervisor/conf.d/laravel-worker.conf
   ```

2. Add this configuration:
   ```ini
   [program:laravel-worker]
   process_name=%(program_name)s_%(process_num)02d
   command=php /path/to/your/project/artisan queue:work database --sleep=3 --tries=3 --max-time=3600
   autostart=true
   autorestart=true
   stopasgroup=true
   killasgroup=true
   user=www-data
   numprocs=1
   redirect_stderr=true
   stdout_logfile=/path/to/your/project/storage/logs/worker.log
   stopwaitsecs=3600
   ```

3. Replace `/path/to/your/project` with your actual project path

4. Update Supervisor:
   ```bash
   sudo supervisorctl reread
   sudo supervisorctl update
   sudo supervisorctl start laravel-worker:*
   ```

**Check Status:**
```bash
sudo supervisorctl status
```

#### Option B: Cron Job (Alternative)

If you can't use Supervisor, you can use a cron job, but it's less reliable:

```bash
* * * * * cd /path/to/your/project && php artisan queue:work --stop-when-empty >> /dev/null 2>&1
```

**Note**: This runs the queue worker once per minute. For better performance, use Supervisor.

#### Option C: Systemd Service (Alternative)

Create a systemd service file:

1. Create the service file:
   ```bash
   sudo nano /etc/systemd/system/laravel-worker.service
   ```

2. Add this content:
   ```ini
   [Unit]
   Description=Laravel Queue Worker
   After=network.target

   [Service]
   Type=simple
   User=www-data
   WorkingDirectory=/path/to/your/project
   ExecStart=/usr/bin/php artisan queue:work database --sleep=3 --tries=3 --max-time=3600
   Restart=always

   [Install]
   WantedBy=multi-user.target
   ```

3. Replace `/path/to/your/project` with your actual project path

4. Enable and start the service:
   ```bash
   sudo systemctl daemon-reload
   sudo systemctl enable laravel-worker
   sudo systemctl start laravel-worker
   ```

5. Check status:
   ```bash
   sudo systemctl status laravel-worker
   ```

---

## Finding Your Project Path

To find the absolute path to your Laravel project:

1. **Via SSH:**
   ```bash
   cd /path/to/your/project
   pwd
   ```

2. **Via cPanel File Manager:**
   - Navigate to your project folder
   - The path is usually shown at the top
   - Common paths:
     - `/home/username/public_html`
     - `/home/username/domains/yourdomain.com/public_html`

3. **Via PHP:**
   Create a temporary file `path.php` in your project root:
   ```php
   <?php echo __DIR__; ?>
   ```
   Access it via browser, then delete it.

---

## Verifying Cron Jobs Are Working

### Test the Scheduler:

1. **Manually run the scheduler:**
   ```bash
   php artisan schedule:run
   ```

2. **Check scheduled tasks:**
   ```bash
   php artisan schedule:list
   ```

3. **Test the sequence email command:**
   ```bash
   php artisan sequences:send-emails
   ```

### Test Queue Worker:

1. **Check queue status:**
   ```bash
   php artisan queue:work --once
   ```

2. **View queue jobs:**
   ```bash
   php artisan queue:monitor
   ```

3. **Check logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

---

## Common Issues & Solutions

### Issue: Cron job not running

**Solution:**
1. Check cron service is running:
   ```bash
   sudo service cron status
   ```

2. Check cron logs:
   ```bash
   grep CRON /var/log/syslog
   ```

3. Verify the path in cron is correct
4. Ensure PHP path is correct (use `which php` to find it)

### Issue: Permission errors

**Solution:**
1. Ensure the user running cron has permission to access the project
2. Check file permissions:
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

### Issue: Queue worker stops

**Solution:**
1. Use Supervisor (recommended) instead of cron for queue workers
2. Check logs: `storage/logs/worker.log`
3. Increase memory limit in `php.ini` if needed

### Issue: Emails not sending

**Solution:**
1. Verify queue worker is running
2. Check queue jobs table: `SELECT * FROM jobs;`
3. Check failed jobs: `php artisan queue:failed`
4. Verify mail configuration in `.env`

---

## Complete Setup Checklist

- [ ] Laravel scheduler cron job added (runs every minute)
- [ ] Queue worker configured (Supervisor recommended)
- [ ] Tested scheduler manually
- [ ] Tested queue worker manually
- [ ] Verified scheduled tasks are running
- [ ] Checked logs for errors
- [ ] Verified email sending works
- [ ] Set up log rotation (optional but recommended)

---

## Log Rotation (Optional but Recommended)

To prevent log files from growing too large, set up log rotation:

1. Create logrotate config:
   ```bash
   sudo nano /etc/logrotate.d/laravel
   ```

2. Add:
   ```
   /path/to/your/project/storage/logs/*.log {
       daily
       rotate 14
       compress
       delaycompress
       notifempty
       create 0640 www-data www-data
       sharedscripts
   }
   ```

---

## Security Notes

1. **Never expose artisan commands publicly** - they should only run via cron/SSH
2. **Use strong passwords** for database and mail services
3. **Keep Laravel updated** for security patches
4. **Monitor logs regularly** for suspicious activity
5. **Use environment variables** for sensitive data (never commit `.env`)

---

## Support

If you encounter issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Check queue worker logs: `storage/logs/worker.log`
3. Verify cron is running: `crontab -l`
4. Test commands manually first before adding to cron

---

## Quick Reference

**Laravel Scheduler Cron:**
```bash
* * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
```

**Queue Worker (Supervisor):**
```ini
command=php /path/to/project/artisan queue:work database --sleep=3 --tries=3
```

**Manual Commands:**
```bash
php artisan schedule:run          # Run scheduler
php artisan schedule:list          # List scheduled tasks
php artisan sequences:send-emails # Run sequence emails manually
php artisan queue:work            # Process queue jobs
php artisan queue:monitor         # Monitor queue
```



