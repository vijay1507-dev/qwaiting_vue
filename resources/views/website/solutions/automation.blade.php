@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-gray-50">

        {{-- Hero Section --}}
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
                    Transform Every Queue into <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">an Effortless, Automated Flow</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10">
                    Automate your entire service journey with Qwaiting. Eliminate manual work, empower customers with seamless self-service, and make real-time, data-driven decisions that accelerate efficiency across every touchpoint.
                </p>

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
                    <a href="https://qwaiting.com/contact"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-primary hover:text-primary transition-all hover:shadow-lg hover:-translate-y-1 w-full sm:w-auto">
                        Contact Sales
                    </a>
                </div>

                {{-- Hero Image --}}
                <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/transform-every-queue-into-an-effortless-automated-flow.png"
                            alt="Biometric Queue Dashboard"
                            class="w-full h-full transform transition-transform hover:scale-105 duration-700">
                    </div>
                </div>
            </div>
        </section>

        <!-- Trusted By Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-12 text-center">Trusted by Leading
                Organizations Across Sectors</p>

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

    </section>

        {{-- Automation Capabilities Section - Alternating Layout --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-20" data-aos="fade-up">
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">
                        Qwaiting's <span class="text-primary">Automation Capabilities</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Powerful features designed to streamline operations and enhance customer experience.
                    </p>
                </div>

                <div class="space-y-32">
                    {{-- Capability 1 --}}
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="order-2 lg:order-1" data-aos="fade-right">
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Combine Bookings and Walk-Ins Seamlessly</h3>
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Manage every visitor effortlessly — whether booked in advance or walking in. Qwaiting's
                                intelligent queue automation syncs appointments and live arrivals in real time, keeping
                                operations smooth and wait times precise without manual updates.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Automatically merge appointments and walk-ins into one
                                        queue</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Adjust wait times dynamically based on real-time
                                        footfall</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Eliminate manual check-ins and reduce staff workload</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2 relative group" data-aos="fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/combine-bookings-and-walk-ins-seamlessly.png"
                                alt="Combine Bookings"
                                class="relative rounded-3xl shadow-lg bg-white w-full transform transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>

                    {{-- Capability 2 --}}
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="order-1 lg:order-1 relative group" data-aos="fade-right">
                            <div
                                class="absolute inset-0 bg-gradient-to-tl from-orange-100 to-red-100 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/smart-routing-and-dynamic-wait-time-prediction.png"
                                alt="Smart Routing"
                                class="relative rounded-3xl shadow-lg bg-white w-full transform transition-transform group-hover:-translate-y-2">
                        </div>
                        <div class="order-2 lg:order-2" data-aos="fade-left">
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Smart Routing & Dynamic Wait-Time Prediction
                            </h3>
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Predict, route, and serve smarter. Qwaiting’s automation engine uses live data to forecast
                                peak hours, balance queues, and direct visitors to the right counter or agent instantly.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Forecasts busy periods and optimizes queue
                                        distribution</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Routes visitors automatically to the next available
                                        counter</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Minimizes congestion and ensures faster, fairer
                                        service</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Capability 3 --}}
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="order-2 lg:order-1" data-aos="fade-right">
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Intelligent Waitlist Prioritization</h3>
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Serve what matters first. Qwaiting automatically prioritizes customers based on rules like
                                VIP level, service type, or urgency—keeping operations fair, transparent, and efficient.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Reorders queues in real time based on priority logic</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Identifies and fast-tracks high-value or time-sensitive
                                        cases</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Improves efficiency without disrupting overall flow</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2 relative group" data-aos="fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-purple-100 to-pink-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/intelligent-waitlist-prioritization.png"
                                alt="Intelligent Waitlist"
                                class="relative rounded-3xl shadow-lg bg-white w-full transform transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>

                    {{-- Capability 4 --}}
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="order-1 lg:order-1 relative group" data-aos="fade-right">
                            <div
                                class="absolute inset-0 bg-gradient-to-tl from-teal-100 to-green-100 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/automated-visit-and-waitlist-management.png"
                                alt="Automated Visit Management"
                                class="relative rounded-3xl shadow-lg bg-white w-full transform transition-transform group-hover:-translate-y-2">
                        </div>
                        <div class="order-2 lg:order-2" data-aos="fade-left">
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Automated Visit & Waitlist Management</h3>
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Streamlines queue operations by automatically marking visit status as completed and closing
                                waitlists when they reach set limits. This ensures your waitlist always reflects real-time
                                progress while preventing system overloads and long waits.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Automatically marks visits as completed after service</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Closes waitlists based on time or capacity thresholds</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Keeps operations efficient and customer experience
                                        frustration-free</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Capability 5 --}}
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="order-2 lg:order-1" data-aos="fade-right">
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Smart Customer Notifications</h3>
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Keep every customer informed, effortlessly. From booking confirmations to live updates,
                                Qwaiting's automated communication ensures no confusion or missed turns.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Sends real-time confirmations, reminders, and alerts</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Notifies customers instantly of schedule changes or queue
                                        progress</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Delivers personalized updates across preferred
                                        channels</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2 relative group" data-aos="fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-indigo-100 to-blue-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/smart-customer-notifications.png"
                                alt="Smart Notifications"
                                class="relative rounded-3xl shadow-lg bg-white w-full transform transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>

                    {{-- Capability 6 --}}
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <div class="order-1 lg:order-1 relative group" data-aos="fade-right">
                            <div
                                class="absolute inset-0 bg-gradient-to-tl from-cyan-100 to-blue-100 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/omnichannel-data-sync-and-integration.png"
                                alt="Omnichannel Data Sync"
                                class="relative rounded-3xl shadow-lg bg-white w-full transform transition-transform group-hover:-translate-y-2">
                        </div>
                        <div class="order-2 lg:order-2" data-aos="fade-left">
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Omnichannel Data Sync & Integration</h3>
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Connects every customer interaction across kiosks, web portals, and enterprise systems to
                                create one unified, automated workflow.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Syncs customer and queue data across CRMs, ERPs, and booking
                                        tools</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Updates all connected platforms in real time</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center">✓</span>
                                    <span class="text-gray-700">Maintains consistent, error-free operations across every
                                        channel</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Use Cases Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Use Cases</h2>
                    <p class="text-lg text-gray-500">Industry-specific solutions for automated management.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Case 1 -->
                    <div
                        class="p-8 rounded-2xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mb-6 bg-blue-500 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                            <img src="https://qwaiting.com/frontimg/banking-and-financial-services.svg"
                                class="w-10 h-10 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Banking & Financial Services</h3>
                        <p class="text-gray-600">Automate customer onboarding, loan processing, and KYC verification.</p>
                    </div>

                    <!-- Case 2 -->
                    <div
                        class="p-8 rounded-2xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mb-6 bg-red-500 rounded-xl flex items-center justify-center group-hover:bg-red-600 transition-colors">
                            <img src="https://qwaiting.com/frontimg/healthcare-and-insurance.svg"
                                class="w-10 h-10 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Healthcare & Insurance</h3>
                        <p class="text-gray-600">Streamline appointment booking, patient intake, and claim updates.</p>
                    </div>

                    <!-- Case 3 -->
                    <div
                        class="p-8 rounded-2xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mb-6 bg-gray-500 rounded-xl flex items-center justify-center group-hover:bg-gray-600 transition-colors">
                            <img src="https://qwaiting.com/frontimg/government-and-public-services.svg"
                                class="w-10 h-10 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Government & Public Services</h3>
                        <p class="text-gray-600">Automate queues for permits, citizen services, and compliance checks.</p>
                    </div>

                    <!-- Case 4 -->
                    <div
                        class="p-8 rounded-2xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mb-6 bg-orange-500 rounded-xl flex items-center justify-center group-hover:bg-orange-600 transition-colors">
                            <img src="https://qwaiting.com/frontimg/education.svg"
                                class="w-10 h-10 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Education</h3>
                        <p class="text-gray-600">Manage admissions, counseling, and administrative processes with automated
                            scheduling.</p>
                    </div>

                    <!-- Case 5 -->
                    <div
                        class="p-8 rounded-2xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mb-6 bg-purple-500 rounded-xl flex items-center justify-center group-hover:bg-purple-600 transition-colors">
                            <img src="https://qwaiting.com/frontimg/hospitality.svg"
                                class="w-10 h-10 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Hospitality & Travel</h3>
                        <p class="text-gray-600">Automate guest check-ins, service queues, and booking confirmations.</p>
                    </div>

                    <!-- Case 6 -->
                    <div
                        class="p-8 rounded-2xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1">
                        <div
                            class="w-16 h-16 mb-6 bg-teal-500 rounded-xl flex items-center justify-center group-hover:bg-teal-600 transition-colors">
                            <img src="https://qwaiting.com/frontimg/diagnostics.svg"
                                class="w-10 h-10 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Diagnostics & Labs</h3>
                        <p class="text-gray-600">Auto-register tests, queue updates, and send instant result notifications.
                        </p>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="/industries"
                        class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                        See All Industries <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- ROI Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-purple-50 relative overflow-hidden">
            <div class="absolute inset-0 opacity-20 bg-[url('https://qwaiting.com/frontimg/pattern.svg')]"></div>
            <div class="max-w-7xl mx-auto relative z-10 grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-bold leading-tight">Qwaiting's Automation Advantage: <span
                            class="text-primary">Your ROI Breakdown</span></h2>

                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-2xl">💰</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-1">Reduced labour costs</h3>
                                <p class="text-gray-600">Minimise manual keystrokes and front-desk load.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-2xl">🚀</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-1">Higher throughput</h3>
                                <p class="text-gray-600">More service completions per hour, fewer bottlenecks.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-2xl">😊</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-1">Improved satisfaction</h3>
                                <p class="text-gray-600">Shorter waits plus consistent service, leads to happier customers.
                                </p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-2xl">📊</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-1">Data-driven decisions</h3>
                                <p class="text-gray-600">Automated analytics unlock insights to refine staffing, service
                                    hours and floor layout.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-2xl">⚡</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-1">Scalability</h3>
                                <p class="text-gray-600">Deploy automation across multiple locations with minimal
                                    incremental cost.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <a href="/signup"
                            class="inline-block bg-primary hover:bg-primary/80 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg hover:shadow-blue-500/30">Start
                            Free Trial</a>
                    </div>
                </div>

                <div class="relative">
                    <img src="https://qwaiting.com/frontimg/qwaitings-automation-advantage-your-roi-breakdown.png"
                        alt="ROI Breakdown" class="rounded-3xl shadow-2xl">
                    <div
                        class="absolute -inset-4 rounded-3xl -z-10 blur-lg opacity-30">
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Qwaiting Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Why Qwaiting Makes Queue & Appointment Automation
                        Smarter</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-all text-center group">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-blue-50 rounded-full flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/effortless-setup-and-operation.svg"
                                class="w-12 h-12 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="font-bold text-xl mb-3">Effortless setup and operation</h3>
                        <p class="text-gray-600 text-sm">Our intuitive interface lets teams automate queues and bookings in
                            minutes — no technical expertise needed.</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-all text-center group">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-purple-50 rounded-full flex items-center justify-center group-hover:bg-purple-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/flexible-automation-workflows.svg"
                                class="w-12 h-12 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="font-bold text-xl mb-3">Flexible automation workflows</h3>
                        <p class="text-gray-600 text-sm">Customize automation rules that match your business needs, ensuring
                            smooth service operations.</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-all text-center group">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-orange-50 rounded-full flex items-center justify-center group-hover:bg-orange-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/unified-queue-and-appointment-handling.svg"
                                class="w-12 h-12 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="font-bold text-xl mb-3">Unified queue and appointment handling</h3>
                        <p class="text-gray-600 text-sm">Manage walk-ins and scheduled visits together in one system to
                            avoid overlaps.</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-all text-center group">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-green-50 rounded-full flex items-center justify-center group-hover:bg-green-100 transition-colors">
                            <img src="https://qwaiting.com/frontimg/seamless-system-integration.svg"
                                class="w-12 h-12 group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="font-bold text-xl mb-3">Seamless system integration</h3>
                        <p class="text-gray-600 text-sm">Connect with third-party tools to automate data flow across
                            platforms.</p>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="/request-demo"
                        class="btn-primary inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-xl font-bold shadow-lg hover:shadow-primary/50 hover:scale-105 transition-all">
                        Schedule a Demo
                    </a>
                </div>
            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="py-24 bg-white px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">Frequently Asked Questions</h2>

                <div class="space-y-4" x-data="{ active: null }">
                    {{-- FAQ Item 1 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 1 ? null : 1"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">What can Qwaiting’s automation handle?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 1 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 1" x-collapse class="px-6 pb-6 text-gray-600">
                            Qwaiting automates the entire service journey — from ticket issuance and queue routing to customer notifications and performance analytics. It manages self-check-ins, walk-in routing, and feedback collection, minimizing manual intervention while delivering faster, more consistent customer flow.
                        </div>
                    </div>

                    {{-- FAQ Item 2 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 2 ? null : 2"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">How does automation improve staff
                                productivity?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 2 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 2" x-collapse class="px-6 pb-6 text-gray-600">
                            By automating repetitive tasks like queue updates and customer alerts, Qwaiting allows staff to focus on personalized service and faster resolutions. Teams spend less time managing lines and more time enhancing the overall customer experience.
                        </div>
                    </div>

                    {{-- FAQ Item 3 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 3 ? null : 3"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">Can Qwaiting’s automation be customized for my
                                business workflows?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 3 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 3" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Qwaiting lets you define custom rules and smart triggers that match your exact service operations. For instance, automatically send alerts when wait times exceed limits or prioritize VIP customers during peak hours. It adapts to your business, not the other way around.
                        </div>
                    </div>

                    {{-- FAQ Item 4 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 4 ? null : 4"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">Does automation work in real time and handle peak
                                demand?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 4 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 4" x-collapse class="px-6 pb-6 text-gray-600">
                            Absolutely. Qwaiting processes live data to forecast demand, route visitors intelligently, and optimize staff allocation. During busy hours, it dynamically adjusts queue distribution to maintain a smooth, fair experience across all service points.
                        </div>
                    </div>

                    {{-- FAQ Item 5 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 5 ? null : 5"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">How does Qwaiting use automation to keep queues
                                accurate?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 5 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 5" x-collapse class="px-6 pb-6 text-gray-600">
                            Our system continuously updates queue and booking data in real time, automatically marking visits as completed and syncing wait times across all touchpoints. This eliminates manual errors and ensures accurate, efficient flow management.
                        </div>
                    </div>

                    {{-- FAQ Item 6 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 6 ? null : 6"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">Can Qwaiting integrate with other systems?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 6 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 6" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Qwaiting connects seamlessly with CRM, ERP, POS, kiosk, and appointment systems through open APIs. It syncs customer data across platforms, ensuring consistent workflows and a unified digital ecosystem.
                        </div>
                    </div>

                    {{-- FAQ Item 7 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 7 ? null : 7"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">How do I measure the ROI of automation in queue
                                management?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 7 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 7" x-collapse class="px-6 pb-6 text-gray-600">
                            Track metrics like reduced wait times, higher service throughput, improved customer satisfaction scores, and increased operational efficiency to quantify automation-driven ROI
                        </div>
                    </div>

                    {{-- FAQ Item 8 --}}
                    <div
                        class="border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-primary/50 hover:shadow-md">
                        <button @click="active = active === 8 ? null : 8"
                            class="w-full flex items-center justify-between p-6 text-left bg-white">
                            <span class="font-bold text-lg text-gray-900">How quickly can I implement automation with
                                Qwaiting?</span>
                            <span class="transform transition-transform duration-300"
                                :class="{ 'rotate-180': active === 8 }">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        </button>
                        <div x-show="active === 8" x-collapse class="px-6 pb-6 text-gray-600">
                            Implementation is fast! Typically within days. Qwaiting’s cloud-based setup, modular design, and expert onboarding ensure a smooth, disruption-free automation rollout.
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection