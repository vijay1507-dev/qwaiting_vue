<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Qwaiting</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Intl-Tel-Input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Intl-Tel-Input library styles - cannot be replaced with Tailwind */
        .iti {
            width: 100% !important;
            position: relative !important;
        }

        .iti__flag-container {
            border-radius: 12px 0 0 12px !important;
            cursor: pointer !important;
            pointer-events: auto !important;
            position: relative !important;
            z-index: 2 !important;
            background-color: white !important;
            border: 1px solid #e2e8f0 !important;
            border-right: none !important;
            height: 100% !important;
        }

        .iti__selected-flag {
            cursor: pointer !important;
            pointer-events: auto !important;
            z-index: 2 !important;
            padding: 0 8px 0 12px !important;
            height: 100% !important;
            display: flex !important;
            align-items: center !important;
            background: transparent !important;
        }

        .iti__selected-flag:hover {
            background-color: #f8fafc !important;
        }

        .iti__selected-flag:focus {
            outline: none !important;
        }

        .iti__arrow {
            margin-left: 6px !important;
            border-top: 4px solid #64748b !important;
        }

        .iti__country-list {
            z-index: 99999 !important;
            max-height: 200px !important;
            overflow-y: auto !important;
            position: absolute !important;
            width: 100% !important;
            min-width: 400px !important;
            max-width: 100% !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
            border-radius: 12px !important;
            margin-top: 4px !important;
            background: white !important;
            left: 0 !important;
            right: 0 !important;
            box-sizing: border-box !important;
        }

        /* When dropdown is appended to body, calculate width from the input */
        body>.iti__country-list {
            width: var(--iti-dropdown-width, 100%) !important;
        }

        /* Style the phone input to match the design */
        #user_phone {
            position: relative !important;
            border-radius: 0 12px 12px 0 !important;
            border-left: none !important;
            padding-left: 12px !important;
            height: 3.5rem !important;
        }

        #user_phone:focus {
            border-left: none !important;
            border-color: #7C69EF !important;
        }

        /* Ensure the iti wrapper matches the input styling */
        .iti--separate-dial-code #user_phone {
            padding-left: 12px !important;
        }

        /* Make sure the iti wrapper has proper display */
        .iti {
            display: flex !important;
            align-items: stretch !important;
        }

        /* Override any overflow hidden that might clip the dropdown */
        .step.active {
            overflow: visible !important;
        }

        #form-step-1 {
            overflow: visible !important;
        }

        /* Ensure flag container and input are aligned and same height */
        .iti__flag-container {
            height: 3.5rem !important;
            display: flex !important;
            align-items: center !important;
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
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari and Opera */
        }

        /* Ensure no body scroll */
        html,
        body {
            overflow: hidden;
            height: 100%;
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-slate-900 font-sans h-screen">

    <!-- Split View for Step 1 & 2 -->
    <div id="split-layout" class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden lg:flex flex-1 bg-[#7C69EF] text-white p-16 flex-col relative overflow-hidden">
            <div class="relative z-10 w-full max-w-lg" id="sidebar-content">
                <div class="hidden text-white mb-8" id="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-20 h-20 text-white">
                        <path d="M3 21h18" />
                        <path d="M5 21V7l7-4v18" />
                        <path d="M19 21V11l-6-4" />
                        <path d="M9 9h.01" />
                        <path d="M9 12h.01" />
                        <path d="M9 15h.01" />
                        <path d="M9 18h.01" />
                    </svg>
                </div>

                <div id="logo-img" class="mb-4">
                    <img src="https://qwaiting.com/images/qwaiting-logo.svg" alt="">
                </div>
                <h1 id="sidebar-dynamic-title"
                    class="text-4xl font-bold leading-tight mb-6 transition-all duration-300">Try Queue Management
                    System for Free</h1>
                <p id="sidebar-dynamic-subtitle" class="text-lg opacity-90 mb-10 transition-all duration-300">No credit
                    card required. No strings attached.</p>

                <div class="logo hidden" id="sidebar-logo">
                    <p class="text-sm opacity-70 mb-4">Trusted by 65K+ customers</p>
                    <div class="grid grid-cols-3 gap-4">
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt=""
                                class="w-full h-full object-contain"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/frontimg/clients/ministry_of_hajj_and_umrah.jpg" alt=""
                                class="w-full h-full object-contain"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/frontimg/clients/tatapwer_ddl.jpg" alt=""
                                class="w-full h-full object-contain"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/images/clients/Singapore_Polytechnic_logo.png" alt=""
                                class="w-full h-full object-contain"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/images/clients/nus-logo.png" alt=""
                                class="w-full h-full object-contain"></span>
                        <span class="bg-white p-4 rounded-lg text-sm font-medium w-30 h-20"><img
                                src="https://qwaiting.com/images/clients/skechers-logo.png" alt=""
                                class="w-full h-full object-contain"></span>
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
                    <div id="step-1-header">
                        @php
                        $headerTitle = 'Create 14 days free account';
                        $showSubheading = true;
                        if(isset($packages) && isset($preselected_package_id)) {
                        $selectedPkg = collect($packages)->firstWhere('id', $preselected_package_id);
                        if($selectedPkg) {
                        $pkgName = strtolower($selectedPkg['name']);
                        if(str_contains($pkgName, 'business') || str_contains($pkgName, 'enterprise')) {
                        $headerTitle = 'Create your account to get started';
                        $showSubheading = false;
                        }
                        }
                        }
                        @endphp
                        <h2 class="text-3xl font-bold mb-3 text-slate-900">{{ $headerTitle }}</h2>
                        @if($showSubheading)
                        <p class="text-slate-500 mb-8">Get started with your free trial today</p>
                        @endif
                    </div>

                    @if(session('verified'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm"
                        id="verification-success-message">
                        {{ session('verified') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Email Verification Message (shown after form submission) -->
                    <div id="email-verification-section" class="hidden text-center">
                        <!-- Animated Email Icon -->
                        <div
                            class="mx-auto flex items-center justify-center h-20 w-20 rounded-2xl bg-gradient-to-br from-[#7C69EF] to-[#9B8AF5] mb-8 shadow-lg shadow-[#7C69EF]/20">
                            <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <!-- Title -->
                        <h2 class="text-3xl font-bold text-slate-900 mb-3 tracking-tight">Check Your Email</h2>

                        <!-- Message -->
                        <p class="text-slate-600 mb-2 text-lg">
                            We've sent a verification link to
                        </p>
                        <p id="verification-email-display" class="text-[#7C69EF] font-semibold text-lg mb-8 break-all">
                            {{ $email ?? 'your email address' }}
                        </p>

                        <!-- Info Box -->
                        <div
                            class="bg-gradient-to-r from-[#7C69EF]/5 to-[#9B8AF5]/5 border border-[#7C69EF]/10 rounded-2xl p-5 mb-8">
                            <p class="text-slate-700 text-sm leading-relaxed">
                                Click the verification link in your email to continue with your signup.
                                <span class="font-semibold text-slate-900">The link expires in 60 minutes.</span>
                            </p>
                        </div>

                        <!-- Action Button -->
                        <button id="resend-email-btn"
                            class="w-full px-6 py-4 bg-gradient-to-r from-[#7C69EF] to-[#9B8AF5] hover:from-[#6B5BDF] hover:to-[#8B7AE5] text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-[#7C69EF]/25 hover:shadow-xl hover:shadow-[#7C69EF]/30 transform hover:-translate-y-0.5 mb-4">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Resend Verification Email
                            </span>
                        </button>

                        <!-- Status Message -->
                        <div id="verification-status-message" class="hidden mt-4 p-4 rounded-xl text-sm font-medium">
                        </div>
                    </div>

                    <form id="form-step-1" class="space-y-5">
                        @csrf
                        <div>
                            <label
                                class="block text-sm font-semibold mb-2 text-slate-900 transition-colors duration-200">Full
                                Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="signup_name"
                                class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                                placeholder="Enter your full name" value="">
                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="name"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-900">Email <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" id="signup_email"
                                class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                                placeholder="Enter your email" value="{{ $email ?? '' }}">
                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="email"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-900">Phone Number <span
                                    class="text-red-500">*</span></label>
                            <!-- Hidden dummy field to prevent email autofill on phone field -->
                            <input type="email" name="email_dummy" autocomplete="off"
                                style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;"
                                tabindex="-1">
                            <input type="tel" id="user_phone" name="phone_full"
                                class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                                placeholder="Enter your phone number" autocomplete="tel">
                            <input type="hidden" name="phone_number" id="phone_actual">
                            <input type="hidden" name="country_code" id="country_code_val">
                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="phone_number"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-900">Password <span
                                    class="text-red-500">*</span></label>
                            <input type="password" name="password" id="signup_password"
                                class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                                placeholder="Enter your password">
                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="password"></div>

                            <div id="password-requirements"
                                class="hidden mt-3 bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-2.5">
                                <div class="requirement-item flex items-center gap-2.5 text-[0.8125rem] text-slate-500 transition-all duration-200 py-1"
                                    data-requirement="min">
                                    <span class="dot w-1.5 h-1.5 bg-slate-300 rounded-full flex-shrink-0"></span>
                                    <svg class="w-4 h-4 text-green-500 flex-shrink-0 hidden"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Minimum 8 characters</span>
                                </div>
                                <div class="requirement-item flex items-center gap-2.5 text-[0.8125rem] text-slate-500 transition-all duration-200 py-1"
                                    data-requirement="upper">
                                    <span class="dot w-1.5 h-1.5 bg-slate-300 rounded-full flex-shrink-0"></span>
                                    <svg class="w-4 h-4 text-green-500 flex-shrink-0 hidden"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>At least one uppercase letter (A-Z)</span>
                                </div>
                                <div class="requirement-item flex items-center gap-2.5 text-[0.8125rem] text-slate-500 transition-all duration-200 py-1"
                                    data-requirement="lower">
                                    <span class="dot w-1.5 h-1.5 bg-slate-300 rounded-full flex-shrink-0"></span>
                                    <svg class="w-4 h-4 text-green-500 flex-shrink-0 hidden"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
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
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Start Free Trial
                        </button>
                        <p class="text-center text-sm text-slate-500 mt-6">Already have an account? <a
                                href="/website-login" class="text-[#7C69EF] font-bold hover:underline">Sign in</a></p>

                        <!-- Social Login Section -->
                        <div class="mt-6">
                            <div class="flex items-center my-6">
                                <div class="flex-1 h-px bg-slate-200"></div>
                                <span class="px-4 text-sm text-slate-500">Or continue with</span>
                                <div class="flex-1 h-px bg-slate-200"></div>
                            </div>

                            <div class="flex gap-3">
                                <a href="{{ route('auth.google') }}"
                                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3 border-2 border-slate-200 rounded-xl bg-white text-slate-900 font-semibold text-sm transition-all duration-200 hover:border-[#7C69EF] hover:bg-[#7C69EF]/5">
                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="#4285F4"
                                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                        <path fill="#34A853"
                                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                        <path fill="#FBBC05"
                                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                        <path fill="#EA4335"
                                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                    </svg>
                                    <span>Google</span>
                                </a>

                                <!-- <a href="{{ route('auth.microsoft') }}" 
                               class="flex-1 flex items-center justify-center gap-2 px-4 py-3 border-2 border-slate-200 rounded-xl bg-white text-slate-900 font-semibold text-sm transition-all duration-200 hover:border-[#7C69EF] hover:bg-[#7C69EF]/5">
                                <svg width="20" height="20" viewBox="0 0 23 23" fill="none">
                                    <path fill="#F25022" d="M0 0h11v11H0z"/>
                                    <path fill="#00A4EF" d="M12 0h11v11H12z"/>
                                    <path fill="#7FBA00" d="M0 12h11v11H0z"/>
                                    <path fill="#FFB900" d="M12 12h11v11H12z"/>
                                </svg>
                                <span>Microsoft</span>
                            </a> -->
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 2: Business Info -->
                <div id="step-2"
                    class="step bg-white p-12 rounded-3xl shadow-xl shadow-slate-200/50 w-full max-w-md backdrop-blur-sm">
                    <h2 class="text-3xl font-bold mb-3 text-slate-900">Business Information</h2>
                    <p class="text-slate-500 mb-8">Let's set up your workspace</p>

                    <form id="form-step-2" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-900">Company Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="company_name" id="company_name"
                                class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all text-slate-900"
                                placeholder="Enter your company name" value="{{ $company_name ?? '' }}">
                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="company_name"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-900">Domain Name <span
                                    class="text-red-500">*</span></label>
                            <div class="flex">
                                <input type="text" name="domain_name" id="domain_name"
                                    class="flex-1 px-4 py-3.5 border border-slate-200 rounded-l-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all border-r-0 text-slate-900"
                                    placeholder="Enter your domain name" value="{{ $domain_name ?? '' }}">
                                <span
                                    class="bg-slate-50 border border-slate-200 border-l-0 rounded-r-xl px-4 flex items-center text-slate-500 font-medium text-sm">.qwaiting.com</span>
                            </div>
                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="domain_name"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-900">Your Role <span
                                    class="text-red-500">*</span></label>
                            <select name="role"
                                class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 appearance-none bg-no-repeat bg-[right_1rem_center] text-slate-900"
                                style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 fill=%22none%22 viewBox=%220 0 20 20%22%3E%3Cpath stroke=%22%236b7280%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%221.5%22 d=%22m6 8 4 4 4-4%22%2F%3E%3C%2Fsvg%3E');">
                                <option value="" disabled {{ !isset($role) ? 'selected' : '' }}>Select your role
                                </option>
                                <option value="owner" {{ (isset($role) && $role === 'owner') || !isset($role) ? 'selected' : '' }}>Owner</option>
                                <option value="manager" {{ (isset($role) && $role === 'manager') ? 'selected' : '' }}>
                                    Manager</option>
                                <option value="staff" {{ (isset($role) && $role === 'staff') ? 'selected' : '' }}>Staff
                                </option>
                                <option value="admin" {{ (isset($role) && $role === 'admin') ? 'selected' : '' }}>IT Admin
                                </option>
                                <option value="other" {{ (isset($role) && $role === 'other') ? 'selected' : '' }}>Other
                                </option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2 text-slate-900">Company Website</label>
                            <input type="text" name="website"
                                class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 text-slate-900"
                                placeholder="Enter your company website url" value="{{ $website ?? '' }}">
                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="website"></div>
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
    <div id="centered-layout"
        class="centered-container h-screen overflow-y-auto flex items-center justify-center p-6 bg-slate-100/50">

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
                    <label class="block text-sm font-semibold mb-3">Select number of daily visitors <span
                            class="text-red-500">*</span></label>
                    <select name="footfall"
                        class="w-full px-4 py-3.5 border border-slate-200 rounded-xl focus:outline-none focus:border-[#7C69EF] focus:ring-4 focus:ring-[#7C69EF]/10 transition-all duration-200 hover:border-slate-300 appearance-none bg-no-repeat bg-[right_1rem_center] text-slate-900"
                        style="background-image: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 fill=%22none%22 viewBox=%220 0 20 20%22%3E%3Cpath stroke=%22%236b7280%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%221.5%22 d=%22m6 8 4 4 4-4%22%2F%3E%3C%2Fsvg%3E');">
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
                        Continue to Checkout
                    </button>
                </div>
            </form>
        </div>

        <!-- Step 7: Checkout & Payment -->
        <div id="step-7"
            class="step w-full max-w-6xl mx-auto text-center p-4 mt-[120px] hidden">

            <form id="form-step-7">
                @csrf
                <input type="hidden" name="package_id" id="selected_package_id" value="{{ $preselected_package_id }}">
                <input type="hidden" name="billing_cycle" id="selected_billing_cycle" value="{{ $selectedBillingCycle }}">
                @if(isset($selectedPackage))
                <input type="hidden" id="selected-pkg-price-monthly" value="{{ $selectedPackage['monthly_price'] ?? 0 }}">
                <input type="hidden" id="selected-pkg-price-annual" value="{{ $selectedPackage['annual_price'] ?? 0 }}">
                @endif

                @if($hasSelectedPackage && $selectedPackage && $lead)
                <!-- Checkout Summary Card -->
                <!-- Professional Checkout Summary Card -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 mb-0">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <!-- Left Side: User Details (6 columns) -->
                        <div class="lg:col-span-1 p-6">
                            @php
                            $pkgStartDate = \Carbon\Carbon::now();
                            $pkgTrialDays = $selectedPackage['trial_days'] ?? 0;
                            if ($pkgTrialDays > 0) {
                            $pkgEndDate = $pkgStartDate->copy()->addDays($pkgTrialDays);
                            $dateLabel = "Trial Period ({$pkgTrialDays} Days)";
                            } else {
                            $pkgEndDate = $selectedBillingCycle === 'monthly' ? $pkgStartDate->copy()->addMonth() : $pkgStartDate->copy()->addYear();
                            $dateLabel = "Subscription Period";
                            }
                            @endphp

                            <!-- Customer Information Section -->
                            <div class="mb-8">
                                <h4 class="flex items-center gap-2 font-bold text-slate-900 mb-6">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Customer Information
                                </h4>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                                    <div>
                                        <label class="block text-sm text-slate-500 mb-1">Full Name</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-fullname">{{ $lead->name ?? 'N/A' }}</p>
                                    </div>
                                    @if($lead->company_name)
                                    <div>
                                        <label class="block text-sm text-slate-500 mb-1">Company Name</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-company">{{ $lead->company_name }}</p>
                                    </div>
                                    @endif
                                    <div>
                                        <label class="block text-sm text-slate-500 mb-1">Email Address</label>
                                        <p class="font-semibold text-slate-900 text-[15px] break-all" id="summary-email">{{ $lead->email ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm text-slate-500 mb-1">Phone Number</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-phone">{{ $lead->country_code ?? '' }} {{ $lead->phone_number ?? 'N/A' }}</p>
                                    </div>
                                    @if($lead->domain_name)
                                    <div class="sm:col-span-2">
                                        <label class="block text-sm text-slate-500 mb-1">Domain Name</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-domain">{{ $lead->domain_name }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Business Details Section -->
                            <div>
                                <h4 class="flex items-center gap-2 font-bold text-slate-900 mb-6">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    Business Details
                                </h4>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                                    @if($lead->usage_preference)
                                    <div class="summary-item" id="container-usage-preference">
                                        <label class="block text-sm text-slate-500 mb-1">Usage Preference</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-usage-preference">{{ $lead->usage_preference }}</p>
                                    </div>
                                    @else
                                    <div class="summary-item hidden" id="container-usage-preference">
                                        <label class="block text-sm text-slate-500 mb-1">Usage Preference</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-usage-preference"></p>
                                    </div>
                                    @endif

                                    @if($lead->industry)
                                    <div class="summary-item" id="container-industry">
                                        <label class="block text-sm text-slate-500 mb-1">Industry</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-industry">{{ $lead->industry }}</p>
                                    </div>
                                    @else
                                    <div class="summary-item hidden" id="container-industry">
                                        <label class="block text-sm text-slate-500 mb-1">Industry</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-industry"></p>
                                    </div>
                                    @endif

                                    @if($lead->footfall)
                                    <div class="summary-item" id="container-footfall">
                                        <label class="block text-sm text-slate-500 mb-1">Daily Footfall</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-footfall">{{ $lead->footfall }}</p>
                                    </div>
                                    @else
                                    <div class="summary-item hidden" id="container-footfall">
                                        <label class="block text-sm text-slate-500 mb-1">Daily Footfall</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-footfall"></p>
                                    </div>
                                    @endif

                                    @if($lead->current_solution)
                                    <div class="summary-item" id="container-current-solution">
                                        <label class="block text-sm text-slate-500 mb-1">Current Solution</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-current-solution">{{ $lead->current_solution }}</p>
                                    </div>
                                    @else
                                    <div class="summary-item hidden" id="container-current-solution">
                                        <label class="block text-sm text-slate-500 mb-1">Current Solution</label>
                                        <p class="font-semibold text-slate-900 text-[15px]" id="summary-current-solution"></p>
                                    </div>
                                    @endif

                                    <!-- Package Dates -->
                                    <div>
                                        <label class="block text-sm text-slate-500 mb-1">Package Start</label>
                                        <p class="font-semibold text-slate-900 text-[15px]">{{ $pkgStartDate->format('d M, Y') }}</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm text-slate-500 mb-1">Package End</label>
                                        <p class="font-semibold text-slate-900 text-[15px]">{{ $pkgEndDate->format('d M, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Order Summary (6 columns) -->
                        <div class="lg:col-span-1 bg-slate-50 p-6 border-l border-slate-100 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    Order Summary
                                </h3>

                                <!-- Selected Package Card -->
                                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200 mb-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h4 class="text-base font-bold text-slate-900">{{ $selectedPackage['name'] }}</h4>
                                            @if($selectedPackage['subtitle'])
                                            <p class="text-xs text-slate-500">{{ $selectedPackage['subtitle'] }}</p>
                                            @endif
                                        </div>
                                        <span class="bg-primary/10 text-primary text-xs font-bold px-2 py-1 rounded-full uppercase tracking-wide">Selected</span>
                                    </div>

                                    @php
                                    $displayPrice = $selectedBillingCycle === 'monthly'
                                    ? $selectedPackage['monthly_price']
                                    : $selectedPackage['annual_price'];
                                    $billingLabel = $selectedBillingCycle === 'monthly' ? 'Monthly Plan' : 'Annual Plan';
                                    $billingPeriod = $selectedBillingCycle === 'monthly' ? '/mo' : '/yr';
                                    @endphp

                                    <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center">
                                        <span class="text-sm font-medium text-slate-600">{{ $billingLabel }}</span>
                                        <div class="text-right flex gap-1">
                                            <span class="block text-base font-bold text-slate-900">
                                                @if($displayPrice)
                                                ${{ number_format($displayPrice, 2) }}
                                                @else
                                                Free
                                                @endif
                                            </span>
                                            <span class="text-lg text-slate-400">{{ $billingPeriod }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Detailed Breakdown -->
                                @php
                                $sessionCoupon = session('selected_coupon');
                                $hasCoupon = !empty($sessionCoupon);
                                $discountAmount = $hasCoupon ? $sessionCoupon['discount_amount'] : 0;
                                $finalPrice = $hasCoupon ? max(0, ($displayPrice - $discountAmount)) : $displayPrice;
                                @endphp
                                <div class="space-y-3 mb-2">
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-slate-500">Subtotal</span>
                                        <span class="font-medium text-slate-900" id="summary-subtotal">${{ number_format($displayPrice ?? 0, 2) }}</span>
                                    </div>

                                    @if($selectedPackage['trial_days'] && $selectedPackage['trial_days'] > 0)
                                    <div class="flex justify-between items-center text-sm py-2 px-3 bg-green-50 rounded-lg border border-green-100">
                                        <span class="flex items-center gap-2 text-green-700 font-medium">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $selectedPackage['trial_days'] }} Day Free Trial
                                        </span>
                                        <span class="font-bold text-green-700">- ₹{{ number_format($displayPrice ?? 0, 2) }}</span>
                                    </div>
                                    @endif

                                    <!-- Discount Row (Hidden if no coupon) -->
                                    <div id="summary-discount-row" class="flex justify-between items-center text-sm {{ $hasCoupon ? '' : 'hidden' }}">
                                        <span class="text-green-600 font-medium">Coupon Discount</span>
                                        <span class="font-bold text-green-600" id="summary-discount-amount">- ${{ number_format($discountAmount ?? 0, 2) }}</span>
                                    </div>
                                    <input type="hidden" id="active-coupon-discount" value="{{ $discountAmount ?? 0 }}">

                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-slate-500">Taxes</span>
                                        <span class="text-xs text-slate-400 italic">Calculated at payment</span>
                                    </div>

                                    <div class="pt-4 border-t border-slate-100 mt-2">
                                        <div id="coupon-section">

                                            <button type="button" id="toggle-coupon-btn" onclick="toggleCouponInput()"
                                                class="text-sm text-primary font-medium hover:underline flex items-center gap-1 focus:outline-none {{ $hasCoupon ? 'hidden' : '' }}">
                                                Have a coupon code?
                                            </button>

                                            <div id="coupon-input-container" class="mt-3 hidden">
                                                <div class="flex gap-2">
                                                    <input type="text" id="coupon-code-input" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-[#7C69EF] uppercase" placeholder="Enter code">
                                                    <button type="button" id="apply-coupon-btn" onclick="applyCoupon()" class="bg-[#7C69EF] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#6050dc] transition-colors whitespace-nowrap">
                                                        Apply
                                                    </button>
                                                </div>
                                                <p id="coupon-message" class="text-xs mt-2 font-medium hidden"></p>
                                            </div>

                                            <div id="applied-coupon-container" class="mt-3 {{ $hasCoupon ? '' : 'hidden' }} bg-green-50 border border-green-100 rounded-lg p-3 flex justify-between items-center">
                                                <div class="flex flex-col">
                                                    <span class="text-sm text-green-700 font-bold flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span id="applied-coupon-code-display">{{ $hasCoupon ? $sessionCoupon['code'] : '' }}</span>
                                                    </span>
                                                    <span class="text-xs text-green-600">Coupon applied successfully</span>
                                                </div>
                                                <button type="button" onclick="removeCoupon()" class="text-xs text-red-500 hover:text-red-700 font-bold uppercase transition-colors focus:outline-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Section -->
                            <div class="border-t-2 border-dashed border-slate-200 pt-4 mt-2">
                                <div class="flex justify-between items-end mb-1">
                                    <span class="text-base font-bold text-slate-700">Total Due Today</span>
                                    <span class="text-xl font-bold text-slate-900 leading-none" id="total-due-today">
                                        @if($selectedPackage['trial_days'] && $selectedPackage['trial_days'] > 0)
                                        $0.00
                                        @else
                                        ${{ number_format($finalPrice ?? $displayPrice ?? 0, 2) }}
                                        @endif
                                    </span>
                                </div>
                                @if($selectedPackage['trial_days'] && $selectedPackage['trial_days'] > 0)
                                <p class="text-xs text-slate-500 text-right mt-1">
                                    First payment of ${{ number_format($displayPrice ?? 0, 2) }} due after trial
                                </p>
                                @endif



                                @php
                                $showPaymentSection = $hasSelectedPackage && $selectedPackage && ($selectedPackage['credit_card_required'] ?? false);
                                @endphp

                                <div id="payment-details-section" class="{{ $showPaymentSection ? '' : 'hidden' }} mt-4 pt-4 border-t border-slate-200">

                                    <div class="flex items-center gap-2 mb-3">
                                        <svg class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <h3 class="font-bold text-slate-900">Secure Payment</h3>
                                    </div>

                                    <!-- Payment fields -->
                                    <div class="space-y-4">
                                        <div id="stripe-fields-container">
                                            <div>
                                                <label class="block text-xs font-semibold mb-1 text-slate-700 text-left">Name on Card</label>
                                                <input type="text" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:border-primary transition-all text-sm" placeholder="John Doe">
                                            </div>
                                            <div class="mt-4">
                                                <label class="block text-xs font-semibold mb-1 text-slate-700 text-left">Card Details</label>
                                                <div id="card-element" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:border-primary transition-all text-sm">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <div id="card-errors" role="alert" class="mt-1 text-xs text-red-600"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="checkout-actions-container" class="mt-8">
                                    <div class="flex flex-col items-center gap-4 pb-8 max-w-md mx-auto">
                                        <button type="submit" id="checkout-btn"
                                            class="w-full bg-[#7C69EF] hover:bg-[#6352D1] text-white font-bold text-lg py-3 rounded-2xl shadow-lg shadow-indigo-200 transition-all hover:-translate-y-1 flex items-center justify-center group relative overflow-hidden">
                                            <span class="absolute inset-0 bg-white/10 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden spinner"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                                                </circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span id="checkout-btn-text" class="relative z-10 flex items-center gap-2">
                                                {{ $hasSelectedPackage ? 'Proceed to Pay' : 'Select a Plan First' }}
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </span>
                                        </button>

                                        <p class="text-xs text-slate-400">
                                            By confirming, you agree to our <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @php
                $showPaymentSection = $hasSelectedPackage && $selectedPackage && ($selectedPackage['credit_card_required'] ?? false);
                @endphp


            </form>
        </div>
    </div>

    <script>
        // Set a flag to identify this as the signup page tab
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem('signupPageOpen', 'true');
            localStorage.setItem('signupPageUrl', window.location.href);
        }

        // Note: Cross-tab communication removed - only the tab where verification link is clicked will redirect

        // Clean up on page unload
        window.addEventListener('beforeunload', function() {
            // Don't clear immediately, wait a bit in case it's just a navigation
            setTimeout(function() {
                if (document.visibilityState === 'hidden') {
                    localStorage.removeItem('signupPageOpen');
                }
            }, 100);
        });

        // Step mapping configuration
        const stepQueryMap = {
            1: 'basic_info',
            2: 'business_info',
            3: 'usage_preference',
            4: 'industry',
            5: 'daily_footfall',
            6: 'current_solution',
            7: 'checkout'
        };
        const queryStepMap = Object.fromEntries(Object.entries(stepQueryMap).map(([k, v]) => [v, parseInt(k)]));

        // Detect page refresh and clear session - DISABLED to allow persistence
        /*
        // Run immediately, before DOM is fully ready
        (function() {
            // Check if page was reloaded using multiple methods for reliability
            let isReload = false;

            // Method 1: Performance Navigation API
            try {
                const navigation = performance.getEntriesByType('navigation')[0];
                if (navigation) {
                    isReload = navigation.type === 'reload';
                }
            } catch (e) {
                // Method 2: Legacy Performance Navigation API
                if (performance.navigation) {
                    isReload = performance.navigation.type === performance.navigation.TYPE_RELOAD;
                }
            }

            // Method 3: Check referrer matches current URL
            if (!isReload && document.referrer) {
                try {
                    const referrerPath = new URL(document.referrer).pathname;
                    const currentPath = window.location.pathname;
                    if (referrerPath === currentPath && currentPath === '/signup') {
                        isReload = true;
                    }
                } catch (e) {
                    // Fallback: simple string comparison
                    if (document.referrer.indexOf(window.location.pathname) !== -1) {
                        isReload = true;
                    }
                }
            }

            // Check if hash is present - if so, this is a restoration, NOT a reload to clear
            if (window.location.search.indexOf('hash=') !== -1) {
                console.log('Signup: Hash detected, preserving session (not a reload)');
                isReload = false;
            }

            // If it's a reload, clear form fields immediately (before DOM ready)
            if (isReload) {
                // Use a flag to prevent form population later
                window.signupPageRefreshed = true;

                // Clear session via AJAX
                if (typeof $ !== 'undefined') {
                    $.ajax({
                        url: '/signup/clear-session',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json'
                        }
                    });
                }
            }
        })();
        */

        $(document).ready(function() {
            // Stripe Global Variables
            let stripe = null;
            let elements = null;
            let cardElement = null;

            // Initialize Stripe
            try {
                stripe = Stripe('{{ config("services.stripe.key") }}');
            } catch (e) {
                console.error('Stripe initialization failed:', e);
            }

            window.initStripeElements = function() {
                if (!elements && stripe) {
                    elements = stripe.elements();
                    const style = {
                        base: {
                            color: '#32325d',
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            fontSmoothing: 'antialiased',
                            fontSize: '16px',
                            '::placeholder': {
                                color: '#aab7c4'
                            }
                        },
                        invalid: {
                            color: '#fa755a',
                            iconColor: '#fa755a'
                        }
                    };

                    if ($('#card-element').length) {
                        cardElement = elements.create('card', {
                            style: style
                        });
                        cardElement.mount('#card-element');

                        cardElement.on('change', function(event) {
                            const displayError = document.getElementById('card-errors');
                            if (event.error) {
                                displayError.textContent = event.error.message;
                            } else {
                                displayError.textContent = '';
                            }
                        });
                        console.log('Stripe Element mounted successfully');
                    } else {
                        console.error('#card-element container not found');
                    }
                }
            };

            // Expose vars to confirmStripePayment
            window.getStripe = () => stripe;
            window.getCardElement = () => cardElement;
            // If page was refreshed, clear all form fields
            if (window.signupPageRefreshed) {
                $('#signup_name').val('');
                $('#signup_email').val('');
                $('#user_phone').val('');
                // Clear verification message
                $('#email-verification-section').addClass('hidden');
                $('#form-step-1').removeClass('hidden');
                $('#step-1-header').removeClass('hidden');
                // Clear verification success message if present
                $('#verification-success-message').remove();
            }

            // Initialize phone input (always initialize, even on refresh)
            const $phoneInput = $("#user_phone");
            if ($phoneInput.length) {
                // Get saved phone data
                const savedCountryCode = "{{ $country_code ?? '' }}";
                const savedPhoneNumber = "{{ $phone_number ?? '' }}";

                // Initialize intlTelInput (always initialize)
                // Make sure the input is ready and not readonly
                const phoneInputElement = $phoneInput[0];
                if (phoneInputElement) {
                    // Remove readonly attribute if present
                    phoneInputElement.removeAttribute('readonly');

                    // Initialize intlTelInput
                    iti = window.intlTelInput(phoneInputElement, {
                        initialCountry: "in",
                        separateDialCode: true,
                        preferredCountries: ["in", "us", "ae"],
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                        allowDropdown: true, // Explicitly enable dropdown
                        autoPlaceholder: "polite",
                    });

                    // Debug: Log if initialization was successful
                    if (typeof iti !== 'undefined' && iti) {
                        console.log('intlTelInput initialized successfully');

                        // Ensure the dropdown is properly initialized and has correct width
                        setTimeout(function() {
                            const itiWrapper = phoneInputElement.closest('.iti');
                            if (itiWrapper) {
                                const flagContainer = itiWrapper.querySelector('.iti__flag-container');
                                if (flagContainer) {
                                    // Remove any inline styles that might block clicks
                                    flagContainer.style.pointerEvents = 'auto';
                                    flagContainer.style.cursor = 'pointer';

                                    // Ensure the selected flag is also clickable
                                    const selectedFlag = itiWrapper.querySelector('.iti__selected-flag');
                                    if (selectedFlag) {
                                        selectedFlag.style.pointerEvents = 'auto';
                                        selectedFlag.style.cursor = 'pointer';
                                    }

                                    // Set dropdown width to match input width
                                    const inputWidth = itiWrapper.offsetWidth;
                                    document.documentElement.style.setProperty('--iti-dropdown-width', inputWidth + 'px');

                                    // Function to update dropdown width
                                    const updateDropdownWidth = function() {
                                        setTimeout(function() {
                                            const dropdown = document.querySelector('.iti__country-list');
                                            if (dropdown) {
                                                dropdown.style.width = inputWidth + 'px';
                                                dropdown.style.minWidth = inputWidth + 'px';
                                                dropdown.style.maxWidth = inputWidth + 'px';
                                            }
                                        }, 10);
                                    };

                                    // Listen for dropdown opening events
                                    flagContainer.addEventListener('click', updateDropdownWidth);
                                    phoneInputElement.addEventListener('click', updateDropdownWidth);

                                    // Also use MutationObserver to catch when dropdown is added to DOM
                                    const observer = new MutationObserver(function(mutations) {
                                        mutations.forEach(function(mutation) {
                                            if (mutation.addedNodes.length) {
                                                mutation.addedNodes.forEach(function(node) {
                                                    if (node.classList && node.classList.contains('iti__country-list')) {
                                                        updateDropdownWidth();
                                                    }
                                                });
                                            }
                                        });
                                    });
                                    observer.observe(document.body, {
                                        childList: true,
                                        subtree: true
                                    });

                                    console.log('Flag container found and made clickable, dropdown width set to:', inputWidth);
                                } else {
                                    console.error('Flag container not found');
                                }
                            }
                        }, 200);
                    } else {
                        console.error('intlTelInput initialization failed');
                    }
                } else {
                    console.error('Phone input element not found');
                }

                // Clear phone input if page was refreshed
                if (window.signupPageRefreshed) {
                    setTimeout(function() {
                        if (typeof iti !== 'undefined' && iti) {
                            iti.setNumber('');
                        }
                    }, 100);
                }

                // Pre-fill phone number if saved data exists AND page was not refreshed
                if (savedCountryCode && savedPhoneNumber && !window.signupPageRefreshed) {
                    setTimeout(function() {
                        // Set country code first
                        const dialCode = savedCountryCode.replace('+', '');
                        const countryData = iti.getCountryData().find(c => c.dialCode === dialCode);
                        if (countryData) {
                            iti.setCountry(countryData.iso2);
                        }
                        // Set phone number (intlTelInput will handle the country code automatically)
                        iti.setNumber(savedCountryCode + ' ' + savedPhoneNumber);
                    }, 200);
                } else {
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
                }

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
            const searchParams = new URLSearchParams(window.location.search);
            let initialStep = 1;
            let stepParam = '';

            // Find which step is in the query params
            for (const [key, value] of searchParams.entries()) {
                if (queryStepMap[key]) {
                    initialStep = queryStepMap[key];
                    stepParam = key;
                    break;
                }
            }

            // Clean hash/other params from URL if present
            if (searchParams.has('hash') || searchParams.toString() !== stepParam) {
                const newUrl = window.location.pathname + (stepParam ? '?' + stepParam : '?basic_info');
                history.replaceState(null, '', newUrl);
            }

            if (initialStep === 7) {
                enterStep7();
            } else {
                goToStep(initialStep, false);
            }

            // Check for stored errors from redirect
            const storedErrors = sessionStorage.getItem('signupErrors');
            if (storedErrors) {
                try {
                    const errors = JSON.parse(storedErrors);
                    // Clear the stored errors
                    sessionStorage.removeItem('signupErrors');

                    // Display errors on the current step
                    setTimeout(() => {
                        $.each(errors, (field, messages) => {
                            const errorElement = $('[data-error="' + field + '"]');
                            if (errorElement.length > 0) {
                                errorElement.text(messages[0]).removeClass('hidden');
                                // Add red border to the input field
                                const inputField = $('[name="' + field + '"]');
                                if (inputField.length > 0) {
                                    inputField.removeClass('border-slate-200').addClass('border-red-500');
                                    // Focus on the field with error
                                    inputField.focus();
                                }
                            }
                        });
                    }, 300);
                } catch (e) {
                    console.error('Error parsing stored errors:', e);
                }
            }

            // Ensure logos are visible on step 1 (in case of refresh)
            if (initialStep === 1) {
                $('#sidebar-logo, #logo-img').removeClass('hidden');
                $('#svg-icon').addClass('hidden');
            }

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
                $.each({
                    min: val.length >= 8,
                    upper: /[A-Z]/.test(val),
                    lower: /[a-z]/.test(val)
                }, function(key, isValid) {
                    const $item = $(`.requirement-item[data-requirement="${key}"]`);
                    $item.toggleClass('text-green-500', isValid).toggleClass('text-slate-500', !isValid);
                    $item.find('svg').toggleClass('hidden', !isValid);
                    $item.find('.dot').toggleClass('hidden', isValid);
                });
            });

            // Bind form submission handler - MUST be inside document.ready
            $(document).on('submit', 'form[id^="form-step-"]', handleFormSubmit);
        });

        // Fetch lead details from DB before rendering Step-7
        window.leadSummaryData = null;

        function fetchLeadDetails() {
            return new Promise((resolve) => {
                // We rely on session now, so we don't strictly need window.leadId check, 
                // but it helps avoid unnecessary calls if we know we are not initiated.
                // However, user might have refreshed, so just call it.

                $.get("{{ route('signup.lead-details') }}")
                    .done((response) => {
                        if (response.success && response.lead) {
                            window.leadSummaryData = response.lead;
                            if (response.lead.id) {
                                window.leadId = response.lead.id;
                            }
                        }
                        resolve();
                    }).fail(resolve);
            });
        }


        // Controlled entry function for Step-7
        function enterStep7() {
            console.log('Entering Step 7 via enterStep7');

            $('#step-7').addClass('hidden');

            fetchLeadDetails().then(() => {
                goToStep(7);

                // Wait for DOM paint
                requestAnimationFrame(() => {
                    setTimeout(() => {
                        $('#step-7').removeClass('hidden');
                        populateStep7Summary(); // 🔥 NEW
                        initStripeOnce();
                    }, 50);
                });
            });
        }


        // Handle browser back/forward
        $(window).on('popstate', () => {
            const step = queryStepMap[window.location.search.substring(1).split('&')[0]] || 1;
            if (step === 7) enterStep7();
            else goToStep(step, false);
        });

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
            $('html, body').animate({
                scrollTop: 0
            }, 'smooth');

            // Initialize Stripe if entering checkout step
            if (parseInt(step) === 7) {
                console.log('Entering payment step, initializing Stripe...');
                setTimeout(initStripeElements, 100);
            }
        }

        function populateStep7Summary() {
            if (!window.leadSummaryData) return;

            const lead = window.leadSummaryData;

            if (lead.usage_preference) {
                $('#summary-usage-preference')
                    .text(lead.usage_preference)
                    .closest('.summary-item')
                    .removeClass('hidden');
            }

            if (lead.industry) {
                $('#summary-industry')
                    .text(lead.industry)
                    .closest('.summary-item')
                    .removeClass('hidden');
            }

            if (lead.footfall) {
                $('#summary-footfall')
                    .text(lead.footfall)
                    .closest('.summary-item')
                    .removeClass('hidden');
            }

            if (lead.current_solution) {
                $('#summary-current-solution')
                    .text(lead.current_solution)
                    .closest('.summary-item')
                    .removeClass('hidden');
            }

            if (lead.name) {
                $('#summary-fullname').text(lead.name);
            }
            if (lead.company_name) {
                $('#summary-company').text(lead.company_name);
            }
            if (lead.email) {
                $('#summary-email').text(lead.email);
            }
            if (lead.phone_number) {
                // Combined phone check
                const fullPhone = (lead.country_code ? lead.country_code + ' ' : '') + lead.phone_number;
                $('#summary-phone').text(fullPhone.trim());
            } else if (lead.phone) {
                // Fallback if returned as single string
                $('#summary-phone').text(lead.phone);
            }

            if (lead.domain_name) {
                $('#summary-domain').text(lead.domain_name);
            }

            console.log('Step 7 summary populated');
        }

        let stripeInitialized = false;

        function initStripeOnce() {
            if (stripeInitialized) return;

            stripeInitialized = true;
            console.log('Initializing Stripe...');
            initializeStripe(); // your existing code
        }


        // Form submission handler
        function handleFormSubmit(e) {
            e.preventDefault();
            const $form = $(e.target);
            const stepNum = parseInt($form.attr('id').replace('form-step-', ''));

            console.log('handleFormSubmit called for step:', stepNum, 'Form ID:', $form.attr('id'));

            if (!stepNum || stepNum < 1 || stepNum > 7) return console.error('Invalid form step');

            // Intercept Step 7 to handle Stripe Elements logic BEFORE generic submission
            if (stepNum === 7) {
                if (!$('#payment-details-section').hasClass('hidden')) {
                    // Check if this is already a verified token submission (flag check)
                    if (!$form.data('stripe-verified')) {
                        // Stop generic handling, run Stripe verification first
                        confirmStripePayment(e, $form);
                        return;
                    }
                }
            }

            const $btn = $form.find('button[type="submit"]'),
                $spinner = $btn.find('.spinner');

            // Preprocess data
            if (stepNum === 1 && iti) {
                const data = iti.getSelectedCountryData(),
                    dialCode = '+' + data.dialCode;
                $('#phone_actual').val(iti.getNumber().replace(dialCode, '').replace(/\D/g, ''));
                $('#country_code_val').val(dialCode);
            }


            $form.find('[data-error]').text('').addClass('hidden');
            $btn.prop('disabled', true).find('.spinner').removeClass('hidden');

            console.log('Submitting step ' + stepNum + ' to /signup/step' + stepNum);

            let ajaxUrl = '/signup/step' + stepNum;
            if (stepNum === 7) {
                ajaxUrl = '{{ route("signup.create-checkout-session") }}';
            }

            console.log('Submitting step ' + stepNum + ' to ' + ajaxUrl);

            $.ajax({
                url: ajaxUrl,
                method: 'POST',
                data: new FormData($form[0]),
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                success: function(data) {
                    console.log('Step ' + stepNum + ' response:', data);

                    if (stepNum === 7) {
                        // Check if we have a direct redirect (skip_stripe case)
                        if (data.skip_stripe && data.redirect_url) {
                            window.location.href = data.redirect_url;
                            return;
                        }

                        // Otherwise, we do NOT submit to create-checkout-session here directly
                        // We handle it in the submit event interception below
                        return;
                    }

                    if (data.success) {
                        // Update global leadId if provided
                        if (data.lead_id) {
                            window.leadId = data.lead_id;
                            console.log('Updated window.leadId to:', window.leadId);
                        }

                        // Handle step 1 verification message
                        if (stepNum === 1 && data.verification_sent) {
                            // Hide the form and header
                            $('#form-step-1').addClass('hidden');
                            $('#step-1-header').addClass('hidden');
                            // Show verification section
                            $('#email-verification-section').removeClass('hidden');
                            // Update email display
                            if (data.email) {
                                $('#verification-email-display').text(data.email);
                            }
                            // Store lead_id for resend functionality
                            if (data.lead_id) {
                                $('#resend-email-btn').data('lead-id', data.lead_id);
                            }
                        } else if (data.redirect) {
                            // Handle redirect (for other cases)
                            window.location.href = data.redirect;
                        } else {
                            // Normal flow - proceed to next step

                            // Check for Trial Flow (Step 6 -> Step 7 transition with NO package selected)
                            if (stepNum === 6) {
                                const selectedPackageId = $('#selected_package_id').val();
                                if (!selectedPackageId) {
                                    // STOP! Do not go to Step 7. Show Modal.
                                    $('#trial-success-modal').removeClass('hidden');

                                    // Start Countdown and Redirect
                                    let seconds = 5;
                                    const $countdown = $('#countdown-value');
                                    const redirectUrl = data.redirect_url || '/dashboard'; // Fallback

                                    const timer = setInterval(() => {
                                        seconds--;
                                        $countdown.text(seconds);
                                        if (seconds <= 0) {
                                            clearInterval(timer);
                                            window.location.href = redirectUrl;
                                        }
                                    }, 1000);

                                    return;
                                }
                            }

                            if (data.next_step === 7) {
                                enterStep7();
                            } else {
                                goToStep(data.next_step);
                            }
                        }
                    } else {
                        console.error('Success false in response:', data);
                        // Swal.fire('Error', data.message || 'Something went wrong', 'error');
                    }
                },
                error: function(xhr) {
                    console.error('AJAX error:', xhr.status, xhr.responseJSON);
                    const errorData = xhr.responseJSON || {};
                    if (xhr.status === 422) {
                        // If there's a redirect, navigate to that step and show errors there
                        if (errorData.redirect) {
                            window.location.href = errorData.redirect;
                            // Store errors in sessionStorage to display after redirect
                            if (errorData.errors) {
                                sessionStorage.setItem('signupErrors', JSON.stringify(errorData.errors));
                            }
                        } else {
                            // Display field-specific errors below the fields on current form
                            $.each(errorData.errors || {}, (field, messages) => {
                                const errorElement = $form.find('[data-error="' + field + '"]');
                                if (errorElement.length > 0) {
                                    errorElement.text(messages[0]).removeClass('hidden');
                                    // Add red border to the input field
                                    const inputField = $form.find('[name="' + field + '"]');
                                    if (inputField.length > 0) {
                                        inputField.removeClass('border-slate-200').addClass('border-red-500');
                                    }
                                }
                            });
                        }
                    } else if (xhr.status === 403) {
                        // User tried to access a step they haven't completed
                        if (errorData.redirect) {
                            window.location.href = errorData.redirect;
                        } else {
                            Swal.fire({
                                    title: 'Access Denied',
                                    text: errorData.message || 'Please complete previous steps first.',
                                    icon: 'warning',
                                    confirmButtonText: 'OK'
                                })
                                .then(() => window.location.href = '{{ route("signup") }}?basic_info');
                        }
                    } else {
                        // Show error message for other status codes
                        if (errorData.message) {
                            // If there's a redirect in the error response, go to that step
                            if (errorData.redirect) {
                                window.location.href = errorData.redirect;
                            } else {
                                // Show error and display field errors if available
                                if (errorData.errors) {
                                    $.each(errorData.errors || {}, (field, messages) => {
                                        // Find the form that contains this field
                                        const formWithField = $('form').filter(function() {
                                            return $(this).find('[name="' + field + '"], [data-error="' + field + '"]').length > 0;
                                        });
                                        if (formWithField.length > 0) {
                                            formWithField.find('[data-error="' + field + '"]').text(messages[0]).removeClass('hidden');
                                        }
                                    });
                                }
                                Swal.fire('Error', errorData.message || 'Something went wrong', 'error');
                            }
                        }
                    }
                },
                complete: () => $btn.prop('disabled', false).find('.spinner').addClass('hidden')
            });
        }

        // Billing Toggle Logic
        // Initialize from saved value or default to annual
        // Try localStorage first as fallback for session loss on refresh
        let savedBillingCycle = $('#selected_billing_cycle').val();
        if (!savedBillingCycle || savedBillingCycle === '') {
            savedBillingCycle = localStorage.getItem('signup_billing_cycle') || 'annual';
            // Update hidden input with localStorage value
            $('#selected_billing_cycle').val(savedBillingCycle);
        } else {
            // Store in localStorage for future refreshes
            localStorage.setItem('signup_billing_cycle', savedBillingCycle);
        }
        let isAnnual = savedBillingCycle === 'annual';

        const $toggleBtn = $('#billing-toggle-btn');
        const $toggleThumb = $('#billing-toggle-thumb');
        const $monthlyLabel = $('#billing-label-monthly');
        const $annualLabel = $('#billing-label-annual');

        function updateBillingUI() {
            if (isAnnual) {
                // Annual state
                $toggleThumb.addClass('translate-x-8').removeClass('translate-x-0');
                $annualLabel.addClass('text-gray-900').removeClass('text-gray-500');
                $monthlyLabel.addClass('text-gray-500').removeClass('text-gray-900');

                $('.price-display-annual').removeClass('hidden');
                $('.price-display-monthly').addClass('hidden');
            } else {
                // Monthly state
                $toggleThumb.addClass('translate-x-0').removeClass('translate-x-8');
                $annualLabel.addClass('text-gray-500').removeClass('text-gray-900');
                $monthlyLabel.addClass('text-gray-900').removeClass('text-gray-500');

                $('.price-display-annual').addClass('hidden');
                $('.price-display-monthly').removeClass('hidden');
            }

            // Update hidden input
            $('#selected_billing_cycle').val(isAnnual ? 'annual' : 'monthly');

            // If a package is already selected, re-trigger selection to update payment summary text if needed
            const selectedId = $('#selected_package_id').val();
            if (selectedId) {
                const $card = $(`.package-card[data-id="${selectedId}"]`);
                if ($card.length) {
                    selectPackage($card[0]);
                }
            }
        }

        $(document).on('click', '#billing-toggle-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            isAnnual = !isAnnual;
            updateBillingUI();

            // Save billing cycle to session and localStorage
            const billingCycle = isAnnual ? 'annual' : 'monthly';
            localStorage.setItem('signup_billing_cycle', billingCycle);

            $.ajax({
                url: '/signup/save-billing-cycle',
                method: 'POST',
                data: {
                    billing_cycle: billingCycle
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                success: function(data) {
                    console.log('Billing cycle saved to session and localStorage:', billingCycle);
                },
                error: function(xhr) {
                    console.error('Failed to save billing cycle:', xhr.responseJSON);
                }
            });
        });

        // Initialize toggle UI
        updateBillingUI();

        // Update selectPackage to handle button clicks inside card
        $(document).on('click', '.select-plan-btn', function(e) {
            e.stopPropagation();
            const card = $(this).closest('.package-card')[0];
            selectPackage(card);
        });

        // Package Selection Logic
        window.selectPackage = function(element, ignoreCoupon = false) {
            // Remove active state from all cards
            $('.package-card').removeClass('border-[#7C69EF] ring-2 ring-[#7C69EF]/20').addClass('border-slate-200');
            $('.package-card .package-radio div').addClass('opacity-0');
            $('.package-card .package-radio').removeClass('border-[#7C69EF]').addClass('border-slate-200');

            // Add active state to selected card
            const $card = $(element);
            $card.removeClass('border-slate-200').addClass('border-[#7C69EF] ring-2 ring-[#7C69EF]/20');
            $card.find('.package-radio div').removeClass('opacity-0');
            $card.find('.package-radio').removeClass('border-slate-200').addClass('border-[#7C69EF]');

            // Update hidden input
            const packageId = $card.data('id');
            $('#selected_package_id').val(packageId);

            // Determine price based on current toggle state
            // Determine price based on current toggle state
            // Refresh isAnnual from DOM to be safe
            isAnnual = $('#billing-toggle-thumb').hasClass('translate-x-8');

            let price = 0;
            if (isAnnual) {
                price = parseFloat($card.data('price-annual'));
            } else {
                price = parseFloat($card.data('price-monthly'));
            }
            if (isNaN(price)) price = 0;

            console.log('selectPackage: Selected Package ID:', packageId, 'isAnnual:', isAnnual, 'Price:', price);

            const isTrial = parseInt($card.data('trial')) > 0;
            const isEnquiry = parseInt($card.data('enquiry')) === 1;
            const isCreditCardRequired = parseInt($card.data('credit-card-required')) === 1;

            const $paymentSection = $('#payment-details-section');
            const $checkoutActions = $('#checkout-actions-container');
            const $checkoutBtnText = $('#checkout-btn-text');

            // Always show actions container if package is selected (unless enquiry?)
            $checkoutActions.removeClass('hidden');

            if (isEnquiry) {
                $paymentSection.addClass('hidden');
                $checkoutBtnText.text('Submit Enquiry');
            } else if (isTrial) {
                // For trial, determining if we need payment fields
                if (isCreditCardRequired) {
                    $paymentSection.removeClass('hidden');
                    $checkoutBtnText.text('Start Free Trial');
                } else {
                    $paymentSection.addClass('hidden');
                    $checkoutBtnText.text('Proceed to checkout');
                }
            } else if (price > 0) {
                $paymentSection.removeClass('hidden');

                // Calculate Final Price with Coupon if applicable
                let finalPrice = price;
                let activeDiscount = 0;

                // Check if coupon is applied (container is visible)
                if (!ignoreCoupon && !$('#applied-coupon-container').hasClass('hidden')) {
                    // Start by checking the hidden input we populated from PHP
                    const inputVal = $('#active-coupon-discount').val();
                    const serverDiscount = parseFloat(inputVal) || 0;
                    console.log('selectPackage: Coupon container visible. Input value:', inputVal, 'Parsed:', serverDiscount);
                    activeDiscount = serverDiscount;

                    finalPrice = Math.max(0, price - activeDiscount);
                }

                // Format price for display
                const formattedPrice = price.toFixed(2);
                const formattedFinalPrice = finalPrice.toFixed(2);

                // Update Summary Prices
                if ($('#summary-subtotal').length) $('#summary-subtotal').text('$' + formattedPrice);
                // Total Due uses final price
                if ($('#total-due-today').length) $('#total-due-today').text('$' + formattedFinalPrice);

                const billingText = isAnnual ? '/yr' : '/mo';
                $checkoutBtnText.text(`Proceed To Pay ($${formattedFinalPrice}${billingText})`);

                // Scroll to top of step 7 to ensure context is visible
                setTimeout(() => {
                    document.getElementById('step-7').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            } else {
                // Fallback for free/other
                $paymentSection.addClass('hidden');
                $checkoutBtnText.text('Complete Registration');
            }

            // Hide error message if one was shown
            $('[data-error="package_id"]').addClass('hidden');
        };

        // Auto-select package on Step 7 load
        const preselectedPackageId = $('#selected_package_id').val() || $('#preselected_package_id_val').val();
        if (preselectedPackageId) {
            const packageCard = $(`.package-card[data-id="${preselectedPackageId}"]`);
            if (packageCard.length) {
                // Wait for step 7 to be visible then trigger click
                const checkStep7 = setInterval(() => {
                    if ($('#step-7').hasClass('active') && !$('#step-7').hasClass('hidden')) {
                        clearInterval(checkStep7);
                        // Always trigger selectPackage to ensure UI is updated (button text, price, payment visibility)
                        selectPackage(packageCard[0]);
                        // Scroll to top of step 7
                        setTimeout(() => {
                            document.getElementById('step-7').scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 100);
                    }
                }, 500);
            }
        }

        // Email verification now happens automatically when "Start Free Trial" is clicked

        // Resend verification email handler
        $(document).on('click', '#resend-email-btn', function() {
            const $btn = $(this);
            const $statusMsg = $('#verification-status-message');
            const email = $('#verification-email-display').text();
            const leadId = $btn.data('lead-id');

            $btn.prop('disabled', true);
            $btn.find('span').html('<svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Sending...');
            $statusMsg.addClass('hidden');

            $.ajax({
                url: '/signup/resend-verification',
                method: 'POST',
                data: {
                    email: email,
                    lead_id: leadId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                success: function(data) {
                    if (data.success) {
                        $statusMsg.removeClass('hidden bg-red-50 border-red-200 text-red-700')
                            .addClass('bg-green-50 border border-green-200 text-green-700')
                            .html('<div class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Verification email sent successfully! Please check your inbox.</span></div>');
                    } else {
                        $statusMsg.removeClass('hidden bg-green-50 border-green-200 text-green-700')
                            .addClass('bg-red-50 border border-red-200 text-red-700')
                            .html('<div class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg><span>' + (data.message || 'Failed to send verification email. Please try again.') + '</span></div>');
                    }
                },
                error: function(xhr) {
                    const errorData = xhr.responseJSON || {};
                    $statusMsg.removeClass('hidden bg-green-50 border-green-200 text-green-700')
                        .addClass('bg-red-50 border border-red-200 text-red-700')
                        .html('<div class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg><span>' + (errorData.message || 'Failed to send verification email. Please try again.') + '</span></div>');
                },
                complete: function() {
                    $btn.prop('disabled', false);
                    $btn.find('span').html('<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg> Resend Verification Email');
                }
            });

        });

        // Global Toggle Function for Inline Click
        window.toggleCouponInput = function() {
            $('#coupon-input-container').toggleClass('hidden');
            if (!$('#coupon-input-container').hasClass('hidden')) {
                $('#coupon-code-input').focus();
            }
        };

        // Global Apply Coupon Function
        window.applyCoupon = function() {
            const leadId = {{ $lead ? $lead->id : 'null' }};
            const $btn = $('#apply-coupon-btn');
            const code = $('#coupon-code-input').val().trim();
            const packageId = $('#selected_package_id').val();

            // Determine billing cycle from toggle state (Visual truth)
            // This ensures we send exactly what the user sees
            let currentCycle = 'monthly';
            if ($('#billing-toggle-thumb').hasClass('translate-x-8')) {
                currentCycle = 'annual';
            }

            if (!code) {
                $('#coupon-message').removeClass('hidden text-green-600').addClass('text-red-500').text('Please enter a coupon code.');
                return;
            }

            $btn.prop('disabled', true).text('Applying...');
            $('#coupon-message').addClass('hidden');

            $.ajax({
                url: "{{ route('signup.apply-coupon') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    coupon_code: code,
                    package_id: packageId,
                    billing_cycle: currentCycle,
                    currency: 'USD',
                    lead_id: leadId
                },
                success: function(response) {
                    $btn.prop('disabled', false).text('Apply');
                    if (response.success) {
                        // Success Logic
                        $('#coupon-input-container').addClass('hidden');
                        $('#toggle-coupon-btn').addClass('hidden');

                        $('#applied-coupon-container').removeClass('hidden');
                        $('#applied-coupon-code-display').text(response.coupon.code);

                        // Update Breakdown
                        $('#summary-discount-row').removeClass('hidden');
                        $('#summary-discount-amount').text('- ₹' + parseFloat(response.coupon.discount_amount).toFixed(2));

                        // Update Total
                        $('#total-due-today').text('₹' + parseFloat(response.coupon.final_price).toFixed(2));

                        // Re-hide input value
                        $('#coupon-code-input').val('');

                        // Update Complete Payment Button Text
                        const billingText = currentCycle === 'annual' ? '/yr' : '/mo';
                        $('#checkout-btn-text').text(`Proceed To Pay ($${parseFloat(response.coupon.final_price).toFixed(2)}${billingText})`);

                    } else {
                        $('#coupon-message').removeClass('hidden text-green-600').addClass('text-red-500').text(response.message);
                    }
                },
                error: function(xhr) {
                    $btn.prop('disabled', false).text('Apply');
                    let msg = 'Error applying coupon.';
                    if (xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
                    $('#coupon-message').removeClass('hidden text-green-600').addClass('text-red-500').text(msg);
                }
            });
        };

        window.removeCoupon = function(silent = false) {
            $.ajax({
                url: "{{ route('signup.remove-coupon') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        // Reset UI
                        $('#applied-coupon-container').addClass('hidden');
                        $('#toggle-coupon-btn').removeClass('hidden');
                        $('#summary-discount-row').addClass('hidden');

                        // Reset active discount input to 0
                        $('#active-coupon-discount').val(0);
                        console.log('removeCoupon: Reset #active-coupon-discount to 0');

                        if (!silent) {
                            // Manual UI Reset for robustness
                            const selectedId = $('#selected_package_id').val();
                            console.log('removeCoupon: Triggering reset for package:', selectedId);

                            const $card = $(`.package-card[data-id="${selectedId}"]`);
                            let price = 0;
                            let isAnnual = $('#selected_billing_cycle').val() === 'annual';

                            // Check hidden inputs first (Step 7 context)
                            const hiddenMonthly = parseFloat($('#selected-pkg-price-monthly').val());
                            const hiddenAnnual = parseFloat($('#selected-pkg-price-annual').val());

                            if (!isNaN(hiddenMonthly) && !isNaN(hiddenAnnual)) {
                                price = isAnnual ? hiddenAnnual : hiddenMonthly;
                                console.log('removeCoupon: Using hidden input prices. isAnnual:', isAnnual, 'Price:', price);
                            } else if ($card.length) {
                                // Fallback to card if visible
                                const toggleBtn = $('#billing-toggle-thumb');
                                if (toggleBtn.length) {
                                    isAnnual = toggleBtn.hasClass('translate-x-8');
                                }
                                price = isAnnual ? parseFloat($card.data('price-annual')) : parseFloat($card.data('price-monthly'));
                                console.log('removeCoupon: Using card prices. isAnnual:', isAnnual, 'Price:', price);
                            } else {
                                console.error('removeCoupon: Unable to determine original price. Inputs missing and card not found.');
                            }

                            if (!isNaN(price) && price > 0) {
                                const formattedPrice = price.toFixed(2);
                                if ($('#summary-subtotal').length) $('#summary-subtotal').text('$' + formattedPrice);
                                if ($('#total-due-today').length) $('#total-due-today').text('$' + formattedPrice);

                                // Also update button text
                                const billingText = isAnnual ? '/yr' : '/mo';
                                $('#checkout-btn-text').text(`Proceed To Pay ($${formattedPrice}${billingText})`);
                            }

                            // Trigger package re-selection ONLY if card exists to ensure state consistency
                            if ($card.length && typeof selectPackage === 'function') {
                                selectPackage($card[0], true);
                            }
                        }
                    }
                }
            });
        };


        async function confirmStripePayment(e, $form) {
            const $btn = $form.find('button[type="submit"]');
            const $spinner = $btn.find('.spinner');

            $btn.prop('disabled', true);
            $spinner.removeClass('hidden');
            $('#card-errors').text('');

            // Create PaymentMethod
            // Create PaymentMethod
            const inputVal = $('input[placeholder="John Doe"]').val();

            const stripeInstance = window.getStripe();
            const cardEl = window.getCardElement();

            if (!stripeInstance || !cardEl) {
                console.error("Stripe not initialized");
                $('#card-errors').text('Payment system error: Stripe not loaded.');
                $btn.prop('disabled', false);
                $spinner.addClass('hidden');
                return;
            }

            const {
                paymentMethod,
                error
            } = await stripeInstance.createPaymentMethod({
                type: 'card',
                card: cardEl,
                billing_details: {
                    name: inputVal,
                    email: $('#signup_email').val(),
                },
            });

            if (error) {
                $('#card-errors').text(error.message);
                $btn.prop('disabled', false);
                $spinner.addClass('hidden');
            } else {
                // Success! Submit to backend
                submitPaymentToBackend(paymentMethod.id);
            }
        }

        function submitPaymentToBackend(paymentMethodId) {
            const selectedPackageId = $('#selected_package_id').val();
            let billingCycle = 'monthly';
            if ($('#billing-toggle-thumb').hasClass('translate-x-8')) {
                billingCycle = 'annual';
            }
            const currentCouponCode = $('#applied-coupon-code-display').text().trim();

            $.ajax({
                url: '{{ route("signup.process-payment") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    payment_method_id: paymentMethodId,
                    package_id: selectedPackageId,
                    billing_cycle: billingCycle,
                    currency: 'USD',
                    coupon_code: currentCouponCode
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect_url;
                    } else if (response.requires_action) {
                        stripe.handleCardAction(response.payment_intent_client_secret)
                            .then(function(result) {
                                if (result.error) {
                                    $('#card-errors').text(result.error.message);
                                    resetButtonStep7();
                                } else {
                                    submitPaymentToBackend(result.paymentIntent.payment_method);
                                }
                            });
                    } else {
                        $('#card-errors').text(response.message);
                        resetButtonStep7();
                    }
                },
                error: function(xhr) {
                    $('#card-errors').text(xhr.responseJSON?.message || 'Payment processing failed.');
                    resetButtonStep7();
                }
            });
        }

        function resetButtonStep7() {
            const $btn = $('#checkout-btn');
            $btn.prop('disabled', false);
            $btn.find('.spinner').addClass('hidden');
        }

        // COUPON LOGIC
        $(function() {
            // Apply Coupon logic moved to global window.applyCoupon

            // Remove Coupon Logic
            // Auto-remove coupon when changing package or billing cycle
            $('.package-card, #billing-toggle-btn').on('click', function() {
                if (!$('#applied-coupon-container').hasClass('hidden')) {
                    if (typeof window.removeCoupon === 'function') {
                        window.removeCoupon(true); // Silent remove from backend
                    }
                }
            });

        });

        // Initialize Stripe Elements
        const stripe = Stripe('{{ config("services.stripe.key") }}');
        let elements;
        let cardElement;

        function initStripeElements() {
            if (!elements) {
                elements = stripe.elements();
                const style = {
                    base: {
                        color: '#32325d',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };
                cardElement = elements.create('card', {
                    style: style
                });
                cardElement.mount('#card-element');

                cardElement.on('change', function(event) {
                    const displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });
            }
        }

        // Init on load if step 7 is visible, or when navigating to it
        // Simple check: if #card-element exists, init
        if ($('#card-element').length) {
            initStripeElements();
        }

        // Update verification logic to init elements if showing payment section
        const originalGoToStep = window.goToStep;
        // We can't easily override goToStep if it's not global, but we can hook into visibility changes
        // Or just check step change

        // ... (rest of existing code) ... 
    </script>

    <!-- Trial Success Modal -->
    <div id="trial-success-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full p-6">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-6">
                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="text-center">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2" id="modal-title">Success!</h3>
                    <p class="text-gray-500 mb-4">Your trial account is successfully activated.</p>
                    <p class="text-sm text-gray-400 mb-8">You will be redirected to dashboard in <span id="countdown-value" class="font-bold text-gray-600">5</span> seconds.</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>