@extends('website.layout.website')

@section('title', 'Airport Queue Management System - Qwaiting')
@section('description', 'Enhance passenger experience with Airport Queue Management System. Reduce wait times, boost staff productivity, and ensure a seamless travel experience for all.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                    <h1 class="mb-6 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Airport Queue Management System
                    </h1>
                    <p class="mb-8 text-base leading-relaxed text-gray-600">
                        Experience a more convenient way to wait in line – our queue management system for the airport keeps
                        passengers informed about their turn. With our solution, passengers can join the queue from
                        anywhere, improving service efficiency and helping the right amount of staff allocation.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="/signup"
                            class="px-8 py-4 text-base font-semibold text-white transition-all duration-300 bg-primary rounded-full hover:bg-primary hover:shadow-lg hover:-translate-y-1">
                            Start Your Free Trial
                        </a>
                        <a href="/solutions/queue-management-solution"
                            class="px-8 py-4 text-base font-semibold text-primary transition-all duration-300 bg-primary/10 rounded-full hover:bg-primary/20 hover:shadow-md">
                            Solutions
                        </a>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div class="relative">
                        <div
                            class="absolute top-0 right-0 w-full h-full transform translate-x-4 translate-y-4 bg-purple-100 rounded-3xl -z-10">
                        </div>
                        <img src="https://qwaiting.com/frontimg/airport_queue_management_system.png"
                            alt="Airport Queue Management System"
                            class="relative w-full rounded-3xl shadow-2xl animate-fade-in-up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Customer Journey Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    No More Queues at <span class="text-primary">Airport Terminals For Timely Departure</span>
                </h2>
                <p>Airport passengers have to queue for different services one after the other. Qwaiting allows them to
                    queue simultaneously & use these services one after the other in the most efficient way. So, they can
                    complete the whole process from check-in to boarding as soon as possible.</p>
            </div>
            <div class="space-y-24">
                {{-- Feature 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/passenger_check-in.png" alt="Passenger Check-in"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Passenger Check-in:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Travelers can self-check-in and select seats through
                                    self-service kiosks.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Allow passengers to check in using the mobile app & receive
                                    E-tickets on their smartphones.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Our system integrates with baggage drop to make depositing
                                    luggage easier and reduce wait times.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/update_the_passenger.png" alt="Update the Passenger"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Passenger:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Real-time displays in the airport keep passengers informed about
                                    queue status.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Mobile apps send timely alerts to passengers regarding any
                                    changes in their status or timings.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">The system may send personalized alerts, such as displaying the
                                    passenger's name instead of the token number.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/give_quick_service.png" alt="Give Quick Service"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Give Quick Service:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Assign staff at the airport counters based on real-time queue
                                    data to ensure quick service.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Use mobile apps to offer assistance, answer queries, and address
                                    concerns as soon as possible.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Continuously monitor and analyze queue data to identify areas
                                    for improvement.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cloud Based Section --}}
    <section class="py-20 bg-primary text-white">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold leading-tight md:text-4xl">
                #1 Cloud-Based Queue Management System
            </h2>
            <p class="max-w-3xl mx-auto mb-10 text-lg text-purple-100">
                Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue management
                software helps businesses enhance your productivity and reputation by satisfying your customers.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-primary transition-all duration-300 bg-white rounded-full hover:bg-gray-100 hover:shadow-lg hover:-translate-y-1">
                Book a Free Demo
            </a>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Features of Airport Queue Management System
                </h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                {{-- Feature 1 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-blue-200/30 leading-none">01</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/continuous-queue-monitoring.svg"
                                alt="Continuous Queue Monitoring" class="w-15 h-15">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Continuous Queue Monitoring</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Constantly monitors and updates the status of queues at various checkpoints within the airport,
                            such
                            as check-in counters, security checkpoints, and boarding gates.
                        </p>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-purple-200/30 leading-none">02</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/dashboard-displays-wait-time.svg"
                                alt="Dashboard- Displays Wait Time" class="w-15 h-15">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Dashboard- Displays Wait Time</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            The system's dashboard provides a clear overview of the passengers waiting times at different
                            checkpoints. This glance representation allows airport staff to make decisions on resource
                            allocation.
                        </p>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-green-200/30 leading-none">03</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/passenger-capacity-planning.svg"
                                alt="Passenger's Capacity Planning" class="w-15 h-15">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Passenger's Capacity Planning</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Data analytics assists in forecasting and planning for airport passenger foot traffic by
                            analyzing
                            historical data and improvising resource allocation accordingly for the future.
                        </p>
                    </div>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-pink-200/30 leading-none">04</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/data-security-and-privacy.svg" alt="Data Security and Privacy"
                                class="w-15 h-15">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Data Security and Privacy</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            The airport queue system has the ability to keep safe passengers' information in its database.
                            This
                            database uses encryption protocols to prevent unauthorized access and protect passengers'
                            privacy.
                        </p>
                    </div>
                </div>

                {{-- Feature 5 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-amber-200/30 leading-none">05</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/system-integration.svg" alt="System Integration"
                                class="w-15 h-15">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">System Integration</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            The system can be integrated with various components of the airport infrastructure, such as
                            airline
                            databases, and security systems to facilitate well-coordinated airport operation.
                        </p>
                    </div>
                </div>

                {{-- Feature 6 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-indigo-200/30 leading-none">06</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/gather-customer-feedback.svg" alt="Gather Customer Feedback"
                                class="w-15 h-15">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Gather Customer Feedback</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            The digital queue management system for airports actively collects feedback from passengers
                            regarding their queuing experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Empower Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Empower Your Airport Passengers to Wait Wherever They Want With Qwaiting Solutions
                </h2>
            </div>

            <div class="space-y-16">
                {{-- Item 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/people_counting_system.png" alt="People Counting System"
                            class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">People Counting System</h3>
                        <p class="mb-4 text-gray-600">
                            A People Counting System accurately monitors and tracks the number of passengers entering,
                            exiting, or present in a particular airport terminal area and communicates average waiting
                            times.
                        </p>
                        <p class="mb-4 text-gray-600">
                            Also, it provides real-time data on crowd density that helps to make better decisions
                            related to
                            crowd management, security, and staff allocation.
                        </p>
                        <p class="mb-4 text-gray-600">
                            In this way, it helps to improve airport operations and enhance the overall passenger travel
                            experience by minimizing wait times and ensuring a smoother flow through the terminal.
                        </p>
                        <a href="https://qwaiting.com/airport-people-counting-system"
                            class="text-purple-600 hover:text-purple-700 font-semibold">
                            Read More →
                        </a>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/virtual_queuing_system_for_security_checkpoints.png"
                            alt="Virtual Queuing System for Security Checkpoints" class="w-full rounded-3xl shadow-lg">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Virtual Queuing System for Security
                            Checkpoints
                        </h3>
                        <p class="mb-4 text-gray-600">
                            A virtual airport queuing system allows passengers to scan a QR code to reserve a service
                            slot
                            at the airport security checkpoint.
                        </p>
                        <p class="mb-4 text-gray-600">
                            This reservation can be conveniently made on-site or even before arriving at the airport.
                            Passengers simply carry their confirmation and proceed to the security check when their turn
                            arrives.
                        </p>
                        <p class="text-gray-600">
                            This eliminates the need for traditional physical queues, which reduces confusion and
                            minimizes
                            wait times at the security screening area.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Airport Areas Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Airport Areas- Where Qwaiting can be Used?
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                {{-- Area 1 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/ticketing-and-check-in.svg" alt="Ticketing and Check-in"
                            class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Ticketing and Check-in</h3>
                    <p class="text-gray-600">
                        Our airport queuing software simplifies the process of purchasing tickets and checking in passengers
                        in an efficient flow at airport ticket counters and check-in desks.
                    </p>
                </div>

                {{-- Area 2 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/security-checkpoint-and-immigration.svg"
                            alt="Security Checkpoint & Immigration" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Security Checkpoint & Immigration</h3>
                    <p class="text-gray-600">
                        Manages queues and improves the passenger flow during security checks and immigration processes to
                        enhance security measures while minimizing wait times.
                    </p>
                </div>

                {{-- Area 3 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/lounges.svg" alt="Lounges" class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Lounges</h3>
                    <p class="text-gray-600">
                        Facilitates a more organized entry process for airport lounges, providing passengers with a
                        comfortable and memorable experience before their flights.
                    </p>
                </div>

                {{-- Area 4 --}}
                <div
                    class="p-8 text-center transition-all duration-300 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl hover:-translate-y-1 group border border-transparent hover:border-gray-100">
                    <div
                        class="flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <img src="https://qwaiting.com/frontimg/airport-parking-facilities.svg" alt="Airport Parking Facilities"
                            class="w-10 h-10">
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Airport Parking Facilities</h3>
                    <p class="text-gray-600">
                        Improves the efficiency of the parking process by managing queue lineups at entrance and exit
                        points, providing a positive experience for travelers using airport parking facilities.
                    </p>
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
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore_Polytechnic_logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/skechers-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/healthway-medical.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Loreal.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Nirvana.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NTUC_FairPrice.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry_of_Education.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/msq-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MND-singapore.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/current-corporate-signature.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MOH.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cropped-BL.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/logo-dark.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/andy-cr-icon.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cortinawatch.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/subway.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/TianPo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/grab.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Inland-Revenue-Authority.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry-of-Manpower.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NLB.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/ntuc-learning-hub.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Raffles-Medical-Group.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/service-SG.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/SIM-SOC.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore-Medical.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt=""> </div>
            </div>
        </div>

    {{-- FAQ Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-3xl mx-auto">
                <h2 class="mb-12 text-3xl font-bold text-center text-gray-900 md:text-4xl">
                    Frequently Asked Questions
                </h2>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Is the Airport Queue Management System customizable to different airport sizes and layouts?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           Yes, the airport queuing system can be easily integrated regardless of the size of the airport. It can be adapted to the needs and infrastructure of different airports, ensuring flexibility and scalability.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Does the AQMS have the capability to prioritize any particular passenger groups, such as frequent flyers or VIPs?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The AQMS helps to provide expedited queues for frequent flyers, VIPs, or passengers with special needs such as disabled persons or passengers with an infant.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does the Airport Queue System handle data security concerns?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The Airport Queue System sticks to follow high data security and privacy standards. It employs encryption protocols, and multi-factor authentication to ensure the confidentiality of passenger data. Compliance with GDPR is a priority.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can airport passengers access real-time queue information through the system?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, airport queuing software helps passengers get an overview of queuing information to make informed decisions about their travel journey.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Is staff training required to operate the AQMS?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            AQMS is designed to be user-friendly, and staff training is commonly conducted to ensure effective operation and maintenance. Training programs cover system functionalities, troubleshooting procedures, and any updates or newly introduced features.
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
                Experience the future of Airport Queue with Qwaiting!
            </h2>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-white">
                Ready to transform the passenger experience? Take the leap towards a more efficient and passenger-centric
                approach with Qwaiting.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-primary transition-all duration-300 bg-white rounded-full hover:bg-purple-700 hover:shadow-lg hover:-translate-y-1">
                Try it for free
            </a>
        </div>
    </section>
@endsection