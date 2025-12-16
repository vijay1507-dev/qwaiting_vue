@extends('website.index')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-indigo-100 selection:text-indigo-700">

        <!-- Hero Section -->
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
                    Join Our <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Reseller Partner Program</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10 font-bold">
                    Help businesses manage queues smarter, grow your revenue, and scale with us.
                </p>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10">
                    Are you a consultant, agency, or business expert? Partner with Qwaiting to offer a proven queue solution that reduces client wait times and earns you recurring commissions on every successful sale.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSd0rmo6hYRze2lfZYN_a44hSwy5SExcjhFMUNT62vpG-Fsc5Q/viewform"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Submit Request</span>
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

            </div>
        </section>


        <!-- What is Qwaiting Reseller Program? Section -->
        <section class="py-24 px-6 bg-white">
            <div class="max-w-5xl mx-auto bg-indigo-600 text-white rounded-3xl p-12 shadow-xl">
                <h2 class="text-3xl font-bold mb-6">What is Qwaiting Reseller Program?</h2>

                <p class="text-lg leading-relaxed opacity-90">
                    Many organizations struggle to manage high foot traffic efficiently, especially in 
                    airports, hospitals, banks, and retail stores. This causes frustrating customer wait 
                    times and hurts business performance.
                    <br><br>
                    Qwaiting is a smart, user-friendly queue management system designed to reduce wait 
                    times, enhance customer flow, and improve operational efficiency — all from a single platform.
                    <br><br>
                    As a Qwaiting Reseller, you help businesses solve real problems and improve customer 
                    service. In return, you earn recurring commissions, receive full onboarding support, and 
                    gain access to sales and marketing tools to grow your business.
                </p>
            </div>
        </section>


        <!-- Why Partner With Qwaiting? Section -->
        <section class="py-24 px-6 bg-indigo-900 text-white">
            <div class="max-w-6xl mx-auto text-center">
                
                <h2 class="text-4xl font-bold mb-14">Why Partner With Qwaiting?</h2>

                <!-- Benefits Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

                    <!-- Item 1 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/earn-commissions.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Earn Commissions
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    You earn money every time a business signs up through you. There is no limit to your earnings.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/grow-with-your-clients.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Grow With Your Clients
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    When your clients renew or upgrade their plan, you make more money each time.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/sales-and-support-tools.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Sales & Support Tools
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    We give you demo accounts, guides, and sales kits. These help you explain and sell Qwaiting easily.
                                </p>
                            </div>
                        </div>
                    </div>


                    <!-- Item 4 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/account-manager.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Account Manager
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    You'll have a personal manager to help you with sales and client questions.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/global-opportunities.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Global Opportunities
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    Qwaiting works in all countries. You can share it with any business, anywhere in the world.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/partner-listing.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Partner Listing
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    We'll show your name on our website as an official partner. This helps you get more leads.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 7 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/priority-access.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Priority Access
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    You get early access to new features and fast help from our support team.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 8 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/community-and-events.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Community and Events
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    Join our reseller group, attend webinars, and connect with other partners to learn and grow.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 9 -->
                    <div class="group p-8 bg-white/10 rounded-2xl backdrop-blur-xl border border-white/20 transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:text-white transition-colors duration-300">
                                <img src="https://qwaiting.com/frontimg/marketing-help.svg" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white/90 transition-colors">
                                    Marketing Help
                                </h3>
                                <p class="text-white/90 leading-relaxed">
                                    We give you ready-to-use images, content, and tips to help promote Qwaiting online or offline.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <!-- CTA -->
                <div class="mt-16 max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-3xl p-10 text-center shadow-2xl relative overflow-hidden">

                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSA2MCAwIEwgMCAwIDAgNjAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-30"></div>

                        <div class="relative z-10">
                            <h3 class="text-3xl font-bold text-white mb-4">Join Our Reseller Program</h3>
                            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                                Refer Qwaiting. Get rewarded. Help businesses serve customers better.
                            </p>

                            <a href="https://forms.gle/VXa7d84vs8nsQpZaA" target="_blank"
                                class="inline-flex items-center justify-center rounded-full bg-white text-indigo-600 px-8 py-4 text-base font-bold hover:bg-gray-100 transition-colors shadow-lg">
                                Join Now
                                <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </section>


        <!-- How does it work? Section -->
        <section class="py-24 px-6 bg-white">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-6">How does it work?</h2>
                <p class="text-gray-600 mb-16">It's very easy to become a Qwaiting Reseller Partner.</p>

                <div class="relative flex flex-col md:flex-row justify-between items-center md:px-10 gap-16">

                    <!-- Horizontal line (Desktop only) -->
                    <div class="hidden md:block absolute top-1/4 left-[18%] right-[18%] h-[2px] bg-gray-200 -z-10"></div>

                    <!-- Vertical line (Mobile only) -->
                    <div class="md:hidden absolute left-1/2 top-10 bottom-10 w-[2px] bg-gray-200 -z-10"></div>

                    <!-- Step 1 -->
                    <div class="flex flex-col items-center w-full md:w-1/3 relative">
                        <span class="step-number glow-1">01</span>
                        <h3 class="mt-4 text-xl font-semibold">Apply</h3>
                        <p class="text-gray-600 mt-2">Fill out a short online form about your business and services.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center w-full md:w-1/3 relative">
                        <span class="step-number glow-2">02</span>
                        <h3 class="mt-4 text-xl font-semibold">Get Approved</h3>
                        <p class="text-gray-600 mt-2">We’ll review your form and reach out to discuss the next step.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center w-full md:w-1/3 relative">
                        <span class="step-number glow-3">03</span>
                        <h3 class="mt-4 text-xl font-semibold">Start Selling</h3>
                        <p class="text-gray-600 mt-2">Once you’re approved, you’ll get your toolkit and be listed as a Qwaiting partner.</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- FAQs Section -->
        <section class="py-24 bg-bg-light">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-text-dark mb-4">Frequently Asked Questions</h2>
                </div>
                <div class="space-y-4">
                    <details
                        class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-text-dark">What is the Qwaiting Reseller Program?</h3>
                            <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-text-medium">
                            The Qwaiting Reseller Program lets you earn commissions by referring our queue management software. You help businesses streamline customer flow while earning on every successful signup. We provide full training, sales tools, and support to help you succeed.
                        </p>
                    </details>
                    <details
                        class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-text-dark">Who can join as a reseller?</h3>
                            <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-text-medium">
                            IT consultants, digital agencies, system integrators, hardware vendors, CX professionals, and business advisors—anyone with relevant industry connections or a tech/service client base.
                        </p>
                    </details>
                    <details
                        class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-text-dark">How do I make money with this program?
                            </h3>
                            <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-text-medium">
                            You earn a commission for every customer you refer who signs up. The more clients you onboard, the more recurring income you generate. We offer a competitive revenue-sharing model designed for growth.
                        </p>
                    </details>
                    <details
                        class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-text-dark">Can I track my referrals and earnings?</h3>
                            <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-text-medium">
                            Yes, you get access to a personal dashboard showing your referrals, active clients, and total earnings. It updates in real-time, so you always know how much you’ve made and who is using your referral link successfully.
                        </p>
                    </details>
                    <details
                        class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-text-dark">Will I get any training or tools?</h3>
                            <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-text-medium">
                            Yes, you’ll receive product demos, sales kits, onboarding checklists, and access to a dedicated partner portal. Everything you need to confidently pitch and sell Qwaiting.
                        </p>
                    </details>
                    <details
                        class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-text-dark">How long does approval take?
                            </h3>
                            <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-text-medium">
                            Once you apply, our team will review your profile within 2–3 business days. After approval, you’ll receive onboarding instructions and access to reseller resources.
                        </p>
                    </details>
                    <details
                        class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-text-dark">What happens after I get approved?</h3>
                            <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-50 p-1.5 text-gray-900 sm:p-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-text-medium">
                            You’ll gain full access to your partner dashboard, support contacts, sales tools, and training content. You can immediately start referring leads and earning commissions.

                        </p>
                    </details>
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