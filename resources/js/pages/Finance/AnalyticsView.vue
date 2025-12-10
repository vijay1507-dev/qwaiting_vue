<script setup lang="ts">
import { computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as financeIndex, analytics } from '@/routes/finance';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { ArrowLeft, BarChart3, PieChart, LineChart, Filter } from 'lucide-vue-next';

interface Props {
    salesData: Array<{ month: string; pipeline: number; won: number; lost: number }>;
    leadsData: Array<{ source: string; leads: number; converted: number }>;
    funnelData: Array<{ stage: string; count: number; percentage: number }>;
    retentionData: Array<{ cohort: string; month1: number; month2: number; month3: number; month4: number }>;
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
        title: 'Analytics & Reporting',
        href: analytics().url,
    },
    {
        title: 'Detailed View',
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

const maxSales = computed(() => {
    return Math.max(...props.salesData.map(d => Math.max(d.pipeline, d.won, d.lost)));
});

const maxLeads = computed(() => {
    return Math.max(...props.leadsData.map(d => d.leads));
});

const maxFunnel = computed(() => {
    return Math.max(...props.funnelData.map(d => d.count));
});
</script>

<template>
    <Head title="Analytics & Reporting - Detailed View" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <Link :href="analytics().url">
                            <Button variant="ghost" size="sm" class="h-8">
                                <ArrowLeft class="size-4 mr-2" />
                                Back
                            </Button>
                        </Link>
                        <h1 class="text-base font-semibold text-foreground">Analytics & Reporting - Detailed View</h1>
                    </div>
                </div>

                <!-- Sales Dashboard -->
                <div class="rounded-lg border border-border bg-card p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <BarChart3 class="size-5 text-blue-600 dark:text-blue-400" />
                        <h2 class="text-lg font-semibold text-foreground">Sales Dashboard</h2>
                    </div>
                    <div class="h-64 flex items-end justify-between gap-2">
                        <div
                            v-for="(item, index) in salesData"
                            :key="index"
                            class="flex-1 flex flex-col items-center gap-1 group relative"
                        >
                            <!-- Stacked Bar Chart -->
                            <div class="w-full flex flex-col justify-end h-full">
                                <!-- Lost (Red) -->
                                <div
                                    class="w-full bg-red-500 rounded-t transition-all hover:bg-red-600 cursor-pointer"
                                    :style="{ height: `${(item.lost / maxSales) * 100}%` }"
                                    :title="`Lost: ${formatCurrency(item.lost)}`"
                                ></div>
                                <!-- Won (Green) -->
                                <div
                                    class="w-full bg-green-500 transition-all hover:bg-green-600 cursor-pointer"
                                    :style="{ height: `${(item.won / maxSales) * 100}%` }"
                                    :title="`Won: ${formatCurrency(item.won)}`"
                                ></div>
                                <!-- Pipeline (Blue) -->
                                <div
                                    class="w-full bg-blue-500 rounded-b transition-all hover:bg-blue-600 cursor-pointer"
                                    :style="{ height: `${(item.pipeline / maxSales) * 100}%` }"
                                    :title="`Pipeline: ${formatCurrency(item.pipeline)}`"
                                ></div>
                            </div>
                            <span class="text-xs text-muted-foreground">{{ item.month }}</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-6 mt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-blue-500 rounded"></div>
                            <span class="text-xs text-muted-foreground">Pipeline</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-green-500 rounded"></div>
                            <span class="text-xs text-muted-foreground">Won</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-500 rounded"></div>
                            <span class="text-xs text-muted-foreground">Lost</span>
                        </div>
                    </div>
                </div>

                <!-- Leads Dashboard -->
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <!-- Leads by Source - Pie Chart -->
                    <div class="rounded-lg border border-border bg-card p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <PieChart class="size-5 text-green-600 dark:text-green-400" />
                            <h2 class="text-lg font-semibold text-foreground">Leads by Source</h2>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="relative w-48 h-48">
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
                                        v-for="(lead, index) in leadsData"
                                        :key="lead.source"
                                        cx="100"
                                        cy="100"
                                        r="80"
                                        fill="none"
                                        :stroke="index === 0 ? '#3b82f6' : index === 1 ? '#10b981' : index === 2 ? '#f59e0b' : '#8b5cf6'"
                                        stroke-width="40"
                                        :stroke-dasharray="(lead.leads / leadsData.reduce((sum, l) => sum + l.leads, 0)) * 502.4"
                                        :stroke-dashoffset="leadsData.slice(0, index).reduce((sum, l) => sum + (l.leads / leadsData.reduce((s, l) => s + l.leads, 0)) * 502.4, 0)"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div v-for="(lead, index) in leadsData" :key="lead.source" class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-3 h-3 rounded-full"
                                        :class="index === 0 ? 'bg-blue-600' : index === 1 ? 'bg-green-600' : index === 2 ? 'bg-yellow-600' : 'bg-purple-600'"
                                    ></div>
                                    <span class="text-sm text-foreground">{{ lead.source }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm font-medium text-foreground">{{ formatNumber(lead.leads) }}</span>
                                    <span class="text-xs text-muted-foreground ml-2">({{ Math.round((lead.converted / lead.leads) * 100) }}%)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Conversion Funnel -->
                    <div class="rounded-lg border border-border bg-card p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <Filter class="size-5 text-purple-600 dark:text-purple-400" />
                            <h2 class="text-lg font-semibold text-foreground">Conversion Funnel</h2>
                        </div>
                        <div class="space-y-4">
                            <div
                                v-for="(stage, index) in funnelData"
                                :key="stage.stage"
                                class="flex flex-col gap-2"
                            >
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-foreground">{{ stage.stage }}</span>
                                    <div class="text-right">
                                        <span class="text-sm font-semibold text-foreground">{{ formatNumber(stage.count) }}</span>
                                        <span class="text-xs text-muted-foreground ml-2">({{ stage.percentage }}%)</span>
                                    </div>
                                </div>
                                <div class="w-full bg-muted rounded-full h-4">
                                    <div
                                        class="bg-purple-600 h-4 rounded-full transition-all"
                                        :style="{ width: `${stage.percentage}%` }"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Retention Cohort Table -->
                <div class="rounded-lg border border-border bg-card p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <LineChart class="size-5 text-orange-600 dark:text-orange-400" />
                        <h2 class="text-lg font-semibold text-foreground">Cohort Retention Analysis</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-border">
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">Cohort</th>
                                    <th class="h-10 px-4 text-center align-middle font-medium text-muted-foreground">Month 1</th>
                                    <th class="h-10 px-4 text-center align-middle font-medium text-muted-foreground">Month 2</th>
                                    <th class="h-10 px-4 text-center align-middle font-medium text-muted-foreground">Month 3</th>
                                    <th class="h-10 px-4 text-center align-middle font-medium text-muted-foreground">Month 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="cohort in retentionData"
                                    :key="cohort.cohort"
                                    class="border-b border-border transition-colors hover:bg-muted/50"
                                >
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-foreground font-medium">{{ cohort.cohort }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-center">
                                        <span class="text-foreground">{{ cohort.month1 }}%</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-center">
                                        <span
                                            :class="[
                                                'text-foreground',
                                                cohort.month2 >= cohort.month1 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'
                                            ]"
                                        >
                                            {{ cohort.month2 }}%
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-center">
                                        <span
                                            :class="[
                                                'text-foreground',
                                                cohort.month3 >= cohort.month2 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'
                                            ]"
                                        >
                                            {{ cohort.month3 }}%
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-center">
                                        <span
                                            :class="[
                                                'text-foreground',
                                                cohort.month4 >= cohort.month3 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'
                                            ]"
                                        >
                                            {{ cohort.month4 }}%
                                        </span>
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

