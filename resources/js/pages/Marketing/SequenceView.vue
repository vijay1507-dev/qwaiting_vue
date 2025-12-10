<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as marketingIndex, sequences } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ArrowLeft, Save, Plus, Trash2, Mail, Clock, ChevronRight } from 'lucide-vue-next';

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
        title: 'Sequences',
        href: sequences().url,
    },
    {
        title: props.id ? 'Edit Sequence' : 'Create Sequence',
        href: '#',
    },
];

// Dummy sequence data
const sequence = ref({
    id: props.id || '1',
    name: 'Behavioral Email Sequence (Non-Buyers)',
    description: 'Automated sequence for users who signed up but haven\'t purchased',
    status: 'active',
    emails: [
        {
            id: '1',
            number: 1,
            timing: 'Immediate',
            timingValue: 0,
            timingUnit: 'minutes',
            subject: 'Welcome to Qwaiting - Your Journey Starts Here',
            type: 'welcome',
            content: 'Welcome email content...',
            status: 'active',
        },
        {
            id: '2',
            number: 2,
            timing: '24 hours',
            timingValue: 24,
            timingUnit: 'hours',
            subject: '5 Features That Will Transform Your Customer Experience',
            type: 'feature_highlight',
            content: 'Feature highlight email content...',
            status: 'active',
        },
        {
            id: '3',
            number: 3,
            timing: '48 hours',
            timingValue: 48,
            timingUnit: 'hours',
            subject: 'How {{similar_company}} Reduced Wait Times by 60%',
            type: 'social_proof',
            content: 'Social proof email content...',
            status: 'active',
        },
        {
            id: '4',
            number: 4,
            timing: '72 hours',
            timingValue: 72,
            timingUnit: 'hours',
            subject: 'Your Trial is Halfway Through - Are You Making the Most of It?',
            type: 'trial_reminder',
            content: 'Trial reminder email content...',
            status: 'active',
        },
        {
            id: '5',
            number: 5,
            timing: '96 hours',
            timingValue: 96,
            timingUnit: 'hours',
            subject: '{{first_name}}, Let\'s Talk About Your Queue Management Goals',
            type: 'sales_outreach',
            content: 'Sales outreach email content...',
            status: 'active',
        },
        {
            id: '6',
            number: 6,
            timing: 'Day before trial ends',
            timingValue: 1,
            timingUnit: 'days',
            subject: 'Exclusive: 20% Off Your First Year',
            type: 'offer',
            content: 'Offer email content...',
            status: 'active',
        },
    ],
});

const isEditMode = computed(() => !!props.id);
const expandedEmail = ref<string | null>(null);

const emailTypes = [
    { value: 'welcome', label: 'Welcome' },
    { value: 'feature_highlight', label: 'Feature Highlight' },
    { value: 'social_proof', label: 'Social Proof' },
    { value: 'trial_reminder', label: 'Trial Reminder' },
    { value: 'sales_outreach', label: 'Sales Outreach' },
    { value: 'offer', label: 'Offer' },
];

const timingUnits = [
    { value: 'minutes', label: 'Minutes' },
    { value: 'hours', label: 'Hours' },
    { value: 'days', label: 'Days' },
    { value: 'weeks', label: 'Weeks' },
];

const addEmail = () => {
    const newNumber = sequence.value.emails.length + 1;
    sequence.value.emails.push({
        id: Date.now().toString(),
        number: newNumber,
        timing: '24 hours',
        timingValue: 24,
        timingUnit: 'hours',
        subject: '',
        type: 'welcome',
        content: '',
        status: 'active',
    });
};

const removeEmail = (emailId: string) => {
    if (sequence.value.emails.length > 1) {
        sequence.value.emails = sequence.value.emails.filter(e => e.id !== emailId);
        // Renumber emails
        sequence.value.emails.forEach((email, index) => {
            email.number = index + 1;
        });
    }
};

const toggleEmail = (emailId: string) => {
    expandedEmail.value = expandedEmail.value === emailId ? null : emailId;
};

const getEmailTypeColor = (type: string): string => {
    const colors: Record<string, string> = {
        welcome: 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
        feature_highlight: 'bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-400',
        social_proof: 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
        trial_reminder: 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400',
        sales_outreach: 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-400',
        offer: 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400',
    };
    return colors[type] || 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
};

const handleSave = () => {
    // TODO: Implement save functionality
    console.log('Saving sequence:', sequence.value);
};
</script>

<template>
    <Head :title="isEditMode ? 'Edit Sequence' : 'Create Sequence'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col overflow-hidden bg-background">
            <div class="flex-1 overflow-y-auto">
                <div class="px-3 sm:px-4 lg:px-6 py-3 lg:py-4">
                    <!-- Header -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <Link
                                :href="sequences().url"
                                class="p-2 hover:bg-muted rounded-md transition-colors cursor-pointer"
                            >
                                <ArrowLeft class="size-5 text-muted-foreground" />
                            </Link>
                            <div>
                                <h1 class="text-2xl font-semibold text-foreground">
                                    {{ isEditMode ? 'Edit Sequence' : 'Create Sequence' }}
                                </h1>
                                <p class="mt-1 text-sm text-muted-foreground">
                                    {{ isEditMode ? 'Update email sequence details' : 'Create a new automated email sequence' }}
                                </p>
                            </div>
                        </div>
                        <Button @click="handleSave" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">
                            <Save class="mr-2 size-4" />
                            Save Sequence
                        </Button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Main Content -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Sequence Details -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Sequence Details</h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label for="name" class="mb-1 block text-sm font-medium text-foreground">
                                            Sequence Name <span class="text-red-500">*</span>
                                        </Label>
                                        <Input
                                            id="name"
                                            v-model="sequence.name"
                                            type="text"
                                            placeholder="Enter sequence name"
                                            class="w-full"
                                        />
                                    </div>

                                    <div>
                                        <Label for="description" class="mb-1 block text-sm font-medium text-foreground">
                                            Description
                                        </Label>
                                        <textarea
                                            id="description"
                                            v-model="sequence.description"
                                            rows="3"
                                            placeholder="Enter sequence description"
                                            class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"
                                        ></textarea>
                                    </div>

                                    <div>
                                        <Label for="status" class="mb-1 block text-sm font-medium text-foreground">
                                            Status
                                        </Label>
                                        <select
                                            id="status"
                                            v-model="sequence.status"
                                            class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                        >
                                            <option value="draft">Draft</option>
                                            <option value="active">Active</option>
                                            <option value="paused">Paused</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Sequence -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-semibold text-foreground">Email Sequence</h2>
                                    <Button @click="addEmail" variant="outline" size="sm">
                                        <Plus class="mr-2 size-4" />
                                        Add Email
                                    </Button>
                                </div>

                                <div class="space-y-4">
                                    <div
                                        v-for="email in sequence.emails"
                                        :key="email.id"
                                        class="rounded-md border border-border bg-background"
                                    >
                                        <!-- Email Header -->
                                        <div
                                            class="flex items-center justify-between p-4 cursor-pointer"
                                            @click="toggleEmail(email.id)"
                                        >
                                            <div class="flex items-center gap-4 flex-1">
                                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-muted text-sm font-semibold text-foreground">
                                                    {{ email.number }}
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center gap-2 mb-1">
                                                        <span class="text-sm font-medium text-foreground">{{ email.subject || 'Untitled Email' }}</span>
                                                        <span
                                                            :class="[
                                                                'inline-flex rounded-full px-2 py-0.5 text-xs font-medium',
                                                                getEmailTypeColor(email.type),
                                                            ]"
                                                        >
                                                            {{ emailTypes.find(t => t.value === email.type)?.label || email.type }}
                                                        </span>
                                                    </div>
                                                    <div class="flex items-center gap-2 text-xs text-muted-foreground">
                                                        <Clock class="size-3" />
                                                        <span>{{ email.timing }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <ChevronRight
                                                    :class="[
                                                        'size-5 text-muted-foreground transition-transform',
                                                        expandedEmail === email.id ? 'rotate-90' : '',
                                                    ]"
                                                />
                                                <button
                                                    v-if="sequence.emails.length > 1"
                                                    @click.stop="removeEmail(email.id)"
                                                    class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                    title="Remove Email"
                                                >
                                                    <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Email Details (Expanded) -->
                                        <div v-if="expandedEmail === email.id" class="border-t border-border p-4 space-y-4">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <Label class="mb-1 block text-sm font-medium text-foreground">
                                                        Timing Value
                                                    </Label>
                                                    <Input
                                                        v-model.number="email.timingValue"
                                                        type="number"
                                                        min="0"
                                                        class="w-full"
                                                    />
                                                </div>
                                                <div>
                                                    <Label class="mb-1 block text-sm font-medium text-foreground">
                                                        Timing Unit
                                                    </Label>
                                                    <select
                                                        v-model="email.timingUnit"
                                                        class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                                    >
                                                        <option v-for="unit in timingUnits" :key="unit.value" :value="unit.value">
                                                            {{ unit.label }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div>
                                                <Label class="mb-1 block text-sm font-medium text-foreground">
                                                    Subject Line <span class="text-red-500">*</span>
                                                </Label>
                                                <Input
                                                    v-model="email.subject"
                                                    type="text"
                                                    placeholder="Enter email subject"
                                                    class="w-full"
                                                />
                                            </div>

                                            <div>
                                                <Label class="mb-1 block text-sm font-medium text-foreground">
                                                    Email Type
                                                </Label>
                                                <select
                                                    v-model="email.type"
                                                    class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                                >
                                                    <option v-for="type in emailTypes" :key="type.value" :value="type.value">
                                                        {{ type.label }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div>
                                                <Label class="mb-1 block text-sm font-medium text-foreground">
                                                    Email Content
                                                </Label>
                                                <textarea
                                                    v-model="email.content"
                                                    rows="6"
                                                    placeholder="Enter email content (HTML supported)"
                                                    class="w-full rounded-md border border-border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-6">
                            <!-- Sequence Info -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Sequence Info</h2>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm font-medium text-muted-foreground">Total Emails</p>
                                        <p class="mt-1 text-lg font-semibold text-foreground">{{ sequence.emails.length }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-muted-foreground">Status</p>
                                        <p class="mt-1 text-sm text-foreground capitalize">{{ sequence.status }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tips -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Tips</h2>
                                <ul class="space-y-2 text-sm text-muted-foreground">
                                    <li>• Use variables like {{first_name}} and {{company_name}}</li>
                                    <li>• Set appropriate timing between emails</li>
                                    <li>• Test your sequence before activating</li>
                                    <li>• Monitor performance and adjust as needed</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

