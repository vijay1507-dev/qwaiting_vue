<script setup lang="ts">
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as quotesIndex, edit as quotesEdit } from '@/routes/quotes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { Search, Filter, Plus, Edit, Printer, Trash2, ChevronLeft, ChevronRight, X, ChevronDown, ChevronUp } from 'lucide-vue-next';
import { useToast } from '@/composables/useToast';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Quotes',
        href: quotesIndex().url,
    },
];

interface Quote {
    id: string;
    subject: string;
    salesPerson: string;
    person: string;
    subtotal: number;
    discount: number;
    tax: number;
    adjustment: number;
    grandTotal: number;
    expiredAt: string;
    createdAt: string;
}

// Generate dummy quotes data
const generateDummyQuotes = (): Quote[] => {
    return [
        {
            id: '1',
            subject: 'SecureShield 360 - Best Solution for Cyber Security product Delivery',
            salesPerson: 'Example',
            person: 'Sasha Calle',
            subtotal: 1320000,
            discount: 0,
            tax: 0,
            adjustment: 0,
            grandTotal: 1320000,
            expiredAt: '28 Mar 2025',
            createdAt: '21 Mar 2025 08:10AM',
        },
        {
            id: '2',
            subject: 'Quotation For Urgent Purchase of Products by Edward',
            salesPerson: 'Example',
            person: 'Carol Denvers',
            subtotal: 1125000,
            discount: 0,
            tax: 0,
            adjustment: 0,
            grandTotal: 1125000,
            expiredAt: '31 Jan 2025',
            createdAt: '17 Jan 2025 06:57AM',
        },
        {
            id: '3',
            subject: 'Quotation for BreachWatch',
            salesPerson: 'Custom Admin',
            person: 'Carol Denvers',
            subtotal: 149500,
            discount: 0,
            tax: 0,
            adjustment: 0,
            grandTotal: 149500,
            expiredAt: '19 Sep 2024',
            createdAt: '30 Aug 2024 11:59AM',
        },
        {
            id: '4',
            subject: 'Enterprise Security Suite - Annual License',
            salesPerson: 'Example',
            person: 'Billy James',
            subtotal: 850000,
            discount: 50000,
            tax: 80000,
            adjustment: 0,
            grandTotal: 880000,
            expiredAt: '15 Dec 2024',
            createdAt: '01 Dec 2024 10:30AM',
        },
        {
            id: '5',
            subject: 'Cloud Infrastructure Services Package',
            salesPerson: 'Example',
            person: 'Lucy Mark',
            subtotal: 675000,
            discount: 25000,
            tax: 65000,
            adjustment: -5000,
            grandTotal: 710000,
            expiredAt: '20 Nov 2024',
            createdAt: '05 Nov 2024 02:15PM',
        },
        {
            id: '6',
            subject: 'Network Security Implementation Project',
            salesPerson: 'Custom Admin',
            person: 'Eddy Collins',
            subtotal: 425000,
            discount: 0,
            tax: 42500,
            adjustment: 10000,
            grandTotal: 477500,
            expiredAt: '10 Oct 2024',
            createdAt: '25 Sep 2024 09:45AM',
        },
        {
            id: '7',
            subject: 'Data Protection and Backup Solutions',
            salesPerson: 'Example',
            person: 'Oliver Queen',
            subtotal: 320000,
            discount: 15000,
            tax: 30500,
            adjustment: 0,
            grandTotal: 335500,
            expiredAt: '30 Sep 2024',
            createdAt: '15 Sep 2024 03:20PM',
        },
        {
            id: '8',
            subject: 'Compliance and Audit Services Quote',
            salesPerson: 'Custom Admin',
            person: 'Shelly Josh',
            subtotal: 275000,
            discount: 0,
            tax: 27500,
            adjustment: -5000,
            grandTotal: 297500,
            expiredAt: '25 Aug 2024',
            createdAt: '10 Aug 2024 11:00AM',
        },
        {
            id: '9',
            subject: 'Mobile Device Management Platform',
            salesPerson: 'Example',
            person: 'Wilson Fisk',
            subtotal: 185000,
            discount: 10000,
            tax: 17500,
            adjustment: 0,
            grandTotal: 192500,
            expiredAt: '15 Aug 2024',
            createdAt: '01 Aug 2024 08:30AM',
        },
        {
            id: '10',
            subject: 'Enterprise Firewall and Network Protection Services',
            salesPerson: 'Custom Admin',
            person: 'John Smith',
            subtotal: 550000,
            discount: 30000,
            tax: 52000,
            adjustment: 5000,
            grandTotal: 577000,
            expiredAt: '05 Dec 2024',
            createdAt: '20 Nov 2024 10:15AM',
        },
        {
            id: '11',
            subject: 'Advanced Threat Detection and Response System',
            salesPerson: 'Example',
            person: 'Sarah Johnson',
            subtotal: 780000,
            discount: 40000,
            tax: 74000,
            adjustment: -10000,
            grandTotal: 804000,
            expiredAt: '12 Dec 2024',
            createdAt: '27 Nov 2024 02:45PM',
        },
        {
            id: '12',
            subject: 'Identity and Access Management Solution Package',
            salesPerson: 'Custom Admin',
            person: 'Mike Davis',
            subtotal: 425000,
            discount: 0,
            tax: 42500,
            adjustment: 15000,
            grandTotal: 482500,
            expiredAt: '25 Nov 2024',
            createdAt: '10 Nov 2024 09:20AM',
        },
        {
            id: '13',
            subject: 'Endpoint Security and Antivirus Enterprise License',
            salesPerson: 'Example',
            person: 'Emma Wilson',
            subtotal: 320000,
            discount: 20000,
            tax: 30000,
            adjustment: 0,
            grandTotal: 330000,
            expiredAt: '18 Nov 2024',
            createdAt: '03 Nov 2024 11:30AM',
        },
        {
            id: '14',
            subject: 'Data Loss Prevention and Encryption Services',
            salesPerson: 'Custom Admin',
            person: 'David Brown',
            subtotal: 650000,
            discount: 35000,
            tax: 61500,
            adjustment: -8000,
            grandTotal: 683500,
            expiredAt: '30 Nov 2024',
            createdAt: '15 Nov 2024 03:00PM',
        },
    ];
};

const quotes = ref<Quote[]>(generateDummyQuotes());
const searchQuery = ref('');
const selectedQuotes = ref<string[]>([]);
const currentPage = ref(1);
const perPage = ref(10);
const showFilters = ref(false);
const customFiltersExpanded = ref(true);

// Toast notification
const { success } = useToast();

// Delete confirmation modal
const showDeleteModal = ref(false);
const quoteToDelete = ref<string | null>(null);

// Filter form data
const filterForm = ref({
    subject: '',
    salesPerson: '',
    person: '',
    subtotal: '',
    discount: '',
    tax: '',
    grandTotal: '',
    expiredAt: '',
    createdAt: '',
});

// Dropdown visibility
const showSalesPersonDropdown = ref(false);
const showPersonDropdown = ref(false);

// Searchable dropdown states
const salesPersonSearch = ref('');
const salesPersonSearchResults = ref<string[]>([]);
const salesPersonSearchLoading = ref(false);
const salesPersonSearchInputRef = ref<HTMLInputElement | null>(null);

const personSearch = ref('');
const personSearchResults = ref<string[]>([]);
const personSearchLoading = ref(false);
const personSearchInputRef = ref<HTMLInputElement | null>(null);

// Dropdown options (dummy data)
const salesPersonOptions = ['Example', 'Custom Admin', 'John Doe', 'Jane Smith', 'Mike Johnson', 'Sarah Williams'];
const personOptions = ['Sasha Calle', 'Carol Denvers', 'Billy James', 'Lucy Mark', 'Eddy Collins', 'Oliver Queen', 'Shelly Josh', 'Wilson Fisk', 'John Smith', 'Sarah Johnson', 'Mike Davis', 'Emma Wilson', 'David Brown'];

// Filter quotes based on search query and filters
const filteredQuotes = computed(() => {
    let result = quotes.value;

    // Apply search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        result = result.filter(
            (quote) =>
                quote.subject.toLowerCase().includes(query) ||
                quote.salesPerson.toLowerCase().includes(query) ||
                quote.person.toLowerCase().includes(query)
        );
    }

    // Apply filters
    if (filterForm.value.subject) {
        result = result.filter(quote =>
            quote.subject.toLowerCase().includes(filterForm.value.subject.toLowerCase())
        );
    }
    if (filterForm.value.salesPerson) {
        result = result.filter(quote =>
            quote.salesPerson === filterForm.value.salesPerson
        );
    }
    if (filterForm.value.person) {
        result = result.filter(quote =>
            quote.person === filterForm.value.person
        );
    }
    if (filterForm.value.subtotal) {
        const value = parseFloat(filterForm.value.subtotal);
        if (!isNaN(value)) {
            result = result.filter(quote => quote.subtotal >= value);
        }
    }
    if (filterForm.value.discount) {
        const value = parseFloat(filterForm.value.discount);
        if (!isNaN(value)) {
            result = result.filter(quote => quote.discount >= value);
        }
    }
    if (filterForm.value.tax) {
        const value = parseFloat(filterForm.value.tax);
        if (!isNaN(value)) {
            result = result.filter(quote => quote.tax >= value);
        }
    }
    if (filterForm.value.grandTotal) {
        const value = parseFloat(filterForm.value.grandTotal);
        if (!isNaN(value)) {
            result = result.filter(quote => quote.grandTotal >= value);
        }
    }

    return result;
});

// Pagination
const paginatedQuotes = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return filteredQuotes.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredQuotes.value.length / perPage.value);
});

const paginationInfo = computed(() => {
    const start = (currentPage.value - 1) * perPage.value + 1;
    const end = Math.min(currentPage.value * perPage.value, filteredQuotes.value.length);
    return `${start} - ${end} of ${filteredQuotes.value.length}`;
});

const goToPage = (page: number) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

// Reset to page 1 when search query or per page changes
watch([searchQuery, perPage], () => {
    currentPage.value = 1;
});

// Ensure current page is valid when filtered results change
watch(filteredQuotes, () => {
    if (currentPage.value > totalPages.value && totalPages.value > 0) {
        currentPage.value = totalPages.value;
    }
});

const toggleSelectAll = () => {
    if (selectedQuotes.value.length === paginatedQuotes.value.length) {
        selectedQuotes.value = [];
    } else {
        selectedQuotes.value = paginatedQuotes.value.map((quote) => quote.id);
    }
};

const toggleSelectQuote = (quoteId: string) => {
    const index = selectedQuotes.value.indexOf(quoteId);
    if (index > -1) {
        selectedQuotes.value.splice(index, 1);
    } else {
        selectedQuotes.value.push(quoteId);
    }
};

const formatCurrency = (amount: number): string => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(amount);
};


const handlePrint = async (quoteId: string) => {
    // Find the quote data
    const quote = quotes.value.find(q => q.id === quoteId);
    if (!quote) {
        console.error('Quote not found:', quoteId);
        return;
    }

    console.log('Starting PDF generation for quote:', quoteId);
    generatePDF(quote);
};

const generatePDF = (quote: Quote) => {
    console.log('Creating iframe for PDF generation...');
    
    // Create an iframe to isolate styles and avoid oklch color issues
    const iframe = document.createElement('iframe');
    iframe.style.position = 'absolute';
    iframe.style.left = '-9999px';
    iframe.style.top = '0';
    iframe.style.width = '210mm';
    iframe.style.height = '297mm';
    iframe.style.border = 'none';
    document.body.appendChild(iframe);

    // Listen for messages from iframe
    const messageHandler = (event: MessageEvent) => {
        console.log('Received message from iframe:', event.data);
        if (event.data && event.data.type === 'PDF_GENERATED') {
            if (document.body.contains(iframe)) {
                document.body.removeChild(iframe);
            }
            window.removeEventListener('message', messageHandler);
            
            if (event.data.success) {
                console.log('PDF generated successfully');
            } else {
                console.error('PDF generation error:', event.data.error);
                alert(`Failed to generate PDF: ${event.data.error || 'Unknown error'}. Please try again.`);
            }
        }
    };
    window.addEventListener('message', messageHandler);

    // Wait for iframe to load
    iframe.onload = () => {
        try {
            console.log('Iframe loaded, setting up content...');
            const iframeWindow = iframe.contentWindow;
            if (!iframeWindow) {
                console.error('Could not access iframe window');
                if (document.body.contains(iframe)) {
                    document.body.removeChild(iframe);
                }
                alert('Failed to generate PDF content. Please try again.');
                return;
            }

            const iframeDoc = iframeWindow.document;
            if (!iframeDoc) {
                console.error('Could not access iframe document');
                if (document.body.contains(iframe)) {
                    document.body.removeChild(iframe);
                }
                alert('Failed to generate PDF content. Please try again.');
                return;
            }

            // Write complete HTML with isolated styles
            const quoteHtml = generateQuotePDFHtml(quote);
            const htmlContent = '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="UTF-8">' +
                '<style>' +
                '* { margin: 0; padding: 0; box-sizing: border-box; }' +
                'body { font-family: Arial, sans-serif; color: rgb(51, 51, 51); padding: 40px; background-color: rgb(255, 255, 255); }' +
                '</style>' +
                '</head>' +
                '<body>' +
                quoteHtml +
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"><\/script>' +
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"><\/script>' +
                '<script>' +
                '(function() {' +
                'console.log("Iframe script running...");' +
                'var attempts = 0;' +
                'var maxAttempts = 50;' +
                'function checkLibrariesAndGenerate() {' +
                'attempts++;' +
                'console.log("Attempt", attempts, "- html2canvas:", typeof html2canvas, "jspdf:", typeof jspdf);' +
                'if (typeof html2canvas !== "undefined" && typeof jspdf !== "undefined") {' +
                'console.log("Libraries loaded, starting PDF generation...");' +
                'setTimeout(function() {' +
                'try {' +
                'const contentDiv = document.body;' +
                'if (!contentDiv) {' +
                'console.error("Content div not found");' +
                'if (window.parent && window.parent !== window) {' +
                'window.parent.postMessage({ type: "PDF_GENERATED", success: false, error: "Content div not found" }, "*");' +
                '}' +
                'return;' +
                '}' +
                'console.log("Calling html2canvas...");' +
                'html2canvas(contentDiv, {' +
                'scale: 2,' +
                'useCORS: true,' +
                'logging: false,' +
                'windowWidth: 794,' +
                'windowHeight: 1123,' +
                'allowTaint: false' +
                '}).then(function(canvas) {' +
                'console.log("Canvas created, generating PDF...");' +
                'try {' +
                'const imgData = canvas.toDataURL("image/jpeg", 0.98);' +
                'const jsPDF = jspdf.jsPDF;' +
                'const pdf = new jsPDF("portrait", "mm", "a4");' +
                'const imgWidth = 210;' +
                'const pageHeight = 297;' +
                'const imgHeight = (canvas.height * imgWidth) / canvas.width;' +
                'let heightLeft = imgHeight;' +
                'let position = 0;' +
                'pdf.addImage(imgData, "JPEG", 0, position, imgWidth, imgHeight);' +
                'heightLeft -= pageHeight;' +
                'while (heightLeft >= 0) {' +
                'position = heightLeft - imgHeight;' +
                'pdf.addPage();' +
                'pdf.addImage(imgData, "JPEG", 0, position, imgWidth, imgHeight);' +
                'heightLeft -= pageHeight;' +
                '}' +
                'console.log("Saving PDF: Quote-' + quote.id + '.pdf");' +
                'pdf.save("Quote-' + quote.id + '.pdf");' +
                'console.log("PDF saved successfully");' +
                'if (window.parent && window.parent !== window) {' +
                'window.parent.postMessage({ type: "PDF_GENERATED", success: true }, "*");' +
                '}' +
                '} catch (pdfError) {' +
                'console.error("PDF creation error:", pdfError);' +
                'if (window.parent && window.parent !== window) {' +
                'window.parent.postMessage({ type: "PDF_GENERATED", success: false, error: pdfError.message }, "*");' +
                '}' +
                '}' +
                '}).catch(function(error) {' +
                'console.error("html2canvas error:", error);' +
                'if (window.parent && window.parent !== window) {' +
                'window.parent.postMessage({ type: "PDF_GENERATED", success: false, error: error.message || String(error) }, "*");' +
                '}' +
                '});' +
                '} catch (error) {' +
                'console.error("Generation error:", error);' +
                'if (window.parent && window.parent !== window) {' +
                'window.parent.postMessage({ type: "PDF_GENERATED", success: false, error: error.message || String(error) }, "*");' +
                '}' +
                '}' +
                '}, 500);' +
                '} else if (attempts < maxAttempts) {' +
                'setTimeout(checkLibrariesAndGenerate, 200);' +
                '} else {' +
                'console.error("Libraries failed to load after", maxAttempts, "attempts");' +
                'if (window.parent && window.parent !== window) {' +
                'window.parent.postMessage({ type: "PDF_GENERATED", success: false, error: "Libraries failed to load" }, "*");' +
                '}' +
                '}' +
                '}' +
                'if (document.readyState === "complete" || document.readyState === "interactive") {' +
                'checkLibrariesAndGenerate();' +
                '} else {' +
                'window.addEventListener("load", checkLibrariesAndGenerate);' +
                'document.addEventListener("DOMContentLoaded", checkLibrariesAndGenerate);' +
                '}' +
                '})();' +
                '<\/script>' +
                '</body>' +
                '</html>';

            iframeDoc.open();
            iframeDoc.write(htmlContent);
            iframeDoc.close();
            console.log('Iframe content written');
        } catch (error) {
            console.error('Error setting up iframe:', error);
            if (document.body.contains(iframe)) {
                document.body.removeChild(iframe);
            }
            alert('Failed to set up PDF generation. Please try again.');
        }
    };

    // Trigger iframe load
    iframe.src = 'about:blank';
};

const generateQuotePDFHtml = (quote: Quote): string => {
    // Static values for PDF template
    const quoteId = '9';
    const salesPerson = 'Example';
    const person = 'Sasha Calle';
    const subject = 'SecureShield 360 - Best Solution for Cyber Security product Delivery';
    const date = '21-03-2025';
    const expiredAt = '28-03-2025';
    const price = '$1,200.00';
    const quantity = '1100';
    const amount = '$1,320,000.00';
    const discount = '$0.00';
    const tax = '$0.00';
    const adjustment = '$0.00';
    const grandTotal = '$1,320,000.00';
    const subtotal = '$1,320,000.00';
    const subjectTruncated = subject.length > 50 ? subject.substring(0, 50) + '...' : subject;

    return `
        <div style="font-family: Arial, sans-serif; color: #333333; padding: 40px; background-color: #ffffff;">
            <div style="text-align: center; margin-bottom: 40px;">
                <div style="font-size: 48px; font-weight: bold; color: #1e3a8a; margin-bottom: 30px;">QUOTE</div>
            </div>

            <div style="display: flex; justify-content: space-between; margin-bottom: 30px;">
                <div style="width: 48%;">
                    <div style="margin-bottom: 10px; font-size: 14px;">
                        <span style="font-weight: bold; color: #555555; margin-right: 10px;">Quote ID:</span>
                        <span>#${quoteId}</span>
                    </div>
                    <div style="margin-bottom: 10px; font-size: 14px;">
                        <span style="font-weight: bold; color: #555555; margin-right: 10px;">Sales Person:</span>
                        <span>${salesPerson}</span>
                    </div>
                    <div style="margin-bottom: 10px; font-size: 14px;">
                        <span style="font-weight: bold; color: #555555; margin-right: 10px;">Date:</span>
                        <span>${date}</span>
                    </div>
                    <div style="margin-bottom: 10px; font-size: 14px;">
                        <span style="font-weight: bold; color: #555555; margin-right: 10px;">Expired At:</span>
                        <span>${expiredAt}</span>
                    </div>
                </div>
                <div style="width: 48%;">
                    <div style="margin-bottom: 10px; font-size: 14px;">
                        <span style="font-weight: bold; color: #555555; margin-right: 10px;">Person:</span>
                        <span>${person}</span>
                    </div>
                    <div style="margin-bottom: 10px; font-size: 14px;">
                        <span style="font-weight: bold; color: #555555; margin-right: 10px;">Subject:</span>
                        <span>${subject}</span>
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <div style="background-color: #93c5fd; color: #1e3a8a; padding: 10px 15px; font-weight: bold; display: flex; justify-content: space-between; margin-bottom: 15px;">
                    <span>Billing Address</span>
                    <span>Shipping Address</span>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <div style="width: 48%;">
                        <div style="font-size: 14px; line-height: 1.6; color: #333333;">
                            H-28, ARV PARK, SECTOR 63 NOIDA<br>
                            201301<br>
                            UP<br>
                            India
                        </div>
                    </div>
                    <div style="width: 48%;">
                        <div style="font-size: 14px; line-height: 1.6; color: #333333;">
                            H-28, ARV PARK, SECTOR 63 NOIDA<br>
                            201301<br>
                            UP<br>
                            India
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #93c5fd; color: #1e3a8a;">
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">SKU</th>
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">Product Name</th>
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">Price</th>
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">Quantity</th>
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">Amount</th>
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">Discount</th>
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">Tax</th>
                            <th style="padding: 10px; text-align: left; font-weight: bold; font-size: 14px; border: 1px solid #93c5fd;">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">102</td>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">${subjectTruncated}</td>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">${price}</td>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">${quantity}</td>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">${amount}</td>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">${discount}</td>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">${tax}</td>
                            <td style="padding: 12px 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px;">${grandTotal}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="text-align: right; margin-top: 30px;">
                <div style="display: flex; justify-content: flex-end; margin-bottom: 8px; font-size: 14px;">
                    <span style="width: 150px; text-align: right; margin-right: 20px; color: #555555;">Sub Total:</span>
                    <span style="width: 150px; text-align: right; font-weight: 500;">${subtotal}</span>
                </div>
                <div style="display: flex; justify-content: flex-end; margin-bottom: 8px; font-size: 14px;">
                    <span style="width: 150px; text-align: right; margin-right: 20px; color: #555555;">Tax:</span>
                    <span style="width: 150px; text-align: right; font-weight: 500;">${tax}</span>
                </div>
                <div style="display: flex; justify-content: flex-end; margin-bottom: 8px; font-size: 14px;">
                    <span style="width: 150px; text-align: right; margin-right: 20px; color: #555555;">Discount:</span>
                    <span style="width: 150px; text-align: right; font-weight: 500;">${discount}</span>
                </div>
                <div style="display: flex; justify-content: flex-end; margin-bottom: 8px; font-size: 14px;">
                    <span style="width: 150px; text-align: right; margin-right: 20px; color: #555555;">Adjustment:</span>
                    <span style="width: 150px; text-align: right; font-weight: 500;">${adjustment}</span>
                </div>
                <div style="display: flex; justify-content: flex-end; margin-bottom: 8px; font-size: 16px; font-weight: bold; margin-top: 10px; padding-top: 10px; border-top: 2px solid #333333;">
                    <span style="width: 150px; text-align: right; margin-right: 20px;">Grand Total:</span>
                    <span style="width: 150px; text-align: right;">${grandTotal}</span>
                </div>
            </div>
        </div>
    `;
};

const handleDelete = (quoteId: string) => {
    quoteToDelete.value = quoteId;
    showDeleteModal.value = true;
};

const confirmDelete = () => {
    if (quoteToDelete.value) {
        // Remove quote from the list
        quotes.value = quotes.value.filter(q => q.id !== quoteToDelete.value);
        // Remove from selected quotes if it was selected
        selectedQuotes.value = selectedQuotes.value.filter(id => id !== quoteToDelete.value);
        // Reset to page 1 if current page becomes empty
        if (paginatedQuotes.value.length === 0 && currentPage.value > 1) {
            currentPage.value = Math.max(1, currentPage.value - 1);
        }
        
        // Show success toast
        success('Quote deleted successfully.');
        
        quoteToDelete.value = null;
    }
    showDeleteModal.value = false;
};

const cancelDelete = () => {
    quoteToDelete.value = null;
    showDeleteModal.value = false;
};

// Filter modal functions
const closeAllDropdowns = (except?: 'salesPerson' | 'person') => {
    if (except !== 'salesPerson') {
        showSalesPersonDropdown.value = false;
        salesPersonSearch.value = '';
        salesPersonSearchResults.value = [];
    }
    if (except !== 'person') {
        showPersonDropdown.value = false;
        personSearch.value = '';
        personSearchResults.value = [];
    }
};

const openFilters = () => {
    showFilters.value = true;
};

const closeFilters = () => {
    showFilters.value = false;
    closeAllDropdowns();
};

const openSalesPersonDropdown = () => {
    closeAllDropdowns('salesPerson');
    showSalesPersonDropdown.value = !showSalesPersonDropdown.value;
    if (showSalesPersonDropdown.value) {
        nextTick(() => {
            if (salesPersonSearchInputRef.value) {
                salesPersonSearchInputRef.value.focus();
            }
        });
    }
};

const openPersonDropdown = () => {
    closeAllDropdowns('person');
    showPersonDropdown.value = !showPersonDropdown.value;
    if (showPersonDropdown.value) {
        nextTick(() => {
            if (personSearchInputRef.value) {
                personSearchInputRef.value.focus();
            }
        });
    }
};

const searchSalesPerson = (query: string) => {
    salesPersonSearch.value = query;
    
    if (!query.trim()) {
        salesPersonSearchResults.value = [];
        salesPersonSearchLoading.value = false;
        return;
    }
    
    salesPersonSearchLoading.value = true;
    
    // Simulate API call
    setTimeout(() => {
        const filtered = salesPersonOptions.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        salesPersonSearchResults.value = filtered;
        salesPersonSearchLoading.value = false;
    }, 300);
};

const searchPerson = (query: string) => {
    personSearch.value = query;
    
    if (!query.trim()) {
        personSearchResults.value = [];
        personSearchLoading.value = false;
        return;
    }
    
    personSearchLoading.value = true;
    
    // Simulate API call
    setTimeout(() => {
        const filtered = personOptions.filter(option =>
            option.toLowerCase().includes(query.toLowerCase())
        );
        personSearchResults.value = filtered;
        personSearchLoading.value = false;
    }, 300);
};

const selectSalesPerson = (person: string) => {
    filterForm.value.salesPerson = person;
    showSalesPersonDropdown.value = false;
    salesPersonSearch.value = '';
    salesPersonSearchResults.value = [];
};

const selectPerson = (person: string) => {
    filterForm.value.person = person;
    showPersonDropdown.value = false;
    personSearch.value = '';
    personSearchResults.value = [];
};

const clearSalesPerson = () => {
    filterForm.value.salesPerson = '';
    salesPersonSearch.value = '';
    salesPersonSearchResults.value = [];
};

const clearPerson = () => {
    filterForm.value.person = '';
    personSearch.value = '';
    personSearchResults.value = [];
};

const applyFilters = () => {
    currentPage.value = 1;
    closeFilters();
};

const saveFilter = () => {
    // TODO: Implement save filter logic
    console.log('Saving filter:', filterForm.value);
};

const handleClickOutside = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    
    // Close dropdowns if clicking outside
    if (!target.closest('.dropdown-container')) {
        showSalesPersonDropdown.value = false;
        showPersonDropdown.value = false;
        
        // Reset search states when closing
        if (!showSalesPersonDropdown.value) {
            salesPersonSearch.value = '';
            salesPersonSearchResults.value = [];
        }
        if (!showPersonDropdown.value) {
            personSearch.value = '';
            personSearchResults.value = [];
        }
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<template>
    <Head title="Quotes" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div>
                    <h1 class="text-base font-semibold text-foreground">Quotes</h1>
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
                                placeholder="Search"
                                class="pl-8 h-8 text-sm"
                            />
                        </div>
                        <Button variant="outline" size="sm" class="h-8 text-xs" @click="openFilters">
                            <Filter class="size-3.5" />
                            Filter
                        </Button>
                    </div>

                    <div class="flex items-center gap-3">
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
                        <Link
                            :href="'/quotes/create'"
                            class="inline-flex items-center justify-center gap-2 h-8 px-3 text-xs bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors cursor-pointer"
                        >
                            <Plus class="size-3.5" />
                            Create Quote
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="flex-1 overflow-auto rounded-md border border-border bg-card">
                <table class="w-full text-sm">
                    <thead class="sticky top-0 z-10 bg-muted/50">
                        <tr>
                            <th class="h-10 w-12 px-4 text-left align-middle">
                                <input
                                    type="checkbox"
                                    :checked="selectedQuotes.length === paginatedQuotes.length && paginatedQuotes.length > 0"
                                    :indeterminate="selectedQuotes.length > 0 && selectedQuotes.length < paginatedQuotes.length"
                                    @change="toggleSelectAll"
                                    class="size-4 rounded border-border"
                                />
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Subject
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Sales Person
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Person
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Subtotal
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Discount
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Tax
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Adjustment
                            </th>
                            <th class="h-10 px-4 text-right align-middle font-medium text-muted-foreground">
                                Grand Total
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Expired At
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Created At
                            </th>
                            <th class="h-10 px-4 text-left align-middle font-medium text-muted-foreground">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="filteredQuotes.length === 0">
                            <td colspan="12" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <p class="text-sm text-muted-foreground">No quotes found</p>
                                    <p class="text-xs text-muted-foreground">
                                        {{ searchQuery ? 'Try adjusting your search criteria' : 'Create your first quote to get started' }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr
                            v-for="quote in paginatedQuotes"
                            :key="quote.id"
                            class="border-b border-border transition-colors hover:bg-muted/50"
                        >
                            <td class="px-4 py-3 align-middle">
                                <input
                                    type="checkbox"
                                    :checked="selectedQuotes.includes(quote.id)"
                                    @change="toggleSelectQuote(quote.id)"
                                    class="size-4 rounded border-border"
                                />
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ quote.subject }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ quote.salesPerson }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <Link
                                    :href="`/quotes/${quote.id}`"
                                    class="text-blue-600 hover:text-blue-700 hover:underline cursor-pointer"
                                >
                                    {{ quote.person }}
                                </Link>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatCurrency(quote.subtotal) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatCurrency(quote.discount) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatCurrency(quote.tax) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="text-foreground">{{ formatCurrency(quote.adjustment) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle text-right">
                                <span class="font-medium text-foreground">{{ formatCurrency(quote.grandTotal) }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ quote.expiredAt }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <span class="text-foreground">{{ quote.createdAt }}</span>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center gap-2">
                                    <Link
                                        :href="quotesEdit(quote.id).url"
                                        class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                        title="Edit"
                                    >
                                        <Edit class="size-4 text-muted-foreground" />
                                    </Link>
                                    <button
                                        @click="handlePrint(quote.id)"
                                        class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                        type="button"
                                        title="Print"
                                    >
                                        <Printer class="size-4 text-muted-foreground" />
                                    </button>
                                    <button
                                        @click="handleDelete(quote.id)"
                                        class="p-1.5 hover:bg-muted rounded-md transition-colors cursor-pointer"
                                        type="button"
                                        title="Delete"
                                    >
                                        <Trash2 class="size-4 text-muted-foreground" />
                                    </button>
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
                            <!-- Subject Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Subject
                                </label>
                                <Input
                                    v-model="filterForm.subject"
                                    type="text"
                                    placeholder="Subject"
                                    class="w-full"
                                />
                            </div>

                            <!-- Sales Person Searchable Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Sales Person
                                </label>
                                <button
                                    @click.stop="openSalesPersonDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.salesPerson ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                        {{ filterForm.salesPerson || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.salesPerson && !showSalesPersonDropdown"
                                            @click.stop="clearSalesPerson"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear sales person"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                
                                <!-- Search Popup -->
                                <div
                                    v-if="showSalesPersonDropdown"
                                    @click.stop
                                    class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="el => { if (el) salesPersonSearchInputRef = el as HTMLInputElement }"
                                            :value="salesPersonSearch"
                                            @input="searchSalesPerson(($event.target as HTMLInputElement).value)"
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                        />
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                            <div v-if="salesPersonSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Search Results Dropdown -->
                                    <div class="max-h-48 overflow-y-auto border-t border-border">
                                        <div v-if="salesPersonSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                            Searching...
                                        </div>
                                        <div v-else-if="salesPersonSearchResults && salesPersonSearchResults.length > 0">
                                            <button
                                                v-for="option in salesPersonSearchResults"
                                                :key="option"
                                                @click="selectSalesPerson(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                            No result found
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Person Searchable Dropdown -->
                            <div class="dropdown-container relative">
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Person
                                </label>
                                <button
                                    @click.stop="openPersonDropdown"
                                    type="button"
                                    class="w-full flex items-center justify-between gap-2 rounded-md border border-border bg-background px-3 py-2 text-sm text-left focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                >
                                    <span :class="filterForm.person ? 'text-foreground' : 'text-muted-foreground'" class="flex-1 truncate">
                                        {{ filterForm.person || 'Select' }}
                                    </span>
                                    <div class="flex items-center gap-1 shrink-0">
                                        <button
                                            v-if="filterForm.person && !showPersonDropdown"
                                            @click.stop="clearPerson"
                                            type="button"
                                            class="p-0.5 hover:bg-muted rounded transition-colors cursor-pointer"
                                            aria-label="Clear person"
                                        >
                                            <X class="size-3.5 text-muted-foreground hover:text-foreground" />
                                        </button>
                                        <ChevronDown class="size-4 text-muted-foreground" />
                                    </div>
                                </button>
                                
                                <!-- Search Popup -->
                                <div
                                    v-if="showPersonDropdown"
                                    @click.stop
                                    class="absolute top-full left-0 right-0 z-[9999] mt-1 rounded-md border border-border bg-white dark:bg-gray-800 shadow-lg"
                                >
                                    <div class="relative">
                                        <input
                                            :ref="el => { if (el) personSearchInputRef = el as HTMLInputElement }"
                                            :value="personSearch"
                                            @input="searchPerson(($event.target as HTMLInputElement).value)"
                                            type="text"
                                            placeholder="Search..."
                                            class="w-full rounded-t-md bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                                        />
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                            <div v-if="personSearchLoading" class="size-4 border-2 border-muted-foreground border-t-transparent rounded-full animate-spin"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Search Results Dropdown -->
                                    <div class="max-h-48 overflow-y-auto border-t border-border">
                                        <div v-if="personSearchLoading" class="px-3 py-2 text-xs text-muted-foreground">
                                            Searching...
                                        </div>
                                        <div v-else-if="personSearchResults && personSearchResults.length > 0">
                                            <button
                                                v-for="option in personSearchResults"
                                                :key="option"
                                                @click="selectPerson(option)"
                                                type="button"
                                                class="w-full text-left px-3 py-2 text-sm hover:bg-muted transition-colors text-foreground cursor-pointer"
                                            >
                                                {{ option }}
                                            </button>
                                        </div>
                                        <div v-else class="px-3 py-2 text-xs text-muted-foreground">
                                            No result found
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Subtotal Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Subtotal
                                </label>
                                <Input
                                    v-model="filterForm.subtotal"
                                    type="text"
                                    placeholder="Subtotal"
                                    class="w-full"
                                />
                            </div>

                            <!-- Discount Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Discount
                                </label>
                                <Input
                                    v-model="filterForm.discount"
                                    type="text"
                                    placeholder="Discount"
                                    class="w-full"
                                />
                            </div>

                            <!-- Tax Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Tax
                                </label>
                                <Input
                                    v-model="filterForm.tax"
                                    type="text"
                                    placeholder="Tax"
                                    class="w-full"
                                />
                            </div>

                            <!-- Grand Total Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Grand Total
                                </label>
                                <Input
                                    v-model="filterForm.grandTotal"
                                    type="text"
                                    placeholder="Grand Total"
                                    class="w-full"
                                />
                            </div>

                            <!-- Expired At Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Expired At
                                </label>
                                <Input
                                    v-model="filterForm.expiredAt"
                                    type="text"
                                    placeholder="Expired At"
                                    class="w-full"
                                />
                            </div>

                            <!-- Created At Field -->
                            <div>
                                <label class="block text-sm font-medium text-foreground mb-2">
                                    Created At
                                </label>
                                <Input
                                    v-model="filterForm.createdAt"
                                    type="text"
                                    placeholder="Created At"
                                    class="w-full"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="sticky bottom-0 flex items-center justify-between gap-3 border-t border-border bg-white dark:bg-gray-900 px-6 py-4">
                    <Button
                        variant="outline"
                        size="sm"
                        @click="saveFilter"
                        class="cursor-pointer"
                    >
                        Save Filter
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

        <!-- Delete Confirmation Modal -->
        <Dialog :open="showDeleteModal" @update:open="(value) => { if (!value) cancelDelete(); }">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle class="text-lg font-semibold text-foreground">
                        Are you sure?
                    </DialogTitle>
                    <DialogDescription class="text-sm text-muted-foreground pt-2">
                        Are you sure you want to perform this action?
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter class="gap-3">
                    <DialogClose as-child>
                        <Button
                            variant="secondary"
                            @click="cancelDelete"
                            class="cursor-pointer"
                        >
                            Disagree
                        </Button>
                    </DialogClose>
                    <Button
                        @click="confirmDelete"
                        class="bg-blue-600 hover:bg-blue-700 text-white cursor-pointer"
                    >
                        Agree
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </AppLayout>
</template>

