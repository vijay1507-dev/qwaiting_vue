<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\EmailNotificationLog;
use App\Models\SignupLead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;

class ClientsController extends Controller
{
    /**
     * Display a listing of clients from external database.
     */
    public function index(Request $request): Response
    {
        try {
            // Fetch domains from external database, ordered by created_at descending
            $domains = DB::connection('mysql_external')
                ->table('domains')
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'expired', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();

            $teamIds = $domains->pluck('team_id')->map(fn($id) => (int) $id)->unique()->filter()->toArray();

            if (empty($teamIds)) {
                return Inertia::render('Clients/Index', [
                    'clients' => [],
                ]);
            }

            // Fetch users from external database, ordered by created_at descending
            $usersQuery = DB::connection('mysql_external')
                ->table('users')
                ->whereIn('team_id', $teamIds)
                ->whereNull('deleted_at');

            // Apply Country Access Filter
            $user = auth()->user();
            if ($user && !$user->hasRole('Super Admin')) {
                // Get user's assigned countries (IDs)
                // Cast to array ensuring not null
                $assignedCountryIds = $user->countries ?? [];

                if (!empty($assignedCountryIds)) {
                    // Fetch corresponding phone codes
                    $allowedPhoneCodes = \App\Models\Country::whereIn('id', $assignedCountryIds)
                        ->pluck('phonecode')
                        ->toArray();

                    if (!empty($allowedPhoneCodes)) {
                        $usersQuery->where(function ($query) use ($allowedPhoneCodes) {
                            foreach ($allowedPhoneCodes as $code) {
                                $query->orWhere('phone', 'LIKE', "+{$code}%")
                                    ->orWhere('phone', 'LIKE', "{$code}%");
                            }
                        });
                    } else {
                        // User has countries assigned but no valid phone codes found? 
                        // Or if assignedCountries is empty but we want to restrict?
                        // If logic is "Only show designated countries", and phone codes are missing, show nothing.
                        $usersQuery->whereRaw('1 = 0');
                    }
                } else {
                    // User is not Super Admin and has NO countries assigned.
                    // Assume "No Access".
                    $usersQuery->whereRaw('1 = 0');
                }
            }

            $users = $usersQuery
                ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at', 'address')
                ->orderBy('created_at', 'desc')
                ->get();

            // Fetch tenant data to get company information
            $tenants = DB::connection('mysql_external')
                ->table('tenants')
                ->whereIn('id', $teamIds)
                ->select('id', 'data')
                ->get()
                ->mapWithKeys(function ($tenant) {
                    $data = json_decode($tenant->data, true);

                    return [$tenant->id => $data];
                });

            // Map users to clients with domain and tenant information
            $clients = $users->map(function ($user, $index) use ($domains, $tenants) {
                $domain = $domains->firstWhere('team_id', (string) $user->team_id);
                $tenant = $tenants->get($user->team_id, []);

                // Get address from users table
                $address = $user->address ?? '';

                // Determine plan based on trial_ends_at
                $plan = 'Free'; // Default
                if ($domain && $domain->trial_ends_at) {
                    $trialEndsAt = strtotime($domain->trial_ends_at);
                    $now = time();
                    if ($trialEndsAt > $now) {
                        $plan = 'Trial'; // Trial is still active
                    } else {
                        $plan = 'Paid'; // Trial expired, now paid
                    }
                } elseif ($domain && ! $domain->trial_ends_at) {
                    $plan = 'Paid'; // No trial, must be paid
                }

                return [
                    'id' => (string) $user->id,
                    'srNo' => $index + 1,
                    'domain' => $domain->domain ?? '',
                    'ownerName' => $user->name ?? '',
                    'ownerEmail' => $user->email ?? '',
                    'ownerPhone' => $user->phone ?? '',
                    'ownerAddress' => $address,
                    'created' => $domain->created_at ? date('Y-m-d', strtotime($domain->created_at)) : '',
                    'created_at_timestamp' => $domain->created_at ? strtotime($domain->created_at) : 0,
                    'expires' => $domain->expired ? date('Y-m-d', strtotime($domain->expired)) : '',
                    'status' => $user->is_active ? 'active' : 'inactive',
                    'plan' => $plan,
                ];
            })
                ->sortByDesc('created_at_timestamp')
                ->values()
                ->map(function ($client, $index) {
                    $client['srNo'] = $index + 1;
                    unset($client['created_at_timestamp']);

                    return $client;
                });
            return Inertia::render('Clients/Index', [
                'clients' => $clients,
            ]);
        } catch (\Exception $e) {
            // Log error and return empty array
            Log::error('Error fetching clients from external database: ' . $e->getMessage());

            return Inertia::render('Clients/Index', [
                'clients' => [],
                'error' => 'Failed to load clients. Please check your database connection.',
            ]);
        }
    }

    /**
     * Display the specified client.
     */
    public function show(Request $request, string $id): Response
    {
        try {
            // Fetch user from external database
            $user = DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at', 'address')
                ->first();

            if (! $user) {
                abort(404, 'Client not found');
            }

            // Fetch domain for this user's team
            $domain = DB::connection('mysql_external')
                ->table('domains')
                ->where('team_id', (string) $user->team_id)
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'expired', 'created_at')
                ->first();

            // Determine plan based on trial_ends_at
            $plan = 'Free'; // Default
            if ($domain && $domain->trial_ends_at) {
                $trialEndsAt = strtotime($domain->trial_ends_at);
                $now = time();
                if ($trialEndsAt > $now) {
                    $plan = 'Trial'; // Trial is still active
                } else {
                    $plan = 'Paid'; // Trial expired, now paid
                }
            } elseif ($domain && ! $domain->trial_ends_at) {
                $plan = 'Paid'; // No trial, must be paid
            }

            // Finding Signup Lead to get more details
            // Find signup lead by email first (most reliable)
            // Include soft-deleted records to ensure we find the lead if it exists
            $signupLead = SignupLead::withTrashed()->with('package')->where('email', $user->email)->first();

            // If not found by email, try to find by domain name
            // Domain in external DB might be "test-user-emill.localhost"
            // but in signup_leads it's stored as "test-user-emill"
            if (! $signupLead && $domain && $domain->domain) {
                // Extract subdomain part (before first dot)
                $domainParts = explode('.', $domain->domain);
                $subdomain = $domainParts[0] ?? '';

                if ($subdomain) {
                    $signupLead = SignupLead::withTrashed()->with('package')->where('domain_name', $subdomain)->first();
                }

                // If still not found, try exact match
                if (! $signupLead) {
                    $signupLead = SignupLead::withTrashed()->with('package')->where('domain_name', $domain->domain)->first();
                }
            }

            // Log for debugging
            if ($signupLead) {
                Log::info('Signup lead found for client', [
                    'user_email' => $user->email,
                    'domain' => $domain->domain ?? null,
                    'signup_lead_id' => $signupLead->id,
                    'has_website' => ! empty($signupLead->website),
                    'has_usage_preference' => ! empty($signupLead->usage_preference),
                    'has_industry' => ! empty($signupLead->industry),
                    'has_footfall' => ! empty($signupLead->footfall),
                    'has_current_solution' => ! empty($signupLead->current_solution),
                ]);
            } else {
                Log::info('Signup lead not found for client', [
                    'user_email' => $user->email,
                    'domain' => $domain->domain ?? null,
                    'user_id' => $id,
                ]);
            }

            $client = [
                'id' => (string) $user->id,
                'domain' => $domain->domain ?? '',
                'ownerName' => $user->name ?? '',
                'ownerEmail' => $user->email ?? '',
                'ownerPhone' => $user->phone ?? '',
                'ownerAddress' => $user->address ?? '',
                'created' => $domain->created_at ? date('Y-m-d', strtotime($domain->created_at)) : '',
                'expires' => $domain->trial_ends_at ? date('Y-m-d', strtotime($domain->trial_ends_at)) : ($domain->expired ? date('Y-m-d', strtotime($domain->expired)) : ''),
                'status' => $user->is_active ? 'active' : 'inactive',
                'plan' => $plan,
                'packageName' => ($signupLead && $signupLead->package) ? $signupLead->package->name : $plan,
                'additionalInfo' => $signupLead ? [
                    'website' => $signupLead->website,
                    'role' => $signupLead->role,
                    'usage_preference' => $signupLead->usage_preference,
                    'industry' => $signupLead->industry,
                    'footfall' => $signupLead->footfall,
                    'current_solution' => $signupLead->current_solution,
                ] : [
                    'website' => null,
                    'role' => null,
                    'usage_preference' => null,
                    'industry' => null,
                    'footfall' => null,
                    'current_solution' => null,
                ],
            ]; // Fetch email logs for this client's email with filters
            $perPage = (int) $request->get('per_page', 20);
            $query = EmailNotificationLog::forRecipient($user->email);

            // Apply status filter
            if ($request->has('status') && $request->get('status') !== '') {
                $query->where('status', $request->get('status'));
            }

            // Apply notification type filter
            if ($request->has('notification_type') && $request->get('notification_type') !== '') {
                $query->where('notification_type', $request->get('notification_type'));
            }

            // Apply date range filter (created_at)
            if ($request->has('date_from') && $request->get('date_from') !== '') {
                $query->whereDate('created_at', '>=', $request->get('date_from'));
            }
            if ($request->has('date_to') && $request->get('date_to') !== '') {
                $query->whereDate('created_at', '<=', $request->get('date_to'));
            }

            $emailLogs = $query->orderBy('created_at', 'desc')
                ->paginate($perPage)
                ->appends($request->query());

            // Get total counts for all records (not just current page) - apply same filters
            $totalQuery = EmailNotificationLog::forRecipient($user->email);
            if ($request->has('status') && $request->get('status') !== '') {
                $totalQuery->where('status', $request->get('status'));
            }
            if ($request->has('notification_type') && $request->get('notification_type') !== '') {
                $totalQuery->where('notification_type', $request->get('notification_type'));
            }
            if ($request->has('date_from') && $request->get('date_from') !== '') {
                $totalQuery->whereDate('created_at', '>=', $request->get('date_from'));
            }
            if ($request->has('date_to') && $request->get('date_to') !== '') {
                $totalQuery->whereDate('created_at', '<=', $request->get('date_to'));
            }

            $totalSuccessful = (clone $totalQuery)->successful()->count();
            $totalFailed = (clone $totalQuery)->failed()->count();

            // Get unique notification types for filter dropdown
            $notificationTypes = EmailNotificationLog::forRecipient($user->email)
                ->distinct()
                ->pluck('notification_type')
                ->filter()
                ->sort()
                ->values()
                ->toArray();

            return Inertia::render('Clients/Show', [
                'client' => $client,
                'emailLogs' => $emailLogs,
                'totalSuccessful' => $totalSuccessful,
                'totalFailed' => $totalFailed,
                'notificationTypes' => $notificationTypes,
                'filters' => [
                    'status' => $request->get('status', ''),
                    'notification_type' => $request->get('notification_type', ''),
                    'date_from' => $request->get('date_from', ''),
                    'date_to' => $request->get('date_to', ''),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching client for view: ' . $e->getMessage());
            abort(404, 'Client not found');
        }
    }

    /**
     * Display email notification logs for the specified client.
     */
    public function emailLogs(Request $request, string $id): Response
    {
        try {
            // Fetch user from external database
            $user = DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at', 'address')
                ->first();

            if (! $user) {
                abort(404, 'Client not found');
            }

            // Fetch domain for this user's team
            $domain = DB::connection('mysql_external')
                ->table('domains')
                ->where('team_id', (string) $user->team_id)
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'expired', 'created_at')
                ->first();

            // Determine plan based on trial_ends_at
            $plan = 'Free'; // Default
            if ($domain && $domain->trial_ends_at) {
                $trialEndsAt = strtotime($domain->trial_ends_at);
                $now = time();
                if ($trialEndsAt > $now) {
                    $plan = 'Trial'; // Trial is still active
                } else {
                    $plan = 'Paid'; // Trial expired, now paid
                }
            } elseif ($domain && ! $domain->trial_ends_at) {
                $plan = 'Paid'; // No trial, must be paid
            }

            $client = [
                'id' => (string) $user->id,
                'domain' => $domain->domain ?? '',
                'ownerName' => $user->name ?? '',
                'ownerEmail' => $user->email ?? '',
                'ownerPhone' => $user->phone ?? '',
                'ownerAddress' => $user->address ?? '',
                'created' => $domain->created_at ? date('Y-m-d', strtotime($domain->created_at)) : '',
                'expires' => $domain->trial_ends_at ? date('Y-m-d', strtotime($domain->trial_ends_at)) : ($domain->expired ? date('Y-m-d', strtotime($domain->expired)) : ''),
                'status' => $user->is_active ? 'active' : 'inactive',
                'plan' => $plan,
            ];

            // Fetch email logs for this client's email with filters
            $perPage = (int) $request->get('per_page', 20);
            $query = EmailNotificationLog::forRecipient($user->email);

            // Apply status filter
            if ($request->has('status') && $request->get('status') !== '') {
                $query->where('status', $request->get('status'));
            }

            // Apply notification type filter
            if ($request->has('notification_type') && $request->get('notification_type') !== '') {
                $query->where('notification_type', $request->get('notification_type'));
            }

            // Apply date range filter (created_at)
            if ($request->has('date_from') && $request->get('date_from') !== '') {
                $query->whereDate('created_at', '>=', $request->get('date_from'));
            }
            if ($request->has('date_to') && $request->get('date_to') !== '') {
                $query->whereDate('created_at', '<=', $request->get('date_to'));
            }

            $emailLogs = $query->orderBy('created_at', 'desc')
                ->paginate($perPage)
                ->appends($request->query());

            // Get total counts for all records (not just current page) - apply same filters
            $totalQuery = EmailNotificationLog::forRecipient($user->email);
            if ($request->has('status') && $request->get('status') !== '') {
                $totalQuery->where('status', $request->get('status'));
            }
            if ($request->has('notification_type') && $request->get('notification_type') !== '') {
                $totalQuery->where('notification_type', $request->get('notification_type'));
            }
            if ($request->has('date_from') && $request->get('date_from') !== '') {
                $totalQuery->whereDate('created_at', '>=', $request->get('date_from'));
            }
            if ($request->has('date_to') && $request->get('date_to') !== '') {
                $totalQuery->whereDate('created_at', '<=', $request->get('date_to'));
            }

            $totalSuccessful = (clone $totalQuery)->successful()->count();
            $totalFailed = (clone $totalQuery)->failed()->count();

            // Get unique notification types for filter dropdown
            $notificationTypes = EmailNotificationLog::forRecipient($user->email)
                ->distinct()
                ->pluck('notification_type')
                ->filter()
                ->sort()
                ->values()
                ->toArray();

            return Inertia::render('Clients/EmailLogs', [
                'client' => $client,
                'emailLogs' => $emailLogs,
                'totalSuccessful' => $totalSuccessful,
                'totalFailed' => $totalFailed,
                'notificationTypes' => $notificationTypes,
                'filters' => [
                    'status' => $request->get('status', ''),
                    'notification_type' => $request->get('notification_type', ''),
                    'date_from' => $request->get('date_from', ''),
                    'date_to' => $request->get('date_to', ''),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching email logs for client: ' . $e->getMessage());
            abort(404, 'Client not found');
        }
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(Request $request, string $id): Response
    {
        try {
            // Fetch user from external database
            $user = DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at', 'address')
                ->first();

            if (! $user) {
                abort(404, 'Client not found');
            }

            // Fetch domain for this user's team
            $domain = DB::connection('mysql_external')
                ->table('domains')
                ->where('team_id', (string) $user->team_id)
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'expired', 'created_at')
                ->first();

            // Determine plan based on trial_ends_at
            $plan = 'Free'; // Default
            if ($domain && $domain->trial_ends_at) {
                $trialEndsAt = strtotime($domain->trial_ends_at);
                $now = time();
                if ($trialEndsAt > $now) {
                    $plan = 'Trial'; // Trial is still active
                } else {
                    $plan = 'Paid'; // Trial expired, now paid
                }
            } elseif ($domain && ! $domain->trial_ends_at) {
                $plan = 'Paid'; // No trial, must be paid
            }

            $client = [
                'id' => (string) $user->id,
                'domain' => $domain->domain ?? '',
                'ownerName' => $user->name ?? '',
                'ownerEmail' => $user->email ?? '',
                'ownerPhone' => $user->phone ?? '',
                'ownerAddress' => $user->address ?? '',
                'created' => $domain->created_at ? date('Y-m-d', strtotime($domain->created_at)) : '',
                'expires' => $domain->trial_ends_at ? date('Y-m-d', strtotime($domain->trial_ends_at)) : ($domain->expired ? date('Y-m-d', strtotime($domain->expired)) : ''),
                'status' => $user->is_active ? 'active' : 'inactive',
                'plan' => $plan,
            ];

            return Inertia::render('Clients/Edit', [
                'client' => $client,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching client for edit: ' . $e->getMessage());
            abort(404, 'Client not found');
        }
    }

    /**
     * Update the specified client in the external database.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'ownerName' => 'required|string|max:255',
                'ownerEmail' => 'required|email|max:255',
                'ownerPhone' => 'nullable|string|max:255',
                'ownerAddress' => 'nullable|string|max:500',
                'status' => 'required|in:active,inactive',
            ]);

            // Fetch user to verify it exists
            $user = DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->first();

            if (! $user) {
                return redirect()->back()->withErrors(['error' => 'Client not found']);
            }

            // Update user information
            DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->update([
                    'name' => $validated['ownerName'],
                    'email' => $validated['ownerEmail'],
                    'phone' => $validated['ownerPhone'] ?? null,
                    'address' => $validated['ownerAddress'] ?? null,
                    'is_active' => $validated['status'] === 'active' ? 1 : 0,
                    'updated_at' => now(),
                ]);

            return redirect()->route('clients.index')->with('success', 'Client updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating client: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update client. Please try again.'])->withInput();
        }
    }

    /**
     * Show the form for resetting client password.
     */
    public function resetPasswordForm(Request $request, string $id): Response
    {
        try {
            // Fetch user from external database
            $user = DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->select('id', 'name', 'email', 'phone', 'team_id', 'is_active', 'created_at', 'address')
                ->first();

            if (! $user) {
                abort(404, 'Client not found');
            }

            // Fetch domain for this user's team
            $domain = DB::connection('mysql_external')
                ->table('domains')
                ->where('team_id', (string) $user->team_id)
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'expired', 'created_at')
                ->first();

            // Determine plan based on trial_ends_at
            $plan = 'Free'; // Default
            if ($domain && $domain->trial_ends_at) {
                $trialEndsAt = strtotime($domain->trial_ends_at);
                $now = time();
                if ($trialEndsAt > $now) {
                    $plan = 'Trial'; // Trial is still active
                } else {
                    $plan = 'Paid'; // Trial expired, now paid
                }
            } elseif ($domain && ! $domain->trial_ends_at) {
                $plan = 'Paid'; // No trial, must be paid
            }

            $client = [
                'id' => (string) $user->id,
                'domain' => $domain->domain ?? '',
                'ownerName' => $user->name ?? '',
                'ownerEmail' => $user->email ?? '',
                'ownerPhone' => $user->phone ?? '',
                'ownerAddress' => $user->address ?? '',
                'created' => $domain->created_at ? date('Y-m-d', strtotime($domain->created_at)) : '',
                'expires' => $domain->trial_ends_at ? date('Y-m-d', strtotime($domain->trial_ends_at)) : ($domain->expired ? date('Y-m-d', strtotime($domain->expired)) : ''),
                'status' => $user->is_active ? 'active' : 'inactive',
                'plan' => $plan,
            ];

            return Inertia::render('Clients/ResetPassword', [
                'client' => $client,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching client for password reset: ' . $e->getMessage());
            abort(404, 'Client not found');
        }
    }

    /**
     * Reset the password for the specified client.
     */
    public function resetPassword(Request $request, string $id): RedirectResponse
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            // Fetch user to verify it exists
            $user = DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->first();

            if (! $user) {
                return redirect()->back()->withErrors(['password' => 'Client not found']);
            }

            $hashedPassword = Hash::make($validated['password']);

            // Update password
            DB::connection('mysql_external')
                ->table('users')
                ->where('id', $user->id)
                ->update([
                    'password' => $hashedPassword,
                    'updated_at' => now(),
                ]);

            // Update password in internal DB (signup_leads)
            $signupLead = SignupLead::withTrashed()->where('email', $user->email)->first();
            // Fallback: try to find by domain if email mismatch
            if (! $signupLead) {
                // Fetch domain for this user's team to check domain name
                $domainRecord = DB::connection('mysql_external')
                    ->table('domains')
                    ->where('team_id', (string) $user->team_id)
                    ->first();

                if ($domainRecord && $domainRecord->domain) {
                    // Try exact match first
                    $signupLead = SignupLead::withTrashed()->where('domain_name', $domainRecord->domain)->first();

                    // If not found, try subdomain
                    if (! $signupLead) {
                        $domainParts = explode('.', $domainRecord->domain);
                        $subdomain = $domainParts[0] ?? '';
                        if ($subdomain) {
                            $signupLead = SignupLead::withTrashed()->where('domain_name', $subdomain)->first();
                        }
                    }
                }
            }

            if ($signupLead) {
                $signupLead->update([
                    'password' => $hashedPassword,
                ]);
            }

            return redirect()->route('clients.index')->with('success', 'Password reset successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error resetting client password: ' . $e->getMessage());

            return redirect()->back()->withErrors(['password' => 'Failed to reset password. Please try again.'])->withInput();
        }
    }
}
