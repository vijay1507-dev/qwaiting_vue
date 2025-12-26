<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MarkOldPendingEmailsAsFailed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:mark-pending-failed {--minutes=30 : Number of minutes old to consider as failed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark old pending email notification logs as failed';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $minutesOld = (int) $this->option('minutes') ?: 30;

        $this->info("Marking pending email logs older than {$minutesOld} minutes as failed...");

        $updated = \App\Services\EmailNotificationService::markOldPendingAsFailed($minutesOld);

        if ($updated > 0) {
            $this->info("Successfully marked {$updated} pending email(s) as failed.");
        } else {
            $this->info('No pending emails found to mark as failed.');
        }

        return self::SUCCESS;
    }
}
