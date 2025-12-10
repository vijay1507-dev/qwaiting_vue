<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, bundles, cart, orders } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, ShoppingCart, Eye, Package, Plus, Edit } from 'lucide-vue-next';

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
}

interface Props {
    products: Product[];
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
        href: '#',
    },
];

const searchQuery = ref('');
const selectedCategory = ref('');

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(amount);
};

const categories = computed(() => {
    const cats = new Set<string>();
    props.products.forEach(product => {
        cats.add(product.category);
    });
    return Array.from(cats);
});

const filteredProducts = computed(() => {
    let result = props.products;

    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (product) =>
                product.name.toLowerCase().includes(query) ||
                product.sku.toLowerCase().includes(query) ||
                product.description.toLowerCase().includes(query)
        );
    }

    if (selectedCategory.value) {
        result = result.filter(product => product.category === selectedCategory.value);
    }

    return result;
});

const getStockColor = (stock: number): string => {
    if (stock < 10) {
        return 'text-red-600 dark:text-red-400';
    }
    if (stock < 30) {
        return 'text-yellow-600 dark:text-yellow-400';
    }
    return 'text-green-600 dark:text-green-400';
};
</script>

<template>
    <Head title="Product Catalog" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Product Catalog</h1>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <Link
                        :href="ecommerceIndex().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Overview
                    </Link>
                    <Link
                        :href="'/ecommerce/products'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
                    >
                        Product Catalog
                    </Link>
                    <Link
                        :href="bundles().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Bundle Offers
                    </Link>
                    <Link
                        :href="cart().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Shopping Cart
                    </Link>
                    <Link
                        :href="orders().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Orders
                    </Link>
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
                                placeholder="Search products..."
                                class="pl-8 h-8 text-sm"
                            />
                        </div>
                        <select
                            v-model="selectedCategory"
                            class="h-8 rounded-md border border-input bg-background px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-ring"
                        >
                            <option value="">All Categories</option>
                            <option v-for="category in categories" :key="category" :value="category">
                                {{ category }}
                            </option>
                        </select>
                    </div>
                    <Link :href="'/ecommerce/products/create'">
                        <Button class="bg-blue-600 hover:bg-blue-700 text-white h-8 px-3 text-xs">
                            <Plus class="mr-2 size-3.5" />
                            Create Product
                        </Button>
                    </Link>
                </div>

                <!-- Products Table -->
                <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                    <table class="w-full text-sm">
                        <thead class="sticky top-0 z-10 bg-muted/50">
                            <tr>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Product
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    SKU
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Description
                                </th>
                                <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                    Price
                                </th>
                                <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                    Stock
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="filteredProducts.length === 0">
                                <td colspan="6" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <p class="text-sm text-muted-foreground">No products found</p>
                                        <p class="text-xs text-muted-foreground">
                                            {{ searchQuery ? 'Try adjusting your search criteria' : 'No products available' }}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr
                                v-for="product in filteredProducts"
                                :key="product.id"
                                class="border-b border-border transition-colors hover:bg-muted/50"
                            >
                                <td class="px-4 py-3 align-middle">
                                    <div class="flex items-center gap-3">
                                        <div class="flex size-10 items-center justify-center rounded-md bg-muted">
                                            <Package class="size-5 text-muted-foreground" />
                                        </div>
                                        <div>
                                            <span class="text-foreground font-medium">{{ product.name }}</span>
                                            <p class="text-xs text-muted-foreground">{{ product.category }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span class="text-sm text-muted-foreground font-mono">{{ product.sku }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span class="text-sm text-muted-foreground">{{ product.description }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="text-foreground font-medium">{{ formatCurrency(product.price) }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span :class="['text-sm font-medium', getStockColor(product.stock)]">
                                        {{ product.stock }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <div class="flex items-center gap-2">
                                        <Link :href="`/ecommerce/products/${product.id}`">
                                            <button
                                                class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                                title="View"
                                            >
                                                <Eye class="size-4 text-muted-foreground" />
                                            </button>
                                        </Link>
                                        <Link :href="`/ecommerce/products/${product.id}/edit`">
                                            <button
                                                class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                                title="Edit"
                                            >
                                                <Edit class="size-4 text-muted-foreground" />
                                            </button>
                                        </Link>
                                        <button
                                            class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                            title="Add to Cart"
                                        >
                                            <ShoppingCart class="size-4 text-muted-foreground" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

