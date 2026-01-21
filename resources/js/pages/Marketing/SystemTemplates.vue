<script setup lang="ts">
import { Input } from '@/components/ui/input';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import marketingRoutes, { campaigns, sequences } from '@/routes/marketing';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Edit, Mail, Search } from 'lucide-vue-next';
import { computed, ref } from 'vue';
const { systemTemplates } = marketingRoutes;

interface SystemTemplate {
    id: string;
    key: string;
    name: string;
    subject: string;
    description: string | null;
    is_active: boolean;
    updated_at: string;
}

interface Props {
    templates: SystemTemplate[];
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Marketing Automation',
        href: sequences().url,
    },
    {
        title: 'System Templates',
        href: '#',
    },
];

const templatesList = ref<SystemTemplate[]>(props.templates);
const searchQuery = ref('');

// Filter templates based on search query
const filteredTemplates = computed(() => {
    if (!searchQuery.value.trim()) {
        return templatesList.value;
    }

    const query = searchQuery.value.toLowerCase();
    return templatesList.value.filter(
        (template) =>
            template.name.toLowerCase().includes(query) ||
            template.subject.toLowerCase().includes(query) ||
            template.key.toLowerCase().includes(query) ||
            (template.description &&
                template.description.toLowerCase().includes(query)),
    );
});

const getStatusColor = (isActive: boolean): string => {
    return isActive
        ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400'
        : 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="System Templates" />

        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2"
        >
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">
                        System Templates
                    </h1>
                </div>

                <!-- Navigation Tabs -->
                <div class="flex gap-0 border-b border-border">
                    <!-- <Link
                        :href="campaigns().url"
                        class="px-4 py-2 text-sm font-medium border-b-2 border-transparent text-muted-foreground hover:text-foreground transition-colors cursor-pointer"
                    >
                        Campaigns
                    </Link> -->
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'marketing.sequences.read',
                            )
                        "
                        :href="sequences().url"
                        class="cursor-pointer border-b-2 border-transparent px-4 py-2 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
                    >
                        Sequences Notifications
                    </Link>
                    <Link
                        v-if="
                            $page.props.auth.permissions.includes(
                                'marketing.system_templates.read',
                            )
                        "
                        :href="systemTemplates.index().url"
                        :class="[
                            'cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition-colors',
                            'border-blue-600 text-foreground',
                        ]"
                    >
                        System Templates
                    </Link>
                </div>

                <!-- Action Bar -->
                <div class="flex items-center justify-between gap-2">
                    <div class="flex flex-1 items-center gap-2">
                        <div class="relative max-w-xs flex-1">
                            <Search
                                class="absolute top-1/2 left-2.5 size-3.5 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search"
                                class="h-8 pl-8 text-sm"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div
                class="flex-1 overflow-auto rounded-md border border-border bg-card"
            >
                <table class="w-full text-sm">
                    <thead class="sticky top-0 z-10 bg-muted/50">
                        <tr>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Template
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Subject
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Description
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Status
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Last Updated
                            </th>
                            <th
                                v-if="
                                    $page.props.auth.permissions.includes(
                                        'marketing.system_templates.update',
                                    )
                                "
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredTemplates.length === 0">
                            <td colspan="6" class="px-4 py-12 text-center">
                                <div
                                    class="flex flex-col items-center justify-center gap-2"
                                >
                                    <Mail
                                        class="size-12 text-muted-foreground"
                                    />
                                    <p class="text-sm text-muted-foreground">
                                        {{
                                            searchQuery
                                                ? 'No templates found matching your search'
                                                : 'No system templates found'
                                        }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-for="template in filteredTemplates"
                            :key="template.id"
                            class="border-b border-border transition-colors hover:bg-muted/50"
                        >
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Mail
                                        class="size-4 text-muted-foreground"
                                    />
                                    <div>
                                        <div
                                            class="font-medium text-foreground"
                                        >
                                            {{ template.name }}
                                        </div>
                                        <div
                                            class="text-xs text-muted-foreground"
                                        >
                                            {{ template.key }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    template.subject
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span
                                    class="block max-w-md truncate text-sm text-muted-foreground"
                                >
                                    {{
                                        template.description || 'No description'
                                    }}
                                </span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span
                                    :class="[
                                        'inline-flex rounded-full px-2 py-1 text-xs font-medium',
                                        getStatusColor(template.is_active),
                                    ]"
                                >
                                    {{
                                        template.is_active
                                            ? 'Active'
                                            : 'Inactive'
                                    }}
                                </span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-sm text-muted-foreground">{{
                                    template.updated_at
                                }}</span>
                            </td>
                            <td
                                v-if="
                                    $page.props.auth.permissions.includes(
                                        'marketing.system_templates.update',
                                    )
                                "
                                class="px-4 py-3 align-middle"
                            >
                                <div class="flex items-center gap-2">
                                    <Link
                                        v-if="
                                            $page.props.auth.permissions.includes(
                                                'marketing.system_templates.update',
                                            )
                                        "
                                        :href="
                                            systemTemplates.edit({
                                                id: template.id,
                                            }).url
                                        "
                                    >
                                        <button
                                            class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                            title="Edit"
                                        >
                                            <Edit
                                                class="size-4 text-muted-foreground"
                                            />
                                        </button>
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
