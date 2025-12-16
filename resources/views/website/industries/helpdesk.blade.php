@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-gray-50">

        {{-- Modern Hero Section --}}
        <section class="relative pt-24 pb-32 px-4 sm:px-6 lg:px-8 overflow-hidden">
            {{-- Background Elements --}}
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-purple-200/30 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    {{-- Left Content --}}
                    <div class="space-y-8">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full border border-primary/20">
                            <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                            <span class="text-primary font-semibold text-sm">Helpdesk Queue Solution</span>
                        </div>

                        <h1 class="text-6xl lg:text-7xl font-bold leading-tight">
                            Helpdesk <span class="text-primary">Queue Management System</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                            Completely transform your support experience with our helpdesk queue management system. Manage customer tickets 24/7 and boost their satisfaction level in a great sense.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="/signup"
                                class="group relative inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold overflow-hidden transition-all hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1">
                                <span class="relative z-10">Start Your Free Trial</span>
                                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </a>
                            <a href="/solutions/queue-management-solution"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all hover:-translate-y-1">
                                View Solutions
                            </a>
                        </div>
                    </div>

                    {{-- Right Image --}}
                    <div class="relative">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://qwaiting.com/frontimg/helpdesk-queue-management-system.png" alt="Helpdesk Queue System"
                                class="w-full">
                        </div>
                        <div
                            class="absolute -top-6 -right-6 w-32 h-32 bg-gradient-to-br from-primary to-purple-600 rounded-3xl opacity-20 blur-2xl">
                        </div>
                        <div
                            class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-blue-400 to-primary rounded-3xl opacity-20 blur-2xl">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Experience Section --}}
        <section class="py-20 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="space-y-24">
                    <h2 class="text-3xl lg:text-4xl font-bold leading-tight text-center mb-8">Qwaiting Helpdesk Support-Where Queries Meet Quick Resolutions</h2>
                    <p class="text-lg text-gray-600 leading-relaxed max-w-5xl text-center mx-auto mb-30">Our system understands the importance of resolving your queries as soon as possible. It manages all incoming requests and gives assurance that each question is handled with the highest level of attention.</p>
                    {{-- Customer Sign-in --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0 lg:order-2">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-200 to-blue-200 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/customer-sign-in.png" alt="Customer Sign-in"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2 lg:order-1">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Customer Sign-in</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Customers can contact us through various channels,
                                        such as kiosks, phone calls, emails, or online portals.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">The system collects relevant details, including
                                        customer ID details, issue descriptions, and any supporting documents.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">A ticket or token number is generated through the
                                        system.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">The system categorizes the issue based on its
                                        urgency and impact to determine the order of resolution.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Update the Customer --}}
                    <div class="flex flex-wrap items-center -mx-4">
                        <div class="w-full px-4 mb-12 lg:w-1/2 lg:mb-0">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-blue-200 to-purple-200 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6 opacity-50">
                                </div>
                                <img src="https://qwaiting.com/frontimg/update_the_customer.png" alt="Update the Customer"
                                    class="relative w-full rounded-3xl shadow-lg transition-transform group-hover:-translate-y-2">
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <h3 class="mb-6 text-2xl font-bold text-gray-900">Update the Customer:</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Customers receive confirmation that their issue has been
                                        logged and a unique reference number for future tracking.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">The helpdesk provides timely information on the status of
                                        the issue.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Provide customers with an estimated timeframe for issue
                                        resolution.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Update customers regarding their turn via SMS or WhatsApp
                                        alerts.</span>
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
                                <img src="https://qwaiting.com/frontimg/give_quick-services.png" alt="Give Quick Service"
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
                                    <span class="text-gray-600 text-lg">Assign the issue to the appropriate support team or
                                        specialist based on the nature of the problem.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">The system generates reports to make informed decisions that
                                        lead to providing quick customer support.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Our helpdesk queue system can easily integrate with other
                                        digital software.</span>
                                </li>
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center w-6 h-6 mt-1 mr-3 bg-purple-100 rounded-full text-purple-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 text-lg">Implement a feedback mechanism to gather customer input for
                                        continuous improvement.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Cloud-Based Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    #1 Cloud-Based Queue Management System
                </h2>
                <p class="text-xl text-white/90 leading-relaxed mb-8">
                    Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today! Our queue
                    management software helps businesses enhance your productivity and reputation by satisfying your
                    customers.
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Book a Free Demo</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

        {{-- Advanced Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Advanced
                            Features of</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Helpdesk
                            Queue System</span>
                    </h2>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Feature 1 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/automation-and-workflow-management.svg"
                                    alt="Automation and Workflow Management" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Automation and Workflow Management</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Our software automatically routes issues to the most appropriate agent with predefined
                                rules, skills, or workload. It also sets up automated replies for common queries or status
                                updates to keep customers informed.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/24-7-Monitoring.svg" alt="24/7 Monitoring"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">24/7 Monitoring</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Our helpdesk queuing system provides real-time monitoring abilities to track ticket statuses
                                and system performance around the clock.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-green-50 to-green-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/mobile-convenience.svg" alt="Mobile Convenience"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Mobile Convenience</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Provide mobile applications for support agents and customers, allowing access to manage
                                tickets on the go.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-pink-50 to-pink-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/integration-with-third-party-tools.svg"
                                    alt="Integration with Third-Party Tools" class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Integration with Third-Party Tools</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Our system has the ability to integrate with various third-party tools such as CRM systems,
                                project management tools, or communication platforms to enhance workflow efficiency.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/customer-reviews.svg" alt="Customer Reviews"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Customer Reviews</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Customers can easily submit their feedback on their personal support experience. The system
                                collects all the reviews in one place to make sound improvements.
                            </p>
                        </div>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="relative p-8 transition-all duration-300 bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-2xl hover:shadow-lg group overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center justify-center w-25 h-25 mb-6 bg-white rounded-xl shadow-sm">
                                <img src="https://qwaiting.com/frontimg/knowledge-base-integration.svg" alt="Knowledge Base Integration"
                                    class="w-20 h-20">
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Knowledge Base Integration</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Integrate a detailed knowledge base directly into the helpdesk system to provide a
                                centralized source of information to customers and staff.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Benefits Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Benefits of
                            the Queuing Solutions</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">for
                            Helpdesks Support</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    {{-- Benefit 1 --}}
                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">01</div>
                        <img src="https://qwaiting.com/frontimg/easy-and-user-friendly-setup.png" alt="Easy and User-Friendly Setup">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Easy and User-Friendly Setup</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Helpdesk queuing solutions offer a user-friendly setup, suitable for non-technical
                                    users.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Our system has smooth integration abilities with your existing system for easily
                                    running ongoing tasks.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 2 --}}
                    <div
                        class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">02</div>
                        <img src="https://qwaiting.com/frontimg/scalability-and-growth.png" alt="Scalability and Growth">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Scalability and Growth</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Our scalable software aids in adjusting staffing to match demand, ensuring a
                                    responsive helpdesk.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Versatile helpdesk queue software supports multiple communication channels, like
                                    email, chat, & phone calls to reach a wide client base.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 3 --}}
                    <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-green-100">03</div>
                        <img src="https://qwaiting.com/frontimg/customizable-features.png" alt="Customizable Features">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Customizable Features</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>The ability to create priority queues based on urgency to ensure that critical issues
                                    are addressed quickly.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Tailorable ticketing features enable the creation of personalized fields to align with
                                    the helpdesk's unique needs.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 4 --}}
                    <div
                        class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-orange-100">04</div>
                        <img src="https://qwaiting.com/frontimg/rich-reporting-capabilities.png" alt="Rich Reporting Capabilities">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Rich Reporting Capabilities</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Queuing solutions generate detailed reports on helpdesk performance, including
                                    response times and customer satisfaction.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>These reports are displayed on a single dashboard to visualize glance data and make
                                    informed decisions.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Benefit 5 --}}
                    <div
                        class="relative p-8 bg-gradient-to-br from-pink-50 to-white rounded-3xl border border-pink-100 md:col-span-2 lg:col-span-1">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-pink-100">05</div>
                        <img src="https://qwaiting.com/frontimg/advanced-data-protection.png" alt="Advanced-Data Protection">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Advanced-Data Protection</h3>
                        <ul class="space-y-2 text-gray-600 relative z-10">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Our solution prioritizes data security through advanced encryption and security
                                    protocols.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>The helpdesk queuing solution incorporates automated data backup and recovery
                                    mechanisms.</span>
                            </li>
                        </ul>
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

        {{-- Areas Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Areas - Where
                            Helpdesk Queue</span>
                        <span class="bg-primary bg-clip-text text-transparent">Management
                            System can be Used?</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all border border-gray-100">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/frontimg/IT-department.svg" alt="IT department">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">IT department</h3>
                        <p class="text-gray-600 leading-relaxed">With IT helpdesk queue systems, organizations of all sizes
                            efficiently manage employee queues regarding technical support requests for hardware, software,
                            or networks.</p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all border border-gray-100">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/frontimg/telecommunications.svg" alt="Telecommunications">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Telecommunications</h3>
                        <p class="text-gray-600 leading-relaxed">Telecom companies can use helpdesk queue systems to manage
                            customer queries related to network disturbance, billing inquiries, and technical support for
                            telephone services.</p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all border border-gray-100">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/frontimg/government-office.svg" alt="Government Offices">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Government Offices</h3>
                        <p class="text-gray-600 leading-relaxed">Government offices like the electricity board & municipal
                            corporation may easily utilize a system to manage citizen inquiries, permit applications, and
                            any other government-related matters.</p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all border border-gray-100">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/frontimg/customer-support-centers.svg" alt="Customer Support Centers">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Customer Support Centers</h3>
                        <p class="text-gray-600 leading-relaxed">In businesses providing services or products to customers,
                            a helpdesk queue management system can be used to handle inquiries, complaints, and support
                            requests effectively.</p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all border border-gray-100">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/frontimg/human-resources.svg" alt="Human Resources">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Human Resources</h3>
                        <p class="text-gray-600 leading-relaxed">Our software may be used in the HR department to manage
                            employee inquiries related to benefits, payroll, policies, and others. This software reduces the
                            employee's waiting time.</p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 hover:shadow-2xl transition-all border border-gray-100">
                        <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                            <img src="https://qwaiting.com/frontimg/transportation-companies.svg" alt="Transportation Companies">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Transportation Companies</h3>
                        <p class="text-gray-600 leading-relaxed">Airlines and logistics firms use helpdesk queue systems to
                            manage inquiries, bookings, and support requests related to transportation services.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Flexible Waiting Options Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Empower Your Customers to Wait Wherever They Want With Qwaiting Solutions
                </h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Our advanced Face Recognition System helps Government organizations manage queues, enhance security, and
                    streamline customer flow. Trusted in over 120 countries to create faster, safer, and smarter
                    experiences.
                </p>
                <img src="https://qwaiting.com/frontimg/qwaiting-solution.png" alt="Qwaiting Solutions" class="mx-auto">
            </div>
        </section>

        <!-- Trusted By Section -->
        <div class="trusted-section bg-gray-50">
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
                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How does helpdesk queue software prioritize support tickets?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Helpdesk queue software prioritizes support tickets using predefined factors such as urgency, impact, and service level agreements (SLAs). This ensures that critical issues are addressed initially on priority.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can helpdesk queue software be customized to fit the specific needs of our business?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Yes, helpdesk queue software solutions offer customization options. You can often tailor workflows and ticket fields to meet your business's unique support requirements.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Is it possible to integrate helpdesk queue software with other tools our business uses?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Helpdesk queue software solutions have the ability to integrate with other tools like customer relationship management (CRM) systems and communication tools. This integration streamlines data exchange and ensures 24/7 support availability.
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Is reporting and analytics features available in helpdesk queue software?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Helpdesk queuing software provides reporting and analytics tools that give insights into ticket resolution times, staff performance, and overall support trends. This data is useful for optimizing support processes.
                            </div>
                        </div>


                        <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How secure is the data within the helpdesk queue management system?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Security features vary among different helpdesk queue software providers, but many prioritize data security. Look for a solution that offers encryption, access controls, and compliance with industry standards to ensure the protection of sensitive information.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Final CTA --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-primary via-purple-600 to-indigo-600">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Experience the future of the Helpdesk Queue with Qwaiting!
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Ready to transform customers' experiences? Take the leap towards a more efficient and customer-centric
                    approach with Qwaiting.
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Try it for free</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

    </div>
@endsection