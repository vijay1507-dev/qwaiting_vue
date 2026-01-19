<script setup lang="ts">
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Input } from '@/components/ui/input';
import AppSidebarLayout from '@/layouts/app/AppSidebarLayout.vue';
import { show } from '@/routes/package-enquiries';
import { Head, Link } from '@inertiajs/vue3';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import type { Instance } from 'flatpickr/dist/types/instance';
import {
    ChevronDown as ChevronDownIcon,
    ChevronLeft,
    ChevronRight,
    Download,
    Eye,
    Filter,
    Search,
} from 'lucide-vue-next';
import { computed, nextTick, onMounted, onUnmounted, ref, watch } from 'vue';

interface Enquiry {
    id: number;
    full_name: string;
    email: string;
    mobile_number: string;
    company_name: string;
    interested_package: string;
    billing_cycle: string;
    status: string;
    created_at: string;
}

const props = defineProps<{
    enquiries: Enquiry[];
}>();

const searchQuery = ref('');
const showFilters = ref(false);
const currentPage = ref(1);
const perPage = ref(10);

// Filter form data
const filterForm = ref({
    status: '',
    created: '',
});

// Dropdown visibility
const showStatusDropdown = ref(false);

// Date pickers for filters
const createdPicker = ref<Instance | null>(null);
const createdInputRef = ref<HTMLInputElement | null>(null);

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
};

// Filter enquiries based on search query and filters
const filteredEnquiries = computed(() => {
    let data = props.enquiries || [];

    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        data = data.filter(
            (enquiry) =>
                (enquiry.full_name || '').toLowerCase().includes(query) ||
                (enquiry.email || '').toLowerCase().includes(query) ||
                (enquiry.company_name || '').toLowerCase().includes(query) ||
                (enquiry.interested_package || '')
                    .toLowerCase()
                    .includes(query) ||
                (String(enquiry.id) || '').includes(query),
        );
    }

    // Apply filters
    if (filterForm.value.status) {
        data = data.filter(
            (enquiry) => enquiry.status === filterForm.value.status,
        );
    }
    if (filterForm.value.created) {
        data = data.filter((enquiry) =>
            (enquiry.created_at || '').includes(filterForm.value.created),
        );
    }

    return data;
});

// Pagination
const paginatedEnquiries = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return filteredEnquiries.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredEnquiries.value.length / perPage.value);
});

const paginationInfo = computed(() => {
    if (filteredEnquiries.value.length === 0) return '0 - 0 of 0';
    const start = (currentPage.value - 1) * perPage.value + 1;
    const end = Math.min(
        currentPage.value * perPage.value,
        filteredEnquiries.value.length,
    );
    return `${start} - ${end} of ${filteredEnquiries.value.length}`;
});

const goToPage = (page: number) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

// Reset to page 1 when search query, per page, or filters change
watch(
    [searchQuery, perPage, filterForm],
    () => {
        currentPage.value = 1;
    },
    { deep: true },
);

// Ensure current page is valid when filtered results change
watch(filteredEnquiries, () => {
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

const closeAllDropdowns = (except?: 'status') => {
    if (except !== 'status') {
        showStatusDropdown.value = false;
    }
};

const openStatusDropdown = () => {
    closeAllDropdowns('status');
    showStatusDropdown.value = !showStatusDropdown.value;
};

const clearStatus = () => {
    filterForm.value.status = '';
};

const applyFilters = () => {
    currentPage.value = 1;
    closeFilters();
};

const resetFilters = () => {
    // Reset all filter values
    filterForm.value = {
        status: '',
        created: '',
    };

    // Reset date pickers
    if (createdPicker.value) {
        createdPicker.value.clear();
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
    }, 200);
};

const destroyDatePickers = () => {
    if (createdPicker.value) {
        createdPicker.value.destroy();
        createdPicker.value = null;
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
    const data = filteredEnquiries.value;
    const headers = [
        'ID',
        'Date',
        'Full Name',
        'Email',
        'Company',
        'Mobile',
        'Package',
        'Billing',
        'Status',
    ];

    // Create CSV content
    let csvContent = headers.join(',') + '\n';

    data.forEach((enquiry) => {
        const row = [
            enquiry.id,
            enquiry.created_at || '',
            `"${(enquiry.full_name || '').replace(/"/g, '""')}"`,
            `"${(enquiry.email || '').replace(/"/g, '""')}"`,
            `"${(enquiry.company_name || '').replace(/"/g, '""')}"`,
            `"${(enquiry.mobile_number || '').replace(/"/g, '""')}"`,
            `"${(enquiry.interested_package || '').replace(/"/g, '""')}"`,
            enquiry.billing_cycle || '',
            enquiry.status || '',
        ];
        csvContent += row.join(',') + '\n';
    });

    // Create blob and download
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute(
        'download',
        `enquiries_${new Date().toISOString().split('T')[0]}.csv`,
    );
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

const exportToExcel = () => {
    const data = filteredEnquiries.value;
    const headers = [
        'ID',
        'Date',
        'Full Name',
        'Email',
        'Company',
        'Mobile',
        'Package',
        'Billing',
        'Status',
    ];

    // Create HTML table for Excel
    let htmlContent =
        '<html><head><meta charset="utf-8"></head><body><table border="1">';

    // Add headers
    htmlContent += '<tr>';
    headers.forEach((header) => {
        htmlContent += `<th>${header}</th>`;
    });
    htmlContent += '</tr>';

    // Add data rows
    data.forEach((enquiry) => {
        htmlContent += '<tr>';
        htmlContent += `<td>${enquiry.id}</td>`;
        htmlContent += `<td>${enquiry.created_at || ''}</td>`;
        htmlContent += `<td>${enquiry.full_name || ''}</td>`;
        htmlContent += `<td>${enquiry.email || ''}</td>`;
        htmlContent += `<td>${enquiry.company_name || ''}</td>`;
        htmlContent += `<td>${enquiry.mobile_number || ''}</td>`;
        htmlContent += `<td>${enquiry.interested_package || ''}</td>`;
        htmlContent += `<td>${enquiry.billing_cycle || ''}</td>`;
        htmlContent += `<td>${enquiry.status || ''}</td>`;
        htmlContent += '</tr>';
    });

    htmlContent += '</table></body></html>';

    // Create blob and download
    const blob = new Blob([htmlContent], { type: 'application/vnd.ms-excel' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute(
        'download',
        `enquiries_${new Date().toISOString().split('T')[0]}.xls`,
    );
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

const exportToPDF = async () => {
    const data = filteredEnquiries.value;

    // Dynamically import jsPDF
    const { jsPDF } = await import('jspdf');
    const pdf = new jsPDF('landscape', 'mm', 'a4');

    // Page dimensions in landscape
    const pageWidth = pdf.internal.pageSize.getWidth();
    const pageHeight = pdf.internal.pageSize.getHeight();
    const margin = 10;
    const startX = margin;
    let startY = margin + 10;

    // Calculate available width
    const availableWidth = pageWidth - margin * 2;

    // Set font for title
    pdf.setFontSize(16);
    pdf.text('Package Enquiries', startX, startY);
    startY += 10;

    // Table headers and proportional column widths
    const headers = [
        'ID',
        'Date',
        'Name',
        'Email',
        'Package',
        'Billing',
        'Status',
    ];
    // Define relative widths
    const relativeWidths = [0.05, 0.15, 0.15, 0.2, 0.15, 0.15, 0.15];
    // Calculate actual column widths
    const colWidths = relativeWidths.map((rel) => rel * availableWidth);
    const baseRowHeight = 7;
    const fontSize = 8;
    const cellPadding = 1;

    pdf.setFontSize(fontSize);

    // Helper function to split text to fit column width
    const splitTextToFit = (text: string, maxWidth: number): string[] => {
        if (!text) return [''];
        const textStr = String(text);
        return pdf.splitTextToSize(textStr, maxWidth - cellPadding * 2);
    };

    // Helper function to add cell with text wrapping
    const addCell = (
        text: string,
        x: number,
        y: number,
        width: number,
        isHeader: boolean = false,
    ): number => {
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

    // Draw header line
    startY += baseRowHeight + 2;
    pdf.setLineWidth(0.5);
    pdf.line(startX, startY, startX + availableWidth, startY);
    startY += 3;

    // Add data rows
    data.forEach((enquiry) => {
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
            String(enquiry.id),
            formatDate(enquiry.created_at),
            enquiry.full_name || '-',
            enquiry.email || '-',
            enquiry.interested_package || '-',
            enquiry.billing_cycle || '-',
            enquiry.status || '-',
        ];

        // Calculate max height needed for this row
        let maxCellHeight = baseRowHeight;
        rowData.forEach((cell, cellIndex) => {
            const lines = splitTextToFit(cell, colWidths[cellIndex]);
            const cellHeight = Math.max(
                lines.length * (baseRowHeight * 0.8),
                baseRowHeight,
            );
            maxCellHeight = Math.max(maxCellHeight, cellHeight);
        });

        // Add cells
        xPos = startX;
        rowData.forEach((cell, cellIndex) => {
            addCell(cell, xPos, startY, colWidths[cellIndex]);
            xPos += colWidths[cellIndex];
        });

        // Draw row separator
        startY += maxCellHeight + 2;
        pdf.setLineWidth(0.1);
        pdf.line(startX, startY, startX + availableWidth, startY);
        startY += 1;
    });

    // Save PDF
    pdf.save(`enquiries_${new Date().toISOString().split('T')[0]}.pdf`);
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
    <Head title="Package Enquiries" />

    <AppSidebarLayout>
        <div
            class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-6"
        >
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight">
                        Package Enquiries
                    </h2>
                    <p class="text-muted-foreground">
                        Manage and view all package upgrade requests.
                    </p>
                </div>

                <!-- Action Bar -->
                <div class="mt-4 flex items-center justify-between gap-2">
                    <div class="flex flex-1 items-center gap-2">
                        <div class="relative max-w-xs flex-1">
                            <Search
                                class="absolute top-1/2 left-2.5 size-3.5 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search enquiries"
                                class="h-8 pl-8 text-sm"
                            />
                        </div>
                        <Button
                            variant="outline"
                            size="sm"
                            class="h-8 text-xs"
                            @click="openFilters"
                        >
                            <Filter class="size-3.5" />
                            Filter
                        </Button>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Export Button -->
                        <DropdownMenu>
                            <DropdownMenuTrigger>
                                <Button
                                    variant="outline"
                                    size="sm"
                                    class="h-8 cursor-pointer text-xs"
                                >
                                    <Download class="mr-1.5 size-3.5" />
                                    Export
                                    <ChevronDownIcon class="ml-1.5 size-3.5" />
                                </Button>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent align="end" class="w-40">
                                <DropdownMenuItem
                                    @click="exportToCSV"
                                    class="cursor-pointer"
                                >
                                    Export as CSV
                                </DropdownMenuItem>
                                <DropdownMenuItem
                                    @click="exportToExcel"
                                    class="cursor-pointer"
                                >
                                    Export as Excel
                                </DropdownMenuItem>
                                <DropdownMenuItem
                                    @click="exportToPDF"
                                    class="cursor-pointer"
                                >
                                    Export as PDF
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>

                        <!-- Pagination Controls -->
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-muted-foreground"
                                >Per Page</span
                            >
                            <select
                                v-model="perPage"
                                class="h-7 rounded-md border border-input bg-background px-2 py-1 text-xs focus:ring-2 focus:ring-ring focus:outline-none"
                            >
                                <option :value="10">10</option>
                                <option :value="25">25</option>
                                <option :value="50">50</option>
                                <option :value="100">100</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground">{{
                                paginationInfo
                            }}</span>
                            <div class="flex items-center gap-1">
                                <button
                                    @click="goToPage(currentPage - 1)"
                                    :disabled="currentPage === 1"
                                    class="cursor-pointer rounded-md p-1 hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                    type="button"
                                >
                                    <ChevronLeft
                                        class="size-4 text-muted-foreground"
                                    />
                                </button>
                                <button
                                    @click="goToPage(currentPage + 1)"
                                    :disabled="currentPage === totalPages"
                                    class="cursor-pointer rounded-md p-1 hover:bg-muted disabled:cursor-not-allowed disabled:opacity-50"
                                    type="button"
                                >
                                    <ChevronRight
                                        class="size-4 text-muted-foreground"
                                    />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Popover -->
            <div
                v-if="showFilters"
                class="absolute inset-x-0 top-0 z-50 rounded-b-xl border-b bg-background p-4 shadow-lg transition-all duration-300 md:relative md:inset-auto md:mb-4 md:rounded-xl md:border md:shadow-sm"
            >
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-sm font-medium">Filters</h3>
                    <Button
                        variant="ghost"
                        size="sm"
                        class="h-6 w-6 p-0"
                        @click="closeFilters"
                    >
                        <span class="sr-only">Close</span>
                        <ChevronDownIcon class="h-4 w-4 rotate-180" />
                    </Button>
                </div>

                <div class="grid gap-4 md:grid-cols-4">
                    <!-- Status Filter -->
                    <div class="dropdown-container relative space-y-1.5">
                        <label class="text-xs text-muted-foreground"
                            >Status</label
                        >
                        <div
                            class="flex h-9 w-full cursor-pointer items-center justify-between rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm hover:bg-accent hover:text-accent-foreground"
                            @click="openStatusDropdown"
                        >
                            <span
                                v-if="filterForm.status"
                                class="block truncate"
                                >{{ filterForm.status }}</span
                            >
                            <span v-else class="text-muted-foreground"
                                >All Statuses</span
                            >
                            <div class="flex items-center">
                                <span
                                    v-if="filterForm.status"
                                    class="mr-1 flex h-4 w-4 items-center justify-center rounded-full hover:bg-muted"
                                    @click.stop="clearStatus"
                                >
                                    <ChevronDownIcon
                                        class="h-3 w-3 rotate-45"
                                    />
                                </span>
                                <ChevronDownIcon class="h-4 w-4 opacity-50" />
                            </div>
                        </div>

                        <!-- Dropdown Menu -->
                        <div
                            v-if="showStatusDropdown"
                            class="absolute top-10 z-50 w-full min-w-[8rem] overflow-hidden rounded-md border bg-popover text-popover-foreground shadow-md"
                        >
                            <div class="p-1">
                                <div
                                    class="relative flex cursor-default items-center rounded-sm px-2 py-1.5 text-sm outline-none select-none hover:bg-accent hover:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                                    @click="
                                        filterForm.status = 'Open';
                                        showStatusDropdown = false;
                                    "
                                >
                                    Open
                                </div>
                                <div
                                    class="relative flex cursor-default items-center rounded-sm px-2 py-1.5 text-sm outline-none select-none hover:bg-accent hover:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                                    @click="
                                        filterForm.status = 'Closed';
                                        showStatusDropdown = false;
                                    "
                                >
                                    Closed
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Date Filter -->
                    <div class="space-y-1.5">
                        <label class="text-xs text-muted-foreground"
                            >Date</label
                        >
                        <div class="relative">
                            <input
                                ref="createdInputRef"
                                type="text"
                                class="flex h-9 w-full rounded-md border border-input bg-background px-3 py-1 text-sm shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:ring-1 focus-visible:ring-ring focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="Select date"
                                :value="filterForm.created"
                            />
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex justify-end gap-2">
                    <Button variant="outline" size="sm" @click="resetFilters">
                        Reset
                    </Button>
                    <Button size="sm" @click="applyFilters">Apply</Button>
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
                                ID
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                DATE
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                CUSTOMER
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                PACKAGE
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                BILLING
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                STATUS
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                ACTIONS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="enquiry in paginatedEnquiries"
                            :key="enquiry.id"
                            class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                        >
                            <td class="p-4 align-middle">#{{ enquiry.id }}</td>
                            <td class="p-4 align-middle">
                                {{ formatDate(enquiry.created_at) }}
                            </td>
                            <td class="p-4 align-middle">
                                <div class="font-medium">
                                    {{ enquiry.full_name }}
                                </div>
                                <div class="text-sm text-muted-foreground">
                                    {{ enquiry.email }}
                                </div>
                            </td>
                            <td class="p-4 align-middle">
                                <Badge variant="outline">{{
                                    enquiry.interested_package
                                }}</Badge>
                            </td>
                            <td class="p-4 align-middle">
                                {{ enquiry.billing_cycle }}
                            </td>
                            <td class="p-4 align-middle">
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
                            <td class="p-4 text-left align-middle">
                                <Link :href="show({ id: enquiry.id }).url">
                                    <Button variant="ghost" size="icon">
                                        <Eye class="h-4 w-4" />
                                    </Button>
                                </Link>
                            </td>
                        </tr>
                        <tr v-if="filteredEnquiries.length === 0">
                            <td colspan="7" class="px-4 py-12 text-center">
                                <div
                                    class="flex flex-col items-center justify-center gap-2"
                                >
                                    <p class="text-sm text-muted-foreground">
                                        No enquiries found
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppSidebarLayout>
</template>
