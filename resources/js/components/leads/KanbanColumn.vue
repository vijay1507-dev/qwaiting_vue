<script setup lang="ts">
import { Button } from '@/components/ui/button';
import LeadCard from './LeadCard.vue';
import { Plus } from 'lucide-vue-next';

interface Lead {
    id: string;
    name: string;
    company: string;
    value: number;
    tags: string[];
    hasWarning?: boolean;
}

defineProps<{
    title: string;
    leads: Lead[];
    totalValue: number;
    count: number;
}>();

const formatCurrency = (value: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
    }).format(value);
};
</script>

<template>
    <div class="flex h-full min-w-[300px] flex-col rounded-lg border border-border bg-muted/30">
        <div class="flex items-center justify-between border-b border-border p-4">
            <div class="flex-1">
                <h3 class="font-semibold text-foreground">
                    {{ title }}
                    <span class="text-muted-foreground">({{ count }})</span>
                </h3>
                <p class="mt-1 text-sm font-medium text-foreground">
                    {{ formatCurrency(totalValue) }}
                </p>
            </div>
            <Button variant="ghost" size="icon" class="shrink-0">
                <Plus class="size-4" />
            </Button>
        </div>

        <div class="flex-1 overflow-y-auto p-3">
            <slot>
                <div v-if="leads.length === 0" class="flex items-center justify-center py-8 text-sm text-muted-foreground">
                    No leads
                </div>
                <div v-else class="flex flex-col gap-3">
                    <LeadCard v-for="lead in leads" :key="lead.id" :lead="lead" />
                </div>
            </slot>
        </div>

        <div class="border-t border-border p-2">
            <div class="h-1 w-full overflow-hidden rounded-full bg-muted">
                <div
                    class="h-full bg-primary transition-all"
                    :style="{
                        width: `${Math.min((count / 20) * 100, 100)}%`,
                    }"
                />
            </div>
        </div>
    </div>
</template>

