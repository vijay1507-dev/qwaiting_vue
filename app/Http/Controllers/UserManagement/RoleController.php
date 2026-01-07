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
        $actionMap = [
            'read' => 'View',
            'create' => 'Add',
            'update' => 'Edit',
            'delete' => 'Delete',
            'reset_password' => 'Reset Password',
        ];

        foreach ($permissions as $permission) {
            $parts = explode('.', $permission->name);
            $count = count($parts);

            if ($count === 2 || $count === 3) {
                $module = ucwords(str_replace('_', ' ', $parts[0]));

                if ($count === 3) {
                    $submodule = ucwords(str_replace('_', ' ', $parts[1]));
                    $action = $parts[2];

                    if (! isset($grouped[$module])) {
                        $grouped[$module] = [];
                    }
                    if (! isset($grouped[$module][$submodule])) {
                        $grouped[$module][$submodule] = [];
                    }

                    $displayAction = $actionMap[$action] ?? ucfirst($action);
                    // Specific overrides if needed
                    if ($submodule === 'Sequences' && $action === 'read') {
                        $displayAction = 'View Sequences';
                    }
                    if ($submodule === 'System Templates' && $action === 'read') {
                        $displayAction = 'View System Templates';
                    }

                    $grouped[$module][$submodule][] = [
                        'name' => $permission->name,
                        'action' => $displayAction,
                    ];
                } else {
                    $action = $parts[1];

                    if (! isset($grouped[$module])) {
                        $grouped[$module] = [];
                    }

                    $displayAction = $actionMap[$action] ?? ucfirst($action);

                    // Specific override for Clients Read (legacy)
                    if ($module === 'Clients' && $action === 'read') {
                        $displayAction = 'View Clients';
                    }

                    $grouped[$module][] = [
                        'name' => $permission->name,
                        'action' => $displayAction,
                    ];
                }
            }
        }

        // Fix for mixed content (both flat permissions and submodules in same module)
        foreach ($grouped as $module => &$content) {
            $hasStringKeys = false;
            $hasIntKeys = false;
            foreach (array_keys($content) as $k) {
                if (is_string($k)) $hasStringKeys = true;
                else $hasIntKeys = true;
            }

            if ($hasStringKeys && $hasIntKeys) {
                // Move flat permissions (int keys) to 'General' submodule
                if (! isset($content['General'])) {
                    $content['General'] = [];
                }
                foreach ($content as $k => $v) {
                    if (is_int($k)) {
                        $content['General'][] = $v;
                        unset($content[$k]);
                    }
                }
            }
        }
        unset($content); // Break reference

        // Sort modules and actions
        ksort($grouped);

        // Helper to sort actions
        $sortActions = function ($a, $b) {
            $getOrder = function ($str) {
                if (stripos($str, 'View') !== false || stripos($str, 'Read') !== false) return 1;
                if (stripos($str, 'Add') !== false || stripos($str, 'Create') !== false) return 2;
                if (stripos($str, 'Edit') !== false || stripos($str, 'Update') !== false) return 3;
                if (stripos($str, 'Delete') !== false) return 4;
                return 99;
            };

            return $getOrder($a['action']) <=> $getOrder($b['action']);
        };

        foreach ($grouped as $module => &$content) {
            // Check if it's an associative array (Nested Submodules)
            // Associative arrays will have string keys (Submodule names) or gaps in keys if we unset some but didn't reindex? 
            // Actually after our fix, if it was mixed, it's now purely string keys (submodules).
            // If it was flat, it's purely int keys.

            $isAssociative = false;
            foreach (array_keys($content) as $k) {
                if (is_string($k)) {
                    $isAssociative = true;
                    break;
                }
            }

            if ($isAssociative) {
                // Nested Submodules
                ksort($content); // Sort submodules alphabetically
                foreach ($content as &$subActions) {
                    usort($subActions, $sortActions);
                }
            } else {
                // Flat Actions
                usort($content, $sortActions);
            }
        }

        return $grouped;
    }
}
