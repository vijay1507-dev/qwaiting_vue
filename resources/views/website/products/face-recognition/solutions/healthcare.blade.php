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
                        class="text-sm font-semibold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Healthcare
                        Solutions</span>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">Face
                    Recognition
                    <span class="bg-primary bg-clip-text text-transparent"> Solution for Healthcare</span><br />
                </h1>
                <p class="text-lg md:text-lg text-gray-600 mb-10 leading-relaxed max-w-3xl mx-auto">
                    Simplify access to healthcare services with quick and secure identity checks. Qwaiting's face
                    recognition system reduces waiting times, minimizes paperwork, eliminates errors, and protects sensitive
                    patient records.
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
    </section>


    {{-- Simplify Hospital Workflows --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-gray-900 to-purple-900 bg-clip-text text-transparent">
                    Simplify Hospital Workflows with Face Recognition System</h2>
            </div>

            {{-- Feature 1 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
                <div class="space-y-6" data-aos="fade-right">
                    <div class="inline-block px-4 py-2 bg-purple-100 rounded-full">
                        <span class="text-purple-700 font-semibold text-sm">Efficiency</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Reduce Admin Time and Boost Efficiency</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        With Qwaiting's face recognition system, patients can check in to the queues quickly. They don't
                        have to wait in long lines or fill out manual forms. Patients get real-time updates on their phones,
                        and staff members can focus on other important tasks than answering repeated queries. Secure,
                        accurate data handling ensures faster service, higher efficiency, and a smoother patient experience.
                    </p>
                </div>
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/reduce-admin-time-and-boost-efficiency-with-face-recognition-system.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
            </div>

            {{-- Feature 2 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/adopt-a-next-gen-identity-verification-system.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
                <div class="space-y-6 order-1 lg:order-2" data-aos="fade-left">
                    <div class="inline-block px-4 py-2 bg-blue-100 rounded-full">
                        <span class="text-blue-700 font-semibold text-sm">Verification</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Next-Gen Patient Verification</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Face verification system make healthcare safer, faster, and smarter. The system allows immediate
                        entry access without cards or paperwork. This reduces errors and protects sensitive records.
                        Check-ins are quicker, lines are shorter, and staff can focus on care instead of admin. With
                        next-gen identity verification, only authorized users access critical information. This ensures
                        security, efficiency, and promotes brand trust.
                    </p>
                </div>
            </div>

            {{-- Feature 3 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
                <div class="space-y-6" data-aos="fade-right">
                    <div class="inline-block px-4 py-2 bg-green-100 rounded-full">
                        <span class="text-green-700 font-semibold text-sm">Security</span>
                    </div>
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
                        <img src="https://qwaiting.com/frontimg/secure-patients-health-and-data-seamlessly.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
            </div>

            {{-- Feature 4 --}}
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="w-full px-4 mb-12 lg:mb-0 lg:order-2">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                        </div>
                        <img src="https://qwaiting.com/frontimg/combat-insurance-fraud-with-face-recognition-system.png"
                            alt="Customer Check-in"
                            class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                    </div>
                </div>
                <div class="space-y-6 order-1 lg:order-2" data-aos="fade-left">
                    <div class="inline-block px-4 py-2 bg-red-100 rounded-full">
                        <span class="text-red-700 font-semibold text-sm">Fraud Prevention</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900">Combat Insurance Fraud</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Qwaiting’s face recognition system ensures only the right person uses an insurance policy. This way,
                        hospitals have control over preventing false claims and identity misuse. With instant, accurate
                        verification, hospitals and insurers save time, reduce errors, and protect patient records. The
                        result: fair, secure, and efficient healthcare for everyone.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Title --}}
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                    How Facial Recognition Works in Healthcare
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                {{-- Left: Image --}}
                <div>
                    <img src="https://qwaiting.com/frontimg/how-does-it-work-in-hospitals.png" alt="How It Works"
                        class="rounded-3xl shadow-xl w-full object-cover">
                </div>

                {{-- Right: Steps --}}
                <div class="space-y-10">

                    {{-- Step 1 --}}
                    <div class="flex gap-6 mb-7">
                        <div class="w-14 h-14 rounded-full bg-purple-100 flex items-center justify-center">
                            <span class="text-purple-600 text-2xl font-semibold">1</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Seamless Patient Arrival</h3>
                            <p class="text-gray-600 mt-1">
                                The process starts as the patient enters the facility, initiating a smooth and organized
                                flow.
                            </p>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="flex gap-6 mb-7">
                        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">
                            <span class="text-blue-600 text-2xl font-semibold">2</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Instant Facial Verification</h3>
                            <p class="text-gray-600 mt-1">
                                The system scans and verifies the patient’s identity within seconds, eliminating the need
                                for physical documents.
                            </p>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="flex gap-6 mb-7">
                        <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">
                            <span class="text-green-600 text-2xl font-semibold">3</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Quick Check-In</h3>
                            <p class="text-gray-600 mt-1">
                                Automated check-in ensures patients don’t waste time at registration desks, leading to a
                                more comfortable experience.
                            </p>
                        </div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="flex gap-6 mb-7">
                        <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center">
                            <span class="text-yellow-600 text-2xl font-semibold">4</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Reduced Wait Time</h3>
                            <p class="text-gray-600 mt-1">
                                By removing lengthy verification steps, patients move through queues faster and access
                                services with minimal delays.
                            </p>
                        </div>
                    </div>

                    {{-- Step 5 --}}
                    <div class="flex gap-6 mb-7">
                        <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">
                            <span class="text-red-600 text-2xl font-semibold">5</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Paperless Documentation Process</h3>
                            <p class="text-gray-600 mt-1">
                                Facial recognition minimizes paperwork by integrating directly with hospital CRMs, reducing
                                manual errors and eliminating repetitive tasks.
                            </p>
                        </div>
                    </div>

                    {{-- Step 6 --}}
                    <div class="flex gap-6 mb-7">
                        <div class="w-14 h-14 rounded-full bg-indigo-100 flex items-center justify-center">
                            <span class="text-indigo-600 text-2xl font-semibold">6</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Efficient Data Management</h3>
                            <p class="text-gray-600 mt-1">
                                All Patient data is securely stored and accessed for smoother healthcare operations.
                            </p>
                        </div>
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
                    What Our Clients Say About It?
                </h2>
            </div>

            <!-- Swiper Container -->
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/john-miller.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “The integration of face recognition with the Qwaiting system has significantly reduced
                                    long lines and wait times for our citizens. The system is efficient, and the accuracy is
                                    exceptional, making government services more accessible to everyone.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">John Miller</h4>
                                    <p class="text-gray-500 text-sm">Director of Public Services</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/michael-carter.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “Utilizing the face recognition system in the Qwaiting system has helped streamline
                                    operations and enhanced security in our public service centers. It's easy to use and has
                                    improved our efficiency, making it a valuable asset to our department.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">Michael Carter</h4>
                                    <p class="text-gray-500 text-sm">Head of Public Safety</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/david-williams.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “The system has improved our citizens’ experience by ensuring they don’t have to wait
                                    unnecessarily. With face recognition technology, we can prioritize cases based on the
                                    urgency, improving overall service delivery.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">David Williams</h4>
                                    <p class="text-gray-500 text-sm">Senior Administrator</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-3xl shadow-xl p-10 max-w-3xl mx-auto">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://qwaiting.com/frontimg/james-white.png"
                                    class="w-20 h-20 rounded-full object-cover mb-5 shadow-md">

                                <p class="text-lg text-gray-700 leading-relaxed">
                                    “Our citizens' feedback has been overwhelmingly positive since we implemented the
                                    Qwaiting system with face recognition. The system has improved our service delivery by
                                    reducing both congestion and customer frustration.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">James White</h4>
                                    <p class="text-gray-500 text-sm">Director of Client Services</p>
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
                                    “The face recognition Qwaiting system has transformed the way we handle long queues. Not
                                    only has it reduced wait times, but it also makes the process more secure, ensuring that
                                    citizens are promptly served while maintaining a high level of accuracy.”
                                </p>

                                <div class="mt-6">
                                    <h4 class="font-semibold text-gray-900">Nina Patel</h4>
                                    <p class="text-gray-500 text-sm">Director of Administrative Services</p>
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