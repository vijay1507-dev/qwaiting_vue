<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Separator } from '@/components/ui/separator';
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue';
import { dashboard } from '@/routes';
import {
    index,
    updateStatus as updateStatusRoute,
} from '@/routes/package-enquiries';
import { Head, router, usePage } from '@inertiajs/vue3';
import {
    Building2,
    CheckCircle2,
    ChevronDown,
    FileText,
} from 'lucide-vue-next';
import { computed } from 'vue';

interface Enquiry {
    id: number;
    full_name: string;
    email: string;
    mobile_number: string;
    company_name: string;
    interested_package: string;
    expected_start_date: string;
    num_users_branches: string;
    billing_cycle: string;
    features_required: string[] | null;
    custom_notes: string | null;
    contact_method: string;
    best_time_to_contact: string | null;
    created_at: string;
    status: string;
}

const props = defineProps<{
    enquiry: Enquiry;
}>();

const page = usePage();
const permissions = computed(() => page.props.auth.permissions);
const canChangeStatus = computed(() =>
    permissions.value.includes('package_enquiries.change_status'),
);

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
};

const formatTime = (timeString: string) => {
    if (!timeString) return '';
    const [hours, minutes] = timeString.split(':');
    const date = new Date();
    date.setHours(parseInt(hours));
    date.setMinutes(parseInt(minutes));
    return date.toLocaleTimeString('en-US', {
        hour: 'numeric',
        minute: '2-digit',
        hour12: true,
    });
};

const updateStatus = (newStatus: string) => {
    router.put(
        updateStatusRoute({ id: props.enquiry.id }).url,
        {
            status: newStatus,
        },
        {
            preserveScroll: true,
        },
    );
};

const breadcrumbs = [
    {
        title: 'Dashboard',
        href: dashboard(),
    },
    {
        title: 'Package Enquiries',
        href: index().url,
    },
    {
        title: `Enquiry #${props.enquiry.id}`,
    },
];
</script>

<template>
    <Head :title="`Enquiry #${enquiry.id}`" />

    <AppSidebarLayout :breadcrumbs="breadcrumbs">
        <div class="space-y-6 p-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight">
                            Enquiry #{{ enquiry.id }}
                        </h2>
                        <p class="text-muted-foreground">
                            Received on {{ formatDate(enquiry.created_at) }}
                        </p>
                    </div>
                </div>
                <!-- Status Dropdown (Protected) -->
                <div v-if="canChangeStatus" class="flex items-center gap-2">
                    <span class="text-sm font-medium text-muted-foreground"
                        >Status:</span
                    >
                    <DropdownMenu>
                        <DropdownMenuTrigger as-child>
                            <Button
                                variant="outline"
                                class="w-[100px] justify-between"
                            >
                                {{ enquiry.status || 'Open' }}
                                <ChevronDown
                                    class="h-4 w-4 text-muted-foreground opacity-50"
                                />
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end">
                            <DropdownMenuItem @click="updateStatus('Open')">
                                Open
                            </DropdownMenuItem>
                            <DropdownMenuItem @click="updateStatus('Closed')">
                                Closed
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </div>

            <!-- Main Content Card -->
            <div
                class="rounded-xl border bg-card text-card-foreground shadow-sm"
            >
                <!-- Customer Details -->
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3
                        class="flex items-center gap-2 leading-none font-semibold tracking-tight"
                    >
                        <Building2 class="h-4 w-4" />
                        Customer Information
                    </h3>
                </div>
                <div class="p-6 pt-0">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="text-sm leading-none font-medium text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                >Full Name</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ enquiry.full_name }}
                            </p>
                        </div>
                        <div>
                            <label
                                class="text-sm leading-none font-medium text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                >Company Name</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ enquiry.company_name }}
                            </p>
                        </div>
                        <div>
                            <label
                                class="text-sm leading-none font-medium text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                >Email Address</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ enquiry.email }}
                            </p>
                        </div>
                        <div>
                            <label
                                class="text-sm leading-none font-medium text-muted-foreground peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                >Phone Number</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ enquiry.mobile_number }}
                            </p>
                        </div>
                    </div>
                </div>

                <Separator />

                <!-- Package Details -->
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3
                        class="flex items-center gap-2 leading-none font-semibold tracking-tight"
                    >
                        <FileText class="h-4 w-4" />
                        Package Preferences
                    </h3>
                </div>
                <div class="p-6 pt-0">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="text-sm font-medium text-muted-foreground"
                                >Interested Package</label
                            >
                            <div class="mt-1">
                                <Badge variant="secondary">{{
                                    enquiry.interested_package
                                }}</Badge>
                            </div>
                        </div>
                        <div>
                            <label
                                class="text-sm font-medium text-muted-foreground"
                                >Billing Cycle</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ enquiry.billing_cycle }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="text-sm font-medium text-muted-foreground"
                                >Expected Start Date</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{
                                    new Date(
                                        enquiry.expected_start_date,
                                    ).toLocaleDateString()
                                }}
                            </p>
                        </div>
                        <div>
                            <label
                                class="text-sm font-medium text-muted-foreground"
                                >Users / Branches</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ enquiry.num_users_branches }}
                            </p>
                        </div>
                    </div>
                </div>

                <Separator />

                <!-- Contact Preferences -->
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="leading-none font-semibold tracking-tight">
                        Contact Preferences
                    </h3>
                </div>
                <div class="p-6 pt-0">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="text-sm font-medium text-muted-foreground"
                                >Preferred Method</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ enquiry.contact_method }}
                            </p>
                        </div>
                        <div v-if="enquiry.best_time_to_contact">
                            <label
                                class="text-sm font-medium text-muted-foreground"
                                >Best Time to Contact</label
                            >
                            <p class="mt-1 text-sm font-medium">
                                {{ formatTime(enquiry.best_time_to_contact) }}
                            </p>
                        </div>
                    </div>
                </div>

                <Separator
                    v-if="
                        (enquiry.features_required &&
                            enquiry.features_required.length > 0) ||
                        enquiry.custom_notes
                    "
                />

                <!-- Features & Notes -->
                <div
                    v-if="
                        (enquiry.features_required &&
                            enquiry.features_required.length > 0) ||
                        enquiry.custom_notes
                    "
                >
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="leading-none font-semibold tracking-tight">
                            Additional Information
                        </h3>
                    </div>
                    <div class="space-y-6 p-6 pt-0">
                        <div
                            v-if="
                                enquiry.features_required &&
                                enquiry.features_required.length > 0
                            "
                        >
                            <label
                                class="mb-2 block text-sm font-medium text-muted-foreground"
                                >Required Features</label
                            >
                            <div class="flex flex-wrap gap-2">
                                <Badge
                                    v-for="feature in enquiry.features_required"
                                    :key="feature"
                                    variant="outline"
                                    class="flex items-center gap-1"
                                >
                                    <CheckCircle2 class="h-3 w-3" />
                                    {{ feature }}
                                </Badge>
                            </div>
                        </div>

                        <div v-if="enquiry.custom_notes">
                            <label
                                class="mb-2 block text-sm font-medium text-muted-foreground"
                                >Custom Notes</label
                            >
                            <div
                                class="rounded-md bg-muted p-4 text-sm whitespace-pre-wrap"
                            >
                                {{ enquiry.custom_notes }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppSidebarLayout>
</template>
