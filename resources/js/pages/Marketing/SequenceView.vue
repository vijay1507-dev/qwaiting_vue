<script setup lang="ts">
import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { campaigns, sequences } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import type { IJodit } from 'jodit';
import { JoditEditor } from 'jodit-vue';
import 'jodit/es2021/jodit.min.css';
import {
    ArrowLeft,
    ChevronRight,
    Clock,
    Plus,
    Save,
    Send,
    Trash2,
    X,
} from 'lucide-vue-next';
import { computed, nextTick, ref, watch } from 'vue';

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
    target_user_type?: string;
    signup_users_days_window?: number | null;
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

// Clean HTML content - now disabled since we're using full HTML templates
// Keeping function for backward compatibility but it just returns the HTML as-is
const cleanHtmlContent = (html: string): string => {
    if (!html) return html;
    // Return HTML as-is - no cleaning since we're using full HTML templates
    return html;
};

// Initialize sequence data from props or defaults
const sequence = ref<SequenceData>({
    id: props.sequence?.id,
    name: props.sequence?.name || '',
    description: props.sequence?.description || '',
    status: props.sequence?.status || 'draft',
    target_user_type: props.sequence?.target_user_type || 'trial_users',
    signup_users_days_window: props.sequence?.signup_users_days_window ?? null,
    emails:
        props.sequence?.emails && props.sequence.emails.length > 0
            ? props.sequence.emails.map((email, index) => ({
                  id: email.id,
                  number: email.number || index + 1,
                  timingValue: email.timingValue || 0,
                  timingUnit: email.timingUnit || 'hours',
                  subject: email.subject || '',
                  type: email.type || 'welcome',
                  content: email.content || '',
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
watch(
    () => props.sequence,
    (newSequence) => {
        if (newSequence) {
            sequence.value = {
                id: newSequence.id,
                name: newSequence.name,
                description: newSequence.description || '',
                status: newSequence.status,
                target_user_type: newSequence.target_user_type || 'trial_users',
                signup_users_days_window:
                    newSequence.signup_users_days_window ?? null,
                emails: newSequence.emails.map((email, index) => ({
                    id: email.id,
                    number: email.number || index + 1,
                    timingValue: email.timingValue || 0,
                    timingUnit: email.timingUnit || 'hours',
                    subject: email.subject || '',
                    type: email.type || 'welcome',
                    content: email.content || '',
                    status: email.status || 'active',
                })),
            };
        }
    },
    { immediate: true },
);

// Watch email content changes - no longer cleaning styles since we're using full HTML templates
// watch(() => sequence.value.emails, (emails) => {
//     emails.forEach((email) => {
//         if (email.content) {
//             const cleaned = cleanHtmlContent(email.content);
//             if (cleaned !== email.content) {
//                 email.content = cleaned;
//             }
//         }
//     });
// }, { deep: true });

const isEditMode = computed(() => !!props.id);
const expandedEmail = ref<string | null>(null);

// Watch target_user_type changes and reset invalid timing units
watch(
    () => sequence.value.target_user_type,
    (newType, oldType) => {
        if (newType !== oldType && oldType) {
            const invalidTimingUnits = ['days_before_expiry', 'on_expired'];
            const targetType = newType || 'trial_users';

            // If switching to incomplete_signups or paid_users, reset expiry-based timing units
            if (
                targetType === 'incomplete_signups' ||
                targetType === 'paid_users'
            ) {
                sequence.value.emails.forEach((email) => {
                    if (invalidTimingUnits.includes(email.timingUnit)) {
                        email.timingUnit = 'days';
                        if (email.timingValue === 0) {
                            email.timingValue = 1;
                        }
                    }

                    // If email type is NOT "Signup Nudge", ensure no event-based timing units
                    if (email.type !== 'signup_nudge') {
                        const eventBasedUnits = [
                            'on_signup',
                            'on_verification',
                            'if_not_verified',
                            'after_verification',
                            'incomplete_registration',
                        ];
                        if (eventBasedUnits.includes(email.timingUnit)) {
                            email.timingUnit = 'days';
                            if (email.timingValue === 0) {
                                email.timingValue = 1;
                            }
                        }
                    }
                });
            }
        }
    },
);

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

const allEmailTypes = [
    { value: 'welcome', label: 'Welcome' },
    { value: 'feature_highlight', label: 'Feature Highlight' },
    { value: 'social_proof', label: 'Social Proof' },
    { value: 'trial_reminder', label: 'Trial Reminder' },
    { value: 'sales_outreach', label: 'Sales Outreach' },
    { value: 'offer', label: 'Offer' },
    { value: 'registeration_complete', label: 'Registration Complete' },
    { value: 'signup_nudge', label: 'Signup Nudge' },
    { value: 'upsell', label: 'Upsell' },
    { value: 'renewal_reminder', label: 'Renewal Reminder' },
    { value: 'feature_update', label: 'Feature Update' },
    { value: 'feedback_request', label: 'Feedback Request' },
    { value: 'loyalty_reward', label: 'Loyalty Reward' },
];

// Filter email types based on target user type
const emailTypes = computed(() => {
    const targetType = sequence.value.target_user_type || 'trial_users';

    switch (targetType) {
        case 'incomplete_signups':
            return allEmailTypes.filter((type) =>
                [
                    'welcome',
                    'registeration_complete',
                    'signup_nudge',
                    'feature_highlight',
                    'social_proof',
                ].includes(type.value),
            );
        case 'trial_users':
            return allEmailTypes.filter((type) =>
                [
                    'welcome',
                    'feature_highlight',
                    'social_proof',
                    'trial_reminder',
                    'offer',
                    'sales_outreach',
                ].includes(type.value),
            );
        case 'paid_users':
            return allEmailTypes.filter((type) =>
                [
                    'welcome',
                    'upsell',
                    'renewal_reminder',
                    'feature_update',
                    'feedback_request',
                    'loyalty_reward',
                    'offer',
                ].includes(type.value),
            );
        case 'all_users':
        default:
            return allEmailTypes;
    }
});

const allTimingUnits = [
    { value: 'immediate', label: 'Immediate' },
    { value: 'minutes', label: 'Minutes' },
    { value: 'hours', label: 'Hours' },
    { value: 'days', label: 'Days' },
    { value: 'weeks', label: 'Weeks' },
    { value: 'days_before_expiry', label: 'Days Before Expiry' },
    { value: 'on_expired', label: 'On Expired' },
    { value: 'on_signup', label: 'On Signup (Event)' },
    { value: 'on_verification', label: 'On Verification (Event)' },
    { value: 'if_not_verified', label: 'If Not Verified (Event)' },
    { value: 'after_verification', label: 'After Verification (Event)' },
    {
        value: 'incomplete_registration',
        label: 'Incomplete Registration (Event)',
    },
];

// Get timing units for a specific email based on target user type and email type
const getTimingUnitsForEmail = (email: EmailTemplate) => {
    const targetType = sequence.value.target_user_type || 'trial_users';
    let filteredUnits = [...allTimingUnits];
    const eventBasedUnits = [
        'on_signup',
        'on_verification',
        'if_not_verified',
        'after_verification',
        'incomplete_registration',
    ];

    // Show event-based options ONLY when email type is "Signup Nudge" (signup_nudge)
    const shouldShowEventBased = email.type === 'signup_nudge';

    // For incomplete_signups, show event-based timing units and exclude expiry-based
    if (targetType === 'incomplete_signups') {
        filteredUnits = filteredUnits.filter(
            (unit) =>
                !['days_before_expiry', 'on_expired'].includes(unit.value),
        );

        // Hide event-based options unless email type is signup_nudge
        if (!shouldShowEventBased) {
            filteredUnits = filteredUnits.filter(
                (unit) => !eventBasedUnits.includes(unit.value),
            );
        }
    }

    // For paid_users, exclude expiry-based and event-based timing units
    if (targetType === 'paid_users') {
        filteredUnits = filteredUnits.filter(
            (unit) =>
                ![
                    'days_before_expiry',
                    'on_expired',
                    ...eventBasedUnits,
                ].includes(unit.value),
        );
    }

    // trial_users and all_users can use time-based timing units
    if (targetType === 'trial_users' || targetType === 'all_users') {
        // Hide event-based options unless email type is signup_nudge
        if (!shouldShowEventBased) {
            filteredUnits = filteredUnits.filter(
                (unit) => !eventBasedUnits.includes(unit.value),
            );
        }
    }

    return filteredUnits;
};

// Filter timing units based on target user type (for backward compatibility)
const timingUnits = computed(() => {
    const targetType = sequence.value.target_user_type || 'trial_users';

    // For incomplete_signups, show event-based timing units and exclude expiry-based
    if (targetType === 'incomplete_signups') {
        return allTimingUnits.filter(
            (unit) =>
                !['days_before_expiry', 'on_expired'].includes(unit.value),
        );
    }

    // For paid_users, exclude expiry-based and event-based timing units
    if (targetType === 'paid_users') {
        return allTimingUnits.filter(
            (unit) =>
                ![
                    'days_before_expiry',
                    'on_expired',
                    'on_signup',
                    'on_verification',
                    'if_not_verified',
                    'after_verification',
                    'incomplete_registration',
                ].includes(unit.value),
        );
    }

    // trial_users and all_users can use time-based timing units (exclude event-based)
    return allTimingUnits.filter(
        (unit) =>
            ![
                'on_signup',
                'on_verification',
                'if_not_verified',
                'after_verification',
                'incomplete_registration',
            ].includes(unit.value),
    );
});

// Jodit editor configuration for email template design
const joditConfig = {
    readonly: false,
    toolbar: true,
    toolbarButtonSize: 'middle',
    buttons: [
        'bold',
        'italic',
        'underline',
        'strikethrough',
        '|',
        'ul',
        'ol',
        '|',
        'outdent',
        'indent',
        '|',
        'font',
        'fontsize',
        'paragraph',
        '|',
        'image',
        'link',
        '|',
        'align',
        '|',
        'undo',
        'redo',
        '|',
        'hr',
        'eraser',
        'fullsize',
        'source',
    ],
    height: 300,
    placeholder: 'Enter email content...',
    removeButtons: ['brush', 'file'],
    showCharsCounter: false,
    showWordsCounter: false,
    showXPathInStatusbar: false,
    // Disable HTML cleaning to preserve button formatting
    cleanHTML: false,
    // Don't remove any attributes or styles
    removeEmptyBlocks: false,
    // Preserve all styles and formatting
    cleanSpaces: false,
    // Allow inline styles (critical for email templates)
    allowInlineStyles: true,
    // Preserve button structure - don't wrap in paragraphs
    enter: 'P',
    enterBlock: 'DIV',
    // Allow all HTML tags
    allowTags: {
        button: true,
        a: true,
        table: true,
        tr: true,
        td: true,
        th: true,
        tbody: true,
        thead: true,
        tfoot: true,
        div: true,
        span: true,
        p: true,
        img: true,
        h1: true,
        h2: true,
        h3: true,
        h4: true,
        h5: true,
        h6: true,
        ul: true,
        ol: true,
        li: true,
        strong: true,
        em: true,
        u: true,
        s: true,
        br: true,
        hr: true,
        style: true,
    },
    // Preserve all attributes on elements
    allowAttributes: {
        style: true,
        class: true,
        id: true,
        href: true,
        src: true,
        alt: true,
        width: true,
        height: true,
        border: true,
        cellpadding: true,
        cellspacing: true,
        role: true,
        align: true,
        bgcolor: true,
        color: true,
        target: true,
        onclick: true,
        type: true,
        value: true,
    },
};

// Store editor refs for each email
const editorRefs = ref<Record<string, IJodit>>({});
const editorComponentRefs = ref<Record<string, any>>({});

// Watch for editor components to be ready
watch(
    editorComponentRefs,
    (refs) => {
        Object.keys(refs).forEach((emailId) => {
            if (refs[emailId] && !editorRefs.value[emailId]) {
                setupEditor(emailId);
            }
        });
    },
    { deep: true },
);
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

// Delete confirmation modal
const showDeleteEmailModal = ref(false);
const emailToDelete = ref<string | null>(null);

// Handle paste event - now preserving all styles
const handlePaste = (emailId: string, html: string) => {
    const editor = editorRefs.value[emailId];
    if (!editor) return html;

    // Return HTML as-is - preserve all styles and attributes
    return html;
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
const setupEditor = (emailId: string) => {
    nextTick(() => {
        const editorComponent = editorComponentRefs.value[emailId];
        if (!editorComponent) return;

        // Try different ways to access the editor instance
        const editor =
            (editorComponent as any).jodit ||
            (editorComponent as any).$jodit ||
            (editorComponent as any).editor;

        if (editor && !editorRefs.value[emailId]) {
            editorRefs.value[emailId] = editor as IJodit;

            // Handle paste - preserving all HTML and styles
            editor.events.on('beforePaste', (html: string) => {
                return handlePaste(emailId, html);
            });

            // Prevent Jodit from modifying button elements
            editor.events.on('beforeCommand', (command: string) => {
                const selection = editor.selection.current();
                if (selection) {
                    const button = selection.closest(
                        'button, a[role="button"], .button, [class*="button"]',
                    );
                    if (
                        button &&
                        (command === 'bold' ||
                            command === 'italic' ||
                            command === 'underline' ||
                            command === 'removeFormat')
                    ) {
                        return false; // Prevent formatting buttons
                    }
                }
            });

            // Add paste handler to insert copied variable (higher priority)
            editor.events.on('beforePaste', (html: string) => {
                if (copiedVariable.value) {
                    const variableText = `{{${copiedVariable.value}}}`;
                    editor.selection.insertHTML(variableText);
                    copiedVariable.value = null;
                    return false; // Prevent default paste
                }
                return html;
            });

            // Also handle click to insert if variable is copied (for better UX)
            editor.events.on('click', () => {
                if (copiedVariable.value) {
                    setTimeout(() => {
                        const variableText = `{{${copiedVariable.value}}}`;
                        editor.selection.insertHTML(variableText);
                        copiedVariable.value = null;
                    }, 100);
                }
            });

            // Configure editor to preserve button elements and prevent modifications
            editor.events.on('afterInit', () => {
                // Prevent Jodit from modifying button elements
                const preserveButtons = () => {
                    const editorArea = editor.editor;
                    if (!editorArea) return;

                    // Find all buttons and table-based buttons (common in email templates)
                    const buttons = editorArea.querySelectorAll(
                        'button, a[role="button"], table[role="presentation"] a, .button, [class*="button"]',
                    );

                    buttons.forEach((button) => {
                        const btn = button as HTMLElement;

                        // Unwrap if button is wrapped in paragraph
                        if (btn.parentElement?.tagName === 'P') {
                            const parent = btn.parentElement;
                            parent.replaceWith(btn);
                        }

                        // Make button non-editable to preserve structure
                        btn.setAttribute('contenteditable', 'false');

                        // Restore contenteditable on children if needed
                        const children = btn.querySelectorAll('*');
                        children.forEach((child) => {
                            (child as HTMLElement).setAttribute(
                                'contenteditable',
                                'false',
                            );
                        });
                    });
                };

                // Run immediately and on content changes
                preserveButtons();

                // Watch for changes and preserve buttons
                const observer = new MutationObserver(() => {
                    preserveButtons();
                });

                const editorArea = editor.editor;
                if (editorArea) {
                    observer.observe(editorArea, {
                        childList: true,
                        subtree: true,
                        attributes: false,
                    });
                }
            });
        }
    });
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

const handleDeleteEmail = (emailId: string) => {
    if (sequence.value.emails.length > 1) {
        emailToDelete.value = emailId;
        showDeleteEmailModal.value = true;
    }
};

const confirmDeleteEmail = () => {
    if (emailToDelete.value && sequence.value.emails.length > 1) {
        sequence.value.emails = sequence.value.emails.filter((e) => {
            const emailIdentifier = e.id || `email-${e.number}`;
            return emailIdentifier !== emailToDelete.value;
        });
        // Renumber emails
        sequence.value.emails.forEach((email, index) => {
            email.number = index + 1;
        });
        emailToDelete.value = null;
    }
    showDeleteEmailModal.value = false;
};

const cancelDeleteEmail = () => {
    emailToDelete.value = null;
    showDeleteEmailModal.value = false;
};

const toggleEmail = (emailId: string) => {
    expandedEmail.value = expandedEmail.value === emailId ? null : emailId;
};

const handleTimingUnitChange = (email: EmailTemplate) => {
    if (email.timingUnit === 'immediate') {
        email.timingValue = 0;
    }
    // Event-based timing units don't need timing values
    if (
        [
            'on_signup',
            'on_verification',
            'if_not_verified',
            'after_verification',
            'incomplete_registration',
            'on_expired',
        ].includes(email.timingUnit)
    ) {
        email.timingValue = 0;
    }
};

// Get timing recommendations based on email type
const getTimingRecommendation = (
    emailType: string,
): { unit: string; value: number; description: string } => {
    const recommendations: Record<
        string,
        { unit: string; value: number; description: string }
    > = {
        welcome: {
            unit: 'immediate',
            value: 0,
            description:
                'Welcome emails are typically sent immediately when a user signs up.',
        },
        feature_highlight: {
            unit: 'hours',
            value: 24,
            description:
                'Feature highlights work well 24-48 hours after signup to show value.',
        },
        social_proof: {
            unit: 'hours',
            value: 48,
            description:
                'Social proof emails are effective 2-3 days after initial contact.',
        },
        trial_reminder: {
            unit: 'days_before_expiry',
            value: 3,
            description:
                'Trial reminders are best sent 3 days before trial ends.',
        },
        sales_outreach: {
            unit: 'days',
            value: 7,
            description:
                'Sales outreach emails work well after a week of engagement.',
        },
        offer: {
            unit: 'days',
            value: 1,
            description:
                'Offer emails are most effective 1 day before trial ends or subscription expires.',
        },
    };

    return (
        recommendations[emailType] || {
            unit: 'hours',
            value: 24,
            description: 'Standard timing recommendation.',
        }
    );
};

// Watch email type changes to suggest timing
const handleEmailTypeChange = (email: EmailTemplate) => {
    const eventBasedUnits = [
        'on_signup',
        'on_verification',
        'if_not_verified',
        'after_verification',
        'incomplete_registration',
    ];

    // Reset event-based timing units if email type is NOT "Signup Nudge"
    if (
        email.type !== 'signup_nudge' &&
        eventBasedUnits.includes(email.timingUnit)
    ) {
        // Reset to a valid timing unit (default to 'days')
        email.timingUnit = 'days';
        if (email.timingValue === 0) {
            email.timingValue = 1;
        }
    }

    const recommendation = getTimingRecommendation(email.type);
    // Only auto-suggest if timing hasn't been customized (value is 0 or immediate)
    if (email.timingValue === 0 && email.timingUnit === 'immediate') {
        email.timingUnit = recommendation.unit;
        email.timingValue = recommendation.value;
    }
};

const getEmailTypeColor = (type: string): string => {
    const colors: Record<string, string> = {
        welcome:
            'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
        feature_highlight:
            'bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-400',
        social_proof:
            'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
        trial_reminder:
            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400',
        sales_outreach:
            'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-400',
        offer: 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400',
        registeration_complete:
            'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/20 dark:text-indigo-400',
        signup_nudge:
            'bg-pink-100 text-pink-800 dark:bg-pink-900/20 dark:text-pink-400',
        upsell: 'bg-teal-100 text-teal-800 dark:bg-teal-900/20 dark:text-teal-400',
        renewal_reminder:
            'bg-amber-100 text-amber-800 dark:bg-amber-900/20 dark:text-amber-400',
        feature_update:
            'bg-cyan-100 text-cyan-800 dark:bg-cyan-900/20 dark:text-cyan-400',
        feedback_request:
            'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/20 dark:text-emerald-400',
        loyalty_reward:
            'bg-rose-100 text-rose-800 dark:bg-rose-900/20 dark:text-rose-400',
    };
    return (
        colors[type] ||
        'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400'
    );
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

            router.post(
                `/marketing/sequences/${props.id}/test-batch`,
                {
                    test_email: testEmailForm.value.email,
                    test_variables: testEmailForm.value.variables,
                },
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        const page = usePage();
                        const message =
                            (page.props as any).flash?.success ||
                            'Test emails have been queued successfully. Check your email inbox.';
                        alert(message);
                        closeTestEmailModal();
                    },
                    onError: (errors: any) => {
                        const errorMessage =
                            errors.message ||
                            errors.test_email ||
                            'Failed to send test emails';
                        alert(errorMessage);
                    },
                    onFinish: () => {
                        testEmailLoading.value = false;
                    },
                },
            );
        } else {
            // Send test email for single template
            const emailTemplate = sequence.value.emails.find(
                (e) =>
                    e.id === testEmailTarget.value ||
                    `email-${e.number}` === testEmailTarget.value,
            );

            if (!emailTemplate || !emailTemplate.id) {
                alert('Email template not found');
                testEmailLoading.value = false;
                return;
            }

            router.post(
                `/marketing/email-templates/${emailTemplate.id}/test`,
                {
                    test_email: testEmailForm.value.email,
                    test_variables: testEmailForm.value.variables,
                },
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        const page = usePage();
                        const message =
                            (page.props as any).flash?.success ||
                            'Test email has been queued successfully. Check your email inbox.';
                        alert(message);
                        closeTestEmailModal();
                    },
                    onError: (errors: any) => {
                        const errorMessage =
                            errors.message ||
                            errors.test_email ||
                            'Failed to send test email';
                        alert(errorMessage);
                    },
                    onFinish: () => {
                        testEmailLoading.value = false;
                    },
                },
            );
        }
    } catch (error) {
        console.error('Error sending test email:', error);
        alert('An error occurred while sending the test email');
        testEmailLoading.value = false;
    }
};

const validationErrors = ref<Record<string, string | string[]>>({});

const handleSave = () => {
    // Clear previous errors
    validationErrors.value = {};

    // Validate required fields
    if (!sequence.value.name.trim()) {
        validationErrors.value.name = 'Sequence name is required';
        return;
    }

    // Validate emails
    if (!sequence.value.emails || sequence.value.emails.length === 0) {
        validationErrors.value.emails = 'At least one email is required';
        return;
    }

    // Validate each email
    for (let i = 0; i < sequence.value.emails.length; i++) {
        const email = sequence.value.emails[i];
        if (!email.subject || !email.subject.trim()) {
            validationErrors.value[`emails.${i}.subject`] =
                'Subject is required';
            return;
        }
    }

    // Prepare email data for submission
    const emails = sequence.value.emails.map((email, index) => ({
        sequence_number: email.number || index + 1,
        timing_value:
            email.timingUnit === 'immediate' ||
            email.timingUnit === 'days_before_expiry'
                ? email.timingValue
                : email.timingValue,
        timing_unit: email.timingUnit,
        subject: email.subject,
        type: email.type,
        content: email.content || '',
        status: email.status,
    }));

    const formData = {
        name: sequence.value.name,
        description: sequence.value.description || '',
        status: sequence.value.status,
        target_user_type: sequence.value.target_user_type || 'trial_users',
        signup_users_days_window: null,
        emails: emails,
    };

    if (isEditMode.value && props.id) {
        router.put(`/marketing/sequences/${props.id}`, formData, {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(sequences().url);
            },
            onError: (errors) => {
                console.error('Validation errors:', errors);
                validationErrors.value = errors;
                // Show alert for user visibility
                const errorMessages = Object.values(errors).flat().join(', ');
                if (errorMessages) {
                    alert('Validation errors: ' + errorMessages);
                }
            },
        });
    } else {
        router.post('/marketing/sequences', formData, {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(sequences().url);
            },
            onError: (errors) => {
                console.error('Validation errors:', errors);
                validationErrors.value = errors;
                // Show alert for user visibility
                const errorMessages = Object.values(errors).flat().join(', ');
                if (errorMessages) {
                    alert('Validation errors: ' + errorMessages);
                }
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
            class="fixed right-4 bottom-4 z-50 flex animate-in items-center gap-2 rounded-lg bg-green-500 px-4 py-3 text-white shadow-lg slide-in-from-bottom-5"
        >
            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                />
            </svg>
            <span class="font-medium">Copied to clipboard</span>
        </div>
        <div class="flex h-full flex-1 flex-col overflow-hidden bg-background">
            <div class="flex-1 overflow-y-auto">
                <div class="px-3 py-3 sm:px-4 lg:px-6 lg:py-4">
                    <!-- Header -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <Link
                                :href="sequences().url"
                                class="cursor-pointer rounded-md p-2 transition-colors hover:bg-muted"
                            >
                                <ArrowLeft
                                    class="size-5 text-muted-foreground"
                                />
                            </Link>
                            <div>
                                <h1
                                    class="text-2xl font-semibold text-foreground"
                                >
                                    {{
                                        isEditMode
                                            ? 'Edit Sequence'
                                            : 'Create Sequence'
                                    }}
                                </h1>
                                <p class="mt-1 text-sm text-muted-foreground">
                                    {{
                                        isEditMode
                                            ? 'Update email sequence details'
                                            : 'Create a new automated email sequence'
                                    }}
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
                            <Button
                                @click="handleSave"
                                class="bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                            >
                                <Save class="mr-2 size-4" />
                                Save Sequence
                            </Button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Main Content -->
                        <div class="space-y-6 lg:col-span-2">
                            <!-- Sequence Details -->
                            <div
                                class="rounded-lg border border-border bg-card p-6"
                            >
                                <h2
                                    class="mb-4 text-lg font-semibold text-foreground"
                                >
                                    Sequence Details
                                </h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label
                                            for="name"
                                            class="mb-1 block text-sm font-medium text-foreground"
                                        >
                                            Sequence Name
                                            <span class="text-red-500">*</span>
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
                                        <Label
                                            for="description"
                                            class="mb-1 block text-sm font-medium text-foreground"
                                        >
                                            Description
                                        </Label>
                                        <textarea
                                            id="description"
                                            v-model="sequence.description"
                                            rows="3"
                                            placeholder="Enter sequence description"
                                            class="w-full resize-y rounded-md border border-border bg-background px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        ></textarea>
                                    </div>

                                    <div>
                                        <Label
                                            for="status"
                                            class="mb-1 block text-sm font-medium text-foreground"
                                        >
                                            Status
                                        </Label>
                                        <select
                                            id="status"
                                            v-model="sequence.status"
                                            class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:ring-2 focus:ring-ring focus:outline-none"
                                        >
                                            <option value="draft">Draft</option>
                                            <option value="active">
                                                Active
                                            </option>
                                            <option value="paused">
                                                Paused
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <Label
                                            for="target_user_type"
                                            class="mb-1 block text-sm font-medium text-foreground"
                                        >
                                            Target User Type
                                            <span class="text-red-500">*</span>
                                        </Label>
                                        <select
                                            id="target_user_type"
                                            v-model="sequence.target_user_type"
                                            class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:ring-2 focus:ring-ring focus:outline-none"
                                        >
                                            <option value="trial_users">
                                                Trial Users
                                            </option>
                                            <option value="all_users">
                                                All Users
                                            </option>
                                            <option value="paid_users">
                                                Paid Users
                                            </option>
                                            <option value="incomplete_signups">
                                                Incomplete Signups
                                            </option>
                                        </select>
                                        <p
                                            class="mt-1 text-xs text-muted-foreground"
                                        >
                                            Select which user segment this
                                            sequence should target
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Sequence -->
                            <div
                                class="rounded-lg border border-border bg-card p-6"
                            >
                                <div
                                    class="mb-4 flex items-center justify-between"
                                >
                                    <h2
                                        class="text-lg font-semibold text-foreground"
                                    >
                                        Email Sequence
                                    </h2>
                                    <Button
                                        @click="addEmail"
                                        variant="outline"
                                        size="sm"
                                    >
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
                                            class="flex cursor-pointer items-center justify-between p-4"
                                            @click="
                                                toggleEmail(
                                                    email.id ||
                                                        `email-${email.number}`,
                                                )
                                            "
                                        >
                                            <div
                                                class="flex flex-1 items-center gap-4"
                                            >
                                                <div
                                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-muted text-sm font-semibold text-foreground"
                                                >
                                                    {{ email.number }}
                                                </div>
                                                <div class="flex-1">
                                                    <div
                                                        class="mb-1 flex items-center gap-2"
                                                    >
                                                        <span
                                                            class="text-sm font-medium text-foreground"
                                                            >{{
                                                                email.subject ||
                                                                'Untitled Email'
                                                            }}</span
                                                        >
                                                        <span
                                                            :class="[
                                                                'inline-flex rounded-full px-2 py-0.5 text-xs font-medium',
                                                                getEmailTypeColor(
                                                                    email.type,
                                                                ),
                                                            ]"
                                                        >
                                                            {{
                                                                allEmailTypes.find(
                                                                    (t) =>
                                                                        t.value ===
                                                                        email.type,
                                                                )?.label ||
                                                                email.type
                                                            }}
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="flex items-center gap-2 text-xs text-muted-foreground"
                                                    >
                                                        <Clock class="size-3" />
                                                        <span>
                                                            <template
                                                                v-if="
                                                                    email.timingUnit ===
                                                                        'immediate' ||
                                                                    (email.timingValue ===
                                                                        0 &&
                                                                        email.timingUnit !==
                                                                            'days_before_expiry' &&
                                                                        email.timingUnit !==
                                                                            'on_expired' &&
                                                                        ![
                                                                            'on_signup',
                                                                            'on_verification',
                                                                            'if_not_verified',
                                                                            'after_verification',
                                                                            'incomplete_registration',
                                                                        ].includes(
                                                                            email.timingUnit,
                                                                        ))
                                                                "
                                                            >
                                                                Immediate
                                                            </template>
                                                            <template
                                                                v-else-if="
                                                                    email.timingUnit ===
                                                                    'days_before_expiry'
                                                                "
                                                            >
                                                                {{
                                                                    email.timingValue
                                                                }}
                                                                Day{{
                                                                    email.timingValue !==
                                                                    1
                                                                        ? 's'
                                                                        : ''
                                                                }}
                                                                Before Expiry
                                                            </template>
                                                            <template
                                                                v-else-if="
                                                                    email.timingUnit ===
                                                                    'on_expired'
                                                                "
                                                            >
                                                                On Expired
                                                            </template>
                                                            <template
                                                                v-else-if="
                                                                    email.timingUnit ===
                                                                    'on_signup'
                                                                "
                                                            >
                                                                On Signup
                                                                (Event)
                                                            </template>
                                                            <template
                                                                v-else-if="
                                                                    email.timingUnit ===
                                                                    'on_verification'
                                                                "
                                                            >
                                                                On Verification
                                                                (Event)
                                                            </template>
                                                            <template
                                                                v-else-if="
                                                                    email.timingUnit ===
                                                                    'if_not_verified'
                                                                "
                                                            >
                                                                If Not Verified
                                                                (Event)
                                                            </template>
                                                            <template
                                                                v-else-if="
                                                                    email.timingUnit ===
                                                                    'after_verification'
                                                                "
                                                            >
                                                                After
                                                                Verification
                                                                (Event)
                                                            </template>
                                                            <template
                                                                v-else-if="
                                                                    email.timingUnit ===
                                                                    'incomplete_registration'
                                                                "
                                                            >
                                                                Incomplete
                                                                Registration
                                                                (Event)
                                                            </template>
                                                            <template v-else>
                                                                {{
                                                                    email.timingValue
                                                                }}
                                                                {{
                                                                    email.timingUnit
                                                                }}
                                                            </template>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <ChevronRight
                                                    :class="[
                                                        'size-5 text-muted-foreground transition-transform',
                                                        expandedEmail ===
                                                        (email.id ||
                                                            `email-${email.number}`)
                                                            ? 'rotate-90'
                                                            : '',
                                                    ]"
                                                />
                                                <button
                                                    v-if="
                                                        isEditMode && email.id
                                                    "
                                                    @click.stop="
                                                        openTestEmailModal(
                                                            email.id ||
                                                                `email-${email.number}`,
                                                        )
                                                    "
                                                    class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-blue-50 dark:hover:bg-blue-900/20"
                                                    title="Test Email"
                                                >
                                                    <Send
                                                        class="size-4 text-blue-600 dark:text-blue-400"
                                                    />
                                                </button>
                                                <button
                                                    v-if="
                                                        sequence.emails.length >
                                                        1
                                                    "
                                                    @click.stop="
                                                        handleDeleteEmail(
                                                            email.id ||
                                                                `email-${email.number}`,
                                                        )
                                                    "
                                                    class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-red-50 dark:hover:bg-red-900/20"
                                                    title="Remove Email"
                                                >
                                                    <Trash2
                                                        class="size-4 text-red-600 dark:text-red-400"
                                                    />
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Email Details (Expanded) -->
                                        <div
                                            v-if="
                                                expandedEmail ===
                                                (email.id ||
                                                    `email-${email.number}`)
                                            "
                                            class="space-y-4 border-t border-border p-4"
                                        >
                                            <div
                                                class="grid grid-cols-1 gap-4 md:grid-cols-2"
                                            >
                                                <div>
                                                    <Label
                                                        class="mb-1 block text-sm font-medium text-foreground"
                                                    >
                                                        Timing Value
                                                    </Label>
                                                    <Input
                                                        v-model.number="
                                                            email.timingValue
                                                        "
                                                        type="number"
                                                        min="0"
                                                        :disabled="
                                                            email.timingUnit ===
                                                                'immediate' ||
                                                            [
                                                                'on_signup',
                                                                'on_verification',
                                                                'if_not_verified',
                                                                'after_verification',
                                                                'incomplete_registration',
                                                                'on_expired',
                                                            ].includes(
                                                                email.timingUnit,
                                                            )
                                                        "
                                                        class="w-full"
                                                    />
                                                </div>
                                                <div>
                                                    <Label
                                                        class="mb-1 block text-sm font-medium text-foreground"
                                                    >
                                                        Timing Unit
                                                    </Label>
                                                    <select
                                                        v-model="
                                                            email.timingUnit
                                                        "
                                                        @change="
                                                            handleTimingUnitChange(
                                                                email,
                                                            )
                                                        "
                                                        class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:ring-2 focus:ring-ring focus:outline-none"
                                                    >
                                                        <option
                                                            v-for="unit in getTimingUnitsForEmail(
                                                                email,
                                                            )"
                                                            :key="unit.value"
                                                            :value="unit.value"
                                                        >
                                                            {{ unit.label }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <Label
                                                    class="mb-1 block text-sm font-medium text-foreground"
                                                >
                                                    Subject Line
                                                    <span class="text-red-500"
                                                        >*</span
                                                    >
                                                </Label>
                                                <Input
                                                    v-model="email.subject"
                                                    type="text"
                                                    placeholder="Enter email subject"
                                                    class="w-full"
                                                />
                                            </div>

                                            <div>
                                                <Label
                                                    class="mb-1 block text-sm font-medium text-foreground"
                                                >
                                                    Email Type
                                                </Label>
                                                <select
                                                    v-model="email.type"
                                                    @change="
                                                        handleEmailTypeChange(
                                                            email,
                                                        )
                                                    "
                                                    class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:ring-2 focus:ring-ring focus:outline-none"
                                                >
                                                    <option
                                                        v-for="type in emailTypes"
                                                        :key="type.value"
                                                        :value="type.value"
                                                    >
                                                        {{ type.label }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div>
                                                <Label
                                                    class="mb-1 block text-sm font-medium text-foreground"
                                                >
                                                    Email Content
                                                </Label>
                                                <div
                                                    class="overflow-hidden rounded-md border border-border"
                                                >
                                                    <JoditEditor
                                                        :ref="
                                                            (el: any) => {
                                                                if (el)
                                                                    editorComponentRefs[
                                                                        email.id ||
                                                                            `email-${email.number}`
                                                                    ] = el;
                                                                setupEditor(
                                                                    email.id ||
                                                                        `email-${email.number}`,
                                                                );
                                                            }
                                                        "
                                                        v-model="email.content"
                                                        :config="joditConfig"
                                                        class="email-editor"
                                                    />
                                                </div>
                                                <p
                                                    class="mt-2 text-xs text-muted-foreground"
                                                >
                                                    Use the editor above to
                                                    design your email template.
                                                    HTML is supported.
                                                </p>
                                            </div>

                                            <div>
                                                <Label
                                                    class="mb-1 block text-sm font-medium text-foreground"
                                                >
                                                    Status
                                                </Label>
                                                <select
                                                    v-model="email.status"
                                                    class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:ring-2 focus:ring-ring focus:outline-none"
                                                >
                                                    <option value="active">
                                                        Active
                                                    </option>
                                                    <option value="inactive">
                                                        Inactive
                                                    </option>
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
                            <div
                                class="rounded-lg border border-border bg-card p-6"
                            >
                                <h2
                                    class="mb-4 text-lg font-semibold text-foreground"
                                >
                                    Sequence Info
                                </h2>
                                <div class="space-y-3">
                                    <div>
                                        <p
                                            class="text-sm font-medium text-muted-foreground"
                                        >
                                            Total Emails
                                        </p>
                                        <p
                                            class="mt-1 text-lg font-semibold text-foreground"
                                        >
                                            {{ sequence.emails.length }}
                                        </p>
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm font-medium text-muted-foreground"
                                        >
                                            Status
                                        </p>
                                        <p
                                            class="mt-1 text-sm text-foreground capitalize"
                                        >
                                            {{ sequence.status }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Available Variables -->
                            <div
                                class="rounded-lg border border-border bg-card p-6"
                            >
                                <h2
                                    class="mb-2 text-lg font-semibold text-foreground"
                                >
                                    Available Variables
                                </h2>
                                <p class="mb-4 text-xs text-muted-foreground">
                                    Click on a variable below to copy it and use
                                    in your email template.
                                </p>
                                <div
                                    class="max-h-[600px] space-y-4 overflow-y-auto"
                                >
                                    <div
                                        v-for="(
                                            variables, module
                                        ) in groupedVariables"
                                        :key="module"
                                        class="space-y-2"
                                    >
                                        <h3
                                            class="text-sm font-medium text-foreground capitalize"
                                        >
                                            {{ module }}
                                        </h3>
                                        <div class="flex flex-wrap gap-2">
                                            <button
                                                v-for="variable in variables"
                                                :key="variable.id"
                                                @click="
                                                    copyVariable(variable.name)
                                                "
                                                :class="[
                                                    'cursor-pointer rounded-full border px-3 py-1.5 text-xs font-medium transition-colors',
                                                    copiedVariable ===
                                                    variable.name
                                                        ? 'border-blue-300 bg-blue-100 text-blue-800 dark:border-blue-700 dark:bg-blue-900/30 dark:text-blue-300'
                                                        : 'border-border bg-background text-foreground hover:border-border hover:bg-muted',
                                                ]"
                                                :title="
                                                    variable.description ||
                                                    variable.name
                                                "
                                            >
                                                {{ variable.name }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tips -->
                            <div
                                class="rounded-lg border border-border bg-card p-6"
                            >
                                <h2
                                    class="mb-4 text-lg font-semibold text-foreground"
                                >
                                    Tips
                                </h2>
                                <ul
                                    class="space-y-2 text-sm text-muted-foreground"
                                >
                                    <li>
                                        • Click a variable above to copy it,
                                        then click in the editor to paste
                                    </li>
                                    <li>
                                        • Set appropriate timing between emails
                                    </li>
                                    <li>
                                        • Test your sequence before activating
                                    </li>
                                    <li>
                                        • Monitor performance and adjust as
                                        needed
                                    </li>
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
        <div
            class="mx-4 w-full max-w-md rounded-lg bg-white shadow-xl dark:bg-gray-900"
        >
            <!-- Header -->
            <div
                class="flex items-center justify-between border-b border-border px-6 py-4"
            >
                <h2 class="text-lg font-semibold text-foreground">
                    {{
                        testEmailTarget === 'sequence'
                            ? 'Test All Emails'
                            : 'Test Email'
                    }}
                </h2>
                <button
                    @click="closeTestEmailModal"
                    class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                >
                    <X class="size-5 text-muted-foreground" />
                </button>
            </div>

            <!-- Content -->
            <div class="space-y-4 p-6">
                <div>
                    <Label
                        class="mb-1 block text-sm font-medium text-foreground"
                    >
                        Test Email Address <span class="text-red-500">*</span>
                    </Label>
                    <Input
                        v-model="testEmailForm.email"
                        type="email"
                        placeholder="test@example.com"
                        class="w-full"
                    />
                    <p class="mt-1 text-xs text-muted-foreground">
                        Enter the email address where you want to receive test
                        emails
                    </p>
                </div>

                <div v-if="testEmailTarget === 'sequence'">
                    <p class="text-sm text-muted-foreground">
                        This will send test emails for all active email
                        templates in this sequence.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div
                class="flex items-center justify-end gap-3 border-t border-border px-6 py-4"
            >
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
                    class="bg-blue-600 text-white hover:bg-blue-700"
                >
                    <Send v-if="!testEmailLoading" class="mr-2 size-4" />
                    <span v-if="testEmailLoading">Sending...</span>
                    <span v-else>Send Test Email</span>
                </Button>
            </div>
        </div>
    </div>

    <!-- Delete Email Confirmation Modal -->
    <Dialog
        :open="showDeleteEmailModal"
        @update:open="
            (value) => {
                if (!value) cancelDeleteEmail();
            }
        "
    >
        <DialogContent class="sm:max-w-md">
            <DialogHeader>
                <DialogTitle class="text-lg font-semibold text-foreground">
                    Are you sure?
                </DialogTitle>
                <DialogDescription class="pt-2 text-sm text-muted-foreground">
                    Are you sure you want to delete this email? This action
                    cannot be undone.
                </DialogDescription>
            </DialogHeader>
            <DialogFooter class="gap-3">
                <DialogClose as-child>
                    <Button
                        variant="secondary"
                        @click="cancelDeleteEmail"
                        class="cursor-pointer"
                    >
                        Cancel
                    </Button>
                </DialogClose>
                <Button
                    @click="confirmDeleteEmail"
                    class="cursor-pointer bg-blue-600 text-white hover:bg-blue-700"
                >
                    Delete
                </Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>

<style scoped>
/* Custom styles for Jodit editor in dark mode */
.email-editor :deep(.jodit-container) {
    background-color: hsl(var(--background));
    color: hsl(var(--foreground));
    font-family: inherit;
    border: 1px solid hsl(var(--border));
    border-radius: 0.375rem;
}

.email-editor :deep(.jodit-wysiwyg) {
    min-height: 300px;
    background-color: #ffffff;
    padding: 12px;
    /* Preserve original colors from email templates */
}

/* Preserve all original styles from email templates - no color overrides */

/* Preserve button styles in email templates */
.email-editor :deep(.jodit-wysiwyg button),
.email-editor :deep(.jodit-wysiwyg a[role='button']),
.email-editor :deep(.jodit-wysiwyg .button),
.email-editor :deep(.jodit-wysiwyg [class*='button']),
.email-editor :deep(.jodit-wysiwyg table[role='presentation'] a),
.email-editor :deep(.jodit-wysiwyg table[role='presentation'] td) {
    /* Preserve all original button styles - don't override */
    pointer-events: auto;
    cursor: pointer;
    /* Allow all styles to be preserved */
}

/* Prevent Jodit from modifying button elements */
.email-editor :deep(.jodit-wysiwyg button *),
.email-editor :deep(.jodit-wysiwyg a[role='button'] *),
.email-editor :deep(.jodit-wysiwyg table[role='presentation'] a *) {
    pointer-events: auto;
}

/* Ensure table-based buttons (common in email templates) are preserved */
.email-editor :deep(.jodit-wysiwyg table[role='presentation']) {
    border-collapse: collapse;
    width: 100%;
}

.email-editor :deep(.jodit-wysiwyg table[role='presentation'] td) {
    padding: 0;
    border: 0;
}

/* Toolbar styles */
.email-editor :deep(.jodit-toolbar-editor-collection) {
    background-color: hsl(var(--card));
    border-color: hsl(var(--border));
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
    border-bottom: 1px solid hsl(var(--border));
}

.email-editor :deep(.jodit-toolbar-button) {
    color: hsl(var(--foreground));
    border-radius: 4px;
    transition: all 0.2s;
}

.email-editor :deep(.jodit-toolbar-button:hover) {
    background-color: hsl(var(--muted));
}

.email-editor :deep(.jodit-toolbar-button.jodit-toolbar-button_active) {
    background-color: hsl(var(--muted));
    color: hsl(var(--primary));
}

.email-editor :deep(.jodit-toolbar-button svg) {
    fill: hsl(var(--foreground));
    stroke: hsl(var(--foreground));
}

.email-editor :deep(.jodit-toolbar-button:hover svg) {
    fill: hsl(var(--foreground));
    stroke: hsl(var(--foreground));
}

.email-editor :deep(.jodit-toolbar-button.jodit-toolbar-button_active svg) {
    fill: hsl(var(--primary));
    stroke: hsl(var(--primary));
}

/* Dropdown styles */
.email-editor :deep(.jodit-dropdown) {
    background-color: hsl(var(--card));
    border-color: hsl(var(--border));
    border-radius: 0.375rem;
    box-shadow:
        0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.email-editor :deep(.jodit-dropdown-item) {
    color: hsl(var(--foreground));
    padding: 8px 12px;
}

.email-editor :deep(.jodit-dropdown-item:hover) {
    background-color: hsl(var(--muted));
    color: hsl(var(--foreground));
}

.email-editor :deep(.jodit-dropdown-item.jodit-dropdown-item_active) {
    background-color: hsl(var(--primary) / 0.1);
    color: hsl(var(--primary));
}

/* Ensure text selection is visible */
.email-editor :deep(.jodit-wysiwyg ::selection) {
    background-color: hsl(var(--primary) / 0.3);
    color: hsl(var(--foreground));
}

/* Preserve all original styles - no overrides for email templates */

/* Statusbar */
.email-editor :deep(.jodit-statusbar) {
    background-color: hsl(var(--card));
    border-color: hsl(var(--border));
    border-top: 1px solid hsl(var(--border));
    color: hsl(var(--muted-foreground));
}
</style>
