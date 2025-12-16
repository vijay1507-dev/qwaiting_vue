@extends('website.index')

@section('content')
<div class="font-sans antialiased text-gray-900 bg-white selection:bg-indigo-100 selection:text-indigo-700">

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 overflow-hidden bg-gradient-to-b from-white to-gray-50 lg:pt-40 lg:pb-28">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <h1 class="mx-auto max-w-4xl text-4xl font-bold tracking-tight text-black sm:text-6xl mb-6">
                Turn Opportunities into <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Growth</span> with Qwaiting Partnership
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-black">
                Partner with us and be part of a fast-growing ecosystem that transforms how organizations manage queues and customer flow. Enjoy powerful tools, dedicated support, and a partnership built to help you scale and succeed globally.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="https://qwaiting.com/partners#partnership%E2%80%94share" class="rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                    Become a Partner
                </a>
            </div>
        </div>
        
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"></div>
        </div>
    </section>

    <!-- Why Partner with Qwaiting Section -->
    <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div class="order-2 lg:order-1">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Why Partner with Qwaiting?</h2>
                    <p class="text-lg leading-relaxed text-gray-600 mb-8">
                        Trusted by thousands of businesses worldwide, Qwaiting helps teams do more with less—turning every customer interaction into measurable growth. As a partner, you get a proven platform and the support to win more deals, deliver faster, and scale your services.
                    </p>
                    
                    <ul class="space-y-4 mb-10">
                        @foreach([
                            'Speedy business growth with a fast-rising global brand',
                            'Gain early-stage demand and open new markets',
                            'Improve service offerings with a proven, queue management system',
                            'Use next-gen tools to scale faster',
                            'Deliver superior service and outpace competitors',
                            'Build long-term customer loyalty and recurring revenue'
                        ] as $item)
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-indigo-100 flex items-center justify-center mt-0.5">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="ml-3 text-base text-gray-700 font-medium">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                    
                    <div class="p-6 bg-indigo-50 rounded-2xl border border-indigo-100">
                        <p class="text-indigo-900 font-medium mb-4">Turn every customer interaction into a growth opportunity with Qwaiting.</p>
                        <a href="https://qwaiting.com/images/Qwaiting-Partner-Guide.pdf" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">
                            Download Our Partner Guide
                            <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Image -->
                <div class="order-1 lg:order-2 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="https://qwaiting.com/images/solutions/partner.png" alt="Why Partner with Qwaiting" class="w-full h-auto object-cover transform hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent pointer-events-none"></div>
                    </div>
                    <!-- Decorative Element -->
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500/10 blur-3xl rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why You Can Count on Qwaiting -->
    <section class="py-24 bg-gray-50 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Why You Can Count on Qwaiting?</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    With years of expertise in managing queues and customer flow, we empower our partners to thrive in competitive markets. Qwaiting empowers you to:
                </p>
            </div>

            <div class="grid lg:grid-cols-2">
                <img src="https://qwaiting.com/images/solutions/join.png" alt="Why You Can Count on Qwaiting">
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8">
                    @php
                        $counts = [
                            [
                                'title' => 'Tailored Solutions',
                                'desc' => 'Deliver tailored, end-to-end queue management solutions.',
                                'icon' => 'M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.077-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42'
                            ],
                            [
                                'title' => 'Real-time Insights',
                                'desc' => 'Leverage real-time insights to enhance operations and client outcomes.',
                                'icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z'
                            ],
                            [
                                'title' => 'Data-Driven Decisions',
                                'desc' => 'Make data-driven decisions with advanced performance analytics.',
                                'icon' => 'M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941'
                            ],
                            [
                                'title' => 'Boost Profitability',
                                'desc' => 'Boost profitability through scalable, ROI-focused strategies.',
                                'icon' => 'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                            ]
                        ];
                    @endphp

                    @foreach($counts as $count)
                    <div class="group relative bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $count['icon'] }}" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $count['title'] }}</h3>
                        <p class="text-gray-600 group-hover:text-gray-900 transition-colors">{{ $count['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Facts / Stats Section -->
    <section class="py-20 bg-primary text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <h2 class="text-3xl font-bold text-center mb-16">Facts</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-700/50">
                <div class="p-4">
                    <p class="text-4xl lg:text-5xl font-extrabold text-transparent bg-clip-text bg-white">65K+</p>
                    <p class="mt-2 text-sm lg:text-base font-medium text-white uppercase tracking-wider">Trusted Customers</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl lg:text-5xl font-extrabold text-transparent bg-clip-text bg-white">8+</p>
                    <p class="mt-2 text-sm lg:text-base font-medium text-white uppercase tracking-wider">Global Offices</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl lg:text-5xl font-extrabold text-transparent bg-clip-text bg-white">120+</p>
                    <p class="mt-2 text-sm lg:text-base font-medium text-white uppercase tracking-wider">Countries Using Qwaiting</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl lg:text-5xl font-extrabold text-transparent bg-clip-text bg-white">8+</p>
                    <p class="mt-2 text-sm lg:text-base font-medium text-white uppercase tracking-wider">Years of Experience in Software Industry</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Benefits -->
    <section class="py-24 sm:py-32 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Partner Benefits</h2>
                <p class="mt-4 text-lg text-gray-600">Gain exclusive access to tools, resources, and support designed to help you succeed with Qwaiting.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $benefits = [
                        ['title' => 'Co-Marketing & Branding Support', 'desc' => 'Boost your visibility with joint campaigns, premium marketing materials, and co-branded promotions.', 'img' => 'https://qwaiting.com/frontimg/co-marketing-and-branding-support.svg'],
                        ['title' => 'Training & Certification', 'desc' => 'Empower your team with in-depth product training, certifications, and continuous learning opportunities.', 'img' => 'https://qwaiting.com/frontimg/training-and-certification.svg'],
                        ['title' => 'Dedicated Partner Portal', 'desc' => 'Access a centralized hub for resources, updates, leads, and performance tracking.', 'img' => 'https://qwaiting.com/frontimg/dedicated-partner-portal.svg'],
                        ['title' => 'Sales Enablement Tools', 'desc' => 'Get useful sales tools, demos, and insights to close deals faster and grow your business.', 'img' => 'https://qwaiting.com/frontimg/sales-enablement-tools.svg'],
                        ['title' => 'Product Discounts', 'desc' => 'Enjoy exclusive partner pricing, volume-based discounts and special offers that boost your profit margins.', 'img' => 'https://qwaiting.com/frontimg/product-discounts.svg'],
                        ['title' => 'Pre-Sales & Post-Sales Support', 'desc' => 'Get expert guidance at every stage—from pitching to deployment and continued client success.', 'img' => 'https://qwaiting.com/frontimg/pre-sales-and-post-sales-support.svg'],
                    ];
                @endphp

                @foreach($benefits as $benefit)
                <div class="bg-white rounded-2xl p-8 shadow-md hover:border-indigo-200 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ $benefit['img'] }}" alt="{{ $benefit['title'] }}" class="w-10 h-10">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">{{ $benefit['title'] }}</h3>
                    <p class="text-gray-600">{{ $benefit['desc'] }}</p>
                </div>
                @endforeach
            </div>
            
             <div class="mt-16 text-center">
                <a href="https://qwaiting.com/contact-us" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-700 transition-all duration-300">
                    Request a Demo
                </a>
            </div>
        </div>
    </section>

    <!-- Partner with Qwaiting and Lead the Change -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                <div>
                     <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6 leading-tight">
                        Partner with Qwaiting and <span class="text-indigo-600">Lead the Change</span>
                    </h2>
                    <p class="text-lg text-gray-700 mb-8">
                        The future of customer experience is seamless, data-driven, and human-centered and you can be part of it.
                    </p>
                    <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Ask yourself, do you:</h3>
                    <ul class="space-y-4">
                        @foreach([
                            'Strive to deliver effortless customer journeys?',
                            'Serve industries like retail, healthcare, public services, or finance?',
                            'Offer innovative tech or integration expertise to your clients?',
                            'Want to increase your customer base with proven, scalable solutions?',
                            'Need a partner who values growth and long-term success?',
                            'Want to establish a customer experience to be known for trust and reliability?'
                        ] as $question)
                        <li class="flex gap-4">
                             <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                                <svg class="w-3.5 h-3.5 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">{{ $question }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                </div>

                <div class="p-8 bg-indigo-600 rounded-3xl text-white shadow-xl relative overflow-hidden">
                         <!-- Decor -->
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                        <h4 class="text-xl font-bold mb-4 relative z-10">Take the first step toward partnership— <br>
                            share your details below!</h4>
                        <div class="max-w-3xl mx-auto bg-white p-10 rounded-3xl shadow-md mt-10">

                        <form action="#" method="POST" class="space-y-6">

                            <!-- First & Last Name -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block mb-1 text-gray-700">First Name <span class="text-red-500">*</span></label>
                                    <input type="text"
                                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none" />
                                </div>

                                <div>
                                    <label class="block font-medium mb-1 text-gray-700">Last Name <span class="text-red-500">*</span></label>
                                    <input type="text"
                                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none" />
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block font-medium mb-1 text-gray-700">Company Email <span class="text-red-500">*</span></label>
                                <input type="email"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none" />
                            </div>

                            <!-- Company -->
                            <div>
                                <label class="block font-medium mb-1 text-gray-700">Company <span class="text-red-500">*</span></label>
                                <input type="text"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none" />
                            </div>

                            <!-- Country & Contact -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block font-medium mb-1 text-gray-700">Country <span class="text-red-500">*</span></label>
                                    <select class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none">
                                        <option>India</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block font-medium mb-1 text-gray-700">Contact <span class="text-red-500">*</span></label>
                                    <input type="text"
                                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none" />
                                </div>
                            </div>

                            <!-- Website URL -->
                            <div>
                                <label class="block font-medium mb-1 text-gray-700">Website URL</label>
                                <input type="text" placeholder="https://example.com"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none" />
                            </div>

                            <!-- What best describes you -->
                            <div>
                                <label class="block font-medium mb-1 text-gray-700">What best describes you? <span class="text-red-500">*</span></label>
                                <select
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none">
                                    <option>Please Select</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button
                                class="w-full bg-purple-600 hover:bg-purple-700 transition text-white py-4 rounded-full text-lg font-semibold mt-4">
                                GET STARTED
                            </button>

                        </form>

                    </div>

                    </div>
            </div>
        </div>
    </section>

    <!-- Frequently Asked Questions -->
    <section class="py-24 bg-bg-light">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-text-dark mb-4">Frequently Asked Questions</h2>
            </div>
            <div class="space-y-4">
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What is Qwaiting and who is it for?</h3>
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
                        Qwaiting is an advanced AI-powered queue management system that helps businesses reduce their
                        customer wait times, manage walk-ins, and improve customer service.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">How does Qwaiting improve customer experience and reduce
                            wait times?</h3>
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
                        Qwaiting makes check-ins simple, manages virtual queues, shares live wait updates, and sends
                        personalized alerts so customers always know their place.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">Is Qwaiting suitable for my industry or organization size?
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
                        Yes, with its highly scalable and flexible features, Qwaiting is suitable for all industries—retail,
                        healthcare, government, education, and many others.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What’s included in the free trial, and how do I get
                            started?</h3>
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
                        The 14-day free trial offers you full access to Qwaiting’s core features like virtual queues,
                        appointment booking, and live dashboards. No credit card needed. Just sign up on our website, set up
                        your location, and start managing queues in minutes.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">How easy is it to integrate Qwaiting with my existing
                            systems?</h3>
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
                        Qwaiting offers ready APIs and supports seamless integration with CRMs, ERPs, and booking tools,
                        with no complex IT setup required. Our expert team provides 24/7 support to ensure a smooth
                        transition.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What kind of support and onboarding does Qwaiting provide?
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
                        Qwaiting offers full onboarding, including setup assistance, staff training, and best practices
                        tailored to your industry. Whether you need a fast launch or hands-on guidance, our team ensures a
                        smooth start.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">How secure is Qwaiting?</h3>
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
                        Qwaiting is built with enterprise-grade security. We use encrypted 256-bit data transmission (SSL),
                        secure cloud hosting, and strict access controls. The platform is fully GDPR-compliant and follows
                        best practices for data privacy.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">Can Qwaiting be customized for my workflow or brand?</h3>
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
                        Yes. Qwaiting is fully customizable! Businesses can tailor workflows, queue logic, user roles, and
                        branding (logos, colors, messages) to match their industry's exact needs.
                    </p>
                </details>
                <details
                    class="group bg-white rounded-xl p-6 [&_summary::-webkit-details-marker]:hidden border border-gray-100">
                    <summary class="flex items-center justify-between cursor-pointer">
                        <h3 class="font-semibold text-text-dark">What are the pricing plans for Qwaiting?</h3>
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
                        Qwaiting offers flexible pricing based on your business size and needs. Plans start from $199/month.
                        Custom enterprise packages are also available. Contact our team for a quick quote tailored to your
                        business needs.
                    </p>
                </details>
            </div>
        </div>
    </section>

</div>
@endsection
