<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as subscriptionIndex, preview as subscriptionPreview } from '@/routes/subscription';
import { store as storeFeature, update as updateFeature, destroy as destroyFeature } from '@/routes/subscription/features';
import { store as storePackage, update as updatePackage, destroy as destroyPackage } from '@/routes/subscription/packages';
import { store as storeCoupon, update as updateCoupon, destroy as destroyCoupon, usage as couponUsage } from '@/routes/subscription/coupons';
import { get as getPackageConfigurationRoute, update as updatePackageConfigurationRoute } from '@/routes/subscription/packages/configuration';
import { get as getPackagePricing, store as storePricing, update as updatePricing, destroy as destroyPricing } from '@/routes/subscription/packages/pricing';
import { type BreadcrumbItem } from '@/types';
import { Head, router, useForm, usePage } from '@inertiajs/vue3';
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

interface Feature {
    id: string;
    name: string;
    key: string;
    dataType: string;
    metered: boolean;
    status: string;
}

interface Package {
    id: string;
    name: string;
    code?: string;
    subtitle: string;
    status: string;
    description: string;
    monthlyEnabled: boolean;
    annualEnabled: boolean;
    trialDays: number | null;
    creditCardRequired: boolean;
    displaySequence?: number;
}

interface Coupon {
    id: string;
    code: string;
    discount: string;
    discountType: string;
    discountValue: number;
    type: string;
    validFrom: string;
    validTo: string;
    usage: number;
    usageLimit: number | null;
    status: string;
    applicablePackages?: string;
    packageIds?: string[];
}

interface Props {
    features?: Feature[];
    packages?: Package[];
    coupons?: Coupon[];
}

const props = withDefaults(defineProps<Props>(), {
    features: () => [],
    packages: () => [],
    coupons: () => [],
});

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

// Handle metered checkbox toggle
const onMeteredToggle = () => {
    editFeature.value.isMetered = !editFeature.value.isMetered;
};

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

// Dynamic data from props
const features = ref<Feature[]>(props.features.map(f => ({
    ...f,
    metered: Boolean(f.metered), // Ensure boolean conversion
})));
const packages = ref<Package[]>([...props.packages]);
const coupons = ref<Coupon[]>([...props.coupons]);

// Watch for prop changes and update local refs
watch(() => props.features, (newFeatures) => {
    features.value = newFeatures.map(f => ({
        ...f,
        metered: Boolean(f.metered), // Ensure boolean conversion
    }));
}, { deep: true });

watch(() => props.packages, (newPackages) => {
    packages.value = [...newPackages];
}, { deep: true });

// Auto-select first package when configuration tab is active or packages are loaded
watch([() => activeTab.value, () => packages.value], ([newTab, newPackages]) => {
    if (newTab === 'configuration' && !selectedPackage.value && newPackages.length > 0) {
        selectedPackage.value = newPackages[0].id;
    }
}, { immediate: true });

watch(() => props.coupons, (newCoupons) => {
    coupons.value = [...newCoupons];
}, { deep: true });

// Handle flash messages from backend
const page = usePage();
watch(() => (page.props as any).flash?.success, (message) => {
    if (message) {
        success(message);
        // Reload page data
        router.reload({ only: ['features', 'packages', 'coupons'] });
    }
}, { immediate: true });

// Old dummy data removed - now using props from backend

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
const { success, error } = useToast();

// Delete confirmation modals
const showDeleteFeatureModal = ref(false);
const featureToDelete = ref<string | null>(null);

const showDeletePackageModal = ref(false);
const packageToDelete = ref<string | null>(null);

const showDeletePriceModal = ref(false);
const priceToDelete = ref<string | null>(null);

const showDeleteCouponModal = ref(false);
const couponToDelete = ref<any | null>(null);

// Edit Feature Modal State
const showEditFeatureModal = ref(false);
const editingFeature = ref<any | null>(null);
const editFeature = ref({
    name: '',
    key: '',
    dataType: 'Number',
    isMetered: false,
    description: '',
    status: 'active',
});

const handleEdit = (featureId: string) => {
    // Find feature and populate edit form
    const feature = features.value.find(f => f.id === featureId);
    if (feature) {
        editingFeature.value = feature;
        editFeature.value = {
            name: feature.name || '',
            key: feature.key || '',
            dataType: feature.dataType || 'Number',
            isMetered: Boolean(feature.metered),
            description: feature.description || '',
            status: feature.status || 'active',
        };
        showEditFeatureModal.value = true;

    }
};

const handleCloseEditFeatureModal = () => {
    showEditFeatureModal.value = false;
    editingFeature.value = null;
    // Reset form
    editFeature.value = {
        name: '',
        key: '',
        dataType: 'Number',
        isMetered: false,
        description: '',
        status: 'active',
    };
};

const handleUpdateFeature = () => {
    if (!editingFeature.value || !editFeature.value.name || !editFeature.value.dataType) {
        return;
    }

    const payload = {
        name: editFeature.value.name,
        key: editFeature.value.key || editFeature.value.name.toLowerCase().replace(/\s+/g, '_'),
        data_type: editFeature.value.dataType,
        is_metered: editFeature.value.isMetered === true,
        description: editFeature.value.description,
        status: editFeature.value.status,
    };

    router.put(updateFeature(editingFeature.value.id).url, payload, {
        preserveScroll: true,
        onSuccess: () => {
            success('Feature updated successfully.');
            handleCloseEditFeatureModal();
            router.reload({ only: ['features', 'packages', 'coupons'] });
        },
    });
};

const handleDelete = (featureId: string) => {
    featureToDelete.value = featureId;
    showDeleteFeatureModal.value = true;
};

const confirmDeleteFeature = () => {
    if (featureToDelete.value !== null) {
        router.delete(destroyFeature(featureToDelete.value).url, {
            preserveScroll: true,
            onSuccess: () => {
                success('Feature deleted successfully.');
                router.reload({ only: ['features', 'packages', 'coupons'] });
            },
        });
        featureToDelete.value = null;
    }
    showDeleteFeatureModal.value = false;
};

const cancelDeleteFeature = () => {
    featureToDelete.value = null;
    showDeleteFeatureModal.value = false;
};

// Packages data now comes from props - removed dummy data

// Create Package Modal State
const showCreatePackageModal = ref(false);
const newPackage = ref({
    name: '',
    code: '',
    description: '',
    monthlyEnabled: true,
    annualEnabled: false,
    enableTrial: false,
    creditCardRequired: true,
    status: 'active',
    displaySequence: 0,
});

const packageStatusOptions = ['active', 'inactive'];

// Edit Package Modal State
const showEditPackageModal = ref(false);
const editingPackage = ref<Package | null>(null);
const editPackage = ref({
    name: '',
    code: '',
    description: '',
    monthlyEnabled: true,
    annualEnabled: false,
    enableTrial: false,
    creditCardRequired: true,
    status: 'active',
    displaySequence: 0,
});

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
        monthlyEnabled: true,
        annualEnabled: false,
        enableTrial: false,
        creditCardRequired: true,
        status: 'active',
        displaySequence: 0,
    };
};

const handleSubmitPackage = () => {
    // Validate required fields
    if (!newPackage.value.name || !newPackage.value.status) {
        return;
    }
    
    // At least one billing type must be selected
    if (!newPackage.value.monthlyEnabled && !newPackage.value.annualEnabled) {
        return;
    }

    router.post(storePackage().url, {
        name: newPackage.value.name,
        code: newPackage.value.code || newPackage.value.name.toLowerCase().replace(/\s+/g, '_'),
        description: newPackage.value.description,
        monthly_enabled: newPackage.value.monthlyEnabled,
        annual_enabled: newPackage.value.annualEnabled,
        trial_days: newPackage.value.enableTrial ? 14 : null,
        credit_card_required: newPackage.value.creditCardRequired,
        status: newPackage.value.status,
        display_sequence: newPackage.value.displaySequence || 0,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            success('Package created successfully.');
            handleClosePackageModal();
            router.reload({ only: ['features', 'packages', 'coupons'] });
        },
    });
};

const handleEditPackage = (packageId: string) => {
    // Find package and populate edit form
    const pkg = packages.value.find(p => p.id === packageId);
    if (pkg) {
        editingPackage.value = pkg;
        editPackage.value = {
            name: pkg.name,
            code: pkg.code || '',
            description: pkg.description || '',
            monthlyEnabled: pkg.monthlyEnabled,
            annualEnabled: pkg.annualEnabled,
            enableTrial: pkg.trialDays ? pkg.trialDays > 0 : false,
            creditCardRequired: pkg.creditCardRequired,
            status: pkg.status,
            displaySequence: pkg.displaySequence || 0,
        };
        showEditPackageModal.value = true;
    }
};

const handleCloseEditPackageModal = () => {
    showEditPackageModal.value = false;
    editingPackage.value = null;
    editPackage.value = {
        name: '',
        code: '',
        description: '',
        monthlyEnabled: true,
        annualEnabled: false,
        enableTrial: false,
        creditCardRequired: true,
        status: 'active',
        displaySequence: 0,
    };
};

const handleUpdatePackage = () => {
    // Validate required fields
    if (!editingPackage.value || !editPackage.value.name || !editPackage.value.status) {
        return;
    }
    
    // At least one billing type must be selected
    if (!editPackage.value.monthlyEnabled && !editPackage.value.annualEnabled) {
        return;
    }

    // Preserve existing trial days if trial is enabled, otherwise set to null
    const trialDays = editPackage.value.enableTrial 
        ? (editingPackage.value.trialDays || 14) 
        : null;

    router.put(updatePackage(editingPackage.value.id).url, {
        name: editPackage.value.name,
        code: editPackage.value.code || editPackage.value.name.toLowerCase().replace(/\s+/g, '_'),
        description: editPackage.value.description || null,
        monthly_enabled: editPackage.value.monthlyEnabled,
        annual_enabled: editPackage.value.annualEnabled,
        trial_days: trialDays,
        credit_card_required: editPackage.value.creditCardRequired,
        status: editPackage.value.status,
        display_sequence: editPackage.value.displaySequence || 0,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            success('Package updated successfully.');
            handleCloseEditPackageModal();
            router.reload({ only: ['features', 'packages', 'coupons'] });
        },
    });
};

const handleDeletePackage = (packageId: string) => {
    packageToDelete.value = packageId;
    showDeletePackageModal.value = true;
};

const confirmDeletePackage = () => {
    if (packageToDelete.value !== null) {
        router.delete(destroyPackage(packageToDelete.value).url, {
            preserveScroll: true,
            onSuccess: () => {
                success('Package deleted successfully.');
                router.reload({ only: ['features', 'packages', 'coupons'] });
            },
        });
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
const configurationData = ref<Array<{
    feature_id: string;
    feature_name: string;
    data_type: string;
    limit_type: string;
    limit_value: string | number;
}>>([]);
const loadingConfiguration = ref(false);
const selectedPackageName = ref<string>('');


// Watch for package selection and fetch configuration from API
watch(selectedPackage, async (packageId) => {
    if (!packageId) {
        configurationData.value = [];
        selectedPackageName.value = '';
        return;
    }
    
    loadingConfiguration.value = true;
    try {
        const response = await fetch(getPackageConfigurationRoute(packageId).url);
        const data = await response.json();
        
        configurationData.value = data.configuration.map((item: any) => ({
            feature_id: item.feature_id,
            feature_name: item.feature_name,
            data_type: item.data_type || 'Number',
            limit_type: item.limit_type || 'disabled',
            limit_value: item.limit_value ?? (item.data_type === 'Text' ? '' : 0),
        }));
        selectedPackageName.value = data.package.name;
    } catch (error) {
        console.error('Error fetching package configuration:', error);
        configurationData.value = [];
        selectedPackageName.value = '';
    } finally {
        loadingConfiguration.value = false;
    }
});

// Watch for limit type changes and reset value if needed
watch(() => configurationData.value, () => {
    configurationData.value.forEach((item) => {
        if (item.limit_type !== 'limited') {
            // Set to empty string for Text type, 0 for Number/Boolean when unlimited or disabled
            item.limit_value = item.data_type === 'Text' ? '' : 0;
        } else if (item.limit_type === 'limited' && (item.limit_value === null || item.limit_value === undefined)) {
            // Default to empty string for Text type, 0 for Number/Boolean if not set
            item.limit_value = item.data_type === 'Text' ? '' : 0;
        }
    });
}, { deep: true });

const getLimitTypeDisplay = (limitType: string, limitValue: string | number): string => {
    if (limitType === 'limited') {
        return `Limited (${limitValue ?? (typeof limitValue === 'string' ? '' : 0)})`;
    } else if (limitType === 'unlimited') {
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
    if (!selectedPackage.value) {
        return;
    }

    const features = configurationData.value.map((item) => ({
        feature_id: item.feature_id,
        limit_type: item.limit_type,
        limit_value: item.limit_type === 'limited' ? item.limit_value : null,
    }));

    router.put(updatePackageConfigurationRoute(selectedPackage.value).url, {
        features: features,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            success('Package configuration updated successfully.');
            router.reload({ only: ['features', 'packages', 'coupons'] });
        },
    });
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
    if (!newFeature.value.name || !newFeature.value.dataType) {
        return;
    }

    router.post(storeFeature().url, {
        name: newFeature.value.name,
        key: newFeature.value.key || newFeature.value.name.toLowerCase().replace(/\s+/g, '_'),
        data_type: newFeature.value.dataType,
        is_metered: Boolean(newFeature.value.isMetered),
        description: newFeature.value.description,
        status: newFeature.value.status,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            success('Feature created successfully.');
            handleCloseFeatureModal();
            router.reload({ only: ['features', 'packages', 'coupons'] });
        },
    });
};

// Pricing tab state
const selectedPackageForPricing = ref<string>('');
const selectedCurrency = ref<string>('USD');
const pricingData = ref<Array<{
    id: string;
    currency: string;
    billingCycle: string;
    price: number;
    status: string;
}>>([]);
const loadingPricing = ref(false);
const selectedPackageNameForPricing = ref<string>('');

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

// Computed property to get available billing cycles (excluding those that already have prices)
const availableBillingCycles = computed(() => {
    if (!selectedPackageForPricing.value || !selectedCurrency.value) {
        return billingCycles;
    }
    
    // Get existing billing cycles for the selected currency
    const existingCycles = pricingData.value
        .filter((item: any) => item.currency === selectedCurrency.value)
        .map((item: any) => item.billingCycle);
    
    // Filter out cycles that already have prices
    return billingCycles.filter(cycle => !existingCycles.includes(cycle));
});

// Computed property to check if both monthly and annual prices exist
const allBillingCyclesAdded = computed(() => {
    if (!selectedPackageForPricing.value || !selectedCurrency.value) {
        return false;
    }
    
    // Get existing billing cycles for the selected currency
    const existingCycles = pricingData.value
        .filter((item: any) => item.currency === selectedCurrency.value)
        .map((item: any) => item.billingCycle);
    
    // Check if both monthly and annual exist
    return existingCycles.includes('monthly') && existingCycles.includes('annual');
});

// Computed property for package name to ensure reactivity
const currentPackageName = computed(() => {
    if (!selectedPackageForPricing.value) return '';
    const pkg = packages.value.find(p => p.id === selectedPackageForPricing.value);
    return pkg ? pkg.name : '';
});

// Watch for package selection to set package name immediately (for backward compatibility)
watch(() => selectedPackageForPricing.value, (packageId) => {
    if (packageId) {
        const pkg = packages.value.find(p => p.id === packageId);
        selectedPackageNameForPricing.value = pkg ? pkg.name : '';
    } else {
        selectedPackageNameForPricing.value = '';
    }
}, { immediate: true });

// Watch for package and currency selection to fetch pricing
watch([() => selectedPackageForPricing.value, () => selectedCurrency.value], async ([packageId, currency]) => {
    if (!packageId || !currency) {
        pricingData.value = [];
        return;
    }
    
    // Set package name immediately
    const pkg = packages.value.find(p => p.id === packageId);
    selectedPackageNameForPricing.value = pkg ? pkg.name : '';
    
    loadingPricing.value = true;
    try {
        const response = await fetch(getPackagePricing(packageId).url);
        const data = await response.json();
        
        // Filter pricing by selected currency
        pricingData.value = data.pricing
            .filter((item: any) => item.currency === currency)
            .map((item: any) => ({
                id: item.id,
                currency: item.currency,
                billingCycle: item.billingCycle,
                price: item.price,
                status: item.status,
            }));
    } catch (error) {
        console.error('Error fetching package pricing:', error);
        pricingData.value = [];
    } finally {
        loadingPricing.value = false;
    }
});

// Auto-select first package when pricing tab is active
watch([() => activeTab.value, () => packages.value], ([newTab, newPackages]) => {
    if (newTab === 'pricing' && !selectedPackageForPricing.value && newPackages.length > 0) {
        selectedPackageForPricing.value = newPackages[0].id;
    }
}, { immediate: true });

const handleAddPrice = () => {
    if (!selectedPackageForPricing.value || !selectedCurrency.value) {
        return;
    }
    
    // Ensure package name is set (in case it wasn't set by watcher)
    const pkg = packages.value.find(p => p.id === selectedPackageForPricing.value);
    if (pkg) {
        selectedPackageNameForPricing.value = pkg.name;
    }
    
    // Get available billing cycles and pre-select the first one
    const availableCycles = availableBillingCycles.value;
    
    // Reset form with first available billing cycle pre-selected
    newPrice.value = {
        billingCycle: availableCycles.length > 0 ? availableCycles[0] : '',
        price: 0,
        status: 'active',
    };
    
    showAddPriceModal.value = true;
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
    if (!newPrice.value.billingCycle || newPrice.value.price === null || newPrice.value.price === undefined || !selectedPackageForPricing.value) {
        return;
    }

    router.post(storePricing(selectedPackageForPricing.value).url, {
        currency: selectedCurrency.value,
        billing_cycle: newPrice.value.billingCycle,
        price: newPrice.value.price,
        status: newPrice.value.status,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            success('Pricing added successfully.');
            handleClosePriceModal();
            // Reload pricing data
            const packageId = selectedPackageForPricing.value;
            const currency = selectedCurrency.value;
            fetch(getPackagePricing(packageId).url)
                .then(response => response.json())
                .then(data => {
                    pricingData.value = data.pricing
                        .filter((item: any) => item.currency === currency)
                        .map((item: any) => ({
                            id: item.id,
                            currency: item.currency,
                            billingCycle: item.billingCycle,
                            price: item.price,
                            status: item.status,
                        }));
                });
        },
    });
};

// Helper function to get package display name
const getPackageDisplayName = (packageId: string) => {
    const pkg = packages.value.find(p => p.id === packageId);
    return pkg ? pkg.name : packageId;
};

// Edit Price Modal State
const showEditPriceModal = ref(false);
const editingPrice = ref<{ id: string; billingCycle: string; price: number; status: string } | null>(null);
const editPrice = ref({
    billingCycle: 'monthly',
    price: 0,
    status: 'active',
});

const handleEditPrice = (price: any) => {
    editingPrice.value = price;
    // Ensure package name is set
    const pkg = packages.value.find(p => p.id === selectedPackageForPricing.value);
    if (pkg) {
        selectedPackageNameForPricing.value = pkg.name;
    }
    // Populate edit form with price data
    editPrice.value = {
        billingCycle: price.billingCycle || 'monthly',
        price: price.price || 0,
        status: price.status || 'active',
    };
    showEditPriceModal.value = true;
};

const handleCloseEditPriceModal = () => {
    showEditPriceModal.value = false;
    editingPrice.value = null;
    editPrice.value = {
        billingCycle: 'monthly',
        price: 0,
        status: 'active',
    };
};

const handleUpdatePrice = () => {
    if (!editingPrice.value || !selectedPackageForPricing.value) {
        return;
    }

    // Validate price is provided
    if (editPrice.value.price === null || editPrice.value.price === undefined) {
        return;
    }

    router.put(updatePricing([selectedPackageForPricing.value, editingPrice.value.id]).url, {
        price: parseFloat(editPrice.value.price.toString()),
        status: editPrice.value.status,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            success('Pricing updated successfully.');
            handleCloseEditPriceModal();
            // Reload pricing data
            const packageId = selectedPackageForPricing.value;
            const currency = selectedCurrency.value;
            fetch(getPackagePricing(packageId).url)
                .then(response => response.json())
                .then(data => {
                    pricingData.value = data.pricing
                        .filter((item: any) => item.currency === currency)
                        .map((item: any) => ({
                            id: item.id,
                            currency: item.currency,
                            billingCycle: item.billingCycle,
                            price: item.price,
                            status: item.status,
                        }));
                })
                .catch(error => {
                    console.error('Error reloading pricing data:', error);
                });
        },
        onError: (errors) => {
            console.error('Error updating price:', errors);
        },
    });
};

const handleDeletePrice = (priceId: string) => {
    if (!selectedPackageForPricing.value) {
        return;
    }
    priceToDelete.value = priceId;
    showDeletePriceModal.value = true;
};

const confirmDeletePrice = () => {
    if (priceToDelete.value !== null && selectedPackageForPricing.value) {
        router.delete(destroyPricing(selectedPackageForPricing.value, priceToDelete.value).url, {
            preserveScroll: true,
            onSuccess: () => {
                success('Pricing deleted successfully.');
                // Reload pricing data
                const packageId = selectedPackageForPricing.value;
                const currency = selectedCurrency.value;
                fetch(getPackagePricing(packageId).url)
                    .then(response => response.json())
                    .then(data => {
                        pricingData.value = data.pricing
                            .filter((item: any) => item.currency === currency)
                            .map((item: any) => ({
                                id: item.id,
                                currency: item.currency,
                                billingCycle: item.billingCycle,
                                price: item.price,
                                status: item.status,
                            }));
                    });
            },
        });
        priceToDelete.value = null;
    }
    showDeletePriceModal.value = false;
};

const cancelDeletePrice = () => {
    priceToDelete.value = null;
    showDeletePriceModal.value = false;
};


// Preview tab state
const displayCurrency = ref<string>('USD');

// Coupons tab state
const currentPageCoupons = ref(1);
const perPageCoupons = ref(10);

// Coupons data now comes from props - removed dummy data

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
        case 'forever':
            return 'bg-green-100 text-green-800 border-green-200';
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

// Direct checkbox change handler
const handleCheckboxChange = (event: Event, packageId: string | number) => {
    const target = event.target as HTMLInputElement;
    const id = String(packageId);
    const isChecked = target.checked;
    
    if (isChecked) {
        if (!newCoupon.value.selectedPackages.includes(id)) {
            newCoupon.value.selectedPackages.push(id);
        }
    } else {
        const index = newCoupon.value.selectedPackages.indexOf(id);
        if (index > -1) {
            newCoupon.value.selectedPackages.splice(index, 1);
        }
    }
};

// Label click handler for create coupon
const handleLabelClick = (packageId: string | number, event: Event) => {
    event.preventDefault();
    const id = String(packageId);
    const checkbox = document.getElementById(`package-${id}`) as HTMLInputElement;
    if (checkbox) {
        // Toggle the checkbox state
        checkbox.checked = !checkbox.checked;
        // Trigger the change handler directly
        handleCheckboxChange({ target: checkbox } as Event, packageId);
    }
};

// Label click handler for edit coupon
const handleEditLabelClick = (packageId: string | number, event: Event) => {
    event.preventDefault();
    event.stopPropagation();
    const id = String(packageId);
    const checkbox = document.getElementById(`edit-package-${id}`) as HTMLInputElement;
    if (checkbox) {
        // Toggle the checkbox state
        checkbox.checked = !checkbox.checked;
        // Trigger the change handler directly
        handleEditCheckboxChange({ target: checkbox } as Event, packageId);
    }
};

// Direct checkbox change handler for edit coupon
const handleEditCheckboxChange = (event: Event, packageId: string | number) => {
    const target = event.target as HTMLInputElement;
    const id = String(packageId);
    const isChecked = target.checked;
    
    if (isChecked) {
        if (!editCoupon.value.selectedPackages.includes(id)) {
            editCoupon.value.selectedPackages.push(id);
        }
    } else {
        const index = editCoupon.value.selectedPackages.indexOf(id);
        if (index > -1) {
            editCoupon.value.selectedPackages.splice(index, 1);
        }
    }
};

// Method to handle package selection for edit coupon
const handleEditPackageSelection = (packageId: string | number, checked?: boolean) => {
    const id = String(packageId);
    const isCurrentlySelected = editCoupon.value.selectedPackages.includes(id);
    const shouldBeSelected = checked !== undefined ? checked : !isCurrentlySelected;
    
    if (shouldBeSelected && !isCurrentlySelected) {
        editCoupon.value.selectedPackages.push(id);
    } else if (!shouldBeSelected && isCurrentlySelected) {
        const index = editCoupon.value.selectedPackages.indexOf(id);
        if (index > -1) {
            editCoupon.value.selectedPackages.splice(index, 1);
        }
    }
};

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
    if (!newCoupon.value.code || !newCoupon.value.discountType || !newCoupon.value.discountValue || !newCoupon.value.durationType || !newCoupon.value.validFrom || !newCoupon.value.validUntil) {
        return;
    }

    // Validate that packages are selected when "specific" is chosen
    if (newCoupon.value.applicablePackages === 'specific' && newCoupon.value.selectedPackages.length === 0) {
        console.error('Validation failed: No packages selected but applicablePackages is "specific"', {
            applicablePackages: newCoupon.value.applicablePackages,
            selectedPackages: newCoupon.value.selectedPackages,
            selectedPackagesLength: newCoupon.value.selectedPackages.length,
        });
        return;
    }

    const payload: any = {
        code: newCoupon.value.code.toUpperCase(),
        discount_type: newCoupon.value.discountType,
        discount_value: newCoupon.value.discountValue,
        currency: newCoupon.value.discountType === 'fixed' ? newCoupon.value.currency : null,
        duration_type: newCoupon.value.durationType,
        number_of_months: newCoupon.value.durationType === 'recurring' ? newCoupon.value.numberOfMonths : null,
        usage_limit: newCoupon.value.usageLimit === 0 ? null : newCoupon.value.usageLimit,
        valid_from: newCoupon.value.validFrom,
        valid_until: newCoupon.value.validUntil,
        status: newCoupon.value.status,
        applicable_packages: newCoupon.value.applicablePackages,
    };

    // Only include package_ids when specific packages are selected
    if (newCoupon.value.applicablePackages === 'specific') {
        payload.package_ids = newCoupon.value.selectedPackages.map(id => Number(id));
    }

    router.post(storeCoupon().url, payload, {
        preserveScroll: true,
        onSuccess: () => {
            success('Coupon created successfully.');
            handleCloseCouponModal();
            router.reload({ only: ['features', 'packages', 'coupons'] });
        },
        onError: (errors: any) => {
            console.error('Coupon creation error:', {
                errors,
                fullErrors: JSON.stringify(errors, null, 2),
                package_ids_error: errors.package_ids,
                applicable_packages_error: errors.applicable_packages,
            });
            const errorMessage = errors.package_ids?.[0] || errors.message || 'Failed to create coupon. Please check the form and try again.';
            error(errorMessage);
        },
    });
};


// Usage History Modal State
const showUsageHistoryModal = ref(false);
const selectedCouponForUsage = ref<any>(null);

// Usage history data - will be fetched from API
const usageHistoryData = ref<any[]>([]);
const loadingUsageData = ref(false);

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

const handleViewUsage = async (coupon: any) => {
    selectedCouponForUsage.value = coupon;
    showUsageHistoryModal.value = true;
    loadingUsageData.value = true;
    
    // Fetch usage data from API
    try {
        const response = await fetch(couponUsage(coupon.id).url);
        const data = await response.json();
        usageHistoryData.value = data.usages || [];
    } catch (error) {
        console.error('Error fetching coupon usage:', error);
        usageHistoryData.value = [];
    } finally {
        loadingUsageData.value = false;
    }
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

const handleEditCoupon = async (coupon: any) => {
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
                        coupon.type === 'recurring' ? 'recurring' : 
                        coupon.type === 'forever' ? 'forever' : 'once';
    
    // Get package IDs from coupon data - try multiple possible property names
    const packageIds = coupon.packageIds || coupon.package_ids || coupon.packages?.map((p: any) => String(p.id)) || [];
    
    // Use applicablePackages from database, fallback to inferring from packageIds
    // Priority: applicablePackages (camelCase) > applicable_packages (snake_case) > infer from packageIds
    const applicablePackagesFromDB = coupon.applicablePackages || coupon.applicable_packages;
    const applicablePackages = applicablePackagesFromDB || 
        (Array.isArray(packageIds) && packageIds.length > 0 ? 'specific' : 'all');
    
    // Populate edit form - ensure applicablePackages is set correctly
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
        applicablePackages: String(applicablePackages),
        selectedPackages: Array.isArray(packageIds) ? packageIds.map((id: string | number) => String(id)) : [],
        status: coupon.status,
    };
    
    // Wait for next tick to ensure reactivity
    await nextTick();
    
    // Force set from DB value if available, otherwise use the computed value
    const finalApplicablePackages = applicablePackagesFromDB || applicablePackages;
    editCoupon.value.applicablePackages = String(finalApplicablePackages);
    
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
    if (!editCoupon.value.code || !editCoupon.value.discountType || !editCoupon.value.discountValue || !editCoupon.value.durationType || !editCoupon.value.validFrom || !editCoupon.value.validUntil) {
        return;
    }

    // Validate that packages are selected when "specific" is chosen
    if (editCoupon.value.applicablePackages === 'specific' && editCoupon.value.selectedPackages.length === 0) {
        return;
    }

    if (!editingCoupon.value) return;

    const payload: any = {
        code: editCoupon.value.code.toUpperCase(),
        discount_type: editCoupon.value.discountType,
        discount_value: editCoupon.value.discountValue,
        currency: editCoupon.value.discountType === 'fixed' ? editCoupon.value.currency : null,
        duration_type: editCoupon.value.durationType,
        number_of_months: editCoupon.value.durationType === 'recurring' ? editCoupon.value.numberOfMonths : null,
        usage_limit: editCoupon.value.usageLimit === 0 ? null : editCoupon.value.usageLimit,
        valid_from: editCoupon.value.validFrom,
        valid_until: editCoupon.value.validUntil,
        status: editCoupon.value.status,
        applicable_packages: editCoupon.value.applicablePackages,
    };

    // Only include package_ids when specific packages are selected
    if (editCoupon.value.applicablePackages === 'specific') {
        payload.package_ids = editCoupon.value.selectedPackages.map(id => Number(id));
    }

    router.put(updateCoupon(editingCoupon.value.id).url, payload, {
        preserveScroll: true,
        onSuccess: () => {
            success('Coupon updated successfully.');
            handleCloseEditCouponModal();
            router.reload({ only: ['features', 'packages', 'coupons'] });
        },
        onError: (errors: any) => {
            const errorMessage = errors.package_ids?.[0] || errors.message || 'Failed to update coupon. Please check the form and try again.';
            error(errorMessage);
        },
    });
};

// Watch for edit modal open/close to initialize/destroy date pickers
watch(showEditCouponModal, async (isOpen) => {
    if (isOpen) {
        // Wait for DOM to be ready and form data to be populated
        await nextTick();
        
        // Force update radio buttons to ensure they reflect the correct value
        const allRadio = document.getElementById('edit-packages-all') as HTMLInputElement;
        const specificRadio = document.getElementById('edit-packages-specific') as HTMLInputElement;
        if (allRadio && specificRadio) {
            allRadio.checked = editCoupon.value.applicablePackages === 'all';
            specificRadio.checked = editCoupon.value.applicablePackages === 'specific';
        }
        
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
        router.delete(destroyCoupon(couponToDelete.value.id).url, {
            preserveScroll: true,
            onSuccess: () => {
                success('Coupon deleted successfully.');
                router.reload({ only: ['features', 'packages', 'coupons'] });
            },
        });
        couponToDelete.value = null;
    }
    showDeleteCouponModal.value = false;
};

const cancelDeleteCoupon = () => {
    couponToDelete.value = null;
    showDeleteCouponModal.value = false;
};

// Preview tab state
interface PreviewPackage {
    id: string;
    name: string;
    description: string;
    isMostPopular: boolean;
    trialDays: number | null;
    monthlyPrice: number | null;
    annualPrice: number | null;
    features: Array<{
        name: string;
        included: boolean;
        limit_type: string;
        limit_value: number;
    }>;
}

const previewPackages = ref<PreviewPackage[]>([]);
const loadingPreview = ref(false);

// Function to fetch preview data
const fetchPreviewData = async (currency: string) => {
    loadingPreview.value = true;
    try {
        const response = await fetch(subscriptionPreview().url + `?currency=${currency}`);
        const data = await response.json();
        previewPackages.value = data.packages || [];
    } catch (error) {
        console.error('Error fetching preview data:', error);
        previewPackages.value = [];
    } finally {
        loadingPreview.value = false;
    }
};

// Watch for currency changes and tab changes to fetch preview data
watch([() => activeTab.value, () => displayCurrency.value], async ([newTab, newCurrency]) => {
    if (newTab === 'preview') {
        await fetchPreviewData(newCurrency);
    }
}, { immediate: true });

// Helper function to format feature display
const getFeatureDisplay = (feature: PreviewPackage['features'][0]): string => {
    if (!feature.included) {
        return feature.name;
    }
    if (feature.limit_type === 'unlimited') {
        return `${feature.name} (Unlimited)`;
    }
    if (feature.limit_type === 'limited' && feature.limit_value) {
        return `${feature.name} (${feature.limit_value})`;
    }
    return feature.name;
};
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
                            <div v-if="pkg.monthlyEnabled || pkg.annualEnabled" style="display: flex; gap: 8px; margin-bottom: 16px; flex-wrap: wrap;">
                                <span
                                    v-if="pkg.monthlyEnabled"
                                    style="background-color: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 600;"
                                >
                                    Monthly
                                </span>
                                <span
                                    v-if="pkg.annualEnabled"
                                    style="background-color: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 600;"
                                >
                                    Annual
                                </span>
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
                                :disabled="loadingConfiguration"
                            >
                                <option value="">-- Choose a package --</option>
                                <option v-for="pkg in packages" :key="pkg.id" :value="pkg.id">
                                    {{ pkg.name }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                        <p class="text-xs text-muted-foreground">Select a package to configure its features.</p>
                    </div>

                    <!-- Empty State (shown when no package selected) -->
                    <div v-if="!selectedPackage" class="rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 p-8 text-center">
                        <BarChart class="size-12 text-muted-foreground mx-auto mb-4" />
                        <h3 class="text-base font-semibold text-foreground mb-2">No Package Selected</h3>
                        <p class="text-sm text-muted-foreground">
                            Please select a package from the dropdown above to configure its features.
                        </p>
                    </div>

                    <!-- Loading State -->
                    <div v-if="loadingConfiguration" class="rounded-lg border border-border bg-card p-8 text-center">
                        <p class="text-sm text-muted-foreground">Loading configuration...</p>
                    </div>

                    <!-- Interactive Configuration Table (shown when package is selected and loaded) -->
                    <div v-else-if="selectedPackage && configurationData.length > 0" class="rounded-lg border border-border bg-card">
                        <div class="p-4 border-b border-border">
                            <h3 class="text-lg font-semibold text-foreground">Configure: {{ selectedPackageName }}</h3>
                        </div>
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
                                        :key="item.feature_id"
                                        class="border-b border-border transition-colors hover:bg-muted/50"
                                    >
                                        <td class="px-4 py-3 align-middle">
                                            <span class="text-foreground font-medium">{{ item.feature_name }}</span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <div class="flex items-center gap-4">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input
                                                        type="radio"
                                                        :name="`limit-type-${item.feature_id}`"
                                                        value="limited"
                                                        v-model="item.limit_type"
                                                        class="size-4 text-blue-600 focus:ring-blue-500"
                                                    />
                                                    <span class="text-sm text-foreground">Limited</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input
                                                        type="radio"
                                                        :name="`limit-type-${item.feature_id}`"
                                                        value="unlimited"
                                                        v-model="item.limit_type"
                                                        class="size-4 text-blue-600 focus:ring-blue-500"
                                                    />
                                                    <span class="text-sm text-foreground">Unlimited</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input
                                                        type="radio"
                                                        :name="`limit-type-${item.feature_id}`"
                                                        value="disabled"
                                                        v-model="item.limit_type"
                                                        class="size-4 text-blue-600 focus:ring-blue-500"
                                                    />
                                                    <span class="text-sm text-foreground">Disabled</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <Input
                                                v-model="item.limit_value"
                                                :type="item.data_type === 'Text' ? 'text' : 'number'"
                                                :disabled="item.limit_type !== 'limited'"
                                                :class="[
                                                    item.data_type === 'Text' ? 'w-full' : 'w-24',
                                                    { 'opacity-50 cursor-not-allowed': item.limit_type !== 'limited' }
                                                ]"
                                                :min="item.data_type === 'Text' ? undefined : '0'"
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
                                :disabled="loadingConfiguration"
                            >
                                Save Changes
                            </Button>
                        </div>
                    </div>

                    <!-- Empty State when package has no features -->
                    <div v-else-if="selectedPackage && !loadingConfiguration && configurationData.length === 0" class="rounded-lg border border-border bg-card p-8 text-center">
                        <p class="text-sm text-muted-foreground">No features available for this package.</p>
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
                                <option v-for="pkg in packages" :key="pkg.id" :value="pkg.id">
                                    {{ pkg.name }}
                                </option>
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

                    <!-- Loading State -->
                    <div v-if="loadingPricing" class="rounded-lg border border-border bg-card p-8 text-center">
                        <p class="text-sm text-muted-foreground">Loading pricing...</p>
                    </div>

                    <!-- Pricing Management Area -->
                    <div v-else-if="selectedPackageForPricing && selectedCurrency" class="rounded-lg border border-border bg-card">
                        <!-- Header with Title and Add Price Button -->
                        <div class="flex items-center justify-between p-6 border-b border-border">
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">Pricing for {{ selectedCurrency }}</h3>
                                <p class="text-sm text-muted-foreground mt-1">{{ selectedPackageNameForPricing }}</p>
                            </div>
                            <Button 
                                @click="handleAddPrice"
                                :disabled="allBillingCyclesAdded"
                                :class="[
                                    allBillingCyclesAdded 
                                        ? 'bg-gray-300 dark:bg-gray-700 text-gray-500 dark:text-gray-400 cursor-not-allowed' 
                                        : 'bg-blue-600 hover:bg-blue-700 text-white cursor-pointer'
                                ]"
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
                                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="pricingData.length === 0">
                                            <td colspan="4" class="px-4 py-12 text-center">
                                                <div class="flex flex-col items-center justify-center gap-2">
                                                    <p class="text-sm text-muted-foreground">
                                                        No pricing set for this package and currency. Click "Add Price" to get started.
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr
                                            v-for="price in pricingData"
                                            :key="price.id"
                                            class="border-b border-border transition-colors hover:bg-muted/50"
                                        >
                                            <td class="px-4 py-3 align-middle">
                                                <span class="text-foreground font-medium capitalize">{{ price.billingCycle }}</span>
                                            </td>
                                            <td class="px-4 py-3 align-middle">
                                                <span class="text-foreground">{{ selectedCurrency }} {{ price.price.toFixed(2) }}</span>
                                            </td>
                                            <td class="px-4 py-3 align-middle">
                                                <span 
                                                    :class="[
                                                        'px-2 py-1 rounded-full text-xs font-medium',
                                                        price.status === 'active' 
                                                            ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400'
                                                            : 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400'
                                                    ]"
                                                >
                                                    {{ price.status.charAt(0).toUpperCase() + price.status.slice(1) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 align-middle">
                                                <div class="flex items-center justify-end gap-2">
                                                    <Button
                                                        variant="ghost"
                                                        size="sm"
                                                        @click="handleEditPrice(price)"
                                                        class="cursor-pointer"
                                                    >
                                                        <Edit class="size-4" />
                                                    </Button>
                                                    <Button
                                                        variant="ghost"
                                                        size="sm"
                                                        @click="handleDeletePrice(price.id)"
                                                        class="cursor-pointer text-red-600 hover:text-red-700"
                                                    >
                                                        <Trash2 class="size-4" />
                                                    </Button>
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
                    <div class="items-center justify-between">
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

                    <!-- Loading State -->
                    <div v-if="loadingPreview" class="rounded-lg border border-border bg-card p-8 text-center">
                        <p class="text-sm text-muted-foreground">Loading preview...</p>
                    </div>

                    <!-- Preview Section -->
                    <div style="background-color: #e4e4f7; " v-else class="rounded-lg border border-border bg-muted/30 p-8">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-foreground mb-2">Choose Your Plan</h2>
                            <p class="text-muted-foreground">Select the perfect plan for your needs</p>
                        </div>

                        <!-- Empty State -->
                        <div v-if="previewPackages.length === 0" class="text-center py-12">
                            <p class="text-muted-foreground">No active packages available for preview.</p>
                        </div>

                        <!-- Package Cards -->
                        <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Package Card Template -->
                            <div
                                v-for="pkg in previewPackages"
                                :key="pkg.id"
                                class="bg-white rounded-xl p-6 shadow-lg relative"
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
                                    <div v-if="pkg.monthlyPrice !== null || pkg.annualPrice !== null" class="text-3xl font-bold text-foreground mb-1">
                                        <span v-if="pkg.monthlyPrice !== null">{{ displayCurrency }} {{ pkg.monthlyPrice.toFixed(2) }}</span>
                                        <span v-if="pkg.monthlyPrice !== null && pkg.annualPrice !== null"> / </span>
                                        <span v-if="pkg.annualPrice !== null">{{ displayCurrency }} {{ pkg.annualPrice.toFixed(2) }}</span>
                                    </div>
                                    <div v-else class="text-3xl font-bold text-foreground mb-1">Contact Us</div>
                                    <p class="text-xs text-muted-foreground">
                                        <span v-if="pkg.monthlyPrice !== null && pkg.annualPrice !== null">Monthly / Annual</span>
                                        <span v-else-if="pkg.monthlyPrice !== null">Per month</span>
                                        <span v-else-if="pkg.annualPrice !== null">Per year</span>
                                        <span v-else>Custom pricing</span>
                                    </p>
                                </div>

                                <!-- Features List -->
                                <div class="mb-6 space-y-2">
                                    <div
                                        v-for="(feature, index) in pkg.features"
                                        :key="index"
                                        class="flex items-center gap-2 text-sm text-foreground"
                                    >
                                        <Check v-if="feature.included" class="size-4 text-green-600 flex-shrink-0" />
                                        <X v-else class="size-4 text-muted-foreground flex-shrink-0" />
                                        <span>{{ getFeatureDisplay(feature) }}</span>
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
                                                {{ coupon.type === 'once' ? 'Once' : coupon.type === 'recurring' ? 'Recurring' : coupon.type === 'forever' ? 'Forever' : 'Once' }}
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

        <!-- Edit Feature Modal -->
        <Dialog :open="showEditFeatureModal" @update:open="showEditFeatureModal = $event">
            <DialogContent class="sm:max-w-[600px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <DialogTitle>Edit Feature</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Feature Name -->
                    <div class="space-y-2">
                        <Label for="edit-feature-name" class="text-sm font-medium text-foreground">
                            Feature Name <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="edit-feature-name"
                            v-model="editFeature.name"
                            placeholder="Enter feature name"
                            class="w-full"
                        />
                    </div>

                    <!-- Feature Key -->
                    <div class="space-y-2">
                        <Label for="edit-feature-key" class="text-sm font-medium text-foreground">
                            Feature Key <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="edit-feature-key"
                            v-model="editFeature.key"
                            placeholder="Enter feature key (e.g., projects)"
                            class="w-full"
                        />
                    </div>

                    <!-- Data Type -->
                    <div class="space-y-2">
                        <Label for="edit-data-type" class="text-sm font-medium text-foreground">
                            Data Type <span class="text-red-500">*</span>
                        </Label>
                        <div class="relative">
                            <select
                                id="edit-data-type"
                                v-model="editFeature.dataType"
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
                            id="edit-is-metered"
                            :checked="editFeature.isMetered"
                            @click="onMeteredToggle" v-model="editFeature.isMetered" 
                        />
                        <Label
                            for="edit-is-metered"
                            class="text-sm font-medium text-foreground cursor-pointer"
                        >
                            Is Metered?
                        </Label>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <Label for="edit-description" class="text-sm font-medium text-foreground">
                            Description
                        </Label>
                        <textarea
                            id="edit-description"
                            v-model="editFeature.description"
                            placeholder="Enter feature description"
                            rows="4"
                            class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring resize-none"
                        ></textarea>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="edit-status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="edit-status"
                                v-model="editFeature.status"
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
                        @click="handleCloseEditFeatureModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleUpdateFeature"
                        :disabled="!editFeature.name || !editFeature.key || !editFeature.dataType"
                    >
                        Update Feature
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
                                <Checkbox
                                    id="billing-monthly"
                                    v-model:checked="newPackage.monthlyEnabled"
                                />
                                <Label
                                    for="billing-monthly"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Monthly
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <Checkbox
                                    id="billing-annual"
                                    v-model:checked="newPackage.annualEnabled"
                                />
                                <Label
                                    for="billing-annual"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Annual
                                </Label>
                            </div>
                        </div>
                        <p class="text-xs text-muted-foreground">
                            Select at least one billing type. You can enable both monthly and annual billing.
                        </p>
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

                    <!-- Display Sequence -->
                    <div class="space-y-2">
                        <Label for="package-display-sequence" class="text-sm font-medium text-foreground">
                            Display Sequence
                        </Label>
                        <Input
                            id="package-display-sequence"
                            v-model.number="newPackage.displaySequence"
                            type="number"
                            min="0"
                            placeholder="Enter display sequence (0 = first)"
                            class="w-full"
                        />
                        <p class="text-xs text-muted-foreground">
                            Lower numbers appear first on the frontend pricing page. Default is 0.
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
                        :disabled="!newPackage.name || !newPackage.code || (!newPackage.monthlyEnabled && !newPackage.annualEnabled)"
                    >
                        Create Package
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Edit Package Modal -->
        <Dialog :open="showEditPackageModal" @update:open="showEditPackageModal = $event">
            <DialogContent class="sm:max-w-[600px] max-h-[90vh] overflow-y-auto">
                <DialogHeader class="text-left">
                    <DialogTitle>Edit Package</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Package Name -->
                    <div class="space-y-2">
                        <Label for="edit-package-name" class="text-sm font-medium text-foreground">
                            Package Name <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="edit-package-name"
                            v-model="editPackage.name"
                            placeholder="Enter package name"
                            class="w-full"
                        />
                    </div>

                    <!-- Package Code -->
                    <div class="space-y-2">
                        <Label for="edit-package-code" class="text-sm font-medium text-foreground">
                            Package Code
                        </Label>
                        <Input
                            id="edit-package-code"
                            v-model="editPackage.code"
                            placeholder="Enter package code (auto-generated if empty)"
                            class="w-full"
                        />
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <Label for="edit-package-description" class="text-sm font-medium text-foreground">
                            Description
                        </Label>
                        <textarea
                            id="edit-package-description"
                            v-model="editPackage.description"
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
                                <Checkbox
                                    id="edit-billing-monthly"
                                    :checked="editPackage.monthlyEnabled"
                                    v-model="editPackage.monthlyEnabled"
                                />
                                <Label
                                    for="edit-billing-monthly"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Monthly
                                </Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <Checkbox
                                    id="edit-billing-annual"
                                    :checked="editPackage.annualEnabled"
                                    v-model="editPackage.annualEnabled"
                                />
                                <Label
                                    for="edit-billing-annual"
                                    class="text-sm font-medium text-foreground cursor-pointer"
                                >
                                    Annual
                                </Label>
                            </div>
                        </div>
                        <p class="text-xs text-muted-foreground">
                            Select at least one billing type. You can enable both monthly and annual billing.
                        </p>
                    </div>

                    <!-- Enable Trial Period -->
                    <div class="flex items-center space-x-2">
                        <Checkbox
                            id="edit-enable-trial"
                            :checked="editPackage.enableTrial"
                            v-model="editPackage.enableTrial"
                        />
                        <Label
                            for="edit-enable-trial"
                            class="text-sm font-medium text-foreground cursor-pointer"
                        >
                            Enable Trial Period
                        </Label>
                    </div>

                    <!-- Credit Card Required -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <Checkbox
                                id="edit-credit-card-required"
                                :checked="editPackage.creditCardRequired"
                                v-model="editPackage.creditCardRequired"
                            />
                            <Label
                                for="edit-credit-card-required"
                                class="text-sm font-medium text-foreground cursor-pointer"
                            >
                                Credit Card Required
                            </Label>
                        </div>
                        <p class="text-xs text-muted-foreground ml-6">
                            When enabled, customers must provide payment information during signup (even for free trials)
                        </p>
                    </div>

                    <!-- Display Sequence -->
                    <div class="space-y-2">
                        <Label for="edit-package-display-sequence" class="text-sm font-medium text-foreground">
                            Display Sequence
                        </Label>
                        <Input
                            id="edit-package-display-sequence"
                            v-model.number="editPackage.displaySequence"
                            type="number"
                            min="0"
                            placeholder="Enter display sequence (0 = first)"
                            class="w-full"
                        />
                        <p class="text-xs text-muted-foreground">
                            Lower numbers appear first on the frontend pricing page. Default is 0.
                        </p>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="edit-package-status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="edit-package-status"
                                v-model="editPackage.status"
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
                        @click="handleCloseEditPackageModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleUpdatePackage"
                        :disabled="!editPackage.name || (!editPackage.monthlyEnabled && !editPackage.annualEnabled)"
                    >
                        Update Package
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
                            :model-value="currentPackageName || selectedPackageNameForPricing"
                            readonly
                            class="w-full bg-muted"
                            placeholder="Select a package above"
                        />
                    </div>

                    <!-- Currency (Read-only) -->
                    <div class="space-y-2">
                        <Label for="price-currency" class="text-sm font-medium text-foreground">
                            Currency
                        </Label>
                        <Input
                            id="price-currency"
                            :model-value="selectedCurrency"
                            readonly
                            class="w-full bg-muted"
                            placeholder="Select a currency above"
                        />
                    </div>

                    <!-- Billing Cycle -->
                    <div class="space-y-2">
                        <Label for="billing-cycle" class="text-sm font-medium text-foreground">
                            Billing Cycle <span class="text-red-500">*</span>
                        </Label>
                        <div v-if="availableBillingCycles.length > 0" class="relative">
                            <select
                                id="billing-cycle"
                                v-model="newPrice.billingCycle"
                                class="w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring appearance-none pr-8"
                            >
                                <option v-for="cycle in availableBillingCycles" :key="cycle" :value="cycle">
                                    {{ cycle.charAt(0).toUpperCase() + cycle.slice(1) }}
                                </option>
                            </select>
                            <ChevronDown class="absolute right-2 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                        <div v-else class="rounded-md border border-input bg-muted px-3 py-2 text-sm text-muted-foreground">
                            All billing cycles already have prices for this currency.
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
                        :disabled="!newPrice.billingCycle || newPrice.price === null || newPrice.price === undefined || availableBillingCycles.length === 0"
                    >
                        Add Price
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Edit Price Modal -->
        <Dialog :open="showEditPriceModal" @update:open="showEditPriceModal = $event">
            <DialogContent class="sm:max-w-[500px]">
                <DialogHeader class="text-left">
                    <DialogTitle>Edit Price</DialogTitle>
                </DialogHeader>

                <div class="space-y-4 py-4">
                    <!-- Package (Read-only) -->
                    <div class="space-y-2">
                        <Label for="edit-price-package" class="text-sm font-medium text-foreground">
                            Package
                        </Label>
                        <Input
                            id="edit-price-package"
                            :model-value="currentPackageName || selectedPackageNameForPricing"
                            readonly
                            class="w-full bg-muted"
                        />
                    </div>

                    <!-- Currency (Read-only) -->
                    <div class="space-y-2">
                        <Label for="edit-price-currency" class="text-sm font-medium text-foreground">
                            Currency
                        </Label>
                        <Input
                            id="edit-price-currency"
                            :model-value="selectedCurrency"
                            readonly
                            class="w-full bg-muted"
                        />
                    </div>

                    <!-- Billing Cycle (Read-only) -->
                    <div class="space-y-2">
                        <Label for="edit-price-billing-cycle" class="text-sm font-medium text-foreground">
                            Billing Cycle
                        </Label>
                        <Input
                            id="edit-price-billing-cycle"
                            :model-value="editPrice.billingCycle ? editPrice.billingCycle.charAt(0).toUpperCase() + editPrice.billingCycle.slice(1) : ''"
                            readonly
                            class="w-full bg-muted"
                        />
                    </div>

                    <!-- Price -->
                    <div class="space-y-2">
                        <Label for="edit-price-amount" class="text-sm font-medium text-foreground">
                            Price ({{ selectedCurrency }}) <span class="text-red-500">*</span>
                        </Label>
                        <Input
                            id="edit-price-amount"
                            v-model.number="editPrice.price"
                            type="number"
                            placeholder="0"
                            min="0"
                            step="0.01"
                            class="w-full"
                        />
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <Label for="edit-price-status" class="text-sm font-medium text-foreground">
                            Status
                        </Label>
                        <div class="relative">
                            <select
                                id="edit-price-status"
                                v-model="editPrice.status"
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
                        @click="handleCloseEditPriceModal"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                    <Button
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="handleUpdatePrice"
                        :disabled="editPrice.price === null || editPrice.price === undefined"
                    >
                        Update Price
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
                                Valid From <span class="text-red-500">*</span>
                            </Label>
                            <Input
                                id="valid-from"
                                v-model="newCoupon.validFrom"
                                type="date"
                                class="w-full"
                                :min="new Date().toISOString().split('T')[0]"
                            />
                        </div>
                        <div class="space-y-2">
                            <Label for="valid-until" class="text-sm font-medium text-foreground">
                                Valid Until <span class="text-red-500">*</span>
                            </Label>
                            <Input
                                id="valid-until"
                                v-model="newCoupon.validUntil"
                                type="date"
                                class="w-full"
                                :min="newCoupon.validFrom || new Date().toISOString().split('T')[0]"
                            />
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
                                <div
                                    v-for="pkg in packages"
                                    :key="pkg.id"
                                    class="flex items-center space-x-2"
                                >
                                    <input
                                        type="checkbox"
                                        :id="`package-${pkg.id}`"
                                        :checked="newCoupon.selectedPackages.includes(String(pkg.id))"
                                        @change="handleCheckboxChange($event, pkg.id)"
                                        class="size-4 rounded border-border text-blue-600 focus:ring-blue-500 cursor-pointer"
                                    />
                                    <Label
                                        :for="`package-${pkg.id}`"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                        @click.prevent="handleLabelClick(pkg.id, $event)"
                                    >
                                        {{ pkg.name }}
                                    </Label>
                                </div>
                                <p v-if="packages.length === 0" class="text-sm text-muted-foreground">
                                    No packages available
                                </p>
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
                        :disabled="!newCoupon.code || !newCoupon.discountType || !newCoupon.discountValue || !newCoupon.durationType || !newCoupon.validFrom || !newCoupon.validUntil || (newCoupon.applicablePackages === 'specific' && newCoupon.selectedPackages.length === 0)"
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
                                <div
                                    v-for="pkg in packages"
                                    :key="pkg.id"
                                    class="flex items-center space-x-2"
                                >
                                    <input
                                        type="checkbox"
                                        :id="`edit-package-${pkg.id}`"
                                        :checked="editCoupon.selectedPackages.includes(String(pkg.id))"
                                        @change="handleEditCheckboxChange($event, pkg.id)"
                                        class="size-4 rounded border-border text-blue-600 focus:ring-blue-500 cursor-pointer"
                                    />
                                    <Label
                                        :for="`edit-package-${pkg.id}`"
                                        class="text-sm font-medium text-foreground cursor-pointer"
                                        @click.stop="handleEditLabelClick(pkg.id, $event)"
                                    >
                                        {{ pkg.name }}
                                    </Label>
                                </div>
                                <p v-if="packages.length === 0" class="text-sm text-muted-foreground">
                                    No packages available
                                </p>
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
                        :disabled="!editCoupon.code || !editCoupon.discountType || !editCoupon.discountValue || !editCoupon.durationType || !editCoupon.validFrom || !editCoupon.validUntil || (editCoupon.applicablePackages === 'specific' && editCoupon.selectedPackages.length === 0)"
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

        <!-- Delete Price Confirmation Modal -->
        <Dialog :open="showDeletePriceModal" @update:open="(value) => { if (!value) cancelDeletePrice(); }">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle class="text-lg font-semibold text-foreground">
                        Are you sure?
                    </DialogTitle>
                    <DialogDescription class="text-sm text-muted-foreground pt-2">
                        Are you sure you want to delete this pricing? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter class="gap-3">
                    <DialogClose as-child>
                        <Button
                            variant="secondary"
                            @click="cancelDeletePrice"
                            class="cursor-pointer"
                        >
                            Cancel
                        </Button>
                    </DialogClose>
                    <Button
                        @click="confirmDeletePrice"
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
