<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { bundles, cart, orders, products } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import {
    AlertCircle,
    CheckCircle,
    Clock,
    DollarSign,
    Package,
    ShoppingCart,
} from 'lucide-vue-next';

interface Props {
    stats: {
        totalProducts: number;
        totalBundles: number;
        totalOrders: number;
        totalRevenue: number;
        pendingOrders: number;
        lowStockItems: number;
    };
    recentOrders: Array<{
        id: string;
        customer: string;
        products: string[];
        total: number;
        status: string;
        date: string;
    }>;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'E-Commerce',
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

const getStatusColor = (status: string): string => {
    switch (status) {
        case 'completed':
            return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
        case 'processing':
            return 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400';
        case 'shipped':
            return 'bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-400';
        case 'pending':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};
</script>

<template>
    <Head title="E-Commerce" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        E-Commerce
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
                        :href="'/ecommerce'"
                        :class="[
                            'cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition-colors',
                            'border-blue-600 text-foreground',
                        ]"
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

                <!-- Stats Grid -->
                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"
                >
                    <!-- Total Products -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-sm font-medium text-muted-foreground"
                                >
                                    Total Products
                                </p>
                                <p
                                    class="mt-1 text-2xl font-semibold text-foreground"
                                >
                                    {{ stats.totalProducts }}
                                </p>
                            </div>
                            <div
                                class="rounded-full bg-blue-100 p-3 dark:bg-blue-900/20"
                            >
                                <Package
                                    class="size-5 text-blue-600 dark:text-blue-400"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Total Bundles -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-sm font-medium text-muted-foreground"
                                >
                                    Total Bundles
                                </p>
                                <p
                                    class="mt-1 text-2xl font-semibold text-foreground"
                                >
                                    {{ stats.totalBundles }}
                                </p>
                            </div>
                            <div
                                class="rounded-full bg-green-100 p-3 dark:bg-green-900/20"
                            >
                                <ShoppingCart
                                    class="size-5 text-green-600 dark:text-green-400"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Total Revenue -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-sm font-medium text-muted-foreground"
                                >
                                    Total Revenue
                                </p>
                                <p
                                    class="mt-1 text-2xl font-semibold text-foreground"
                                >
                                    {{ formatCurrency(stats.totalRevenue) }}
                                </p>
                            </div>
                            <div
                                class="rounded-full bg-purple-100 p-3 dark:bg-purple-900/20"
                            >
                                <DollarSign
                                    class="size-5 text-purple-600 dark:text-purple-400"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Total Orders -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-sm font-medium text-muted-foreground"
                                >
                                    Total Orders
                                </p>
                                <p
                                    class="mt-1 text-2xl font-semibold text-foreground"
                                >
                                    {{ stats.totalOrders }}
                                </p>
                            </div>
                            <div
                                class="rounded-full bg-yellow-100 p-3 dark:bg-yellow-900/20"
                            >
                                <CheckCircle
                                    class="size-5 text-yellow-600 dark:text-yellow-400"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Pending Orders -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-sm font-medium text-muted-foreground"
                                >
                                    Pending Orders
                                </p>
                                <p
                                    class="mt-1 text-2xl font-semibold text-foreground"
                                >
                                    {{ stats.pendingOrders }}
                                </p>
                            </div>
                            <div
                                class="rounded-full bg-orange-100 p-3 dark:bg-orange-900/20"
                            >
                                <Clock
                                    class="size-5 text-orange-600 dark:text-orange-400"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Low Stock Items -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-sm font-medium text-muted-foreground"
                                >
                                    Low Stock Items
                                </p>
                                <p
                                    class="mt-1 text-2xl font-semibold text-foreground"
                                >
                                    {{ stats.lowStockItems }}
                                </p>
                            </div>
                            <div
                                class="rounded-full bg-red-100 p-3 dark:bg-red-900/20"
                            >
                                <AlertCircle
                                    class="size-5 text-red-600 dark:text-red-400"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-base font-semibold text-foreground">
                        Recent Orders
                    </h2>

                    <div
                        class="flex-1 overflow-auto rounded-md border border-border bg-card"
                    >
                        <table class="w-full text-sm">
                            <thead class="sticky top-0 z-10 bg-muted/50">
                                <tr>
                                    <th
                                        class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Order ID
                                    </th>
                                    <th
                                        class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Customer
                                    </th>
                                    <th
                                        class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Products
                                    </th>
                                    <th
                                        class="h-10 px-4 text-right align-middle font-medium text-muted-foreground"
                                    >
                                        Total
                                    </th>
                                    <th
                                        class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                                    >
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="recentOrders.length === 0">
                                    <td
                                        colspan="6"
                                        class="px-4 py-12 text-center"
                                    >
                                        <div
                                            class="flex flex-col items-center justify-center gap-2"
                                        >
                                            <p
                                                class="text-sm text-muted-foreground"
                                            >
                                                No orders found
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr
                                    v-for="order in recentOrders"
                                    :key="order.id"
                                    class="border-b border-border transition-colors hover:bg-muted/50"
                                >
                                    <td class="px-4 py-3 align-middle">
                                        <Link
                                            :href="`/ecommerce/orders/${order.id}`"
                                            class="text-blue-600 hover:underline dark:text-blue-400"
                                        >
                                            {{ order.id }}
                                        </Link>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-foreground">{{
                                            order.customer
                                        }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span
                                            class="text-sm text-muted-foreground"
                                            >{{
                                                order.products.join(', ')
                                            }}</span
                                        >
                                    </td>
                                    <td
                                        class="px-4 py-3 text-right align-middle"
                                    >
                                        <span
                                            class="font-medium text-foreground"
                                            >{{
                                                formatCurrency(order.total)
                                            }}</span
                                        >
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span
                                            :class="[
                                                'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                                getStatusColor(order.status),
                                            ]"
                                        >
                                            {{ order.status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span
                                            class="text-sm text-muted-foreground"
                                            >{{ order.date }}</span
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
