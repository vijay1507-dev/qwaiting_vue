<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import {
    cart,
    index as ecommerceIndex,
    orders,
    products,
} from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import { Edit, Loader2, Plus, ShoppingCart, Tag } from 'lucide-vue-next';
import { ref } from 'vue';

interface Bundle {
    id: string;
    name: string;
    products: string[];
    productNames: string[];
    discount: number;
    originalPrice: number;
    price: number;
    savings: number;
    description: string;
}

interface Props {
    bundles: Bundle[];
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
        title: 'Bundle Offers',
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

const { success, error: showError } = useToast();
const loadingBundleId = ref<string | null>(null);

const addToCart = async (bundleId: string) => {
    if (loadingBundleId.value === bundleId) return;

    loadingBundleId.value = bundleId;

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
                bundle_id: bundleId,
                quantity: 1,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            success('Bundle added to cart successfully!');
            router.reload({ only: [] });
        } else {
            throw new Error(data.message || 'Failed to add bundle to cart');
        }
    } catch (err) {
        console.error('Error adding bundle to cart:', err);
        showError(
            err instanceof Error
                ? err.message
                : 'Failed to add bundle to cart. Please try again.',
        );
    } finally {
        loadingBundleId.value = null;
    }
};
</script>

<template>
    <Head title="Bundle Offers" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        Bundle Offers
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
                        :href="products().url"
                        class="cursor-pointer border-b-2 border-transparent px-4 py-2 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
                    >
                        Product Catalog
                    </Link>
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'ecommerce.bundle_offers.read',
                            )
                        "
                        :href="'/ecommerce/bundles'"
                        :class="[
                            'cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition-colors',
                            'border-blue-600 text-foreground',
                        ]"
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
                <div class="flex items-center justify-end gap-2">
                    <Link :href="'/ecommerce/bundles/create'">
                        <Button
                            class="h-8 bg-blue-600 px-3 text-xs text-white hover:bg-blue-700"
                        >
                            <Plus class="mr-2 size-3.5" />
                            Create Bundle
                        </Button>
                    </Link>
                </div>

                <!-- Bundles Table -->
                <div
                    class="flex-1 overflow-auto rounded-md border border-border bg-card"
                >
                    <table class="w-full text-sm">
                        <thead class="sticky top-0 z-10 bg-muted/50">
                            <tr>
                                <th
                                    class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                >
                                    Bundle
                                </th>
                                <th
                                    class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                >
                                    Products
                                </th>
                                <th
                                    class="h-10 px-4 text-right align-middle font-medium text-muted-foreground"
                                >
                                    Discount
                                </th>
                                <th
                                    class="h-10 px-4 text-right align-middle font-medium text-muted-foreground"
                                >
                                    Price
                                </th>
                                <th
                                    class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="bundles.length === 0">
                                <td colspan="5" class="px-4 py-12 text-center">
                                    <div
                                        class="flex flex-col items-center justify-center gap-2"
                                    >
                                        <p
                                            class="text-sm text-muted-foreground"
                                        >
                                            No bundles found
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr
                                v-for="bundle in bundles"
                                :key="bundle.id"
                                class="border-b border-border transition-colors hover:bg-muted/50"
                            >
                                <td class="px-4 py-3 align-middle">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex size-10 items-center justify-center rounded-md bg-muted"
                                        >
                                            <Tag
                                                class="size-5 text-muted-foreground"
                                            />
                                        </div>
                                        <div>
                                            <span
                                                class="font-medium text-foreground"
                                                >{{ bundle.name }}</span
                                            >
                                            <p
                                                class="text-xs text-muted-foreground"
                                            >
                                                {{ bundle.description }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-sm text-foreground">{{
                                            bundle.productNames.join(', ')
                                        }}</span>
                                        <span
                                            class="font-mono text-xs text-muted-foreground"
                                            >{{
                                                bundle.products.join(', ')
                                            }}</span
                                        >
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-right align-middle">
                                    <div class="flex flex-col items-end">
                                        <span
                                            class="text-sm font-medium text-green-600 dark:text-green-400"
                                            >{{ bundle.discount }}% OFF</span
                                        >
                                        <span
                                            class="text-xs text-muted-foreground line-through"
                                            >{{
                                                formatCurrency(
                                                    bundle.originalPrice,
                                                )
                                            }}</span
                                        >
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-right align-middle">
                                    <div class="flex flex-col items-end">
                                        <span
                                            class="text-lg font-bold text-foreground"
                                            >{{
                                                formatCurrency(bundle.price)
                                            }}</span
                                        >
                                        <span
                                            class="text-xs text-green-600 dark:text-green-400"
                                            >Save
                                            {{
                                                formatCurrency(bundle.savings)
                                            }}</span
                                        >
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <div class="flex items-center gap-2">
                                        <Link
                                            :href="`/ecommerce/bundles/${bundle.id}/edit`"
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
                                        <Button
                                            size="sm"
                                            class="h-8"
                                            :disabled="
                                                loadingBundleId === bundle.id
                                            "
                                            @click="addToCart(bundle.id)"
                                        >
                                            <Loader2
                                                v-if="
                                                    loadingBundleId ===
                                                    bundle.id
                                                "
                                                class="mr-2 size-4 animate-spin"
                                            />
                                            <ShoppingCart
                                                v-else
                                                class="mr-2 size-4"
                                            />
                                            Add to Cart
                                        </Button>
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
