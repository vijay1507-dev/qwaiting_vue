<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as marketingIndex, campaigns } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ArrowLeft, Save, Mail, Users, Eye, MousePointerClick, TrendingUp, Send, XCircle, UserX } from 'lucide-vue-next';

interface Props {
    id?: string;
}

const props = withDefaults(defineProps<Props>(), {
    id: undefined,
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Marketing Automation',
        href: marketingIndex().url,
    },
    {
        title: 'Campaigns',
        href: campaigns().url,
    },
    {
        title: props.id ? 'Edit Campaign' : 'Create Campaign',
        href: '#',
    },
];

// Dummy campaign data
const campaign = ref({
    id: props.id || '1',
    name: 'Welcome Series - New Users',
    type: 'Drip Sequence',
    channel: 'Email',
    status: 'active',
    subject: 'Welcome to Qwaiting - Your Journey Starts Here',
    fromName: 'Qwaiting Team',
    fromEmail: 'noreply@qwaiting.com',
    replyTo: 'support@qwaiting.com',
    description: 'Automated welcome sequence for new user signups',
    recipients: 1250,
    sent: 1250,
    delivered: 1245,
    opened: 438,
    clicked: 114,
    bounced: 5,
    unsubscribed: 2,
    openRate: 35.2,
    clickRate: 9.1,
    scheduledAt: '2025-03-15T10:30:00',
    createdAt: '2025-03-15 10:30AM',
});

const emailContent = ref(`
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #1e3a8a; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9fafb; }
        .button { display: inline-block; padding: 12px 24px; background: #2563eb; color: white; text-decoration: none; border-radius: 4px; margin: 20px 0; }
        .footer { text-align: center; padding: 20px; color: #6b7280; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Qwaiting!</h1>
        </div>
        <div class="content">
            <p>Hi {{first_name}},</p>
            <p>Thank you for joining Qwaiting CRM. We're excited to help you transform your customer experience.</p>
            <p>Get started by exploring these key features:</p>
            <ul>
                <li>Queue Management</li>
                <li>Customer Analytics</li>
                <li>Automated Workflows</li>
            </ul>
            <a href="{{dashboard_url}}" class="button">Go to Dashboard</a>
            <p>Best regards,<br>The Qwaiting Team</p>
        </div>
        <div class="footer">
            <p>You're receiving this email because you signed up for Qwaiting CRM.</p>
            <p><a href="{{unsubscribe_url}}">Unsubscribe</a> | <a href="{{preferences_url}}">Manage Preferences</a></p>
        </div>
    </div>
</body>
</html>
`);

const isEditMode = computed(() => !!props.id);

const formatNumber = (num: number): string => {
    if (num >= 1000000) {
        return (num / 1000000).toFixed(1) + 'M';
    }
    if (num >= 1000) {
        return (num / 1000).toFixed(1) + 'K';
    }
    return num.toString();
};

const handleSave = () => {
    // TODO: Implement save functionality
    console.log('Saving campaign:', campaign.value);
};
</script>

<template>
    <Head :title="isEditMode ? 'Edit Campaign' : 'Create Campaign'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col overflow-hidden bg-background">
            <div class="flex-1 overflow-y-auto">
                <div class="px-3 sm:px-4 lg:px-6 py-3 lg:py-4">
                    <!-- Header -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <Link
                                :href="campaigns().url"
                                class="p-2 hover:bg-muted rounded-md transition-colors cursor-pointer"
                            >
                                <ArrowLeft class="size-5 text-muted-foreground" />
                            </Link>
                            <div>
                                <h1 class="text-2xl font-semibold text-foreground">
                                    {{ isEditMode ? 'Edit Campaign' : 'Create Campaign' }}
                                </h1>
                                <p class="mt-1 text-sm text-muted-foreground">
                                    {{ isEditMode ? 'Update campaign details and content' : 'Set up a new email campaign' }}
                                </p>
                            </div>
                        </div>
                        <Button @click="handleSave" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">
                            <Save class="mr-2 size-4" />
                            Save Campaign
                        </Button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Main Content -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Campaign Details -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Campaign Details</h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label for="name" class="mb-1 block text-sm font-medium text-foreground">
                                            Campaign Name <span class="text-red-500">*</span>
                                        </Label>
                                        <Input
                                            id="name"
                                            v-model="campaign.name"
                                            type="text"
                                            placeholder="Enter campaign name"
                                            class="w-full"
                                        />
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <Label for="type" class="mb-1 block text-sm font-medium text-foreground">
                                                Type <span class="text-red-500">*</span>
                                            </Label>
                                            <select
                                                id="type"
                                                v-model="campaign.type"
                                                class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                            >
                                                <option value="Drip Sequence">Drip Sequence</option>
                                                <option value="Newsletter">Newsletter</option>
                                                <option value="Behavioral">Behavioral</option>
                                                <option value="Upsell">Upsell</option>
                                                <option value="Renewal">Renewal</option>
                                            </select>
                                        </div>

                                        <div>
                                            <Label for="channel" class="mb-1 block text-sm font-medium text-foreground">
                                                Channel <span class="text-red-500">*</span>
                                            </Label>
                                            <select
                                                id="channel"
                                                v-model="campaign.channel"
                                                class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                            >
                                                <option value="Email">Email</option>
                                                <option value="SMS">SMS</option>
                                                <option value="WhatsApp">WhatsApp</option>
                                                <option value="Push">Push</option>
                                                <option value="In-App">In-App</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <Label for="description" class="mb-1 block text-sm font-medium text-foreground">
                                            Description
                                        </Label>
                                        <textarea
                                            id="description"
                                            v-model="campaign.description"
                                            rows="3"
                                            placeholder="Enter campaign description"
                                            class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Settings -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Email Settings</h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label for="subject" class="mb-1 block text-sm font-medium text-foreground">
                                            Subject Line <span class="text-red-500">*</span>
                                        </Label>
                                        <Input
                                            id="subject"
                                            v-model="campaign.subject"
                                            type="text"
                                            placeholder="Enter email subject"
                                            class="w-full"
                                        />
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <Label for="fromName" class="mb-1 block text-sm font-medium text-foreground">
                                                From Name <span class="text-red-500">*</span>
                                            </Label>
                                            <Input
                                                id="fromName"
                                                v-model="campaign.fromName"
                                                type="text"
                                                placeholder="Sender name"
                                                class="w-full"
                                            />
                                        </div>

                                        <div>
                                            <Label for="fromEmail" class="mb-1 block text-sm font-medium text-foreground">
                                                From Email <span class="text-red-500">*</span>
                                            </Label>
                                            <Input
                                                id="fromEmail"
                                                v-model="campaign.fromEmail"
                                                type="email"
                                                placeholder="sender@example.com"
                                                class="w-full"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <Label for="replyTo" class="mb-1 block text-sm font-medium text-foreground">
                                            Reply To
                                        </Label>
                                        <Input
                                            id="replyTo"
                                            v-model="campaign.replyTo"
                                            type="email"
                                            placeholder="reply@example.com"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Email Content -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Email Content</h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label for="content" class="mb-1 block text-sm font-medium text-foreground">
                                            HTML Content <span class="text-red-500">*</span>
                                        </Label>
                                        <textarea
                                            id="content"
                                            v-model="emailContent"
                                            rows="15"
                                            placeholder="Enter HTML email content"
                                            class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"
                                        ></textarea>
                                        <p class="mt-1 text-xs text-muted-foreground">
                                            Use variables like {{first_name}}, {{company_name}}, {{dashboard_url}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-6">
                            <!-- Campaign Stats (if editing) -->
                            <div v-if="isEditMode" class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Performance</h2>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <Send class="size-4 text-muted-foreground" />
                                            <span class="text-sm text-muted-foreground">Sent</span>
                                        </div>
                                        <span class="text-sm font-medium text-foreground">{{ formatNumber(campaign.sent) }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <Mail class="size-4 text-muted-foreground" />
                                            <span class="text-sm text-muted-foreground">Delivered</span>
                                        </div>
                                        <span class="text-sm font-medium text-foreground">{{ formatNumber(campaign.delivered) }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <Eye class="size-4 text-muted-foreground" />
                                            <span class="text-sm text-muted-foreground">Opened</span>
                                        </div>
                                        <span class="text-sm font-medium text-foreground">{{ formatNumber(campaign.opened) }} ({{ campaign.openRate }}%)</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <MousePointerClick class="size-4 text-muted-foreground" />
                                            <span class="text-sm text-muted-foreground">Clicked</span>
                                        </div>
                                        <span class="text-sm font-medium text-foreground">{{ formatNumber(campaign.clicked) }} ({{ campaign.clickRate }}%)</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <XCircle class="size-4 text-red-500" />
                                            <span class="text-sm text-muted-foreground">Bounced</span>
                                        </div>
                                        <span class="text-sm font-medium text-foreground">{{ campaign.bounced }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <UserX class="size-4 text-red-500" />
                                            <span class="text-sm text-muted-foreground">Unsubscribed</span>
                                        </div>
                                        <span class="text-sm font-medium text-foreground">{{ campaign.unsubscribed }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Campaign Settings -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Settings</h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label for="status" class="mb-1 block text-sm font-medium text-foreground">
                                            Status
                                        </Label>
                                        <select
                                            id="status"
                                            v-model="campaign.status"
                                            class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                        >
                                            <option value="draft">Draft</option>
                                            <option value="scheduled">Scheduled</option>
                                            <option value="active">Active</option>
                                            <option value="paused">Paused</option>
                                            <option value="completed">Completed</option>
                                        </select>
                                    </div>

                                    <div>
                                        <Label for="scheduledAt" class="mb-1 block text-sm font-medium text-foreground">
                                            Scheduled At
                                        </Label>
                                        <Input
                                            id="scheduledAt"
                                            v-model="campaign.scheduledAt"
                                            type="datetime-local"
                                            class="w-full"
                                        />
                                    </div>

                                    <div>
                                        <Label for="recipients" class="mb-1 block text-sm font-medium text-foreground">
                                            Recipients
                                        </Label>
                                        <Input
                                            id="recipients"
                                            v-model.number="campaign.recipients"
                                            type="number"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

