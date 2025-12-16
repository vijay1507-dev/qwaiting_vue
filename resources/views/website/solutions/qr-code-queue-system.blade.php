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
                    QR Code Queue <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Management
                        System</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto mb-10">
                    Make queues effortless and contactless. With Qwaiting’s QR Code Queue System, customers simply scan a QR, receive a digital ticket, and wait virtually until it’s their turn - ensuring safety, comfort, and a stress-free experience.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
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
            </div>

            {{-- Hero Image with Floating Effect --}}
                <div class="relative mx-auto max-w-4xl mt-10">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/QR-code-queue-management-system.png"
                            alt="QR Code Queue Dashboard"
                            class="w-full h-auto transform transition-transform hover:scale-105 duration-700">
                    </div>
                </div>
        </section>

        {{-- What is QR Code Queue System Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-10 text-center">
                What is QR Code <span class="text-primary">Queue System</span> ?
            </h2>
            <div class="grid lg:grid-cols-2">
                <div class="max-w-7xl mx-auto">
                    <div class="mb-4">
                        
                        <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                            Scanning a QR code is a smart move used by many industries, like retail stores, restaurants, and
                            hospitals, to streamline their customer flows. It has many business benefits that help your
                            customers:
                        </p>
                    </div>

                    <div class="max-w-3xl mx-auto">
                        <ul class="space-y-4 mb-10">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-700">Check in to their queue spots virtually.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-700">Select their services with just a few taps.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-700">Initiate payment processing.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-700">And leave a positive review at the end of the services.</span>
                            </li>
                        </ul>

                        <a href="https://qwaiting.com/signup"
                                class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1">
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
                </div>
                <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/just-scan-and-skip-the-queue-confusions.png" alt="Real-time Visualization"
                            class="relative rounded-3xl shadow-2xl w-3/4  transform -rotate-3 hover:rotate-0 transition-transform duration-500 mx-auto">
                    </div>
            </div>
        </section>

        {{-- How it Works Section - Vertical Timeline --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        How It <span class="text-primary">Works</span>
                    </h2>
                    <p class="text-xl text-gray-600">Simple steps to transform your queue management</p>
                </div>

                {{-- Timeline Container --}}
                <div class="relative">
                    {{-- Vertical Line --}}
                    <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-200 via-purple-200 to-teal-200 transform md:-translate-x-1/2"></div>

                    {{-- Timeline Items --}}
                    <div class="space-y-12">
                        {{-- Step 1 --}}
                        <div class="relative flex items-center md:justify-start mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <div class="flex-1">
                                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-blue-500">
                                        <div class="flex items-center gap-3 mb-3 md:justify-end">
                                            <h3 class="text-xl font-bold text-gray-900">Scan the QR code</h3>
                                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold flex-shrink-0">
                                                1
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            Customers are required to scan a unique QR code to register their spot in a queue.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- Timeline Dot --}}
                            <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>

                            <div class="flex items-start w-full md:w-1/2 md:pl-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/scan-the-QR-code.png" alt="">
                            </div>
                        </div>

                        {{-- Step 2 --}}
                        <div class="relative flex items-center md:justify-end mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/fill-in-the-required-details.png" alt="">
                            </div>
                            <div class="flex items-start w-full md:w-1/2 md:pl-12 ml-16 md:ml-0">
                                <div class="flex-1">
                                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-purple-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold flex-shrink-0">
                                                2
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900">Add details</h3>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            Customers are required to add basic details like their names and phone numbers to receive reminders.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-purple-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                        </div>

                        {{-- Step 3 --}}
                        <div class="relative flex items-center md:justify-start mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <div class="flex-1">
                                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-green-500">
                                        <div class="flex items-center gap-3 mb-3 md:justify-end">
                                            <h3 class="text-xl font-bold text-gray-900">Select services</h3>
                                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold flex-shrink-0">
                                                3
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            After adding details, customers can select their preferred services and appointment time according to their convenience.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-green-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>

                            <div class="flex items-start w-full md:w-1/2 md:pl-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/generate-e-ticket.png" alt="">
                            </div>
                        </div>

                        {{-- Step 4 --}}
                        <div class="relative flex items-center md:justify-end mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/enjoy-virtual-waitings.png" alt="">
                            </div>
                            <div class="flex items-start w-full md:w-1/2 md:pl-12 ml-16 md:ml-0">
                                <div class="flex-1">
                                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-orange-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 font-bold flex-shrink-0">
                                                4
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900">Generate a ticket</h3>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            The system then generates a digital ticket displaying expected wait times and allotted service counters. The customers can wait conveniently from anywhere until their turn arrives.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-orange-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                        </div>

                        {{-- Step 5 --}}
                        <div class="relative flex items-center md:justify-start mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <div class="flex-1">
                                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-indigo-500">
                                        <div class="flex items-center gap-3 mb-3 md:justify-end">
                                            <h3 class="text-xl font-bold text-gray-900">Automated reminders</h3>
                                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold flex-shrink-0">
                                                5
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            The system can then send automated reminder messages to customers to keep them informed of their wait times and reduce no-shows.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-indigo-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                            <div class="flex items-start w-full md:w-1/2 md:pl-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/get-a-message-for-your-turn.png" alt="">
                            </div>
                        </div>

                        {{-- Step 6 --}}
                        <div class="relative flex items-center md:justify-end">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/go-to-the-designated-area.png" alt="">
                            </div>
                            <div class="flex items-start w-full md:w-1/2 md:pl-12 ml-16 md:ml-0">
                                <div class="flex-1">
                                    <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-teal-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center text-teal-600 font-bold flex-shrink-0">
                                                6
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900">Service ready</h3>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            Upon receiving the notification, customers head to the designated area for their turn. This could be a physical location or a virtual space, depending on the nature of the service or event.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-teal-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Functionalities Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Functionalities of <span class="text-primary">QR Code Queue System</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- QR Generation --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/QR-generation-and-smooth-check-in.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">QR Generation and Smooth Check-in</h3>
                        <p class="text-gray-600">
                            Generates unique QR codes for customers so they can register themselves in a queue by scanning
                            the QR code.
                        </p>
                    </div>

                    {{-- Notification System --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/notification-system.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Notification System</h3>
                        <p class="text-gray-600">
                            Send instant notification alerts to customers to keep them informed of their wait times and
                            reduce overcrowding.
                        </p>
                    </div>

                    {{-- Integration --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/integration-with-other-solutions.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Integration with Other Solutions</h3>
                        <p class="text-gray-600">
                            Enables easy integration with the systems your business already uses for a smooth workflow
                            without any disruption.
                        </p>
                    </div>

                    {{-- Remote Monitoring --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/remote-queue-monitoring.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Remote Queue Monitoring</h3>
                        <p class="text-gray-600">
                            Keep an eye on the queues from anywhere remotely. And make any necessary adjustments or offer
                            assistance as required.
                        </p>
                    </div>

                    {{-- Security --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/security-and-authentication.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Security and Authentication</h3>
                        <p class="text-gray-600">
                            Robust data algorithms and secure authentication mechanisms are used to prevent unauthorized
                            access and customer data theft.
                        </p>
                    </div>

                    {{-- WhatsApp Integration --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-teal-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/text-messaging-via-whatsApp-integration.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Text Messaging via WhatsApp Integration</h3>
                        <p class="text-gray-600">
                            Our system offers WhatsApp integration to inform your customers. It automatically sends text
                            messages on WhatsApp when their turn arrives or when any changes to the appointments.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Advantages Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                
                <!-- Heading -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                        Advantages of <span class="text-primary">QR Queuing System</span>
                    </h2>
                </div>

                <!-- Grid -->
                <div class="grid lg:grid-cols-2 gap-10">

                    <!-- Card 1 -->
                    <div class="p-8 rounded-3xl bg-[#F3F8FF] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/easy-and-simple-to-operate.png" class="rounded-2xl mb-6 w-full object-cover " alt="">
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Easy & Simple to Operate</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                User-friendly interface for better understanding.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Quick setup for early operations.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Easily accessible for a wider range of users.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Less to no training required.
                            </li>
                        </ul>
                    </div>

                    <!-- Card 2 -->
                    <div class="p-8 rounded-3xl bg-[#FFF5F7] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/get-rid-of-long-waitings.png" class="rounded-2xl mb-6 w-full object-cover " alt="">
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Get Rid of Long Waitings</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Register your spot by scanning a QR code.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Wait remotely from anywhere.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Receive real-time messages to stay informed.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Efficient staff allocation for faster process.
                            </li>
                        </ul>
                    </div>

                    <!-- Card 3 -->
                    <div class="p-8 rounded-3xl bg-[#F5FFF2] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/analytic-services.png" class="rounded-2xl mb-6 w-full object-cover " alt="">
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Analytic Services</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Gain insights to optimize operations.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Tailor service using customer feedback.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Identify and fix bottlenecks early.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Improve staff performance and efficiency.
                            </li>
                        </ul>
                    </div>

                    <!-- Card 4 -->
                    <div class="p-8 rounded-3xl bg-[#FFF9ED] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/customer-feedback-system.png" class="rounded-2xl mb-6 w-full object-cover " alt="">
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Customer Feedback System</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Real-time feedback for better decision-making.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Identify improvement areas instantly.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Boost customer satisfaction & loyalty.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Deliver personalized experiences.
                            </li>
                        </ul>
                    </div>

                    <!-- Card 5 -->
                    <div class="p-8 rounded-3xl bg-[#F3F8FF] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/customization.png" class="rounded-2xl mb-6 w-full object-cover " alt="">
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Customization</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Customize your QR code to align with a business's branding.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Integrate the system with existing software for a seamless solution.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Tailor the queuing process to meet their specific customer needs.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Ensure a customized and relevant experience for their customers.
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </section>


        {{-- Industries Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Simplify
                            Queue Management for Every Sector!</span>
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
                        <span>See All</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Why Qwaiting Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Why <span class="text-primary">Qwaiting?</span>
                    </h2>
                </div>

                <div class="max-w-4xl mx-auto">
                    <p class="text-xl text-gray-600 leading-relaxed mb-6">
                        Qwaiting is a solution that helps businesses to overcome various challenges such as long customer
                        wait times, managing crowded spaces, and inefficient queuing processes. This software is ideal for
                        queue management and reducing the overall customer wait time.
                    </p>
                    <p class="text-xl text-gray-600 leading-relaxed mb-10">
                        We provide the most suitable queuing solution that helps you manage your business operations
                        effectively in every aspect. Improve customer experience, get satisfying outcomes, and control
                        workflow efficiently. You can take your business to the peak with us.
                    </p>
                </div>
            </div>
        </section>

        <section class="py-24 bg-[#F4F3FF]">
            <div class="max-w-7xl mx-auto px-6">

                <!-- Heading -->
                <div class="text-center max-w-4xl mx-auto mb-16">
                    <h3 class="text-primary font-semibold tracking-wide mb-3">Customer Stories</h3>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 leading-snug">
                        Discover how users from around the world are utilizing Qwaiting to 
                        improve customer experiences, streamline processes, and offer a 
                        smooth customer journey
                    </h2>
                </div>

                <!-- Logo Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-10">
                    
                    <!-- Item -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/wgs.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="Wisma">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/ram.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="RAM Clinics">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/psb-ac.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="PSB">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/nus-logo.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="NUS">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/nirvana.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="Nirvana">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/fair-price.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="FairPrice">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/msq.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="Marina Square">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                        <img src="https://qwaiting.com/frontimg/changi.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="Changi Airport">
                    </div>

                </div>

                <!-- CTA Button -->
                <div class="text-center mt-16">
                    <a href="/customer-stories"
                    class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-primary text-primary font-semibold text-lg hover:bg-primary hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                        All Customer Stories
                        <span class="text-xl">›</span>
                    </a>
                </div>

            </div>
        </section>


        {{-- Testimonials Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-center text-2xl font-bold mb-6">Client Testimonials</h2>
                <p class="text-center text-lg font-semibold text-gray-600 mb-16">See What Our Customers Are Saying</p>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="p-8 rounded-3xl bg-gray-50 border border-gray-100">
                        <p class="text-gray-700 mb-6 italic">
                            "I've used Qwaiting for my business and it's been a great experience. It's helped me to save
                            time and reduce my stress levels, while also improving the customer experience. I would
                            recommend it to anyone who wants to streamline their operations and improve customer
                            satisfaction."
                        </p>
                        <div class="flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/mnd-singapore.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="MND Singapore">
                        </div>
                    </div>

                    <div class="p-8 rounded-3xl bg-gray-50 border border-gray-100">
                        <p class="text-gray-700 mb-6 italic">
                            "Qwaiting has made my life so much easier! It simplifies the waiting process, saving time and
                            reducing frustration. The overall experience is great and up to the mark. Thanks to the team!"
                        </p>
                        <div class="flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/singtel.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="Singtel">
                        </div>
                    </div>

                    <div class="p-8 rounded-3xl bg-gray-50 border border-gray-100">
                        <p class="text-gray-700 mb-6 italic">
                            "Thanks to Rohit and his team for making this wonderful software. Not only me but our customers
                            also loved it. As they are able to join a virtual queue and get updates on their wait time via
                            text message."
                        </p>
                        <div class="flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/hdt.png" class="w-36 opacity-90 hover:opacity-100 transition" alt="HDT">
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

    </div>
@endsection