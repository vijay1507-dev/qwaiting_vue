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
                <div class="max-w-4xl mx-auto items-center text-center">
                    {{-- Left Content --}}
                    <div class="space-y-8">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full border border-primary/20">
                            <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                            <span class="text-primary font-semibold text-sm">Virtual Queue Management System</span>
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                            Virtual Queue Management System - <span class="text-primary">Access Anywhere</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed">
                            Bring ease and clarity to every visit by letting customers join queues from anywhere web,
                            mobile, or kiosk. With real-time updates and shorter wait times, Qwaiting helps you cut the
                            chaos and create a smooth, crowd-free experience.
                        </p>

                        <div class="flex flex-wrap gap-4 justify-center">
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
                            <a href="/request-demo"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all hover:-translate-y-1">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    {{-- Image --}}
                    <div class="relative mt-12">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://qwaiting.com/frontimg/virtual_queue_management_system.png"
                                alt="Virtual Queue Management System" class="w-150 h-150 mx-auto">
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

        {{-- Seamless Queuing Section --}}
        <section class="py-24 px-6 bg-gray-50">
            <div class="max-w-7xl mx-auto bg-white rounded-4xl p-10 lg:p-16 shadow-xl">

                <!-- Main Hero Row -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    
                    <!-- Left Image -->
                    <div class="overflow-hidden rounded-3xl shadow-lg">
                        <img src="https://qwaiting.com/frontimg/screen-one.png" 
                            alt="Queue System" 
                            class="w-full rounded-3xl object-cover">
                    </div>

                    <!-- Right Content -->
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-6">
                            Seamless Queuing,
                            <span class="text-primary">Happier Customers</span>
                        </h2>

                        <p class="text-gray-600 text-lg leading-relaxed mb-4">
                            Qwaiting's virtual queuing system eliminates the hassle of standing in line. 
                            Customers can join the queue remotely, receive real-time alerts, and arrive just in time for service.
                        </p>

                        <p class="text-gray-600 text-lg leading-relaxed mb-6">
                            With fewer crowds, faster service, and improved efficiency — your operations run smoother, and customers stay happier.
                        </p>

                        <a href="/signup" 
                        class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-xl text-lg font-semibold hover:shadow-2xl hover:-translate-y-1 transition-all">
                            Get Free Trial →
                        </a>
                    </div>
                </div>

            </div>
        </section>

        {{-- How It Works Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 overflow-hidden">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold leading-tight mb-4">
                        How it Works
                    </h2>
                    <p class="text-xl text-gray-600">Enable your patients to access your healthcare services anytime,
                        anywhere.</p>
                </div>

                {{-- Vertical Timeline with Alternating Layout --}}
                <div class="relative">
                    {{-- Center Line --}}
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-primary via-purple-400 to-primary hidden lg:block">
                    </div>

                    <div class="space-y-16">
                        {{-- Step 1 - Left Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-right">
                            <div class="lg:text-right lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            1
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Self Check-in</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block text-left">Self Check-in
                                    </h3>
                                    <p class="text-gray-600 text-lg leading-relaxed text-left mb-4">
                                        Customers begin their journey by checking in through their smartphone, quick, easy, and completely contactless.
                                    </p>
                                    <ul class="space-y-4 text-left">
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Scan a QR code displayed at the entrance or online.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            No physical interaction or staff assistance required.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Instantly added to the virtual queue.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/self_check-in.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 2 - Right Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-left">
                            <div class="lg:order-2 lg:pl-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            2
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Get a Mobile Ticket</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Get a Mobile Ticket</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        After check-in, customers receive a digital ticket on their phone.
                                    </p>
                                    <ul class="space-y-4 text-left">
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Displays queue position and estimated wait time.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Allows waiting from anywhere, inside, outside, or even off-premises.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Reduces crowding and frustration on-site.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/receive_a_mobile_ticket.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary  rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 3 - Left Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-right">
                            <div class="lg:text-right lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            3
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden text-left">Real-time Notifications</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block text-left">Real-time Notifications</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed text-left mb-4">
                                        Qwaiting keeps customers informed with timely alerts.
                                    </p>

                                    
                                    <ul class="space-y-4 text-left">
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Receive SMS or email updates as their turn approaches.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Alerts give them enough time to reach the counter without rushing.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Helps manage footfall and improve flow.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/get_an_alert_notification.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
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
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Get Served Without Delays</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Notifications</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        When it's their turn, customers simply show their digital ticket and receive service promptly.
                                    </p>
                                    <ul class="space-y-4 text-left">
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            No long lines or confusion.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Faster service means happier, more satisfied visitors.
                                        </li>
                                        <li class="flex items-start gap-3 text-sm text-text-medium">
                                            <svg class="w-5 h-5 text-accent-green flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            Ideal for high-traffic environments like banks, hospitals, and government offices.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/get_served.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
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
                    #1 Cloud-Based Queue Management System
                </h2>
                <p class="text-xl text-white/90 leading-relaxed mb-8">
                    Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our Queue
                    Management Software helps businesses enhance your productivity and reputation by satisfying your
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
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Virtual Queue
                            Management </span>
                        <span
                            class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Features</span>
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Feature 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/mobile_queue_management.svg" alt="Mobile Tickets"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Mobile Tickets</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Our system allows customers to join the queue lines remotely via their mobile phones. It
                                provides live queue reports and alerts customers when their turn is next.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/staff_application.svg" alt="Staff Application"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Staff Application</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Integrating our virtual queuing solution into staff workflows allows team members to access
                                customer information in advance, enabling more effective planning and schedule adjustments.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/online_customer_feedback.svg" alt="Customer Feedback"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Customer Feedback</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Customers can leave their thoughts about staff performance or the overall experience using
                                their smartphones. This feedback can be used to improve service quality constantly.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/analytical_reporting.svg"
                                    alt="Analysis and Reporting" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Analysis and Reporting</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Collect data insights and analytic reports to make informed decisions and provide
                                exceptional customer service. Easily view reports for a specific day or month with just a
                                few taps.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/fully_customizable.svg" alt="Fully Customizable"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Fully Customizable</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Customize your professional dashboard that can be aligned with your brand logos and colors.
                                Include any advanced options to ensure a seamless customer experience.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/multi_branch_control.svg" alt="Multi-branch Control"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Multi-branch Control</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Identify, manage customer information and queues across all your branches on one platform
                                using a single dashboard, giving you more control and convenience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Advantages Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Advantages of
                        </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Online Queue
                            System</span>
                    </h2>
                </div>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-2">
                    {{-- Advantage 1 --}}
                    <div
                        class="p-8 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg transition-all">
                        <div class="flex items-center justify-center w-full mb-6 rounded-2xl">
                            <img src="https://qwaiting.com/frontimg/manage_customer_flow.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Manage Customer Flow</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-primary mr-2">•</span>
                                Stores the customer information in a secure database, and you can monitor it anytime.
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary mr-2">•</span>
                                Access the data anytime from any location and gain insights from a real-time dashboard.
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary mr-2">•</span>
                                Implement safe queuing on the premises.
                            </li>
                        </ul>
                    </div>

                    {{-- Advantage 2 --}}
                    <div
                        class="p-8 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg transition-all">
                        <div class="flex items-center justify-center w-full mb-6 rounded-2xl">
                            <img src="https://qwaiting.com/frontimg/improved_customer_satisfaction.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Improved Customer Satisfaction</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                Remotely join the queue through mobile apps, enabling them to wait conveniently.
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                Minimized physical queues, ensuring customers spend less time waiting in line.
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                Real-time updates to keep customers informed of their queue position.
                            </li>
                        </ul>
                    </div>

                    {{-- Advantage 3 --}}
                    <div
                        class="p-8 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg transition-all">
                        <div class="flex items-center justify-center w-full mb-6 rounded-2xl">
                            <img src="https://qwaiting.com/frontimg/cost_saving.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Cost Saving</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">•</span>
                                Reduces additional labor costs and ensures that resources are deployed effectively.
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">•</span>
                                Save on space and facility expenses as customer queues are managed online.
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">•</span>
                                Analytics helps businesses make informed decisions, cut costs, and boost revenue.
                            </li>
                        </ul>
                    </div>

                    {{-- Advantage 4 --}}
                    <div
                        class="p-8 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg transition-all">
                        <div class="flex items-center justify-center w-full mb-6 rounded-2xl">
                            <img src="https://qwaiting.com/frontimg/accessible_around_o-clock.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Accessible Around o'Clock</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-amber-600 mr-2">•</span>
                                Customers can join lines and get updates on where they stand in the queue at any time.
                            </li>
                            <li class="flex items-start">
                                <span class="text-amber-600 mr-2">•</span>
                                Allow customers to book appointments at their preferred time slots.
                            </li>
                            <li class="flex items-start">
                                <span class="text-amber-600 mr-2">•</span>
                                Expand customer reach and promote a more inclusive approach to service provision.
                            </li>
                        </ul>
                    </div>

                    {{-- Advantage 5 --}}
                    <div
                        class="p-8 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg transition-all">
                        <div class="flex items-center justify-center w-full mb-6 rounded-2xl">
                            <img src="https://qwaiting.com/frontimg/queue_visibility.png" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Queue Visibility</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-pink-600 mr-2">•</span>
                                Track the business's progress and gain valuable insights into queues in real-time.
                            </li>
                            <li class="flex items-start">
                                <span class="text-pink-600 mr-2">•</span>
                                Instantly view the number of customers in the queue and their current status.
                            </li>
                            <li class="flex items-start">
                                <span class="text-pink-600 mr-2">•</span>
                                Valuable reports and analytical tools based on customer behavior and service.
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

        {{-- Why Qwaiting Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-5xl mx-auto">
                <div class="max-w-5xl mx-auto items-center text-center rounded-xl shadow-2xl p-10 bg-primary">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6 text-white">
                            Why <span class="text-white">Qwaiting?</span>
                        </h2>
                        <p class="text-xl leading-relaxed mb-6 text-white">
                            Qwaiting is a solution that helps businesses to overcome various challenges such as long
                            customer wait times, managing crowded spaces, and inefficient queuing processes. This software
                            is ideal for queue management and reducing the overall customer wait time.
                        </p>
                        <p class="text-lg leading-relaxed text-white">
                            We provide the most suitable queuing solution that helps you manage your business operations
                            effectively in every aspect. Improve customer experience, get satisfying outcomes, and control
                            workflow efficiently. You can take your business to the peak with us.
                        </p>
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
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        Latest Posts From the <span class="text-primary">Blog</span>
                    </h2>
                </div>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Blog Post 1 --}}
                    <a href="https://blog.qwaiting.com/qr-code-queue-management-system-a-game-changer-for-businesses/"
                        class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/07/QR-Code-Queue-Management-System-A-Game-Changer-for-Businesses.jpg"
                                alt="QR Code Queue Management System: A Game-Changer for Businesses">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                QR Code Queue Management System: A Game-Changer for Businesses
                            </h3>
                            <p class="text-gray-600">
                                Imagine a world where waiting in line is a thing of the past & customers can effortlessly
                                avail of desired services without hassle...
                            </p>
                        </div>
                    </a>

                    {{-- Blog Post 2 --}}
                    <a href="https://blog.qwaiting.com/online-appointment-booking-software-take-your-business-to-the-next-level/"
                        class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/08/Online-Appointment-Booking-Software_-Take-your-Business-to-the-Next-Level-2.jpg"
                                alt="Online Appointment Booking Software: Take your Business to the Next Level">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                Online Appointment Booking Software: Take your Business to the Next Level
                            </h3>
                            <p class="text-gray-600">
                                Businesses that rely on in-person appointment scheduling are lagging behind and facing
                                various problems...
                            </p>
                        </div>
                    </a>

                    {{-- Blog Post 3 --}}
                    <a href="https://blog.qwaiting.com/customer-feedback-system-the-key-to-an-exceptional-customer-experience/"
                        class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <img src="https://blog.qwaiting.com/wp-content/uploads/2023/06/Customer-Feedback-system.jpg"
                                alt="Customer Feedback System: The Key To An Exceptional Customer Experience">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                Customer Feedback System: The Key To An Exceptional Customer Experience
                            </h3>
                            <p class="text-gray-600">
                                Businesses often face the challenge of delivering outstanding customer experiences while
                                efficiently managing queues...
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection