<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as clientsIndex } from '@/routes/clients';
import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';
import { Eye, EyeOff } from 'lucide-vue-next';
import { ref } from 'vue';

interface Client {
    id: string;
    domain: string;
    ownerName: string;
    ownerEmail: string;
    ownerPhone: string;
    ownerAddress: string;
    created: string;
    expires: string;
    status: 'active' | 'inactive';
    plan?: 'Free' | 'Paid' | 'Trial';
}

interface Props {
    client: Client;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Clients',
        href: clientsIndex().url,
    },
    {
        title: 'Reset Password',
        href: '#',
    },
];

const errors = ref<Record<string, string>>({});
const { success } = useToast();

// Password reset form
const passwordForm = useForm({
    password: '',
    password_confirmation: '',
});

const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

const validatePasswordForm = (): boolean => {
    errors.value = {};

    if (!passwordForm.password.trim()) {
        errors.value.password = 'Password is required';
        return false;
    }

    if (passwordForm.password.length < 8) {
        errors.value.password = 'Password must be at least 8 characters';
        return false;
    }

    if (passwordForm.password !== passwordForm.password_confirmation) {
        errors.value.password_confirmation = 'Passwords do not match';
        return false;
    }

    return true;
};

const resetPassword = () => {
    if (validatePasswordForm()) {
        passwordForm.post(`/clients/${props.client.id}/reset-password`, {
            preserveScroll: true,
            onSuccess: () => {
                success('Password reset successfully.');
                passwordForm.reset();
            },
            onError: (formErrors) => {
                if (formErrors.password) {
                    errors.value.password = Array.isArray(formErrors.password)
                        ? formErrors.password[0]
                        : formErrors.password;
                }
                if (formErrors.password_confirmation) {
                    errors.value.password_confirmation = Array.isArray(
                        formErrors.password_confirmation,
                    )
                        ? formErrors.password_confirmation[0]
                        : formErrors.password_confirmation;
                }
            },
        });
    }
};
</script>

<template>
    <Head title="Reset Client Password" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        Reset Client Password
                    </h1>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto">
                <!-- Client Information Card -->
                

                <!-- Password Reset Section -->
                <div
                    class="max-w-2xl rounded-md border border-border bg-card p-4 lg:p-6"
                >
                    <h2
                        class="mb-1 text-base font-semibold text-foreground lg:text-lg"
                    >
                        New Password
                    </h2>
                    <p
                        class="mb-4 text-xs text-muted-foreground lg:mb-6 lg:text-sm"
                    >
                        Set a new password for this client.
                    </p>

                    <div class="space-y-4 lg:space-y-6">
                        <!-- New Password -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                New Password <span class="text-red-500">*</span>
                            </Label>
                            <div class="relative mt-1">
                                <Input
                                    v-model="passwordForm.password"
                                    :type="showPassword ? 'text' : 'password'"
                                    placeholder="Enter new password"
                                    class="pr-10"
                                    :class="{
                                        'border-red-500':
                                            errors.password ||
                                            passwordForm.errors.password,
                                    }"
                                />
                                <button
                                    @click="showPassword = !showPassword"
                                    type="button"
                                    class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer text-muted-foreground hover:text-foreground"
                                >
                                    <Eye v-if="!showPassword" class="size-4" />
                                    <EyeOff v-else class="size-4" />
                                </button>
                            </div>
                            <p
                                v-if="
                                    errors.password ||
                                    passwordForm.errors.password
                                "
                                class="mt-1 text-xs text-red-500"
                            >
                                {{
                                    errors.password ||
                                    passwordForm.errors.password
                                }}
                            </p>
                            <p class="mt-1 text-xs text-muted-foreground">
                                Password must be at least 8 characters long
                            </p>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Confirm Password
                                <span class="text-red-500">*</span>
                            </Label>
                            <div class="relative mt-1">
                                <Input
                                    v-model="passwordForm.password_confirmation"
                                    :type="
                                        showPasswordConfirmation
                                            ? 'text'
                                            : 'password'
                                    "
                                    placeholder="Confirm new password"
                                    class="pr-10"
                                    :class="{
                                        'border-red-500':
                                            errors.password_confirmation ||
                                            passwordForm.errors
                                                .password_confirmation,
                                    }"
                                />
                                <button
                                    @click="
                                        showPasswordConfirmation =
                                            !showPasswordConfirmation
                                    "
                                    type="button"
                                    class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer text-muted-foreground hover:text-foreground"
                                >
                                    <Eye
                                        v-if="!showPasswordConfirmation"
                                        class="size-4"
                                    />
                                    <EyeOff v-else class="size-4" />
                                </button>
                            </div>
                            <p
                                v-if="
                                    errors.password_confirmation ||
                                    passwordForm.errors.password_confirmation
                                "
                                class="mt-1 text-xs text-red-500"
                            >
                                {{
                                    errors.password_confirmation ||
                                    passwordForm.errors.password_confirmation
                                }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div
                class="flex items-center justify-end gap-3 border-t border-border pt-4"
            >
                <Button
                    variant="outline"
                    @click="router.visit(clientsIndex().url)"
                    type="button"
                >
                    Cancel
                </Button>
                <Button
                    @click="resetPassword"
                    type="button"
                    :disabled="passwordForm.processing"
                    class="bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50"
                >
                    {{
                        passwordForm.processing
                            ? 'Resetting...'
                            : 'Reset Password'
                    }}
                </Button>
            </div>
        </div>
    </AppLayout>
</template>
