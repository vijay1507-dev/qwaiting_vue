<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import {
    index as clientsIndex,
    update as clientsUpdate,
} from '@/routes/clients';
import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';
import { ChevronDown } from 'lucide-vue-next';
import { onMounted, onUnmounted, ref } from 'vue';

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
                    errors.value.ownerName = Array.isArray(formErrors.ownerName)
                        ? formErrors.ownerName[0]
                        : formErrors.ownerName;
                }
                if (formErrors.ownerEmail) {
                    errors.value.ownerEmail = Array.isArray(
                        formErrors.ownerEmail,
                    )
                        ? formErrors.ownerEmail[0]
                        : formErrors.ownerEmail;
                }
                if (formErrors.error) {
                    errors.value.general = Array.isArray(formErrors.error)
                        ? formErrors.error[0]
                        : formErrors.error;
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
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        Edit Client
                    </h1>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto">
                <div
                    class="max-w-2xl rounded-md border border-border bg-card p-4 lg:p-6"
                >
                    <h2
                        class="mb-1 text-base font-semibold text-foreground lg:text-lg"
                    >
                        Client Information
                    </h2>
                    <p
                        class="mb-4 text-xs text-muted-foreground lg:mb-6 lg:text-sm"
                    >
                        Update the client information below.
                    </p>

                    <!-- General Error Message -->
                    <div
                        v-if="errors.general"
                        class="mb-4 rounded-md border border-red-200 bg-red-50 p-3 dark:bg-red-900/20"
                    >
                        <p class="text-sm text-red-800 dark:text-red-200">
                            {{ errors.general }}
                        </p>
                    </div>

                    <div class="space-y-4 lg:space-y-6">
                        <!-- Domain (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm"> Domain </Label>
                            <Input
                                :default-value="props.client.domain || '-'"
                                :model-value="props.client.domain || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
                            <p class="mt-1 text-xs text-muted-foreground">
                                Domain cannot be changed
                            </p>
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
                                :class="{
                                    'border-red-500':
                                        errors.ownerName ||
                                        form.errors.ownerName,
                                }"
                            />
                            <p
                                v-if="errors.ownerName || form.errors.ownerName"
                                class="mt-1 text-xs text-red-500"
                            >
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
                                :class="{
                                    'border-red-500':
                                        errors.ownerEmail ||
                                        form.errors.ownerEmail,
                                }"
                            />
                            <p
                                v-if="
                                    errors.ownerEmail || form.errors.ownerEmail
                                "
                                class="mt-1 text-xs text-red-500"
                            >
                                {{
                                    errors.ownerEmail || form.errors.ownerEmail
                                }}
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
                                class="mt-1 flex w-full cursor-pointer items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-left text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            >
                                <span
                                    :class="
                                        form.status
                                            ? 'text-foreground'
                                            : 'text-muted-foreground'
                                    "
                                    class="flex-1 truncate capitalize"
                                >
                                    {{ form.status || 'Select' }}
                                </span>
                                <ChevronDown
                                    class="size-4 text-muted-foreground"
                                />
                            </button>
                            <div
                                v-if="showStatusDropdown"
                                class="absolute top-full right-0 left-0 z-10 mt-1 max-h-48 overflow-y-auto rounded-md border border-border bg-white shadow-lg dark:bg-gray-800"
                            >
                                <button
                                    v-for="option in statusOptions"
                                    :key="option"
                                    @click="
                                        selectStatus(
                                            option as 'active' | 'inactive',
                                        )
                                    "
                                    type="button"
                                    class="w-full cursor-pointer px-3 py-2 text-left text-sm text-foreground capitalize transition-colors hover:bg-muted"
                                >
                                    {{ option }}
                                </button>
                            </div>
                        </div>

                        <!-- Expires (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm"> Expires </Label>
                            <Input
                                :default-value="props.client.expires || '-'"
                                :model-value="props.client.expires || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
                        </div>

                        <!-- Plan (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm"> Plan </Label>
                            <Input
                                :default-value="props.client.plan || '-'"
                                :model-value="props.client.plan || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
                            <p class="mt-1 text-xs text-muted-foreground">
                                Plan is automatically determined
                            </p>
                        </div>

                        <!-- Created (Read-only) -->
                        <div>
                            <Label class="text-xs lg:text-sm"> Created </Label>
                            <Input
                                :default-value="props.client.created || '-'"
                                :model-value="props.client.created || '-'"
                                disabled
                                class="mt-1 bg-muted"
                            />
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
                    @click="submit"
                    type="button"
                    :disabled="form.processing"
                    class="bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50"
                >
                    {{ form.processing ? 'Updating...' : 'Update Client' }}
                </Button>
            </div>
        </div>
    </AppLayout>
</template>
