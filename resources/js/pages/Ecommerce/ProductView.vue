<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, products } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { ArrowLeft, ShoppingCart, Package, CheckCircle, Loader2 } from 'lucide-vue-next';
import { useToast } from '@/composables/useToast';

interface Product {
    id: string;
    name: string;
    sku: string;
    description: string;
    price: number;
    stock: number;
    image: string;
    category: string;
    specifications: Record<string, string>;
    features: string[];
}

interface Props {
    product: Product;
}

const props = defineProps<Props>();

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
        title: 'Product Catalog',
        href: products().url,
    },
    {
        title: props.product.name,
        href: '#',
    },
];

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(amount);
};

const getImageUrl = (imagePath: string | null | undefined): string | null => {
    if (!imagePath) return null;
    
    // If it's already a full URL, return as is
    if (imagePath.startsWith('http://') || imagePath.startsWith('https://')) {
        return imagePath;
    }
    
    // If it starts with /, return as is
    if (imagePath.startsWith('/')) {
        return imagePath;
    }
    
    // Otherwise, prepend /storage/
    return `/storage/${imagePath}`;
};

const { success, error: showError } = useToast();
const isLoading = ref(false);

const imageUrl = computed(() => getImageUrl(props.product.image));

const addToCart = async () => {
    if (isLoading.value || props.product.stock === 0) return;
    
    isLoading.value = true;
    
    try {
        const response = await fetch('/api/ecommerce/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
            body: JSON.stringify({
                product_id: props.product.id,
                quantity: 1,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            success('Product added to cart successfully!');
            router.reload({ only: [] });
        } else {
            throw new Error(data.message || 'Failed to add product to cart');
        }
    } catch (err) {
        console.error('Error adding product to cart:', err);
        showError(err instanceof Error ? err.message : 'Failed to add product to cart. Please try again.');
    } finally {
        isLoading.value = false;
    }
};
</script>

<template>
    <Head :title="product.name" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-3">
                    <Link :href="products().url">
                        <Button variant="ghost" size="sm" class="h-8">
                            <ArrowLeft class="size-4 mr-2" />
                            Back
                        </Button>
                    </Link>
                    <h1 class="text-base font-semibold text-foreground">{{ product.name }}</h1>
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Product Image -->
                    <div class="rounded-lg border border-border bg-card p-6">
                        <div class="flex items-center justify-center h-96 bg-muted rounded-lg overflow-hidden">
                            <img
                                v-if="imageUrl"
                                :src="imageUrl"
                                :alt="product.name"
                                class="w-full h-full object-cover"
                            />
                            <div v-else class="flex flex-col items-center justify-center">
                                <Package class="size-32 text-muted-foreground" />
                                <p class="text-sm text-muted-foreground mt-4">No image available</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="flex flex-col gap-4">
                        <div>
                            <p class="text-sm text-muted-foreground font-mono mb-1">{{ product.sku }}</p>
                            <h2 class="text-2xl font-bold text-foreground mb-2">{{ product.name }}</h2>
                            <p class="text-base text-muted-foreground">{{ product.description }}</p>
                        </div>

                        <div class="flex items-baseline gap-2">
                            <span class="text-3xl font-bold text-foreground">{{ formatCurrency(product.price) }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <CheckCircle
                                v-if="product.stock > 0"
                                class="size-5 text-green-600 dark:text-green-400"
                            />
                            <span :class="product.stock > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'">
                                {{ product.stock > 0 ? `In Stock (${product.stock} available)` : 'Out of Stock' }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2 pt-4">
                            <Button 
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white" 
                                :disabled="product.stock === 0 || isLoading"
                                @click="addToCart"
                            >
                                <Loader2 v-if="isLoading" class="size-4 mr-2 animate-spin" />
                                <ShoppingCart v-else class="size-4 mr-2" />
                                Add to Cart
                            </Button>
                        </div>

                        <!-- Specifications -->
                        <div class="border-t border-border pt-4">
                            <h3 class="text-sm font-semibold text-foreground mb-3">Specifications</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div v-for="(value, key) in product.specifications" :key="key" class="flex flex-col">
                                    <span class="text-xs text-muted-foreground">{{ key }}</span>
                                    <span class="text-sm text-foreground font-medium">{{ value }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Features -->
                        <div class="border-t border-border pt-4">
                            <h3 class="text-sm font-semibold text-foreground mb-3">Features</h3>
                            <ul class="space-y-2">
                                <li v-for="feature in product.features" :key="feature" class="flex items-start gap-2">
                                    <CheckCircle class="size-4 text-green-600 dark:text-green-400 mt-0.5 shrink-0" />
                                    <span class="text-sm text-foreground">{{ feature }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

