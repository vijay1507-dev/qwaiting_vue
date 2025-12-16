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
                        <span class="text-sm font-semibold text-indigo-600">Healthcare Success Story</span>
                    </div>
                    <h1 class="mx-auto max-w-5xl text-4xl font-bold tracking-tight text-black sm:text-6xl mb-6">
                        Healing Hospital Boosts Staff Efficiency by 40% with <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Qwaiting's</span>
                        Virtual Queuing System
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/healinghospital.jpg" alt="Healing Hospital"
                                    class="w-full h-full object-cover"
                                    onerror="this.style.display='none'; this.parentElement.innerHTML='<svg class=\'w-32 h-32 text-indigo-200\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1\' d=\'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4\'/></svg>';">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-center space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        Established in 2016, Healing Hospital is a multispeciality centre, serving 200 to 300 patients
                        daily. With 20000+ successful surgeries and 50+ medical experts, the hospital aims to provide
                        selfless and advanced patient care services. The dedicated team of doctors and nurses provides
                        round-the-clock services. As years passed by, the hospital gained patient trust and became one of
                        the most trusted hospitals in Chandigarh.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        While the hospital was attending to hundreds of patients daily, there were some queue management
                        problems the hospital staff were facing. These challenges were not something the Healing hospital
                        staff could afford to ignore.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        Let's see how Qwaiting, an advanced queue solution, helped them solve the problem to ensure a better
                        patient experience.
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

                <!-- Top Info Row -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-14">

                    <!-- Client -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Client</p>
                            <p class="text-lg font-semibold text-gray-900">Healing Hospital, Chandigarh</p>
                        </div>
                    </div>

                    <!-- Industry -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Industry</p>
                            <p class="text-lg font-semibold text-gray-900">Healthcare</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="text-lg font-semibold text-gray-900">India</p>
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5h6a2 2 0 012 2v12a2 2 0 01-2 2H9a2 2 0 01-2-2V7a2 2 0 012-2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Type</p>
                            <p class="text-lg font-semibold text-gray-900">Hospital</p>
                        </div>
                    </div>
                </div>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Healing Hospital is a multispecialty medical center, serving patients since 2016. Nestled in the
                        City Beautiful, Chandigarh, Healing Hospital has gained a reputable market value for its exceptional
                        24x7 emergency patient consultation and advanced ongoing medical procedures.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges faced
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Lack of real-time updates</li>
                            <li>• Exceeded wait times by 40 minutes</li>
                            <li>• Overworked staff members</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions Provided
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Virtual queuing systems to manage chaos</li>
                            <li>• Smart screens to display information</li>
                            <li>• Centralized dashboard to track performance</li>
                            <li>• Analytical reports for informed decision making</li>
                        </ul>
                    </div>
                </div>

                <!-- Results -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2 mt-10">
                        Results
                    </h3>

                    <ul class="space-y-3 text-gray-700 text-lg">
                        <li>• Reduced patients' wait times by 20 minutes</li>
                        <li>• Improved staff productivity by 40%</li>
                        <li>• Less patient walkouts</li>
                        <li>• Better resource planning</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The problems Healing Hospital
                        faced</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        A dedicated hospital staff and advanced machinery aren't just everything for a smooth workflow. The hospital's staff was highly skilled and expert in their field. The problems the hospital was facing, which affected their routine tasks, were:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => '1. Missing Real-Time Insights',
                                'desc' => 'Lack of a solid booking software created confusion among staff members to keep a count of how many patients were in a waiting line or how many had been served.',
                                'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'
                            ],
                            [
                                'title' => '2. Frustrated patients',
                                'desc' => 'At the healing hospital, patients had to wait in long lines at the service counters without a clue about their expected wait times or their spot in a queue.',
                                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => '3. Overburdened Staff',
                                'desc' => 'When staff members had to manage phone calls and record the information manually, it took up most of their time. Staff members had to manage wait lines and long records simultaneously, which created confusion.',
                                'icon' => 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z'
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
                <p class="mt-10 text-lg text-gray-600 max-w-5xl mx-auto">Due to increasing complaints and negative reviews, hospital management decided to look for solutions to make things better for both patients and staff.
                </p>
            </div>
        </section>

        <!-- Solutions Implemented Section -->
        <section class="py-24 bg-gray-50 relative">
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">The Solutions Qwaiting
                        provided</h2>
                </div>

                <!-- Solution 1: Virtual Queuing System -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <span class="text-indigo-600 font-bold text-lg">Solution 01</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Virtual Queuing System</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                To reduce physical wait lines and keep the reception area organized, we installed a <a
                                    href="https://qwaiting.com/products/self-service-kiosks"
                                    class="text-indigo-600 hover:text-indigo-500 underline">self-service kiosk</a> in the
                                reception area.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">The kiosk allowed walk-in patients to: Select the
                                        department and doctors they want to consult, Choose their preferred service slot
                                        time, and Confirm and pay for their appointments all at once.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">After the payment, the kiosk automatically generates
                                        a digital token, displaying patients' expected wait times. This allowed them to wait
                                        around conveniently until their turn arrived.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="https://qwaiting.com/frontimg/healing-hospital-kiosk-registration-menu.jpg" alt="">
                        </div>
                    </div>
                </div>

                <!-- Solution 2: Smart Display Screens -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <img src="https://qwaiting.com/frontimg/healing-hospital-token-with-mobile-alert.jpg" alt="">
                        </div>
                        <div>
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
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Smart Display Screens and Token dispensers
                            </h3>
                            <p class="text-lg text-gray-700 mb-6">
                                To keep the patients engaged and reduce the wait anxiety, we installed big LED screens and
                                installed ticket dispensing kiosks in the waiting rooms and reception area.
                            </p>
                            <ul class="space-y-4 mb-6">
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">The screens can be used to display any important
                                        information or engaging visuals, staff members could also use it to display patient
                                        wait times and their spot in a queue.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">The token machine provided a queue number to
                                        patients displays their expected wait times and counter numbers.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">This removed confusion among individuals, and staff
                                        members could easily focus on their work rather than handling queue queries.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Solution 3: Centralized dashboard -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                    </svg>
                                </div>
                                <span class="text-purple-600 font-bold text-lg">Solution 03</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Centralized admin dashboard</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                Because sometimes the front staff had no idea if the doctors were free or not, we provided a
                                centralized admin and staff dashboard solution.
                            </p>
                            <ul class="space-y-4 mb-6">
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Using this dashboard, the admin staff could easily
                                        track the department-wise performance and could also distribute patients to less
                                        busy departments.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">This ensured maximum staff productivity, and now
                                        doctors and staff members can serve more patients in comparatively less time.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="{{ asset('website/asset/images/central-admin-dashboard.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <!-- Solution 4: Data analytics -->
                <div class="">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/WRQui5nc5QM?si=5cPHvURgpIru-mE6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>

                        </div>
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                                    </svg>
                                </div>
                                <span class="text-green-600 font-bold text-lg">Solution 04</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Data analytics and reports for informed
                                decision making</h3>
                            <ul class="space-y-4 mb-6">
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Qwaiting software delivers <a
                                            href="https://qwaiting.com/solutions/business-intelligence"
                                            class="text-indigo-600 hover:text-indigo-500 underline">weekly/monthly
                                            reports</a> based on past visitor data, helping hospital admins quickly identify
                                        bottlenecks and adjust services to meet demand.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">It also predicts expected appointments and walk-ins,
                                        allowing staff to plan ahead and ensure every patient gets timely care without
                                        feeling overlooked.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Results Section -->
        <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Results hospital saw after
                        implementing Qwaiting smart solutions</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    @php
                        $results = [
                            [
                                'title' => '1. Reducing wait times',
                                'desc' => 'Patient wait times dropped to under 20 minutes. Earlier, patients had to wait for 40+ minutes before consulting a doctor. But by using data analytics and reports, the admin staff members were able to make driven and informed decisions, which lowered the wait times and reduced appointment no-show rates drastically.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => '2. Improved staff productivity',
                                'desc' => 'When staff members spent less time managing long lines and recording patient information manually, it saved their time and boosted work efficiency by 40%. Executives can spend more time focusing on providing exceptional patient care with fewer disruptions and better time management.',
                                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'
                            ],
                            [
                                'title' => '3. Reduced walkouts',
                                'desc' => 'Using online booking software and on-spot kiosks, patients can schedule their appointments according to time slots that suit them the best. When people don’t have to stand for hours, they stay. The flow of patients became smoother, faster, and more predictable.',
                                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
                            ],
                            [
                                'title' => '4. Improved resource planning',
                                'desc' => 'Using data reports, managers can plan their day ahead and optimize their staffing levels to make sure every patient waits for the minimum time. The hospital could now easily identify peak hours and assign staff accordingly, reducing burnout and improving overall efficiency.',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                            ]
                        ];
                    @endphp

                    @foreach($results as $result)
                        <div
                            class="group relative bg-gradient-to-br from-indigo-50 to-white p-8 rounded-3xl shadow-lg border border-indigo-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $result['icon'] }}" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $result['title'] }}</h3>
                            <p class="text-gray-600 group-hover:text-gray-900 transition-colors">{{ $result['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8 text-center text-lg text-gray-700 max-w-4xl mx-auto font-medium">
                    Happy patients shared their experiences, leading to more referrals and trust in the community. The
                    hospital prioritized caring for patients, using technology to improve their care.
                </div>
            </div>
        </section>

        <!-- Conclusion Section -->
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div>
                    <!-- Main Content -->
                    <div class="">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Conclusion</h2>
                        <div class="space-y-4 text-gray-700 text-lg leading-relaxed">
                            <p>
                                Healing Hospital, Chandigarh, always focused on compassionate care. But as they grew,
                                managing patient flow became just as important. With Qwaiting’s virtual queue system, they
                                fixed long line issues easily.
                            </p>
                            <p>
                                Now, they deliver quality care without delays.
                            </p>
                            <p class="font-semibold text-gray-900">
                                Now it’s your turn. Don’t let queues hurt your hospital’s image. Choose Qwaiting to cut wait
                                times and keep patients happy.
                            </p>
                            <p>
                                Talk to our expert team today and sign up for a free 14-day demo. Let's build a smoother,
                                smarter healthcare experience together.
                            </p>
                        </div>
                        <div class="mt-8">
                            <a href="https://qwaiting.com/signup"
                                class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                                Book a 14-day free demo with Qwaiting
                            </a>
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