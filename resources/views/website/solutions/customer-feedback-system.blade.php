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
                    Customer Feedback <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Solutions</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto mb-10">
                    Ready to level up your customer service? Collect, manage, and respond to feedback across every digital
                    channel. Improve service levels and reduce escalation rates through real-time customer insights.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://qwaiting.com/signup"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Start Your Free Trial</span>
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
            </div>

            {{-- Hero Image with Floating Effect --}}
            <div class="relative mx-auto max-w-4xl mt-10">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                    <img src="https://qwaiting.com/frontimg/customer_feedback_system.png" alt="Customer Feedback Dashboard"
                        class="w-3/4 h-auto transform transition-transform hover:scale-105 duration-700 mx-auto">
                </div>
            </div>
        </section>

        {{-- Make Every Visit Better Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-10 text-center mb-16">
                Make every visit better than expected with <span class="text-primary">Qwaiting</span>
            </h2>
            <div class="grid lg:grid-cols-2 max-w-6xl mx-auto gap-10">
                <div class="max-w-5xl mx-auto">
                    <div class="mb-4">
                        <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                            From feedback to action, Qwaiting helps enterprises identify service gaps, optimize
                            operations, and make smarter decisions that directly impact performance. Capture real-time
                            sentiment across every customer touchpoint and turn it into actionable insights without
                            manual intervention.
                        </p>
                    </div>

                    <div class="max-w-3xl mx-auto">
                        <ul class="space-y-4 mb-10">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-700">Make Every Visit Better Than Expected</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-700">Qwaiting's customer feedback solutions help enterprises find
                                    service gaps, optimize operations, and make smarter decisions that improve customer
                                    satisfaction.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-700">Capture real-time sentiment at every touchpoint and turn it
                                    into actionable insights without manual work.</span>
                            </li>
                        </ul>

                        <a href="https://qwaiting.com/signup"
                            class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1">
                            <span class="relative z-10">Sign Up</span>
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
                    <img src="https://qwaiting.com/frontimg/the_better_way_to_listen_to_your_clients.png"
                        alt="Make Every Visit Better Than Expected"
                        class="relative rounded-3xl shadow-2xl mx-auto">
                    
                </div>
            </div>
        </section>

        {{-- How it Works Section - Vertical Timeline --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        How It <span class="text-primary">Works?</span>
                    </h2>
                    <p class="text-xl text-gray-600">Simple steps to transform your customer feedback collection</p>
                </div>

                {{-- Timeline Container --}}
                <div class="relative">
                    {{-- Vertical Line --}}
                    <div
                        class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-200 via-purple-200 to-teal-200 transform md:-translate-x-1/2">
                    </div>

                    {{-- Timeline Items --}}
                    <div class="space-y-12">
                        {{-- Step 1 --}}
                        <div class="relative flex items-center md:justify-start mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <div class="flex-1">
                                    <div
                                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-blue-500">
                                        <div class="flex items-center gap-3 mb-3 md:justify-end">
                                            <h3 class="text-xl font-bold text-gray-900">Send Survey Invitations</h3>
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold flex-shrink-0">
                                                1
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            Qwaiting sends real-time, personalized customer feedback survey invitations via
                                            SMS, email, or mobile ticket right after a visit. By prompting feedback at the
                                            right moment, you capture fresh, valuable insights while engagement is at its
                                            peak.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- Timeline Dot --}}
                            <div
                                class="absolute left-8 md:left-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10">
                            </div>

                            <div class="flex items-start w-full md:w-1/2 md:pl-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/survey_invitation.png" alt="">
                            </div>
                        </div>

                        {{-- Step 2 --}}
                        <div class="relative flex items-center md:justify-end mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/data_collection_and_storage.png" alt="">
                            </div>
                            <div class="flex items-start w-full md:w-1/2 md:pl-12 ml-16 md:ml-0">
                                <div class="flex-1">
                                    <div
                                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-purple-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div
                                                class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold flex-shrink-0">
                                                2
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900">Centralized Database</h3>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            All feedback is stored in a centralized database and linked to each visit. This
                                            data integrates seamlessly with reporting tools and analytics for real-time
                                            tracking and service optimization.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="absolute left-8 md:left-1/2 w-4 h-4 bg-purple-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10">
                            </div>
                        </div>

                        {{-- Step 3 --}}
                        <div class="relative flex items-center md:justify-start mb-32">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <div class="flex-1">
                                    <div
                                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-green-500">
                                        <div class="flex items-center gap-3 mb-3 md:justify-end">
                                            <h3 class="text-xl font-bold text-gray-900">Automated Thank You</h3>
                                            <div
                                                class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold flex-shrink-0">
                                                3
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            After feedback is received, customers get an automated, personalized thank-you
                                            message to show appreciation, reinforce positive experiences, and strengthen
                                            long-term trust.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="absolute left-8 md:left-1/2 w-4 h-4 bg-green-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10">
                            </div>

                            <div class="flex items-start w-full md:w-1/2 md:pl-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/send_thank_you_text.png" alt="">
                            </div>
                        </div>

                        {{-- Step 4 --}}
                        <div class="relative flex items-center md:justify-end">
                            <div class="flex items-start w-full md:w-1/2 md:pr-12 md:text-right">
                                <img src="https://qwaiting.com/frontimg/analysis_and_reporting.png" alt="">
                            </div>
                            <div class="flex items-start w-full md:w-1/2 md:pl-12 ml-16 md:ml-0">
                                <div class="flex-1">
                                    <div
                                        class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-orange-500">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div
                                                class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 font-bold flex-shrink-0">
                                                4
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900">Instant Analysis</h3>
                                        </div>
                                        <p class="text-gray-600 mb-4">
                                            Feedback is analyzed instantly to reveal trends, identify service gaps, and
                                            track satisfaction scores. These insights drive data-backed decisions, custom
                                            reports, and continuous improvements across all locations.
                                        </p>
                                        <a href="https://qwaiting.com/signup"
                                            class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all text-sm">
                                            Schedule A Demo
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="absolute left-8 md:left-1/2 w-4 h-4 bg-orange-500 rounded-full border-4 border-white shadow-lg transform md:-translate-x-1/2 z-10">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Cloud-Based Queue Management CTA --}}
        <section
            class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-primary to-purple-800 relative overflow-hidden text-center">
            <div class="absolute inset-0 bg-[url('https://qwaiting.com/images/pattern.png')] opacity-10"></div>
            <div class="max-w-4xl mx-auto relative z-10">
                <h2 class="text-3xl lg:text-5xl font-bold text-white mb-8 leading-tight">
                    #1 Cloud-Based Queue Management System
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our Queue
                    Management Software helps businesses enhance your productivity and reputation by satisfying your
                    customers.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://qwaiting.com/products/cloud-based-software"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-full font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all w-full sm:w-auto justify-center">
                        <span>Book a Free Demo</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Smart Features Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Smart Features That Keep <span class="text-primary">Feedback Flowing</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Smart Dashboards --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/multi_channel_integrations.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Smart Dashboards</h3>
                        <p class="text-gray-600">
                            Track real-time customer feedback, spot service gaps, and make informed decisions with
                            intuitive dashboards designed for performance-driven teams across departments and service
                            channels.
                        </p>
                    </div>

                    {{-- Improve Every Branch --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/customizable_surveys.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Improve Every Branch</h3>
                        <p class="text-gray-600">
                            Compare performance across locations, resolve bottlenecks, and replicate winning strategies to
                            ensure consistent, high-quality customer experiences at every branch.
                        </p>
                    </div>

                    {{-- Timely Feedback Matters --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/secure_data_storage.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Timely Feedback Matters</h3>
                        <p class="text-gray-600">
                            Collect feedback immediately after service interactions to identify issues early, address them
                            quickly, and enhance customer experience before it affects loyalty or reputation.
                        </p>
                    </div>

                    {{-- Insights That Drive Action --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/interactive_dashboards.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Insights That Drive Action</h3>
                        <p class="text-gray-600">
                            Turn feedback into actionable insights that guide decisions, close performance gaps, and help
                            teams continuously improve service quality across all channels.
                        </p>
                    </div>

                    {{-- Secure Data Storage --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/automated_thank_you_messages.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Secure Data Storage</h3>
                        <p class="text-gray-600">
                            Safeguard sensitive customer information with enterprise-grade security, 256-bit encryption, and
                            full compliance keeping your data safe and accessible whenever needed.
                        </p>
                    </div>

                    {{-- Customizable Surveys --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-teal-200 transition-colors">
                            <img src="https://qwaiting.com/frontimg/advanced_analytics.svg" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Customizable Surveys</h3>
                        <p class="text-gray-600">
                            Design surveys that align with your business goals. Choose the right formats, questions, and
                            triggers to collect meaningful feedback and understand every service journey in depth.
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
                        Advantages of Online <span class="text-primary">Customer Feedback System</span>
                    </h2>
                </div>

                <!-- Grid -->
                <div class="grid lg:grid-cols-2 gap-10">

                    <!-- Card 1 -->
                    <div
                        class="p-8 rounded-3xl bg-[#F3F8FF] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/staff_performance_monitoring.png"
                            class="rounded-2xl mb-6 w-full object-cover " alt="">

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Staff Performance Monitoring</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Collect feedback for ongoing service improvements
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Spot and fix bottlenecks early to maintain customer trust
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Tailor services according to customer suggestions for stronger relationships
                            </li>
                        </ul>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="p-8 rounded-3xl bg-[#FFF5F7] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/measure_customer_satisfaction.png"
                            class="rounded-2xl mb-6 w-full object-cover " alt="">

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Measure Customer Satisfaction</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Measure customer satisfaction scores to improve services.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Compare scores and provide tailored services to build strong relationships.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Easily analyze the feedback and easily identify the issues to improve satisfaction levels.
                            </li>
                        </ul>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="p-8 rounded-3xl bg-[#F5FFF2] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/cost_effective.png"
                            class="rounded-2xl mb-6 w-full object-cover " alt="">

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Cost-Effective</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Automates review collection and eliminates the need for manual surveys.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Highly scalable to meet a growing customer base for businesses of all sizes.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Eliminates paper-based surveys to save costs related to printing and distribution.
                            </li>
                        </ul>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="p-8 rounded-3xl bg-[#FFF9ED] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/convenience_for_customers.png"
                            class="rounded-2xl mb-6 w-full object-cover " alt="">

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Convenience for Customers</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Customers can provide feedback from any location at any time.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                A user-friendly interface helps customers share their reviews easily without facing any
                                issues.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Easy to collect honest reviews and thoughts from customers than traditional methods.
                            </li>
                        </ul>
                    </div>

                    <!-- Card 5 -->
                    <div
                        class="p-8 rounded-3xl bg-[#F3F8FF] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <img src="https://qwaiting.com/frontimg/data_analysis_and_reporting.png"
                            class="rounded-2xl mb-6 w-full object-cover " alt="">

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Data Analysis and Reporting</h3>

                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Easily gain data insights and analytic reports to efficiently manage large datasets.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Make informed and improved decisions to implement operational improvements.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-primary text-xl">✔</span>
                                Recognize customer experience trends over time to proactively handle emerging issues.
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
                <h2 class="text-2xl lg:text-5xl font-bold text-gray-900 mb-6 text-center">Trusted by 65K+ Businesses Worldwide</h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-10 text-center">Join the industry leaders who trust Q-Waiting for their queue management</p>

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


    </div>
@endsection