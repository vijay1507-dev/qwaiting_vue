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
                    <h1 class="mx-auto max-w-4xl text-4xl font-bold tracking-tight text-black sm:text-6xl mb-6">
                        How Apollo Hospitals Streamlined Patient Flow Across 77 Branches With <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Qwaiting</span>
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/images/apollo-hospitals.jpg" alt="Apollo Hospital"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-center space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        Apollo Hospital is one of the leading and most trusted healthcare brands in India. With over 77+
                        branches across the country, Apollo has been serving patients since 1983. Every passing day, Apollo
                        branches handle around 200-300 patients daily. This shows the trust people have in its advanced
                        facilities, care, comfort, and timely attention.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        But even a leader like Apollo Hospital faced challenges with patient wait times, system disconnects,
                        and staff overload until they partnered with Qwaiting. Let's see how Qwaiting's smart queue
                        solutions helped the hospital provide exceptional patient services and maintain public trust.
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
                            <p class="text-lg font-semibold text-gray-900">Apollo Hospitals</p>
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
                            <p class="text-lg font-semibold text-gray-900">India</p>
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
                            <p class="text-lg font-semibold text-gray-900">Multi-location hospital management</p>
                        </div>
                    </div>
                </div>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Apollo Hospital, a leading healthcare brand, is known for providing exceptional and advanced patient care. With over 77 branches all around the country, Apollo’s main aim is to provide selfless care to their patients.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Managing patient flow</li>
                            <li>• Lack of integration between existing business softwares</li>
                            <li>• Missing real-time updates</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Centralized admin dashboard for real-time analytics</li>
                            <li>• Self-service kiosks for patients</li>
                            <li>• Real-time notifications</li>
                            <li>• Smooth integration of Medmantra and Qwaiting (queue management software)</li>
                        </ul>
                    </div>

                </div>

                <!-- Results -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Results
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Less overcrowding at hospital reception areas</li>
                            <li>• Increased staff efficiency</li>
                            <li>• Real-time analytics reports for tracking patient flow and future improvements</li>
                            <li>• Improved patient satisfaction as wait times dropped by 30 minutes.</li>
                        </ul>
                    </div>
            </div>
        </section>

        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The challenges Apollo Hospitals
                        faced
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Despite having so many advanced technologies, in 2024, Apollo faced a problem in managing patient
                        flow effectively. If not addressed at time, it would have led to some serious concerns. Major
                        problems faced by the staff members were:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => '1. Managing long wait lines',
                                'desc' => 'Patients had to wait in long lines for at least an hour before consulting a doctor. Staff members had to manage these queues physically, which lowered their work efficiency and wasted their time.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => '2. Lack of synchronization among departments',
                                'desc' => 'Without a proper central dashboard, there was no sync between the departments. It was becoming difficult for the administrators to track the patient journey and department load.',
                                'icon' => 'M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z'
                            ],
                            [
                                'title' => '3. Missing real time analytics',
                                'desc' => 'It was becoming difficult for the staff members to track how many patients were waiting, how many had been served, and how many appointments had been cancelled. Manual tracking systems for patient flow were slow and often led to mistakes.',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                            ],
                            [
                                'title' => '4. Disconnected Systems',
                                'desc' => 'Apollo Hospitals uses its own hospital information system, MedMantra, for hospital management. But the system was not integrated with an effective queue management system. So, to record information, staff members had to manage two different softwares to add the same information. This mismanagement and improper patient flow management frustrated individuals and confused staff members. Apollo needed a trusted partner, not just a quick fix, who could understand their situation and suggest advanced solutions.',
                                'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1'
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">How Qwaiting provided a
                        solution</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Qwaiting worked closely with Apollo's operations and IT teams to install a modular, scalable queue
                        solution tailored to healthcare workflows. This helped Apollo to automate their routine tasks and
                        made their multiple branch' handling easy. Here's how we helped
                    </p>
                </div>

                <!-- Solution 1 - Centralized staff dashboard -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                    </svg>
                                </div>
                                <span class="text-indigo-600 font-bold text-lg">Solution 01</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Centralized staff dashboard</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                We provided the hospital with an advanced centralized dashboard. The staff members can now
                                check real-time updates, track patient journey, and track different branches all at once.
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
                                    <span class="text-gray-700 text-lg">The reports can also predict upcoming appointments
                                        in advance based on past bookings through its AI powered technology.</span>
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
                                    <span class="text-gray-700 text-lg">This helped the admin staff to optimize their
                                        staffing levels accordingly to reduce patient wait times and ensure maximum staff
                                        efficiency.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="{{ asset('website/asset/images/central-admin-dashboard.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <!-- Solution 2 - Smooth integration with existing business softwares -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <img src="{{ asset('website/asset/images/apollo-hospital.jpg') }}" alt="">
                        </div>
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                </div>
                                <span class="text-blue-600 font-bold text-lg">Solution 02</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Smooth integration with existing business
                                softwares</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                Qwaiting team collaborated with MedMantra, Apollo's existing hospital information system
                                (HIS), already used by the hospital team to manage their records. The main aim was to
                                integrate both systems to make the process faster and more transparent.
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
                                    <span class="text-gray-700 text-lg">This integration lowered staff manual work by 40%,
                                        as before this, staff had to manage the two systems separately, which took up much
                                        of their time.</span>
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
                                    <span class="text-gray-700 text-lg">Now, patient data flows automatically, reducing
                                        errors and improving coordination. Staff could finally focus on patient care and
                                        feel less stressed.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Solution 3 - Self-service kiosks to lower staff work -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="text-purple-600 font-bold text-lg">Solution 03</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Self-service kiosks to lower staff work</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                We installed kiosk screens at the hospital's service counters. Using these touch screen
                                machines, patients can select from the option of doctors they want to consult. After
                                selecting, they can confirm their booking and even pay their consultation fees via kiosk.
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
                                    <span class="text-gray-700 text-lg">This self-service experience empowered patients to
                                        take control of their appointments. They can select their preferred doctors and
                                        suitable times without needing any staff member's help.</span>
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
                                    <span class="text-gray-700 text-lg">After booking, patients receive a token number on
                                        their phone numbers displaying their wait times and their position in queues.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="https://qwaiting.com/frontimg/apollo-hospital-consulting-departments.png" alt="">
                        </div>
                    </div>
                </div>

                <!-- Solution 4 - Real time notifications -->
                <div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <img src="https://qwaiting.com/frontimg/apollo-hospital-service-contact-form.png" alt="">
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
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Real time notifications</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                At the time of booking, the software or a kiosk ask for basic patient information, like
                                their name and phone numbers. The system then automatically sends alerts to patients
                                reminding their wait times, and spot in queues.
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
                                    <span class="text-gray-700 text-lg">This reduced staff work to call out patients' names
                                        one by one. They can now focus on serving more patients in less time.</span>
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
                                    <span class="text-gray-700 text-lg">Apart from this, Qwaiting's smart routing feature
                                        automatically redirects patients to less crowded departments, balancing workload,
                                        and helped reducing patients wait times by up to 30 minutes.</span>
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Results
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Qwaiting simplified queue workflows across all Apollo branches, helping the organization deliver a
                        premium, stress-free experience. The impact was visible within weeks of implementation. Apollo
                        Hospitals went from managing long queues to having one of the most efficient patient flow systems in
                        India. Major impacts were:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    @php
                        $results = [
                            [
                                'title' => '30% decrease in wait times',
                                'desc' => 'Happier, calmer patients who know exactly when their turn is coming. The patients\' wait times dropped by 30 minutes improving the brand image.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => '40% reduction in staff manual workload',
                                'desc' => 'Front-desk employees now focus on care, not crowd control.',
                                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
                            ],
                            [
                                'title' => 'Better management visibility',
                                'desc' => 'Hospital directors can now track patient volume and performance in real time, branch by branch.',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                            ],
                            [
                                'title' => '100% real-time visibility across 77 locations',
                                'desc' => 'Every hospital now runs on a predictable, smooth flow, no errors, no missed turns. Apollo is now setting an example for what modern healthcare operations should look like in India.',
                                'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
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
                                Apollo Hospitals didn't just fix a problem, they set a new standard for patient care. With
                                Qwaiting, they turned chaos into calm across their busy branches. Patients no longer have to
                                wait. Staff no longer juggle between disconnected systems. Workflow gets smooth, clear, and
                                quick.
                            </p>
                            <p>
                                The hospital can see real time updates and track patient journey and staff performance using
                                a centralized dashboard. From smart kiosks to real-time updates, Apollo has made visiting a
                                hospital feel less like a task and more like a guided journey. Today, they aren't just
                                treating patients, they're leading a movement in healthcare excellence.
                            </p>
                            <p>
                                This success story proves that the right technology, when used with the right mindset,
                                creates real impact. Apollo didn't adapt. They evolved, with Qwaiting.
                            </p>
                            <p class="font-semibold text-gray-900">
                                Now is your time to transform your patient journey for a smoother and better experience.
                                Transform your patient experience like Apollo.
                            </p>
                        </div>
                        <div class="mt-8 flex gap-4">
                            <a href="https://qwaiting.com/signup"
                                class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                                Start your 14-day free trial
                            </a>
                            <a href="https://qwaiting.com/contact-us"
                                class="inline-flex items-center justify-center rounded-full bg-white border-2 border-indigo-600 text-indigo-600 px-8 py-3.5 text-sm font-semibold shadow-sm hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-1">
                                Book a Demo
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