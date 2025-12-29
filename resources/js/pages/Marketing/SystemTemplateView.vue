<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { campaigns } from '@/routes/marketing';
import marketingRoutes from '@/routes/marketing';
const { systemTemplates } = marketingRoutes;
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ArrowLeft, Save } from 'lucide-vue-next';
import { JoditEditor } from 'jodit-vue';
import 'jodit/es2021/jodit.min.css';
import type { IJodit } from 'jodit';
import { onMounted } from 'vue';

interface SystemTemplate {
    id: string;
    key: string;
    name: string;
    subject: string;
    content: string;
    description: string | null;
    is_active: boolean;
}

interface TemplateVariable {
    id: string;
    name: string;
    module: string | null;
    description: string | null;
    example_value: string | null;
}

interface Props {
    template: SystemTemplate;
    templateVariables?: TemplateVariable[];
}

const props = defineProps<Props>();

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
        title: 'System Templates',
        href: systemTemplates.index().url,
    },
    {
        title: `Edit ${props.template.name}`,
        href: '#',
    },
];

const form = useForm({
    subject: props.template.subject,
    content: props.template.content || '',
    is_active: props.template.is_active,
});

const copiedVariable = ref<string | null>(null);
const editorRef = ref<IJodit | null>(null);

// Jodit editor configuration - limited toolbar for system templates
const joditConfig = {
    readonly: false,
    toolbar: true,
    toolbarButtonSize: 'middle',
    buttons: [
        'bold',
        'italic',
        'underline',
        '|',
        'ul',
        'ol',
        '|',
        'font',
        'fontsize',
        '|',
        'link',
        '|',
        'align',
        '|',
        'undo',
        'redo',
        '|',
        'source',
    ],
    height: 400,
    placeholder: 'Enter email content...',
    removeButtons: ['brush', 'file', 'image', 'table', 'hr', 'eraser', 'fullsize', 'video'],
    showCharsCounter: false,
    showWordsCounter: false,
};

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

const copyVariable = (variableName: string) => {
    const variable = `{{${variableName}}}`;
    navigator.clipboard.writeText(variable);
    copiedVariable.value = variableName;
    setTimeout(() => {
        copiedVariable.value = null;
    }, 2000);
};

const handleSave = () => {
    form.put(systemTemplates.update({ id: props.template.id }).url, {
        preserveScroll: true,
        onSuccess: () => {
            // Success handled by Inertia
        },
    });
};

onMounted(() => {
    // Editor is ready
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Edit ${template.name}`" />

        <!-- Copy Success Toast -->
        <div
            v-if="copiedVariable"
            class="fixed top-4 right-4 z-50 flex items-center gap-2 rounded-md bg-green-100 dark:bg-green-900/30 border border-green-300 dark:border-green-700 px-4 py-2 shadow-lg"
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
                                :href="systemTemplates.index().url"
                                class="p-2 hover:bg-muted rounded-md transition-colors cursor-pointer"
                            >
                                <ArrowLeft class="size-5 text-muted-foreground" />
                            </Link>
                            <div>
                                <h1 class="text-2xl font-semibold text-foreground">Edit System Template</h1>
                                <p class="mt-1 text-sm text-muted-foreground">{{ template.name }}</p>
                            </div>
                        </div>
                        <Button @click="handleSave" :disabled="form.processing" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">
                            <Save class="mr-2 size-4" />
                            {{ form.processing ? 'Saving...' : 'Save Template' }}
                        </Button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Main Content -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Template Details -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Template Details</h2>
                                <div class="space-y-4">
                                    <div>
                                        <Label for="name" class="mb-1 block text-sm font-medium text-foreground">
                                            Template Name
                                        </Label>
                                        <Input
                                            id="name"
                                            :default-value="template?.name || ''"
                                            :model-value="template?.name || ''"
                                            type="text"
                                            disabled
                                            class="w-full bg-muted"
                                        />
                                        <p class="mt-1 text-xs text-muted-foreground">
                                            Template name cannot be changed
                                        </p>
                                    </div>

                                    <div>
                                        <Label for="key" class="mb-1 block text-sm font-medium text-foreground">
                                            Template Key
                                        </Label>
                                        <Input
                                            id="key"
                                            :default-value="template?.key || ''"
                                            :model-value="template?.key || ''"
                                            type="text"
                                            disabled
                                            class="w-full bg-muted"
                                        />
                                    </div>

                                    <div>
                                        <Label for="description" class="mb-1 block text-sm font-medium text-foreground">
                                            Description
                                        </Label>
                                        <p class="text-sm text-muted-foreground">{{ template.description || 'No description' }}</p>
                                    </div>

                                    <div>
                                        <Label for="subject" class="mb-1 block text-sm font-medium text-foreground">
                                            Subject Line <span class="text-red-500">*</span>
                                        </Label>
                                        <Input
                                            id="subject"
                                            v-model="form.subject"
                                            type="text"
                                            placeholder="Enter email subject"
                                            class="w-full"
                                            :class="{ 'border-red-500': form.errors.subject }"
                                        />
                                        <p v-if="form.errors.subject" class="mt-1 text-xs text-red-500">
                                            {{ form.errors.subject }}
                                        </p>
                                    </div>

                                    <div>
                                        <Label for="content" class="mb-1 block text-sm font-medium text-foreground">
                                            Email Content
                                        </Label>
                                        <div class="rounded-md border border-border overflow-hidden">
                                            <JoditEditor
                                                v-model="form.content"
                                                :config="joditConfig"
                                                class="email-editor"
                                            />
                                        </div>
                                        <p class="mt-2 text-xs text-muted-foreground">
                                            Use the editor above to design your email template. HTML is supported. Use variables like <code class="px-1 py-0.5 bg-muted rounded text-xs">&#123;&#123;first_name&#125;&#125;</code> to personalize the email.
                                        </p>
                                        <p v-if="form.errors.content" class="mt-1 text-xs text-red-500">
                                            {{ form.errors.content }}
                                        </p>
                                    </div>

                                    <div>
                                        <Label for="is_active" class="mb-1 block text-sm font-medium text-foreground">
                                            Status
                                        </Label>
                                        <select
                                            id="is_active"
                                            v-model="form.is_active"
                                            class="w-full h-10 rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                        >
                                            <option :value="true">Active</option>
                                            <option :value="false">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-6">
                            <!-- Template Info -->
                            <div class="rounded-lg border border-border bg-card p-6">
                                <h2 class="text-lg font-semibold text-foreground mb-4">Template Info</h2>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm font-medium text-muted-foreground">Key</p>
                                        <p class="mt-1 text-sm text-foreground font-mono">{{ template.key }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-muted-foreground">Status</p>
                                        <p class="mt-1 text-sm text-foreground capitalize">
                                            {{ form.is_active ? 'Active' : 'Inactive' }}
                                        </p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

