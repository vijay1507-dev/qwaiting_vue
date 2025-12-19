@extends('website.layout.website')

@section('title', 'Free ROI Calculator for Queue Management Software - Qwaiting')
@section('meta_description', 'See how much you can save with our free queue management ROI calculator. Improve customer experience and calculate savings in seconds with Qwaiting.')

@section('content')

    <section class="w-full py-32 bg-[#f8fafc]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

            <!-- Left Content -->
            <div class="lg:w-7/12 w-full">
                <h1 class="text-3xl md:text-5xl lg:text-6xl leading-tight font-bold text-gray-900 mb-4">
                Free Queue Management ROI Calculator <span class="text-primary">– See Your Savings Instantly</span>
                </h1>

                <p class="text-gray-600 max-w-lg">
                Use Qwaiting’s free ROI Calculator for Queue Systems to measure how much time, cost, and staff effort your business can save
                </p>

                <!-- Buttons -->
                <div class="mt-6 flex flex-col md:flex-row md:space-x-4 space-y-3 md:space-y-0">
                <a href="#calculate-my-roi"
                    class="w-full md:w-auto bg-white border border-primary text-primary px-6 py-3 rounded-lg font-semibold shadow-sm hover:bg-primary hover:text-white transition">
                    Calculate My ROI <i class="fa fa-angle-right"></i>
                </a>

                <a href="https://qwaiting.com/contact"
                    class="w-full md:w-auto bg-primary text-white px-6 py-3 rounded-lg font-semibold shadow-sm hover:bg-primary hover:text-primary hover:bg-white hover:border hover:border-primary transition">
                    Book a Demo <i class="fa fa-angle-right"></i>
                </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="lg:w-5/12 w-full">
                <img src="https://qwaiting.com/frontimg/roi.webp"
                    alt="Queue Management ROI Calculator"
                    class="w-full h-auto object-cover rounded-xl">
            </div>

            </div>
        </div>
        </section>

    <!-- ROI Calculator (Dark Mode) -->
    <div class="relative bg-primary text-black min-h-screen py-24" id="calculate-my-roi">
        <!-- Background Ambient Light -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-indigo-600/20 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-purple-600/20 rounded-full blur-[120px]">
            </div>
        </div>

        <div class="container max-w-[1400px] mx-auto px-4 md:px-8 relative z-10">
            <!-- Header -->
            <header
                class="mb-12 text-center md:text-left md:flex md:items-end md:justify-between border-b border-white/10 pb-8">
                <div>
                    <h2
                        class="text-4xl md:text-5xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-purple-200">
                        See Your ROI Instantly
                    </h2>
                    <p class="text-white mt-2 text-lg max-w-2xl">
                        Adjust footfall, service time, and staff counters - get real-time results on savings, efficiency, and customer satisfaction.
                    </p>
                </div>
            </header>

            <div class="grid grid-cols-1 xl:grid-cols-4 gap-8 items-start">

                <!-- Left Sidebar: Controls -->
                <div class="xl:col-span-1 space-y-6">
                    <div
                        class="bg-white rounded-2xl border border-white/10 p-6 flex flex-col gap-6 shadow-2xl">
                        <!-- Inputs -->
                        <div>
                            <div class="flex items-center gap-2 mb-4 text-indigo-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                    </path>
                                </svg>
                                <h3 class="font-bold text-sm uppercase tracking-wide">Configuration</h3>
                            </div>
                            <div id="inputs" class="space-y-5"></div>
                        </div>

                        <div class="h-px bg-white/10 w-full"></div>

                        <!-- Impact -->
                        <div>
                            <div class="flex items-center gap-2 mb-4 text-purple-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <h3 class="font-bold text-sm uppercase tracking-wide">Qwaiting Impact</h3>
                            </div>
                            <div id="impact" class="space-y-5"></div>
                        </div>

                        <!-- Economics -->
                        <details class="group bg-white rounded-xl overflow-hidden border border-white/5 transition-all">
                            <summary
                                class="flex items-center justify-between p-3 cursor-pointer select-none text-black text-sm hover:text-black transition-colors">
                                <span>Advanced Economics</span>
                                <svg class="w-4 h-4 transform group-open:rotate-180 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="p-3 pt-0 border-t border-white/5 space-y-4 mt-2" id="economics"></div>
                        </details>
                    </div>

                    <!-- Utilization Warning -->
                    <div id="warning"
                        class="hidden p-4 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-200 text-sm flex gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        <span id="warning-text"></span>
                    </div>
                </div>

                <!-- Right Main Area: Results -->
                <div class="xl:col-span-3 space-y-6">

                    <!-- Top Metrics Cards -->
                    <div id="infobox" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div>

                    <!-- Chart + At a Glance -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        <!-- Chart -->
                        <div
                            class="lg:col-span-2 bg-white backdrop-blur-md rounded-2xl border border-white/10 p-6 flex flex-col shadow-xl min-h-[400px]">
                            <h3 class="text-lg font-bold text-black mb-6 flex items-center gap-2">
                                Before vs After
                                <span class="text-xs font-normal text-black ml-auto flex gap-4">
                                    <span class="flex items-center gap-1"><span
                                            class="w-2 h-2 rounded-full bg-slate-500"></span> Current</span>
                                    <span class="flex items-center gap-1"><span
                                            class="w-2 h-2 rounded-full bg-indigo-500"></span> Pro</span>
                                </span>
                            </h3>
                            <div class="relative w-full flex-grow">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>

                        <!-- Side Panel: Stats + Capacity -->
                        <div class="space-y-6">
                            <!-- At A Glance -->
                            <div class="bg-white backdrop-blur-md rounded-2xl border border-white/10 p-6 shadow-xl">
                                <h3 class="text-lg font-bold text-black mb-4">Metric Breakdown</h3>
                                <ul id="glance" class="space-y-0 text-sm"></ul>
                            </div>

                            <!-- Theoretical Capacity -->
                            <div
                                class="bg-white rounded-2xl border border-indigo-500/20 p-6 shadow-xl relative overflow-hidden">
                                <div class="absolute top-0 right-0 p-4 opacity-10"><svg class="w-20 h-20 text-black"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg></div>
                                <h3 class="text-lg font-bold text-black relative z-10">Max Capacity</h3>
                                <p class="text-indigo-500 text-xs mb-4 relative z-10">Theoretical max customers/day</p>
                                <div class="grid grid-cols-2 gap-3 relative z-10" id="capacityCards"></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



        {{-- Why Choose Section --}}
        <section class="w-full py-20 bg-white">

            <div class="max-w-7xl mx-auto p-4 lg:p-10 text-center mb-4">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 text-center">
                    Why Calculate <span class="text-primary">Queue Management Software ROI?</span>
                </h2>

                <p class="text-gray-600 leading-relaxed text-center">
                    Uncover the real cost of waiting lines and why action matters. Every minute a customer
                    spends waiting is a lost opportunity, which leads to fewer sales, frustrated visitors,
                    and overwhelmed staff members. Over time, these hidden costs pile up, silently draining
                    revenue and damaging customer trust.
                </p>
            </div>

            <div class="max-w-7xl mx-auto px-4 lg:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                

                <!-- LEFT SIDE CONTENT FROM FIRST IMAGE -->
                <div class="space-y-6">

                    <!-- STAT CARDS (Replacing features from second image) -->
                    <div class="space-y-4">

                        <!-- CARD 1 -->
                        <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="text-purple-600 text-3xl">⏳</div>
                            <div>
                                <p class="text-gray-800 text-lg">73% Of customers leave if waiting more than 5 minutes.</p>
                            </div>
                        </div>

                        <!-- CARD 2 -->
                        <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="text-blue-600 text-3xl">💸</div>
                            <div>
                                <p class="text-gray-800 text-lg">$3.8 trillion is lost globally every year to poor customer experiences.</p>
                            </div>
                        </div>

                        <!-- CARD 3 -->
                        <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="text-green-600 text-3xl">⭐</div>
                            <div>
                                <p class="text-gray-800 text-lg">86% willing to pay more for a better experience</p>
                            </div>
                        </div>

                        <!-- CARD 4 -->
                        <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="text-red-600 text-3xl">🕒</div>
                            <div>
                                <p class="text-gray-800 text-lg">39% of staff time is wasted managing queues manually.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- RIGHT SIDE -->
                <div class="relative">

                    <!-- MAIN IMAGE -->
                    <div class="rounded-2xl overflow-hidden border border-blue-200 shadow-md h-100">
                        <img src="{{asset('website/asset/images/why-roi.jpg')}}"
                            alt="Queue Management Image"
                            class="w-full object-cover">
                    </div>

                </div>

            </div>
        </section>


    <!-- Turn Chaos into Growth -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Turn Queue Chaos into
                        </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Measurable Business Growth</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                        <div class="flex items-center justify-center bg-blue-400 w-16 h-16 p-4 rounded-xl mb-3">
                            <img src="https://qwaiting.com/frontimg/time-saved.svg" alt="" class="w-12 h-12">
                        </div>
                        <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">01</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Time Saved</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Reduce average wait times by up to 60%</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                        <div class="flex items-center justify-center bg-purple-400 w-16 h-16 p-4 rounded-xl mb-3">
                            <img src="https://qwaiting.com/frontimg/staff-efficiency.svg" alt="" class="w-12 h-12">
                        </div>
                        <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">02</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Staff Efficiency</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Serve 40% more customers with the same team</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                        <div class="flex items-center justify-center bg-green-700 w-16 h-16 p-4 rounded-xl mb-3">
                            <img src="https://qwaiting.com/frontimg/revenue-growth.svg" alt="" class="w-12 h-12">
                        </div>
                        <div class="absolute top-6 right-6 text-6xl font-bold text-green-100">03</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Revenue Growth</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Increase service capacity & sales opportunities by 25%</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100">
                        <div class="flex items-center justify-center bg-orange-400 w-16 h-16 p-4 rounded-xl mb-3">
                            <img src="https://qwaiting.com/frontimg/customer-happiness.svg" alt="" class="w-12 h-12">
                        </div>
                        <div class="absolute top-6 right-6 text-6xl font-bold text-orange-100">04</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Customer Happiness</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Boost satisfaction scores by minimizing wait times.</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- How does it work -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-text-dark mb-4">How does it work?</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-12 text-center relative">
                <!-- Line connector (desktop only) -->
                <div class="hidden md:block absolute top-12 left-[20%] right-[20%] h-0.5 bg-gray-200 -z-10"></div>

                <div class="relative bg-white p-4">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-4 border-gray-100 rounded-full flex items-center justify-center mb-6 shadow-sm">
                        <img src="https://qwaiting.com/frontimg/filter.png" alt="">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-3">Step 1</h3>
                    <p class="text-text-medium">Adjust the sliders according to your business's daily footfall, average
                        customer service time, or number of active counters.</p>
                </div>

                <div class="relative bg-white p-4">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-4 border-gray-100 rounded-full flex items-center justify-center mb-6 shadow-sm">
                        <img src="https://qwaiting.com/frontimg/saved-time.png" alt="">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-3">Step 2</h3>
                    <p class="text-text-medium">On the right side, you will see your customer's average saved time, staff
                        member's saved time, and the estimated time a day you saved.</p>
                </div>

                <div class="relative bg-white p-4">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-4 border-gray-100 rounded-full flex items-center justify-center mb-6 shadow-sm">
                        <img src="https://qwaiting.com/frontimg/figures.png" alt="">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-3">Step 3</h3>
                    <p class="text-text-medium">To gain deeper insights and figures, compare your per customer servings
                        currently and after using the Qwaiting ROI calculator.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Who's It For -->
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Who’s <span class="text-primary">It For? </span>
                    </h2>
                    <p class="text-lg max-w-7xl">Our Queue Management ROI Calculator is designed for businesses and organizations across industries that deal with customer flow and waiting times and helps them measure efficiency, reduce wait times, and maximize returns.</p>
                </div>

                <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-6 mb-12">
                    <a href="/industries/retail-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Retail</h3>
                        </div>
                    </a>

                    <a href="/industries/healthcare"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/healthcare.jpg') }}" alt="Healthcare"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Healthcare</h3>
                        </div>
                    </a>

                    <a href="/industries/banking-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/banking.jpg') }}" alt="Banking"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Banking</h3>
                        </div>
                    </a>

                    <a href="/industries/public-sector-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/public.jpg') }}" alt="Public"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Public</h3>
                            {{-- Specific text retention --}}
                        </div>
                    </a>

                    <a href="/industries/airport-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="https://qwaiting.com/frontimg/airport_queue_management_system.png" alt="Public"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Airport</h3>
                            {{-- Specific text retention --}}
                        </div>
                    </a>
                </div>

                <div class="text-center max-w-3xl mx-auto">
                    <a href="/industries"
                        class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all mb-8">
                        See All Industries <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">

                <div class="grid md:grid-cols-2 gap-10">

                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-10 shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-1 transition duration-300 relative">

                    <!-- Accent Bar -->
                    <div class="absolute top-0 left-0 h-1 w-full bg-indigo-600 rounded-t-2xl"></div>

                    <!-- Quote Icon -->
                    <div class="text-indigo-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.17 6A5.17 5.17 0 0 0 2 11.17V20h8v-8H6.74A3.17 3.17 0 0 1 9.91 9h.09V6zm10 0A5.17 5.17 0 0 0 12 11.17V20h8v-8h-3.26A3.17 3.17 0 0 1 21.91 9h.09V6z"/>
                    </svg>
                    </div>

                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                    The ROI was clear in weeks. Patient wait times dropped by 30 minutes and staff workload fell by 40%.
                    </p>

                    <div class="flex items-center gap-4">
                    <!-- Avatar -->
                    <div class="w-12 h-12 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-700 font-bold">
                        OH
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Operations Head</h3>
                        <p class="text-sm text-gray-500">Apollo Hospitals</p>
                    </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-10 shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-1 transition duration-300 relative">

                    <!-- Accent Bar -->
                    <div class="absolute top-0 left-0 h-1 w-full bg-indigo-600 rounded-t-2xl"></div>

                    <!-- Quote Icon -->
                    <div class="text-indigo-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.17 6A5.17 5.17 0 0 0 2 11.17V20h8v-8H6.74A3.17 3.17 0 0 1 9.91 9h.09V6zm10 0A5.17 5.17 0 0 0 12 11.17V20h8v-8h-3.26A3.17 3.17 0 0 1 21.91 9h.09V6z"/>
                    </svg>
                    </div>

                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                    The system paid for itself in 6 months. We're processing 30% more customers with the same staff — and everyone’s happier.
                    </p>

                    <div class="flex items-center gap-4">
                    <!-- Avatar -->
                    <div class="w-12 h-12 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-700 font-bold">
                        RD
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Robert Davis</h3>
                        <p class="text-sm text-gray-500">Bank Branch Manager</p>
                    </div>
                    </div>
                </div>

                </div>

            </div>
        </section>

        <section class="py-24 bg-gradient-to-br from-white to-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
                
                <!-- TEXT -->
                <div class="space-y-6">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-gray-900">
                    The Industry’s First ROI Calculator
                    <span class="text-indigo-600">for Queue Management</span>
                </h1>

                <p class="text-lg text-gray-600 leading-relaxed">
                    Qwaiting introduces the first ROI calculator in 
                    <a href="#" class="text-indigo-600 font-medium hover:underline">queue management</a>,
                    setting a new benchmark for the industry. We set the standard by proving measurable 
                    business value while others only make claims.
                </p>

                <p class="text-lg text-gray-600 leading-relaxed">
                    With Qwaiting, ROI isn’t a guess; you see the real impact in numbers.
                </p>

                <div class="pt-4">
                    <a href="#calculator"
                    class="inline-flex items-center px-7 py-4 bg-indigo-600 text-white font-semibold rounded-xl shadow-md hover:bg-indigo-700 transition">
                    Explore ROI Calculator
                    </a>
                </div>
                </div>

                <!-- IMAGE -->
                <div class="relative">
                <div class="absolute inset-0 bg-indigo-200/20 blur-3xl rounded-3xl"></div>

                <img src="https://qwaiting.com/frontimg/roi-managemet.png"
                    alt="ROI calculator team discussion"
                    class="relative rounded-3xl shadow-2xl w-full object-cover">
                </div>
            </div>
        </section>

    <section class="py-10 bg-primary">
        <div class="max-w-4xl mx-auto p-10 text-center text-white">
            <h2 class="text-2xl font-semibold mb-4">Ready to Optimize Your Queue Management?</h2>
            <p class="pb-6 text-lg">Take the next step towards eliminating wait times and boosting your ROI</p>
            <div class="pt-4 flex gap-8 justify-center">
                    <a href="/contact"
                    class="inline-flex items-center px-7 py-4 bg-white text-primary font-semibold rounded-xl shadow-md hover:bg-primary/90 hover:border hover:border-white hover:text-white transition">
                    Get Free Consultation
                    </a>
                    <a href="/sign-up"
                    class="inline-flex items-center px-7 py-4 bg-white text-primary font-semibold rounded-xl shadow-md hover:bg-primary/90 hover:border hover:border-white hover:text-white transition">
                    Start Free Trial Today
                    </a>
                </div>
        </div>
    </section>


    <!-- FAQ -->
    <section class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-text-dark mb-4">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4" x-data="{selected:null}">
                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 0 ? selected = 0 : selected = null">
                        <span class="font-bold text-text-dark">What is the Qwaiting ROI Calculator?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 0}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 0" x-transition>
                        The Qwaiting ROI Calculator is a smart online tool that helps businesses measure how much time, cost, and staff effort can be saved. It turns operational inefficiencies into clear, real numbers to support smarter decisions.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 1 ? selected = 1 : selected = null">
                        <span class="font-bold text-text-dark">How accurate are the results?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 1}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 1" x-transition>
                        The results are based on real business inputs like customer footfall, wait times, and staff data. While exact outcomes may vary, the calculator provides highly reliable, data-driven estimates that reflect your business’s unique conditions.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 2 ? selected = 2 : selected = null">
                        <span class="font-bold text-text-dark">What information do I need to use the calculator?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 2}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 2" x-transition>
                        <p class="mb-2">To get accurate insights, you’ll need basic details such as:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Average daily customer footfall</li>
                            <li>Current average service/handling times</li>
                            <li>Number of active counters/staff</li>
                            <li>Estimated employee costs (optional for financial ROI)</li>
                        </ul>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 3 ? selected = 3 : selected = null">
                        <span class="font-bold text-text-dark">Can I use the calculator for different industries?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 3}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 3" x-transition>
                        Yes. The Qwaiting ROI Calculator is adaptable across industries, including healthcare, retail, banking, government, airports, and more. The tool adjusts its estimates to fit industry-specific customer flow and service models.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 4 ? selected = 4 : selected = null">
                        <span class="font-bold text-text-dark">Is the tool free to use?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 4}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 4" x-transition>
                        Yes. The ROI Calculator is completely free, fast, and easy to use. There are no hidden charges or commitments; simply enter your data and see your results instantly.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 4 ? selected = 4 : selected = null">
                        <span class="font-bold text-text-dark">How does the ROI Calculator help my business?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 4}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 4" x-transition>
                        It helps you understand the hidden costs of long queues, inefficient staff usage, and lost customers. By showing measurable improvements like reduced wait times, higher staff productivity, and increased revenue potential, the calculator makes the value of Qwaiting crystal clear.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 4 ? selected = 4 : selected = null">
                        <span class="font-bold text-text-dark">Do I need to sign up or share personal data to use it?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 4}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 4" x-transition>
                        No. The tool works instantly without requiring sign-ups or personal information. You only provide general business data to generate the results.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl bg-white overflow-hidden">
                    <button class="flex items-center justify-between w-full p-6 text-left"
                        @click="selected !== 4 ? selected = 4 : selected = null">
                        <span class="font-bold text-text-dark">Can I download or share my ROI results?</span>
                        <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': selected === 4}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-text-medium" x-show="selected === 4" x-transition>
                        Yes. After running your calculations, you can export your ROI summary as a report. This is easily downloadable and shareable with your team for quick decision-making.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Container (Hidden/Modal or separate section usually, but per "Get Your ROI Report" styling) -->
    <section class="py-20 bg-primary">
        <div class="max-w-4xl mx-auto p-10 text-center bg-white rounded-xl">
            <h2 class="text-lg font-semibold mb-4">Get Your ROI Report & Expert Consultation</h2>
            <p class="text-slate-600 pb-6">Fill in your details to receive a customized ROI report and see how Qwaiting can
                transform your operations.</p>
            <!-- Form -->
            <form id="roiForm" class="space-y-6">
                <!-- Row 1 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" id="fullName" name="fullName" placeholder="Full Name *" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="email" id="businessEmail" name="businessEmail" placeholder="Business Email *" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Row 2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" id="companyName" name="companyName" placeholder="Company Name *" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <select id="industry" name="industry" required
                        class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" selected disabled>Industry *</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Retail">Retail</option>
                        <option value="Technology">Technology</option>
                        <option value="Banking">Banking</option>
                        <option value="Airport">Airport</option>
                        <option value="Public Sector">Public Sector</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Row 3 -->
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone Number (Optional)"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- Hidden fields for ROI data -->
                <input type="hidden" id="roiData" name="roiData">

                <!-- Success/Error Messages -->
                <div id="formMessage" class="hidden p-3 rounded-lg"></div>

                <!-- Button -->
                <button type="submit" id="submitBtn" class="btn btn-lg bg-primary p-3 text-white w-full rounded-xl">
                    <span id="submitBtnText">Send Me My ROI Report</span>
                </button>
            </form>
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

    <script>
        // -----------------------------
        // Helpers (ported from React version)
        // -----------------------------
        function erlangC(lambda, mu, c) {
            // lambda: arrivals per minute
            // mu: service rate per server per minute
            // c: number of servers
            if (lambda <= 0 || mu <= 0 || c <= 0)
                return { Pw: 0, Wq: 0, Lq: 0, rho: 0, stable: true };

            const rho = lambda / (c * mu);
            if (rho >= 1) {
                return { Pw: 1, Wq: Infinity, Lq: Infinity, rho, stable: false };
            }

            const a = lambda / mu; // traffic intensity in erlangs
            let term = 1;
            let sum = term;
            for (let n = 1; n <= c - 1; n++) {
                term *= a / n;
                sum += term;
            }
            term *= a / c;
            const last = term * (1 / (1 - rho));
            const P0 = 1 / (sum + last);
            const Pw = last * P0;
            const Wq = Pw * (1 / (c * mu - lambda));
            const Lq = lambda * Wq;

            return { Pw, Wq, Lq, rho, stable: true };
        }

        function formatMinutes(mins) {
            if (!isFinite(mins) || mins < 0) return '—';
            if (mins < 1) return `${(mins * 60).toFixed(0)} sec`;
            if (mins < 60) return `${mins.toFixed(1)} min`;
            const h = Math.floor(mins / 60);
            const m = Math.round(mins % 60);
            return `${h}h ${m}m`;
        }

        function clamp(v, min, max) { return Math.max(min, Math.min(max, v)); }

        // -----------------------------
        // UI builders
        // -----------------------------
        function inputBlock({ id, label, value, min, max, step = 1, prefix = '', suffix = '', onChange }) {
            const wrapper = document.createElement('div');
            wrapper.className = 'group mb-4';
            wrapper.innerHTML = `
                  <label class="block text-xs font-bold uppercase tracking-wider text-black mb-1.5 ml-1">${label}</label>
                  <div class="flex items-center gap-3 bg-white rounded-xl border border-gray-300 p-2 focus-within:ring-2 focus-within:ring-indigo-500/50 focus-within:border-indigo-500 transition-all shadow-2xl">
                    ${prefix ? `<span class='text-slate-500 text-sm font-medium pl-2 select-none'>${prefix}</span>` : ''}
                    <input id="${id}" type="number" 
                      class="w-full bg-transparent border-none text-black font-mono font-bold font-semibold focus:ring-0 p-1 text-base placeholder-slate-600" 
                      step="${step}" min="${min}" max="${max}" value="${value}">
                    ${suffix ? `<span class='text-slate-500 text-sm font-medium pr-2 whitespace-nowrap select-none'>${suffix}</span>` : ''}
                  </div>
                  ${(typeof min === 'number' && typeof max === 'number') ? `
                  <div class="mt-2 px-1">
                    <input id="${id}-range" type="range" min="${min}" max="${max}" step="${step}" value="${value}" 
                      class="w-full h-1 bg-gray-400 rounded-lg appearance-none cursor-pointer accent-indigo-500 hover:accent-indigo-400 transition-colors">
                  </div>` : ''}
                `;
            const num = wrapper.querySelector(`#${id}`);
            const rng = wrapper.querySelector(`#${id}-range`);
            function sync(val) {
                if (num) num.value = val;
                if (rng) rng.value = val;
                onChange(Number(val));
            }
            if (num) num.addEventListener('input', e => sync(e.target.value));
            if (rng) rng.addEventListener('input', e => sync(e.target.value));
            return wrapper;
        }

        function sliderBlock({ id, label, help, value, min, max, step = 1, suffix = '', onChange }) {
            const wrap = document.createElement('div');
            wrap.className = 'mb-6';
            wrap.innerHTML = `
                  <div class="flex items-end justify-between mb-2">
                    <div>
                      <label class="block text-sm font-bold text-black">${label}</label>
                      ${help ? `<p class="text-xs text-slate-500 mt-0.5">${help}</p>` : ''}
                    </div>
                    <div class="px-2 py-1 bg-white border border-white/5 text-indigo-700 rounded-md text-xs font-bold font-mono">
                        <span id="${id}-val">${Number(value).toFixed(2)}${suffix}</span>
                    </div>
                  </div>
                  <input id="${id}" type="range" min="${min}" max="${max}" step="${step}" value="${value}" 
                    class="w-full h-1 bg-gray-400 rounded-lg appearance-none cursor-pointer accent-purple-500">
                `;
            const rng = wrap.querySelector(`#${id}`);
            const lbl = wrap.querySelector(`#${id}-val`);
            rng.addEventListener('input', (e) => {
                lbl.textContent = Number(e.target.value).toFixed(2) + suffix;
                onChange(Number(e.target.value));
            });
            return wrap;
        }

        function statCard({title, sub, value, highlight=false}) {
            const div = document.createElement('div');
            // Dark Mode Styles
            const baseClass = "rounded-2xl p-5 border transition-all duration-300 hover:shadow-lg hover:border-white/10";
            const colorClass = highlight 
                ? "bg-white" 
                : "bg-white border-white/5";
            
            div.className = `${baseClass} ${colorClass}`;
            div.innerHTML = `
            <div class="flex flex-col h-full justify-between gap-2">
                <div class="text-[10px] font-bold uppercase tracking-widest ${highlight ? 'text-indigo-700' : 'text-slate-500'}">${sub}</div>
                <div>
                    <div class="text-xs font-medium text-black">${title}</div>
                    <div class="text-2xl md:text-3xl font-bold mt-1 tracking-tight ${highlight ? 'text-black' : 'text-black'}">${value}</div>
                </div>
            </div>
            `;
            return div;
        }

        function capacityCard({ label, value, highlight = false }) {
            const div = document.createElement('div');
            div.className = `rounded-xl p-4 text-center border ${highlight ? 'bg-indigo-500/20 border-indigo-500/30 text-black shadow-lg shadow-indigo-500/10' : 'bg-white border-gray-300 text-black shadow-2xl'}`;
            div.innerHTML = `
                  <div class="text-[10px] uppercase tracking-wider opacity-70 mb-1 font-semibold">${label}</div>
                  <div class="text-2xl font-bold font-mono tracking-tight">${Number(value).toLocaleString()}</div>
                `;
            return div;
        }

        // -----------------------------
        // State
        // -----------------------------
        const state = {
            footfall: 600,
            hoursOpen: 8,
            serviceTime: 6,
            counters: 4,
            peakiness: 1.3,
            serviceReductionPct: 20,
            smoothingPct: 20,
            staffCostPerHour: 12,
            customerValuePerHour: 5,
        };

        // -----------------------------
        // Compute and render
        // -----------------------------
        let chart;
        function computeAndRender() {
            const minutesOpen = state.hoursOpen * 60;
            const effectivePeak = clamp(state.peakiness, 1, 2.5);
            const arrivalsPerMinute = (state.footfall / minutesOpen) * effectivePeak;
            const mu = state.serviceTime > 0 ? (1 / state.serviceTime) : 0;

            const base = erlangC(arrivalsPerMinute, mu, state.counters);

            const newServiceTime = Math.max(0.1, state.serviceTime * (1 - state.serviceReductionPct / 100));
            const newPeak = Math.max(1, effectivePeak * (1 - state.smoothingPct / 100));
            const newArrivalsPerMinute = (state.footfall / minutesOpen) * newPeak;
            const newMu = 1 / newServiceTime;

            const withQ = erlangC(newArrivalsPerMinute, newMu, state.counters);

            // --- Safe waits ---
            const baseWait = (isFinite(base.Wq) && mu > 0) ? base.Wq + (1 / mu) : 0;
            const newWait = (isFinite(withQ.Wq) && newMu > 0) ? withQ.Wq + (1 / newMu) : 0;

            const waitSavedPerCustomer = Math.max(0, baseWait - newWait);

            // --- Saved minutes ---
            const dailyCustomerMinutesSaved = waitSavedPerCustomer * state.footfall;
            const staffMinutesSaved = state.footfall * Math.max(0, state.serviceTime - newServiceTime);
            const totalMinutesSaved = dailyCustomerMinutesSaved + staffMinutesSaved;

            // --- Economics ---
            const customerValuePerMinute = state.customerValuePerHour / 60;
            const staffCostPerMinute = state.staffCostPerHour / 60;
            const dailyValue = (isFinite(dailyCustomerMinutesSaved) ? dailyCustomerMinutesSaved : 0) * customerValuePerMinute
                + (isFinite(staffMinutesSaved) ? staffMinutesSaved : 0) * staffCostPerMinute;

            // --- Capacity ---
            const theoreticalCapacityPerDayBase = state.counters * (minutesOpen / state.serviceTime);
            const theoreticalCapacityPerDayNew = state.counters * (minutesOpen / newServiceTime);

            const improvementPct = (baseWait > 0 && isFinite(baseWait) && isFinite(newWait))
                ? ((baseWait - newWait) / baseWait) * 100
                : 0;

            // Warning
            const warn = document.getElementById('warning');
            const warnText = document.getElementById('warning-text');
            if (!base.stable) {
                warnText.textContent = 'Warning: Current setup is unstable (utilization ≥ 100%). Increase counters, reduce handling time, or lower peakiness.';
                warn.classList.remove('hidden');
            } else {
                warn.classList.add('hidden');
            }

            // Infobox
            const infobox = document.getElementById('infobox');
            infobox.innerHTML = '';
            infobox.appendChild(statCard({ title: 'Avg time per customer', sub: 'Current', value: formatMinutes(baseWait) }));
            infobox.appendChild(statCard({ title: 'Avg time per customer', sub: 'With Qwaiting', value: formatMinutes(newWait), highlight: true }));
            infobox.appendChild(statCard({ title: 'Improvement', sub: 'Time per customer', value: `${improvementPct.toFixed(0)}%`, highlight: true }));
            infobox.appendChild(statCard({ title: 'Daily customer minutes saved', sub: 'Per day', value: Math.round(dailyCustomerMinutesSaved).toLocaleString() }));
            infobox.appendChild(statCard({ title: 'Staff minutes saved', sub: 'Per day', value: Math.round(staffMinutesSaved).toLocaleString() }));
            infobox.appendChild(statCard({ title: 'Estimated daily value', sub: 'Currency units/day', value: dailyValue.toLocaleString(undefined, { maximumFractionDigits: 0 }), highlight: true }));

            // Glance - Dark Mode
            const glance = document.getElementById('glance');
            glance.innerHTML = '';
            const glItems = [
                `<div class="flex justify-between items-center py-2 border-b border-white/5 last:border-0"><span class="text-slate-500 text-xs font-bold uppercase">Utilization (current)</span> <span class="font-bold text-black font-mono">${(base.rho * 100).toFixed(1)}%</span></div>`,
                `<div class="flex justify-between items-center py-2 border-b border-white/5 last:border-0"><span class="text-slate-500 text-xs font-bold uppercase">Utilization (Pro)</span> <span class="font-bold text-indigo-400 font-mono">${(withQ.rho * 100).toFixed(1)}%</span></div>`,
                `<div class="flex justify-between items-center py-2 border-b border-white/5 last:border-0"><span class="text-slate-500 text-xs font-bold uppercase">Avg wait (current)</span> <span class="font-bold text-black font-mono">${formatMinutes(base.Wq)}</span></div>`,
                `<div class="flex justify-between items-center py-2 border-b border-white/5 last:border-0"><span class="text-slate-500 text-xs font-bold uppercase">Avg wait (Pro)</span> <span class="font-bold text-emerald-400 font-mono">${formatMinutes(withQ.Wq)}</span></div>`,
                `<div class="flex justify-between items-center py-2 border-b border-white/5 last:border-0"><span class="text-slate-500 text-xs font-bold uppercase">Peakiness new</span> <span class="font-bold text-black font-mono">${newPeak.toFixed(2)} <span class="text-xs font-normal text-slate-500">(was ${state.peakiness.toFixed(2)})</span></span></div>`,
                `<div class="flex justify-between items-center py-2 border-b border-white/5 last:border-0"><span class="text-slate-500 text-xs font-bold uppercase">Handling time new</span> <span class="font-bold text-black font-mono">${newServiceTime.toFixed(2)}m <span class="text-xs font-normal text-slate-500">(was ${state.serviceTime.toFixed(2)}m)</span></span></div>`
            ];
            glItems.forEach(html => { const li = document.createElement('li'); li.innerHTML = html; glance.appendChild(li); });

            // Capacity
            const caps = document.getElementById('capacityCards');
            caps.innerHTML = '';
            caps.appendChild(capacityCard({ label: 'Current capacity', value: Math.round(theoreticalCapacityPerDayBase) }));
            caps.appendChild(capacityCard({ label: 'With Qwaiting', value: Math.round(theoreticalCapacityPerDayNew), highlight: true }));

            // Chart
            const ctx = document.getElementById('barChart').getContext('2d');
            const chartData = [
                { metric: 'Avg Wait (min)', Current: baseWait, WithQ: newWait },
                { metric: 'Queue Length', Current: isFinite(base.Lq) ? base.Lq : 0, WithQ: isFinite(withQ.Lq) ? withQ.Lq : 0 },
                { metric: 'Capacity (cust/day)', Current: theoreticalCapacityPerDayBase, WithQ: theoreticalCapacityPerDayNew },
            ];
            const labels = chartData.map(d => d.metric);
            const currentData = chartData.map(d => d.Current);
            const withQData = chartData.map(d => d.WithQ);

            if (chart) chart.destroy();
            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [
                        { label: 'Current', data: currentData },
                        { label: 'With Qwaiting', data: withQData }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'top' }, tooltip: { enabled: true } },
                    scales: { x: { grid: { display: true } }, y: { beginAtZero: true, grid: { display: true } } }
                }
            });
        }

        // -----------------------------
        // Initialize Inputs
        // -----------------------------
        function init() {
            const inputsRoot = document.getElementById('inputs');
            const impactRoot = document.getElementById('impact');
            const econRoot = document.getElementById('economics');

            inputsRoot.appendChild(inputBlock({ id: 'footfall', label: 'Average daily footfall', value: state.footfall, min: 50, max: 10000, step: 10, suffix: 'customers', onChange: v => { state.footfall = v; computeAndRender(); } }));
            inputsRoot.appendChild(inputBlock({ id: 'hours', label: 'Hours open per day', value: state.hoursOpen, min: 4, max: 24, step: 1, suffix: 'hours', onChange: v => { state.hoursOpen = v; computeAndRender(); } }));
            inputsRoot.appendChild(inputBlock({ id: 'serviceTime', label: 'Avg handling time per customer (per staff)', value: state.serviceTime, min: 1, max: 30, step: 0.5, suffix: 'min', onChange: v => { state.serviceTime = v; computeAndRender(); } }));
            inputsRoot.appendChild(inputBlock({ id: 'counters', label: 'Number of active counters/staff', value: state.counters, min: 1, max: 30, step: 1, onChange: v => { state.counters = v; computeAndRender(); } }));

            impactRoot.appendChild(sliderBlock({ id: 'peakiness', label: 'Peakiness of arrivals', help: '1.0 = even flow, higher = spiky peaks', value: state.peakiness, min: 1, max: 2.5, step: 0.01, onChange: v => { state.peakiness = v; computeAndRender(); } }));
            impactRoot.appendChild(sliderBlock({ id: 'serviceReductionPct', label: 'Handling time reduction', help: 'Automation, smart routing, pre-fill forms', value: state.serviceReductionPct, min: 0, max: 50, step: 1, suffix: '%', onChange: v => { state.serviceReductionPct = v; computeAndRender(); } }));
            impactRoot.appendChild(sliderBlock({ id: 'smoothingPct', label: 'Arrival smoothing', help: 'Appointments, ticket scheduling reduce peaks', value: state.smoothingPct, min: 0, max: 50, step: 1, suffix: '%', onChange: v => { state.smoothingPct = v; computeAndRender(); } }));

            econRoot.appendChild(inputBlock({ id: 'staffCost', label: 'Staff cost per hour', value: state.staffCostPerHour, min: 0, max: 200, step: 1, prefix: '≈', suffix: '/hr', onChange: v => { state.staffCostPerHour = v; computeAndRender(); } }));
            econRoot.appendChild(inputBlock({ id: 'custValue', label: 'Customer time value per hour', value: state.customerValuePerHour, min: 0, max: 200, step: 1, prefix: '≈', suffix: '/hr', onChange: v => { state.customerValuePerHour = v; computeAndRender(); } }));

            computeAndRender();
        }

        document.addEventListener('DOMContentLoaded', init);

        // Form submission handler
        document.getElementById('roiForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Collect ROI data from the calculator
            const roiData = {
                footfall: state.footfall,
                hoursOpen: state.hoursOpen,
                serviceTime: state.serviceTime,
                counters: state.counters,
                peakiness: state.peakiness,
                serviceReductionPct: state.serviceReductionPct,
                smoothingPct: state.smoothingPct,
                staffCostPerHour: state.staffCostPerHour,
                customerValuePerHour: state.customerValuePerHour
            };

            // Set hidden field with ROI data
            document.getElementById('roiData').value = JSON.stringify(roiData);

            // Get form data
            const formData = new FormData(this);

            // Disable submit button
            const submitBtn = document.getElementById('submitBtn');
            const submitBtnText = document.getElementById('submitBtnText');
            submitBtn.disabled = true;
            submitBtnText.textContent = 'Sending...';

            // Show loading message
            const formMessage = document.getElementById('formMessage');
            formMessage.className = 'p-3 rounded-lg bg-blue-50 border border-blue-200 text-blue-700';
            formMessage.textContent = 'Sending your ROI report...';
            formMessage.classList.remove('hidden');

            // Send AJAX request
            fetch('/front/submit_roi_form', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        formMessage.className = 'p-3 rounded-lg bg-green-50 border border-green-200 text-green-700';
                        formMessage.textContent = data.message || 'Thank you! Your ROI report has been sent to your email.';
                        this.reset();
                    } else {
                        formMessage.className = 'p-3 rounded-lg bg-red-50 border border-red-200 text-red-700';
                        formMessage.textContent = data.message || 'An error occurred. Please try again.';
                    }
                })
                .catch(error => {
                    formMessage.className = 'p-3 rounded-lg bg-red-50 border border-red-200 text-red-700';
                    formMessage.textContent = 'An error occurred. Please try again.';
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtnText.textContent = 'Send Me My ROI Report';
                });
        });
    </script>


    <script>
        document.querySelectorAll('a.scroll-link').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection