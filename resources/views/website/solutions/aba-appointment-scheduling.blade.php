@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-white selection:bg-primary selection:text-white">

        {{-- Hero Section --}}
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-b from-gray-50 to-white">
            {{-- Abstract Background Shapes --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div
                    class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[1000px] bg-primary/5 rounded-full blur-3xl">
                </div>
                <div class="absolute top-1/2 left-0 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-5xl mx-auto relative z-10 text-center">
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-8 tracking-tight text-gray-900">
                    ABA Scheduling <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Software</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10">
                    Run your caseload without chaos. Qwaiting centralizes scheduling, fills cancellations, and keeps parents informed in real time.
                </p>

                <!-- Feature Pills -->
                <div class="flex flex-wrap items-center gap-3 justify-center">
                    <span class="px-4 py-1.5 rounded-full bg-gray-100 text-sm text-gray-700 font-medium">
                        Automated reminders
                    </span>
                    <span class="px-4 py-1.5 rounded-full bg-gray-100 text-sm text-gray-700 font-medium">
                        Parent and therapist portals
                    </span>
                    <span class="px-4 py-1.5 rounded-full bg-gray-100 text-sm text-gray-700 font-medium">
                        Multi-location
                    </span>
                </div>

                <!-- Supporting Text -->
                <p class="mt-3 text-sm text-gray-500 mb-3">
                    Built for ABA workflows. HIPAA-ready.
                </p>

                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-4">
                    <a href="/signup"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Start Your Free Trial</span>
                        <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-primary hover:text-primary transition-all hover:shadow-lg hover:-translate-y-1 w-full sm:w-auto">
                        Talk to Sales
                    </a>
                </div>

                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gray-100 border border-gray-200 text-sm text-gray-700 mb-6">
                    <!-- Star Icon -->
                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.975a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.975c.3.921-.755 1.688-1.54 1.118l-3.386-2.46a1 1 0 00-1.176 0l-3.386 2.46c-.784.57-1.838-.197-1.539-1.118l1.287-3.975a1 1 0 00-.364-1.118L2.045 9.402c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.975z"/>
                    </svg>

                    <!-- Text -->
                    <span>
                        <span class="font-semibold">Rated 4.8</span> by clinic admins · 
                        <span class="font-medium">Avg. no-shows ↓ 29%</span>
                    </span>
                </div>

                {{-- Hero Image --}}
                <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/ABA-appointment-scheduling-software.png" alt="ABA Scheduling Software"
                            class="w-full h-auto transform transition-transform hover:scale-105 duration-700">
                    </div>
                </div>
            </div>
        </section>

        <!-- Trusted By Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-12 text-center">Trusted by Leading
                Organizations Across Sectors</p>

            <!-- Logo Slider Container -->
            <div class="relative">

                <!-- Slider Track -->
                <div class="logo-slider-track flex items-center gap-16">
                    <!-- First Set of Logos -->
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/apollo_hospitals.jpg') }}" alt="Apollo Hospitals"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/saudia-airlines.png') }}" alt="Saudia Airlines"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt="NUS"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/farrerpark.png') }}" alt="Farrer Park"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/NTUC_FairPrice.png') }}" alt="NTUC FairPrice"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/PSB.png') }}" alt="PSB"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>

                    <!-- Duplicate Set for Seamless Loop -->
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/apollo_hospitals.jpg') }}" alt="Apollo Hospitals"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/saudia-airlines.png') }}" alt="Saudia Airlines"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt="NUS"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/farrerpark.png') }}" alt="Farrer Park"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/NTUC_FairPrice.png') }}" alt="NTUC FairPrice"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                    <div
                        class="logo-slide group flex items-center justify-center p-6 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300 flex-shrink-0">
                        <img src="{{ asset('website/asset/images/PSB.png') }}" alt="PSB"
                            class="h-16 w-auto object-contain  transition-all duration-300 opacity-60 group-hover:opacity-100">
                    </div>
                </div>
            </div>
        </div>

    </section>

        {{-- Feature 1: Take Control of Your Scheduling --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Take Control of Your <span class="text-primary">Scheduling</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Keep calendars accurate, reduce calls, and run on time.
                        </p>
                        <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Drag-and-drop calendar with availability rules and travel buffers.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Smart rescheduling that finds the nearest compliant slot and alerts everyone.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Waitlist auto-fills cancellations based on skills, insurance, and proximity.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Conflict checks for RBT/BCBA overlaps and supervision ratios.</span>
                                </li>
                            </ul>
                        <a href="/signup"
                            class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                            <span class="relative z-10">Book a demo</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                        </a>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/take-control-of-your-scheduling.png"
                            alt="Take Control of Your Scheduling"
                            class="relative rounded-3xl shadow-2xl w-full transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Feature 2: Automated Scheduling and Rescheduling --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Automated scheduling and <span class="text-primary">rescheduling</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Set rules once. Qwaiting handles the busywork.
                        </p>
                        <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Therapist matching by credentials, language, and specialization.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Route-aware clustering saves hours and mileage for in-home sessions.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Payer authorization caps and weekly hour limits enforced.</span>
                                </li>
                            </ul>
                        <a href="/signup"
                            class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                            <span class="relative z-10">Talk to a specialist</span>
                            <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                        </a>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tl from-green-100 to-teal-100 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/automated-scheduling-and-rescheduling.png"
                            alt="Automated Scheduling"
                            class="relative rounded-3xl shadow-2xl w-full transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Feature 3: Fewer No-Shows --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Session reminders and <span class="text-primary">notifications</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Fewer no-shows. Happier parents.
                        </p>
                        <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">SMS, email, and WhatsApp reminders with multilingual templates.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">“You’re next” alerts with live ETA when schedules shift.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Two-way confirmations and auto-follow-ups for missed replies.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Post-session CSAT and caregiver feedback collection.</span>
                                </li>
                            </ul>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-purple-100 to-pink-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/session-reminders-and-notifications.png"
                            alt="Fewer No-Shows"
                            class="relative rounded-3xl shadow-2xl w-full transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Feature 4: Coordinate Care --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Coordinate care across <span class="text-primary">teams and locations</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            One view for in-clinic, at-home, and telehealth scheduling.
                        </p>
                        <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Parent and therapist portals with schedule views and secure messages.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Rooms, resources, and devices to avoid double-booking.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Google and Outlook calendar sync for your entire team.</span>
                                </li>
                            </ul>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tl from-teal-100 to-green-100 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/coordinate-care-across-teams-and-locations.png" alt="Coordinate Care"
                            class="relative rounded-3xl shadow-2xl w-full transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Feature 5: Group Sessions --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Group session and <span class="text-primary">supervision scheduling</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Templates for repeat sessions. Staffing rules built in.
                        </p>
                        <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Parent training, social skills groups, and shadowing templates.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">RBT/BCBA supervision ratios enforced automatically.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Attendance and documentation prompts after each session.</span>
                                </li>
                            </ul>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-indigo-100 to-blue-100 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/group-session-and-supervision-scheduling.png"
                            alt="Group Sessions"
                            class="relative rounded-3xl shadow-2xl w-full transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Feature 7: Privacy, permissions, and peace of mind --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Privacy, permissions, <span class="text-primary">and peace of mind</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            You control who sees what.
                        </p>
                        <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Role-based access for schedulers, therapists, supervisors, and parents</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">Audit logs, SSO options, and encryption in transit and at rest.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold">✓</span>
                                    <span class="text-gray-700">HIPAA-ready workflows and BAAs available.</span>
                                </li>
                            </ul>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tl from-teal-100 to-green-100 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/privacy-permissions-and-peace-of-mind.png" alt="Coordinate Care"
                            class="relative rounded-3xl shadow-2xl w-full transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Choose Section with Testimonial --}}
        <section class="w-full py-16 px-4">
            <div class="max-w-7xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-10 flex flex-col lg:flex-row items-center gap-10">

                <!-- LEFT CONTENT -->
                <div class="flex-1 space-y-6">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                        Success stories from ABA teams
                    </h2>

                    <p class="text-lg text-gray-600 leading-relaxed">
                        “Qwaiting centralized our schedules and cut phone time in half. Parents love the reminders.”
                    </p>

                    <!-- STAR RATING -->
                    <div class="flex items-center gap-2">
                        <!-- Stars -->
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>

                        <span class="text-gray-600 text-sm">4.9 from 120 reviews</span>
                    </div>

                    <!-- CTA -->
                    <a href="#"
                    class="inline-block bg-primary text-white font-medium px-6 py-3 rounded-full shadow-md hover:shadow-lg hover:scale-105 transition-transform">
                        See it in action
                    </a>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="flex-1">
                    <div class="rounded-2xl overflow-hidden shadow-lg">
                        <img src="https://qwaiting.com/frontimg/success-stories-from-ABA-teams.png" alt="Success story"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                </div>

            </div>
        </section>


        {{-- Reports and Analytics Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="lg:w-1/2 space-y-8">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            Reports and <span class="text-primary">analytics</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Utilization by therapist, location, and service code
                            Cancellation and no-show trends with reasons
                            Authorizations consumed vs remaining
                            Travel time, gaps, and route efficiency
                            Parent confirmations and CSAT scores
                        </p>
                    </div>
                    <div class="lg:w-1/2 relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-tl from-cyan-100 to-blue-100 rounded-3xl transform -rotate-3 transition-transform group-hover:-rotate-6">
                        </div>
                        <img src="https://qwaiting.com/frontimg/reports-and-analytics.png"
                            alt="Reports and Analytics"
                            class="relative rounded-3xl shadow-2xl w-full transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </section>

                <section class="w-full py-14 px-6 bg-gradient-to-b from-white to-gray-50">
            <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-200 p-10">
                
                <h2 class="text-3xl font-semibold text-gray-900 mb-3">
                    Run ABA scheduling the simple way
                </h2>

                <p class="text-gray-500 mb-8">
                    Get a live demo or start a free trial. No credit card needed.
                </p>

                <form class="flex flex-col md:flex-row items-center gap-4">
                    <input
                        type="email"
                        placeholder="Work email"
                        class="w-full md:w-1/3 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:outline-none"
                    />

                    <input
                        type="text"
                        placeholder="Organization"
                        class="w-full md:w-1/3 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-primary focus:outline-none"
                    />

                    <button
                        class="w-full md:w-auto px-8 py-3 rounded-xl bg-primary text-white font-semibold hover:bg-primary/90 transition"
                    >
                        BOOK A DEMO
                    </button>
                </form>

            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="py-24 bg-white px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto" x-data="{ active: null }">

                <h2 class="text-4xl font-bold text-center mb-12">Frequently Asked Questions</h2>

                <!-- 2 Columns Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- FAQ ITEM -->
                    <!-- 1 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 1 ? null : 1"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Can we handle scheduling for multiple locations?</span>
                            <span :class="{ 'rotate-45': active === 1 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 1" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Yes. Create location-specific calendars, staff pools, rooms, and reporting while managing everything centrally.
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 2 ? null : 2"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Does Qwaiting support parent confirmations and rescheduling?</span>
                            <span :class="{ 'rotate-45': active === 2 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 2" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Parents receive SMS/email/WhatsApp reminders with confirm and reschedule options that sync instantly.
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 3 ? null : 3"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">How does the smart waitlist work?</span>
                            <span :class="{ 'rotate-45': active === 3 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 3" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            When a slot opens, Qwaiting auto-suggests families based on proximity, authorization status, and therapist skill match.
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 4 ? null : 4"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Can we enforce supervision ratios?</span>
                            <span :class="{ 'rotate-45': active === 4 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 4" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Yes. You can set RBT/BCBA ratios and the scheduler prevents bookings that break those rules.
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 5 ? null : 5"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">What about authorizations and payers?</span>
                            <span :class="{ 'rotate-45': active === 5 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 5" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Set per‑payer rules and weekly hour caps. Warnings appear before a scheduled session exceeds limits.
                        </div>
                    </div>

                    <!-- 6 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 6 ? null : 6"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Do you integrate with Google/Outlook calendars?</span>
                            <span :class="{ 'rotate-45': active === 6 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 6" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Yes. Bi‑directional sync keeps therapist and clinic calendars aligned.
                        </div>
                    </div>

                    <!-- 7 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 7 ? null : 7"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Is there a parent portal?</span>
                            <span :class="{ 'rotate-45': active === 7 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 7" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Parents can view upcoming sessions, confirmations, directions, and messages securely in the portal.
                        </div>
                    </div>

                    <!-- 8 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 8 ? null : 8"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">How are reminders delivered?</span>
                            <span :class="{ 'rotate-45': active === 8 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 8" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            SMS, email, and WhatsApp with multilingual templates. Follow‑ups trigger if a parent doesn’t reply.
                        </div>
                    </div>

                    <!-- 9 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 9 ? null : 9"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Can I schedule group sessions and parent training?</span>
                            <span :class="{ 'rotate-45': active === 9 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 9" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Use templates for groups, assign staff, enforce ratios, and capture attendance automatically.
                        </div>
                    </div>

                    <!-- 10 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 10 ? null : 10"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Do you support telehealth?</span>
                            <span :class="{ 'rotate-45': active === 10 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 10" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                            Yes. Offer telehealth alongside in‑clinic and in‑home visits with one schedule view.
                        </div>
                    </div>

                    <!-- 11 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 11 ? null : 11"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Is Qwaiting HIPAA‑ready?</span>
                            <span :class="{ 'rotate-45': active === 11 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 11" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                           Yes. Role‑based access, encryption, audit logs, and BAAs on request help you meet HIPAA needs.
                        </div>
                    </div>

                    <!-- 12 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 12 ? null : 12"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">Can we track cancellations and no‑shows?</span>
                            <span :class="{ 'rotate-45': active === 12 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 12" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                           Dashboards show reasons, rates by therapist and location, and trends over time.
                        </div>
                    </div>

                    <!-- 13 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 13 ? null : 13"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">What onboarding help do we get?</span>
                            <span :class="{ 'rotate-45': active === 13 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 13" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                          Implementation assistance, admin training, and data import support are included on all paid plans.
                        </div>
                    </div>

                    <!-- 14 -->
                    <div class="bg-blue-50 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <button @click="active = active === 14 ? null : 14"
                            class="w-full flex items-center justify-between text-left">
                            <span class="font-semibold text-gray-800">How is pricing structured?</span>
                            <span :class="{ 'rotate-45': active === 14 }"
                                class="w-6 h-6 flex items-center justify-center text-gray-600 transform transition">
                                +
                            </span>
                        </button>

                        <div x-show="active === 14" x-collapse class="mt-3 text-gray-600 text-sm leading-relaxed">
                          Tiered by users and locations, with optional add‑ons for advanced analytics and integrations.
                        </div>
                    </div>
                     
                </div>
            </div>
        </section>



    </div>
@endsection