@extends('website.layout.website')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-indigo-100 selection:text-indigo-700">

        <!-- Hero Section -->
        <section class="relative pt-32 pb-12 overflow-hidden bg-gradient-to-b from-white to-gray-50 lg:pt-40 lg:pb-16">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

                <!-- Title Section -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 rounded-full mb-6">
                        <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                        <span class="text-sm font-semibold text-indigo-600">Funeral Services Success Story</span>
                    </div>
                    <h1 class="mx-auto max-w-4xl text-4xl font-bold tracking-tight text-black sm:text-5xl mb-6">
                        Nirvana simplified the burial process of the deceased ones through <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Qwaiting</span>
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/images/nirvana-memorial.jpg" alt="Nirvana Memorial Garden"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-left space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        Nirvana was established in the year 2009 in Singapore to reintroduce the process of burying the
                        deceased by looking at the issue of land scarcity. Additionally, they also made sure to keep the
                        values of the customs intact and peaceful.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        Well, Nirvana Memorial Garden is a fraction of the Malaysian Nirvana Asian Group. The Nirvana
                        memorial garden serves the people with all the funeral services and makes the last journey soothing
                        and relaxed. It helps people to grieve and spend time with family while they take charge of every
                        duty in a well-organized way. The family pays a certain amount where the niches are stored. There
                        are different options if the family wants to keep the ashers in standard, classic or premium
                        arrangements.
                    </p>
                </div>
            </div>

            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]">
                </div>
            </div>
        </section>

        <!-- Client Overview Card -->
        <section class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6 lg:p-8 shadow-xl rounded-3xl bg-gray-50">

                <!-- Overview Heading -->
                <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">Overview</h2>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Nirvana Memorial Garden was set up in 2009 in Singapore. It is built with the aim to make funeral
                        preparations in one place. Nirvana believes in handling every religious ritual and custom to help
                        people grieve instead of running to make arrangements for the deceased one.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Handle people on the days of prayers</li>
                            <li>• Accepts the booking of niches</li>
                            <li>• Manage the payments</li>
                            <li>• Monitor every activity</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Kiosk Application</li>
                            <li>• Digital Signage</li>
                            <li>• Text Notification</li>
                            <li>• Scheduling</li>
                            <li>• Easy payment option</li>
                            <li>• Dashboard</li>
                        </ul>
                    </div>

                </div>

                <!-- Results -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2 mt-8">
                        Results
                    </h3>

                    <ul class="space-y-3 text-gray-700 text-lg">
                        <li>• Reduced crowd</li>
                        <li>• Easy management of the visitors</li>
                        <li>• A simple procedure for the family to book funeral services</li>
                        <li>• Reduced administrative work</li>
                        <li>• Queries answered effectively every individual</li>
                        <li>• Time to grieve instead of making arrangements</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Problem: Difficult to handle
                        visitors coming to pay tribute to their ancestors</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Nirvana Memorial Garden is a place where the last rites are done of the deceased one. Here the
                        family visits and makes the booking to nirvana for the rituals on their behalf. Additionally, there
                        is a huge rush on the days when prayer is offered to the departed soul. So there was a certain issue
                        faced by the management and visitors of the Nirvana such as:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => 'Handle people on prayer days',
                                'desc' => 'Managing large crowds during prayer days was extremely challenging, with families waiting for extended periods to pay tribute to their ancestors.',
                                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
                            ],
                            [
                                'title' => 'Booking of niches',
                                'desc' => 'Accepting and processing niche bookings manually was time-consuming and prone to errors, causing confusion for both staff and families.',
                                'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'
                            ],
                            [
                                'title' => 'Payment management',
                                'desc' => 'Managing payments for various services and niche options was complicated, with no streamlined system in place.',
                                'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'
                            ],
                            [
                                'title' => 'Activity monitoring',
                                'desc' => 'Tracking all activities, bookings, and visitor flow was difficult without a centralized monitoring system.',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                            ],
                            [
                                'title' => 'Long waiting times',
                                'desc' => 'People had to wait a lot for their turn to reach the counter, creating frustration during an already difficult time.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ]
                        ];
                    @endphp

                    @foreach($problems as $problem)
                        <div
                            class="group relative bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center mb-6 text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $problem['icon'] }}" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $problem['title'] }}</h3>
                            <p class="text-gray-600 group-hover:text-gray-900 transition-colors">{{ $problem['desc'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                        So, besides successfully doing the rituals, the nirvana staff struggled to manage so many people at
                        one time.
                    </p>
                </div>
            </div>
        </section>

        <!-- Qwaiting to the Rescue Section -->
        <section class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-20">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-50 rounded-full mb-4">
                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-semibold text-green-600">Solutions Implemented</span>
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">Qwaiting streamlined the
                        funeral services</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Obviously, it is very difficult for the family to stand in queues and arrange the funeral rituals
                        when they are totally shattered. On the other hand, the staff also finds it tough to prepare for the
                        burial ceremonies and handle the people with queries. Here Qwaiting proved as savior. The management
                        solution offered various effective features to make their funeral services run smoothly.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Solution 1 - Kiosk App -->
                    <div class="shadow-lg p-8 rounded-3xl">
                        <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <span class="text-indigo-600 font-bold text-lg">Solution 01</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Kiosk Application</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    To start with, a Kiosk App was offered. At the entrance, the screen was placed with this
                                    kiosk application where the visitor could make the booking or generate a ticket to get
                                    in touch with the executives for more information. They can easily fill in the details
                                    regarding the purpose of the visit and receive assistance. It also allows them to select
                                    the niches as per their affordability.
                                </p>
                    </div>

                    <!-- Solution 2 - Digital Signage -->
                    <div class="shadow-lg p-8 rounded-3xl">
                        <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <span class="text-blue-600 font-bold text-lg">Solution 02</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Digital Signage Screen</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    Moving further, a fully functional digital signage screen was implemented in the area,
                                    where the people could see when it was their turn. This helped the staff avoid the rush
                                    of people at the counters. Now people waited patiently as per their turn.
                                </p>
                    </div>

                    <!-- Solution 3 -->
                    <div class="shadow-lg p-8 rounded-3xl">
                       <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                    <span class="text-purple-600 font-bold text-lg">Solution 03</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Text Notification</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    Moreover, family members who are waiting receive text notifications when it's their turn
                                    or they are next. This helped to inform the ones who are not in their seats.
                                </p>
                    </div>

                    <!-- Solution 4 -->
                    <div class="shadow-lg p-8 rounded-3xl">
                       <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <span class="text-green-600 font-bold text-lg">Solution 04</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Scheduling</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    Another amazing feature is Scheduling. People usually come to pray to their ancestors on
                                    Friday, So there is a heavy crowd at the premises. To avoid this situation, people are
                                    given the option to book their slots for prayer. This helped reduced the rush as people
                                    will come, pray and leave within their booked time.
                                </p>
                    </div>

                    <!-- Solution 5 -->
                    <div class="shadow-lg p-8 rounded-3xl">
                        <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-orange-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <span class="text-orange-600 font-bold text-lg">Solution 05</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Easy Payment Option</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    After the visitors have opted for the services, they can make the payments stress-free
                                    through the secure payment method. They can easily pay for the ritual preparations and
                                    also get the confirmation with full transaction details.
                                </p>
                    </div>

                    <!-- Solution 6 -->
                    <div class="shadow-lg p-8 rounded-3xl">
                        <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <span class="text-pink-600 font-bold text-lg">Solution 06</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Dashboard</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    Above all, the staff has access to every activity through the dashboard. It keeps them
                                    updated on the number of bookings, niche selected and services opted.
                                </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Results Section -->
        <section class="py-24 sm:py-24 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Nirvana experienced a redefined
                        model of operation</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Nirvana definitely enjoyed a relaxed and stress-free environment in their workspace. Earlier they
                        were occupied the whole day managing the visitors and answering their queries as well as conducting
                        the funeral rituals. Whereas after the implementation of Qwaiting, Nirvana now has time to spend
                        with the visitors to grieve and also manage the administrative activities.
                    </p>
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