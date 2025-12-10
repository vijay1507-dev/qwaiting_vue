<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class FinanceController extends Controller
{
    public function index()
    {
        return Inertia::render('Finance/Index', [
            'stats' => [
                'mrr' => 125000,
                'arr' => 1500000,
                'grossRevenueRetention' => 92.5,
                'netRevenueRetention' => 112.3,
                'churnRate' => 2.1,
                'ltvCacRatio' => 3.5,
                'arpu' => 145.50,
                'totalRevenue' => 1250000,
                'activeSubscriptions' => 8592,
                'paymentFailures' => 23,
            ],
            'recentInvoices' => [
                [
                    'id' => 'INV-2025-001',
                    'customer' => 'Acme Corporation',
                    'amount' => 5000.00,
                    'status' => 'paid',
                    'dueDate' => '2025-01-15',
                    'createdAt' => '2025-01-01',
                ],
                [
                    'id' => 'INV-2025-002',
                    'customer' => 'Tech Solutions Inc',
                    'amount' => 8500.00,
                    'status' => 'pending',
                    'dueDate' => '2025-01-20',
                    'createdAt' => '2025-01-05',
                ],
                [
                    'id' => 'INV-2025-003',
                    'customer' => 'Global Enterprises',
                    'amount' => 12000.00,
                    'status' => 'paid',
                    'dueDate' => '2025-01-10',
                    'createdAt' => '2025-01-02',
                ],
            ],
        ]);
    }

    public function dashboard()
    {
        // Generate dummy revenue data for charts
        $dailyRevenue = [];
        $monthlyRevenue = [];
        $yearlyRevenue = [];

        // Daily revenue (last 30 days)
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dailyRevenue[] = [
                'date' => $date->format('Y-m-d'),
                'revenue' => rand(3000, 8000),
            ];
        }

        // Monthly revenue (last 12 months)
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyRevenue[] = [
                'month' => $date->format('Y-m'),
                'revenue' => rand(80000, 150000),
            ];
        }

        // Yearly revenue (last 5 years)
        for ($i = 4; $i >= 0; $i--) {
            $year = now()->subYears($i)->format('Y');
            $yearlyRevenue[] = [
                'year' => $year,
                'revenue' => rand(800000, 1500000),
            ];
        }

        return Inertia::render('Finance/Dashboard', [
            'stats' => [
                'mrr' => 125000,
                'arr' => 1500000,
                'totalRevenue' => 1250000,
                'activeSubscriptions' => 8592,
                'paymentFailures' => 23,
                'accountsReceivable' => 45000,
                'overdueInvoices' => 5,
            ],
            'dailyRevenue' => $dailyRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'yearlyRevenue' => $yearlyRevenue,
            'revenueByPlan' => [
                ['plan' => 'Basic', 'revenue' => 250000, 'count' => 5000],
                ['plan' => 'Professional', 'revenue' => 600000, 'count' => 2000],
                ['plan' => 'Enterprise', 'revenue' => 400000, 'count' => 200],
            ],
            'revenueByRegion' => [
                ['region' => 'North America', 'revenue' => 600000],
                ['region' => 'Europe', 'revenue' => 400000],
                ['region' => 'Asia Pacific', 'revenue' => 200000],
                ['region' => 'Other', 'revenue' => 50000],
            ],
            'revenueByIndustry' => [
                ['industry' => 'Technology', 'revenue' => 450000],
                ['industry' => 'Healthcare', 'revenue' => 300000],
                ['industry' => 'Finance', 'revenue' => 250000],
                ['industry' => 'Retail', 'revenue' => 150000],
                ['industry' => 'Other', 'revenue' => 100000],
            ],
            'revenueForecast' => [
                ['period' => '3 months', 'forecast' => 375000],
                ['period' => '6 months', 'forecast' => 750000],
                ['period' => '12 months', 'forecast' => 1500000],
            ],
            'paymentFailures' => [
                [
                    'id' => 'PF-001',
                    'customer' => 'Acme Corp',
                    'amount' => 5000.00,
                    'failureDate' => '2025-01-10',
                    'retryStatus' => 'scheduled',
                    'nextRetry' => '2025-01-15',
                ],
                [
                    'id' => 'PF-002',
                    'customer' => 'Tech Solutions',
                    'amount' => 3200.00,
                    'failureDate' => '2025-01-08',
                    'retryStatus' => 'failed',
                    'nextRetry' => '2025-01-20',
                ],
            ],
            'accountsReceivableAging' => [
                ['period' => '0-30 days', 'amount' => 25000, 'count' => 45],
                ['period' => '31-60 days', 'amount' => 15000, 'count' => 12],
                ['period' => '61-90 days', 'amount' => 5000, 'count' => 3],
                ['period' => '90+ days', 'amount' => 0, 'count' => 0],
            ],
        ]);
    }

    public function kpis()
    {
        return Inertia::render('Finance/KPIs', [
            'kpis' => [
                [
                    'name' => 'MRR (Monthly Recurring Revenue)',
                    'calculation' => 'Sum of monthly recurring revenue',
                    'target' => 'Growing 10%+ MoM',
                    'current' => 125000,
                    'targetValue' => 137500,
                    'status' => 'on-track',
                    'trend' => '+12.5%',
                ],
                [
                    'name' => 'ARR (Annual Recurring Revenue)',
                    'calculation' => 'MRR x 12',
                    'target' => '$1M+ Year 1',
                    'current' => 1500000,
                    'targetValue' => 1000000,
                    'status' => 'exceeded',
                    'trend' => '+50%',
                ],
                [
                    'name' => 'Gross Revenue Retention',
                    'calculation' => '(Starting MRR - Churned) / Starting MRR',
                    'target' => '>90%',
                    'current' => 92.5,
                    'targetValue' => 90,
                    'status' => 'on-track',
                    'trend' => '+2.5%',
                ],
                [
                    'name' => 'Net Revenue Retention',
                    'calculation' => '(Starting + Expansion - Churned) / Starting',
                    'target' => '>110%',
                    'current' => 112.3,
                    'targetValue' => 110,
                    'status' => 'on-track',
                    'trend' => '+2.3%',
                ],
                [
                    'name' => 'Churn Rate',
                    'calculation' => 'Churned MRR / Starting MRR',
                    'target' => '<3% monthly',
                    'current' => 2.1,
                    'targetValue' => 3,
                    'status' => 'on-track',
                    'trend' => '-0.9%',
                ],
                [
                    'name' => 'LTV/CAC Ratio',
                    'calculation' => 'Lifetime Value / Acquisition Cost',
                    'target' => '>3:1',
                    'current' => 3.5,
                    'targetValue' => 3,
                    'status' => 'on-track',
                    'trend' => '+0.5',
                ],
                [
                    'name' => 'ARPU (Average Revenue Per User)',
                    'calculation' => 'MRR / Customer Count',
                    'target' => '>$100',
                    'current' => 145.50,
                    'targetValue' => 100,
                    'status' => 'exceeded',
                    'trend' => '+45.5%',
                ],
                [
                    'name' => 'Profit per Plan',
                    'calculation' => 'Revenue - COGS per plan type',
                    'target' => '>70% margin',
                    'current' => 72.5,
                    'targetValue' => 70,
                    'status' => 'on-track',
                    'trend' => '+2.5%',
                ],
            ],
        ]);
    }

    public function analytics()
    {
        return Inertia::render('Finance/Analytics', [
            'dashboards' => [
                [
                    'id' => 'sales',
                    'name' => 'Sales',
                    'keyMetrics' => ['Pipeline value', 'Win rate', 'Deals', 'Conversions'],
                    'refresh' => 'Real-time',
                ],
                [
                    'id' => 'leads',
                    'name' => 'Leads',
                    'keyMetrics' => ['New leads', 'Conversion', 'Source attribution'],
                    'refresh' => 'Real-time',
                ],
                [
                    'id' => 'revenue',
                    'name' => 'Revenue',
                    'keyMetrics' => ['MRR', 'ARR', 'Churn', 'NRR', 'Forecasts'],
                    'refresh' => 'Daily',
                ],
                [
                    'id' => 'marketing',
                    'name' => 'Marketing',
                    'keyMetrics' => ['Campaign ROI', 'Email stats', 'Channel performance'],
                    'refresh' => 'Daily',
                ],
                [
                    'id' => 'hardware',
                    'name' => 'Hardware Sales',
                    'keyMetrics' => ['Orders', 'Revenue', 'Top products', 'Inventory'],
                    'refresh' => 'Real-time',
                ],
                [
                    'id' => 'funnel',
                    'name' => 'Funnel Analytics',
                    'keyMetrics' => ['Visitor → Lead → Trial → Customer conversion'],
                    'refresh' => 'Daily',
                ],
                [
                    'id' => 'retention',
                    'name' => 'Retention',
                    'keyMetrics' => ['Cohort retention', 'Health scores', 'At-risk'],
                    'refresh' => 'Daily',
                ],
                [
                    'id' => 'activity',
                    'name' => 'User Activity',
                    'keyMetrics' => ['DAU/WAU/MAU', 'Feature adoption', 'Sessions'],
                    'refresh' => 'Real-time',
                ],
            ],
            'visualizationTypes' => [
                'Line charts' => 'Revenue trends, user growth',
                'Bar charts' => 'Plan distribution, source comparison',
                'Pie charts' => 'Revenue by segment, lead sources',
                'Heat maps' => 'User activity, feature usage',
                'Cohort tables' => 'Retention analysis',
                'Funnel charts' => 'Conversion funnels',
                'Gauge charts' => 'Target progress',
                'Tables' => 'Detailed data with sorting/filtering',
            ],
        ]);
    }

    public function dashboardView()
    {
        // Generate detailed revenue data for charts
        $dailyRevenue = [];
        $monthlyRevenue = [];
        $yearlyRevenue = [];

        // Daily revenue (last 30 days)
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dailyRevenue[] = [
                'date' => $date->format('Y-m-d'),
                'revenue' => rand(3000, 8000),
            ];
        }

        // Monthly revenue (last 12 months)
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyRevenue[] = [
                'month' => $date->format('Y-m'),
                'revenue' => rand(80000, 150000),
            ];
        }

        // Yearly revenue (last 5 years)
        for ($i = 4; $i >= 0; $i--) {
            $year = now()->subYears($i)->format('Y');
            $yearlyRevenue[] = [
                'year' => $year,
                'revenue' => rand(800000, 1500000),
            ];
        }

        return Inertia::render('Finance/DashboardView', [
            'dailyRevenue' => $dailyRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'yearlyRevenue' => $yearlyRevenue,
            'revenueByPlan' => [
                ['plan' => 'Basic', 'revenue' => 250000, 'count' => 5000],
                ['plan' => 'Professional', 'revenue' => 600000, 'count' => 2000],
                ['plan' => 'Enterprise', 'revenue' => 400000, 'count' => 200],
            ],
            'revenueByRegion' => [
                ['region' => 'North America', 'revenue' => 600000],
                ['region' => 'Europe', 'revenue' => 400000],
                ['region' => 'Asia Pacific', 'revenue' => 200000],
                ['region' => 'Other', 'revenue' => 50000],
            ],
            'revenueByIndustry' => [
                ['industry' => 'Technology', 'revenue' => 450000],
                ['industry' => 'Healthcare', 'revenue' => 300000],
                ['industry' => 'Finance', 'revenue' => 250000],
                ['industry' => 'Retail', 'revenue' => 150000],
                ['industry' => 'Other', 'revenue' => 100000],
            ],
        ]);
    }

    public function kpisView()
    {
        return Inertia::render('Finance/KPIsView', [
            'kpis' => [
                [
                    'name' => 'MRR (Monthly Recurring Revenue)',
                    'calculation' => 'Sum of monthly recurring revenue',
                    'target' => 'Growing 10%+ MoM',
                    'current' => 125000,
                    'targetValue' => 137500,
                    'status' => 'on-track',
                    'trend' => '+12.5%',
                    'history' => [110000, 115000, 120000, 125000],
                ],
                [
                    'name' => 'ARR (Annual Recurring Revenue)',
                    'calculation' => 'MRR x 12',
                    'target' => '$1M+ Year 1',
                    'current' => 1500000,
                    'targetValue' => 1000000,
                    'status' => 'exceeded',
                    'trend' => '+50%',
                    'history' => [1200000, 1300000, 1400000, 1500000],
                ],
                [
                    'name' => 'Gross Revenue Retention',
                    'calculation' => '(Starting MRR - Churned) / Starting MRR',
                    'target' => '>90%',
                    'current' => 92.5,
                    'targetValue' => 90,
                    'status' => 'on-track',
                    'trend' => '+2.5%',
                    'history' => [88.5, 90.0, 91.2, 92.5],
                ],
                [
                    'name' => 'Net Revenue Retention',
                    'calculation' => '(Starting + Expansion - Churned) / Starting',
                    'target' => '>110%',
                    'current' => 112.3,
                    'targetValue' => 110,
                    'status' => 'on-track',
                    'trend' => '+2.3%',
                    'history' => [108.5, 110.0, 111.5, 112.3],
                ],
                [
                    'name' => 'Churn Rate',
                    'calculation' => 'Churned MRR / Starting MRR',
                    'target' => '<3% monthly',
                    'current' => 2.1,
                    'targetValue' => 3,
                    'status' => 'on-track',
                    'trend' => '-0.9%',
                    'history' => [3.2, 2.8, 2.5, 2.1],
                ],
                [
                    'name' => 'LTV/CAC Ratio',
                    'calculation' => 'Lifetime Value / Acquisition Cost',
                    'target' => '>3:1',
                    'current' => 3.5,
                    'targetValue' => 3,
                    'status' => 'on-track',
                    'trend' => '+0.5',
                    'history' => [2.8, 3.0, 3.2, 3.5],
                ],
                [
                    'name' => 'ARPU (Average Revenue Per User)',
                    'calculation' => 'MRR / Customer Count',
                    'target' => '>$100',
                    'current' => 145.50,
                    'targetValue' => 100,
                    'status' => 'exceeded',
                    'trend' => '+45.5%',
                    'history' => [120.00, 130.00, 138.00, 145.50],
                ],
                [
                    'name' => 'Profit per Plan',
                    'calculation' => 'Revenue - COGS per plan type',
                    'target' => '>70% margin',
                    'current' => 72.5,
                    'targetValue' => 70,
                    'status' => 'on-track',
                    'trend' => '+2.5%',
                    'history' => [68.5, 70.0, 71.2, 72.5],
                ],
            ],
        ]);
    }

    public function analyticsView()
    {
        return Inertia::render('Finance/AnalyticsView', [
            'salesData' => [
                ['month' => 'Jan', 'pipeline' => 2500000, 'won' => 500000, 'lost' => 100000],
                ['month' => 'Feb', 'pipeline' => 2800000, 'won' => 600000, 'lost' => 120000],
                ['month' => 'Mar', 'pipeline' => 3000000, 'won' => 700000, 'lost' => 150000],
                ['month' => 'Apr', 'pipeline' => 3200000, 'won' => 750000, 'lost' => 180000],
            ],
            'leadsData' => [
                ['source' => 'Organic', 'leads' => 450, 'converted' => 45],
                ['source' => 'Paid Ads', 'leads' => 320, 'converted' => 32],
                ['source' => 'Referral', 'leads' => 180, 'converted' => 25],
                ['source' => 'Email', 'leads' => 250, 'converted' => 30],
            ],
            'funnelData' => [
                ['stage' => 'Visitors', 'count' => 10000, 'percentage' => 100],
                ['stage' => 'Leads', 'count' => 1200, 'percentage' => 12],
                ['stage' => 'Trials', 'count' => 360, 'percentage' => 3.6],
                ['stage' => 'Customers', 'count' => 108, 'percentage' => 1.08],
            ],
            'retentionData' => [
                ['cohort' => 'Jan 2024', 'month1' => 100, 'month2' => 95, 'month3' => 90, 'month4' => 88],
                ['cohort' => 'Feb 2024', 'month1' => 100, 'month2' => 96, 'month3' => 92, 'month4' => 89],
                ['cohort' => 'Mar 2024', 'month1' => 100, 'month2' => 97, 'month3' => 93, 'month4' => 90],
                ['cohort' => 'Apr 2024', 'month1' => 100, 'month2' => 98, 'month3' => 94, 'month4' => 91],
            ],
        ]);
    }
}
