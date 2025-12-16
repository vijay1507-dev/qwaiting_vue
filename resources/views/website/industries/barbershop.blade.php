@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-gray-50">

        {{-- Modern Hero Section --}}
        <section class="relative pt-24 pb-32 px-4 sm:px-6 lg:px-8 overflow-hidden">
            {{-- Background Elements --}}
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-purple-200/30 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    {{-- Left Content --}}
                    <div class="space-y-8">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full border border-primary/20">
                            <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                            <span class="text-primary font-semibold text-sm">Barbershop Solution</span>
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                            Barbershop Queue Management System That Stops <span class="text-primary">Walk-Outs</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                            Turn walkaways into loyal customers. Manage your barber queue digitally, let customers wait anywhere, and serve 30% more clients daily.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="/signup"
                                class="group relative inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold overflow-hidden transition-all hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1">
                                <span class="relative z-10">Start Free Trial</span>
                                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3">
                                    </path>
                                </svg>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </a>
                            <a href="/solutions/queue-management-solution"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all hover:-translate-y-1">
                                View Solutions
                            </a>
                        </div>
                    </div>

                    {{-- Right Image --}}
                    <div class="relative">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://qwaiting.com/frontimg/barbershop-queue-management-system.png"
                                alt="Barbershop Queue Management System" class="w-full">
                        </div>
                        <div
                            class="absolute -top-6 -right-6 w-32 h-32 bg-gradient-to-br from-primary to-purple-600 rounded-3xl opacity-20 blur-2xl">
                        </div>
                        <div
                            class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-blue-400 to-primary rounded-3xl opacity-20 blur-2xl">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Stats Grid --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Improve the customer </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">service process</span>
                    </h2>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-purple-600/5 rounded-3xl transform group-hover:scale-105 transition-transform duration-300"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-purple-100 hover:border-purple-200 transition-all">
                            <div class="text-5xl font-bold bg-primary bg-clip-text text-transparent mb-2">40%</div>
                            <p class="text-gray-600 font-medium">Reduction in wait times</p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-purple-600/5 rounded-3xl transform group-hover:scale-105 transition-transform duration-300"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-purple-100 hover:border-purple-200 transition-all">
                            <div class="text-5xl font-bold bg-primary bg-clip-text text-transparent mb-2">92%</div>
                            <p class="text-gray-600 font-medium">Customer satisfaction Rate</p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-purple-600/5 rounded-3xl transform group-hover:scale-105 transition-transform duration-300"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-purple-100 hover:border-purple-200 transition-all">
                            <div class="text-5xl font-bold bg-primary bg-clip-text text-transparent mb-2">35%</div>
                            <p class="text-gray-600 font-medium">More Customers served daily</p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-purple-600/5 rounded-3xl transform group-hover:scale-105 transition-transform duration-300"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-purple-100 hover:border-purple-200 transition-all">
                            <div class="text-5xl font-bold bg-primary bg-clip-text text-transparent mb-2">60%</div>
                            <p class="text-gray-600 font-medium">Improvement in barber efficiency</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Us Section -->
        <section class="bg-gray-50 py-8">
            <!-- Title -->
            <h2 class="text-center text-3xl font-bold text-gray-800 mt-12">
                The Problems Every Barber Shop Faces
            </h2>

            <!-- Main Container -->
            <div class="p-8 md:p-14 grid md:grid-cols-2 gap-10 items-center">

                <!-- Left Feature List -->
                <div class="space-y-6">

                    <!-- Item 1 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-blue-100 rounded-lg text-blue-600 text-2xl">
                            
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Crowded Waiting Areas:</h3>
                            <p class="text-gray-600 text-sm">
                                Customers walk out when they can't estimate the real wait time
                            </p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-purple-100 rounded-lg text-purple-600 text-2xl">
                            
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Constant Interruptions:</h3>
                            <p class="text-gray-600 text-sm">
                                "How much longer?" disrupts your current cut every 5 minutes
                            </p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-red-100 rounded-lg text-red-500 text-2xl">
                            
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Lost Revenue & No-Shows:</h3>
                            <p class="text-gray-600 text-sm">
                                Walk-outs and missed appointments reduce daily revenue
                            </p>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-green-100 rounded-lg text-green-600 text-2xl">
                            
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Inefficient Booking Overlaps:</h3>
                            <p class="text-gray-600 text-sm">
                                Double bookings and skipped turns create chaos and unhappy clients
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Right Image -->
                <div class="rounded-3xl overflow-hidden shadow-lg">
                    <img src="https://qwaiting.com/frontimg/the-problems-every-barber-shop-faces.png" alt="The Problems Every Barber Shop Faces"
                        class="w-full h-full object-cover">
                </div>

            </div>
        </section>

        {{-- Benefits Section --}}
        <section class="py-20 bg-white">
            <div class="container px-4 mx-auto">
                <div class="space-y-24">
                    <h2 class="text-3xl lg:text-4xl font-bold leading-tight text-center mb-20">What Qwaiting's Modern Barber Queue System Delivers</h2>

                    {{-- Unified Booking & Walk-In Management --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/unified-booking-and-walk-in-management.png" alt="Unified Booking & Walk-In Management"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2 lg:order-1">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Unified Booking & Walk-In Management</h3>
                            <p class="text-gray-600 text-lg mb-4">Handle online bookings and in-store clients in one smart queue. Your staff can view, merge, and manage all clients in a single smart queue.</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Automatically integrate appointment and on-site arrivals</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Real-time updates for barbers and customers</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Prevent double bookings and long queues</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Manage queues efficiently with smart allocation</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Faster Check-In --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/faster-check-In.png"
                                    alt="Built for Single Shops & Multi-Location Chains"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Faster Check-In</h3>
                            <p class="text-gray-600 text-lg mb-4">Clients can register via QR code, kiosk, tablet, or mobile link, reducing front-desk delays and improving service speed</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Self check-in from any device</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Instant registration for new or returning clients</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">No more clipboard sign-ups or manual entries</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Seamless Client Communication --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/seamless-client-communication.png" alt="Seamless Client Communication"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2 lg:order-1">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Seamless Client Communication</h3>
                            <p class="text-gray-600 text-lg mb-4">Keep your clients updated through SMS or WhatsApp alerts so they always know when it's their turn, reducing crowding in the waiting area.</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Automated reminders to reduce no-shows</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Live wait-time and status updates</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Personalized messages for better engagement</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Priority & VIP Handling --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/priority-and-vip-handling.png"
                                    alt="Priority & VIP Handling"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Priority & VIP Handling</h3>
                            <p class="text-gray-600 text-lg mb-4">Give premium clients the experience they expect with priority access or fast-track service options.</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">VIP or membership-based prioritization</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Loyalty-based fast-lane features</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Improve satisfaction for high-value customers</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Real-Time Insights for Smart Barber Allocation --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/real-time-insights-for-smart-barber-allocation.png" alt="Real-Time Insights for Smart Barber Allocation"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2 lg:order-1">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Real-Time Insights for Smart Barber Allocation</h3>
                            <p class="text-gray-600 text-lg mb-4">Improve barbershop efficiency by using intelligent client routing and real-time analytics to streamline operations and enhance service flow</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Auto-assign clients to available barbers using live queue insights</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Track peak hours, staff performance, and service durations</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Reduce idle time and traffic bottlenecks</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Identify repeat customers and uncover new revenue opportunities</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Built for Single Shops & Multi-Location Chains --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/priority-and-vip-handling.png"
                                    alt="Built for Single Shops & Multi-Location Chains"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Built for Single Shops & Multi-Location Chains</h3>
                            <p class="text-gray-600 text-lg mb-4">The system is flexible enough to meet the needs of an individual barbershop, a boutique salon, or a chain of franchises.</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Manage all locations from one dashboard</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Unified performance analytics</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Centralized control for managers and teams</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Features
                            of</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Queue
                            Management System for Cannabis Dispensaries</span>
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    {{-- Feature 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/single-chair-boutique.svg" alt="Single-Chair Boutique"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Single-Chair Boutique</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Manage bookings, walk-ins, and send instant updates when the chair is free.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/multi-chair-barbershops.svg"
                                    alt="Multi-Chair Barbershops" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Multi-Chair Barbershops</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Route clients to available barbers or stylists and balance workloads with real-time queue insights.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/franchise-chains.svg"
                                    alt="Franchise Chains" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Franchise Chains</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Monitor multiple locations, unify service flow, and access centralised analytics.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/vip-and-membership-service.svg"
                                    alt="VIP & Membership Service" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">VIP & Membership Service</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Offer priority queues, fast-track services, and premium booking options.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Choose Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">

                {{-- Heading --}}
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Why Barbers Choose </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">
                           Qwaiting Over Others
                        </span>
                    </h2>
                </div>

                {{-- 2 Column Layout --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    {{-- LEFT COLUMN – Feature List --}}
                    <div class="space-y-6">

                    {{-- Smart Flow Management --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-blue-50 rounded-xl">
                            {{-- Icon: Arrows for flow --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.25 6.75L21 10.5l-3.75 3.75M3 6.75h14.25M6.75 17.25L3 13.5l3.75-3.75M21 17.25H6.75" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Smart Flow Management</h3>
                            <p class="text-gray-600 text-sm">Serve more clients daily with automated routing that reduces idle chair time.</p>
                        </div>
                    </div>

                    {{-- Easy to Use --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-purple-50 rounded-xl">
                            {{-- Icon: Checkmark for ease --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Easy to Use</h3>
                            <p class="text-gray-600 text-sm">User-friendly for both barbers and clients.</p>
                        </div>
                    </div>

                    {{-- Effortless Compatibility --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-green-50 rounded-xl">
                            {{-- Icon: Puzzle piece for compatibility --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M11 5.882A2.882 2.882 0 118.118 3 2.882 2.882 0 0111 5.882zm2 4.353h3.765a2.5 2.5 0 110 5H13v3.765a2.5 2.5 0 11-5 0V15H4.235a2.5 2.5 0 110-5H8V6.235a2.5 2.5 0 115 0V10.235z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Effortless Compatibility</h3>
                            <p class="text-gray-600 text-sm">Works seamlessly with existing hardware and CRM.</p>
                        </div>
                    </div>

                    {{-- Tailored to Your Style --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-amber-50 rounded-xl">
                            {{-- Icon: Adjustments for customization --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-amber-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M10.5 6h9m-9 12h9m-15-6h15M6 6v.01M6 18v.01M6 12v.01" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Tailored to Your Style</h3>
                            <p class="text-gray-600 text-sm">Fully customizable for your brand and workflow.</p>
                        </div>
                    </div>

                    {{-- Works on Any Device --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-teal-50 rounded-xl">
                            {{-- Icon: Devices --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-teal-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.75 17h4.5m-8.25 4.5h12a2.25 2.25 0 002.25-2.25V5.25A2.25 2.25 0 0018 3H6a2.25 2.25 0 00-2.25 2.25v14A2.25 2.25 0 006 21.5zM8.25 3v-.75A.75.75 0 019 1.5h6a.75.75 0 01.75.75V3" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Works on Any Device</h3>
                            <p class="text-gray-600 text-sm">Operates smoothly on mobiles, tablets, kiosks, and desktops.</p>
                        </div>
                    </div>

                </div>


                    {{-- RIGHT COLUMN – Hero Image --}}
                    <div class="flex justify-center">
                        <div class="rounded-3xl overflow-hidden shadow-lg border-4 border-blue-200">
                            <img src="https://qwaiting.com/frontimg/why-barbers-choose-qwaiting-over-others.png" class="w-full h-full object-cover" alt="Why Choose Us Image">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="py-20 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="max-w-3xl mx-auto">
                    <h2 class="mb-12 text-3xl font-bold text-center text-gray-900 md:text-4xl">
                        Frequently Asked Questions
                    </h2>
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How does a barbershop queue system work?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                A barbershop or salon queue system organizes customers into a digital line when they book an appointment or arrive at the shop. Clients can join via kiosk, QR code, or mobile link and receive real-time updates on their position and estimated wait time. The system then notifies them automatically when it’s their turn, ensuring faster service and a smoother flow.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can I combine online bookings and walk-in clients in the same queue?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Yes. A smart barbershop queue system like Qwaiting allows you to manage online bookings and walk-in clients in a single unified queue, ensuring better control, fair scheduling, and a seamless flow for both staff and customers.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Do clients need to download an app to check-in?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                No. Customers can check in easily via multiple channels, QR code, web link, kiosk, or mobile without downloading any app.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How does it reduce wait times for customers?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                The system optimizes service flow using real-time data. It automatically routes clients to available barbers or stylists, predicts busy hours, and keeps queues balanced.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can I send SMS or app notifications to clients while they wait?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Absolutely. The system sends automated SMS or WhatsApp updates to inform customers about their queue status, estimated wait time, or when their turn is approaching.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How do I handle “no-show” appointments?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                The system sends automated reminders before appointments and updates the queue if a client doesn’t confirm. This minimizes no-shows and lets you quickly fill empty slots with waiting customers.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can it scale across multiple barber shops or salons?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Yes. Qwaiting supports single or multi-location operations, allowing you to manage queues, track performance, and monitor staff efficiency across all branches from one dashboard.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">What analytics and reports are available?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                You get real-time insights on wait times, staff performance, service duration, customer satisfaction, and footfall trends helping you make smarter business decisions.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Does it integrate with my appointment booking software or CRM?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                               Yes. Qwaiting offers easy integration with popular booking tools, CRMs, and POS systems, ensuring all customer and appointment data stays in sync automatically.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can I prioritise VIP clients or use fast-track passes?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                               Yes. You can define custom queue rules to prioritize VIPs, memberships, or special services offering premium customers faster access without disrupting your workflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Final CTA --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Ready to Cut the Wait at Your Barbershop?
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Offer quick service, eliminate no-shows, and maintain full booked chairs through modern queue automation. Your clients deserve a seamless visit, and so do you
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Try it for free</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>

                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Contact Sales</span>
                    
                </a>
            </div>
        </section>

    </div>
@endsection