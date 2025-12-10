<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as leadsIndex } from '@/routes/leads';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/vue3';
import flatpickr from 'flatpickr';
import type { Instance } from 'flatpickr/dist/types/instance';
import {
    Mail,
    FileText,
    StickyNote,
    Calendar,
    Edit,
    ChevronUp,
    ChevronDown,
    Settings,
    Phone,
    AtSign,
    AlertTriangle,
    Tag,
    X,
    Paperclip,
    ClipboardList,
    File,
    Users,
    Package,
    Receipt,
    Clock,
    MapPin,
    Trash2,
    Plus,
    DollarSign,
} from 'lucide-vue-next';

interface Props {
    id: string;
}

const props = defineProps<Props>();

// Dummy lead data matching the design
const lead = ref({
    id: props.id,
    title: 'Enquiry: ProjectPulse Enterprise Solution',
    stage: 'new-lead',
    daysOld: 431,
    daysInCurrentStage: 5, // Days in current stage
    type: 'Enquiry',
    value: 10000,
    source: 'Phone',
    leadType: 'New Business',
    salesOwner: 'Example',
    expectedCloseDate: '2024-10-02',
    priority: 'Hot' as 'Hot' | 'Warm' | 'Cold' | null,
    person: {
        name: 'Billy James',
        title: 'Sales Representatives',
        company: 'SentinelSecure',
        email: 'Billy@example.com',
        phone: '4545454545',
        initials: 'BJ',
    },
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Leads',
        href: leadsIndex().url,
    },
    {
        title: `#${props.id}`,
        href: '#',
    },
];

// Pipeline stages - progress bar showing lead progression
const allStages = [
    { id: 'new-lead', label: 'New Lead' },
    { id: 'contacted', label: 'Contacted' },
    { id: 'qualified', label: 'Qualified' },
    { id: 'demo-completed', label: 'Demo Completed' },
    { id: 'proposal-sent', label: 'Proposal Sent' },
    { id: 'negotiation', label: 'Negotiation' },
    { id: 'won', label: 'Won' },
    { id: 'lost', label: 'Lost' },
    { id: 'follow-up-required', label: 'Follow-up Required' },
    { id: 'on-hold', label: 'On-hold' },
];

const stages = computed(() => {
    // Find the current stage index
    const currentStageId = lead.value.stage;
    const currentIndex = allStages.findIndex(s => s.id === currentStageId);
    
    // If stage not found, default to first stage
    const activeIndex = currentIndex >= 0 ? currentIndex : 0;
    
    // Return all stages with active state - all stages up to and including current are active
    return allStages.map((stage, index) => ({
        ...stage,
        active: index <= activeIndex,
    }));
});

// Get current stage label and days in current stage
const currentStageInfo = computed(() => {
    const currentStage = allStages.find(s => s.id === lead.value.stage);
    return {
        label: currentStage?.label || 'Unknown',
        days: lead.value.daysInCurrentStage || 0,
    };
});

// Tabs
const tabs = [
    { id: 'all', label: 'All' },
    { id: 'planned', label: 'Planned' },
    { id: 'notes', label: 'Notes' },
    { id: 'calls', label: 'Calls' },
    { id: 'meetings', label: 'Meetings' },
    { id: 'lunches', label: 'Lunches' },
    { id: 'files', label: 'Files' },
    { id: 'emails', label: 'Emails' },
    { id: 'changelogs', label: 'Changelogs' },
    { id: 'description', label: 'Description' },
    { id: 'products', label: 'Products' },
    { id: 'quotes', label: 'Quotes' },
];

const activeTab = ref('all');
const aboutLeadExpanded = ref(true);
const aboutPersonsExpanded = ref(true);

// Empty state messages for each tab
const emptyStateMessages = computed(() => {
    const messages: Record<string, { icon: any; title: string; description: string }> = {
        all: {
            icon: Settings,
            title: 'No Activities Found',
            description: 'No activities found for this lead. You can add activities by clicking on the Activity button on the left panel.',
        },
        planned: {
            icon: ClipboardList,
            title: 'No Planned Activities Found',
            description: 'No planned activities found for this. You can add planned activities by clicking on the Activity button on the left panel.',
        },
        notes: {
            icon: StickyNote,
            title: 'No Notes Found',
            description: 'No notes found for this lead. You can add notes by clicking on the Note button on the left panel.',
        },
        calls: {
            icon: Phone,
            title: 'No Calls Found',
            description: 'No calls found for this lead. You can add calls by clicking on the Activity button on the left panel.',
        },
        meetings: {
            icon: Calendar,
            title: 'No Meetings Found',
            description: 'No meetings found for this lead. You can add meetings by clicking on the Activity button on the left panel.',
        },
        lunches: {
            icon: Calendar,
            title: 'No Lunches Found',
            description: 'No lunches found for this lead. You can add lunches by clicking on the Activity button on the left panel.',
        },
        files: {
            icon: File,
            title: 'No Files Found',
            description: 'No files found for this lead. You can add files by clicking on the File button on the left panel.',
        },
        emails: {
            icon: Mail,
            title: 'No Emails Found',
            description: 'No emails found for this lead. You can send emails by clicking on the Mail button on the left panel.',
        },
        changelogs: {
            icon: Settings,
            title: 'No Changelogs Found',
            description: 'No changelogs found for this lead. Changelogs will appear here when changes are made to the lead.',
        },
        description: {
            icon: FileText,
            title: 'No Description Found',
            description: 'No description found for this lead. You can add a description by editing the lead details.',
        },
        products: {
            icon: Package,
            title: 'No Products Found',
            description: 'No products found for this lead. You can add products by editing the lead details.',
        },
        quotes: {
            icon: Receipt,
            title: 'No Quotes Found',
            description: 'No quotes found for this lead. You can add quotes by editing the lead details.',
        },
    };
    
    return messages[activeTab.value] || messages.all;
});

// Compose Mail Modal
const showComposeMail = ref(false);
const mailForm = ref({
    to: '',
    cc: '',
    bcc: '',
    subject: '',
    message: '',
});
const mailErrors = ref<Record<string, string>>({});
const showCCBCC = ref(false);

const openComposeMail = () => {
    showComposeMail.value = true;
    // Pre-fill with lead's email
    mailForm.value.to = lead.value.person.email;
};

const closeComposeMail = () => {
    showComposeMail.value = false;
    mailForm.value = {
        to: '',
        cc: '',
        bcc: '',
        subject: '',
        message: '',
    };
    mailErrors.value = {};
    showCCBCC.value = false;
};

const validateMailForm = (): boolean => {
    mailErrors.value = {};
    
    if (!mailForm.value.to.trim()) {
        mailErrors.value.to = 'The To field is required';
    }
    
    if (!mailForm.value.subject.trim()) {
        mailErrors.value.subject = 'The Subject field is required';
    }
    
    if (!mailForm.value.message.trim()) {
        mailErrors.value.message = 'The Message field is required';
    }
    
    return Object.keys(mailErrors.value).length === 0;
};

const sendMail = () => {
    if (validateMailForm()) {
        // TODO: Implement actual mail sending logic
        console.log('Sending mail:', mailForm.value);
        closeComposeMail();
    }
};

// Add File Modal
const showAddFile = ref(false);
const fileForm = ref({
    title: '',
    description: '',
    name: '',
    file: null as File | null,
});
const fileErrors = ref<Record<string, string>>({});
const fileInputRef = ref<HTMLInputElement | null>(null);

const openAddFile = () => {
    showAddFile.value = true;
};

const closeAddFile = () => {
    showAddFile.value = false;
    fileForm.value = {
        title: '',
        description: '',
        name: '',
        file: null,
    };
    fileErrors.value = {};
    if (fileInputRef.value) {
        fileInputRef.value.value = '';
    }
};

const validateFileForm = (): boolean => {
    fileErrors.value = {};
    
    if (!fileForm.value.file) {
        fileErrors.value.file = 'The File field is required';
    }
    
    return Object.keys(fileErrors.value).length === 0;
};

const handleFileChange = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files.length > 0) {
        fileForm.value.file = target.files[0];
        if (!fileForm.value.name.trim()) {
            fileForm.value.name = target.files[0].name;
        }
    }
};

const saveFile = () => {
    if (validateFileForm()) {
        // TODO: Implement actual file upload logic
        console.log('Saving file:', fileForm.value);
        closeAddFile();
    }
};

// Add Note Modal
const showAddNote = ref(false);
const noteForm = ref({
    comment: '',
});
const noteErrors = ref<Record<string, string>>({});

const openAddNote = () => {
    showAddNote.value = true;
};

const closeAddNote = () => {
    showAddNote.value = false;
    noteForm.value = {
        comment: '',
    };
    noteErrors.value = {};
};

const validateNoteForm = (): boolean => {
    noteErrors.value = {};
    
    if (!noteForm.value.comment.trim()) {
        noteErrors.value.comment = 'The Comment field is required';
    }
    
    return Object.keys(noteErrors.value).length === 0;
};

const saveNote = () => {
    if (validateNoteForm()) {
        // TODO: Implement actual note saving logic
        console.log('Saving note:', noteForm.value);
        closeAddNote();
    }
};

// Add Activity Modal
const showAddActivity = ref(false);
const activityForm = ref({
    type: 'Call',
    title: '',
    description: '',
    participants: '',
    scheduleFrom: '',
    scheduleTo: '',
    location: '',
});
const activityErrors = ref<Record<string, string>>({});
const showActivityTypeDropdown = ref(false);
const activityTypes = ['Call', 'Meeting', 'Lunch'];

// Participants search
const showParticipantsDropdown = ref(false);
const participantsSearch = ref('');
const participantsLoading = ref(false);
const participantsUsers = ref<Array<{ id: string; name: string; email?: string }>>([]);
const participantsPersons = ref<Array<{ id: string; name: string; email?: string }>>([]);

const searchParticipants = async (query: string) => {
    participantsSearch.value = query;
    if (!query.trim()) {
        participantsUsers.value = [];
        participantsPersons.value = [];
        showParticipantsDropdown.value = false;
        return;
    }
    
    participantsLoading.value = true;
    showParticipantsDropdown.value = true;
    
    // Simulate API call - TODO: Replace with actual API call
    setTimeout(() => {
        // Mock data - replace with actual search results
        participantsUsers.value = [];
        participantsPersons.value = [];
        participantsLoading.value = false;
    }, 300);
};

const selectParticipant = (participant: { id: string; name: string }) => {
    activityForm.value.participants = participant.name;
    showParticipantsDropdown.value = false;
    participantsSearch.value = '';
};

// Close dropdown when clicking outside
const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    if (!target.closest('.participants-field-container')) {
        showParticipantsDropdown.value = false;
    }
    // Close product name dropdowns if clicking outside
    Object.keys(showProductNameDropdown.value).forEach(productId => {
        if (!target.closest(`.product-name-search-container-${productId}`)) {
            showProductNameDropdown.value[productId] = false;
        }
    });
    // Close priority dropdown
    if (!target.closest('.priority-dropdown-container')) {
        showPriorityDropdown.value = false;
    }
    // Close priority popup - check if click is outside the popup and button
    if (showPriorityModal.value) {
        const isClickInsidePopup = target.closest('.w-64');
        const isClickOnButton = priorityButtonRef.value && priorityButtonRef.value.contains(target);
        if (!isClickInsidePopup && !isClickOnButton) {
            showPriorityModal.value = false;
        }
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
    destroyFlatpickr();
});


// Flatpickr instances
const scheduleFromPicker = ref<Instance | null>(null);
const scheduleToPicker = ref<Instance | null>(null);
const scheduleFromInputRef = ref<HTMLInputElement | null>(null);
const scheduleToInputRef = ref<HTMLInputElement | null>(null);

const openAddActivity = async () => {
    showAddActivity.value = true;
    await nextTick();
    initializeFlatpickr();
};

const closeAddActivity = () => {
    showAddActivity.value = false;
    activityForm.value = {
        type: 'Call',
        title: '',
        description: '',
        participants: '',
        scheduleFrom: '',
        scheduleTo: '',
        location: '',
    };
    activityErrors.value = {};
    showActivityTypeDropdown.value = false;
    showParticipantsDropdown.value = false;
    participantsSearch.value = '';
    participantsUsers.value = [];
    participantsPersons.value = [];
    participantsLoading.value = false;
    destroyFlatpickr();
};

const initializeFlatpickr = () => {
    if (scheduleFromInputRef.value && !scheduleFromPicker.value) {
        scheduleFromPicker.value = flatpickr(scheduleFromInputRef.value, {
            enableTime: true,
            dateFormat: 'Y-m-d H:i:S',
            time_24hr: false,
            allowInput: true,
            clickOpens: true,
            defaultHour: 12,
            defaultMinute: 0,
            onChange: (selectedDates, dateStr) => {
                if (selectedDates.length > 0) {
                    activityForm.value.scheduleFrom = dateStr;
                }
            },
        });
    }
    
    if (scheduleToInputRef.value && !scheduleToPicker.value) {
        scheduleToPicker.value = flatpickr(scheduleToInputRef.value, {
            enableTime: true,
            dateFormat: 'Y-m-d H:i:S',
            time_24hr: false,
            allowInput: true,
            clickOpens: true,
            defaultHour: 12,
            defaultMinute: 0,
            onChange: (selectedDates, dateStr) => {
                if (selectedDates.length > 0) {
                    activityForm.value.scheduleTo = dateStr;
                }
            },
        });
    }
};

const destroyFlatpickr = () => {
    if (scheduleFromPicker.value) {
        scheduleFromPicker.value.destroy();
        scheduleFromPicker.value = null;
    }
    if (scheduleToPicker.value) {
        scheduleToPicker.value.destroy();
        scheduleToPicker.value = null;
    }
};


const validateActivityForm = (): boolean => {
    activityErrors.value = {};
    
    if (!activityForm.value.title.trim()) {
        activityErrors.value.title = 'The Title field is required';
    }
    
    if (!activityForm.value.scheduleFrom.trim()) {
        activityErrors.value.scheduleFrom = 'The Schedule From field is required';
    }
    
    if (!activityForm.value.scheduleTo.trim()) {
        activityErrors.value.scheduleTo = 'The Schedule To field is required';
    }
    
    return Object.keys(activityErrors.value).length === 0;
};

const saveActivity = () => {
    if (validateActivityForm()) {
        // TODO: Implement actual activity saving logic
        console.log('Saving activity:', activityForm.value);
        closeAddActivity();
    }
};

// Changelog data - matching exact format from image
const changelogs = ref([
    {
        id: '1',
        action: 'Updated Stage : Follow Up → New',
        date: '9 Dec 2025',
        time: '12:15 PM',
        by: 'Example',
    },
    {
        id: '2',
        action: 'Updated Stage : New → Follow Up',
        date: '9 Dec 2025',
        time: '12:15 PM',
        by: 'Example',
    },
    {
        id: '3',
        action: 'Updated Stage : Empty → New',
        date: '30 Aug 2024',
        time: '11:19 AM',
        by: 'Example',
    },
    {
        id: '4',
        action: 'Updated Pipeline : Empty → Default Pipeline',
        date: '30 Aug 2024',
        time: '11:19 AM',
        by: 'Example',
    },
    {
        id: '5',
        action: 'Updated Expected Close Date : Empty → Wed Oct 02, 2024',
        date: '30 Aug 2024',
        time: '11:19 AM',
        by: 'Example',
    },
    {
        id: '6',
        action: 'Updated Sales Owner : Empty → Example',
        date: '30 Aug 2024',
        time: '11:19 AM',
        by: 'Example',
    },
    {
        id: '7',
        action: 'Updated Type : Empty → New Business',
        date: '30 Aug 2024',
        time: '11:19 AM',
        by: 'Example',
    },
    {
        id: '8',
        action: 'Updated Source : Empty → Phone',
        date: '30 Aug 2024',
        time: '11:19 AM',
        by: 'Example',
    },
    {
        id: '9',
        action: 'Updated Lead Value : Empty → 10000.0000',
        date: '30 Aug 2024',
        time: '11:19 AM',
        by: 'Example',
    },
]);

const formatDate = (dateString: string): string => {
    const date = new Date(dateString);
    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return `${days[date.getDay()]} ${months[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
};

// Products
interface Product {
    id: string;
    productName: string;
    quantity: number;
    price: number;
    amount: number;
}

const products = ref<Product[]>([
    {
        id: '1',
        productName: 'ProjectPulse Enterprise Solution',
        quantity: 20,
        price: 450.00,
        amount: 9000.00,
    },
]);

// Product name search
const productNameSearch = ref<Record<string, string>>({});
const productNameSearchResults = ref<Record<string, Array<{ id: string; name: string }>>>({});
const productNameSearchLoading = ref<Record<string, boolean>>({});
const showProductNameDropdown = ref<Record<string, boolean>>({});
const availableProducts = [
    { id: '1', name: 'ProjectPulse Enterprise Solution' },
    { id: '2', name: 'CloudSync Pro' },
    { id: '3', name: 'DataGuard Premium' },
    { id: '4', name: 'Analytics Suite' },
    { id: '5', name: 'Security Plus' },
];

// Product name search functionality
const searchProductName = async (productId: string, query: string) => {
    if (!productNameSearch.value[productId]) {
        productNameSearch.value[productId] = '';
    }
    productNameSearch.value[productId] = query;
    
    if (!query.trim()) {
        productNameSearchResults.value[productId] = [];
        productNameSearchLoading.value[productId] = false;
        return;
    }
    
    productNameSearchLoading.value[productId] = true;
    showProductNameDropdown.value[productId] = true;
    
    // Simulate API call - TODO: Replace with actual API call
    setTimeout(() => {
        const filtered = availableProducts.filter(product =>
            product.name.toLowerCase().includes(query.toLowerCase())
        );
        productNameSearchResults.value[productId] = filtered;
        productNameSearchLoading.value[productId] = false;
    }, 300);
};

const selectProductName = (productId: string, product: { id: string; name: string }) => {
    const productItem = products.value.find(p => p.id === productId);
    if (productItem) {
        productItem.productName = product.name;
    }
    showProductNameDropdown.value[productId] = false;
    productNameSearch.value[productId] = '';
    productNameSearchResults.value[productId] = [];
};

const productNameSearchInputRefs = ref<Record<string, HTMLInputElement | null>>({});

const openProductNameDropdown = (productId: string, event?: Event) => {
    if (event) {
        event.stopPropagation();
    }
    showProductNameDropdown.value[productId] = !showProductNameDropdown.value[productId];
    if (showProductNameDropdown.value[productId]) {
        const productItem = products.value.find(p => p.id === productId);
        if (!productNameSearch.value[productId]) {
            productNameSearch.value[productId] = productItem?.productName || '';
        }
        // Clear results initially to show "No result found"
        if (!productNameSearch.value[productId]?.trim()) {
            productNameSearchResults.value[productId] = [];
        }
    }
    nextTick(() => {
        if (showProductNameDropdown.value[productId] && productNameSearchInputRefs.value[productId]) {
            productNameSearchInputRefs.value[productId]?.focus();
        }
    });
};

const addProduct = () => {
    const newId = Date.now().toString();
    products.value.push({
        id: newId,
        productName: '',
        quantity: 1,
        price: 0,
        amount: 0,
    });
    showProductNameDropdown.value[newId] = false;
    productNameSearch.value[newId] = '';
    productNameSearchResults.value[newId] = [];
};

const removeProduct = (id: string) => {
    products.value = products.value.filter(p => p.id !== id);
    delete showProductNameDropdown.value[id];
    delete productNameSearch.value[id];
    delete productNameSearchResults.value[id];
    delete productNameSearchLoading.value[id];
    delete productNameSearchInputRefs.value[id];
};

const updateProductAmount = (product: Product) => {
    product.amount = product.quantity * product.price;
};

// Priority Popup
const showPriorityModal = ref(false);
const priorityOptions = ['Hot', 'Warm', 'Cold'] as const;
const showPriorityDropdown = ref(false);
const priorityButtonRef = ref<HTMLElement | null>(null);

const openPriorityModal = () => {
    showPriorityModal.value = true;
};

const closePriorityModal = () => {
    showPriorityModal.value = false;
    showPriorityDropdown.value = false;
};

const selectPriority = (priority: 'Hot' | 'Warm' | 'Cold') => {
    lead.value.priority = priority;
    showPriorityDropdown.value = false;
    // TODO: Save priority to backend
    console.log('Priority selected:', priority);
};

const removePriority = () => {
    lead.value.priority = null;
    showPriorityDropdown.value = false;
    // TODO: Save priority to backend
    console.log('Priority removed');
};

const getPriorityColor = (priority: string | null) => {
    switch (priority) {
        case 'Hot':
            return 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300';
        case 'Warm':
            return 'bg-orange-100 text-orange-700 dark:bg-orange-900 dark:text-orange-300';
        case 'Cold':
            return 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300';
        default:
            return 'bg-gray-100 text-gray-700 dark:bg-gray-900 dark:text-gray-300';
    }
};
</script>

<template>
    <Head :title="lead.title" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col overflow-hidden bg-background">
            <div class="flex-1 overflow-y-auto lg:overflow-x-auto lg:overflow-y-hidden">
                <div class="flex flex-col lg:flex-row gap-4 lg:gap-6 lg:min-w-fit px-3 sm:px-4 lg:px-6 py-3 lg:py-4 h-full">
                    <!-- Left Sidebar -->
                    <div class="w-full lg:w-72 flex-shrink-0 flex flex-col gap-3 lg:gap-4 overflow-y-auto overflow-x-hidden">
                    <!-- Lead Status and Title -->
                    <div class="space-y-2 lg:space-y-3">
                        <div class="flex items-center gap-1.5 lg:gap-2 flex-wrap">
                            <span class="inline-flex items-center gap-1 px-2 lg:px-2.5 py-0.5 lg:py-1 rounded-md text-xs lg:text-sm font-medium bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300 whitespace-nowrap">
                                <AlertTriangle class="size-3 lg:size-3.5" />
                                {{ currentStageInfo.days }} days
                            </span>
                            <span
                                v-if="lead.priority"
                                :class="[
                                    'inline-flex items-center gap-1 px-2 lg:px-2.5 py-0.5 lg:py-1 rounded-md text-xs lg:text-sm font-medium whitespace-nowrap',
                                    getPriorityColor(lead.priority)
                                ]"
                            >
                                {{ lead.priority }}
                            </span>
                            <div class="relative">
                                <button 
                                    ref="priorityButtonRef"
                                    @click="openPriorityModal" 
                                    class="p-0.5 lg:p-1 hover:bg-muted rounded-md cursor-pointer"
                                >
                                    <Tag class="size-3.5 lg:size-4 text-gray-500" />
                                </button>
                                
                                <!-- Priority Popup -->
                                <div
                                    v-if="showPriorityModal"
                                    class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-900 shadow-xl rounded-lg border border-border z-50"
                                    @click.stop
                                >
                                    <!-- Popup Header -->
                                    <div class="flex items-center justify-between p-3 border-b border-border">
                                        <h2 class="text-sm font-semibold text-foreground">Priority</h2>
                                        <button
                                            @click="closePriorityModal"
                                            class="p-1 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                        >
                                            <X class="size-3.5 text-muted-foreground" />
                                        </button>
                                    </div>

                                    <!-- Popup Body -->
                                    <div class="p-3 space-y-3">
                                        <!-- Priority Select Field - Only show when no priority is selected -->
                                        <div v-if="!lead.priority" class="relative priority-dropdown-container">
                                            <div class="relative">
                                                <button
                                                    @click="showPriorityDropdown = !showPriorityDropdown"
                                                    class="w-full flex items-center justify-between px-3 py-2 border border-border rounded-md bg-background hover:bg-muted transition-colors cursor-pointer"
                                                >
                                                    <span class="text-sm text-muted-foreground">
                                                        Choose or select priority
                                                    </span>
                                                    <ChevronDown class="size-4 text-muted-foreground" />
                                                </button>
                                                
                                                <!-- Priority Dropdown -->
                                                <div
                                                    v-if="showPriorityDropdown"
                                                    class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 max-h-48 overflow-y-auto"
                                                >
                                                    <button
                                                        v-for="option in priorityOptions"
                                                        :key="option"
                                                        @click="selectPriority(option)"
                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                    >
                                                        {{ option }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Selected Priority Section -->
                                        <div v-if="lead.priority">
                                            <h3 class="text-xs font-medium text-foreground mb-2">Selected Priority</h3>
                                            <div class="flex items-center gap-2">
                                                <span
                                                    :class="[
                                                        'inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-sm font-medium',
                                                        getPriorityColor(lead.priority)
                                                    ]"
                                                >
                                                    {{ lead.priority }}
                                                </span>
                                                <button
                                                    @click="removePriority"
                                                    class="p-1 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                                >
                                                    <X class="size-3.5 text-muted-foreground" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="text-base lg:text-lg font-semibold text-foreground leading-tight break-words">
                            {{ lead.title }}
                        </h1>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                        <button @click="openComposeMail" class="flex flex-col items-center justify-center gap-1 lg:gap-1.5 p-2.5 lg:p-3 rounded-md border border-border bg-green-100 dark:bg-green-900 hover:bg-green-200 dark:hover:bg-green-800 transition-colors cursor-pointer">
                            <Mail class="size-4 lg:size-5 text-green-600 dark:text-green-400" />
                            <span class="text-xs lg:text-sm font-medium text-green-700 dark:text-green-300 whitespace-nowrap">Mail</span>
                        </button>
                        <button @click="openAddFile" class="flex flex-col items-center justify-center gap-1 lg:gap-1.5 p-2.5 lg:p-3 rounded-md border border-border bg-blue-100 dark:bg-blue-900 hover:bg-blue-200 dark:hover:bg-blue-800 transition-colors cursor-pointer">
                            <FileText class="size-4 lg:size-5 text-blue-600 dark:text-blue-400" />
                            <span class="text-xs lg:text-sm font-medium text-blue-700 dark:text-blue-300 whitespace-nowrap">File</span>
                        </button>
                        <button @click="openAddNote" class="flex flex-col items-center justify-center gap-1 lg:gap-1.5 p-2.5 lg:p-3 rounded-md border border-border bg-orange-100 dark:bg-orange-900 hover:bg-orange-200 dark:hover:bg-orange-800 transition-colors cursor-pointer">
                            <StickyNote class="size-4 lg:size-5 text-orange-600 dark:text-orange-400" />
                            <span class="text-xs lg:text-sm font-medium text-orange-700 dark:text-orange-300 whitespace-nowrap">Note</span>
                        </button>
                        <button @click="openAddActivity" class="flex flex-col items-center justify-center gap-1 lg:gap-1.5 p-2.5 lg:p-3 rounded-md border border-border bg-purple-100 dark:bg-purple-900 hover:bg-purple-200 dark:hover:bg-purple-800 transition-colors cursor-pointer">
                            <Calendar class="size-4 lg:size-5 text-purple-600 dark:text-purple-400" />
                            <span class="text-xs lg:text-sm font-medium text-purple-700 dark:text-purple-300 whitespace-nowrap">Activity</span>
                        </button>
                    </div>

                    <!-- About Lead Section -->
                    <div class="border border-border rounded-md bg-card">
                        <button
                            @click="aboutLeadExpanded = !aboutLeadExpanded"
                            class="w-full flex items-center justify-between p-2.5 lg:p-3 border-b border-border hover:bg-muted/30 transition-colors cursor-pointer"
                        >
                            <div class="flex items-center gap-1.5">
                                <span class="font-medium text-xs lg:text-sm text-foreground">About Lead</span>
                                <Link :href="`/leads/${lead.id}/edit`" class="p-0.5 hover:bg-muted rounded-md cursor-pointer" @click.stop>
                                    <Edit class="size-3 text-muted-foreground" />
                                </Link>
                            </div>
                            <ChevronUp
                                v-if="aboutLeadExpanded"
                                class="size-3.5 text-muted-foreground"
                            />
                            <ChevronDown
                                v-else
                                class="size-3.5 text-muted-foreground"
                            />
                        </button>
                        <div v-if="aboutLeadExpanded" class="p-2.5 lg:p-3 space-y-2 lg:space-y-2.5">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                                <span class="text-xs lg:text-sm text-muted-foreground">Lead Value</span>
                                <span class="text-xs lg:text-sm font-medium text-foreground break-all">
                                    {{ lead.value.toFixed(4) }}
                                </span>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                                <span class="text-xs lg:text-sm text-muted-foreground">Source</span>
                                <span class="text-xs lg:text-sm font-medium text-foreground break-words">{{ lead.source }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                                <span class="text-xs lg:text-sm text-muted-foreground">Type</span>
                                <span class="text-xs lg:text-sm font-medium text-foreground break-words">{{ lead.leadType }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                                <span class="text-xs lg:text-sm text-muted-foreground">Sales Owner</span>
                                <span class="text-xs lg:text-sm font-medium text-foreground break-words">{{ lead.salesOwner }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                                <span class="text-xs lg:text-sm text-muted-foreground">Expected Close Date</span>
                                <span class="text-xs lg:text-sm font-medium text-foreground break-words">{{ lead.expectedCloseDate }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- About Persons Section -->
                    <div class="border border-border rounded-md bg-card">
                        <button
                            @click="aboutPersonsExpanded = !aboutPersonsExpanded"
                            class="w-full flex items-center justify-between p-2.5 lg:p-3 border-b border-border hover:bg-muted/30 transition-colors cursor-pointer"
                        >
                            <div class="flex items-center gap-1.5">
                                <span class="font-medium text-xs lg:text-sm text-foreground">About Persons</span>
                                <button class="p-0.5 hover:bg-muted rounded-md cursor-pointer" @click.stop>
                                    <Edit class="size-3 text-muted-foreground" />
                                </button>
                            </div>
                            <ChevronUp
                                v-if="aboutPersonsExpanded"
                                class="size-3.5 text-muted-foreground"
                            />
                            <ChevronDown
                                v-else
                                class="size-3.5 text-muted-foreground"
                            />
                        </button>
                        <div v-if="aboutPersonsExpanded" class="p-2.5 lg:p-3">
                            <div class="flex items-start gap-2.5 lg:gap-3">
                                <div class="size-8 lg:size-9 rounded-full bg-green-400 text-white flex items-center justify-center text-xs font-semibold shrink-0">
                                    {{ lead.person.initials }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs lg:text-sm font-medium text-foreground break-words">
                                        {{ lead.person.name }}
                                    </p>
                                    <p class="text-[11px] lg:text-xs text-muted-foreground mt-0.5 break-words">
                                        {{ lead.person.title }} at {{ lead.person.company }}
                                    </p>
                                    <div class="mt-2 lg:mt-2.5 space-y-1">
                                        <a
                                            :href="`mailto:${lead.person.email}`"
                                            class="flex items-center gap-1.5 text-xs lg:text-sm text-blue-600 dark:text-blue-400 hover:underline break-all"
                                        >
                                            <AtSign class="size-3 shrink-0" />
                                            <span class="break-all">{{ lead.person.email }}</span> <span class="text-muted-foreground">(work)</span>
                                        </a>
                                        <a
                                            :href="`tel:${lead.person.phone}`"
                                            class="flex items-center gap-1.5 text-xs lg:text-sm text-blue-600 dark:text-blue-400 hover:underline break-all"
                                        >
                                            <Phone class="size-3 shrink-0" />
                                            <span class="break-all">{{ lead.person.phone }}</span> <span class="text-muted-foreground">(work)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Main Content Area -->
                    <div class="flex-1 flex flex-col overflow-hidden w-full lg:min-w-[600px]">
                        <!-- Pipeline Progress Bar -->
                        <div class="flex items-center border-b border-border pb-2.5 lg:pb-3 mb-0 overflow-x-auto">
                            <div
                                v-for="(stage, index) in stages"
                                :key="stage.id"
                                class="flex items-center shrink-0"
                            >
                                <div
                                    :class="[
                                        'px-2 lg:px-2.5 py-0.5 lg:py-1 rounded-md text-xs lg:text-sm font-medium transition-colors whitespace-nowrap',
                                        stage.active
                                            ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200'
                                            : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                                    ]"
                                >
                                    {{ stage.label }}
                                </div>
                                <!-- Progress bar line connector -->
                                <div
                                    v-if="index < stages.length - 1"
                                    :class="[
                                        'h-0.5 lg:h-1 mx-1 lg:mx-1.5 transition-colors',
                                        stage.active && stages[index + 1]?.active
                                            ? 'bg-green-500 w-4 lg:w-6'
                                            : stage.active
                                            ? 'bg-green-500 w-4 lg:w-6'
                                            : 'bg-gray-300 dark:bg-gray-600 w-4 lg:w-6',
                                    ]"
                                ></div>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <div class="flex items-center gap-0 border-b border-border overflow-x-auto">
                            <button
                                v-for="tab in tabs"
                                :key="tab.id"
                                @click="activeTab = tab.id"
                                :class="[
                                    'px-2.5 lg:px-3 py-2 lg:py-2.5 text-xs lg:text-sm font-medium border-b-2 transition-colors whitespace-nowrap cursor-pointer',
                                    activeTab === tab.id
                                        ? 'border-blue-600 text-foreground'
                                        : 'border-transparent text-muted-foreground hover:text-foreground',
                                ]"
                            >
                                {{ tab.label }}
                            </button>
                        </div>

                        <!-- Tab Content -->
                        <div class="flex-1 overflow-y-auto p-3 lg:p-4">
                            <!-- Products Table -->
                            <div v-if="activeTab === 'products'">
                                <div class="">
                                    <table class="w-full border-collapse">
                                        <thead>
                                            <tr class="border-b border-border">
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground">Product Name</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground w-[100px]">Quantity</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground w-[120px]">Price</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground">Amount</th>
                                                <th class="px-4 py-3 text-left text-sm font-medium text-foreground">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="product in products"
                                                :key="product.id"
                                                class="border-b border-border"
                                            >
                                                <td class="px-4 py-3 max-w-[200px]">
                                                    <div class="relative product-name-search-container" :class="`product-name-search-container-${product.id}`" style="z-index: 1;">
                                                        <button
                                                            @click.stop="openProductNameDropdown(product.id, $event)"
                                                            type="button"
                                                            class="w-full flex items-center justify-between gap-2 rounded-md border bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 border-border focus:ring-blue-500 min-w-0 cursor-pointer"
                                                        >
                                                            <span :class="product.productName ? 'text-foreground' : 'text-muted-foreground'" class="truncate flex-1 text-left min-w-0">
                                                                {{ product.productName || 'Click to Add' }}
                                                            </span>
                                                            <div class="flex items-center gap-2 shrink-0">
                                                                <button
                                                                    v-if="product.productName && !showProductNameDropdown[product.id]"
                                                                    @click.stop="product.productName = ''; productNameSearch[product.id] = ''; productNameSearchResults[product.id] = []"
                                                                    type="button"
                                                                    class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                                                    aria-label="Clear product name"
                                                                >
                                                                    <X class="size-4 text-muted-foreground hover:text-foreground" />
                                                                </button>
                                                                <ChevronUp v-if="showProductNameDropdown[product.id]" class="size-4 text-muted-foreground" />
                                                                <ChevronDown v-else class="size-4 text-muted-foreground" />
                                                            </div>
                                                        </button>
                                                        
                                                        <!-- Search Popup (shown when dropdown is open) -->
                                                        <div
                                                            v-if="showProductNameDropdown[product.id]"
                                                            class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                                        >
                                                            <div class="relative">
                                                                <input
                                                                    :ref="el => { if (el) productNameSearchInputRefs[product.id] = el as HTMLInputElement }"
                                                                    :value="productNameSearch[product.id] || ''"
                                                                    @input="searchProductName(product.id, ($event.target as HTMLInputElement).value)"
                                                                    type="text"
                                                                    placeholder="Search..."
                                                                    class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                                                />
                                                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                                                    <div v-if="productNameSearchLoading[product.id]" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Search Results Dropdown -->
                                                            <div class="max-h-48 overflow-y-auto border-t border-border">
                                                                <!-- Loading State -->
                                                                <div v-if="productNameSearchLoading[product.id]" class="px-3 py-2 text-xs text-muted-foreground">
                                                                    Searching...
                                                                </div>
                                                                
                                                                <!-- Search Results -->
                                                                <div v-else-if="productNameSearchResults[product.id] && productNameSearchResults[product.id].length > 0">
                                                                    <button
                                                                        v-for="productOption in productNameSearchResults[product.id]"
                                                                        :key="productOption.id"
                                                                        @click="selectProductName(product.id, productOption)"
                                                                        type="button"
                                                                        class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                                                    >
                                                                        {{ productOption.name }}
                                                                    </button>
                                                                </div>
                                                                
                                                                <!-- No Results -->
                                                                <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                                                    No result found
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 w-[100px]">
                                                    <input
                                                        v-model.number="product.quantity"
                                                        type="number"
                                                        min="1"
                                                        @input="updateProductAmount(product)"
                                                        class="w-full px-3 py-2 rounded-md border border-border bg-background text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    />
                                                </td>
                                                <td class="px-4 py-3 w-[120px]">
                                                    <div class="relative">
                                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-muted-foreground">$</span>
                                                        <input
                                                            v-model.number="product.price"
                                                            type="number"
                                                            step="0.01"
                                                            min="0"
                                                            @input="updateProductAmount(product)"
                                                            class="w-full pl-7 pr-3 py-2 rounded-md border border-border bg-background text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                        />
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="text-sm font-medium text-foreground">
                                                        ${{ product.amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <button
                                                        @click="removeProduct(product.id)"
                                                        type="button"
                                                        class="p-1.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition-colors cursor-pointer"
                                                        aria-label="Remove product"
                                                    >
                                                        <Trash2 class="size-4 text-red-600 dark:text-red-400" />
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button
                                    @click="addProduct"
                                    type="button"
                                    class="mt-4 flex items-center gap-1 text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium cursor-pointer"
                                >
                                    <Plus class="size-4" />
                                    Add More
                                </button>
                            </div>
                            
                            <!-- Quotes Tab -->
                            <div v-else-if="activeTab === 'quotes'" class="flex flex-col items-center justify-center py-12 lg:py-16">
                                <div class="flex flex-col items-center gap-6 max-w-md">
                                    <div class="relative">
                                        <div class="size-24 lg:size-32 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                            <Receipt class="size-12 lg:size-16 text-gray-400 dark:text-gray-600" />
                                        </div>
                                        <div class="absolute -top-1 -right-1 size-6 lg:size-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                            <DollarSign class="size-3 lg:size-4 text-blue-600 dark:text-blue-400" />
                                        </div>
                                    </div>
                                    <div class="text-center space-y-2">
                                        <h3 class="text-lg lg:text-xl font-semibold text-foreground">
                                            No Quotes Found
                                        </h3>
                                        <p class="text-sm lg:text-base text-muted-foreground">
                                            No Quotes Found for this Lead
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm lg:text-base font-medium transition-colors cursor-pointer"
                                    >
                                        Add Quote
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Changelogs Tab -->
                            <div v-else-if="activeTab === 'changelogs'">
                                <div v-if="changelogs.length === 0" class="flex flex-col items-center justify-center py-8 lg:py-12">
                                    <component
                                        :is="emptyStateMessages.icon"
                                        class="size-16 lg:size-20 text-gray-300 dark:text-gray-600 mb-4"
                                    />
                                    <h3 class="text-base lg:text-lg font-semibold text-foreground mb-2">
                                        {{ emptyStateMessages.title }}
                                    </h3>
                                    <p class="text-xs lg:text-sm text-muted-foreground text-center max-w-md">
                                        {{ emptyStateMessages.description }}
                                    </p>
                                </div>
                                <div v-else class="space-y-4">
                                    <div
                                        v-for="changelog in changelogs"
                                        :key="changelog.id"
                                        class="flex items-start gap-3 p-3 rounded-md hover:bg-muted/30 transition-colors"
                                    >
                                        <div class="flex-shrink-0 mt-0.5">
                                            <div class="size-8 lg:size-9 rounded-full bg-yellow-100 dark:bg-yellow-900/30 flex items-center justify-center">
                                                <Settings class="size-4 lg:size-5 text-yellow-600 dark:text-yellow-400" />
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm lg:text-base font-medium text-foreground mb-1">
                                                {{ changelog.action }}
                                            </p>
                                            <p class="text-xs lg:text-sm text-muted-foreground">
                                                {{ changelog.date }}, {{ changelog.time }}, By {{ changelog.by }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Empty State for other tabs -->
                            <div v-else class="flex flex-col items-center justify-center py-8 lg:py-12">
                                <component
                                    :is="emptyStateMessages.icon"
                                    class="size-16 lg:size-20 text-gray-300 dark:text-gray-600 mb-4"
                                />
                                <h3 class="text-base lg:text-lg font-semibold text-foreground mb-2">
                                    {{ emptyStateMessages.title }}
                                </h3>
                                <p class="text-xs lg:text-sm text-muted-foreground text-center max-w-md">
                                    {{ emptyStateMessages.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compose Mail Modal -->
        <div
            v-if="showComposeMail"
            class="fixed inset-0 z-50 flex items-end justify-end bg-black/50"
        >
                <div
                    class="w-full max-w-lg max-h-[55vh] bg-white dark:bg-gray-900 shadow-xl flex flex-col rounded-lg mb-4 mr-4"
                    @click.stop
                >
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-2.5 lg:p-3 border-b border-border shrink-0">
                    <h2 class="text-sm lg:text-base font-semibold text-foreground">Compose Mail</h2>
                    <button
                        @click="closeComposeMail"
                        class="p-1 hover:bg-muted rounded-md transition-colors cursor-pointer"
                    >
                        <X class="size-4 text-muted-foreground" />
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="flex-1 overflow-y-auto p-2.5 lg:p-3 space-y-2.5 lg:space-y-3">
                    <!-- To Field -->
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="text-xs lg:text-sm font-medium text-foreground">
                                To <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center gap-2">
                                <button
                                    v-if="!showCCBCC"
                                    @click="showCCBCC = true"
                                    class="text-xs text-blue-600 dark:text-blue-400 hover:underline"
                                >
                                    CC BCC
                                </button>
                                <button
                                    v-else
                                    @click="showCCBCC = false"
                                    class="text-xs text-blue-600 dark:text-blue-400 hover:underline"
                                >
                                    Hide CC BCC
                                </button>
                            </div>
                        </div>
                        <input
                            v-model="mailForm.to"
                            type="text"
                            placeholder="Press enter to add emails"
                            :class="[
                                'w-full px-2.5 py-1.5 border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500',
                                mailErrors.to
                                    ? 'border-red-500 dark:border-red-500'
                                    : 'border-border',
                                'bg-background text-foreground',
                            ]"
                        />
                        <p v-if="mailErrors.to" class="mt-0.5 text-xs text-red-500">
                            {{ mailErrors.to }}
                        </p>
                    </div>

                    <!-- CC Field -->
                    <div v-if="showCCBCC">
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            CC
                        </label>
                        <input
                            v-model="mailForm.cc"
                            type="text"
                            placeholder="CC"
                            class="w-full px-2.5 py-1.5 border border-border rounded-md text-xs lg:text-sm bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>

                    <!-- BCC Field -->
                    <div v-if="showCCBCC">
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            BCC
                        </label>
                        <input
                            v-model="mailForm.bcc"
                            type="text"
                            placeholder="BCC"
                            class="w-full px-2.5 py-1.5 border border-border rounded-md text-xs lg:text-sm bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>

                    <!-- Subject Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Subject <span class="text-red-500">*</span>
                        </label>
                        <input
                            v-model="mailForm.subject"
                            type="text"
                            placeholder="Subject"
                            :class="[
                                'w-full px-2.5 py-1.5 border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500',
                                mailErrors.subject
                                    ? 'border-red-500 dark:border-red-500'
                                    : 'border-border',
                                'bg-background text-foreground',
                            ]"
                        />
                        <p v-if="mailErrors.subject" class="mt-0.5 text-xs text-red-500">
                            {{ mailErrors.subject }}
                        </p>
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            v-model="mailForm.message"
                            rows="4"
                            placeholder="Message"
                            :class="[
                                'w-full px-2.5 py-1.5 border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none',
                                mailErrors.message
                                    ? 'border-red-500 dark:border-red-500'
                                    : 'border-border',
                                'bg-background text-foreground',
                            ]"
                        ></textarea>
                        <p v-if="mailErrors.message" class="mt-0.5 text-xs text-red-500">
                            {{ mailErrors.message }}
                        </p>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-between p-2.5 lg:p-3 border-t border-border shrink-0">
                    <button
                        class="p-1 hover:bg-muted rounded-md transition-colors"
                        title="Attach file"
                    >
                        <Paperclip class="size-4 text-muted-foreground" />
                    </button>
                    <button
                        @click="sendMail"
                        class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-xs font-medium transition-colors"
                    >
                        Send
                    </button>
                </div>
            </div>
        </div>

        <!-- Add File Modal -->
        <div
            v-if="showAddFile"
            class="fixed inset-0 z-50 flex items-end justify-end bg-black/50"
        >
            <div
                class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-xl flex flex-col rounded-lg mb-4 mr-4"
                @click.stop
            >
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-2.5 lg:p-3 border-b border-border shrink-0">
                    <h2 class="text-sm lg:text-base font-semibold text-foreground">Add File</h2>
                    <button
                        @click="closeAddFile"
                        class="p-1 hover:bg-muted rounded-md transition-colors cursor-pointer"
                    >
                        <X class="size-4 text-muted-foreground" />
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-2.5 lg:p-3 space-y-2.5 lg:space-y-3">
                    <!-- Title Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Title
                        </label>
                        <input
                            v-model="fileForm.title"
                            type="text"
                            placeholder="Title"
                            :class="[
                                'w-full px-2.5 py-1.5 border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500',
                                fileErrors.title
                                    ? 'border-red-500 dark:border-red-500'
                                    : 'border-border',
                                'bg-background text-foreground',
                            ]"
                        />
                        <p v-if="fileErrors.title" class="mt-0.5 text-xs text-red-500">
                            {{ fileErrors.title }}
                        </p>
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Description
                        </label>
                        <textarea
                            v-model="fileForm.description"
                            rows="2"
                            placeholder="Description"
                            class="w-full px-2.5 py-1.5 border border-border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none bg-background text-foreground"
                        ></textarea>
                    </div>

                    <!-- Name Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Name
                        </label>
                        <input
                            v-model="fileForm.name"
                            type="text"
                            placeholder="Name"
                            class="w-full px-2.5 py-1.5 border border-border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-background text-foreground"
                        />
                    </div>

                    <!-- File Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            File <span class="text-red-500">*</span>
                        </label>
                        <input
                            ref="fileInputRef"
                            @change="handleFileChange"
                            type="file"
                            :class="[
                                'w-full px-2.5 py-1.5 border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500',
                                fileErrors.file
                                    ? 'border-red-500 dark:border-red-500'
                                    : 'border-border',
                                'bg-background text-foreground',
                            ]"
                        />
                        <p v-if="fileErrors.file" class="mt-0.5 text-xs text-red-500">
                            {{ fileErrors.file }}
                        </p>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end p-2.5 lg:p-3 border-t border-border shrink-0">
                    <button
                        @click="saveFile"
                        class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-xs font-medium transition-colors"
                    >
                        Save File
                    </button>
                </div>
            </div>
        </div>

        <!-- Add Note Modal -->
        <div
            v-if="showAddNote"
            class="fixed inset-0 z-50 flex items-end justify-end bg-black/50"
        >
            <div
                class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-xl flex flex-col rounded-lg mb-4 mr-4"
                @click.stop
            >
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-2.5 lg:p-3 border-b border-border shrink-0">
                    <h2 class="text-sm lg:text-base font-semibold text-foreground">Add Note</h2>
                    <button
                        @click="closeAddNote"
                        class="p-1 hover:bg-muted rounded-md transition-colors cursor-pointer"
                    >
                        <X class="size-4 text-muted-foreground" />
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-2.5 lg:p-3 space-y-2.5 lg:space-y-3">
                    <!-- Comment Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Comment <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            v-model="noteForm.comment"
                            rows="4"
                            placeholder="Comment"
                            :class="[
                                'w-full px-2.5 py-1.5 border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none',
                                noteErrors.comment
                                    ? 'border-red-500 dark:border-red-500'
                                    : 'border-border',
                                'bg-background text-foreground',
                            ]"
                        ></textarea>
                        <p v-if="noteErrors.comment" class="mt-0.5 text-xs text-red-500">
                            {{ noteErrors.comment }}
                        </p>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end p-2.5 lg:p-3 border-t border-border shrink-0">
                    <button
                        @click="saveNote"
                        class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-xs font-medium transition-colors"
                    >
                        Save Note
                    </button>
                </div>
            </div>
        </div>

        <!-- Add Activity Modal -->
        <div
            v-if="showAddActivity"
            class="fixed inset-0 z-50 flex items-end justify-end bg-black/50"
        >
            <div
                class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-xl flex flex-col rounded-lg mb-4 mr-4"
                @click.stop
            >
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-2.5 lg:p-3 border-b border-border shrink-0">
                    <div class="flex items-center gap-2">
                        <h2 class="text-sm lg:text-base font-semibold text-foreground">Add Activity -</h2>
                        <div class="relative">
                            <button
                                @click="showActivityTypeDropdown = !showActivityTypeDropdown"
                                class="flex items-center gap-1 text-sm lg:text-base font-semibold text-foreground hover:text-blue-600 dark:hover:text-blue-400"
                            >
                                {{ activityForm.type }}
                                <ChevronDown class="size-4" />
                            </button>
                            <div
                                v-if="showActivityTypeDropdown"
                                class="absolute top-full left-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-10 min-w-[120px]"
                            >
                                <button
                                    v-for="type in activityTypes"
                                    :key="type"
                                    @click="activityForm.type = type; showActivityTypeDropdown = false"
                                    :class="[
                                        'w-full text-left px-3 py-2 text-xs lg:text-sm hover:bg-muted transition-colors',
                                        activityForm.type === type ? 'bg-blue-50 dark:bg-blue-900 text-blue-600 dark:text-blue-400' : 'text-foreground'
                                    ]"
                                >
                                    {{ type }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <button
                        @click="closeAddActivity"
                        class="p-1 hover:bg-muted rounded-md transition-colors cursor-pointer"
                    >
                        <X class="size-4 text-muted-foreground" />
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-2.5 lg:p-3 space-y-2.5 lg:space-y-3">
                    <!-- Title Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input
                            v-model="activityForm.title"
                            type="text"
                            placeholder="Title"
                            :class="[
                                'w-full px-2.5 py-1.5 border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500',
                                activityErrors.title
                                    ? 'border-red-500 dark:border-red-500'
                                    : 'border-border',
                                'bg-background text-foreground',
                            ]"
                        />
                        <p v-if="activityErrors.title" class="mt-0.5 text-xs text-red-500">
                            {{ activityErrors.title }}
                        </p>
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Description
                        </label>
                        <textarea
                            v-model="activityForm.description"
                            rows="2"
                            placeholder="Description"
                            class="w-full px-2.5 py-1.5 border border-border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none bg-background text-foreground"
                        ></textarea>
                    </div>

                    <!-- Participants Field -->
                    <div class="relative participants-field-container">
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Participants
                        </label>
                        <div class="relative">
                            <input
                                v-model="participantsSearch"
                                @input="searchParticipants(participantsSearch)"
                                @focus="showParticipantsDropdown = participantsSearch.trim().length > 0"
                                type="text"
                                placeholder="Participants"
                                class="w-full px-2.5 py-1.5 pr-8 border border-border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-background text-foreground"
                            />
                            <div class="absolute right-2.5 top-1/2 -translate-y-1/2 flex items-center">
                                <div v-if="participantsLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                <ChevronDown v-else class="size-4 text-muted-foreground pointer-events-none" />
                            </div>
                        </div>
                        
                        <!-- Participants Dropdown -->
                        <div
                            v-if="showParticipantsDropdown"
                            class="absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-800 border border-border rounded-md shadow-lg z-50 max-h-64 overflow-y-auto"
                        >
                            <!-- Users Section -->
                            <div class="p-2">
                                <div class="font-semibold text-xs lg:text-sm text-foreground mb-2">Users</div>
                                <div v-if="participantsLoading" class="text-xs text-muted-foreground py-2">Searching...</div>
                                <div v-else-if="participantsUsers.length === 0" class="text-xs text-muted-foreground py-2">No result found...</div>
                                <div v-else class="space-y-1">
                                    <button
                                        v-for="user in participantsUsers"
                                        :key="user.id"
                                        @click="selectParticipant(user)"
                                        class="w-full text-left px-2 py-1.5 text-xs lg:text-sm hover:bg-muted rounded-md transition-colors"
                                    >
                                        <div class="font-medium text-foreground">{{ user.name }}</div>
                                        <div v-if="user.email" class="text-xs text-muted-foreground">{{ user.email }}</div>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Persons Section -->
                            <div class="p-2 border-t border-border">
                                <div class="font-semibold text-xs lg:text-sm text-foreground mb-2">Persons</div>
                                <div v-if="participantsLoading" class="text-xs text-muted-foreground py-2">Searching...</div>
                                <div v-else-if="participantsPersons.length === 0" class="text-xs text-muted-foreground py-2">No result found...</div>
                                <div v-else class="space-y-1">
                                    <button
                                        v-for="person in participantsPersons"
                                        :key="person.id"
                                        @click="selectParticipant(person)"
                                        class="w-full text-left px-2 py-1.5 text-xs lg:text-sm hover:bg-muted rounded-md transition-colors"
                                    >
                                        <div class="font-medium text-foreground">{{ person.name }}</div>
                                        <div v-if="person.email" class="text-xs text-muted-foreground">{{ person.email }}</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Fields (Both in one row) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 lg:gap-3">
                        <!-- Schedule From Field -->
                        <div>
                            <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                                Schedule From <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <input
                                    ref="scheduleFromInputRef"
                                    :value="activityForm.scheduleFrom"
                                    type="text"
                                    placeholder="dd----yyyy --:-- --"
                                    :class="[
                                        'w-full px-3 py-2 pr-12 border rounded-lg text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm',
                                        activityErrors.scheduleFrom
                                            ? 'border-red-500 dark:border-red-500 focus:ring-red-500'
                                            : 'border-border hover:border-blue-400 dark:hover:border-blue-600',
                                        'bg-background text-foreground',
                                    ]"
                                />
                                <div class="absolute right-2.5 top-1/2 -translate-y-1/2 flex items-center gap-1.5 pointer-events-none">
                                    <Calendar class="size-4 text-foreground" />
                                </div>
                            </div>
                            <p v-if="activityErrors.scheduleFrom" class="mt-1 text-xs text-red-500">
                                {{ activityErrors.scheduleFrom }}
                            </p>
                        </div>

                        <!-- Schedule To Field -->
                        <div>
                            <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                                Schedule To <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <input
                                    ref="scheduleToInputRef"
                                    :value="activityForm.scheduleTo"
                                    type="text"
                                    placeholder="dd----yyyy --:-- --"
                                    :class="[
                                        'w-full px-3 py-2 pr-12 border rounded-lg text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm',
                                        activityErrors.scheduleTo
                                            ? 'border-red-500 dark:border-red-500 focus:ring-red-500'
                                            : 'border-border hover:border-blue-400 dark:hover:border-blue-600',
                                        'bg-background text-foreground',
                                    ]"
                                />
                                <div class="absolute right-2.5 top-1/2 -translate-y-1/2 flex items-center gap-1.5 pointer-events-none">
                                    <Calendar class="size-4 text-foreground" />
                                </div>
                            </div>
                            <p v-if="activityErrors.scheduleTo" class="mt-1 text-xs text-red-500">
                                {{ activityErrors.scheduleTo }}
                            </p>
                        </div>
                    </div>

                    <!-- Location Field -->
                    <div>
                        <label class="block text-xs lg:text-sm font-medium text-foreground mb-1">
                            Location
                        </label>
                        <div class="relative">
                            <input
                                v-model="activityForm.location"
                                type="text"
                                placeholder="Location"
                                class="w-full px-2.5 py-1.5 pr-8 border border-border rounded-md text-xs lg:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-background text-foreground"
                            />
                            <MapPin class="absolute right-2.5 top-1/2 -translate-y-1/2 size-4 text-muted-foreground pointer-events-none" />
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end p-2.5 lg:p-3 border-t border-border shrink-0">
                    <button
                        @click="saveActivity"
                        class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-xs font-medium transition-colors"
                    >
                        Save Activity
                    </button>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

