<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { FileText, Package, Settings, DollarSign, Eye, Plus, Info, Check, X, Edit, Trash2, ChevronLeft, ChevronRight, Lightbulb, Gift, CreditCard, BarChart, ChevronDown, Monitor, Star, Ticket, Calendar } from 'lucide-vue-next';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import type { Instance } from 'flatpickr/dist/types/instance';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogFooter, DialogClose, DialogDescription } from '@/components/ui/dialog';
import { Checkbox } from '@/components/ui/checkbox';
import { useToast } from '@/composables/useToast';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Subscription Management',
        href: '#',
    },
];

// Active tab state
const activeTab = ref('features');

// Navigation tabs
const tabs = [
    { id: 'features', label: 'Features', icon: FileText },
    { id: 'packages', label: 'Packages', icon: Package },
    { id: 'configuration', label: 'Configuration', icon: Settings },
    { id: 'pricing', label: 'Pricing', icon: DollarSign },
    { id: 'coupons', label: 'Coupons', icon: Ticket },
    { id: 'preview', label: 'Preview', icon: Eye },
];

// Pagination state
const currentPage = ref(1);
const perPage = ref(10);

// Dummy data for subscription features
const features = ref([
    {
        id: 1,
        name: 'Projects',
        key: 'projects',
        dataType: 'Number',
        metered: false,
        status: 'active',
    },
    {
        id: 2,
        name: 'Storage (GB)',
        key: 'storage_gb',
        dataType: 'Number',
        metered: true,
        status: 'active',
    },
    {
        id: 3,
        name: 'Team Members',
        key: 'team_members',
        dataType: 'Number',
        metered: false,
        status: 'active',
    },
    {
        id: 4,
        name: 'API Access',
        key: 'api_access',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 5,
        name: 'Custom Domain',
        key: 'custom_domain',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 6,
        name: 'Email Support',
        key: 'email_support',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 7,
        name: 'Priority Support',
        key: 'priority_support',
        dataType: 'Boolean',
        metered: false,
        status: 'inactive',
    },
    {
        id: 8,
        name: 'Monthly API Calls',
        key: 'api_calls',
        dataType: 'Number',
        metered: true,
        status: 'active',
    },
    {
        id: 9,
        name: 'Database Size (GB)',
        key: 'database_gb',
        dataType: 'Number',
        metered: true,
        status: 'active',
    },
    {
        id: 10,
        name: 'Bandwidth (GB)',
        key: 'bandwidth_gb',
        dataType: 'Number',
        metered: true,
        status: 'active',
    },
    {
        id: 11,
        name: 'SSL Certificates',
        key: 'ssl_certificates',
        dataType: 'Number',
        metered: false,
        status: 'active',
    },
    {
        id: 12,
        name: 'Backup Storage',
        key: 'backup_storage',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 13,
        name: 'Advanced Analytics',
        key: 'advanced_analytics',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 14,
        name: 'Custom Branding',
        key: 'custom_branding',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 15,
        name: 'White Label',
        key: 'white_label',
        dataType: 'Boolean',
        metered: false,
        status: 'inactive',
    },
    {
        id: 16,
        name: 'Mobile App Access',
        key: 'mobile_app',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 17,
        name: 'Webhooks',
        key: 'webhooks',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 18,
        name: 'Integrations',
        key: 'integrations',
        dataType: 'Number',
        metered: false,
        status: 'active',
    },
    {
        id: 19,
        name: 'Monthly Reports',
        key: 'monthly_reports',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 20,
        name: 'Custom Reports',
        key: 'custom_reports',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 21,
        name: 'Data Export',
        key: 'data_export',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 22,
        name: 'SMS Notifications',
        key: 'sms_notifications',
        dataType: 'Number',
        metered: true,
        status: 'active',
    },
    {
        id: 23,
        name: 'Email Notifications',
        key: 'email_notifications',
        dataType: 'Number',
        metered: true,
        status: 'active',
    },
    {
        id: 24,
        name: 'Push Notifications',
        key: 'push_notifications',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 25,
        name: 'Multi-language Support',
        key: 'multi_language',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 26,
        name: 'Advanced Permissions',
        key: 'advanced_permissions',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 27,
        name: 'Audit Logs',
        key: 'audit_logs',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 28,
        name: 'Two-Factor Authentication',
        key: 'two_factor_auth',
        dataType: 'Boolean',
        metered: false,
        status: 'active',
    },
    {
        id: 29,
        name: 'Single Sign-On (SSO)',
        key: 'sso',
        dataType: 'Boolean',
        metered: false,
        status: 'inactive',
    },
    {
        id: 30,
        name: 'Custom Workflows',
        key: 'custom_workflows',
        dataType: 'Number',
        metered: false,
        status: 'active',
    },
    {
        id: 31,
        name: 'Automation Rules',
        key: 'automation_rules',
        dataType: 'Number',
        metered: false,
        status: 'active',
    },
    {
        id: 32,
        name: 'API Rate Limit',
        key: 'api_rate_limit',
        dataType: 'Number',
        metered: true,
        status: 'active',
    },
]);

// Pagination computed properties
const paginatedFeatures = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return features.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(features.value.length / perPage.value);
});

const paginationInfo = computed(() => {
    const start = (currentPage.value - 1) * perPage.value + 1;
    const end = Math.min(currentPage.value * perPage.value, features.value.length);
    return `${start} - ${end} of ${features.value.length}`;
});

const goToPage = (page: number) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

// Reset to page 1 when per page changes
watch(perPage, () => {
    currentPage.value = 1;
});

// Ensure current page is valid when data changes
watch(features, () => {
    if (currentPage.value > totalPages.value && totalPages.value > 0) {
        currentPage.value = totalPages.value;
    }
}, { deep: true });

const getDataTypeColor = (dataType: string): string => {
    switch (dataType) {
        case 'Number':
            return 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400';
        case 'Boolean':
            return 'bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};

// Toast notification
const { success } = useToast();

// Delete confirmation modals
const showDeleteFeatureModal = ref(false);
const featureToDelete = ref<number | null>(null);

const showDeletePackageModal = ref(false);
const packageToDelete = ref<number | null>(null);

const showDeleteCouponModal = ref(false);
const couponToDelete = ref<any | null>(null);

const handleEdit = (featureId: number) => {
    console.log('Edit feature:', featureId);
    // TODO: Implement edit functionality
};

const handleDelete = (featureId: number) => {
    featureToDelete.value = featureId;
    showDeleteFeatureModal.value = true;
};

const confirmDeleteFeature = () => {
    if (featureToDelete.value !== null) {
        // Remove feature from the list
        features.value = features.value.filter(f => f.id !== featureToDelete.value);
        // Reset to page 1 if current page becomes empty
        if (paginatedFeatures.value.length === 0 && currentPage.value > 1) {
            currentPage.value = Math.max(1, currentPage.value - 1);
        }
        
        // Show success toast
        success('Feature deleted successfully.');
        
        featureToDelete.value = null;
    }
    showDeleteFeatureModal.value = false;
};

const cancelDeleteFeature = () => {
    featureToDelete.value = null;
    showDeleteFeatureModal.value = false;
};

// Dummy data for subscription packages
const packages = ref([
    {
        id: 1,
        name: 'Basic Plan',
        subtitle: 'BASIC',
        status: 'active',
        description: 'Perfect for individuals and small teams getting started',
        monthlyEnabled: true,
        annualEnabled: true,
        trialDays: 14,
        creditCardRequired: false,
    },
    {
        id: 2,
        name: 'Professional Plan',
        subtitle: 'PRO',
        status: 'active',
        description: 'For growing teams and businesses needing more power',
        monthlyEnabled: true,
        annualEnabled: true,
        trialDays: 30,
        creditCardRequired: true,
    },
    {
        id: 3,
        name: 'Enterprise Plan',
        subtitle: 'ENTERPRISE',
        status: 'active',
        description: 'Advanced features and unlimited resources for large organizations',
        monthlyEnabled: true,
        annualEnabled: true,
        trialDays: null,
        creditCardRequired: true,
    },
]);

// Create Package Modal State
const showCreatePackageModal = ref(false);
const newPackage = ref({
    name: '',
    code: '',
    description: '',
    billingType: 'monthly',
    enableTrial: false,
    creditCardRequired: true,
    status: 'active',
});

const billingTypes = ['monthly', 'annual'];
const packageStatusOptions = ['active', 'inactive'];

const handleCreatePackage = () => {
    showCreatePackageModal.value = true;
};

const handleClosePackageModal = () => {
    showCreatePackageModal.value = false;
    // Reset form
    newPackage.value = {
        name: '',
        code: '',
        description: '',
        billingType: 'monthly',
        enableTrial: false,
        creditCardRequired: true,
        status: 'active',
    };
};

const handleSubmitPackage = () => {
    // Validate required fields
    if (!newPackage.value.name || !newPackage.value.code || !newPackage.value.billingType) {
        return;
    }

    // Generate package code from name if not provided
    if (!newPackage.value.code) {
        newPackage.value.code = newPackage.value.name.toLowerCase().replace(/\s+/g, '_');
    }

    // Add new package to the list
    const newId = packages.value.length > 0 ? Math.max(...packages.value.map(p => p.id)) + 1 : 1;
    packages.value.push({
        id: newId,
        name: newPackage.value.name,
        subtitle: newPackage.value.code.toUpperCase(),
        status: newPackage.value.status,
        description: newPackage.value.description,
        monthlyEnabled: newPackage.value.billingType === 'monthly',
        annualEnabled: newPackage.value.billingType === 'annual',
        trialDays: newPackage.value.enableTrial ? 14 : null,
        creditCardRequired: newPackage.value.creditCardRequired,
    });

    // Close modal and reset form
    handleClosePackageModal();
};

const handleEditPackage = (packageId: number) => {
    console.log('Edit package:', packageId);
    // TODO: Implement edit package functionality
};

const handleDeletePackage = (packageId: number) => {
    packageToDelete.value = packageId;
    showDeletePackageModal.value = true;
};

const confirmDeletePackage = () => {
    if (packageToDelete.value !== null) {
        // Remove package from the list
        packages.value = packages.value.filter(p => p.id !== packageToDelete.value);
        
        // Show success toast
        success('Package deleted successfully.');
        
        packageToDelete.value = null;
    }
    showDeletePackageModal.value = false;
};

const cancelDeletePackage = () => {
    packageToDelete.value = null;
    showDeletePackageModal.value = false;
};

// Configuration tab state
const selectedPackage = ref<string>('');

// Dummy data for configuration table - editable per package
const configurationData = ref([
    {
        feature: 'Projects',
        basic: { type: 'limited', value: 0 },
        pro: { type: 'limited', value: 0 },
        enterprise: { type: 'unlimited', value: 0 },
    },
    {
        feature: 'Storage (GB)',
        basic: { type: 'limited', value: 0 },
        pro: { type: 'limited', value: 0 },
        enterprise: { type: 'unlimited', value: 0 },
    },
    {
        feature: 'Team Members',
        basic: { type: 'limited', value: 0 },
        pro: { type: 'limited', value: 0 },
        enterprise: { type: 'unlimited', value: 0 },
    },
    {
        feature: 'API Access',
        basic: { type: 'disabled', value: 0 },
        pro: { type: 'limited', value: 0 },
        enterprise: { type: 'unlimited', value: 0 },
    },
]);

// Computed property to get the package key
const packageKey = computed(() => {
    if (!selectedPackage.value) return null;
    return selectedPackage.value as 'basic' | 'pro' | 'enterprise';
});

// Watch for package selection and initialize values
watch(selectedPackage, () => {
    if (!packageKey.value) return;
    
    configurationData.value.forEach((item) => {
        const config = item[packageKey.value!];
        // Ensure all values default to 0
        if (config.value === null || config.value === undefined) {
            config.value = 0;
        }
    });
}, { immediate: true });

// Watch for limit type changes and reset value if needed
watch(() => configurationData.value, () => {
    if (!packageKey.value) return;
    
    configurationData.value.forEach((item) => {
        const config = item[packageKey.value!];
        if (config.type !== 'limited') {
            // Set to 0 when unlimited or disabled
            config.value = 0;
        } else if (config.type === 'limited' && (config.value === null || config.value === undefined)) {
            // Default to 0 for limited if not set
            config.value = 0;
        }
    });
}, { deep: true });

const getLimitTypeDisplay = (limit: { type: string; value: number }): string => {
    if (limit.type === 'limited') {
        return `Limited (${limit.value ?? 0})`;
    } else if (limit.type === 'unlimited') {
        return 'Unlimited';
    } else {
        return 'Disabled';
    }
};

const getLimitTypeColor = (type: string): string => {
    switch (type) {
        case 'limited':
            return 'text-blue-600 dark:text-blue-400';
        case 'unlimited':
            return 'text-green-600 dark:text-green-400';
        case 'disabled':
            return 'text-red-600 dark:text-red-400';
        default:
            return 'text-foreground';
    }
};

const handleSaveConfiguration = () => {
    console.log('Saving configuration for package:', selectedPackage.value);
    console.log('Configuration data:', configurationData.value);
    // TODO: Implement save functionality
};

// Add Feature Modal State
const showAddFeatureModal = ref(false);
const newFeature = ref({
    name: '',
    key: '',
    dataType: 'Number',
    isMetered: false,
    description: '',
    status: 'active',
});

const dataTypes = ['Number', 'Boolean', 'Text'];
const statusOptions = ['active', 'inactive'];

const handleAddFeature = () => {
    showAddFeatureModal.value = true;
};

const handleCloseFeatureModal = () => {
    showAddFeatureModal.value = false;
    // Reset form
    newFeature.value = {
        name: '',
        key: '',
        dataType: 'Number',
        isMetered: false,
        description: '',
        status: 'active',
    };
};

const handleCreateFeature = () => {
    // Validate required fields
    if (!newFeature.value.name || !newFeature.value.key || !newFeature.value.dataType) {
        return;
    }

    // Generate feature key from name if not provided
    if (!newFeature.value.key) {
        newFeature.value.key = newFeature.value.name.toLowerCase().replace(/\s+/g, '_');
    }

    // Add new feature to the list
    const newId = features.value.length > 0 ? Math.max(...features.value.map(f => f.id)) + 1 : 1;
    features.value.push({
        id: newId,
        name: newFeature.value.name,
        key: newFeature.value.key,
        dataType: newFeature.value.dataType,
        metered: newFeature.value.isMetered,
        status: newFeature.value.status,
    });

    // Close modal and reset form
    handleCloseFeatureModal();
};

// Pricing tab state
const selectedPackageForPricing = ref<string>('');
const selectedCurrency = ref<string>('USD');

const currencies = ['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'JPY', 'INR'];

// Add Price Modal State
const showAddPriceModal = ref(false);
const newPrice = ref({
    billingCycle: 'monthly',
    price: 0,
    status: 'active',
});

const billingCycles = ['monthly', 'annual'];
const priceStatusOptions = ['active', 'inactive'];

const handleAddPrice = () => {
    if (!selectedPackageForPricing.value || !selectedCurrency.value) {
        return;
    }
    showAddPriceModal.value = true;
    // Reset form
    newPrice.value = {
        billingCycle: 'monthly',
        price: 0,
        status: 'active',
    };
};

const handleClosePriceModal = () => {
    showAddPriceModal.value = false;
    // Reset form
    newPrice.value = {
        billingCycle: 'monthly',
        price: 0,
        status: 'active',
    };
};

const handleSubmitPrice = () => {
    // Validate required fields
    if (!newPrice.value.billingCycle || newPrice.value.price === null || newPrice.value.price === undefined) {
        return;
    }

    // TODO: Implement save price functionality
    console.log('Adding price:', {
        package: selectedPackageForPricing.value,
        currency: selectedCurrency.value,
        billingCycle: newPrice.value.billingCycle,
        price: newPrice.value.price,
        status: newPrice.value.status,
    });

    // Close modal and reset form
    handleClosePriceModal();
};

// Helper function to get package display name
const getPackageDisplayName = (packageKey: string) => {
    switch (packageKey) {
        case 'basic':
            return 'Basic Plan';
        case 'pro':
            return 'Professional Plan';
        case 'enterprise':
            return 'Enterprise Plan';
        default:
            return packageKey;
    }
};

// Date pickers for coupon modal
const validFromPicker = ref<Instance | null>(null);
const validFromInputRef = ref<HTMLInputElement | null>(null);
const validUntilPicker = ref<Instance | null>(null);
const validUntilInputRef = ref<HTMLInputElement | null>(null);

const initializeCouponDatePickers = () => {
    // Initialize Valid From date picker
    if (validFromInputRef.value && !validFromPicker.value) {
        validFromPicker.value = flatpickr(validFromInputRef.value, {
            dateFormat: 'Y-m-d',
            defaultDate: newCoupon.value.validFrom || null,
            allowInput: false,
            clickOpens: true,
            wrap: false,
            onChange: (selectedDates, dateStr) => {
                newCoupon.value.validFrom = dateStr;
            },
        });
    }

    // Initialize Valid Until date picker
    if (validUntilInputRef.value && !validUntilPicker.value) {
        validUntilPicker.value = flatpickr(validUntilInputRef.value, {
            dateFormat: 'Y-m-d',
            defaultDate: newCoupon.value.validUntil || null,
            allowInput: false,
            clickOpens: true,
            wrap: false,
            onChange: (selectedDates, dateStr) => {
                newCoupon.value.validUntil = dateStr;
            },
        });
    }
};

const destroyCouponDatePickers = () => {
    if (validFromPicker.value) {
        validFromPicker.value.destroy();
        validFromPicker.value = null;
    }
    if (validUntilPicker.value) {
        validUntilPicker.value.destroy();
        validUntilPicker.value = null;
    }
};

// Preview tab state
const displayCurrency = ref<string>('USD');

// Coupons tab state
const currentPageCoupons = ref(1);
const perPageCoupons = ref(10);

// Dummy data for coupons
const coupons = ref([
    {
        id: 1,
        code: 'SUMMER2024',
        discount: '25%',
        discountType: 'percentage',
        discountValue: 25,
        type: 'once',
        validFrom: '2024-06-01',
        validTo: '2024-08-31',
        usage: 12,
        usageLimit: 100,
        status: 'expired',
    },
    {
        id: 2,
        code: 'WELCOME50',
        discount: '$50',
        discountType: 'fixed',
        discountValue: 50,
        type: 'recurring',
        validFrom: '2024-01-01',
        validTo: '2024-12-31',
        usage: 45,
        usageLimit: 200,
        status: 'active',
    },
    {
        id: 3,
        code: 'BLACKFRIDAY',
        discount: '30%',
        discountType: 'percentage',
        discountValue: 30,
        type: 'once',
        validFrom: '2024-11-25',
        validTo: '2024-11-30',
        usage: 0,
        usageLimit: 500,
        status: 'active',
    },
    {
        id: 4,
        code: 'STUDENT10',
        discount: '10%',
        discountType: 'percentage',
        discountValue: 10,
        type: 'recurring',
        validFrom: '2024-01-01',
        validTo: '2024-12-31',
        usage: 89,
        usageLimit: null, // unlimited
        status: 'active',
    },
    {
        id: 5,
        code: 'NEWYEAR2024',
        discount: '$100',
        discountType: 'fixed',
        discountValue: 100,
        type: 'once',
        validFrom: '2024-01-01',
        validTo: '2024-01-31',
        usage: 150,
        usageLimit: 150,
        status: 'expired',
    },
    {
        id: 6,
        code: 'SPRING20',
        discount: '20%',
        discountType: 'percentage',
        discountValue: 20,
        type: 'recurring',
        validFrom: '2024-03-01',
        validTo: '2024-05-31',
        usage: 23,
        usageLimit: 100,
        status: 'expired',
    },
    {
        id: 7,
        code: 'VIP15',
        discount: '15%',
        discountType: 'percentage',
        discountValue: 15,
        type: 'recurring',
        validFrom: '2024-01-01',
        validTo: '2024-12-31',
        usage: 5,
        usageLimit: 50,
        status: 'active',
    },
    {
        id: 8,
        code: 'FIRST100',
        discount: '$100',
        discountType: 'fixed',
        discountValue: 100,
        type: 'once',
        validFrom: '2024-02-01',
        validTo: '2024-02-29',
        usage: 0,
        usageLimit: 100,
        status: 'expired',
    },
]);

// Coupons pagination
const paginatedCoupons = computed(() => {
    const start = (currentPageCoupons.value - 1) * perPageCoupons.value;
    const end = start + perPageCoupons.value;
    return coupons.value.slice(start, end);
});

const totalPagesCoupons = computed(() => {
    return Math.ceil(coupons.value.length / perPageCoupons.value);
});

const paginationInfoCoupons = computed(() => {
    const start = (currentPageCoupons.value - 1) * perPageCoupons.value + 1;
    const end = Math.min(currentPageCoupons.value * perPageCoupons.value, coupons.value.length);
    return `${start}-${end} of ${coupons.value.length}`;
});

const goToPageCoupons = (page: number) => {
    if (page >= 1 && page <= totalPagesCoupons.value) {
        currentPageCoupons.value = page;
    }
};

// Helper functions for coupons
const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
};

const getStatusColor = (status: string) => {
    switch (status) {
        case 'active':
            return 'bg-green-100 text-green-800 border-green-200';
        case 'expired':
            return 'bg-red-100 text-red-800 border-red-200';
        default:
            return 'bg-gray-100 text-gray-800 border-gray-200';
    }
};

const getTypeColor = (type: string) => {
    switch (type) {
        case 'once':
            return 'bg-yellow-100 text-yellow-800 border-yellow-200';
        case 'recurring':
            return 'bg-blue-100 text-blue-800 border-blue-200';
        default:
            return 'bg-gray-100 text-gray-800 border-gray-200';
    }
};

// Create Coupon Modal State
const showCreateCouponModal = ref(false);
const newCoupon = ref({
    code: '',
    discountType: 'percentage',
    discountValue: 0,
    currency: 'USD',
    durationType: 'once',
    numberOfMonths: 1,
    usageLimit: 0,
    validFrom: '',
    validUntil: '',
    applicablePackages: 'all',
    selectedPackages: [] as string[],
    status: 'active',
});

const discountTypes = ['percentage', 'fixed'];
const durationTypes = ['once', 'recurring', 'forever'];
const applicablePackageOptions = ['all', 'specific'];
const couponStatusOptions = ['active', 'inactive'];

const handleCreateCoupon = () => {
    showCreateCouponModal.value = true;
    // Reset form
    newCoupon.value = {
        code: '',
        discountType: 'percentage',
        discountValue: 0,
        currency: 'USD',
        durationType: 'once',
        numberOfMonths: 1,
        usageLimit: 0,
        validFrom: '',
        validUntil: '',
        applicablePackages: 'all',
        selectedPackages: [],
        status: 'active',
    };
};

const handleCloseCouponModal = () => {
    showCreateCouponModal.value = false;
    // Reset form
    newCoupon.value = {
        code: '',
        discountType: 'percentage',
        discountValue: 0,
        currency: 'USD',
        durationType: 'once',
        numberOfMonths: 1,
        usageLimit: 0,
        validFrom: '',
        validUntil: '',
        applicablePackages: 'all',
        selectedPackages: [],
        status: 'active',
    };
};

const handleSubmitCoupon = () => {
    // Validate required fields
    if (!newCoupon.value.code || !newCoupon.value.discountType || !newCoupon.value.discountValue || !newCoupon.value.durationType) {
        return;
    }

    // Format discount display
    const discountDisplay = newCoupon.value.discountType === 'percentage' 
        ? `${newCoupon.value.discountValue}%`
        : `${newCoupon.value.currency === 'USD' ? '$' : newCoupon.value.currency}${newCoupon.value.discountValue}`;

    // Map duration type to coupon type
    const couponType = newCoupon.value.durationType === 'once' ? 'once' : 
                       newCoupon.value.durationType === 'recurring' ? 'recurring' : 'once';

    // Add new coupon to the list
    const newId = coupons.value.length > 0 ? Math.max(...coupons.value.map(c => c.id)) + 1 : 1;
    coupons.value.push({
        id: newId,
        code: newCoupon.value.code.toUpperCase(),
        discount: discountDisplay,
        discountType: newCoupon.value.discountType,
        discountValue: newCoupon.value.discountValue,
        type: couponType,
        validFrom: newCoupon.value.validFrom || '2024-01-01',
        validTo: newCoupon.value.validUntil || '2024-12-31',
        usage: 0,
        usageLimit: newCoupon.value.usageLimit === 0 ? null : newCoupon.value.usageLimit,
        status: newCoupon.value.status,
    });

    // Close modal and reset form
    handleCloseCouponModal();
};

// Watch for modal open/close to initialize/destroy date pickers
watch(showCreateCouponModal, (isOpen) => {
    if (isOpen) {
        // Wait for DOM to be ready
        setTimeout(() => {
            initializeCouponDatePickers();
        }, 100);
    } else {
        destroyCouponDatePickers();
    }
});

onUnmounted(() => {
    destroyCouponDatePickers();
});

// Usage History Modal State
const showUsageHistoryModal = ref(false);
const selectedCouponForUsage = ref<any>(null);

// Dummy data for usage history
const usageHistoryData = ref([
    {
        id: 1,
        customerName: 'Bob Wilson',
        customerEmail: 'bob.wilson@example.com',
        package: 'Professional Plan',
        discount: 7.25,
        currency: 'USD',
        date: '2025-12-22',
        relativeDate: 'Yesterday',
    },
    {
        id: 2,
        customerName: 'Jane Smith',
        customerEmail: 'jane.smith@example.com',
        package: 'Basic Plan',
        discount: 2.25,
        currency: 'USD',
        date: '2025-12-20',
        relativeDate: '3 days ago',
    },
    {
        id: 3,
        customerName: 'John Doe',
        customerEmail: 'john.doe@example.com',
        package: 'Professional Plan',
        discount: 7.25,
        currency: 'USD',
        date: '2025-12-18',
        relativeDate: '5 days ago',
    },
]);

// Computed properties for usage statistics
const usageStats = computed(() => {
    if (!selectedCouponForUsage.value) {
        return {
            totalUses: 0,
            usageLimit: 0,
            totalDiscount: 0,
            uniqueCustomers: 0,
        };
    }

    const totalUses = usageHistoryData.value.length;
    const usageLimit = selectedCouponForUsage.value.usageLimit || 100;
    const totalDiscount = usageHistoryData.value.reduce((sum, usage) => sum + usage.discount, 0);
    const uniqueCustomers = new Set(usageHistoryData.value.map(u => u.customerEmail)).size;

    return {
        totalUses,
        usageLimit,
        totalDiscount,
        uniqueCustomers,
    };
});

const handleViewUsage = (coupon: any) => {
    selectedCouponForUsage.value = coupon;
    showUsageHistoryModal.value = true;
};

const handleCloseUsageHistoryModal = () => {
    showUsageHistoryModal.value = false;
    selectedCouponForUsage.value = null;
};

// Edit Coupon Modal State
const showEditCouponModal = ref(false);
const editingCoupon = ref<any>(null);
const editCoupon = ref({
    code: '',
    discountType: 'percentage',
    discountValue: 0,
    currency: 'USD',
    durationType: 'once',
    numberOfMonths: 1,
    usageLimit: 0,
    validFrom: '',
    validUntil: '',
    applicablePackages: 'all',
    selectedPackages: [] as string[],
    status: 'active',
});

// Date pickers for edit coupon modal
const editValidFromPicker = ref<Instance | null>(null);
const editValidFromInputRef = ref<HTMLInputElement | null>(null);
const editValidUntilPicker = ref<Instance | null>(null);
const editValidUntilInputRef = ref<HTMLInputElement | null>(null);

const initializeEditCouponDatePickers = () => {
    // Destroy existing pickers first to ensure clean initialization
    destroyEditCouponDatePickers();
    
    // Wait a bit more to ensure DOM is fully ready
    setTimeout(() => {
        // Initialize Valid From date picker
        if (editValidFromInputRef.value) {
            try {
                editValidFromPicker.value = flatpickr(editValidFromInputRef.value, {
                    dateFormat: 'Y-m-d',
                    defaultDate: editCoupon.value.validFrom || null,
                    allowInput: false,
                    clickOpens: true,
                    wrap: false,
                    static: false,
                    onChange: (selectedDates, dateStr) => {
                        if (dateStr) {
                            editCoupon.value.validFrom = dateStr;
                        }
                    },
                });
                
                // Explicitly set the date if it exists
                if (editCoupon.value.validFrom && editValidFromPicker.value) {
                    editValidFromPicker.value.setDate(editCoupon.value.validFrom, false);
                }
            } catch (error) {
                console.error('Error initializing Valid From date picker:', error);
            }
        }

        // Initialize Valid Until date picker
        if (editValidUntilInputRef.value) {
            try {
                editValidUntilPicker.value = flatpickr(editValidUntilInputRef.value, {
                    dateFormat: 'Y-m-d',
                    defaultDate: editCoupon.value.validUntil || null,
                    allowInput: false,
                    clickOpens: true,
                    wrap: false,
                    static: false,
                    onChange: (selectedDates, dateStr) => {
                        if (dateStr) {
                            editCoupon.value.validUntil = dateStr;
                        }
                    },
                });
                
                // Explicitly set the date if it exists
                if (editCoupon.value.validUntil && editValidUntilPicker.value) {
                    editValidUntilPicker.value.setDate(editCoupon.value.validUntil, false);
                }
            } catch (error) {
                console.error('Error initializing Valid Until date picker:', error);
            }
        }
    }, 50);
};

const destroyEditCouponDatePickers = () => {
    if (editValidFromPicker.value) {
        editValidFromPicker.value.destroy();
        editValidFromPicker.value = null;
    }
    if (editValidUntilPicker.value) {
        editValidUntilPicker.value.destroy();
        editValidUntilPicker.value = null;
    }
};

const handleEditCoupon = (coupon: any) => {
    editingCoupon.value = coupon;
    
    // Parse discount type and value
    const isPercentage = coupon.discount.includes('%');
    const discountValue = isPercentage 
        ? parseFloat(coupon.discount.replace('%', ''))
        : parseFloat(coupon.discount.replace(/[^0-9.]/g, ''));
    
    // Extract currency if fixed amount
    const currency = isPercentage ? 'USD' : (coupon.discount.match(/[A-Z]{3}/)?.[0] || 'USD');
    
    // Map coupon type to duration type
    const durationType = coupon.type === 'once' ? 'once' : 
                        coupon.type === 'recurring' ? 'recurring' : 'once';
    
    // Populate edit form
    editCoupon.value = {
        code: coupon.code,
        discountType: isPercentage ? 'percentage' : 'fixed',
        discountValue: discountValue || 0,
        currency: currency,
        durationType: durationType,
        numberOfMonths: 1,
        usageLimit: coupon.usageLimit === null ? 0 : coupon.usageLimit,
        validFrom: coupon.validFrom || '',
        validUntil: coupon.validTo || '',
        applicablePackages: 'all', // Default, can be enhanced
        selectedPackages: [],
        status: coupon.status,
    };
    
    showEditCouponModal.value = true;
};

const handleCloseEditCouponModal = () => {
    showEditCouponModal.value = false;
    editingCoupon.value = null;
    destroyEditCouponDatePickers();
    // Reset form
    editCoupon.value = {
        code: '',
        discountType: 'percentage',
        discountValue: 0,
        currency: 'USD',
        durationType: 'once',
        numberOfMonths: 1,
        usageLimit: 0,
        validFrom: '',
        validUntil: '',
        applicablePackages: 'all',
        selectedPackages: [],
        status: 'active',
    };
};

const handleUpdateCoupon = () => {
    // Validate required fields
    if (!editCoupon.value.code || !editCoupon.value.discountType || !editCoupon.value.discountValue || !editCoupon.value.durationType) {
        return;
    }

    if (!editingCoupon.value) return;

    // Format discount display
    const discountDisplay = editCoupon.value.discountType === 'percentage' 
        ? `${editCoupon.value.discountValue}%`
        : `${editCoupon.value.currency === 'USD' ? '$' : editCoupon.value.currency}${editCoupon.value.discountValue}`;

    // Map duration type to coupon type
    const couponType = editCoupon.value.durationType === 'once' ? 'once' : 
                       editCoupon.value.durationType === 'recurring' ? 'recurring' : 'once';

    // Update coupon in the list
    const couponIndex = coupons.value.findIndex(c => c.id === editingCoupon.value.id);
    if (couponIndex !== -1) {
        coupons.value[couponIndex] = {
            ...coupons.value[couponIndex],
            code: editCoupon.value.code.toUpperCase(),
            discount: discountDisplay,
            discountType: editCoupon.value.discountType,
            discountValue: editCoupon.value.discountValue,
            type: couponType,
            validFrom: editCoupon.value.validFrom || '2024-01-01',
            validTo: editCoupon.value.validUntil || '2024-12-31',
            usageLimit: editCoupon.value.usageLimit === 0 ? null : editCoupon.value.usageLimit,
            status: editCoupon.value.status,
        };
    }

    // Close modal and reset form
    handleCloseEditCouponModal();
};

// Watch for edit modal open/close to initialize/destroy date pickers
watch(showEditCouponModal, async (isOpen) => {
    if (isOpen) {
        // Wait for DOM to be ready and form data to be populated
        await nextTick();
        setTimeout(() => {
            initializeEditCouponDatePickers();
        }, 200);
    } else {
        destroyEditCouponDatePickers();
    }
});

const handleDeleteCoupon = (coupon: any) => {
    couponToDelete.value = coupon;
    showDeleteCouponModal.value = true;
};

const confirmDeleteCoupon = () => {
    if (couponToDelete.value) {
        // Remove coupon from the list
        coupons.value = coupons.value.filter(c => c.id !== couponToDelete.value.id);
        // Reset to page 1 if current page becomes empty
        if (paginatedCoupons.value.length === 0 && currentPageCoupons.value > 1) {
            currentPageCoupons.value = Math.max(1, currentPageCoupons.value - 1);
        }
        
        // Show success toast
        success('Coupon deleted successfully.');
        
        couponToDelete.value = null;
    }
    showDeleteCouponModal.value = false;
};

const cancelDeleteCoupon = () => {
    couponToDelete.value = null;
    showDeleteCouponModal.value = false;
};

// Preview packages data with features
const previewPackages = ref([
    {
        id: 1,
        name: 'Basic Plan',
        description: 'Perfect for individuals and small teams getting started',
        isMostPopular: false,
        trialDays: 14,
        features: [
            { name: 'Projects', included: false },
            { name: 'Storage (GB)', included: false },
            { name: 'Team Members', included: false },
            { name: 'API-Access', included: false },
            { name: 'Custom-Domain', included: false },
            { name: 'Priority Support', included: false },
            { name: 'API-Calls (Monthly)', included: false },
        ],
    },
    {
        id: 2,
        name: 'Professional Plan',
        description: 'For growing teams and businesses needing more power',
        isMostPopular: true,
        trialDays: 30,
        features: [
            { name: 'Projects', included: false },
            { name: 'Storage (GB)', included: false },
            { name: 'Team Members', included: false },
            { name: 'API-Access', included: false },
            { name: 'Custom-Domain', included: false },
            { name: 'Priority Support', included: false },
            { name: 'API-Calls (Monthly)', included: false },
        ],
    },
    {
        id: 3,
        name: 'Enterprise Plan',
        description: 'Advanced features and unlimited resources for large organizations',
        isMostPopular: false,
        trialDays: null,
        features: [
            { name: 'Projects', included: false },
            { name: 'Storage (GB)', included: false },
            { name: 'Team Members', included: false },
            { name: 'API-Access', included: false },
            { name: 'Custom-Domain', included: false },
            { name: 'Priority Support', included: false },
            { name: 'API-Calls (Monthly)', included: false },
        ],
    },
]);
</script>

<template>
    <Head title="Subscription Management" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Top Navigation Tabs -->
            <div class="flex gap-0 border-b border-border">
                <button
                    v-for="tab in tabs"
                    :key="tab.id"
                    @click="activeTab = tab.id"
                    :class="[
                        'flex items-center gap-2 px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                        activeTab === tab.id
                            ? 'border-blue-600 text-blue-600 dark:text-blue-400'
                            : 'border-transparent text-muted-foreground hover:text-foreground',
                    ]"
                >
                    <component :is="tab.icon" class="size-4" />
                    <span>{{ tab.label }}</span>
                </button>
            </div>

            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto">
                <div v-if="activeTab === 'features'" class="flex flex-col gap-4">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-foreground">Subscription Features</h1>
                        <Button
                            @click="handleAddFeature"
                            class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        >
                            <Plus class="size-4 mr-2" />
                            Add Feature
                        </Button>
                    </div>

                    <!-- Quick Tips Section -->
                    <div class="rounded-lg border-l-4 border-blue-500 bg-blue-50 dark:bg-blue-900/10 p-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-500">
                                    <Info class="size-4 text-white" />
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-blue-900 dark:text-blue-300 mb-2">Quick Tips</h3>
                                <ul class="space-y-1 text-sm text-blue-800 dark:text-blue-200">
                                    <li>• Feature Key is auto-generated and used in your system code</li>
                                    <li>• Use <strong>Number</strong> type for countable limits (projects, users, storage GB)</li>
                                    <li>• Use <strong>Boolean</strong> for on/off features (API access, custom domain)</li>
                                    <li>• Enable <strong>Metered</strong> only if you track usage for billing purposes</li>
                                    <li>• Set to <strong>Inactive</strong> to temporarily hide without deleting</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="flex items-center justify-end gap-3">
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

                    <!-- Features Table -->
                    <div class="rounded-md border border-border bg-card">
                        <table class="w-full text-sm">
                            <thead class="bg-muted/50">
                                <tr>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Feature Name
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Feature Key
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Data Type
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Metered
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Status
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="features.length === 0">
                                    <td colspan="6" class="px-4 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <p class="text-sm text-muted-foreground">No features found</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr
                                    v-for="feature in paginatedFeatures"
                                    :key="feature.id"
                                    class="border-b border-border transition-colors hover:bg-muted/50"
                                >
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-foreground font-medium">{{ feature.name }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-sm text-muted-foreground font-mono">{{ feature.key }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span
                                            :class="[
                                                'inline-flex rounded-full px-2.5 py-1 text-xs font-medium',
                                                getDataTypeColor(feature.dataType),
                                            ]"
                                        >
                                            {{ feature.dataType }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <div class="flex items-center gap-2">
                                            <component
                                                :is="feature.metered ? Check : X"
                                                :class="[
                                                    'size-4',
                                                    feature.metered
                                                        ? 'text-green-600 dark:text-green-400'
                                                        : 'text-red-600 dark:text-red-400',
                                                ]"
                                            />
                                            <span class="text-sm text-muted-foreground">
                                                {{ feature.metered ? 'Yes' : 'No' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span
                                            :class="[
                                                'inline-flex rounded-full px-2.5 py-1 text-xs font-medium',
                                                feature.status === 'active'
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400'
                                                    : 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400',
                                            ]"
                                        >
                                            {{ feature.status === 'active' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <div class="flex items-center gap-2">
                                            <button
                                                @click="handleEdit(feature.id)"
                                                class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                                title="Edit"
                                                type="button"
                                            >
                                                <Edit class="size-4 text-muted-foreground" />
                                            </button>
                                            <button
                                                @click="handleDelete(feature.id)"
                                                class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                title="Delete"
                                                type="button"
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

                <!-- Packages Tab Content -->
                <div v-else-if="activeTab === 'packages'" class="flex flex-col gap-4">
                    <!-- Header Section -->
                    <div class="flex items-start justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-foreground">Subscription Packages</h1>
                            <p class="mt-1 text-sm text-muted-foreground">
                                Create subscription tiers that customers can purchase (Basic, Pro, Enterprise)
                            </p>
                        </div>
                        <Button
                            @click="handleCreatePackage"
                            class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        >
                            <Plus class="size-4 mr-2" />
                            Create Package
                        </Button>
                    </div>

                    <!-- Best Practices Section -->
                    <div class="rounded-lg border-l-4 border-blue-500 bg-blue-50 dark:bg-blue-900/10 p-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-500">
                                    <Lightbulb class="size-4 text-yellow-200" />
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-blue-900 dark:text-blue-300 mb-2">Best Practices</h3>
                                <ul class="space-y-1 text-sm text-blue-800 dark:text-blue-200">
                                    <li>• Create 3-4 packages maximum to avoid overwhelming customers</li>
                                    <li>• Common pattern: Free/Basic → Pro → Enterprise</li>
                                    <li>• Enable both Monthly and Annual billing for flexibility</li>
                                    <li>• Use Trial Period to let customers test premium features (7-30 days typical)</li>
                                    <li>• Credit Card Required determines if payment info is needed during signup</li>
                                    <li>• After creating packages, go to Configuration to set feature limits</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Packages Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div
                            v-for="pkg in packages"
                            :key="pkg.id"
                            class="relative rounded-lg border border-border bg-card p-6 shadow-sm"
                        >
                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                <span
                                    :class="[
                                        'inline-flex rounded-full px-2.5 py-1 text-xs font-medium',
                                        pkg.status === 'active'
                                            ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400'
                                            : 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400',
                                    ]"
                                >
                                    {{ pkg.status === 'active' ? 'Active' : 'Inactive' }}
                                </span>
                            </div>

                            <!-- Package Title -->
                            <div class="mb-2">
                                <h3 class="text-lg font-bold text-foreground">{{ pkg.name }}</h3>
                                <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wide">{{ pkg.subtitle }}</p>
                            </div>

                            <!-- Description -->
                            <p class="text-sm text-muted-foreground mb-4">{{ pkg.description }}</p>

                            <!-- Billing Options -->
                            <div class="flex gap-2 mb-4">
                                <button
                                    :class="[
                                        'flex-1 rounded-md px-3 py-2 text-xs font-medium transition-colors',
                                        pkg.monthlyEnabled
                                            ? 'bg-blue-600 text-white'
                                            : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                                    ]"
                                >
                                    Monthly
                                </button>
                                <button
                                    :class="[
                                        'flex-1 rounded-md px-3 py-2 text-xs font-medium transition-colors',
                                        pkg.annualEnabled
                                            ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400 border border-blue-200 dark:border-blue-800'
                                            : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                                    ]"
                                >
                                    Annual
                                </button>
                            </div>

                            <!-- Trial Info -->
                            <div v-if="pkg.trialDays" class="flex items-center gap-2 mb-3">
                                <Gift class="size-4 text-muted-foreground" />
                                <span class="text-sm text-muted-foreground">{{ pkg.trialDays }} day trial</span>
                            </div>

                            <!-- Credit Card Info -->
                            <div class="flex items-center gap-2 mb-4">
                                <CreditCard class="size-4 text-muted-foreground" />
                                <span class="text-sm text-muted-foreground">
                                    Credit Card: {{ pkg.creditCardRequired ? 'Required' : 'Not Required' }}
                                </span>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2 pt-4 border-t border-border">
                                <button
                                    @click="handleEditPackage(pkg.id)"
                                    class="flex-1 p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer flex items-center justify-center gap-2"
                                    title="Edit"
                                    type="button"
                                >
                                    <Edit class="size-4 text-muted-foreground" />
                                    <span class="text-sm font-medium text-muted-foreground">Edit</span>
                                </button>
                                <button
                                    @click="handleDeletePackage(pkg.id)"
                                    class="flex-1 p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer flex items-center justify-center gap-2"
                                    title="Delete"
                                    type="button"
                                >
                                    <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                    <span class="text-sm font-medium text-red-600 dark:text-red-400">Delete</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Configuration Tab Content -->
                <div v-else-if="activeTab === 'configuration'" class="flex flex-col gap-6">
                    <!-- Header Section -->
                    <div>
                        <h1 class="text-2xl font-bold text-foreground">Package Feature Configuration</h1>
                        <p class="mt-1 text-sm text-muted-foreground">
                            Define feature availability and limits for each subscription package.
                        </p>
                    </div>

                    <!-- Understanding Limit Types Section -->
                    <div class="rounded-lg border border-yellow-200 bg-yellow-50 dark:bg-yellow-900/10 p-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <Settings class="size-5 text-gray-700 dark:text-gray-300" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Understanding Limit Types</h3>
                                <ul class="space-y-1 text-sm text-gray-800 dark:text-gray-200">
                                    <li>• <strong>Limited:</strong> Set specific number (e.g., 5 projects, 10GB storage, 1000 API calls)</li>
                                    <li>• <strong>Unlimited:</strong> No restrictions - typically used for premium packages</li>
                                    <li>• <strong>Disabled:</strong> Feature not available in this package</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Select Package Dropdown -->
                    <div class="flex flex-col gap-2 ml-2 w-fit">
                        <label class="text-sm font-medium text-foreground">Select Package</label>
                        <div class="relative">
                            <select
                                v-model="selectedPackage"
                                class="w-64 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option value="">-- Choose a package --</option>
                                <option value="basic">Basic Plan</option>
                                <option value="pro">Professional Plan</option>
                                <option value="enterprise">Enterprise Plan</option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                        <p class="text-xs text-muted-foreground">Select a package to configure its features.</p>
                    </div>

                    <!-- Example Configuration Table (shown when no package selected) -->
                    <div v-if="!selectedPackage || !packageKey" class="rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 p-4">
                        <div class="flex items-center gap-2 mb-4">
                            <BarChart class="size-5 text-muted-foreground" />
                            <h3 class="text-base font-semibold text-foreground">Example Configuration</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th class="px-4 py-3 text-left font-medium text-foreground">Feature</th>
                                        <th class="px-4 py-3 text-center font-medium text-foreground">Basic Plan</th>
                                        <th class="px-4 py-3 text-center font-medium text-foreground">Pro Plan</th>
                                        <th class="px-4 py-3 text-center font-medium text-foreground">Enterprise</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(row, index) in configurationData"
                                        :key="index"
                                        class="border-b border-gray-200 dark:border-gray-700"
                                    >
                                        <td class="px-4 py-3 text-foreground font-medium">{{ row.feature }}</td>
                                        <td class="px-4 py-3 text-center">
                                            <span :class="getLimitTypeColor(row.basic.type)">
                                                {{ getLimitTypeDisplay(row.basic) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <span :class="getLimitTypeColor(row.pro.type)">
                                                {{ getLimitTypeDisplay(row.pro) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <span :class="getLimitTypeColor(row.enterprise.type)">
                                                {{ getLimitTypeDisplay(row.enterprise) }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="mt-4 text-xs text-muted-foreground text-center">
                            This is just an example. Your actual features will appear once you select a package.
                        </p>
                    </div>

                    <!-- Interactive Configuration Table (shown when package is selected) -->
                    <div v-else class="rounded-lg border border-border bg-card">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-muted/50">
                                    <tr>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Feature Name
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Limit Type
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Limit Value
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in configurationData"
                                        :key="index"
                                        class="border-b border-border transition-colors hover:bg-muted/50"
                                    >
                                        <td class="px-4 py-3 align-middle">
                                            <span class="text-foreground font-medium">{{ item.feature }}</span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <div class="flex items-center gap-4">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input
                                                        type="radio"
                                                        :name="`limit-type-${index}`"
                                                        value="limited"
                                                        v-model="item[packageKey].type"
                                                        class="size-4 text-blue-600 focus:ring-blue-500"
                                                    />
                                                    <span class="text-sm text-foreground">Limited</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input
                                                        type="radio"
                                                        :name="`limit-type-${index}`"
                                                        value="unlimited"
                                                        v-model="item[packageKey].type"
                                                        class="size-4 text-blue-600 focus:ring-blue-500"
                                                    />
                                                    <span class="text-sm text-foreground">Unlimited</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input
                                                        type="radio"
                                                        :name="`limit-type-${index}`"
                                                        value="disabled"
                                                        v-model="item[packageKey].type"
                                                        class="size-4 text-blue-600 focus:ring-blue-500"
                                                    />
                                                    <span class="text-sm text-foreground">Disabled</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <Input
                                                v-model.number="item[packageKey].value"
                                                type="number"
                                                :disabled="item[packageKey].type !== 'limited'"
                                                class="w-24"
                                                :class="{ 'opacity-50 cursor-not-allowed': item[packageKey].type !== 'limited' }"
                                                min="0"
                                            />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Save Changes Button -->
                        <div class="flex justify-end p-4 border-t border-border">
                            <Button
                                @click="handleSaveConfiguration"
                                class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                            >
                                Save Changes
                            </Button>
                        </div>
                    </div>
                </div>

                <!-- Pricing Tab Content -->
                <div v-else-if="activeTab === 'pricing'" class="flex flex-col gap-6">
                    <!-- Header Section -->
                    <div>
                        <h1 class="text-2xl font-bold text-foreground">Package Pricing</h1>
                        <p class="mt-1 text-sm text-muted-foreground">
                            Set pricing for packages across different currencies and billing cycles.
                        </p>
                    </div>

                    <!-- Pricing Strategies Section -->
                    <div class="rounded-lg border border-green-200 bg-green-50 dark:bg-green-900/10 p-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                <DollarSign class="size-5 text-green-700 dark:text-green-400" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-green-900 dark:text-green-300 mb-2">Pricing Strategies</h3>
                                <ul class="space-y-1 text-sm text-green-800 dark:text-green-200">
                                    <li>• Offer <strong>15-20% discount</strong> on annual plans to encourage yearly commitment</li>
                                    <li>• Use <strong>psychological pricing</strong> ($29 instead of $30, $99 instead of $100)</li>
                                    <li>• Set <strong>$0.00</strong> pricing for free tier packages</li>
                                    <li>• Add separate prices for <strong>each currency</strong> you want to support</li>
                                    <li>• Each package can have <strong>one price per billing cycle per currency</strong> (no duplicates)</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Select Package and Currency -->
                    <div class="grid grid-cols-1 md:grid-cols-2 ml-2 mr-2 gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-foreground">Select Package</label>
                            <div class="relative">
                                <select
                                    v-model="selectedPackageForPricing"
                                    class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                                >
                                    <option value="">-- Choose a package --</option>
                                    <option value="basic">Basic Plan</option>
                                    <option value="pro">Professional Plan</option>
                                    <option value="enterprise">Enterprise Plan</option>
                                </select>
                                <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-foreground">Currency</label>
                            <div class="relative">
                                <select
                                    v-model="selectedCurrency"
                                    class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                                >
                                    <option v-for="currency in currencies" :key="currency" :value="currency">
                                        {{ currency }}
                                    </option>
                                </select>
                                <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Management Area -->
                    <div v-if="selectedPackageForPricing && selectedCurrency" class="rounded-lg border border-border bg-card">
                        <!-- Header with Title and Add Price Button -->
                        <div class="flex items-center justify-between p-6 border-b border-border">
                            <h3 class="text-lg font-semibold text-foreground">Pricing for {{ selectedCurrency }}</h3>
                            <Button 
                                @click="handleAddPrice"
                                class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                            >
                                <Plus class="size-4 mr-2" />
                                Add Price
                            </Button>
                        </div>

                        <!-- Pricing Table -->
                        <div class="p-6">
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="border-b border-border bg-muted/50">
                                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                                Billing Cycle
                                            </th>
                                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                                Price
                                            </th>
                                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                                Status
                                            </th>
                                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="px-4 py-12 text-center">
                                                <div class="flex flex-col items-center justify-center gap-2">
                                                    <p class="text-sm text-muted-foreground">
                                                        No pricing set for this package and currency. Click "Add Price" to get started.
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div v-else class="rounded-lg border border-border bg-card p-12 text-center">
                        <p class="text-sm text-muted-foreground">Select a package and currency to manage pricing.</p>
                    </div>
                </div>

                <!-- Preview Tab Content -->
                <div v-else-if="activeTab === 'preview'" class="flex flex-col gap-6">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center gap-2">
                                <Monitor class="size-5 text-muted-foreground" />
                                <h1 class="text-2xl font-bold text-foreground">Customer-Facing Preview</h1>
                            </div>
                            <p class="mt-1 text-sm text-muted-foreground">
                                See how your subscription packages will appear to customers.
                            </p>
                        </div>
                        <div class="flex items-center gap-2">
                            <label class="text-sm font-medium text-foreground">Display Currency</label>
                            <div class="relative">
                                <select
                                    v-model="displayCurrency"
                                    class="rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                                >
                                    <option v-for="currency in currencies" :key="currency" :value="currency">
                                        {{ currency }}
                                    </option>
                                </select>
                                <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                    </div>

                    <!-- Preview Section -->
                    <div class="rounded-lg border border-border bg-muted/30 p-8">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-foreground mb-2">Choose Your Plan</h2>
                            <p class="text-muted-foreground">Select the perfect plan for your needs</p>
                        </div>

                        <!-- Package Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Package Card Template -->
                            <div
                                v-for="pkg in previewPackages"
                                :key="pkg.id"
                                class="bg-white rounded-lg p-6 shadow-lg relative"
                            >
                                <!-- Most Popular Badge -->
                                <div v-if="pkg.isMostPopular" class="absolute -top-3 left-1/2 -translate-x-1/2">
                                    <span class="bg-pink-500 text-white text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                        <Star class="size-3 fill-white" />
                                        MOST POPULAR
                                    </span>
                                </div>

                                <!-- Plan Name -->
                                <h3 class="text-xl font-bold text-foreground mb-2">{{ pkg.name }}</h3>
                                
                                <!-- Description -->
                                <p class="text-sm text-muted-foreground mb-4">{{ pkg.description }}</p>
                                
                                <!-- Pricing/Action -->
                                <div class="mb-6">
                                    <div class="text-3xl font-bold text-foreground mb-1">Contact Us</div>
                                    <p class="text-xs text-muted-foreground">Custom pricing</p>
                                </div>

                                <!-- Features List -->
                                <div class="mb-6 space-y-2">
                                    <div
                                        v-for="(feature, index) in pkg.features"
                                        :key="index"
                                        class="flex items-center gap-2 text-sm text-foreground"
                                    >
                                        <X class="size-4 text-muted-foreground flex-shrink-0" />
                                        <span>{{ feature.name }}</span>
                                    </div>
                                </div>

                                <!-- Get Started Button -->
                                <Button
                                    :class="[
                                        'w-full text-white cursor-pointer',
                                        pkg.isMostPopular
                                            ? 'bg-blue-700 hover:bg-blue-800'
                                            : 'bg-blue-600 hover:bg-blue-700'
                                    ]"
                                >
                                    Get Started
                                </Button>

                                <!-- Trial Information -->
                                <div v-if="pkg.trialDays" class="mt-4 flex items-center justify-center gap-1 text-xs text-muted-foreground">
                                    <Gift class="size-3" />
                                    <span>{{ pkg.trialDays }}-day free trial</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Tips Section -->
                    <div class="rounded-lg border border-border bg-muted/50 p-4">
                        <div class="flex items-start gap-3">
                            <Lightbulb class="size-5 text-muted-foreground flex-shrink-0 mt-0.5" />
                            <div class="text-sm text-muted-foreground">
                                <span class="font-medium">Preview Tips:</span> This shows how your active packages will appear to customers. The middle package is automatically highlighted as "Most Popular" when you have 3+ packages. Inactive packages are hidden from preview.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coupons Tab Content -->
                <div v-else-if="activeTab === 'coupons'" class="flex flex-col gap-6">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-foreground">Coupon Management</h1>
                            <p class="mt-1 text-sm text-muted-foreground">
                                Create discount codes and promotional offers for your subscription packages.
                            </p>
                        </div>
                        <Button 
                            @click="handleCreateCoupon"
                            class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        >
                            <Plus class="size-4 mr-2" />
                            Create Coupon
                        </Button>
                    </div>

                    <!-- Coupon Types Information Box -->
                    <div class="rounded-lg border border-blue-200 bg-blue-50/50 p-6">
                        <div class="flex items-start gap-3">
                            <Ticket class="size-5 text-blue-600 flex-shrink-0 mt-0.5" />
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-foreground mb-4">Coupon Types</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-muted-foreground">
                                    <div>
                                        <span class="font-medium text-foreground">Percentage:</span> Discount by % (e.g., 20% off = enter 20)
                                    </div>
                                    <div>
                                        <span class="font-medium text-foreground">Fixed Amount:</span> Discount by specific amount (e.g., $50 off)
                                    </div>
                                    <div>
                                        <span class="font-medium text-foreground">Recurring vs Once:</span> Apply discount to multiple billing cycles or just first payment
                                    </div>
                                    <div>
                                        <span class="font-medium text-foreground">Usage Limits:</span> Set maximum redemptions or unlimited usage
                                    </div>
                                    <div class="md:col-span-2">
                                        <span class="font-medium text-foreground">Validity Period:</span> Set start and end dates for the coupon
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <label class="text-sm font-medium text-foreground">Per Page:</label>
                                <select
                                    v-model="perPageCoupons"
                                    class="rounded-md border border-input bg-background px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                >
                                    <option :value="5">5</option>
                                    <option :value="10">10</option>
                                    <option :value="25">25</option>
                                    <option :value="50">50</option>
                                </select>
                            </div>
                            <span class="text-sm text-muted-foreground">{{ paginationInfoCoupons }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <Button
                                variant="outline"
                                size="sm"
                                :disabled="currentPageCoupons === 1"
                                @click="goToPageCoupons(currentPageCoupons - 1)"
                                class="cursor-pointer"
                            >
                                <ChevronLeft class="size-4" />
                            </Button>
                            <span class="text-sm text-muted-foreground">
                                Page {{ currentPageCoupons }} of {{ totalPagesCoupons }}
                            </span>
                            <Button
                                variant="outline"
                                size="sm"
                                :disabled="currentPageCoupons === totalPagesCoupons"
                                @click="goToPageCoupons(currentPageCoupons + 1)"
                                class="cursor-pointer"
                            >
                                <ChevronRight class="size-4" />
                            </Button>
                        </div>
                    </div>

                    <!-- Coupons Table -->
                    <div class="rounded-lg border border-border bg-card">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-border bg-muted/50">
                                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                            Code
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                            Discount
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                            Valid Period
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                            Usage
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-border">
                                    <tr v-for="coupon in paginatedCoupons" :key="coupon.id" class="hover:bg-muted/50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="font-medium text-foreground">{{ coupon.code }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-foreground font-semibold">{{ coupon.discount }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                :class="[
                                                    'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border',
                                                    getTypeColor(coupon.type)
                                                ]"
                                            >
                                                {{ coupon.type === 'once' ? 'Once' : 'Recurring' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-muted-foreground">
                                            {{ formatDate(coupon.validFrom) }} - {{ formatDate(coupon.validTo) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">
                                            {{ coupon.usage }} / {{ coupon.usageLimit === null ? '∞' : coupon.usageLimit }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                :class="[
                                                    'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border capitalize',
                                                    getStatusColor(coupon.status)
                                                ]"
                                            >
                                                {{ coupon.status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex items-center gap-2">
                                                <button 
                                                    @click="handleViewUsage(coupon)"
                                                    class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                                    title="View Usage"
                                                    type="button"
                                                >
                                                    <Eye class="size-4 text-muted-foreground" />
                                                </button>
                                                <button 
                                                    @click="handleEditCoupon(coupon)"
                                                    class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                                    title="Edit"
                                                    type="button"
                                                >
                                                    <Edit class="size-4 text-muted-foreground" />
                                                </button>
                                                <button 
                                                    @click="handleDeleteCoupon(coupon)"
                                                    class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                    title="Delete"
                                                    type="button"
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
                </div>

                <!-- Other Tab Content (Placeholder) -->
                <div v-else class="flex items-center justify-center h-full">
                    <div class="text-center">
                        <component :is="tabs.find(t => t.id === activeTab)?.icon" class="size-12 mx-auto mb-4 text-muted-foreground" />
                        <h2 class="text-xl font-semibold text-foreground mb-2">
                            {{ tabs.find(t => t.id === activeTab)?.label }}
                        </h2>
                        <p class="text-sm text-muted-foreground">This section is coming soon</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Feature Modal -->
        <Dialog :open="showAddFeatureModal" @update:open="showAddFeatureModal = $event">
            <DialogContent class="sm:max-w-[600px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <DialogTitle>Add New Feature</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Feature Name -->
                    <div class="space-y-2">
                        <Label for="feature-name" class="text-sm font-medium text-foreground">
                            Feature Name <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="feature-name"
                            v-model="newFeature.name"
                            placeholder="Enter feature name"
                            class="w-full"
                        />
                    </div>

                    <!-- Feature Key -->
                    <div class="space-y-2">
                        <Label for="feature-key" class="text-sm font-medium text-foreground">
                            Feature Key <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="feature-key"
                            v-model="newFeature.key"
                            placeholder="Enter feature key (e.g., projects)"
                            class="w-full"
                        />
                    </div>

                    <!-- Data Type -->
                    <div class="space-y-2">
                        <Label for="data-type" class="text-sm font-medium text-foreground">
                            Data Type <span class="text-red-500">*</span>
                        </Label>
                        <div class="relative">
                            <select
                                id="data-type"
                                v-model="newFeature.dataType"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="type in dataTypes" :key="type" :value="type">
                                    {{ type }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>

                    <!-- Is Metered -->
                    <div class="flex items-center space-x-2">
                        <Checkbox
                            id="is-metered"
                            v-model:checked="newFeature.isMetered"
                        />
                        <Label
                            for="is-metered"
                            class="text-sm font-medium text-foreground cursor-pointer"
                        >
                            Is Metered?
                        </Label>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <Label for="description" class="text-sm font-medium text-foreground">
                            Description
                        </Label>
                        <textarea
                            id="description"
                            v-model="newFeature.description"
                            placeholder="Enter feature description"
                            rows="4"
                            class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none"
                        ></textarea>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="status"
                                v-model="newFeature.status"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="status in statusOptions" :key="status" :value="status">
                                    {{ status.charAt(0).toUpperCase() + status.slice(1) }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button
                        variant="outline"
                        @click="handleCloseFeatureModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleCreateFeature"
                        :disabled="!newFeature.name || !newFeature.key || !newFeature.dataType"
                    >
                        Create Feature
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Create Package Modal -->
        <Dialog :open="showCreatePackageModal" @update:open="showCreatePackageModal = $event">
            <DialogContent class="sm:max-w-[600px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <DialogTitle>Create New Package</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Package Name -->
                    <div class="space-y-2">
                        <Label for="package-name" class="text-sm font-medium text-foreground">
                            Package Name <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="package-name"
                            v-model="newPackage.name"
                            placeholder="Enter package name"
                            class="w-full"
                        />
                    </div>

                    <!-- Package Code -->
                    <div class="space-y-2">
                        <Label for="package-code" class="text-sm font-medium text-foreground">
                            Package Code <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="package-code"
                            v-model="newPackage.code"
                            placeholder="Enter package code"
                            class="w-full"
                        />
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <Label for="package-description" class="text-sm font-medium text-foreground">
                            Description
                        </Label>
                        <textarea
                            id="package-description"
                            v-model="newPackage.description"
                            placeholder="Enter package description"
                            rows="4"
                            class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none"
                        ></textarea>
                    </div>

                    <!-- Billing Type -->
                    <div class="space-y-2">
                        <Label class="text-sm font-medium text-foreground">
                            Billing Type <span class="text-red-500">*</span>
                        </Label>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="billing-monthly"
                                    v-model="newPackage.billingType"
                                    value="monthly"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="billing-monthly"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Monthly
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="billing-annual"
                                    v-model="newPackage.billingType"
                                    value="annual"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="billing-annual"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Annual
                                </Label>
                            </div>
                        </div>
                    </div>

                    <!-- Enable Trial Period -->
                    <div class="flex items-center space-x-2">
                        <Checkbox
                            id="enable-trial"
                            v-model:checked="newPackage.enableTrial"
                        />
                        <Label
                            for="enable-trial"
                            class="text-sm font-medium text-foreground cursor-pointer"
                        >
                            Enable Trial Period
                        </Label>
                    </div>

                    <!-- Credit Card Required -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <Checkbox
                                id="credit-card-required"
                                v-model:checked="newPackage.creditCardRequired"
                            />
                            <Label
                                for="credit-card-required"
                                class="text-sm font-medium text-foreground cursor-pointer"
                            >
                                Credit Card Required
                            </Label>
                        </div>
                        <p class="text-xs text-muted-foreground ml-6">
                            When enabled, customers must provide payment information during signup (even for free trials)
                        </p>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="package-status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="package-status"
                                v-model="newPackage.status"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="status in packageStatusOptions" :key="status" :value="status">
                                    {{ status.charAt(0).toUpperCase() + status.slice(1) }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button
                        variant="outline"
                        @click="handleClosePackageModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleSubmitPackage"
                        :disabled="!newPackage.name || !newPackage.code || !newPackage.billingType"
                    >
                        Create Package
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Add Price Modal -->
        <Dialog :open="showAddPriceModal" @update:open="showAddPriceModal = $event">
            <DialogContent class="sm:max-w-[600px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <DialogTitle>Add New Price</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Package (Read-only) -->
                    <div class="space-y-2">
                        <Label for="price-package" class="text-sm font-medium text-foreground">
                            Package
                        </Label>
                        <Input
                            id="price-package"
                            :value="getPackageDisplayName(selectedPackageForPricing)"
                            readonly
                            class="w-full bg-muted"
                        />
                    </div>

                    <!-- Currency (Read-only) -->
                    <div class="space-y-2">
                        <Label for="price-currency" class="text-sm font-medium text-foreground">
                            Currency
                        </Label>
                        <Input
                            id="price-currency"
                            :value="selectedCurrency"
                            readonly
                            class="w-full bg-muted"
                        />
                    </div>

                    <!-- Billing Cycle -->
                    <div class="space-y-2">
                        <Label for="billing-cycle" class="text-sm font-medium text-foreground">
                            Billing Cycle <span class="text-red-500">*</span>
                        </Label>
                        <div class="relative">
                            <select
                                id="billing-cycle"
                                v-model="newPrice.billingCycle"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="cycle in billingCycles" :key="cycle" :value="cycle">
                                    {{ cycle.charAt(0).toUpperCase() + cycle.slice(1) }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="space-y-2">
                        <Label for="price-amount" class="text-sm font-medium text-foreground">
                            Price ({{ selectedCurrency }}) <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="price-amount"
                            v-model.number="newPrice.price"
                            type="number"
                            placeholder="0"
                            min="0"
                            step="0.01"
                            class="w-full"
                        />
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="price-status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="price-status"
                                v-model="newPrice.status"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="status in priceStatusOptions" :key="status" :value="status">
                                    {{ status.charAt(0).toUpperCase() + status.slice(1) }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button
                        variant="outline"
                        @click="handleClosePriceModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleSubmitPrice"
                        :disabled="!newPrice.billingCycle || newPrice.price === null || newPrice.price === undefined"
                    >
                        Add Price
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Create Coupon Modal -->
        <Dialog :open="showCreateCouponModal" @update:open="showCreateCouponModal = $event">
            <DialogContent class="sm:max-w-[600px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <DialogTitle>Create New Coupon</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Coupon Code -->
                    <div class="space-y-2">
                        <Label for="coupon-code" class="text-sm font-medium text-foreground">
                            Coupon Code <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="coupon-code"
                            v-model="newCoupon.code"
                            placeholder="Enter coupon code"
                            class="w-full"
                        />
                        <p class="text-xs text-muted-foreground">e.g. SUMMER2024, WELCOME50, EARLYBIRD</p>
                    </div>

                    <!-- Discount Type -->
                    <div class="space-y-2">
                        <Label class="text-sm font-medium text-foreground">
                            Discount Type <span class="text-red-500">*</span>
                        </Label>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="discount-percentage"
                                    v-model="newCoupon.discountType"
                                    value="percentage"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="discount-percentage"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Percentage (%)
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="discount-fixed"
                                    v-model="newCoupon.discountType"
                                    value="fixed"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="discount-fixed"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Fixed Amount
                                </Label>
                            </div>
                        </div>
                    </div>

                    <!-- Discount Value -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <Label for="discount-value" class="text-sm font-medium text-foreground">
                                Discount Value <span class="text-red-500">*</span>
                            </Label>
                            <Input
                                id="discount-value"
                                v-model.number="newCoupon.discountValue"
                                type="number"
                                placeholder="0"
                                min="0"
                                step="0.01"
                                class="w-full"
                            />
                        </div>
                        <div v-if="newCoupon.discountType === 'fixed'" class="space-y-2">
                            <Label for="coupon-currency" class="text-sm font-medium text-foreground">
                                Currency
                            </Label>
                            <div class="relative">
                                <select
                                    id="coupon-currency"
                                    v-model="newCoupon.currency"
                                    class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                                >
                                    <option v-for="currency in currencies" :key="currency" :value="currency">
                                        {{ currency }}
                                    </option>
                                </select>
                                <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                    </div>

                    <!-- Duration Type -->
                    <div class="space-y-2">
                        <Label class="text-sm font-medium text-foreground">
                            Duration Type <span class="text-red-500">*</span>
                        </Label>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="duration-once"
                                    v-model="newCoupon.durationType"
                                    value="once"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="duration-once"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Once (First payment only)
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="duration-recurring"
                                    v-model="newCoupon.durationType"
                                    value="recurring"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="duration-recurring"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Recurring
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="duration-forever"
                                    v-model="newCoupon.durationType"
                                    value="forever"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="duration-forever"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Forever
                                </Label>
                            </div>
                        </div>
                    </div>

                    <!-- Number of Months (shown when Recurring is selected) -->
                    <div v-if="newCoupon.durationType === 'recurring'" class="space-y-2">
                        <Label for="number-of-months" class="text-sm font-medium text-foreground">
                            Number of Months
                        </Label>
                        <Input
                            id="number-of-months"
                            v-model.number="newCoupon.numberOfMonths"
                            type="number"
                            placeholder="1"
                            min="1"
                            class="w-full"
                        />
                    </div>

                    <!-- Usage Limit -->
                    <div class="space-y-2">
                        <Label for="usage-limit" class="text-sm font-medium text-foreground">
                            Usage Limit
                        </Label>
                        <Input
                            id="usage-limit"
                            v-model.number="newCoupon.usageLimit"
                            type="number"
                            placeholder="0"
                            min="0"
                            class="w-full"
                        />
                        <p class="text-xs text-muted-foreground">Set to 0 for unlimited usage</p>
                    </div>

                    <!-- Valid From / Valid Until -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <Label for="valid-from" class="text-sm font-medium text-foreground">
                                Valid From
                            </Label>
                            <div class="relative">
                                <input
                                    ref="validFromInputRef"
                                    id="valid-from"
                                    type="text"
                                    placeholder="YYYY-MM-DD"
                                    readonly
                                    :value="newCoupon.validFrom"
                                    class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pr-10 cursor-pointer focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]"
                                />
                                <Calendar class="absolute right-3 top-1/2 size-4 -translate-y-1/2 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                        <div class="space-y-2">
                            <Label for="valid-until" class="text-sm font-medium text-foreground">
                                Valid Until
                            </Label>
                            <div class="relative">
                                <input
                                    ref="validUntilInputRef"
                                    id="valid-until"
                                    type="text"
                                    placeholder="YYYY-MM-DD"
                                    readonly
                                    :value="newCoupon.validUntil"
                                    class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pr-10 cursor-pointer focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]"
                                />
                                <Calendar class="absolute right-3 top-1/2 size-4 -translate-y-1/2 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                    </div>

                    <!-- Applicable Packages -->
                    <div class="space-y-2">
                        <Label class="text-sm font-medium text-foreground">
                            Applicable Packages
                        </Label>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="packages-all"
                                    v-model="newCoupon.applicablePackages"
                                    value="all"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="packages-all"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    All Packages
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="packages-specific"
                                    v-model="newCoupon.applicablePackages"
                                    value="specific"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="packages-specific"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Specific Packages
                                </Label>
                            </div>
                        </div>
                        
                        <!-- Select Packages (shown when Specific Packages is selected) -->
                        <div v-if="newCoupon.applicablePackages === 'specific'" class="mt-4 rounded-lg border border-border bg-card p-4">
                            <Label class="text-sm font-medium text-foreground mb-3 block">
                                Select Packages
                            </Label>
                            <div class="space-y-3">
                                <div class="flex items-center space-x-2">
                                    <Checkbox
                                        id="package-basic"
                                        :checked="newCoupon.selectedPackages.includes('basic')"
                                        @update:checked="(checked) => {
                                            if (checked) {
                                                if (!newCoupon.selectedPackages.includes('basic')) {
                                                    newCoupon.selectedPackages.push('basic');
                                                }
                                            } else {
                                                newCoupon.selectedPackages = newCoupon.selectedPackages.filter(p => p !== 'basic');
                                            }
                                        }"
                                    />
                                    <Label
                                        for="package-basic"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                    >
                                        Basic Plan
                                    </Label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <Checkbox
                                        id="package-professional"
                                        :checked="newCoupon.selectedPackages.includes('pro')"
                                        @update:checked="(checked) => {
                                            if (checked) {
                                                if (!newCoupon.selectedPackages.includes('pro')) {
                                                    newCoupon.selectedPackages.push('pro');
                                                }
                                            } else {
                                                newCoupon.selectedPackages = newCoupon.selectedPackages.filter(p => p !== 'pro');
                                            }
                                        }"
                                    />
                                    <Label
                                        for="package-professional"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                    >
                                        Professional Plan
                                    </Label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <Checkbox
                                        id="package-enterprise"
                                        :checked="newCoupon.selectedPackages.includes('enterprise')"
                                        @update:checked="(checked) => {
                                            if (checked) {
                                                if (!newCoupon.selectedPackages.includes('enterprise')) {
                                                    newCoupon.selectedPackages.push('enterprise');
                                                }
                                            } else {
                                                newCoupon.selectedPackages = newCoupon.selectedPackages.filter(p => p !== 'enterprise');
                                            }
                                        }"
                                    />
                                    <Label
                                        for="package-enterprise"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                    >
                                        Enterprise Plan
                                    </Label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="coupon-status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="coupon-status"
                                v-model="newCoupon.status"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="status in couponStatusOptions" :key="status" :value="status">
                                    {{ status.charAt(0).toUpperCase() + status.slice(1) }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button
                        variant="outline"
                        @click="handleCloseCouponModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleSubmitCoupon"
                        :disabled="!newCoupon.code || !newCoupon.discountType || !newCoupon.discountValue || !newCoupon.durationType"
                    >
                        Create Coupon
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Usage History Modal -->
        <Dialog :open="showUsageHistoryModal" @update:open="showUsageHistoryModal = $event">
            <DialogContent class="sm:max-w-[900px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <div class="flex items-center gap-2">
                        <BarChart class="size-5 text-muted-foreground" />
                        <DialogTitle>Usage History: {{ selectedCouponForUsage?.code || '' }}</DialogTitle>
                    </div>
                    <p class="text-sm text-muted-foreground mt-1">
                        Track all redemptions and customer usage of this coupon.
                    </p>
                </DialogHeader>

                <div class="space-y-6 py-4">
                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Total Uses Card -->
                        <div class="rounded-lg border border-purple-200 bg-purple-50 dark:bg-purple-900/10 p-4">
                            <div class="text-sm font-medium text-purple-900 dark:text-purple-300 mb-1">
                                TOTAL USES
                            </div>
                            <div class="text-2xl font-bold text-purple-900 dark:text-purple-100">
                                {{ usageStats.totalUses }}
                            </div>
                            <div class="text-xs text-purple-700 dark:text-purple-400 mt-1">
                                of {{ usageStats.usageLimit }} limit
                            </div>
                        </div>

                        <!-- Total Discount Card -->
                        <div class="rounded-lg border border-pink-200 bg-gradient-to-br from-pink-50 to-orange-50 dark:from-pink-900/10 dark:to-orange-900/10 p-4">
                            <div class="text-sm font-medium text-pink-900 dark:text-pink-300 mb-1">
                                TOTAL DISCOUNT
                            </div>
                            <div class="text-2xl font-bold text-pink-900 dark:text-pink-100">
                                USD {{ usageStats.totalDiscount.toFixed(2) }}
                            </div>
                            <div class="text-xs text-pink-700 dark:text-pink-400 mt-1">
                                Given to customers
                            </div>
                        </div>

                        <!-- Unique Customers Card -->
                        <div class="rounded-lg border border-blue-200 bg-blue-50 dark:bg-blue-900/10 p-4">
                            <div class="text-sm font-medium text-blue-900 dark:text-blue-300 mb-1">
                                UNIQUE CUSTOMERS
                            </div>
                            <div class="text-2xl font-bold text-blue-900 dark:text-blue-100">
                                {{ usageStats.uniqueCustomers }}
                            </div>
                            <div class="text-xs text-blue-700 dark:text-blue-400 mt-1">
                                Different users
                            </div>
                        </div>
                    </div>

                    <!-- Usage Details Table -->
                    <div class="rounded-lg border border-border bg-card">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-border bg-muted/50">
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Customer
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Package
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Discount
                                        </th>
                                        <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                            Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="usage in usageHistoryData"
                                        :key="usage.id"
                                        class="border-b border-border transition-colors hover:bg-muted/50"
                                    >
                                        <td class="px-4 py-3 align-middle">
                                            <div class="flex flex-col">
                                                <span class="text-foreground font-medium">{{ usage.customerName }}</span>
                                                <span class="text-xs text-muted-foreground">{{ usage.customerEmail }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span class="text-foreground">{{ usage.package }}</span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <span class="text-green-600 dark:text-green-400 font-medium">
                                                -{{ usage.currency }} {{ usage.discount.toFixed(2) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <div class="flex flex-col">
                                                <span class="text-foreground">{{ formatDate(usage.date) }}</span>
                                                <span class="text-xs text-muted-foreground">{{ usage.relativeDate }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Export Tip -->
                    <div class="rounded-lg border border-blue-200 bg-blue-50/50 dark:bg-blue-900/10 p-4">
                        <div class="flex items-start gap-3">
                            <Lightbulb class="size-5 text-blue-600 flex-shrink-0 mt-0.5" />
                            <div class="text-sm text-blue-800 dark:text-blue-200">
                                <span class="font-medium">Export Tip:</span> You can copy the entire table data by selecting it and using Ctrl+C (or Cmd+C on Mac) to paste into Excel or Google Sheets for further analysis.
                            </div>
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleCloseUsageHistoryModal"
                    >
                        Close
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Edit Coupon Modal -->
        <Dialog :open="showEditCouponModal" @update:open="showEditCouponModal = $event">
            <DialogContent class="sm:max-w-[600px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <DialogTitle>Edit Coupon</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Coupon Code -->
                    <div class="space-y-2">
                        <Label for="edit-coupon-code" class="text-sm font-medium text-foreground">
                            Coupon Code <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="edit-coupon-code"
                            v-model="editCoupon.code"
                            placeholder="Enter coupon code"
                            class="w-full"
                        />
                        <p class="text-xs text-muted-foreground">e.g. SUMMER2024, WELCOME50, EARLYBIRD</p>
                    </div>

                    <!-- Discount Type -->
                    <div class="space-y-2">
                        <Label class="text-sm font-medium text-foreground">
                            Discount Type <span class="text-red-500">*</span>
                        </Label>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="edit-discount-percentage"
                                    v-model="editCoupon.discountType"
                                    value="percentage"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="edit-discount-percentage"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Percentage (%)
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="edit-discount-fixed"
                                    v-model="editCoupon.discountType"
                                    value="fixed"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="edit-discount-fixed"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Fixed Amount
                                </Label>
                            </div>
                        </div>
                    </div>

                    <!-- Discount Value -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <Label for="edit-discount-value" class="text-sm font-medium text-foreground">
                                Discount Value <span class="text-red-500">*</span>
                            </Label>
                            <Input
                                id="edit-discount-value"
                                v-model.number="editCoupon.discountValue"
                                type="number"
                                placeholder="0"
                                min="0"
                                step="0.01"
                                class="w-full"
                            />
                        </div>
                        <div v-if="editCoupon.discountType === 'fixed'" class="space-y-2">
                            <Label for="edit-coupon-currency" class="text-sm font-medium text-foreground">
                                Currency
                            </Label>
                            <div class="relative">
                                <select
                                    id="edit-coupon-currency"
                                    v-model="editCoupon.currency"
                                    class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                                >
                                    <option v-for="currency in currencies" :key="currency" :value="currency">
                                        {{ currency }}
                                    </option>
                                </select>
                                <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                    </div>

                    <!-- Duration Type -->
                    <div class="space-y-2">
                        <Label class="text-sm font-medium text-foreground">
                            Duration Type <span class="text-red-500">*</span>
                        </Label>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="edit-duration-once"
                                    v-model="editCoupon.durationType"
                                    value="once"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="edit-duration-once"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Once (First payment only)
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="edit-duration-recurring"
                                    v-model="editCoupon.durationType"
                                    value="recurring"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="edit-duration-recurring"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Recurring
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="edit-duration-forever"
                                    v-model="editCoupon.durationType"
                                    value="forever"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="edit-duration-forever"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Forever
                                </Label>
                            </div>
                        </div>
                    </div>

                    <!-- Number of Months (shown when Recurring is selected) -->
                    <div v-if="editCoupon.durationType === 'recurring'" class="space-y-2">
                        <Label for="edit-number-of-months" class="text-sm font-medium text-foreground">
                            Number of Months
                        </Label>
                        <Input
                            id="edit-number-of-months"
                            v-model.number="editCoupon.numberOfMonths"
                            type="number"
                            placeholder="1"
                            min="1"
                            class="w-full"
                        />
                    </div>

                    <!-- Usage Limit -->
                    <div class="space-y-2">
                        <Label for="edit-usage-limit" class="text-sm font-medium text-foreground">
                            Usage Limit
                        </Label>
                        <Input
                            id="edit-usage-limit"
                            v-model.number="editCoupon.usageLimit"
                            type="number"
                            placeholder="0"
                            min="0"
                            class="w-full"
                        />
                        <p class="text-xs text-muted-foreground">Set to 0 for unlimited usage</p>
                    </div>

                    <!-- Valid From / Valid Until -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <Label for="edit-valid-from" class="text-sm font-medium text-foreground">
                                Valid From
                            </Label>
                            <div class="relative">
                                <input
                                    ref="editValidFromInputRef"
                                    id="edit-valid-from"
                                    type="text"
                                    placeholder="YYYY-MM-DD"
                                    readonly
                                    :value="editCoupon.validFrom"
                                    @click="editValidFromPicker?.open()"
                                    class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pr-10 cursor-pointer focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]"
                                />
                                <button
                                    @click.stop="editValidFromPicker?.open()"
                                    type="button"
                                    class="absolute right-2 top-1/2 -translate-y-1/2 p-1 hover:bg-muted rounded transition-colors cursor-pointer"
                                >
                                    <Calendar class="size-4 text-muted-foreground" />
                                </button>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <Label for="edit-valid-until" class="text-sm font-medium text-foreground">
                                Valid Until
                            </Label>
                            <div class="relative">
                                <input
                                    ref="editValidUntilInputRef"
                                    id="edit-valid-until"
                                    type="text"
                                    placeholder="YYYY-MM-DD"
                                    readonly
                                    :value="editCoupon.validUntil"
                                    @click="editValidUntilPicker?.open()"
                                    class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pr-10 cursor-pointer focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]"
                                />
                                <button
                                    @click.stop="editValidUntilPicker?.open()"
                                    type="button"
                                    class="absolute right-2 top-1/2 -translate-y-1/2 p-1 hover:bg-muted rounded transition-colors cursor-pointer"
                                >
                                    <Calendar class="size-4 text-muted-foreground" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Applicable Packages -->
                    <div class="space-y-2">
                        <Label class="text-sm font-medium text-foreground">
                            Applicable Packages
                        </Label>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="edit-packages-all"
                                    v-model="editCoupon.applicablePackages"
                                    value="all"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="edit-packages-all"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    All Packages
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input
                                    type="radio"
                                    id="edit-packages-specific"
                                    v-model="editCoupon.applicablePackages"
                                    value="specific"
                                    class="size-4 text-blue-600 focus:ring-blue-500"
                                />
                                <Label
                                    for="edit-packages-specific"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Specific Packages
                                </Label>
                            </div>
                        </div>
                        
                        <!-- Select Packages (shown when Specific Packages is selected) -->
                        <div v-if="editCoupon.applicablePackages === 'specific'" class="mt-4 rounded-lg border border-border bg-card p-4">
                            <Label class="text-sm font-medium text-foreground mb-3 block">
                                Select Packages
                            </Label>
                            <div class="space-y-3">
                                <div class="flex items-center space-x-2">
                                    <Checkbox
                                        id="edit-package-basic"
                                        :checked="editCoupon.selectedPackages.includes('basic')"
                                        @update:checked="(checked) => {
                                            if (checked) {
                                                if (!editCoupon.selectedPackages.includes('basic')) {
                                                    editCoupon.selectedPackages.push('basic');
                                                }
                                            } else {
                                                editCoupon.selectedPackages = editCoupon.selectedPackages.filter(p => p !== 'basic');
                                            }
                                        }"
                                    />
                                    <Label
                                        for="edit-package-basic"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                    >
                                        Basic Plan
                                    </Label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <Checkbox
                                        id="edit-package-professional"
                                        :checked="editCoupon.selectedPackages.includes('pro')"
                                        @update:checked="(checked) => {
                                            if (checked) {
                                                if (!editCoupon.selectedPackages.includes('pro')) {
                                                    editCoupon.selectedPackages.push('pro');
                                                }
                                            } else {
                                                editCoupon.selectedPackages = editCoupon.selectedPackages.filter(p => p !== 'pro');
                                            }
                                        }"
                                    />
                                    <Label
                                        for="edit-package-professional"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                    >
                                        Professional Plan
                                    </Label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <Checkbox
                                        id="edit-package-enterprise"
                                        :checked="editCoupon.selectedPackages.includes('enterprise')"
                                        @update:checked="(checked) => {
                                            if (checked) {
                                                if (!editCoupon.selectedPackages.includes('enterprise')) {
                                                    editCoupon.selectedPackages.push('enterprise');
                                                }
                                            } else {
                                                editCoupon.selectedPackages = editCoupon.selectedPackages.filter(p => p !== 'enterprise');
                                            }
                                        }"
                                    />
                                    <Label
                                        for="edit-package-enterprise"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                    >
                                        Enterprise Plan
                                    </Label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="edit-coupon-status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="edit-coupon-status"
                                v-model="editCoupon.status"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="status in couponStatusOptions" :key="status" :value="status">
                                    {{ status.charAt(0).toUpperCase() + status.slice(1) }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button
                        variant="outline"
                        @click="handleCloseEditCouponModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleUpdateCoupon"
                        :disabled="!editCoupon.code || !editCoupon.discountType || !editCoupon.discountValue || !editCoupon.durationType"
                    >
                        Update Coupon
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Delete Feature Confirmation Modal -->
        <Dialog :open="showDeleteFeatureModal" @update:open="(value) => { if (!value) cancelDeleteFeature(); }">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle class="text-lg font-semibold text-foreground">
                        Are you sure?
                    </DialogTitle>
                    <DialogDescription class="text-sm text-muted-foreground pt-2">
                        Are you sure you want to delete this feature? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter class="gap-3">
                    <DialogClose as-child>
                        <Button
                            variant="secondary"
                            @click="cancelDeleteFeature"
                            class="cursor-pointer"
                        >
                            Cancel
                        </Button>
                    </DialogClose>
                    <Button
                        @click="confirmDeleteFeature"
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                    >
                        Delete
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Delete Package Confirmation Modal -->
        <Dialog :open="showDeletePackageModal" @update:open="(value) => { if (!value) cancelDeletePackage(); }">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle class="text-lg font-semibold text-foreground">
                        Are you sure?
                    </DialogTitle>
                    <DialogDescription class="text-sm text-muted-foreground pt-2">
                        Are you sure you want to delete this package? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter class="gap-3">
                    <DialogClose as-child>
                        <Button
                            variant="secondary"
                            @click="cancelDeletePackage"
                            class="cursor-pointer"
                        >
                            Cancel
                        </Button>
                    </DialogClose>
                    <Button
                        @click="confirmDeletePackage"
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                    >
                        Delete
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Delete Coupon Confirmation Modal -->
        <Dialog :open="showDeleteCouponModal" @update:open="(value) => { if (!value) cancelDeleteCoupon(); }">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle class="text-lg font-semibold text-foreground">
                        Are you sure?
                    </DialogTitle>
                    <DialogDescription class="text-sm text-muted-foreground pt-2">
                        Are you sure you want to delete this coupon? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter class="gap-3">
                    <DialogClose as-child>
                        <Button
                            variant="secondary"
                            @click="cancelDeleteCoupon"
                            class="cursor-pointer"
                        >
                            Cancel
                        </Button>
                    </DialogClose>
                    <Button
                        @click="confirmDeleteCoupon"
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                    >
                        Delete
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </AppLayout>
</template>
