@extends('website.layout.website')

@section('title', 'Queue Management System - Qwaiting')
@section('meta_description', 'Optimize customer flow and reduce wait times with our advanced cloud-based queue management system.')

@section('content')
    <!-- Product Hero -->
    <section class="pt-32 pb-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-primary font-semibold tracking-wide uppercase text-sm">Cloud-based Software</span>
                    <h1 class="text-4xl lg:text-5xl font-bold text-text-dark mt-2 mb-6">Smart Queue Management System</h1>
                    <p class="text-lg text-text-medium mb-8 leading-relaxed">
                        Eliminate physical lines and improve customer satisfaction. Our cloud-based queue management
                        software allows your customers to join a virtual queue via their mobile phone, kiosk, or website.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register"
                            class="inline-flex justify-center items-center px-8 py-3 text-base font-semibold text-white bg-primary rounded-lg hover:bg-primary-dark transition-all shadow-lg shadow-primary/25 hover:-translate-y-1">
                            Start Free Trial
                        </a>
                        <a href="/demo"
                            class="inline-flex justify-center items-center px-8 py-3 text-base font-semibold text-text-dark bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-all hover:-translate-y-1">
                            Book a Demo
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-4 bg-primary/5 rounded-full blur-3xl"></div>
                    <div
                        class="relative bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden aspect-video flex items-center justify-center group">
                        <div class="text-center p-8 transition-transform group-hover:scale-105 duration-500">
                            <div class="w-16 h-16 bg-gray-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-gray-400 font-medium">Dashboard Interface</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Benefits -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-text-dark mb-4">Why Choose Our Queue System?</h2>
                <p class="text-lg text-text-medium max-w-2xl mx-auto">Transform the way you manage waiting lines.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Benefit 1 -->
                <div
                    class="p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100 group">
                    <div
                        class="w-12 h-12 bg-primary-light rounded-xl flex items-center justify-center text-primary mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-3">Reduce Wait Times</h3>
                    <p class="text-text-medium">Cut perceived wait times by up to 50% by allowing customers to wait
                        remotely.</p>
                </div>

                <!-- Benefit 2 -->
                <div
                    class="p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100 group">
                    <div
                        class="w-12 h-12 bg-accent-green/10 rounded-xl flex items-center justify-center text-accent-green mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-3">Increase Efficiency</h3>
                    <p class="text-text-medium">Streamline staff operations and serve more customers with automated flows.
                    </p>
                </div>

                <!-- Benefit 3 -->
                <div
                    class="p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100 group">
                    <div
                        class="w-12 h-12 bg-accent-yellow/10 rounded-xl flex items-center justify-center text-accent-yellow mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-3">Data Insights</h3>
                    <p class="text-text-medium">Gain actionable insights into peak times, service duration, and staff
                        performance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Deep Dive -->
    <section class="py-20 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">
            <!-- Row 1: Virtual Queuing -->
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <div class="bg-gray-100 rounded-2xl aspect-[4/3] flex items-center justify-center">
                        <span class="text-gray-400">Mobile Interface Screenshot</span>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <h3 class="text-3xl font-bold text-text-dark mb-4">Virtual Queuing</h3>
                    <p class="text-lg text-text-medium mb-6">
                        Let your customers join the queue before they even arrive. They can scan a QR code, use your
                        website, or send an SMS to get a ticket.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-text-medium">
                            <svg class="w-5 h-5 text-accent-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Real-time SMS updates
                        </li>
                        <li class="flex items-center gap-3 text-text-medium">
                            <svg class="w-5 h-5 text-accent-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Wait from anywhere
                        </li>
                        <li class="flex items-center gap-3 text-text-medium">
                            <svg class="w-5 h-5 text-accent-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Customizable branding
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Row 2: Kiosk App -->
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-1">
                    <h3 class="text-3xl font-bold text-text-dark mb-4">Self-Service Kiosks</h3>
                    <p class="text-lg text-text-medium mb-6">
                        Deploy tablets or kiosk stands to allow walk-in customers to check in easily. Customize the flow to
                        gather necessary information upfront.
                    </p>
                    <a href="#" class="text-primary font-semibold hover:underline">Learn more about Kiosks &rarr;</a>
                </div>
                <div class="order-2">
                    <div class="bg-gray-100 rounded-2xl aspect-[4/3] flex items-center justify-center">
                        <span class="text-gray-400">Kiosk Screenshot</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-primary text-white text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Stop making your customers wait</h2>
            <p class="text-xl text-primary-light mb-10">Get started with Qwaiting today and improve your customer
                experience.</p>
            <a href="/register"
                class="inline-block bg-white text-primary font-bold py-4 px-10 rounded-lg hover:bg-gray-50 transition-all shadow-xl hover:-translate-y-1">Start
                Free Trial</a>
        </div>
    </section>
@endsection
