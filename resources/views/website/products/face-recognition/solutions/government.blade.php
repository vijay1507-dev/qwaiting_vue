@extends('website.layout.website')

@section('content')
    <div class="min-h-screen">
        {{-- Breadcrumb --}}
        <section class="bg-gray-50 py-4 px-4 sm:px-6 lg:px-8 border-b">
            <div class="max-w-7xl mx-auto">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2 text-sm">
                        <li>
                            <a href="/" class="text-gray-500 hover:text-primary">Home</a>
                        </li>
                        <li><span class="text-gray-400">/</span></li>
                        <li>
                            <a href="/products/face-recognition-system" class="text-gray-500 hover:text-primary">Face
                                Recognition</a>
                        </li>
                        <li><span class="text-gray-400">/</span></li>
                        <li>
                            <span class="text-gray-900 font-semibold">Government Solutions</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </section>

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
                            class="text-sm font-semibold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Government
                            Solutions</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">Face
                        Recognition Solution
                        <span class="bg-primary bg-clip-text text-transparent"> for Government Services</span><br />
                    </h1>
                    <p class="text-lg md:text-lg text-gray-600 mb-10 leading-relaxed max-w-3xl mx-auto">
                        Make public services faster, safer, and more reliable with Qwaiting's Face Recognition System.
                        Instantly verify identities, prevent fraud, and ensure only authorized individuals gain access.
                        Reduce wait times, strengthen security, and improve citizen trust across government facilities.
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

        {{-- Content Sections --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="max-w-3xl mx-auto text-4xl lg:text-5xl font-bold text-text-dark mb-20 leading-tight">Transforming
                    Public Services with <span class="text-primary">Facial Recognition</span></h2>
            </div>
            <div class="space-y-24">
                {{-- Feature 1 --}}
                <div class="flex flex-wrap items-center -mx-4 mb-32">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/improve-border-level-protection-for-public-services.png"
                                alt="Customer Check-in"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Stronger Border-Level Protection</h3>
                        <p class="space-y-4">
                            Qwaiting's advanced face recognition system scans a visitor’s face or eyes to enable a quick and
                            seamless check-in. It then provides a digital badge to clearly differentiate authorized
                            individuals from unauthorized users. The system ensures data security while granting access only
                            to those with proper permissions. By doing so, it helps maintain safety in public places and
                            government offices while streamlining routine operations.
                        </p>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div class="flex flex-wrap items-center -mx-4 mb-32">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/prevent-fraud-and-improve-security-with-face-recognition-system.png"
                                alt="Update the Customers"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Prevent Fraud Entries and Improve the Security
                            System</h3>
                        <p>
                            Face recognition systems use a person's unique physical traits, such as facial features or iris
                            scans, to grant entry access. This eliminates the risk of fraudulent entry, ensuring that no one
                            can gain access using someone else’s badge or picture. The technology also safeguards sensitive
                            data from hackers, preventing piracy or data leaks. Allowing only authorized individuals to
                            access services creates a more secure and trustworthy environment.
                        </p>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div class="flex flex-wrap items-center -mx-4 mb-32">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/assist-in-digital-transformation.png"
                                alt="Quick Service"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Assist in Digital Transformation</h3>
                        <p>
                            Technology enables the government sector to serve citizens faster and more securely by replacing
                            outdated manual check-in methods with digital queuing systems that reduce physical crowding.
                            Automated data entry minimizes errors in record-keeping and ensures smoother audits, making
                            administrative processes more reliable. At the same time, it keeps sensitive data secure while
                            enhancing the overall citizen experience by delivering services more efficiently.
                        </p>
                    </div>
                </div>

                {{-- Feature 4 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/turn-your-mission-into-action.png"
                                alt="Update the Customers"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Turn Your Mission into Action</h3>
                        <p>
                            Automating the check-in process allows government offices to serve more people in less time
                            while ensuring accurate data entries and saving valuable time. This efficiency enables staff to
                            focus on delivering exceptional customer service rather than managing manual records. With the
                            support of a facial recognition system, government employees can address citizen queries more
                            quickly and securely, creating a smoother and more trustworthy experience for everyone.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- How It Works Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">

                {{-- Heading --}}
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-bold text-text-dark mb-4">
                        How Facial Recognition Works in Public Sectors
                    </h2>
                    <p class="text-lg text-text-medium">
                        <!-- Add your paragraph here if needed -->
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                    {{-- LEFT: Steps --}}
                    <div class="lg:col-span-6 relative">

                        <!-- Vertical line -->
                        <div class="absolute top-0 bottom-0 left-4 w-0.5 bg-gray-200"></div>

                        <ul class="space-y-12">

                            <!-- Step 1 -->
                            <li class="relative pl-12 mb-7">
                                <!-- Step icon -->
                                <div
                                    class="absolute left-0 top-1 w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">
                                    1
                                </div>
                                <h3 class="text-xl font-semibold text-text-dark mb-2">Face Scanning</h3>
                                <p class="text-text-medium">
                                    The system scans and detects faces in real-time at entry points to validate identities.
                                </p>
                            </li>

                            <!-- Step 2 -->
                            <li class="relative pl-12 mb-7">
                                <div
                                    class="absolute left-0 top-1 w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">
                                    2
                                </div>
                                <h3 class="text-xl font-semibold text-text-dark mb-2">Identity Verification</h3>
                                <p class="text-text-medium">
                                    Matches scanned faces against secure databases to confirm identity and grant access.
                                </p>
                            </li>

                            <!-- Step 3 -->
                            <li class="relative pl-12 mb-7">
                                <div
                                    class="absolute left-0 top-1 w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">
                                    3
                                </div>
                                <h3 class="text-xl font-semibold text-text-dark mb-2">Streamline Services</h3>
                                <p class="text-text-medium">
                                    Verified identities enable faster check-ins, automatic record updates, and smoother
                                    service flow.
                                </p>
                            </li>

                            <!-- Step 4 -->
                            <li class="relative pl-12 mb-7">
                                <div
                                    class="absolute left-0 top-1 w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">
                                    4
                                </div>
                                <h3 class="text-xl font-semibold text-text-dark mb-2">Deliver Efficient Public Services</h3>
                                <p class="text-text-medium">
                                    Validated identities get quicker, secure access to public services without delays.
                                </p>
                            </li>

                        </ul>
                    </div>

                    {{-- RIGHT: Image --}}
                    <div class="lg:col-span-6">
                        <img src="https://qwaiting.com/frontimg/how-it-worked-in-public-sectors.png"
                            alt="How it works diagram" class="w-full max-w-lg mx-auto object-contain"
                            onerror="this.src='https://qwaiting.com/asset/images/face-recognition-system.png'">
                    </div>

                </div>

                {{-- CTA Button --}}
                <div class="mt-16 text-center">
                    <a href="/products/face-recognition-system"
                        class="inline-flex items-center gap-3 px-8 py-3 border border-primary text-primary rounded-xl font-semibold hover:bg-primary/5 transition">
                        Book a Free Demo
                    </a>
                </div>
            </div>
        </section>

        {{-- Testimonials Section --}}
        <section class="py-24">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                        What Our Clients Say
                    </h2>
                    <p class="text-gray-600 mt-2">Trusted by government sectors and enterprise clients</p>
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
                                        “The integration of face recognition with the Qwaiting system has significantly
                                        reduced long lines and wait times for our citizens. The system is efficient, and the
                                        accuracy is exceptional, making government services more accessible to everyone.”
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
                                        operations and enhanced security in our public service centers. It's easy to use and
                                        has improved our efficiency, making it a valuable asset to our department.”
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
                                        “The system has improved our citizens’ experience by ensuring they don’t have to
                                        wait unnecessarily. With face recognition technology, we can prioritize cases based
                                        on the urgency, improving overall service delivery.”
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
                                        Qwaiting system with face recognition. The system has improved our service delivery
                                        by reducing both congestion and customer frustration.”
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
                                        “The face recognition Qwaiting system has transformed the way we handle long queues.
                                        Not only has it reduced wait times, but it also makes the process more secure,
                                        ensuring that citizens are promptly served while maintaining a high level of
                                        accuracy.”
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

        <!-- Trusted By Section -->
        <div class="trusted-section bg-gray-50">
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


        {{-- CTA Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="max-w-4xl mx-auto text-center relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Ready to Transform Government Services?
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Start your 14-day free trial and experience how face recognition can enhance security and efficiency in
                    your government facility.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="/signup"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:-translate-y-1 transition-all">
                        <span>Start Free Trial</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6">
                            </path>
                        </svg>
                    </a>
                    <a href="/products/face-recognition-system"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-transparent border-2 border-white text-white rounded-xl font-bold text-lg hover:bg-white hover:text-primary transition-all">
                        <span>Back to Overview</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection