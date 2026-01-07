<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import {
    roles as userManagementRoles,
    users as userManagementUsers,
} from '@/routes/user-management';
import { update as userManagementRolesUpdate } from '@/routes/user-management/roles';

import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Permission {
    name: string;
    action: string;
}

interface Role {
    id: string;
    name: string;
    description: string;
    status: string;
    permissions: string[];
}

interface Props {
    role: Role;
    permissions: Record<string, Permission[] | Record<string, Permission[]>>;
}

const props = defineProps<Props>();

const { success, error: showError } = useToast();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'User Management',
        href: userManagementUsers().url,
    },
    {
        title: 'Role',
        href: userManagementRoles().url,
    },
    {
        title: 'Edit Role',
        href: '#',
    },
];

const form = useForm({
    name: props.role.name,
    description: props.role.description || '',
    status: props.role.status,
    permissions: [...props.role.permissions],
});

const togglePermission = (permissionName: string, checked: boolean) => {
    if (checked) {
        // Add permission if not already present
        if (!form.permissions.includes(permissionName)) {
            form.permissions.push(permissionName);
        }
    } else {
        // Remove permission
        const index = form.permissions.indexOf(permissionName);
        if (index > -1) {
            form.permissions.splice(index, 1);
        }
    }
    // The main checkbox state will automatically update via computed properties
};

const getModulePermissions = (module: string): Permission[] => {
    const content = props.permissions[module];
    if (Array.isArray(content)) {
        return content;
    }
    return Object.values(content).flat();
};

const toggleAllPermissions = (module: string, checked: boolean | undefined) => {
    const modulePermissions = getModulePermissions(module);

    // If checked is undefined (indeterminate state clicked), check all
    if (checked === undefined || checked === true) {
        // Select all permissions for this module
        modulePermissions.forEach((p) => {
            if (!form.permissions.includes(p.name)) {
                form.permissions.push(p.name);
            }
        });
    } else {
        // Deselect all permissions for this module
        modulePermissions.forEach((p) => {
            const index = form.permissions.indexOf(p.name);
            if (index > -1) {
                form.permissions.splice(index, 1);
            }
        });
    }
};

const isModuleAllSelected = (module: string) => {
    const modulePermissions = getModulePermissions(module);
    if (modulePermissions.length === 0) return false;
    return modulePermissions.every((p) => form.permissions.includes(p.name));
};

const isModulePartiallySelected = (module: string) => {
    const modulePermissions = getModulePermissions(module);
    const selectedCount = modulePermissions.filter((p) =>
        form.permissions.includes(p.name),
    ).length;
    return selectedCount > 0 && selectedCount < modulePermissions.length;
};

const submit = () => {
    form.put(userManagementRolesUpdate({ id: props.role.id }).url, {
        preserveScroll: true,
        onSuccess: () => {
            success('Role updated successfully');
        },
        onError: () => {
            showError(
                'Failed to update role. Please check the form for errors.',
            );
        },
    });
};

const permissionModules = computed(() => {
    return Object.keys(props.permissions).sort();
});

const allPermissions = computed(() => {
    const all: string[] = [];
    Object.values(props.permissions).forEach((content) => {
        if (Array.isArray(content)) {
            content.forEach((p) => all.push(p.name));
        } else {
            Object.values(content).forEach((sub) =>
                sub.forEach((p) => all.push(p.name)),
            );
        }
    });
    return all;
});

const isAllSelected = computed(() => {
    return (
        allPermissions.value.length > 0 &&
        allPermissions.value.length === form.permissions.length &&
        allPermissions.value.every((p) => form.permissions.includes(p))
    );
});

const isPartiallySelected = computed(() => {
    return (
        form.permissions.length > 0 &&
        form.permissions.length < allPermissions.value.length
    );
});

const toggleGlobalSelectAll = (checked: boolean | undefined) => {
    if (checked === undefined || checked === true) {
        form.permissions = [...allPermissions.value];
    } else {
        form.permissions = [];
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Edit Role" />

        <div class="flex flex-col gap-6 p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-foreground">
                    Edit Role
                </h1>
            </div>

            <form @submit.prevent="submit" class="max-w-4xl space-y-6">
                <!-- Basic Info Section -->
                <div
                    class="space-y-4 rounded-lg border border-border bg-card p-6"
                >
                    <h2 class="text-lg font-semibold text-foreground">
                        Basic Info
                    </h2>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-2">
                            <Label for="name">
                                Role Name
                                <span class="text-destructive">*</span>
                            </Label>
                            <Input
                                id="name"
                                v-model="form.name"
                                type="text"
                                required
                                :class="{
                                    'border-destructive': form.errors.name,
                                }"
                            />
                            <p
                                v-if="form.errors.name"
                                class="text-sm text-destructive"
                            >
                                {{ form.errors.name }}
                            </p>
                        </div>

                        <div class="space-y-2">
                            <Label for="description">Description</Label>
                            <Input
                                id="description"
                                v-model="form.description"
                                type="text"
                                placeholder="Name"
                                :class="{
                                    'border-destructive':
                                        form.errors.description,
                                }"
                            />
                            <p
                                v-if="form.errors.description"
                                class="text-sm text-destructive"
                            >
                                {{ form.errors.description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Permissions Section -->
                <div
                    class="space-y-4 rounded-lg border border-border bg-card p-6"
                >
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-foreground">
                            Permissions
                        </h2>
                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                :checked="isAllSelected"
                                :indeterminate="isPartiallySelected"
                                @change="
                                    (e) =>
                                        toggleGlobalSelectAll(
                                            (e.target as HTMLInputElement)
                                                .checked,
                                        )
                                "
                                class="size-4 cursor-pointer rounded border-border text-blue-600 focus:ring-blue-500"
                            />
                            <Label
                                class="cursor-pointer text-base font-medium"
                                @click="toggleGlobalSelectAll(!isAllSelected)"
                            >
                                Select All
                            </Label>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div
                            v-for="module in permissionModules"
                            :key="module"
                            class="space-y-3"
                        >
                            <div class="flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    :checked="isModuleAllSelected(module)"
                                    :indeterminate="
                                        isModulePartiallySelected(module)
                                    "
                                    @change="
                                        (e) =>
                                            toggleAllPermissions(
                                                module,
                                                (e.target as HTMLInputElement)
                                                    .checked,
                                            )
                                    "
                                    class="size-4 cursor-pointer rounded border-border text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    class="cursor-pointer text-base font-medium"
                                    @click="
                                        toggleAllPermissions(
                                            module,
                                            !isModuleAllSelected(module),
                                        )
                                    "
                                    >{{ module }}</Label
                                >
                            </div>

                            <!-- Flat Permissions List -->
                            <div
                                v-if="Array.isArray(permissions[module])"
                                class="grid grid-cols-2 gap-3 pl-6 md:grid-cols-4"
                            >
                                <div
                                    v-for="permission in permissions[module]"
                                    :key="permission.name"
                                    class="flex items-center gap-2"
                                >
                                    <input
                                        type="checkbox"
                                        :id="permission.name"
                                        :checked="
                                            form.permissions.includes(
                                                permission.name,
                                            )
                                        "
                                        @change="
                                            (e) =>
                                                togglePermission(
                                                    permission.name,
                                                    (
                                                        e.target as HTMLInputElement
                                                    ).checked,
                                                )
                                        "
                                        class="size-4 cursor-pointer rounded border-border text-blue-600 focus:ring-blue-500"
                                    />
                                    <Label
                                        :for="permission.name"
                                        class="cursor-pointer text-sm font-normal"
                                    >
                                        {{
                                            permission.action.includes(module)
                                                ? permission.action
                                                : module +
                                                  ' ' +
                                                  permission.action
                                        }}
                                    </Label>
                                </div>
                            </div>

                            <!-- Nested Submodules List -->
                            <div v-else class="space-y-4 pl-6">
                                <div
                                    v-for="(
                                        subPermissions, subModule
                                    ) in permissions[module]"
                                    :key="subModule"
                                    class="space-y-2"
                                >
                                    <!-- Single Permission Submodule (Flattened) -->
                                    <div
                                        v-if="subPermissions.length === 1"
                                        class="flex items-center gap-2 pl-4"
                                    >
                                        <input
                                            type="checkbox"
                                            :id="subPermissions[0].name"
                                            :checked="
                                                form.permissions.includes(
                                                    subPermissions[0].name,
                                                )
                                            "
                                            @change="
                                                (e) =>
                                                    togglePermission(
                                                        subPermissions[0].name,
                                                        (
                                                            e.target as HTMLInputElement
                                                        ).checked,
                                                    )
                                            "
                                            class="size-4 cursor-pointer rounded border-border text-blue-600 focus:ring-blue-500"
                                        />
                                        <Label
                                            :for="subPermissions[0].name"
                                            class="cursor-pointer text-sm font-normal"
                                        >
                                            {{ subModule }}
                                        </Label>
                                    </div>

                                    <!-- Multiple Permissions Submodule (Grouped) -->
                                    <div v-else class="space-y-2">
                                        <div
                                            class="mb-2 flex items-center gap-2"
                                        >
                                            <span
                                                class="text-sm font-medium text-muted-foreground"
                                            >
                                                {{ subModule }}
                                            </span>
                                        </div>
                                        <div
                                            class="grid grid-cols-2 gap-3 pl-4 md:grid-cols-4"
                                        >
                                            <div
                                                v-for="permission in subPermissions"
                                                :key="permission.name"
                                                class="flex items-center gap-2"
                                            >
                                                <input
                                                    type="checkbox"
                                                    :id="permission.name"
                                                    :checked="
                                                        form.permissions.includes(
                                                            permission.name,
                                                        )
                                                    "
                                                    @change="
                                                        (e) =>
                                                            togglePermission(
                                                                permission.name,
                                                                (
                                                                    e.target as HTMLInputElement
                                                                ).checked,
                                                            )
                                                    "
                                                    class="size-4 cursor-pointer rounded border-border text-blue-600 focus:ring-blue-500"
                                                />
                                                <Label
                                                    :for="permission.name"
                                                    class="cursor-pointer text-sm font-normal"
                                                >
                                                    {{ permission.action }}
                                                </Label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p
                        v-if="form.errors.permissions"
                        class="text-sm text-destructive"
                    >
                        {{ form.errors.permissions }}
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    <Button type="submit" :disabled="form.processing">
                        {{ form.processing ? 'Updating...' : 'Update Role' }}
                    </Button>
                    <Button
                        type="button"
                        variant="outline"
                        @click="router.visit(userManagementRoles().url)"
                    >
                        Cancel
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
