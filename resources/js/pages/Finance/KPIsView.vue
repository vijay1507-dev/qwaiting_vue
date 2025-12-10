<script setup lang="ts">
import { computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as financeIndex, kpis } from '@/routes/finance';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { ArrowLeft, TrendingUp, TrendingDown, CheckCircle, XCircle } from 'lucide-vue-next';

interface KPI {
    name: string;
    calculation: string;
    target: string;
    current: number;
    targetValue: number;
    status: 'on-track' | 'exceeded' | 'below-target';
    trend: string;
    history: number[];
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
        href: kpis().url,
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

const formatKPIValue = (kpi: KPI): string => {
    if (kpi.name.includes('MRR') || kpi.name.includes('ARR') || kpi.name.includes('ARPU')) {
        return formatCurrency(kpi.current);
    }
    if (kpi.name.includes('Ratio')) {
        return kpi.current.toFixed(1) + ':1';
    }
    return kpi.current.toFixed(1) + '%';
};

const maxHistory = (history: number[]): number => {
    return Math.max(...history, ...history.map(h => h * 1.1));
};

const minHistory = (history: number[]): number => {
    return Math.min(...history, ...history.map(h => h * 0.9));
};
</script>

<template>
    <Head title="Finance KPIs - Detailed View" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <Link :href="kpis().url">
                            <Button variant="ghost" size="sm" class="h-8">
                                <ArrowLeft class="size-4 mr-2" />
                                Back
                            </Button>
                        </Link>
                        <h1 class="text-base font-semibold text-foreground">Finance KPIs - Detailed View</h1>
                    </div>
                </div>

                <!-- KPI Cards with Charts -->
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div
                        v-for="kpi in kpis"
                        :key="kpi.name"
                        class="rounded-lg border border-border bg-card p-6"
                    >
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-foreground mb-1">{{ kpi.name }}</h3>
                                <p class="text-xs text-muted-foreground">{{ kpi.calculation }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <CheckCircle
                                    v-if="kpi.status === 'on-track' || kpi.status === 'exceeded'"
                                    class="size-5 text-green-600 dark:text-green-400"
                                />
                                <XCircle
                                    v-else
                                    class="size-5 text-red-600 dark:text-red-400"
                                />
                            </div>
                        </div>

                        <!-- Current Value -->
                        <div class="mb-4">
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl font-bold text-foreground">{{ formatKPIValue(kpi) }}</span>
                                <div class="flex items-center gap-1">
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
                            </div>
                            <p class="text-xs text-muted-foreground mt-1">Target: {{ kpi.target }}</p>
                        </div>

                        <!-- Trend Chart -->
                        <div class="h-32 flex items-end justify-between gap-1">
                            <div
                                v-for="(value, index) in kpi.history"
                                :key="index"
                                class="flex-1 flex flex-col items-center gap-1 group relative"
                            >
                                <!-- Bar -->
                                <div
                                    class="w-full bg-blue-600 rounded-t transition-all hover:bg-blue-700 cursor-pointer"
                                    :style="{ height: `${((value - minHistory(kpi.history)) / (maxHistory(kpi.history) - minHistory(kpi.history))) * 100}%` }"
                                >
                                    <!-- Tooltip -->
                                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 hidden group-hover:block bg-gray-900 text-white text-xs rounded px-2 py-1 whitespace-nowrap z-10">
                                        {{ kpi.name.includes('MRR') || kpi.name.includes('ARR') || kpi.name.includes('ARPU') ? formatCurrency(value) : kpi.name.includes('Ratio') ? value.toFixed(1) + ':1' : value.toFixed(1) + '%' }}
                                    </div>
                                </div>
                                <!-- Label -->
                                <span class="text-xs text-muted-foreground">M{{ index + 1 }}</span>
                            </div>
                        </div>

                        <!-- Target Line Indicator -->
                        <div class="mt-4 pt-4 border-t border-border">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-muted-foreground">Progress to Target</span>
                                <span class="font-medium text-foreground">
                                    {{ kpi.current >= kpi.targetValue ? '100%' : Math.round((kpi.current / kpi.targetValue) * 100) + '%' }}
                                </span>
                            </div>
                            <div class="w-full bg-muted rounded-full h-2 mt-2">
                                <div
                                    class="bg-green-600 h-2 rounded-full transition-all"
                                    :style="{ width: `${Math.min((kpi.current / kpi.targetValue) * 100, 100)}%` }"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

