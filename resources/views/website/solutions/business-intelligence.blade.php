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
                    Data Analytics To Empower Your <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Business</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto mb-10">
                    Easily improve your business operations by gaining insight into the root causes of problems and delays
                    with our easy-to-use analytics platform. You will get visibility into busy business hours, and the
                    performance of each employee, identify the best service, and uncover valuable information to increase
                    efficiency
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
                        Contact Us
                    </a>
                </div>

                {{-- Hero Image --}}
                <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/data-analytics-to-empower-your-business.png"
                            alt="Business Intelligence Dashboard"
                            class="w-3/4 h-auto transform transition-transform hover:scale-105 duration-700 mx-auto">
                    </div>
                </div>
            </div>
        </section>

        {{-- Real-time Visualization Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Real-time <span class="text-primary">Visualization</span>
                        </h2>

                        <div class="space-y-6">
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <div>
                                        <span class="text-gray-700">Gain a detailed summary overview of business insights
                                            from all angles - including current wait times, number of customers being
                                            served, and total served.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <div>
                                        <span class="text-gray-700">Provide an easy and quick understanding of key business
                                            metrics in real-time through a single dashboard.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <div>
                                        <span class="text-gray-700">Helpful for better decision-making and creating a
                                            positive customer experience.</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

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
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/real-time-visualization.png" alt="Real-time Visualization"
                            class="relative rounded-3xl shadow-2xl w-full transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Informed Decisions Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Informed Decisions with <span class="text-primary">Comprehensive Reports</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Analyzing the customer journey data that is most important to your business through a different set
                        of reports, helps in decision-making.
                    </p>
                </div>

                <div class="space-y-24">
                    {{-- Monthly Report - Image Left --}}
                    <div class="flex flex-col lg:flex-row items-center gap-16 mb-40">
                        <div class="lg:w-1/2 relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/monthly-report.png" alt="Monthly Report"
                                class="relative rounded-3xl shadow-2xl w-full transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-6">
                            <h3 class="text-3xl font-bold text-gray-900">Monthly Report</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Summary of visitor details for the month, year, or specific
                                        dates.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Data on each visitor's response time (in minutes) and
                                        serving time (in minutes).</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Identification of the staff member who closed the visitor's
                                        inquiry and at which counter.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Indication of visitors who were missed, served, pending, and
                                        whose appointments were canceled.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Inclusion of visitors' contact email addresses and
                                        ratings.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Segmentation of visitor data based on filters like staff,
                                        counter, and whether they were walk-ins or had appointments.</span>
                                </li>
                            </ul>
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

                    {{-- Categories Report - Image Right --}}
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-16 mb-40">
                        <div class="lg:w-1/2 relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-purple-100 to-pink-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/categories-report.png" alt="Categories Report"
                                class="relative rounded-3xl shadow-2xl w-full transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-6">
                            <h3 class="text-3xl font-bold text-gray-900">Categories Report</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Provides data on service levels and wait time for each
                                        category type.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Presents all category-level data on a single
                                        dashboard.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Understand visitors' reasons for their visits.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Helpful for predicting volume and revenue per
                                        category.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Shows the total number of generated tickets.</span>
                                </li>
                            </ul>
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

                    {{-- Staff Performance Report - Image Left --}}
                    <div class="flex flex-col lg:flex-row items-center gap-16 mb-40">
                        <div class="lg:w-1/2 relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-green-100 to-teal-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/staff-performance-report.png"
                                alt="Staff Performance Report"
                                class="relative rounded-3xl shadow-2xl w-full transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-6">
                            <h3 class="text-3xl font-bold text-gray-900">Staff Performance Report</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Obtain data on the number of visitors served by each
                                        employee.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Assess individual performance based on visitor
                                        service.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Analyze which employees served which categories.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Get data on total and average service time for each
                                        employee.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Identify top performers and areas for training and
                                        development.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Also, able to see the total break time and the number of
                                        breaks taken by each employee.</span>
                                </li>
                            </ul>
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

                    {{-- Feedback Report - Image Right --}}
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-16 mb-40">
                        <div class="lg:w-1/2 relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-orange-100 to-yellow-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/feedback-report.png" alt="Feedback Report"
                                class="relative rounded-3xl shadow-2xl w-full transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-6">
                            <h3 class="text-3xl font-bold text-gray-900">Feedback Report</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">View specific location-wise feedback for each employee,
                                        including their total calls, closed calls, and average rating.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Compare trends and changes in visitor sentiment over
                                        time.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Identify recurring issues.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Represent real experiences.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Able to see visitors' comments for particular staff if they
                                        are posted in the 'view' section of the report.</span>
                                </li>
                            </ul>
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

                    {{-- Branch Report - Image Left --}}
                    <div class="flex flex-col lg:flex-row items-center gap-16 mb-40">
                        <div class="lg:w-1/2 relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-indigo-100 to-purple-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/branch-report.png" alt="Branch Report"
                                class="relative rounded-3xl shadow-2xl w-full transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-6">
                            <h3 class="text-3xl font-bold text-gray-900">Branch Report</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Provides information on the number of visitors waiting in
                                        the queue, number of busy staff, and number of visitors served at specific
                                        locations.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Allows comparison of multi-branch performance.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Assists in making location-specific strategic
                                        decisions.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Enables proactive management of resources to minimize wait
                                        times and enhance visitor satisfaction.</span>
                                </li>
                            </ul>
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

                    {{-- Integration Capabilities - Image Right --}}
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                        <div class="lg:w-1/2 relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-teal-100 to-cyan-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                            </div>
                            <img src="https://qwaiting.com/frontimg/integration-capabilities-effortlessly-export-performance-reports.png"
                                alt="Integration Capabilities"
                                class="relative rounded-3xl shadow-2xl w-full transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-6">
                            <h3 class="text-3xl font-bold text-gray-900">Integration Capabilities- Effortlessly Export
                                Performance Reports</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Maximize Insights with the Data Connect API(Application
                                        Programming Interface)</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Export performance reports to PDF, Excel, HTML, and
                                        CSV.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Third-party integration to uncover hidden data.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Provide easy-to-read report templates such as charts and
                                        tables.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Seamless Integration with Preferred BI Tools.</span>
                                </li>
                            </ul>
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
                </div>
            </div>
        </section>

        {{-- Gradient CTA Section --}}
        <section
            class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-primary to-purple-800 relative overflow-hidden text-center">
            <div class="absolute inset-0 bg-[url('https://qwaiting.com/images/pattern.png')] opacity-10"></div>
            <div class="max-w-4xl mx-auto relative z-10">
                <h2 class="text-3xl lg:text-5xl font-bold text-white mb-8 leading-tight">
                    Transform Your Business with <span class="text-white/90">Data-Driven Insights</span>
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Make smarter decisions with real-time analytics and comprehensive reporting. Start your free trial today
                    and see the difference!
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://qwaiting.com/signup"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-full font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all w-full sm:w-auto justify-center">
                        <span>Get Free Trial</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
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
                    <p class="text-xl text-gray-600 leading-relaxed">
                        We provide the most suitable queuing solution that helps you manage your business operations
                        effectively in every aspect. Improve customer experience, get satisfying outcomes, and control
                        workflow efficiently. You can take your business to the peak with us.
                    </p>
                </div>
            </div>
        </section>
        
        {{-- Industries Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Simplify Queue Management for <span class="text-primary">Every Sector!</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    <a href="https://qwaiting.com/industries/retail-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Retail</h3>
                        </div>
                    </a>

                    <a href="https://qwaiting.com/industries/healthcare"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/healthcare.jpg') }}" alt="Healthcare"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Healthcare</h3>
                        </div>
                    </a>

                    <a href="https://qwaiting.com/industries/banking-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/banking.jpg') }}" alt="Banking"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Banking</h3>
                        </div>
                    </a>

                    <a href="https://qwaiting.com/industries/public-sector-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/public.jpg') }}" alt="Public"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Public</h3>
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


    </div>
@endsection