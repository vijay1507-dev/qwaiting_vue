<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as quotesIndex } from '@/routes/quotes';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import type { Instance } from 'flatpickr/dist/types/instance';
import { Calendar, ChevronDown, ChevronUp, X, Plus, Trash2 } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Quotes',
        href: quotesIndex().url,
    },
    {
        title: 'Create Quote',
        href: '#',
    },
];

// Tabs - used for navigation scrolling
const activeTab = ref('quote-information');
const tabs = [
    { id: 'quote-information', label: 'Quote Information' },
    { id: 'address-information', label: 'Address Information' },
    { id: 'quote-items', label: 'Quote Items' },
];

const scrollToSection = (sectionId: string) => {
    activeTab.value = sectionId;
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
};

// Update active tab based on scroll position
const updateActiveTab = () => {
    const sections = tabs.map(tab => ({
        id: tab.id,
        element: document.getElementById(tab.id),
    })).filter(s => s.element);

    const scrollContainer = document.querySelector('.flex-1.overflow-y-auto') as HTMLElement || window;
    
    for (let i = sections.length - 1; i >= 0; i--) {
        const section = sections[i];
        if (section.element) {
            const rect = section.element.getBoundingClientRect();
            const containerRect = scrollContainer?.getBoundingClientRect?.() || { top: 0 };
            const relativeTop = rect.top - containerRect.top;
            
            // If section is in view or just above viewport
            if (relativeTop <= 200) {
                activeTab.value = section.id;
                break;
            }
        }
    }
};

const scrollContainerRef = ref<HTMLElement | null>(null);

// Form data
const form = ref({
    subject: '',
    description: '',
    salesOwner: '',
    expiredAt: '',
    person: '',
    linkToLead: '',
    billingAddress: '',
    billingCountry: '',
    billingState: '',
    billingCity: '',
    billingPostcode: '',
    shippingAddress: '',
    shippingCountry: '',
    shippingState: '',
    shippingCity: '',
    shippingPostcode: '',
});

const errors = ref<Record<string, string>>({});

// Date picker
const expiredAtPicker = ref<Instance | null>(null);
const expiredAtInputRef = ref<HTMLInputElement | null>(null);

// Sales Owner dropdown
const showSalesOwnerDropdown = ref(false);
const salesOwnerOptions = ['Example', 'Custom Admin', 'John Doe', 'Jane Smith'];

// Country dropdowns
const showBillingCountryDropdown = ref(false);
const showShippingCountryDropdown = ref(false);
const countryOptions = ['United States', 'United Kingdom', 'Canada', 'Australia', 'Germany', 'France', 'India', 'Japan'];

// Person dropdown (searchable)
const showPersonDropdown = ref(false);
const personSearch = ref('');
const personSearchResults = ref<string[]>([]);
const personSearchLoading = ref(false);
const personSearchInputRef = ref<HTMLInputElement | null>(null);
const availablePersons = ['Sasha Calle', 'Carol Denvers', 'Billy James', 'Lucy Mark', 'Eddy Collins', 'Oliver Queen', 'Shelly Josh', 'Wilson Fisk', 'John Smith', 'Sarah Johnson', 'Mike Davis', 'Emma Wilson', 'David Brown'];

// Link to lead dropdown (searchable)
const showLinkToLeadDropdown = ref(false);
const linkToLeadSearch = ref('');
const linkToLeadSearchResults = ref<string[]>([]);
const linkToLeadSearchLoading = ref(false);
const linkToLeadSearchInputRef = ref<HTMLInputElement | null>(null);
const availableLeads = [
    'Enquiry: ProjectPulse Enterprise Solution',
    'Enquiry: Milestone360 for Goal Tracking',
    'Enquiry: TaskMaster Pro Implementation',
    'Enquiry: CyberGuard Pro',
    'Enquiry: SecureFlow Business',
    'Enquiry: DataShield Enterprise',
];

// Quote Items
interface QuoteItem {
    id: string;
    productName: string;
    quantity: number;
    price: number;
    amount: number;
    discount: number;
    tax: number;
    total: number;
}

const quoteItems = ref<QuoteItem[]>([]);

// Product name search
const productNameSearch = ref<Record<string, string>>({});
const productNameSearchResults = ref<Record<string, Array<{ id: string; name: string }>>>({});
const productNameSearchLoading = ref<Record<string, boolean>>({});
const showProductNameDropdown = ref<Record<string, boolean>>({});
const availableProducts = [
    { id: '1', name: 'ProjectPulse Enterprise Solution' },
    { id: '2', name: 'CloudSync Pro' },
    { id: '3', name: 'DataGuard Premium' },
    { id: '4', name: 'Analytics Suite' },
    { id: '5', name: 'Security Plus' },
    { id: '6', name: 'Network Shield' },
    { id: '7', name: 'Backup Solutions' },
    { id: '8', name: 'Compliance Manager' },
];

// Adjustment for quote
const quoteAdjustment = ref(0);

const closeAllDropdowns = (except?: 'salesOwner' | 'person' | 'linkToLead' | 'billingCountry' | 'shippingCountry' | 'productName') => {
    if (except !== 'salesOwner') {
        showSalesOwnerDropdown.value = false;
    }
    if (except !== 'person') {
        showPersonDropdown.value = false;
        personSearch.value = '';
        personSearchResults.value = [];
    }
    if (except !== 'linkToLead') {
        showLinkToLeadDropdown.value = false;
        linkToLeadSearch.value = '';
        linkToLeadSearchResults.value = [];
    }
    if (except !== 'billingCountry') {
        showBillingCountryDropdown.value = false;
    }
    if (except !== 'shippingCountry') {
        showShippingCountryDropdown.value = false;
    }
    if (except !== 'productName') {
        // Close all product name dropdowns
        Object.keys(showProductNameDropdown.value).forEach(key => {
            showProductNameDropdown.value[key] = false;
        });
    }
};

const openBillingCountryDropdown = () => {
    closeAllDropdowns('billingCountry');
    showBillingCountryDropdown.value = !showBillingCountryDropdown.value;
};

const selectBillingCountry = (country: string) => {
    form.value.billingCountry = country;
    showBillingCountryDropdown.value = false;
};

const openShippingCountryDropdown = () => {
    closeAllDropdowns('shippingCountry');
    showShippingCountryDropdown.value = !showShippingCountryDropdown.value;
};

const selectShippingCountry = (country: string) => {
    form.value.shippingCountry = country;
    showShippingCountryDropdown.value = false;
};

const openSalesOwnerDropdown = () => {
    closeAllDropdowns('salesOwner');
    showSalesOwnerDropdown.value = !showSalesOwnerDropdown.value;
};

const selectSalesOwner = (owner: string) => {
    form.value.salesOwner = owner;
    showSalesOwnerDropdown.value = false;
};

const openPersonDropdown = () => {
    closeAllDropdowns('person');
    showPersonDropdown.value = !showPersonDropdown.value;
    if (showPersonDropdown.value) {
        nextTick(() => {
            if (personSearchInputRef.value) {
                personSearchInputRef.value.focus();
            }
        });
    }
};

const searchPerson = (query: string) => {
    personSearch.value = query;
    
    if (!query.trim()) {
        personSearchResults.value = [];
        personSearchLoading.value = false;
        return;
    }
    
    personSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = availablePersons.filter(person =>
            person.toLowerCase().includes(query.toLowerCase())
        );
        personSearchResults.value = filtered;
        personSearchLoading.value = false;
    }, 300);
};

const selectPerson = (person: string) => {
    form.value.person = person;
    showPersonDropdown.value = false;
    personSearch.value = '';
    personSearchResults.value = [];
};

const clearPerson = () => {
    form.value.person = '';
    personSearch.value = '';
    personSearchResults.value = [];
};

const openLinkToLeadDropdown = () => {
    closeAllDropdowns('linkToLead');
    showLinkToLeadDropdown.value = !showLinkToLeadDropdown.value;
    if (showLinkToLeadDropdown.value) {
        nextTick(() => {
            if (linkToLeadSearchInputRef.value) {
                linkToLeadSearchInputRef.value.focus();
            }
        });
    }
};

const searchLinkToLead = (query: string) => {
    linkToLeadSearch.value = query;
    
    if (!query.trim()) {
        linkToLeadSearchResults.value = [];
        linkToLeadSearchLoading.value = false;
        return;
    }
    
    linkToLeadSearchLoading.value = true;
    
    setTimeout(() => {
        const filtered = availableLeads.filter(lead =>
            lead.toLowerCase().includes(query.toLowerCase())
        );
        linkToLeadSearchResults.value = filtered;
        linkToLeadSearchLoading.value = false;
    }, 300);
};

const selectLinkToLead = (lead: string) => {
    form.value.linkToLead = lead;
    showLinkToLeadDropdown.value = false;
    linkToLeadSearch.value = '';
    linkToLeadSearchResults.value = [];
};

const clearLinkToLead = () => {
    form.value.linkToLead = '';
    linkToLeadSearch.value = '';
    linkToLeadSearchResults.value = [];
};

// Product name search functionality
const searchProductName = async (itemId: string, query: string) => {
    if (productNameSearch.value[itemId] === undefined) {
        productNameSearch.value[itemId] = '';
    }
    productNameSearch.value[itemId] = query;
    
    if (!query.trim()) {
        if (productNameSearchResults.value[itemId] === undefined) {
            productNameSearchResults.value[itemId] = [];
        } else {
            productNameSearchResults.value[itemId] = [];
        }
        if (productNameSearchLoading.value[itemId] === undefined) {
            productNameSearchLoading.value[itemId] = false;
        } else {
            productNameSearchLoading.value[itemId] = false;
        }
        return;
    }
    
    if (productNameSearchLoading.value[itemId] === undefined) {
        productNameSearchLoading.value[itemId] = false;
    }
    productNameSearchLoading.value[itemId] = true;
    showProductNameDropdown.value[itemId] = true;
    
    setTimeout(() => {
        const filtered = availableProducts.filter(product =>
            product.name.toLowerCase().includes(query.toLowerCase())
        );
        if (productNameSearchResults.value[itemId] === undefined) {
            productNameSearchResults.value[itemId] = [];
        }
        productNameSearchResults.value[itemId] = filtered;
        productNameSearchLoading.value[itemId] = false;
    }, 300);
};

const selectProductName = (itemId: string, product: { id: string; name: string }) => {
    const item = quoteItems.value.find(p => p.id === itemId);
    if (item) {
        item.productName = product.name;
    }
    showProductNameDropdown.value[itemId] = false;
    productNameSearch.value[itemId] = '';
    productNameSearchResults.value[itemId] = [];
    updateQuoteItemTotals(itemId);
};

const productNameSearchInputRefs = ref<Record<string, HTMLInputElement | null>>({});

const clearProductName = (itemId: string) => {
    const item = quoteItems.value.find(p => p.id === itemId);
    if (item) {
        item.productName = '';
    }
    if (productNameSearch.value[itemId] !== undefined) {
        productNameSearch.value[itemId] = '';
    }
    if (productNameSearchResults.value[itemId] !== undefined) {
        productNameSearchResults.value[itemId] = [];
    }
};

const openProductNameDropdown = (itemId: string, event?: Event) => {
    if (event) {
        event.stopPropagation();
    }
    const isCurrentlyOpen = showProductNameDropdown.value[itemId] || false;
    
    // Close all other product name dropdowns first
    Object.keys(showProductNameDropdown.value).forEach(id => {
        if (id !== itemId) {
            showProductNameDropdown.value[id] = false;
        }
    });
    
    // Close all other dropdowns (sales owner, person, etc.)
    closeAllDropdowns('productName');
    
    // Toggle the clicked dropdown
    showProductNameDropdown.value[itemId] = !isCurrentlyOpen;
    
    if (showProductNameDropdown.value[itemId]) {
        const item = quoteItems.value.find(p => p.id === itemId);
        if (productNameSearch.value[itemId] === undefined) {
            productNameSearch.value[itemId] = '';
        }
        if (!productNameSearch.value[itemId] && item?.productName) {
            productNameSearch.value[itemId] = item.productName;
        }
        if (!productNameSearch.value[itemId]?.trim()) {
            if (productNameSearchResults.value[itemId] === undefined) {
                productNameSearchResults.value[itemId] = [];
            } else {
                productNameSearchResults.value[itemId] = [];
            }
        }
        nextTick(() => {
            if (showProductNameDropdown.value[itemId] && productNameSearchInputRefs.value[itemId]) {
                productNameSearchInputRefs.value[itemId]?.focus();
            }
        });
    }
};

const addQuoteItem = () => {
    const newId = Date.now().toString();
    quoteItems.value.push({
        id: newId,
        productName: '',
        quantity: 0,
        price: 0,
        amount: 0,
        discount: 0,
        tax: 0,
        total: 0,
    });
    // Initialize all refs for the new item
    showProductNameDropdown.value[newId] = false;
    productNameSearch.value[newId] = '';
    productNameSearchResults.value[newId] = [];
    productNameSearchLoading.value[newId] = false;
};

const removeQuoteItem = (id: string) => {
    quoteItems.value = quoteItems.value.filter(p => p.id !== id);
    delete showProductNameDropdown.value[id];
    delete productNameSearch.value[id];
    delete productNameSearchResults.value[id];
    delete productNameSearchLoading.value[id];
    delete productNameSearchInputRefs.value[id];
};

const updateQuoteItemTotals = (itemId: string) => {
    const item = quoteItems.value.find(p => p.id === itemId);
    if (item) {
        item.amount = item.quantity * item.price;
        item.total = item.amount - item.discount + item.tax;
    }
};

// Summary calculations
const quoteSummary = computed(() => {
    const subtotal = quoteItems.value.reduce((sum, item) => sum + item.amount, 0);
    const discount = quoteItems.value.reduce((sum, item) => sum + item.discount, 0);
    const tax = quoteItems.value.reduce((sum, item) => sum + item.tax, 0);
    const grandTotal = subtotal - discount + tax + quoteAdjustment.value;
    
    return {
        subtotal,
        discount,
        tax,
        adjustment: quoteAdjustment.value,
        grandTotal,
    };
});

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(amount);
};

const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    
    if (!target.closest('.dropdown-container') && !target.closest('.product-name-search-container')) {
        closeAllDropdowns();
    }
};

const initializeFlatpickr = () => {
    if (expiredAtInputRef.value && !expiredAtPicker.value) {
        expiredAtPicker.value = flatpickr(expiredAtInputRef.value, {
            dateFormat: 'Y-m-d',
            allowInput: false,
            clickOpens: true,
            enableTime: false,
            weekNumbers: true,
            animate: true,
            static: false,
            onChange: (selectedDates, dateStr) => {
                form.value.expiredAt = dateStr;
            },
        });
    }
};

const destroyFlatpickr = () => {
    if (expiredAtPicker.value) {
        expiredAtPicker.value.destroy();
        expiredAtPicker.value = null;
    }
};

const validateForm = (): boolean => {
    errors.value = {};
    
    if (!form.value.subject.trim()) {
        errors.value.subject = 'Subject is required';
    }
    if (!form.value.salesOwner.trim()) {
        errors.value.salesOwner = 'Sales Owner is required';
    }
    if (!form.value.expiredAt.trim()) {
        errors.value.expiredAt = 'Expired At is required';
    }
    if (!form.value.person.trim()) {
        errors.value.person = 'Person is required';
    }
    
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        // TODO: Implement form submission
        console.log('Submitting quote:', form.value);
        router.visit(quotesIndex().url);
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
    nextTick(() => {
        initializeFlatpickr();
        updateActiveTab(); // Set initial active tab
        
        // Listen to scroll on the scrollable container
        const container = document.querySelector('.flex-1.overflow-y-auto') as HTMLElement;
        if (container) {
            container.addEventListener('scroll', updateActiveTab);
            scrollContainerRef.value = container;
        } else {
            window.addEventListener('scroll', updateActiveTab);
        }
    });
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
    if (scrollContainerRef.value) {
        scrollContainerRef.value.removeEventListener('scroll', updateActiveTab);
    } else {
        window.removeEventListener('scroll', updateActiveTab);
    }
    destroyFlatpickr();
});
</script>

<template>
    <Head title="Create Quote" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="px-3 sm:px-4 lg:px-6 py-3 lg:py-4">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4 lg:mb-6">
                <h1 class="text-base lg:text-lg font-semibold text-foreground">Create Quote</h1>
                <Button
                    @click="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                >
                    Save Quote
                </Button>
            </div>

            <!-- Tabs -->
            <div class="mb-4 lg:mb-6">
                <div class="flex items-center gap-1 border-b border-border">
                    <button
                        v-for="tab in tabs"
                        :key="tab.id"
                        @click="scrollToSection(tab.id)"
                        :class="[
                            'px-4 py-2 text-sm font-medium transition-colors cursor-pointer border-b-2',
                            activeTab === tab.id
                                ? 'border-blue-600 text-blue-600'
                                : 'border-transparent text-muted-foreground hover:text-foreground hover:border-border'
                        ]"
                        type="button"
                    >
                        {{ tab.label }}
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="space-y-6">
                <!-- Quote Information Section -->
                <div id="quote-information" class="scroll-mt-4">
                    <div class="bg-card border border-border rounded-md p-4 lg:p-6 max-w-2xl">
                        <h2 class="text-base lg:text-lg font-semibold text-foreground mb-1">Quote Information</h2>
                        <p class="text-xs lg:text-sm text-muted-foreground mb-4 lg:mb-6">
                            Put the basic information of the quote.
                        </p>

                        <div class="space-y-4">
                            <!-- Subject -->
                            <div>
                                <Label class="text-xs lg:text-sm">
                                    Subject <span class="text-red-500">*</span>
                                </Label>
                                <Input
                                    v-model="form.subject"
                                    type="text"
                                    placeholder="Subject"
                                    :class="[
                                        'mt-1 text-xs lg:text-sm',
                                        errors.subject ? 'border-red-500' : ''
                                    ]"
                                />
                                <p v-if="errors.subject" class="mt-1 text-xs text-red-500">
                                    {{ errors.subject }}
                                </p>
                            </div>

                            <!-- Description -->
                            <div>
                                <Label class="text-xs lg:text-sm">Description</Label>
                                <textarea
                                    v-model="form.description"
                                    rows="2"
                                    placeholder="Description"
                                    class="mt-1 w-full px-3 py-2 text-xs lg:text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none bg-background text-foreground min-h-[40px]"
                                    :class="errors.description ? 'border-red-500' : 'border-border'"
                                ></textarea>
                                <p v-if="errors.description" class="mt-1 text-xs text-red-500">
                                    {{ errors.description }}
                                </p>
                            </div>

                            <!-- Sales Owner and Expired At -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Sales Owner -->
                                <div class="dropdown-container relative">
                                    <Label class="text-xs lg:text-sm">
                                        Sales Owner <span class="text-red-500">*</span>
                                    </Label>
                                    <button
                                        @click.stop="openSalesOwnerDropdown"
                                        type="button"
                                        :class="[
                                            'mt-1 w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-xs lg:text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer',
                                            errors.salesOwner ? 'border-red-500' : 'border-border',
                                            form.salesOwner ? 'text-foreground' : 'text-muted-foreground'
                                        ]"
                                    >
                                        <span class="flex-1 truncate">
                                            {{ form.salesOwner || 'Select' }}
                                        </span>
                                        <ChevronDown class="size-4 text-muted-foreground shrink-0" />
                                    </button>
                                    <div
                                        v-if="showSalesOwnerDropdown"
                                        @click.stop
                                        class="absolute top-full left-0 right-0 z-50 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg max-h-48 overflow-y-auto"
                                    >
                                        <button
                                            v-for="option in salesOwnerOptions"
                                            :key="option"
                                            @click="selectSalesOwner(option)"
                                            type="button"
                                            class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                        >
                                            {{ option }}
                                        </button>
                                    </div>
                                    <p v-if="errors.salesOwner" class="mt-1 text-xs text-red-500">
                                        {{ errors.salesOwner }}
                                    </p>
                                </div>

                                <!-- Expired At -->
                                <div>
                                    <Label class="text-xs lg:text-sm">
                                        Expired At <span class="text-red-500">*</span>
                                    </Label>
                                    <div class="relative mt-1">
                                        <input
                                            ref="expiredAtInputRef"
                                            v-model="form.expiredAt"
                                            type="text"
                                            readonly
                                            placeholder="Select date"
                                            @click="expiredAtPicker?.open()"
                                            :class="[
                                                'w-full px-3 py-2 pr-10 text-xs lg:text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-background text-foreground cursor-pointer',
                                                errors.expiredAt ? 'border-red-500' : 'border-border'
                                            ]"
                                        />
                                        <button
                                            @click.stop="expiredAtPicker?.open()"
                                            type="button"
                                            class="absolute right-2 top-1/2 -translate-y-1/2 p-1 hover:bg-muted rounded transition-colors cursor-pointer"
                                        >
                                            <Calendar class="size-4 text-muted-foreground" />
                                        </button>
                                    </div>
                                    <p v-if="errors.expiredAt" class="mt-1 text-xs text-red-500">
                                        {{ errors.expiredAt }}
                                    </p>
                                </div>
                            </div>

                            <!-- Person and Link to lead -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Person -->
                                <div class="dropdown-container relative">
                                    <Label class="text-xs lg:text-sm">
                                        Person <span class="text-red-500">*</span>
                                    </Label>
                                    <button
                                        @click.stop="openPersonDropdown"
                                        type="button"
                                        :class="[
                                            'mt-1 w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-xs lg:text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer',
                                            errors.person ? 'border-red-500' : 'border-border',
                                            form.person ? 'text-foreground' : 'text-muted-foreground'
                                        ]"
                                    >
                                        <span class="flex-1 truncate">
                                            {{ form.person || 'Click to add' }}
                                        </span>
                                        <div class="flex items-center gap-1 shrink-0">
                                            <button
                                                v-if="form.person && !showPersonDropdown"
                                                @click.stop="clearPerson"
                                                type="button"
                                                class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            >
                                                <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                            </button>
                                            <ChevronDown class="size-4 text-muted-foreground" />
                                        </div>
                                    </button>
                                    
                                    <!-- Search Popup -->
                                    <div
                                        v-if="showPersonDropdown"
                                        @click.stop
                                        class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                    >
                                        <div class="relative">
                                            <input
                                                :ref="el => { if (el) personSearchInputRef = el as HTMLInputElement }"
                                                :value="personSearch"
                                                @input="searchPerson(($event.target as HTMLInputElement).value)"
                                                type="text"
                                                placeholder="Search..."
                                                class="w-full rounded-t-md bg-background px-3 py-2 text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                            />
                                            <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                <div v-if="personSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- Search Results -->
                                        <div class="max-h-48 overflow-y-auto border-t border-border">
                                            <div v-if="personSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                                Searching...
                                            </div>
                                            <div v-else-if="personSearchResults && personSearchResults.length > 0">
                                                <button
                                                    v-for="option in personSearchResults"
                                                    :key="option"
                                                    @click="selectPerson(option)"
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
                                    <p v-if="errors.person" class="mt-1 text-xs text-red-500">
                                        {{ errors.person }}
                                    </p>
                                </div>

                                <!-- Link to lead -->
                                <div class="dropdown-container relative">
                                    <Label class="text-xs lg:text-sm">Link to lead</Label>
                                    <button
                                        @click.stop="openLinkToLeadDropdown"
                                        type="button"
                                        :class="[
                                            'mt-1 w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-xs lg:text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer',
                                            'border-border',
                                            form.linkToLead ? 'text-foreground' : 'text-muted-foreground'
                                        ]"
                                    >
                                        <span class="flex-1 truncate">
                                            {{ form.linkToLead || 'Click to add' }}
                                        </span>
                                        <div class="flex items-center gap-1 shrink-0">
                                            <button
                                                v-if="form.linkToLead && !showLinkToLeadDropdown"
                                                @click.stop="clearLinkToLead"
                                                type="button"
                                                class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            >
                                                <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                            </button>
                                            <ChevronDown class="size-4 text-muted-foreground" />
                                        </div>
                                    </button>
                                    
                                    <!-- Search Popup -->
                                    <div
                                        v-if="showLinkToLeadDropdown"
                                        @click.stop
                                        class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                    >
                                        <div class="relative">
                                            <input
                                                :ref="el => { if (el) linkToLeadSearchInputRef = el as HTMLInputElement }"
                                                :value="linkToLeadSearch"
                                                @input="searchLinkToLead(($event.target as HTMLInputElement).value)"
                                                type="text"
                                                placeholder="Search..."
                                                class="w-full rounded-t-md bg-background px-3 py-2 text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                            />
                                            <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                <div v-if="linkToLeadSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- Search Results -->
                                        <div class="max-h-48 overflow-y-auto border-t border-border">
                                            <div v-if="linkToLeadSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                                Searching...
                                            </div>
                                            <div v-else-if="linkToLeadSearchResults && linkToLeadSearchResults.length > 0">
                                                <button
                                                    v-for="option in linkToLeadSearchResults"
                                                    :key="option"
                                                    @click="selectLinkToLead(option)"
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
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information Section -->
                <div id="address-information" class="scroll-mt-4">
                    <div class="bg-card border border-border rounded-md p-4 lg:p-6 max-w-2xl">
                        <h2 class="text-base lg:text-lg font-semibold text-foreground mb-1">Address Information</h2>
                        <p class="text-xs lg:text-sm text-muted-foreground mb-4 lg:mb-6">
                            Information about the address related to quote.
                        </p>

                        <div class="space-y-4">
                                <!-- Billing Address -->
                                <div class="mb-6">
                                    <Label class="text-xs lg:text-sm mb-2 block">
                                        Billing Address <span class="text-red-500">*</span>
                                    </Label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <textarea
                                                v-model="form.billingAddress"
                                                rows="4"
                                                placeholder="Street Address"
                                                class="w-full px-3 py-2 text-xs lg:text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y bg-background text-foreground"
                                                :class="errors.billingAddress ? 'border-red-500' : 'border-border'"
                                            ></textarea>
                                            <p v-if="errors.billingAddress" class="mt-1 text-xs text-red-500">
                                                {{ errors.billingAddress }}
                                            </p>
                                        </div>
                                        <div class="space-y-4">
                                            <!-- Country -->
                                            <div class="dropdown-container relative">
                                                <button
                                                    @click.stop="openBillingCountryDropdown"
                                                    type="button"
                                                    :class="[
                                                        'w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-xs lg:text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer',
                                                        'border-border',
                                                        form.billingCountry ? 'text-foreground' : 'text-muted-foreground'
                                                    ]"
                                                >
                                                    <span class="flex-1 truncate">
                                                        {{ form.billingCountry || 'Select Country' }}
                                                    </span>
                                                    <ChevronDown class="size-4 text-muted-foreground shrink-0" />
                                                </button>
                                                <div
                                                    v-if="showBillingCountryDropdown"
                                                    @click.stop
                                                    class="absolute top-full left-0 right-0 z-50 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg max-h-48 overflow-y-auto"
                                                >
                                                    <button
                                                        v-for="option in countryOptions"
                                                        :key="option"
                                                        @click="selectBillingCountry(option)"
                                                        type="button"
                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                    >
                                                        {{ option }}
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- State -->
                                            <div>
                                                <Input
                                                    v-model="form.billingState"
                                                    type="text"
                                                    placeholder="State"
                                                    class="w-full text-xs lg:text-sm"
                                                />
                                            </div>

                                            <!-- City -->
                                            <div>
                                                <Input
                                                    v-model="form.billingCity"
                                                    type="text"
                                                    placeholder="City"
                                                    class="w-full text-xs lg:text-sm"
                                                />
                                            </div>

                                            <!-- Postcode -->
                                            <div>
                                                <Input
                                                    v-model="form.billingPostcode"
                                                    type="text"
                                                    placeholder="Postcode"
                                                    class="w-full text-xs lg:text-sm"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipping Address -->
                                <div>
                                    <Label class="text-xs lg:text-sm mb-2 block">
                                        Shipping Address
                                    </Label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <textarea
                                                v-model="form.shippingAddress"
                                                rows="4"
                                                placeholder="Street Address"
                                                class="w-full px-3 py-2 text-xs lg:text-sm border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y bg-background text-foreground"
                                            ></textarea>
                                        </div>
                                        <div class="space-y-4">
                                            <!-- Country -->
                                            <div class="dropdown-container relative">
                                                <button
                                                    @click.stop="openShippingCountryDropdown"
                                                    type="button"
                                                    :class="[
                                                        'w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-xs lg:text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer',
                                                        'border-border',
                                                        form.shippingCountry ? 'text-foreground' : 'text-muted-foreground'
                                                    ]"
                                                >
                                                    <span class="flex-1 truncate">
                                                        {{ form.shippingCountry || 'Select Country' }}
                                                    </span>
                                                    <ChevronDown class="size-4 text-muted-foreground shrink-0" />
                                                </button>
                                                <div
                                                    v-if="showShippingCountryDropdown"
                                                    @click.stop
                                                    class="absolute top-full left-0 right-0 z-50 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg max-h-48 overflow-y-auto"
                                                >
                                                    <button
                                                        v-for="option in countryOptions"
                                                        :key="option"
                                                        @click="selectShippingCountry(option)"
                                                        type="button"
                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                    >
                                                        {{ option }}
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- State -->
                                            <div>
                                                <Input
                                                    v-model="form.shippingState"
                                                    type="text"
                                                    placeholder="State"
                                                    class="w-full text-xs lg:text-sm"
                                                />
                                            </div>

                                            <!-- City -->
                                            <div>
                                                <Input
                                                    v-model="form.shippingCity"
                                                    type="text"
                                                    placeholder="City"
                                                    class="w-full text-xs lg:text-sm"
                                                />
                                            </div>

                                            <!-- Postcode -->
                                            <div>
                                                <Input
                                                    v-model="form.shippingPostcode"
                                                    type="text"
                                                    placeholder="Postcode"
                                                    class="w-full text-xs lg:text-sm"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Quote Items Section -->
                <div id="quote-items" class="scroll-mt-4">
                    <div class="bg-card border border-border rounded-md p-4 lg:p-6">
                        <h2 class="text-base lg:text-lg font-semibold text-foreground mb-1">Quote Items</h2>
                        <p class="text-xs lg:text-sm text-muted-foreground mb-4 lg:mb-6">
                            Add Product Request for this quote.
                        </p>

                        <div class="space-y-6">
                            <!-- Table Section - Full Width -->
                            <div class="">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="border-b border-border">
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground">Product Name</th>
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground w-[100px]">Quantity</th>
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground w-[120px]">Price</th>
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground w-[120px]">Amount</th>
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground w-[120px]">Discount</th>
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground w-[120px]">Tax</th>
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground w-[120px]">Total</th>
                                            <th class="px-4 py-3 text-left text-xs lg:text-sm font-medium text-foreground w-[80px]">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="item in quoteItems"
                                            :key="item.id"
                                            class="border-b border-border"
                                        >
                                            <td class="px-4 py-3 max-w-[200px]">
                                                <div 
                                                    class="relative product-name-search-container" 
                                                    :class="`product-name-search-container-${item.id}`"
                                                    :style="showProductNameDropdown[item.id] ? 'z-index: 10000;' : ''"
                                                >
                                                    <button
                                                        @click.stop="openProductNameDropdown(item.id, $event)"
                                                        type="button"
                                                        class="w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-xs lg:text-sm focus:outline-none focus:ring-2 border-border focus:ring-blue-500 min-w-0 cursor-pointer"
                                                    >
                                                        <span :class="item.productName ? 'text-foreground' : 'text-muted-foreground'" class="truncate flex-1 text-left min-w-0">
                                                            {{ item.productName || 'Click to Add' }}
                                                        </span>
                                                        <div class="flex items-center gap-2 shrink-0">
                                                            <button
                                                                v-if="item.productName && !(showProductNameDropdown[item.id] || false)"
                                                                @click.stop="clearProductName(item.id)"
                                                                type="button"
                                                                class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                                aria-label="Clear product name"
                                                            >
                                                                <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                                            </button>
                                                            <ChevronUp v-if="showProductNameDropdown[item.id] || false" class="size-3.5 text-muted-foreground" />
                                                            <ChevronDown v-else class="size-3.5 text-muted-foreground" />
                                                        </div>
                                                    </button>
                                                    
                                                    <!-- Search Popup -->
                                                    <div
                                                        v-if="showProductNameDropdown[item.id] || false"
                                                        @click.stop
                                                        class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                    >
                                                        <div class="relative">
                                                            <input
                                                                :ref="el => { if (el) productNameSearchInputRefs[item.id] = el as HTMLInputElement }"
                                                                :value="(productNameSearch[item.id] || '')"
                                                                @input="searchProductName(item.id, ($event.target as HTMLInputElement).value)"
                                                                type="text"
                                                                placeholder="Search..."
                                                                class="w-full rounded-t-md bg-background px-3 py-2 text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                                            />
                                                            <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                                <div v-if="productNameSearchLoading[item.id] || false" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Search Results -->
                                                        <div class="max-h-48 overflow-y-auto border-t border-border">
                                                            <div v-if="productNameSearchLoading[item.id] || false" class="px-3 py-2 text-xs text-muted-foreground">
                                                                Searching...
                                                            </div>
                                                            <div v-else-if="productNameSearchResults[item.id] && Array.isArray(productNameSearchResults[item.id]) && productNameSearchResults[item.id].length > 0">
                                                                <button
                                                                    v-for="productOption in productNameSearchResults[item.id]"
                                                                    :key="productOption.id"
                                                                    @click="selectProductName(item.id, productOption)"
                                                                    type="button"
                                                                    class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                                >
                                                                    {{ productOption.name }}
                                                                </button>
                                                            </div>
                                                            <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                                                No result found
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 w-[100px]">
                                                <input
                                                    v-model.number="item.quantity"
                                                    type="number"
                                                    min="0"
                                                    @input="updateQuoteItemTotals(item.id)"
                                                    class="w-full px-2 py-1.5 rounded-md border border-border bg-background text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                />
                                            </td>
                                            <td class="px-4 py-3 w-[120px]">
                                                <div class="relative">
                                                    <span class="absolute left-2 top-1/2 -translate-y-1/2 text-xs text-muted-foreground">$</span>
                                                    <input
                                                        v-model.number="item.price"
                                                        type="number"
                                                        step="0.01"
                                                        min="0"
                                                        @input="updateQuoteItemTotals(item.id)"
                                                        class="w-full pl-6 pr-2 py-1.5 rounded-md border border-border bg-background text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    />
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 w-[120px]">
                                                <div class="text-xs lg:text-sm text-foreground">
                                                    {{ formatCurrency(item.amount) }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 w-[120px]">
                                                <div class="relative">
                                                    <span class="absolute left-2 top-1/2 -translate-y-1/2 text-xs text-muted-foreground">$</span>
                                                    <input
                                                        v-model.number="item.discount"
                                                        type="number"
                                                        step="0.01"
                                                        min="0"
                                                        @input="updateQuoteItemTotals(item.id)"
                                                        class="w-full pl-6 pr-2 py-1.5 rounded-md border border-border bg-background text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    />
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 w-[120px]">
                                                <div class="relative">
                                                    <span class="absolute left-2 top-1/2 -translate-y-1/2 text-xs text-muted-foreground">$</span>
                                                    <input
                                                        v-model.number="item.tax"
                                                        type="number"
                                                        step="0.01"
                                                        min="0"
                                                        @input="updateQuoteItemTotals(item.id)"
                                                        class="w-full pl-6 pr-2 py-1.5 rounded-md border border-border bg-background text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    />
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 w-[120px]">
                                                <div class="text-xs lg:text-sm font-medium text-foreground">
                                                    {{ formatCurrency(item.total) }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 w-[80px]">
                                                <button
                                                    @click="removeQuoteItem(item.id)"
                                                    type="button"
                                                    class="p-1.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                    aria-label="Delete item"
                                                >
                                                    <Trash2 class="size-4 text-muted-foreground hover:text-red-600" />
                                                </button>
                                            </td>
                                        </tr>
                                        <tr v-if="quoteItems.length === 0">
                                            <td colspan="8" class="px-4 py-8 text-center text-xs lg:text-sm text-muted-foreground">
                                                No items added yet. Click "+ Add Item" to add products.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button
                                @click="addQuoteItem"
                                type="button"
                                class="flex items-center gap-1 text-xs lg:text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium cursor-pointer"
                            >
                                <Plus class="size-4" />
                                Add Item
                            </button>

                            <!-- Summary Section - Below table, aligned right -->
                            <div class="flex justify-end">
                                <div class="bg-muted/30 border border-border rounded-md p-4 lg:p-6 w-full max-w-md">
                                    <h3 class="text-sm lg:text-base font-semibold text-foreground mb-4">Summary</h3>
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs lg:text-sm text-muted-foreground">Sub Total ($)</span>
                                            <span class="text-xs lg:text-sm font-medium text-foreground">
                                                {{ quoteSummary.subtotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs lg:text-sm text-muted-foreground">Discount ($)</span>
                                            <span class="text-xs lg:text-sm font-medium text-foreground">
                                                {{ quoteSummary.discount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs lg:text-sm text-muted-foreground">Tax ($)</span>
                                            <span class="text-xs lg:text-sm font-medium text-foreground">
                                                {{ quoteSummary.tax.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs lg:text-sm text-muted-foreground">Adjustment ($)</span>
                                            <div class="relative">
                                                <span class="absolute left-2 top-1/2 -translate-y-1/2 text-xs text-muted-foreground">$</span>
                                                <input
                                                    v-model.number="quoteAdjustment"
                                                    type="number"
                                                    step="0.01"
                                                    class="w-24 pl-6 pr-2 py-1 rounded-md border border-border bg-background text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                />
                                            </div>
                                        </div>
                                        <div class="pt-3 border-t border-border">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm lg:text-base font-semibold text-foreground">Grand Total ($)</span>
                                                <span class="text-sm lg:text-base font-semibold text-foreground">
                                                    {{ quoteSummary.grandTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AppLayout>
</template>

