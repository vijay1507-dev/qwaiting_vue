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
                <!-- Breadcrumb -->
                <div class="mb-8">
                    <nav class="flex items-center text-sm text-gray-600">
                        <a href="/" class="hover:text-indigo-600 transition-colors">Home</a>
                        <svg class="w-4 h-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="/customer-stories" class="hover:text-indigo-600 transition-colors">Customer Stories</a>
                        <svg class="w-4 h-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-900 font-medium">Ram Clinics</span>
                    </nav>
                </div>

                <!-- Title Section -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 rounded-full mb-6">
                        <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                        <span class="text-sm font-semibold text-indigo-600">Healthcare Success Story</span>
                    </div>
                    <h1 class="mx-auto max-w-4xl text-4xl font-bold tracking-tight text-black sm:text-6xl mb-6">
                        How Ram Clinics Transformed Patient Experience with <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Qwaiting</span>
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/images/ram.jpg" alt="Ram Clinics"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-center space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        Ram Clinics, a trusted healthcare brand in Saudi Arabia, is known for providing advanced dental,
                        dermatological, and medical services. With hundreds of patients coming weekly, and 21+ clinics
                        across
                        the country, patients trust Ram clinics for their professional, quick, and reliable services.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        But with the increasing number of patients and improper staff allocation, it was becoming difficult
                        for
                        the staff to track patient flow.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        If not addressed at the time, it would have affected patients' trust. Let's see how Qwaiting, with
                        its
                        advanced queue management solutions, helped the clinic tackle these problems for maximum patient
                        experience.
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

                    <!-- Item -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Client</p>
                            <p class="text-lg font-semibold text-gray-900">Ram Clinics</p>
                        </div>
                    </div>

                    <!-- Item -->
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

                    <!-- Item -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="text-lg font-semibold text-gray-900">Saudi Arabia</p>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5h6a2 2 0 012 2v12a2 2 0 01-2 2H9a2 2 0 01-2-2V7a2 2 0 012-2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Type</p>
                            <p class="text-lg font-semibold text-gray-900">Clinic Management</p>
                        </div>
                    </div>
                </div>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Ram clinics is known for providing exceptional and advanced patient care. With clinics all over the country, they serve 200-300 patients per clinic weekly.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Lack of real-time alerts for patients</li>
                            <li>• Poor real-time communication</li>
                            <li>• Missing directional signs in the clinic</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions Qwaiting provided
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Large screens to display patient wait times</li>
                            <li>• Self-service kiosks for patient appointments</li>
                            <li>• Real-time alerts to keep the patients informed</li>
                        </ul>
                    </div>

                </div>

                <!-- Results -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Results
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Reduced patient wait times by 20 minutes</li>
                            <li>• Clear direction guides for patients</li>
                            <li>• Feedback helped the clinic improve its services</li>
                        </ul>
                    </div>
            </div>
        </section>
        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Problems faced by Ram Clinics
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Ram Clinics struggled with managing daily patient flow. The issues were basic, but for a reputed and
                        trusted brand, they couldn't be ignored.
                    </p>
                    <p class="mt-2 text-lg text-gray-600 max-w-3xl mx-auto">
                        The major issues faced by the hospital staff and patients were:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => '1. Lack of real-time updates',
                                'desc' => 'Without a proper system, staff members were facing problems tracking the patient journey. Patients had no idea of their expected wait times or their place in a queue. and had to approach the reception frequently, inquiring about their perceived wait times.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => '2. No Clear Direction Signs for Patients',
                                'desc' => 'Lack of clear directions confused patients about where to go, which doctor to see, or how to reach the laboratory.',
                                'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'
                            ],
                            [
                                'title' => '3. Poor real-time communication',
                                'desc' => 'Without real-time notification updates, patients were left guessing about their turn, leading to long queues. This created long lines at the service counters. As a result, patients waited too long. Staff had too much to do. And no one really knew what was happening. This ultimately raised confusion and frustration among all.',
                                'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'
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
            </div>
        </section>

        <!-- Qwaiting to the Rescue Section -->
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">Qwaiting to the rescue</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        To ensure maximum staff efficiency and patient care, Ram Clinics adopted digital queue management
                        services offered by Qwaiting. We suggested smart solutions to their problems, like:
                    </p>
                </div>

                <!-- Solution 1 - Digital Signage -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="text-indigo-600 font-bold text-lg">Solution 01</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Using Digital Signage Screens</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                Large LED screens were installed in waiting areas and at reception counters. The admin staff
                                can
                                easily display important information, visuals, and patient wait times on these screens
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
                                    <span class="text-gray-700 text-lg">This kept the patients in the waiting areas engaged
                                        and lowered the wait stress.</span>
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
                                    <span class="text-gray-700 text-lg"><a href="/digital-signage"
                                            class="text-indigo-600 hover:text-indigo-500 font-medium underline decoration-2 underline-offset-2">Digital
                                            screens</a> are the smartest way to reach more people conveniently. Patient wait
                                        times and token numbers displayed on large screens helped remove queue spot
                                        confusion.</span>
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
                                    <span class="text-gray-700 text-lg">The screens can also be used to show directions to
                                        different departments. Patients could see exactly where and when to go. No
                                        confusion, no questions.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="https://qwaiting.com/frontimg/ram-clinic-display-screen-interface.jpg" alt="">
                        </div>
                    </div>
                </div>

                <!-- Solution 2 - Self-service Kiosks -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <img src="https://qwaiting.com/frontimg/ram-clinic-dental-services-kiosk-menu.jpg" alt="">
                        </div>
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                    </svg>
                                </div>
                                <span class="text-blue-600 font-bold text-lg">Solution 02</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Self-service Kiosks</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                Smart touchscreen kiosks in reception areas allow patients to easily book, schedule, and pay
                                for
                                appointments. No external staff help was required.
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
                                    <span class="text-gray-700 text-lg">At the time of booking, the kiosk asks for basic
                                        patient information like name, phone number, and email address.</span>
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
                                    <span class="text-gray-700 text-lg">Using this information, the system can automatically
                                        send real-time messages to the patients about their expected wait times.</span>
                                </li>
                            </ul>
                            <p class="text-lg text-gray-700 font-medium">
                                This helped reduce wait room chaos and saved time for both clinic staff and patients.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Solution 3 - Centralized Dashboard -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                    </svg>
                                </div>
                                <span class="text-purple-600 font-bold text-lg">Solution 03</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Centralized Admin Dashboard</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                A centralized admin dashboard lets staff members track the patient journey better. Dashboard
                                can
                                provide real-time analytic reports that helped the executives improve their services,
                                prepare in
                                advance, and predict peak patient hours. The staff can easily track:
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 mb-6">
                                <div class="flex items-center gap-3 bg-gray-50 rounded-xl p-4">
                                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Patient check-in times</span>
                                </div>
                                <div class="flex items-center gap-3 bg-gray-50 rounded-xl p-4">
                                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Average wait times</span>
                                </div>
                                <div class="flex items-center gap-3 bg-gray-50 rounded-xl p-4">
                                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Total bookings</span>
                                </div>
                                <div class="flex items-center gap-3 bg-gray-50 rounded-xl p-4">
                                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Missed meetings</span>
                                </div>
                                <div class="flex items-center gap-3 bg-gray-50 rounded-xl p-4 sm:col-span-2">
                                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Department-wise patient loads</span>
                                </div>
                            </div>
                            <p class="text-lg text-gray-700 font-medium">
                                These reports were based on past patient experience. Using this information, the executive
                                can
                                efficiently improve their services for better patient satisfaction.
                            </p>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="{{ asset('website/asset/images/central-admin-dashboard.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <!-- Solution 4 - Instant Notifications -->
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <img src="https://qwaiting.com/frontimg/real-time-mobile-notification-alerts-for-patients.png"
                                alt="">
                        </div>
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </div>
                                <span class="text-green-600 font-bold text-lg">Solution 04</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Instant notifications to keep patients
                                informed</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                <a href="https://qwaiting.com/solutions/messaging-services"
                                    class="text-indigo-600 hover:text-indigo-500 font-medium underline decoration-2 underline-offset-2">Automatic
                                    alerts for patients</a> keep them updated and reduce the wait time anxiety
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
                                    <span class="text-gray-700 text-lg">Patients can now receive SMS alerts or screen
                                        notifications to update them on their token numbers and the series of patients
                                        before them.</span>
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
                                    <span class="text-gray-700 text-lg">The notifications will guide them about their
                                        service room directions and counter allotments.</span>
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
                                    <span class="text-gray-700 text-lg">Patients can wait around conveniently until their
                                        turn arrives. It made the entire visit smoother and stress-free.</span>
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The Results Ram Clinics
                        Experienced After Qwaiting</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Let's be honest: No one enjoys waiting in a clinic. Not patients, not staff, and definitely not top
                        management trying to keep everything running smoothly. Ram Clinics made the smart move of switching
                        to a digital queue and patient management system with Qwaiting. The change was not just visible, it
                        was felt. Patients and staff noticed improvements right away. The visible effects were:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    @php
                        $results = [
                            [
                                'title' => '1. Reduced wait times',
                                'desc' => 'With the installation of kiosks, booking and payment processes became quicker and more efficient. The patient wait times dropped by 20 minutes. The reception was less crowded. This helped staff members focus on important tasks rather than managing long lines and eliminating patient and staff confusion.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => '2. Real time updates and information',
                                'desc' => 'Patients received timely updates on their appointment status, including the time and location. This reduced inquiries at the reception desk, guided patients to the right rooms, and lessened their reliance on staff.',
                                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'
                            ],
                            [
                                'title' => '3. Customer feedback for improvements',
                                'desc' => 'At the end of the appointment, the software automatically sends a feedback form to the patient\'s phone. Patients could easily share their thoughts and write reviews. This helped the clinic spot weak points and improve its services according to the public\'s requirements.',
                                'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'
                            ],
                            [
                                'title' => '4. Signage screens for directions',
                                'desc' => 'Big digital screens and directional messages made it easy for patients to move around. No guesswork or confusion. Patients knew where to go in advance, which eliminated the frustration.',
                                'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'
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

                <div class="bg-indigo-600 rounded-3xl p-8 lg:p-12 text-white text-center">
                    <h3 class="text-2xl font-bold mb-6">The result?</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="font-semibold text-lg">Happier patients</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p class="font-semibold text-lg">Less crowded spaces</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <p class="font-semibold text-lg">Smarter operations</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <p class="font-semibold text-lg">Better feedback</p>
                        </div>
                    </div>
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
                                Ram Clinics' journey with Qwaiting shows how smart queue management can transform patient
                                care. Patients experienced greater satisfaction and less anxiety through improved
                                information access, while staff focused on delivering quality care.
                            </p>
                            <p>
                                This change didn't need a complete system update, just the right tools used at the right
                                time. From self-service kiosks and digital screens to real-time notifications for
                                streamlined operations, Qwaiting helped Ram Clinics for their better growth.
                            </p>
                            <p class="font-semibold text-gray-900">
                                The result? Happier patients, more efficient staff, and stronger brand trust.
                            </p>
                            <p>
                                For any healthcare facility aiming to improve service, Qwaiting proves that patient
                                experience isn't about more effort, it's about smarter processes. Ram Clinics made that
                                choice. And the impact was immediate, clear, and lasting. The future of healthcare is here.
                            </p>
                        </div>
                        <div class="mt-8">
                            <a href="https://qwaiting.com/signup"
                                class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                                Start your 14-day free trial
                            </a>
                        </div>
                    </div>

                    <!-- Sticky Sidebar - Quick Summary -->
                    <div class="lg:col-span-1">
                        <div class="sticky top-24">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-primary text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-purple-700 opacity-90"></div>
            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
                <h2 class="text-3xl font-bold mb-6">Ready to Transform Your Patient Experience?</h2>
                <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
                    Join thousands of healthcare facilities worldwide that trust Qwaiting to deliver exceptional patient
                    care.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://qwaiting.com/signup"
                        class="inline-flex items-center justify-center rounded-full bg-white text-indigo-600 px-8 py-3.5 text-sm font-semibold shadow-sm hover:bg-gray-100 transition-all duration-300 transform hover:-translate-y-1">
                        Start Your Free Trial
                    </a>
                    <a href="https://qwaiting.com/contact"
                        class="inline-flex items-center justify-center rounded-full bg-transparent border-2 border-white text-white px-8 py-3.5 text-sm font-semibold hover:bg-white hover:text-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                        Contact Sales
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection