<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { index as leadsIndex } from '@/routes/leads';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import KanbanBoard, { type Lead } from '@/components/leads/KanbanBoard.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, Plus, Filter, LayoutGrid, List } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Leads',
        href: leadsIndex().url,
    },
];

// Generate dummy leads data for all stages
const generateDummyLeads = (): Lead[] => {
    const names = [
        'Billy James', 'Lucy Mark', 'Eddy Collins', 'Oliver Queen',
        'Sasha Calle', 'Shelly Josh', 'Wilson Fisk', 'Carol Denvers',
        'John Smith', 'Sarah Johnson', 'Mike Davis', 'Emma Wilson',
        'David Brown', 'Lisa Anderson', 'Chris Taylor', 'Amy Martinez',
    ];
    
    const companies = [
        'SentinelSecure', 'ShieldGuard Security', 'VigilantWatch', 'IronClad Defense',
        'CyberFortress Solutions', 'SecureNet Pro', 'DataGuard Inc', 'CloudShield Ltd',
        'TechSecure Corp', 'NetworkGuard', 'Firewall Solutions', 'SecurityPlus',
    ];
    
    const enquiries = [
        'ProjectPulse Enterprise Solution', 'Milestone360 for Goal Tracking',
        'TaskMaster Pro Implementation', 'CyberGuard Pro',
        'SecureFlow Business', 'DataShield Enterprise',
        'TeamTrack for Agile Development', 'SecureShield 360',
        'CloudConnect Integration', 'NetworkGuard Firewall',
        'EndpointProtect Suite', 'ThreatDetect AI Platform',
    ];
    
    const tagOptions = [
        ['Phone', 'New Business', 'Enquiry'],
        ['Direct', 'Small Market Business', 'Requirement', 'VIP Client'],
        ['Email', 'New Business', 'Urgent Sale', 'Super Priority', 'Requirement'],
        ['Phone', 'Technology Services', 'Requirement', 'Super Priority'],
        ['Web Form', 'Existing Business', 'Immediate Action'],
        ['Referral', 'Large Market Business'],
        ['Email', 'Existing Business'],
        ['Phone', 'Existing Business'],
    ];
    
    const values = [5000, 10000, 25000, 35000, 45000, 50000, 64000, 75000, 85000, 95000, 100000, 120000, 150000];
    
    const leads: Lead[] = [];
    let leadIndex = 0;
    
    // Helper to create a lead
    const createLead = (stage: string, count: number) => {
        for (let i = 0; i < count; i++) {
            const name = names[leadIndex % names.length];
            const company = companies[leadIndex % companies.length];
            const value = values[leadIndex % values.length];
            const tags = [...tagOptions[leadIndex % tagOptions.length]];
            tags.unshift('Example');
            tags.unshift(
                new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 2,
                }).format(value)
            );
            tags.push('Enquiry');
            
            leads.push({
                id: `${stage}-${i + 1}`,
                name,
                company,
                value,
                enquiry: `Enquiry: ${enquiries[leadIndex % enquiries.length]}`,
                tags,
                hasWarning: stage !== 'won' && stage !== 'lost' && stage !== 'on-hold',
                stage,
            });
            leadIndex++;
        }
    };
    
    // Create leads for each stage
    createLead('new-lead', 8);        // New Lead
    createLead('contacted', 6);      // Contacted
    createLead('qualified', 5);      // Qualified
    createLead('demo-completed', 7); // Demo Completed (merged)
    createLead('proposal-sent', 4);  // Proposal Sent
    createLead('negotiation', 3);    // Negotiation
    createLead('won', 5);            // Won
    createLead('lost', 3);           // Lost
    createLead('follow-up', 4);      // Follow-up
    createLead('required', 3);       // Required
    createLead('on-hold', 2);        // On-hold
    
    return leads;
};

const dummyLeads: Lead[] = generateDummyLeads();

const allLeads = ref<Lead[]>(dummyLeads);

const stages = computed(() => {
    const stageMap = {
        'new-lead': { id: 'new-lead', title: 'New Lead' },
        'contacted': { id: 'contacted', title: 'Contacted' },
        'qualified': { id: 'qualified', title: 'Qualified' },
        'demo-completed': { id: 'demo-completed', title: 'Demo Completed' },
        'proposal-sent': { id: 'proposal-sent', title: 'Proposal Sent' },
        'negotiation': { id: 'negotiation', title: 'Negotiation' },
        'won': { id: 'won', title: 'Won' },
        'lost': { id: 'lost', title: 'Lost' },
        'follow-up': { id: 'follow-up', title: 'Follow-up' },
        'required': { id: 'required', title: 'Required' },
        'on-hold': { id: 'on-hold', title: 'On-hold' },
    };

    return Object.values(stageMap).map((stage) => ({
        ...stage,
        leads: allLeads.value.filter((lead) => lead.stage === stage.id),
    }));
});

const searchQuery = ref('');
const viewMode = ref<'kanban' | 'list'>('kanban');
const selectedPipeline = ref('default');

const filteredStages = computed(() => {
    if (!searchQuery.value.trim()) {
        return stages.value;
    }

    const query = searchQuery.value.toLowerCase();
    return stages.value.map((stage) => ({
        ...stage,
                leads: stage.leads.filter(
                    (lead) =>
                        lead.name.toLowerCase().includes(query) ||
                        lead.company.toLowerCase().includes(query) ||
                        lead.enquiry?.toLowerCase().includes(query) ||
                        lead.tags.some((tag) => tag.toLowerCase().includes(query))
                ),
    }));
});

const handleLeadMoved = (leadId: string, fromStage: string, toStage: string) => {
    const lead = allLeads.value.find((l) => l.id === leadId);
    if (lead) {
        lead.stage = toStage;
    }
};
</script>

<template>
    <Head title="Leads" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Leads</h1>
                </div>

                <!-- Action Bar -->
                <div class="flex items-center justify-between gap-2">
                    <div class="flex flex-1 items-center gap-2">
                        <div class="relative flex-1 max-w-xs">
                            <Search
                                class="absolute left-2.5 top-1/2 size-3.5 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search by Title"
                                class="pl-8 h-8 text-sm"
                            />
                        </div>
                        <Button variant="outline" size="sm" class="h-8 text-xs">
                            <Filter class="size-3.5" />
                            Filter
                        </Button>
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- Pipeline Selector -->
                        <select
                            v-model="selectedPipeline"
                            class="rounded-md border border-border bg-background px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-ring h-8"
                        >
                            <option value="all">All Pipelines</option>
                            <option value="default">Default Pipeline</option>
                            <option value="new" class="text-primary">+ Create New Pipeline</option>
                        </select>

                        <div class="flex items-center rounded-md border border-border p-0.5">
                            <button
                                :class="[
                                    'p-1.5 rounded-sm transition-colors',
                                    viewMode === 'kanban' ? 'bg-accent' : 'hover:bg-accent/50'
                                ]"
                                @click="viewMode = 'kanban'"
                            >
                                <LayoutGrid class="size-3.5" />
                            </button>
                            <button
                                :class="[
                                    'p-1.5 rounded-sm transition-colors',
                                    viewMode === 'list' ? 'bg-accent' : 'hover:bg-accent/50'
                                ]"
                                @click="viewMode = 'list'"
                            >
                                <List class="size-3.5" />
                            </button>
                        </div>
                        <Button size="sm" class="h-8 text-xs">
                            <Plus class="size-3.5" />
                            Create Lead
                        </Button>
                    </div>
                </div>
            </div>

            <!-- Kanban Board -->
            <div class="flex-1 overflow-x-auto">
                <KanbanBoard
                    :stages="filteredStages"
                    @lead-moved="handleLeadMoved"
                />
            </div>
        </div>
    </AppLayout>
</template>
