<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { campaigns, sequences, workflows, tracking } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Mail, TrendingUp, Users, DollarSign, MousePointerClick, Eye, Send, ChevronLeft, ChevronRight, Search, Filter, X, ChevronUp, ChevronDown } from 'lucide-vue-next';
import { Input } from '@/components/ui/input';

interface Props {
    stats: {
        totalCampaigns: number;
        activeCampaigns: number;
        totalEmailsSent: number;
        openRate: number;
        clickRate: number;
        conversionRate: number;
        revenue: number;
    };
    recentCampaigns: Array<{
        id: string;
        name: string;
        type: string;
        status: string;
        recipients: number;
        openRate: number;
        clickRate: number;
        createdAt: string;
    }>;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Marketing Automation',
        href: '#',
    },
];

const recentCampaignsList = ref(props.recentCampaigns);
const searchQuery = ref('');
const currentPage = ref(1);
const perPage = ref(10);
const showFilters = ref(false);
const customFiltersExpanded = ref(true);

// Filter form data
const filterForm = ref({
    name: '',
    type: '',
    status: '',
    recipients: '',
    openRate: '',
    clickRate: '',
    createdAt: '',
});

// Dropdown visibility
const showTypeDropdown = ref(false);
const showStatusDropdown = ref(false);

// Searchable dropdown states
const typeSearch = ref('');
const typeSearchResults = ref<string[]>([]);
const typeSearchLoading = ref(false);
const typeSearchInputRef = ref<HTMLInputElement | null>(null);

const statusSearch = ref('');
const statusSearchResults = ref<string[]>([]);
const statusSearchLoading = ref(false);
const statusSearchInputRef = ref<HTMLInputElement | null>(null);

// Dropdown options (extracted from campaigns)
const typeOptions = computed(() => {
    const types = new Set<string>();
    recentCampaignsList.value.forEach(campaign => {
        if (campaign.type) types.add(campaign.type);
    });
    return Array.from(types);
});

const statusOptions = ['active', 'completed', 'scheduled'];

// Update campaigns list when props change
watch(() => props.recentCampaigns, (newCampaigns) => {
    recentCampaignsList.value = newCampaigns;
}, { immediate: true, deep: true });

// Filter campaigns based on search query
const filteredCampaigns = computed(() => {
    let result = recentCampaignsList.value;

    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (campaign) =>
                campaign.name.toLowerCase().includes(query) ||
                campaign.type.toLowerCase().includes(query) ||
                campaign.status.toLowerCase().includes(query)
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
    if (filterForm.value.status) {
        result = result.filter(campaign =>
            campaign.status === filterForm.value.status
        );
    }
    if (filterForm.value.recipients) {
        const value = parseFloat(filterForm.value.recipients);
        if (!isNaN(value)) {
            result = result.filter(campaign => campaign.recipients >= value);
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

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    }).format(amount);
};

const getStatusColor = (status: string): string => {
    switch (status) {
        case 'active':
            return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
        case 'completed':
            return 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400';
        case 'scheduled':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};

// Filter modal functions
const closeAllDropdowns = (except?: 'type' | 'status') => {
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

const searchType = (query: string) => {
    typeSearch.value = query;
    
    if (!query.trim()) {
        typeSearchResults.value = [];
        typeSearchLoading.value = false;
        return;
    }
    
    typeSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = typeOptions.value.filter(option =>
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
        showTypeDropdown.value = false;
        showStatusDropdown.value = false;
        
        // Reset search states when closing
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
    <Head title="Marketing Automation" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Marketing Automation</h1>
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
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Tracking
                    </Link>
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

                            <!-- Recipients Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Recipients
                                </label>
                                <Input
                                    v-model="filterForm.recipients"
                                    type="text"
                                    placeholder="Recipients"
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
