@extends('website.layout.website')

@section('title', 'Face Recognition System - Queue Management | Qwaiting')
@section('meta_description', 'Transform access and queue management with Qwaiting\'s real-time face recognition system—fast check-ins, fraud protection and seamless customer experiences')

@section('content')
    <div class="min-h-screen bg-white" x-data="{ 
                                        activeTab: window.location.hash.slice(1) || '{{ request()->is('products/face-recognition-system/use-cases') ? 'use-cases' : (request()->is('products/face-recognition-system/faq') ? 'faq' : 'overview') }}',
                                        solutionsOpen: false 
                                    }" x-init="$watch('activeTab', value => window.location.hash = value)">

        {{-- Hero Section - Exactly as live site --}}
        <section class="relative bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 overflow-hidden">
            <img src="https://qwaiting.com/frontimg/recognition-banner.jpg" alt="Face Recognition System"
                class="w-full h-auto">

        </section>

        <div class="relative z-[100] backdrop-blur-xl bg-white/70 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">

                <nav class="flex items-center justify-center gap-3 bg-white rounded-full shadow-md px-4 py-2"
                    role="tablist">

                    {{-- Overview --}}
                    <a href="/products/face-recognition-system"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all
                                                {{ request()->is('products/face-recognition-system') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        Overview
                    </a>

                    {{-- Solutions (Dropdown) --}}
                    <div class="relative group">

                        {{-- Solutions Button --}}
                        <button
                            class="px-5 py-2 text-sm font-medium rounded-full transition-all inline-flex items-center gap-2">

                            Solutions

                            <svg class="w-6 h-6 transition-transform group-hover:rotate-180">
                                <path fill="none" stroke="currentColor" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Dropdown --}}
                        <div
                            class="absolute left-0 top-full mt-3 w-60 bg-white shadow-xl rounded-2xl border p-2 hidden group-hover:block z-[100]">

                            <a href="/products/face-recognition-system/government"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 transition-all">
                                <span class="text-sm font-medium text-gray-800">Government</span>
                            </a>

                            <a href="/products/face-recognition-system/healthcare"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 transition-all">
                                <span class="text-sm font-medium text-gray-800">Healthcare</span>
                            </a>

                            <a href="/products/face-recognition-system/banking"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 transition-all">
                                <span class="text-sm font-medium text-gray-800">Banking</span>
                            </a>

                            <a href="/products/face-recognition-system/fintech"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 transition-all">
                                <span class="text-sm font-medium text-gray-800">Fintech</span>
                            </a>

                            <a href="/products/face-recognition-system/education"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-purple-50 transition-all">
                                <span class="text-sm font-medium text-gray-800">Education</span>
                            </a>

                        </div>
                    </div>

                    {{-- Use Cases --}}
                    <a href="/products/face-recognition-system/use-cases"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all
                                                {{ request()->is('products/face-recognition-system/use-cases') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        Use Cases
                    </a>

                    {{-- FAQ --}}
                    <a href="/products/face-recognition-system/faq"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all
                                                {{ request()->is('products/face-recognition-system/faq') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        FAQ
                    </a>

                </nav>
            </div>
        </div>



        {{-- Tab Content --}}
        <div class="relative">
            {{-- Overview Panel --}}
            <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" role="tabpanel">
                @include('website.products.face-recognition.overview')
            </div>

            {{-- Use Cases Panel --}}
            <div x-show="activeTab === 'use-cases'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" role="tabpanel"
                style="display: none;">
                @include('website.products.face-recognition.use-cases')
            </div>

            {{-- FAQ Panel --}}
            <div x-show="activeTab === 'faq'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" role="tabpanel"
                style="display: none;">
                @include('website.products.face-recognition.faq')
            </div>
        </div>

        {{-- CTA Section --}}
        <section class="relative py-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <div class="absolute inset-0 bg-primary"></div>
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE0YzMuMzE0IDAgNi0yLjY4NiA2LTZzLTIuNjg2LTYtNi02LTYgMi42ODYtNiA2IDIuNjg2IDYgNiA2ek0yIDMwYzMuMzE0IDAgNi0yLjY4NiA2LTZzLTIuNjg2LTYtNi02LTYgMi42ODYtNiA2IDIuNjg2IDYgNiA2eiIvPjwvZz48L2c+PC9zdmc+')] opacity-30">
            </div>

            <div class="max-w-4xl mx-auto text-center relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Faster Check-Ins. Smooth Flow. Better Service.
                </h2>
                <p class="text-xl text-white/90 mb-10 leading-relaxed max-w-2xl mx-auto">
                    Manage queues effortlessly with Qwaiting's face recognition system. Instantly identify customers, cut
                    waiting times, and deliver a smooth, fair experience for everyone.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="/signup"
                        class="group inline-flex items-center gap-3 px-10 py-5 bg-white text-purple-600 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                        <span>Take a 14-day Trial</span>
                        <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="/request-demo"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-transparent border-2 border-white text-white rounded-2xl font-bold text-lg hover:bg-white hover:text-purple-600 transition-all">
                        <span>Schedule Demo</span>
                    </a>
                </div>
            </div>
        </section>
    </div>

    {{-- Custom Animations --}}
    <style>
        @keyframes blob {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            25% {
                transform: translate(20px, -50px) scale(1.1);
            }

            50% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            75% {
                transform: translate(50px, 50px) scale(1.05);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection