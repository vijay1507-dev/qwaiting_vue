<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { campaigns, workflows, tracking } from '@/routes/marketing';
import marketingRoutes from '@/routes/marketing';
const { systemTemplates } = marketingRoutes;
import { create as sequencesCreate, edit as sequencesEdit } from '@/routes/marketing/sequences';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, Plus, Filter, Edit, Trash2, Mail, Clock, ChevronLeft, ChevronRight, X, ChevronUp, ChevronDown } from 'lucide-vue-next';

interface Sequence {
    id: string;
    name: string;
    description: string;
    status: string;
    totalEmails: number;
    emails: Array<{
        id: string;
        number: number;
        timing: string;
        subject: string;
        type: string;
        status: string;
    }>;
    createdAt: string;
}

interface Props {
    sequences: Sequence[];
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
        title: 'Sequences Notifications',
        href: '#',
    },
];

const sequencesList = ref<Sequence[]>(props.sequences);
const searchQuery = ref('');
const currentPage = ref(1);
const perPage = ref(10);
const showFilters = ref(false);
const customFiltersExpanded = ref(true);

// Filter form data
const filterForm = ref({
    name: '',
    description: '',
    status: '',
    createdAt: '',
});

// Dropdown visibility
const showStatusDropdown = ref(false);

// Searchable dropdown states
const statusSearch = ref('');
const statusSearchResults = ref<string[]>([]);
const statusSearchLoading = ref(false);
const statusSearchInputRef = ref<HTMLInputElement | null>(null);

// Dropdown options
const statusOptions = ['active', 'paused'];

// Update sequences list when props change
watch(() => props.sequences, (newSequences) => {
    sequencesList.value = newSequences;
}, { immediate: true, deep: true });

const filteredSequences = computed(() => {
    let result = sequencesList.value;

    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (sequence) =>
                sequence.name.toLowerCase().includes(query) ||
                sequence.description.toLowerCase().includes(query)
        );
    }

    // Apply filters
    if (filterForm.value.name) {
        result = result.filter(sequence =>
            sequence.name.toLowerCase().includes(filterForm.value.name.toLowerCase())
        );
    }
    if (filterForm.value.description) {
        result = result.filter(sequence =>
            sequence.description.toLowerCase().includes(filterForm.value.description.toLowerCase())
        );
    }
    if (filterForm.value.status) {
        result = result.filter(sequence =>
            sequence.status === filterForm.value.status
        );
    }

    return result;
});

// Pagination
const paginatedSequences = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return filteredSequences.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredSequences.value.length / perPage.value);
});

const paginationInfo = computed(() => {
    const start = (currentPage.value - 1) * perPage.value + 1;
    const end = Math.min(currentPage.value * perPage.value, filteredSequences.value.length);
    return `${start} - ${end} of ${filteredSequences.value.length}`;
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
watch(filteredSequences, () => {
    if (currentPage.value > totalPages.value && totalPages.value > 0) {
        currentPage.value = totalPages.value;
    }
});

const getStatusColor = (status: string): string => {
    switch (status) {
        case 'active':
            return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
        case 'paused':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};

const formatNumber = (num: number): string => {
    if (num >= 1000000) {
        return (num / 1000000).toFixed(1) + 'M';
    }
    if (num >= 1000) {
        return (num / 1000).toFixed(1) + 'K';
    }
    return num.toString();
};

const deleteSequence = (id: string) => {
    if (confirm('Are you sure you want to delete this sequence? This action cannot be undone.')) {
        router.delete(`/marketing/sequences/${id}`, {
            preserveScroll: true,
        });
    }
};

// Filter modal functions
const closeAllDropdowns = () => {
    showStatusDropdown.value = false;
    statusSearch.value = '';
    statusSearchResults.value = [];
};

const openFilters = () => {
    showFilters.value = true;
};

const closeFilters = () => {
    showFilters.value = false;
    closeAllDropdowns();
};

const openStatusDropdown = () => {
    closeAllDropdowns();
    showStatusDropdown.value = !showStatusDropdown.value;
    if (showStatusDropdown.value) {
        nextTick(() => {
            if (statusSearchInputRef.value) {
                statusSearchInputRef.value.focus();
            }
        });
    }
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

const selectStatus = (status: string) => {
    filterForm.value.status = status;
    showStatusDropdown.value = false;
    statusSearch.value = '';
    statusSearchResults.value = [];
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
        showStatusDropdown.value = false;
        
        // Reset search states when closing
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
    <Head title="Sequences Notifications" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Sequences Notifications</h1>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <!-- <Link
                        :href="campaigns().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Campaigns
                    </Link> -->
                    <Link
                        :href="'/marketing/sequences'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
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
                        <Link :href="sequencesCreate().url">
                            <Button class="bg-blue-600 hover:bg-blue-700 text-white h-8 px-3 text-xs">
                                <Plus class="mr-2 size-3.5" />
                                Create Sequence
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
                                Sequence Name
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Description
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Status
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Created
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredSequences.length === 0">
                            <td colspan="5" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <p class="text-sm text-muted-foreground">No sequences found</p>
                                    <p class="text-xs text-muted-foreground">
                                        {{ searchQuery ? 'Try adjusting your search criteria' : 'Create your first sequence to get started' }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-for="sequence in paginatedSequences"
                            :key="sequence.id"
                            class="border-b border-border transition-colors hover:bg-muted/50"
                        >
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ sequence.name }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-sm text-muted-foreground">{{ sequence.description }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span
                                    :class="[
                                        'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                        getStatusColor(sequence.status),
                                    ]"
                                >
                                    {{ sequence.status }}
                                </span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-sm text-muted-foreground">{{ sequence.createdAt }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Link :href="sequencesEdit(sequence.id).url">
                                        <button
                                            class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                            title="Edit"
                                        >
                                            <Edit class="size-4 text-muted-foreground" />
                                        </button>
                                    </Link>
                                    <button
                                        @click="deleteSequence(sequence.id)"
                                        class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                        title="Delete"
                                    >
                                        <Trash2 class="size-4 text-red-600 dark:text-red-400" />
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
                            <!-- Sequence Name Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Sequence Name
                                </label>
                                <Input
                                    v-model="filterForm.name"
                                    type="text"
                                    placeholder="Sequence Name"
                                    class="w-full"
                                />
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Description
                                </label>
                                <Input
                                    v-model="filterForm.description"
                                    type="text"
                                    placeholder="Description"
                                    class="w-full"
                                />
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
