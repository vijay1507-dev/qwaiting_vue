<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import {
    bundles,
    cart,
    index as ecommerceIndex,
    orders,
} from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import {
    Edit,
    Eye,
    Loader2,
    Package,
    Plus,
    Search,
    ShoppingCart,
} from 'lucide-vue-next';
import { computed, ref } from 'vue';

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
    props.products.forEach((product) => {
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
                product.description.toLowerCase().includes(query),
        );
    }

    if (selectedCategory.value) {
        result = result.filter(
            (product) => product.category === selectedCategory.value,
        );
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

const { success, error: showError } = useToast();
const loadingProductId = ref<string | null>(null);

const addToCart = async (productId: string) => {
    if (loadingProductId.value === productId) return;

    loadingProductId.value = productId;

    try {
        const response = await fetch('/api/ecommerce/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':
                    document
                        .querySelector('meta[name="csrf-token"]')
                        ?.getAttribute('content') || '',
                Accept: 'application/json',
            },
            credentials: 'same-origin',
            body: JSON.stringify({
                product_id: productId,
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
        showError(
            err instanceof Error
                ? err.message
                : 'Failed to add product to cart. Please try again.',
        );
    } finally {
        loadingProductId.value = null;
    }
};
</script>

<template>
    <Head title="Product Catalog" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        Product Catalog
                    </h1>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'ecommerce.overview.read',
                            )
                        "
                        :href="ecommerceIndex().url"
                        class="cursor-pointer border-b-2 border-transparent px-4 py-2 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
                    >
                        Overview
                    </Link>
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'ecommerce.product_catalog.read',
                            )
                        "
                        :href="'/ecommerce/products'"
                        :class="[
                            'cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition-colors',
                            'border-blue-600 text-foreground',
                        ]"
                    >
                        Product Catalog
                    </Link>
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'ecommerce.bundle_offers.read',
                            )
                        "
                        :href="bundles().url"
                        class="cursor-pointer border-b-2 border-transparent px-4 py-2 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
                    >
                        Bundle Offers
                    </Link>
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'ecommerce.shopping_cart.read',
                            )
                        "
                        :href="cart().url"
                        class="cursor-pointer border-b-2 border-transparent px-4 py-2 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
                    >
                        Shopping Cart
                    </Link>
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'ecommerce.orders.read',
                            )
                        "
                        :href="orders().url"
                        class="cursor-pointer border-b-2 border-transparent px-4 py-2 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
                    >
                        Orders
                    </Link>
                </div>

                <!-- Action Bar -->
                <div class="flex items-center justify-between gap-2">
                    <div class="flex flex-1 items-center gap-2">
                        <div class="relative max-w-xs flex-1">
                            <Search
                                class="absolute top-1/2 left-2.5 size-3.5 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search products..."
                                class="h-8 pl-8 text-sm"
                            />
                        </div>
                        <select
                            v-model="selectedCategory"
                            class="h-8 rounded-md border border-input bg-background px-2 py-1 text-xs focus:ring-2 focus:ring-ring focus:outline-none"
                        >
                            <option value="">All Categories</option>
                            <option
                                v-for="category in categories"
                                :key="category"
                                :value="category"
                            >
                                {{ category }}
                            </option>
                        </select>
                    </div>
                    <Link :href="'/ecommerce/products/create'">
                        <Button
                            class="h-8 bg-blue-600 px-3 text-xs text-white hover:bg-blue-700"
                        >
                            <Plus class="mr-2 size-3.5" />
                            Create Product
                        </Button>
                    </Link>
                </div>

                <!-- Products Table -->
                <div
                    class="flex-1 overflow-auto rounded-md border border-border bg-card"
                >
                    <table class="w-full text-sm">
                        <thead class="sticky top-0 z-10 bg-muted/50">
                            <tr>
                                <th
                                    class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                >
                                    Product
                                </th>
                                <th
                                    class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                >
                                    SKU
                                </th>
                                <th
                                    class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                >
                                    Description
                                </th>
                                <th
                                    class="h-10 px-4 text-right align-middle font-medium text-muted-foreground"
                                >
                                    Price
                                </th>
                                <th
                                    class="h-10 px-4 text-right align-middle font-medium text-muted-foreground"
                                >
                                    Stock
                                </th>
                                <th
                                    class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="filteredProducts.length === 0">
                                <td colspan="6" class="px-4 py-12 text-center">
                                    <div
                                        class="flex flex-col items-center justify-center gap-2"
                                    >
                                        <p
                                            class="text-sm text-muted-foreground"
                                        >
                                            No products found
                                        </p>
                                        <p
                                            class="text-xs text-muted-foreground"
                                        >
                                            {{
                                                searchQuery
                                                    ? 'Try adjusting your search criteria'
                                                    : 'No products available'
                                            }}
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
                                        <div
                                            class="flex size-10 shrink-0 items-center justify-center overflow-hidden rounded-md bg-muted"
                                        >
                                            <img
                                                v-if="product.image"
                                                :src="
                                                    product.image.startsWith(
                                                        'http',
                                                    ) ||
                                                    product.image.startsWith(
                                                        '/',
                                                    )
                                                        ? product.image
                                                        : `/storage/${product.image}`
                                                "
                                                :alt="product.name"
                                                class="h-full w-full object-cover"
                                            />
                                            <Package
                                                v-else
                                                class="size-5 text-muted-foreground"
                                            />
                                        </div>
                                        <div>
                                            <span
                                                class="font-medium text-foreground"
                                                >{{ product.name }}</span
                                            >
                                            <p
                                                class="text-xs text-muted-foreground"
                                            >
                                                {{ product.category }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span
                                        class="font-mono text-sm text-muted-foreground"
                                        >{{ product.sku }}</span
                                    >
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span
                                        class="text-sm text-muted-foreground"
                                        >{{ product.description }}</span
                                    >
                                </td>
                                <td class="px-4 py-3 text-right align-middle">
                                    <span class="font-medium text-foreground">{{
                                        formatCurrency(product.price)
                                    }}</span>
                                </td>
                                <td class="px-4 py-3 text-right align-middle">
                                    <span
                                        :class="[
                                            'text-sm font-medium',
                                            getStockColor(product.stock),
                                        ]"
                                    >
                                        {{ product.stock }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <div class="flex items-center gap-2">
                                        <Link
                                            :href="`/ecommerce/products/${product.id}`"
                                        >
                                            <button
                                                class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                                title="View"
                                            >
                                                <Eye
                                                    class="size-4 text-muted-foreground"
                                                />
                                            </button>
                                        </Link>
                                        <Link
                                            :href="`/ecommerce/products/${product.id}/edit`"
                                        >
                                            <button
                                                class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                                title="Edit"
                                            >
                                                <Edit
                                                    class="size-4 text-muted-foreground"
                                                />
                                            </button>
                                        </Link>
                                        <button
                                            class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                            title="Add to Cart"
                                            :disabled="
                                                loadingProductId ===
                                                    product.id ||
                                                product.stock === 0
                                            "
                                            @click="addToCart(product.id)"
                                        >
                                            <Loader2
                                                v-if="
                                                    loadingProductId ===
                                                    product.id
                                                "
                                                class="size-4 animate-spin text-muted-foreground"
                                            />
                                            <ShoppingCart
                                                v-else
                                                class="size-4 text-muted-foreground"
                                            />
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
