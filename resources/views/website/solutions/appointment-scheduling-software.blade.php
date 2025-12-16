@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-gray-50">

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
                    Appointment Scheduling <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Software</span>
                </h1>

                <p class="text-xl font-bold text-gray-600 leading-relaxed max-w-2xl mx-auto mb-7">The Easiest and Smartest Way to Book Appointments</p>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-7">
                            Qwaiting automates appointment scheduling and minimizes manual tasks so every booking runs
                            smoothly and every client is served on time.
                        </p>

                        <ul class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10 space-y-4">
                            <li class="flex justify-center items-center gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium">Easy Booking Process</span>
                            </li>
                            <li class="flex justify-center items-center gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium">Automatic Calendar Updates</span>
                            </li>
                            <li class="flex justify-center items-center gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium">Customer Alerts & Reminders</span>
                            </li>
                        </ul>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="https://qwaiting.com/signup"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Start Free Trial</span>
                        <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </a>
                    <a href="https://qwaiting.com/contact-us"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-primary hover:text-primary transition-all hover:shadow-lg hover:-translate-y-1 w-full sm:w-auto">
                        Contact Sales
                    </a>
                </div>

                {{-- Hero Image with Floating Effect --}}
                <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/appointment_scheduling_software.png"
                            alt="Biometric Queue Dashboard"
                            class="w-full h-auto transform transition-transform hover:scale-105 duration-700">
                    </div>
                </div>
            </div>
        </section>

        {{-- Global Trust Section --}}
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-6">Global Trust with Local Impact</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Trusted by 65,000+ businesses in over 120 countries, Qwaiting makes appointment scheduling seamless,
                        efficient, and hassle-free.
                    </p>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-hidden mb-16">
                    <!-- Logo Slider Container -->
                    <div class="relative">

                        <!-- Slider Track -->
                        <div class="logo-slider-track flex items-center gap-16">
                            <!-- First Set of Logos -->
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/apollo_hospitals.jpg') }}" alt="Apollo Hospitals"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/saudia-airlines.png') }}" alt="Saudia Airlines"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt="NUS"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/farrerpark.png') }}" alt="Farrer Park"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/NTUC_FairPrice.png') }}" alt="NTUC FairPrice"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/PSB.png') }}" alt="PSB"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>

                            <!-- Duplicate Set for Seamless Loop -->
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/apollo_hospitals.jpg') }}" alt="Apollo Hospitals"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/saudia-airlines.png') }}" alt="Saudia Airlines"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt="NUS"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/farrerpark.png') }}" alt="Farrer Park"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/NTUC_FairPrice.png') }}" alt="NTUC FairPrice"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                            <div
                                class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                <img src="{{ asset('website/asset/images/PSB.png') }}" alt="PSB"
                                    class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 max-w-5xl mx-auto">
                    <a href="/industries/banking-queue-system"
                        class="flex items-center justify-center p-4 bg-primary rounded-2xl hover:bg-primary/5 hover:scale-105 transition-all group">
                        <span class="font-semibold text-white group-hover:text-primary">Banking</span>
                    </a>
                    <a href="/industries/healthcare"
                        class="flex items-center justify-center p-4 bg-primary rounded-2xl hover:bg-primary/5 hover:scale-105 transition-all group">
                        <span class="font-semibold text-white group-hover:text-primary">Healthcare</span>
                    </a>
                    <a href="/industries/educational-queue-system"
                        class="flex items-center justify-center p-4 bg-primary rounded-2xl hover:bg-primary/5 hover:scale-105 transition-all group">
                        <span class="font-semibold text-white group-hover:text-primary">Education</span>
                    </a>
                    <a href="/industries/public-sector-queue-system"
                        class="flex items-center justify-center p-4 bg-primary rounded-2xl hover:bg-primary/5 hover:scale-105 transition-all group">
                        <span class="font-semibold text-white group-hover:text-primary">Public Sector</span>
                    </a>
                    <a href="/industries/retail-queue-system"
                        class="flex items-center justify-center p-4 bg-primary rounded-2xl hover:bg-primary/5 hover:scale-105 transition-all group">
                        <span class="font-semibold text-white group-hover:text-primary">Retail</span>
                    </a>
                    <a href="/industries/airport-queue-system"
                        class="flex items-center justify-center p-4 bg-primary rounded-2xl hover:bg-primary/5 hover:scale-105 transition-all group">
                        <span class="font-semibold text-white group-hover:text-primary">Airport</span>
                    </a>
                </div>

                <div class="text-center mt-12">
                    <a href="/industries/customer-stories"
                        class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                        Read Case Studies
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Ease of Booking section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 overflow-hidden">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold leading-tight mb-4">
                        How an Appointment Scheduling System Works
                    </h2>
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
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden"> Select a Service</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Select a Service</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Customers choose the service they need in just a few taps on their mobile device.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/select_service.png" alt="Customer Arrival"
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
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Pick a Preferred Date and Time</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Pick a Preferred Date and Time</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        They select their ideal date and time slot for the appointment.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/select_preferred_date_and_time_slot.png" alt="Select Preferred Date and Time Slot"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
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
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden"> Enter Contact Details</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Enter Contact Details</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        The system collects essential details like phone number and email to enable personalized communication.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/fill_in_the_required_details.png" alt="Fill in the Required Details"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
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
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Receive Instant Confirmation</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Receive Instant Confirmation</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Customers get an instant booking confirmation with a unique Booking ID or QR code.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-amber-200 to-orange-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/booking_confirmed.png" alt="Booking Confirmed"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg hidden lg:block">
                            </div>
                        </div>

                        {{-- Step 5 - Left Side --}}
                        <div class="relative grid lg:grid-cols-2 gap-8 items-center" data-aos="fade-right">
                            <div class="lg:text-left lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-start mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            5
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden"> Get Real-Time Alerts and Updates</h3>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 hidden lg:block">Get Real-Time Alerts and Updates</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Automated SMS and email reminders keep customers informed about their appointment status, estimated wait times, and any changes. This helps businesses manage peak hours, improve resource allocation, and ensure smooth operations.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div class="relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/get_alerts_on_smartphones.png" alt="Get Alerts on Smartphones"
                                        class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
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

        {{-- Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Features of  
                        <span class="text-primary">Appointment Booking</span>
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
                                <img src="https://qwaiting.com/frontimg/appointment_booking.svg" class="w-15 h-15">
                            </div>
                        </div>

                        {{-- Card Content --}}
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Booking Schedule</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Customers can schedule their appointments according to their comfort and slot availability.
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
                                <img src="https://qwaiting.com/frontimg/calendar_synchronization.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Calendar Synchronization</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Easily integrates with Google Calendar and reminds customers of their bookings to reduce no-shows.
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
                                <img src="https://qwaiting.com/frontimg/send_reminders.svg" class="w-15 h-15">
                            </div>
                        </div>

                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Send Notifications</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Automated alerts to keep your customers informed with real-time updates via Email and SMS.
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
                                <img src="https://qwaiting.com/frontimg/multiservice-booking.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Multiservice Booking</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Allow your customers to book multiple appointments at the same time in a single slot.
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
                                <img src="https://qwaiting.com/frontimg/flexible-appointment-management.svg" class="w-15 h-15">
                            </div>
                        </div>

                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Flexible Appointment Management</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Enable easy booking, rescheduling, and cancellation with just a few clicks to keep schedules accurate and give users full control.
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
                                <img src="https://qwaiting.com/frontimg/real-time-data.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Real-time Data</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                               Live data keeps customers informed of their wait times and their positions in a queue. This helps remove any queue confusion.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 7 --}}
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
                                <img src="https://qwaiting.com/frontimg/multilingual.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Multilingual</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                               Multilingual dashboard ensures a smooth and effortless booking for a diverse audience.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 8 --}}
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
                                <img src="https://qwaiting.com/frontimg/time-zone.svg" class="w-15 h-15">
                            </div>
                        </div>
                        <div class="pt-5 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Time Zones</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                               The system easily coordinates across various time zones. Automatic updates ensure your scheduling remains accurate and simple for all locations.
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
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Benefits of </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Appointment Booking</span>
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-2">
                    {{-- Benefit 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/real_time_availability.png" alt="Real Time Availability"
                                    class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Available 24/7
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
                                            <span class="text-gray-600 text-lg">Works even when staff is offline</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Easy self-scheduling and cancellation for customers</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Automatic updates prevent double bookings and mistakes</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/centralized_information_system.png"
                                    alt="Flexibility and Scalability" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Centralized Information System</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Securely access past client booking preferences for personalized service</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">256-bit encryption for safe and efficient data management</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Real-time synchronization on desktop, tablet, and mobile for team-wide updates</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/automated-administrated-tasks.png"
                                    alt="Automated Administrated Tasks" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Automated Administrated Tasks</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Eliminates manual scheduling tasks to free up staff time</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Syncs with existing business tools to save time and reduce errors</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Generates performance reports to track staff efficiency and client satisfaction</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/reporting-and-analytics.png" alt="Reporting & Analytics"
                                    class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Reporting & Analytics</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Detailed reports on branch-wise performance</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Use appointment and visit data to reduce no-shows and improve service</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Analyze trends to schedule the right number of staff for demand</span>
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
                                    alt="Customizable Booking System" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Customizable Booking System</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Adjust booking steps to fit your business and industry needs</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Customize interface with brand logo, colors, and messages</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Maintain consistency across all customer touchpoints</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Benefit 6 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-full h-full mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/%E2%80%A8smooth-integration-with-your-business-systems.png"
                                    alt="Smooth Integration with Your Business Systems" class="w-full h-full">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Smooth Integration with Your Business Systems</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Connect with website, CRM, or ERP to reduce platform switching</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Embed booking, automate data transfers, and create custom workflows</span>
                                </li>
                                <li class="flex items-start">
                                            <span
                                                class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </span>
                                            <span class="text-gray-600 text-lg">Enjoy real-time updates, centralized control, and a seamless user experience</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Effortless Experience Section --}}
        <section class="py-20 bg-primary">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center gap-16 items-center">
                    <div class="max-w-7xl mx-auto">
                        <h2 class="text-4xl text-white font-bold mb-6">Effortless Experience in One Place</h2>
                        <p class="text-lg text-white leading-relaxed mb-8">
                            Our scheduling system helps you manage a smooth customer journey, start to finish. From booking
                            to check-in to service and feedback, manage every step with one easy-to-use platform that keeps
                            your team organized and clients satisfied.
                        </p>
                        <div class="flex flex-col justify-center sm:flex-row gap-4">
                            <a href="/signup"
                                class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary rounded-xl font-semibold hover:bg-primary/90 transition-colors">
                                Book Your Free Demo Now!
                            </a>
                        </div>
                        <p class="mt-4 text-sm text-white">Connect with us for a quick online demo to run your business
                            successfully!</p>
                    </div>
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
                        WHY CHOOSE QWAITING?
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

        {{-- FAQ Section --}}
        <section class="py-20 bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-center mb-12">Frequently Asked Questions</h2>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can Qwaiting integrate with my existing business tools?</span>
                            <svg class="w-6 h-6 text-primary transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Absolutely. Qwaiting connects seamlessly with CRMs, ERPs, websites, and other business platforms to automate workflows and maintain a unified scheduling process.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Is customer data safe with Qwaiting?</span>
                            <svg class="w-6 h-6 text-primary transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           Yes. Qwaiting uses enterprise-grade 256-bit encryption and complies with global data protection standards to ensure all customer information remains secure.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Will two appointments ever overlap? How do you prevent that?</span>
                            <svg class="w-6 h-6 text-primary transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           No. Qwaiting automatically blocks booked slots and manages time gaps to ensure every appointment fits perfectly without double scheduling or confusion.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does Qwaiting handle walk-ins alongside scheduled appointments?</span>
                            <svg class="w-6 h-6 text-primary transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           Walk-in customers can join a virtual queue while scheduled bookings are managed in parallel. This ensures fair wait times and smoother service flow for everyone.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How do alerts and reminders help keep appointments on track?</span>
                            <svg class="w-6 h-6 text-primary transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           Alerts and reminders reduce no-shows by notifying clients ahead of their appointment. This gives them time to confirm, reschedule, or cancel, keeping your schedule organized and fully utilized.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does Qwaiting work in different languages and time zones?</span>
                            <svg class="w-6 h-6 text-primary transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           Qwaiting automatically detects the customer’s time zone, and its multi-lingual dashboard supports multiple languages, ensuring all bookings, reminders, and updates are accurate and personalized.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Why does your business need an online appointment scheduling system?</span>
                            <svg class="w-6 h-6 text-primary transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           It saves staff time, reduces phone calls, prevents double bookings, and provides customers with 24/7 booking access - making operations smoother and service faster.
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection