@extends('website.layout.website')

@section('title', 'Package Enquiry - Qwaiting')

@section('content')
<div class="relative min-h-screen bg-gray-50/50 pt-32 pb-20">
    <!-- Abstract Background Pattern -->
    <div class="absolute inset-x-0 top-0 h-96 bg-gradient-to-b from-blue-50 to-transparent -z-10"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl mb-4">
                Upgrade Your Experience
            </h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Ready to take your business to the next level? Fill out the form below and our team will craft the perfect solution for you.
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden" x-data="enquiryForm()">
            <!-- Form Header & Progress -->
            <div class="bg-primary/5 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Enquiry Form</h2>
                        <p class="text-sm text-gray-500">Please provide your details accurately</p>
                    </div>
                </div>
            </div>

            <form @submit.prevent="submitEnquiry" class="p-8 sm:p-10" novalidate>
                <!-- Section 1: Contact Details -->
                <div class="mb-10">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-6 flex items-center">
                        <span class="bg-gray-100 px-2 py-1 rounded mr-2">01</span> Contact Information
                    </h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-2">
                        <!-- Full Name -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" x-model="formData.full_name" required
                                class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.full_name}"
                                placeholder="Enter Your Full Name">
                            <span x-show="errors.full_name" x-text="errors.full_name" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>

                        <!-- Email -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" x-model="formData.email" required
                                class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.email}"
                                placeholder="Enter Your Email Address">
                            <span x-show="errors.email" x-text="errors.email" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>

                        <!-- Mobile -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Mobile Number <span class="text-red-500">*</span></label>
                            <input type="text" x-model="formData.mobile_number" required
                                class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.mobile_number}"
                                placeholder="Enter Your Mobile Number">
                            <span x-show="errors.mobile_number" x-text="errors.mobile_number" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>

                        <!-- Preferred Contact -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Preferred Contact Method</label>
                            <div class="relative">
                                <select x-model="formData.contact_method" required
                                    class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200 appearance-none"
                                    :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.contact_method}">
                                    <option value="Call">Phone Call</option>
                                    <option value="Email">Email</option>
                                    <option value="WhatsApp">WhatsApp</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <span x-show="errors.contact_method" x-text="errors.contact_method" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>

                        <!-- Best Time to Contact -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Best Time to Contact</label>
                            <input type="time" x-model="formData.best_time_to_contact" required
                                class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200">
                            <span x-show="errors.best_time_to_contact" x-text="errors.best_time_to_contact" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100 mb-10">

                <!-- Section 2: Business Details -->
                <div class="mb-10">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-6 flex items-center">
                        <span class="bg-gray-100 px-2 py-1 rounded mr-2">02</span> Business Details
                    </h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-2">
                        <!-- Company -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Company Name <span class="text-red-500">*</span></label>
                            <input type="text" x-model="formData.company_name" required
                                class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.company_name}"
                                placeholder="Enter Company Name">
                            <span x-show="errors.company_name" x-text="errors.company_name" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>

                        <!-- Num Users -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">No. of Branches/Users <span class="text-red-500">*</span></label>
                            <input type="number" x-model="formData.num_users_branches" required
                                class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.num_users_branches}"
                                placeholder="Enter No. of Branches/Users">
                            <span x-show="errors.num_users_branches" x-text="errors.num_users_branches" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100 mb-10">

                <!-- Section 3: Upgrade Preferences -->
                <div>
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-6 flex items-center">
                        <span class="bg-gray-100 px-2 py-1 rounded mr-2">03</span> Upgrade Preferences
                    </h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-2 mb-8">
                        <!-- Interested Package -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Interested Package <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select x-model="formData.interested_package" required
                                    class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200 appearance-none"
                                    :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.interested_package}">
                                    <option value="">Select Package</option>
                                    @foreach($packages as $package)
                                    <option value="{{ $package->name }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <span x-show="errors.interested_package" x-text="errors.interested_package" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>

                        <!-- Billing Cycle -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Billing Cycle <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select x-model="formData.billing_cycle" required
                                    class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200 appearance-none"
                                    :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.billing_cycle}">
                                    <option value="Monthly">Monthly</option>
                                    <option value="Yearly">Yearly (Save 20%)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <span x-show="errors.billing_cycle" x-text="errors.billing_cycle" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>

                        <!-- Expected Start Date -->
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Expected Start Date <span class="text-red-500">*</span></label>
                            <input type="date" x-model="formData.expected_start_date" required
                                class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200"
                                :class="{'border-red-500 focus:border-red-500 focus:ring-red-200': errors.expected_start_date}">
                            <span x-show="errors.expected_start_date" x-text="errors.expected_start_date" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>
                    </div>

                </div>

                <hr class="border-gray-100 mb-10">

                <!-- Section 4: Additional Requirements -->
                <div>
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-6 flex items-center">
                        <span class="bg-gray-100 px-2 py-1 rounded mr-2">04</span> Additional Requirements
                    </h3>

                    <!-- Features Multi-Select -->
                    <div class="mb-8 relative" x-data="{ open: false }">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Features Required</label>
                        <button type="button" @click="open = !open" @click.away="open = false"
                            class="relative w-full bg-white border border-gray-200 rounded-xl py-3 px-4 text-left cursor-default focus:outline-none focus:border-primary sm:text-sm">
                            <span class="block truncate" x-text="formData.features_required.length > 0 ? formData.features_required.join(', ') : 'Select Features'"></span>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-base ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                            <div class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-50" @click="toggleFeature('Video Call')">
                                <div class="flex items-center">
                                    <input type="checkbox" :checked="formData.features_required.includes('Video Call')" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded mr-3 pointer-events-none">
                                    <span class="font-normal block truncate">
                                        Video Call
                                    </span>
                                </div>
                            </div>

                            <div class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-50" @click="toggleFeature('Whatsapp Integration')">
                                <div class="flex items-center">
                                    <input type="checkbox" :checked="formData.features_required.includes('Whatsapp Integration')" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded mr-3 pointer-events-none">
                                    <span class="font-normal block truncate">
                                        Whatsapp Integration
                                    </span>
                                </div>
                            </div>

                            <div class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-50" @click="toggleFeature('CRM Integration')">
                                <div class="flex items-center">
                                    <input type="checkbox" :checked="formData.features_required.includes('CRM Integration')" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded mr-3 pointer-events-none">
                                    <span class="font-normal block truncate">
                                        CRM Integration
                                    </span>
                                </div>
                            </div>

                            <div class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-50" @click="toggleFeature('Reports')">
                                <div class="flex items-center">
                                    <input type="checkbox" :checked="formData.features_required.includes('Reports')" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded mr-3 pointer-events-none">
                                    <span class="font-normal block truncate">
                                        Reports
                                    </span>
                                </div>
                            </div>

                            <div class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-50" @click="toggleFeature('API Access')">
                                <div class="flex items-center">
                                    <input type="checkbox" :checked="formData.features_required.includes('API Access')" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded mr-3 pointer-events-none">
                                    <span class="font-normal block truncate">
                                        API Access
                                    </span>
                                </div>
                            </div>


                            <div class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-50" @click="toggleFeature('Custom Branding')">
                                <div class="flex items-center">
                                    <input type="checkbox" :checked="formData.features_required.includes('Custom Branding')" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded mr-3 pointer-events-none">
                                    <span class="font-normal block truncate">
                                        Custom Branding
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Custom Notes -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Additional Notes / Requirements</label>
                        <textarea x-model="formData.custom_notes" rows="4"
                            class="block w-full py-3 px-4 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-primary/20 transition-all duration-200"
                            placeholder="Tell us more about what you are looking for..."></textarea>
                    </div>

                    <!-- Consent -->
                    <div class="flex items-start mb-8">
                        <div class="flex items-center h-5">
                            <input id="consent" type="checkbox" x-model="formData.consent" required class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" :class="{'border-red-500': errors.consent}">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="consent" class="font-medium text-gray-700">I agree to the processing of my personal data.</label>
                            <p class="text-gray-500">We will use this information to contact you regarding your enquiry. We do not share your data.</p>
                            <span x-show="errors.consent" x-text="errors.consent" class="text-xs text-red-500 mt-1 block font-medium"></span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-gray-100">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center items-center py-4 px-8 border border-transparent rounded-xl shadow-lg shadow-blue-500/30 text-base font-semibold text-white bg-primary hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 disabled:opacity-70 disabled:cursor-not-allowed"
                            :disabled="loading">
                            <svg x-show="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span x-text="loading ? 'Submitting...' : 'Submit Enquiry'"></span>
                        </button>
                    </div>
                </div>

                <!-- Messages -->
                <!-- Success Modal -->
                <div x-show="showSuccessModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div x-show="showSuccessModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/30 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div x-show="showSuccessModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative z-10 inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                            <div>
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Success!
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500" x-text="successMessage">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="errorMessage" x-transition class="mx-8 mb-8 p-4 bg-red-50 text-red-700 rounded-xl border border-red-200 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium" x-text="errorMessage"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function enquiryForm() {
        return {
            loading: false,
            showSuccessModal: false,
            successMessage: '',
            errorMessage: '',
            errors: {},
            formData: {
                full_name: '',
                email: '',
                mobile_number: '',
                company_name: '',
                current_package: '',
                customer_id: '',
                interested_package: '{{ request()->query("package") }}',
                expected_start_date: '',
                num_users_branches: '',
                billing_cycle: 'Monthly',
                features_required: [],
                custom_notes: '',
                contact_method: 'Call',
                best_time_to_contact: '',
                consent: false
            },
            toggleFeature(feature) {
                if (this.formData.features_required.includes(feature)) {
                    this.formData.features_required = this.formData.features_required.filter(f => f !== feature);
                } else {
                    this.formData.features_required.push(feature);
                }
            },
            async submitEnquiry() {
                this.loading = true;
                this.errorMessage = '';
                this.successMessage = '';
                this.errors = {};

                try {
                    const response = await fetch('{{ route("package.enquiry.store") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.formData)
                    });

                    const result = await response.json();

                    if (response.ok) {
                        this.successMessage = result.message;
                        this.showSuccessModal = true;
                        setTimeout(() => {
                            this.showSuccessModal = false;
                        }, 5000);

                        // Reset form
                        this.formData = {
                            full_name: '',
                            email: '',
                            mobile_number: '',
                            company_name: '',
                            current_package: '',
                            customer_id: '',
                            interested_package: '',
                            expected_start_date: '',
                            num_users_branches: '',
                            billing_cycle: 'Monthly',
                            features_required: [],
                            custom_notes: '',
                            contact_method: 'Call',
                            best_time_to_contact: '',
                            consent: false
                        };
                    } else if (response.status === 422) {
                        this.errors = result.errors || {};
                        this.errorMessage = ''; // Do NOT show generic error for validation
                        // Scroll to first error if needed, or just let user see red fields
                    } else {
                        this.errorMessage = result.message || 'Validation failed. Please check inputs.';
                    }
                } catch (error) {
                    this.errorMessage = 'An error occurred. Please try again.';
                    console.error('Error:', error);
                } finally {
                    this.loading = false;
                }
            }
        }
    }
</script>
@endsection