<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as financeIndex, dashboard as financeDashboard, analytics } from '@/routes/finance';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { CheckCircle, XCircle, AlertCircle, TrendingUp, TrendingDown } from 'lucide-vue-next';

interface KPI {
    name: string;
    calculation: string;
    target: string;
    current: number;
    targetValue: number;
    status: 'on-track' | 'exceeded' | 'below-target';
    trend: string;
}

interface Props {
    kpis: KPI[];
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
        title: 'Finance KPIs',
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
    return num.toFixed(1);
};

const getStatusIcon = (status: string) => {
    switch (status) {
        case 'exceeded':
            return CheckCircle;
        case 'on-track':
            return CheckCircle;
        case 'below-target':
            return XCircle;
        default:
            return AlertCircle;
    }
};

const getStatusColor = (status: string): string => {
    switch (status) {
        case 'exceeded':
            return 'text-green-600 dark:text-green-400';
        case 'on-track':
            return 'text-blue-600 dark:text-blue-400';
        case 'below-target':
            return 'text-red-600 dark:text-red-400';
        default:
            return 'text-gray-600 dark:text-gray-400';
    }
};

const getStatusBgColor = (status: string): string => {
    switch (status) {
        case 'exceeded':
            return 'bg-green-100 dark:bg-green-900/20';
        case 'on-track':
            return 'bg-blue-100 dark:bg-blue-900/20';
        case 'below-target':
            return 'bg-red-100 dark:bg-red-900/20';
        default:
            return 'bg-gray-100 dark:bg-gray-900/20';
    }
};

const formatKPIValue = (kpi: KPI): string => {
    if (kpi.name.includes('MRR') || kpi.name.includes('ARR') || kpi.name.includes('ARPU')) {
        return formatCurrency(kpi.current);
    }
    if (kpi.name.includes('Ratio')) {
        return formatNumber(kpi.current) + ':1';
    }
    return formatNumber(kpi.current) + '%';
};

const formatTargetValue = (kpi: KPI): string => {
    if (kpi.name.includes('MRR') || kpi.name.includes('ARR') || kpi.name.includes('ARPU')) {
        return formatCurrency(kpi.targetValue);
    }
    if (kpi.name.includes('Ratio')) {
        return formatNumber(kpi.targetValue) + ':1';
    }
    return formatNumber(kpi.targetValue) + '%';
};
</script>

<template>
    <Head title="Finance KPIs" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
                <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <h1 class="text-base font-semibold text-foreground">Finance KPIs</h1>
                    <Link :href="'/finance/kpis/view'">
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
                        :href="financeDashboard().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Financial Dashboard
                    </Link>
                    <Link
                        :href="'/finance/kpis'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
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

                <!-- KPI Table -->
                <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                    <table class="w-full text-sm">
                        <thead class="sticky top-0 z-10 bg-muted/50">
                            <tr>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    KPI
                                </th>
                                <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                    Calculation
                                </th>
                                <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                    Current
                                </th>
                                <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                    Target
                                </th>
                                <th class="h-10 px-4 text-center align-middle font-medium text-muted-foreground">
                                    Status
                                </th>
                                <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                    Trend
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="kpi in kpis"
                                :key="kpi.name"
                                class="border-b border-border transition-colors hover:bg-muted/50"
                            >
                                <td class="px-4 py-3 align-middle">
                                    <span class="text-foreground font-medium">{{ kpi.name }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <span class="text-sm text-muted-foreground">{{ kpi.calculation }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="text-foreground font-medium">{{ formatKPIValue(kpi) }}</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="text-sm text-muted-foreground">{{ kpi.target }}</span>
                                    <span class="text-xs text-muted-foreground block">({{ formatTargetValue(kpi) }})</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-center">
                                    <div class="flex items-center justify-center">
                                        <component
                                            :is="getStatusIcon(kpi.status)"
                                            :class="['size-5', getStatusColor(kpi.status)]"
                                        />
                                    </div>
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <TrendingUp
                                            v-if="kpi.trend.startsWith('+')"
                                            class="size-4 text-green-600 dark:text-green-400"
                                        />
                                        <TrendingDown
                                            v-else-if="kpi.trend.startsWith('-')"
                                            class="size-4 text-red-600 dark:text-red-400"
                                        />
                                        <span
                                            :class="[
                                                'text-sm font-medium',
                                                kpi.trend.startsWith('+') ? 'text-green-600 dark:text-green-400' : kpi.trend.startsWith('-') ? 'text-red-600 dark:text-red-400' : 'text-foreground'
                                            ]"
                                        >
                                            {{ kpi.trend }}
                                        </span>
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

