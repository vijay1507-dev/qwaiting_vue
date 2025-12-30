<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as clientsIndex, edit as clientsEdit, show as clientsShow } from '@/routes/clients';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, computed, watch, nextTick, onMounted, onUnmounted } from 'vue';
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
    XCircle,
    FileText,
    Filter,
    X,
    ChevronUp,
    ChevronDown,
    ChevronLeft,
    ChevronRight,
    AlertCircle,
    ExternalLink,
    Building2,
    Users,
    Briefcase,
    TrendingUp,
    Package,
    Shield,
} from 'lucide-vue-next';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import type { Instance } from 'flatpickr/dist/types/instance';

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
    additionalInfo?: {
        website?: string | null;
        role?: string | null;
        usage_preference?: string | null;
        industry?: string | null;
        footfall?: string | null;
        current_solution?: string | null;
    };
}

interface EmailLog {
    id: number;
    notification_type: string;
    subject: string;
    status: 'pending' | 'success' | 'failed';
    error_message?: string;
    mailer?: string;
    metadata?: {
        to?: Array<{ email: string; name?: string }>;
        cc?: Array<{ email: string; name?: string }>;
        bcc?: Array<{ email: string; name?: string }>;
        attachments_count?: number;
    };
    sent_at?: string;
    created_at: string;
}

interface PaginationData {
    data: EmailLog[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    from?: number;
    to?: number;
}

interface Props {
    client: Client;
    emailLogs?: PaginationData;
    totalSuccessful?: number;
    totalFailed?: number;
    notificationTypes?: string[];
    filters?: {
        status?: string;
        notification_type?: string;
        date_from?: string;
        date_to?: string;
    };
}

const props = withDefaults(defineProps<Props>(), {
    emailLogs: () => ({
        data: [],
        current_page: 1,
        last_page: 1,
        per_page: 20,
        total: 0,
    }),
    totalSuccessful: 0,
    totalFailed: 0,
    notificationTypes: () => [],
    filters: () => ({}),
});

// Tab state
const activeTab = ref('details');

// Email logs filter state
const showFilters = ref(false);
const customFiltersExpanded = ref(true);
const showStatusDropdown = ref(false);
const showNotificationTypeDropdown = ref(false);

const filterForm = ref({
    status: props.filters?.status || '',
    notification_type: props.filters?.notification_type || '',
    date_from: props.filters?.date_from || '',
    date_to: props.filters?.date_to || '',
});

const statusOptions = ['success', 'failed', 'pending'];
const notificationTypeOptions = computed(() => props.notificationTypes || []);

// Date pickers
const dateFromPicker = ref<Instance | null>(null);
const dateFromInputRef = ref<HTMLInputElement | null>(null);
const dateToPicker = ref<Instance | null>(null);
const dateToInputRef = ref<HTMLInputElement | null>(null);

// Pagination
const perPage = ref(props.emailLogs?.per_page || 20);
const currentPage = ref(props.emailLogs?.current_page || 1);

// Watch for URL changes to update pagination
watch(() => props.emailLogs?.current_page, (newPage) => {
    if (newPage) {
        currentPage.value = newPage;
    }
});

watch(() => props.emailLogs?.per_page, (newPerPage) => {
    if (newPerPage) {
        perPage.value = newPerPage;
    }
});

// Pagination info
const paginationInfo = computed(() => {
    if (!props.emailLogs) return '0 - 0 of 0';
    const start = props.emailLogs.from || (props.emailLogs.current_page - 1) * props.emailLogs.per_page + 1;
    const end = props.emailLogs.to || Math.min(props.emailLogs.current_page * props.emailLogs.per_page, props.emailLogs.total);
    return `${start} - ${end} of ${props.emailLogs.total}`;
});

// Build query string with filters
const buildQueryString = (page: number, perPageValue: number) => {
    const params = new URLSearchParams();
    params.set('page', page.toString());
    params.set('per_page', perPageValue.toString());
    
    if (filterForm.value.status) {
        params.set('status', filterForm.value.status);
    }
    if (filterForm.value.notification_type) {
        params.set('notification_type', filterForm.value.notification_type);
    }
    if (filterForm.value.date_from) {
        params.set('date_from', filterForm.value.date_from);
    }
    if (filterForm.value.date_to) {
        params.set('date_to', filterForm.value.date_to);
    }
    
    return params.toString();
};

// Navigation functions
const goToPage = (page: number) => {
    if (props.emailLogs && page >= 1 && page <= props.emailLogs.last_page) {
        router.visit(`${clientsShow(props.client.id).url}?${buildQueryString(page, perPage.value)}`, {
            preserveState: true,
            preserveScroll: true,
        });
    }
};

const changePerPage = (newPerPage: number) => {
    perPage.value = newPerPage;
    router.visit(`${clientsShow(props.client.id).url}?${buildQueryString(1, newPerPage)}`, {
        preserveState: true,
        preserveScroll: true,
    });
};

// Filter functions
const openFilters = () => {
    showFilters.value = true;
};

const closeFilters = () => {
    showFilters.value = false;
    closeAllDropdowns();
};

const closeAllDropdowns = (except?: 'status' | 'notification_type') => {
    if (except !== 'status') {
        showStatusDropdown.value = false;
    }
    if (except !== 'notification_type') {
        showNotificationTypeDropdown.value = false;
    }
};

const openStatusDropdown = () => {
    closeAllDropdowns('status');
    showStatusDropdown.value = !showStatusDropdown.value;
};

const openNotificationTypeDropdown = () => {
    closeAllDropdowns('notification_type');
    showNotificationTypeDropdown.value = !showNotificationTypeDropdown.value;
};

const clearStatus = () => {
    filterForm.value.status = '';
};

const clearNotificationType = () => {
    filterForm.value.notification_type = '';
};

const applyFilters = () => {
    router.visit(`${clientsShow(props.client.id).url}?${buildQueryString(1, perPage.value)}`, {
        preserveState: false,
        preserveScroll: false,
    });
    closeFilters();
};

const resetFilters = () => {
    filterForm.value = {
        status: '',
        notification_type: '',
        date_from: '',
        date_to: '',
    };
    
    if (dateFromPicker.value) {
        dateFromPicker.value.clear();
    }
    if (dateToPicker.value) {
        dateToPicker.value.clear();
    }
    
    closeAllDropdowns();
    
    router.visit(`${clientsShow(props.client.id).url}?page=1&per_page=${perPage.value}`, {
        preserveState: false,
        preserveScroll: false,
    });
};

const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    
    if (!target.closest('.dropdown-container')) {
        showStatusDropdown.value = false;
        showNotificationTypeDropdown.value = false;
    }
};

const initializeDatePickers = () => {
    setTimeout(() => {
        if (dateFromInputRef.value && !dateFromPicker.value) {
            dateFromPicker.value = flatpickr(dateFromInputRef.value, {
                dateFormat: 'Y-m-d',
                defaultDate: filterForm.value.date_from || null,
                allowInput: false,
                clickOpens: true,
                wrap: false,
                onChange: (selectedDates, dateStr) => {
                    filterForm.value.date_from = dateStr;
                },
            });
        }

        if (dateToInputRef.value && !dateToPicker.value) {
            dateToPicker.value = flatpickr(dateToInputRef.value, {
                dateFormat: 'Y-m-d',
                defaultDate: filterForm.value.date_to || null,
                allowInput: false,
                clickOpens: true,
                wrap: false,
                onChange: (selectedDates, dateStr) => {
                    filterForm.value.date_to = dateStr;
                },
            });
        }
    }, 200);
};

const destroyDatePickers = () => {
    if (dateFromPicker.value) {
        dateFromPicker.value.destroy();
        dateFromPicker.value = null;
    }
    if (dateToPicker.value) {
        dateToPicker.value.destroy();
        dateToPicker.value = null;
    }
};

watch(showFilters, (isOpen) => {
    if (isOpen) {
        nextTick(() => {
            initializeDatePickers();
        });
    } else {
        destroyDatePickers();
    }
});

// Check if any filters are active
const hasActiveFilters = computed(() => {
    return !!(filterForm.value.status || filterForm.value.notification_type || filterForm.value.date_from || filterForm.value.date_to);
});

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

const getStatusBadge = (status: string) => {
    switch (status) {
        case 'success':
            return {
                class: 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                icon: CheckCircle2,
                text: 'Success',
            };
        case 'failed':
            return {
                class: 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                icon: XCircle,
                text: 'Failed',
            };
        case 'pending':
            return {
                class: 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                icon: Clock,
                text: 'Pending',
            };
        default:
            return {
                class: 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200',
                icon: AlertCircle,
                text: status,
            };
    }
};

const formatDate = (dateString?: string) => {
    if (!dateString) return '-';
    const date = new Date(dateString);
    return date.toLocaleString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
    destroyDatePickers();
});
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

            <!-- Tabs -->
            <div class="border-b border-border">
                <div class="flex items-center gap-1">
                    <button
                        @click="activeTab = 'details'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors',
                            activeTab === 'details'
                                ? 'border-blue-600 text-blue-600'
                                : 'border-transparent text-muted-foreground hover:text-foreground hover:border-muted'
                        ]"
                    >
                        Details
                    </button>
                    <button
                        @click="activeTab = 'emailLogs'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors flex items-center gap-2',
                            activeTab === 'emailLogs'
                                ? 'border-blue-600 text-blue-600'
                                : 'border-transparent text-muted-foreground hover:text-foreground hover:border-muted'
                        ]"
                    >
                        <FileText class="size-4" />
                        Email Logs
                        <span
                            v-if="props.emailLogs && props.emailLogs.total > 0"
                            class="inline-flex items-center justify-center size-5 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 text-xs font-medium"
                        >
                            {{ props.emailLogs.total }}
                        </span>
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="flex-1 overflow-y-auto">
                <!-- Details Tab -->
                <div v-if="activeTab === 'details'" class="grid grid-cols-1 lg:grid-cols-2 gap-4">
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

                    <!-- Additional Information Card -->
                    <div v-if="props.client.additionalInfo && Object.values(props.client.additionalInfo).some(v => v !== null && v !== '')" class="lg:col-span-2 bg-card border border-border rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-foreground mb-4 flex items-center gap-2">
                            <FileText class="size-5 text-muted-foreground" />
                            Additional Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Website -->
                            <div v-if="props.client.additionalInfo.website" class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <ExternalLink class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Website</p>
                                    <a 
                                        :href="props.client.additionalInfo.website"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline break-all"
                                    >
                                        {{ props.client.additionalInfo.website }}
                                    </a>
                                </div>
                            </div>

                            <!-- Role -->
                            <div v-if="props.client.additionalInfo.role" class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Shield class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Role</p>
                                    <p class="text-sm font-medium text-foreground capitalize">{{ props.client.additionalInfo.role }}</p>
                                </div>
                            </div>

                            <!-- Usage Preference -->
                            <div v-if="props.client.additionalInfo.usage_preference" class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Users class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Usage Preference</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.additionalInfo.usage_preference }}</p>
                                </div>
                            </div>

                            <!-- Industry -->
                            <div v-if="props.client.additionalInfo.industry" class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Building2 class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Industry</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.additionalInfo.industry }}</p>
                                </div>
                            </div>

                            <!-- Footfall -->
                            <div v-if="props.client.additionalInfo.footfall" class="flex items-start gap-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <TrendingUp class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Daily Footfall</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.additionalInfo.footfall }}</p>
                                </div>
                            </div>

                            <!-- Current Solution -->
                            <div v-if="props.client.additionalInfo.current_solution" class="flex items-start gap-3 md:col-span-2">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-muted">
                                    <Package class="size-5 text-muted-foreground" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-muted-foreground mb-1">Current Solution</p>
                                    <p class="text-sm font-medium text-foreground">{{ props.client.additionalInfo.current_solution }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email Logs Tab -->
                <div v-if="activeTab === 'emailLogs'" class="flex flex-col gap-4 h-full">
                    <!-- Stats Summary -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-card border border-border rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-muted-foreground">Total Emails</p>
                                    <p class="text-2xl font-semibold text-foreground">{{ props.emailLogs?.total || 0 }}</p>
                                </div>
                                <Mail class="size-8 text-muted-foreground" />
                            </div>
                        </div>
                        <div class="bg-card border border-border rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-muted-foreground">Successful</p>
                                    <p class="text-2xl font-semibold text-green-600">
                                        {{ props.totalSuccessful ?? 0 }}
                                    </p>
                                </div>
                                <CheckCircle2 class="size-8 text-green-600" />
                            </div>
                        </div>
                        <div class="bg-card border border-border rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-muted-foreground">Failed</p>
                                    <p class="text-2xl font-semibold text-red-600">
                                        {{ props.totalFailed ?? 0 }}
                                    </p>
                                </div>
                                <XCircle class="size-8 text-red-600" />
                            </div>
                        </div>
                    </div>

                    <!-- Filters and Pagination Controls -->
                    <div class="flex items-center justify-between gap-4">
                        <!-- Filter Button -->
                        <button
                            @click="openFilters"
                            type="button"
                            :class="[
                                'flex items-center gap-2 px-3 py-2 rounded-md border transition-colors',
                                hasActiveFilters
                                    ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-300 dark:border-blue-700 text-blue-700 dark:text-blue-300'
                                    : 'bg-card border-border text-foreground hover:bg-muted'
                            ]"
                        >
                            <Filter class="size-4" />
                            <span class="text-sm font-medium">Filters</span>
                            <span
                                v-if="hasActiveFilters"
                                class="flex items-center justify-center size-5 rounded-full bg-blue-600 text-white text-xs"
                            >
                                {{ [filterForm.status, filterForm.notification_type, filterForm.date_from, filterForm.date_to].filter(Boolean).length }}
                            </span>
                        </button>

                        <!-- Pagination Controls -->
                        <div
                            v-if="props.emailLogs && (props.emailLogs.last_page > 1 || props.emailLogs.total > 10)"
                            class="flex items-center gap-4"
                        >
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-muted-foreground">Per Page</span>
                                <select
                                    :value="perPage"
                                    @change="changePerPage(Number(($event.target as HTMLSelectElement).value))"
                                    class="h-7 rounded-md border border-input bg-background px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-ring"
                                >
                                    <option :value="10">10</option>
                                    <option :value="20">20</option>
                                    <option :value="25">25</option>
                                    <option :value="50">50</option>
                                    <option :value="100">100</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-xs text-muted-foreground">{{ paginationInfo }}</span>
                                <div class="flex items-center gap-1">
                                    <button
                                        @click="goToPage(props.emailLogs!.current_page - 1)"
                                        :disabled="!props.emailLogs || props.emailLogs.current_page === 1"
                                        class="p-1 rounded-md hover:bg-muted disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer transition-colors"
                                        type="button"
                                        title="Previous"
                                    >
                                        <ChevronLeft class="size-4 text-muted-foreground" />
                                    </button>
                                    <button
                                        @click="goToPage(props.emailLogs!.current_page + 1)"
                                        :disabled="!props.emailLogs || props.emailLogs.current_page === props.emailLogs.last_page"
                                        class="p-1 rounded-md hover:bg-muted disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer transition-colors"
                                        type="button"
                                        title="Next"
                                    >
                                        <ChevronRight class="size-4 text-muted-foreground" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email Logs Table -->
                    <div class="flex-1 overflow-y-auto bg-card border border-border rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="border-b border-border bg-muted/50">
                                    <tr>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Date
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Type
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Subject
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Status
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Mailer
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Error
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="!props.emailLogs || props.emailLogs.data.length === 0">
                                        <td colspan="6" class="px-4 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                <Mail class="size-12 text-muted-foreground" />
                                                <p class="text-sm text-muted-foreground">No email logs found</p>
                                                <p class="text-xs text-muted-foreground">
                                                    Email notifications sent to this client will appear here
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr
                                        v-for="log in props.emailLogs?.data"
                                        :key="log.id"
                                        class="border-b border-border transition-colors hover:bg-muted/50"
                                    >
                                        <td class="px-4 py-3 align-middle">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-medium text-foreground">
                                                    {{ formatDate(log.sent_at || log.created_at) }}
                                                </span>
                                                <span v-if="log.sent_at && log.sent_at !== log.created_at" class="text-xs text-muted-foreground">
                                                    Created: {{ formatDate(log.created_at) }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span class="text-sm text-foreground">
                                                {{ log.notification_type || 'system_email' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span class="text-sm text-foreground" :title="log.subject">
                                                {{ log.subject || '-' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span
                                                :class="[
                                                    'inline-flex items-center gap-1.5 rounded-full px-2 py-1 text-xs font-medium',
                                                    getStatusBadge(log.status).class,
                                                ]"
                                            >
                                                <component :is="getStatusBadge(log.status).icon" class="size-3" />
                                                {{ getStatusBadge(log.status).text }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span class="text-sm text-muted-foreground">
                                                {{ log.mailer || '-' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span
                                                v-if="log.error_message"
                                                class="text-sm text-red-600 dark:text-red-400"
                                                :title="log.error_message"
                                            >
                                                {{ log.error_message.length > 50 ? log.error_message.substring(0, 50) + '...' : log.error_message }}
                                            </span>
                                            <span v-else class="text-sm text-muted-foreground">-</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters Modal -->
            <div
                v-if="showFilters"
                class="fixed inset-0 z-50 flex items-start justify-end"
                @click.self="closeFilters"
            >
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-black/50"></div>

                <!-- Filters Panel -->
                <div class="relative h-full w-full max-w-sm bg-white dark:bg-gray-900 shadow-xl overflow-y-auto transform transition-transform duration-300 ease-in-out">
                    <!-- Header -->
                    <div class="sticky top-0 z-10 flex items-center justify-between border-b border-border bg-white dark:bg-gray-900 px-6 py-4">
                        <h2 class="text-lg font-semibold text-foreground">Filters</h2>
                        <button
                            @click="closeFilters"
                            type="button"
                            class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                            aria-label="Close filters"
                        >
                            <X class="size-5 text-muted-foreground" />
                        </button>
                    </div>

                    <!-- Filters Content -->
                    <div class="p-6 space-y-6">
                        <!-- Custom Filters Section -->
                        <div>
                            <button
                                @click="customFiltersExpanded = !customFiltersExpanded"
                                class="w-full flex items-center justify-between mb-4 cursor-pointer"
                                type="button"
                            >
                                <h3 class="text-base font-semibold text-foreground">Custom Filters</h3>
                                <ChevronUp
                                    v-if="customFiltersExpanded"
                                    class="size-4 text-muted-foreground"
                                />
                                <ChevronDown
                                    v-else
                                    class="size-4 text-muted-foreground"
                                />
                            </button>

                            <div v-if="customFiltersExpanded" class="space-y-4">
                                <!-- Status Dropdown -->
                                <div class="dropdown-container relative">
                                    <label class="block text-sm font-medium text-foreground mb-2">
                                        Status
                                    </label>
                                    <button
                                        @click.stop="openStatusDropdown"
                                        type="button"
                                        class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                    >
                                        <span :class="filterForm.status ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate capitalize">
                                            {{ filterForm.status || 'Select' }}
                                        </span>
                                        <div class="flex items-center gap-1 shrink-0">
                                            <button
                                                v-if="filterForm.status && !showStatusDropdown"
                                                @click.stop="clearStatus"
                                                type="button"
                                                class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                aria-label="Clear status"
                                            >
                                                <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                            </button>
                                            <ChevronDown class="size-4 text-muted-foreground" />
                                        </div>
                                    </button>
                                    <div
                                        v-if="showStatusDropdown"
                                        class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                                    >
                                        <button
                                            v-for="option in statusOptions"
                                            :key="option"
                                            @click="filterForm.status = option; showStatusDropdown = false"
                                            type="button"
                                            class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer capitalize"
                                        >
                                            {{ option }}
                                        </button>
                                    </div>
                                </div>

                                <!-- Notification Type Dropdown -->
                                <div class="dropdown-container relative">
                                    <label class="block text-sm font-medium text-foreground mb-2">
                                        Notification Type
                                    </label>
                                    <button
                                        @click.stop="openNotificationTypeDropdown"
                                        type="button"
                                        class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                    >
                                        <span :class="filterForm.notification_type ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                            {{ filterForm.notification_type || 'Select' }}
                                        </span>
                                        <div class="flex items-center gap-1 shrink-0">
                                            <button
                                                v-if="filterForm.notification_type && !showNotificationTypeDropdown"
                                                @click.stop="clearNotificationType"
                                                type="button"
                                                class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                aria-label="Clear notification type"
                                            >
                                                <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                            </button>
                                            <ChevronDown class="size-4 text-muted-foreground" />
                                        </div>
                                    </button>
                                    <div
                                        v-if="showNotificationTypeDropdown"
                                        class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                                    >
                                        <button
                                            v-for="option in notificationTypeOptions"
                                            :key="option"
                                            @click="filterForm.notification_type = option; showNotificationTypeDropdown = false"
                                            type="button"
                                            class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                        >
                                            {{ option }}
                                        </button>
                                    </div>
                                </div>

                                <!-- Date From Field -->
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-2">
                                        Date From
                                    </label>
                                    <input
                                        ref="dateFromInputRef"
                                        type="text"
                                        placeholder="Select date"
                                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    />
                                </div>

                                <!-- Date To Field -->
                                <div>
                                    <label class="block text-sm font-medium text-foreground mb-2">
                                        Date To
                                    </label>
                                    <input
                                        ref="dateToInputRef"
                                        type="text"
                                        placeholder="Select date"
                                        class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="sticky bottom-0 border-t border-border bg-white dark:bg-gray-900 px-6 py-4 flex items-center gap-3">
                        <button
                            @click="resetFilters"
                            type="button"
                            class="flex-1 px-4 py-2 text-sm font-medium text-foreground bg-muted hover:bg-muted/80 rounded-md transition-colors"
                        >
                            Reset
                        </button>
                        <button
                            @click="applyFilters"
                            type="button"
                            class="flex-1 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md transition-colors"
                        >
                            Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
