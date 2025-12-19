@extends('website.layout.website')

@section('title', 'Healthcare Queue Management System - Qwaiting')
@section('meta_description', 'Manage patient flow, reduce wait times, enhance patient experience and reduce staff workload with Qwaiting\'s smart healthcare queue management system.')

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
                            <span class="text-primary font-semibold text-sm">Healthcare Queue Solution</span>
                        </div>

                        <h1 class="text-6xl lg:text-7xl font-bold leading-tight">
                            <span
                                class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Healthcare
                                Queue</span>
                            <br>
                            <span
                                class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Management
                                System</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                            Streamline Your Hospital's Workflow with a Modern Check-in and patient management system. This
                            system has effective features like smooth check-ins, queue management, and quick reminders or
                            notifications.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="/signup"
                                class="group relative inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold overflow-hidden transition-all hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1">
                                <span class="relative z-10">Start Your Free Trial</span>
                                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </a>
                            <a href="/contact"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all hover:-translate-y-1">
                                Contact Sales
                            </a>
                        </div>
                    </div>

                    {{-- Right Image --}}
                    <div class="relative">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://qwaiting.com/images/industries/healthcare/screen.png"
                                alt="Healthcare Queue Management System" class="w-full">
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

        {{-- Patient Journey Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Streamline
                            Your</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Patient
                            Journey</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mb-16">
                    {{-- Patient Check-in --}}
                    <div
                        class="bg-gradient-to-br from-blue-50 to-white rounded-3xl p-8 border border-blue-100 hover:shadow-2xl transition-all">
                        <div
                            class="w-full rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/check-in.png" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Patient Check-in</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Go for a walk-in or Online</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Select: Kiosk or QR Code Scanner</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Enter Required details</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Generate unique ticket</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Notify Patients --}}
                    <div
                        class="bg-gradient-to-br from-purple-50 to-white rounded-3xl p-8 border border-purple-100 hover:shadow-2xl transition-all">
                        <div
                            class="w-full rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/notify.png" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Notify Patients</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Update the waitlist via mobile or smart TV</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>The patient will receive an email or SMS</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Notified when your turn comes</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Get ready to avail the service</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Give the Service --}}
                    <div
                        class="bg-gradient-to-br from-green-50 to-white rounded-3xl p-8 border border-green-100 hover:shadow-2xl transition-all">
                        <div
                            class="w-full rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/services.png" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Give the Service</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Call the patient</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Patient's turn display on the screen and notification on mobile</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Proceed for medical assistance</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Served, and the ticket closed</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <img src="https://qwaiting.com/frontimg/workflow.webp" alt="">
            </div>
        </section>

        {{-- Cloud-Based Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-primary via-purple-600 to-indigo-600">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    #1 Cloud-Based Queue Management System
                </h2>
                <p class="text-xl text-white/90 leading-relaxed">
                    Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue management software helps businesses enhance your productivity and reputation by satisfying your customers.
                </p>
            </div>
        </section>

        {{-- Key Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Features of
                            Queue Management</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">System in
                            Hospital</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Feature 1 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/images/industries/healthcare/time.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Time Management</h3>
                        <p class="text-gray-600 leading-relaxed">Qwaiting helps manage time smartly by scheduling
                            appointments, sending reminders, reducing wait times, and offering real-time updates about
                            queues and actual waiting times.</p>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/images/industries/healthcare/real-time.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Real-time Queue Updates</h3>
                        <p class="text-gray-600 leading-relaxed">Real-time monitoring in hospitals allows you to track staff
                            performance, monitor patient traffic and activity across different branches of the hospital, and
                            check waitlist status for improved management.</p>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/images/industries/healthcare/appointment.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Online Appointment Booking</h3>
                        <p class="text-gray-600 leading-relaxed">The Hospital Queue Management System allows patients to
                            book appointments from anywhere and estimate the expected number of patients in a queue or when
                            their turn comes.</p>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/images/industries/healthcare/scan.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Scan QR Code</h3>
                        <p class="text-gray-600 leading-relaxed">The Healthcare Queue Management System saves money by
                            allowing the use of QR codes in the hospital premises as per the requirement to ensure easy
                            access.</p>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/images/industries/healthcare/graphical.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Graphical Reporting</h3>
                        <p class="text-gray-600 leading-relaxed">Graphical reporting helps hospital owners analyze the
                            overall weekly or monthly performance of staff and allows a better understanding of their
                            duties, patient waiting & service times.</p>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/images/industries/healthcare/data-collection.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Data Collection</h3>
                        <p class="text-gray-600 leading-relaxed">Data collection in an HQMS helps hospital owners make
                            better decisions by optimizing patient flow, reducing wait times, enhancing staff allocation,
                            recording details, and improving overall operational efficiency.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Business Benefits Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Benefits of
                            Hospital</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Queue
                            Management System</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    {{-- Benefit 1 --}}
                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">01</div>
                        <img src="https://qwaiting.com/images/industries/healthcare/integration.png" alt="">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Integration via APIs</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Third-party integration with Hospital Information System APIs (Plato, Elite
                                    Plus)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Help to simplify patient registration, scheduling, records, and medical billing</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Shortens patient wait times and creates a pleasant hospital environment</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 2 --}}
                    <div
                        class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">02</div>
                        <img src="https://qwaiting.com/images/industries/healthcare/customization.png" alt="">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Customization</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Allows customized dashboard</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Manage to show advertisements or real-time analysis on digital signage and
                                    screens</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Modify the admin panel according to your needs</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 3 --}}
                    <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-green-100">03</div>
                        <img src="https://qwaiting.com/images/industries/healthcare/user-friendly.png" alt="">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">User Friendly</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Simple and easy-to-use interface</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Easily accessible in Android and IOS systems</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Reduced administrative burden (by eliminating the manual token distribution
                                    process)</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 4 --}}
                    <div
                        class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-orange-100">04</div>
                        <img src="https://qwaiting.com/images/industries/healthcare/enhanced.png" alt="">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Enhanced Service Quality</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Serves quickly, saves time, and promotes efficiency</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Enables Optimal Resource Utilization during low & peak hours</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Data-driven decision-making (such as adjusting staff schedules or optimizing resource
                                    allocation)</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 5 --}}
                    <div
                        class="relative p-8 bg-gradient-to-br from-pink-50 to-white rounded-3xl border border-pink-100 md:col-span-2 lg:col-span-1">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-pink-100">05</div>
                        <img src="https://qwaiting.com/images/industries/healthcare/patient-feedback.png" alt="">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Patient Feedback</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Collect feedback and address every query for a better patient experience</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Analyze patient feedback to take required actions for improved service quality</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Patient satisfaction leads to a better reputation for the hospital</span>
                            </li>
                        </ul>
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

        {{-- Applications Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Varied
                            Applications of Our</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Healthcare
                            Queue Management System</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-2xl transition-all">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/hospitals.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Hospitals</h3>
                        <p class="text-gray-600 leading-relaxed">Helps to manage your hospital's productivity by overcoming
                            your staff's workload, gaining valuable insights into regular operations and managing patient
                            flow efficiently.</p>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-2xl transition-all">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/test-center.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Test Centers</h3>
                        <p class="text-gray-600 leading-relaxed">The Hospital Queue System helps test centers ease
                            appointment scheduling, maintain social distancing, decrease wait times, and ensure effective &
                            safe testing processes.</p>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-2xl transition-all">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/veterinarians.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Veterinarians</h3>
                        <p class="text-gray-600 leading-relaxed">Healthcare Queue management systems streamline operations
                            for veterinarians, manage animal appointments, and promote overall efficiency by improving
                            veterinary hospital's service quality.</p>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-2xl transition-all">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/laboratories.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Laboratories</h3>
                        <p class="text-gray-600 leading-relaxed">The hospital patient management software brings calm and
                            structure for patients to navigate their way to lab appointments and enhances operational and
                            staff efficiencies with smooth workflow.</p>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-2xl transition-all">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/clinics.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Clinics</h3>
                        <p class="text-gray-600 leading-relaxed">Clinic owners can manage long waiting lines by installing
                            QWaiting at their place. It will help to notify your queue patients about their turn times so
                            that they can manage their own time in other works rather than waiting in the clinic area.</p>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-2xl transition-all">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/images/industries/healthcare/pharmacies.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Pharmacies</h3>
                        <p class="text-gray-600 leading-relaxed">Patient Data Management Software in pharmacies streamlines
                            patient flow, reduces wait times, enhances productivity, and optimizes staff efficiency through
                            digital queue management and notifications.</p>
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
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Our advanced Face Recognition System helps Government organizations manage queues, enhance security, and
                    streamline customer flow. Trusted in over 120 countries to create faster, safer, and smarter
                    experiences.
                </p>
                <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="Qwaiting Solutions" class="mx-auto">
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
                            <span class="text-lg font-semibold text-gray-900">What is a queue management system in healthcare?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            A healthcare queue management system helps hospitals reduce their patient wait times and manage customer flow and bookings more efficiently by allowing patients to book their appointments online.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does a healthcare queue management system improve patient satisfaction?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            By reducing long waits, sending real-time updates, and ensuring smoother check-ins, Qwaiting helps patients feel informed, cared for, and less stressed. This leads to a better overall hospital experience.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Is data security a priority for the queue management system?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Qwaiting uses advanced encryption and secure protocols to protect sensitive patient information, ensuring compliance with healthcare data security standards.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can Qwaiting hospital queue management integrate with existing hospital systems?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Absolutely. Qwaiting integrates seamlessly with hospital information systems (HIS) like MedMantra, enabling automatic data sync, reducing manual work, and improving staff efficiency.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does the healthcare queue management system contribute to operational efficiency?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The system automates patient flow, reduces manual coordination, and provides real-time dashboards for staff. This allows hospitals to serve more patients in less time while reducing staff workload.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">What sets Qwaiting apart in patient management?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Unlike generic solutions, Qwaiting is designed specifically for healthcare workflows. It combines queue management, appointment booking, patient notifications, and feedback collection into one system.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can healthcare professionals trust the accuracy of data provided by Qwaiting?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Qwaiting offers real-time tracking of patient flow and updates across departments, ensuring healthcare professionals can rely on accurate, up-to-date information for decision-making.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Does Qwaiting support multi-branch hospital networks?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Qwaiting provides centralized dashboards for hospital chains, enabling directors to track patient volume, wait times, and efficiency across all branches in real time.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can patients provide feedback through Qwaiting?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. After service, patients receive automated prompts to share feedback via SMS, WhatsApp, or kiosks, helping hospitals continuously improve care.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        {{-- Final CTA --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-primary via-purple-600 to-indigo-600">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Experience the future of Healthcare with Qwaiting!
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Ready to transform patient experience experiences? Take the leap towards a more efficient and
                    patient-centric approach with Qwaiting.
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