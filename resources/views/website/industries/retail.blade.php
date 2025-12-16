@extends('website.layout.website')

@section('title', 'Retail Queue Management System - Qwaiting')
@section('description', 'Enhance retail efficiency with our Retail Queue Management System—minimize wait times, boost staff productivity, and elevate satisfaction. Get a Demo Now!')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                    <h1 class="mb-6 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Retail Queue Management System
                    </h1>
                    <p class="mb-8 text-lg leading-relaxed text-gray-600 md:text-xl">
                        Transform your customers' shopping experience and let Qwaiting set a new standard for retail
                        excellence that drives more sales for your brand.
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
                            class="absolute top-0 right-0 w-full h-full transform translate-x-4 translate-y-4 rounded-3xl -z-10">
                        </div>
                        <img src="https://qwaiting.com/frontimg/retail-queue-management-system.png"
                            alt="Retail Queue Management System"
                            class="relative w-full animate-fade-in-up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Crowd-free Welcome Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Crowd-free Welcome to Your Store with Retail Digital Solutions
                </h2>
                <p class="text-lg text-gray-600">
                    Our system is capable of organizing appointments, managing queues and monitoring the number of people in
                    the retail store. We have helped thousands of businesses in transforming the shopping experience for
                    their customers.
                </p>
            </div>

            <div class="space-y-24">
                {{-- Feature 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/customer-check-in.png" alt="Customer Check-in"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Customer Check-in:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Choose between walk-in or online check-in options.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Make a selection: either use a kiosk or scan the QR code.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Quick data entry.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Automatically generate a unique ticket ID.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/update-the-customers.png" alt="Update the Customers"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Customers:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Real-time notifications through SMS or email.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Customizable alerts including relevant details about the
                                    service.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Digital displays or mobile apps to showcase the current status
                                    of the queue.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Transparent retail waitlist updates.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/quick-service.png" alt="Quick Service"
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
                                <span class="text-gray-600">Efficient queue management: Customers come as per their
                                    turn.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Payment convenience.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Process retail bills or invoices.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Closure and feedback.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cloud Based Section --}}
    <section class="py-20 bg-purple-900 text-white">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold leading-tight md:text-4xl">
                #1 Cloud-Based Queue Management System
            </h2>
            <p class="max-w-3xl mx-auto mb-10 text-lg text-purple-100">
                Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue management
                software helps businesses enhance your productivity and reputation by satisfying your customers.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-purple-900 transition-all duration-300 bg-white rounded-full hover:bg-gray-100 hover:shadow-lg hover:-translate-y-1">
                Book a Free Demo
            </a>
        </div>
    </section>

    {{-- Advanced Features Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Advanced Features of Retail Queue Platform
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Feature 1 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/no-contact-system.svg" alt="No-contact System" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">No-contact System</h3>
                    <p class="text-gray-600">
                        A retail queue system allows customers to join the queue by scanning the QR code using any device,
                        without the need for physical tokens or hardware. Our system provides a safe and efficient way for
                        customers to enter the retail store.
                    </p>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/resource.svg" alt="Resource Planning and Staff Allocation" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Resource Planning and Staff Allocation</h3>
                    <p class="text-gray-600">
                        Qwaiting helps in scheduling and assigning staff members to different tasks and areas of the retail
                        outlet based on customer traffic and needs. Avoid the situation of understaffing and overstaffing
                        for a seamless customer experience.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/digital.svg" alt="Digital Signage Solution" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Digital Signage Solution</h3>
                    <p class="text-gray-600">
                        Retail queue systems can integrate with digital screens which communicate with customers about newly
                        launched retail products, promotions, and their average waiting time for buying the goods.
                    </p>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/retail-business.svg" alt="Retail Business Intelligence" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Retail Business Intelligence</h3>
                    <p class="text-gray-600">
                        Retailers can access analytical reports on customer preferences, inventory management, and the sales
                        performance of each retail branch store to identify areas for improvement and make data-driven
                        business decisions.
                    </p>
                </div>

                {{-- Feature 5 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/capacity-tracking.svg" alt="Capacity Tracking" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Capacity Tracking</h3>
                    <p class="text-gray-600">
                        Automatically monitor customer entries and exits to effectively manage store capacity. When the
                        store reaches full capacity, customers can easily join a virtual waitlist.
                    </p>
                </div>

                {{-- Feature 6 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/customer-feedback.svg" alt="Customer Feedback" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Customer Feedback</h3>
                    <p class="text-gray-600">
                        Effectively handle customer feedback across all retail branch outlets to gain a complete
                        understanding of customer opinions. Plus, this feature can be integrated with social media handles
                        to ensure feedback is collected from diverse sources.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Supercharge Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Supercharge Your Retail Business
                </h2>
            </div>

            <div class="space-y-16">
                {{-- Item 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/reduced-wait-times.png" alt="Reduced Wait Times"
                            class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Reduced Wait Times</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Customers can move freely, and be notified when their turn
                                    arrives.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Virtual queues enhance staff productivity, reducing customer
                                    wait times.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Shorter queues lead to meaningful and faster customer
                                    interactions.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/improve-staff-efficiency.png"
                            alt="Manage Retail Customer Data" class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Manage Retail Customer Data</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Customized dashboard for managing all retail customer
                                    profiles.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Access to past customer information for future reference or
                                    creating marketing campaigns.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Data can be accessible from any Android and IOS device in any
                                    place.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/boost-sales.png" alt="Boost Sales and Generate More Revenue"
                            class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Boost Sales and Generate More Revenue</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Shortening waiting times leads to making additional purchases in
                                    the retail store.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Anticipates retail peak times and optimizes staffing for higher
                                    revenue potential.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Providing personalized service improves the conversion of
                                    opportunities to sales.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Item 4 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/enhanced-customer-loyalty.png"
                            alt="Enhanced Customer Loyalty" class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Enhanced Customer Loyalty</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Eliminates crowded areas and promotes a hassle-free shopping
                                    experience.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Clear and timely communication with customers strengthens their
                                    loyalty and increases the retention rate.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Data-driven decision-making (such as taking action on customer
                                    feedback to make them feel valued)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Item 5 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/easy-and-less-setup-cost.png" alt="Easy and Less Setup Cost"
                            class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Easy and Less Setup Cost</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">No additional hardware is required.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Quick setup time to make it operational across all your retail
                                    branches.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Minimizes the need for additional resources.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Reviews Section --}}
    <section class="py-20 bg-white">
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

    {{-- Use Cases Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Where We Can Use Retail Queue System?
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Case 1 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/supermarkets.svg" alt="Supermarkets" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Supermarkets</h3>
                    <p class="text-gray-600">
                        Retail queue management software is frequently used in grocery stores and supermarkets to manage
                        lines at regular checkouts and self-checkout stations.
                    </p>
                </div>

                {{-- Case 2 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/pharmacies.svg" alt="Pharmacies" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Pharmacies</h3>
                    <p class="text-gray-600">
                        Medical stores utilize retail queuing systems to help customers wait for prescription pickups or
                        consult with pharmacists.
                    </p>
                </div>

                {{-- Case 3 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/retail-outlets.svg" alt="Retail Outlets" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Retail Outlets</h3>
                    <p class="text-gray-600">
                        Various types of retail stores, including clothing stores and electronics shops, can benefit from
                        queue systems to improve customer service during peak hours.
                    </p>
                </div>

                {{-- Case 4 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/restaurants.svg" alt="Restaurants" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Restaurants</h3>
                    <p class="text-gray-600">
                        Quick-service restaurants use a retail queue system to manage lines at order counters, ensuring a
                        smooth and timely ordering process.
                    </p>
                </div>

                {{-- Case 5 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/salons.svg" alt="Salons" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Salons</h3>
                    <p class="text-gray-600">
                        Helps to inform your customers in the queue about their average waiting times so that they can spend
                        their time doing other work instead of waiting in the salons.
                    </p>
                </div>

                {{-- Case 6 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/mobile-stores.svg" alt="Mobile Stores" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Mobile Stores</h3>
                    <p class="text-gray-600">
                        Mobile Stores offer repair and service options for their IOS & Android products. A retail queue
                        system can be implemented in these areas to coordinate customer check-ins and pickups.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Flexible Waiting Options Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Empower Your Customers to Wait Wherever They Want With Qwaiting Solutions
                </h2>
                <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="Qwaiting Solutions" class="mx-auto">
            </div>
        </section>

        <!-- Trusted By Section -->
        <div class="trusted-section bg-gray-50">
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
                <a href="https://blog.qwaiting.com/online-appointment-booking-software-take-your-business-to-the-next-level/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/08/Online-Appointment-Booking-Software_-Take-your-Business-to-the-Next-Level-2.jpg"
                        alt="Online Appointment Booking Software" class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Online Appointment Booking Software: Take your Business to the Next Level
                    </h3>
                    <p class="text-gray-600">
                        Businesses that rely on in-person appointment scheduling are lagging behind and facing various
                        problems...
                    </p>
                </a>

                {{-- Blog Post 2 --}}
                <a href="https://blog.qwaiting.com/qr-code-queue-management-system-a-game-changer-for-businesses/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/07/QR-Code-Queue-Management-System-A-Game-Changer-for-Businesses.jpg" alt="QR Code Queue Management System"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        QR Code Queue Management System: A Game-Changer for Businesses
                    </h3>
                    <p class="text-gray-600">
                        Imagine a world where waiting in line is a thing of the past & customers can effortlessly avail of
                        desired services without hassle...
                    </p>
                </a>

                {{-- Blog Post 3 --}}
                <a href="https://blog.qwaiting.com/customer-feedback-system-the-key-to-an-exceptional-customer-experience/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/06/Customer-Feedback-system.jpg" alt="Customer Feedback System"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Customer Feedback System: The Key To An Exceptional Customer Experience
                    </h3>
                    <p class="text-gray-600">
                        Businesses often face the challenge of delivering outstanding customer experiences while efficiently
                        managing queues...
                    </p>
                </a>
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
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Does the system support appointment scheduling?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Our retail queue management systems allow customers to book any time slot for any retail service. This significantly helps in better managing customer footfalls and reducing their wait times.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How easy is it to train retail staff to use queuing software? satisfaction?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Qwaiting retail queue system has a user-friendly interface. The solution offers many training sessions or tutorials to ensure that staff can efficiently operate the system and drive success.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">What kind of technical support is offered?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The retail queue management system provides 24/7 online support to address any issues or updates quickly for a seamless customer experience.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can the system be integrated with customer feedback mechanisms?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, you can easily integrate our retail queueing system with customer feedback tools. This allows businesses to gather valuable insights into customer satisfaction and areas for improvement.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can retailers access queue information remotely for every retail outlet owned by them?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, retailers can easily access all the information on a single dashboard for every retail store owned by them.
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
                Experience the future of Retail Queue with Qwaiting!
            </h2>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-white">
                Ready to transform customers' experiences? Take the leap towards a more efficient and customer-centric
                approach with Qwaiting.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-primary transition-all duration-300 bg-white rounded-full hover:bg-gray-50 hover:shadow-lg hover:-translate-y-1">
                Try it for free
            </a>
        </div>
    </section>
@endsection