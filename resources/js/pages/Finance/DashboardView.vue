<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as financeIndex, dashboard as financeDashboard } from '@/routes/finance';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { ArrowLeft, Download } from 'lucide-vue-next';

interface Props {
    dailyRevenue: Array<{ date: string; revenue: number }>;
    monthlyRevenue: Array<{ month: string; revenue: number }>;
    yearlyRevenue: Array<{ year: string; revenue: number }>;
    revenueByPlan: Array<{ plan: string; revenue: number; count: number }>;
    revenueByRegion: Array<{ region: string; revenue: number }>;
    revenueByIndustry: Array<{ industry: string; revenue: number }>;
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
        href: financeDashboard().url,
    },
    {
        title: 'Detailed View',
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

const maxRevenue = computed(() => {
    return Math.max(...currentRevenueData.value.map(d => d.revenue));
});
</script>

<template>
    <Head title="Financial Dashboard - Detailed View" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <Link :href="financeDashboard().url">
                            <Button variant="ghost" size="sm" class="h-8">
                                <ArrowLeft class="size-4 mr-2" />
                                Back
                            </Button>
                        </Link>
                        <h1 class="text-base font-semibold text-foreground">Financial Dashboard - Detailed View</h1>
                    </div>
                    <Button variant="outline" size="sm" class="h-8">
                        <Download class="size-4 mr-2" />
                        Export
                    </Button>
                </div>

                <!-- Revenue Chart Section -->
                <div class="rounded-lg border border-border bg-card p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-foreground">Revenue Trends</h2>
                        <div class="flex items-center gap-2">
                            <button
                                @click="selectedPeriod = 'daily'"
                                :class="[
                                    'px-4 py-2 text-sm rounded-md transition-colors',
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
                                    'px-4 py-2 text-sm rounded-md transition-colors',
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
                                    'px-4 py-2 text-sm rounded-md transition-colors',
                                    selectedPeriod === 'yearly'
                                        ? 'bg-blue-600 text-white'
                                        : 'bg-muted text-muted-foreground hover:bg-muted/80'
                                ]"
                            >
                                Yearly
                            </button>
                        </div>
                    </div>
                    <!-- Line Chart -->
                    <div class="h-80 flex items-end justify-between gap-2 relative">
                        <!-- Y-axis labels -->
                        <div class="absolute left-0 top-0 bottom-12 flex flex-col justify-between text-xs text-muted-foreground pr-2">
                            <span>{{ formatCurrency(maxRevenue) }}</span>
                            <span>{{ formatCurrency(maxRevenue * 0.75) }}</span>
                            <span>{{ formatCurrency(maxRevenue * 0.5) }}</span>
                            <span>{{ formatCurrency(maxRevenue * 0.25) }}</span>
                            <span>$0</span>
                        </div>
                        <!-- Chart area -->
                        <div class="flex-1 ml-12 h-full flex items-end justify-between gap-1">
                            <div
                                v-for="(item, index) in currentRevenueData"
                                :key="index"
                                class="flex-1 flex flex-col items-center gap-2 group relative"
                            >
                                <!-- Bar -->
                                <div
                                    class="w-full bg-blue-600 rounded-t transition-all hover:bg-blue-700 cursor-pointer"
                                    :style="{ height: `${(item.revenue / maxRevenue) * 100}%` }"
                                >
                                    <!-- Tooltip -->
                                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 hidden group-hover:block bg-gray-900 text-white text-xs rounded px-2 py-1 whitespace-nowrap z-10">
                                        {{ formatCurrency(item.revenue) }}
                                    </div>
                                </div>
                                <!-- X-axis label -->
                                <span class="text-xs text-muted-foreground text-center transform -rotate-45 origin-top-left whitespace-nowrap">
                                    {{ selectedPeriod === 'daily' ? new Date(item.date).getDate() : selectedPeriod === 'monthly' ? item.month.split('-')[1] : item.year }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Breakdowns -->
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <!-- Revenue by Plan - Pie Chart -->
                    <div class="rounded-lg border border-border bg-card p-6">
                        <h3 class="text-base font-semibold text-foreground mb-4">Revenue by Plan</h3>
                        <div class="flex items-center justify-center">
                            <div class="relative w-64 h-64">
                                <!-- Pie Chart SVG -->
                                <svg viewBox="0 0 200 200" class="transform -rotate-90">
                                    <circle
                                        cx="100"
                                        cy="100"
                                        r="80"
                                        fill="none"
                                        stroke="#e5e7eb"
                                        stroke-width="40"
                                    />
                                    <circle
                                        v-for="(plan, index) in revenueByPlan"
                                        :key="plan.plan"
                                        cx="100"
                                        cy="100"
                                        r="80"
                                        fill="none"
                                        :stroke="index === 0 ? '#3b82f6' : index === 1 ? '#10b981' : '#8b5cf6'"
                                        stroke-width="40"
                                        :stroke-dasharray="(plan.revenue / revenueByPlan.reduce((sum, p) => sum + p.revenue, 0)) * 502.4"
                                        :stroke-dashoffset="revenueByPlan.slice(0, index).reduce((sum, p) => sum + (p.revenue / revenueByPlan.reduce((s, p) => s + p.revenue, 0)) * 502.4, 0)"
                                        class="transition-all"
                                    />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center">
                                        <p class="text-2xl font-semibold text-foreground">
                                            {{ formatCurrency(revenueByPlan.reduce((sum, p) => sum + p.revenue, 0)) }}
                                        </p>
                                        <p class="text-xs text-muted-foreground">Total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div v-for="(plan, index) in revenueByPlan" :key="plan.plan" class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-3 h-3 rounded-full"
                                        :class="index === 0 ? 'bg-blue-600' : index === 1 ? 'bg-green-600' : 'bg-purple-600'"
                                    ></div>
                                    <span class="text-sm text-foreground">{{ plan.plan }}</span>
                                </div>
                                <span class="text-sm font-medium text-foreground">{{ formatCurrency(plan.revenue) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue by Region - Bar Chart -->
                    <div class="rounded-lg border border-border bg-card p-6">
                        <h3 class="text-base font-semibold text-foreground mb-4">Revenue by Region</h3>
                        <div class="space-y-4">
                            <div v-for="region in revenueByRegion" :key="region.region" class="flex flex-col gap-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-foreground">{{ region.region }}</span>
                                    <span class="text-sm font-medium text-foreground">{{ formatCurrency(region.revenue) }}</span>
                                </div>
                                <div class="w-full bg-muted rounded-full h-3">
                                    <div
                                        class="bg-green-600 h-3 rounded-full transition-all"
                                        :style="{ width: `${(region.revenue / revenueByRegion.reduce((sum, r) => sum + r.revenue, 0)) * 100}%` }"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue by Industry - Horizontal Bar Chart -->
                    <div class="rounded-lg border border-border bg-card p-6">
                        <h3 class="text-base font-semibold text-foreground mb-4">Revenue by Industry</h3>
                        <div class="space-y-4">
                            <div v-for="industry in revenueByIndustry" :key="industry.industry" class="flex flex-col gap-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-foreground">{{ industry.industry }}</span>
                                    <span class="text-sm font-medium text-foreground">{{ formatCurrency(industry.revenue) }}</span>
                                </div>
                                <div class="w-full bg-muted rounded-full h-3">
                                    <div
                                        class="bg-purple-600 h-3 rounded-full transition-all"
                                        :style="{ width: `${(industry.revenue / revenueByIndustry.reduce((sum, i) => sum + i.revenue, 0)) * 100}%` }"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

