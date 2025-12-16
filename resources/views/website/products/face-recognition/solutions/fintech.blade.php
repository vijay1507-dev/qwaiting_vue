@extends('website.layout.website')

@section('content')
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 pt-32 pb-20">
        <div
            class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,white,rgba(255,255,255,0.6))] -z-10">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-600/10 to-pink-600/10 border border-purple-200 rounded-full mb-6 backdrop-blur-sm">
                    <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z" />
                    </svg>
                    <span
                        class="text-sm font-semibold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Fintech</span>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">Face
                    Recognition Solution for
                    <span class="bg-primary bg-clip-text text-transparent"> Fintech Services</span><br />
                </h1>
                <p class="text-lg md:text-lg text-gray-600 mb-10 leading-relaxed max-w-3xl mx-auto">
                    Secure your fintech platform with Qwaiting's fast and reliable face verification system. Instantly
                    verify identities, prevent fraudulent activities, and ensure every transaction is safe, smooth, and
                    trustworthy for your customers.
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-primary text-white rounded-2xl font-bold text-lg shadow-2xl shadow-primary/50 hover:shadow-primary/70 hover:-translate-y-1 transition-all duration-300">
                    <span>Start 14-Day Free Trial</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section>
        @php
            // All pages under solutions
            $solutionsPages = [
                'products/face-recognition-system/government',
                'products/face-recognition-system/healthcare',
                'products/face-recognition-system/banking',
                'products/face-recognition-system/fintech',
                'products/face-recognition-system/education',
            ];

            $isSolutionsActive = in_array(request()->path(), $solutionsPages);
        @endphp


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
                            class="px-5 py-2 text-sm font-medium rounded-full transition-all inline-flex items-center gap-2
                                            {{ $isSolutionsActive ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">

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
                    <a href="/products/recognition/use-cases"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all
                                    {{ request()->is('products/recognition/use-cases') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        Use Cases
                    </a>

                    {{-- FAQ --}}
                    <a href="/products/recognition/faq"
                        class="px-5 py-2 text-sm font-medium rounded-full transition-all
                                    {{ request()->is('products/recognition/faq') ? 'bg-primary text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        FAQ
                    </a>

                </nav>
            </div>
        </div>
    </section>


    {{-- Simplify Hospital Workflows --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-gray-900 to-purple-900 bg-clip-text text-transparent">
                    How Facial Recognition Strengthens Fintech Services</h2>
            </div>

            {{-- Feature 1 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-40">
                <div class="space-y-6" data-aos="fade-right">

                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Fraud Prevention & Seamless User Experience
                    </h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Qwaiting's fintech face recognition software instantly verifies customer identities, stopping
                        scammers before they act. With accurate biometric authentication, you reduce fraud risks while
                        delivering fast, secure, and seamless access to financial services. Customers enjoy frictionless
                        onboarding and transactions, building loyalty and trust.
                    </p>
                </div>
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/prevent-fraud-and-enhance-user-experience-effortlessly.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
            </div>

            {{-- Feature 2 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-40">
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/track-and-manage-user-risk-profiles-seamlessly.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
                <div class="space-y-6 order-1 lg:order-2" data-aos="fade-left">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Risk Profiling with Face Recognition for
                        Fintech Security</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Stay ahead of threats with Qwaiting's face recognition system. By verifying users in real time,
                        fintechs can track risk profiles, detect suspicious activity, and reduce fraud losses. Automated
                        biometric verification ensures your platform remains secure while trusted customers enjoy a smooth
                        experience. Build safer user profiles, strengthen compliance, and make smarter business decisions
                        with advanced identity intelligence.
                    </p>
                </div>
            </div>

            {{-- Feature 3 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-40">
                <div class="space-y-6" data-aos="fade-right">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Face Recognition for Fintech Compliance &
                        Regulatory Verification</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Qwaiting simplifies compliance by automating customer verification. With instant, accurate identity
                        checks, fintechs can meet KYC and AML requirements effortlessly. Reduce manual errors, save time,
                        and let your team focus on high-value tasks while the system secures user access. By protecting
                        sensitive data and ensuring regulatory alignment, Qwaiting’s face recognition solution builds
                        customer trust and operational confidence.
                    </p>
                </div>
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/simplify-compliance-tasks-with-advanced-face-recognition-system.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Testimonials Section --}}
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    What Our Clients Say
                </h2>
            </div>

            <!-- Swiper Container -->
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/john-williams.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “Implementing the face recognition system with Qwaiting has drastically improved our
                                    customer experience. The seamless authentication process has led to faster transactions
                                    and reduced wait times. Our clients love the added security, and we’ve seen a
                                    significant boost in customer satisfaction.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">John Williams</h4>
                                    <p class="text-gray-500 text-sm">Chief Technology Officer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/emily-davis.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “The face recognition feature, combined with Qwaiting, has greatly improved our
                                    operational efficiency. It’s easy to use, highly accurate and enhances the overall user
                                    experience. Our clients feel more secure and valued, leading to higher engagement
                                    levels.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">Emily Davis</h4>
                                    <p class="text-gray-500 text-sm">Product Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/david-martinez.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “Security and speed were our top priorities, and with Qwaiting integrated into our
                                    system, we've seen a huge leap in both. Face recognition ensures that our customers have
                                    a secure and swift authentication process, reducing wait times and boosting
                                    satisfaction.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">David Martinez</h4>
                                    <p class="text-gray-500 text-sm">Chief Information Officer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/james-wilson.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “As a security-first fintech company, the face recognition system combined with Qwaiting
                                    has been essential in securing our client interactions. The system is incredibly
                                    efficient and enhances both security and operational productivity.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">James Wilson</h4>
                                    <p class="text-gray-500 text-sm">Lead Security Analyst</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination -->
                <div class="swiper-pagination !bottom-0 mt-8"></div>
            </div>
    </section>

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
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore_Polytechnic_logo.png" alt="">
            </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/skechers-logo.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/healthway-medical.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Loreal.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Nirvana.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NTUC_FairPrice.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry_of_Education.png" alt="">
            </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/msq-logo.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MND-singapore.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/current-corporate-signature.png" alt="">
            </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MOH.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cropped-BL.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/logo-dark.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/andy-cr-icon.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cortinawatch.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/subway.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/TianPo.jpg" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/grab.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Inland-Revenue-Authority.png" alt="">
            </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry-of-Manpower.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NLB.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/ntuc-learning-hub.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Raffles-Medical-Group.png" alt="">
            </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/service-SG.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/SIM-SOC.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore-Medical.png" alt=""> </div>
            <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt=""> </div>
        </div>
    </div>
@endsection