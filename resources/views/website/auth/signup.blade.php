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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Intl-Tel-Input library styles - cannot be replaced with Tailwind */
        .iti {
            width: 100%;
        }
        .iti__flag-container {
            border-radius: 12px 0 0 12px;
        }
        
        /* Step animation - using Tailwind animation utilities */
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
        
        /* Hide scrollbar but keep scrolling functionality */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;  /* Chrome, Safari and Opera */
        }
        
        /* Ensure no body scroll */
        html, body {
            overflow: hidden;
            height: 100%;
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-slate-900 font-sans h-screen">

    <!-- Split View for Step 1 & 2 -->
    <div id="split-layout" class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div
            class="hidden lg:flex flex-1 bg-[#7C69EF] text-white p-16 flex-col relative overflow-hidden">
            <div class="relative z-10 w-full max-w-lg" id="sidebar-content">
                <div class="hidden text-white mb-8" id="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="w-20 h-20 text-white">
                        <path d="M3 21h18" />
                        <path d="M5 21V7l7-4v18" />
                        <path d="M19 21V11l-6-4" />
                        <path d="M9 9h.01" />
                        <path d="M9 12h.01" />
                        <path d="M9 15h.01" />
                        <path d="M9 18h.01" />
                    </svg>
                </div>

                <div id="logo-img" class="mb-8">
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
        <div class="flex-[1.2] overflow-y-auto">
            <div class="flex flex-col items-center justify-start p-6 md:p-10 py-8">
                <!-- Step 1: User Info -->
                <div id="step-1"
                    class="step active bg-white p-12 rounded-3xl shadow-xl shadow-slate-200/50 w-full max-w-md backdrop-blur-sm">
                <h2 class="text-3xl font-bold mb-3 text-slate-900">Create 14 days free account</h2>
                <p class="text-slate-500 mb-8">Get started with your free trial today</p>

                <form id="form-step-1" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900 transition-colors duration-200">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                            placeholder="Enter your full name" >
                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="name"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                            placeholder="Enter your email" >
                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="email"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Phone Number <span class="text-red-500">*</span></label>
                        <!-- Hidden dummy field to prevent email autofill on phone field -->
                        <input type="email" name="email_dummy" autocomplete="off" style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;" tabindex="-1">
                        <input type="tel" id="user_phone" name="phone_full"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                            placeholder="Enter your phone number" autocomplete="tel" readonly onfocus="this.removeAttribute('readonly');">
                        <input type="hidden" name="phone_number" id="phone_actual">
                        <input type="hidden" name="country_code" id="country_code_val">
                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="phone_number"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="signup_password"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                            placeholder="Enter your password" >
                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="password"></div>

                        <div id="password-requirements" class="hidden mt-3 bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-2.5">
                            <div class="requirement-item flex items-center gap-2.5 text-[0.8125rem] text-slate-500 transition-all duration-200 py-1" data-requirement="min">
                                <span class="dot w-1.5 h-1.5 bg-slate-300 rounded-full flex-shrink-0"></span>
                                <svg class="w-4.5 h-4.5 text-green-500 flex-shrink-0 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Minimum 8 characters</span>
                            </div>
                            <div class="requirement-item flex items-center gap-2.5 text-[0.8125rem] text-slate-500 transition-all duration-200 py-1" data-requirement="upper">
                                <span class="dot w-1.5 h-1.5 bg-slate-300 rounded-full flex-shrink-0"></span>
                                <svg class="w-4.5 h-4.5 text-green-500 flex-shrink-0 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>At least one uppercase letter (A-Z)</span>
                            </div>
                            <div class="requirement-item flex items-center gap-2.5 text-[0.8125rem] text-slate-500 transition-all duration-200 py-1" data-requirement="lower">
                                <span class="dot w-1.5 h-1.5 bg-slate-300 rounded-full flex-shrink-0"></span>
                                <svg class="w-4.5 h-4.5 text-green-500 flex-shrink-0 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>At least one lowercase letter (a-z)</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-[#7C69EF] hover:bg-[#6352D1] text-white font-semibold py-4 rounded-xl transition-all duration-200 relative overflow-hidden flex items-center justify-center hover:-translate-y-0.5 hover:shadow-[0_10px_25px_-5px_rgba(124,105,239,0.3)] active:translate-y-0 disabled:opacity-50 disabled:cursor-not-allowed">
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
                <div id="step-2" class="step bg-white p-12 rounded-3xl shadow-xl shadow-slate-200/50 w-full max-w-md backdrop-blur-sm">
                <h2 class="text-3xl font-bold mb-3 text-slate-900">Business Information</h2>
                <p class="text-slate-500 mb-8">Let's set up your workspace</p>

                <form id="form-step-2" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Company Name <span class="text-red-500">*</span></label>
                        <input type="text" name="company_name" id="company_name"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                            placeholder="Enter your company name" >
                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="company_name"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Domain Name <span class="text-red-500">*</span></label>
                        <div class="flex">
                            <input type="text" name="domain_name" id="domain_name"
                                class="flex-1 px-4 py-3.5 border border-slate-200 rounded-l-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all border-r-0 text-slate-900"
                                placeholder="Enter your domain name" >
                            <span
                                class="bg-slate-50 border border-slate-200 border-l-0 rounded-r-xl px-4 flex items-center text-slate-500 font-medium text-sm">.qwaiting.com</span>
                        </div>
                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="domain_name"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-900">Your Role <span class="text-red-500">*</span></label>
                        <select name="role"
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 appearance-none bg-no-repeat bg-[right_1rem_center] text-slate-900"
                            style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 fill=%22none%22 viewBox=%220 0 20 20%22%3E%3Cpath stroke=%22%236b7280%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%221.5%22 d=%22m6 8 4 4 4-4%22%2F%3E%3C%2Fsvg%3E');"
                            >
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
                            class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                            placeholder="Enter your company website url">
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
    </div>

    <!-- Centered View for Steps 3-6 -->
    <div id="centered-layout" class="centered-container h-screen overflow-y-auto flex items-center justify-center p-6 bg-slate-100/50">

        <!-- Step 3: Queue Management -->
            <div id="step-3"
                class="step bg-white p-12 rounded-3xl shadow-2xl shadow-slate-200/50 w-full max-w-3xl text-center backdrop-blur-sm">
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
                <div class="hidden text-red-500 text-xs font-medium mb-4" data-error="usage_preference"></div>
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
                class="step bg-white p-12 rounded-3xl shadow-2xl shadow-slate-200/50 w-full max-w-3xl text-center backdrop-blur-sm">
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
                <div class="hidden text-red-500 text-xs font-medium mb-4" data-error="industry"></div>
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
                class="step bg-white p-12 rounded-3xl shadow-2xl shadow-slate-200/50 w-full max-w-xl text-center backdrop-blur-sm">
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
                    <label class="block text-sm font-semibold mb-3">Select number of daily visitors <span class="text-red-500">*</span></label>
                    <select name="footfall"
                        class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 appearance-none bg-no-repeat bg-[right_1rem_center] text-slate-900"
                        style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 fill=%22none%22 viewBox=%220 0 20 20%22%3E%3Cpath stroke=%22%236b7280%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%221.5%22 d=%22m6 8 4 4 4-4%22%2F%3E%3C%2Fsvg%3E');"
                        >
                        <option value="">Choose an option</option>
                        <option value="0-50">Less than 50</option>
                        <option value="51-100">51 - 100</option>
                        <option value="100-200">100 - 200</option>
                        <option value="200-500">200 - 500</option>
                        <option value="500+">More than 500</option>
                    </select>
                    <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="footfall"></div>
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
                <div class="hidden text-red-500 text-xs font-medium mb-4" data-error="current_solution"></div>

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
        // Step mapping configuration
        const stepQueryMap = {1: 'basic_info', 2: 'business_info', 3: 'usage_preference', 4: 'industry', 5: 'daily_footfall', 6: 'current_solution'};
        const queryStepMap = Object.fromEntries(Object.entries(stepQueryMap).map(([k, v]) => [v, parseInt(k)]));

        // Initialize on page load
        $(document).ready(function() {
            // Initialize phone input
            const $phoneInput = $("#user_phone");
            if ($phoneInput.length) {
                // Clear any auto-filled value before initializing
                $phoneInput.val('');
                
                iti = window.intlTelInput($phoneInput[0], {
                    initialCountry: "in", separateDialCode: true, preferredCountries: ["in", "us", "ae"],
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                });
                
                // Clear any auto-filled value after initialization (browsers sometimes fill after init)
                setTimeout(function() {
                    const currentValue = $phoneInput.val();
                    // Check if the value looks like an email (contains @)
                    if (currentValue && currentValue.includes('@')) {
                        $phoneInput.val('');
                        if (iti) {
                            iti.setNumber('');
                        }
                    }
                }, 100);
                
                // Also clear on focus if it contains @
                $phoneInput.on('focus', function() {
                    const val = $(this).val();
                    if (val && val.includes('@')) {
                        $(this).val('');
                        if (iti) {
                            iti.setNumber('');
                        }
                    }
                });
                
                // Prevent non-numeric keypress
                $phoneInput.on('keypress', function(e) {
                    // Allow: backspace, delete, tab, escape, enter, and special keys
                    if ([8, 9, 27, 13, 46].indexOf(e.keyCode) !== -1 ||
                        // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                        (e.keyCode === 65 && e.ctrlKey === true) ||
                        (e.keyCode === 67 && e.ctrlKey === true) ||
                        (e.keyCode === 86 && e.ctrlKey === true) ||
                        (e.keyCode === 88 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
                
                // Prevent non-numeric input (only allow digits) - backup validation
                $phoneInput.on('input', function(e) {
                    const input = this;
                    const originalValue = input.value;
                    // Remove any non-digit characters
                    const numericValue = originalValue.replace(/\D/g, '');
                    
                    if (originalValue !== numericValue) {
                        // If value changed, update it
                        const cursorPosition = input.selectionStart;
                        input.value = numericValue;
                        
                        // Restore cursor position (adjust for removed characters)
                        const removedChars = originalValue.length - numericValue.length;
                        const newPosition = Math.max(0, cursorPosition - removedChars);
                        input.setSelectionRange(newPosition, newPosition);
                        
                        // Update intlTelInput with the numeric value
                        if (iti) {
                            iti.setNumber(numericValue);
                        }
                    }
                });
                
                // Prevent paste of non-numeric content
                $phoneInput.on('paste', function(e) {
                    e.preventDefault();
                    const pastedText = (e.originalEvent.clipboardData || window.clipboardData).getData('text');
                    const numericText = pastedText.replace(/\D/g, '');
                    if (numericText) {
                        if (iti) {
                            iti.setNumber(numericText);
                        } else {
                            $(this).val(numericText);
                        }
                    }
                });
            }

            // Sync step from URL or default to step 1
            const urlParam = window.location.search.substring(1).split('&')[0];
            goToStep(queryStepMap[urlParam] || 1, !queryStepMap[urlParam]);

            // Auto-sync domain name with company name
            $('#company_name').on('input', function() {
                $('#domain_name').val($(this).val().toLowerCase().replace(/[^\w\s-]/g, '').replace(/[\s_]+/g, '-').replace(/^-+|-+$/g, ''));
            });

            // Password requirements checker - show only on focus
            const $passwordInput = $('#signup_password');
            const $passwordRequirements = $('#password-requirements');
            
            $passwordInput.on('focus', function() {
                $passwordRequirements.removeClass('hidden');
            });
            
            $passwordInput.on('blur', function() {
                // Always hide when focus leaves password field
                $passwordRequirements.addClass('hidden');
            });
            
            // Real-time validation on input (only when field is focused)
            $passwordInput.on('input', function() {
                const val = $(this).val();
                $.each({min: val.length >= 8, upper: /[A-Z]/.test(val), lower: /[a-z]/.test(val)}, function(key, isValid) {
                    const $item = $(`.requirement-item[data-requirement="${key}"]`);
                    $item.toggleClass('text-green-500', isValid).toggleClass('text-slate-500', !isValid);
                    $item.find('svg').toggleClass('hidden', !isValid);
                    $item.find('.dot').toggleClass('hidden', isValid);
                });
            });
        });

        // Handle browser back/forward
        $(window).on('popstate', () => goToStep(queryStepMap[window.location.search.substring(1).split('&')[0]] || 1, false));

        // Select option card
        function selectOption(type, value, element) {
            const $el = $(element);
            // Find the container - could be parent or closest container with cards
            let $container = $el.closest('form').find('.grid, .space-y-4').first();
            if ($container.length === 0) {
                $container = $el.parent();
            }
            
            // Remove selected state from all cards in the container
            $container.find('.option-card, .list-option-card').each(function() {
                const $card = $(this);
                // Remove purple border and background, restore default border
                $card.removeClass('border-[#7C69EF] bg-[#7C69EF]/5 bg-[rgba(124,105,239,0.05)]');
                $card.addClass('border-slate-100');
                // Reset icon background for option cards (steps 3 & 4) - target the icon container div
                $card.find('div.w-16.h-16').removeClass('bg-white').addClass('bg-[#7C69EF]/10');
                // Reset checkbox for list cards (step 6)
                $card.find('.check-box').removeClass('bg-[#7C69EF] border-[#7C69EF]').addClass('border-slate-200');
            });
            
            // Add selected state to clicked card
            $el.removeClass('border-slate-100');
            $el.addClass('border-[#7C69EF] bg-[#7C69EF]/5');
            // Update icon background for option cards (steps 3 & 4)
            $el.find('div.w-16.h-16').removeClass('bg-[#7C69EF]/10').addClass('bg-white');
            // Update checkbox for list cards (step 6)
            $el.find('.check-box').addClass('bg-[#7C69EF] border-[#7C69EF]').removeClass('border-slate-200');
            
            $('#' + type + '_val').val(value);
        }

        // Navigate to step
        function goToStep(step, pushState = true) {
            $('.step').removeClass('active');
            
            // Show/hide layouts based on step
            if (step <= 2) {
                $('#split-layout').removeClass('hidden').addClass('flex');
                $('#centered-layout').removeClass('active');
            } else {
                $('#split-layout').addClass('hidden').removeClass('flex');
                $('#centered-layout').addClass('active');
            }
            
            // Update sidebar content
            if (step === 1) {
                $('#sidebar-logo, #logo-img').removeClass('hidden');
                $('#svg-icon').addClass('hidden');
            } else {
                $('#sidebar-logo, #logo-img').addClass('hidden');
                $('#svg-icon').removeClass('hidden');
                if (step === 2) {
                    $('#sidebar-dynamic-title').text("Tell us about your business");
                    $('#sidebar-dynamic-subtitle').text("Help us personalize your experience");
                }
            }
            
            $('#step-' + step).addClass('active');
            if (pushState) history.pushState(null, '', '?' + stepQueryMap[step]);
            $('html, body').animate({scrollTop: 0}, 'smooth');
        }

        // Form submission handler
        function handleFormSubmit(e) {
            e.preventDefault();
            const $form = $(e.target);
            const stepNum = parseInt($form.attr('id').replace('form-step-', ''));
            if (!stepNum || stepNum < 1 || stepNum > 6) return console.error('Invalid form step');

            const $btn = $form.find('button[type="submit"]'), $spinner = $btn.find('.spinner');
            
            // Preprocess data
            if (stepNum === 1 && iti) {
                const data = iti.getSelectedCountryData(), dialCode = '+' + data.dialCode;
                $('#phone_actual').val(iti.getNumber().replace(dialCode, '').replace(/\D/g, ''));
                $('#country_code_val').val(dialCode);
            }
            if (stepNum === 2) {
                const $domain = $('#domain_name'), val = $domain.val();
                if (val && !val.endsWith('.qwaiting.com')) $domain.val(val.toLowerCase().replace(/\s+/g, '-') + '.qwaiting.com');
            }

            $form.find('[data-error]').text('').addClass('hidden');
            $btn.prop('disabled', true).find('.spinner').removeClass('hidden');

            $.ajax({
                url: '/signup/step' + stepNum,
                method: 'POST',
                data: new FormData($form[0]),
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'Accept': 'application/json'},
                success: function(data) {
                    if (data.success) {
                        data.redirect ? window.location.href = data.redirect : goToStep(data.next_step);
                    } else {
                        Swal.fire('Error', data.message || 'Something went wrong', 'error');
                    }
                },
                error: function(xhr) {
                    const errorData = xhr.responseJSON || {};
                    if (xhr.status === 422) {
                        $.each(errorData.errors || {}, (field, messages) => $form.find('[data-error="' + field + '"]').text(messages[0]).removeClass('hidden'));
                    } else if (xhr.status === 403) {
                        Swal.fire({title: 'Session Expired', text: errorData.message || 'Please start signup again.', icon: 'warning', confirmButtonText: 'OK'})
                            .then(() => window.location.href = '/signup');
                    } else {
                        Swal.fire('Error', errorData.message || 'HTTP ' + xhr.status, 'error');
                    }
                },
                complete: () => $btn.prop('disabled', false).find('.spinner').addClass('hidden')
            });
        }

        $(document).on('submit', 'form[id^="form-step-"]', handleFormSubmit);
    </script>

</body>

</html>