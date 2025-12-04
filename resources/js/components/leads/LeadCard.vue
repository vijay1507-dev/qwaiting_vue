<script setup lang="ts">
import { AlertTriangle, User } from 'lucide-vue-next';

interface Lead {
    id: string;
    name: string;
    company: string;
    value: number;
    tags: string[];
    hasWarning?: boolean;
    enquiry?: string;
}

defineProps<{
    lead: Lead;
}>();

const getInitials = (name: string): string => {
    return name
        .split(' ')
        .map((n) => n[0])
        .join('')
        .toUpperCase()
        .slice(0, 2);
};

const getAvatarColor = (name: string): string => {
    const colors = [
        'bg-green-400 text-white',
        'bg-blue-400 text-white',
        'bg-pink-400 text-white',
        'bg-yellow-400 text-white',
        'bg-purple-400 text-white',
        'bg-cyan-400 text-white',
    ];
    const index = name.charCodeAt(0) % colors.length;
    return colors[index];
};

const getTagStyle = (tag: string): string => {
    const coloredTags: Record<string, string> = {
        'Enquiry': 'bg-yellow-50 text-yellow-700',
        'Urgent Sale': 'bg-orange-50 text-orange-600',
        'Super Priority': 'bg-green-50 text-green-600',
        'Requirement': 'bg-teal-50 text-teal-600',
        'VIP Client': 'bg-red-50 text-red-500',
        'Immediate Action': 'bg-red-50 text-red-500',
    };
    
    if (coloredTags[tag]) {
        return coloredTags[tag];
    }
    
    return 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400';
};

const shouldShowUserIcon = (tag: string): boolean => {
    return tag === 'Example' || tag === 'Custom Admin';
};
</script>

<template>
    <div
        class="group relative cursor-pointer rounded-md border border-border bg-card p-3 shadow-sm transition-all hover:shadow-md"
    >
        <!-- Header -->
        <div class="flex items-start justify-between gap-2 mb-2">
            <div class="flex items-center gap-2 flex-1 min-w-0">
                <div
                    :class="getAvatarColor(lead.name)"
                    class="shrink-0 size-8 rounded-full flex items-center justify-center text-xs font-semibold"
                >
                    {{ getInitials(lead.name) }}
                </div>

                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold text-xs text-foreground leading-tight">
                        {{ lead.name }}
                    </h4>
                    <p class="text-[10px] text-muted-foreground leading-tight">
                        {{ lead.company }}
                    </p>
                </div>
            </div>

            <AlertTriangle
                v-if="lead.hasWarning"
                class="size-4 shrink-0 text-orange-400"
            />
        </div>

        <!-- Body - Enquiry -->
        <div v-if="lead.enquiry" class="mb-2">
            <p class="text-xs text-foreground leading-snug">
                {{ lead.enquiry }}
            </p>
        </div>

        <!-- Footer - Tags -->
        <div class="flex flex-wrap gap-1">
            <template v-for="tag in lead.tags" :key="tag">
                <span
                    v-if="shouldShowUserIcon(tag)"
                    :class="getTagStyle(tag)"
                    class="inline-flex items-center gap-0.5 text-[10px] px-1.5 py-0.5 rounded"
                >
                    <User class="size-2.5" />
                    {{ tag }}
                </span>
                <span
                    v-else
                    :class="getTagStyle(tag)"
                    class="inline-flex items-center text-[10px] px-1.5 py-0.5 rounded"
                >
                    {{ tag }}
                </span>
            </template>
        </div>
    </div>
</template>

