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
                            <span class="text-primary font-semibold text-sm">Cannabis Dispensary Solution</span>
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                            Queue Management Made Easy for <span class="text-primary">Cannabis Dispensaries</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                            Running a marijuana dispensary means helping many customers daily while ensuring smooth service. You can reduce customer wait times and make your dispensary operations stress-free with the help of Qwaiting. By providing a queuing solution for cannabis dispensaries, we ensure you can serve your customers better.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="/signup"
                                class="group relative inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold overflow-hidden transition-all hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1">
                                <span class="relative z-10">Start Your Free Trial</span>
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
                            <img src="https://qwaiting.com/frontimg/queue-management-made-easy-for-cannabis-dispensaries.png"
                                alt="Cannabis Dispensary Queue System" class="w-full">
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

        {{-- Benefits Section --}}
        <section class="py-20 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="space-y-24">
                    <h2 class="text-3xl lg:text-4xl font-bold leading-tight text-center mb-8">Turn waiting lines into
                        streamlined service <span class="text-primary">opportunities with smarter, faster solution</span></h2>

                    {{-- Shorter Wait Times --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/shorter-wait-times.png" alt="Shorter Wait Times"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2 lg:order-1">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Shorter Wait Times</h3>
                            <p class="text-gray-600 text-lg mb-4">Marijuana dispensaries queue software helps you track and
                                manage customers better. Nobody likes standing in line for too long, but with Qwaiting, you
                                can:</p>
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
                                    <span class="text-gray-600 text-lg">Keep wait times short.</span>
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
                                    <span class="text-gray-600 text-lg">Make customers feel valued and happy.</span>
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
                                    <span class="text-gray-600 text-lg">Serve more customers efficiently without sacrificing
                                        quality.</span>
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
                                    <span class="text-gray-600 text-lg">Reduce wait times in dispensaries by keeping the
                                        queue organized and transparent.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Virtual Waitlists --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/virtual-waitlists.png" alt="Virtual Waitlists"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Virtual Waitlists</h3>
                            <p class="text-gray-600 text-lg mb-4">Let your customers join a virtual waitlist for
                                dispensaries through their phones. They can wait from anywhere and receive updates via SMS
                                when it's their turn.</p>
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
                                    <span class="text-gray-600 text-lg">Reduce crowded waiting areas.</span>
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
                                    <span class="text-gray-600 text-lg">Let customers plan their visit with live
                                        updates.</span>
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
                                    <span class="text-gray-600 text-lg">Enable easy mobile check-ins.</span>
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
                                    <span class="text-gray-600 text-lg">Offer a flexible, hassle-free experience.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Self-Check-In System --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/self-check-in-system.png" alt="Self-Check-In System"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2 lg:order-1">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Self-Check-In System</h3>
                            <p class="text-gray-600 text-lg mb-4">Qwaiting is a self-check-in dispensary system where
                                customers can check themselves when they arrive. This saves time for both staff and
                                customers by:</p>
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
                                    <span class="text-gray-600 text-lg">Enabling mobile or kiosk check-ins.</span>
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
                                    <span class="text-gray-600 text-lg">Reducing front desk crowd.</span>
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
                                    <span class="text-gray-600 text-lg">Tracking queues accurately for faster
                                        service.</span>
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
                                    <span class="text-gray-600 text-lg">Offering a modern, hassle-free experience.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Improve Customer Flow --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/improve-customer-flow.png"
                                    alt="Improve Customer Flow"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Improve Customer Flow</h3>
                            <p class="text-gray-600 text-lg mb-4">Guide customers smoothly from check-in to checkout. With
                                our queuing solution for cannabis dispensaries, you can create a hassle-free shopping
                                experience for your consumers.</p>
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
                                    <span class="text-gray-600 text-lg">Clear path from wait to service.</span>
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
                                    <span class="text-gray-600 text-lg">Boost store efficiency with smooth processes.</span>
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
                                    <span class="text-gray-600 text-lg">Let customers relax while waiting.</span>
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
                                    <span class="text-gray-600 text-lg">Quick and easy checkout experience.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Cloud-Based Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    #1 Cloud-Based Queue Management System
                </h2>
                <p class="text-xl text-white/90 leading-relaxed mb-8">
                    Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue
                    management software helps businesses enhance your productivity and reputation by satisfying your
                    customers.
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
                                <img src="https://qwaiting.com/frontimg/real-time-metrics.svg" alt="Real-time Metrics"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Real-time Metrics</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Keep track of your dispensary's performance with live updates. See real-time dispensary
                                metrics like the customers you serve. You can also track staff performance and improve
                                service to make every visit faster and better for everyone.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/multi-location-queue-management.svg"
                                    alt="Multi-location Queue Management" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Multi-location Queue Management</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Whether you run one or many dispensaries, Qwaiting handles them all easily. Queue management
                                software also provides visibility for multi-location dispensaries. This gives you control
                                over staff and customers while managing operations across many locations.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/stress-free-operations.svg"
                                    alt="Stress-Free Operations" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Stress-Free Operations</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Running a dispensary doesn't have to be stressful. Qwaiting is a scalable queuing system
                                that helps staff communicate with customers easily and focus on great service. It's the
                                perfect queuing system for dispensaries to keep operations smooth and efficient.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/social-distancing-made-simple.svg"
                                    alt="Social Distancing Made Simple" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Social Distancing Made Simple</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Maintain safety with a digital queuing system for cannabis. With CBD dispensary queues,
                                customers can wait outside or in their cars. This creates a stress-free shopping experience
                                while keeping everyone safe and comfortable.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Choose Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Why Choose
                            Our</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Dispensary
                            Queue Management System?</span>
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-2">
                    {{-- Benefit 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/waitlist-solution-for-cannabis-dispensaries.png"
                                    alt="Waitlist Solution for Cannabis Dispensaries" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Waitlist Solution for Cannabis Dispensaries
                            </h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Customers can join the queue from anywhere using their phone and receive updates on their
                                position. This keeps the waiting process organized and helps CBD consumers stay informed,
                                making them feel relaxed and confident about when their turn will come.
                            </p>
                        </div>
                    </div>

                    {{-- Benefit 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/better-flow-in-the-store.png"
                                    alt="Better Flow in the Store" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Better Flow in the Store</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                The system helps customers move smoothly through the dispensary. It lets staff serve people
                                faster by organizing the line. This keeps things running smoothly, so customers don't have
                                to wait long, and the store stays organized and efficient.
                            </p>
                        </div>
                    </div>

                    {{-- Benefit 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/SMS-updates-for-customers.png"
                                    alt="SMS Updates for Customers" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">SMS Updates for Customers</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Customers will receive messages on their phones via SMS or Whatsaap, when it's almost their
                                turn. This way, they don't have to stand around waiting. They can do their work, but they
                                still know when it's their time to be served.
                            </p>
                        </div>
                    </div>

                    {{-- Benefit 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/easy-digital-queuing.png" alt="Easy Digital Queuing"
                                    class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Easy Digital Queuing</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                With a digital queuing system for cannabis, managing lines becomes easy. Cannabis retailers
                                can organize queues, track customer wait times, and make sure everyone is served quickly.
                                This way, customers stay happy and the store runs smoothly.
                            </p>
                        </div>
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

        <!-- Trusted By Section -->
        <div class="trusted-section bg-gray-50">
            <h2>Trusted by 65K+ Businesses Worldwide</h2>
            <p>Join the industry leaders who trust Q-Waiting for their queue management</p>

            <div class="trusted-logos">
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
                    <a href="https://blog.qwaiting.com/queue-management-system-for-clinics-what-you-need-to-know/"
                        class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/05/499757191-allow-patients-to-self-check-in-and-check-out.png"
                            alt="Queue Management System For Clinics" class="w-full h-48 object-cover rounded-2xl mb-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                            Queue Management System For Clinics: What You Need to Know
                        </h3>
                        <p class="text-gray-600">
                            Clinics and medical facilities often struggle with long wait times, overcrowded waiting areas...
                        </p>
                    </a>

                    {{-- Blog Post 2 --}}
                    <a href="https://blog.qwaiting.com/patient-flow-management-everything-you-need-to-know-about-it/"
                        class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/10/548924137-overcrowding.png"
                            alt="Patient Flow Management" class="w-full h-48 object-cover rounded-2xl mb-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                            Patient Flow Management: Everything You Need to Know About It
                        </h3>
                        <p class="text-gray-600">
                            Healthcare facilities such as hospitals, clinics, and laboratories have seen an extreme number
                            of patients around the clock...
                        </p>
                    </a>

                    {{-- Blog Post 3 --}}
                    <a href="https://blog.qwaiting.com/powerful-proven-strategies-to-manage-customer-wait-times/"
                        class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/05/505465103-create-a-pleasant-waiting-area.png"
                            alt="Strategies to Manage Customer Wait Times"
                            class="w-full h-48 object-cover rounded-2xl mb-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                            7 Powerful & Proven Strategies to Manage Customer Wait Times
                        </h3>
                        <p class="text-gray-600">
                            For every business, customer satisfaction is of supreme importance in driving success...
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
                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How does the virtual waitlist work for cannabis dispensaries?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                It allows customers to join the waitlist via their phones, receive SMS updates, and wait from anywhere without the hassle.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can Qwaiting handle multiple dispensary locations?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                 Yes, Qwaiting supports multi-location management. It offers real-time visibility and efficient queue control across all locations.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How does Qwaiting ensure social distancing in dispensaries?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                 The system allows customers to wait outside or in cars. It ensures a safe, socially distanced shopping experience.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can I get updates via SMS or WhatsApp for my customers?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                 Yes, customers can receive timely updates via SMS or WhatsApp that keeps them informed about their queue status.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How does Qwaiting improve staff performance in dispensaries?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                 Real-time metrics help track staff performance, improve service speed, and ensure that customers are served efficiently.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can I track customer wait times in real-time?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                 Yes, Qwaiting provides real-time data on wait times, helping dispensaries optimize service and reduce delays.
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
                    Experience the future of Healthcare with Qwaiting!
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Ready to transform patient experience experiences? Take the leap towards a more efficient and
                    patient-centric
                    approach with Qwaiting.
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Try it for free</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

    </div>
@endsection