<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Qwaiting</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Intl-Tel-Input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .iti {
            width: 100%;
        }

        .iti__flag-container {
            border-radius: 12px 0 0 12px;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #centered-layout {
            display: none;
        }

        #centered-layout.active {
            display: flex;
        }

        .border-brand {
            border-color: #7C69EF;
        }

        .bg-brand {
            background-color: #7C69EF;
        }

        .bg-brand-light {
            background-color: rgba(124, 105, 239, 0.05);
        }

        .text-brand {
            color: #7C69EF;
        }

        .error-msg {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: none;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            color: #64748b;
            transition: all 0.3s ease;
        }

        .requirement-item.valid {
            color: #10b981;
        }

        .requirement-item svg {
            width: 1rem;
            height: 1rem;
            flex-shrink: 0;
            display: none;
        }

        .requirement-item.valid svg {
            display: block;
        }

        .requirement-item .dot {
            width: 4px;
            height: 4px;
            background-color: #cbd5e1;
            border-radius: 50%;
        }

        .requirement-item.valid .dot {
            display: none;
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-slate-900 font-sans">

    <!-- Split View for Step 1 & 2 -->
    <div id="split-layout" class="flex min-h-screen">
        <!-- Sidebar -->
        <div
            class="hidden lg:flex flex-1 bg-[#7C69EF] text-white p-16 flex-col relative overflow-hidden justify-center">
            <div class="relative z-10 max-w-lg">
                <div class="absolute cursor-pointer text-white hidden" id="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-10 h-10 text-white">
                        <path
                            d="M5 21h14V4H5v17zm3-11h2v2H8v-2zm0-4h2v2H8V6zm0 8h2v2H8v-2zm4-8h2v2h-2V6zm0 4h2v2h-2v-2zm0 4h2v2h-2v-2z" />
                    </svg>

                </div>

                <div class="" id="logo-img">
                    <img src="https://qwaiting.com/images/qwaiting-logo.svg" alt="">
                </div>
                <h1 id="sidebar-dynamic-title"
                    class="text-5xl font-bold leading-tight mb-6 transition-all duration-300 mt-10">Try Queue Management
                    System for Free</h1>
                <p id="sidebar-dynamic-subtitle" class="text-lg opacity-90 mb-10 transition-all duration-300">No credit
                    card required. No strings attached.</p>

                <div class="logo hidden" id="sidebar-logo">
                    <p class="text-sm opacity-70 mb-4">Trusted by 65K+ customers</p>
                    <div class="grid grid-cols-3 gap-4">
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt=""
                                class="w-full h-full"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/frontimg/clients/ministry_of_hajj_and_umrah.jpg" alt=""
                                class="w-full h-full"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/frontimg/clients/tatapwer_ddl.jpg" alt=""
                                class="w-full h-full"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/images/clients/Singapore_Polytechnic_logo.png" alt=""
                                class="w-full h-full"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/images/clients/nus-logo.png" alt=""
                                class="w-full h-full"></span>
                        <span class="bg-white flex rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/images/clients/skechers-logo.png" alt=""
                                class="m-auto"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form Area -->
        <div class="flex-[1.2] flex items-center justify-center p-6 md:p-10">
            <!-- Step 1: User Info -->
            <div id="step-1"
                class="step active bg-white p-12 rounded-3xl shadow-xl shadow-slate-200/50 w-full max-w-md">
                <h2 class="text-3xl font-bold mb-3 text-slate-900">Create 14 days free account</h2>
                <p class="text-slate-500 mb-8">Get started with your free trial today</p>

                <form id="form-step-1" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Full Name</label>
                        <input type="text" name="name"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                            placeholder="John Smith" required>
                        <div class="error-msg" data-error="name"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                            placeholder="john@company.com" required>
                        <div class="error-msg" data-error="email"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Phone Number</label>
                        <input type="tel" id="user_phone" name="phone_full"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                            required>
                        <input type="hidden" name="phone_number" id="phone_actual">
                        <input type="hidden" name="country_code" id="country_code_val">
                        <div class="error-msg" data-error="phone_number"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Password</label>
                        <input type="password" name="password" id="signup_password"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                            placeholder="Create a secure password" required>
                        <div class="error-msg" data-error="password"></div>

                        <div id="password-requirements" class="mt-4 space-y-2" style="display: none;">
                            <div class="requirement-item" data-requirement="min">
                                <span class="dot"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Minimum 8 characters</span>
                            </div>
                            <div class="requirement-item" data-requirement="upper">
                                <span class="dot"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>At least one uppercase letter (A-Z)</span>
                            </div>
                            <div class="requirement-item" data-requirement="lower">
                                <span class="dot"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>At least one lowercase letter (a-z)</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-[#7C69EF] hover:bg-[#6352D1] text-white font-semibold py-4 rounded-xl transition-colors flex items-center justify-center group">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden spinner"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Start Free Trial
                    </button>
                    <p class="text-center text-sm text-slate-500 mt-6">Already have an account? <a href="/website-login"
                            class="text-[#7C69EF] font-bold hover:underline">Sign in</a></p>
                </form>
            </div>

            <!-- Step 2: Business Info -->
            <div id="step-2" class="step bg-white p-12 rounded-3xl shadow-xl shadow-slate-200/50 w-full max-w-md">
                <h2 class="text-3xl font-bold mb-3 text-slate-900">Business Information</h2>
                <p class="text-slate-500 mb-8">Let's set up your workspace</p>

                <form id="form-step-2" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Company Name</label>
                        <input type="text" name="company_name" id="company_name"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                            placeholder="Acme Corp" required>
                        <div class="error-msg" data-error="company_name"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Domain Name</label>
                        <div class="flex">
                            <input type="text" name="domain_name" id="domain_name"
                                class="flex-1 px-4 py-3.5 border border-slate-200 rounded-l-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all border-r-0 text-slate-900"
                                placeholder="acmecorp" required>
                            <span
                                class="bg-slate-50 border border-slate-200 border-l-0 rounded-r-xl px-4 flex items-center text-slate-500 font-medium text-sm">.qwaiting.com</span>
                        </div>
                        <div class="error-msg" data-error="domain_name"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Your Role</label>
                        <select name="role"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all appearance-none bg-no-repeat bg-[right_1rem_center] text-slate-900"
                            style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 fill=%22none%22 viewBox=%220 0 20 20%22%3E%3Cpath stroke=%22%236b7280%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%221.5%22 d=%22m6 8 4 4 4-4%22%2F%3E%3C%2Fsvg%3E');"
                            required>
                            <option value="">Select your role</option>
                            <option value="owner">Owner</option>
                            <option value="manager">Manager</option>
                            <option value="staff">Staff</option>
                            <option value="admin">IT Admin</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Company Website</label>
                        <input type="url" name="website"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                            placeholder="https://acmecorp.com">
                    </div>
                    <div class="flex gap-4 mt-8">
                        <button type="submit"
                            class="flex-[2] bg-[#7C69EF] hover:bg-[#6352D1] text-white font-semibold py-4 rounded-xl transition-colors flex items-center justify-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden spinner"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Centered View for Steps 3-6 -->
    <div id="centered-layout" class="centered-container min-h-screen items-center justify-center p-6 bg-slate-100/50">

        <!-- Step 3: Queue Management -->
        <div id="step-3"
            class="step bg-white p-12 rounded-3xl shadow-2xl shadow-slate-200/50 w-full max-w-3xl text-center">
            <h2 class="text-3xl font-bold mb-3 text-slate-900">How do you manage queues?</h2>
            <p class="text-slate-500 mb-10">Select the option that best describes your needs</p>

            <form id="form-step-3">
                @csrf
                <input type="hidden" name="usage_preference" id="usage_preference_val">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="option-card border-2 border-slate-100 rounded-3xl p-8 cursor-pointer transition-all hover:border-[#7C69EF] hover:bg-[#7C69EF]/5 flex flex-col items-center group"
                        onclick="selectOption('usage_preference', 'Walk-in', this)">
                        <div
                            class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex items-center justify-center mb-5 group-hover:bg-white transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="w-8 h-8">
                                <path d="M13 4a1 1 0 1 0 2 0 1 1 0 1 0-2 0" />
                                <path d="M6 15v-3.5L8 10l2 2 1.5 4.5" />
                                <path d="m14 17-1-3V9l-2-2" />
                                <path d="M8 22V19l3-2" />
                                <path d="m13 22 2-3" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-slate-900">Walk-in</h3>
                        <p class="text-sm text-slate-500 leading-relaxed max-w-[180px]">For visitors arriving without
                            prior booking.</p>
                    </div>
                    <div class="option-card border-2 border-slate-100 rounded-3xl p-8 cursor-pointer transition-all hover:border-[#7C69EF] hover:bg-[#7C69EF]/5 flex flex-col items-center group"
                        onclick="selectOption('usage_preference', 'Appointment', this)">
                        <div
                            class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex items-center justify-center mb-5 group-hover:bg-white transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="w-8 h-8">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                <line x1="16" x2="16" y1="2" y2="6" />
                                <line x1="8" x2="8" y1="2" y2="6" />
                                <line x1="3" x2="21" y1="10" y2="10" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-slate-900">Appointment</h3>
                        <p class="text-sm text-slate-500 leading-relaxed max-w-[180px]">Book a time slot in advance.</p>
                    </div>
                    <div class="option-card border-2 border-slate-100 rounded-3xl p-8 cursor-pointer transition-all hover:border-[#7C69EF] hover:bg-[#7C69EF]/5 flex flex-col items-center group"
                        onclick="selectOption('usage_preference', 'Both', this)">
                        <div
                            class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex items-center justify-center mb-5 group-hover:bg-white transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="w-8 h-8">
                                <rect width="7" height="7" x="3" y="3" rx="1" />
                                <rect width="7" height="7" x="14" y="3" rx="1" />
                                <rect width="7" height="7" x="14" y="14" rx="1" />
                                <rect width="7" height="7" x="3" y="14" rx="1" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-slate-900">Both</h3>
                        <p class="text-sm text-slate-500 leading-relaxed max-w-[180px]">Handle walk-ins and appointments
                            together</p>
                    </div>
                </div>
                <div class="error-msg mb-4" data-error="usage_preference"></div>
                <div class="flex gap-4 max-w-md mx-auto">
                    <button type="submit"
                        class="flex-[2] bg-[#7C69EF] hover:bg-[#6352D1] text-white font-semibold py-4 rounded-xl transition-colors flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden spinner"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Continue
                    </button>
                </div>
            </form>
        </div>

        <!-- Step 4: Industry -->
        <div id="step-4"
            class="step bg-white p-12 rounded-3xl shadow-2xl shadow-slate-200/50 w-full max-w-3xl text-center">
            <h2 class="text-3xl font-bold mb-3 text-slate-900">Which industry best describes your business?</h2>
            <p class="text-slate-500 mb-10">Select the option that fits most closely</p>

            <form id="form-step-4">
                @csrf
                <input type="hidden" name="industry" id="industry_val">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div class="option-card border-2 border-slate-100 rounded-3xl p-8 cursor-pointer transition-all hover:border-[#7C69EF] hover:bg-[#7C69EF]/5 flex flex-col items-center gap-6 group text-center"
                        onclick="selectOption('industry', 'Public Sector', this)">
                        <div
                            class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex-shrink-0 flex items-center justify-center group-hover:bg-white transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="w-8 h-8">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                                <path d="M6 12v5c3 3 9 3 12 0v-5" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-1 text-slate-900">Public Sector</h3>
                            <p class="text-sm text-slate-500">Government, DMV, public services</p>
                        </div>
                    </div>
                    <div class="option-card border-2 border-slate-100 rounded-3xl p-8 cursor-pointer transition-all hover:border-[#7C69EF] hover:bg-[#7C69EF]/5 flex flex-col items-center gap-6 group text-center"
                        onclick="selectOption('industry', 'Retail', this)">
                        <div
                            class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex-shrink-0 flex items-center justify-center group-hover:bg-white transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="w-8 h-8">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-1 text-slate-900">Retail</h3>
                            <p class="text-sm text-slate-500">Stores, banks, service centers</p>
                        </div>
                    </div>
                    <div class="option-card border-2 border-slate-100 rounded-3xl p-8 cursor-pointer transition-all hover:border-[#7C69EF] hover:bg-[#7C69EF]/5 flex flex-col items-center gap-6 group text-center"
                        onclick="selectOption('industry', 'Healthcare', this)">
                        <div
                            class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex-shrink-0 flex items-center justify-center group-hover:bg-white transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="w-8 h-8">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-1 text-slate-900">Healthcare</h3>
                            <p class="text-sm text-slate-500">Clinics, hospitals, medical centers</p>
                        </div>
                    </div>
                    <div class="option-card border-2 border-slate-100 rounded-3xl p-8 cursor-pointer transition-all hover:border-[#7C69EF] hover:bg-[#7C69EF]/5 flex flex-col items-center gap-6 group text-center"
                        onclick="selectOption('industry', 'Other', this)">
                        <div
                            class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex-shrink-0 flex items-center justify-center group-hover:bg-white transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" class="w-8 h-8">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" x2="12" y1="16" y2="12" />
                                <line x1="12" x2="12.01" y1="8" y2="8" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-1 text-slate-900">Other</h3>
                            <p class="text-sm text-slate-500">Custom or mixed-use scenarios</p>
                        </div>
                    </div>
                </div>
                <div class="error-msg mb-4" data-error="industry"></div>
                <div class="flex gap-4 max-w-md mx-auto">
                    <button type="submit"
                        class="flex-[2] bg-[#7C69EF] hover:bg-[#6352D1] text-white font-semibold py-4 rounded-xl transition-colors flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden spinner"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Continue
                    </button>
                </div>
            </form>
        </div>

        <!-- Step 5: Daily Footfall -->
        <div id="step-5"
            class="step bg-white p-12 rounded-3xl shadow-2xl shadow-slate-200/50 w-full max-w-xl text-center">
            <div class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <circle cx="19" cy="11" r="4" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold mb-3 text-slate-900">Footfall Information</h2>
            <p class="text-slate-500 mb-10">How many users visit your location daily?</p>

            <form id="form-step-5" class="space-y-6">
                @csrf
                <div class="text-left text-slate-900">
                    <label class="block text-sm font-semibold mb-3">Select number of daily visitors</label>
                    <select name="footfall"
                        class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all appearance-none bg-no-repeat bg-[right_1rem_center]"
                        style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 fill=%22none%22 viewBox=%220 0 20 20%22%3E%3Cpath stroke=%22%236b7280%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%221.5%22 d=%22m6 8 4 4 4-4%22%2F%3E%3C%2Fsvg%3E');"
                        required>
                        <option value="">Choose an option</option>
                        <option value="0-50">Less than 50</option>
                        <option value="51-100">51 - 100</option>
                        <option value="100-200">100 - 200</option>
                        <option value="200-500">200 - 500</option>
                        <option value="500+">More than 500</option>
                    </select>
                    <div class="error-msg" data-error="footfall"></div>
                </div>
                <div class="flex gap-4">
                    <button type="submit"
                        class="flex-[2] bg-[#7C69EF] hover:bg-[#6352D1] text-white font-semibold py-4 rounded-xl transition-colors flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden spinner"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Continue
                    </button>
                </div>
            </form>
        </div>

        <!-- Step 6: Current Management Solution -->
        <div id="step-6"
            class="step bg-white p-12 rounded-3xl shadow-2xl shadow-slate-200/50 w-full max-w-2xl text-center">
            <div class="w-16 h-16 bg-[#7C69EF]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#7C69EF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8">
                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                    <line x1="16" x2="16" y1="2" y2="6" />
                    <line x1="8" x2="8" y1="2" y2="6" />
                    <line x1="3" x2="21" y1="10" y2="10" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold mb-3 text-slate-900">Current Solution</h2>
            <p class="text-slate-500 mb-10">How do you currently solve this problem?</p>

            <form id="form-step-6">
                @csrf
                <input type="hidden" name="current_solution" id="current_solution_val">
                <div class="space-y-4 mb-10 text-left text-slate-900">
                    <div class="list-option-card border-2 border-slate-100 rounded-2xl p-6 cursor-pointer transition-all hover:border-[#7C69EF] flex items-center gap-5"
                        onclick="selectOption('current_solution', 'Don\'t have a system', this)">
                        <div
                            class="w-6 h-6 border-2 border-slate-200 rounded flex items-center justify-center text-white transition-all check-box">
                            ✓</div>
                        <div>
                            <h3 class="font-bold leading-tight">Don't have a system</h3>
                        </div>
                    </div>
                    <div class="list-option-card border-2 border-slate-100 rounded-2xl p-6 cursor-pointer transition-all hover:border-[#7C69EF] flex items-center gap-5"
                        onclick="selectOption('current_solution', 'Receptionist', this)">
                        <div
                            class="w-6 h-6 border-2 border-slate-200 rounded flex items-center justify-center text-white transition-all check-box">
                            ✓</div>
                        <div>
                            <h3 class="font-bold leading-tight">Receptionist</h3>
                        </div>
                    </div>
                    <div class="list-option-card border-2 border-slate-100 rounded-2xl p-6 cursor-pointer transition-all hover:border-[#7C69EF] flex items-center gap-5"
                        onclick="selectOption('current_solution', 'Pen & Paper', this)">
                        <div
                            class="w-6 h-6 border-2 border-slate-200 rounded flex items-center justify-center text-white transition-all check-box">
                            ✓</div>
                        <div>
                            <h3 class="font-bold leading-tight">Pen & Paper</h3>
                        </div>
                    </div>
                    <div class="list-option-card border-2 border-slate-100 rounded-2xl p-6 cursor-pointer transition-all hover:border-[#7C69EF] flex items-center gap-5"
                        onclick="selectOption('current_solution', 'Other Software', this)">
                        <div
                            class="w-6 h-6 border-2 border-slate-200 rounded flex items-center justify-center text-white transition-all check-box">
                            ✓</div>
                        <div>
                            <h3 class="font-bold leading-tight">Other Software</h3>
                        </div>
                    </div>
                </div>
                <div class="error-msg mb-4" data-error="current_solution"></div>

                <div class="flex gap-4">
                    <button type="submit"
                        class="flex-[2] bg-[#7C69EF] hover:bg-[#6352D1] text-white font-semibold py-4 rounded-xl transition-colors flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden spinner"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Complete Setup
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const stepQueryMap = {
            1: 'basic_info',
            2: 'business_info',
            3: 'usage_preference',
            4: 'industry',
            5: 'daily_footfall',
            6: 'current_solution'
        };

        const queryStepMap = Object.fromEntries(Object.entries(stepQueryMap).map(([k, v]) => [v, parseInt(k)]));

        document.addEventListener('DOMContentLoaded', () => {
            const phoneInput = document.querySelector("#user_phone");

            if (phoneInput) {
                iti = window.intlTelInput(phoneInput, {
                    initialCountry: "in",
                    separateDialCode: true,
                    preferredCountries: ["in", "us", "ae"],
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                });
            }

            // Sync step from URL
            const urlParams = window.location.search.substring(1).split('&')[0];
            const initialStep = queryStepMap[urlParams];
            if (initialStep) {
                goToStep(initialStep, false);
            } else {
                goToStep(1, true);
            }

            // Sync domain name with company name
            const companyNameInput = document.getElementById('company_name');
            const domainNameInput = document.getElementById('domain_name');

            if (companyNameInput && domainNameInput) {
                companyNameInput.addEventListener('input', function () {
                    const value = this.value.toLowerCase()
                        .replace(/[^\w\s-]/g, '') // Remove non-word chars
                        .replace(/[\s_]+/g, '-') // Replace spaces and underscores with -
                        .replace(/^-+|-+$/g, ''); // Trim -
                    domainNameInput.value = value;
                });
            }

            // Password requirements real-time checking
            const passwordInput = document.getElementById('signup_password');
            if (passwordInput) {
                passwordInput.addEventListener('input', function () {
                    const value = this.value;
                    const requirementsDiv = document.getElementById('password-requirements');

                    if (value.length > 0) {
                        requirementsDiv.style.display = 'block';
                    } else {
                        requirementsDiv.style.display = 'none';
                    }

                    const reqs = {
                        min: value.length >= 8,
                        upper: /[A-Z]/.test(value),
                        lower: /[a-z]/.test(value)
                    };

                    for (const [key, isValid] of Object.entries(reqs)) {
                        const el = document.querySelector(`.requirement-item[data-requirement="${key}"]`);
                        if (isValid) el.classList.add('valid');
                        else el.classList.remove('valid');
                    }
                });
            }
        });

        window.onpopstate = () => {
            const urlParams = window.location.search.substring(1).split('&')[0];
            const step = queryStepMap[urlParams] || 1;
            goToStep(step, false);
        };

        function selectOption(type, value, element) {
            const cards = element.parentElement.querySelectorAll('.option-card, .list-option-card');
            cards.forEach(card => {
                card.classList.remove('border-brand', 'bg-brand-light');
                const check = card.querySelector('.check-box');
                if (check) {
                    check.classList.remove('bg-brand', 'border-brand');
                    check.classList.add('border-slate-200');
                }
            });

            element.classList.add('border-brand', 'bg-brand-light');
            const currentCheck = element.querySelector('.check-box');
            if (currentCheck) {
                currentCheck.classList.add('bg-brand', 'border-brand');
                currentCheck.classList.remove('border-slate-200');
            }

            document.getElementById(type + '_val').value = value;
        }

        function goToStep(stepNumber, pushState = true) {
            document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));

            const splitLayout = document.getElementById('split-layout');
            const centeredLayout = document.getElementById('centered-layout');
            const sidebarTitle = document.getElementById('sidebar-dynamic-title');
            const sidebarSubtitle = document.getElementById('sidebar-dynamic-subtitle');
            const sidebarLogo = document.getElementById('sidebar-logo');
            const logoImg = document.getElementById('logo-img');
            const svgIcon = document.getElementById('svg-icon');

            if (stepNumber <= 2) {
                splitLayout.classList.remove('hidden');
                splitLayout.classList.add('flex');
                centeredLayout.classList.remove('active');
            } else {
                splitLayout.classList.add('hidden');
                splitLayout.classList.remove('flex');
                centeredLayout.classList.add('active');
            }

            if (stepNumber === 1) {
                sidebarLogo.classList.remove('hidden');
                logoImg.classList.remove('hidden');
                svgIcon.classList.add('hidden');
            } else {
                sidebarLogo.classList.add('hidden');
                logoImg.classList.add('hidden');
                svgIcon.classList.remove('hidden');
            }

            if (stepNumber === 1) {
                sidebarTitle.innerText = "Try Queue Management System for Free";
                sidebarSubtitle.innerText = "No credit card required. No strings attached.";
            } else if (stepNumber === 2) {
                sidebarTitle.innerText = "Tell us about your business";
                sidebarSubtitle.innerText = "Help us personalize your experience";
            }

            const stepEl = document.getElementById(`step-${stepNumber}`);
            if (stepEl) {
                stepEl.classList.add('active');
            }

            if (pushState) {
                const queryKey = stepQueryMap[stepNumber];
                history.pushState(null, '', '?' + queryKey);
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        async function handleFormSubmit(e, stepNum) {
            e.preventDefault();

            const form = e.target;
            const btn = form.querySelector('button[type="submit"]');
            const spinner = btn.querySelector('.spinner');

            // Step-specific preprocessing
            if (stepNum === 1 && iti) {
                // Get national number to avoid double country code in backend
                const fullNumber = iti.getNumber(); // e.g. +919876543210
                const countryData = iti.getSelectedCountryData();
                const dialCode = '+' + countryData.dialCode;

                // Strip the dial code from the start of the full number
                let national = fullNumber.replace(dialCode, '').replace(/\D/g, '');

                document.getElementById('phone_actual').value = national;
                document.getElementById('country_code_val').value = dialCode;
            }

            // Clear old errors
            form.querySelectorAll('.error-msg').forEach(el => {
                el.innerText = '';
                el.style.display = 'none';
            });

            // Client-side validation
            if (stepNum === 3 && !document.getElementById('usage_preference_val').value) {
                const errEl = form.querySelector('[data-error="usage_preference"]');
                errEl.innerText = 'Please select a queue management option.';
                errEl.style.display = 'block';
                return;
            }
            if (stepNum === 4 && !document.getElementById('industry_val').value) {
                const errEl = form.querySelector('[data-error="industry"]');
                errEl.innerText = 'Please select your industry.';
                errEl.style.display = 'block';
                return;
            }
            if (stepNum === 6 && !document.getElementById('current_solution_val').value) {
                const errEl = form.querySelector('[data-error="current_solution"]');
                errEl.innerText = 'Please select your current setup.';
                errEl.style.display = 'block';
                return;
            }

            btn.disabled = true;
            spinner?.classList.remove('hidden');

            try {
                const response = await fetch(`/signup/step${stepNum}`, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: new FormData(form)
                });

                // Handle validation / session errors
                if (response.status === 403) {
                    Swal.fire('Session Expired', 'Please start signup again.', 'warning')
                        .then(() => window.location.href = '/signup');
                    return;
                }

                if (response.status === 422) {
                    const errorData = await response.json();

                    // Display errors inline
                    for (const [field, messages] of Object.entries(errorData.errors)) {
                        const errorEl = form.querySelector(`[data-error="${field}"]`);
                        if (errorEl) {
                            errorEl.innerText = messages[0];
                            errorEl.style.display = 'block';
                        }
                    }
                    return;
                }

                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}`);
                }

                const data = await response.json();

                if (data.success) {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        goToStep(data.next_step);
                    }
                } else {
                    Swal.fire('Error', data.message || 'Something went wrong', 'error');
                }

            } catch (err) {
                console.error(err);
                Swal.fire('Error', 'Network error. Please try again.', 'error');
            } finally {
                btn.disabled = false;
                spinner?.classList.add('hidden');
            }
        }

        document.getElementById('form-step-1')?.addEventListener('submit', e => handleFormSubmit(e, 1));
        document.getElementById('form-step-2')?.addEventListener('submit', e => handleFormSubmit(e, 2));
        document.getElementById('form-step-3')?.addEventListener('submit', e => handleFormSubmit(e, 3));
        document.getElementById('form-step-4')?.addEventListener('submit', e => handleFormSubmit(e, 4));
        document.getElementById('form-step-5')?.addEventListener('submit', e => handleFormSubmit(e, 5));
        document.getElementById('form-step-6')?.addEventListener('submit', e => handleFormSubmit(e, 6));
    </script>

</body>

</html>