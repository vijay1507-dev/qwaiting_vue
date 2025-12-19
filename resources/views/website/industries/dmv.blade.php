@extends('website.layout.website')

@section('title', 'DMV Queue Management System - Qwaiting')
@section('description', 'Simplify your visit to DMV offices with the DMV queue management system. No more long waits or frustration—get your licenses and registrations done faster!')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                    <h1 class="mb-6 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        DMV Queue Management System
                    </h1>
                    <p class="mb-8 text-lg leading-relaxed text-gray-600 md:text-xl">
                        Our DMV queue system transforms how the Department of Motor Vehicle operations handle appointment scheduling, registration, renewals, and more. It Reduces the long waits and crowded queues. Also, customers can smoothly book appointments, track their status, and receive timely updates. This innovation boosts operational efficiency and significantly improves customer satisfaction by reducing wait times and improving service flow.
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
                                <span class="text-gray-600">Reduced Wait Times</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Improved Service Flow</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Increase Customer Satisfaction</span>
                            </li>
                        </ul>
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
                        <img src="https://qwaiting.com/frontimg/DMV-queue-management-system.png"
                            alt="DMV Queue Management System"
                            class="relative w-full rounded-3xl shadow-2xl animate-fade-in-up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Your Arrival Starts with a Seamless Ordered Queue Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Your Arrival Starts with a Seamless Ordered Queue
                </h2>
                <p>Our DMV queue management system ensures a smoother flow of traffic, allowing for more simplified processing and improved customer satisfaction.</p>
            </div>

            <div class="space-y-24">
                {{-- Customer Check-in --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/customers-check-in.png" alt="Customer Check-in"
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
                                <span class="text-gray-600">Customers schedule appointments online or through
                                    self-kiosks.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Fill in the necessary information about you and your vehicle for
                                    reservation.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">The system verifies the customer's eligibility for the services
                                    they are looking for.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">The system assigns a queue number or time slot to the
                                    customer.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Update the Customer --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/update-the-customer.png" alt="Update the Customer"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Customer:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Customers receive updates via SMS or email about their queue
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
                                <span class="text-gray-600">The system syncs with digital signage to alert customers when
                                    their turn is about to arrive.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Our system provides smooth communication for customer queries to
                                    increase satisfaction rate.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Customers can receive convenient updates via WhatsApp for
                                    real-time alerts.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Give Quick Service --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/give_quick_services.png" alt="Give Quick Service"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Give Quick Service:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Provide fast services for customers with urgent needs, like
                                    last-minute appointments.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">The DMV queue software analyzes data to manage resources
                                    efficiently.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">It integrates with other systems to make processes smoother and
                                    reduce waiting times.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Get instant feedback and reviews from customers.</span>
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

    {{-- Key Features Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Key Features of DMV Queuing Systems
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Feature 1 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/DMV-appointment-scheduling.svg" alt="">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">DMV Appointment Scheduling</h3>
                    <p class="text-gray-600">
                        Customers can schedule appointments in advance via our software for any specific DMV services, which
                        reduces overall wait time.
                    </p>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/customer-notifications.svg" alt="">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Customer Notifications</h3>
                    <p class="text-gray-600">
                        Our DMV queue management solution sends automated alerts (e.g., SMS, email) to inform customers
                        about their turn in the queue or appointment reminders.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/service-customization.svg" alt="">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">DMV Get in Line QR Code</h3>
                    <p class="text-gray-600">
                        Our DMV system has a "Get in Line" QR code feature. Customers can scan the code to join the queue
                        remotely. It reduces the need for in-person check-ins and reduces wait times.
                    </p>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/data-analytics.svg" alt="">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Data Analytics</h3>
                    <p class="text-gray-600">
                        The DMV waiting line management software collects and analyzes data on customer wait times and staff
                        performance, which is further used to make improvements.
                    </p>
                </div>

                {{-- Feature 5 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/feedback_mechanism.svg" alt="">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Feedback Mechanism</h3>
                    <p class="text-gray-600">
                        Includes a feedback system for customers to provide input on their DMV experience.
                    </p>
                </div>

                {{-- Feature 6 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/accessible.svg" alt="">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">24/7 Accessible</h3>
                    <p class="text-gray-600">
                        The DMV queuing system is inclusive and accessible to all from any location on any device around the
                        clock, which improves the customer experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Benefits of the Customer Flow Management Solutions for DMV
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2">
                {{-- Benefit 1 --}}
                <div class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="items-start gap-4 mb-6">
                        <img src="https://qwaiting.com/frontimg/reduced-waiting-times.png" alt="" class="mb-10">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Reduced Waiting Times</h3>
                        </div>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Our digital DMV queuing systems help reduce physical wait times by streamlining customer flow for a more organized experience.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">With real-time notifications and digital signage, customers stay informed about their turn and any updates.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Offering customers the ability to schedule appointments in advance helps balance service demand, leading to shorter wait times and a smoother overall process.</span>
                        </li>
                    </ul>
                </div>

                {{-- Benefit 2 --}}
                <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="items-start gap-4 mb-6">
                        <img src="https://qwaiting.com/frontimg/appointment-flexibility.png" alt="" class="mb-10">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Appointment Flexibility</h3>
                        </div>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Customers can choose convenient time slots, reducing the need for walk-ins.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Flexibility in scheduling helps minimize no-shows, ensuring efficient staff utilization.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">The DMV virtual queue allows customers to join the line remotely, improving convenience and reducing in-office congestion.</span>
                        </li>
                    </ul>
                </div>

                {{-- Benefit 3 --}}
                <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="items-start gap-4 mb-6">
                        <img src="https://qwaiting.com/frontimg/cost-savings.png" alt="" class="mb-10">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Cost Savings</h3>
                        </div>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Shifting to digital processes reduces the need for manual handling and cuts operational costs.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">As the system scales to handle more customers, its cost-effectiveness improves.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Increased operational efficiency leads to cost savings and reducing additional expenses.</span>
                        </li>
                    </ul>
                </div>

                {{-- Benefit 4 --}}
                <div class="relative p-8 bg-gradient-to-br from-indigo-50 to-white rounded-3xl border border-indigo-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="items-start gap-4 mb-6">
                        <img src="https://qwaiting.com/frontimg/high-level-of-security-and-privacy.png" alt="" class="mb-10">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">High Level of Security & Privacy</h3>
                        </div>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-indigo-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Our DMV online appointment system ensures customer information is secured and encrypted.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-indigo-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Our software has high access control measures, preventing unauthorized access to sensitive customer data and ensuring privacy.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-indigo-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Strict adherence to privacy regulations helps maintain trust and confidence in the DMV's handling of sensitive data.</span>
                        </li>
                    </ul>
                </div>

                {{-- Benefit 5 --}}
                <div class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100 hover:shadow-xl transition-all duration-300 group md:col-span-2 lg:col-span-1">
                    <div class="items-start gap-4 mb-6">
                        <img src="https://qwaiting.com/frontimg/enhanced-operational-efficiency.png" alt="" class="mb-10">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Enhanced Operational Efficiency</h3>
                        </div>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-orange-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">The DMV appointment system allows DMV offices to allocate staff more effectively based on real-time demand.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-orange-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Automation of routine tasks, like check-in and form submissions, frees up staff to focus on value-added services.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-orange-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Our software helps to analyze customer flow data, which allows DMV offices to make informed decisions.</span>
                        </li>
                    </ul>
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

    {{-- Flexible Waiting Options Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Empower Your Customers to Wait Wherever They Want With Qwaiting Solutions
                </h2>
                <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="Qwaiting Solutions" class="mx-auto">
            </div>
        </section>

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
                            <span class="text-lg font-semibold text-gray-900">How queue lines at the DMV office be better
                                managed?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Queue lines at DMV offices can be better managed through our advanced queue management system
                            that includes appointment scheduling, virtual queuing, real-time notifications, and data
                            analytics to optimize staff allocation and reduce wait times.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How do customers access the DMV services without any time wastage?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Customers can access the DMV services through kiosks placed in the DMV office, and online via a mobile application.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Is there any cost associated with using a DMV Queue System?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The cost may vary, but it's generally low. However, this cost is outweighed by the benefits in terms of time savings and convenience for everyone involved.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How reliable is a DMV Waiting Line System?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            DMV systems are highly reliable and advanced. They can handle large volumes of customers and have in-built measures to decrease technical issues. However, occasional glitches may be possible.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How queue lines at the DMV office be better managed?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Queue lineups at the DMV office can be better managed by leveraging queue management systems and feedback mechanisms to improve customer satisfaction.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                Experience the future of the Department of Motor Vehicle with Qwaiting!
            </h2>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-gray-600">
                Ready to transform customer experiences? Take the leap towards a more efficient and customer-centric
                approach with Qwaiting.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-white transition-all duration-300 bg-purple-600 rounded-full hover:bg-purple-700 hover:shadow-lg hover:-translate-y-1">
                Try it for free
            </a>
        </div>
    </section>
@endsection