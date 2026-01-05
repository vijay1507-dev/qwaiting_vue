<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     */
    public function roles(Request $request): Response
    {
        $roles = Role::with('permissions')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($role) {
                return [
                    'id' => (string) $role->id,
                    'name' => $role->name,
                    'description' => $role->description ?? '',
                    'status' => $role->status ?? 'Active',
                ];
            });

        return Inertia::render('Roles/Index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new role.
     */
    public function create(Request $request): Response
    {
        $permissions = $this->getGroupedPermissions();

        return Inertia::render('Roles/Create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created role.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name',
                'description' => 'nullable|string|max:500',
                'status' => 'required|string|in:Active,Inactive',
                'permissions' => 'nullable|array',
                'permissions.*' => 'string|exists:permissions,name',
            ]);

            $role = Role::create([
                'name' => $validated['name'],
                'guard_name' => 'web',
                'description' => $validated['description'] ?? null,
                'status' => $validated['status'],
            ]);

            if (! empty($validated['permissions'])) {
                $role->syncPermissions($validated['permissions']);
            }

            return redirect()->route('user-management.roles')->with('success', 'Role created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error creating role: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to create role. Please try again.'])->withInput();
        }
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(Request $request, string $id): Response
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = $this->getGroupedPermissions();

        return Inertia::render('Roles/Edit', [
            'role' => [
                'id' => (string) $role->id,
                'name' => $role->name,
                'description' => $role->description ?? '',
                'status' => $role->status ?? 'Active',
                'status' => $role->status ?? 'Active',
                'permissions' => $role->permissions->pluck('name')->toArray(),
            ],
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified role.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name,' . $id,
                'description' => 'nullable|string|max:500',
                'status' => 'required|string|in:Active,Inactive',
                'permissions' => 'nullable|array',
                'permissions.*' => 'string|exists:permissions,name',
            ]);

            $role = Role::findOrFail($id);
            $role->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'status' => $validated['status'],
            ]);

            if (isset($validated['permissions'])) {
                $role->syncPermissions($validated['permissions'] ?? []);
            }

            return redirect()->route('user-management.roles')->with('success', 'Role updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating role: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to update role. Please try again.'])->withInput();
        }
    }

    /**
     * Delete the specified role.
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return redirect()->route('user-management.roles')->with('success', 'Role deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting role: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Failed to delete role. Please try again.']);
        }
    }

    /**
     * Get permissions grouped by module.
     */
    private function getGroupedPermissions(): array
    {
        $permissions = Permission::orderBy('name')->get();

        $grouped = [];
        foreach ($permissions as $permission) {
            $parts = explode('.', $permission->name);
            if (count($parts) === 2) {
                $module = ucwords(str_replace('_', ' ', $parts[0]));
                $action = $parts[1];

                if (! isset($grouped[$module])) {
                    $grouped[$module] = [];
                }

                // Map action names to display format
                $actionMap = [
                    'read' => 'Read',
                    'create' => 'Add',
                    'update' => 'Edit',
                    'delete' => 'Delete',
                ];

                $grouped[$module][] = [
                    'name' => $permission->name,
                    'action' => $actionMap[$action] ?? ucfirst($action),
                ];
            }
        }

        // Sort modules and actions
        ksort($grouped);
        foreach ($grouped as &$actions) {
            usort($actions, function ($a, $b) {
                $order = ['read' => 1, 'create' => 2, 'update' => 3, 'delete' => 4];
                $aOrder = $order[strtolower($a['action'])] ?? 99;
                $bOrder = $order[strtolower($b['action'])] ?? 99;

                return $aOrder <=> $bOrder;
            });
        }

        return $grouped;
    }
}
