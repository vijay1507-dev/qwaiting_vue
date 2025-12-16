@extends('website.layout.website')

@section('content')
    <div class="min-h-screen">

        {{-- Hero Section --}}
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-block px-4 py-2 bg-primary/10 rounded-full mb-6">
                            <span class="text-primary font-semibold text-sm">☁️ Cloud-Based Solution</span>
                        </div>
                        <h1 class="text-5xl lg:text-6xl font-bold text-text-dark mb-6 leading-tight">
                            Cloud-Based Queue Management
                            <span class="text-primary">Software</span>
                        </h1>
                        <p class="text-xl text-text-medium mb-8 leading-relaxed">
                            Our cloud-based queue management platform delights customers, empowers staff, and optimizes operations with the flexible tools you need, only when you need them.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#demo"
                                class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold text-white bg-primary rounded-xl hover:bg-primary-dark transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                <span class="flex items-center gap-2">
                                    📅 Book a Live Demo
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </span>
                            </a>
                            <a href="#tour"
                                class="px-8 py-4 bg-white border-2 border-primary text-primary rounded-xl font-semibold hover:bg-primary transition-all hover:-translate-y-1 shadow-md">
                                Take a Product Tour
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="{{ asset('website/asset/images/cloud-based-software.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        {{-- Boost Productivity Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="max-w-3xl mx-auto text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Boost Productivity with
                        <span class="text-primary">Cloud
                            Technology</span>
                    </h2>
                    <p class="text-xl text-text-medium leading-relaxed">
                        Our cloud-based queue system is an affordable solution that removes the need for a dedicated server or on-site hardware to manage queues. The queue software can be hosted on the cloud with just a reliable internet connection. With our SaaS subscription model (Software as a Service), Qwaiting's cloud-based queue management solution can help you effectively plan your annual budget for customer journey management.
                    </p>
                </div>
            </div>
        </section>


        {{-- How Qwaiting Cloud-Based Software Works --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        How Qwaiting Cloud-Based Software
                        <span class="text-primary">Works</span>
                    </h2>
                    <p class="text-xl text-text-medium max-w-3xl mx-auto">
                        A simple, powerful workflow that transforms your queue management
                    </p>
                </div>

                {{-- Flowing Steps Container --}}
                <div class="relative max-w-6xl mx-auto">

                    {{-- Step 1 - Top Left --}}
                    <div class="relative mb-32" style="margin-bottom: 150px;">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="md-_w_2">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                    <span class="text-3xl font-bold text-primary">01</span>
                                </div>
                                <h3 class="text-3xl font-bold text-text-dark mb-4">Cloud Infrastructure</h3>
                                <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    Whether you're managing one branch or more, our cloud-based queue system grows with your
                                    needs while keeping costs predictable.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Access anywhere, on any device</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">No hardware or maintenance needed</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Encrypted and security-compliant</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Scalable from a single site to an enterprise</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="md-_w_2">
                                <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8">
                                    <div class="text-center">
                                        <img src="{{ asset('website/asset/images/cloud-Infrastructure.png') }}"
                                            alt="Cloud-Powered Infrastructure" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Step 2 - Top Right --}}
                    <div class="relative mb-32" style="margin-bottom: 150px;">
                        <div class="flex flex-col md:flex-row-reverse items-center gap-8">

                            <div class="md-_w_2">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                    <span class="text-3xl font-bold text-primary">02</span>
                                </div>
                                <h3 class="text-3xl font-bold text-text-dark mb-4">Activity Dashboard</h3>
                                <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    A clean, user-friendly dashboard where users can easily create, view, and manage queues.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Simple and intuitive interface</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Centralized control of all queue activities</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Role-based access for better management</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="md-_w_2">
                                <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                    <div class="text-center">
                                        <img src="{{ asset('website/asset/images/activity-dashboard.png') }}"
                                            alt="Cloud-Powered Infrastructure" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Step 3 - Middle Left --}}
                    <div class="relative mb-32" style="margin-bottom: 150px;">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="md-_w_2">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                    <span class="text-3xl font-bold text-primary">03</span>
                                </div>
                                <h3 class="text-3xl font-bold text-text-dark mb-4">Queue Configuration</h3>
                                <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    Customize queues based on your business needs and service types.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Set queue priorities</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Define access controls</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Adjust processing rules as needed</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="md-_w_2">
                                <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8 ">
                                    <div class="text-center">
                                        <img src="{{ asset('website/asset/images/queue-configuration.png') }}"
                                            alt="Cloud-Powered Infrastructure" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 4 - Middle Right --}}
                    <div class="relative mb-32" style="margin-bottom: 150px;">
                        <div class="flex flex-col md:flex-row-reverse items-center gap-8">

                            <div class="md-_w_2">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                    <span class="text-3xl font-bold text-primary">04</span>
                                </div>
                                <h3 class="text-3xl font-bold text-text-dark mb-4">Virtual Queue Management</h3>
                                <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    Enable customers to join queues remotely using their devices.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Join through mobile apps or web portals</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">View estimated wait times in real-time</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Reduce physical crowding and long lines</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="md-_w_2">
                                <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                    <div class="text-center">
                                        <img src="{{ asset('website/asset/images/virtual-queue-management.png') }}"
                                            alt="Cloud-Powered Infrastructure" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Step 5 - Bottom Left --}}
                    <div class="relative mb-32" style="margin-bottom: 150px;">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="md-_w_2">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                    <span class="text-3xl font-bold text-primary">05</span>
                                </div>
                                <h3 class="text-3xl font-bold text-text-dark mb-4">Real-time Monitoring</h3>
                                <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    Track queue activity and service status as it happens.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Monitor queue lengths and progress</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Identify delays or idle time</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Improve decision-making with live data</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="md-_w_2">
                                <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8 ">
                                    <div class="text-center">
                                        <img src="{{ asset('website/asset/images/real-time-monitoring.png') }}"
                                            alt="Cloud-Powered Infrastructure" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Step 6 - Bottom Right --}}
                    <div class="relative">
                        <div class="flex flex-col md:flex-row-reverse items-center gap-8">
                            <div class="md-_w_2">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                    <span class="text-3xl font-bold text-primary">06</span>
                                </div>
                                <h3 class="text-3xl font-bold text-text-dark mb-4">Automated Alert Messages</h3>
                                <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    Keep customers informed throughout their wait.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Notify via SMS, email, or app</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Share wait times and service updates</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-text-medium">Alert them when it's their turn</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="md-_w_2">
                                <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                    <div class="text-center">
                                        <img src="{{ asset('website/asset/images/automated-alert-messages.png') }}"
                                            alt="Cloud-Powered Infrastructure" srcset="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- Experience Qwaiting Cloud Platform --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">

            <div class="max-w-4xl mx-auto text-center relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Experience the Qwaiting Cloud Platform
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    See firsthand how our cloud-based solution can transform your customer service operations.
                    Get a personalized demo tailored to your business needs and discover the power of intelligent queue
                    management.
                </p>
                <a href="#demo"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:-translate-y-1 transition-all">
                    <span>📅 Book a Free Demo Now</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
                <p class="mt-6 text-white/80 text-sm">No credit card required • Free 30-day trial • Cancel anytime</p>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Features that Simplify
                        <span class="text-primary">Queuing</span>
                    </h2>
                    <p class="text-xl text-text-medium max-w-3xl mx-auto">
                        Cloud-Based Queue System with Smart, Scalable Features Qwaiting’s cloud-first architecture offers powerful tools that flex with your business—whether you manage a single branch or a global network. Enjoy simplified setup, real-time visibility, and seamless integrations that make customer flow effortless.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Feature Card 1 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        {{-- Purple Gradient Header with Decorative Pattern --}}
                        <div class="relative h-40 bg-primary rounded-xl hover:bg-primary-dark">
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
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/SAAS-based-model.svg') }}" class="w-10 h-10">
                            </div>
                        </div>

                        {{-- Card Content --}}
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">SAAS Based Model</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Run your queue operations smarter and faster with our plug-and-play Software as a Service (SaaS) platform. No hardware hassles. No complex installations. Just a powerful solution you can access anywhere, anytime.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 2 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-40 bg-primary rounded-xl hover:bg-primary-dark">
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
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/multi-branch-solution.svg') }}" class="w-10 h-10">
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Multi-branch Solution</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Effortlessly manage queues across multiple locations through one centralized dashboard. Get real-time insights, deploy updates instantly, and ensure consistent service delivery no matter where your customers walk in.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 3 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-40 bg-primary rounded-xl hover:bg-primary-dark">
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
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/integration-with-other-tools.svg') }}" class="w-10 h-10">
                            </div>
                        </div>

                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Seamless Integration</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Qwaiting connects with your existing CRM, ERP, and HIS tools—so your operations stay in sync as you scale. Enable automation, reduce data silos, and adapt faster to customer demand without disrupting your tech stack.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 4 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-40 bg-primary rounded-xl hover:bg-primary-dark">
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
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/microsoft-azure-and-AWS.svg') }}" class="w-10 h-10">
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Powered by Microsoft Azure & AWS</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                We use the trusted cloud infrastructure of Microsoft Azure and Amazon Web Services (AWS) to deliver fast, reliable, and scalable queue management. This ensures your data stays secure and your operations run smoothly — anytime, anywhere.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 5 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-40 bg-primary rounded-xl hover:bg-primary-dark">
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
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/security-first.svg') }}" class="w-10 h-10">
                            </div>
                        </div>

                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Security First</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                We help to keep your data protected with enterprise-grade security. We follow best practices and compliance standards to keep your information safe and give you complete peace of mind.
                            </p>
                        </div>
                    </div>

                    {{-- Feature Card 6 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-40 bg-primary rounded-xl hover:bg-primary-dark">
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
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/analytic-reporting.svg') }}" class="w-10 h-10">
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Smart Analytics & Reporting</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Make informed decisions with real-time reports and performance insights. Track queue times, customer flow, and staff efficiency to continuously improve your service.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Choose Our Cloud-Based System --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Why Choose Our Cloud-Based Queue System
                        <span class="text-primary">For Your
                            Business?</span>
                    </h2>
                </div>
                <div class="flex justify-center">
                    <img src="https://qwaiting.com/frontimg/cloud-based-queue-system-is-loaded-with-rich-features-you-will-love.png"
                        alt="">
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
        <section id="demo" class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-text-dark mb-6">
                        Fill the Form
                    </h2>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <input type="text" name="name"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Your name*" required>
                            </div>

                            <div>
                                <input type="text" name="company_name"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Company Name*" required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <input type="email" name="email"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Company email*" required>
                            </div>

                            <div>
                                <input type="tel" name="phone"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Phone">
                            </div>
                        </div>

                        <div>
                            <select name="country"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-gray-500 bg-white"
                                required>
                                <option value="" disabled selected>Country*</option>
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="ca">Canada</option>
                                <option value="au">Australia</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <select name="industry"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-gray-500 bg-white"
                                required>
                                <option value="" disabled selected>Industry*</option>
                                <option value="banking">Banking & Finance</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="retail">Retail</option>
                                <option value="government">Government</option>
                                <option value="telecom">Telecom</option>
                                <option value="education">Education</option>
                                <option value="automotive">Automotive</option>
                                <option value="transportation">Transportation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <select name="looking_for"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-gray-500 bg-white"
                                required>
                                <option value="" disabled selected>What Are You Looking For?*</option>
                                <option value="queue_management">Queue Management System</option>
                                <option value="appointment_booking">Appointment Booking System</option>
                                <option value="digital_signage">Digital Signage Solution</option>
                                <option value="customer_feedback">Customer Feedback System</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <textarea name="message" rows="4"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all resize-none placeholder-gray-400"
                                placeholder="How can we best help you?"></textarea>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex items-center h-5">
                                <input id="privacy_policy" name="privacy_policy" type="checkbox"
                                    class="w-5 h-5 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary/30"
                                    required>
                            </div>
                            <label for="privacy_policy" class="text-sm text-gray-500 leading-tight">
                                I agree to the <a href="#" class="text-primary hover:underline font-medium">Privacy
                                    Policy</a> and allow Qwaiting to send relevant information.*
                            </label>
                        </div>

                        @if(isset($successMessage))
                            <div class="bg-green-50 border-2 border-green-200 rounded-xl p-4">
                                <p class="text-green-700 font-semibold">{{ $successMessage }}</p>
                            </div>
                        @endif

                        <button type="submit"
                            class="w-full px-8 py-4 text-white rounded-xl font-bold text-lg shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <span>
                                Request a Demo
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </section>

    </div>

@endsection