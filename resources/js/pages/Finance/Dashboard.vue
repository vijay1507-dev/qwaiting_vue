<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as financeIndex, kpis, analytics } from '@/routes/finance';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { DollarSign, TrendingUp, Users, CreditCard, AlertCircle, FileText, Calendar, Download } from 'lucide-vue-next';

interface Props {
    stats: {
        mrr: number;
        arr: number;
        totalRevenue: number;
        activeSubscriptions: number;
        paymentFailures: number;
        accountsReceivable: number;
        overdueInvoices: number;
    };
    dailyRevenue: Array<{ date: string; revenue: number }>;
    monthlyRevenue: Array<{ month: string; revenue: number }>;
    yearlyRevenue: Array<{ year: string; revenue: number }>;
    revenueByPlan: Array<{ plan: string; revenue: number; count: number }>;
    revenueByRegion: Array<{ region: string; revenue: number }>;
    revenueByIndustry: Array<{ industry: string; revenue: number }>;
    revenueForecast: Array<{ period: string; forecast: number }>;
    paymentFailures: Array<{
        id: string;
        customer: string;
        amount: number;
        failureDate: string;
        retryStatus: string;
        nextRetry: string;
    }>;
    accountsReceivableAging: Array<{ period: string; amount: number; count: number }>;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Finance & Analytics',
        href: financeIndex().url,
    },
    {
        title: 'Financial Dashboard',
        href: '#',
    },
];

const selectedPeriod = ref<'daily' | 'monthly' | 'yearly'>('monthly');

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

const getRetryStatusColor = (status: string): string => {
    switch (status) {
        case 'scheduled':
            return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
        case 'failed':
            return 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400';
        case 'success':
            return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
        default:
            return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
    }
};

const currentRevenueData = computed(() => {
    switch (selectedPeriod.value) {
        case 'daily':
            return props.dailyRevenue;
        case 'monthly':
            return props.monthlyRevenue;
        case 'yearly':
            return props.yearlyRevenue;
        default:
            return props.monthlyRevenue;
    }
});
</script>

<template>
    <Head title="Financial Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
                <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <h1 class="text-base font-semibold text-foreground">Financial Dashboard</h1>
                    <Link :href="'/finance/dashboard/view'">
                        <Button variant="outline" size="sm" class="h-8">
                            View Details
                        </Button>
                    </Link>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <Link
                        :href="financeIndex().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Overview
                    </Link>
                    <Link
                        :href="'/finance/dashboard'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
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
                            </div>
                            <div class="rounded-full bg-green-100 p-3 dark:bg-green-900/20">
                                <TrendingUp class="size-5 text-green-600 dark:text-green-400" />
                            </div>
                        </div>
                    </div>

                    <!-- Accounts Receivable -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Accounts Receivable</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ formatCurrency(stats.accountsReceivable) }}</p>
                            </div>
                            <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900/20">
                                <CreditCard class="size-5 text-purple-600 dark:text-purple-400" />
                            </div>
                        </div>
                    </div>

                    <!-- Overdue Invoices -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-muted-foreground">Overdue Invoices</p>
                                <p class="mt-1 text-2xl font-semibold text-foreground">{{ stats.overdueInvoices }}</p>
                            </div>
                            <div class="rounded-full bg-red-100 p-3 dark:bg-red-900/20">
                                <AlertCircle class="size-5 text-red-600 dark:text-red-400" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Chart Section -->
                <div class="rounded-lg border border-border bg-card p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-base font-semibold text-foreground">Revenue Trends</h2>
                        <div class="flex items-center gap-2">
                            <button
                                @click="selectedPeriod = 'daily'"
                                :class="[
                                    'px-3 py-1 text-xs rounded-md transition-colors',
                                    selectedPeriod === 'daily'
                                        ? 'bg-blue-600 text-white'
                                        : 'bg-muted text-muted-foreground hover:bg-muted/80'
                                ]"
                            >
                                Daily
                            </button>
                            <button
                                @click="selectedPeriod = 'monthly'"
                                :class="[
                                    'px-3 py-1 text-xs rounded-md transition-colors',
                                    selectedPeriod === 'monthly'
                                        ? 'bg-blue-600 text-white'
                                        : 'bg-muted text-muted-foreground hover:bg-muted/80'
                                ]"
                            >
                                Monthly
                            </button>
                            <button
                                @click="selectedPeriod = 'yearly'"
                                :class="[
                                    'px-3 py-1 text-xs rounded-md transition-colors',
                                    selectedPeriod === 'yearly'
                                        ? 'bg-blue-600 text-white'
                                        : 'bg-muted text-muted-foreground hover:bg-muted/80'
                                ]"
                            >
                                Yearly
                            </button>
                        </div>
                    </div>
                    <div class="h-64 flex items-end justify-between gap-1">
                        <div
                            v-for="(item, index) in currentRevenueData"
                            :key="index"
                            class="flex-1 flex flex-col items-center gap-1"
                        >
                            <div
                                class="w-full bg-blue-600 rounded-t transition-all hover:bg-blue-700"
                                :style="{ height: `${(item.revenue / Math.max(...currentRevenueData.map(d => d.revenue))) * 100}%` }"
                                :title="formatCurrency(item.revenue)"
                            ></div>
                            <span class="text-xs text-muted-foreground text-center">
                                {{ selectedPeriod === 'daily' ? new Date(item.date).getDate() : selectedPeriod === 'monthly' ? item.month.split('-')[1] : item.year }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Revenue Breakdowns -->
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <!-- Revenue by Plan -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <h3 class="text-sm font-semibold text-foreground mb-4">Revenue by Plan</h3>
                        <div class="space-y-3">
                            <div v-for="plan in revenueByPlan" :key="plan.plan" class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm text-foreground">{{ plan.plan }}</span>
                                        <span class="text-sm font-medium text-foreground">{{ formatCurrency(plan.revenue) }}</span>
                                    </div>
                                    <div class="w-full bg-muted rounded-full h-2">
                                        <div
                                            class="bg-blue-600 h-2 rounded-full"
                                            :style="{ width: `${(plan.revenue / revenueByPlan.reduce((sum, p) => sum + p.revenue, 0)) * 100}%` }"
                                        ></div>
                                    </div>
                                    <span class="text-xs text-muted-foreground mt-1">{{ plan.count }} subscriptions</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue by Region -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <h3 class="text-sm font-semibold text-foreground mb-4">Revenue by Region</h3>
                        <div class="space-y-3">
                            <div v-for="region in revenueByRegion" :key="region.region" class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm text-foreground">{{ region.region }}</span>
                                        <span class="text-sm font-medium text-foreground">{{ formatCurrency(region.revenue) }}</span>
                                    </div>
                                    <div class="w-full bg-muted rounded-full h-2">
                                        <div
                                            class="bg-green-600 h-2 rounded-full"
                                            :style="{ width: `${(region.revenue / revenueByRegion.reduce((sum, r) => sum + r.revenue, 0)) * 100}%` }"
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue by Industry -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <h3 class="text-sm font-semibold text-foreground mb-4">Revenue by Industry</h3>
                        <div class="space-y-3">
                            <div v-for="industry in revenueByIndustry" :key="industry.industry" class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm text-foreground">{{ industry.industry }}</span>
                                        <span class="text-sm font-medium text-foreground">{{ formatCurrency(industry.revenue) }}</span>
                                    </div>
                                    <div class="w-full bg-muted rounded-full h-2">
                                        <div
                                            class="bg-purple-600 h-2 rounded-full"
                                            :style="{ width: `${(industry.revenue / revenueByIndustry.reduce((sum, i) => sum + i.revenue, 0)) * 100}%` }"
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Forecast & Payment Failures -->
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <!-- Revenue Forecast -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <h3 class="text-sm font-semibold text-foreground mb-4">Revenue Forecast</h3>
                        <div class="space-y-3">
                            <div v-for="forecast in revenueForecast" :key="forecast.period" class="flex items-center justify-between p-3 rounded-md bg-muted/50">
                                <div>
                                    <p class="text-sm font-medium text-foreground">{{ forecast.period }}</p>
                                    <p class="text-xs text-muted-foreground">Projected revenue</p>
                                </div>
                                <p class="text-lg font-semibold text-foreground">{{ formatCurrency(forecast.forecast) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Failures -->
                    <div class="rounded-lg border border-border bg-card p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-semibold text-foreground">Payment Failures</h3>
                            <span class="text-xs text-muted-foreground">{{ paymentFailures.length }} active</span>
                        </div>
                        <div class="space-y-2">
                            <div
                                v-for="failure in paymentFailures"
                                :key="failure.id"
                                class="flex items-center justify-between p-3 rounded-md border border-border"
                            >
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-foreground">{{ failure.customer }}</p>
                                    <p class="text-xs text-muted-foreground">{{ formatCurrency(failure.amount) }} • {{ failure.failureDate }}</p>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <span
                                        :class="[
                                            'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                            getRetryStatusColor(failure.retryStatus),
                                        ]"
                                    >
                                        {{ failure.retryStatus }}
                                    </span>
                                    <span class="text-xs text-muted-foreground">Next: {{ failure.nextRetry }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accounts Receivable Aging -->
                <div class="rounded-lg border border-border bg-card p-4">
                    <h3 class="text-sm font-semibold text-foreground mb-4">Accounts Receivable Aging</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-border">
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">Period</th>
                                    <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">Amount</th>
                                    <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="aging in accountsReceivableAging"
                                    :key="aging.period"
                                    class="border-b border-border transition-colors hover:bg-muted/50"
                                >
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-foreground">{{ aging.period }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-right">
                                        <span class="text-foreground">{{ formatCurrency(aging.amount) }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-right">
                                        <span class="text-foreground">{{ aging.count }}</span>
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

