<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import {
    bundles,
    index as ecommerceIndex,
    orders,
    products,
} from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import {
    ArrowRight,
    Loader2,
    Minus,
    Plus,
    ShoppingCart,
    Tag,
    Trash2,
} from 'lucide-vue-next';
import { ref } from 'vue';

interface CartItem {
    id: string;
    productId?: string;
    bundleId?: string;
    name: string;
    sku: string;
    price: number;
    quantity: number;
    subtotal: number;
    image: string | null;
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

const { success, error: showError } = useToast();
const couponInput = ref(props.couponCode);
const updatingItems = ref<Set<string>>(new Set());
const removingItems = ref<Set<string>>(new Set());

const updateQuantity = async (itemId: string, newQuantity: number) => {
    if (newQuantity < 1) {
        removeItem(itemId);
        return;
    }

    if (updatingItems.value.has(itemId)) return;

    updatingItems.value.add(itemId);

    try {
        // URL encode the item ID to handle special characters like underscores
        const encodedId = encodeURIComponent(itemId);
        const response = await fetch(`/api/ecommerce/cart/${encodedId}`, {
            method: 'PUT',
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
                quantity: newQuantity,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            success('Cart updated successfully!');
            router.reload({
                only: ['cartItems', 'subtotal', 'tax', 'shipping', 'total'],
            });
        } else {
            throw new Error(data.message || 'Failed to update cart item');
        }
    } catch (err) {
        console.error('Error updating cart item:', err);
        showError(
            err instanceof Error
                ? err.message
                : 'Failed to update cart item. Please try again.',
        );
    } finally {
        updatingItems.value.delete(itemId);
    }
};

const incrementQuantity = (item: CartItem) => {
    updateQuantity(item.id, item.quantity + 1);
};

const decrementQuantity = (item: CartItem) => {
    if (item.quantity > 1) {
        updateQuantity(item.id, item.quantity - 1);
    }
};

const removeItem = async (itemId: string) => {
    if (removingItems.value.has(itemId)) return;

    removingItems.value.add(itemId);

    try {
        // URL encode the item ID to handle special characters like underscores
        const encodedId = encodeURIComponent(itemId);
        const response = await fetch(`/api/ecommerce/cart/${encodedId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN':
                    document
                        .querySelector('meta[name="csrf-token"]')
                        ?.getAttribute('content') || '',
                Accept: 'application/json',
            },
            credentials: 'same-origin',
        });

        const data = await response.json();

        if (response.ok && data.success) {
            success('Item removed from cart');
            router.reload({
                only: ['cartItems', 'subtotal', 'tax', 'shipping', 'total'],
            });
        } else {
            throw new Error(data.message || 'Failed to remove item from cart');
        }
    } catch (err) {
        console.error('Error removing cart item:', err);
        showError(
            err instanceof Error
                ? err.message
                : 'Failed to remove item from cart. Please try again.',
        );
    } finally {
        removingItems.value.delete(itemId);
    }
};

const applyCoupon = () => {
    // TODO: Implement coupon application
    console.log('Applying coupon:', couponInput.value);
};
</script>

<template>
    <Head title="Shopping Cart" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        Shopping Cart
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
                        :href="'/ecommerce/cart'"
                        :class="[
                            'cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition-colors',
                            'border-blue-600 text-foreground',
                        ]"
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

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <!-- Cart Items -->
                    <div class="flex flex-col gap-4 lg:col-span-2">
                        <div
                            v-if="cartItems.length === 0"
                            class="rounded-lg border border-border bg-card p-12 text-center"
                        >
                            <ShoppingCart
                                class="mx-auto mb-4 size-12 text-muted-foreground"
                            />
                            <p class="mb-2 text-sm text-muted-foreground">
                                Your cart is empty
                            </p>
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
                                    <div
                                        class="flex size-16 shrink-0 items-center justify-center overflow-hidden rounded-md bg-muted"
                                    >
                                        <img
                                            v-if="item.image"
                                            :src="
                                                item.image.startsWith('http') ||
                                                item.image.startsWith('/')
                                                    ? item.image
                                                    : `/storage/${item.image}`
                                            "
                                            :alt="item.name"
                                            class="h-full w-full object-cover"
                                        />
                                        <ShoppingCart
                                            v-else
                                            class="size-8 text-muted-foreground"
                                        />
                                    </div>
                                    <div class="flex-1">
                                        <h3
                                            class="text-sm font-medium text-foreground"
                                        >
                                            {{ item.name }}
                                        </h3>
                                        <p
                                            class="font-mono text-xs text-muted-foreground"
                                        >
                                            {{ item.sku }}
                                        </p>
                                        <p
                                            class="mt-1 text-sm font-medium text-foreground"
                                        >
                                            {{ formatCurrency(item.price) }}
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="rounded-md p-1 hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                            :disabled="
                                                updatingItems.has(item.id) ||
                                                item.quantity <= 1
                                            "
                                            @click="decrementQuantity(item)"
                                        >
                                            <Loader2
                                                v-if="
                                                    updatingItems.has(item.id)
                                                "
                                                class="size-4 animate-spin text-muted-foreground"
                                            />
                                            <Minus
                                                v-else
                                                class="size-4 text-muted-foreground"
                                            />
                                        </button>
                                        <span
                                            class="w-8 text-center text-sm font-medium text-foreground"
                                            >{{ item.quantity }}</span
                                        >
                                        <button
                                            class="rounded-md p-1 hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                            :disabled="
                                                updatingItems.has(item.id)
                                            "
                                            @click="incrementQuantity(item)"
                                        >
                                            <Loader2
                                                v-if="
                                                    updatingItems.has(item.id)
                                                "
                                                class="size-4 animate-spin text-muted-foreground"
                                            />
                                            <Plus
                                                v-else
                                                class="size-4 text-muted-foreground"
                                            />
                                        </button>
                                    </div>
                                    <div class="text-right">
                                        <p
                                            class="text-sm font-semibold text-foreground"
                                        >
                                            {{ formatCurrency(item.subtotal) }}
                                        </p>
                                        <button
                                            class="mt-1 rounded-md p-1 hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                            :disabled="
                                                removingItems.has(item.id)
                                            "
                                            @click="removeItem(item.id)"
                                        >
                                            <Loader2
                                                v-if="
                                                    removingItems.has(item.id)
                                                "
                                                class="size-4 animate-spin text-red-600 dark:text-red-400"
                                            />
                                            <Trash2
                                                v-else
                                                class="size-4 text-red-600 dark:text-red-400"
                                            />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div
                            class="sticky top-4 rounded-lg border border-border bg-card p-4"
                        >
                            <h2
                                class="mb-4 text-base font-semibold text-foreground"
                            >
                                Order Summary
                            </h2>

                            <!-- Coupon Code -->
                            <div class="mb-4">
                                <div class="flex items-center gap-2">
                                    <Input
                                        v-model="couponInput"
                                        placeholder="Coupon code"
                                        class="h-8 flex-1 text-sm"
                                    />
                                    <Button
                                        size="sm"
                                        class="h-8"
                                        @click="applyCoupon"
                                    >
                                        <Tag class="size-3.5" />
                                    </Button>
                                </div>
                                <p
                                    v-if="couponDiscount > 0"
                                    class="mt-1 text-xs text-green-600 dark:text-green-400"
                                >
                                    Coupon applied: -{{
                                        formatCurrency(couponDiscount)
                                    }}
                                </p>
                            </div>

                            <!-- Totals -->
                            <div class="space-y-2 border-t border-border pt-4">
                                <div
                                    class="flex items-center justify-between text-sm"
                                >
                                    <span class="text-muted-foreground"
                                        >Subtotal</span
                                    >
                                    <span class="text-foreground">{{
                                        formatCurrency(subtotal)
                                    }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-between text-sm"
                                >
                                    <span class="text-muted-foreground"
                                        >Tax</span
                                    >
                                    <span class="text-foreground">{{
                                        formatCurrency(tax)
                                    }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-between text-sm"
                                >
                                    <span class="text-muted-foreground"
                                        >Shipping</span
                                    >
                                    <span class="text-foreground">{{
                                        shipping > 0
                                            ? formatCurrency(shipping)
                                            : 'Free'
                                    }}</span>
                                </div>
                                <div
                                    v-if="couponDiscount > 0"
                                    class="flex items-center justify-between text-sm"
                                >
                                    <span
                                        class="text-green-600 dark:text-green-400"
                                        >Discount</span
                                    >
                                    <span
                                        class="text-green-600 dark:text-green-400"
                                        >-{{
                                            formatCurrency(couponDiscount)
                                        }}</span
                                    >
                                </div>
                                <div
                                    class="flex items-center justify-between border-t border-border pt-2"
                                >
                                    <span
                                        class="text-base font-semibold text-foreground"
                                        >Total</span
                                    >
                                    <span
                                        class="text-lg font-bold text-foreground"
                                        >{{ formatCurrency(total) }}</span
                                    >
                                </div>
                            </div>

                            <Button
                                class="mt-4 w-full bg-blue-600 text-white hover:bg-blue-700"
                            >
                                Proceed to Checkout
                                <ArrowRight class="ml-2 size-4" />
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
