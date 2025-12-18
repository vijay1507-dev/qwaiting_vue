<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { campaigns, sequences, workflows, tracking } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, Filter, ChevronLeft, ChevronRight, X, ChevronUp, ChevronDown } from 'lucide-vue-next';
import { TrendingUp, DollarSign, MousePointerClick, Users } from 'lucide-vue-next';

interface Campaign {
    id: string;
    name: string;
    source: string;
    medium: string;
    campaign: string;
    clicks: number;
    impressions: number;
    conversions: number;
    cost: number;
    revenue: number;
    roi: number | null;
    cpl: number;
    ctr: number;
    conversionRate: number;
}

interface Summary {
    totalClicks: number;
    totalImpressions: number;
    totalConversions: number;
    totalCost: number;
    totalRevenue: number;
    averageROI: number;
    averageCPL: number;
    averageCTR: number;
    averageConversionRate: number;
}

interface Props {
    campaigns?: Campaign[];
    summary?: Summary;
}

const props = withDefaults(defineProps<Props>(), {
    campaigns: () => [],
    summary: () => ({
        totalClicks: 0,
        totalImpressions: 0,
        totalConversions: 0,
        totalCost: 0,
        totalRevenue: 0,
        averageROI: 0,
        averageCPL: 0,
        averageCTR: 0,
        averageConversionRate: 0,
    }),
});

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
        title: 'Campaign Tracking',
        href: tracking().url,
    },
];

// Convert props to refs for filtering and pagination
const campaignsList = ref<Campaign[]>(props.campaigns);
const searchQuery = ref('');
const currentPage = ref(1);
const perPage = ref(10);
const showFilters = ref(false);
const customFiltersExpanded = ref(true);

// Filter form data
const filterForm = ref({
    name: '',
    source: '',
    medium: '',
    clicks: '',
    impressions: '',
    conversions: '',
    cost: '',
    revenue: '',
    roi: '',
    cpl: '',
    ctr: '',
    conversionRate: '',
});

// Dropdown visibility
const showSourceDropdown = ref(false);
const showMediumDropdown = ref(false);

// Searchable dropdown states
const sourceSearch = ref('');
const sourceSearchResults = ref<string[]>([]);
const sourceSearchLoading = ref(false);
const sourceSearchInputRef = ref<HTMLInputElement | null>(null);

const mediumSearch = ref('');
const mediumSearchResults = ref<string[]>([]);
const mediumSearchLoading = ref(false);
const mediumSearchInputRef = ref<HTMLInputElement | null>(null);

// Dropdown options (extracted from campaigns)
const sourceOptions = computed(() => {
    const sources = new Set<string>();
    campaignsList.value.forEach(campaign => {
        if (campaign.source) sources.add(campaign.source);
    });
    return Array.from(sources);
});

const mediumOptions = computed(() => {
    const mediums = new Set<string>();
    campaignsList.value.forEach(campaign => {
        if (campaign.medium) mediums.add(campaign.medium);
    });
    return Array.from(mediums);
});

// Update campaigns list when props change
watch(() => props.campaigns, (newCampaigns) => {
    campaignsList.value = newCampaigns;
}, { immediate: true, deep: true });

// Filter campaigns based on search query
const filteredCampaigns = computed(() => {
    let result = campaignsList.value;

    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (campaign) =>
                campaign.name.toLowerCase().includes(query) ||
                campaign.source.toLowerCase().includes(query) ||
                campaign.medium.toLowerCase().includes(query) ||
                campaign.campaign.toLowerCase().includes(query)
        );
    }

    // Apply filters
    if (filterForm.value.name) {
        result = result.filter(campaign =>
            campaign.name.toLowerCase().includes(filterForm.value.name.toLowerCase())
        );
    }
    if (filterForm.value.source) {
        result = result.filter(campaign =>
            campaign.source === filterForm.value.source
        );
    }
    if (filterForm.value.medium) {
        result = result.filter(campaign =>
            campaign.medium === filterForm.value.medium
        );
    }
    if (filterForm.value.clicks) {
        const value = parseFloat(filterForm.value.clicks);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.clicks >= value);
        }
    }
    if (filterForm.value.impressions) {
        const value = parseFloat(filterForm.value.impressions);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.impressions >= value);
        }
    }
    if (filterForm.value.conversions) {
        const value = parseFloat(filterForm.value.conversions);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.conversions >= value);
        }
    }
    if (filterForm.value.cost) {
        const value = parseFloat(filterForm.value.cost);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.cost >= value);
        }
    }
    if (filterForm.value.revenue) {
        const value = parseFloat(filterForm.value.revenue);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.revenue >= value);
        }
    }
    if (filterForm.value.roi) {
        const value = parseFloat(filterForm.value.roi);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.roi !== null && campaign.roi >= value);
        }
    }
    if (filterForm.value.cpl) {
        const value = parseFloat(filterForm.value.cpl);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.cpl >= value);
        }
    }
    if (filterForm.value.ctr) {
        const value = parseFloat(filterForm.value.ctr);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.ctr >= value);
        }
    }
    if (filterForm.value.conversionRate) {
        const value = parseFloat(filterForm.value.conversionRate);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.conversionRate >= value);
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

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(amount);
};

// Filter modal functions
const closeAllDropdowns = (except?: 'source' | 'medium') => {
    if (except !== 'source') {
        showSourceDropdown.value = false;
        sourceSearch.value = '';
        sourceSearchResults.value = [];
    }
    if (except !== 'medium') {
        showMediumDropdown.value = false;
        mediumSearch.value = '';
        mediumSearchResults.value = [];
    }
};

const openFilters = () => {
    showFilters.value = true;
};

const closeFilters = () => {
    showFilters.value = false;
    closeAllDropdowns();
};

const openSourceDropdown = () => {
    closeAllDropdowns('source');
    showSourceDropdown.value = !showSourceDropdown.value;
    if (showSourceDropdown.value) {
        nextTick(() => {
            if (sourceSearchInputRef.value) {
                sourceSearchInputRef.value.focus();
            }
        });
    }
};

const openMediumDropdown = () => {
    closeAllDropdowns('medium');
    showMediumDropdown.value = !showMediumDropdown.value;
    if (showMediumDropdown.value) {
        nextTick(() => {
            if (mediumSearchInputRef.value) {
                mediumSearchInputRef.value.focus();
            }
        });
    }
};

const searchSource = (query: string) => {
    sourceSearch.value = query;
    
    if (!query.trim()) {
        sourceSearchResults.value = [];
        sourceSearchLoading.value = false;
        return;
    }
    
    sourceSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = sourceOptions.value.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        sourceSearchResults.value = filtered;
        sourceSearchLoading.value = false;
    }, 300);
};

const searchMedium = (query: string) => {
    mediumSearch.value = query;
    
    if (!query.trim()) {
        mediumSearchResults.value = [];
        mediumSearchLoading.value = false;
        return;
    }
    
    mediumSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = mediumOptions.value.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        mediumSearchResults.value = filtered;
        mediumSearchLoading.value = false;
    }, 300);
};

const selectSource = (source: string) => {
    filterForm.value.source = source;
    showSourceDropdown.value = false;
    sourceSearch.value = '';
    sourceSearchResults.value = [];
};

const selectMedium = (medium: string) => {
    filterForm.value.medium = medium;
    showMediumDropdown.value = false;
    mediumSearch.value = '';
    mediumSearchResults.value = [];
};

const clearSource = () => {
    filterForm.value.source = '';
    sourceSearch.value = '';
    sourceSearchResults.value = [];
};

const clearMedium = () => {
    filterForm.value.medium = '';
    mediumSearch.value = '';
    mediumSearchResults.value = [];
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
        showSourceDropdown.value = false;
        showMediumDropdown.value = false;
        
        // Reset search states when closing
        if (!showSourceDropdown.value) {
            sourceSearch.value = '';
            sourceSearchResults.value = [];
        }
        if (!showMediumDropdown.value) {
            mediumSearch.value = '';
            mediumSearchResults.value = [];
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
    <Head title="Campaign Tracking" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Campaign Tracking</h1>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <Link
                        :href="campaigns().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
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
                        :href="workflows().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Workflows
                    </Link>
                    <Link
                        :href="tracking().url"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
                    >
                        Tracking
                    </Link>
                </div>

                <!-- Summary Stats -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Total Clicks</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ formatNumber(props.summary.totalClicks) }}</p>
                            </div>
                            <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900/20">
                                <MousePointerClick class="size-5 text-blue-600 dark:text-blue-400" />
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Total Conversions</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ formatNumber(props.summary.totalConversions) }}</p>
                            </div>
                            <div class="rounded-full bg-green-100 p-3 dark:bg-green-900/20">
                                <Users class="size-5 text-green-600 dark:text-green-400" />
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Total Revenue</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ formatCurrency(props.summary.totalRevenue) }}</p>
                            </div>
                            <div class="rounded-full bg-yellow-100 p-3 dark:bg-yellow-900/20">
                                <DollarSign class="size-5 text-yellow-600 dark:text-yellow-400" />
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Average ROI</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ props.summary.averageROI.toFixed(1) }}%</p>
                            </div>
                            <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900/20">
                                <TrendingUp class="size-5 text-purple-600 dark:text-purple-400" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Metrics -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                    <div class="rounded-lg border border-border bg-card p-4">
                        <p class="text-sm font-medium text-muted-foreground">Average CTR</p>
                        <p class="mt-1 text-xl font-semibold text-foreground">{{ props.summary.averageCTR.toFixed(2) }}%</p>
                    </div>
                    <div class="rounded-lg border border-border bg-card p-4">
                        <p class="text-sm font-medium text-muted-foreground">Conversion Rate</p>
                        <p class="mt-1 text-xl font-semibold text-foreground">{{ props.summary.averageConversionRate.toFixed(2) }}%</p>
                    </div>
                    <div class="rounded-lg border border-border bg-card p-4">
                        <p class="text-sm font-medium text-muted-foreground">Cost per Lead</p>
                        <p class="mt-1 text-xl font-semibold text-foreground">{{ formatCurrency(props.summary.averageCPL) }}</p>
                    </div>
                    <div class="rounded-lg border border-border bg-card p-4">
                        <p class="text-sm font-medium text-muted-foreground">Total Cost</p>
                        <p class="mt-1 text-xl font-semibold text-foreground">{{ formatCurrency(props.summary.totalCost) }}</p>
                    </div>
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
                                Source/Medium
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Clicks
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Impressions
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Conversions
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Cost
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Revenue
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                ROI
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                CPL
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                CTR
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Conv. Rate
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredCampaigns.length === 0">
                            <td colspan="11" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <p class="text-sm text-muted-foreground">No campaigns found</p>
                                    <p class="text-xs text-muted-foreground">
                                        {{ searchQuery ? 'Try adjusting your search criteria' : 'No campaign data available' }}
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
                                <span class="text-foreground">{{ campaign.name }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm">
                                    <span class="text-foreground">{{ campaign.source }}</span>
                                    <span class="text-muted-foreground"> / {{ campaign.medium }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatNumber(campaign.clicks) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatNumber(campaign.impressions) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="font-medium text-foreground">{{ formatNumber(campaign.conversions) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatCurrency(campaign.cost) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="font-medium text-green-600 dark:text-green-400">{{ formatCurrency(campaign.revenue) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span
                                    v-if="campaign.roi !== null"
                                    :class="[
                                        'font-medium',
                                        campaign.roi > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400',
                                    ]"
                                >
                                    {{ campaign.roi.toFixed(1) }}%
                                </span>
                                <span v-else class="text-muted-foreground">-</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatCurrency(campaign.cpl) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ campaign.ctr.toFixed(2) }}%</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ campaign.conversionRate.toFixed(2) }}%</span>
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

                            <!-- Source Searchable Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Source
                                </label>
                                <button
                                    @click.stop="openSourceDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.source ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                        {{ filterForm.source || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.source && !showSourceDropdown"
                                            @click.stop="clearSource"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear source"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                
                                <!-- Search Popup -->
                                <div
                                    v-if="showSourceDropdown"
                                    @click.stop
                                    class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="el => { if (el) sourceSearchInputRef = el as HTMLInputElement }"
                                            :value="sourceSearch"
                                            @input="searchSource(($event.target as HTMLInputElement).value)"
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                        />
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                            <div v-if="sourceSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Search Results Dropdown -->
                                    <div class="max-h-48 overflow-y-auto border-t border-border">
                                        <div v-if="sourceSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                            Searching...
                                        </div>
                                        <div v-else-if="sourceSearchResults && sourceSearchResults.length > 0">
                                            <button
                                                v-for="option in sourceSearchResults"
                                                :key="option"
                                                @click="selectSource(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else-if="!sourceSearch && sourceOptions.length > 0">
                                            <button
                                                v-for="option in sourceOptions"
                                                :key="option"
                                                @click="selectSource(option)"
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

                            <!-- Medium Searchable Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Medium
                                </label>
                                <button
                                    @click.stop="openMediumDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.medium ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                        {{ filterForm.medium || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.medium && !showMediumDropdown"
                                            @click.stop="clearMedium"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear medium"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                
                                <!-- Search Popup -->
                                <div
                                    v-if="showMediumDropdown"
                                    @click.stop
                                    class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="el => { if (el) mediumSearchInputRef = el as HTMLInputElement }"
                                            :value="mediumSearch"
                                            @input="searchMedium(($event.target as HTMLInputElement).value)"
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                        />
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                            <div v-if="mediumSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Search Results Dropdown -->
                                    <div class="max-h-48 overflow-y-auto border-t border-border">
                                        <div v-if="mediumSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                            Searching...
                                        </div>
                                        <div v-else-if="mediumSearchResults && mediumSearchResults.length > 0">
                                            <button
                                                v-for="option in mediumSearchResults"
                                                :key="option"
                                                @click="selectMedium(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else-if="!mediumSearch && mediumOptions.length > 0">
                                            <button
                                                v-for="option in mediumOptions"
                                                :key="option"
                                                @click="selectMedium(option)"
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

                            <!-- Clicks Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Clicks
                                </label>
                                <Input
                                    v-model="filterForm.clicks"
                                    type="text"
                                    placeholder="Clicks"
                                    class="w-full"
                                />
                            </div>

                            <!-- Impressions Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Impressions
                                </label>
                                <Input
                                    v-model="filterForm.impressions"
                                    type="text"
                                    placeholder="Impressions"
                                    class="w-full"
                                />
                            </div>

                            <!-- Conversions Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Conversions
                                </label>
                                <Input
                                    v-model="filterForm.conversions"
                                    type="text"
                                    placeholder="Conversions"
                                    class="w-full"
                                />
                            </div>

                            <!-- Cost Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Cost
                                </label>
                                <Input
                                    v-model="filterForm.cost"
                                    type="text"
                                    placeholder="Cost"
                                    class="w-full"
                                />
                            </div>

                            <!-- Revenue Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Revenue
                                </label>
                                <Input
                                    v-model="filterForm.revenue"
                                    type="text"
                                    placeholder="Revenue"
                                    class="w-full"
                                />
                            </div>

                            <!-- ROI Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    ROI
                                </label>
                                <Input
                                    v-model="filterForm.roi"
                                    type="text"
                                    placeholder="ROI"
                                    class="w-full"
                                />
                            </div>

                            <!-- CPL Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    CPL
                                </label>
                                <Input
                                    v-model="filterForm.cpl"
                                    type="text"
                                    placeholder="CPL"
                                    class="w-full"
                                />
                            </div>

                            <!-- CTR Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    CTR
                                </label>
                                <Input
                                    v-model="filterForm.ctr"
                                    type="text"
                                    placeholder="CTR"
                                    class="w-full"
                                />
                            </div>

                            <!-- Conversion Rate Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Conversion Rate
                                </label>
                                <Input
                                    v-model="filterForm.conversionRate"
                                    type="text"
                                    placeholder="Conversion Rate"
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
