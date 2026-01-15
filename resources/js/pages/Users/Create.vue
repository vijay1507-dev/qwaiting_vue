<script setup lang="ts">
import CountryMultiSelect from '@/components/CountryMultiSelect.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { users as userManagementUsers } from '@/routes/user-management';
import { store as userManagementUsersStore } from '@/routes/user-management/users';

import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';

const props = defineProps<{
    roles: string[];
    countries: Array<{ id: number; name: string; code: string }>;
}>();

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
        title: 'Users',
        href: userManagementUsers().url,
    },
    {
        title: 'Add User',
        href: '#',
    },
];

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    phone: '',
    role: props.roles.length > 0 ? props.roles[0] : '',
    status: 'Active',
    countries: [],
});

const submit = () => {
    form.post(userManagementUsersStore().url, {
        preserveScroll: true,
        onSuccess: () => {
            success('User created successfully');
        },
        onError: () => {
            showError(
                'Failed to create user. Please check the form for errors.',
            );
        },
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Add User" />

        <div class="flex flex-col gap-6 p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-foreground">Add User</h1>
            </div>

            <form @submit.prevent="submit" class="max-w-2xl space-y-6">
                <div
                    class="space-y-4 rounded-lg border border-border bg-card p-6"
                >
                    <div class="space-y-2">
                        <Label for="name">Name</Label>
                        <Input
                            id="name"
                            v-model="form.name"
                            type="text"
                            required
                            :class="{ 'border-destructive': form.errors.name }"
                        />
                        <p
                            v-if="form.errors.name"
                            class="text-sm text-destructive"
                        >
                            {{ form.errors.name }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <Label for="email">Email</Label>
                        <Input
                            id="email"
                            v-model="form.email"
                            type="email"
                            required
                            :class="{ 'border-destructive': form.errors.email }"
                        />
                        <p
                            v-if="form.errors.email"
                            class="text-sm text-destructive"
                        >
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <Label for="password">Password</Label>
                        <Input
                            id="password"
                            v-model="form.password"
                            type="password"
                            required
                            :class="{
                                'border-destructive': form.errors.password,
                            }"
                        />
                        <p
                            v-if="form.errors.password"
                            class="text-sm text-destructive"
                        >
                            {{ form.errors.password }}
                        </p>
                        <p class="text-xs text-muted-foreground">
                            Password must be at least 8 characters with mixed
                            case and letters.
                        </p>
                    </div>

                    <div class="space-y-2">
                        <Label for="password_confirmation"
                            >Confirm Password</Label
                        >
                        <Input
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            required
                            :class="{
                                'border-destructive':
                                    form.errors.password_confirmation,
                            }"
                        />
                        <p
                            v-if="form.errors.password_confirmation"
                            class="text-sm text-destructive"
                        >
                            {{ form.errors.password_confirmation }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <Label for="phone">Mobile Number</Label>
                        <Input
                            id="phone"
                            v-model="form.phone"
                            type="tel"
                            :class="{ 'border-destructive': form.errors.phone }"
                        />
                        <p
                            v-if="form.errors.phone"
                            class="text-sm text-destructive"
                        >
                            {{ form.errors.phone }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <Label for="role">Role</Label>
                        <select
                            id="role"
                            v-model="form.role"
                            required
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                            :class="{ 'border-destructive': form.errors.role }"
                        >
                            <option
                                v-for="role in props.roles"
                                :key="role"
                                :value="role"
                            >
                                {{ role }}
                            </option>
                        </select>
                        <p
                            v-if="form.errors.role"
                            class="text-sm text-destructive"
                        >
                            {{ form.errors.role }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <Label for="status">Status</Label>
                        <select
                            id="status"
                            v-model="form.status"
                            required
                            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                            :class="{
                                'border-destructive': form.errors.status,
                            }"
                        >
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        <p
                            v-if="form.errors.status"
                            class="text-sm text-destructive"
                        >
                            {{ form.errors.status }}
                        </p>
                    </div>

                    <CountryMultiSelect
                        v-model="form.countries"
                        :countries="props.countries"
                        :error="form.errors.countries"
                    />
                </div>

                <div class="flex items-center gap-4">
                    <Button type="submit" :disabled="form.processing">
                        {{ form.processing ? 'Creating...' : 'Create User' }}
                    </Button>
                    <Button
                        type="button"
                        variant="outline"
                        @click="router.visit(userManagementUsers().url)"
                    >
                        Cancel
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
