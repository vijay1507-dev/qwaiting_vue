@extends('website.layout.website')

@section('title', 'Healthcare Queue Management - Qwaiting')
@section('meta_description', 'Improve patient experience and reduce waiting times in hospitals and clinics with Qwaiting healthcare solutions.')

@section('content')
    <!-- Solution Hero -->
    <section class="pt-32 pb-20 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Healthcare Solutions</span>
                    <h1 class="text-4xl lg:text-5xl font-bold text-text-dark mt-2 mb-6">Better Patient Flow, Better Care
                    </h1>
                    <p class="text-lg text-text-medium mb-8 leading-relaxed">
                        Reduce overcrowding in waiting rooms, minimize patient anxiety, and optimize staff efficiency with
                        our HIPAA-compliant queue management system.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register"
                            class="inline-flex justify-center items-center px-8 py-3 text-base font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/25 hover:-translate-y-1">
                            Get Started
                        </a>
                        <a href="/contact"
                            class="inline-flex justify-center items-center px-8 py-3 text-base font-semibold text-text-dark bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-all hover:-translate-y-1">
                            Contact Sales
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-4 bg-blue-200 rounded-full blur-3xl opacity-50"></div>
                    <div
                        class="relative bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden aspect-video flex items-center justify-center group">
                        <div class="text-center p-8">
                            <div class="w-16 h-16 bg-blue-50 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-gray-400 font-medium">Hospital Dashboard View</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Challenges & Solutions -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-text-dark mb-4">Solving Healthcare Challenges</h2>
                <p class="text-lg text-text-medium max-w-2xl mx-auto">Address the unique needs of hospitals, clinics, and
                    laboratories.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <h3 class="text-xl font-bold text-text-dark mb-3">Reduce Infection Risk</h3>
                    <p class="text-text-medium">Minimize physical contact and crowding in waiting areas with virtual queuing
                        and mobile check-ins.</p>
                </div>
                <div class="p-8 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <h3 class="text-xl font-bold text-text-dark mb-3">Improve Staff Allocation</h3>
                    <p class="text-text-medium">Use real-time data to deploy staff where they are needed most during peak
                        hours.</p>
                </div>
                <div class="p-8 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <h3 class="text-xl font-bold text-text-dark mb-3">Patient Feedback</h3>
                    <p class="text-text-medium">Automatically collect patient feedback after appointments to monitor quality
                        of care.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Study Highlight -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <div
                        class="bg-white rounded-2xl aspect-[4/3] flex items-center justify-center shadow-lg border border-gray-100">
                        <span class="text-gray-400">Apollo Hospitals Logo/Image</span>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <h3 class="text-3xl font-bold text-text-dark mb-4">Trusted by Apollo Hospitals</h3>
                    <p class="text-lg text-text-medium mb-6">
                        "Qwaiting helped us streamline patient flow across 77 branches, reducing wait times by 40% and
                        significantly improving patient satisfaction scores."
                    </p>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Read full case study &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-blue-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Upgrade your patient experience</h2>
            <p class="text-xl text-blue-100 mb-10">Join leading healthcare providers using Qwaiting.</p>
            <a href="/contact"
                class="inline-block bg-white text-blue-600 font-bold py-4 px-10 rounded-lg hover:bg-blue-50 transition-all shadow-xl hover:-translate-y-1">Contact
                Our Healthcare Team</a>
        </div>
    </section>
@endsection
