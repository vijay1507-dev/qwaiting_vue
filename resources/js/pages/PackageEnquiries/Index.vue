<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue';
import { show } from '@/routes/package-enquiries';
import { Head, Link } from '@inertiajs/vue3';
import { Eye } from 'lucide-vue-next';

defineProps<{
    enquiries: {
        data: Array<{
            id: number;
            full_name: string;
            email: string;
            company_name: string;
            mobile_number: string;
            interested_package: string;
            billing_cycle: string;
            created_at: string;
            status?: string;
        }>;
        links: any[];
        last_page: number;
        current_page: number;
        total: number;
    };
}>();

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
};
</script>

<template>
    <Head title="Package Enquiries" />

    <AppSidebarLayout>
        <div class="space-y-6 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight">
                        Package Enquiries
                    </h2>
                    <p class="text-muted-foreground">
                        Manage and view all package upgrade requests.
                    </p>
                </div>
            </div>

            <div class="rounded-md border bg-card">
                <div class="rounded-md border bg-card">
                    <div class="w-full overflow-auto">
                        <table class="w-full caption-bottom text-sm">
                            <thead class="[&_tr]:border-b">
                                <tr
                                    class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                >
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0"
                                    >
                                        ID
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0"
                                    >
                                        Date
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0"
                                    >
                                        Customer
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0"
                                    >
                                        Package
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0"
                                    >
                                        Billing
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0"
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="[&_tr:last-child]:border-0">
                                <tr
                                    v-for="enquiry in enquiries.data"
                                    :key="enquiry.id"
                                    class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                >
                                    <td
                                        class="p-4 align-middle [&:has([role=checkbox])]:pr-0"
                                    >
                                        #{{ enquiry.id }}
                                    </td>
                                    <td
                                        class="p-4 align-middle [&:has([role=checkbox])]:pr-0"
                                    >
                                        {{ formatDate(enquiry.created_at) }}
                                    </td>
                                    <td
                                        class="p-4 align-middle [&:has([role=checkbox])]:pr-0"
                                    >
                                        <div class="font-medium">
                                            {{ enquiry.full_name }}
                                        </div>
                                        <div
                                            class="text-sm text-muted-foreground"
                                        >
                                            {{ enquiry.email }}
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 align-middle [&:has([role=checkbox])]:pr-0"
                                    >
                                        <Badge variant="outline">{{
                                            enquiry.interested_package
                                        }}</Badge>
                                    </td>
                                    <td
                                        class="p-4 align-middle [&:has([role=checkbox])]:pr-0"
                                    >
                                        {{ enquiry.billing_cycle }}
                                    </td>
                                    <td
                                        class="p-4 align-middle [&:has([role=checkbox])]:pr-0"
                                    >
                                        <Badge
                                            :variant="
                                                enquiry.status === 'Open'
                                                    ? 'default'
                                                    : 'secondary'
                                            "
                                        >
                                            {{ enquiry.status || 'Open' }}
                                        </Badge>
                                    </td>
                                    <td
                                        class="p-4 text-left align-middle [&:has([role=checkbox])]:pr-0"
                                    >
                                        <Link
                                            :href="show({ id: enquiry.id }).url"
                                        >
                                            <Button variant="ghost" size="icon">
                                                <Eye class="h-4 w-4" />
                                            </Button>
                                        </Link>
                                    </td>
                                </tr>
                                <tr v-if="enquiries.data.length === 0">
                                    <td
                                        colspan="8"
                                        class="p-4 text-center align-middle"
                                    >
                                        No enquires found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-end" v-if="enquiries.last_page > 1">
                <!-- Implement pagination based on existing components logic if needed, or simple links -->
                <div class="flex gap-2">
                    <template v-for="(link, key) in enquiries.links" :key="key">
                        <div
                            v-if="link.url === null"
                            class="cursor-not-allowed rounded border px-4 py-2 text-sm text-gray-500 opacity-50"
                            v-html="link.label"
                        ></div>
                        <a
                            v-else
                            :href="link.url"
                            class="rounded border px-4 py-2 text-sm hover:bg-gray-100"
                            :class="{ 'bg-primary text-white': link.active }"
                            v-html="link.label"
                        ></a>
                    </template>
                </div>
            </div>
        </div>
    </AppSidebarLayout>
</template>
