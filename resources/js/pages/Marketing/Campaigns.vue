<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { campaigns, sequences, workflows, tracking } from '@/routes/marketing';
import marketingRoutes from '@/routes/marketing';
const { systemTemplates } = marketingRoutes;
import { create as campaignsCreate, edit as campaignsEdit } from '@/routes/marketing/campaigns';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, Plus, Filter, Edit, Trash2, Mail, ChevronLeft, ChevronRight, X, ChevronUp, ChevronDown } from 'lucide-vue-next';

interface Campaign {
    id: string;
    name: string;
    type: string;
    channel: string;
    status: string;
    recipients: number;
    sent: number;
    delivered: number;
    opened: number;
    clicked: number;
    bounced: number;
    unsubscribed: number;
    openRate: number;
    clickRate: number;
    createdAt: string;
    lastSent: string | null;
}

interface Props {
    campaigns: Campaign[];
    channels: string[];
    types: string[];
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Marketing Automation',
        href: campaigns().url,
    },
    {
        title: 'Campaigns',
        href: '#',
    },
];

const campaignsList = ref<Campaign[]>(props.campaigns);
const searchQuery = ref('');
const currentPage = ref(1);
const perPage = ref(10);
const showFilters = ref(false);
const customFiltersExpanded = ref(true);

// Filter form data
const filterForm = ref({
    name: '',
    type: '',
    channel: '',
    status: '',
    sent: '',
    delivered: '',
    opened: '',
    clicked: '',
    openRate: '',
    clickRate: '',
    createdAt: '',
});

// Dropdown visibility
const showChannelDropdown = ref(false);
const showTypeDropdown = ref(false);
const showStatusDropdown = ref(false);

// Searchable dropdown states
const channelSearch = ref('');
const channelSearchResults = ref<string[]>([]);
const channelSearchLoading = ref(false);
const channelSearchInputRef = ref<HTMLInputElement | null>(null);

const typeSearch = ref('');
const typeSearchResults = ref<string[]>([]);
const typeSearchLoading = ref(false);
const typeSearchInputRef = ref<HTMLInputElement | null>(null);

const statusSearch = ref('');
const statusSearchResults = ref<string[]>([]);
const statusSearchLoading = ref(false);
const statusSearchInputRef = ref<HTMLInputElement | null>(null);

// Dropdown options
const channelOptions = props.channels || [];
const typeOptions = props.types || [];
const statusOptions = ['active', 'completed', 'scheduled', 'paused'];

// Update campaigns list when props change
watch(() => props.campaigns, (newCampaigns) => {
    campaignsList.value = newCampaigns;
}, { immediate: true, deep: true });

const filteredCampaigns = computed(() => {
    let result = campaignsList.value;

    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (campaign) =>
                campaign.name.toLowerCase().includes(query) ||
                campaign.type.toLowerCase().includes(query)
        );
    }

    // Apply filters
    if (filterForm.value.name) {
        result = result.filter(campaign =>
            campaign.name.toLowerCase().includes(filterForm.value.name.toLowerCase())
        );
    }
    if (filterForm.value.type) {
        result = result.filter(campaign =>
            campaign.type === filterForm.value.type
        );
    }
    if (filterForm.value.channel) {
        result = result.filter(campaign =>
            campaign.channel === filterForm.value.channel
        );
    }
    if (filterForm.value.status) {
        result = result.filter(campaign =>
            campaign.status === filterForm.value.status
        );
    }
    if (filterForm.value.sent) {
        const value = parseFloat(filterForm.value.sent);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.sent >= value);
        }
    }
    if (filterForm.value.delivered) {
        const value = parseFloat(filterForm.value.delivered);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.delivered >= value);
        }
    }
    if (filterForm.value.opened) {
        const value = parseFloat(filterForm.value.opened);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.opened >= value);
        }
    }
    if (filterForm.value.clicked) {
        const value = parseFloat(filterForm.value.clicked);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.clicked >= value);
        }
    }
    if (filterForm.value.openRate) {
        const value = parseFloat(filterForm.value.openRate);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.openRate >= value);
        }
    }
    if (filterForm.value.clickRate) {
        const value = parseFloat(filterForm.value.clickRate);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.clickRate >= value);
        }
    }

    return result;
});

// Pagination
const paginatedCampaigns = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return filteredCampaigns.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredCampaigns.value.length / perPage.value);
});

const paginationInfo = computed(() => {
    const start = (currentPage.value - 1) * perPage.value + 1;
    const end = Math.min(currentPage.value * perPage.value, filteredCampaigns.value.length);
    return `${start} - ${end} of ${filteredCampaigns.value.length}`;
});

const goToPage = (page: number) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

// Reset to page 1 when search query or per page changes
watch([searchQuery, perPage], () => {
    currentPage.value = 1;
});

// Ensure current page is valid when filtered results change
watch(filteredCampaigns, () => {
    if (currentPage.value > totalPages.value && totalPages.value > 0) {
        currentPage.value = totalPages.value;
    }
});

const formatNumber = (num: number): string => {
    if (num >= 1000000) {
        return (num / 1000000).toFixed(1) + 'M';
    }
    if (num >= 1000) {
        return (num / 1000).toFixed(1) + 'K';
    }
    return num.toString();
};

const getStatusColor = (status: string): string => {
    switch (status) {
        case 'active':
            return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
        case 'completed':
            return 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400';
        case 'scheduled':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
        case 'paused':
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};

// Filter modal functions
const closeAllDropdowns = (except?: 'channel' | 'type' | 'status') => {
    if (except !== 'channel') {
        showChannelDropdown.value = false;
        channelSearch.value = '';
        channelSearchResults.value = [];
    }
    if (except !== 'type') {
        showTypeDropdown.value = false;
        typeSearch.value = '';
        typeSearchResults.value = [];
    }
    if (except !== 'status') {
        showStatusDropdown.value = false;
        statusSearch.value = '';
        statusSearchResults.value = [];
    }
};

const openFilters = () => {
    showFilters.value = true;
};

const closeFilters = () => {
    showFilters.value = false;
    closeAllDropdowns();
};

const openChannelDropdown = () => {
    closeAllDropdowns('channel');
    showChannelDropdown.value = !showChannelDropdown.value;
    if (showChannelDropdown.value) {
        nextTick(() => {
            if (channelSearchInputRef.value) {
                channelSearchInputRef.value.focus();
            }
        });
    }
};

const openTypeDropdown = () => {
    closeAllDropdowns('type');
    showTypeDropdown.value = !showTypeDropdown.value;
    if (showTypeDropdown.value) {
        nextTick(() => {
            if (typeSearchInputRef.value) {
                typeSearchInputRef.value.focus();
            }
        });
    }
};

const openStatusDropdown = () => {
    closeAllDropdowns('status');
    showStatusDropdown.value = !showStatusDropdown.value;
    if (showStatusDropdown.value) {
        nextTick(() => {
            if (statusSearchInputRef.value) {
                statusSearchInputRef.value.focus();
            }
        });
    }
};

const searchChannel = (query: string) => {
    channelSearch.value = query;
    
    if (!query.trim()) {
        channelSearchResults.value = [];
        channelSearchLoading.value = false;
        return;
    }
    
    channelSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = channelOptions.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        channelSearchResults.value = filtered;
        channelSearchLoading.value = false;
    }, 300);
};

const searchType = (query: string) => {
    typeSearch.value = query;
    
    if (!query.trim()) {
        typeSearchResults.value = [];
        typeSearchLoading.value = false;
        return;
    }
    
    typeSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = typeOptions.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        typeSearchResults.value = filtered;
        typeSearchLoading.value = false;
    }, 300);
};

const searchStatus = (query: string) => {
    statusSearch.value = query;
    
    if (!query.trim()) {
        statusSearchResults.value = [];
        statusSearchLoading.value = false;
        return;
    }
    
    statusSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = statusOptions.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        statusSearchResults.value = filtered;
        statusSearchLoading.value = false;
    }, 300);
};

const selectChannel = (channel: string) => {
    filterForm.value.channel = channel;
    showChannelDropdown.value = false;
    channelSearch.value = '';
    channelSearchResults.value = [];
};

const selectType = (type: string) => {
    filterForm.value.type = type;
    showTypeDropdown.value = false;
    typeSearch.value = '';
    typeSearchResults.value = [];
};

const selectStatus = (status: string) => {
    filterForm.value.status = status;
    showStatusDropdown.value = false;
    statusSearch.value = '';
    statusSearchResults.value = [];
};

const clearChannel = () => {
    filterForm.value.channel = '';
    channelSearch.value = '';
    channelSearchResults.value = [];
};

const clearType = () => {
    filterForm.value.type = '';
    typeSearch.value = '';
    typeSearchResults.value = [];
};

const clearStatus = () => {
    filterForm.value.status = '';
    statusSearch.value = '';
    statusSearchResults.value = [];
};

const applyFilters = () => {
    currentPage.value = 1;
    closeFilters();
};

const saveFilter = () => {
    // TODO: Implement save filter logic
    console.log('Saving filter:', filterForm.value);
};

const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    
    // Close dropdowns if clicking outside
    if (!target.closest('.dropdown-container')) {
        showChannelDropdown.value = false;
        showTypeDropdown.value = false;
        showStatusDropdown.value = false;
        
        // Reset search states when closing
        if (!showChannelDropdown.value) {
            channelSearch.value = '';
            channelSearchResults.value = [];
        }
        if (!showTypeDropdown.value) {
            typeSearch.value = '';
            typeSearchResults.value = [];
        }
        if (!showStatusDropdown.value) {
            statusSearch.value = '';
            statusSearchResults.value = [];
        }
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
    <Head title="Email Campaigns" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Email Campaigns</h1>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <Link
                        :href="'/marketing/campaigns'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
                    >
                        Campaigns
                    </Link>
                    <Link
                        :href="sequences().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Sequences Notifications
                    </Link>
                    <Link
                        :href="systemTemplates.index().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        System Templates
                    </Link>
                    <!-- <Link
                        :href="workflows().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Workflows
                    </Link>
                    <Link
                        :href="tracking().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Tracking
                    </Link> -->
                </div>

                <!-- Action Bar -->
                <div class="flex items-center justify-between gap-2">
                    <div class="flex flex-1 items-center gap-2">
                        <div class="relative flex-1 max-w-xs">
                            <Search
                                class="absolute left-2.5 top-1/2 size-3.5 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search"
                                class="pl-8 h-8 text-sm"
                            />
                        </div>
                        <Button variant="outline" size="sm" class="h-8 text-xs" @click="openFilters">
                            <Filter class="size-3.5" />
                            Filter
                        </Button>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Pagination Controls -->
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-muted-foreground">Per Page</span>
                            <select
                                v-model="perPage"
                                class="h-7 rounded-md border border-input bg-background px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-ring"
                            >
                                <option :value="10">10</option>
                                <option :value="25">25</option>
                                <option :value="50">50</option>
                                <option :value="100">100</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground">{{ paginationInfo }}</span>
                            <div class="flex items-center gap-1">
                                <button
                                    @click="goToPage(currentPage - 1)"
                                    :disabled="currentPage === 1"
                                    class="p-1 rounded-md hover:bg-muted disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                                    type="button"
                                >
                                    <ChevronLeft class="size-4 text-muted-foreground" />
                                </button>
                                <button
                                    @click="goToPage(currentPage + 1)"
                                    :disabled="currentPage === totalPages"
                                    class="p-1 rounded-md hover:bg-muted disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                                    type="button"
                                >
                                    <ChevronRight class="size-4 text-muted-foreground" />
                                </button>
                            </div>
                        </div>
                        <Link :href="campaignsCreate().url">
                            <Button class="bg-blue-600 hover:bg-blue-700 text-white h-8 px-3 text-xs">
                                <Plus class="mr-2 size-3.5" />
                                Create Campaign
                            </Button>
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                <table class="w-full text-sm">
                    <thead class="sticky top-0 z-10 bg-muted/50">
                        <tr>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Campaign
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Channel
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Status
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Sent
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Delivered
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Opened
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Clicked
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Open Rate
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Click Rate
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredCampaigns.length === 0">
                            <td colspan="10" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <p class="text-sm text-muted-foreground">No campaigns found</p>
                                    <p class="text-xs text-muted-foreground">
                                        {{ searchQuery ? 'Try adjusting your search criteria' : 'Create your first campaign to get started' }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-for="campaign in paginatedCampaigns"
                            :key="campaign.id"
                            class="border-b border-border transition-colors hover:bg-muted/50"
                        >
                            <td class="px-4 py-3 align-middle">
                                <div>
                                    <span class="text-foreground">{{ campaign.name }}</span>
                                    <p class="text-xs text-muted-foreground">{{ campaign.type }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Mail class="size-4 text-muted-foreground" />
                                    <span class="text-sm text-foreground">{{ campaign.channel }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span
                                    :class="[
                                        'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                        getStatusColor(campaign.status),
                                    ]"
                                >
                                    {{ campaign.status }}
                                </span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatNumber(campaign.sent) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatNumber(campaign.delivered) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatNumber(campaign.opened) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatNumber(campaign.clicked) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="font-medium text-foreground">{{ campaign.openRate }}%</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="font-medium text-foreground">{{ campaign.clickRate }}%</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Link :href="campaignsEdit(campaign.id).url">
                                        <button
                                            class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                            title="Edit"
                                        >
                                            <Edit class="size-4 text-muted-foreground" />
                                        </button>
                                    </Link>
                                    <button
                                        class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                        title="Delete"
                                    >
                                        <Trash2 class="size-4 text-muted-foreground" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                            <!-- Campaign Name Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Campaign Name
                                </label>
                                <Input
                                    v-model="filterForm.name"
                                    type="text"
                                    placeholder="Campaign Name"
                                    class="w-full"
                                />
                            </div>

                            <!-- Type Searchable Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Type
                                </label>
                                <button
                                    @click.stop="openTypeDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.type ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                        {{ filterForm.type || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.type && !showTypeDropdown"
                                            @click.stop="clearType"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear type"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                
                                <!-- Search Popup -->
                                <div
                                    v-if="showTypeDropdown"
                                    @click.stop
                                    class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="el => { if (el) typeSearchInputRef = el as HTMLInputElement }"
                                            :value="typeSearch"
                                            @input="searchType(($event.target as HTMLInputElement).value)"
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                        />
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                            <div v-if="typeSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Search Results Dropdown -->
                                    <div class="max-h-48 overflow-y-auto border-t border-border">
                                        <div v-if="typeSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                            Searching...
                                        </div>
                                        <div v-else-if="typeSearchResults && typeSearchResults.length > 0">
                                            <button
                                                v-for="option in typeSearchResults"
                                                :key="option"
                                                @click="selectType(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else-if="!typeSearch && typeOptions.length > 0">
                                            <button
                                                v-for="option in typeOptions"
                                                :key="option"
                                                @click="selectType(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                            No result found
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Channel Searchable Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Channel
                                </label>
                                <button
                                    @click.stop="openChannelDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.channel ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                        {{ filterForm.channel || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.channel && !showChannelDropdown"
                                            @click.stop="clearChannel"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear channel"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                
                                <!-- Search Popup -->
                                <div
                                    v-if="showChannelDropdown"
                                    @click.stop
                                    class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="el => { if (el) channelSearchInputRef = el as HTMLInputElement }"
                                            :value="channelSearch"
                                            @input="searchChannel(($event.target as HTMLInputElement).value)"
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                        />
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                            <div v-if="channelSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Search Results Dropdown -->
                                    <div class="max-h-48 overflow-y-auto border-t border-border">
                                        <div v-if="channelSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                            Searching...
                                        </div>
                                        <div v-else-if="channelSearchResults && channelSearchResults.length > 0">
                                            <button
                                                v-for="option in channelSearchResults"
                                                :key="option"
                                                @click="selectChannel(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else-if="!channelSearch && channelOptions.length > 0">
                                            <button
                                                v-for="option in channelOptions"
                                                :key="option"
                                                @click="selectChannel(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                            No result found
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Searchable Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Status
                                </label>
                                <button
                                    @click.stop="openStatusDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.status ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
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
                                
                                <!-- Search Popup -->
                                <div
                                    v-if="showStatusDropdown"
                                    @click.stop
                                    class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="el => { if (el) statusSearchInputRef = el as HTMLInputElement }"
                                            :value="statusSearch"
                                            @input="searchStatus(($event.target as HTMLInputElement).value)"
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                        />
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                            <div v-if="statusSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Search Results Dropdown -->
                                    <div class="max-h-48 overflow-y-auto border-t border-border">
                                        <div v-if="statusSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                            Searching...
                                        </div>
                                        <div v-else-if="statusSearchResults && statusSearchResults.length > 0">
                                            <button
                                                v-for="option in statusSearchResults"
                                                :key="option"
                                                @click="selectStatus(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else-if="!statusSearch && statusOptions.length > 0">
                                            <button
                                                v-for="option in statusOptions"
                                                :key="option"
                                                @click="selectStatus(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                            No result found
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sent Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Sent
                                </label>
                                <Input
                                    v-model="filterForm.sent"
                                    type="text"
                                    placeholder="Sent"
                                    class="w-full"
                                />
                            </div>

                            <!-- Delivered Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Delivered
                                </label>
                                <Input
                                    v-model="filterForm.delivered"
                                    type="text"
                                    placeholder="Delivered"
                                    class="w-full"
                                />
                            </div>

                            <!-- Opened Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Opened
                                </label>
                                <Input
                                    v-model="filterForm.opened"
                                    type="text"
                                    placeholder="Opened"
                                    class="w-full"
                                />
                            </div>

                            <!-- Clicked Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Clicked
                                </label>
                                <Input
                                    v-model="filterForm.clicked"
                                    type="text"
                                    placeholder="Clicked"
                                    class="w-full"
                                />
                            </div>

                            <!-- Open Rate Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Open Rate
                                </label>
                                <Input
                                    v-model="filterForm.openRate"
                                    type="text"
                                    placeholder="Open Rate"
                                    class="w-full"
                                />
                            </div>

                            <!-- Click Rate Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Click Rate
                                </label>
                                <Input
                                    v-model="filterForm.clickRate"
                                    type="text"
                                    placeholder="Click Rate"
                                    class="w-full"
                                />
                            </div>

                            <!-- Created At Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Created At
                                </label>
                                <Input
                                    v-model="filterForm.createdAt"
                                    type="text"
                                    placeholder="Created At"
                                    class="w-full"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="sticky bottom-0 flex items-center justify-between gap-3 border-t border-border bg-white dark:bg-gray-900 px-6 py-4">
                    <Button
                        variant="outline"
                        size="sm"
                        @click="saveFilter"
                        class="cursor-pointer"
                    >
                        Save Filter
                    </Button>
                    <Button
                        size="sm"
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="applyFilters"
                    >
                        Apply Filters
                    </Button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
