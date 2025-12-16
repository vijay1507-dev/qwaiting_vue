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
                            <span class="text-primary font-semibold text-sm">Queue Management Solution</span>
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                            Fast, Flexible <span class="text-primary">Queue Management Solutions</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                            Qwaiting’s queue management solutions help businesses optimize customer flow, minimize wait times, and deliver consistent, high-quality service across all locations.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="/signup"
                                class="group relative inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold overflow-hidden transition-all hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1">
                                <span class="relative z-10">Free Consultancy</span>
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
                            <a href="/request-demo"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all hover:-translate-y-1">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    {{-- Right Image --}}
                    <div class="relative">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://qwaiting.com/frontimg/queue_management_solution.png"
                                alt="Queue Management Solution" class="w-full">
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

        <!-- Why Us Section -->
        <section class=" bg-white">
            <!-- Title -->
            <h2 class="text-center text-5xl font-bold text-gray-800 mt-12">
                Enterprise-Focused <span class="text-primary">Queue Management Solutions</span>
            </h2>

            <!-- Main Container -->
            <div class="bg-white p-8 md:p-14 grid md:grid-cols-2 gap-10 items-center">

                <!-- Left Feature List -->
                <div class="space-y-6">

                <p class="text-md">From online bookings to walk-ins, Qwaiting allows businesses to streamline service operations, eliminate long wait times, and deliver exceptional customer service across every touchpoint. Our queue management system is designed for scalability and optimized for performance, improving every stage of the customer journey. Making sure that the team is productive and that customers are happy.</p>

                    <!-- Item 1 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-2 bg-blue-100 rounded-lg text-blue-600 text-md">
                            ✔
                        </div>
                        <div>
                            <p class="text-gray-600 text-md">
                                Automate queue flow to reduce manual workloads
                            </p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-2 bg-purple-100 rounded-lg text-purple-600 text-md">
                            ✔
                        </div>
                        <div>
                            <p class="text-gray-600 text-md">
                                Deliver real-time SMS and email notifications
                            </p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-2 bg-red-100 rounded-lg text-red-500 text-md">
                            ✔
                        </div>
                        <div>
                            <p class="text-gray-600 text-md">
                                Manage customer data across all branches in one place
                            </p>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-2 bg-green-100 rounded-lg text-green-600 text-md">
                            ✔
                        </div>
                        <div>
                            <p class="text-gray-600 text-md">
                                Use a centralized dashboard to get to performance analytics
                            </p>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-2 bg-yellow-100 rounded-lg text-yellow-600 text-md">
                            ✔
                        </div>
                        <div>
                            <p class="text-gray-600 text-md">
                                Easily work with the tools you already use for business
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Right Image -->
                <div class="rounded-3xl overflow-hidden shadow-lg">
                    <img src="https://qwaiting.com/frontimg/minimize_the_wait_with_queue_management_solution.png" alt="Why Choose Us"
                        class="w-full h-full object-cover">
                </div>

            </div>
        </section>

    {{-- How Queue Management Works --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 overflow-hidden">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold leading-tight mb-4">
                        How We Keep Customers Moving 
                    </h2>
                    <p class="text-xl text-gray-600">Step into the Next Era of Queue Management - Organised and Fast</p>
                </div>

                {{-- Vertical Timeline with Alternating Layout --}}
                <div class="relative">
                    {{-- Center Line --}}
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-primary via-purple-400 to-primary hidden lg:block">
                    </div>

                    <div class="space-y-16">
                        {{-- Step 1 - Left Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center mb-40" data-aos="fade-right">
                            <div class="lg:text-left lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-start mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            1
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Multiple Check-in Options</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Multiple Check-in Options</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Our solution helps customers to join the queue in multiple ways online, through the mobile app, or via self-service kiosks anytime, anywhere.
                                    </p>
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Avoid delays and frustration</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Access anytime, from any device</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Convenient and faster online appointments</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Flexible check-in options</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/multiple_queue_entry_options.png" alt="Customer Arrival"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 2 - Right Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center mb-40" data-aos="fade-left">
                            <div class="lg:order-2 lg:pl-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            2
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Provide estimated wait time</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Provide estimated wait time</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Qwaiting provides your customers with perceived wait times to keep everyone informed of their wait times to avoid any confusion.
                                    </p>
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Shows real-time wait updates</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Reduces customer frustration</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Builds trust and transparency</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Improves overall experience</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/provide_estimated_wait_times.png" alt="Provide Estimated Wait Times"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2 w-100 h-100">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-purple-500 rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 3 - Left Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center mb-40" data-aos="fade-right">
                            <div class="lg:text-left lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-start mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            3
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Notification and Customer Service</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Notification and Customer Service</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Our software keeps your customers in the loop with real-time notifications while streamlining customer service for faster, smoother experiences.
                                    </p>
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Instant SMS or email alerts</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Notify customers when ready</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Reduce service desk load</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Improve response time</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/notification_and_customer_service.png" alt="Notification and Customer Service"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-500 rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 4 - Right Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-left">
                            <div class="lg:order-2 lg:pl-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            4
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Feedback Collection</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Feedback Collection</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Easily gather accurate customer feedback right after service, to help you improve continuously and meet customer expectations.
                                    </p>
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Collect insights in real-time</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Understand service performance gaps</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Improve with customer input</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Boost satisfaction and loyalty</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-amber-200 to-orange-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/feedback_collection.png" alt="Service Call"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-amber-500 rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        {{-- Cloud-Based Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Experience Our Cloud-based Queue Management
                </h2>
                <p class="text-xl text-white/90 leading-relaxed mb-8">
                    Our cloud-based queue management system makes it simple to create smooth, connected customer journeys, from online appointment booking and virtual check-ins to real-time updates, service delivery, and post-visit feedback, ensuring a smooth visitor experience.
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Book a Free Demo</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Features That Redefine </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Queue Management</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8">Maximize efficiency and deliver exceptional customer service with a feature-rich waiting line solution tailored for modern businesses.</p>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Feature 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/multi_channel_integration.svg" alt="Virtual Queuing"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Multi-Channel Integration</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Seamlessly connects across web, on mobile, at kiosks, and social media platforms. Wherever a customer is, they can join a queue online and get queue updates in real time.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/virtual_queues.svg" alt="Real-Time Analytics"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Virtual Queues</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Offer customers the option to wait in a digital queue line using their phones so that they can wait anywhere conveniently. This minimizes physical congestion and keeps your operations organized.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/customer_notifications.svg"
                                    alt="Customer Notifications" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Customer Notifications</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Automatically update customers with real-time alerts via SMS, email, or app, sharing their queue position, estimated wait time, and turn reminders.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/customize.svg"
                                    alt="Appointment Scheduling" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Customization</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                The dashboard and queues views can be customized to match your brand identity. Easily add logos, colors, and workflows that support your business.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/queue_analytics.svg" alt="Queue Analytics"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Queue Analytics</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Track queue performance, staff productivity, and the number of people waiting. Gain clear insights and data reports to make operations and service delivery better.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/multilingual_dashboard.svg" alt="Multilingual Dashboard"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Multilingual Dashboard</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Serve customers in every corner of the world with a multilingual dashboard. The customers can choose their preferred or native language to communicate conveniently.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Benefits Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
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

        {{-- Reviews Section --}}
        <section class="py-20 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="max-w-4xl mx-auto mb-16 text-center">
                    <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                        Reviews
                    </h2>
                </div>

                <div class="flex flex-wrap justify-center gap-8 mb-16">
                    {{-- Review 1 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.5/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/capterra.png" alt="Capterra" class="h-20 w-30">
                    </div>

                    {{-- Review 2 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.5/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/Software.png" alt="GetApp" class="h-25 w-25">
                    </div>

                    {{-- Review 3 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.2/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/software_advice.png" alt="Software Advice" class="h-20 w-40">
                    </div>

                    {{-- Review 4 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.3/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/finance.png" alt="G2" class="h-20 w-40">
                    </div>

                    {{-- Review 5 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.8/5</span>
                        </div>
                        <img src="https://assets.goodfirms.co/badges/normal-badge/salon-software.svg" alt="SourceForge" class="h-20 w-30">
                    </div>
                </div>
            </div>
        </section>

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

        {{-- Why Choose Us --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- LEFT IMAGE --}}
                <div>
                    <div class="rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('website/asset/images/our_vision.jpg') }}" alt="Why Choose Us"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                {{-- RIGHT CONTENT --}}
                <div>

                    <h2 class="text-4xl font-bold text-primary leading-tight mb-4">
                        WHY CHOOSE US
                    </h2>

                    <p class="text-gray-600 mb-10">
                        Qwaiting is a leading provider of queue management solutions, trusted by businesses
                        in over 120+ countries worldwide to solve complex customer flow challenges.
                        Our platform simplifies and optimizes operations for faster, smoother, and more organized
                        customer experiences.
                    </p>

                    {{-- FEATURES GRID --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-8">

                        {{-- Feature 1 --}}
                        <div class="flex gap-4">
                            <div class="border border-gray-300 rounded-lg p-4 relative">
                                <div class="absolute bottom-0 left-0 h-1 w-full bg-primary rounded-b-lg"></div>

                                {{-- Icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.75 6.75h16.5M4.5 12h15M6 17.25h12" />
                                </svg>
                            </div>

                            <div class="flex items-center">
                                <h4 class="font-bold text-gray-900 mb-1">Reduce Wait Times</h4>
                            </div>
                        </div>

                        {{-- Feature 2 --}}
                        <div class="flex gap-4">
                            <div class="border border-gray-300 rounded-lg p-4 relative">
                                <div class="absolute bottom-0 left-0 h-1 w-full bg-primary rounded-b-lg"></div>

                                {{-- Icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6v6l4 2" />
                                </svg>
                            </div>

                            <div class="flex items-center">
                                <h4 class="font-bold text-gray-900 mb-1">Organize Crowds Smartly</h4>
                            </div>
                        </div>

                        {{-- Feature 3 --}}
                        <div class="flex gap-4">
                            <div class="border border-gray-300 rounded-lg p-4 relative">
                                <div class="absolute bottom-0 left-0 h-1 w-full bg-primary rounded-b-lg"></div>

                                {{-- Icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            <div class="flex items-center">
                                <h4 class="font-bold text-gray-900 mb-1">Boost Customer Satisfaction</h4>
                            </div>
                        </div>

                        {{-- Feature 4 --}}
                        <div class="flex gap-4">
                            <div class="border border-gray-300 rounded-lg p-4 relative">
                                <div class="absolute bottom-0 left-0 h-1 w-full bg-primary rounded-b-lg"></div>

                                {{-- Icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 5a7 7 0 100 14 7 7 0 000-14z" />
                                </svg>
                            </div>

                            <div class="flex items-center">
                                <h4 class="font-bold text-gray-900 mb-1">Adaptable for Every Business</h4>
                            </div>
                        </div>

                        {{-- Feature 5 --}}
                        <div class="flex gap-4">
                            <div class="border border-gray-300 rounded-lg p-4 relative">
                                <div class="absolute bottom-0 left-0 h-1 w-full bg-primary rounded-b-lg"></div>

                                {{-- Icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>

                            <div class="flex items-center">
                                <h4 class="font-bold text-gray-900 mb-1">Easy Integration, Powerful Insights</h4>
                            </div>
                        </div>

                        {{-- Feature 6 --}}
                        <div class="flex gap-4">
                            <div class="border border-gray-300 rounded-lg p-4 relative">
                                <div class="absolute bottom-0 left-0 h-1 w-full bg-primary rounded-b-lg"></div>

                                {{-- Icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 7.5l9 4.5 9-4.5M3 12l9 4.5 9-4.5M3 16.5L12 21l9-4.5" />
                                </svg>
                            </div>

                            <div class="flex items-center">
                                <h4 class="font-bold text-gray-900 mb-1">Secure and Scalable</h4>
                            </div>
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


        {{-- Blog Section --}}
        <section class="py-20 bg-white">
            <div class="container px-4 mx-auto">
                <div class="max-w-4xl mx-auto mb-16 text-center">
                    <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                        Latest Posts From the Blog
                    </h2>
                </div>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Blog Post 1 --}}
                    <a href="https://blog.qwaiting.com/qr-code-queue-management-system-a-game-changer-for-businesses/"
                        class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/07/QR-Code-Queue-Management-System-A-Game-Changer-for-Businesses.jpg"
                            alt="QR Code Queue Management System: A Game-Changer for Businesses" class="w-full h-48 object-cover rounded-2xl mb-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                            QR Code Queue Management System: A Game-Changer for Businesses
                        </h3>
                        <p class="text-gray-600">
                           Imagine a world where waiting in line is a thing of the past & customers can effortlessly avail of desired services without hassle...
                        </p>
                    </a>

                    {{-- Blog Post 2 --}}
                    <a href="https://blog.qwaiting.com/online-appointment-booking-software-take-your-business-to-the-next-level/"
                        class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/08/Online-Appointment-Booking-Software_-Take-your-Business-to-the-Next-Level-2.jpg"
                            alt="Patient Flow Management" class="w-full h-48 object-cover rounded-2xl mb-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                            Online Appointment Booking Software: Take your Business to the Next Level
                        </h3>
                        <p class="text-gray-600">
                            Businesses that rely on in-person appointment scheduling are lagging behind and facing various problems...
                        </p>
                    </a>

                    {{-- Blog Post 3 --}}
                    <a href="https://blog.qwaiting.com/customer-feedback-system-the-key-to-an-exceptional-customer-experience/"
                        class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/06/Customer-Feedback-system.jpg"
                            alt="Customer Feedback System: The Key To An Exceptional Customer Experience"
                            class="w-full h-48 object-cover rounded-2xl mb-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                            Customer Feedback System: The Key To An Exceptional Customer Experience
                        </h3>
                        <p class="text-gray-600">
                            Businesses often face the challenge of delivering outstanding customer experiences while efficiently managing queues...
                        </p>
                    </a>
                </div>
            </div>
        </section>


    </div>

    {{-- Add AOS Animation Library --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
@endsection