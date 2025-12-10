<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, products, bundles, cart } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, Eye, Package, Download } from 'lucide-vue-next';

interface Order {
    id: string;
    orderNumber: string;
    customer: string;
    items: Array<{ name: string; sku: string; quantity: number; price: number }>;
    subtotal: number;
    tax: number;
    shipping: number;
    total: number;
    status: string;
    paymentStatus: string;
    paymentMethod: string | null;
    shippingAddress: string;
    orderDate: string;
    shippedDate: string | null;
    deliveredDate: string | null;
    trackingNumber: string | null;
}

interface Props {
    orders: Order[];
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
        title: 'Orders',
        href: '#',
    },
];

const searchQuery = ref('');
const selectedStatus = ref('');

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(amount);
};

const filteredOrders = computed(() => {
    let result = props.orders;

    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (order) =>
                order.orderNumber.toLowerCase().includes(query) ||
                order.customer.toLowerCase().includes(query) ||
                order.id.toLowerCase().includes(query)
        );
    }

    if (selectedStatus.value) {
        result = result.filter(order => order.status === selectedStatus.value);
    }

    return result;
});

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
        case 'cancelled':
            return 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};

const getPaymentStatusColor = (status: string): string => {
    switch (status) {
        case 'paid':
            return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
        case 'pending':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
        case 'failed':
            return 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};
</script>

<template>
    <Head title="Orders" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Orders</h1>
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
                        :href="products().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
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
                        :href="'/ecommerce/orders'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
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
                                placeholder="Search orders..."
                                class="pl-8 h-8 text-sm"
                            />
                        </div>
                        <select
                            v-model="selectedStatus"
                            class="h-8 rounded-md border border-input bg-background px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-ring"
                        >
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                    <table class="w-full text-sm">
                        <thead class="sticky top-0 z-10 bg-muted/50">
                            <tr>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Order ID
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Customer
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Items
                                </th>
                                <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                    Total
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Status
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Payment
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Date
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="filteredOrders.length === 0">
                                <td colspan="8" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <p class="text-sm text-muted-foreground">No orders found</p>
                                        <p class="text-xs text-muted-foreground">
                                            {{ searchQuery ? 'Try adjusting your search criteria' : 'No orders available' }}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr
                                v-for="order in filteredOrders"
                                :key="order.id"
                                class="border-b border-border transition-colors hover:bg-muted/50"
                            >
                                <td class="px-4 py-3 align-middle">
                                    <Link :href="`/ecommerce/orders/${order.id}`" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                                        {{ order.orderNumber }}
                                    </Link>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span class="text-foreground">{{ order.customer }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span class="text-sm text-muted-foreground">{{ order.items.length }} item(s)</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="text-foreground font-medium">{{ formatCurrency(order.total) }}</span>
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
                                    <div class="flex flex-col gap-1">
                                        <span
                                            :class="[
                                                'inline-flex rounded-full px-2 py-1 text-xs font-medium w-fit',
                                                getPaymentStatusColor(order.paymentStatus),
                                            ]"
                                        >
                                            {{ order.paymentStatus }}
                                        </span>
                                        <span v-if="order.paymentMethod" class="text-xs text-muted-foreground">{{ order.paymentMethod }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span class="text-sm text-muted-foreground">{{ order.orderDate }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <div class="flex items-center gap-2">
                                        <Link :href="`/ecommerce/orders/${order.id}`">
                                            <button
                                                class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                                title="View"
                                            >
                                                <Eye class="size-4 text-muted-foreground" />
                                            </button>
                                        </Link>
                                        <button
                                            class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                            title="Download Invoice"
                                        >
                                            <Download class="size-4 text-muted-foreground" />
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

