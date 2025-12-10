<script setup lang="ts">
import { ref, watch } from 'vue';
import { VueDraggableNext } from 'vue-draggable-next';
import LeadCard from './LeadCard.vue';
import { Plus } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3';

export interface Lead {
    id: string;
    name: string;
    company: string;
    value: number;
    tags: string[];
    hasWarning?: boolean;
    stage: string;
    enquiry?: string;
}

interface Stage {
    id: string;
    title: string;
    leads: Lead[];
}

const props = defineProps<{
    stages: Stage[];
}>();

const emit = defineEmits<{
    (e: 'leadMoved', leadId: string, fromStage: string, toStage: string): void;
}>();

const localStages = ref<Stage[]>(
    props.stages.map((stage) => ({
        ...stage,
        leads: [...stage.leads],
    }))
);

watch(
    () => props.stages,
    (newStages) => {
        localStages.value = newStages.map((stage) => ({
            ...stage,
            leads: [...stage.leads],
        }));
    },
    { deep: true }
);

const getStageStats = (stage: Stage) => {
    const count = stage.leads.length;
    const totalValue = stage.leads.reduce((sum, lead) => sum + lead.value, 0);
    return { count, totalValue };
};

const getProgressColor = (stageId: string): string => {
    const colors: Record<string, string> = {
        'new-lead': 'bg-blue-500',
        'contacted': 'bg-cyan-500',
        'qualified': 'bg-indigo-500',
        'demo-completed': 'bg-purple-500',
        'proposal-sent': 'bg-fuchsia-500',
        'negotiation': 'bg-orange-500',
        'won': 'bg-emerald-500',
        'lost': 'bg-red-500',
        'follow-up-required': 'bg-yellow-500',
        'on-hold': 'bg-gray-500',
    };
    return colors[stageId] || 'bg-primary';
};

const onDragChange = (stageId: string) => {
    // Update lead stages after drag
    const stage = localStages.value.find(s => s.id === stageId);
    if (stage) {
        stage.leads.forEach(lead => {
            if (lead.stage !== stageId) {
                const oldStage = lead.stage;
                lead.stage = stageId;
                emit('leadMoved', lead.id, oldStage, stageId);
            }
        });
    }
};
</script>

<template>
    <div class="flex gap-3 overflow-x-auto pb-2">
        <div
            v-for="stage in localStages"
            :key="stage.id"
            class="flex-shrink-0"
        >
            <div class="flex h-[calc(100vh-180px)] min-w-[240px] max-w-[240px] flex-col rounded-md border border-border bg-muted/20">
                <!-- Header -->
                <div class="flex items-center justify-between border-b border-border px-3 py-2">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="font-medium text-sm text-foreground">
                                {{ stage.title }}
                            </h3>
                            <span class="text-xs text-muted-foreground">({{ getStageStats(stage).count }})</span>
                            <Link :href="`/leads/create?stage_id=${stage.id}`" class="ml-auto">
                                <Plus class="size-3.5 text-muted-foreground cursor-pointer hover:text-foreground" />
                            </Link>
                        </div>
                        <div class="flex items-center gap-2 mt-0.5">
                            <p class="text-xs text-foreground">
                                {{ new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 2 }).format(getStageStats(stage).totalValue) }}
                            </p>
                            <div class="h-1 flex-1 max-w-16 overflow-hidden rounded-full bg-muted">
                                <div
                                    :class="getProgressColor(stage.id)"
                                    class="h-full transition-all"
                                    :style="{
                                        width: `${Math.min((getStageStats(stage).count / 10) * 100, 100)}%`,
                                    }"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cards List -->
                <div class="flex-1 overflow-y-auto p-2">
                    <VueDraggableNext
                        v-model="stage.leads"
                        :group="{ name: 'leads', pull: true, put: true }"
                        :animation="200"
                        ghost-class="opacity-50"
                        drag-class="rotate-2"
                        class="space-y-2 min-h-[100px]"
                        @change="onDragChange(stage.id)"
                    >
                        <div
                            v-for="lead in stage.leads"
                            :key="lead.id"
                            class="cursor-grab active:cursor-grabbing"
                        >
                            <LeadCard :lead="lead" />
                        </div>
                    </VueDraggableNext>
                    <div v-if="stage.leads.length === 0" class="flex items-center justify-center py-6 text-xs text-muted-foreground">
                        Drop leads here
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
