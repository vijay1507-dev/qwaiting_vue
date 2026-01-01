<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { employees as userManagementEmployees } from '@/routes/user-management';
import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Checkbox } from '@/components/ui/checkbox';
import { useToast } from '@/composables/useToast';

interface Permission {
    name: string;
    action: string;
}

interface Props {
    permissions: Record<string, Permission[]>;
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
        href: userManagementEmployees().url,
    },
    {
        title: 'Role',
        href: '/user-management/roles',
    },
    {
        title: 'Add Role',
        href: '#',
    },
];

const form = useForm({
    name: '',
    description: '',
    status: 'Active',
    permissions: [] as string[],
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

const toggleAllPermissions = (module: string, checked: boolean | undefined) => {
    const modulePermissions = props.permissions[module] || [];
    
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
    const modulePermissions = props.permissions[module] || [];
    return modulePermissions.length > 0 && modulePermissions.every((p) => form.permissions.includes(p.name));
};

const isModulePartiallySelected = (module: string) => {
    const modulePermissions = props.permissions[module] || [];
    const selectedCount = modulePermissions.filter((p) => form.permissions.includes(p.name)).length;
    return selectedCount > 0 && selectedCount < modulePermissions.length;
};

const submit = () => {
    form.post('/user-management/roles', {
        preserveScroll: true,
        onSuccess: () => {
            success('Role created successfully');
        },
        onError: () => {
            showError('Failed to create role. Please check the form for errors.');
        },
    });
};

const permissionModules = computed(() => {
    return Object.keys(props.permissions).sort();
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Add Role" />

        <div class="flex flex-col gap-6 p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-foreground">Add Role</h1>
            </div>

            <form @submit.prevent="submit" class="space-y-6 max-w-4xl">
                <!-- Basic Info Section -->
                <div class="space-y-4 rounded-lg border border-border bg-card p-6">
                    <h2 class="text-lg font-semibold text-foreground">Basic Info</h2>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-2">
                            <Label for="name">
                                Roll Name <span class="text-destructive">*</span>
                            </Label>
                            <Input
                                id="name"
                                v-model="form.name"
                                type="text"
                                required
                                :class="{ 'border-destructive': form.errors.name }"
                            />
                            <p v-if="form.errors.name" class="text-sm text-destructive">
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
                                :class="{ 'border-destructive': form.errors.description }"
                            />
                            <p v-if="form.errors.description" class="text-sm text-destructive">
                                {{ form.errors.description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Permissions Section -->
                <div class="space-y-4 rounded-lg border border-border bg-card p-6">
                    <h2 class="text-lg font-semibold text-foreground">Permissions</h2>
                    <div class="space-y-6">
                        <div
                            v-for="module in permissionModules"
                            :key="module"
                            class="space-y-3"
                        >
                            <div class="flex items-center gap-2">
                                <Checkbox
                                    :checked="isModuleAllSelected(module)"
                                    :indeterminate="isModulePartiallySelected(module)"
                                    @update:checked="(checked) => {
                                        const shouldCheck = checked !== false;
                                        toggleAllPermissions(module, shouldCheck);
                                    }"
                                />
                                <Label class="text-base font-medium cursor-pointer" @click="toggleAllPermissions(module, !isModuleAllSelected(module))">{{ module }}</Label>
                            </div>
                            <div class="grid grid-cols-2 gap-3 pl-6 md:grid-cols-4">
                                <div
                                    v-for="permission in permissions[module]"
                                    :key="permission.name"
                                    class="flex items-center gap-2"
                                >
                                    <Checkbox
                                        :id="permission.name"
                                        :checked="form.permissions.includes(permission.name)"
                                        @update:checked="(checked) => togglePermission(permission.name, checked)"
                                    />
                                    <Label
                                        :for="permission.name"
                                        class="cursor-pointer text-sm font-normal"
                                    >
                                        {{ module }} {{ permission.action }}
                                    </Label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p v-if="form.errors.permissions" class="text-sm text-destructive">
                        {{ form.errors.permissions }}
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    <Button type="submit" :disabled="form.processing">
                        {{ form.processing ? 'Creating...' : 'Create Role' }}
                    </Button>
                    <Button
                        type="button"
                        variant="outline"
                        @click="router.visit('/user-management/roles')"
                    >
                        Cancel
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

