@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-white selection:bg-primary selection:text-white">

        {{-- Hero Section --}}
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-b from-gray-50 to-white">
            {{-- Abstract Background Shapes --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div
                    class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[1000px] bg-primary/5 rounded-full blur-3xl">
                </div>
                <div class="absolute top-1/2 left-0 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-5xl mx-auto relative z-10 text-center">
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-8 tracking-tight text-gray-900">
                    Visitor Management System <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">for Smarter
                        Check-Ins</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10">
                    Qwaiting's visitor management software keeps your workplace secure, organized, and welcoming. Easily
                    track visitors, prevent unauthorized access, and deliver a seamless check-in experience from entry to
                    exit.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="https://qwaiting.com/signup"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Start Free Trial</span>
                        <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </a>
                    <a href="https://qwaiting.com/contact-us"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-primary hover:text-primary transition-all hover:shadow-lg hover:-translate-y-1 w-full sm:w-auto">
                        Contact Us
                    </a>
                </div>

                {{-- Hero Image --}}
                <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/visitor-management-system.png"
                            alt="Visitor Management System"
                            class="w-full h-auto transform transition-transform hover:scale-105 duration-700">
                    </div>
                </div>
            </div>
        </section>

        {{-- Track Your Visitors Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Track Your Visitors with <span class="text-primary">VMS</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Qwaiting's cloud-based Visitor Management System streamlines the entire guest journey from
                            arrival to departure, ensuring both security and efficiency.
                        </p>

                        <div class="space-y-6">
                            <h3 class="text-2xl font-bold text-gray-900">Why Qwaiting Stands Out:</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <div>
                                        <strong class="text-gray-900">Smooth Visitor Flow</strong>
                                        <span class="text-gray-700"> – Control and limit the number of visitors on-site to
                                            avoid crowding.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <div>
                                        <strong class="text-gray-900">Digital Records</strong>
                                        <span class="text-gray-700"> – Maintain a complete log of visitor check-ins and
                                            check-outs for safety and compliance.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <div>
                                        <strong class="text-gray-900">Enhanced Security</strong>
                                        <span class="text-gray-700"> – Capture visitor photos, use OTP verification, and
                                            prevent unauthorized entry.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <div>
                                        <strong class="text-gray-900">Efficiency Boost</strong>
                                        <span class="text-gray-700"> – Eliminate manual check-ins and reduce paperwork with
                                            an automated process</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <p class="text-gray-600 leading-relaxed">
                            With Qwaiting, managing visitors isn't just easier — it's faster, safer, and more reliable.
                        </p>

                        <a href="https://qwaiting.com/signup"
                            class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                            <span class="relative z-10">Get Free Trial</span>
                            <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                        </a>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/track-your-visitors-with-VMS-solution.png"
                            alt="Track Your Visitors with VMS"
                            class="relative rounded-3xl shadow-2xl w-full transform transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- How Does a Visitor Management System Work --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        How Does a <span class="text-primary">Visitor Management System</span> Work?
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Step 1 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-full bg-blue-50 rounded-2xl flex items-center justify-center mb-6 text-blue-600 group-hover:bg-blue-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/check-in-process.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Seamless Check-In</h3>
                        <p class="text-gray-600 mb-6">
                            Visitors enter their name, contact details, and purpose of visit through an easy-to-use digital
                            interface, making the process fast, secure, and paperless.
                        </p>
                        <a href="https://qwaiting.com/signup"
                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                            Schedule A Demo
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    {{-- Step 2 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-full bg-purple-50 rounded-2xl flex items-center justify-center mb-6 text-purple-600 group-hover:bg-purple-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/digital-badge-display.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Instant Digital Badge</h3>
                        <p class="text-gray-600 mb-6">
                            After check-in, visitors receive a secure digital or printed badge showing their details, wait
                            times, and queue spots for quick identification and enhanced security.
                        </p>
                        <a href="https://qwaiting.com/signup"
                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                            Schedule A Demo
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    {{-- Step 3 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-full bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:bg-green-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/alert-message.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Real-Time Host Alerts</h3>
                        <p class="text-gray-600 mb-6">
                            The visitor tracking system instantly notifies the host or employee via SMS or email with
                            visitor details and arrival time for smooth coordination.
                        </p>
                        <a href="https://qwaiting.com/signup"
                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                            Schedule A Demo
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    {{-- Step 4 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-full bg-orange-50 rounded-2xl flex items-center justify-center mb-6 text-orange-600 group-hover:bg-orange-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/check-out-process.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Effortless Check-Out</h3>
                        <p class="text-gray-600 mb-6">
                            On departure, visitors simply tap to check out digitally. This keeps records accurate, tracks
                            visit duration, and maintains a clear visitor log.
                        </p>
                        <a href="https://qwaiting.com/signup"
                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                            Schedule A Demo
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    {{-- Step 5 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-full bg-indigo-50 rounded-2xl flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/service-review-and-feedback.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Feedback for Improvement</h3>
                        <p class="text-gray-600 mb-6">
                            After leaving, visitors get a quick feedback request. Their input helps refine services, enhance
                            hospitality, and improve future experiences.
                        </p>
                        <a href="https://qwaiting.com/signup"
                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                            Schedule A Demo
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Cloud-Based CTA Section --}}
        <section
            class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-primary to-purple-800 relative overflow-hidden text-center">
            <div class="absolute inset-0 bg-[url('https://qwaiting.com/images/pattern.png')] opacity-10"></div>
            <div class="max-w-4xl mx-auto relative z-10">
                <h2 class="text-3xl lg:text-5xl font-bold text-white mb-8 leading-tight">
                    #1 Cloud-Based <span class="text-white/90">Visitor Management Software</span>
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Improve your Workplace Security and Efficiency with Our Cloud-Based Visitor Management Software! Elevate
                    Your Visitor Experience Today – Get a Free Trial Now!
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://qwaiting.com/signup"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-full font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all w-full sm:w-auto justify-center">
                        <span>Book a Free Demo</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Key Features Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Key Features of <span class="text-primary">Qwaiting Visitor Management System</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Feature 1 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 text-blue-600 group-hover:bg-blue-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/pre-registration.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pre-Registration</h3>
                        <p class="text-gray-600">
                            Allow visitors to register online before arrival via smartphone. This speeds up check-ins,
                            reduces wait times, and boosts staff efficiency.
                        </p>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-20 h-20 bg-purple-50 rounded-2xl flex items-center justify-center mb-6 text-purple-600 group-hover:bg-purple-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/out-for-visitors.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Self Check-In & Check-Out</h3>
                        <p class="text-gray-600">
                            Enable visitors to manage their own check-ins and check-outs, minimizing manual recordkeeping
                            and reducing front desk workload.
                        </p>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-20 h-20 bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:bg-green-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/visitor-badge-printing.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Visitor Badge Printing</h3>
                        <p class="text-gray-600">
                            Generate customized visitor badges with details such as name, photo, and visit purpose for
                            secure, easy identification.
                        </p>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-20 h-20 bg-orange-50 rounded-2xl flex items-center justify-center mb-6 text-orange-600 group-hover:bg-orange-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/visitor-screening.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Visitor Screening</h3>
                        <p class="text-gray-600">
                            Enhance security by screening visitor details against approved lists before granting access to
                            the premises.
                        </p>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-20 h-20 bg-indigo-50 rounded-2xl flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/alert-messages-to-hosts.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Host Notifications</h3>
                        <p class="text-gray-600">
                            Send instant SMS, email, or WhatsApp <a href="https://qwaiting.com/products/messaging-services"
                                class="text-primary hover:underline">alerts</a> to hosts when their visitors arrive for
                            seamless coordination.
                        </p>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-20 h-20 bg-teal-50 rounded-2xl flex items-center justify-center mb-6 text-teal-600 group-hover:bg-teal-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/powerful-activity-dashboard.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Activity Dashboard</h3>
                        <p class="text-gray-600">
                            Access a <a href="https://qwaiting.com/solutions/business-intelligence"
                                class="text-primary hover:underline">centralized dashboard</a> that displays visitor
                            traffic, check-in/out status, and security alerts, giving you complete control at a glance.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Benefits Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Enhance Customer Experience with </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Automated Queue Management</span>
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-2">
                    {{-- Benefit 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/improved_customer_experience.png" alt="Improved Customer Experience"
                                    class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Shorter Lines, Bigger Smiles
                            </h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Check in quickly via kiosks or mobile, no paperwork.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Real-time alerts update on wait times and service status.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Track the customer journey to improve service and decision-making</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/flexibility_and_scalability.png"
                                    alt="Flexibility and Scalability" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Built to Flex, Ready to Grow</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Adapts to different industries and business needs.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Scales easily as your business and customer volume increase.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Integrates with other tools to solve queue-related challenges.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/health_and_safety_compliance.png"
                                    alt="Health and Safety Compliance" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Health and Safety Compliance</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Collects real-time feedback after each visit.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Highlights satisfaction trends and improvement areas.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Turns feedback into actionable service improvements.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/customer_feedback.png" alt="Boost Revenue"
                                    class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Trust Built-In</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Customer data is encrypted and securely stored.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Meets industry compliance and privacy standards.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">A centralized system keeps access safe and controlled.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 5 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/enhanced_security.png"
                                    alt="Enhanced Security" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Enhanced Security</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Our automated queue management solution has advanced security measures in place to protect customer information.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">The system ensures adherence to industry rules and requirements, minimizing the danger of non-compliance.</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">All data is stored in a single database with encrypted access controls.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Trusted By Section -->
        <div class="trusted-section">
            <h2>Trusted by 65K+ Businesses Worldwide</h2>
            <p>Join the industry leaders who trust Q-Waiting for their queue management</p>

            <div class="trusted-logos">
                <!-- Placeholder for logos using text/icons for now -->
                <div class="logo-item"> <img src="{{ asset('website/asset/images/daleel_alzowar.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/hospital_at_maayo.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/ministry_of_hajj_and_umrah.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/tatapwer_ddl.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/PSB.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/jtc.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/stuffd.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/a1-business.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/dhl-logo.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/wgs.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/HDT_taxi_logo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore_Polytechnic_logo.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/skechers-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/healthway-medical.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Loreal.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Nirvana.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NTUC_FairPrice.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry_of_Education.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/msq-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MND-singapore.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/current-corporate-signature.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MOH.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cropped-BL.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/logo-dark.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/andy-cr-icon.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cortinawatch.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/subway.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/TianPo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/grab.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Inland-Revenue-Authority.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry-of-Manpower.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NLB.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/ntuc-learning-hub.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Raffles-Medical-Group.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/service-SG.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/SIM-SOC.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore-Medical.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt="">
                </div>
            </div>
        </div>

        {{-- Industries Carousel --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span
                            class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Simplify Queue Management for Every Sector</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="/industries/retail-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Retail</h3>
                        </div>
                    </a>

                    <a href="/industries/healthcare" class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/healthcare.jpg') }}" alt="Healthcare"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Healthcare</h3>
                        </div>
                    </a>

                    <a href="/industries/banking-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/banking.jpg') }}" alt="Banking"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Banking</h3>
                        </div>
                    </a>

                    <a href="/industries/public-sector-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/public.jpg') }}" alt="Public"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Public</h3>
                        </div>
                    </a>
                </div>

                <div class="text-center mt-12">
                    <a href="/industries"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1 transition-all">
                        <span>See All Industries</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="py-24 bg-gray-50 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">Frequently Asked Questions</h2>

                <div class="space-y-4" x-data="{ active: null }">
                    {{-- FAQ 1 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 1 ? null : 1"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">What is a visitor management system (VMS)?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 1 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 1" x-collapse class="px-6 pb-6 text-gray-600">
                            This system manages the arrival and departure of visitors, ensuring their safety on the premises. It also ensures proper tracking, access management, and the safety of both visitors and employees.
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 2 ? null : 2"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">Why is a visitor management system important today?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 2 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 2" x-collapse class="px-6 pb-6 text-gray-600">
                            A VMS helps businesses track, manage, and secure every visitor entry. It replaces outdated paper logs, strengthens workplace security, enhances first impressions, and saves staff time by automating check-ins.
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 3 ? null : 3"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">Can I customize the check-in process for different visitor types?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 3 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 3" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Qwaiting allows full customization for vendors, clients, employees, or contractors. You can define entry flows, screening questions, badge styles, and approval processes to match your policies. 
                        </div>
                    </div>

                    {{-- FAQ 4 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 4 ? null : 4"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">Will a visitor management system reduce front-desk workload?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 4 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 4" x-collapse class="px-6 pb-6 text-gray-600">
                            Absolutely. Qwaiting automates check-ins, badge printing, notifications, and visitor logging. This reduces manual work, cuts paperwork, and lets staff focus on delivering a welcoming experience.
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 5 ? null : 5"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">Is visitor data stored securely?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 5 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 5" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Qwaiting follows enterprise-grade security protocols with AES 256-bit encryption and GDPR-compliant data handling, ensuring all visitor information remains safe and confidential.
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 6 ? null : 6"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">What types of businesses can benefit from a VMS?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 6 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 6" x-collapse class="px-6 pb-6 text-gray-600">
                             Qwaiting is used in corporate offices, hospitals, government facilities, educational institutions, and retail environments—anywhere visitor check-ins, security, and compliance matter.
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection