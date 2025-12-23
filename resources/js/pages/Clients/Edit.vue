<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as clientsIndex, edit as clientsEdit, update as clientsUpdate } from '@/routes/clients';
import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ChevronDown, Eye, EyeOff } from 'lucide-vue-next';
import { useToast } from '@/composables/useToast';

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
        title: 'Edit Client',
        href: '#',
    },
];

// Form data
// Form data using Inertia form
const form = useForm({
    ownerName: props.client.ownerName || '',
    ownerEmail: props.client.ownerEmail || '',
    ownerPhone: props.client.ownerPhone || '',
    ownerAddress: props.client.ownerAddress || '',
    status: props.client.status || 'active',
});

const errors = ref<Record<string, string>>({});

// Toast notification
const { success } = useToast();

// Password reset form
const passwordForm = useForm({
    password: '',
    password_confirmation: '',
});

const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

// Status dropdown
const showStatusDropdown = ref(false);
const statusOptions = ['active', 'inactive'];

const openStatusDropdown = () => {
    showStatusDropdown.value = !showStatusDropdown.value;
};

const selectStatus = (status: 'active' | 'inactive') => {
    form.status = status;
    showStatusDropdown.value = false;
};

const closeAllDropdowns = () => {
    showStatusDropdown.value = false;
};

const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    
    if (!target.closest('.dropdown-container')) {
        closeAllDropdowns();
    }
};


const validateForm = (): boolean => {
    errors.value = {};
    
    if (!form.ownerName.trim()) {
        errors.value.ownerName = 'Owner Name is required';
    }
    if (!form.ownerEmail.trim()) {
        errors.value.ownerEmail = 'Owner Email is required';
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.ownerEmail)) {
        errors.value.ownerEmail = 'Invalid email format';
    }
    
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        form.put(clientsUpdate(props.client.id).url, {
            preserveScroll: true,
            onSuccess: () => {
                success('Client updated successfully.');
            },
            onError: (formErrors) => {
                // Map Inertia errors to local errors object
                if (formErrors.ownerName) {
                    errors.value.ownerName = Array.isArray(formErrors.ownerName) ? formErrors.ownerName[0] : formErrors.ownerName;
                }
                if (formErrors.ownerEmail) {
                    errors.value.ownerEmail = Array.isArray(formErrors.ownerEmail) ? formErrors.ownerEmail[0] : formErrors.ownerEmail;
                }
                if (formErrors.error) {
                    errors.value.general = Array.isArray(formErrors.error) ? formErrors.error[0] : formErrors.error;
                }
            },
        });
    }
};

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
                    errors.value.password = Array.isArray(formErrors.password) ? formErrors.password[0] : formErrors.password;
                }
                if (formErrors.password_confirmation) {
                    errors.value.password_confirmation = Array.isArray(formErrors.password_confirmation) ? formErrors.password_confirmation[0] : formErrors.password_confirmation;
                }
            },
        });
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<template>
    <Head title="Edit Client" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Edit Client</h1>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto">
                <div class="bg-card border border-border rounded-md p-4 lg:p-6 max-w-2xl">
                    <h2 class="text-base lg:text-lg font-semibold text-foreground mb-1">Client Information</h2>
                    <p class="text-xs lg:text-sm text-muted-foreground mb-4 lg:mb-6">
                        Update the client information below.
                    </p>

                    <!-- General Error Message -->
                    <div v-if="errors.general" class="mb-4 rounded-md border border-red-200 bg-red-50 dark:bg-red-900/20 p-3">
                        <p class="text-sm text-red-800 dark:text-red-200">{{ errors.general }}</p>
                    </div>

                    <div class="space-y-4 lg:space-y-6">
                        <!-- Domain (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Domain
                            </Label>
                            <Input
                                :default-value="props.client.domain || '-'"
                                :model-value="props.client.domain || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
                            <p class="mt-1 text-xs text-muted-foreground">Domain cannot be changed</p>
                        </div>

                        <!-- Owner Name -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Owner Name <span class="text-red-500">*</span>
                            </Label>
                            <Input
                                v-model="form.ownerName"
                                type="text"
                                placeholder="Owner Name"
                                class="mt-1"
                                :class="{ 'border-red-500': errors.ownerName || form.errors.ownerName }"
                            />
                            <p v-if="errors.ownerName || form.errors.ownerName" class="mt-1 text-xs text-red-500">
                                {{ errors.ownerName || form.errors.ownerName }}
                            </p>
                        </div>

                        <!-- Owner Email -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Owner Email <span class="text-red-500">*</span>
                            </Label>
                            <Input
                                v-model="form.ownerEmail"
                                type="email"
                                placeholder="Owner Email"
                                class="mt-1"
                                :class="{ 'border-red-500': errors.ownerEmail || form.errors.ownerEmail }"
                            />
                            <p v-if="errors.ownerEmail || form.errors.ownerEmail" class="mt-1 text-xs text-red-500">
                                {{ errors.ownerEmail || form.errors.ownerEmail }}
                            </p>
                        </div>

                        <!-- Owner Phone -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Owner Phone
                            </Label>
                            <Input
                                v-model="form.ownerPhone"
                                type="text"
                                placeholder="Owner Phone"
                                class="mt-1"
                            />
                        </div>

                        <!-- Owner Address -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Owner Address
                            </Label>
                            <Input
                                v-model="form.ownerAddress"
                                type="text"
                                placeholder="Owner Address"
                                class="mt-1"
                            />
                        </div>

                        <!-- Status -->
                        <div class="dropdown-container relative">
                            <Label class="text-xs lg:text-sm">
                                Status <span class="text-red-500">*</span>
                            </Label>
                            <button
                                @click.stop="openStatusDropdown"
                                type="button"
                                class="mt-1 w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                            >
                                <span :class="form.status ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate capitalize">
                                    {{ form.status || 'Select' }}
                                </span>
                                <ChevronDown class="size-4 text-muted-foreground" />
                            </button>
                            <div
                                v-if="showStatusDropdown"
                                class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                            >
                                <button
                                    v-for="option in statusOptions"
                                    :key="option"
                                    @click="selectStatus(option as 'active' | 'inactive')"
                                    type="button"
                                    class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer capitalize"
                                >
                                    {{ option }}
                                </button>
                            </div>
                        </div>

                        <!-- Expires (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Expires
                            </Label>
                            <Input
                                :default-value="props.client.expires || '-'"
                                :model-value="props.client.expires || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
                        </div>

                        <!-- Plan (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Plan
                            </Label>
                            <Input
                                :default-value="props.client.plan || '-'"
                                :model-value="props.client.plan || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
                            <p class="mt-1 text-xs text-muted-foreground">Plan is automatically determined</p>
                        </div>

                        <!-- Created (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Created
                            </Label>
                            <Input
                                :default-value="props.client.created || '-'"
                                :model-value="props.client.created || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
                        </div>
                    </div>
                </div>

                <!-- Password Reset Section -->
                <div class="bg-card border border-border rounded-md p-4 lg:p-6 max-w-2xl mt-4">
                    <h2 class="text-base lg:text-lg font-semibold text-foreground mb-1">Reset Password</h2>
                    <p class="text-xs lg:text-sm text-muted-foreground mb-4 lg:mb-6">
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
                                    :class="{ 'border-red-500': errors.password || passwordForm.errors.password }"
                                />
                                <button
                                    @click="showPassword = !showPassword"
                                    type="button"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground hover:text-foreground cursor-pointer"
                                >
                                    <Eye v-if="!showPassword" class="size-4" />
                                    <EyeOff v-else class="size-4" />
                                </button>
                            </div>
                            <p v-if="errors.password || passwordForm.errors.password" class="mt-1 text-xs text-red-500">
                                {{ errors.password || passwordForm.errors.password }}
                            </p>
                            <p class="mt-1 text-xs text-muted-foreground">Password must be at least 8 characters long</p>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <Label class="text-xs lg:text-sm">
                                Confirm Password <span class="text-red-500">*</span>
                            </Label>
                            <div class="relative mt-1">
                                <Input
                                    v-model="passwordForm.password_confirmation"
                                    :type="showPasswordConfirmation ? 'text' : 'password'"
                                    placeholder="Confirm new password"
                                    class="pr-10"
                                    :class="{ 'border-red-500': errors.password_confirmation || passwordForm.errors.password_confirmation }"
                                />
                                <button
                                    @click="showPasswordConfirmation = !showPasswordConfirmation"
                                    type="button"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground hover:text-foreground cursor-pointer"
                                >
                                    <Eye v-if="!showPasswordConfirmation" class="size-4" />
                                    <EyeOff v-else class="size-4" />
                                </button>
                            </div>
                            <p v-if="errors.password_confirmation || passwordForm.errors.password_confirmation" class="mt-1 text-xs text-red-500">
                                {{ errors.password_confirmation || passwordForm.errors.password_confirmation }}
                            </p>
                        </div>
                    </div>

                    <!-- Password Reset Button -->
                    <div class="mt-6 flex justify-end">
                        <Button
                            @click="resetPassword"
                            type="button"
                            :disabled="passwordForm.processing"
                            class="bg-blue-600 hover:bg-blue-700 text-white disabled:opacity-50"
                        >
                            {{ passwordForm.processing ? 'Resetting...' : 'Reset Password' }}
                        </Button>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex items-center justify-end gap-3 border-t border-border pt-4">
                <Button
                    variant="outline"
                    @click="router.visit(clientsIndex().url)"
                    type="button"
                >
                    Cancel
                </Button>
                <Button
                    @click="submit"
                    type="button"
                    :disabled="form.processing"
                    class="bg-blue-600 hover:bg-blue-700 text-white disabled:opacity-50"
                >
                    {{ form.processing ? 'Updating...' : 'Update Client' }}
                </Button>
            </div>
        </div>
    </AppLayout>
</template>

