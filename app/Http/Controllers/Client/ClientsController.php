<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;

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
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();

            $teamIds = $domains->pluck('team_id')->map(fn ($id) => (int) $id)->unique()->filter()->toArray();

            if (empty($teamIds)) {
                return Inertia::render('Clients/Index', [
                    'clients' => [],
                ]);
            }

            // Fetch users from external database, ordered by created_at descending
            $users = DB::connection('mysql_external')
                ->table('users')
                ->whereIn('team_id', $teamIds)
                ->whereNull('deleted_at')
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
                } elseif ($domain && !$domain->trial_ends_at) {
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
                    'expires' => $domain->trial_ends_at ? date('Y-m-d', strtotime($domain->trial_ends_at)) : '',
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

            if (!$user) {
                abort(404, 'Client not found');
            }

            // Fetch domain for this user's team
            $domain = DB::connection('mysql_external')
                ->table('domains')
                ->where('team_id', (string) $user->team_id)
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'created_at')
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
            } elseif ($domain && !$domain->trial_ends_at) {
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
                'expires' => $domain->trial_ends_at ? date('Y-m-d', strtotime($domain->trial_ends_at)) : '',
                'status' => $user->is_active ? 'active' : 'inactive',
                'plan' => $plan,
            ];

            return Inertia::render('Clients/Show', [
                'client' => $client,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching client for view: ' . $e->getMessage());
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

            if (!$user) {
                abort(404, 'Client not found');
            }

            // Fetch domain for this user's team
            $domain = DB::connection('mysql_external')
                ->table('domains')
                ->where('team_id', (string) $user->team_id)
                ->select('id', 'domain', 'team_id', 'trial_ends_at', 'created_at')
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
            } elseif ($domain && !$domain->trial_ends_at) {
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
                'expires' => $domain->trial_ends_at ? date('Y-m-d', strtotime($domain->trial_ends_at)) : '',
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

            if (!$user) {
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

            if (!$user) {
                return redirect()->back()->withErrors(['password' => 'Client not found']);
            }

            // Update password
            DB::connection('mysql_external')
                ->table('users')
                ->where('id', $id)
                ->update([
                    'password' => Hash::make($validated['password']),
                    'updated_at' => now(),
                ]);

            return redirect()->back()->with('success', 'Password reset successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error resetting client password: ' . $e->getMessage());
            return redirect()->back()->withErrors(['password' => 'Failed to reset password. Please try again.'])->withInput();
        }
    }
}

