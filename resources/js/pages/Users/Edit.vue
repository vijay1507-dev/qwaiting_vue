<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { employees as userManagementEmployees } from '@/routes/user-management';
import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';

interface User {
    id: string;
    name: string;
    email: string;
    phone: string;
    role: string;
    status: string;
}

interface Props {
    user: User;
    roles: string[];
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
        title: 'Users',
        href: userManagementEmployees().url,
    },
    {
        title: 'Edit User',
        href: '#',
    },
];

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    phone: props.user.phone || '',
    role: props.user.role,
    status: props.user.status,
});

const submit = () => {
    form.put(`/user-management/employees/${props.user.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            success('User updated successfully');
        },
        onError: () => {
            showError(
                'Failed to update user. Please check the form for errors.',
            );
        },
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Edit User" />

        <div class="flex flex-col gap-6 p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-foreground">
                    Edit User
                </h1>
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
                </div>

                <div class="flex items-center gap-4">
                    <Button type="submit" :disabled="form.processing">
                        {{ form.processing ? 'Updating...' : 'Update User' }}
                    </Button>
                    <Button
                        type="button"
                        variant="outline"
                        @click="router.visit(userManagementEmployees().url)"
                    >
                        Cancel
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
