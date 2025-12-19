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

            <div class="max-w-5xl mx-auto relative z-10 text-center">
                <div class="items-center">
                    {{-- Left Content --}}
                    <div class="space-y-8 mb-10">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full border border-primary/20">
                            <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                            <span class="text-primary font-semibold text-sm">Healthcare</span>
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                            Tele-Consultation with <span class="text-primary">Virtual Queue Management</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-xl mx-auto">
                            Give patients a simple way to book, check in from home, and meet doctors online without waiting
                            rooms. Your team manages one unified queue for both online and onsite visits.
                        </p>

                        <div class="flex flex-wrap gap-4 justify-center">
                            <a href="https://qwaiting.com/contact"
                                class="group relative inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold overflow-hidden transition-all hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1">
                                <span class="relative z-10">Request Demo</span>
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
                            <a href="https://qwaiting.com/features"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all hover:-translate-y-1">
                                See Features
                            </a>
                        </div>
                    </div>

                    {{-- Right Image --}}
                    <div class="mx-w-xl relative">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://qwaiting.com/frontimg/tele-consultation.png" alt="Tele-Consultation"
                                class="max-w-xl mx-auto">
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
                                    <div class="flex items-center gap-4 lg:justify-end mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            1
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Book an Appointment</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Book an Appointment
                                    </h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Patients can book their appointment online and select their preferred date and time
                                        and doctor to consult for more convenience.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/book-an-appointment.png" alt="">
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
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Payment</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Payment</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Patients can easily initiate their appointment fees and pay via credit card, Apple
                                        Pay, and other methods.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/payment-confirmation.png" alt="">
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
                                    <div class="flex items-center gap-4 lg:justify-end mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            3
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Get E-Ticket</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Get E-Ticket</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        After payment processing, patients will receive an e-ticket, displaying their
                                        details like name and ticket number, and their appointment date/time.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/get-E-ticket.png" alt="">
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
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Notifications</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Notifications</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Patients will then receive a message on their registered number with details to join
                                        the teleconsultation services.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/notifications.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 5 - Left Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-right">
                            <div class="lg:text-right lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-end mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            5
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Check in and Join</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Check in and Join</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Patients can check in easily and join the video consultation, or wait conveniently
                                        till they receive alerts when it's their turn.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/notifications.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 6 - Right Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-left">
                            <div class="lg:order-2 lg:pl-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            6
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Virtual Waiting Room</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Virtual Waiting Room
                                    </h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        The link will redirect patients to a virtual waiting room where they can view their
                                        queue status, expected wait times, and available doctors.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/virtual-waiting-room.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 7 - Left Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-right">
                            <div class="lg:text-right lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-end mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            7
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Virtual Video Consultation
                                        </h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Virtual Video
                                        Consultation</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Once their turn comes up, a video call will be started between the patient and the
                                        doctors.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/virtual-video-consultation.png" alt="">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 8 - Right Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-left">
                            <div class="lg:order-2 lg:pl-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            8
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Chat & File Sharing</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Chat & File Sharing
                                    </h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        After the appointment, patients can share their medical history or prescription list
                                        with their doctors, which can help you customize your services.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all">
                                    <img src="https://qwaiting.com/frontimg/chat-and-file-sharing.png" alt="">
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

        {{-- Key Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Key
                            Features</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8">Everything you need to run tele‑consultations at scale.</p>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Feature 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 rounded-xl shadow-sm">
                                <svg class="w-20 h-20 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Unified Virtual and Onsite Queues</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Guide patients to the right provider based on specialty, urgency, service level agreement,
                                or language. Use a smart load-balancing method to ensure fair distribution.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 rounded-xl shadow-sm">
                                <svg class="w-20 h-20 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">SMS, Email, WhatsApp</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Send automated reminders, OTP links, and "you're next" alerts to patients to keep them
                                updated on their wait times. This way, you can effectively reduce appointment no‑shows
                            </p>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 rounded-xl shadow-sm">
                                <svg class="w-20 h-20 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Built‑in Video Rooms</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Join video conferences with a single click. No app download required. Waiting room view for
                                patients. Recording and notes for clinicians.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 rounded-xl shadow-sm">
                                <svg class="w-20 h-20 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Online Payments and Billing</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Collect fees before or after the call. Auto‑issue receipts and reconcile with accounting.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 rounded-xl shadow-sm">
                                <svg class="w-20 h-20 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Compliance‑first</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Roles and permissions, audit logs, encryption in transit and at rest, SSO options.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 rounded-xl shadow-sm">
                                <svg class="w-20 h-20 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Real‑time Analytics</h3>
                            <p class="text-gray-700 text-md leading-relaxed">
                                Track wait times, drop‑offs, agent utilization, CSAT, and SLA breaches in one dashboard.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Choose Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12">
                    {{-- Why Providers Choose Qwaiting --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg">
                        <h2 class="text-3xl font-bold mb-6 text-gray-900">Why Providers Choose Qwaiting</h2>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-primary/10 rounded-full text-primary">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Cut idle time with automated triage and smart
                                    routing.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-primary/10 rounded-full text-primary">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Scale clinics without expanding waiting rooms.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-primary/10 rounded-full text-primary">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Serve multilingual populations with localized UX.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-primary/10 rounded-full text-primary">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Improve revenue capture with fewer no‑shows.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Why Patients Love It --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg">
                        <h2 class="text-3xl font-bold mb-6 text-gray-900">Why Patients Love It</h2>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Book now, wait anywhere, join on time.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Transparent ETAs and queue position.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Links work on any device—no app needed.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Digital prescriptions and secure chat history.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- Integrations Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">INTEGRATIONS</h2>
                <h3 class="text-2xl font-semibold text-gray-700 mb-6">Next-Level Integration for Best Performance</h3>
                <p class="text-xl text-gray-600 leading-relaxed mb-8">
                    Integrate Qwaiting with your preferred tools. Explore a list of popular integrations Qwaiting offers for
                    a smooth and memorable experience.
                </p>
                <img src="https://qwaiting.com/frontimg/Integration.png" alt="Integration" class="w-full">
                <a href="https://qwaiting.com/solutions/integrations"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-primary text-white rounded-2xl font-bold text-lg shadow-2xl hover:shadow-primary/30 hover:scale-105 transition-all">
                    <span>See All</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

        {{-- What They See Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 mb-16">
                    {{-- What the Doctor Sees --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg">
                        <h2 class="text-3xl font-bold mb-6 text-gray-900">What the Doctor Sees</h2>
                        <img src="https://qwaiting.com/frontimg/screen-one.png" alt="What the Doctor Sees" class="w-full mb-10">
                        <p class="text-gray-600 text-lg leading-relaxed">
                            Doctors manage virtual consultations smoothly, view patient details instantly, and stay focused
                            on care, not on switching between apps or managing calls manually.
                        </p>
                    </div>

                    {{-- What the Patient Sees --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg">
                        <h2 class="text-3xl font-bold mb-6 text-gray-900">What the Patient Sees</h2>
                        <img src="https://qwaiting.com/frontimg/screen-two.png" alt="What the Patient Sees" class="w-full mb-10">
                        <p class="text-gray-600 text-lg leading-relaxed">
                            Patients join consultations with one click, know their place in the queue, and connect with
                            their doctor without long waits, confusion, or extra app downloads.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Testimonials --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-12 text-gray-900">What Customers Say</h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    {{-- Testimonial 1 --}}
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all">
                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-600 italic">
                            "Seamless teleconsultation and real-time updates transformed our outpatient experience. By
                            choosing Qwaiting, we can turn long, confusing lines into a smart, stress-free flow."
                        </p>
                        <div class="flex items-center mt-4">
                            <div>
                                <p class="font-bold">Farrer Park Hospital, Singapore</p>
                            </div>
                        </div>
                    </div>

                    {{-- Testimonial 2 --}}
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all">
                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-600 italic">
                            "With Qwaiting, patient journeys became faster, smarter, and truly contactless. The hospital can
                            track real-time updates and follow patient journeys and staff performance through a centralized
                            dashboard."
                        </p>
                        <div class="flex items-center mt-4">
                            <div>
                                <p class="font-bold">Apollo Hospitals, India</p>
                            </div>
                        </div>
                    </div>

                    {{-- Testimonial 3 --}}
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all">
                        <div class="flex mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-600 italic">
                            "Qwaiting helped us digitize patient flow and reduce waiting times drastically. The result?
                            Happier patients, more efficient staff, and stronger brand trust."
                        </p>
                        <div class="flex items-center mt-4">
                            <div>
                                <p class="font-bold">Ram Clinics, Saudi Arabia</p>
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
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">What is the process of Teleconsultation?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                The teleconsultation process begins when a patient books an appointment online through Qwaiting’s portal. They receive a secure video link and join the consultation at the scheduled time. After the session, the doctor can share digital prescriptions, notes, or follow-up instructions directly through the system, making the entire consultation seamless, private, and paperless.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Does Qwaiting provide its own video platform?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Yes, Qwaiting offers an integrated, secure video consultation platform that connects patients and healthcare providers seamlessly, no third-party apps required. It ensures smooth, high-quality virtual consultations.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Is the solution HIPAA compliant?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Yes, Qwaiting adheres to HIPAA standards. We follow strict security protocols, offer BAAs, encryption, audit trails, role-based access control, and SSO to ensure data protection.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How are patients notified?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Patients receive automated notifications via SMS, email, or WhatsApp, reminding them of upcoming appointments, virtual session links, or any schedule changes in real time.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can we mix on-site and tele-consults in one schedule?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Absolutely. Qwaiting’s hybrid scheduling system lets healthcare providers manage both in-person and virtual consultations from a single dashboard, ensuring smooth coordination and time optimization.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Experience Tele‑Consultation with Qwaiting
                </h2>
                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <a href="https://qwaiting.com/contact"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                        <span>Book a Live Demo</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="https://qwaiting.com/signup"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-transparent border-2 border-white text-white rounded-2xl font-bold text-lg hover:bg-white hover:text-primary transition-all">
                        <span>Start a Free Trial</span>
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection