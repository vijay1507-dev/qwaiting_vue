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
                        class="text-sm font-semibold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Banking</span>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">Face
                    Recognition Solution for
                    <span class="bg-primary bg-clip-text text-transparent"> Banking & Financial Services</span><br />
                </h1>
                <p class="text-lg md:text-lg text-gray-600 mb-10 leading-relaxed max-w-3xl mx-auto">
                    Qwaiting helps banks and financial institutions deliver faster, safer, and smarter services. From
                    seamless customer onboarding to fraud prevention, our technology ensures secure transactions, accurate
                    verification, and full compliance - building trust at every step.
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
                    Transform Bank Onboarding with Smart Facial Recognition Software</h2>
            </div>

            {{-- Feature 1 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-30">
                <div class="space-y-6" data-aos="fade-right">

                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Keep Accounts Safe by Blocking Identity Fraud
                    </h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        With instant identity checks, banks can reduce data theft risks, secure customer data, and build
                        customer trust, making banking safer and worry-free. With Qwaiting’s face ID verification system,
                        only the true owner can access sensitive details, keeping fraudsters out.
                    </p>
                </div>
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/keep-accounts-safe-by-blocking-identity-fraud.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
            </div>

            {{-- Feature 2 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-30">
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/transform-banking-challenges-into-smart-solutions-with-face-recognition.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
                <div class="space-y-6 order-1 lg:order-2" data-aos="fade-left">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Transform Banking Challenges into Smart
                        Solutions</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Turn security risks and long waits into seamless banking experiences. Face identification systems
                        deliver fast, accurate verification, prevent identity fraud, and simplify onboarding. Banks save
                        time, improve work efficiency, and provide customers with a smooth, secure journey every time.
                    </p>
                </div>
            </div>

            {{-- Feature 3 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-30">
                <div class="space-y-6" data-aos="fade-right">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Secure Patients Health and Data Seamlessly</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Qwaiting's face recognition system verifies patients instantly. You don’t have to show your IDs or
                        fill in passwords. This way, hospitals can protect confidential records, prevent errors, and ensure
                        only people with authorized access enter the place. Hospitals save time, improve accuracy, and
                        deliver safer, more trusted care.
                    </p>
                </div>
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/transform-banking-challenges-into-smart-solutions-with-face-recognition.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
            </div>

            {{-- Feature 4 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-30">
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/scale-up-customer-verification.png" alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
                <div class="space-y-6 order-1 lg:order-2" data-aos="fade-left">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Scale Up Customer Verification</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Handle more customers without delays or errors. Qwaiting’s face recognition system verifies customer
                        identities in seconds. This ensures accuracy and security even at scale. Banks can onboard faster,
                        serve more people in less time, and protect every account with ease.
                    </p>
                </div>
            </div>

            {{-- Feature 5 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-6" data-aos="fade-right">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Create Seamless User Experiences with Face
                        Recognition</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Give customers the simplicity they expect. With Qwaiting’s face recognition, verification is
                        instant, secure, and consistent across online and in-branch banking. No long waits, no extra steps —
                        just safer, faster, and more trusted banking experiences.
                    </p>
                </div>
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/create-seamless-user-experiences-with-a-face-recognition-system.png"
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
                                <img src="https://qwaiting.com/frontimg/john-marshall.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “The integration of the Face Recognition System with Qwaiting has been a game-changer
                                    for our branch. It has streamlined customer identification, reducing waiting times
                                    significantly and enhancing overall customer satisfaction.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">John Marshall</h4>
                                    <p class="text-gray-500 text-sm">Branch Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/linda-brown.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “Utilizing the face recognition system in the Qwaiting system has helped streamline
                                    operations and enhanced security in our public service centers. It's easy to use and has
                                    improved our efficiency, making it a valuable asset to our department.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">Linda Brown</h4>
                                    <p class="text-gray-500 text-sm">Customer Service Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/rajesh-gupta.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “This system has not only improved operational efficiency but also enhanced the safety
                                    of our banking environment. Customers appreciate the quick and hassle-free experience.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">Martin Bernard</h4>
                                    <p class="text-gray-500 text-sm">Operations Head </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/fatima-ahmed.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “This innovative solution has reduced queue times across our branches, particularly
                                    during peak hours. It reflects our commitment to leveraging technology for better
                                    service.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">Fatima Ahmed</h4>
                                    <p class="text-gray-500 text-sm">Regional Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/nina-patel.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “Adopting the Face Recognition System with Qwaiting has modernized our customer
                                    experience. It aligns with our vision of providing cutting-edge digital services.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">David Chen</h4>
                                    <p class="text-gray-500 text-sm">Digital Banking Strategist</p>
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