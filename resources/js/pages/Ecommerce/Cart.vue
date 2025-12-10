<script setup lang="ts">
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, products, bundles, orders } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { ShoppingCart, Trash2, Plus, Minus, ArrowRight, Tag } from 'lucide-vue-next';

interface CartItem {
    id: string;
    productId: string;
    name: string;
    sku: string;
    price: number;
    quantity: number;
    subtotal: number;
    image: string;
}

interface Props {
    cartItems: CartItem[];
    subtotal: number;
    tax: number;
    shipping: number;
    total: number;
    couponCode: string;
    couponDiscount: number;
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
        title: 'Shopping Cart',
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

const couponInput = ref(props.couponCode);

const applyCoupon = () => {
    // TODO: Implement coupon application
    console.log('Applying coupon:', couponInput.value);
};
</script>

<template>
    <Head title="Shopping Cart" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Shopping Cart</h1>
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
                        :href="'/ecommerce/cart'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
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

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2 flex flex-col gap-4">
                        <div v-if="cartItems.length === 0" class="rounded-lg border border-border bg-card p-12 text-center">
                            <ShoppingCart class="size-12 text-muted-foreground mx-auto mb-4" />
                            <p class="text-sm text-muted-foreground mb-2">Your cart is empty</p>
                            <Link :href="products().url">
                                <Button variant="outline" size="sm">
                                    Continue Shopping
                                </Button>
                            </Link>
                        </div>

                        <div v-else class="space-y-4">
                            <div
                                v-for="item in cartItems"
                                :key="item.id"
                                class="rounded-lg border border-border bg-card p-4"
                            >
                                <div class="flex items-center gap-4">
                                    <div class="flex size-16 items-center justify-center rounded-md bg-muted">
                                        <ShoppingCart class="size-8 text-muted-foreground" />
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-sm font-medium text-foreground">{{ item.name }}</h3>
                                        <p class="text-xs text-muted-foreground font-mono">{{ item.sku }}</p>
                                        <p class="text-sm font-medium text-foreground mt-1">{{ formatCurrency(item.price) }}</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button class="p-1 hover:bg-muted rounded-md">
                                            <Minus class="size-4 text-muted-foreground" />
                                        </button>
                                        <span class="text-sm font-medium text-foreground w-8 text-center">{{ item.quantity }}</span>
                                        <button class="p-1 hover:bg-muted rounded-md">
                                            <Plus class="size-4 text-muted-foreground" />
                                        </button>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-foreground">{{ formatCurrency(item.subtotal) }}</p>
                                        <button class="mt-1 p-1 hover:bg-muted rounded-md">
                                            <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="rounded-lg border border-border bg-card p-4 sticky top-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Order Summary</h2>
                            
                            <!-- Coupon Code -->
                            <div class="mb-4">
                                <div class="flex items-center gap-2">
                                    <Input
                                        v-model="couponInput"
                                        placeholder="Coupon code"
                                        class="flex-1 h-8 text-sm"
                                    />
                                    <Button size="sm" class="h-8" @click="applyCoupon">
                                        <Tag class="size-3.5" />
                                    </Button>
                                </div>
                                <p v-if="couponDiscount > 0" class="text-xs text-green-600 dark:text-green-400 mt-1">
                                    Coupon applied: -{{ formatCurrency(couponDiscount) }}
                                </p>
                            </div>

                            <!-- Totals -->
                            <div class="space-y-2 border-t border-border pt-4">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Subtotal</span>
                                    <span class="text-foreground">{{ formatCurrency(subtotal) }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Tax</span>
                                    <span class="text-foreground">{{ formatCurrency(tax) }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-muted-foreground">Shipping</span>
                                    <span class="text-foreground">{{ shipping > 0 ? formatCurrency(shipping) : 'Free' }}</span>
                                </div>
                                <div v-if="couponDiscount > 0" class="flex items-center justify-between text-sm">
                                    <span class="text-green-600 dark:text-green-400">Discount</span>
                                    <span class="text-green-600 dark:text-green-400">-{{ formatCurrency(couponDiscount) }}</span>
                                </div>
                                <div class="flex items-center justify-between border-t border-border pt-2">
                                    <span class="text-base font-semibold text-foreground">Total</span>
                                    <span class="text-lg font-bold text-foreground">{{ formatCurrency(total) }}</span>
                                </div>
                            </div>

                            <Button class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white">
                                Proceed to Checkout
                                <ArrowRight class="size-4 ml-2" />
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

