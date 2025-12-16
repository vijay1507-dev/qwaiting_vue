@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-gray-50">

        {{-- Modern Hero Section with Split Layout --}}
        <section class="relative pt-24 pb-32 px-4 sm:px-6 lg:px-8 overflow-hidden">
            {{-- Background Elements --}}
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-purple-200/30 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-5xl mx-auto relative z-10">
                <div class="items-center">
                    {{-- Left Content --}}
                    <div class="space-y-8 text-center">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full border border-primary/20">
                            <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                            <span class="text-primary font-semibold text-sm">Digital Signage Solutions</span>
                        </div>

                        <h1 class="text-6xl lg:text-7xl font-bold leading-tight">
                            <span class="">Smart
                                Digital</span>
                            <br>
                            <span class="">Signage
                                Solutions</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                            Deliver real-time updates, promos, and queue info on dynamic screens that keep customers engaged
                            and informed.
                        </p>

                        <div class="flex flex-wrap gap-4 justify-center">
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
                            <a href="/contact-us"
                                class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all hover:-translate-y-1">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    {{-- Right Image --}}
                    <div class="relative mt-10">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="{{ asset('website/asset/images/dashboard-screen.png') }}" alt="Digital Signage"
                                class="w-full">
                        </div>
                        {{-- Floating Elements --}}
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

        {{-- Modern Tabs Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Certified
                            Displays</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent"> and
                            Software</span>
                    </h2>
                </div>

                {{-- Modern Tab Pills --}}
                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <button onclick="switchTab('tab1')" id="btn-tab1"
                        class="tab-btn px-6 py-3 rounded-full font-medium transition-all">
                        Displays for Waiting Rooms
                    </button>
                    <button onclick="switchTab('tab2')" id="btn-tab2"
                        class="tab-btn px-6 py-3 rounded-full font-medium transition-all">
                        Displays at Counters
                    </button>
                    <button onclick="switchTab('tab3')" id="btn-tab3"
                        class="tab-btn px-6 py-3 rounded-full font-medium transition-all">
                        Qwaiting Display App
                    </button>
                    <button onclick="switchTab('tab4')" id="btn-tab4"
                        class="tab-btn px-6 py-3 rounded-full font-medium transition-all">
                        Voice Announcements
                    </button>
                </div>

                {{-- Tab Content Cards --}}
                <div class="max-w-7xl mx-auto">
                    <div id="tab1" class="tab-content">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-3xl p-10 shadow-xl">
                            <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Displays for Waiting Rooms</h3>
                            <div class="grid lg:grid-cols-2">
                                <img src="https://qwaiting.com/frontimg/displays-for-waiting-rooms.png" alt="">
                                <div class="grid gap-1">
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Electronic screens share real-time information with
                                            customers in waiting rooms.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Digital signage can be mounted on walls, ceilings, or
                                            freestanding units for clear visibility.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Available in 32–52 inch sizes, offering flexibility for
                                            different spaces.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Showcase content in multiple formats, including images,
                                            videos, and text.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab2" class="tab-content hidden">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-3xl p-10 shadow-xl">
                            <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Displays at Counters</h3>
                            <div class="grid lg:grid-cols-2">
                                <img src="https://qwaiting.com/frontimg/displays-at-counters.png" alt="">
                                <div class="grid gap-1">
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Counter screens are placed at service points to display
                                            ticket numbers or key information.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Designed with a streamlined user interface for simple
                                            operation at counters.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Enhances communication and improves the overall
                                            customer experience.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab3" class="tab-content hidden">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-3xl p-10 shadow-xl">
                            <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Qwaiting Display Application</h3>
                            <div class="grid lg:grid-cols-2">
                                <img src="https://qwaiting.com/frontimg/qwaiting-display-application.png" alt="">
                                <div class="grid gap-1">
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Helpful for managing and displaying content in waiting
                                            areas.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Displays wait times to keep customers informed.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Customizable screen layouts to showcase various types
                                            of content.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Display real-time information and updates.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab4" class="tab-content hidden">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-3xl p-10 shadow-xl">
                            <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Voice Announcements</h3>
                            <div class="grid lg:grid-cols-2">
                                <img src="https://qwaiting.com/frontimg/voice-announcements.png" alt="">
                                <div class="grid gap-4">
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Easy accessibility for individuals with visual
                                            impairments.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Uses audio output to share important information with
                                            the audience.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Can be integrated with digital signage for verbal
                                            instructions or updates.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 text-lg">Improves accessibility by reaching those not actively
                                            viewing the displays.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Bento Grid Features --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Key </span>
                        <span
                            class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Features</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    {{-- Feature 1 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/customized-content-design-template.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Dynamic Content</h3>
                        <p class="text-gray-600 leading-relaxed">Display engaging content with customary image and video
                            formats. Easily update and pre-design content templates to make content creation easier.</p>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/manage-content.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Data Integration</h3>
                        <p class="text-gray-600 leading-relaxed">Keep your audience engaged by displaying real-time queue
                            information, whether it is about live event schedules or other important updates.</p>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/support-all-media-formats.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Analytics & Reporting</h3>
                        <p class="text-gray-600 leading-relaxed">To track the effectiveness and performance of your content,
                            our digital signage offers analytics and measurement tools. You can gather data on audience
                            engagement and display usage to optimize digital signage strategy.</p>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/audible-ticket-announcements.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Multi-display Management</h3>
                        <p class="text-gray-600 leading-relaxed">With digital signage solutions, you can manage and control
                            multiple displays from a single platform, offering smooth operations and management.</p>
                    </div>

                    {{-- Feature 5 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/alignment-with-brand-guidelines.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Text-to-Speech</h3>
                        <p class="text-gray-600 leading-relaxed">The audio announcement feature allows you to convert your
                            text to speech. With this feature, content becomes more accessible to a broader audience, and
                            people with vision problems.</p>
                    </div>

                    {{-- Feature 6 --}}
                    <div
                        class="group bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                        <div
                            class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/remote-control.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Remote Control</h3>
                        <p class="text-gray-600 leading-relaxed">Easily manage and update your digital signage from anywhere
                            for one branch or hundreds. It provides convenience and flexibility without needing to be
                            on-site.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Banner --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-primary via-purple-600 to-primary">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    #1 Cloud-Based Queue Management System
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
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

        {{-- Benefits Grid --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Why Choose
                        </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Digital
                            Signage Solutions</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">01</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Efficient Queue Management</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Linked with queue management software,
                            digital signage shows real-time queue information and updates instantly when changes occur,
                            reducing confusion and challenges.</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">02</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Improved Communication</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">By displaying timely information, alerts, and
                            announcements, Qwaiting’s digital signage enhances communication not only with customers and
                            visitors but also with employees.</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-green-100">03</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Increased Engagement</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Dynamic and eye-catching content — from
                            videos and animations to social media feeds and live data streams — attracts attention and keeps
                            customers engaged.</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-orange-100">04</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Enhanced Customer Experience</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Clear instructions and real-time updates help
                            customers know their position in the queue and wait times, reducing frustration and improving
                            overall experience.</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-pink-50 to-white rounded-3xl border border-pink-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-pink-100">05</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Reduced Wait Times</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">By showing engaging content such as ads,
                            videos, and news updates, digital signage distracts customers, making waits feel shorter while
                            ensuring smooth flow.</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-indigo-50 to-white rounded-3xl border border-indigo-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-indigo-100">06</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Tailored and Adaptable Solutions</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Designed to meet diverse business needs,
                            digital signage can be scaled easily and customized in terms of content, layout, and scheduling
                            for seamless operations.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Industries Carousel --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span
                            class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Industries</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="/industries/retail-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Retail</h3>
                        </div>
                    </a>

                    <a href="/industries/healthcare" class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/healthcare.jpg') }}" alt="Healthcare"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Healthcare</h3>
                        </div>
                    </a>

                    <a href="/industries/banking-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/banking.jpg') }}" alt="Banking"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Banking</h3>
                        </div>
                    </a>

                    <a href="/industries/public-sector-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-square">
                        <img src="{{ asset('website/asset/images/public.jpg') }}" alt="Public"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-bold text-white">Public</h3>
                        </div>
                    </a>
                </div>

                <div class="text-center mt-12">
                    <a href="/industries"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white rounded-2xl font-semibold hover:shadow-2xl hover:shadow-primary/50 hover:-translate-y-1 transition-all">
                        <span>See All Industries</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- What Can We Do Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-5xl font-bold mb-6">
                    <span class="text-white">What Qwaiting Can
                        Do for You?     
                </h2>
                <p class="text-xl text-white mb-8 leading-relaxed">
                    Request a demo and see how Qwaiting optimizes your customer flow, enhances efficiency, and transforms
                    the way you manage waits for a smoother experience.
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-primary/50 hover:-translate-y-1 transition-all">
                    <span>Book a Free Demo</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
                <p class="mt-8 text-white">
                    Trusted in over 120 countries to create faster, safer, and smarter experiences.
                </p>
            </div>
        </section>

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
                <a href="https://blog.qwaiting.com/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/12/Bank-Queue-Management-Trends-and-Tools-A-Comprehensive-Insight.jpg"
                        alt="Online Appointment Booking Software" class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Bank Queue Management Trends and Tools_ A Comprehensive Insight
                    </h3>
                    <p class="text-gray-600">
                        In the last decade, the nature of financial institutions such as banks has evolved. The banks are embracing technology to automate most of the procedures to provide a better customer experience. However, customers still have to go to the bank premises and wait in line for some crucial or urgent work...
                    </p>
                </a>

                {{-- Blog Post 2 --}}
                <a href="https://blog.qwaiting.com/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/12/Are-Waiting-Queue-Systems-the-Ultimate-Solution-for-Seamless-Service-100.jpg" alt="Are Waiting Queue Systems the Ultimate Solution for Seamless Service"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Are Waiting Queue Systems the Ultimate Solution for Seamless Service
                    </h3>
                    <p class="text-gray-600">
                        Providing exceptional customer service significantly enhances the customer’s overall experience. Needless to say, no one likes to wait in a crowded waiting area or stand in a queue, whether it’s just for a few minutes. This task seems so tedious and time-wasting for customers, which ruins their overall experience...
                    </p>
                </a>

                {{-- Blog Post 3 --}}
                <a href="https://blog.qwaiting.com/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/12/Online-Appointment-Booking-Software-Take-your-Business-to-the-Next-Level.jpg" alt="Online Appointment Booking Software"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Online Appointment Booking Software: Take your Business to the Next Level
                    </h3>
                    <p class="text-gray-600">
                       Businesses that rely on in-person appointment scheduling are lagging behind and facing various problems. However, they can stay ahead by integrating technological advancements that directly impact customer loyalty & staff efficiency. With an online appointment booking solutions, you can automate your...
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
                                <span class="text-lg font-semibold text-gray-900">What is a Digital Signage Solution?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Smart digital signage software helps to showcase images, videos, and information in various
                                business premises like retail stores, restaurants, public spaces, etc.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Where is digital signage used?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Smart digital signage software helps to showcase images, videos, and information in various
                                business premises like retail stores, restaurants, public spaces, etc.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">What is the cost of digital
                                    signage?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Digital signage screens are available in <strong>32 to 52-inch</strong> sizes. Pricing
                                depends on size, setup, and features required. On average, businesses can expect to invest
                                between <strong>$400 and $1,200 per screen</strong>, with additional costs for software and
                                integration.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">How does digital signage improve customer
                                    experience?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Digital signage provides <strong>real-time updates, clear instructions, and engaging
                                    content,</strong> helping customers stay informed and entertained while reducing
                                frustration and perceived wait times.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Can digital signage integrate with queue
                                    management systems?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Yes. Qwaiting’s digital signage integrates seamlessly with queue management software to
                                display <strong>live queue status, wait times, and customer alerts,</strong> ensuring smooth
                                operations.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">What content can be displayed on digital
                                    signage?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                You can display <strong>videos, images, advertisements, social media feeds, live data,
                                    announcements, and queue updates —</strong> all fully customizable to your business
                                needs.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Is digital signage suitable for small
                                    businesses?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Absolutely. Whether it’s a <strong>clinic, retail shop, or small office,</strong> digital
                                signage can be scaled to fit smaller spaces and budgets while still delivering professional,
                                real-time communication.
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                                <span class="text-lg font-semibold text-gray-900">Does digital signage require the internet
                                    to work?</span>
                                <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                                Most modern digital signage solutions, including Qwaiting’s, use internet connectivity to
                                update content in real time. However, pre-loaded content can still run offline if needed.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Get-in-Touch Form --}}
        <section id="demo" class="py-20 px-4 sm:px-6 lg:px-8 bg-primary">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                        Get in
                        <span class="text-white">Touch</span>
                    </h2>
                    <p class="text-xl text-white">
                        Ready to transform your queue management? Let's talk about your needs.
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
                    <form wire:submit.prevent="submitForm" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Full Name *</label>
                                <input type="text" 
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="John Doe" required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Company Name *</label>
                                <input type="text" 
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="Acme Inc." required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Email Address *</label>
                                <input type="email" 
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="john@example.com" required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-text-dark mb-2">Phone Number *</label>
                                <input type="tel" 
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all"
                                    placeholder="+1 (555) 000-0000" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-text-dark mb-2">Industry</label>
                            <select 
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all">
                                <option value="">Select your industry</option>
                                <option value="banking">Banking & Finance</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="retail">Retail</option>
                                <option value="government">Government</option>
                                <option value="telecom">Telecom</option>
                                <option value="education">Education</option>
                                <option value="automotive">Automotive</option>
                                <option value="transportation">Transportation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-text-dark mb-2">Message</label>
                            <textarea  rows="4"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all resize-none"
                                placeholder="Tell us about your queue management needs..."></textarea>
                        </div>

                        @if(isset($successMessage))
                            <div class="bg-green-50 border-2 border-green-200 rounded-xl p-4">
                                <p class="text-green-700 font-semibold">{{ $successMessage }}</p>
                            </div>
                        @endif

                        <button type="submit"
                            class="w-full px-8 py-4 text-white rounded-xl font-bold text-lg shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transition-all hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <span>
                                Request a Demo
                            </span>
                        </button>

                        <p class="text-center text-sm text-text-medium">
                            By submitting this form, you agree to our <a href="#" class="text-primary hover:underline">Terms
                                of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>

    </div>


@endsection