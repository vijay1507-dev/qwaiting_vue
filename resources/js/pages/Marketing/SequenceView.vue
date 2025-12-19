<script setup lang="ts">
import { ref, computed, watch } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { campaigns, sequences } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ArrowLeft, Save, Plus, Trash2, Mail, Clock, ChevronRight, Send, X } from 'lucide-vue-next';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import Quill from 'quill';
import { onMounted, nextTick } from 'vue';

interface EmailTemplate {
    id?: string;
    number: number;
    timingValue: number;
    timingUnit: string;
    subject: string;
    type: string;
    content: string;
    status: string;
}

interface SequenceData {
    id?: string;
    name: string;
    description: string;
    status: string;
    emails: EmailTemplate[];
}

interface TemplateVariable {
    id: string;
    name: string;
    module: string | null;
    description: string | null;
    example_value: string | null;
}

interface Props {
    id?: string;
    sequence?: SequenceData;
    templateVariables?: TemplateVariable[];
}

const props = withDefaults(defineProps<Props>(), {
    id: undefined,
    sequence: undefined,
    templateVariables: () => [],
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Marketing Automation',
        href: campaigns().url,
    },
    {
        title: 'Sequences Notifications',
        href: sequences().url,
    },
    {
        title: props.id ? 'Edit Sequence' : 'Create Sequence',
        href: '#',
    },
];

// Clean HTML content by removing color styles
const cleanHtmlContent = (html: string): string => {
    if (!html) return html;
    
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = html;

    // Remove all color and background-color styles recursively
    const removeColorStyles = (element: HTMLElement) => {
        if (element.style) {
            element.style.removeProperty('color');
            element.style.removeProperty('background-color');
            element.style.removeProperty('background');
        }
        // Remove color attribute if present
        if (element.hasAttribute('color')) {
            element.removeAttribute('color');
        }
        Array.from(element.children).forEach((child) => {
            removeColorStyles(child as HTMLElement);
        });
    };

    removeColorStyles(tempDiv);
    return tempDiv.innerHTML;
};

// Initialize sequence data from props or defaults
const sequence = ref<SequenceData>({
    id: props.sequence?.id,
    name: props.sequence?.name || '',
    description: props.sequence?.description || '',
    status: props.sequence?.status || 'draft',
    emails: props.sequence?.emails && props.sequence.emails.length > 0
        ? props.sequence.emails.map((email, index) => ({
            id: email.id,
            number: email.number || index + 1,
            timingValue: email.timingValue || 0,
            timingUnit: email.timingUnit || 'hours',
            subject: email.subject || '',
            type: email.type || 'welcome',
            content: email.content ? cleanHtmlContent(email.content) : '',
            status: email.status || 'active',
        }))
        : [
            {
                number: 1,
                timingValue: 0,
                timingUnit: 'minutes',
                subject: '',
                type: 'welcome',
                content: '',
                status: 'active',
            },
        ],
});

// Watch for prop changes
watch(() => props.sequence, (newSequence) => {
    if (newSequence) {
        sequence.value = {
            id: newSequence.id,
            name: newSequence.name,
            description: newSequence.description || '',
            status: newSequence.status,
            emails: newSequence.emails.map((email, index) => ({
                id: email.id,
                number: email.number || index + 1,
                timingValue: email.timingValue || 0,
                timingUnit: email.timingUnit || 'hours',
                subject: email.subject || '',
                type: email.type || 'welcome',
                content: email.content ? cleanHtmlContent(email.content) : '',
                status: email.status || 'active',
            })),
        };
    }
}, { immediate: true });

// Watch email content changes to clean color styles
watch(() => sequence.value.emails, (emails) => {
    emails.forEach((email) => {
        if (email.content) {
            const cleaned = cleanHtmlContent(email.content);
            if (cleaned !== email.content) {
                email.content = cleaned;
            }
        }
    });
}, { deep: true });

const isEditMode = computed(() => !!props.id);
const expandedEmail = ref<string | null>(null);

// Group template variables by module
const groupedVariables = computed(() => {
    const groups: Record<string, TemplateVariable[]> = {};
    props.templateVariables?.forEach((variable) => {
        const module = variable.module || 'General';
        if (!groups[module]) {
            groups[module] = [];
        }
        groups[module].push(variable);
    });
    return groups;
});

const emailTypes = [
    { value: 'welcome', label: 'Welcome' },
    { value: 'feature_highlight', label: 'Feature Highlight' },
    { value: 'social_proof', label: 'Social Proof' },
    { value: 'trial_reminder', label: 'Trial Reminder' },
    { value: 'sales_outreach', label: 'Sales Outreach' },
    { value: 'offer', label: 'Offer' },
];

const timingUnits = [
    { value: 'immediate', label: 'Immediate' },
    { value: 'minutes', label: 'Minutes' },
    { value: 'hours', label: 'Hours' },
    { value: 'days', label: 'Days' },
    { value: 'weeks', label: 'Weeks' },
    { value: 'days_before_expiry', label: 'Days Before Expiry' },
    { value: 'on_expired', label: 'On Expired' },
];

// Quill editor toolbar configuration for email template design
const quillToolbar = [
    [{ header: [1, 2, 3, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    [{ list: 'ordered' }, { list: 'bullet' }],
    [{ align: [] }],
    ['link', 'image'],
    [{ color: [] }, { background: [] }],
    ['clean'],
];

// Store editor refs for each email
const editorRefs = ref<Record<string, any>>({});
const copiedVariable = ref<string | null>(null);
const showCopiedNotification = ref(false);

// Test email functionality
const showTestEmailModal = ref(false);
const testEmailForm = ref({
    email: '',
    variables: {} as Record<string, string>,
});
const testEmailLoading = ref(false);
const testEmailTarget = ref<'sequence' | string | null>(null); // 'sequence' for batch, email id for single

// Handle paste event to remove color styles
const handlePaste = (emailId: string) => {
    return (e: ClipboardEvent) => {
        e.preventDefault();
        const editor = editorRefs.value[emailId];
        if (!editor) return;

        const range = editor.getSelection(true);
        const text = e.clipboardData?.getData('text/plain') || '';
        const html = e.clipboardData?.getData('text/html') || '';

        if (html) {
            // Clean the HTML content
            const cleanHtml = cleanHtmlContent(html);

            // Insert cleaned content
            const delta = editor.clipboard.convert(cleanHtml);
            editor.updateContents(delta, 'user');
            editor.setSelection(range.index + delta.length(), 'silent');
        } else if (text) {
            // Plain text fallback
            editor.insertText(range.index, text, 'user');
            editor.setSelection(range.index + text.length, 'silent');
        }
    };
};

// Copy variable to clipboard
const copyVariable = async (variableName: string) => {
    const variableText = `{{${variableName}}}`;
    try {
        await navigator.clipboard.writeText(variableText);
        copiedVariable.value = variableName;
        showCopiedNotification.value = true;
        setTimeout(() => {
            showCopiedNotification.value = false;
        }, 2000);
    } catch (err) {
        console.error('Failed to copy:', err);
    }
};

// Setup editor after mount
const setupEditor = (emailId: string, editor: any) => {
    if (editor) {
        editorRefs.value[emailId] = editor;
        const editorElement = editor.root;
        if (editorElement) {
            // Handle paste for cleaning HTML colors
            editorElement.addEventListener('paste', handlePaste(emailId));
            
            // Add paste handler to insert copied variable (higher priority)
            const variablePasteHandler = (e: ClipboardEvent) => {
                if (copiedVariable.value) {
                    e.preventDefault();
                    e.stopPropagation();
                    const variableText = `{{${copiedVariable.value}}}`;
                    const range = editor.getSelection(true);
                    if (range) {
                        editor.insertText(range.index, variableText, 'user');
                        editor.setSelection(range.index + variableText.length, 'silent');
                        copiedVariable.value = null;
                    }
                    return false;
                }
            };
            
            // Add paste listener with capture to intercept before default handler
            editorElement.addEventListener('paste', variablePasteHandler, true);
            
            // Also handle click to insert if variable is copied (for better UX)
            const clickHandler = () => {
                if (copiedVariable.value) {
                    setTimeout(() => {
                        const range = editor.getSelection(true);
                        if (range) {
                            const variableText = `{{${copiedVariable.value}}}`;
                            editor.insertText(range.index, variableText, 'user');
                            editor.setSelection(range.index + variableText.length, 'silent');
                            copiedVariable.value = null;
                        }
                    }, 100);
                }
            };
            
            editorElement.addEventListener('click', clickHandler);
            
            // Clean existing content when editor is ready
            const currentContent = editor.root.innerHTML;
            if (currentContent) {
                const cleaned = cleanHtmlContent(currentContent);
                if (cleaned !== currentContent) {
                    editor.clipboard.dangerouslyPasteHTML(cleaned);
                }
            }
        }
    }
};

const addEmail = () => {
    const newNumber = sequence.value.emails.length + 1;
    sequence.value.emails.push({
        number: newNumber,
        timingValue: 0,
        timingUnit: 'immediate',
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

const handleTimingUnitChange = (email: EmailTemplate) => {
    if (email.timingUnit === 'immediate') {
        email.timingValue = 0;
    }
};

// Get timing recommendations based on email type
const getTimingRecommendation = (emailType: string): { unit: string; value: number; description: string } => {
    const recommendations: Record<string, { unit: string; value: number; description: string }> = {
        welcome: {
            unit: 'immediate',
            value: 0,
            description: 'Welcome emails are typically sent immediately when a user signs up.',
        },
        feature_highlight: {
            unit: 'hours',
            value: 24,
            description: 'Feature highlights work well 24-48 hours after signup to show value.',
        },
        social_proof: {
            unit: 'hours',
            value: 48,
            description: 'Social proof emails are effective 2-3 days after initial contact.',
        },
        trial_reminder: {
            unit: 'days_before_expiry',
            value: 3,
            description: 'Trial reminders are best sent 3 days before trial ends.',
        },
        sales_outreach: {
            unit: 'days',
            value: 7,
            description: 'Sales outreach emails work well after a week of engagement.',
        },
        offer: {
            unit: 'days',
            value: 1,
            description: 'Offer emails are most effective 1 day before trial ends or subscription expires.',
        },
    };
    
    return recommendations[emailType] || {
        unit: 'hours',
        value: 24,
        description: 'Standard timing recommendation.',
    };
};

// Watch email type changes to suggest timing
const handleEmailTypeChange = (email: EmailTemplate) => {
    const recommendation = getTimingRecommendation(email.type);
    // Only auto-suggest if timing hasn't been customized (value is 0 or immediate)
    if (email.timingValue === 0 && email.timingUnit === 'immediate') {
        email.timingUnit = recommendation.unit;
        email.timingValue = recommendation.value;
    }
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

// Test email functions
const openTestEmailModal = (target: 'sequence' | string) => {
    testEmailTarget.value = target;
    testEmailForm.value = {
        email: '',
        variables: {},
    };
    showTestEmailModal.value = true;
};

const closeTestEmailModal = () => {
    showTestEmailModal.value = false;
    testEmailTarget.value = null;
    testEmailForm.value = {
        email: '',
        variables: {},
    };
    testEmailLoading.value = false;
};

const sendTestEmail = async () => {
    if (!testEmailForm.value.email.trim()) {
        alert('Please enter a test email address');
        return;
    }

    testEmailLoading.value = true;

    try {
        if (testEmailTarget.value === 'sequence') {
            // Send batch test emails for entire sequence
            if (!isEditMode.value || !props.id) {
                alert('Please save the sequence first before testing');
                testEmailLoading.value = false;
                return;
            }

            router.post(`/marketing/sequences/${props.id}/test-batch`, {
                test_email: testEmailForm.value.email,
                test_variables: testEmailForm.value.variables,
            }, {
                preserveScroll: true,
                onSuccess: () => {
                    const page = usePage();
                    const message = (page.props as any).flash?.success || 'Test emails have been queued successfully. Check your email inbox.';
                    alert(message);
                    closeTestEmailModal();
                },
                onError: (errors: any) => {
                    const errorMessage = errors.message || errors.test_email || 'Failed to send test emails';
                    alert(errorMessage);
                },
                onFinish: () => {
                    testEmailLoading.value = false;
                },
            });
        } else {
            // Send test email for single template
            const emailTemplate = sequence.value.emails.find(e => e.id === testEmailTarget.value || `email-${e.number}` === testEmailTarget.value);
            
            if (!emailTemplate || !emailTemplate.id) {
                alert('Email template not found');
                testEmailLoading.value = false;
                return;
            }

            router.post(`/marketing/email-templates/${emailTemplate.id}/test`, {
                test_email: testEmailForm.value.email,
                test_variables: testEmailForm.value.variables,
            }, {
                preserveScroll: true,
                onSuccess: () => {
                    const page = usePage();
                    const message = (page.props as any).flash?.success || 'Test email has been queued successfully. Check your email inbox.';
                    alert(message);
                    closeTestEmailModal();
                },
                onError: (errors: any) => {
                    const errorMessage = errors.message || errors.test_email || 'Failed to send test email';
                    alert(errorMessage);
                },
                onFinish: () => {
                    testEmailLoading.value = false;
                },
            });
        }
    } catch (error) {
        console.error('Error sending test email:', error);
        alert('An error occurred while sending the test email');
        testEmailLoading.value = false;
    }
};

const handleSave = () => {
    // Prepare email data for submission
    const emails = sequence.value.emails.map((email, index) => ({
        sequence_number: email.number || index + 1,
        timing_value: (email.timingUnit === 'immediate' || email.timingUnit === 'days_before_expiry') ? email.timingValue : email.timingValue,
        timing_unit: email.timingUnit,
        subject: email.subject,
        type: email.type,
            content: email.content ? cleanHtmlContent(email.content) : '',
        status: email.status,
    }));

    const formData = {
        name: sequence.value.name,
        description: sequence.value.description || '',
        status: sequence.value.status,
        emails: emails,
    };

    if (isEditMode.value && props.id) {
        router.put(`/marketing/sequences/${props.id}`, formData, {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(sequences().url);
            },
        });
    } else {
        router.post('/marketing/sequences', formData, {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(sequences().url);
            },
        });
    }
};
</script>

<template>
    <Head :title="isEditMode ? 'Edit Sequence' : 'Create Sequence'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <!-- Copied Notification -->
        <div
            v-if="showCopiedNotification"
            class="fixed bottom-4 right-4 z-50 rounded-lg bg-green-500 text-white px-4 py-3 shadow-lg flex items-center gap-2 animate-in slide-in-from-bottom-5"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="font-medium">Copied to clipboard</span>
        </div>
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
                        <div class="flex items-center gap-2">
                            <Button
                                v-if="isEditMode"
                                @click="openTestEmailModal('sequence')"
                                variant="outline"
                                class="px-4 py-2"
                            >
                                <Send class="mr-2 size-4" />
                                Test All Emails
                            </Button>
                            <Button @click="handleSave" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">
                                <Save class="mr-2 size-4" />
                                Save Sequence
                            </Button>
                        </div>
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
                                            @click="toggleEmail(email.id || `email-${email.number}`)"
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
                                                        <span>
                                                            <template v-if="email.timingUnit === 'immediate' || (email.timingValue === 0 && email.timingUnit !== 'days_before_expiry' && email.timingUnit !== 'on_expired')">
                                                                Immediate
                                                            </template>
                                                            <template v-else-if="email.timingUnit === 'days_before_expiry'">
                                                                {{ email.timingValue }} Day{{ email.timingValue !== 1 ? 's' : '' }} Before Expiry
                                                            </template>
                                                            <template v-else-if="email.timingUnit === 'on_expired'">
                                                                On Expired
                                                            </template>
                                                            <template v-else>
                                                                {{ email.timingValue }} {{ email.timingUnit }}
                                                            </template>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <ChevronRight
                                                    :class="[
                                                        'size-5 text-muted-foreground transition-transform',
                                                        expandedEmail === (email.id || `email-${email.number}`) ? 'rotate-90' : '',
                                                    ]"
                                                />
                                                <button
                                                    v-if="isEditMode && email.id"
                                                    @click.stop="openTestEmailModal(email.id || `email-${email.number}`)"
                                                    class="p-1.5 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-md transition-colors cursor-pointer"
                                                    title="Test Email"
                                                >
                                                    <Send class="size-4 text-blue-600 dark:text-blue-400" />
                                                </button>
                                                <button
                                                    v-if="sequence.emails.length > 1"
                                                    @click.stop="removeEmail(email.id || `email-${email.number}`)"
                                                    class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                    title="Remove Email"
                                                >
                                                    <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Email Details (Expanded) -->
                                        <div v-if="expandedEmail === (email.id || `email-${email.number}`)" class="border-t border-border p-4 space-y-4">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <Label class="mb-1 block text-sm font-medium text-foreground">
                                                        Timing Value
                                                    </Label>
                                                    <Input
                                                        v-model.number="email.timingValue"
                                                        type="number"
                                                        min="0"
                                                        :disabled="email.timingUnit === 'immediate'"
                                                        class="w-full"
                                                    />
                                                </div>
                                                <div>
                                                    <Label class="mb-1 block text-sm font-medium text-foreground">
                                                        Timing Unit
                                                    </Label>
                                                    <select
                                                        v-model="email.timingUnit"
                                                        @change="handleTimingUnitChange(email)"
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
                                                    @change="handleEmailTypeChange(email)"
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
                                                <div class="rounded-md border border-border overflow-hidden">
                                                    <QuillEditor
                                                        v-model:content="email.content"
                                                        content-type="html"
                                                        :toolbar="quillToolbar"
                                                        theme="snow"
                                                        placeholder="Enter email content..."
                                                        class="email-editor"
                                                        style="min-height: 300px;"
                                                        @ready="(quill: any) => setupEditor(email.id || `email-${email.number}`, quill)"
                                                    />
                                                </div>
                                                <p class="mt-2 text-xs text-muted-foreground">
                                                    Use the editor above to design your email template. HTML is supported.
                                                </p>
                                            </div>

                                            <div>
                                                <Label class="mb-1 block text-sm font-medium text-foreground">
                                                    Status
                                                </Label>
                                                <select
                                                    v-model="email.status"
                                                    class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                                >
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
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

                            <!-- Available Variables -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-2">Available Variables</h2>
                                <p class="text-xs text-muted-foreground mb-4">
                                    Click on a variable below to copy it and use in your email template.
                                </p>
                                <div class="space-y-4 max-h-[600px] overflow-y-auto">
                                    <div v-for="(variables, module) in groupedVariables" :key="module" class="space-y-2">
                                        <h3 class="text-sm font-medium text-foreground capitalize">{{ module }}</h3>
                                        <div class="flex flex-wrap gap-2">
                                            <button
                                                v-for="variable in variables"
                                                :key="variable.id"
                                                @click="copyVariable(variable.name)"
                                                :class="[
                                                    'px-3 py-1.5 text-xs font-medium rounded-full border transition-colors cursor-pointer',
                                                    copiedVariable === variable.name
                                                        ? 'bg-blue-100 dark:bg-blue-900/30 border-blue-300 dark:border-blue-700 text-blue-800 dark:text-blue-300'
                                                        : 'bg-background border-border text-foreground hover:bg-muted hover:border-border'
                                                ]"
                                                :title="variable.description || variable.name"
                                            >
                                                {{ variable.name }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tips -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Tips</h2>
                                <ul class="space-y-2 text-sm text-muted-foreground">
                                    <li>• Click a variable above to copy it, then click in the editor to paste</li>
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

    <!-- Test Email Modal -->
    <div
        v-if="showTestEmailModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        @click.self="closeTestEmailModal"
    >
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-xl w-full max-w-md mx-4">
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-border px-6 py-4">
                <h2 class="text-lg font-semibold text-foreground">
                    {{ testEmailTarget === 'sequence' ? 'Test All Emails' : 'Test Email' }}
                </h2>
                <button
                    @click="closeTestEmailModal"
                    class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                >
                    <X class="size-5 text-muted-foreground" />
                </button>
            </div>

            <!-- Content -->
            <div class="p-6 space-y-4">
                <div>
                    <Label class="mb-1 block text-sm font-medium text-foreground">
                        Test Email Address <span class="text-red-500">*</span>
                    </Label>
                    <Input
                        v-model="testEmailForm.email"
                        type="email"
                        placeholder="test@example.com"
                        class="w-full"
                    />
                    <p class="mt-1 text-xs text-muted-foreground">
                        Enter the email address where you want to receive test emails
                    </p>
                </div>

                <div v-if="testEmailTarget === 'sequence'">
                    <p class="text-sm text-muted-foreground">
                        This will send test emails for all active email templates in this sequence.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex items-center justify-end gap-3 border-t border-border px-6 py-4">
                <Button
                    variant="outline"
                    @click="closeTestEmailModal"
                    :disabled="testEmailLoading"
                >
                    Cancel
                </Button>
                <Button
                    @click="sendTestEmail"
                    :disabled="testEmailLoading || !testEmailForm.email.trim()"
                    class="bg-blue-600 hover:bg-blue-700 text-white"
                >
                    <Send v-if="!testEmailLoading" class="mr-2 size-4" />
                    <span v-if="testEmailLoading">Sending...</span>
                    <span v-else>Send Test Email</span>
                </Button>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Custom styles for Quill editor in dark mode */
.email-editor :deep(.ql-container) {
    background-color: hsl(var(--background));
    color: hsl(var(--foreground));
    font-family: inherit;
}

.email-editor :deep(.ql-container.ql-snow) {
    border: 1px solid hsl(var(--border));
    border-top: none;
}

.email-editor :deep(.ql-editor) {
    min-height: 300px;
    color: hsl(var(--foreground)) !important;
    background-color: hsl(var(--background));
}

/* Ensure all text content in editor is visible */
.email-editor :deep(.ql-editor p),
.email-editor :deep(.ql-editor div),
.email-editor :deep(.ql-editor span),
.email-editor :deep(.ql-editor li),
.email-editor :deep(.ql-editor td),
.email-editor :deep(.ql-editor th) {
    color: hsl(var(--foreground)) !important;
}

/* Headings visibility */
.email-editor :deep(.ql-editor h1),
.email-editor :deep(.ql-editor h2),
.email-editor :deep(.ql-editor h3),
.email-editor :deep(.ql-editor h4),
.email-editor :deep(.ql-editor h5),
.email-editor :deep(.ql-editor h6) {
    color: hsl(var(--foreground)) !important;
}

/* Links visibility */
.email-editor :deep(.ql-editor a) {
    color: hsl(var(--primary)) !important;
}

.email-editor :deep(.ql-editor a:hover) {
    color: hsl(var(--primary) / 0.8) !important;
}

/* Lists visibility */
.email-editor :deep(.ql-editor ul),
.email-editor :deep(.ql-editor ol) {
    color: hsl(var(--foreground)) !important;
}

.email-editor :deep(.ql-editor.ql-blank::before) {
    color: hsl(var(--muted-foreground));
    font-style: normal;
}

/* Override any inline styles that might cause low contrast - more aggressive */
.email-editor :deep(.ql-editor [style*="color"]),
.email-editor :deep(.ql-editor [style*="Color"]),
.email-editor :deep(.ql-editor [style*="COLOR"]) {
    color: hsl(var(--foreground)) !important;
}

/* Remove color from all style attributes */
.email-editor :deep(.ql-editor [style]) {
    color: hsl(var(--foreground)) !important;
}

/* Target specific color values that are problematic in dark mode */
.email-editor :deep(.ql-editor [style*="rgb(0, 0, 0)"]),
.email-editor :deep(.ql-editor [style*="rgb(0,0,0)"]),
.email-editor :deep(.ql-editor [style*="#000"]),
.email-editor :deep(.ql-editor [style*="#000000"]),
.email-editor :deep(.ql-editor [style*="black"]) {
    color: hsl(var(--foreground)) !important;
}

/* Override font color attribute if present */
.email-editor :deep(.ql-editor [color]) {
    color: hsl(var(--foreground)) !important;
}

/* More aggressive overrides for pasted content */
.email-editor :deep(.ql-editor *[style*="rgb"]),
.email-editor :deep(.ql-editor *[style*="rgba"]),
.email-editor :deep(.ql-editor *[style*="hsl"]),
.email-editor :deep(.ql-editor *[style*="hsla"]) {
    color: hsl(var(--foreground)) !important;
}

/* Remove color from font tags */
.email-editor :deep(.ql-editor font[color]) {
    color: hsl(var(--foreground)) !important;
}

/* Ensure all text nodes are visible */
.email-editor :deep(.ql-editor) {
    --ql-text-color: hsl(var(--foreground));
}

.email-editor :deep(.ql-editor *) {
    --ql-text-color: hsl(var(--foreground));
}

/* Force text color on all elements recursively */
.email-editor :deep(.ql-editor),
.email-editor :deep(.ql-editor *:not(script):not(style)) {
    color: hsl(var(--foreground)) !important;
}

/* Specific overrides for common problematic styles */
.email-editor :deep(.ql-editor [style*="color: rgb(0, 0, 0)"]),
.email-editor :deep(.ql-editor [style*="color:rgb(0,0,0)"]),
.email-editor :deep(.ql-editor [style*="color: #000"]),
.email-editor :deep(.ql-editor [style*="color:#000"]),
.email-editor :deep(.ql-editor [style*="color: #000000"]),
.email-editor :deep(.ql-editor [style*="color:#000000"]),
.email-editor :deep(.ql-editor [style*="color: black"]),
.email-editor :deep(.ql-editor [style*="color:black"]) {
    color: hsl(var(--foreground)) !important;
}

/* Ensure strong and emphasis tags are visible */
.email-editor :deep(.ql-editor strong),
.email-editor :deep(.ql-editor b) {
    color: hsl(var(--foreground)) !important;
    font-weight: 600;
}

.email-editor :deep(.ql-editor em),
.email-editor :deep(.ql-editor i) {
    color: hsl(var(--foreground)) !important;
}

.email-editor :deep(.ql-editor u) {
    color: hsl(var(--foreground)) !important;
    text-decoration-color: hsl(var(--foreground));
}

/* Force all content to use foreground color unless explicitly styled */
.email-editor :deep(.ql-editor *) {
    color: inherit;
}

.email-editor :deep(.ql-editor) {
    color: hsl(var(--foreground)) !important;
}

/* Ensure text selection is visible */
.email-editor :deep(.ql-editor ::selection) {
    background-color: hsl(var(--primary) / 0.3);
    color: hsl(var(--foreground));
}

/* Override any Quill default styles */
.email-editor :deep(.ql-editor.ql-snow) {
    color: hsl(var(--foreground)) !important;
}

/* Ensure placeholder text is visible */
.email-editor :deep(.ql-editor.ql-blank::before) {
    color: hsl(var(--muted-foreground)) !important;
    opacity: 1;
}

.email-editor :deep(.ql-toolbar) {
    background-color: hsl(var(--card));
    border-color: hsl(var(--border));
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
    padding: 8px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 4px;
}

.email-editor :deep(.ql-toolbar.ql-snow) {
    border: 1px solid hsl(var(--border));
    border-bottom: none;
    background-color: hsl(var(--card)) !important;
}

/* Toolbar buttons - ensure visibility */
.email-editor :deep(.ql-snow .ql-toolbar button) {
    width: 28px;
    height: 28px;
    padding: 4px;
    margin: 0;
    border-radius: 4px;
    background-color: transparent;
    border: 1px solid transparent;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.email-editor :deep(.ql-snow .ql-toolbar button:hover) {
    background-color: hsl(var(--muted));
    border-color: hsl(var(--border));
}

.email-editor :deep(.ql-snow .ql-toolbar button.ql-active) {
    background-color: hsl(var(--muted));
    border-color: hsl(var(--border));
}

.email-editor :deep(.ql-snow .ql-toolbar button:focus) {
    outline: 2px solid hsl(var(--ring));
    outline-offset: 2px;
}

/* Icon strokes and fills - ensure high contrast */
.email-editor :deep(.ql-snow .ql-stroke) {
    stroke: hsl(var(--foreground));
    stroke-width: 1.5;
    opacity: 1 !important;
}

.email-editor :deep(.ql-snow .ql-fill) {
    fill: hsl(var(--foreground));
    opacity: 1 !important;
}

.email-editor :deep(.ql-snow .ql-stroke.ql-thin) {
    stroke-width: 1;
}

/* Ensure SVG icons are visible */
.email-editor :deep(.ql-snow .ql-toolbar button svg) {
    opacity: 1 !important;
    display: block;
    width: 18px;
    height: 18px;
}

.email-editor :deep(.ql-snow .ql-toolbar button:hover svg .ql-stroke) {
    stroke: hsl(var(--foreground));
    opacity: 1 !important;
}

.email-editor :deep(.ql-snow .ql-toolbar button:hover svg .ql-fill) {
    fill: hsl(var(--foreground));
    opacity: 1 !important;
}

.email-editor :deep(.ql-snow .ql-toolbar button.ql-active svg .ql-stroke) {
    stroke: hsl(var(--primary));
    opacity: 1 !important;
}

.email-editor :deep(.ql-snow .ql-toolbar button.ql-active svg .ql-fill) {
    fill: hsl(var(--primary));
    opacity: 1 !important;
}

/* Picker labels and dropdowns */
.email-editor :deep(.ql-snow .ql-picker-label) {
    color: hsl(var(--foreground));
    padding: 4px 8px;
    border-radius: 4px;
    border: 1px solid transparent;
}

.email-editor :deep(.ql-snow .ql-picker-label:hover) {
    background-color: hsl(var(--muted));
    border-color: hsl(var(--border));
}

.email-editor :deep(.ql-snow .ql-picker-label.ql-active) {
    background-color: hsl(var(--muted));
    border-color: hsl(var(--border));
}

.email-editor :deep(.ql-snow .ql-picker-options) {
    background-color: hsl(var(--card));
    border-color: hsl(var(--border));
    border-radius: 0.375rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.email-editor :deep(.ql-snow .ql-picker-item) {
    color: hsl(var(--foreground));
    padding: 8px 12px;
}

.email-editor :deep(.ql-snow .ql-picker-item:hover) {
    background-color: hsl(var(--muted));
    color: hsl(var(--foreground));
}

.email-editor :deep(.ql-snow .ql-picker-item.ql-selected) {
    background-color: hsl(var(--primary) / 0.1);
    color: hsl(var(--primary));
}

/* Ensure separator lines are visible */
.email-editor :deep(.ql-snow .ql-toolbar .ql-formats) {
    margin-right: 4px;
    display: inline-flex;
    align-items: center;
    gap: 2px;
}

.email-editor :deep(.ql-snow .ql-toolbar .ql-formats:not(:last-child)) {
    margin-right: 8px;
    padding-right: 8px;
    border-right: 1px solid hsl(var(--border));
}

/* Color picker and background picker */
.email-editor :deep(.ql-snow .ql-picker.ql-color .ql-picker-label),
.email-editor :deep(.ql-snow .ql-picker.ql-background .ql-picker-label) {
    width: 28px;
    height: 28px;
}

/* Ensure all toolbar elements have proper spacing */
.email-editor :deep(.ql-snow .ql-toolbar .ql-formats) {
    display: inline-flex;
    align-items: center;
    gap: 2px;
}

/* Override any default Quill styles that might hide icons */
.email-editor :deep(.ql-snow .ql-toolbar .ql-picker) {
    color: hsl(var(--foreground));
}

.email-editor :deep(.ql-snow .ql-toolbar .ql-picker svg) {
    opacity: 1 !important;
}

.email-editor :deep(.ql-snow .ql-toolbar .ql-picker svg .ql-stroke) {
    stroke: hsl(var(--foreground));
    opacity: 1 !important;
}

.email-editor :deep(.ql-snow .ql-toolbar .ql-picker svg .ql-fill) {
    fill: hsl(var(--foreground));
    opacity: 1 !important;
}
</style>

