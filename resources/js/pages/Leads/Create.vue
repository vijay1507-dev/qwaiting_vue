<script setup lang="ts">
import { ref, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as leadsIndex } from '@/routes/leads';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import type { Instance } from 'flatpickr/dist/types/instance';
import { Calendar, ChevronDown, ChevronUp, Plus, Trash2, AtSign, Phone, Building2, X } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Leads',
        href: leadsIndex().url,
    },
    {
        title: 'Create Lead',
        href: '#',
    },
];

// Tabs - used for navigation scrolling
const activeTab = ref('details');
const tabs = [
    { id: 'details', label: 'Details' },
    { id: 'contact-person', label: 'Contact Person' },
    { id: 'products', label: 'Products' },
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

    const scrollContainer = document.querySelector('.flex-1.overflow-y-auto') as HTMLElement;
    
    for (let i = sections.length - 1; i >= 0; i--) {
        const section = sections[i];
        if (section.element) {
            const rect = section.element.getBoundingClientRect();
            const containerRect = scrollContainer?.getBoundingClientRect() || { top: 0 };
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

// Form data
const form = ref({
    title: '',
    description: '',
    source: '',
    expectedCloseDate: '',
    type: '',
    salesOwner: '',
    leadValue: '',
});

const errors = ref<Record<string, string>>({});

// Expected Close Date picker
const expectedCloseDatePicker = ref<Instance | null>(null);
const expectedCloseDateInputRef = ref<HTMLInputElement | null>(null);

// Contact Person
interface Email {
    id: string;
    email: string;
    type: string;
}

interface ContactNumber {
    id: string;
    number: string;
    type: string;
}

const contactPerson = ref({
    name: '',
    emails: [{ id: '1', email: '', type: 'Work' }] as Email[],
    contactNumbers: [{ id: '1', number: '', type: 'Work' }] as ContactNumber[],
    organization: '',
});

const emailTypes = ['Work', 'Home', 'Personal', 'Other'];
const contactNumberTypes = ['Work', 'Home', 'Mobile', 'Other'];
const showEmailTypeDropdown = ref<Record<string, boolean>>({});
const showContactNumberTypeDropdown = ref<Record<string, boolean>>({});

const addEmail = () => {
    const newId = Date.now().toString();
    contactPerson.value.emails.push({
        id: newId,
        email: '',
        type: 'Work',
    });
    showEmailTypeDropdown.value[newId] = false;
};

const removeEmail = (id: string) => {
    if (contactPerson.value.emails.length > 1) {
        contactPerson.value.emails = contactPerson.value.emails.filter(e => e.id !== id);
        delete showEmailTypeDropdown.value[id];
    }
};

const addContactNumber = () => {
    const newId = Date.now().toString();
    contactPerson.value.contactNumbers.push({
        id: newId,
        number: '',
        type: 'Work',
    });
    showContactNumberTypeDropdown.value[newId] = false;
};

const removeContactNumber = (id: string) => {
    if (contactPerson.value.contactNumbers.length > 1) {
        contactPerson.value.contactNumbers = contactPerson.value.contactNumbers.filter(cn => cn.id !== id);
        delete showContactNumberTypeDropdown.value[id];
    }
};

// Name search functionality
const searchName = async (query: string) => {
    nameSearch.value = query;
    
    if (!query.trim()) {
        // Show no results when search is empty
        nameSearchResults.value = [];
        nameSearchLoading.value = false;
        return;
    }
    
    nameSearchLoading.value = true;
    showNameDropdown.value = true;
    
    // Simulate API call - TODO: Replace with actual API call
    setTimeout(() => {
        const filtered = availableNames.filter(person =>
            person.name.toLowerCase().includes(query.toLowerCase())
        );
        nameSearchResults.value = filtered;
        nameSearchLoading.value = false;
    }, 300);
};

const selectName = (person: { id: string; name: string }) => {
    contactPerson.value.name = person.name;
    showNameDropdown.value = false;
    nameSearch.value = '';
    nameSearchResults.value = [];
};

const addNameAsNew = () => {
    if (nameSearch.value.trim()) {
        contactPerson.value.name = nameSearch.value.trim();
        showNameDropdown.value = false;
        nameSearch.value = '';
        nameSearchResults.value = [];
    }
};

const nameSearchInputRef = ref<HTMLInputElement | null>(null);

const openNameDropdown = (event?: Event) => {
    if (event) {
        event.stopPropagation();
    }
    showNameDropdown.value = !showNameDropdown.value;
    if (showNameDropdown.value) {
        if (!nameSearch.value) {
            nameSearch.value = contactPerson.value.name || '';
        }
        // Clear results initially to show "No result found"
        if (!nameSearch.value.trim()) {
            nameSearchResults.value = [];
        }
    }
    nextTick(() => {
        if (showNameDropdown.value && nameSearchInputRef.value) {
            nameSearchInputRef.value.focus();
        }
    });
};

// Organization search functionality
const searchOrganization = async (query: string) => {
    organizationSearch.value = query;
    
    if (!query.trim()) {
        // Show no results when search is empty
        organizationSearchResults.value = [];
        organizationSearchLoading.value = false;
        return;
    }
    
    organizationSearchLoading.value = true;
    showOrganizationDropdown.value = true;
    
    // Simulate API call - TODO: Replace with actual API call
    setTimeout(() => {
        const filtered = availableOrganizations.filter(org =>
            org.name.toLowerCase().includes(query.toLowerCase())
        );
        organizationSearchResults.value = filtered;
        organizationSearchLoading.value = false;
    }, 300);
};

const selectOrganization = (organization: { id: string; name: string }) => {
    contactPerson.value.organization = organization.name;
    showOrganizationDropdown.value = false;
    organizationSearch.value = '';
    organizationSearchResults.value = [];
};

const addOrganizationAsNew = () => {
    if (organizationSearch.value.trim()) {
        contactPerson.value.organization = organizationSearch.value.trim();
        showOrganizationDropdown.value = false;
        organizationSearch.value = '';
        organizationSearchResults.value = [];
    }
};

const organizationSearchInputRef = ref<HTMLInputElement | null>(null);

const openOrganizationDropdown = (event?: Event) => {
    if (event) {
        event.stopPropagation();
    }
    showOrganizationDropdown.value = !showOrganizationDropdown.value;
    if (showOrganizationDropdown.value) {
        if (!organizationSearch.value) {
            organizationSearch.value = contactPerson.value.organization || '';
        }
        // Clear results initially to show "No result found"
        if (!organizationSearch.value.trim()) {
            organizationSearchResults.value = [];
        }
    }
    nextTick(() => {
        if (showOrganizationDropdown.value && organizationSearchInputRef.value) {
            organizationSearchInputRef.value.focus();
        }
    });
};

// Products
interface Product {
    id: string;
    productName: string;
    quantity: number;
    price: number;
    amount: number;
}

const products = ref<Product[]>([]);

// Product name search
const productNameSearch = ref<Record<string, string>>({});
const productNameSearchResults = ref<Record<string, Array<{ id: string; name: string }>>>({});
const productNameSearchLoading = ref<Record<string, boolean>>({});
const showProductNameDropdown = ref<Record<string, boolean>>({});
const availableProducts = [
    { id: '1', name: 'Product A' },
    { id: '2', name: 'Product B' },
    { id: '3', name: 'Product C' },
    { id: '4', name: 'Product D' },
    { id: '5', name: 'Product E' },
];

// Product name search functionality
const searchProductName = async (productId: string, query: string) => {
    if (!productNameSearch.value[productId]) {
        productNameSearch.value[productId] = '';
    }
    productNameSearch.value[productId] = query;
    
    if (!query.trim()) {
        productNameSearchResults.value[productId] = [];
        productNameSearchLoading.value[productId] = false;
        return;
    }
    
    productNameSearchLoading.value[productId] = true;
    showProductNameDropdown.value[productId] = true;
    
    // Simulate API call - TODO: Replace with actual API call
    setTimeout(() => {
        const filtered = availableProducts.filter(product =>
            product.name.toLowerCase().includes(query.toLowerCase())
        );
        productNameSearchResults.value[productId] = filtered;
        productNameSearchLoading.value[productId] = false;
    }, 300);
};

const selectProductName = (productId: string, product: { id: string; name: string }) => {
    const productItem = products.value.find(p => p.id === productId);
    if (productItem) {
        productItem.productName = product.name;
    }
    showProductNameDropdown.value[productId] = false;
    productNameSearch.value[productId] = '';
    productNameSearchResults.value[productId] = [];
};


const productNameSearchInputRefs = ref<Record<string, HTMLInputElement | null>>({});

const openProductNameDropdown = (productId: string, event?: Event) => {
    if (event) {
        event.stopPropagation();
    }
    const isCurrentlyOpen = showProductNameDropdown.value[productId];
    
    // Close all other product name dropdowns first
    Object.keys(showProductNameDropdown.value).forEach(id => {
        if (id !== productId) {
            showProductNameDropdown.value[id] = false;
        }
    });
    
    // Toggle the clicked dropdown
    showProductNameDropdown.value[productId] = !isCurrentlyOpen;
    
    if (showProductNameDropdown.value[productId]) {
        const productItem = products.value.find(p => p.id === productId);
        if (!productNameSearch.value[productId]) {
            productNameSearch.value[productId] = productItem?.productName || '';
        }
        // Clear results initially to show "No result found"
        if (!productNameSearch.value[productId]?.trim()) {
            productNameSearchResults.value[productId] = [];
        }
    }
    nextTick(() => {
        if (showProductNameDropdown.value[productId] && productNameSearchInputRefs.value[productId]) {
            productNameSearchInputRefs.value[productId]?.focus();
        }
    });
};

const addProduct = () => {
    const newId = Date.now().toString();
    products.value.push({
        id: newId,
        productName: '',
        quantity: 1,
        price: 0,
        amount: 0,
    });
    showProductNameDropdown.value[newId] = false;
    productNameSearch.value[newId] = '';
    productNameSearchResults.value[newId] = [];
};

const removeProduct = (id: string) => {
    products.value = products.value.filter(p => p.id !== id);
    delete showProductNameDropdown.value[id];
    delete productNameSearch.value[id];
    delete productNameSearchResults.value[id];
    delete productNameSearchLoading.value[id];
    delete productNameSearchInputRefs.value[id];
};

const updateProductAmount = (product: Product) => {
    product.amount = product.quantity * product.price;
};

// Dropdown options
const sourceOptions = ['Phone', 'Email', 'Web Form', 'Direct', 'Referral'];
const typeOptions = ['Enquiry', 'New Business', 'Existing Business'];
const salesOwnerOptions = ['Example', 'John Doe', 'Jane Smith'];

const showSourceDropdown = ref(false);
const showTypeDropdown = ref(false);
const showSalesOwnerDropdown = ref(false);
const showNameDropdown = ref(false);
const showOrganizationDropdown = ref(false);

// Name search
const nameSearch = ref('');
const nameSearchResults = ref<Array<{ id: string; name: string }>>([]);
const nameSearchLoading = ref(false);
const availableNames = [
    { id: '1', name: 'Billy James' },
    { id: '2', name: 'John Doe' },
    { id: '3', name: 'Jane Smith' },
    { id: '4', name: 'Mike Davis' },
    { id: '5', name: 'Sarah Johnson' },
];

// Organization search
const organizationSearch = ref('');
const organizationSearchResults = ref<Array<{ id: string; name: string }>>([]);
const organizationSearchLoading = ref(false);
const availableOrganizations = [
    { id: '1', name: 'SentinelSecure' },
    { id: '2', name: 'TechCorp' },
    { id: '3', name: 'GlobalTech Solutions' },
    { id: '4', name: 'InnovateHub' },
    { id: '5', name: 'Digital Dynamics' },
];

// Click outside handler
const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    if (!target.closest('.dropdown-container')) {
        showSourceDropdown.value = false;
        showTypeDropdown.value = false;
        showSalesOwnerDropdown.value = false;
        showOrganizationDropdown.value = false;
        Object.keys(showEmailTypeDropdown.value).forEach(key => {
            showEmailTypeDropdown.value[key] = false;
        });
        Object.keys(showContactNumberTypeDropdown.value).forEach(key => {
            showContactNumberTypeDropdown.value[key] = false;
        });
    }
    // Close name dropdown if clicking outside
    if (!target.closest('.name-search-container')) {
        showNameDropdown.value = false;
    }
    // Close organization dropdown if clicking outside
    if (!target.closest('.organization-search-container')) {
        showOrganizationDropdown.value = false;
    }
    // Close product name dropdowns if clicking outside
    Object.keys(showProductNameDropdown.value).forEach(productId => {
        if (!target.closest(`.product-name-search-container-${productId}`)) {
            showProductNameDropdown.value[productId] = false;
        }
    });
};

const initializeFlatpickr = () => {
    if (expectedCloseDateInputRef.value && !expectedCloseDatePicker.value) {
        const inputElement = expectedCloseDateInputRef.value as HTMLInputElement;
        expectedCloseDatePicker.value = flatpickr(inputElement, {
            dateFormat: 'Y-m-d',
            allowInput: false,
            clickOpens: true,
            enableTime: false,
            weekNumbers: true,
            animate: true,
            static: false,
            onChange: (selectedDates, dateStr) => {
                if (selectedDates.length > 0) {
                    form.value.expectedCloseDate = dateStr;
                }
            },
        });
    }
};

const destroyFlatpickr = () => {
    if (expectedCloseDatePicker.value) {
        expectedCloseDatePicker.value.destroy();
        expectedCloseDatePicker.value = null;
    }
};

const validateForm = (): boolean => {
    errors.value = {};
    
    if (!form.value.title.trim()) {
        errors.value.title = 'The Title field is required';
    }
    
    if (!form.value.source.trim()) {
        errors.value.source = 'The Source field is required';
    }
    
    if (!form.value.type.trim()) {
        errors.value.type = 'The Type field is required';
    }
    
    if (!form.value.leadValue.trim()) {
        errors.value.leadValue = 'The Lead Value field is required';
    }
    
    if (!contactPerson.value.name.trim()) {
        errors.value.contactName = 'The Name field is required';
    }
    
    if (!contactPerson.value.emails[0]?.email.trim()) {
        errors.value.email = 'The Email field is required';
    }
    
    return Object.keys(errors.value).length === 0;
};

const submit = () => {
    if (validateForm()) {
        // TODO: Implement form submission
        console.log('Form submitted:', { form: form.value, contactPerson: contactPerson.value, products: products.value });
        router.visit(leadsIndex().url);
    }
};
</script>

<template>
    <Head title="Create Lead" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col overflow-hidden bg-background">
            <div class="flex-1 overflow-y-auto">
                <div class="px-3 sm:px-4 lg:px-6 py-3 lg:py-4">
                    <!-- Header -->
                    <div class="mb-6 flex items-center justify-between">
                        <h1 class="text-2xl font-semibold text-foreground">Create Lead</h1>
                        <Button @click="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">
                            Save
                        </Button>
                    </div>

                    <!-- Tabs -->
                    <div class="mb-6 flex gap-0 border-b border-border">
                        <button
                            v-for="tab in tabs"
                            :key="tab.id"
                            @click="scrollToSection(tab.id)"
                            :class="[
                                'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                                activeTab === tab.id
                                    ? 'border-blue-600 text-foreground'
                                    : 'border-transparent text-muted-foreground hover:text-foreground',
                            ]"
                        >
                            {{ tab.label }}
                        </button>
                    </div>

                    <!-- Tab Content -->
                    <div class="space-y-6 max-w-4xl">
                        <!-- Details Section -->
                        <div id="details" class="space-y-6 scroll-mt-4">
                            <div>
                                <h2 class="mb-2 text-base font-medium text-foreground">Details</h2>
                                <p class="mb-4 text-sm text-muted-foreground">
                                    Put The Basic Information of the Lead
                                </p>
                                <div class="space-y-4">
                                    <!-- Title -->
                                    <div>
                                        <Label for="title" class="mb-1 block text-sm font-medium text-foreground">
                                            Title <span class="text-red-500">*</span>
                                        </Label>
                                        <Input
                                            id="title"
                                            v-model="form.title"
                                            type="text"
                                            placeholder="Enter title"
                                            class="w-full"
                                            :class="errors.title ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                                        />
                                        <p v-if="errors.title" class="mt-1 text-xs text-red-500">
                                            {{ errors.title }}
                                        </p>
                                    </div>

                                    <!-- Description -->
                                    <div>
                                        <Label for="description" class="mb-1 block text-sm font-medium text-foreground">
                                            Description
                                        </Label>
                                        <textarea
                                            id="description"
                                            v-model="form.description"
                                            rows="1"
                                            placeholder="Enter description"
                                            class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y min-h-[40px]"
                                        ></textarea>
                                    </div>

                                    <!-- Source and Expected Close Date in one row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <!-- Source -->
                                        <div class="relative dropdown-container">
                                            <Label for="source" class="mb-1 block text-sm font-medium text-foreground">
                                                Source <span class="text-red-500">*</span>
                                            </Label>
                                            <div class="relative">
                                                <button
                                                    @click="showSourceDropdown = !showSourceDropdown"
                                                    type="button"
                                                    class="w-full flex items-center justify-between rounded-md border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 cursor-pointer"
                                                    :class="errors.source ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-border focus:ring-blue-500'"
                                                >
                                                    <span :class="form.source ? 'text-foreground' : 'text-muted-foreground'">
                                                        {{ form.source || 'Select source' }}
                                                    </span>
                                                    <ChevronDown class="size-4 text-muted-foreground" />
                                                </button>
                                                <div
                                                    v-if="showSourceDropdown"
                                                    class="absolute top-full left-0 right-0 z-10 mt-1 max-h-48 overflow-y-auto rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                >
                                                    <button
                                                        v-for="option in sourceOptions"
                                                        :key="option"
                                                        @click="form.source = option; showSourceDropdown = false"
                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                    >
                                                        {{ option }}
                                                    </button>
                                                </div>
                                            </div>
                                            <p v-if="errors.source" class="mt-1 text-xs text-red-500">
                                                {{ errors.source }}
                                            </p>
                                        </div>

                                        <!-- Expected Close Date -->
                                        <div>
                                            <Label for="expectedCloseDate" class="mb-1 block text-sm font-medium text-foreground">
                                                Expected Close Date
                                            </Label>
                                            <div class="relative">
                                                <input
                                                    id="expectedCloseDate"
                                                    ref="expectedCloseDateInputRef"
                                                    v-model="form.expectedCloseDate"
                                                    type="text"
                                                    placeholder="Select date"
                                                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 pr-10"
                                                    readonly
                                                />
                                                <button
                                                    type="button"
                                                    @click="expectedCloseDatePicker?.open()"
                                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground hover:text-foreground cursor-pointer"
                                                >
                                                    <Calendar class="size-4" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Type and Sales Owner in one row -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <!-- Type -->
                                        <div class="relative dropdown-container">
                                            <Label for="type" class="mb-1 block text-sm font-medium text-foreground">
                                                Type <span class="text-red-500">*</span>
                                            </Label>
                                            <div class="relative">
                                                <button
                                                    @click="showTypeDropdown = !showTypeDropdown"
                                                    type="button"
                                                    class="w-full flex items-center justify-between rounded-md border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 cursor-pointer"
                                                    :class="errors.type ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-border focus:ring-blue-500'"
                                                >
                                                    <span :class="form.type ? 'text-foreground' : 'text-muted-foreground'">
                                                        {{ form.type || 'Select type' }}
                                                    </span>
                                                    <ChevronDown class="size-4 text-muted-foreground" />
                                                </button>
                                                <div
                                                    v-if="showTypeDropdown"
                                                    class="absolute top-full left-0 right-0 z-10 mt-1 max-h-48 overflow-y-auto rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                >
                                                    <button
                                                        v-for="option in typeOptions"
                                                        :key="option"
                                                        @click="form.type = option; showTypeDropdown = false"
                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                    >
                                                        {{ option }}
                                                    </button>
                                                </div>
                                            </div>
                                            <p v-if="errors.type" class="mt-1 text-xs text-red-500">
                                                {{ errors.type }}
                                            </p>
                                        </div>

                                        <!-- Sales Owner -->
                                        <div class="relative dropdown-container">
                                            <Label for="salesOwner" class="mb-1 block text-sm font-medium text-foreground">
                                                Sales Owner
                                            </Label>
                                            <div class="relative">
                                                <button
                                                    @click="showSalesOwnerDropdown = !showSalesOwnerDropdown"
                                                    type="button"
                                                    class="w-full flex items-center justify-between rounded-md border border-border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                                >
                                                    <span :class="form.salesOwner ? 'text-foreground' : 'text-muted-foreground'">
                                                        {{ form.salesOwner || 'Select sales owner' }}
                                                    </span>
                                                    <ChevronDown class="size-4 text-muted-foreground" />
                                                </button>
                                                <div
                                                    v-if="showSalesOwnerDropdown"
                                                    class="absolute top-full left-0 right-0 z-10 mt-1 max-h-48 overflow-y-auto rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                >
                                                    <button
                                                        v-for="option in salesOwnerOptions"
                                                        :key="option"
                                                        @click="form.salesOwner = option; showSalesOwnerDropdown = false"
                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                    >
                                                        {{ option }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Lead Value -->
                                    <div>
                                        <Label for="leadValue" class="mb-1 block text-sm font-medium text-foreground">
                                            Lead Value ($) <span class="text-red-500">*</span>
                                        </Label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-muted-foreground">$</span>
                                            <Input
                                                id="leadValue"
                                                v-model="form.leadValue"
                                                type="number"
                                                step="0.01"
                                                min="0"
                                                placeholder="0.00"
                                                class="w-full pl-7"
                                                :class="errors.leadValue ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                                            />
                                        </div>
                                        <p v-if="errors.leadValue" class="mt-1 text-xs text-red-500">
                                            {{ errors.leadValue }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Person Section -->
                        <div id="contact-person" class="space-y-6 scroll-mt-4">
                            <div>
                                <h2 class="mb-2 text-base font-medium text-foreground">Contact Person</h2>
                                <p class="mb-4 text-sm text-muted-foreground">
                                    Information About the Contact Person
                                </p>
                                <div class="space-y-4">
                                    <!-- Name -->
                                    <div class="relative name-search-container">
                                        <Label for="contactName" class="mb-1 block text-sm font-medium text-foreground">
                                            Name <span class="text-red-500">*</span>
                                        </Label>
                                        <div class="relative">
                                            <button
                                                @click.stop="openNameDropdown($event)"
                                                type="button"
                                                class="w-full flex items-center justify-between rounded-md border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 cursor-pointer"
                                                :class="errors.contactName ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-border focus:ring-blue-500'"
                                            >
                                                <span :class="contactPerson.name ? 'text-foreground' : 'text-muted-foreground'">
                                                    {{ contactPerson.name || 'Click to Add' }}
                                                </span>
                                                <div class="flex items-center gap-2">
                                                    <button
                                                        v-if="contactPerson.name && !showNameDropdown"
                                                        @click.stop="contactPerson.name = ''; nameSearch = ''; nameSearchResults = []"
                                                        type="button"
                                                        class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                        aria-label="Clear name"
                                                    >
                                                        <X class="size-4 text-muted-foreground hover:text-foreground" />
                                                    </button>
                                                    <ChevronUp v-if="showNameDropdown" class="size-4 text-muted-foreground" />
                                                    <ChevronDown v-else class="size-4 text-muted-foreground" />
                                                </div>
                                            </button>
                                            
                                            <!-- Search Popup (shown when dropdown is open) -->
                                            <div
                                                v-if="showNameDropdown"
                                                class="absolute top-full left-0 right-0 z-50 mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                            >
                                                <div class="relative">
                                                    <input
                                                        ref="nameSearchInputRef"
                                                        v-model="nameSearch"
                                                        @input="searchName(nameSearch)"
                                                        type="text"
                                                        placeholder="Search..."
                                                        class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                                    />
                                                    <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                        <div v-if="nameSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Search Results Dropdown -->
                                                <div class="max-h-48 overflow-y-auto border-t border-border">
                                                    <!-- Loading State -->
                                                    <div v-if="nameSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                                        Searching...
                                                    </div>
                                                    
                                                    <!-- Search Results -->
                                                    <div v-else-if="nameSearchResults.length > 0">
                                                        <button
                                                            v-for="person in nameSearchResults"
                                                            :key="person.id"
                                                            @click="selectName(person)"
                                                            type="button"
                                                            class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                        >
                                                            {{ person.name }}
                                                        </button>
                                                    </div>
                                                    
                                                    <!-- No Results -->
                                                    <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                                        No result found
                                                    </div>
                                                    
                                                    <!-- Add as New Option -->
                                                    <button
                                                        v-if="nameSearch.trim()"
                                                        @click="addNameAsNew"
                                                        type="button"
                                                        class="w-full flex items-center gap-1 px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground border-t border-border cursor-pointer"
                                                    >
                                                        <Plus class="size-4" />
                                                        Add as New
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <p v-if="errors.contactName" class="mt-1 text-xs text-red-500">
                                            {{ errors.contactName }}
                                        </p>
                                    </div>

                                    <!-- Emails -->
                                    <div>
                                        <Label class="mb-1 block text-sm font-medium text-foreground">
                                            Email <span class="text-red-500">*</span>
                                        </Label>
                                        <div class="space-y-2">
                                            <div
                                                v-for="email in contactPerson.emails"
                                                :key="email.id"
                                                class="flex gap-2"
                                            >
                                                <Input
                                                    v-model="email.email"
                                                    type="email"
                                                    placeholder="Enter email"
                                                    class="flex-1"
                                                    :class="errors.email && !email.email.trim() ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                                                />
                                                <div class="relative dropdown-container">
                                                    <button
                                                        @click="showEmailTypeDropdown[email.id] = !showEmailTypeDropdown[email.id]"
                                                        type="button"
                                                        class="flex items-center gap-1 rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground hover:bg-muted cursor-pointer"
                                                    >
                                                        {{ email.type }}
                                                        <ChevronDown class="size-4" />
                                                    </button>
                                                    <div
                                                        v-if="showEmailTypeDropdown[email.id]"
                                                        class="absolute top-full right-0 z-10 mt-1 min-w-[120px] rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                    >
                                                        <button
                                                            v-for="type in emailTypes"
                                                            :key="type"
                                                            @click="email.type = type; showEmailTypeDropdown[email.id] = false"
                                                            type="button"
                                                            :class="[
                                                                'w-full text-left px-3 py-2 text-sm transition-colors cursor-pointer',
                                                                email.type === type 
                                                                    ? 'bg-blue-600 text-white' 
                                                                    : 'hover:bg-muted text-foreground'
                                                            ]"
                                                        >
                                                            {{ type }}
                                                        </button>
                                                    </div>
                                                </div>
                                                <button
                                                    v-if="contactPerson.emails.length > 1"
                                                    @click="removeEmail(email.id)"
                                                    type="button"
                                                    class="p-2 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                    title="Remove email"
                                                >
                                                    <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                                </button>
                                            </div>
                                        </div>
                                        <p v-if="errors.email" class="mt-1 text-xs text-red-500">
                                            {{ errors.email }}
                                        </p>
                                        <button
                                            @click="addEmail"
                                            type="button"
                                            class="mt-2 flex items-center gap-1 text-sm text-blue-600 dark:text-blue-400 hover:underline cursor-pointer"
                                        >
                                            <Plus class="size-4" />
                                            Add More
                                        </button>
                                    </div>

                                    <!-- Contact Numbers -->
                                    <div>
                                        <Label class="mb-1 block text-sm font-medium text-foreground">
                                            Contact Number
                                        </Label>
                                        <div class="space-y-2">
                                            <div
                                                v-for="contactNumber in contactPerson.contactNumbers"
                                                :key="contactNumber.id"
                                                class="flex gap-2"
                                            >
                                                <Input
                                                    v-model="contactNumber.number"
                                                    type="tel"
                                                    placeholder="Enter contact number"
                                                    class="flex-1"
                                                />
                                                <div class="relative dropdown-container">
                                                    <button
                                                        @click="showContactNumberTypeDropdown[contactNumber.id] = !showContactNumberTypeDropdown[contactNumber.id]"
                                                        type="button"
                                                        class="flex items-center gap-1 rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground hover:bg-muted cursor-pointer"
                                                    >
                                                        {{ contactNumber.type }}
                                                        <ChevronDown class="size-4" />
                                                    </button>
                                                    <div
                                                        v-if="showContactNumberTypeDropdown[contactNumber.id]"
                                                        class="absolute top-full right-0 z-10 mt-1 min-w-[120px] rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                    >
                                                        <button
                                                            v-for="type in contactNumberTypes"
                                                            :key="type"
                                                            @click="contactNumber.type = type; showContactNumberTypeDropdown[contactNumber.id] = false"
                                                            type="button"
                                                            class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                        >
                                                            {{ type }}
                                                        </button>
                                                    </div>
                                                </div>
                                                <button
                                                    v-if="contactPerson.contactNumbers.length > 1"
                                                    @click="removeContactNumber(contactNumber.id)"
                                                    type="button"
                                                    class="p-2 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                    title="Remove contact number"
                                                >
                                                    <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                                </button>
                                            </div>
                                        </div>
                                        <button
                                            @click="addContactNumber"
                                            type="button"
                                            class="mt-2 flex items-center gap-1 text-sm text-blue-600 dark:text-blue-400 hover:underline cursor-pointer"
                                        >
                                            <Plus class="size-4" />
                                            Add More
                                        </button>
                                    </div>

                                    <!-- Organization -->
                                    <div class="relative organization-search-container">
                                        <Label for="organization" class="mb-1 block text-sm font-medium text-foreground">
                                            Organization
                                        </Label>
                                        <div class="relative">
                                            <button
                                                @click.stop="openOrganizationDropdown($event)"
                                                type="button"
                                                class="w-full flex items-center justify-between rounded-md border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 cursor-pointer"
                                                :class="errors.organization ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-border focus:ring-blue-500'"
                                            >
                                                <span :class="contactPerson.organization ? 'text-foreground' : 'text-muted-foreground'">
                                                    {{ contactPerson.organization || 'Click to add' }}
                                                </span>
                                                <div class="flex items-center gap-2">
                                                    <button
                                                        v-if="contactPerson.organization && !showOrganizationDropdown"
                                                        @click.stop="contactPerson.organization = ''; organizationSearch = ''; organizationSearchResults = []"
                                                        type="button"
                                                        class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                        aria-label="Clear organization"
                                                    >
                                                        <X class="size-4 text-muted-foreground hover:text-foreground" />
                                                    </button>
                                                    <ChevronUp v-if="showOrganizationDropdown" class="size-4 text-muted-foreground" />
                                                    <ChevronDown v-else class="size-4 text-muted-foreground" />
                                                </div>
                                            </button>
                                            
                                            <!-- Search Popup (shown when dropdown is open) -->
                                            <div
                                                v-if="showOrganizationDropdown"
                                                class="absolute top-full left-0 right-0 z-50 mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                            >
                                                <div class="relative">
                                                    <input
                                                        ref="organizationSearchInputRef"
                                                        v-model="organizationSearch"
                                                        @input="searchOrganization(organizationSearch)"
                                                        type="text"
                                                        placeholder="Search..."
                                                        class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                                    />
                                                    <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                        <div v-if="organizationSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Search Results Dropdown -->
                                                <div class="max-h-48 overflow-y-auto border-t border-border">
                                                    <!-- Loading State -->
                                                    <div v-if="organizationSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                                        Searching...
                                                    </div>
                                                    
                                                    <!-- Search Results -->
                                                    <div v-else-if="organizationSearchResults.length > 0">
                                                        <button
                                                            v-for="organization in organizationSearchResults"
                                                            :key="organization.id"
                                                            @click="selectOrganization(organization)"
                                                            type="button"
                                                            class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                        >
                                                            {{ organization.name }}
                                                        </button>
                                                    </div>
                                                    
                                                    <!-- No Results -->
                                                    <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                                        No result found
                                                    </div>
                                                    
                                                    <!-- Add as New Option -->
                                                    <button
                                                        v-if="organizationSearch.trim()"
                                                        @click="addOrganizationAsNew"
                                                        type="button"
                                                        class="w-full flex items-center gap-1 px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground border-t border-border cursor-pointer"
                                                    >
                                                        <Plus class="size-4" />
                                                        Add as New
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <p v-if="errors.organization" class="mt-1 text-xs text-red-500">
                                            {{ errors.organization }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products Section -->
                        <div id="products" class="space-y-6 scroll-mt-4">
                            <div>
                                <h2 class="mb-2 text-base font-medium text-foreground">Products</h2>
                                <p class="mb-4 text-sm text-muted-foreground">
                                    Information About the Products
                                </p>
                                <div class="">
                                    <table class="w-full border-collapse">
                                        <thead>
                                            <tr class="border-b border-border">
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground">Product Name</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground w-[100px]">Quantity</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground w-[120px]">Price</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground w-[120px]">Amount</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="product in products"
                                                :key="product.id"
                                                class="border-b border-border"
                                            >
                                                <td class="px-4 py-3 max-w-[200px]">
                                                    <div 
                                                        class="relative product-name-search-container" 
                                                        :class="`product-name-search-container-${product.id}`"
                                                        :style="showProductNameDropdown[product.id] ? 'z-index: 10000;' : ''"
                                                    >
                                                        <button
                                                            @click.stop="openProductNameDropdown(product.id, $event)"
                                                            type="button"
                                                            class="w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 border-border focus:ring-blue-500 min-w-0 cursor-pointer"
                                                        >
                                                            <span :class="product.productName ? 'text-foreground' : 'text-muted-foreground'" class="truncate flex-1 text-left min-w-0">
                                                                {{ product.productName || 'Click to Add' }}
                                                            </span>
                                                            <div class="flex items-center gap-2 shrink-0">
                                                                <button
                                                                    v-if="product.productName && !showProductNameDropdown[product.id]"
                                                                    @click.stop="product.productName = ''; productNameSearch[product.id] = ''; productNameSearchResults[product.id] = []"
                                                                    type="button"
                                                                    class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                                    aria-label="Clear product name"
                                                                >
                                                                    <X class="size-4 text-muted-foreground hover:text-foreground" />
                                                                </button>
                                                                <ChevronUp v-if="showProductNameDropdown[product.id]" class="size-4 text-muted-foreground" />
                                                                <ChevronDown v-else class="size-4 text-muted-foreground" />
                                                            </div>
                                                        </button>
                                                        
                                                        <!-- Search Popup (shown when dropdown is open) -->
                                                        <div
                                                            v-if="showProductNameDropdown[product.id]"
                                                            class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                        >
                                                            <div class="relative">
                                                                <input
                                                                    :ref="el => { if (el) productNameSearchInputRefs[product.id] = el as HTMLInputElement }"
                                                                    :value="productNameSearch[product.id] || ''"
                                                                    @input="searchProductName(product.id, ($event.target as HTMLInputElement).value)"
                                                                    type="text"
                                                                    placeholder="Search..."
                                                                    class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                                                />
                                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                                    <div v-if="productNameSearchLoading[product.id]" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Search Results Dropdown -->
                                                            <div class="max-h-48 overflow-y-auto border-t border-border">
                                                                <!-- Loading State -->
                                                                <div v-if="productNameSearchLoading[product.id]" class="px-3 py-2 text-xs text-muted-foreground">
                                                                    Searching...
                                                                </div>
                                                                
                                                                <!-- Search Results -->
                                                                <div v-else-if="productNameSearchResults[product.id] && productNameSearchResults[product.id].length > 0">
                                                                    <button
                                                                        v-for="productOption in productNameSearchResults[product.id]"
                                                                        :key="productOption.id"
                                                                        @click="selectProductName(product.id, productOption)"
                                                                        type="button"
                                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                                    >
                                                                        {{ productOption.name }}
                                                                    </button>
                                                                </div>
                                                                
                                                                <!-- No Results -->
                                                                <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                                                    No result found
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 w-[100px]">
                                                    <input
                                                        v-model.number="product.quantity"
                                                        type="number"
                                                        min="1"
                                                        @input="updateProductAmount(product)"
                                                        class="w-full px-3 py-2 rounded-md border border-border bg-background text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    />
                                                </td>
                                                <td class="px-4 py-3 w-[120px]">
                                                    <div class="relative">
                                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-muted-foreground">$</span>
                                                        <input
                                                            v-model.number="product.price"
                                                            type="number"
                                                            step="0.01"
                                                            min="0"
                                                            @input="updateProductAmount(product)"
                                                            class="w-full pl-7 pr-3 py-2 rounded-md border border-border bg-background text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                        />
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 w-[120px]">
                                                    <div class="text-sm font-medium text-foreground">
                                                        ${{ product.amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <button
                                                        @click="removeProduct(product.id)"
                                                        type="button"
                                                        class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                        aria-label="Remove product"
                                                    >
                                                        <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button
                                    @click="addProduct"
                                    type="button"
                                    class="mt-4 flex items-center gap-1 text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium cursor-pointer"
                                >
                                    <Plus class="size-4" />
                                    Add More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

