<script setup lang="ts">
import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Input } from '@/components/ui/input';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { users as userManagementUsers } from '@/routes/user-management';
import {
    create as userManagementRolesCreate,
    destroy as userManagementRolesDestroy,
    edit as userManagementRolesEdit,
} from '@/routes/user-management/roles';

import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { Edit, MoreHorizontal, Plus, Search, Trash2 } from 'lucide-vue-next';
import { computed, ref, watch } from 'vue';

interface Role {
    id: string;
    name: string;
    description: string;
    status: string;
}

interface Props {
    roles?: Role[];
}

const props = withDefaults(defineProps<Props>(), {
    roles: () => [],
});

const page = usePage();
const { success, error: showError } = useToast();

// Permission helper
const hasPermission = (permission: string) => {
    const permissions = (page.props as any).auth?.permissions || [];
    return permissions.includes(permission) || permissions.includes('*');
};

// Watch for flash messages
watch(
    () => (page.props as any).flash?.success,
    (message) => {
        if (message) {
            success(message);
        }
    },
    { immediate: true },
);

watch(
    () => (page.props as any).flash?.error,
    (message) => {
        if (message) {
            showError(message);
        }
    },
    { immediate: true },
);

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
        href: '#',
    },
];

const searchQuery = ref('');

// Filter roles based on search query
const filteredRoles = computed(() => {
    if (!searchQuery.value.trim()) {
        return props.roles || [];
    }

    const query = searchQuery.value.toLowerCase();
    return (props.roles || []).filter(
        (role) =>
            (role.name || '').toLowerCase().includes(query) ||
            (role.description || '').toLowerCase().includes(query),
    );
});

// Dialog states
const showDeleteDialog = ref(false);
const selectedRole = ref<Role | null>(null);

const deleteForm = useForm({});

const openDeleteDialog = (role: Role) => {
    selectedRole.value = role;
    showDeleteDialog.value = true;
};

const deleteRole = () => {
    if (!selectedRole.value) {
        return;
    }

    deleteForm.delete(
        userManagementRolesDestroy({ id: selectedRole.value.id }).url,
        {
            preserveScroll: true,
            onSuccess: () => {
                showDeleteDialog.value = false;
                selectedRole.value = null;
                success('Role deleted successfully');
            },
            onError: () => {
                showError('Failed to delete role. Please try again.');
            },
        },
    );
};

const getStatusBadgeClass = (status: string) => {
    if (status === 'Active') {
        return 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
    }
    return 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
};

const getStatusText = (status: string) => {
    return status === 'Active' ? 'Active' : 'Inactive';
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Role" />

        <div class="flex flex-col gap-6 p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-foreground">Role</h1>
            </div>

            <div class="flex items-center gap-4">
                <div class="relative flex-1">
                    <Search
                        class="absolute top-1/2 left-3 size-4 -translate-y-1/2 text-muted-foreground"
                    />
                    <Input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Search"
                        class="pl-10"
                    />
                </div>
                <Link
                    v-if="hasPermission('user_management.roles.create')"
                    :href="userManagementRolesCreate().url"
                >
                    <Button
                        class="bg-purple-600 text-white hover:bg-purple-700"
                    >
                        <Plus class="mr-2 size-4" />
                        Add Role
                    </Button>
                </Link>
            </div>

            <div class="rounded-lg border border-border bg-card">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-border">
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-foreground"
                                >
                                    Role Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-foreground"
                                >
                                    Description
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-foreground"
                                >
                                    Status
                                </th>
                                <th
                                    class="px-6 py-3 text-right text-sm font-medium text-foreground"
                                >
                                    Operations
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="role in filteredRoles"
                                :key="role.id"
                                class="border-b border-border hover:bg-muted/50"
                            >
                                <td class="px-6 py-4 text-sm text-foreground">
                                    {{ role.name }}
                                </td>
                                <td
                                    class="px-6 py-4 text-sm text-muted-foreground"
                                >
                                    {{ role.description || '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        :class="[
                                            'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                            getStatusBadgeClass(role.status),
                                        ]"
                                    >
                                        {{ getStatusText(role.status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class="flex items-center justify-end gap-2"
                                    >
                                        <Link
                                            v-if="
                                                hasPermission(
                                                    'user_management.roles.update',
                                                )
                                            "
                                            :href="
                                                userManagementRolesEdit({
                                                    id: role.id,
                                                }).url
                                            "
                                        >
                                            <Button
                                                variant="ghost"
                                                size="icon"
                                                class="size-8"
                                            >
                                                <Edit class="size-4" />
                                            </Button>
                                        </Link>
                                        <DropdownMenu
                                            v-if="
                                                hasPermission(
                                                    'user_management.roles.delete',
                                                )
                                            "
                                        >
                                            <DropdownMenuTrigger as-child>
                                                <Button
                                                    variant="ghost"
                                                    size="icon"
                                                    class="size-8"
                                                >
                                                    <MoreHorizontal
                                                        class="size-4"
                                                    />
                                                </Button>
                                            </DropdownMenuTrigger>
                                            <DropdownMenuContent align="end">
                                                <DropdownMenuItem
                                                    @click="
                                                        openDeleteDialog(role)
                                                    "
                                                    class="text-destructive"
                                                >
                                                    <Trash2
                                                        class="mr-2 size-4"
                                                    />
                                                    Delete
                                                </DropdownMenuItem>
                                            </DropdownMenuContent>
                                        </DropdownMenu>
                                    </div>
                                </td>
                            </tr>
                            <tr v-if="filteredRoles.length === 0">
                                <td
                                    colspan="4"
                                    class="px-6 py-8 text-center text-sm text-muted-foreground"
                                >
                                    No roles found
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Dialog -->
        <Dialog v-model:open="showDeleteDialog">
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Delete Role</DialogTitle>
                    <DialogDescription>
                        Are you sure you want to delete the role "{{
                            selectedRole?.name
                        }}"? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter>
                    <Button
                        variant="outline"
                        @click="showDeleteDialog = false"
                        :disabled="deleteForm.processing"
                    >
                        Cancel
                    </Button>
                    <Button
                        variant="destructive"
                        @click="deleteRole"
                        :disabled="deleteForm.processing"
                    >
                        {{ deleteForm.processing ? 'Deleting...' : 'Delete' }}
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </AppLayout>
</template>
