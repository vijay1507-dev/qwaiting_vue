<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MarketingController extends Controller
{
    /**
     * Display the marketing automation dashboard.
     */
    public function index(Request $request): Response
    {
        // Dummy data for marketing dashboard
        $stats = [
            'totalCampaigns' => 24,
            'activeCampaigns' => 8,
            'totalEmailsSent' => 125430,
            'openRate' => 32.5,
            'clickRate' => 8.2,
            'conversionRate' => 4.1,
            'revenue' => 125000,
        ];

        $recentCampaigns = [
            [
                'id' => '1',
                'name' => 'Welcome Series - New Users',
                'type' => 'Drip Sequence',
                'status' => 'active',
                'recipients' => 1250,
                'openRate' => 35.2,
                'clickRate' => 9.1,
                'createdAt' => '2025-03-15 10:30AM',
            ],
            [
                'id' => '2',
                'name' => 'Monthly Newsletter - March',
                'type' => 'Newsletter',
                'status' => 'completed',
                'recipients' => 8500,
                'openRate' => 28.5,
                'clickRate' => 7.3,
                'createdAt' => '2025-03-01 09:00AM',
            ],
            [
                'id' => '3',
                'name' => 'Trial Ending Reminder',
                'type' => 'Behavioral',
                'status' => 'active',
                'recipients' => 320,
                'openRate' => 42.1,
                'clickRate' => 12.5,
                'createdAt' => '2025-03-20 11:15AM',
            ],
        ];

        return Inertia::render('Marketing/Index', [
            'stats' => $stats,
            'recentCampaigns' => $recentCampaigns,
        ]);
    }

    /**
     * Display email campaigns page.
     */
    public function campaigns(Request $request): Response
    {
        $campaigns = [
            [
                'id' => '1',
                'name' => 'Welcome Series - New Users',
                'type' => 'Drip Sequence',
                'channel' => 'Email',
                'status' => 'active',
                'recipients' => 1250,
                'sent' => 1250,
                'delivered' => 1245,
                'opened' => 438,
                'clicked' => 114,
                'bounced' => 5,
                'unsubscribed' => 2,
                'openRate' => 35.2,
                'clickRate' => 9.1,
                'createdAt' => '2025-03-15 10:30AM',
                'lastSent' => '2025-03-21 08:00AM',
            ],
            [
                'id' => '2',
                'name' => 'Monthly Newsletter - March',
                'type' => 'Newsletter',
                'channel' => 'Email',
                'status' => 'completed',
                'recipients' => 8500,
                'sent' => 8500,
                'delivered' => 8420,
                'opened' => 2420,
                'clicked' => 621,
                'bounced' => 80,
                'unsubscribed' => 15,
                'openRate' => 28.5,
                'clickRate' => 7.3,
                'createdAt' => '2025-03-01 09:00AM',
                'lastSent' => '2025-03-01 09:00AM',
            ],
            [
                'id' => '3',
                'name' => 'Trial Ending Reminder',
                'type' => 'Behavioral',
                'channel' => 'Email',
                'status' => 'active',
                'recipients' => 320,
                'sent' => 320,
                'delivered' => 318,
                'opened' => 135,
                'clicked' => 40,
                'bounced' => 2,
                'unsubscribed' => 1,
                'openRate' => 42.1,
                'clickRate' => 12.5,
                'createdAt' => '2025-03-20 11:15AM',
                'lastSent' => '2025-03-21 10:00AM',
            ],
            [
                'id' => '4',
                'name' => 'Upsell Campaign - Premium Features',
                'type' => 'Upsell',
                'channel' => 'Email',
                'status' => 'scheduled',
                'recipients' => 2100,
                'sent' => 0,
                'delivered' => 0,
                'opened' => 0,
                'clicked' => 0,
                'bounced' => 0,
                'unsubscribed' => 0,
                'openRate' => 0,
                'clickRate' => 0,
                'createdAt' => '2025-03-22 02:00PM',
                'lastSent' => null,
            ],
            [
                'id' => '5',
                'name' => 'Renewal Reminder - 7 Days',
                'type' => 'Renewal',
                'channel' => 'Email',
                'status' => 'active',
                'recipients' => 450,
                'sent' => 450,
                'delivered' => 448,
                'opened' => 189,
                'clicked' => 56,
                'bounced' => 2,
                'unsubscribed' => 0,
                'openRate' => 42.0,
                'clickRate' => 12.4,
                'createdAt' => '2025-03-18 09:30AM',
                'lastSent' => '2025-03-21 09:00AM',
            ],
        ];

        $channels = ['Email', 'SMS', 'WhatsApp', 'Push', 'In-App'];
        $types = ['Drip Sequence', 'Newsletter', 'Behavioral', 'Upsell', 'Renewal', 'Nurturing'];

        return Inertia::render('Marketing/Campaigns', [
            'campaigns' => $campaigns,
            'channels' => $channels,
            'types' => $types,
        ]);
    }

    /**
     * Display email sequences page.
     */
    public function sequences(Request $request): Response
    {
        $sequences = [
            [
                'id' => '1',
                'name' => 'Behavioral Email Sequence (Non-Buyers)',
                'description' => 'Automated sequence for users who signed up but haven\'t purchased',
                'status' => 'active',
                'totalEmails' => 6,
                'recipients' => 1250,
                'emails' => [
                    [
                        'id' => '1',
                        'number' => 1,
                        'timing' => 'Immediate',
                        'subject' => 'Welcome to Qwaiting - Your Journey Starts Here',
                        'type' => 'welcome',
                        'status' => 'active',
                    ],
                    [
                        'id' => '2',
                        'number' => 2,
                        'timing' => '24 hours',
                        'subject' => '5 Features That Will Transform Your Customer Experience',
                        'type' => 'feature_highlight',
                        'status' => 'active',
                    ],
                    [
                        'id' => '3',
                        'number' => 3,
                        'timing' => '48 hours',
                        'subject' => 'How {{similar_company}} Reduced Wait Times by 60%',
                        'type' => 'social_proof',
                        'status' => 'active',
                    ],
                    [
                        'id' => '4',
                        'number' => 4,
                        'timing' => '72 hours',
                        'subject' => 'Your Trial is Halfway Through - Are You Making the Most of It?',
                        'type' => 'trial_reminder',
                        'status' => 'active',
                    ],
                    [
                        'id' => '5',
                        'number' => 5,
                        'timing' => '96 hours',
                        'subject' => '{{first_name}}, Let\'s Talk About Your Queue Management Goals',
                        'type' => 'sales_outreach',
                        'status' => 'active',
                    ],
                    [
                        'id' => '6',
                        'number' => 6,
                        'timing' => 'Day before trial ends',
                        'subject' => 'Exclusive: 20% Off Your First Year',
                        'type' => 'offer',
                        'status' => 'active',
                    ],
                ],
                'createdAt' => '2025-03-15 10:30AM',
            ],
            [
                'id' => '2',
                'name' => 'Lead Nurturing Journey - Enterprise',
                'description' => 'Nurturing sequence for enterprise leads',
                'status' => 'active',
                'totalEmails' => 4,
                'recipients' => 320,
                'emails' => [
                    [
                        'id' => '7',
                        'number' => 1,
                        'timing' => 'Immediate',
                        'subject' => 'Welcome to Qwaiting Enterprise',
                        'type' => 'welcome',
                        'status' => 'active',
                    ],
                    [
                        'id' => '8',
                        'number' => 2,
                        'timing' => '3 days',
                        'subject' => 'Enterprise Features Overview',
                        'type' => 'feature_highlight',
                        'status' => 'active',
                    ],
                    [
                        'id' => '9',
                        'number' => 3,
                        'timing' => '7 days',
                        'subject' => 'Schedule a Demo with Our Team',
                        'type' => 'sales_outreach',
                        'status' => 'active',
                    ],
                    [
                        'id' => '10',
                        'number' => 4,
                        'timing' => '14 days',
                        'subject' => 'Case Study: How {{company}} Scaled with Qwaiting',
                        'type' => 'social_proof',
                        'status' => 'active',
                    ],
                ],
                'createdAt' => '2025-03-10 02:15PM',
            ],
        ];

        return Inertia::render('Marketing/Sequences', [
            'sequences' => $sequences,
        ]);
    }

    /**
     * Display workflow triggers page.
     */
    public function workflows(Request $request): Response
    {
        $workflows = [
            [
                'id' => '1',
                'trigger' => 'User signs up',
                'action' => 'Add to onboarding journey, assign to sales if high-score',
                'status' => 'active',
                'executions' => 1250,
                'lastExecuted' => '2025-03-21 11:30AM',
            ],
            [
                'id' => '2',
                'trigger' => 'User inactive 7+ days',
                'action' => 'Send re-engagement email, notify CS',
                'status' => 'active',
                'executions' => 320,
                'lastExecuted' => '2025-03-21 09:00AM',
            ],
            [
                'id' => '3',
                'trigger' => 'Views pricing page 3+ times',
                'action' => 'Assign to sales for immediate outreach',
                'status' => 'active',
                'executions' => 45,
                'lastExecuted' => '2025-03-21 10:15AM',
            ],
            [
                'id' => '4',
                'trigger' => 'Subscription due in 7 days',
                'action' => 'Send renewal reminder',
                'status' => 'active',
                'executions' => 450,
                'lastExecuted' => '2025-03-21 08:00AM',
            ],
            [
                'id' => '5',
                'trigger' => 'Cart abandoned',
                'action' => 'Send recovery email sequence (1h, 24h, 72h)',
                'status' => 'active',
                'executions' => 89,
                'lastExecuted' => '2025-03-21 07:30AM',
            ],
            [
                'id' => '6',
                'trigger' => 'Trial ending in 3 days',
                'action' => 'Send conversion sequence',
                'status' => 'active',
                'executions' => 156,
                'lastExecuted' => '2025-03-21 06:00AM',
            ],
            [
                'id' => '7',
                'trigger' => 'Payment failed',
                'action' => 'Start dunning sequence',
                'status' => 'active',
                'executions' => 23,
                'lastExecuted' => '2025-03-20 05:45PM',
            ],
            [
                'id' => '8',
                'trigger' => 'NPS score < 7',
                'action' => 'Alert CS, send follow-up for feedback',
                'status' => 'active',
                'executions' => 67,
                'lastExecuted' => '2025-03-21 11:00AM',
            ],
        ];

        return Inertia::render('Marketing/Workflows', [
            'workflows' => $workflows,
        ]);
    }

    /**
     * Display campaign tracking page.
     */
    public function tracking(Request $request): Response
    {
        $campaigns = [
            [
                'id' => '1',
                'name' => 'Google Ads - Qwaiting Search',
                'source' => 'Google Ads',
                'medium' => 'cpc',
                'campaign' => 'Qwaiting Search',
                'clicks' => 1250,
                'impressions' => 45000,
                'conversions' => 45,
                'cost' => 1250.00,
                'revenue' => 22500.00,
                'roi' => 1700.0,
                'cpl' => 27.78,
                'ctr' => 2.78,
                'conversionRate' => 3.6,
            ],
            [
                'id' => '2',
                'name' => 'Facebook Pixel - Retargeting',
                'source' => 'Facebook',
                'medium' => 'social',
                'campaign' => 'Retargeting',
                'clicks' => 890,
                'impressions' => 32000,
                'conversions' => 32,
                'cost' => 890.00,
                'revenue' => 16000.00,
                'roi' => 1698.88,
                'cpl' => 27.81,
                'ctr' => 2.78,
                'conversionRate' => 3.6,
            ],
            [
                'id' => '3',
                'name' => 'LinkedIn Ads - B2B Campaign',
                'source' => 'LinkedIn',
                'medium' => 'social',
                'campaign' => 'B2B Campaign',
                'clicks' => 450,
                'impressions' => 18000,
                'conversions' => 18,
                'cost' => 1350.00,
                'revenue' => 9000.00,
                'roi' => 566.67,
                'cpl' => 75.00,
                'ctr' => 2.5,
                'conversionRate' => 4.0,
            ],
            [
                'id' => '4',
                'name' => 'Email Newsletter - March',
                'source' => 'Email',
                'medium' => 'email',
                'campaign' => 'Monthly Newsletter',
                'clicks' => 621,
                'impressions' => 8500,
                'conversions' => 25,
                'cost' => 0.00,
                'revenue' => 12500.00,
                'roi' => null,
                'cpl' => 0.00,
                'ctr' => 7.31,
                'conversionRate' => 4.03,
            ],
        ];

        $summary = [
            'totalClicks' => 3211,
            'totalImpressions' => 98000,
            'totalConversions' => 120,
            'totalCost' => 3490.00,
            'totalRevenue' => 60000.00,
            'averageROI' => 1619.18,
            'averageCPL' => 29.08,
            'averageCTR' => 3.28,
            'averageConversionRate' => 3.74,
        ];

        return Inertia::render('Marketing/Tracking', [
            'campaigns' => $campaigns,
            'summary' => $summary,
        ]);
    }

    /**
     * Display campaign view/edit page.
     */
    public function campaignView(Request $request, ?string $id = null): Response
    {
        return Inertia::render('Marketing/CampaignView', [
            'id' => $id,
        ]);
    }

    /**
     * Display sequence view/edit page.
     */
    public function sequenceView(Request $request, ?string $id = null): Response
    {
        return Inertia::render('Marketing/SequenceView', [
            'id' => $id,
        ]);
    }

    /**
     * Display workflow view/edit page.
     */
    public function workflowView(Request $request, ?string $id = null): Response
    {
        return Inertia::render('Marketing/WorkflowView', [
            'id' => $id,
        ]);
    }
}
