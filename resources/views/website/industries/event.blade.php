@extends('website.layout.website')

@section('title', 'Event Queue Management System - Qwaiting')
@section('description', 'Streamline event bookings & scheduling with Qwaiting to spend less time on the phone and in meetings and more time making sellers.')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                    <h1 class="mb-6 text-4xl font-bold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Event Queue Management System
                    </h1>
                    <p class="mb-8 text-lg leading-relaxed text-gray-600 md:text-xl">
                        Enhance your guests' experience by eliminating the frustration of waiting in lines, be it for DIY craft booths at the county fair or the Home Team Festival. Our solution ensures that attendees spend more time enjoying the attractions and less time queuing up.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="/signup"
                            class="px-8 py-4 text-base font-semibold text-white transition-all duration-300 bg-primary rounded-full hover:bg-purple-700 hover:shadow-lg hover:-translate-y-1">
                            Start Your Free Trial
                        </a>
                        <a href="/solutions/queue-management-solution"
                            class="px-8 py-4 text-base font-semibold text-primary transition-all duration-300 bg-purple-50 rounded-full hover:bg-purple-100 hover:shadow-md">
                            Solutions
                        </a>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div class="relative">
                        <div
                            class="absolute top-0 right-0 w-full h-full transform translate-x-4 translate-y-4 bg-purple-100 rounded-3xl -z-10">
                        </div>
                        <img src="https://qwaiting.com/frontimg/event-queue-management-system.png"
                            alt="Event Queue Management System"
                            class="relative w-full rounded-3xl shadow-2xl animate-fade-in-up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Event Process Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="space-y-24">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-center md:text-4xl">
                    Event Excellence Starts with <span class="text-primary">Queue Perfection</span>
                </h2>
                <p class="max-w-5xl mx-auto text-center mb-32 text-lg leading-relaxed text-gray-600 md:text-xl">Improve how people engage with your event - increase their enjoyment and participation by providing a smooth experience from start to finish.</p>
                {{-- Guest Check-in --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/guest-check-in-with-event-queuing-system.png" alt="Guest Check-in"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Guest Check-in:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Guests book an event online by scanning the QR code or
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
                                <span class="text-gray-600 text-lg">Our software captures guest details such as name, contact
                                    information, etc.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Generate a unique identifier for the guest.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Update the Guest --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/update_the_guest.png" alt="Update the Guest"
                                class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Guest:</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Send confirmation messages to guests and relevant staff upon
                                    successful check-in.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Automatically update event status & allocate the right
                                    accommodations.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Update guests regarding their turn via Whatsapp alert
                                    message.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Quick Service --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-200 to-pink-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                            </div>
                            <img src="https://qwaiting.com/frontimg/get-quick-service-with-event-management-software.png" alt="Give Quick Service"
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
                                <span class="text-gray-600 text-lg">Deliver training sessions to staff on improving workflows, and
                                    reducing response times.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">The system generates analytical reports that help to make
                                    informed decisions.</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-600 text-lg">Our event queue system collects real-time feedback to improve
                                    guest satisfaction.</span>
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
                    <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Features of
                        Online Event
                    </span>
                    <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Management
                        Software</span>
                </h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                {{-- Feature 1 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-blue-200/30 leading-none">01</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/event-scheduling.svg" alt="Event Scheduling"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Event Scheduling</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Our event queuing management system allows users to schedule events for specific dates and
                            times. Also manages recurring event schedules.
                        </p>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-purple-200/30 leading-none">02</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/notifications_and_alerts.svg"
                                alt="Notifications and Alerts" class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Notifications and Alerts</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Our system sends real-time notifications to remind them about their turn or changes to scheduled
                            activities via SMS, email, or WhatsApp.
                        </p>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-green-200/30 leading-none">03</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/customizations_icon.svg" alt="Customization"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Customization</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Our solution can customize the colors, logos, & overall look to align with your brand. Also, it
                            lets users customize their dashboard to display the metrics most relevant to them.
                        </p>
                    </div>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-pink-200/30 leading-none">04</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/feedback-mechanism.svg" alt="Feedback Mechanism"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Feedback Mechanism</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Our online event solution helps to get more reviews from event guests to make quick
                            improvements. Plus, you get instant priority notifications in cases of low-rating feedback.
                        </p>
                    </div>
                </div>

                {{-- Feature 5 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-amber-200/30 leading-none">05</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/user-authentication.svg" alt="User Authentication"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">User Authentication</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Provides secure login and authentication mechanisms to ensure that only authorized users can
                            access and manage the event queue.
                        </p>
                    </div>
                </div>

                {{-- Feature 6 --}}
                <div
                    class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                    <div class="absolute top-4 right-4 text-8xl font-bold text-indigo-200/30 leading-none">06</div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                            <img src="https://qwaiting.com/frontimg/data-security.svg" alt="Data Security"
                                class="w-20 h-20">
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Data Security</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            The cloud-based event management software uses strong data encryption to protect the security of
                            sensitive event information.
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
                    Pros of the Event Booking and Queue Management System
                </h2>
            </div>

            <div class="space-y-16">
                {{-- Benefit 1 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/event-registration.png" alt="Event Registration"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Event Registration</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Online registration forms are available for
                                    participants.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Customizable fields to gather specific
                                    information.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Secure payment processing for event registration fees
                                    through any payment getaway.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 2 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/ticketing-system.png" alt="Ticketing System"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Ticketing System</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Our queuing software for event management automatically
                                    generates and distributes E-tickets over their smart devices.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Support for various ticket types (e.g., general
                                    admission, VIP).</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Event queue management solutions can be integrated with
                                    the barcode or QR code for easy check-in.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 3 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/analyti-services.png" alt="Analytic Services"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Analytic Services</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Data analytics for better understanding the attendee
                                    engagements.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Our event queuing system reporting feature helps with
                                    post-event analysis and improvement.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">You can use analytics to monitor the total number of
                                    customers in the queues in real time.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 4 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                        <img src="https://qwaiting.com/frontimg/integration-with-third-party-tools.png"
                            alt="Integration with Third-Party Tools" class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2 lg:order-1">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Integration with Third-Party Tools</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Our online event booking software can be compatible with
                                    CRM, marketing automation, or other business tools.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">API support for custom integrations.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">This integration can result in improving guest
                                    experiences and more efficient operations.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Benefit 5 --}}
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-8 lg:w-1/2 lg:mb-0">
                        <img src="https://qwaiting.com/frontimg/mobile-accessibility.png" alt="Mobile Accessibility"
                            class="w-full rounded-3xl">
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Mobile Accessibility</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Event organizers can manage queues from anywhere using a
                                    mobile device(IOS or Android).</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Features like push notifications for timely
                                    updates.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-purple-600 mr-2">•</span>
                                <span class="text-gray-600 text-lg">Attendees can present digital tickets on their mobile
                                    devices, reducing the need for printed materials.</span>
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

    {{-- Empower Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-text-dark mb-6">
                Empower Your Customers to Wait Wherever They Want With Qwaiting Solutions
            </h2>
            <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="Qwaiting Solutions">
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
                <a href="https://blog.qwaiting.com/why-it-is-essential-for-organizers-to-have-an-event-queue-management-tool/"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/06/Queue-Management.jpg"
                        alt="Event Queue Management Tool" class="w-full h-48 object-contain rounded-2xl mb-4">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Why It Is Essential For Organizers To Have An Event Queue Management Tool?
                    </h3>
                    <p class="text-gray-600">
                        Event organizers, whether they are hosting concerts, trade shows, or any other type of gathering,
                        often face the challenge of managing queues efficiently...
                    </p>
                </a>

                {{-- Blog Post 2 --}}
                <a href="https://blog.qwaiting.com/qr-code-queue-management-system-a-game-changer-for-businesses/"
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/07/QR-Code-Queue-Management-System-A-Game-Changer-for-Businesses.jpg"
                        alt="QR Code Queue Management" class="w-full h-48 object-contain rounded-2xl mb-4">
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
                    class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/06/Customer-Feedback-system.jpg"
                        alt="Customer Feedback System" class="w-full h-48 object-contain rounded-2xl mb-4">

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
                            <span class="text-lg font-semibold text-gray-900">Can an Event Queue System be easily accessed remotely?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes,  the event queue system is cloud-based and can be accessed virtually from any device with a strong internet connection. This allows organizers to manage events from any location 24/7.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Do pricing options vary for Event Queuing Management Systems?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, there are different pricing structures for EQMS, e.g. monthly or annual subscriptions. Also, the cost may vary depending on the additional features of the system.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How can an Event Queuing System enhance the overall event experience?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            An event queuing system can improve the event experience by ensuring proper management and execution of all activities. This results in a more enjoyable experience for organizers and attendees.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Does an EQMS have a real-time monitoring and reporting feature?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Of course! EQMS platforms provide real-time monitoring features that allow event organizers to track attendees' attendance. Also, Reporting helps organizers analyze attendee behaviors and make informed decisions to get ready for more memorable future events.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can an Event Queue System be used for small and large-scale events?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes, EQMS solutions are scalable whether it's a small seminar or a large-scale conference. The system can be customized to meet the unique requirements and challenges of the event.
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
                Experience the future of the Event Queue with Qwaiting!
            </h2>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-white">
                Ready to transform guest experiences? Take the leap towards a more efficient and guest-centric
                approach with Qwaiting.
            </p>
            <a href="/signup"
                class="inline-block px-8 py-4 text-base font-semibold text-black transition-all duration-300 bg-white rounded-full hover:bg-gray-50 hover:shadow-lg hover:-translate-y-1">
                Try it for free
            </a>
        </div>
    </section>
@endsection