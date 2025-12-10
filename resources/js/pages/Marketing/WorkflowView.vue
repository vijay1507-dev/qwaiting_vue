<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as marketingIndex, workflows } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ArrowLeft, Save, Plus, Trash2, Zap, Settings } from 'lucide-vue-next';

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
        title: 'Workflows',
        href: workflows().url,
    },
    {
        title: props.id ? 'Edit Workflow' : 'Create Workflow',
        href: '#',
    },
];

// Dummy workflow data
const workflow = ref({
    id: props.id || '1',
    name: 'User Sign Up Workflow',
    trigger: 'User signs up',
    triggerConditions: {
        event: 'user.signup',
        conditions: [],
    },
    actions: [
        {
            id: '1',
            type: 'add_to_sequence',
            sequenceId: '1',
            sequenceName: 'Welcome Series - New Users',
        },
        {
            id: '2',
            type: 'assign_to_sales',
            condition: 'high_score',
            scoreThreshold: 80,
        },
    ],
    status: 'active',
    executions: 1250,
    lastExecuted: '2025-03-21 11:30AM',
});

const isEditMode = computed(() => !!props.id);

const triggerOptions = [
    { value: 'user.signup', label: 'User signs up' },
    { value: 'user.inactive', label: 'User inactive 7+ days' },
    { value: 'pricing.views', label: 'Views pricing page 3+ times' },
    { value: 'subscription.due', label: 'Subscription due in 7 days' },
    { value: 'cart.abandoned', label: 'Cart abandoned' },
    { value: 'trial.ending', label: 'Trial ending in 3 days' },
    { value: 'payment.failed', label: 'Payment failed' },
    { value: 'nps.low', label: 'NPS score < 7' },
];

const actionTypes = [
    { value: 'add_to_sequence', label: 'Add to Email Sequence' },
    { value: 'assign_to_sales', label: 'Assign to Sales' },
    { value: 'send_email', label: 'Send Email' },
    { value: 'send_sms', label: 'Send SMS' },
    { value: 'notify_cs', label: 'Notify Customer Success' },
    { value: 'update_tag', label: 'Update Tag' },
    { value: 'create_task', label: 'Create Task' },
];

const addAction = () => {
    workflow.value.actions.push({
        id: Date.now().toString(),
        type: 'send_email',
        sequenceId: '',
        sequenceName: '',
        condition: '',
        scoreThreshold: 0,
    });
};

const removeAction = (actionId: string) => {
    workflow.value.actions = workflow.value.actions.filter(a => a.id !== actionId);
};

const handleSave = () => {
    // TODO: Implement save functionality
    console.log('Saving workflow:', workflow.value);
};
</script>

<template>
    <Head :title="isEditMode ? 'Edit Workflow' : 'Create Workflow'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col overflow-hidden bg-background">
            <div class="flex-1 overflow-y-auto">
                <div class="px-3 sm:px-4 lg:px-6 py-3 lg:py-4">
                    <!-- Header -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <Link
                                :href="workflows().url"
                                class="p-2 hover:bg-muted rounded-md transition-colors cursor-pointer"
                            >
                                <ArrowLeft class="size-5 text-muted-foreground" />
                            </Link>
                            <div>
                                <h1 class="text-2xl font-semibold text-foreground">
                                    {{ isEditMode ? 'Edit Workflow' : 'Create Workflow' }}
                                </h1>
                                <p class="mt-1 text-sm text-muted-foreground">
                                    {{ isEditMode ? 'Update workflow trigger and actions' : 'Set up automated workflow triggers' }}
                                </p>
                            </div>
                        </div>
                        <Button @click="handleSave" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">
                            <Save class="mr-2 size-4" />
                            Save Workflow
                        </Button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Main Content -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Workflow Details -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Workflow Details</h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label for="name" class="mb-1 block text-sm font-medium text-foreground">
                                            Workflow Name <span class="text-red-500">*</span>
                                        </Label>
                                        <Input
                                            id="name"
                                            v-model="workflow.name"
                                            type="text"
                                            placeholder="Enter workflow name"
                                            class="w-full"
                                        />
                                    </div>

                                    <div>
                                        <Label for="trigger" class="mb-1 block text-sm font-medium text-foreground">
                                            Trigger Event <span class="text-red-500">*</span>
                                        </Label>
                                        <select
                                            id="trigger"
                                            v-model="workflow.triggerConditions.event"
                                            class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                        >
                                            <option v-for="option in triggerOptions" :key="option.value" :value="option.value">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <Label for="status" class="mb-1 block text-sm font-medium text-foreground">
                                            Status
                                        </Label>
                                        <select
                                            id="status"
                                            v-model="workflow.status"
                                            class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                        >
                                            <option value="draft">Draft</option>
                                            <option value="active">Active</option>
                                            <option value="paused">Paused</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-semibold text-foreground">Actions</h2>
                                    <Button @click="addAction" variant="outline" size="sm">
                                        <Plus class="mr-2 size-4" />
                                        Add Action
                                    </Button>
                                </div>

                                <div class="space-y-4">
                                    <div
                                        v-for="action in workflow.actions"
                                        :key="action.id"
                                        class="rounded-md border border-border bg-background p-4"
                                    >
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="flex items-center gap-2">
                                                <Zap class="size-4 text-yellow-600 dark:text-yellow-400" />
                                                <span class="text-sm font-medium text-foreground">Action</span>
                                            </div>
                                            <button
                                                v-if="workflow.actions.length > 1"
                                                @click="removeAction(action.id)"
                                                class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                title="Remove Action"
                                            >
                                                <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                            </button>
                                        </div>

                                        <div class="space-y-4">
                                            <div>
                                                <Label class="mb-1 block text-sm font-medium text-foreground">
                                                    Action Type <span class="text-red-500">*</span>
                                                </Label>
                                                <select
                                                    v-model="action.type"
                                                    class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                                >
                                                    <option v-for="type in actionTypes" :key="type.value" :value="type.value">
                                                        {{ type.label }}
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- Conditional fields based on action type -->
                                            <div v-if="action.type === 'add_to_sequence'">
                                                <Label class="mb-1 block text-sm font-medium text-foreground">
                                                    Email Sequence
                                                </Label>
                                                <select
                                                    v-model="action.sequenceId"
                                                    class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                                >
                                                    <option value="1">Welcome Series - New Users</option>
                                                    <option value="2">Lead Nurturing Journey - Enterprise</option>
                                                </select>
                                            </div>

                                            <div v-if="action.type === 'assign_to_sales'">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <Label class="mb-1 block text-sm font-medium text-foreground">
                                                            Condition
                                                        </Label>
                                                        <select
                                                            v-model="action.condition"
                                                            class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                                        >
                                                            <option value="high_score">High Score</option>
                                                            <option value="always">Always</option>
                                                            <option value="custom">Custom Condition</option>
                                                        </select>
                                                    </div>
                                                    <div v-if="action.condition === 'high_score'">
                                                        <Label class="mb-1 block text-sm font-medium text-foreground">
                                                            Score Threshold
                                                        </Label>
                                                        <Input
                                                            v-model.number="action.scoreThreshold"
                                                            type="number"
                                                            min="0"
                                                            max="100"
                                                            class="w-full"
                                                        />
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-if="action.type === 'send_email'">
                                                <Label class="mb-1 block text-sm font-medium text-foreground">
                                                    Email Template
                                                </Label>
                                                <select
                                                    class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                                >
                                                    <option value="">Select template</option>
                                                    <option value="welcome">Welcome Email</option>
                                                    <option value="trial_ending">Trial Ending</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-6">
                            <!-- Workflow Info -->
                            <div v-if="isEditMode" class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Workflow Stats</h2>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm font-medium text-muted-foreground">Total Executions</p>
                                        <p class="mt-1 text-lg font-semibold text-foreground">{{ workflow.executions }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-muted-foreground">Last Executed</p>
                                        <p class="mt-1 text-sm text-foreground">{{ workflow.lastExecuted }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Trigger Preview -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Trigger Preview</h2>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <Zap class="size-4 text-yellow-600 dark:text-yellow-400" />
                                        <span class="text-sm text-foreground">
                                            {{ triggerOptions.find(t => t.value === workflow.triggerConditions.event)?.label || workflow.trigger }}
                                        </span>
                                    </div>
                                    <div class="mt-4 pt-4 border-t border-border">
                                        <p class="text-sm font-medium text-muted-foreground mb-2">Then:</p>
                                        <div class="space-y-2">
                                            <div
                                                v-for="action in workflow.actions"
                                                :key="action.id"
                                                class="text-sm text-foreground"
                                            >
                                                • {{ actionTypes.find(t => t.value === action.type)?.label }}
                                            </div>
                                        </div>
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

