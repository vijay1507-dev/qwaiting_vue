@extends('website.layout.website')

@section('content')
    <div class="min-h-screen">

        {{-- Hero Section --}}
        <section
            class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-purple-50 to-white">
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-block px-4 py-2 bg-primary/10 rounded-full mb-6">
                            <span class="text-primary font-semibold text-sm">On-Premises Solution</span>
                        </div>
                        <h1 class="text-5xl lg:text-6xl font-bold text-text-dark mb-6 leading-tight">
                            On-Premises
                            <span class="text-primary">Queue System</span>
                        </h1>
                        <p class="text-xl text-text-medium mb-8 leading-relaxed">
                            Qwaiting's on-premises queue system handles your operations from a central server to guarantee
                            continuous uptime and functionality. Takes full control of the customer experience from a single
                            location.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#demo"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-primary text-white rounded-xl font-semibold hover:bg-primary-dark transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                <span>Start your Free Trial</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                            <a href="#contact"
                                class="px-8 py-4 bg-white border-2 border-primary text-primary rounded-xl font-semibold hover:bg-primary hover:text-white transition-all hover:-translate-y-1 shadow-md">
                                Contact Us
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="relative rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                            <img src="{{ asset('website/asset/images/on-premises-software.png') }}" alt="On-Premises Queue System"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Safeguard Your Data Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="max-w-3xl mx-auto text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Safeguard Your Data with
                        <span class="text-primary">On-premises Queue System</span>
                    </h2>
                    <p class="text-xl text-text-medium leading-relaxed">
                        Qwaiting's software can be operated on the business's own server and IT infrastructure instead of
                        being hosted externally or in the cloud. This software is useful for businesses that cannot afford
                        downtime or service gaps due to connectivity issues. In addition, some businesses, especially those
                        handling sensitive information, may have legal or policy requirements to keep customer data on their
                        premises to ensure that customer information remains in the businesses's controlled environment.
                    </p>
                </div>
            </div>
        </section>

        {{-- How Does It Work - Simple Vertical Timeline --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        How Does It
                        <span class="text-primary">Work</span>
                    </h2>
                </div>

                {{-- Timeline Container --}}
                <div class="relative max-w-5xl mx-auto">
                    {{-- Central Vertical Line --}}
                    <div
                        class="absolute left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-primary/20 via-primary to-primary/20 -translate-x-1/2 hidden md:block">
                    </div>

                    <div class="space-y-16">
                        {{-- Step 1 - Left --}}
                        <div class="relative flex items-center md:justify-start">
                            <div class="md:w-1/2 md:pr-12">
                                <div
                                    class="bg-white rounded-3xl shadow-lg p-8 border-2 border-primary/20 hover:border-primary hover:shadow-2xl transition-all duration-300">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <span class="text-2xl font-bold text-white">01</span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-text-dark">Installation</h3>
                                    </div>
                                    <p class="text-text-medium leading-relaxed">
                                        The on-premises queue software is installed on the company's servers or dedicated
                                        hardware within their physical premises. This may involve setting up the necessary
                                        databases, configuring network settings, and integrating the software with existing
                                        systems if required.
                                    </p>
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white shadow-lg hidden md:block">
                            </div>
                        </div>

                        {{-- Step 2 - Right --}}
                        <div class="relative flex items-center md:justify-end">
                            <div class="md:w-1/2 md:pl-12">
                                <div
                                    class="bg-white rounded-3xl shadow-lg p-8 border-2 border-primary/20 hover:border-primary hover:shadow-2xl transition-all duration-300">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <span class="text-2xl font-bold text-white">02</span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-text-dark">Configuration</h3>
                                    </div>
                                    <p class="text-text-medium leading-relaxed">
                                        Users configure the queue software based on their specific workflow requirements.
                                        This involves defining queues, specifying rules for task prioritization, and setting
                                        up user permissions
                                    </p>
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white shadow-lg hidden md:block">
                            </div>
                        </div>

                        {{-- Step 3 - Left --}}
                        <div class="relative flex items-center md:justify-start">
                            <div class="md:w-1/2 md:pr-12">
                                <div
                                    class="bg-white rounded-3xl shadow-lg p-8 border-2 border-primary/20 hover:border-primary hover:shadow-2xl transition-all duration-300">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <span class="text-2xl font-bold text-white">03</span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-text-dark">Easy-to-use Interface</h3>
                                    </div>
                                    <p class="text-text-medium leading-relaxed">
                                        Users interact with the queue software through its user-friendly interface, which
                                        could be a web-based application, or even integrated directly into other business
                                        applications, providing relevant details and specifying any necessary parameters.
                                    </p>
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white shadow-lg hidden md:block">
                            </div>
                        </div>

                        {{-- Step 4 - Right --}}
                        <div class="relative flex items-center md:justify-end">
                            <div class="md:w-1/2 md:pl-12">
                                <div
                                    class="bg-white rounded-3xl shadow-lg p-8 border-2 border-primary/20 hover:border-primary hover:shadow-2xl transition-all duration-300">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <span class="text-2xl font-bold text-white">04</span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-text-dark">Task Processing</h3>
                                    </div>
                                    <p class="text-text-medium leading-relaxed">
                                        The queue software manages the tasks in a structured manner, ensuring that they are
                                        processed in the correct order.
                                    </p>
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white shadow-lg hidden md:block">
                            </div>
                        </div>

                        {{-- Step 5 - Left --}}
                        <div class="relative flex items-center md:justify-start">
                            <div class="md:w-1/2 md:pr-12">
                                <div
                                    class="bg-white rounded-3xl shadow-lg p-8 border-2 border-primary/20 hover:border-primary hover:shadow-2xl transition-all duration-300">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <span class="text-2xl font-bold text-white">05</span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-text-dark">Notifications</h3>
                                    </div>
                                    <p class="text-text-medium leading-relaxed">
                                        The system sends alert messages via SMS, Email, or Whatsapp to users when their
                                        tasks are being processed, or completed, or if any issues arise. This helps in
                                        keeping users informed about the status of their requests.
                                    </p>
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white shadow-lg hidden md:block">
                            </div>
                        </div>

                        {{-- Step 6 - Right --}}
                        <div class="relative flex items-center md:justify-end">
                            <div class="md:w-1/2 md:pl-12">
                                <div
                                    class="bg-white rounded-3xl shadow-lg p-8 border-2 border-primary/20 hover:border-primary hover:shadow-2xl transition-all duration-300">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                            <span class="text-2xl font-bold text-white">06</span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-text-dark">Monitoring and Reporting</h3>
                                    </div>
                                    <p class="text-text-medium leading-relaxed">
                                        On-premises queue software allows admins to track performance and generate reports
                                        on task completion times, resource usage, and other relevant metrics.
                                    </p>
                                </div>
                            </div>
                            {{-- Center Dot --}}
                            <div
                                class="absolute left-1/2 -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white shadow-lg hidden md:block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Experience CTA Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="max-w-4xl mx-auto text-center relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    #1 Cloud-Based Queue Management System
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue
                    management software helps businesses enhance your productivity and reputation by satisfying your
                    customers.
                </p>
                <a href="#demo"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:-translate-y-1 transition-all">
                    <span>Book a Free Demo Now</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                </a>
                <!-- <p class="mt-6 text-white/70 text-sm">No credit card required • Free consultation • Personalized setup</p> -->
            </div>
        </section>

        {{-- Functionalities Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Functionalities of On-Premises
                        <span class="text-primary">Queue System</span>
                    </h2>

                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Feature Card 1 --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div
                            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <img src="{{ asset('website/asset/images/network-dependency.svg') }}" alt="Network Dependency">
                        </div>
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Network Dependency</h3>
                        <p class="text-text-medium leading-relaxed">
                            The system operates within the organization's own network, which can be beneficial for
                            businesses with strict network requirements or limited internet connectivity.
                        </p>
                    </div>

                    {{-- Feature Card 2 --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div
                            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <img src="{{ asset('website/asset/images/offline-operation.svg') }}" alt="Offline Operation">
                        </div>
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Offline Operation</h3>
                        <p class="text-text-medium leading-relaxed">
                            In some cases, on-premises queue systems may continue to operate even in the absence of an
                            internet connection, ensuring continuity in critical business processes.
                        </p>
                    </div>

                    {{-- Feature Card 3 --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div
                            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <img src="{{ asset('website/asset/images/localized-data-control.svg') }}"
                                alt="Localized Data Control">
                        </div>
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Localized Data Control</h3>
                        <p class="text-text-medium leading-relaxed">
                            Ensure full control over sensitive data by maintaining on-premises storage and processing for
                            your queue system.
                        </p>
                    </div>

                    {{-- Feature Card 4 --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div
                            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <img src="{{ asset('website/asset/images/full-customization.svg') }}"
                                alt="Full Customization">
                        </div>
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Full Customization</h3>
                        <p class="text-text-medium leading-relaxed">
                            Enjoy the flexibility of tailoring every aspect of your queue system to match unique business
                            requirements, building complete control and customization on-premises.
                        </p>
                    </div>

                    {{-- Feature Card 5 --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div
                            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <img src="{{ asset('website/asset/images/integration-with-third-party-systems.svg') }}"
                                alt="Integration with Third-party Systems">
                        </div>
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Integration with Third-party Systems</h3>
                        <p class="text-text-medium leading-relaxed">
                            Enable integration with existing on-premises applications and systems, ensuring a smooth
                            transition and compatibility with your infrastructure.
                        </p>
                    </div>

                    {{-- Feature Card 6 --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div
                            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <img src="{{ asset('website/asset/images/maintenance-and-upgrades.svg') }}"
                                alt="Maintenance and Upgrades">
                        </div>
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Maintenance and Upgrades</h3>
                        <p class="text-text-medium leading-relaxed">
                            Businesses have direct responsibility for maintaining and upgrading the queue system, giving
                            them the ability to schedule updates at times that suit their working needs.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Choose Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="rounded-[3rem] overflow-hidden shadow-2xl bg-white md:bg-transparent flex flex-col md:flex-row">
                    {{-- Left Side: Value for Business --}}
                    <div class="p-8 lg:p-16 bg-primary text-white md:w-1/2 relative overflow-hidden">
                        {{-- Decorative background elements --}}
                        <div
                            class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl">
                        </div>

                        <h3 class="text-3xl lg:text-4xl font-bold text-center mb-12 relative z-10">Value for Business</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 relative z-10">
                            {{-- Cost Control --}}
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm group-hover:bg-white/30 transition-all duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm">Cost control</span>
                            </div>

                            {{-- Higher Availability --}}
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm group-hover:bg-white/30 transition-all duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm">Higher availability and reliability</span>
                            </div>

                            {{-- Control Business Performance --}}
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm group-hover:bg-white/30 transition-all duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm">Control business performance</span>
                            </div>

                            {{-- Scalability --}}
                            <div
                                class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm group-hover:bg-white/30 transition-all duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm">Scalability and growth</span>
                            </div>

                            {{-- Customer Experience --}}
                            <div
                                class="flex flex-col items-center text-center group sm:col-start-2 sm:col-end-4 sm:translate-x-1/2">
                                <div
                                    class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm group-hover:bg-white/30 transition-all duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-sm">Provide a great customer experience</span>
                            </div>
                        </div>
                    </div>

                    {{-- Right Side: Value for Customer --}}
                    <div class="p-8 lg:p-16 bg-white md:w-1/2">
                        <h3 class="text-3xl lg:text-4xl font-bold text-center mb-12 text-primary">Value for Customer</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                            {{-- Less Wait Time --}}
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all duration-300">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-text-dark text-sm">Less wait time & faster service
                                    delivery</span>
                            </div>

                            {{-- Convenient Journey --}}
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all duration-300">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-text-dark text-sm">Convenient customer journey</span>
                            </div>

                            {{-- Data Privacy --}}
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all duration-300">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-text-dark text-sm">Data privacy and trust</span>
                            </div>

                            {{-- Share Feedback --}}
                            <div
                                class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all duration-300">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-text-dark text-sm">Share feedback</span>
                            </div>

                            {{-- Personalized Experience --}}
                            <div
                                class="flex flex-col items-center text-center group sm:col-start-2 sm:col-end-4 sm:translate-x-1/2">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-all duration-300">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-text-dark text-sm">Personalized customer experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Application Areas for Cloud Based Solutions --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Application Areas for cloud based solutions
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {{-- Retail Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Retail</h3>
                        </div>
                    </div>

                    {{-- Healthcare Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/healthcare.jpg') }}" alt="Healthcare"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Healthcare</h3>
                        </div>
                    </div>

                    {{-- Banking Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/banking.jpg') }}" alt="Banking"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Banking</h3>
                        </div>
                    </div>

                    {{-- Public Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/public.jpg') }}" alt="Public"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Public</h3>
                        </div>
                    </div>

                </div>

                <div class="text-center mt-12">
                    <a href="#demo"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-primary text-white rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:-translate-y-1 transition-all">
                        <span>Book a Free Demo Now</span>
                    </a>
                </div>
            </div>

        </section>

        {{-- Get-in-Touch Form --}}
        <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Get in
                        <span class="text-primary">Touch</span>
                    </h2>
                    <p class="text-xl text-text-medium">
                        Ready to transform your queue management? Let's talk about your needs.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Full Name *</label>
                                <input type="text"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="John Doe" required>
                                @error('full_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Company Name *</label>
                                <input type="text"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="Acme Inc." required>
                                @error('company_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Email Address *</label>
                                <input type="email"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="john@example.com" required>
                                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Phone Number *</label>
                                <input type="tel"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="+1 (555) 000-0000" required>
                                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-text-dark mb-2">Country</label>
                            <select
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all">
                                <option value="">Select your Country</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-text-dark mb-2">Message</label>
                            <textarea wire:model="message" rows="4"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all resize-none"
                                placeholder="Tell us about your queue management needs..."></textarea>
                            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        @if(isset($successMessage))
                            <div class="bg-green-50 border-2 border-green-200 rounded-xl p-4">
                                <p class="text-green-700 font-semibold">{{ $successMessage }}</p>
                            </div>
                        @endif

                        <button type="submit"
                            class="w-full px-8 py-4 text-white rounded-xl font-bold text-lg shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <span wire:loading.remove>
                                Request a Demo
                            </span>
                        </button>

                        <p class="text-center text-sm text-text-medium">
                            By submitting this form, you agree to our <a href="#" class="text-primary hover:underline">Terms
                                of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>

    </div>

@endsection
