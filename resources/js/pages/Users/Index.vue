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
import { Label } from '@/components/ui/label';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { employees as userManagementEmployees } from '@/routes/user-management';
import { create as userManagementEmployeesCreate } from '@/routes/user-management/employees';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import { Edit, MoreHorizontal, Plus, Search } from 'lucide-vue-next';
import { computed, ref, watch } from 'vue';

interface User {
    id: string;
    userId: string;
    name: string;
    mobileNumber: string;
    emailAddress: string;
    accountStatus: string;
    role: string;
}

interface Props {
    users?: User[];
}

const props = withDefaults(defineProps<Props>(), {
    users: () => [],
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
        href: userManagementEmployees().url,
    },
    {
        title: 'Users',
        href: userManagementEmployees().url,
    },
];

const searchQuery = ref('');

// Filter users based on search query
const filteredUsers = computed(() => {
    if (!searchQuery.value.trim()) {
        return props.users || [];
    }

    const query = searchQuery.value.toLowerCase();
    return (props.users || []).filter(
        (user) =>
            (user.userId || '').toLowerCase().includes(query) ||
            (user.name || '').toLowerCase().includes(query) ||
            (user.emailAddress || '').toLowerCase().includes(query) ||
            (user.mobileNumber || '').toLowerCase().includes(query),
    );
});

// Dialog states
const showDeleteDialog = ref(false);
const showResetPasswordDialog = ref(false);
const selectedUser = ref<User | null>(null);

// Delete form
const deleteForm = useForm({
    method: 'delete',
});

// Reset password form
const resetPasswordForm = useForm({
    password: '',
    password_confirmation: '',
});

const openDeleteDialog = (user: User) => {
    selectedUser.value = user;
    showDeleteDialog.value = true;
};

const closeDeleteDialog = () => {
    showDeleteDialog.value = false;
    selectedUser.value = null;
};

const handleDelete = () => {
    if (!selectedUser.value) {
        return;
    }

    deleteForm.delete(`/user-management/employees/${selectedUser.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            closeDeleteDialog();
        },
    });
};

const openResetPasswordDialog = (user: User) => {
    selectedUser.value = user;
    resetPasswordForm.reset();
    showResetPasswordDialog.value = true;
};

const closeResetPasswordDialog = () => {
    showResetPasswordDialog.value = false;
    selectedUser.value = null;
    resetPasswordForm.reset();
};

const handleResetPassword = () => {
    if (!selectedUser.value) {
        return;
    }

    resetPasswordForm.post(
        `/user-management/employees/${selectedUser.value.id}/reset-password`,
        {
            preserveScroll: true,
            onSuccess: () => {
                closeResetPasswordDialog();
            },
        },
    );
};

const handleToggleLock = (user: User) => {
    router.post(
        `/user-management/employees/${user.id}/toggle-lock`,
        {},
        {
            preserveScroll: true,
        },
    );
};

const getStatusColor = (status: string) => {
    switch (status) {
        case 'Active':
            return 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-200';
        case 'Inactive':
            return 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200';
        default:
            return 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-200';
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Users" />

        <div class="flex h-full flex-col gap-4 p-6">
            <!-- Header Section -->
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-foreground">
                        User Management
                    </h1>
                </div>

                <!-- Filter and Action Bar -->
                <div class="flex items-center justify-between gap-4">
                    <!-- Left Side: Filter Tab and Search -->
                    <div class="flex flex-1 items-center gap-4">
                        <!-- All Users Tab -->
                        <Button
                            variant="outline"
                            class="bg-muted text-foreground hover:bg-muted/80"
                        >
                            All Users
                        </Button>

                        <!-- Search Input -->
                        <div class="relative max-w-md flex-1">
                            <Search
                                class="absolute top-1/2 left-2.5 size-4 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search by ID, Name, Email, Mobile number"
                                class="h-9 pl-9 text-sm"
                            />
                        </div>
                    </div>

                    <!-- Right Side: Add User Button -->
                    <Link
                        v-if="hasPermission('user_management.users.create')"
                        :href="userManagementEmployeesCreate().url"
                    >
                        <Button
                            class="bg-purple-600 text-white hover:bg-purple-700"
                        >
                            <Plus class="mr-2 size-4" />
                            Add User
                        </Button>
                    </Link>
                </div>
            </div>

            <!-- Table Section -->
            <div
                class="flex-1 overflow-auto rounded-md border border-border bg-card"
            >
                <table class="w-full text-sm">
                    <thead class="sticky top-0 z-10 bg-muted/50">
                        <tr>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                User ID
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Name
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Mobile Number
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Email Address
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Account Status
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Role
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredUsers.length === 0">
                            <td colspan="7" class="px-4 py-12 text-center">
                                <div
                                    class="flex flex-col items-center justify-center gap-2"
                                >
                                    <p class="text-sm text-muted-foreground">
                                        No users found
                                    </p>
                                    <p class="text-xs text-muted-foreground">
                                        {{
                                            searchQuery
                                                ? 'Try adjusting your search criteria'
                                                : 'Add your first user to get started'
                                        }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-for="user in filteredUsers"
                            :key="user.id"
                            class="border-b border-border transition-colors hover:bg-muted/50"
                        >
                            <td class="px-4 py-3 align-middle">
                                <span class="font-medium text-foreground">{{
                                    user.userId
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.name
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.mobileNumber
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.emailAddress
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span
                                    :class="[
                                        'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium',
                                        getStatusColor(user.accountStatus),
                                    ]"
                                >
                                    {{ user.accountStatus }}
                                </span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.role
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Link
                                        v-if="
                                            hasPermission(
                                                'user_management.users.update',
                                            )
                                        "
                                        :href="`/user-management/employees/${user.id}/edit`"
                                        class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                        title="Edit"
                                    >
                                        <Edit
                                            class="size-4 text-muted-foreground"
                                        />
                                    </Link>

                                    <DropdownMenu
                                        v-if="
                                            hasPermission(
                                                'user_management.users.reset_password',
                                            ) ||
                                            hasPermission(
                                                'user_management.users.delete',
                                            )
                                        "
                                    >
                                        <DropdownMenuTrigger as-child>
                                            <button
                                                class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                                title="More options"
                                            >
                                                <MoreHorizontal
                                                    class="size-4 text-muted-foreground"
                                                />
                                            </button>
                                        </DropdownMenuTrigger>
                                        <DropdownMenuContent align="end">
                                            <DropdownMenuItem
                                                v-if="
                                                    hasPermission(
                                                        'user_management.users.reset_password',
                                                    )
                                                "
                                                @click="
                                                    openResetPasswordDialog(
                                                        user,
                                                    )
                                                "
                                            >
                                                Reset Password
                                            </DropdownMenuItem>
                                            <DropdownMenuItem
                                                v-if="
                                                    hasPermission(
                                                        'user_management.users.delete',
                                                    )
                                                "
                                                class="text-destructive"
                                                @click="openDeleteDialog(user)"
                                            >
                                                Delete
                                            </DropdownMenuItem>
                                        </DropdownMenuContent>
                                    </DropdownMenu>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Delete Confirmation Dialog -->
        <Dialog
            :open="showDeleteDialog"
            @update:open="showDeleteDialog = $event"
        >
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Delete User</DialogTitle>
                    <DialogDescription>
                        Are you sure you want to delete
                        <strong>{{ selectedUser?.name }}</strong
                        >? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter>
                    <Button variant="outline" @click="closeDeleteDialog">
                        Cancel
                    </Button>
                    <Button
                        variant="destructive"
                        @click="handleDelete"
                        :disabled="deleteForm.processing"
                    >
                        {{ deleteForm.processing ? 'Deleting...' : 'Delete' }}
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Reset Password Dialog -->
        <Dialog
            :open="showResetPasswordDialog"
            @update:open="showResetPasswordDialog = $event"
        >
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Reset Password</DialogTitle>
                    <DialogDescription>
                        Enter a new password for
                        <strong>{{ selectedUser?.name }}</strong
                        >.
                    </DialogDescription>
                </DialogHeader>
                <form @submit.prevent="handleResetPassword" class="space-y-4">
                    <div class="space-y-2">
                        <Label for="password">New Password</Label>
                        <Input
                            id="password"
                            v-model="resetPasswordForm.password"
                            type="password"
                            required
                            :class="{
                                'border-destructive':
                                    resetPasswordForm.errors.password,
                            }"
                        />
                        <p
                            v-if="resetPasswordForm.errors.password"
                            class="text-sm text-destructive"
                        >
                            {{ resetPasswordForm.errors.password }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <Label for="password_confirmation"
                            >Confirm Password</Label
                        >
                        <Input
                            id="password_confirmation"
                            v-model="resetPasswordForm.password_confirmation"
                            type="password"
                            required
                            :class="{
                                'border-destructive':
                                    resetPasswordForm.errors
                                        .password_confirmation,
                            }"
                        />
                        <p
                            v-if="
                                resetPasswordForm.errors.password_confirmation
                            "
                            class="text-sm text-destructive"
                        >
                            {{ resetPasswordForm.errors.password_confirmation }}
                        </p>
                    </div>
                    <DialogFooter>
                        <Button
                            type="button"
                            variant="outline"
                            @click="closeResetPasswordDialog"
                        >
                            Cancel
                        </Button>
                        <Button
                            type="submit"
                            :disabled="resetPasswordForm.processing"
                        >
                            {{
                                resetPasswordForm.processing
                                    ? 'Resetting...'
                                    : 'Reset Password'
                            }}
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    </AppLayout>
</template>
