<script setup lang="ts">
import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useToast } from '@/composables/useToast';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { users as userManagementUsers } from '@/routes/user-management';
import {
    create as userManagementUsersCreate,
    destroy as userManagementUsersDestroy,
    edit as userManagementUsersEdit,
} from '@/routes/user-management/users';

import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import {
    ChevronDown as ChevronDownIcon,
    Download,
    Edit,
    MoreHorizontal,
    Plus,
    Search,
} from 'lucide-vue-next';
import { computed, ref, watch } from 'vue';

interface User {
    id: string;
    userId: string;
    name: string;
    mobileNumber: string;
    emailAddress: string;
    accountStatus: string;
    role: string;
    assignedCountries: string;
}

interface Props {
    users?: User[];
}

const props = withDefaults(defineProps<Props>(), {
    users: () => [],
});

const page = usePage();
const { success, error: showError } = useToast();

// Permission helper
const hasPermission = (permission: string) => {
    const permissions = (page.props as any).auth?.permissions || [];
    return permissions.includes(permission) || permissions.includes('*');
};

// Watch for flash messages
watch(
    () => (page.props as any).flash?.success,
    (message) => {
        if (message) {
            success(message);
        }
    },
    { immediate: true },
);

watch(
    () => (page.props as any).flash?.error,
    (message) => {
        if (message) {
            showError(message);
        }
    },
    { immediate: true },
);

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'User Management',
        href: userManagementUsers().url,
    },
    {
        title: 'Users',
        href: userManagementUsers().url,
    },
];

const searchQuery = ref('');

// Filter users based on search query
const filteredUsers = computed(() => {
    if (!searchQuery.value.trim()) {
        return props.users || [];
    }

    const query = searchQuery.value.toLowerCase();
    return (props.users || []).filter(
        (user) =>
            (user.userId || '').toLowerCase().includes(query) ||
            (user.name || '').toLowerCase().includes(query) ||
            (user.emailAddress || '').toLowerCase().includes(query) ||
            (user.mobileNumber || '').toLowerCase().includes(query),
    );
});

// Dialog states
const showDeleteDialog = ref(false);
const showResetPasswordDialog = ref(false);
const selectedUser = ref<User | null>(null);

// Delete form
const deleteForm = useForm({
    method: 'delete',
});

// Reset password form
const resetPasswordForm = useForm({
    password: '',
    password_confirmation: '',
});

const openDeleteDialog = (user: User) => {
    selectedUser.value = user;
    showDeleteDialog.value = true;
};

const closeDeleteDialog = () => {
    showDeleteDialog.value = false;
    selectedUser.value = null;
};

const handleDelete = () => {
    if (!selectedUser.value) {
        return;
    }

    deleteForm.delete(
        userManagementUsersDestroy({ id: selectedUser.value.id }).url,
        {
            preserveScroll: true,
            onSuccess: () => {
                closeDeleteDialog();
            },
        },
    );
};

const openResetPasswordDialog = (user: User) => {
    selectedUser.value = user;
    resetPasswordForm.reset();
    showResetPasswordDialog.value = true;
};

const closeResetPasswordDialog = () => {
    showResetPasswordDialog.value = false;
    selectedUser.value = null;
    resetPasswordForm.reset();
};

const handleResetPassword = () => {
    if (!selectedUser.value) {
        return;
    }

    resetPasswordForm.post(
        userManagementUsersResetPassword({ id: selectedUser.value.id }).url,
        {
            preserveScroll: true,
            onSuccess: () => {
                closeResetPasswordDialog();
            },
        },
    );
};

const getStatusColor = (status: string) => {
    switch (status) {
        case 'Active':
            return 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-200';
        case 'Inactive':
            return 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200';
        default:
            return 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-200';
    }
};

// Export functions
const exportToCSV = () => {
    const data = filteredUsers.value;
    const headers = [
        'User ID',
        'Name',
        'Mobile Number',
        'Email Address',
        'Account Status',
        'Role',
        'Assigned Countries',
    ];

    // Create CSV content
    let csvContent = headers.join(',') + '\n';

    data.forEach((user) => {
        const row = [
            `"${(user.userId || '').replace(/"/g, '""')}"`,
            `"${(user.name || '').replace(/"/g, '""')}"`,
            `"${(user.mobileNumber || '').replace(/"/g, '""')}"`,
            `"${(user.emailAddress || '').replace(/"/g, '""')}"`,
            user.accountStatus || '',
            user.role || '',
            `"${(user.assignedCountries || '').replace(/"/g, '""')}"`,
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
        `users_${new Date().toISOString().split('T')[0]}.csv`,
    );
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

const exportToExcel = () => {
    const data = filteredUsers.value;
    const headers = [
        'User ID',
        'Name',
        'Mobile Number',
        'Email Address',
        'Account Status',
        'Role',
        'Assigned Countries',
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
    data.forEach((user) => {
        htmlContent += '<tr>';
        htmlContent += `<td>${user.userId || ''}</td>`;
        htmlContent += `<td>${user.name || ''}</td>`;
        htmlContent += `<td>${user.mobileNumber || ''}</td>`;
        htmlContent += `<td>${user.emailAddress || ''}</td>`;
        htmlContent += `<td>${user.accountStatus || ''}</td>`;
        htmlContent += `<td>${user.role || ''}</td>`;
        htmlContent += `<td>${user.assignedCountries || ''}</td>`;
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
        `users_${new Date().toISOString().split('T')[0]}.xls`,
    );
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

const exportToPDF = async () => {
    const data = filteredUsers.value;

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
    const availableWidth = pageWidth - margin * 2;

    // Set font for title
    pdf.setFontSize(16);
    pdf.text('Users List', startX, startY);
    startY += 10;

    // Table headers and proportional column widths (using full available width)
    const headers = [
        'User ID',
        'Name',
        'Mobile Number',
        'Email Address',
        'Account Status',
        'Role',
        'Countries',
    ];
    // Define relative widths (proportions)
    const relativeWidths = [0.1, 0.15, 0.12, 0.2, 0.08, 0.1, 0.25];
    // Calculate actual column widths based on available width
    const colWidths = relativeWidths.map((rel) => rel * availableWidth);
    const baseRowHeight = 7;
    const fontSize = 8;
    const cellPadding = 1;

    pdf.setFontSize(fontSize);

    // Helper function to split text to fit column width
    const splitTextToFit = (text: string, maxWidth: number): string[] => {
        if (!text) return [''];
        const textStr = String(text);
        // Use jsPDF's built-in splitTextToSize method
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

    // Helper function to draw headers and return total header height
    const drawHeaders = (y: number): number => {
        let xPos = startX;
        let maxHeaderHeight = baseRowHeight;

        // Calculate max height first
        headers.forEach((header, index) => {
            const lines = splitTextToFit(header, colWidths[index]);
            const height = Math.max(
                lines.length * (baseRowHeight * 0.8),
                baseRowHeight,
            );
            maxHeaderHeight = Math.max(maxHeaderHeight, height);
        });

        // Draw headers
        headers.forEach((header, index) => {
            addCell(header, xPos, y, colWidths[index], true);
            xPos += colWidths[index];
        });

        // Draw line
        const lineY = y + maxHeaderHeight + 5;
        pdf.setLineWidth(0.5);
        pdf.line(startX, lineY, startX + availableWidth, lineY);

        return maxHeaderHeight + 8; // Return total height used (including padding)
    };

    // Initial headers
    startY += drawHeaders(startY);

    // Add data rows
    const lineHeight = baseRowHeight * 0.8;

    data.forEach((user) => {
        // Prepare row data
        const rowData = [
            user.userId || '-',
            user.name || '-',
            user.mobileNumber || '-',
            user.emailAddress || '-',
            user.accountStatus || '-',
            user.role || '-',
            user.assignedCountries || '-',
        ];

        // Split all cells into lines
        const rowLines = rowData.map((cell, i) =>
            splitTextToFit(cell, colWidths[i]),
        );
        const maxLines = Math.max(...rowLines.map((l) => l.length));

        // Iterate through all lines needed for this user row
        for (let i = 0; i < maxLines; i++) {
            // Check if we need a new page
            if (startY + lineHeight > pageHeight - margin) {
                pdf.addPage();
                startY = margin;
                startY += drawHeaders(startY);
            }

            let xPos = startX;
            rowLines.forEach((lines, colIndex) => {
                if (lines[i]) {
                    pdf.text(
                        lines[i],
                        xPos + cellPadding,
                        startY + lineHeight - 2,
                    );
                }
                xPos += colWidths[colIndex];
            });
            startY += lineHeight;
        }

        // Draw row separator
        startY += 2;
        pdf.setLineWidth(0.1);
        pdf.line(startX, startY, startX + availableWidth, startY);
        startY += 1;
    });

    // Save PDF
    pdf.save(`users_${new Date().toISOString().split('T')[0]}.pdf`);
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Users" />

        <div class="flex h-full flex-col gap-4 p-6">
            <!-- Header Section -->
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-foreground">
                        User Management
                    </h1>
                </div>

                <!-- Filter and Action Bar -->
                <div class="flex items-center justify-between gap-4">
                    <!-- Left Side: Filter Tab and Search -->
                    <div class="flex flex-1 items-center gap-4">
                        <!-- All Users Tab -->
                        <Button
                            variant="outline"
                            class="bg-muted text-foreground hover:bg-muted/80"
                        >
                            All Users
                        </Button>

                        <!-- Search Input -->
                        <div class="relative max-w-md flex-1">
                            <Search
                                class="absolute top-1/2 left-2.5 size-4 -translate-y-1/2 text-muted-foreground"
                            />
                            <Input
                                v-model="searchQuery"
                                placeholder="Search by ID, Name, Email, Mobile number"
                                class="h-9 pl-9 text-sm"
                            />
                        </div>
                    </div>

                    <!-- Right Side: Export and Add User Button -->
                    <div class="flex items-center gap-3">
                        <!-- Export Button -->
                        <DropdownMenu>
                            <DropdownMenuTrigger>
                                <Button
                                    variant="outline"
                                    size="sm"
                                    class="h-9 cursor-pointer"
                                >
                                    <Download class="mr-2 size-4" />
                                    Export
                                    <ChevronDownIcon class="ml-2 size-4" />
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

                        <!-- Add User Button -->
                        <Link
                            v-if="hasPermission('user_management.users.create')"
                            :href="userManagementUsersCreate().url"
                        >
                            <Button
                                class="bg-purple-600 text-white hover:bg-purple-700"
                            >
                                <Plus class="mr-2 size-4" />
                                Add User
                            </Button>
                        </Link>
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
                                User ID
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Name
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Mobile Number
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Email Address
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Account Status
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Role
                            </th>
                            <th
                                class="h-10 px-4 text-left align-middle font-medium text-muted-foreground"
                            >
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredUsers.length === 0">
                            <td colspan="7" class="px-4 py-12 text-center">
                                <div
                                    class="flex flex-col items-center justify-center gap-2"
                                >
                                    <p class="text-sm text-muted-foreground">
                                        No users found
                                    </p>
                                    <p class="text-xs text-muted-foreground">
                                        {{
                                            searchQuery
                                                ? 'Try adjusting your search criteria'
                                                : 'Add your first user to get started'
                                        }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-for="user in filteredUsers"
                            :key="user.id"
                            class="border-b border-border transition-colors hover:bg-muted/50"
                        >
                            <td class="px-4 py-3 align-middle">
                                <span class="font-medium text-foreground">{{
                                    user.userId
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.name
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.mobileNumber
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.emailAddress
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span
                                    :class="[
                                        'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium',
                                        getStatusColor(user.accountStatus),
                                    ]"
                                >
                                    {{ user.accountStatus }}
                                </span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{
                                    user.role
                                }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Link
                                        v-if="
                                            hasPermission(
                                                'user_management.users.update',
                                            )
                                        "
                                        :href="
                                            userManagementUsersEdit({
                                                id: user.id,
                                            }).url
                                        "
                                        class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                        title="Edit"
                                    >
                                        <Edit
                                            class="size-4 text-muted-foreground"
                                        />
                                    </Link>

                                    <DropdownMenu
                                        v-if="
                                            hasPermission(
                                                'user_management.users.reset_password',
                                            ) ||
                                            hasPermission(
                                                'user_management.users.delete',
                                            )
                                        "
                                    >
                                        <DropdownMenuTrigger as-child>
                                            <button
                                                class="cursor-pointer rounded-md p-1.5 transition-colors hover:bg-muted"
                                                title="More options"
                                            >
                                                <MoreHorizontal
                                                    class="size-4 text-muted-foreground"
                                                />
                                            </button>
                                        </DropdownMenuTrigger>
                                        <DropdownMenuContent align="end">
                                            <DropdownMenuItem
                                                v-if="
                                                    hasPermission(
                                                        'user_management.users.reset_password',
                                                    )
                                                "
                                                @click="
                                                    openResetPasswordDialog(
                                                        user,
                                                    )
                                                "
                                            >
                                                Reset Password
                                            </DropdownMenuItem>
                                            <DropdownMenuItem
                                                v-if="
                                                    hasPermission(
                                                        'user_management.users.delete',
                                                    )
                                                "
                                                class="text-destructive"
                                                @click="openDeleteDialog(user)"
                                            >
                                                Delete
                                            </DropdownMenuItem>
                                        </DropdownMenuContent>
                                    </DropdownMenu>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Delete Confirmation Dialog -->
        <Dialog
            :open="showDeleteDialog"
            @update:open="showDeleteDialog = $event"
        >
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Delete User</DialogTitle>
                    <DialogDescription>
                        Are you sure you want to delete
                        <strong>{{ selectedUser?.name }}</strong
                        >? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter>
                    <Button variant="outline" @click="closeDeleteDialog">
                        Cancel
                    </Button>
                    <Button
                        variant="destructive"
                        @click="handleDelete"
                        :disabled="deleteForm.processing"
                    >
                        {{ deleteForm.processing ? 'Deleting...' : 'Delete' }}
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- Reset Password Dialog -->
        <Dialog
            :open="showResetPasswordDialog"
            @update:open="showResetPasswordDialog = $event"
        >
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Reset Password</DialogTitle>
                    <DialogDescription>
                        Enter a new password for
                        <strong>{{ selectedUser?.name }}</strong
                        >.
                    </DialogDescription>
                </DialogHeader>
                <form @submit.prevent="handleResetPassword" class="space-y-4">
                    <div class="space-y-2">
                        <Label for="password">New Password</Label>
                        <Input
                            id="password"
                            v-model="resetPasswordForm.password"
                            type="password"
                            required
                            :class="{
                                'border-destructive':
                                    resetPasswordForm.errors.password,
                            }"
                        />
                        <p
                            v-if="resetPasswordForm.errors.password"
                            class="text-sm text-destructive"
                        >
                            {{ resetPasswordForm.errors.password }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <Label for="password_confirmation"
                            >Confirm Password</Label
                        >
                        <Input
                            id="password_confirmation"
                            v-model="resetPasswordForm.password_confirmation"
                            type="password"
                            required
                            :class="{
                                'border-destructive':
                                    resetPasswordForm.errors
                                        .password_confirmation,
                            }"
                        />
                        <p
                            v-if="
                                resetPasswordForm.errors.password_confirmation
                            "
                            class="text-sm text-destructive"
                        >
                            {{ resetPasswordForm.errors.password_confirmation }}
                        </p>
                    </div>
                    <DialogFooter>
                        <Button
                            type="button"
                            variant="outline"
                            @click="closeResetPasswordDialog"
                        >
                            Cancel
                        </Button>
                        <Button
                            type="submit"
                            :disabled="resetPasswordForm.processing"
                        >
                            {{
                                resetPasswordForm.processing
                                    ? 'Resetting...'
                                    : 'Reset Password'
                            }}
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    </AppLayout>
</template>
