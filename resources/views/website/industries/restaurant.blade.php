@extends('website.layout.website')

@section('title', 'Restaurant Queue Management System - Qwaiting')
@section('description', 'Efficiently streamline restaurant queues with our advanced Restaurant Queue Management System. Enhance customer experience & optimize service flow effortlessly.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                    <h1 class="mb-6 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Restaurant Queue Management System
                    </h1>
                    <p class="mb-8 text-lg leading-relaxed text-gray-600 md:text-xl">
                        Turning waiting time into quality time– that's the magic of our restaurant queue management system. It ensures that every guest gets the perfect touch of satisfaction and a memorable experience.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="/signup"
                            class="px-8 py-4 text-base font-semibold text-white transition-all duration-300 bg-purple-600 rounded-full hover:bg-purple-700 hover:shadow-lg hover:-translate-y-1">
                            Start Your Free Trial
                        </a>
                        <a href="/solutions/queue-management-solution"
                            class="px-8 py-4 text-base font-semibold text-purple-600 transition-all duration-300 bg-purple-50 rounded-full hover:bg-purple-100 hover:shadow-md">
                            Solutions
                        </a>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div class="relative">
                        <div
                            class="absolute top-0 right-0 w-full h-full transform translate-x-4 translate-y-4 bg-purple-100 rounded-3xl -z-10">
                        </div>
                        <img src="https://qwaiting.com/frontimg/restaurant-queue-management-system.png"
                            alt="Restaurant Queue Management System"
                            class="relative w-full rounded-3xl shadow-2xl animate-fade-in-up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Customer Journey Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="space-y-24">
                <h2 class="mb-6 text-3xl font-bold leading-tight md:text-4xl text-center mb-10">
                    Queue System That Puts You <span class="text-primary">First in Line for Taste</span>
                </h2>
                <p class="max-w-4xl mx-auto mb-10 text-lg mb-30">We help you to make the guest experience memorable, even before they reach your restaurant or hotel. Our system reduces wait times, manages walk-ins and reservations smoothly, and notifies guests via SMS.</p>
                {{-- Guest Check-in --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/guest-check-in.png" alt="Guest Check-in"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Guest Check-in:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Guests arrive and self-register using mobile apps or scanning QR
                                    codes.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Select the service, provide basic information and items from the
                                    food & drink menu.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Automatically receive a digital or physical queue number upon
                                    confirmation.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Update the Guest --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/update-the-guest.png" alt="Update the Guest"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Guest:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Digital displays or mobile apps show real-time queue
                                    status.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Automated notifications via SMS or mobile apps keep guests
                                    informed.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Transparent restaurant waitlist updates for a positive
                                    experience.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Quick Service --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/quick-services.png" alt="Quick Service"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Quick Service:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Payment convenience through any payment gateway.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Integration of loyalty programs for priority seating of select
                                    guests.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Closure and feedback processes enhance the overall guest
                                    experience.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cloud Based Section --}}
    <section class="py-20 bg-primary text-white">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold leading-tight md:text-4xl">
                #1 Cloud-Based Queue Management System
            </h2>
            <p class="max-w-3xl mx-auto mb-10 text-lg text-white">
                Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue management
                software helps businesses enhance your productivity and reputation by satisfying your customers.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-purple-900 transition-all duration-300 bg-white rounded-full hover:bg-gray-100 hover:shadow-lg hover:-translate-y-1">
                Book a Free Demo
            </a>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Features of Queue Management System
                        </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">for Restaurants or Hotels</span>
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Feature 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="absolute top-4 right-4 text-8xl font-bold text-blue-200/30 leading-none">01</div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/reservation-system.svg"
                                    alt="Continuous Queue Monitoring" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Reservation System</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Allow guests to make advance bookings for tables in restaurants and hotel rooms anytime, from any device, preventing long waiting hours for services.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="absolute top-4 right-4 text-8xl font-bold text-purple-200/30 leading-none">02</div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/staff-dashboard.svg" alt="Staff Dashboard"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Staff Dashboard</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Our software has an easy-to-use activity dashboard for restaurant or hotel staff to monitor and manage the queue efficiently.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="absolute top-4 right-4 text-8xl font-bold text-green-200/30 leading-none">03</div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/multi-location-support.svg"
                                    alt="Multi-Location Support" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Multi-Location Support</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                The restaurant queuing system manages queue lineups across multiple locations or branches over a single dashboard.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="absolute top-4 right-4 text-8xl font-bold text-pink-200/30 leading-none">04</div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/customer-feedback-system.svg" alt="Customer Feedback System"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Customer Feedback System</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Integration with a feedback system to collect customer opinions and improve service quality for memorable customer experience.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="absolute top-4 right-4 text-8xl font-bold text-amber-200/30 leading-none">05</div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/queue-analytics.svg" alt="Queue Analytics"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Queue Analytics</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Data analytic feature helps to track and analyze queue patterns, waiting times, and peak hours for better staff allocation over different sections.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="absolute top-4 right-4 text-8xl font-bold text-indigo-200/30 leading-none">06</div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/customizations.svg" alt="Gather Customer Feedback"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Customization</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Customization options for F&B businesses to tailor the system according to their specific needs and branding.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    {{-- Benefits Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Benefits of Restaurant Queuing System
                </h2>
            </div>

            <div class="space-y-16">
                {{-- Benefit 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/real-time-table-availability.png"
                            alt="Real-time Table Availability" class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Real-time Table Availability</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Restaurant staff can instantly view the current status of every
                                    table, which helps to optimally use the dining space.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Our software identifies which tables are about to be vacant to
                                    prepare for the next seating, minimizing downtime.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Make informed decisions based on current occupancy or based on
                                    historical data.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/remote-queue-management.png" alt="Remote Queue Management"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Remote Queue Management</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Manage queues efficiently from any location of any
                                    branch.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Provide a high level of customer convenience by allowing remote
                                    queue access.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Monitor and adjust the queue dynamically to enhance the overall
                                    customer experience.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 3 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/alerts-and-communication.png" alt="Alerts and Communication"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Alerts and Communication</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Timely notifications via SMS or Email for table availability or
                                    order readiness.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Facilitate communication between staff members.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Increased responsiveness by quickly addressing the customer
                                    needs and adapting to changes in the previous order.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 4 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/POS-integration-for-seamless-connectivity.png"
                            alt="POS Integration for Seamless Connectivity" class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">POS Integration for Seamless Connectivity</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">POS integration simplifies the order placement process with any
                                    payment getaway.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Accurate billing process that minimizes errors with synchronized
                                    POS and queuing data.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Improved efficiency by speeding up service by connecting
                                    front-end and back-end operations.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 5 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/queue-from-anywhere.png" alt="Queue from Anywhere"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Queue from Anywhere</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Customers can join the line from anywhere in the world, which
                                    reduces wait times.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Customers have the flexibility to plan their dining experience
                                    at their convenience.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Improves restaurant operations and ensures a more organized
                                    service.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Use Cases Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Where We Can Use This 
                        <span class="text-primary">Queue Display System?</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Feature Card 1 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        {{-- Purple Gradient Header with Decorative Pattern --}}
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            {{-- Decorative circles pattern --}}
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>

                        </div>
                        {{-- Icon Circle --}}
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/cafes.svg" class="w-15 h-15">
                            </div>
                        </div>

                        {{-- Card Content --}}
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Cafes</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                In cafes, a queue display system facilitates quick order placement. Customers can join a virtual queue, place their orders in advance, and then pick up their items without waiting in a physical line.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 2 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        {{-- Icon Circle --}}
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/pubs-and-bars.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Pubs and Bars</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                For establishments where customers generally order drinks at the bar, a digital queue system can minimize wait times by allowing customers to place their orders remotely.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 3 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        {{-- Icon Circle --}}
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/food-courts.svg" class="w-15 h-15">
                            </div>
                        </div>

                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Food Courts</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Some food courts let customers order from different stalls. Our F&B queue system helps manage orders to make sure all items are ready for pickup at the same time.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 4 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        {{-- Icon Circle --}}
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/hawkers.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Hawkers</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Organize queues for popular food stalls, minimize customer wait times, and enhance operational efficiency.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 5 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        {{-- Icon Circle --}}
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/banquet-halls.svg" class="w-15 h-15">
                            </div>
                        </div>

                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Banquet Halls</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Manage guest arrivals and check-ins for events, coordinate seating arrangements for large gatherings, and ensure an organized experience during functions.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 6 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        {{-- Icon Circle --}}
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/fine-dining-establishments.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Fine Dining Establishments</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                               Guests can customize their dining experience by specifying preferences or dietary restrictions before arriving, allowing the restaurant to provide a more personalized service.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    {{-- Empower Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl lg:text-3xl font-bold text-text-dark mb-6">
                    Empower Your Customers to Wait Wherever They Want With Qwaiting Solutions
                </h2>
                <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="">
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
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore_Polytechnic_logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/skechers-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/healthway-medical.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Loreal.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Nirvana.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NTUC_FairPrice.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry_of_Education.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/msq-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MND-singapore.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/current-corporate-signature.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MOH.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cropped-BL.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/logo-dark.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/andy-cr-icon.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cortinawatch.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/subway.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/TianPo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/grab.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Inland-Revenue-Authority.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry-of-Manpower.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NLB.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/ntuc-learning-hub.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Raffles-Medical-Group.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/service-SG.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/SIM-SOC.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore-Medical.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt=""> </div>
            </div>
        </div>


    {{-- Blog Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Latest Posts From the Blog
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Blog Post 1 --}}
                <a href="https://blog.qwaiting.com/efficiently-manage-long-queues-in-restaurants-tips-and-tricks/"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/05/Efficiently-Managing-Long-Restaurant-Queue-Tips-and-Tricks.jpg" alt="" class="w-full h-48 object-contain rounded-2xl mb-4">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Efficiently Managing Long Restaurant Queues: Tips and Tricks
                    </h3>
                    <p class="text-gray-600">
                        In the restaurant industry, managing long queues can be a challenging task. The wait time for
                        customers can greatly affect their overall dining experience...
                    </p>
                </a>

                {{-- Blog Post 2 --}}
                <a href="https://blog.qwaiting.com/improve-customer-queue-experience-must-read-tips-tricks/"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/05/Improve-Customer-Queue-Experience-Must-Read-Tips-Tricks-1.jpg" alt="" class="w-full h-48 object-contain rounded-2xl mb-4">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Improve Customer Queue Experience: Must-Read Tips & Tricks
                    </h3>
                    <p class="text-gray-600">
                        Queues can have a significant impact on customer experience, as they can be a source of frustration
                        and dissatisfaction for customers...
                    </p>
                </a>

                {{-- Blog Post 3 --}}
                <a href="https://blog.qwaiting.com/enhance-the-waiting-line-experience/"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/05/5-Simple-Ways-To-Enhance-The-Waiting-Line-Experience-100.jpg" alt="" class="w-full h-48 object-contain rounded-2xl mb-4">

                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        5 Simple Ways To Enhance The Waiting Line Experience
                    </h3>
                    <p class="text-gray-600">
                        A long line of customers waiting to buy products from your company is evidence of its success...
                    </p>
                </a>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-3xl mx-auto">
                <h2 class="mb-12 text-3xl font-bold text-center text-gray-900 md:text-4xl">
                    Frequently Asked Questions
                </h2>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Why do restaurants use a Queue Display System?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Restaurants use queuing systems to reduce customer wait times, increase staff efficiency, and manage customer expectations.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">What are the different types of Restaurant Queuing Systems?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            There are various restaurant queuing systems, including traditional paper ticket dispensers, digital queuing apps, and self-service kiosks.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Are there any cons to using a Queue Management System for restaurants?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Some customers may find it frustrating to wait in a queue, and there can be technical difficulties with digital queuing systems. Additionally, implementing a queue display system can be costly for smaller restaurants or cafes.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can I track my position in the queue lineups in the restaurant?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Many restaurant queuing systems allow customers to track their position in the queue via mobile app, providing transparent updates on their wait time.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can I make a reservation using the F&B Queue Management Software?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Customers have the option to make a reservation through the digital queuing system, allowing them to secure a table at an exact time.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-primary">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold leading-tight text-white md:text-4xl">
                Experience the future of the Restaurant Queue with Qwaiting!
            </h2>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-white">
                Ready to transform customers' experiences? Take the leap towards a more efficient and customer-centric
                approach with Qwaiting.
            </p>
            <a href="/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-black transition-all duration-300 bg-white rounded-full hover:bg-gray-50 hover:shadow-lg hover:-translate-y-1">
                Try it for free
            </a>
        </div>
    </section>
@endsection