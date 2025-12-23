<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as clientsIndex, edit as clientsEdit, show as clientsShow } from '@/routes/clients';
import { type BreadcrumbItem } from '@/types';
import { Head, router, Link, usePage } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, Filter, Edit, Eye, ChevronLeft, ChevronRight, X, ChevronUp, ChevronDown, Calendar, Download, ChevronDown as ChevronDownIcon } from 'lucide-vue-next';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import type { Instance } from 'flatpickr/dist/types/instance';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { useToast } from '@/composables/useToast';

interface Client {
    id: string;
    srNo: number;
    domain: string;
    ownerName: string;
    ownerEmail: string;
    ownerPhone: string;
    ownerAddress: string;
    created: string;
    expires: string;
    status: 'active' | 'inactive';
    plan?: 'Free' | 'Paid' | 'Trial';
}

interface Props {
    clients?: Client[];
    error?: string;
}

const props = withDefaults(defineProps<Props>(), {
    clients: () => [],
    error: undefined,
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Clients',
        href: clientsIndex().url,
    },
];

const searchQuery = ref('');
const showFilters = ref(false);
const currentPage = ref(1);
const perPage = ref(10);
const customFiltersExpanded = ref(true);

// Filter form data
const filterForm = ref({
    status: '',
    plan: '',
    created: '',
    expires: '',
});

// Dropdown visibility
const showStatusDropdown = ref(false);
const showPlanDropdown = ref(false);

const statusOptions = ['active', 'inactive'];
const planOptions = ['Free', 'Paid', 'Trial'];

// Toast notification
const { success } = useToast();

// Handle flash messages from backend
const page = usePage();
watch(() => (page.props as any).flash?.success, (message) => {
    if (message) {
        success(message);
    }
}, { immediate: true });

// Date pickers for filters
const createdPicker = ref<Instance | null>(null);
const createdInputRef = ref<HTMLInputElement | null>(null);
const expiresPicker = ref<Instance | null>(null);
const expiresInputRef = ref<HTMLInputElement | null>(null);

// Filter clients based on search query and filters
const filteredClients = computed(() => {
    let data = props.clients || [];
    
    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        data = data.filter(
            (client) =>
                (client.domain || '').toLowerCase().includes(query) ||
                (client.ownerName || '').toLowerCase().includes(query) ||
                (client.ownerEmail || '').toLowerCase().includes(query) ||
                (client.ownerPhone || '').toLowerCase().includes(query) ||
                (client.ownerAddress || '').toLowerCase().includes(query)
        );
    }

    // Apply filters
    if (filterForm.value.status) {
        data = data.filter(client =>
            client.status === filterForm.value.status
        );
    }
    if (filterForm.value.plan) {
        data = data.filter(client => client.plan === filterForm.value.plan);
    }
    if (filterForm.value.created) {
        data = data.filter(client =>
            (client.created || '').includes(filterForm.value.created)
        );
    }
    if (filterForm.value.expires) {
        data = data.filter(client =>
            (client.expires || '').includes(filterForm.value.expires)
        );
    }

    return data;
});

// Pagination
const paginatedClients = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return filteredClients.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredClients.value.length / perPage.value);
});

const paginationInfo = computed(() => {
    const start = (currentPage.value - 1) * perPage.value + 1;
    const end = Math.min(currentPage.value * perPage.value, filteredClients.value.length);
    return `${start} - ${end} of ${filteredClients.value.length}`;
});

const goToPage = (page: number) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

// Reset to page 1 when search query, per page, or filters change
watch([searchQuery, perPage, filterForm], () => {
    currentPage.value = 1;
}, { deep: true });

// Ensure current page is valid when filtered results change
watch(filteredClients, () => {
    if (currentPage.value > totalPages.value && totalPages.value > 0) {
        currentPage.value = totalPages.value;
    }
});


const openFilters = () => {
    showFilters.value = true;
};

const closeFilters = () => {
    showFilters.value = false;
    closeAllDropdowns();
};

const closeAllDropdowns = (except?: 'status' | 'plan') => {
    if (except !== 'status') {
        showStatusDropdown.value = false;
    }
    if (except !== 'plan') {
        showPlanDropdown.value = false;
    }
};

const openStatusDropdown = () => {
    closeAllDropdowns('status');
    showStatusDropdown.value = !showStatusDropdown.value;
};

const openPlanDropdown = () => {
    closeAllDropdowns('plan');
    showPlanDropdown.value = !showPlanDropdown.value;
};

const clearStatus = () => {
    filterForm.value.status = '';
};

const clearPlan = () => {
    filterForm.value.plan = '';
};

const applyFilters = () => {
    currentPage.value = 1;
    closeFilters();
};

const resetFilters = () => {
    // Reset all filter values
    filterForm.value = {
        status: '',
        plan: '',
        created: '',
        expires: '',
    };
    
    // Reset date pickers
    if (createdPicker.value) {
        createdPicker.value.clear();
    }
    if (expiresPicker.value) {
        expiresPicker.value.clear();
    }
    
    // Close dropdowns
    closeAllDropdowns();
    
    // Reset to first page
    currentPage.value = 1;
};

const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    
    if (!target.closest('.dropdown-container')) {
        showStatusDropdown.value = false;
        showPlanDropdown.value = false;
    }
};

const initializeDatePickers = () => {
    // Use setTimeout to ensure DOM is fully rendered
    setTimeout(() => {
        // Initialize Created date picker
        if (createdInputRef.value && !createdPicker.value) {
            createdPicker.value = flatpickr(createdInputRef.value, {
                dateFormat: 'Y-m-d',
                defaultDate: filterForm.value.created || null,
                allowInput: false,
                clickOpens: true,
                wrap: false,
                onChange: (selectedDates, dateStr) => {
                    filterForm.value.created = dateStr;
                },
            });
        }

        // Initialize Expires date picker
        if (expiresInputRef.value && !expiresPicker.value) {
            expiresPicker.value = flatpickr(expiresInputRef.value, {
                dateFormat: 'Y-m-d',
                defaultDate: filterForm.value.expires || null,
                allowInput: false,
                clickOpens: true,
                wrap: false,
                onChange: (selectedDates, dateStr) => {
                    filterForm.value.expires = dateStr;
                },
            });
        }
    }, 200);
};

const destroyDatePickers = () => {
    if (createdPicker.value) {
        createdPicker.value.destroy();
        createdPicker.value = null;
    }
    if (expiresPicker.value) {
        expiresPicker.value.destroy();
        expiresPicker.value = null;
    }
};

// Watch for filter modal opening to initialize date pickers
watch(showFilters, (isOpen) => {
    if (isOpen) {
        // Use nextTick and then setTimeout to ensure the modal is fully rendered
        nextTick(() => {
            initializeDatePickers();
        });
    } else {
        destroyDatePickers();
    }
});

// Export functions
const exportToCSV = () => {
    const data = filteredClients.value;
    const headers = ['SR NO', 'Domain', 'Owner Name', 'Owner Email', 'Owner Phone', 'Owner Address', 'Created', 'Expires', 'Status', 'Plan'];
    
    // Create CSV content
    let csvContent = headers.join(',') + '\n';
    
    data.forEach((client) => {
        const row = [
            client.srNo,
            `"${(client.domain || '').replace(/"/g, '""')}"`,
            `"${(client.ownerName || '').replace(/"/g, '""')}"`,
            `"${(client.ownerEmail || '').replace(/"/g, '""')}"`,
            `"${(client.ownerPhone || '').replace(/"/g, '""')}"`,
            `"${(client.ownerAddress || '').replace(/"/g, '""')}"`,
            client.created || '',
            client.expires || '',
            client.status,
            client.plan || '',
        ];
        csvContent += row.join(',') + '\n';
    });
    
    // Create blob and download
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', `clients_${new Date().toISOString().split('T')[0]}.csv`);
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

const exportToExcel = () => {
    const data = filteredClients.value;
    const headers = ['SR NO', 'Domain', 'Owner Name', 'Owner Email', 'Owner Phone', 'Owner Address', 'Created', 'Expires', 'Status', 'Plan'];
    
    // Create HTML table for Excel
    let htmlContent = '<html><head><meta charset="utf-8"></head><body><table border="1">';
    
    // Add headers
    htmlContent += '<tr>';
    headers.forEach((header) => {
        htmlContent += `<th>${header}</th>`;
    });
    htmlContent += '</tr>';
    
    // Add data rows
    data.forEach((client) => {
        htmlContent += '<tr>';
        htmlContent += `<td>${client.srNo}</td>`;
        htmlContent += `<td>${client.domain || ''}</td>`;
        htmlContent += `<td>${client.ownerName || ''}</td>`;
        htmlContent += `<td>${client.ownerEmail || ''}</td>`;
        htmlContent += `<td>${client.ownerPhone || ''}</td>`;
        htmlContent += `<td>${client.ownerAddress || ''}</td>`;
        htmlContent += `<td>${client.created || ''}</td>`;
        htmlContent += `<td>${client.expires || ''}</td>`;
        htmlContent += `<td>${client.status}</td>`;
        htmlContent += `<td>${client.plan || ''}</td>`;
        htmlContent += '</tr>';
    });
    
    htmlContent += '</table></body></html>';
    
    // Create blob and download
    const blob = new Blob([htmlContent], { type: 'application/vnd.ms-excel' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', `clients_${new Date().toISOString().split('T')[0]}.xls`);
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

const exportToPDF = async () => {
    const data = filteredClients.value;
    
    // Dynamically import jsPDF
    const { jsPDF } = await import('jspdf');
    const pdf = new jsPDF('landscape', 'mm', 'a4');
    
    // Page dimensions in landscape
    const pageWidth = pdf.internal.pageSize.getWidth();
    const pageHeight = pdf.internal.pageSize.getHeight();
    const margin = 10;
    const startX = margin;
    let startY = margin + 10;
    
    // Calculate available width (full page width minus margins)
    const availableWidth = pageWidth - (margin * 2);
    
    // Set font for title
    pdf.setFontSize(16);
    pdf.text('Clients List', startX, startY);
    startY += 10;
    
    // Table headers and proportional column widths (using full available width)
    const headers = ['SR', 'Domain', 'Owner Name', 'Email', 'Phone', 'Address', 'Created', 'Expires', 'Status', 'Plan'];
    // Define relative widths (proportions)
    const relativeWidths = [0.04, 0.12, 0.12, 0.15, 0.11, 0.13, 0.09, 0.09, 0.08, 0.07];
    // Calculate actual column widths based on available width
    const colWidths = relativeWidths.map(rel => rel * availableWidth);
    const baseRowHeight = 7;
    const fontSize = 8;
    const cellPadding = 1;
    
    pdf.setFontSize(fontSize);
    
    // Helper function to split text to fit column width
    const splitTextToFit = (text: string, maxWidth: number): string[] => {
        if (!text) return [''];
        const textStr = String(text);
        // Use jsPDF's built-in splitTextToSize method
        return pdf.splitTextToSize(textStr, maxWidth - (cellPadding * 2));
    };
    
    // Helper function to add cell with text wrapping
    const addCell = (text: string, x: number, y: number, width: number, isHeader: boolean = false): number => {
        pdf.setFont(undefined, isHeader ? 'bold' : 'normal');
        
        const lines = splitTextToFit(text, width);
        let currentY = y + baseRowHeight - 2;
        
        lines.forEach((line) => {
            pdf.text(line, x + cellPadding, currentY);
            currentY += baseRowHeight * 0.8;
        });
        
        return Math.max(lines.length * (baseRowHeight * 0.8), baseRowHeight);
    };
    
    // Add headers
    let xPos = startX;
    headers.forEach((header, index) => {
        addCell(header, xPos, startY, colWidths[index], true);
        xPos += colWidths[index];
    });
    
    // Draw header line (using full available width)
    startY += baseRowHeight + 2;
    pdf.setLineWidth(0.5);
    pdf.line(startX, startY, startX + availableWidth, startY);
    startY += 3;
    
    // Add data rows
    data.forEach((client) => {
        // Check if we need a new page
        if (startY + baseRowHeight * 3 > pageHeight - margin) {
            pdf.addPage();
            startY = margin;
            
            // Redraw headers on new page
            xPos = startX;
            headers.forEach((header, hIndex) => {
                addCell(header, xPos, startY, colWidths[hIndex], true);
                xPos += colWidths[hIndex];
            });
            
            startY += baseRowHeight + 2;
            pdf.setLineWidth(0.5);
            pdf.line(startX, startY, startX + availableWidth, startY);
            startY += 3;
        }
        
        // Prepare row data
        const rowData = [
            String(client.srNo),
            client.domain || '-',
            client.ownerName || '-',
            client.ownerEmail || '-',
            client.ownerPhone || '-',
            client.ownerAddress || '-',
            client.created || '-',
            client.expires || '-',
            client.status || '-',
            client.plan || '-',
        ];
        
        // Calculate max height needed for this row (for multi-line cells)
        let maxCellHeight = baseRowHeight;
        rowData.forEach((cell, cellIndex) => {
            const lines = splitTextToFit(cell, colWidths[cellIndex]);
            const cellHeight = Math.max(lines.length * (baseRowHeight * 0.8), baseRowHeight);
            maxCellHeight = Math.max(maxCellHeight, cellHeight);
        });
        
        // Add cells
        xPos = startX;
        rowData.forEach((cell, cellIndex) => {
            addCell(cell, xPos, startY, colWidths[cellIndex]);
            xPos += colWidths[cellIndex];
        });
        
        // Draw row separator (using full available width)
        startY += maxCellHeight + 2;
        pdf.setLineWidth(0.1);
        pdf.line(startX, startY, startX + availableWidth, startY);
        startY += 1;
    });
    
    // Save PDF
    pdf.save(`clients_${new Date().toISOString().split('T')[0]}.pdf`);
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
    destroyDatePickers();
});
</script>

<template>
    <Head title="Clients" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Clients</h1>
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
                                placeholder="Search clients"
                                class="pl-8 h-8 text-sm"
                            />
                        </div>
                        <Button variant="outline" size="sm" class="h-8 text-xs" @click="openFilters">
                            <Filter class="size-3.5" />
                            Filter
                        </Button>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Export Button -->
                        <DropdownMenu>
                            <DropdownMenuTrigger>
                                <Button variant="outline" size="sm" class="h-8 text-xs cursor-pointer">
                                    <Download class="size-3.5 mr-1.5" />
                                    Export
                                    <ChevronDownIcon class="size-3.5 ml-1.5" />
                                </Button>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent align="end" class="w-40">
                                <DropdownMenuItem @click="exportToCSV" class="cursor-pointer">
                                    Export as CSV
                                </DropdownMenuItem>
                                <DropdownMenuItem @click="exportToExcel" class="cursor-pointer">
                                    Export as Excel
                                </DropdownMenuItem>
                                <DropdownMenuItem @click="exportToPDF" class="cursor-pointer">
                                    Export as PDF
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                        
                        <!-- Pagination Controls -->
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-muted-foreground">Per Page</span>
                            <select
                                v-model="perPage"
                                class="h-7 rounded-md border border-input bg-background px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-ring"
                            >
                                <option :value="10">10</option>
                                <option :value="25">25</option>
                                <option :value="50">50</option>
                                <option :value="100">100</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground">{{ paginationInfo }}</span>
                            <div class="flex items-center gap-1">
                                <button
                                    @click="goToPage(currentPage - 1)"
                                    :disabled="currentPage === 1"
                                    class="p-1 rounded-md hover:bg-muted disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                                    type="button"
                                >
                                    <ChevronLeft class="size-4 text-muted-foreground" />
                                </button>
                                <button
                                    @click="goToPage(currentPage + 1)"
                                    :disabled="currentPage === totalPages"
                                    class="p-1 rounded-md hover:bg-muted disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                                    type="button"
                                >
                                    <ChevronRight class="size-4 text-muted-foreground" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error Message -->
            <div v-if="props.error" class="rounded-md border border-red-200 bg-red-50 dark:bg-red-900/20 p-4 mb-4">
                <p class="text-sm text-red-800 dark:text-red-200">{{ props.error }}</p>
            </div>

            <!-- Table Section -->
            <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                <table class="w-full text-sm">
                    <thead class="sticky top-0 z-10 bg-muted/50">
                        <tr>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                SR NO
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                DOMAIN
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                OWNER NAME
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                OWNER EMAIL
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                OWNER PHONE
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                OWNER ADDRESS
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                CREATED
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                EXPIRES
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                STATUS
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                ACTION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredClients.length === 0">
                            <td colspan="10" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <p class="text-sm text-muted-foreground">No clients found</p>
                                    <p class="text-xs text-muted-foreground">
                                        {{ searchQuery ? 'Try adjusting your search criteria' : 'Add your first client to get started' }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-for="client in paginatedClients"
                            :key="client.id"
                            class="border-b border-border transition-colors hover:bg-muted/50"
                        >
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ client.srNo }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground font-medium">{{ client.domain || '-' }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ client.ownerName || '-' }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ client.ownerEmail || '-' }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ client.ownerPhone || '-' }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ client.ownerAddress || '-' }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ client.created || '-' }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ client.expires || '-' }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span
                                    :class="[
                                        'inline-flex items-center rounded-full px-2 py-1 text-xs font-medium',
                                        client.status === 'active'
                                            ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                            : 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200',
                                    ]"
                                >
                                    {{ client.status === 'active' ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Link
                                        :href="clientsShow(client.id).url"
                                        class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                        title="View"
                                    >
                                        <Eye class="size-4 text-muted-foreground" />
                                    </Link>
                                    <Link
                                        :href="clientsEdit(client.id).url"
                                        class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                        title="Edit"
                                    >
                                        <Edit class="size-4 text-muted-foreground" />
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Filters Modal -->
        <div
            v-if="showFilters"
            class="fixed inset-0 z-50 flex items-start justify-end"
            @click.self="closeFilters"
        >
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/50"></div>

            <!-- Filters Panel -->
            <div class="relative h-full w-full max-w-sm bg-white dark:bg-gray-900 shadow-xl overflow-y-auto transform transition-transform duration-300 ease-in-out">
                <!-- Header -->
                <div class="sticky top-0 z-10 flex items-center justify-between border-b border-border bg-white dark:bg-gray-900 px-6 py-4">
                    <h2 class="text-lg font-semibold text-foreground">Filters</h2>
                    <button
                        @click="closeFilters"
                        type="button"
                        class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                        aria-label="Close filters"
                    >
                        <X class="size-5 text-muted-foreground" />
                    </button>
                </div>

                <!-- Filters Content -->
                <div class="p-6 space-y-6">
                    <!-- Custom Filters Section -->
                    <div>
                        <button
                            @click="customFiltersExpanded = !customFiltersExpanded"
                            class="w-full flex items-center justify-between mb-4 cursor-pointer"
                            type="button"
                        >
                            <h3 class="text-base font-semibold text-foreground">Custom Filters</h3>
                            <ChevronUp
                                v-if="customFiltersExpanded"
                                class="size-4 text-muted-foreground"
                            />
                            <ChevronDown
                                v-else
                                class="size-4 text-muted-foreground"
                            />
                        </button>

                        <div v-if="customFiltersExpanded" class="space-y-4">
                            <!-- Status Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Status
                                </label>
                                <button
                                    @click.stop="openStatusDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.status ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate capitalize">
                                        {{ filterForm.status || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.status && !showStatusDropdown"
                                            @click.stop="clearStatus"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear status"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                <div
                                    v-if="showStatusDropdown"
                                    class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                                >
                                    <button
                                        v-for="option in statusOptions"
                                        :key="option"
                                        @click="filterForm.status = option; showStatusDropdown = false"
                                        type="button"
                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer capitalize"
                                    >
                                        {{ option }}
                                    </button>
                                </div>
                            </div>

                            <!-- Plan Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Plan
                                </label>
                                <button
                                    @click.stop="openPlanDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.plan ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                        {{ filterForm.plan || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.plan && !showPlanDropdown"
                                            @click.stop="clearPlan"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear plan"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                <div
                                    v-if="showPlanDropdown"
                                    class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                                >
                                    <button
                                        v-for="option in planOptions"
                                        :key="option"
                                        @click="filterForm.plan = option; showPlanDropdown = false"
                                        type="button"
                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                    >
                                        {{ option }}
                                    </button>
                                </div>
                            </div>

                            <!-- Created Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Created
                                </label>
                                <div class="relative">
                                    <input
                                        ref="createdInputRef"
                                        type="text"
                                        placeholder="YYYY-MM-DD"
                                        readonly
                                        :value="filterForm.created"
                                        class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pr-10 cursor-pointer focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]"
                                    />
                                    <Calendar class="absolute right-3 top-1/2 size-4 -translate-y-1/2 text-muted-foreground pointer-events-none" />
                                </div>
                            </div>

                            <!-- Expires Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Expires
                                </label>
                                <div class="relative">
                                    <input
                                        ref="expiresInputRef"
                                        type="text"
                                        placeholder="YYYY-MM-DD"
                                        readonly
                                        :value="filterForm.expires"
                                        class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pr-10 cursor-pointer focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]"
                                    />
                                    <Calendar class="absolute right-3 top-1/2 size-4 -translate-y-1/2 text-muted-foreground pointer-events-none" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="sticky bottom-0 flex items-center justify-between gap-3 border-t border-border bg-white dark:bg-gray-900 px-6 py-4">
                    <Button
                        variant="outline"
                        size="sm"
                        @click="resetFilters"
                        class="cursor-pointer"
                    >
                        Reset Filter
                    </Button>
                    <Button
                        size="sm"
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                        @click="applyFilters"
                    >
                        Apply Filters
                    </Button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

