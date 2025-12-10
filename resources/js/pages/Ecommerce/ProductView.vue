<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, products } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { ArrowLeft, ShoppingCart, Package, CheckCircle } from 'lucide-vue-next';

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
                        <div class="flex items-center justify-center h-96 bg-muted rounded-lg">
                            <Package class="size-32 text-muted-foreground" />
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
                            <Button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white" :disabled="product.stock === 0">
                                <ShoppingCart class="size-4 mr-2" />
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

