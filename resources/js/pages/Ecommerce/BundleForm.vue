<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, bundles } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ArrowLeft, Save, Plus, X, Trash2 } from 'lucide-vue-next';

interface Product {
    id: string;
    sku: string;
    name: string;
    price: number;
}

interface Props {
    id?: string;
    bundle?: {
        id: string;
        name: string;
        products: string[];
        discount: number;
        description: string;
    };
    products: Product[];
}

const props = withDefaults(defineProps<Props>(), {
    id: undefined,
    bundle: undefined,
    products: () => [],
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'E-Commerce',
        href: ecommerceIndex().url,
    },
    {
        title: 'Bundle Offers',
        href: bundles().url,
    },
    {
        title: props.id ? 'Edit Bundle' : 'Create Bundle',
        href: '#',
    },
];

const isEditMode = computed(() => !!props.id);

const formData = ref({
    name: props.bundle?.name || '',
    description: props.bundle?.description || '',
    discount: props.bundle?.discount || 0,
    selectedProducts: props.bundle?.products ? [...props.bundle.products] : [],
});

const originalPrice = computed(() => {
    return formData.value.selectedProducts.reduce((total, sku) => {
        const product = props.products.find(p => p.sku === sku);
        return total + (product?.price || 0);
    }, 0);
});

const discountedPrice = computed(() => {
    if (originalPrice.value === 0) return 0;
    return originalPrice.value * (1 - formData.value.discount / 100);
});

const savings = computed(() => {
    return originalPrice.value - discountedPrice.value;
});

const availableProducts = computed(() => {
    return props.products.filter(p => !formData.value.selectedProducts.includes(p.sku));
});

const addProduct = (sku: string) => {
    if (!formData.value.selectedProducts.includes(sku)) {
        formData.value.selectedProducts.push(sku);
    }
};

const removeProduct = (sku: string) => {
    const index = formData.value.selectedProducts.indexOf(sku);
    if (index > -1) {
        formData.value.selectedProducts.splice(index, 1);
    }
};

const getProductBySku = (sku: string): Product | undefined => {
    return props.products.find(p => p.sku === sku);
};

const saveBundle = () => {
    const bundleData = {
        ...formData.value,
        originalPrice: originalPrice.value,
        price: discountedPrice.value,
        savings: savings.value,
    };

    console.log('Saving bundle:', bundleData);
    // TODO: Implement actual save logic
};
</script>

<template>
    <Head :title="isEditMode ? 'Edit Bundle' : 'Create Bundle'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <Link :href="bundles().url">
                            <Button variant="ghost" size="sm" class="h-8">
                                <ArrowLeft class="size-4 mr-2" />
                                Back
                            </Button>
                        </Link>
                        <h1 class="text-base font-semibold text-foreground">
                            {{ isEditMode ? 'Edit Bundle' : 'Create Bundle' }}
                        </h1>
                    </div>
                    <Button class="bg-blue-600 hover:bg-blue-700 text-white h-8" @click="saveBundle">
                        <Save class="size-4 mr-2" />
                        Save Bundle
                    </Button>
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Left Column - Form -->
                    <div class="lg:col-span-2 flex flex-col gap-4">
                        <!-- Basic Information -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Basic Information</h2>
                            <div class="space-y-4">
                                <div>
                                    <Label for="name">Bundle Name</Label>
                                    <Input
                                        id="name"
                                        v-model="formData.name"
                                        placeholder="Enter bundle name"
                                        class="mt-1"
                                    />
                                </div>
                                <div>
                                    <Label for="description">Description</Label>
                                    <textarea
                                        id="description"
                                        v-model="formData.description"
                                        placeholder="Enter bundle description"
                                        rows="3"
                                        class="mt-1 flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                    ></textarea>
                                </div>
                                <div>
                                    <Label for="discount">Discount (%)</Label>
                                    <Input
                                        id="discount"
                                        v-model.number="formData.discount"
                                        type="number"
                                        min="0"
                                        max="100"
                                        placeholder="0"
                                        class="mt-1"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Selected Products -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Selected Products</h2>
                            <div v-if="formData.selectedProducts.length === 0" class="text-center py-8 text-sm text-muted-foreground">
                                No products selected. Add products from the right panel.
                            </div>
                            <div v-else class="space-y-2">
                                <div
                                    v-for="sku in formData.selectedProducts"
                                    :key="sku"
                                    class="flex items-center justify-between p-3 rounded-md border border-border bg-muted/50"
                                >
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-foreground">{{ getProductBySku(sku)?.name }}</p>
                                        <p class="text-xs text-muted-foreground font-mono">{{ sku }}</p>
                                        <p class="text-xs text-muted-foreground mt-1">${{ getProductBySku(sku)?.price.toFixed(2) }}</p>
                                    </div>
                                    <Button
                                        variant="ghost"
                                        size="sm"
                                        @click="removeProduct(sku)"
                                    >
                                        <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                    </Button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Available Products & Pricing -->
                    <div class="flex flex-col gap-4">
                        <!-- Available Products -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Available Products</h2>
                            <div class="space-y-2 max-h-96 overflow-y-auto">
                                <div
                                    v-for="product in availableProducts"
                                    :key="product.id"
                                    class="flex items-center justify-between p-2 rounded-md border border-border hover:bg-muted/50 cursor-pointer"
                                    @click="addProduct(product.sku)"
                                >
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-foreground">{{ product.name }}</p>
                                        <p class="text-xs text-muted-foreground font-mono">{{ product.sku }}</p>
                                    </div>
                                    <Button variant="ghost" size="sm">
                                        <Plus class="size-4" />
                                    </Button>
                                </div>
                                <div v-if="availableProducts.length === 0" class="text-center py-4 text-xs text-muted-foreground">
                                    All products added
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Summary -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Pricing Summary</h2>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Original Price</span>
                                    <span class="text-foreground font-medium">${{ originalPrice.toFixed(2) }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Discount</span>
                                    <span class="text-green-600 dark:text-green-400 font-medium">{{ formData.discount }}%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Savings</span>
                                    <span class="text-green-600 dark:text-green-400 font-medium">${{ savings.toFixed(2) }}</span>
                                </div>
                                <div class="flex items-center justify-between border-t border-border pt-2">
                                    <span class="text-base font-semibold text-foreground">Final Price</span>
                                    <span class="text-lg font-bold text-foreground">${{ discountedPrice.toFixed(2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

