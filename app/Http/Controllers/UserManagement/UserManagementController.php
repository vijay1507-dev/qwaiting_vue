<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;

class UserManagementController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function employees(Request $request): Response
    {
        $users = User::orderBy('created_at', 'desc')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => (string) $user->id,
                    'userId' => 'User'.str_pad((string) $user->id, 4, '0', STR_PAD_LEFT),
                    'name' => $user->name,
                    'mobileNumber' => $user->phone ?? '-',
                    'emailAddress' => $user->email,
                    'accountStatus' => $user->status ?? 'Active',
                    'role' => $user->role ?? 'Employee',
                ];
            });

        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create(Request $request): Response
    {
        return Inertia::render('Users/Create');
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => ['required', 'string', Password::min(8)->mixedCase()->letters(), 'confirmed'],
                'phone' => 'nullable|string|max:20',
                'role' => 'required|string|in:Employee,Administrator',
                'status' => 'required|string|in:Active,Inactive',
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'] ?? null,
                'role' => $validated['role'],
                'status' => $validated['status'],
            ]);

            return redirect()->route('user-management.employees')->with('success', 'User created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error creating user: '.$e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to create user. Please try again.'])->withInput();
        }
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(Request $request, string $id): Response
    {
        $user = User::findOrFail($id);

        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => (string) $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '',
                'role' => $user->role ?? 'Employee',
                'status' => $user->status ?? 'Active',
            ],
        ]);
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$id,
                'phone' => 'nullable|string|max:20',
                'role' => 'required|string|in:Employee,Administrator',
                'status' => 'required|string|in:Active,Inactive',
            ]);

            $user = User::findOrFail($id);
            $user->update($validated);

            return redirect()->route('user-management.employees')->with('success', 'User updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating user: '.$e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update user. Please try again.'])->withInput();
        }
    }

    /**
     * Delete the specified user.
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        try {
            $user = User::findOrFail($id);

            // Prevent deleting yourself
            if ($user->id === $request->user()->id) {
                return redirect()->back()->withErrors(['error' => 'You cannot delete your own account.']);
            }

            $user->delete();

            return redirect()->route('user-management.employees')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting user: '.$e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to delete user. Please try again.']);
        }
    }

    /**
     * Reset password for the specified user.
     */
    public function resetPassword(Request $request, string $id): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'password' => ['required', 'string', Password::min(8)->mixedCase()->letters(), 'confirmed'],
            ]);

            $user = User::findOrFail($id);
            $user->password = Hash::make($validated['password']);
            $user->save();

            return redirect()->route('user-management.employees')->with('success', 'Password reset successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error resetting password: '.$e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to reset password. Please try again.'])->withInput();
        }
    }

    /**
     * Lock/Unlock the specified user.
     */
    public function toggleLock(Request $request, string $id): RedirectResponse
    {
        try {
            $user = User::findOrFail($id);

            // Prevent locking yourself
            if ($user->id === $request->user()->id) {
                return redirect()->back()->withErrors(['error' => 'You cannot lock your own account.']);
            }

            // Toggle lock status - using status field
            if ($user->status === 'Inactive') {
                $user->status = 'Active';
                $message = 'User unlocked successfully';
            } else {
                $user->status = 'Inactive';
                $message = 'User locked successfully';
            }
            $user->save();

            return redirect()->route('user-management.employees')->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Error toggling lock: '.$e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to toggle lock status. Please try again.']);
        }
    }
}
