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
                        <span class="text-sm font-semibold text-indigo-600">Aviation Success Story</span>
                    </div>
                    <h1 class="mx-auto max-w-5xl text-4xl font-bold tracking-tight text-black sm:text-6xl mb-6">
                        How Saudia Airlines Took Off with <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Qwaiting</span>
                        to Improve Passenger Flow and Staff Performance
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/frontimg/saudia-airlines-sales-office.jpg" alt="Saudia Airlines"
                                    class="w-full h-full object-cover"
                                    onerror="this.style.display='none'; this.parentElement.innerHTML='<svg class=\'w-32 h-32 text-indigo-200\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1\' d=\'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4\'/></svg>';">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-center space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        Saudia is one of the world’s busiest airlines, operates sales offices across 12 states, and handles
                        between 5,000 to 6,000 visitors daily. With flights operating across major domestic and
                        international routes, Saudia has always been known for providing exceptional customer service.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        But like any other busy airline, the airline faced some problems managing a large visitor crowd,
                        improving staff efficiency for a smooth, stress-free experience at their offices.
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        To address these challenges, Saudia partnered with Qwaiting to modernize and streamline its
                        in-office customer experience using aviation CX software. The results were visible within weeks,
                        significantly improving service quality and operational efficiency.
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

                    <!-- Client -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Client</p>
                            <p class="text-lg font-semibold text-gray-900">Saudia Airlines</p>
                        </div>
                    </div>

                    <!-- Industry -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Industry</p>
                            <p class="text-lg font-semibold text-gray-900">Aviation</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="text-lg font-semibold text-gray-900">Saudi Arabia</p>
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Type</p>
                            <p class="text-lg font-semibold text-gray-900">Airlines</p>
                        </div>
                    </div>
                </div>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Saudia Airlines is the national airline of Saudi Arabia, serving millions of passengers each year.
                        With flights across major domestic and international routes, it’s known for its strong network and
                        reliable service. The airline also runs 12 sales offices that help travelers with bookings,
                        inquiries, and customer support.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges faced
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Unpredictable and unmanageable visitor flow</li>
                            <li>• Lack of staff performance insights</li>
                            <li>• Long wait times for travellers</li>
                            <li>• Overworked and confused staff</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions Provided
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Centralized staff dashboard to track performance</li>
                            <li>• The visitor reporting page for travellers</li>
                            <li>• Digital queuing systems to prevent overcrowding</li>
                        </ul>
                    </div>
                </div>

                <!-- Results -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2 mt-10">
                        Results
                    </h3>

                    <ul class="space-y-3 text-gray-700 text-lg">
                        <li>• Wait times dropped to under 20 minutes</li>
                        <li>• Seamless visitor management</li>
                        <li>• Maximized staff productivity</li>
                        <li>• Better travel experience for everyone</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The Challenges Faced by Saudia
                        Airlines</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Saudia Airlines encountered significant operational challenges across its sales offices. These inefficiencies not only impacted the quality of service delivery but also placed unnecessary strain on staff productivity and customer satisfaction.
                        <br><br>
                        Some major challenges faced were:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => 'Unpredictable Visitor Flow',
                                'desc' => 'On some days, some departments were overloaded with work and assisting passengers, while others stayed underutilized. There was no centralized data showing which branch was busier or quieter, leading to long lines in certain locations.',
                                'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'
                            ],
                            [
                                'title' => 'Lack of Performance Visibility',
                                'desc' => 'The management team had no clear way to track how well different offices were doing. Each branch operated almost like its own island. There was no reporting system to compare performances, monitor workloads, or balance resources.',
                                'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'
                            ],
                            [
                                'title' => 'Long Wait Times',
                                'desc' => 'Without a <a href="https://qwaiting.com/solutions/queue-management-solution" class="text-indigo-600 underline">smart airport queue management solution</a>, wait times were untracked and unpredictable. Passengers sometimes waited too long, affecting satisfaction and even causing missed appointments or flights.',
                                'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                            ],
                            [
                                'title' => 'Employee Fatigue and Engagement Challenges',
                                'desc' => 'When staff didn’t know how many passengers to expect, it created sudden workload spikes. This led to stress, burnout, and mistakes, especially during rush hours.',
                                'icon' => 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z'
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
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{!! $problem['title'] !!}</h3>
                            <p class="text-gray-600 group-hover:text-gray-900 transition-colors">{!! $problem['desc'] !!}</p>
                        </div>
                    @endforeach
                </div>

                <p class="mt-12 text-lg text-gray-600 max-w-4xl mx-auto">Saudia Airlines knew something had to change. It wasn’t just about managing passengers - it was about delivering a better, smarter experience for both travelers and employees.</p>
            </div>
        </section>

        <!-- Solutions Implemented Section -->
        <section class="py-24 bg-gray-50 relative">
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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-6">How Qwaiting Helped
                        Streamline Travel Flow</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        To streamline operations across 12 offices, Qwaiting implemented smart solutions giving admin staff
                        full visibility and control.
                    </p>
                </div>

                <!-- Solution 1: Centralized dashboard -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="text-indigo-600 font-bold text-lg">Solution 01</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Centralized dashboard</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                To streamline operations across 12 offices, Qwaiting implemented a centralized dashboard,
                                giving admin staff full visibility and control from a single interface.
                            </p>
                            <p class="text-lg text-gray-700 mb-6">With real-time reports, staff members could easily:</p>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Analyze real-time updates from every branch</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Track staff performance</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Monitor passenger volumes and average wait
                                        times.</span>
                                </li>
                            </ul>
                            <p class="text-lg text-gray-700 mt-6">
                                These reports helped the executives to open more service counters if required to save
                                travelers' time.
                            </p>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="https://qwaiting.com/frontimg/saudia-airlines-centralized-dashboard-powered-by-qwaiting.jpg" alt="">
                        </div>
                    </div>
                </div>

                <!-- Solution 2: Visitor reporting page -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-1 lg:order-1">
                            <img src="{{ asset('website/asset/images/visitor_reporting.png') }}" alt="">
                        </div>
                        <div class="order-2 lg:order-2">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="text-blue-600 font-bold text-lg">Solution 02</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Visitor reporting page</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                We introduced a public reporting page for visitors, using which they can easily:
                            </p>
                            <ul class="space-y-4 mb-6">
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">View real-time queue status across branches</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Choose less crowded branches</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Avoid long, unnecessary wait times</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Encouraged informed decision-making</span>
                                </li>
                            </ul>
                            <p class="text-lg text-gray-700">
                                Now, instead of standing at one counter for multiple hours, travelers could easily open the
                                airline's webpage and select the less crowded counters to avail services.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Solution 3: Digital queuing -->
                <div class="">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="text-purple-600 font-bold text-lg">Solution 03</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Digital queuing</h3>
                            <p class="text-lg text-gray-700 mb-6">
                                To reduce congestion at check-in points, we implemented <a
                                    href="https://qwaiting.com/industries/airport-queue-system"
                                    class="text-indigo-600 underline">aviation check-in automation</a> through digital
                                queuing. Passengers could use <a href="https://qwaiting.com/products/self-service-kiosks"
                                    class="text-indigo-600 underline">kiosk machines</a> or their phones to:
                            </p>
                            <ul class="space-y-4 mb-6">
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Purchase or collect virtual tickets quickly</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Book tickets and print digital boarding
                                        passes</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">Easy seat upgrades or refunds</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-1">
                                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 text-lg">View estimated wait times & Receive real-time
                                        updates</span>
                                </li>
                            </ul>
                            <p class="text-lg text-gray-700">
                                This means no more standing in long lines or guessing when their turn would come.
                            </p>
                        </div>
                        <div class="order-1 lg:order-2">
                            <img src="https://qwaiting.com/frontimg/saudia-airlines-services-kiosk-menu.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quote/Transition Section -->
        <section class="py-20 bg-indigo-900 relative overflow-hidden">
            <div class="absolute inset-x-0 top-0 -z-10 transform-gpu overflow-hidden blur-3xl">
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]">
                </div>
            </div>
            <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
                <h3 class="text-2xl font-bold tracking-tight text-white sm:text-4xl mb-10">After a few weeks of implementation, the airline's operations were streamlined, and here’s what the President of Airport operations had to say:</h3>
                <p class="text-xl text-white italic font-light leading-relaxed mb-6">
                    “Partnering with Qwaiting has significantly enhanced our airport operations. From the moment we implemented their queue management system, we saw a reduction in wait times and improved passenger satisfaction scores across the board. What impressed us most was the real-time data insight, which helped us make smarter, faster decisions daily. Qwaiting doesn’t just offer a system; they deliver operational excellence.”
                </p>
                <div class="inline-block">
                    <p class="text-lg font-bold text-white">— Vice President of Airport Operations, Saudia Airlines</p>
                </div>
            </div>
        </section>

        <!-- Results Section -->
        <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Results After Implementing
                        Qwaiting</h2>
                    <p class="mt-4 text-lg text-gray-600">The results after implementing Qwaiting's smart solutions were nothing less than a success. Here's what changed:</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <div
                        class="group relative bg-gradient-to-br from-indigo-50 to-white p-8 rounded-3xl shadow-lg border border-indigo-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Dropped wait times</h3>
                        <p class="text-gray-600 group-hover:text-gray-900 transition-colors">
                            Within a few weeks of implementing smart solutions, travellers' wait times dropped to under 20
                            minutes. This reduced wait time reduced travel anxiety, and staff members could focus on
                            providing an exceptional travel experience.
                        </p>
                    </div>

                    <div
                        class="group relative bg-gradient-to-br from-indigo-50 to-white p-8 rounded-3xl shadow-lg border border-indigo-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Seamless visitor management</h3>
                        <p class="text-gray-600 group-hover:text-gray-900 transition-colors">
                            All the branches deal with 5000+ visitors daily. After using a smart queue management system for
                            airlines, the passenger flow became more organized. The offices and staff members no longer feel
                            overwhelmed, even during the peak travel season.
                        </p>
                    </div>

                    <div
                        class="group relative bg-gradient-to-br from-indigo-50 to-white p-8 rounded-3xl shadow-lg border border-indigo-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Maximized staff productivity</h3>
                        <p class="text-gray-600 group-hover:text-gray-900 transition-colors">
                            With the help of a centralized dashboard and passenger flow software, it is now easier for staff
                            members to track the customer journey. This allowed for better preparation, smoother shifts, and
                            improved morale. With less stress, they focused more on service quality.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- Conclusion Section -->
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div>
                    <!-- Main Content -->
                    <div class="">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Conclusion</h2>
                        <div class="space-y-4 text-gray-700 text-lg leading-relaxed">
                            <p>
                                Saudia Airlines didn’t just fix a queue problem; with Qwaiting, they turned long lines into
                                fast service and chaos into clarity. Now, passengers get served quicker, staff feel more
                                confident, and every branch runs like a well-oiled machine.
                            </p>
                            <p>
                                If your airline, office, or business is still stuck in long lines and slow service, it’s
                                time to take off like Saudia Airlines did. Stop guessing. Start managing smarter.
                            </p>
                            <p>
                                Ready to upgrade your customer flow? <a href="https://qwaiting.com/contact"
                                    class="text-indigo-600 hover:text-indigo-500 underline">Book your free demo today</a>
                                and transform your airport experience with Qwaiting.
                            </p>
                        </div>
                        <div class="mt-8">
                            <a href="https://qwaiting.com/signup"
                                class="inline-flex items-center justify-center rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                                Start Free Trial
                            </a>
                        </div>
                    </div>
                </div>
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