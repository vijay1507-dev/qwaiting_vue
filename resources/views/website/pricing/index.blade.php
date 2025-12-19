@extends('website.layout.website')

@section('title', 'Pricing - Qwaiting')
@section('meta_description', 'Choose the right plan for your business. Flexible pricing for queue management and appointment booking systems.')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-primary selection:text-white">

        {{-- Hero Header --}}
        <div class="pt-32 pb-16 text-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl lg:text-7xl font-bold tracking-tight text-gray-900 mb-6">
                Enterprise-Ready Plans <span class="text-primary">Built for Every Business Need</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Whether you're scaling across locations or optimizing a single branch, Qwaiting offers flexible, cost-effective plans that grow with you.
            </p>
            <div class="flex justify-center items-center gap-4 mt-10">
                <a href="/signup"><button
                            class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition cursor-pointer p-6">
                            Start Your Free Trial
                        </button></a>
                    <a href="/contact"><button
                            class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition cursor-pointer p-6">
                            Contact Us
                        </button></a>
            </div>
        </div>

        {{-- Main Pricing Grid --}}
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-4xl font-bold text-center mb-4">Pricing Plans</h2>
                <p class="text-center text-gray-600 mb-12">Choose the plan that fits your organisation</p>
                {{-- Billing Toggle --}}
                <div class="mt-10 flex justify-center items-center space-x-4 mb-4" x-data="{ annual: true }">
                    <span class="text-base font-medium"
                        :class="{ 'text-gray-900': !annual, 'text-gray-900': annual }">Monthly</span>
                    <button class="relative rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                        x-data="{ annual: true }" @click="annual = !annual">
                        <div class="w-16 h-8 transition bg-primary rounded-full shadow-md outline-none"></div>
                        <div class="absolute inline-flex items-center justify-center w-5 h-5 transition-all duration-200 ease-in-out transform bg-white rounded-full shadow-sm top-1 left-1"
                            :class="{ 'translate-x-8': annual, 'translate-x-0': !annual }"></div>
                    </button>
                    <span class="text-base font-medium" :class="{ 'text-gray-900': annual, 'text-gray-500': !annual }">
                        Yearly
                    </span>
                </div>
                <p class="text-center text-gray-600 mb-12 font-bold">Bill monthly / Bill annually and get 2 months free!</p>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- Starter -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all border border-gray-200">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Starter</h3>

                        <ul class="space-y-4 text-gray-700 mb-8">
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Staff login upto 5</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Email notification</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Unlimited visitors</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Roles and permissions</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Multi-language support</li>
                        </ul>

                        <a href="/signup"><button
                            class="w-full bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition cursor-pointer">
                            Sign Up
                        </button></a>
                        <a href="#compare_plans"><p class="text-sm text-center text-purple-600 mt-3 cursor-pointer hover:underline">or See features ↓
                        </p></a>
                    </div>

                    <!-- Business -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all border border-gray-200">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Business</h3>

                        <ul class="space-y-4 text-gray-700 mb-8">
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Staff login upto 10</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Email notification</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Analytics and reporting</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Message personalization</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Unlimited visitors</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Roles and permissions</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Multi-language support</li>
                        </ul>

                        <a href="/signup"><button
                            class="w-full bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition cursor-pointer">
                            Sign Up
                        </button></a>
                        <a href="#compare_plans"><p class="text-sm text-center text-purple-600 mt-3 cursor-pointer hover:underline">or See features ↓
                        </p></a>
                    </div>

                    <!-- Enterprise (Popular Choice) -->
                    <div
                        class="relative bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all border-2 border-purple-500">
                        <span
                            class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-purple-600 text-white text-xs font-semibold py-1 px-4 rounded-full shadow">
                            Popular Choice
                        </span>

                        <h3 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Enterprise</h3>

                        <ul class="space-y-4 text-gray-700 mb-8">
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Staff login upto 20</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> API access</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Kiosk Android App</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Email notification</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Analytics and reporting</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Message personalization</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Unlimited visitors</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Roles and permissions</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Multi-language support</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Webhooks</li>
                        </ul>

                        <a href="/signup"><button
                            class="w-full bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition cursor-pointer">
                            Sign Up
                        </button></a>
                        <a href="#compare_plans"><p class="text-sm text-center text-purple-600 mt-3 cursor-pointer hover:underline">or See features ↓
                        </p></a>
                    </div>

                    <!-- Custom -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all border border-gray-200">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Custom</h3>

                        <ul class="space-y-4 text-gray-700 mb-8">
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Staff login upto 50</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> API access</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Email notification</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Geo-fencing</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Analytics and reporting</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Message personalization</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Unlimited visitors</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Roles and permissions</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Multi-language support</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Webhooks</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Entertainment & Offers Zone</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Unlimited Locations</li>
                            <li class="flex items-center gap-2"><span
                                    class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span> Pay-to-Book Feature</li>
                        </ul>

                        <a href="/signup"><button
                            class="w-full bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition cursor-pointer">
                            Sign Up
                        </button></a>
                        <a href="#compare_plans"><p class="text-sm text-center text-purple-600 mt-3 cursor-pointer hover:underline">or See features ↓
                        </p></a>
                    </div>

                </div>
            </div>
        </section>


        {{-- Plan Comparison - Modern Layout --}}
        <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-purple-50" id="compare_plans">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Compare Plans</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Choose the perfect plan with all the features you
                        need</p>
                </div>

                {{-- Feature Categories --}}
                <div class="space-y-8">
                    {{-- Plan Headers (Sticky on scroll) --}}
                <div
                    class="top-20 z-10 bg-white/95 backdrop-blur-sm rounded-2xl p-6 border border-gray-200" style="margin-bottom: 0px;">
                    <div class="grid grid-cols-5 gap-4 items-center">
                        <div class="col-span-1">
                            <span class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Plans</span>
                        </div>

                        <div class="text-center">
                            <div class="inline-block bg-purple-50 rounded-xl px-4 py-3 border-2 border-purple-200">
                                <h4 class="text-lg font-bold text-purple-900">Starter</h4>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="inline-block bg-orange-50 rounded-xl px-4 py-3 border-2 border-orange-200">
                                <h4 class="text-lg font-bold text-orange-900">Business</h4>
                            </div>
                        </div>

                        <div class="text-center">
                            <div
                                class="inline-block bg-purple-100 rounded-xl px-4 py-3 border-2 border-purple-300 shadow-md">
                                <h4 class="text-lg font-bold text-purple-900">Enterprise</h4>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="inline-block bg-green-50 rounded-xl px-4 py-3 border-2 border-green-200">
                                <h4 class="text-lg font-bold text-green-900">Custom</h4>
                            </div>
                        </div>
                    </div>
                </div>
                    @php
                        $categories = [
                            'Core Features' => [
                                ['Staff login upto', '5', '10', '20', '50'],
                                ['QR Code', true, true, true, true],
                                ['TV monitor display', true, true, true, true],
                                ['Unlimited visitors', true, true, true, true],
                                ['Roles and permissions', true, true, true, true],
                                ['Multi-language support', true, true, true, true],
                                ['Chat support', true, true, true, true],
                                ['Email support', true, true, true, true],
                                ['Account manager', false, false, true, true],
                                ['Product training', false, false, true, true],
                                ['Configuration help', false, false, true, true],
                                ['Service-level agreement (SLA)', false, false, false, true],
                                ['Invite team and admins', true, true, true, true],
                                ['Resource Management', true, true, true, true],
                                ['Service Management', true, true, true, true],
                                ['Schedule bookings', true, true, true, true],
                                ['Invoicing and PO', false, false, true, true],
                                ['API access', false, false, true, true],
                                ['Webhooks', false, false, true, true],
                                ['Zapier integration', false, false, true, true],
                                ['Staff Keypad app', false, false, true, true],
                                ['SMS notifications', false, 'Extra', 'Extra', 'Extra'],
                                ['Audit Logging', false, false, false, true],
                                ['Daily Backup and Recovery', false, false, true, true],
                                ['Unlimited Locations', false, false, false, true],
                                ['Entertainment & Offers Zone', false, false, false, true],
                                ['Multi-Queue Calling', false, false, false, true],
                                ['Immediate Admin Notification for Low Rating', false, false, false, true],
                                ['Cross-Counter Queue Handling', false, false, false, true],
                                ['Pay-to-Book Feature', false, false, false, true],
                                ['Data anonymization', false, false, false, true],
                                ['Data location control', false, false, false, true],
                                ['SAML and SSO', false, false, false, true],
                                ['HIPAA and data certification', false, false, false, true],
                                ['Setup consultation', false, false, true, true],
                                ['Kiosk Android App', false, false, true, true],
                                ['Email notification', true, true, true, true],
                                ['Email and Push notification for staff', false, false, true, true],
                                ['Email, Push notification and SMS for staff', false, false, true, true],
                                ['Geo-fencing', false, false, true, true],
                                ['Push notification', false, false, true, true],
                                ['Analytics and reporting', false, true, true, true],
                                ['Customize design', false, false, true, true],
                                ['Internationalization and localization', false, false, true, true],
                                ['Message personalization', false, true, true, true],
                                ['White-label design', false, false, true, true],
                            ]
                        ];
                    @endphp

                    @foreach($categories as $category => $features)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                            
                            <div class="divide-y divide-gray-100">
                                @foreach($features as $feature)
                                    <div class="grid grid-cols-5 gap-4 p-4 hover:bg-gray-50 transition-colors">
                                        <div class="col-span-1 flex items-center">
                                            <span class="text-sm font-medium text-gray-900">{{ $feature[0] }}</span>
                                        </div>

                                        @for($i = 1; $i <= 4; $i++)
                                            <div class="flex items-center justify-center">
                                                @if($feature[$i] === true)
                                                    <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                @elseif($feature[$i] === false)
                                                    <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </div>
                                                @elseif($feature[$i] === 'Extra')
                                                    <span
                                                        class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Extra
                                                        Charges</span>
                                                @else
                                                    <span class="text-sm font-bold text-purple-600">{{ $feature[$i] }}</span>
                                                @endif
                                            </div>
                                        @endfor
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>


        {{-- FAQ Section --}}
        <section class="py-24 bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                    <p class="text-gray-500">Everything you need to know about our pricing and plans.</p>
                </div>

                <div class="space-y-4">
                    {{-- FAQ Item --}}
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">Do I need to enter credit card details? </span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            No. Scheduling your 14-day demo doesn’t require a credit card. It’s commitment-free and built to help you evaluate Qwaiting without friction.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">What hardware or OS does Qwaiting support?</span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            Qwaiting is fully platform-agnostic. It runs seamlessly on Windows, macOS, Android, iOS, Linux, and major cloud ecosystems like AWS and Azure. We support all enterprise-grade hardware.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">Is software installation required? </span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            Not at all. Qwaiting is a 100% web-based SaaS solution. No downloads or installations needed, for you or your customers. Manage queues securely via browser or integrate via our robust APIs.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">Which plan is right for my business?</span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            It depends on your use case. Growing businesses typically choose the Business plan for its advanced control and integrations. Large enterprises benefit most from the Enterprise plan with full customization, multi-location support, and SSO. Our team is happy to help assess your needs and recommend the best fit.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">Can I cancel or change plans later? </span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            Yes. You can cancel, upgrade, or downgrade your plan anytime via your admin dashboard. For personalized guidance, our support team is always here to assist.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">What payment methods are accepted?</span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            We support secure multi-channel payments via credit cards, Stripe, PayPal, and direct bank transfers. Select the method that suits your enterprise best.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">What kind of support do I receive?</span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            All plans include 24/7 enterprise support with access to a dedicated account manager, live chat, email, and priority SLA-based assistance.
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                        <button class="flex items-center justify-between w-full text-left focus:outline-none"
                            @click="open = !open">
                            <span class="text-lg font-medium text-gray-900">Are product updates included in my plan? </span>
                            <span class="ml-6 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                            Yes. Every plan comes with automatic product updates, feature enhancements, and security improvements, at no extra cost. Stay current without lifting a finger.
                        </div>
                    </div>
                </div>
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
    </div>
@endsection