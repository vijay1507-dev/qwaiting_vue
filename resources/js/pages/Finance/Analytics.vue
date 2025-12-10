<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as financeIndex, dashboard as financeDashboard, kpis } from '@/routes/finance';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { BarChart3, PieChart, LineChart, Activity, Filter, Gauge, Table, RefreshCw, Clock } from 'lucide-vue-next';

interface Dashboard {
    id: string;
    name: string;
    keyMetrics: string[];
    refresh: string;
}

interface Props {
    dashboards: Dashboard[];
    visualizationTypes: Record<string, string>;
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
        href: '#',
    },
];

const getRefreshIcon = (refresh: string) => {
    if (refresh === 'Real-time') {
        return RefreshCw;
    }
    return Clock;
};

const getRefreshColor = (refresh: string): string => {
    if (refresh === 'Real-time') {
        return 'text-green-600 dark:text-green-400';
    }
    return 'text-blue-600 dark:text-blue-400';
};

const getVisualizationIcon = (type: string) => {
    const lowerType = type.toLowerCase();
    if (lowerType.includes('line')) return LineChart;
    if (lowerType.includes('bar')) return BarChart3;
    if (lowerType.includes('pie')) return PieChart;
    if (lowerType.includes('heat')) return Activity;
    if (lowerType.includes('funnel')) return Filter;
    if (lowerType.includes('gauge')) return Gauge;
    if (lowerType.includes('table')) return Table;
    if (lowerType.includes('cohort')) return Table;
    return Activity;
};
</script>

<template>
    <Head title="Analytics & Reporting" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
                <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <h1 class="text-base font-semibold text-foreground">Analytics & Reporting</h1>
                    <Link :href="'/finance/analytics/view'">
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
                        :href="kpis().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Finance KPIs
                    </Link>
                    <Link
                        :href="'/finance/analytics'"
                        :class="[
                            'px-4 py-2 text-sm font-medium border-b-2 transition-colors cursor-pointer',
                            'border-blue-600 text-foreground'
                        ]"
                    >
                        Analytics & Reporting
                    </Link>
                </div>

                <!-- Section 9.1 Dashboard Components -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-base font-semibold text-foreground">9.1 Dashboard Components</h2>
                    
                    <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                        <table class="w-full text-sm">
                            <thead class="sticky top-0 z-10 bg-muted/50">
                                <tr>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Dashboard
                                    </th>
                                    <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                        Key Metrics
                                    </th>
                                    <th class="h-10 px-4 text-center align-middle font-medium text-muted-foreground">
                                        Refresh
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="dashboard in dashboards"
                                    :key="dashboard.id"
                                    class="border-b border-border transition-colors hover:bg-muted/50"
                                >
                                    <td class="px-4 py-3 align-middle">
                                        <span class="text-foreground font-medium">{{ dashboard.name }}</span>
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <div class="flex flex-wrap gap-1">
                                            <span
                                                v-for="(metric, index) in dashboard.keyMetrics"
                                                :key="index"
                                                class="inline-flex items-center rounded-md bg-muted px-2 py-1 text-xs text-foreground"
                                            >
                                                {{ metric }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <component
                                                :is="getRefreshIcon(dashboard.refresh)"
                                                :class="['size-4', getRefreshColor(dashboard.refresh)]"
                                            />
                                            <span :class="['text-sm font-medium', getRefreshColor(dashboard.refresh)]">
                                                {{ dashboard.refresh }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section 9.2 Visualization Types -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-base font-semibold text-foreground">9.2 Visualization Types</h2>
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div
                            v-for="(description, type) in visualizationTypes"
                            :key="type"
                            class="rounded-lg border border-border bg-card p-4"
                        >
                            <div class="flex items-start gap-3">
                                <div class="rounded-full bg-blue-100 p-2 dark:bg-blue-900/20">
                                    <component
                                        :is="getVisualizationIcon(type)"
                                        class="size-5 text-blue-600 dark:text-blue-400"
                                    />
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-sm font-semibold text-foreground mb-1">{{ type }}</h3>
                                    <p class="text-xs text-muted-foreground">{{ description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

