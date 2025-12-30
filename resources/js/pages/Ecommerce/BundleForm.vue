<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, bundles } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
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

interface BundleProduct {
    product_id: string;
    quantity: number;
}

interface Props {
    id?: string;
    bundle?: {
        id: string;
        name: string;
        description: string;
        discount_percentage: number;
        is_active?: boolean;
        products: BundleProduct[];
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

// Convert bundle products array to selectedProducts array with product_id
const selectedProducts = ref<BundleProduct[]>(
    props.bundle?.products ? [...props.bundle.products] : []
);

const formData = ref({
    name: props.bundle?.name || '',
    description: props.bundle?.description || '',
    discount_percentage: props.bundle?.discount_percentage || 0,
    is_active: props.bundle?.is_active ?? true,
});

const originalPrice = computed(() => {
    return selectedProducts.value.reduce((total, bundleProduct) => {
        const product = props.products.find(p => p.id === bundleProduct.product_id);
        return total + (product?.price || 0) * bundleProduct.quantity;
    }, 0);
});

const discountedPrice = computed(() => {
    if (originalPrice.value === 0) return 0;
    return originalPrice.value * (1 - formData.value.discount_percentage / 100);
});

const savings = computed(() => {
    return originalPrice.value - discountedPrice.value;
});

const availableProducts = computed(() => {
    const selectedProductIds = selectedProducts.value.map(p => p.product_id);
    return props.products.filter(p => !selectedProductIds.includes(p.id));
});

const addProduct = (productId: string) => {
    if (!selectedProducts.value.find(p => p.product_id === productId)) {
        selectedProducts.value.push({
            product_id: productId,
            quantity: 1,
        });
    }
};

const removeProduct = (productId: string) => {
    const index = selectedProducts.value.findIndex(p => p.product_id === productId);
    if (index > -1) {
        selectedProducts.value.splice(index, 1);
    }
};

const updateQuantity = (productId: string, quantity: number) => {
    const item = selectedProducts.value.find(p => p.product_id === productId);
    if (item) {
        item.quantity = Math.max(1, quantity);
    }
};

const getProductById = (productId: string): Product | undefined => {
    return props.products.find(p => p.id === productId);
};

const saveBundle = () => {
    if (selectedProducts.value.length === 0) {
        alert('Please add at least one product to the bundle.');
        return;
    }

    const bundleData = {
        name: formData.value.name,
        description: formData.value.description,
        discount_percentage: formData.value.discount_percentage,
        is_active: formData.value.is_active,
        products: selectedProducts.value,
    };

    if (isEditMode.value) {
        router.put(`/ecommerce/bundles/${props.id}`, bundleData);
    } else {
        router.post('/ecommerce/bundles', bundleData);
    }
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
                                        v-model.number="formData.discount_percentage"
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
                            <div v-if="selectedProducts.length === 0" class="text-center py-8 text-sm text-muted-foreground">
                                No products selected. Add products from the right panel.
                            </div>
                            <div v-else class="space-y-2 max-h-96 overflow-y-auto">
                                <div
                                    v-for="bundleProduct in selectedProducts"
                                    :key="bundleProduct.product_id"
                                    class="flex items-center justify-between p-3 rounded-md border border-border bg-muted/50"
                                >
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-foreground">{{ getProductById(bundleProduct.product_id)?.name }}</p>
                                        <p class="text-xs text-muted-foreground font-mono">{{ getProductById(bundleProduct.product_id)?.sku }}</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <Label for="quantity" class="text-xs">Quantity:</Label>
                                            <Input
                                                :id="`quantity-${bundleProduct.product_id}`"
                                                v-model.number="bundleProduct.quantity"
                                                type="number"
                                                min="1"
                                                class="h-7 w-20 text-xs"
                                                @update:model-value="updateQuantity(bundleProduct.product_id, bundleProduct.quantity)"
                                            />
                                            <span class="text-xs text-muted-foreground">
                                                × ${{ getProductById(bundleProduct.product_id)?.price.toFixed(2) }} = 
                                                ${{ ((getProductById(bundleProduct.product_id)?.price || 0) * bundleProduct.quantity).toFixed(2) }}
                                            </span>
                                        </div>
                                    </div>
                                    <Button
                                        variant="ghost"
                                        size="sm"
                                        @click="removeProduct(bundleProduct.product_id)"
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
                                    @click="addProduct(product.id)"
                                >
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-foreground">{{ product.name }}</p>
                                        <p class="text-xs text-muted-foreground font-mono">{{ product.sku }}</p>
                                        <p class="text-xs text-muted-foreground mt-1">${{ product.price.toFixed(2) }}</p>
                                    </div>
                                    <Button variant="ghost" size="sm" @click.stop="addProduct(product.id)">
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
                                    <span class="text-green-600 dark:text-green-400 font-medium">{{ formData.discount_percentage }}%</span>
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

