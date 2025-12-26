@extends('website.layout.website')

@section('title', 'Qwaiting - Integrated Queue and Appointment Booking System')
@section('meta_description', 'Reduce wait times by 35% and scale quickly. Qwaiting is the leading platform for queue management, appointment scheduling, and advanced analytics reports.')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 overflow-hidden bg-gradient-to-br from-orange-50/30 via-white to-purple-50/20">
        <!-- Subtle Background Pattern -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 right-0 w-[800px] h-[800px] bg-gradient-to-bl from-orange-100/40 via-transparent to-transparent rounded-full blur-3xl">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-gradient-to-tr from-purple-100/30 via-transparent to-transparent rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Grid: Left 5 cols, Right 7 cols for larger image section -->
            <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                <!-- Left Content - 5 columns -->
                <div class="lg:col-span-5">
                    <!-- Main Heading - 3 Rows -->
                    <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-medium tracking-tight text-gray-900 mb-6 leading-[1.1]"
                        style="font-family: 'Inter', system-ui, sans-serif;">
                        <span class="block">Integrated Queue and Appointment Booking System</span>
                    </h1>

                    <!-- Description - Original Content -->
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Reduce wait times by <span class="font-semibold text-gray-900">35%</span> and scale quickly.
                        Qwaiting is the leading platform for queue management, appointment scheduling, and advanced
                        analytics reports to maximize your ROI.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-nowrap items-center gap-3 mb-6">
                        <a href="/signup"
                            class="group inline-flex items-center gap-2 px-5 py-3 text-sm font-semibold text-white rounded-full hover:opacity-90 transition-all duration-300 shadow-lg hover:shadow-xl whitespace-nowrap"
                            style="background: linear-gradient(to right, #5c4ae4, #7c3aed);">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            Start 14 Day Free Trial
                        </a>
                        <a href="/pricing"
                            class="group inline-flex items-center gap-2 px-5 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-full hover:border-gray-400 hover:bg-gray-50 transition-all duration-300 whitespace-nowrap">
                            <div
                                class="w-4 h-4 rounded-full bg-gradient-to-br from-orange-400 to-orange-500 flex items-center justify-center">
                                <svg class="w-2 h-2 text-white ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                </svg>
                            </div>
                            See Plans & Features
                        </a>
                    </div>

                    <!-- Bottom Caption - Original Content -->
                    <div class="flex flex-wrap items-center gap-6 text-sm text-gray-500">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>No credit card required</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Cancel anytime</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Image with Floating Elements - 7 columns (larger) -->
                <div class="lg:col-span-7 relative">
                    <!-- Main Image Container -->
                    <div class="relative">
                        <!-- Hero Image - Larger -->
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-gray-900/10">
                            <img src="{{ asset('website/asset/images/dashboard-screen.png') }}" alt="Qwaiting Dashboard"
                                class="w-full h-auto object-cover">
                        </div>

                        <!-- Floating Stats Card - Top Right -->
                        <div
                            class="absolute -top-4 -right-4 lg:-top-6 lg:-right-6 z-20 bg-white rounded-2xl shadow-xl p-4 border border-gray-100 animate-float">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                                    style="background: linear-gradient(to bottom right, #5c4ae4, #7c3aed);">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xl font-bold text-gray-900">35%</p>
                                    <p class="text-xs text-gray-500 font-medium">Reduced Wait Time</p>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Stats Card - Bottom Left -->
                        <div
                            class="absolute -bottom-4 -left-4 lg:-bottom-6 lg:-left-6 z-20 bg-white rounded-2xl shadow-xl p-4 border border-gray-100 animate-float-delayed">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                                    style="background: linear-gradient(to bottom right, #5c4ae4, #7c3aed);">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xl font-bold text-gray-900">65K+</p>
                                    <p class="text-xs text-gray-500 font-medium">Happy Businesses</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rating Badges - Below Image -->
                    <div class="flex flex-wrap items-center justify-center gap-3 mt-8">
                        <!-- Capterra Rating -->
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 shadow-sm">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L4 6V12L12 22L20 12V6L12 2Z" fill="#FF9D28" />
                                <path d="M12 2L4 6V12L12 12V2Z" fill="#68C5ED" />
                                <path d="M12 12L4 12V12L12 22V12Z" fill="#044D80" />
                            </svg>
                            <div class="flex">
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-600">4.8 stars on Capterra</span>
                        </div>

                        <!-- GetApp Rating -->
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 shadow-sm">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M4 8L12 4L20 8L12 12L4 8Z" fill="#3DC3E8" />
                                <path d="M4 8V16L12 20V12L4 8Z" fill="#46B8A7" />
                            </svg>
                            <div class="flex">
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-600">4.8 stars on GetApp</span>
                        </div>

                        <!-- G2 Rating -->
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 shadow-sm">
                            <div
                                class="w-5 h-5 rounded-full bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                                <span class="text-[9px] font-bold text-white">G2</span>
                            </div>
                            <div class="flex">
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-600">4.7 stars on G2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-8px);
                }
            }

            @keyframes float-delayed {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .animate-float {
                animation: float 4s ease-in-out infinite;
            }

            .animate-float-delayed {
                animation: float-delayed 4s ease-in-out infinite 2s;
            }
        </style>
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

    <!-- What Qwaiting Does -->
    <section class="py-24 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 1px 1px, rgb(0 0 0) 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-block mb-4">
                    <span
                        class="text-sm font-bold text-primary uppercase tracking-wider bg-primary/10 px-4 py-2 rounded-full">Features</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6">What Qwaiting Does</h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    From booking to feedback, we help to streamline every customer experience. Visitors can schedule an
                    appointment online, check in on arrival, follow virtual updates, get directional guides, and finish with
                    quick feedback.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Feature 1 -->
                <div
                    class="group relative p-8 rounded-3xl bg-gradient-to-br from-blue-50 to-white border border-blue-100 hover:border-blue-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-500/10 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div
                        class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="relative text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        Fewer walkaways</h3>
                    <p class="relative text-gray-600 leading-relaxed">Reduce customer drop-offs by providing accurate wait
                        times
                        and virtual queuing options.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="group relative p-8 rounded-3xl bg-gradient-to-br from-green-50 to-white border border-green-100 hover:border-green-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-500/10 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div
                        class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="relative text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">
                        Calmer lobbies</h3>
                    <p class="relative text-gray-600 leading-relaxed">Eliminate crowded waiting rooms with mobile check-ins
                        and
                        SMS notifications.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="group relative p-8 rounded-3xl bg-gradient-to-br from-amber-50 to-white border border-amber-100 hover:border-amber-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-500/10 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div
                        class="relative w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="relative text-xl font-bold text-gray-900 mb-3 group-hover:text-amber-600 transition-colors">
                        Smarter staffing</h3>
                    <p class="relative text-gray-600 leading-relaxed">Optimize staff allocation based on real-time traffic
                        data
                        and predictive analytics.</p>
                </div>

                <!-- Feature 4 -->
                <div
                    class="group relative p-8 rounded-3xl bg-gradient-to-br from-purple-50 to-white border border-purple-100 hover:border-purple-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-500/10 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div
                        class="relative w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="relative text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">
                        Happier customers</h3>
                    <p class="relative text-gray-600 leading-relaxed">Improve customer satisfaction scores with a seamless,
                        modern
                        service experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Solutions -->
    <section class="py-24 bg-bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-text-dark mb-4">Key Solutions that <span class="text-primary">derive
                        results</span></h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Queue Management -->
                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-2">Queue Management</h3>
                    <p class="text-text-medium mb-4">Streamline customer flow and reduce wait times.</p>
                    <a href="/products/queue-management"
                        class="text-primary font-semibold hover:underline inline-flex items-center gap-1">
                        Learn more
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <!-- Appointment Booking -->
                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('website/asset/images/appointment-booking-solution.svg') }}"
                            alt="Appointment Booking" class="w-16 h-16 object-contain">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-2">Appointment Booking</h3>
                    <p class="text-text-medium mb-4">Allow customers to book slots online 24/7.</p>
                    <a href="#" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">
                        Learn more
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <!-- Virtual Queuing -->
                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('website/asset/images/virtual-queuing-solution.svg') }}" alt="Virtual Queuing"
                            class="w-16 h-16 object-contain">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-2">Virtual Queuing</h3>
                    <p class="text-text-medium mb-4">Let customers wait from anywhere via mobile.</p>
                    <a href="#" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">
                        Learn more
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <!-- Customer Feedback -->
                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('website/asset/images/customer_feedback_system.svg') }}" alt="Customer Feedback"
                            class="w-16 h-16 object-contain">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-2">Customer Feedback</h3>
                    <p class="text-text-medium mb-4">Collect insights to improve service quality.</p>
                    <a href="#" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">
                        Learn more
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <!-- Business Intelligence -->
                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('website/asset/images/business-intelligence.svg') }}" alt="Business Intelligence"
                            class="w-16 h-16 object-contain">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-2">Business Intelligence</h3>
                    <p class="text-text-medium mb-4">Data-driven decisions with advanced reporting.</p>
                    <a href="#" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">
                        Learn more
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <!-- Visitor Management -->
                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('website/asset/images/visitor-management-system.svg') }}"
                            alt="Visitor Management" class="w-16 h-16 object-contain">
                    </div>
                    <h3 class="text-xl font-bold text-text-dark mb-2">Visitor Management</h3>
                    <p class="text-text-medium mb-4">Secure and efficient visitor check-in process.</p>
                    <a href="#" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">
                        Learn more
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why It Matters -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 relative">
                    <div
                        class="relative rounded-3xl bg-gradient-to-br from-primary-light to-white aspect-square flex items-center justify-center border border-gray-100">
                        <iframe width="100%" height="100%"
                            src="https://www.youtube.com/embed/2am86l6z5_o?si=IJmSTmAznP_FqjEK" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-4xl font-bold text-text-dark mb-8">Why It Matters</h2>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-accent-green/10 flex items-center justify-center text-accent-green flex-shrink-0 mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold text-text-dark mb-2">Faster service delivery</h4>
                                <p class="text-text-medium">Serve more customers in less time with automated workflows.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-accent-green/10 flex items-center justify-center text-accent-green flex-shrink-0 mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold text-text-dark mb-2">Real-time mobile updates</h4>
                                <p class="text-text-medium">Keep customers informed with SMS and email notifications.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-accent-green/10 flex items-center justify-center text-accent-green flex-shrink-0 mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold text-text-dark mb-2">Data-driven insights</h4>
                                <p class="text-text-medium">Make informed decisions with comprehensive analytics and
                                    reporting.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Integrations -->
    <section class="py-24 bg-gray-50">
        <div class="container">
            <div class="text-center mb-16">
                <div class="inline-block mb-10">
                    <span
                        class="text-sm font-bold text-primary uppercase tracking-wider bg-primary/10 px-4 py-2 rounded-full">Next-Level
                        Integration for Best Performance</span>
                </div>
                <h2 class="text-4xl font-bold text-text-dark mb-4">Integartions</h2>
                <p class="text-lg text-text-medium">Integrate Qwaiting with your preferred tools. Explore a list of popular
                    integrations Qwaiting offers for a smooth and memorable experience.
                </p>
            </div>
            <div class="flex justify-center">
                <img src="https://qwaiting.com/frontimg/next-level-integration-for-best-performance.png" alt="">
            </div>
            <div class="flex justify-center text-center mt-16">
                <button
                    class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold text-white bg-primary rounded-xl hover:bg-primary-dark transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">View
                    All Integrations</button>
            </div>
        </div>
    </section>


    <!-- Industries -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-text-dark mb-4">Industry solutions from Qwaiting</h2>
                <p class="text-lg text-text-medium">Tailored solutions for every sector.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/industries/retail-queue-system" class="group relative overflow-hidden rounded-3xl aspect-square">
                    <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-2xl font-bold text-white">Retail</h3>
                    </div>
                </a>

                <a href="/industries/healthcare" class="group relative overflow-hidden rounded-3xl aspect-square">
                    <img src="https://qwaiting.com/frontimg/healthcare_image.webp" alt="Healthcare"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-2xl font-bold text-white">Healthcare</h3>
                    </div>
                </a>

                <a href="/industries/banking-queue-system" class="group relative overflow-hidden rounded-3xl aspect-square">
                    <img src="https://qwaiting.com/frontimg/banking_image.webp" alt="Banking"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-2xl font-bold text-white">Banking</h3>
                    </div>
                </a>

                <a href="/industries/public-sector-queue-system"
                    class="group relative overflow-hidden rounded-3xl aspect-square">
                    <img src="https://qwaiting.com/frontimg/public_image.webp" alt="Public"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-2xl font-bold text-white">Public</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 bg-bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-text-dark mb-4">Why Businesses Trust Qwaiting?</h2>
            </div>

            <div class="swiper trustSwiper pb-12 px-4">
                <div class="swiper-wrapper">
                    <!-- Testimonial 1 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="p-8 bg-white rounded-2xl border border-gray-100 h-full flex flex-col hover:shadow-lg transition-all duration-300">
                            <svg class="w-10 h-10 text-primary/20 mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21L14.017 18C14.017 16.896 14.321 16.067 14.929 15.513C15.537 14.959 16.617 14.505 18.169 14.151L18.169 11.775C16.329 11.963 15.009 12.308 14.209 12.81C13.409 13.312 13.009 14.228 13.009 15.558V21H14.017ZM5 21L5 18C5 16.896 5.304 16.067 5.912 15.513C6.52 14.959 7.6 14.505 9.152 14.151L9.152 11.775C7.312 11.963 5.992 12.308 5.192 12.81C4.392 13.312 3.992 14.228 3.992 15.558V21H5Z">
                                </path>
                            </svg>
                            <p class="text-text-medium mb-6 flex-grow">"Qwaiting is an exceptional tool for businesses
                                aiming to enhance their operational efficiency. The reports are easy to understand, and the
                                monitoring capabilities have allowed us to stay ahead of potential issues. It’s a must-have
                                for any forward-thinking organization."</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <div
                                    class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">
                                    O</div>
                                <div>
                                    <h4 class="font-bold text-text-dark">Omar</h4>
                                    <p class="text-sm text-text-medium">CEO in Bahrain</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="p-8 bg-white rounded-2xl border border-gray-100 h-full flex flex-col hover:shadow-lg transition-all duration-300">
                            <svg class="w-10 h-10 text-primary/20 mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21L14.017 18C14.017 16.896 14.321 16.067 14.929 15.513C15.537 14.959 16.617 14.505 18.169 14.151L18.169 11.775C16.329 11.963 15.009 12.308 14.209 12.81C13.409 13.312 13.009 14.228 13.009 15.558V21H14.017ZM5 21L5 18C5 16.896 5.304 16.067 5.912 15.513C6.52 14.959 7.6 14.505 9.152 14.151L9.152 11.775C7.312 11.963 5.992 12.308 5.192 12.81C4.392 13.312 3.992 14.228 3.992 15.558V21H5Z">
                                </path>
                            </svg>
                            <p class="text-text-medium mb-6 flex-grow">"Qwaiting has transformed the way we manage our daily
                                operations. The insights and reports provided by the platform have enabled us to make
                                data-driven decisions, eliminating inefficiencies and streamlining our processes. It’s an
                                essential tool for any business looking to optimize their workflow."</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <div
                                    class="w-12 h-12 bg-accent-green rounded-full flex items-center justify-center text-white font-bold text-xl">
                                    S</div>
                                <div>
                                    <h4 class="font-bold text-text-dark">Sarah</h4>
                                    <p class="text-sm text-text-medium">Operations Manager, UAE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="p-8 bg-white rounded-2xl border border-gray-100 h-full flex flex-col hover:shadow-lg transition-all duration-300">
                            <svg class="w-10 h-10 text-primary/20 mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21L14.017 18C14.017 16.896 14.321 16.067 14.929 15.513C15.537 14.959 16.617 14.505 18.169 14.151L18.169 11.775C16.329 11.963 15.009 12.308 14.209 12.81C13.409 13.312 13.009 14.228 13.009 15.558V21H14.017ZM5 21L5 18C5 16.896 5.304 16.067 5.912 15.513C6.52 14.959 7.6 14.505 9.152 14.151L9.152 11.775C7.312 11.963 5.992 12.308 5.192 12.81C4.392 13.312 3.992 14.228 3.992 15.558V21H5Z">
                                </path>
                            </svg>
                            <p class="text-text-medium mb-6 flex-grow">"Since implementing Qwaiting, our team has seen a
                                significant improvement in productivity. The monitoring features are incredibly detailed,
                                allowing us to identify bottlenecks and address them proactively. It’s a game-changer for
                                our business!"</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <div
                                    class="w-12 h-12 bg-accent-yellow rounded-full flex items-center justify-center text-white font-bold text-xl">
                                    J</div>
                                <div>
                                    <h4 class="font-bold text-text-dark">James</h4>
                                    <p class="text-sm text-text-medium">Project Lead, Kuwait</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 4 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="p-8 bg-white rounded-2xl border border-gray-100 h-full flex flex-col hover:shadow-lg transition-all duration-300">
                            <svg class="w-10 h-10 text-primary/20 mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21L14.017 18C14.017 16.896 14.321 16.067 14.929 15.513C15.537 14.959 16.617 14.505 18.169 14.151L18.169 11.775C16.329 11.963 15.009 12.308 14.209 12.81C13.409 13.312 13.009 14.228 13.009 15.558V21H14.017ZM5 21L5 18C5 16.896 5.304 16.067 5.912 15.513C6.52 14.959 7.6 14.505 9.152 14.151L9.152 11.775C7.312 11.963 5.992 12.308 5.192 12.81C4.392 13.312 3.992 14.228 3.992 15.558V21H5Z">
                                </path>
                            </svg>
                            <p class="text-text-medium mb-6 flex-grow">"Qwaiting has been a lifesaver for our IT department.
                                The platform’s ability to provide accurate reports and real-time monitoring has helped us
                                make informed decisions, reducing downtime and improving overall efficiency. Highly
                                recommend it!"</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <div
                                    class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                                    A</div>
                                <div>
                                    <h4 class="font-bold text-text-dark">Alonzo</h4>
                                    <p class="text-sm text-text-medium">IT Engineer in Saudi Arabia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 5 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="p-8 bg-white rounded-2xl border border-gray-100 h-full flex flex-col hover:shadow-lg transition-all duration-300">
                            <svg class="w-10 h-10 text-primary/20 mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21L14.017 18C14.017 16.896 14.321 16.067 14.929 15.513C15.537 14.959 16.617 14.505 18.169 14.151L18.169 11.775C16.329 11.963 15.009 12.308 14.209 12.81C13.409 13.312 13.009 14.228 13.009 15.558V21H14.017ZM5 21L5 18C5 16.896 5.304 16.067 5.912 15.513C6.52 14.959 7.6 14.505 9.152 14.151L9.152 11.775C7.312 11.963 5.992 12.308 5.192 12.81C4.392 13.312 3.992 14.228 3.992 15.558V21H5Z">
                                </path>
                            </svg>
                            <p class="text-text-medium mb-6 flex-grow">"We’ve been using Qwaiting for a few months now, and
                                the impact on our business has been remarkable. The platform’s analytics have given us a
                                clear picture of our operations, helping us cut down on redundant processes and focus on
                                what truly matters."</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <div
                                    class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                                    L</div>
                                <div>
                                    <h4 class="font-bold text-text-dark">Layla</h4>
                                    <p class="text-sm text-text-medium">Business Analyst in Qatar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination !-bottom-0"></div>
            </div>
        </div>
    </section>


    <section class="relative py-20 bg-gradient-to-br from-primary via-blue-600 to-purple-600 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-white/5 rounded-full blur-3xl">
            </div>
        </div>


        <div class="max-w-5xl mx-auto px-4 sm:px-4 lg:px-4 text-center relative z-10">

            <h2 class="text-md lg:text-2xl font-bold text-white mb-10 leading-tight">
                What impact can Qwaiting make on your business? Use our ROI Calculator to see the exact time and cost
                savings in seconds
            </h2>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-10">
                <a href="/roi-calculator-for-queue-system" target="_blank"
                    class="group inline-flex justify-center items-center px-10 py-5 text-lg font-bold text-primary bg-white rounded-2xl hover:bg-gray-50 transition-all duration-300 shadow-2xl hover:shadow-white/50 hover:-translate-y-1 transform">
                    Calculate your ROI Now
                    <svg class="w-6 h-6 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <!-- Case Studies -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <h2 class="text-4xl font-bold text-text-dark">See How Our Clients Win</h2>
                <a href="/case-studies" class="text-primary font-semibold hover:underline hidden md:block">View all stories
                    →</a>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all group">
                    <div class="h-48 bg-white relative overflow-hidden flex items-center justify-center">
                        <img src="{{ asset('website/asset/images/apollo_hospitals.jpg') }}" alt="Apollo Hospitals"
                            class="w-25 h-25 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-text-dark mb-3 group-hover:text-primary transition-colors">How
                            Apollo Hospitals Streamlined Patient Flow Across 77 Branches</h3>
                        <p>Apollo Hospital is one of the leading and most trusted healthcare brands in India. With over 77+
                            branches across the country, Apollo has been serving patients since 1983.</p>
                        <a href="#" class="text-sm text-primary font-semibold mt-2 inline-block">Read Case Study</a>
                    </div>
                </div>
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all group">
                    <div class="h-48 relative overflow-hidden flex items-center justify-center">
                        <img src="{{ asset('website/asset/images/msq-logo.png') }}" alt="MSQ"
                            class="w-90 h-90 object-contain p-8">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-text-dark mb-3 group-hover:text-primary transition-colors">Changi
                            Airport Group perfectly managed the restroom booking procedure</h3>
                        <p>Changi Airport Group is into this business since 1981. It has won 649 awards and proved to be the
                            best international airport in the world.</p>
                        <a href="#" class="text-sm text-primary font-semibold mt-2 inline-block">Read Case Study</a>
                    </div>
                </div>
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all group">
                    <div class="h-48 bg-white relative overflow-hidden flex items-center justify-center">
                        <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt="NUS"
                            class="w-50 h-50 object-contain">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-text-dark mb-3 group-hover:text-primary transition-colors">NUS
                            leverages Qwaiting for a smoother hostel allotment procedure</h3>
                        <p>However, the National University of Singapore is one of the oldest and a reliable education
                            institutes. To dig deep into their history, they started to impart knowledge with just 23
                            students in the year 1905 but grew immensely with time.</p>
                        <a href="#" class="text-sm text-primary font-semibold mt-2 inline-block">Read Case Study</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-24 bg-bg-light">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-text-dark mb-4">Frequently Asked Questions</h2>
            </div>
            <div class="space-y-4">
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What is Qwaiting and who is it for?</h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Qwaiting is an advanced AI-powered queue management system that helps businesses reduce their
                        customer wait times, manage walk-ins, and improve customer service.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">How does Qwaiting improve customer experience and reduce
                            wait times?</h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Qwaiting makes check-ins simple, manages virtual queues, shares live wait updates, and sends
                        personalized alerts so customers always know their place.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">Is Qwaiting suitable for my industry or organization size?
                        </h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Yes, with its highly scalable and flexible features, Qwaiting is suitable for all industries—retail,
                        healthcare, government, education, and many others.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What’s included in the free trial, and how do I get
                            started?</h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        The 14-day free trial offers you full access to Qwaiting’s core features like virtual queues,
                        appointment booking, and live dashboards. No credit card needed. Just sign up on our website, set up
                        your location, and start managing queues in minutes.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">How easy is it to integrate Qwaiting with my existing
                            systems?</h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Qwaiting offers ready APIs and supports seamless integration with CRMs, ERPs, and booking tools,
                        with no complex IT setup required. Our expert team provides 24/7 support to ensure a smooth
                        transition.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What kind of support and onboarding does Qwaiting provide?
                        </h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Qwaiting offers full onboarding, including setup assistance, staff training, and best practices
                        tailored to your industry. Whether you need a fast launch or hands-on guidance, our team ensures a
                        smooth start.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">How secure is Qwaiting?</h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Qwaiting is built with enterprise-grade security. We use encrypted 256-bit data transmission (SSL),
                        secure cloud hosting, and strict access controls. The platform is fully GDPR-compliant and follows
                        best practices for data privacy.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">Can Qwaiting be customized for my workflow or brand?</h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Yes. Qwaiting is fully customizable! Businesses can tailor workflows, queue logic, user roles, and
                        branding (logos, colors, messages) to match their industry's exact needs.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What are the pricing plans for Qwaiting?</h3>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-text-medium">
                        Qwaiting offers flexible pricing based on your business size and needs. Plans start from $199/month.
                        Custom enterprise packages are also available. Contact our team for a quick quote tailored to your
                        business needs.
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-text-dark mb-4">Latest Posts From the Blog</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <article
                    class="bg-white rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('website/asset/images/How-to-End-the-Frustration-of-Long-Queues-Ever1-1.jpg') }}"
                            alt="Queue Management" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-text-dark mb-3 hover:text-primary transition-colors"><a
                                href="#">How to End the Frustration of Long Queues Ever</a></h3>
                        <p class="text-text-medium text-sm mb-4">Long queues can be very boring. Standing in line can make
                            you feel frustrated when it feels longer than its actual time. Waiting is frustrating, but there
                            is a way to address this problem. Businesses can use smart queue management systems to make
                            lines shorter. These systems help people know their place...</p>
                        <a href="#" class="text-sm font-semibold text-text-dark hover:text-primary">Read more →</a>
                    </div>
                </article>
                <article
                    class="bg-white rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('website/asset/images/Why-Government-Offices-Must-Modernize-Their-Queues-Before-2026.jpg') }}"
                            alt="Queue Management" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-text-dark mb-3 hover:text-primary transition-colors"><a
                                href="#">Why Government Offices Must Modernize Their Queues Before 2026</a></h3>
                        <p class="text-text-medium text-sm mb-4">We all know that government offices deal with hundreds of
                            citizens every single day. This often leads to long wait times at service counters, which
                            frustrates the public and creates unnecessary confusion for staff. To solve this issue, many
                            government departments are turning to digital...</p>
                        <a href="#" class="text-sm font-semibold text-text-dark hover:text-primary">Read more →</a>
                    </div>
                </article>
                <article
                    class="bg-white rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow-lg transition-all overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('website/asset/images/Why-Government-Offices-Must-Modernize-Their-Queues-Before-2026.jpg') }}"
                            alt="Queue Management" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-text-dark mb-3 hover:text-primary transition-colors"><a
                                href="#">10 Benefits of Using Queue Management Software in Your Business</a></h3>
                        <p class="text-text-medium text-sm mb-4">Queue management software is simply like having a smart
                            helper for your business. It makes serving customers easier by organizing queue lines and
                            appointments. This software saves time and makes things run smoothly. Business owners can see
                            what’s happening in real time and make better choices...</p>
                        <a href="#" class="text-sm font-semibold text-text-dark hover:text-primary">Read more →</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Global Offices -->
    <section class="py-24 bg-bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-text-dark mb-12 text-center">Global Offices</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Singapore -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/flag-for-singapore.svg') }}" alt="Singapore Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">Singapore</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        3 Raffles Place #08-01B,<br>
                        Bharat Building Singapore<br>
                        048617
                    </p>
                </div>
                <!-- India -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/flag-for-india.svg') }}" alt="India Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">India</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        Plot No. D-151, Phase 8,<br>
                        Industrial Area, Mohali<br>
                        Punjabindia
                    </p>
                </div>
                <!-- Australia -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/flag-for-australia.svg') }}" alt="Australia Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">Australia</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        19/20 Enterprise Dr, Bundoora<br>
                        VIC 3083, Australia
                    </p>
                </div>
                <!-- United States -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/uk-flag.svg') }}" alt="United States Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">United States</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        #305, 3110 Main St building 2<br>
                        Santa Monica, California<br>
                        90405, US
                    </p>
                </div>
                <!-- United Kingdom -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/uk-flag.svg') }}" alt="UK Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">United Kingdom</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        35, Rubix House, 49 High street,<br>
                        Southall UB13FF
                    </p>
                </div>
                <!-- Malaysia -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/malaysia-flag.svg') }}" alt="Malaysia Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">Malaysia</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        No. 5B, Jalan BS 7, Taman<br>
                        Bukit Segar, 43200 Cheras,<br>
                        Selangor, Malaysia
                    </p>
                </div>
                <!-- United Arab Emirates -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/dubai-flag.svg') }}" alt="UAE Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">United Arab Emirates</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        Level 32 /3202, Marina Plaza,<br>
                        Dubai Marina
                    </p>
                </div>
                <!-- Saudi Arabia -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('website/asset/images/saudi-flag.svg') }}" alt="Saudi Arabia Flag"
                            class="w-10 h-10 rounded-full object-cover">
                        <h3 class="font-bold text-lg text-text-dark">Saudi Arabia</h3>
                    </div>
                    <p class="text-sm text-text-medium leading-relaxed">
                        6415 Othman Bin Affan- Al<br>
                        Ezdihar Dist. Unit No 20 Riyadh<br>
                        12485 - 2711
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-32 bg-gradient-to-br from-primary via-blue-600 to-purple-600 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-white/5 rounded-full blur-3xl">
            </div>
        </div>


        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <!-- Badge -->
            <div
                class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm font-bold mb-8 border border-white/30">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
                Limited Time Offer
            </div>

            <h2 class="text-4xl lg:text-6xl font-extrabold text-white mb-6 leading-tight">
                Join <span class="bg-white/20 px-4 py-1 rounded-xl">65,000+</span> businesses<br class="hidden sm:block">
                managing queues smarter
            </h2>
            <p class="text-xl lg:text-2xl text-white/90 mb-12 max-w-3xl mx-auto font-medium">
                Get Started Today with a 14-day free trial. No credit card required.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-10">
                <a href="/register"
                    class="group inline-flex justify-center items-center px-10 py-5 text-lg font-bold text-primary bg-white rounded-2xl hover:bg-gray-50 transition-all duration-300 shadow-2xl hover:shadow-white/50 hover:-translate-y-1 transform">
                    Start Free Trial
                    <svg class="w-6 h-6 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                </a>
                <a href="/contact"
                    class="inline-flex justify-center items-center px-10 py-5 text-lg font-bold text-white bg-white/10 backdrop-blur-sm border-2 border-white/30 rounded-2xl hover:bg-white/20 transition-all duration-300 hover:-translate-y-1 transform">
                    Talk to Sales
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center items-center gap-8 text-white/80 text-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">14-day free trial</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">No credit card required</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">Cancel anytime</span>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof Swiper !== 'undefined') {
                new Swiper(".trustSwiper", {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                    },
                });
            }
        });
    </script>

   
@endsection