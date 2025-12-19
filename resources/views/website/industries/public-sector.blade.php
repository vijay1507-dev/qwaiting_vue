@extends('website.layout.website')

@section('title', 'Public Sector Queue Management System - Qwaiting')
@section('description', 'Transform citizen experience through our public sector queue management system - a smarter way to manage queues, prioritize tasks, & deliver efficient services.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                    <h1 class="mb-6 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Public Sector Queue Management System
                    </h1>
                    <p class="mb-8 text-lg leading-relaxed text-gray-600 md:text-xl">
                        Our public sector queue management software ensures accurate scheduling, reduces average wait times, and provides high citizen satisfaction. Uplift your expectations with our solution!
                    </p>
                    <div class="flex flex-wrap gap-4">
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
                <div class="w-full px-4 lg:w-1/2">
                    <div class="relative">
                        <div
                            class="absolute top-0 right-0 w-full h-full transform translate-x-4 translate-y-4 bg-purple-100 rounded-3xl -z-10">
                        </div>
                        <img src="https://qwaiting.com/frontimg/public-sector-queue-management-system.png"
                            alt="Public Sector Queue Management System"
                            class="relative w-full rounded-3xl shadow-2xl animate-fade-in-up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Digitalizing Citizen Experience Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="space-y-24">
                <h2 class="mb-6 text-3xl font-bold leading-tight md:text-4xl text-center mb-10">
                    Digitalizing the <span class="text-primary">Citizen Experience in the Public Sector</span>
                </h2>

                <p class="text-center text-lg">The public sector queuing system directs citizens to the right service agent, lets them know their position in the queue, and handles their requests in a faster and more effective manner.</p>

                {{-- Citizen Check-in --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/digitalizing-the-citizen-experience-in-the-public-sector.png" alt="Citizen Check-in"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Citizen Check-in:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Register citizen presence using a mobile app or on-site
                                    kiosks.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Fill in the required details.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Assigns a unique identifier number to each citizen upon
                                    check-in.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Prioritize appointments based on urgency or service type.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Update the Citizens --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/update-the-citizens.png" alt="Update the Citizens"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Citizens:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Digital communication channels such as SMS or email keep
                                    citizens informed about their queue status.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Provide real-time updates on service delays and changes in
                                    appointment schedules.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Color-coded indicators convey different queue statuses (e.g.,
                                    waiting, in-service, completed).</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Staff must communicate effectively to provide helpful
                                    information to citizens.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Give Quick Service --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/give-quick-service.png" alt="Give Quick Service"
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
                                <span class="text-gray-600 text-lg">Categorize services into priority tiers for faster service
                                    delivery.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Continuously analyze and adjust staffing levels based on
                                    real-time data.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Introduce mobile service units to address certain service needs
                                    on the spot.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Collect feedback and reviews in real-time for continuous
                                    improvements.</span>
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
            <p class="max-w-3xl mx-auto mb-10 text-lg text-white">
                Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue management
                software helps businesses enhance your productivity and reputation by satisfying your customers.
            </p>
            <a href="https://qwaiting.com/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-purple-900 transition-all duration-300 bg-white rounded-full hover:bg-gray-100 hover:shadow-lg hover:-translate-y-1">
                Book a Free Demo
            </a>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Key Features of
                    </span>
                    <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Public Sector
                        Queuing Systems</span>
                </h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                {{-- Feature 1 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-blue-200/30 leading-none">01</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/multi-channel-access.svg" alt="Multi-Channel Access"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Multi-Channel Access</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Public sector queuing systems provide various ways for citizens to access government services,
                            such as self-service kiosks, online portals, and mobile apps.
                        </p>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-purple-200/30 leading-none">02</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/integration-with-information-systems.svg"
                                alt="Integration with Information Systems" class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Integration with Information Systems</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Our system will work well with the authorities' existing information systems to ensure accurate
                            and up-to-date data and increase the efficiency of public services.
                        </p>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-green-200/30 leading-none">03</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/appointment-scheduling.svg" alt="Appointment Booking"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Appointment Booking</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Advanced queuing systems allow citizens to book or schedule appointments for specific services,
                            reducing wait times and improving overall citizen satisfaction.
                        </p>
                    </div>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-pink-200/30 leading-none">04</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/staff-management.svg" alt="Staff Management"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Staff Management</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            The public sector queue system helps manage human resources efficiently and ensures the right
                            staff are available to deal with the workload
                        </p>
                    </div>
                </div>

                {{-- Feature 5 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-amber-200/30 leading-none">05</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/notifications-and-alerts.svg"
                                alt="Notifications and Alerts" class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Notifications and Alerts</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Automated notifications via SMS, email, or mobile apps keep citizens informed about their queue
                            status and estimated waiting times. Improves citizen's satisfaction and loyalty.
                        </p>
                    </div>
                </div>

                {{-- Feature 6 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-indigo-200/30 leading-none">06</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/analytical-reporting.svg" alt="Analytical Reporting"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Analytical Reporting</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Administrators can analyze live reports and analytics of queuing data over time, identify
                            trends, and make informed decisions to improve overall efficiency.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Benefits of Qwaiting In the Public Sector
                </h2>
            </div>

            <div class="space-y-16">
                {{-- Benefit 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/great-citizen-experience.png" alt="Great Citizen Engagement"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Great Citizen Engagement</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Provides an easy-to-use interface for a smooth and
                                    positive experience.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Tailor services to individual needs and preferences to
                                    create a more personalized citizen journey.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Services are easily accessible to all citizens,
                                    regardless of demographics.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/increase-staff-productivity.png"
                            alt="Increase Staff Productivity" class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Increase Staff Productivity</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Automate routine administrative tasks, which
                                    significantly improves staff efficiency.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Utilize data analytics to optimize resource allocation
                                    and improve the effectiveness of public services.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Encourage collaboration among government
                                    agencies.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 3 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/keep-your-citizens-well-informed.png"
                            alt="Keep your Citizens Well-informed" class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Keep your Citizens Well-informed</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Providing transparent information about government
                                    activities, policies, and services.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Keep citizens informed about relevant changes in the
                                    queue and timely update the accurate information.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Utilize various communication channels, such as social
                                    media, and mobile apps, to reach a diverse clientele base.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 4 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/every-feedback-counts.png" alt="Every Feedback Counts"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Every Feedback Counts</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Allow users to rate their experience.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Manage citizen feedback in a centralized database for
                                    all public sector branches.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Get automated notifications with unhappy citizens
                                    instantly.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 5 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/get-overall-insights.png" alt="Get Overall Insights"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Get Overall Insights</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Real-time dashboard for looking at average wait time and
                                    service time.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Helps to store and analyze data for improved
                                    decision-making.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Maximizes appointment success with intelligent demand
                                    forecasting.</span>
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
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                    Public Areas-
                    <span class="text-primary">Where Qwaiting is Used</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Use Case 1 --}}
                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                            <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                            <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                        <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/government-offices.svg" class="w-15 h-15">
                        </div>
                    </div>
                    <div class="pt-5 pb-8 px-8 text-center">
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Government Offices</h3>
                        <p class="text-text-medium leading-relaxed text-sm">
                            Government offices provide various services to the public, such as issuing permits, handling
                            tax-related matters, and providing information on government programs. Our system helps manage
                            the flow of people and serves them in an orderly manner.
                        </p>
                    </div>
                </div>

                {{-- Use Case 2 --}}
                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                            <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                            <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                        <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/DMV-offices.svg" class="w-15 h-15">
                        </div>
                    </div>
                    <div class="pt-5 pb-8 px-8 text-center">
                        <h3 class="text-2xl font-bold text-text-dark mb-4">DMV Offices</h3>
                        <p class="text-text-medium leading-relaxed text-sm">
                            DMV (Department of Motor Vehicles) offices are responsible for tasks such as issuing driver's
                            licenses and other motor vehicle-related services. Our public sector software assigns citizens
                            to specific service windows, reducing frustration and wait times.
                        </p>
                    </div>
                </div>

                {{-- Use Case 3 --}}
                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                            <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                            <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                        <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/immigration.svg" class="w-15 h-15">
                        </div>
                    </div>
                    <div class="pt-5 pb-8 px-8 text-center">
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Immigration</h3>
                        <p class="text-text-medium leading-relaxed text-sm">
                            Our solution helps prioritize various services such as visa processing, citizenship, and other
                            immigration-related services, ensuring a fair and efficient process for applicants.
                        </p>
                    </div>
                </div>

                {{-- Use Case 4 --}}
                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                            <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                            <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                        <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/educational-institutions.svg" class="w-15 h-15">
                        </div>
                    </div>
                    <div class="pt-5 pb-8 px-8 text-center">
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Educational Institutions</h3>
                        <p class="text-text-medium leading-relaxed text-sm">
                            Queuing systems in educational institutions assist in managing student services, enrollment
                            processes, and administrative tasks. This helps avoid overcrowding at institutions.
                        </p>
                    </div>
                </div>

                {{-- Use Case 5 --}}
                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                            <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                            <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                        <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/courthouses.svg" class="w-15 h-15">
                        </div>
                    </div>
                    <div class="pt-5 pb-8 px-8 text-center">
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Courthouses</h3>
                        <p class="text-text-medium leading-relaxed text-sm">
                            Our public sector queue management system ensures that court proceedings are conducted
                            efficiently and clients have timely access to necessary services.
                        </p>
                    </div>
                </div>

                {{-- Use Case 6 --}}
                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                            <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                            <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                            <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                        <div class="w-25 h-25 bg-white rounded-full shadow-xl flex items-center justify-center">
                            <img src="https://qwaiting.com/frontimg/banks.svg" class="w-15 h-15">
                        </div>
                    </div>
                    <div class="pt-5 pb-8 px-8 text-center">
                        <h3 class="text-2xl font-bold text-text-dark mb-4">Banks</h3>
                        <p class="text-text-medium leading-relaxed text-sm">
                            Banks provide various financial services to the public, such as cash deposit and withdrawal
                            transactions, loan applications, and account inquiries. Our system helps to manage customer
                            queues and ensure a smooth process for various banking transactions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Empower Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-text-dark mb-6">
                Empower Your Customers to Wait Wherever They Want With Qwaiting Solutions
            </h2>
            <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="">
        </div>
    </section>

    <!-- Trusted By Section -->
    <div class="trusted-section">
        <h2>Trusted by 65K+ Businesses Worldwide</h2>
        <p>Join the industry leaders who trust Q-Waiting for their queue management</p>

        <div class="trusted-logos">
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

    {{-- Blog Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Latest Posts From the Blog
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Blog Post 1 --}}
                <a href="https://blog.qwaiting.com/empowering-citizen-experience-with-public-sector-queue-management"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/05/emprowerimg-citizen-experience-with-publice-sector-queue-management.jpg"
                        alt="" class="w-full h-48 object-contain rounded-2xl mb-4">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Empowering Citizen Experience with Public Sector Queue Management
                    </h3>
                    <p class="text-gray-600">
                        Queues can be a major source of frustration for citizens, causing dissatisfaction and negative
                        perceptions of the public sector…
                    </p>
                </a>

                {{-- Blog Post 2 --}}
                <a href="https://blog.qwaiting.com/how-governments-can-transform-the-citizen-experience/"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/05/How-Governments-Can-Transform-the-Citizen-Experience.jpg"
                        alt="" class="w-full h-48 object-contain rounded-2xl mb-4">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        How Governments Can Transform the Citizen Experience?
                    </h3>
                    <p class="text-gray-600">
                        Digital transformation has already been adopted by many banks and financial institutions around the
                        world…
                    </p>
                </a>

                {{-- Blog Post 3 --}}
                <a href="https://blog.qwaiting.com/online-queuing-system-beneficial-for-government-agencies/"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/07/Is-An-Online-Queuing-System-Beneficial-For-Government-Agencies.jpg"
                        alt="" class="w-full h-48 object-contain rounded-2xl mb-4">

                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Is An Online Queuing System Beneficial For Government Agencies?
                    </h3>
                    <p class="text-gray-600">
                        Digital transformations are reshaping various aspects of our lives. However, it's no surprise that
                        the government sector is also...
                    </p>
                </a>
            </div>
        </div>
    </section>

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
                            <span class="text-lg font-semibold text-gray-900">Can citizens access the Queue Management system remotely?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, our queue management system offers online appointment booking and virtual queuing options, allowing citizens to secure their spot in line from anywhere.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does a Public Sector Queue Management System benefit government employees?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The system reduces employee stress by managing customer flow and minimizing complaints. It also offers real-time data and analytics to help employees make sound decisions.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How does Public Sector Software handle multiple services or departments?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            The system can be customized to handle different services or departments, each with its own queues and wait times.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can a Public Sector Queue System integrate with other solutions?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, our queue management system can integrate with current government systems, such as online appointment booking or customer feedback systems, to create a smooth process.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Is a Public Sector Queue Management System cost-effective for the government?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, it can save money by reducing wait times and improving efficiency, which ultimately results in higher productivity and long-term cost savings. It also improves customer satisfaction, which positively affects the government’s reputation.
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
                Experience the future of the Public Sector with Qwaiting!
            </h2>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-white">
                Ready to transform customers' experiences? Take the leap towards a more efficient and customer-centric
                approach with Qwaiting.
            </p>
            <a href="/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-black transition-all duration-300 bg-white rounded-full hover:bg-gray-50 hover:shadow-lg hover:-translate-y-1">
                Try it for free
            </a>
        </div>
    </section>
@endsection