<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { dashboard as financeDashboard, kpis, analytics } from '@/routes/finance';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { DollarSign, TrendingUp, Users, CreditCard, AlertCircle, FileText } from 'lucide-vue-next';

interface Props {
    stats: {
        mrr: number;
        arr: number;
        grossRevenueRetention: number;
        netRevenueRetention: number;
        churnRate: number;
        ltvCacRatio: number;
        arpu: number;
        totalRevenue: number;
        activeSubscriptions: number;
        paymentFailures: number;
    };
    recentInvoices: Array<{
        id: string;
        customer: string;
        amount: number;
        status: string;
        dueDate: string;
        createdAt: string;
    }>;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Finance & Analytics',
        href: '#',
    },
];

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    }).format(amount);
};

const formatNumber = (num: number): string => {
    if (num >= 1000000) {
        return (num / 1000000).toFixed(1) + 'M';
    }
    if (num >= 1000) {
        return (num / 1000).toFixed(1) + 'K';
    }
    return num.toString();
};

const getStatusColor = (status: string): string => {
    switch (status) {
        case 'paid':
            return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
        case 'pending':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
        case 'overdue':
            return 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};
</script>

<template>
    <Head title="Finance & Analytics" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Finance & Analytics</h1>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <Link
                        :href="'/finance'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
                    >
                        Overview
                    </Link>
                    <Link
                        :href="financeDashboard().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Financial Dashboard
                    </Link>
                    <Link
                        :href="kpis().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Finance KPIs
                    </Link>
                    <Link
                        :href="analytics().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Analytics & Reporting
                    </Link>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- MRR -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">MRR</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ formatCurrency(stats.mrr) }}</p>
                                <p class="mt-1 text-xs text-green-600 dark:text-green-400">+12.5% MoM</p>
                            </div>
                            <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900/20">
                                <DollarSign class="size-5 text-blue-600 dark:text-blue-400" />
                            </div>
                        </div>
                    </div>

                    <!-- ARR -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">ARR</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ formatCurrency(stats.arr) }}</p>
                                <p class="mt-1 text-xs text-green-600 dark:text-green-400">+50% YoY</p>
                            </div>
                            <div class="rounded-full bg-green-100 p-3 dark:bg-green-900/20">
                                <TrendingUp class="size-5 text-green-600 dark:text-green-400" />
                            </div>
                        </div>
                    </div>

                    <!-- Active Subscriptions -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Active Subscriptions</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ formatNumber(stats.activeSubscriptions) }}</p>
                                <p class="mt-1 text-xs text-muted-foreground">+8.2% this month</p>
                            </div>
                            <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900/20">
                                <Users class="size-5 text-purple-600 dark:text-purple-400" />
                            </div>
                        </div>
                    </div>

                    <!-- Payment Failures -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Payment Failures</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ stats.paymentFailures }}</p>
                                <p class="mt-1 text-xs text-red-600 dark:text-red-400">Requires attention</p>
                            </div>
                            <div class="rounded-full bg-red-100 p-3 dark:bg-red-900/20">
                                <AlertCircle class="size-5 text-red-600 dark:text-red-400" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KPI Metrics -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="rounded-full bg-blue-100 p-2 dark:bg-blue-900/20">
                                <TrendingUp class="size-4 text-blue-600 dark:text-blue-400" />
                            </div>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Gross Revenue Retention</p>
                                <p class="mt-1 text-xl font-semibold text-foreground">{{ stats.grossRevenueRetention }}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="rounded-full bg-green-100 p-2 dark:bg-green-900/20">
                                <TrendingUp class="size-4 text-green-600 dark:text-green-400" />
                            </div>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Net Revenue Retention</p>
                                <p class="mt-1 text-xl font-semibold text-foreground">{{ stats.netRevenueRetention }}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="rounded-full bg-yellow-100 p-2 dark:bg-yellow-900/20">
                                <TrendingUp class="size-4 text-yellow-600 dark:text-yellow-400" />
                            </div>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Churn Rate</p>
                                <p class="mt-1 text-xl font-semibold text-foreground">{{ stats.churnRate }}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="rounded-full bg-purple-100 p-2 dark:bg-purple-900/20">
                                <DollarSign class="size-4 text-purple-600 dark:text-purple-400" />
                            </div>
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">ARPU</p>
                                <p class="mt-1 text-xl font-semibold text-foreground">{{ formatCurrency(stats.arpu) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Invoices -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-base font-semibold text-foreground">Recent Invoices</h2>
                    
                    <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                        <table class="w-full text-sm">
                            <thead class="sticky top-0 z-10 bg-muted/50">
                                <tr>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Invoice ID
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Customer
                                    </th>
                                    <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                        Amount
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Status
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Due Date
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Created
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="recentInvoices.length === 0">
                                    <td colspan="6" class="px-4 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <p class="text-sm text-muted-foreground">No invoices found</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr
                                    v-for="invoice in recentInvoices"
                                    :key="invoice.id"
                                    class="border-b border-border transition-colors hover:bg-muted/50"
                                >
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-foreground font-medium">{{ invoice.id }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-foreground">{{ invoice.customer }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-right">
                                        <span class="text-foreground">{{ formatCurrency(invoice.amount) }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span
                                            :class="[
                                                'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                                getStatusColor(invoice.status),
                                            ]"
                                        >
                                            {{ invoice.status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-sm text-muted-foreground">{{ invoice.dueDate }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-sm text-muted-foreground">{{ invoice.createdAt }}</span>
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

