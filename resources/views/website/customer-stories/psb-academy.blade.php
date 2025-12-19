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
                        <span class="text-sm font-semibold text-indigo-600">Education Success Story</span>
                    </div>
                    <h1 class="mx-auto max-w-4xl text-4xl font-bold tracking-tight text-black sm:text-6xl mb-6">
                        PSB Academy provides a seamless interaction between staff and students through <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Qwaiting</span>
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/images/psb-lab.jpg" alt="PSB Academy"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-left space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        PSB is the leading institute in Singapore with a record of delivering industry-ready graduates for
                        50 years.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        PSB Academy is a private education provider. It holds an excellent reputation for providing quality
                        education to students. Additionally, it witnesses a huge rush of admissions, where students come
                        across different nations. It offers various certificate courses, diplomas, short professional
                        courses, and undergraduate and postgraduate degrees.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        PSB Academy offers the courses under various schools:
                    </p>
                    <ul class="text-lg text-gray-700 text-left max-w-2xl space-y-2">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-indigo-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Foundation study</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-indigo-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Business management</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-indigo-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Engineering and technology</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-indigo-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Life and physical sciences</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-indigo-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Postgraduate studies</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-indigo-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Digital Academy</span>
                        </li>
                    </ul>
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
                            <p class="text-lg font-semibold text-gray-900">PSB Academy</p>
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
                            <p class="text-lg font-semibold text-gray-900">Education</p>
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
                            <p class="text-lg font-semibold text-gray-900">Singapore</p>
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
                            <p class="text-lg font-semibold text-gray-900">Private Education Provider</p>
                        </div>
                    </div>
                </div>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        The PSB Academy offers high-quality education in different streams to students across the globe.
                        They have been serving in the education field for 50 years and operate 6 schools that deliver teaching
                        in several high-demand fields. They experience a consistent flow of students every day and even more
                        during admission periods.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Managing the flow of students</li>
                            <li>• Handling queries & admin duties</li>
                            <li>• Tracking staff performance</li>
                            <li>• Guiding students to the right counters</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Queue management system</li>
                            <li>• Token generation</li>
                            <li>• Self-operating kiosk</li>
                            <li>• Digital signage</li>
                            <li>• Integrated server setup</li>
                            <li>• Automated notification and reminders</li>
                        </ul>
                    </div>

                </div>

                <!-- Results -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Results
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Smooth student flow management</li>
                            <li>• Accurate waiting-time updates</li>
                            <li>• Automated notifications to students</li>
                            <li>• Real-time staff performance insights</li>
                        </ul>
                    </div>
            </div>
        </section>

        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Major challenges faced by PSB
                        Academy
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Well, PSB Academy is a well-known education institute with lots of visitors in a day. Along with
                        worldwide popularity, there come long queues for admissions and inquiries. The PSB Academy faced
                        difficulty in handling the students and guiding them at the same time.
                    </p>
                    <p class="mt-2 text-lg text-gray-600 max-w-3xl mx-auto">
                        During the peak days of enrollment and examination, there is usually the majority of staff
                        struggling to manage the tasks such as:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => 'The people waiting',
                                'desc' => 'When the students arrive at the location, they have to wait a long time to communicate with the front desk executive to get the guidance for admission.',
                                'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'
                            ],
                            [
                                'title' => 'Updating wait times',
                                'desc' => 'The staff was having difficulty in greeting and treating their students well as they were busy with administrative tasks.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => 'Where to go',
                                'desc' => 'It required multitasking or extra help to handle the flow and queries.',
                                'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'
                            ],
                            [
                                'title' => 'Whom to meet',
                                'desc' => 'Many times the students had to wait unnecessarily in the queue even when they were not in the correct assigned queue.',
                                'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">PSB Academy chooses
                        Qwaiting as a savior</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        The PSB Academy was helped effectively with the implementation of Qwaiting. This queuing solution
                        helped the institute to a great extent and reduced their serving time by automating the complete
                        process from arrival to leaving.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Solution 1 - Self-service Kiosk -->
                    <div class="mb-32 shadow-lg p-10 rounded-3xl bg-gray-50">
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
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Self-service Kiosk Application</h3>
                                <p class="text-md text-gray-700 mb-6">
                                    Firstly, the self-service kiosk application was introduced that allowed the students to fill
                                    in the credentials, subject or stream interested in, and purpose of visit to produce the
                                    accurate token number.
                                </p>
                        </div>
                    </div>

                    <!-- Solution 2 - Digital Signage -->
                    <div class="mb-32 shadow-lg p-10 rounded-3xl bg-gray-50">
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
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Digital Signage Screens</h3>
                                <p class="text-md text-gray-700 mb-4">
                                    Secondly, Digital signage screens were planted in the reception area to equip the students
                                    with important information and update them about their turn. The token number is displayed
                                    on the screens which gives them the idea of when it is their turn and how much more they
                                    have to wait.
                                </p>
                                <p class="text-md text-gray-700 font-medium">
                                    Moreover, the students also receive the text notification when the token number is generated
                                    and get updates when it is their turn so that they don't miss it if they are not in their
                                    seats.
                                </p>
                            </div>
                    </div>

                    <!-- Solution 3 - Integrated Servers -->
                    <div class="mb-32 shadow-lg p-10 rounded-3xl bg-gray-50">
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
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Integrated Servers & Real-time Reports</h3>
                                <p class="text-md text-gray-700 mb-6">
                                    Lastly, the staff is also facilitated with the integrated servers which display the number
                                    of students waiting, and serving times that are categorized based on their queries. This
                                    made the administrative duties easy and could be handled smoothly.
                                </p>
                                <p class="text-md text-gray-700 font-medium">
                                    Most importantly, it helped the management to track the performance of their staff and the
                                    dealing with students through the real-time reports to improve their services.
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Results Section -->
        <section class="py-24 sm:py-16 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What difference did Qwaiting
                        make?</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-5xl mx-auto">
                        The PSB Academy has experienced a great difference in its management. Now when everything is digital
                        and self-operating services are provided, students feel comfortable and enjoy the experience of
                        visiting the institute more. Above all, it helped the staff to keep track of their visitors with
                        accurate reports and insights.
                    </p>
                    <p class="mt-2 text-lg text-gray-600 max-w-5xl mx-auto">
                        Well, the queue management solutions take care of every activity from the moment when the student
                        enters the campus till they leave.
                    </p>
                </div>

                <div class="bg-indigo-600 rounded-3xl p-8 lg:p-12 text-white text-center">
                    <h3 class="text-2xl font-bold mb-6">Overall Takeaway</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="font-semibold text-lg">Lesser waiting time</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <p class="font-semibold text-lg">More staff productivity</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            <p class="font-semibold text-lg">Better academic management</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="font-semibold text-lg">Happier students</p>
                        </div>
                    </div>
                </div>
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

    </div>
@endsection