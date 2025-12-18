<?php

namespace App\Console\Commands;

use App\Jobs\SendSequenceEmailToUserJob;
use App\Models\EmailNotificationTemplate;
use App\Models\EmailSend;
use App\Models\Sequence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SendSequenceEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sequences:send-emails {--sequence-id= : Specific sequence ID to process}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sequence emails to users based on days after registration';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting sequence email sending process...');

        // Get active sequences
        $sequenceQuery = Sequence::where('status', 'active');

        if ($this->option('sequence-id')) {
            $sequenceQuery->where('id', $this->option('sequence-id'));
        }

        $sequences = $sequenceQuery->with('emailTemplates')->get();

        if ($sequences->isEmpty()) {
            $this->warn('No active sequences found.');

            return Command::SUCCESS;
        }

        $totalSent = 0;

        foreach ($sequences as $sequence) {
            $this->info("Processing sequence: {$sequence->name}");

            // Get users whose plan expires within 14 days (or customize this logic)
            $users = $this->getUsersForSequence($sequence);

            if ($users->isEmpty()) {
                $this->warn("  No users found for sequence: {$sequence->name}");

                continue;
            }

            $this->info("  Found {$users->count()} user(s)");

            // Process each user
            foreach ($users as $user) {
                $daysSinceRegistration = $this->calculateDaysSinceRegistration($user['created_at']);

                // Process each email template in the sequence
                foreach ($sequence->emailTemplates->where('status', 'active') as $emailTemplate) {
                    $shouldSend = $this->shouldSendEmail($emailTemplate, $daysSinceRegistration, $user['id'], $user);

                    if ($shouldSend) {
                        $this->info("    Scheduling email #{$emailTemplate->sequence_number} for user {$user['email']} (Day {$daysSinceRegistration})");

                        // Add delay to prevent rate limiting (stagger emails by 5 seconds each)
                        SendSequenceEmailToUserJob::dispatch(
                            $emailTemplate,
                            $user['id'],
                            $user['email'],
                            $user,
                            $daysSinceRegistration
                        )->delay(now()->addSeconds($totalSent * 5)); // 5 second delay between each email

                        $totalSent++;
                    }
                }
            }
        }

        $this->info("Total emails queued: {$totalSent}");

        return Command::SUCCESS;
    }

    /**
     * Get users for a sequence (customize this based on your criteria).
     */
    private function getUsersForSequence(Sequence $sequence): \Illuminate\Support\Collection
    {
        // Get ALL trial users (those with trial_ends_at not null)
        // This ensures all trial users receive registration-based emails (1 day, 2 days, etc.)
        // and expiry-based emails (days_before_expiry, on_expired) are handled separately
        $trialDomains = DB::connection('mysql_external')
            ->table('domains')
            ->whereNotNull('trial_ends_at')
            ->select('id', 'domain', 'team_id', 'trial_ends_at', DB::raw('DATEDIFF(trial_ends_at, CURDATE()) as days_left'))
            ->get();

        $teamIds = $trialDomains->pluck('team_id')->map(fn ($id) => (int) $id)->unique()->filter()->toArray();

        if (empty($teamIds)) {
            return collect([]);
        }

        $users = DB::connection('mysql_external')
            ->table('users')
            ->whereIn('team_id', $teamIds)
            ->whereNull('deleted_at')
            ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at')
            ->get();

        // Fetch tenant data to get company names
        $tenants = DB::connection('mysql_external')
            ->table('tenants')
            ->whereIn('id', $teamIds)
            ->select('id', 'data')
            ->get()
            ->mapWithKeys(function ($tenant) {
                $data = json_decode($tenant->data, true);
                $companyName = $data['name'] ?? '';

                return [$tenant->id => $companyName];
            });

        // Enrich user data with domain and tenant information
        return $users->map(function ($user) use ($trialDomains, $tenants) {
            $domain = $trialDomains->firstWhere('team_id', (string) $user->team_id);
            $companyName = $tenants->get($user->team_id, '');

            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
                'team_id' => $user->team_id,
                'is_active' => $user->is_active,
                'created_at' => $user->created_at,
                'domain' => $domain->domain ?? '',
                'company_name' => $companyName,
                'plan_expiry' => $domain->trial_ends_at ?? '',
                'days_until_expiry' => $domain->days_left ?? '',
                'trial_ends_at' => $domain->trial_ends_at ?? null,
            ];
        });
    }

    /**
     * Calculate days since user registration.
     * Returns: 0 = registration day, 1 = first day after, 2 = second day after, etc.
     */
    private function calculateDaysSinceRegistration(string $createdAt): int
    {
        $createdDate = \Carbon\Carbon::parse($createdAt)->startOfDay();
        $today = now()->startOfDay();

        // Calculate days difference (always positive)
        // Day 0 = registration day
        // Day 1 = first day after registration
        return $createdDate->diffInDays($today);
    }

    /**
     * Determine if an email should be sent based on timing and if it was already sent.
     */
    private function shouldSendEmail(EmailNotificationTemplate $emailTemplate, int $daysSinceRegistration, int $userId, array $user): bool
    {
        // Check if email was already sent successfully
        // Allow retrying failed emails by only checking for 'sent' status
        $alreadySent = EmailSend::where('email_template_id', $emailTemplate->id)
            ->where('external_user_id', $userId)
            ->where('status', 'sent')
            ->exists();

        if ($alreadySent) {
            return false;
        }

        // Handle expiry-based emails separately
        if ($emailTemplate->timing_unit === 'days_before_expiry' || $emailTemplate->timing_unit === 'on_expired') {
            return $this->shouldSendExpiryBasedEmail($emailTemplate, $user);
        }

        // Calculate target day for registration-based emails
        $targetDay = $this->calculateTargetDay($emailTemplate, $daysSinceRegistration);

        // Send if we've reached or passed the target day
        // If target is day 1 and today is day 1 or later, send it
        // Also check if email is not too far in the past (optional: only send if within 30 days of target)
        $daysPastTarget = $daysSinceRegistration - $targetDay;

        // Only send if we're at or past the target day, and not more than 30 days past (to avoid sending very old emails)
        if ($daysSinceRegistration >= $targetDay && $daysPastTarget <= 30) {
            return true;
        }

        return false;
    }

    /**
     * Calculate the target day for sending an email based on its timing configuration.
     * Returns the day number when email should be sent.
     * Day 0 = registration day
     * Day 1 = first day after registration (if "after 1 day" is set)
     * Day 2 = second day after registration (if "after 2 days" is set)
     */
    private function calculateTargetDay(EmailNotificationTemplate $emailTemplate, int $daysSinceRegistration): int
    {
        // If immediate, send on day 0 (same day as registration)
        if ($emailTemplate->timing_unit === 'immediate' || $emailTemplate->timing_value === 0) {
            return 0;
        }

        // Convert timing to days
        // "After 1 day" means send on day 1 (first day after registration)
        // "After 2 days" means send on day 2 (second day after registration)
        $timingInDays = match ($emailTemplate->timing_unit) {
            'minutes' => 0, // Same day = day 0
            'hours' => 0, // Same day = day 0
            'days' => $emailTemplate->timing_value,
            'weeks' => $emailTemplate->timing_value * 7,
            default => $emailTemplate->timing_value,
        };

        // Return target day
        return $timingInDays;
    }

    /**
     * Determine if an expiry-based email should be sent.
     */
    private function shouldSendExpiryBasedEmail(EmailNotificationTemplate $emailTemplate, array $user): bool
    {
        if (empty($user['trial_ends_at'])) {
            return false;
        }

        $trialEndsAt = \Carbon\Carbon::parse($user['trial_ends_at']);
        $today = now()->startOfDay();
        $daysUntilExpiry = $today->diffInDays($trialEndsAt, false); // Negative if expired

        if ($emailTemplate->timing_unit === 'on_expired') {
            // Send on the day of expiry or after
            return $daysUntilExpiry <= 0;
        }

        if ($emailTemplate->timing_unit === 'days_before_expiry') {
            // Send when we're at or past the target days before expiry
            // e.g., if timing_value is 1, send when daysUntilExpiry <= 1
            return $daysUntilExpiry <= $emailTemplate->timing_value && $daysUntilExpiry >= 0;
        }

        return false;
    }
}
