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
                        How NUS Reduced Student Wait Times by 40% with <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Qwaiting's</span>
                        Smart Queuing System
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/images/nus-Singapore.jpg" alt="National University of Singapore"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-left space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        The National University of Singapore (NUS) is Asia's most reputable and advanced university.
                        Educating students across the world since 1905, NUS is known for encouraging its students to try new
                        ideas, focus on innovation, and digital advancements. Every new semester, hundreds of students
                        enroll in study programs, apply for hostel services, or submit their fees.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        Serving an average of 1,000-1,500 visitors daily, NUS faced a lot of problems managing students'
                        applications, registering new and old students, and keeping fee records.
                    </p>
                    <p class="text-xl leading-8 text-gray-700 font-semibold">
                        Let's see how Qwaiting helped NUS serve students faster and made staff work better!
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
                            <p class="text-lg font-semibold text-gray-900">National University of Singapore</p>
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
                            <p class="text-lg font-semibold text-gray-900">University</p>
                        </div>
                    </div>
                </div>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        The National University of Singapore is one of the most prestigious study institutions trusted by
                        students across the country. Educating students since 1905, it has grown a lot and is now known all
                        over the world for its great education.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Manual record-keeping software</li>
                            <li>• Difficult to manage hostel allotment applications</li>
                            <li>• Lack of real-time notifications and updates</li>
                            <li>• No online portal for students to track applications</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Smart online portals to eliminate confusion</li>
                            <li>• Virtual queuing software to reduce overcrowding</li>
                            <li>• Centralized staff dashboard to track student journey</li>
                            <li>• Notification alerts for students</li>
                        </ul>
                    </div>

                </div>

                <!-- Results -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2 mt-8">
                        Results
                    </h3>

                    <ul class="space-y-3 text-gray-700 text-lg">
                        <li>• Student wait times dropped by 40%</li>
                        <li>• Faster application processing</li>
                        <li>• Better queue and record management</li>
                        <li>• Informed decisions using real-time analytics reports</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The Challenges Faced</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-5xl mx-auto">
                        NUS, a leading university, faced difficulties in managing student records and hostel allotment
                        applications. Improper resource allocation, overburdened and confused staff, added to wasted student
                        time, which impacted the university's brand value.
                    </p>
                    <p class="mt-2 text-lg text-gray-600 max-w-5xl mx-auto">
                        The major problems faced by the university were:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => 'Outdated tracking methods',
                                'desc' => 'Staff were stuck using outdated methods to track records. Many times, the recorded information was either outdated or missing. Correcting these errors took hours of the admin staff\'s time and led to further mistakes.',
                                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'
                            ],
                            [
                                'title' => 'Student identification issues',
                                'desc' => 'Staff members were not able to distinguish between old students and new entrants. This created problems in semester fees and hostel room allotments. Staff faced issues allocating hostel rooms, and students were unable to check their eligibility.',
                                'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'
                            ],
                            [
                                'title' => 'Lack of real-time updates',
                                'desc' => 'Lack of real-time updates confused staff members. They struggled with high student traffic at service counters. Handling the student lines and solving their queries manually created confusion and chaos.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => 'Application tracking confusion',
                                'desc' => 'Students felt confused because they were not able to track their hostel allotment applications. This delayed the whole process, leaving them frustrated.',
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

                <div class="mt-12 text-center">
                    <p class="text-lg text-gray-700 max-w-5xl mx-auto">
                        The problems kept growing. If not addressed at the time, it would have impacted the university's
                        growth and its trust among the students. They required a solution that could help them automate
                        their daily tasks with speed and digital vision.
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">How Qwaiting Solved These
                        Problems</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Qwaiting, a smart queue management software, helped NUS overcome the problem of long student wait
                        lines and managing hostel records by offering advanced digital solutions. Using these solutions, it
                        not only saved staff members' time but also improved students' experience.
                    </p>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto mt-4">
                        Here's how Qwaiting's smart solutions helped the National University of Singapore automate routine
                        tasks for a smooth workflow:
                    </p>
                </div>

                <!-- Solution 1 - Smart Online Portals (Image Left, Text Right) -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <img src="https://qwaiting.com/frontimg/NUS-online-appointment-booking-portal.jpg" alt="Smart Online Portals"
                                class="w-full h-auto rounded-2xl shadow-lg">
                        </div>
                        <div class="order-1 lg:order-2">
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
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Smart online application portals</h3>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li>• Smart online portals let students submit queries, book appointments, and choose
                                    departments they want to talk to directly from their phones.</li>
                                <li>• Real-time slot availability allows them to schedule meetings with staff instantly. On
                                    the backend, staff can track requests, process applications, and track progress through
                                    a live dashboard.</li>
                                <li>• This helped improve staff efficiency, reduce errors, and prioritize tasks. Students
                                    can also pay fees, apply for hostels, and track application statuses online.</li>
                            </ul>
                            <p class="text-lg text-gray-700 font-medium mt-4">
                                This resulted in faster responses, streamlined workflows, and a more transparent,
                                user-friendly experience for both students and administrators.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Solution 2 - Virtual Queue Software (Text Left, Image Right) -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <span class="text-blue-600 font-bold text-lg">Solution 02</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Virtual queue software</h3>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li>• <a href="/solutions/virtual-queue-system"
                                        class="text-indigo-600 hover:text-indigo-500 font-medium underline decoration-2 underline-offset-2">Virtual
                                        queuing software</a> lets students easily check in to their spots in a line without
                                    being physically present in a queue.</li>
                                <li>• The software can store confidential student and staff records and can be easily
                                    integrated with existing business software.</li>
                                <li>• The software provides real-time updates to staff members so they can know how many
                                    students are waiting in lines and how many have been served.</li>
                            </ul>
                            <p class="text-lg text-gray-700 font-medium mt-4">
                                Virtual queuing solutions reduce physical queues, so that students spend less time waiting
                                in line by sending automatic message alerts, displaying their queue spots, and their
                                estimated wait times.
                            </p>
                        </div>
                        <div>
                            <img src="https://qwaiting.com/frontimg/self_check-in.png" alt="Virtual Queue Software"
                                class="w-full h-auto rounded-2xl shadow-lg">
                        </div>
                    </div>
                </div>

                <!-- Solution 3 - Self-service Kiosks (Image Left, Text Right) -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <img src="https://qwaiting.com/frontimg/NUS-digital-token-display-screen.jpg" alt="Self-service Kiosks"
                                class="w-full h-auto rounded-2xl shadow-lg">
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                    </svg>
                                </div>
                                <span class="text-purple-600 font-bold text-lg">Solution 03</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Self-service kiosks and digital signage
                                screens</h3>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li>• By installing large digital screens and self-service kiosks at reception counters,
                                    universities empowered students to manage their appointment bookings independently.</li>
                                <li>• Kiosk screens have a very user-friendly interface that can be easily accessed by
                                    anyone. Students can book, confirm, and even pay for their semester fees.</li>
                                <li>• Big LED screens can be used to display important information or upcoming college
                                    events. This is the most convenient way to reach a larger audience with less effort.
                                </li>
                            </ul>
                            <p class="text-lg text-gray-700 font-medium mt-4">
                                The screens can also be used to display student token numbers and their expected wait times.
                                This helped the university keep the campus environment calm and everyone informed.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Solution 4 - SMS Alerts (Text Left, Image Right) -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
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
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Instant SMS alerts & notifications</h3>
                            <p class="text-lg text-gray-700 mb-4">
                                The software keeps students updated at every step, from approval to payment confirmation.
                            </p>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li>• During check-in, the software collects basic student information such as name,
                                    semester, and phone number. Using this information, the software automatically sends <a
                                        href="/solutions/messaging-services"
                                        class="text-indigo-600 hover:text-indigo-500 font-medium underline decoration-2 underline-offset-2">real-time
                                        updates</a> to students' phones.</li>
                                <li>• This helped the university staff manage the student flow efficiently. Students can
                                    wait around the campus conveniently until their turn comes up. This reduced the counter
                                    rush and saved everyone's time.</li>
                            </ul>
                        </div>
                        <div>
                            <img src="https://qwaiting.com/frontimg/customer-messaging-services-SMS-and-whatsApp.png" alt="SMS Alerts"
                                class="w-full h-auto rounded-2xl shadow-lg">
                        </div>
                    </div>
                </div>

                <!-- Solution 5 - Centralized Dashboard (Image Left, Text Right) -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <img src="https://qwaiting.com/frontimg/NUS-centralized-staff-dashboard.jpg" alt="Centralized Dashboard"
                                class="w-full h-auto rounded-2xl shadow-lg">
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                    </svg>
                                </div>
                                <span class="text-orange-600 font-bold text-lg">Solution 05</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Centralized staff dashboard</h3>
                            <p class="text-lg text-gray-700 mb-4">
                                The centralized staff dashboard lets staff members oversee the performance across different
                                departments easily.
                            </p>
                            <p class="text-lg text-gray-700 mb-3">They can easily track:</p>
                            <ul class="space-y-3 text-lg text-gray-700">
                                <li>• Number of students waiting in a queue</li>
                                <li>• Total monthly visits</li>
                                <li>• Pending applications</li>
                                <li>• Payment statuses</li>
                                <li>• Check-in and check-out stats</li>
                            </ul>
                            <p class="text-lg text-gray-700 font-medium mt-4">
                                This information lets the admin staff optimize their staffing schedules accordingly. This
                                ensured no student was left waiting and guaranteed maximum staff efficiency.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="mt-12 text-center bg-primary text-white p-6 rounded-2xl">
                    <p class="text-xl max-w-5xl mx-auto font-semibold">
                        In just a few weeks, Qwaiting changed NUS's complicated, time-consuming process into a simple system
                        that just clicks, and it runs on its own.
                    </p>
                </div>
            </div>
        </section>

        <!-- Results Section -->
        <section class="py-24 sm:py-32 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The Results</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        After implementing Qwaiting, the transformation was clear, measurable, and immediate. In just a few
                        weeks, the students' wait times dropped by 35-40%. Automation of work helped staff members clearly
                        process student applications and solve student queries more efficiently.
                    </p>
                    <p class="mt-2 text-lg text-gray-600 max-w-3xl mx-auto font-semibold">
                        Here's what NUS achieved:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    @php
                        $results = [
                            [
                                'title' => 'Faster processing time',
                                'desc' => 'Staff members were able to serve more students in less time. With the help of automation, it mostly gave students the charge over their bookings, which let staff members focus on other important work.',
                                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'
                            ],
                            [
                                'title' => 'Zero wait times',
                                'desc' => 'With the help of automatic reminders and virtual queuing, students can see real-time updates on their smartphones. This eliminated long counter wait lines and reduced the need for staff to manage the lines physically.',
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => 'Smarter decision-making with real-time data',
                                'desc' => 'Real-time data analytics lets staff members oversee the university\'s performance with just a single tap. This helped them in better resource planning, and the reports can also predict expected student queries in the coming hours or days.',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                            ]
                        ];
                    @endphp

                    @foreach($results as $result)
                        <div
                            class="group relative bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
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
                    <p class="text-xl mb-4">
                        In short, NUS changed from a slow system with lots of paperwork to a modern, easy-to-use digital
                        system. This saved time, lowered costs, and made everyone involved happier.
                    </p>
                </div>
            </div>
        </section>

        <!-- Conclusion Section -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div>
                    <!-- Main Content -->
                    <div class="">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Conclusion</h2>
                        <div class="space-y-4 text-gray-700 text-lg leading-relaxed">
                            <p>
                                The National University of Singapore didn't just adopt a software solution; they upgraded
                                their entire campus experience. Qwaiting gave NUS the tools to eliminate manual errors,
                                reduce long lines, and serve students faster than ever before. The system helped the
                                students to easily check their hostel allotments and room numbers. Wait times dropped by
                                40%, operations became automated, and real-time dashboards empowered smarter decisions.
                            </p>
                            <p>
                                Qwaiting didn't just improve queues; it also improved student trust, speed, and satisfaction
                                across the board. In the fast-paced digital world, whether you're a school, college,
                                hospital, or a government office, the sooner you move to a smarter queue system, the faster
                                you'll see results.
                            </p>
                            <p class="font-semibold text-gray-900">
                                Take action before the situation worsens. Don't wait for students or customers to lose
                                trust. Act now to build and maintain your brand trust among others.
                            </p>
                            <p>
                                Let Qwaiting show you what digital transformation really looks like. Start your
                                transformation today. Book a free <a href="/contact-us"
                                    class="text-indigo-600 hover:text-indigo-500 font-medium underline decoration-2 underline-offset-2">14-day
                                    demo</a> and see the difference for yourself.
                            </p>
                        </div>
                        <div class="mt-8">
                            <a href="https://qwaiting.com/signup"
                                class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                                Start your 14-day free trial
                            </a>
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