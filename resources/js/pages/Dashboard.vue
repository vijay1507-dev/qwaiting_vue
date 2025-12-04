<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import VueApexCharts from 'vue3-apexcharts';
import {
    TrendingUp,
    TrendingDown,
    Users,
    DollarSign,
    Target,
    ArrowUpRight,
    ArrowDownRight,
    Mail,
    Phone,
    Globe,
    Briefcase,
    Calendar,
} from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

// KPI Data
const kpis = ref([
    {
        title: 'Total Revenue',
        value: '$2,547,890',
        change: '+12.5%',
        trend: 'up',
        icon: DollarSign,
        color: 'text-green-600 dark:text-green-400',
        bgColor: 'bg-green-50 dark:bg-green-950',
    },
    {
        title: 'Active Leads',
        value: '1,234',
        change: '+8.2%',
        trend: 'up',
        icon: Users,
        color: 'text-blue-600 dark:text-blue-400',
        bgColor: 'bg-blue-50 dark:bg-blue-950',
    },
    {
        title: 'Conversion Rate',
        value: '24.8%',
        change: '+3.1%',
        trend: 'up',
        icon: Target,
        color: 'text-purple-600 dark:text-purple-400',
        bgColor: 'bg-purple-50 dark:bg-purple-950',
    },
    {
        title: 'Avg. Deal Size',
        value: '$12,450',
        change: '-2.3%',
        trend: 'down',
        icon: Briefcase,
        color: 'text-orange-600 dark:text-orange-400',
        bgColor: 'bg-orange-50 dark:bg-orange-950',
    },
]);

// Revenue Chart Data
const revenueChartOptions = computed(() => ({
    chart: {
        type: 'area',
        height: 350,
        toolbar: { show: false },
        zoom: { enabled: false },
    },
    dataLabels: { enabled: false },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.3,
        },
    },
    colors: ['#10b981'],
    xaxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ],
    },
    yaxis: {
        labels: {
            formatter: (val: number) => `$${(val / 1000).toFixed(0)}k`,
        },
    },
    tooltip: {
        y: {
            formatter: (val: number) => `$${val.toLocaleString()}`,
        },
    },
    grid: {
        borderColor: 'rgba(0,0,0,0.05)',
        strokeDashArray: 3,
    },
}));

const revenueChartSeries = ref([
    {
        name: 'Revenue',
        data: [185000, 210000, 195000, 240000, 265000, 280000, 310000, 295000, 320000, 350000, 380000, 420000],
    },
]);

// Sales Pipeline Chart
const pipelineChartOptions = computed(() => ({
    chart: {
        type: 'donut',
        height: 300,
    },
    labels: [
        'New Lead', 'Contacted', 'Qualified', 'Demo Completed',
        'Proposal Sent', 'Negotiation', 'Won', 'Lost', 'Follow-up',
        'Required', 'On-hold'
    ],
    colors: [
        '#3b82f6', '#06b6d4', '#6366f1', '#8b5cf6',
        '#d946ef', '#f59e0b', '#22c55e', '#ef4444', '#eab308',
        '#f59e0b', '#6b7280'
    ],
    legend: {
        position: 'bottom',
        fontSize: '11px',
    },
    dataLabels: {
        enabled: true,
        formatter: (val: number) => `${val.toFixed(1)}%`,
    },
    plotOptions: {
        pie: {
            donut: {
                size: '65%',
                labels: {
                    show: true,
                    total: {
                        show: true,
                        label: 'Total Leads',
                        formatter: () => '1,234',
                    },
                },
            },
        },
    },
}));

const pipelineChartSeries = ref([8, 6, 5, 7, 4, 3, 5, 3, 4, 3, 2]);

// Lead Sources Chart
const leadSourcesChartOptions = computed(() => ({
    chart: {
        type: 'bar',
        height: 300,
        toolbar: { show: false },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            borderRadius: 4,
        },
    },
    dataLabels: { enabled: false },
    colors: ['#3b82f6', '#8b5cf6', '#10b981', '#f59e0b'],
    xaxis: {
        categories: ['Website', 'Email', 'Phone', 'Referral'],
    },
    yaxis: {
        labels: {
            formatter: (val: number) => val.toString(),
        },
    },
    grid: {
        borderColor: 'rgba(0,0,0,0.05)',
        strokeDashArray: 3,
    },
}));

const leadSourcesChartSeries = ref([
    {
        name: 'Leads',
        data: [420, 380, 250, 184],
    },
]);

// Recent Activities
const recentActivities = ref([
    {
        type: 'lead',
        title: 'New lead: Billy James',
        description: 'SentinelSecure - $10,000',
        time: '2 minutes ago',
        icon: Users,
        color: 'text-blue-600',
    },
    {
        type: 'deal',
        title: 'Deal closed: ProjectPulse Enterprise',
        description: '$75,000 - Carol Denvers',
        time: '15 minutes ago',
        icon: DollarSign,
        color: 'text-green-600',
    },
    {
        type: 'email',
        title: 'Email campaign sent',
        description: 'Q4 Product Launch to 2,500 contacts',
        time: '1 hour ago',
        icon: Mail,
        color: 'text-purple-600',
    },
    {
        type: 'meeting',
        title: 'Meeting scheduled',
        description: 'Demo call with ShieldGuard Security',
        time: '2 hours ago',
        icon: Calendar,
        color: 'text-orange-600',
    },
]);

// Top Products
const topProducts = ref([
    { name: 'ProjectPulse Enterprise', revenue: '$450,000', deals: 12, growth: '+15%' },
    { name: 'CyberGuard Pro', revenue: '$380,000', deals: 8, growth: '+22%' },
    { name: 'DataShield Premium', revenue: '$295,000', deals: 15, growth: '+8%' },
    { name: 'SecureFlow Business', revenue: '$220,000', deals: 10, growth: '+5%' },
]);

// Marketing Metrics
const marketingMetrics = ref([
    { label: 'Email Open Rate', value: '68.5%', change: '+5.2%', trend: 'up' },
    { label: 'Click-Through Rate', value: '12.3%', change: '+2.1%', trend: 'up' },
    { label: 'Conversion Rate', value: '4.8%', change: '-0.5%', trend: 'down' },
    { label: 'Cost Per Lead', value: '$45', change: '-8.3%', trend: 'up' },
]);
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <!-- KPI Cards -->
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <div
                    v-for="kpi in kpis"
                    :key="kpi.title"
                    class="rounded-lg border border-border bg-card p-6 shadow-sm"
                >
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-muted-foreground">
                                {{ kpi.title }}
                            </p>
                            <p class="mt-2 text-2xl font-bold text-foreground">
                                {{ kpi.value }}
                            </p>
                            <div class="mt-2 flex items-center gap-1 text-sm">
                                <ArrowUpRight
                                    v-if="kpi.trend === 'up'"
                                    class="size-4 text-green-600"
                                />
                                <ArrowDownRight
                                    v-else
                                    class="size-4 text-red-600"
                                />
                                <span
                                    :class="
                                        kpi.trend === 'up'
                                            ? 'text-green-600'
                                            : 'text-red-600'
                                    "
                                >
                                    {{ kpi.change }}
                                </span>
                                <span class="text-muted-foreground">vs last month</span>
                            </div>
                        </div>
                        <div
                            :class="kpi.bgColor"
                            class="flex size-12 items-center justify-center rounded-lg"
                        >
                            <component
                                :is="kpi.icon"
                                :class="kpi.color"
                                class="size-6"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid gap-4 lg:grid-cols-2">
                <!-- Revenue Chart -->
                <div class="rounded-lg border border-border bg-card p-6 shadow-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">
                                Revenue Overview
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                Last 12 months performance
                            </p>
                        </div>
                        <TrendingUp class="size-5 text-green-600" />
                    </div>
                    <VueApexCharts
                        type="area"
                        height="350"
                        :options="revenueChartOptions"
                        :series="revenueChartSeries"
                    />
                </div>

                <!-- Sales Pipeline Chart -->
                <div class="rounded-lg border border-border bg-card p-6 shadow-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">
                                Sales Pipeline
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                Lead distribution by stage
                            </p>
                        </div>
                        <Target class="size-5 text-purple-600" />
                    </div>
                    <VueApexCharts
                        type="donut"
                        height="300"
                        :options="pipelineChartOptions"
                        :series="pipelineChartSeries"
                    />
                </div>
            </div>

            <!-- Lead Sources & Activities Row -->
            <div class="grid gap-4 lg:grid-cols-2">
                <!-- Lead Sources Chart -->
                <div class="rounded-lg border border-border bg-card p-6 shadow-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">
                                Lead Sources
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                Leads by acquisition channel
                            </p>
                        </div>
                        <Globe class="size-5 text-blue-600" />
                    </div>
                    <VueApexCharts
                        type="bar"
                        height="300"
                        :options="leadSourcesChartOptions"
                        :series="leadSourcesChartSeries"
                    />
                </div>

                <!-- Recent Activities -->
                <div class="rounded-lg border border-border bg-card p-6 shadow-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-foreground">
                            Recent Activities
                        </h3>
                        <Calendar class="size-5 text-muted-foreground" />
                    </div>
                    <div class="space-y-4">
                        <div
                            v-for="(activity, index) in recentActivities"
                            :key="index"
                            class="flex items-start gap-3 rounded-lg border border-border bg-muted/30 p-3"
                        >
                            <div
                                :class="activity.color"
                                class="mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-lg bg-background"
                            >
                                <component
                                    :is="activity.icon"
                                    class="size-4"
                                />
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-foreground">
                                    {{ activity.title }}
                                </p>
                                <p class="mt-0.5 text-xs text-muted-foreground">
                                    {{ activity.description }}
                                </p>
                                <p class="mt-1 text-xs text-muted-foreground">
                                    {{ activity.time }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row: Top Products & Marketing Metrics -->
            <div class="grid gap-4 lg:grid-cols-2">
                <!-- Top Products -->
                <div class="rounded-lg border border-border bg-card p-6 shadow-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-foreground">
                            Top Products
                        </h3>
                        <Briefcase class="size-5 text-muted-foreground" />
                    </div>
                    <div class="space-y-3">
                        <div
                            v-for="(product, index) in topProducts"
                            :key="index"
                            class="flex items-center justify-between rounded-lg border border-border bg-muted/30 p-3"
                        >
                            <div class="flex-1">
                                <p class="text-sm font-medium text-foreground">
                                    {{ product.name }}
                                </p>
                                <div class="mt-1 flex items-center gap-4 text-xs text-muted-foreground">
                                    <span>{{ product.revenue }} revenue</span>
                                    <span>{{ product.deals }} deals</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-1 text-sm font-medium text-green-600">
                                <TrendingUp class="size-4" />
                                {{ product.growth }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Marketing Metrics -->
                <div class="rounded-lg border border-border bg-card p-6 shadow-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-foreground">
                            Marketing Metrics
                        </h3>
                        <Target class="size-5 text-muted-foreground" />
                    </div>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <div
                            v-for="(metric, index) in marketingMetrics"
                            :key="index"
                            class="rounded-lg border border-border bg-muted/30 p-4"
                        >
                            <p class="text-xs font-medium text-muted-foreground">
                                {{ metric.label }}
                            </p>
                            <p class="mt-2 text-xl font-bold text-foreground">
                                {{ metric.value }}
                            </p>
                            <div class="mt-1 flex items-center gap-1 text-xs">
                                <ArrowUpRight
                                    v-if="metric.trend === 'up'"
                                    class="size-3 text-green-600"
                                />
                                <ArrowDownRight
                                    v-else
                                    class="size-3 text-red-600"
                                />
                                <span
                                    :class="
                                        metric.trend === 'up'
                                            ? 'text-green-600'
                                            : 'text-red-600'
                                    "
                                >
                                    {{ metric.change }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
