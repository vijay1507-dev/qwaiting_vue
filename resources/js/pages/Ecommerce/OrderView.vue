<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, orders } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { ArrowLeft, Download, Package, MapPin, CreditCard, Truck, CheckCircle } from 'lucide-vue-next';

interface OrderItem {
    name: string;
    sku: string;
    quantity: number;
    price: number;
}

interface Order {
    id: string;
    orderNumber: string;
    customer: string;
    items: OrderItem[];
    subtotal: number;
    tax: number;
    shipping: number;
    total: number;
    status: string;
    paymentStatus: string;
    paymentMethod: string;
    shippingAddress: string;
    billingAddress: string;
    orderDate: string;
    shippedDate: string | null;
    deliveredDate: string | null;
    trackingNumber: string | null;
    invoiceNumber: string;
}

interface Props {
    order: Order;
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
        href: orders().url,
    },
    {
        title: props.order.orderNumber,
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
    <Head :title="`Order ${order.orderNumber}`" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <Link :href="orders().url">
                            <Button variant="ghost" size="sm" class="h-8">
                                <ArrowLeft class="size-4 mr-2" />
                                Back
                            </Button>
                        </Link>
                        <div>
                            <h1 class="text-base font-semibold text-foreground">Order {{ order.orderNumber }}</h1>
                            <p class="text-xs text-muted-foreground">Placed on {{ order.orderDate }}</p>
                        </div>
                    </div>
                    <Button variant="outline" size="sm" class="h-8">
                        <Download class="size-4 mr-2" />
                        Download Invoice
                    </Button>
                </div>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <!-- Order Items -->
                    <div class="lg:col-span-2 flex flex-col gap-4">
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Order Items</h2>
                            <div class="space-y-3">
                                <div
                                    v-for="(item, index) in order.items"
                                    :key="index"
                                    class="flex items-center justify-between pb-3 border-b border-border last:border-0"
                                >
                                    <div class="flex items-center gap-3">
                                        <div class="flex size-10 items-center justify-center rounded-md bg-muted">
                                            <Package class="size-5 text-muted-foreground" />
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-foreground">{{ item.name }}</p>
                                            <p class="text-xs text-muted-foreground font-mono">{{ item.sku }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm text-muted-foreground">Qty: {{ item.quantity }}</p>
                                        <p class="text-sm font-medium text-foreground">{{ formatCurrency(item.price) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Order Summary</h2>
                            <div class="space-y-2">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Subtotal</span>
                                    <span class="text-foreground">{{ formatCurrency(order.subtotal) }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Tax</span>
                                    <span class="text-foreground">{{ formatCurrency(order.tax) }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Shipping</span>
                                    <span class="text-foreground">{{ formatCurrency(order.shipping) }}</span>
                                </div>
                                <div class="flex items-center justify-between border-t border-border pt-2">
                                    <span class="text-base font-semibold text-foreground">Total</span>
                                    <span class="text-lg font-bold text-foreground">{{ formatCurrency(order.total) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Info -->
                    <div class="flex flex-col gap-4">
                        <!-- Status -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h3 class="text-sm font-semibold text-foreground mb-3">Order Status</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-muted-foreground mb-1">Status</p>
                                    <span
                                        :class="[
                                            'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                            getStatusColor(order.status),
                                        ]"
                                    >
                                        {{ order.status }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-xs text-muted-foreground mb-1">Payment Status</p>
                                    <span
                                        :class="[
                                            'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                            order.paymentStatus === 'paid' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400',
                                        ]"
                                    >
                                        {{ order.paymentStatus }}
                                    </span>
                                </div>
                                <div v-if="order.paymentMethod">
                                    <p class="text-xs text-muted-foreground mb-1">Payment Method</p>
                                    <p class="text-sm text-foreground">{{ order.paymentMethod }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Address -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <div class="flex items-center gap-2 mb-3">
                                <MapPin class="size-4 text-muted-foreground" />
                                <h3 class="text-sm font-semibold text-foreground">Shipping Address</h3>
                            </div>
                            <p class="text-sm text-foreground">{{ order.shippingAddress }}</p>
                        </div>

                        <!-- Tracking -->
                        <div v-if="order.trackingNumber" class="rounded-lg border border-border bg-card p-4">
                            <div class="flex items-center gap-2 mb-3">
                                <Truck class="size-4 text-muted-foreground" />
                                <h3 class="text-sm font-semibold text-foreground">Tracking</h3>
                            </div>
                            <p class="text-sm font-mono text-foreground mb-2">{{ order.trackingNumber }}</p>
                            <div class="space-y-1 text-xs text-muted-foreground">
                                <p v-if="order.shippedDate">Shipped: {{ order.shippedDate }}</p>
                                <p v-if="order.deliveredDate">Delivered: {{ order.deliveredDate }}</p>
                            </div>
                        </div>

                        <!-- Invoice -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <div class="flex items-center gap-2 mb-3">
                                <CreditCard class="size-4 text-muted-foreground" />
                                <h3 class="text-sm font-semibold text-foreground">Invoice</h3>
                            </div>
                            <p class="text-sm font-mono text-foreground">{{ order.invoiceNumber }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

