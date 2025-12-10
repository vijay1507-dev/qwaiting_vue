<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { index as leadsIndex } from '@/routes/leads';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import KanbanBoard, { type Lead } from '@/components/leads/KanbanBoard.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, Plus, Filter, X, ChevronDown } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Leads',
        href: leadsIndex().url,
    },
];

// Generate dummy leads data for all stages
const generateDummyLeads = (): Lead[] => {
    const names = [
        'Billy James', 'Lucy Mark', 'Eddy Collins', 'Oliver Queen',
        'Sasha Calle', 'Shelly Josh', 'Wilson Fisk', 'Carol Denvers',
        'John Smith', 'Sarah Johnson', 'Mike Davis', 'Emma Wilson',
        'David Brown', 'Lisa Anderson', 'Chris Taylor', 'Amy Martinez',
    ];
    
    const companies = [
        'SentinelSecure', 'ShieldGuard Security', 'VigilantWatch', 'IronClad Defense',
        'CyberFortress Solutions', 'SecureNet Pro', 'DataGuard Inc', 'CloudShield Ltd',
        'TechSecure Corp', 'NetworkGuard', 'Firewall Solutions', 'SecurityPlus',
    ];
    
    const enquiries = [
        'ProjectPulse Enterprise Solution', 'Milestone360 for Goal Tracking',
        'TaskMaster Pro Implementation', 'CyberGuard Pro',
        'SecureFlow Business', 'DataShield Enterprise',
        'TeamTrack for Agile Development', 'SecureShield 360',
        'CloudConnect Integration', 'NetworkGuard Firewall',
        'EndpointProtect Suite', 'ThreatDetect AI Platform',
    ];
    
    const tagOptions = [
        ['Phone', 'New Business', 'Enquiry'],
        ['Direct', 'Small Market Business', 'Requirement', 'VIP Client'],
        ['Email', 'New Business', 'Urgent Sale', 'Super Priority', 'Requirement'],
        ['Phone', 'Technology Services', 'Requirement', 'Super Priority'],
        ['Web Form', 'Existing Business', 'Immediate Action'],
        ['Referral', 'Large Market Business'],
        ['Email', 'Existing Business'],
        ['Phone', 'Existing Business'],
    ];
    
    const values = [5000, 10000, 25000, 35000, 45000, 50000, 64000, 75000, 85000, 95000, 100000, 120000, 150000];
    
    const leads: Lead[] = [];
    let leadIndex = 0;
    
    // Helper to create a lead
    const createLead = (stage: string, count: number) => {
        for (let i = 0; i < count; i++) {
            const name = names[leadIndex % names.length];
            const company = companies[leadIndex % companies.length];
            const value = values[leadIndex % values.length];
            const tags = [...tagOptions[leadIndex % tagOptions.length]];
            tags.unshift('Example');
            tags.unshift(
                new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 2,
                }).format(value)
            );
            tags.push('Enquiry');
            
            leads.push({
                id: `${stage}-${i + 1}`,
                name,
                company,
                value,
                enquiry: `Enquiry: ${enquiries[leadIndex % enquiries.length]}`,
                tags,
                hasWarning: stage !== 'won' && stage !== 'lost' && stage !== 'on-hold',
                stage,
            });
            leadIndex++;
        }
    };
    
    // Create leads for each stage
    createLead('new-lead', 8);        // New Lead
    createLead('contacted', 6);      // Contacted
    createLead('qualified', 5);      // Qualified
    createLead('demo-completed', 7); // Demo Completed (merged)
    createLead('proposal-sent', 4);  // Proposal Sent
    createLead('negotiation', 3);    // Negotiation
    createLead('won', 5);            // Won
    createLead('lost', 3);           // Lost
    createLead('follow-up-required', 7); // Follow up required (merged follow-up and required)
    createLead('on-hold', 2);        // On-hold
    
    return leads;
};

const dummyLeads: Lead[] = generateDummyLeads();

const allLeads = ref<Lead[]>(dummyLeads);

const stages = computed(() => {
    const stageMap = {
        'new-lead': { id: 'new-lead', title: 'New Lead' },
        'contacted': { id: 'contacted', title: 'Contacted' },
        'qualified': { id: 'qualified', title: 'Qualified' },
        'demo-completed': { id: 'demo-completed', title: 'Demo Completed' },
        'proposal-sent': { id: 'proposal-sent', title: 'Proposal Sent' },
        'negotiation': { id: 'negotiation', title: 'Negotiation' },
        'won': { id: 'won', title: 'Won' },
        'lost': { id: 'lost', title: 'Lost' },
        'follow-up-required': { id: 'follow-up-required', title: 'Follow up required' },
        'on-hold': { id: 'on-hold', title: 'On-hold' },
    };

    return Object.values(stageMap).map((stage) => ({
        ...stage,
        leads: allLeads.value.filter((lead) => lead.stage === stage.id),
    }));
});

const searchQuery = ref('');
const showFilters = ref(false);

// Filter form data
const filterForm = ref({
    id: '',
    leadValue: '',
    salesPerson: '',
    contactPerson: '',
    leadType: '',
    source: '',
    priority: '',
});

// Dropdown visibility
const showSalesPersonDropdown = ref(false);
const showContactPersonDropdown = ref(false);
const showLeadTypeDropdown = ref(false);
const showSourceDropdown = ref(false);
const showPriorityDropdown = ref(false);

// Searchable dropdown states
const salesPersonSearch = ref('');
const salesPersonSearchResults = ref<string[]>([]);
const salesPersonSearchLoading = ref(false);
const salesPersonSearchInputRef = ref<HTMLInputElement | null>(null);

const contactPersonSearch = ref('');
const contactPersonSearchResults = ref<string[]>([]);
const contactPersonSearchLoading = ref(false);
const contactPersonSearchInputRef = ref<HTMLInputElement | null>(null);

// Dropdown options (dummy data)
const salesPersonOptions = ['John Doe', 'Jane Smith', 'Mike Johnson', 'Sarah Williams'];
const contactPersonOptions = ['Alice Brown', 'Bob Davis', 'Charlie Wilson', 'Diana Martinez'];
const leadTypeOptions = ['New Business', 'Existing Business', 'Small Market Business', 'Large Market Business'];
const sourceOptions = ['Phone', 'Email', 'Web Form', 'Referral', 'Direct'];
const priorityOptions = ['Hot', 'Warm', 'Cold'];

const closeAllDropdowns = (except?: 'salesPerson' | 'contactPerson' | 'leadType' | 'source' | 'priority') => {
    if (except !== 'salesPerson') {
        showSalesPersonDropdown.value = false;
        salesPersonSearch.value = '';
        salesPersonSearchResults.value = [];
    }
    if (except !== 'contactPerson') {
        showContactPersonDropdown.value = false;
        contactPersonSearch.value = '';
        contactPersonSearchResults.value = [];
    }
    if (except !== 'leadType') {
        showLeadTypeDropdown.value = false;
    }
    if (except !== 'source') {
        showSourceDropdown.value = false;
    }
    if (except !== 'priority') {
        showPriorityDropdown.value = false;
    }
};

const openFilters = () => {
    showFilters.value = true;
};

const closeFilters = () => {
    showFilters.value = false;
    closeAllDropdowns();
};

const openSalesPersonDropdown = () => {
    closeAllDropdowns('salesPerson');
    
    showSalesPersonDropdown.value = !showSalesPersonDropdown.value;
    if (showSalesPersonDropdown.value) {
        salesPersonSearch.value = '';
        salesPersonSearchResults.value = [];
        // Focus search input after DOM update
        nextTick(() => {
            salesPersonSearchInputRef.value?.focus();
        });
    }
};

const openContactPersonDropdown = () => {
    closeAllDropdowns('contactPerson');
    
    showContactPersonDropdown.value = !showContactPersonDropdown.value;
    if (showContactPersonDropdown.value) {
        contactPersonSearch.value = '';
        contactPersonSearchResults.value = [];
        // Focus search input after DOM update
        nextTick(() => {
            contactPersonSearchInputRef.value?.focus();
        });
    }
};

const searchSalesPerson = (query: string) => {
    salesPersonSearch.value = query;
    
    if (!query.trim()) {
        salesPersonSearchResults.value = [];
        salesPersonSearchLoading.value = false;
        return;
    }
    
    salesPersonSearchLoading.value = true;
    
    // Simulate API call
    setTimeout(() => {
        const filtered = salesPersonOptions.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        salesPersonSearchResults.value = filtered;
        salesPersonSearchLoading.value = false;
    }, 300);
};

const searchContactPerson = (query: string) => {
    contactPersonSearch.value = query;
    
    if (!query.trim()) {
        contactPersonSearchResults.value = [];
        contactPersonSearchLoading.value = false;
        return;
    }
    
    contactPersonSearchLoading.value = true;
    
    // Simulate API call
    setTimeout(() => {
        const filtered = contactPersonOptions.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        contactPersonSearchResults.value = filtered;
        contactPersonSearchLoading.value = false;
    }, 300);
};

const selectSalesPerson = (person: string) => {
    filterForm.value.salesPerson = person;
    showSalesPersonDropdown.value = false;
    salesPersonSearch.value = '';
    salesPersonSearchResults.value = [];
};

const selectContactPerson = (person: string) => {
    filterForm.value.contactPerson = person;
    showContactPersonDropdown.value = false;
    contactPersonSearch.value = '';
    contactPersonSearchResults.value = [];
};

const clearSalesPerson = () => {
    filterForm.value.salesPerson = '';
    salesPersonSearch.value = '';
    salesPersonSearchResults.value = [];
};

const clearContactPerson = () => {
    filterForm.value.contactPerson = '';
    contactPersonSearch.value = '';
    contactPersonSearchResults.value = [];
};

const clearLeadType = () => {
    filterForm.value.leadType = '';
};

const clearSource = () => {
    filterForm.value.source = '';
};

const clearPriority = () => {
    filterForm.value.priority = '';
};

const openLeadTypeDropdown = () => {
    closeAllDropdowns('leadType');
    showLeadTypeDropdown.value = !showLeadTypeDropdown.value;
};

const openSourceDropdown = () => {
    closeAllDropdowns('source');
    showSourceDropdown.value = !showSourceDropdown.value;
};

const openPriorityDropdown = () => {
    closeAllDropdowns('priority');
    showPriorityDropdown.value = !showPriorityDropdown.value;
};

const applyFilters = () => {
    // TODO: Implement actual filter logic
    console.log('Applying filters:', filterForm.value);
    closeFilters();
};

const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    
    // Close dropdowns if clicking outside
    if (!target.closest('.dropdown-container')) {
        showSalesPersonDropdown.value = false;
        showContactPersonDropdown.value = false;
        showLeadTypeDropdown.value = false;
        showSourceDropdown.value = false;
        
        // Reset search states when closing
        if (!showSalesPersonDropdown.value) {
            salesPersonSearch.value = '';
            salesPersonSearchResults.value = [];
        }
        if (!showContactPersonDropdown.value) {
            contactPersonSearch.value = '';
            contactPersonSearchResults.value = [];
        }
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});

const filteredStages = computed(() => {
    if (!searchQuery.value.trim()) {
        return stages.value;
    }

    const query = searchQuery.value.toLowerCase();
    return stages.value.map((stage) => ({
        ...stage,
                leads: stage.leads.filter(
                    (lead) =>
                        lead.name.toLowerCase().includes(query) ||
                        lead.company.toLowerCase().includes(query) ||
                        lead.enquiry?.toLowerCase().includes(query) ||
                        lead.tags.some((tag) => tag.toLowerCase().includes(query))
                ),
    }));
});

const handleLeadMoved = (leadId: string, fromStage: string, toStage: string) => {
    const lead = allLeads.value.find((l) => l.id === leadId);
    if (lead) {
        lead.stage = toStage;
    }
};
</script>

<template>
    <Head title="Leads" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Leads</h1>
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
                                placeholder="Search by Title"
                                class="pl-8 h-8 text-sm"
                            />
                        </div>
                        <Button variant="outline" size="sm" class="h-8 text-xs" @click="openFilters">
                            <Filter class="size-3.5" />
                            Filter
                        </Button>
                    </div>

                    <div class="flex items-center gap-2">
                        <Button 
                            size="sm" 
                            class="h-8 text-xs"
                            @click="router.visit('/leads/create')"
                        >
                            <Plus class="size-3.5" />
                            Create Lead
                        </Button>
                    </div>
                </div>
            </div>

            <!-- Kanban Board -->
            <div class="flex-1 overflow-x-auto">
                <KanbanBoard
                    :stages="filteredStages"
                    @lead-moved="handleLeadMoved"
                />
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
            <div class="filters-modal relative h-full w-full max-w-sm bg-white dark:bg-gray-900 shadow-xl overflow-y-auto transform transition-transform duration-300 ease-in-out">
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
                    <!-- ID Field -->
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-2">
                            ID
                        </label>
                        <Input
                            v-model="filterForm.id"
                            type="text"
                            placeholder="ID"
                            class="w-full"
                        />
                    </div>

                    <!-- Lead Value Field -->
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-2">
                            Lead Value
                        </label>
                        <Input
                            v-model="filterForm.leadValue"
                            type="text"
                            placeholder="Lead Value"
                            class="w-full"
                        />
                    </div>

                    <!-- Sales Person Searchable Dropdown -->
                    <div class="dropdown-container relative">
                        <label class="block text-sm font-medium text-foreground mb-2">
                            Sales Person
                        </label>
                        <button
                            @click.stop="openSalesPersonDropdown"
                            type="button"
                            class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                        >
                            <span :class="filterForm.salesPerson ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                {{ filterForm.salesPerson || 'Select' }}
                            </span>
                            <div class="flex items-center gap-1 shrink-0">
                                <button
                                    v-if="filterForm.salesPerson && !showSalesPersonDropdown"
                                    @click.stop="clearSalesPerson"
                                    type="button"
                                    class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                    aria-label="Clear sales person"
                                >
                                    <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                </button>
                                <ChevronDown class="size-4 text-muted-foreground" />
                            </div>
                        </button>
                        
                        <!-- Search Popup (shown when dropdown is open) -->
                        <div
                            v-if="showSalesPersonDropdown"
                            @click.stop
                            class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                        >
                            <div class="relative">
                                <input
                                    :ref="el => { if (el) salesPersonSearchInputRef = el as HTMLInputElement }"
                                    :value="salesPersonSearch"
                                    @input="searchSalesPerson(($event.target as HTMLInputElement).value)"
                                    type="text"
                                    placeholder="Search..."
                                    class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                />
                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                    <div v-if="salesPersonSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                </div>
                            </div>
                            
                            <!-- Search Results Dropdown -->
                            <div class="max-h-48 overflow-y-auto border-t border-border">
                                <!-- Loading State -->
                                <div v-if="salesPersonSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                    Searching...
                                </div>
                                
                                <!-- Search Results -->
                                <div v-else-if="salesPersonSearchResults && salesPersonSearchResults.length > 0">
                                    <button
                                        v-for="option in salesPersonSearchResults"
                                        :key="option"
                                        @click="selectSalesPerson(option)"
                                        type="button"
                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                    >
                                        {{ option }}
                                    </button>
                                </div>
                                
                                <!-- No Results -->
                                <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                    No result found
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Person Searchable Dropdown -->
                    <div class="dropdown-container relative">
                        <label class="block text-sm font-medium text-foreground mb-2">
                            Contact Person
                        </label>
                        <button
                            @click.stop="openContactPersonDropdown"
                            type="button"
                            class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                        >
                            <span :class="filterForm.contactPerson ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                {{ filterForm.contactPerson || 'Select' }}
                            </span>
                            <div class="flex items-center gap-1 shrink-0">
                                <button
                                    v-if="filterForm.contactPerson && !showContactPersonDropdown"
                                    @click.stop="clearContactPerson"
                                    type="button"
                                    class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                    aria-label="Clear contact person"
                                >
                                    <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                </button>
                                <ChevronDown class="size-4 text-muted-foreground" />
                            </div>
                        </button>
                        
                        <!-- Search Popup (shown when dropdown is open) -->
                        <div
                            v-if="showContactPersonDropdown"
                            @click.stop
                            class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                        >
                            <div class="relative">
                                <input
                                    :ref="el => { if (el) contactPersonSearchInputRef = el as HTMLInputElement }"
                                    :value="contactPersonSearch"
                                    @input="searchContactPerson(($event.target as HTMLInputElement).value)"
                                    type="text"
                                    placeholder="Search..."
                                    class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                />
                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                    <div v-if="contactPersonSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                </div>
                            </div>
                            
                            <!-- Search Results Dropdown -->
                            <div class="max-h-48 overflow-y-auto border-t border-border">
                                <!-- Loading State -->
                                <div v-if="contactPersonSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                    Searching...
                                </div>
                                
                                <!-- Search Results -->
                                <div v-else-if="contactPersonSearchResults && contactPersonSearchResults.length > 0">
                                    <button
                                        v-for="option in contactPersonSearchResults"
                                        :key="option"
                                        @click="selectContactPerson(option)"
                                        type="button"
                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                    >
                                        {{ option }}
                                    </button>
                                </div>
                                
                                <!-- No Results -->
                                <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                    No result found
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lead Type Dropdown -->
                    <div class="dropdown-container relative">
                        <label class="block text-sm font-medium text-foreground mb-2">
                            Lead Type
                        </label>
                        <button
                            @click.stop="openLeadTypeDropdown"
                            type="button"
                            class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                        >
                            <span :class="filterForm.leadType ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                {{ filterForm.leadType || 'Select' }}
                            </span>
                            <div class="flex items-center gap-1 shrink-0">
                                <button
                                    v-if="filterForm.leadType && !showLeadTypeDropdown"
                                    @click.stop="clearLeadType"
                                    type="button"
                                    class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                    aria-label="Clear lead type"
                                >
                                    <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                </button>
                                <ChevronDown class="size-4 text-muted-foreground" />
                            </div>
                        </button>
                        <div
                            v-if="showLeadTypeDropdown"
                            class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                        >
                            <button
                                v-for="option in leadTypeOptions"
                                :key="option"
                                @click="filterForm.leadType = option; showLeadTypeDropdown = false"
                                type="button"
                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                            >
                                {{ option }}
                            </button>
                        </div>
                    </div>

                    <!-- Source Dropdown -->
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
                        <div
                            v-if="showSourceDropdown"
                            class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                        >
                            <button
                                v-for="option in sourceOptions"
                                :key="option"
                                @click="filterForm.source = option; showSourceDropdown = false"
                                type="button"
                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                            >
                                {{ option }}
                            </button>
                        </div>
                    </div>

                    <!-- Priority Dropdown -->
                    <div class="dropdown-container relative">
                        <label class="block text-sm font-medium text-foreground mb-2">
                            Priority
                        </label>
                        <button
                            @click.stop="openPriorityDropdown"
                            type="button"
                            class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                        >
                            <span :class="filterForm.priority ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                {{ filterForm.priority || 'Select' }}
                            </span>
                            <div class="flex items-center gap-1 shrink-0">
                                <button
                                    v-if="filterForm.priority && !showPriorityDropdown"
                                    @click.stop="clearPriority"
                                    type="button"
                                    class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                    aria-label="Clear priority"
                                >
                                    <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                </button>
                                <ChevronDown class="size-4 text-muted-foreground" />
                            </div>
                        </button>
                        <div
                            v-if="showPriorityDropdown"
                            class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                        >
                            <button
                                v-for="option in priorityOptions"
                                :key="option"
                                @click="filterForm.priority = option; showPriorityDropdown = false"
                                type="button"
                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                            >
                                {{ option }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Footer with Apply Button -->
                <div class="sticky bottom-0 border-t border-border bg-white dark:bg-gray-900 px-6 py-4">
                    <Button
                        @click="applyFilters"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white"
                    >
                        Apply Filters
                    </Button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
