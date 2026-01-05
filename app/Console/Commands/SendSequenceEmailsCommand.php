<?php

namespace App\Console\Commands;

use App\Jobs\SendSequenceEmailToUserJob;
use App\Models\EmailNotificationTemplate;
use App\Models\EmailSend;
use App\Models\Sequence;
use App\Models\SignupLead;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SendSequenceEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sequences:send-emails {--sequence-id= : Specific sequence ID to process} {--preview : Preview which users will receive emails without sending}';

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
        $isPreview = $this->option('preview');

        if ($isPreview) {
            $this->info('=== PREVIEW MODE: No emails will be sent ===');
            $this->newLine();
        } else {
            $this->info('Starting sequence email sending process...');
        }

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
            $this->info("  Target User Type: {$sequence->target_user_type}");
            $this->newLine();

            // Get users whose plan expires within 14 days (or customize this logic)
            $users = $this->getUsersForSequence($sequence);

            if ($users->isEmpty()) {
                $this->warn("  No users found for sequence: {$sequence->name}");
                $this->newLine();

                continue;
            }

            $this->info("  Found {$users->count()} user(s) matching criteria");
            $this->newLine();

            // Process each user
            foreach ($users as $user) {
                $daysSinceRegistration = $this->calculateDaysSinceRegistration($user['created_at']);

                if ($isPreview) {
                    $this->line("  ┌─ User: {$user['name']} ({$user['email']})");
                    $this->line("  │  ID: {$user['id']}");
                    if (isset($user['source'])) {
                        $sourceLabel = $user['source'] === 'signup_leads' ? 'Signup Leads Table' : 'External Database';
                        $this->line("  │  Source: {$sourceLabel}");
                    }
                    if (isset($user['company_name']) && $user['company_name']) {
                        $this->line("  │  Company: {$user['company_name']}");
                    }
                    if (isset($user['domain']) && $user['domain']) {
                        $this->line("  │  Domain: {$user['domain']}");
                    }
                    $this->line("  │  Registered: {$user['created_at']} ({$daysSinceRegistration} days ago)");
                    if (isset($user['signup_step'])) {
                        $this->line("  │  Signup Step: {$user['signup_step']}/6");
                    }
                    if (isset($user['email_verified_at'])) {
                        $verifiedStatus = is_null($user['email_verified_at']) ? 'Not Verified' : 'Verified';
                        $this->line("  │  Email Status: {$verifiedStatus}");
                    }
                    $this->line('  │');
                }

                $userEmailCount = 0;

                // Process each email template in the sequence
                foreach ($sequence->emailTemplates->where('status', 'active') as $emailTemplate) {
                    // Skip most event-based emails in scheduled runs (they're handled by events)
                    // But handle "if_not_verified" and "incomplete_registration" in scheduled runs
                    if (in_array($emailTemplate->timing_unit, ['on_signup', 'on_verification', 'after_verification'])) {
                        continue;
                    }

                    // Handle "incomplete_registration" emails for verified users who haven't completed signup
                    if ($emailTemplate->timing_unit === 'incomplete_registration') {
                        // Only process for incomplete_signups target type
                        if ($sequence->target_user_type === 'incomplete_signups') {
                            // Check if user is verified but hasn't completed all steps
                            $isIncomplete = false;

                            if (isset($user['source']) && $user['source'] === 'signup_leads') {
                                // For SignupLead, check if verified and signup_step < 6
                                $signupLead = SignupLead::find($user['id']);
                                if ($signupLead && $signupLead->hasVerifiedEmail() && $signupLead->signup_step < 6) {
                                    $isIncomplete = true;
                                }
                            } elseif (isset($user['email_verified_at']) && ! is_null($user['email_verified_at'])) {
                                // For external users, if verified but signup_step is not 6, they're incomplete
                                // Note: External users typically don't have signup_step, so we check if they're in incomplete_signups
                                // This means they're verified but haven't completed full registration
                                $isIncomplete = true;
                            }

                            if ($isIncomplete) {
                                // User is verified but incomplete, send the email
                                $userEmailCount++;
                                if ($isPreview) {
                                    $signupStep = $user['signup_step'] ?? 0;
                                    $nextStep = min($signupStep + 1, 6);
                                    $this->line("  │  ✓ Email #{$emailTemplate->sequence_number}: \"{$emailTemplate->subject}\"");
                                    $this->line("  │    Type: {$emailTemplate->type} | Incomplete Registration (Event) - Step {$signupStep}/6, Next: {$nextStep}");
                                    if (isset($user['source'])) {
                                        $this->line("  │    Source: {$user['source']}");
                                    }
                                } else {
                                    $this->info("    Scheduling email #{$emailTemplate->sequence_number} for user {$user['email']} (Incomplete Registration)");
                                    SendSequenceEmailToUserJob::dispatch(
                                        $emailTemplate,
                                        $user['id'],
                                        $user['email'],
                                        $user,
                                        $daysSinceRegistration
                                    )->delay(now()->addSeconds($totalSent * 5));
                                }
                                $totalSent++;
                            } elseif ($isPreview) {
                                $this->line("  │  ✗ Email #{$emailTemplate->sequence_number}: \"{$emailTemplate->subject}\"");
                                $this->line("  │    Type: {$emailTemplate->type} | Incomplete Registration (Event) - User completed registration or not verified");
                            }
                        }

                        continue;
                    }

                    if ($emailTemplate->timing_unit === 'if_not_verified') {
                        // Only process for incomplete_signups target type
                        if ($sequence->target_user_type === 'incomplete_signups') {
                            // Check if user is not verified
                            $isUnverified = false;

                            // Check email_verified_at from user array (set in getIncompleteSignups)
                            if (isset($user['email_verified_at']) && is_null($user['email_verified_at'])) {
                                $isUnverified = true;
                            } elseif (isset($user['source']) && $user['source'] === 'signup_leads') {
                                // For SignupLead, check if email_verified_at is null
                                $signupLead = SignupLead::find($user['id']);
                                if ($signupLead && ! $signupLead->hasVerifiedEmail()) {
                                    $isUnverified = true;
                                }
                            } elseif (isset($user['source']) && $user['source'] === 'external_db') {
                                // For external users, they're already filtered to be unverified
                                $isUnverified = true;
                            }

                            if ($isUnverified) {
                                // User is not verified, send the email
                                $userEmailCount++;
                                if ($isPreview) {
                                    $this->line("  │  ✓ Email #{$emailTemplate->sequence_number}: \"{$emailTemplate->subject}\"");
                                    $this->line("  │    Type: {$emailTemplate->type} | If Not Verified (Event)");
                                    if (isset($user['source'])) {
                                        $this->line("  │    Source: {$user['source']}");
                                    }
                                } else {
                                    $this->info("    Scheduling email #{$emailTemplate->sequence_number} for user {$user['email']} (If Not Verified)");
                                    SendSequenceEmailToUserJob::dispatch(
                                        $emailTemplate,
                                        $user['id'],
                                        $user['email'],
                                        $user,
                                        $daysSinceRegistration
                                    )->delay(now()->addSeconds($totalSent * 5));
                                }
                                $totalSent++;
                            } elseif ($isPreview) {
                                $this->line("  │  ✗ Email #{$emailTemplate->sequence_number}: \"{$emailTemplate->subject}\"");
                                $this->line("  │    Type: {$emailTemplate->type} | If Not Verified (Event) - User already verified");
                            }
                        }

                        continue;
                    }

                    // Start Fix: Skip "Registration Complete" emails for incomplete signups
                    if ($sequence->target_user_type === 'incomplete_signups' && $emailTemplate->type === 'registeration_complete') {
                        if ($isPreview) {
                            $this->line("  │  ✗ Email #{$emailTemplate->sequence_number}: \"{$emailTemplate->subject}\"");
                            $this->line("  │    Type: {$emailTemplate->type} | Skipped: Registration Complete email should not go to incomplete signups");
                        }
                        continue;
                    }
                    // End Fix

                    $shouldSend = $this->shouldSendEmail($emailTemplate, $daysSinceRegistration, $user['id'], $user);

                    if ($shouldSend) {
                        $userEmailCount++;

                        if ($isPreview) {
                            $timingInfo = $this->getTimingInfo($emailTemplate, $daysSinceRegistration);
                            $this->line("  │  ✓ Email #{$emailTemplate->sequence_number}: \"{$emailTemplate->subject}\"");
                            $this->line("  │    Type: {$emailTemplate->type} | {$timingInfo}");
                        } else {
                            $this->info("    Scheduling email #{$emailTemplate->sequence_number} for user {$user['email']} (Day {$daysSinceRegistration})");

                            // Mark as queued immediately to prevent race conditions (double sending)
                            EmailSend::create([
                                'sequence_id' => $sequence->id,
                                'email_template_id' => $emailTemplate->id,
                                'external_user_id' => $user['id'],
                                'user_email' => $user['email'],
                                'days_after_registration' => $daysSinceRegistration,
                                'status' => 'queued',
                                'scheduled_at' => now()->addSeconds($totalSent * 5),
                            ]);

                            // Add delay to prevent rate limiting (stagger emails by 5 seconds each)
                            SendSequenceEmailToUserJob::dispatch(
                                $emailTemplate,
                                $user['id'],
                                $user['email'],
                                $user,
                                $daysSinceRegistration
                            )->delay(now()->addSeconds($totalSent * 5)); // 5 second delay between each email
                        }

                        $totalSent++;
                    } elseif ($isPreview) {
                        $timingInfo = $this->getTimingInfo($emailTemplate, $daysSinceRegistration, false);
                        $this->line("  │  ✗ Email #{$emailTemplate->sequence_number}: \"{$emailTemplate->subject}\"");
                        $this->line("  │    Type: {$emailTemplate->type} | {$timingInfo}");
                    }
                }

                if ($isPreview) {
                    if ($userEmailCount > 0) {
                        $this->line("  │  → Total emails for this user: {$userEmailCount}");
                    } else {
                        $this->line('  │  → No emails will be sent to this user');
                    }
                    $this->line('  └─');
                    $this->newLine();
                }
            }
        }

        if ($isPreview) {
            $this->info('=== PREVIEW SUMMARY ===');
            $this->info("Total emails that would be queued: {$totalSent}");
        } else {
            $this->info("Total emails queued: {$totalSent}");
        }

        return Command::SUCCESS;
    }

    /**
     * Get users for a sequence based on target_user_type.
     */
    private function getUsersForSequence(Sequence $sequence): \Illuminate\Support\Collection
    {
        $targetUserType = $sequence->target_user_type ?? 'trial_users'; // Default to trial_users for backward compatibility

        return match ($targetUserType) {
            'trial_users' => $this->getTrialUsers(),
            'all_users' => $this->getAllUsers(),
            'paid_users' => $this->getPaidUsers(),
            'signup_users' => $this->getSignupUsers($sequence->signup_users_days_window ?? 7),
            'incomplete_signups' => $this->getIncompleteSignups(),
            default => $this->getTrialUsers(), // Fallback to current behavior
        };
    }

    /**
     * Get trial users (those with trial_ends_at not null).
     */
    private function getTrialUsers(): \Illuminate\Support\Collection
    {
        $trialDomains = DB::connection('mysql_external')
            ->table('domains')
            ->whereNotNull('trial_ends_at')
            ->select('id', 'domain', 'team_id', 'trial_ends_at', DB::raw('DATEDIFF(trial_ends_at, CURDATE()) as days_left'))
            ->get();

        $teamIds = $trialDomains->pluck('team_id')->map(fn($id) => (int) $id)->unique()->filter()->toArray();

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
     * Get all active users regardless of trial status.
     */
    private function getAllUsers(): \Illuminate\Support\Collection
    {
        // 1. Get all users directly from external DB
        $users = DB::connection('mysql_external')
            ->table('users')
            ->whereNull('deleted_at')
            ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at')
            ->get();

        if ($users->isEmpty()) {
            return collect([]);
        }

        // 2. Get unique team IDs to fetch related data
        $teamIds = $users->pluck('team_id')->filter()->unique()->toArray();

        $domains = collect();
        $tenants = collect();

        if (! empty($teamIds)) {
            $domains = DB::connection('mysql_external')
                ->table('domains')
                ->whereIn('team_id', $teamIds)
                ->select('id', 'domain', 'team_id', 'trial_ends_at', DB::raw('CASE WHEN trial_ends_at IS NOT NULL THEN DATEDIFF(trial_ends_at, CURDATE()) ELSE NULL END as days_left'))
                ->get();

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
        }

        // 3. Enrich user data
        return $users->map(function ($user) use ($domains, $tenants) {
            $domain = $domains->firstWhere('team_id', (string) $user->team_id);
            $companyName = $tenants->get($user->team_id, '');

            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
                'team_id' => $user->team_id,
                'is_active' => $user->is_active,
                'created_at' => $user->created_at,
                'domain' => $domain->domain ?? '', // Fallback to empty if not found
                'company_name' => $companyName,
                'plan_expiry' => $domain->trial_ends_at ?? '',
                'days_until_expiry' => $domain->days_left ?? '',
                'trial_ends_at' => $domain->trial_ends_at ?? null,
            ];
        });
    }

    /**
     * Get paid users (users without active trials: trial_ends_at is NULL or expired).
     */
    private function getPaidUsers(): \Illuminate\Support\Collection
    {
        $domains = DB::connection('mysql_external')
            ->table('domains')
            ->where(function ($query) {
                $query->whereNull('trial_ends_at')
                    ->orWhere('trial_ends_at', '<', now());
            })
            ->select('id', 'domain', 'team_id', 'trial_ends_at', DB::raw('CASE WHEN trial_ends_at IS NOT NULL THEN DATEDIFF(trial_ends_at, CURDATE()) ELSE NULL END as days_left'))
            ->get();

        $teamIds = $domains->pluck('team_id')->map(fn($id) => (int) $id)->unique()->filter()->toArray();

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
        return $users->map(function ($user) use ($domains, $tenants) {
            $domain = $domains->firstWhere('team_id', (string) $user->team_id);
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
     * Get recently registered users (within specified days window).
     */
    private function getSignupUsers(int $daysWindow): \Illuminate\Support\Collection
    {
        $domains = DB::connection('mysql_external')
            ->table('domains')
            ->select('id', 'domain', 'team_id', 'trial_ends_at', DB::raw('CASE WHEN trial_ends_at IS NOT NULL THEN DATEDIFF(trial_ends_at, CURDATE()) ELSE NULL END as days_left'))
            ->get();

        $teamIds = $domains->pluck('team_id')->map(fn($id) => (int) $id)->unique()->filter()->toArray();

        if (empty($teamIds)) {
            return collect([]);
        }

        $users = DB::connection('mysql_external')
            ->table('users')
            ->whereIn('team_id', $teamIds)
            ->whereNull('deleted_at')
            ->where('created_at', '>=', now()->subDays($daysWindow))
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
        return $users->map(function ($user) use ($domains, $tenants) {
            $domain = $domains->firstWhere('team_id', (string) $user->team_id);
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
     * Get incomplete signups (signup leads who haven't completed signup).
     * Checks both signup_leads table and external database for incomplete/unverified users.
     */
    private function getIncompleteSignups(): \Illuminate\Support\Collection
    {
        $users = collect();

        // 1. Get incomplete signups from signup_leads table (signup_step < 6)
        $signupLeads = SignupLead::where('signup_step', '<', 6)
            ->get();

        // Map signup leads to match expected user array structure
        $signupLeadUsers = $signupLeads->map(function ($lead) {
            return [
                'id' => $lead->id,
                'name' => $lead->name ?? '',
                'email' => $lead->email ?? '',
                'phone' => $lead->phone_number ?? '',
                'password' => $lead->temp_password ?? '', // Get plain password from temp_password field
                'team_id' => null, // Doesn't exist for incomplete signups
                'is_active' => 1, // Assume active
                'created_at' => $lead->created_at,
                'domain' => $lead->domain_name ?? '',
                'company_name' => $lead->company_name ?? '',
                'plan_expiry' => null,
                'days_until_expiry' => null,
                'trial_ends_at' => null,
                'signup_step' => $lead->signup_step ?? 0,
                'email_verified_at' => $lead->email_verified_at,
                'source' => 'signup_leads', // Track source
            ];
        });

        $users = $users->merge($signupLeadUsers);

        // 2. Get unverified users from external database (email_verified_at is NULL)
        try {
            $externalUsers = DB::connection('mysql_external')
                ->table('users')
                ->whereNull('email_verified_at')
                ->whereNull('deleted_at')
                ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at')
                ->get();

            // Get tenant/domain information for external users
            $teamIds = $externalUsers->pluck('team_id')->filter()->unique()->toArray();
            $tenants = collect();
            $domains = collect();

            if (! empty($teamIds)) {
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

                $domains = DB::connection('mysql_external')
                    ->table('domains')
                    ->whereIn('team_id', $teamIds)
                    ->select('team_id', 'domain')
                    ->get()
                    ->mapWithKeys(function ($domain) {
                        return [$domain->team_id => $domain->domain];
                    });
            }

            // Map external users to match expected user array structure
            $externalUserMapped = $externalUsers->map(function ($user) use ($tenants, $domains) {
                $companyName = $tenants->get($user->team_id, '');
                $domain = $domains->get($user->team_id, '');

                return [
                    'id' => $user->id,
                    'name' => $user->name ?? '',
                    'email' => $user->email ?? '',
                    'phone' => $user->phone ?? '',
                    'team_id' => $user->team_id,
                    'is_active' => $user->is_active ?? 1,
                    'created_at' => $user->created_at,
                    'domain' => $domain,
                    'company_name' => $companyName,
                    'plan_expiry' => null,
                    'days_until_expiry' => null,
                    'trial_ends_at' => null,
                    'signup_step' => null, // External users don't have signup_step
                    'email_verified_at' => null, // They're unverified (that's why we selected them)
                    'source' => 'external_db', // Track source
                ];
            });

            // Merge external users, avoiding duplicates by email
            $existingEmails = $users->pluck('email')->filter()->toArray();
            $externalUserMapped = $externalUserMapped->reject(function ($user) use ($existingEmails) {
                return in_array($user['email'], $existingEmails);
            });

            $users = $users->merge($externalUserMapped);
        } catch (\Exception $e) {
            // Log error but continue with signup_leads only
            Log::warning('Failed to fetch incomplete signups from external database', [
                'error' => $e->getMessage(),
            ]);
        }

        return $users;
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
        // Check if email was already sent successfully or is currently queued
        // We check for 'sent', 'success', and 'queued' to be safe
        $alreadySentOrQueued = EmailSend::where('email_template_id', $emailTemplate->id)
            ->where('external_user_id', $userId)
            ->whereIn('status', ['sent', 'success', 'queued'])
            ->exists();

        if ($alreadySentOrQueued) {
            return false;
        }

        // Handle expiry-based emails separately
        // Skip expiry-based emails for user types that don't have trial_ends_at
        if ($emailTemplate->timing_unit === 'days_before_expiry' || $emailTemplate->timing_unit === 'on_expired') {
            // Only process expiry-based emails if user has trial_ends_at
            if (empty($user['trial_ends_at'])) {
                return false;
            }

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

    /**
     * Get human-readable timing information for preview mode.
     */
    private function getTimingInfo(EmailNotificationTemplate $emailTemplate, int $daysSinceRegistration, bool $willSend = true): string
    {
        if ($emailTemplate->timing_unit === 'days_before_expiry' || $emailTemplate->timing_unit === 'on_expired') {
            if ($willSend) {
                return "Expiry-based: {$emailTemplate->timing_value} {$emailTemplate->timing_unit}";
            }

            return 'Expiry-based: Not applicable (user has no trial expiry)';
        }

        $targetDay = $this->calculateTargetDay($emailTemplate, $daysSinceRegistration);
        $daysPastTarget = $daysSinceRegistration - $targetDay;

        if ($willSend) {
            if ($daysPastTarget === 0) {
                return "Scheduled for day {$targetDay} (today)";
            }

            return "Scheduled for day {$targetDay} ({$daysPastTarget} days past target)";
        }

        if ($daysSinceRegistration < $targetDay) {
            return "Will send on day {$targetDay} (in " . ($targetDay - $daysSinceRegistration) . ' days)';
        }

        if ($daysPastTarget > 30) {
            return "Target day {$targetDay} passed ({$daysPastTarget} days ago - too old, skipped)";
        }

        return 'Already sent or conditions not met';
    }
}
