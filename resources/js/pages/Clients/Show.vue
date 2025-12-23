<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as clientsIndex, edit as clientsEdit } from '@/routes/clients';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { 
    Edit, 
    Globe, 
    User, 
    Mail, 
    Phone, 
    MapPin, 
    Calendar, 
    Clock, 
    Tag,
    CheckCircle2,
    XCircle
} from 'lucide-vue-next';

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
        title: props.client.ownerName || 'Client Details',
        href: '#',
    },
];

const getPlanColor = (plan?: string) => {
    switch (plan) {
        case 'Trial':
            return 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200';
        case 'Paid':
            return 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
        case 'Free':
            return 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200';
    }
};
</script>

<template>
    <Head :title="`Client: ${props.client.ownerName}`" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center size-12 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                            <User class="size-6" />
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold text-foreground">{{ props.client.ownerName || 'Client Details' }}</h1>
                            <p class="text-sm text-muted-foreground">{{ props.client.domain || '-' }}</p>
                        </div>
                    </div>
                    <!-- Status Badges -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <span
                            :class="[
                                'inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-sm font-medium',
                                props.client.status === 'active'
                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                    : 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200',
                            ]"
                        >
                            <CheckCircle2 v-if="props.client.status === 'active'" class="size-4" />
                            <XCircle v-else class="size-4" />
                            {{ props.client.status === 'active' ? 'Active' : 'Inactive' }}
                        </span>
                        <span
                            v-if="props.client.plan"
                            :class="[
                                'inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-sm font-medium',
                                getPlanColor(props.client.plan)
                            ]"
                        >
                            <Tag class="size-4" />
                            {{ props.client.plan }}
                        </span>
                    </div>
                </div>
                <Link
                    :href="clientsEdit(props.client.id).url"
                    class="cursor-pointer"
                >
                    <Button
                        size="sm"
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                    >
                        <Edit class="size-4 mr-2" />
                        Edit Client
                    </Button>
                </Link>
            </div>

            <!-- Content Section -->
            <div class="flex-1 overflow-y-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Contact Information Card -->
                    <div class="bg-card border border-border rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-foreground mb-4 flex items-center gap-2">
                            <User class="size-5 text-muted-foreground" />
                            Contact Information
                        </h2>
                        <div class="space-y-4">
                            <!-- Owner Name -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <User class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Owner Name</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.ownerName || '-' }}</p>
                                </div>
                            </div>

                            <!-- Owner Email -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Mail class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Email</p>
                                    <a 
                                        :href="`mailto:${props.client.ownerEmail}`"
                                        class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline"
                                    >
                                        {{ props.client.ownerEmail || '-' }}
                                    </a>
                                </div>
                            </div>

                            <!-- Owner Phone -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Phone class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Phone</p>
                                    <a 
                                        :href="`tel:${props.client.ownerPhone}`"
                                        class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline"
                                    >
                                        {{ props.client.ownerPhone || '-' }}
                                    </a>
                                </div>
                            </div>

                            <!-- Owner Address -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <MapPin class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Address</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.ownerAddress || '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Information Card -->
                    <div class="bg-card border border-border rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-foreground mb-4 flex items-center gap-2">
                            <Globe class="size-5 text-muted-foreground" />
                            Account Information
                        </h2>
                        <div class="space-y-4">
                            <!-- Domain -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Globe class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Domain</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.domain || '-' }}</p>
                                </div>
                            </div>

                            <!-- Plan -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Tag class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Plan</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.plan || '-' }}</p>
                                </div>
                            </div>

                            <!-- Created -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Calendar class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Created</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.created || '-' }}</p>
                                </div>
                            </div>

                            <!-- Expires -->
                            <div class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Clock class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Expires</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.expires || '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
