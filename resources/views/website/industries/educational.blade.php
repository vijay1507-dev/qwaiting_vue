@extends('website.layout.website')

@section('title', 'Education Queue Management System - Qwaiting')
@section('description', 'Enhance college & school admission processes with education queue management system. It improves students\', staff\'s experience and contributes to a positive, friendly study atmosphere.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="container px-4 mx-auto">
            <div class="items-center justify-center mb-12">
                <div class="w-full px-4 mb-12 max-w-4xl lg:mb-10 mx-auto text-center">
                    <h1 class="mb-6 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Education Queue Management System
                    </h1>
                    <p class="mb-8 text-lg leading-relaxed text-gray-600 md:text-xl">
                        Qwaiting allows university staff to efficiently manage multiple tasks by automating the queue management process. Staff can customize their hours and let Qwaiting take care of the rest.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center
                    ">
                        <a href="/signup"
                            class="px-8 py-4 text-base font-semibold text-white transition-all duration-300 bg-purple-600 rounded-full hover:bg-purple-700 hover:shadow-lg hover:-translate-y-1">
                            Start Your Free Trial
                        </a>
                        <a href="/solutions/queue-management-solution"
                            class="px-8 py-4 text-base font-semibold text-purple-600 transition-all duration-300 bg-purple-50 rounded-full hover:bg-purple-100 hover:shadow-md">
                            Solutions
                        </a>
                    </div>
                </div>
                <div class="w-full px-4 max-w-4xl mx-auto">
                    <div class="relative">
                        <div
                            class="absolute top-0 right-0 w-full h-full transform translate-x-4 translate-y-4 bg-purple-100 rounded-3xl -z-10">
                        </div>
                        <img src="https://qwaiting.com/frontimg/education-queue-management.png"
                            alt="Education Queue Management System"
                            class="relative w-full rounded-3xl shadow-2xl animate-fade-in-up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Hello Learning, Goodbye Waiting Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Hello Learning, Goodbye Waiting!
                </h2>
                <p class="mb-8 text-lg leading-relaxed text-gray-600 md:text-xl">
                    Qwaiting allows university staff to efficiently manage multiple tasks by automating the queue management process. Staff can customize their hours and let Qwaiting take care of the rest.
                </p>
            </div>

            <div class="space-y-24">
                {{-- Automate Check-in --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/automate-checkin.png" alt="Automate Check-in"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Automate Check-in:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Leverage technology solutions for smooth check-ins such as kiosks, QR code systems, or mobile apps.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">The student enters the requested information to complete the check-in process.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Utilize a system's centralized database to record student attendance automatically.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Automatically generate a unique student ticket ID.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Update the Student --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/update-the-student.png" alt="Update the Student"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Student:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Real-time queue monitoring from anywhere.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Automated notifications via SMS, email, or WhatsApp for important updates.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">User-friendly interface for staff to easily access student information for canceling the academic meeting.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Integration with WhatsApp: Allow students to get alerts directly on WhatsApp.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Quick Assistance --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/quick-assistance.png" alt="Quick Assistance"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Quick Assistance:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Efficient organization of queues to ensure that students systematically receive educational services.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">The system frees up staff for doing more complex issues.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">The system decreases the wait time in queues, allowing students to concentrate on their studies.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600">Smart feedback mechanism.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cloud Based Section --}}
    <section class="py-20 bg-purple-900 text-white">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold leading-tight md:text-4xl">
                #1 Cloud-Based Queue Management System
            </h2>
            <p class="max-w-3xl mx-auto mb-10 text-lg text-purple-100">
                Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue management
                software helps businesses enhance your productivity and reputation by satisfying your customers.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-purple-900 transition-all duration-300 bg-white rounded-full hover:bg-gray-100 hover:shadow-lg hover:-translate-y-1">
                Book a Free Demo
            </a>
        </div>
    </section>

    {{-- Main Functionalities Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Main Functionalities of Educational Queue Management Software
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Feature 1 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/appointment-scheduling.svg" alt="Appointment Scheduling" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Appointment Scheduling</h3>
                    <p class="text-gray-600">
                        Our educational queue management software helps schedule appointments for specific services, such as meetings with faculty members. It helps reduce long waiting times & sends real-time alerts to students when their turn arrives.
                    </p>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/seamless-integration.svg" alt="Seamless Integration" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Seamless Integration</h3>
                    <p class="text-gray-600">
                        Integration simplifies administrative workflows, minimizes manual data entry, and reduces the risk of errors, resulting in greater productivity and accuracy in managing educational services.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/mobile-accessibility.svg" alt="Mobile Accessibility" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Mobile Accessibility</h3>
                    <p class="text-gray-600">
                        Educational staff can manage queues, monitor appointment schedules, and receive real-time updates on their mobile devices, which enhances convenience and accessibility.
                    </p>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/feedback-solution.svg" alt="Feedback Solution" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Feedback Solution</h3>
                    <p class="text-gray-600">
                        Administrators can use feedback data to make informed decisions, address specific issues raised by students, and implement changes to improve their overall experience.
                    </p>
                </div>

                {{-- Feature 5 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/multilingual.svg" alt="Multilingual Operational Capability" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Multilingual Operational Capability</h3>
                    <p class="text-gray-600">
                        Our software's multilingual support ensures that students from diverse linguistic backgrounds can easily use the system to access educational services and schedule appointments around the clock.
                    </p>
                </div>

                {{-- Feature 6 --}}
                <div
                    class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-sm rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-purple-50 rounded-2xl group-hover:bg-purple-100 transition-colors">
                        <img src="https://qwaiting.com/frontimg/centralized-dashboard.svg" alt="Centralized Dashboard" class="w-8 h-8">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Centralized Dashboard</h3>
                    <p class="text-gray-600">
                        The dashboard offers customizable reporting tools, allowing educational institutions to analyze performance metrics and make data-driven improvements to enhance overall efficiency.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Advantages Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Advantages of Employing an Education Queue System
                </h2>
            </div>

            <div class="space-y-16">
                {{-- Advantage 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/increase-student-satisfaction-rate.png" alt="Increase Student Satisfaction Rate"
                            class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Increase Student Satisfaction Rate</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">The system's customization allows for personalized notifications, enhancing the overall experience and satisfaction of students.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our software reduces wait times and provides students with quicker access to educational services.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our education queuing system allows for real-time feedback and facilitates continuous improvement based on user input.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Advantage 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/accessible.png"
                            alt="24/7 Accessible" class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">24/7 Accessible</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our education queue system offers online or mobile platforms, enabling students to join queues and access services remotely.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Students can join queues from anywhere, and the system promotes 24/7 accessibility.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our system extends the reach of educational services to a global audience, which is valuable for international students in distance learning programs.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Advantage 3 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/reduced-administrative-burden.png" alt="Reduced Administrative Burden"
                            class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Reduced Administrative Burden</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Various administrative tasks are automated, reducing the manual workload on staff.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our system efficiently manages staff & classrooms, based on demand, creating a balanced educational environment.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Education queue systems generate valuable data on student interactions for informed decision-making.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Advantage 4 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/transparency.png"
                            alt="Transparency" class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Transparency</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">The transparency provided by our systems allows students to view their position in the queue in real-time.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our system keeps students informed about their requests or inquiries, providing regular updates.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Administrators can access comprehensive data on queue performance and student interactions.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Advantage 5 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/improve-student-communication.png" alt="Improve Student Communication"
                            class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Improve Student Communication</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our education queue systems support various communication channels, such as text messages, emails, or app notifications.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">The system incorporates instant messaging features, allowing students to communicate directly with support staff.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600">Our system can be used to broadcast important announcements and alerts on class schedules, campus events, or critical information to students.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Reviews Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Reviews
                </h2>
            </div>

            <div class="flex flex-wrap justify-center gap-8 mb-16">
                {{-- Review 1 --}}
                <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-gray-900">4.5/5</span>
                    </div>
                    <img src="https://qwaiting.com/images/capterra.png" alt="Capterra" class="h-20 w-30">
                </div>

                {{-- Review 2 --}}
                <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-gray-900">4.5/5</span>
                    </div>
                    <img src="https://qwaiting.com/images/Software.png" alt="GetApp" class="h-25 w-25">
                </div>

                {{-- Review 3 --}}
                <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-gray-900">4.2/5</span>
                    </div>
                    <img src="https://qwaiting.com/images/software_advice.png" alt="Software Advice" class="h-20 w-40">
                </div>

                {{-- Review 4 --}}
                <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-gray-900">4.3/5</span>
                    </div>
                    <img src="https://qwaiting.com/images/finance.png" alt="G2" class="h-20 w-40">
                </div>

                {{-- Review 5 --}}
                <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-gray-900">4.8/5</span>
                    </div>
                    <img src="https://assets.goodfirms.co/badges/normal-badge/salon-software.svg" alt="SourceForge" class="h-20 w-30">
                </div>
            </div>
        </div>
    </section>

    {{-- Use Cases Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Where University and School Queue Management System Be Used?
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Case 1 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/community-colleges.svg" alt="Community Colleges" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Community Colleges</h3>
                    <p class="text-gray-600">
                        In community colleges, queuing systems aid in handling queues for students requesting academic records, transcripts, or other administrative documents for a smoother educational experience.
                    </p>
                </div>

                {{-- Case 2 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/universities.svg" alt="Universities" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Universities</h3>
                    <p class="text-gray-600">
                        The education queue management software simplifies administrative processes for university students, including managing queues during application submissions and paying academic fees.
                    </p>
                </div>

                {{-- Case 3 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/online-public-school.svg" alt="Online Public School" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Online Public School</h3>
                    <p class="text-gray-600">
                        In online education, the education queuing system supports virtual classrooms, assignment submissions, and teacher-student interactions, contributing to the efficiency of the online learning experience.
                    </p>
                </div>

                {{-- Case 4 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/vocational-schools.svg" alt="Vocational Schools" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Vocational Schools</h3>
                    <p class="text-gray-600">
                        Our system optimizes the scheduling of practical training sessions and helps coordinate resources, ensuring a seamless flow of activities on vocational school premises.
                    </p>
                </div>

                {{-- Case 5 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/high-schools.svg" alt="High Schools" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">High Schools</h3>
                    <p class="text-gray-600">
                        Educational queuing software in high schools improves the registration process and extracurricular activity management, promoting a more organized educational environment.
                    </p>
                </div>

                {{-- Case 6 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-white rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/elementary-schools.svg" alt="Elementary Schools" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Elementary Schools</h3>
                    <p class="text-gray-600">
                        The student queuing system manages tasks such as parent-teacher meetings and student assessments in elementary schools, promoting effective communication and coordination.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Flexible Waiting Options Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Empower Your Customers to Wait Wherever They Want With Qwaiting Solutions
                </h2>
                <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="Qwaiting Solutions" class="mx-auto">
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

    {{-- Blog Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Latest Posts From the Blog
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Blog Post 1 --}}
                <a href="https://blog.qwaiting.com/online-appointment-booking-software-take-your-business-to-the-next-level/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/08/Online-Appointment-Booking-Software_-Take-your-Business-to-the-Next-Level-2.jpg"
                        alt="Online Appointment Booking Software" class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Online Appointment Booking Software: Take your Business to the Next Level
                    </h3>
                    <p class="text-gray-600">
                        Businesses that rely on in-person appointment scheduling are lagging behind and facing various
                        problems...
                    </p>
                </a>

                {{-- Blog Post 2 --}}
                <a href="https://blog.qwaiting.com/qr-code-queue-management-system-a-game-changer-for-businesses/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/07/QR-Code-Queue-Management-System-A-Game-Changer-for-Businesses.jpg" alt="QR Code Queue Management System"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        QR Code Queue Management System: A Game-Changer for Businesses
                    </h3>
                    <p class="text-gray-600">
                        Imagine a world where waiting in line is a thing of the past & customers can effortlessly avail of
                        desired services without hassle...
                    </p>
                </a>

                {{-- Blog Post 3 --}}
                <a href="https://blog.qwaiting.com/customer-feedback-system-the-key-to-an-exceptional-customer-experience/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/06/Customer-Feedback-system.jpg" alt="Customer Feedback System"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Customer Feedback System: The Key To An Exceptional Customer Experience
                    </h3>
                    <p class="text-gray-600">
                        Businesses often face the challenge of delivering outstanding customer experiences while efficiently
                        managing queues...
                    </p>
                </a>
            </div>
        </div>
    </section>

{{-- FAQ Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-3xl mx-auto">
                <h2 class="mb-12 text-3xl font-bold text-center text-gray-900 md:text-4xl">
                    Frequently Asked Questions
                </h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Is the Education Queue Management System user-friendly for both students and staff?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, our education queue system is specially designed to solve the problems of individuals who are not that tech-savvy. This solution has an easy-to-use interface, making it easy for both students and staff faculty.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does a Queuing System improve the overall student experience?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The education queue management software helps to minimize average wait times and provides a more organized and efficient process, enhancing the overall student experience and satisfaction level.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can an Education Queuing System be customized according to the needs of an educational institution?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, our solution offers customizable features such as branding, language support, and scheduling options to meet the unique needs of different educational institutions.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can a University and School Queue Management System handle other tasks besides queuing?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                             Indeed, our system has additional features such as scheduling appointments, managing student data, and collecting feedback from students.
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Who can benefit from an Education Queue Management System?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Students, professors, administrative staff, and educational institutions as a whole can take advantage of the use of this solution.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-primary">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold leading-tight text-white md:text-4xl">
                Experience the future of the Education Sector with Qwaiting!
            </h2>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-white">
                Ready to transform the student experience? Take the leap towards a more efficient and student-centric
                approach with Qwaiting.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-primary transition-all duration-300 bg-white rounded-full hover:bg-gray-50 hover:shadow-lg hover:-translate-y-1">
                Try it for free
            </a>
        </div>
    </section>
@endsection
