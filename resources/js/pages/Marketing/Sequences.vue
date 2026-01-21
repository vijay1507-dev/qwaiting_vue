<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import marketingRoutes, { campaigns, sequences } from '@/routes/marketing';
import {
    create as sequencesCreate,
    edit as sequencesEdit,
} from '@/routes/marketing/sequences';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import {
    ChevronDown,
    ChevronLeft,
    ChevronRight,
    ChevronUp,
    Edit,
    Filter,
    Plus,
    Search,
    Trash2,
    X,
} from 'lucide-vue-next';
import { computed, nextTick, onMounted, onUnmounted, ref, watch } from 'vue';
const { systemTemplates } = marketingRoutes;

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
        href: sequences().url,
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
watch(
    () => props.sequences,
    (newSequences) => {
        sequencesList.value = newSequences;
    },
    { immediate: true, deep: true },
);

const filteredSequences = computed(() => {
    let result = sequencesList.value;

    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (sequence) =>
                sequence.name.toLowerCase().includes(query) ||
                sequence.description.toLowerCase().includes(query),
        );
    }

    // Apply filters
    if (filterForm.value.name) {
        result = result.filter((sequence) =>
            sequence.name
                .toLowerCase()
                .includes(filterForm.value.name.toLowerCase()),
        );
    }
    if (filterForm.value.description) {
        result = result.filter((sequence) =>
            sequence.description
                .toLowerCase()
                .includes(filterForm.value.description.toLowerCase()),
        );
    }
    if (filterForm.value.status) {
        result = result.filter(
            (sequence) => sequence.status === filterForm.value.status,
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
    const end = Math.min(
        currentPage.value * perPage.value,
        filteredSequences.value.length,
    );
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
    if (
        confirm(
            'Are you sure you want to delete this sequence? This action cannot be undone.',
        )
    ) {
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
        const filtered = statusOptions.filter((option) =>
            option.toLowerCase().includes(query.toLowerCase()),
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
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        Sequences Notifications
                    </h1>
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
                        v-if="
                            $page.props.auth.permissions.includes(
                                'marketing.sequences.read',
                            )
                        "
                        :href="'/marketing/sequences'"
                        :class="[
                            'cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition-colors',
                            'border-blue-600 text-foreground',
                        ]"
                    >
                        Sequences Notifications
                    </Link>
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'marketing.system_templates.read',
                            )
                        "
                        :href="systemTemplates.index().url"
                        class="cursor-pointer border-b-2 border-transparent px-4 py-2 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
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
                        <div class="relative max-w-xs flex-1">
                            <Search
                                class="absolute top-1/2 left-2.5 size-3.5 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search"
                                class="h-8 pl-8 text-sm"
                            />
                        </div>
                        <Button
                            variant="outline"
                            size="sm"
                            class="h-8 text-xs"
                            @click="openFilters"
                        >
                            <Filter class="size-3.5" />
                            Filter
                        </Button>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Pagination Controls -->
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-muted-foreground"
                                >Per Page</span
                            >
                            <select
                                v-model="perPage"
                                class="h-7 rounded-md border border-input bg-background px-2 py-1 text-xs focus:ring-2 focus:ring-ring focus:outline-none"
                            >
                                <option :value="10">10</option>
                                <option :value="25">25</option>
                                <option :value="50">50</option>
                                <option :value="100">100</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground">{{
                                paginationInfo
                            }}</span>
                            <div class="flex items-center gap-1">
                                <button
                                    @click="goToPage(currentPage - 1)"
                                    :disabled="currentPage === 1"
                                    class="cursor-pointer rounded-md p-1 hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                    type="button"
                                >
                                    <ChevronLeft
                                        class="size-4 text-muted-foreground"
                                    />
                                </button>
                                <button
                                    @click="goToPage(currentPage + 1)"
                                    :disabled="currentPage === totalPages"
                                    class="cursor-pointer rounded-md p-1 hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                    type="button"
                                >
                                    <ChevronRight
                                        class="size-4 text-muted-foreground"
                                    />
                                </button>
                            </div>
                        </div>
                        <Link
                            v-if="
                                $page.props.auth.permissions.includes(
                                    'marketing.sequences.create',
                                )
                            "
                            :href="sequencesCreate().url"
                        >
                            <Button
                                class="h-8 bg-blue-600 px-3 text-xs text-white hover:bg-blue-700"
                            >
                                <Plus class="mr-2 size-3.5" />
                                <span class="hidden sm:inline"
                                    >Create Sequence</span
                                >
                                <span class="sm:hidden">Create</span>
                            </Button>
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div
                class="flex-1 overflow-auto rounded-md border border-border bg-card"
            >
                <table class="w-full text-sm">
                    <thead class="sticky top-0 z-10 bg-muted/50">
                        <tr>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Sequence Name
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Description
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Status
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Created
                            </th>
                            <th
                                v-if="
                                    $page.props.auth.permissions.includes(
                                        'marketing.sequences.update',
                                    ) ||
                                    $page.props.auth.permissions.includes(
                                        'marketing.sequences.delete',
                                    )
                                "
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredSequences.length === 0">
                            <td colspan="5" class="px-4 py-12 text-center">
                                <div
                                    class="flex flex-col items-center justify-center gap-2"
                                >
                                    <p class="text-sm text-muted-foreground">
                                        No sequences found
                                    </p>
                                    <p class="text-xs text-muted-foreground">
                                        {{
                                            searchQuery
                                                ? 'Try adjusting your search criteria'
                                                : 'Create your first sequence to get started'
                                        }}
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
                                <span class="text-foreground">{{
                                    sequence.name
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-sm text-muted-foreground">{{
                                    sequence.description
                                }}</span>
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
                                <span class="text-sm text-muted-foreground">{{
                                    sequence.createdAt
                                }}</span>
                            </td>
                            <td
                                v-if="
                                    $page.props.auth.permissions.includes(
                                        'marketing.sequences.update',
                                    ) ||
                                    $page.props.auth.permissions.includes(
                                        'marketing.sequences.delete',
                                    )
                                "
                                class="px-4 py-3 align-middle"
                            >
                                <div class="flex items-center gap-2">
                                    <Link
                                        v-if="
                                            $page.props.auth.permissions.includes(
                                                'marketing.sequences.update',
                                            )
                                        "
                                        :href="sequencesEdit(sequence.id).url"
                                    >
                                        <button
                                            class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                            title="Edit"
                                        >
                                            <Edit
                                                class="size-4 text-muted-foreground"
                                            />
                                        </button>
                                    </Link>
                                    <button
                                        v-if="
                                            $page.props.auth.permissions.includes(
                                                'marketing.sequences.delete',
                                            )
                                        "
                                        @click="deleteSequence(sequence.id)"
                                        class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-red-50 dark:hover:bg-red-900/20"
                                        title="Delete"
                                    >
                                        <Trash2
                                            class="size-4 text-red-600 dark:text-red-400"
                                        />
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
            <div
                class="relative h-full w-full max-w-sm transform overflow-y-auto bg-white shadow-xl transition-transform duration-300 ease-in-out dark:bg-gray-900"
            >
                <!-- Header -->
                <div
                    class="sticky top-0 z-10 flex items-center justify-between border-b border-border bg-white px-6 py-4 dark:bg-gray-900"
                >
                    <h2 class="text-lg font-semibold text-foreground">
                        Filters
                    </h2>
                    <button
                        @click="closeFilters"
                        type="button"
                        class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                        aria-label="Close filters"
                    >
                        <X class="size-5 text-muted-foreground" />
                    </button>
                </div>

                <!-- Filters Content -->
                <div class="space-y-6 p-6">
                    <!-- Custom Filters Section -->
                    <div>
                        <button
                            @click="
                                customFiltersExpanded = !customFiltersExpanded
                            "
                            class="mb-4 flex w-full cursor-pointer items-center justify-between"
                            type="button"
                        >
                            <h3 class="text-base font-semibold text-foreground">
                                Custom Filters
                            </h3>
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
                                <label
                                    class="mb-2 block text-sm font-medium text-foreground"
                                >
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
                                <label
                                    class="mb-2 block text-sm font-medium text-foreground"
                                >
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
                                <label
                                    class="mb-2 block text-sm font-medium text-foreground"
                                >
                                    Status
                                </label>
                                <button
                                    @click.stop="openStatusDropdown"
                                    type="button"
                                    class="flex w-full cursor-pointer items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-left text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                >
                                    <span
                                        :class="
                                            filterForm.status
                                                ? 'text-foreground'
                                                : 'text-muted-foreground'
                                        "
                                        class="flex-1 truncate"
                                    >
                                        {{ filterForm.status || 'Select' }}
                                    </span>
                                    <div
                                        class="flex shrink-0 items-center gap-1"
                                    >
                                        <button
                                            v-if="
                                                filterForm.status &&
                                                !showStatusDropdown
                                            "
                                            @click.stop="clearStatus"
                                            type="button"
                                            class="cursor-pointer rounded p-0.5 transition-colors hover:bg-muted"
                                            aria-label="Clear status"
                                        >
                                            <X
                                                class="size-3.5 text-muted-foreground hover:text-foreground"
                                            />
                                        </button>
                                        <ChevronDown
                                            class="size-4 text-muted-foreground"
                                        />
                                    </div>
                                </button>

                                <!-- Search Popup -->
                                <div
                                    v-if="showStatusDropdown"
                                    @click.stop
                                    class="absolute top-full right-0 left-0 z-[9999] mt-1 rounded-md border border-border bg-white shadow-lg dark:bg-gray-800"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="
                                                (el) => {
                                                    if (el)
                                                        statusSearchInputRef =
                                                            el as HTMLInputElement;
                                                }
                                            "
                                            :value="statusSearch"
                                            @input="
                                                searchStatus(
                                                    (
                                                        $event.target as HTMLInputElement
                                                    ).value,
                                                )
                                            "
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 pr-10 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        />
                                        <div
                                            class="absolute top-1/2 right-3 -translate-y-1/2"
                                        >
                                            <div
                                                v-if="statusSearchLoading"
                                                class="size-4 animate-spin rounded-full border-2 border-muted-foreground border-t-transparent"
                                            ></div>
                                        </div>
                                    </div>

                                    <!-- Search Results Dropdown -->
                                    <div
                                        class="max-h-48 overflow-y-auto border-t border-border"
                                    >
                                        <div
                                            v-if="statusSearchLoading"
                                            class="px-3 py-2 text-xs text-muted-foreground"
                                        >
                                            Searching...
                                        </div>
                                        <div
                                            v-else-if="
                                                statusSearchResults &&
                                                statusSearchResults.length > 0
                                            "
                                        >
                                            <button
                                                v-for="option in statusSearchResults"
                                                :key="option"
                                                @click="selectStatus(option)"
                                                type="button"
                                                class="w-full cursor-pointer px-3 py-2 text-left text-sm text-foreground transition-colors hover:bg-muted"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div
                                            v-else-if="
                                                !statusSearch &&
                                                statusOptions.length > 0
                                            "
                                        >
                                            <button
                                                v-for="option in statusOptions"
                                                :key="option"
                                                @click="selectStatus(option)"
                                                type="button"
                                                class="w-full cursor-pointer px-3 py-2 text-left text-sm text-foreground transition-colors hover:bg-muted"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div
                                            v-else
                                            class="px-3 py-2 text-xs text-muted-foreground"
                                        >
                                            No result found
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Created At Field -->
                            <div>
                                <label
                                    class="mb-2 block text-sm font-medium text-foreground"
                                >
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
                <div
                    class="sticky bottom-0 flex items-center justify-between gap-3 border-t border-border bg-white px-6 py-4 dark:bg-gray-900"
                >
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
                        class="cursor-pointer bg-blue-600 text-white hover:bg-blue-700"
                        @click="applyFilters"
                    >
                        Apply Filters
                    </Button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
