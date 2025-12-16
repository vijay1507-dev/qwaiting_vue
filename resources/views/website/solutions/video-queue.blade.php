@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-white">

        {{-- Hero Section --}}
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-b from-gray-50 to-white">
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[1000px] bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-0 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10 text-center">
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold leading-tight mb-6 tracking-tight text-gray-900">
                    Connect over video the moment <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">clients need you</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10">
                    Qwaiting allows you to join the video call in seconds without downloading any app or appointment booking.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="https://qwaiting.com/signup"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Start Free Trial</span>
                        <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </a>
                </div>

                {{-- Hero Image --}}
                <div class="relative mx-auto max-w-5xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm bg-white">
                        <img src="https://qwaiting.com/frontimg/video-queue.png" alt="Video Queue System"
                            class="w-full h-auto transform transition-transform hover:scale-[1.02] duration-700">
                    </div>
                </div>
            </div>
        </section>

                {{-- Global Trust Section --}}
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-6">Trusted by Leading Organizations Across Sectors</h2>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-hidden mb-16">
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
            </div>
        </section>

        {{-- How Video Queue Works --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">How Video Queue <span class="text-primary">Works?</span></h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Seamless flow from request to resolution.</p>
                </div>

                <div class="mt-20 grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                     {{-- Agent Side --}}
                    <div class="bg-white p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <img src="https://qwaiting.com/frontimg/for-agents.webp" alt="For Agents" class="w-full h-auto mb-8">
                        <h4 class="text-xl font-bold mb-4 flex items-center gap-2">
                            <span class="w-2 h-8 bg-primary rounded-full"></span>
                            For Agents
                        </h4>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-primary mt-1 font-bold">✓</span>
                                Open the Agent Console to view the real-time queue.
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-primary mt-1 font-bold">✓</span>
                                Call the next customer with one click. The customer joins instantly via their link.
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-primary mt-1 font-bold">✓</span>
                                Transfer or escalate to another agent or department when needed.
                            </li>
                             <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-primary mt-1 font-bold">✓</span>
                                Add notes, outcomes, and dispositions for accurate reporting.
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-primary mt-1 font-bold">✓</span>
                                Track SLAs with built-in timers, statuses, and performance dashboards.
                            </li>
                        </ul>
                    </div>

                     {{-- Customer Side --}}
                    <div class="bg-white p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <img src="https://qwaiting.com/frontimg/for-customers.webp" alt="For Customers" class="w-full h-auto mb-8">
                        <h4 class="text-xl font-bold mb-4 flex items-center gap-2">
                             <span class="w-2 h-8 bg-purple-500 rounded-full"></span>
                            For Customers
                        </h4>
                         <ul class="space-y-3">
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                Scan a QR code or click the link to the video queue page.
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                Select services and enter email address and name to receive a link.
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                Receive a message via mail or whatsapp when it's your turn.
                            </li>
                             <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                Join the session directly in the browser (No need to install any app).
                            </li>

                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                The queue screen will display live queue position and estimated wait time.
                            </li>
                        </ul>
                    </div>

                    {{-- Managers Side --}}
                    <div class="bg-white p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <img src="https://qwaiting.com/frontimg/for-managers.png" alt="For Managers" class="w-full h-auto mb-8">
                        <h4 class="text-xl font-bold mb-4 flex items-center gap-2">
                             <span class="w-2 h-8 bg-purple-500 rounded-full"></span>
                            For Managers
                        </h4>
                         <ul class="space-y-3">
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                View capacity and workloads across teams or branches.
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                Apply load balancing and priority rules (e.g., VIPs or scheduled callbacks).
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                Access detailed reports on wait times, handling times, and customer drop-offs.
                            </li>
                             <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-purple-500 mt-1">✓</span>
                                With Video Queue, every customer, agent, and manager gets a smarter experience.
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>


        {{-- Challenges Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white relative overflow-hidden">
             <!-- Background Elements -->
            <div class="absolute top-0 right-0 p-12 opacity-10">
                <svg width="404" height="404" fill="none" viewBox="0 0 404 404"><defs><pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect></pattern></defs><rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect></svg>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-bold mb-6">Built for Real-World <span class="text-primary">Challenges</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto text-lg">Why traditional methods are failing.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {{-- Challenge 1 --}}
                    <div class="glass-card bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100 p-8 transition-all hover:-translate-y-2">
                        <img src="https://qwaiting.com/frontimg/appointments-rarely-fit-the-slot.svg" alt="Icon" class="w-16 h-16 mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-black">Appointments rarely fit</h3>
                        <p class="text-gray-800 text-sm leading-relaxed">Fixed bookings don't match real conversations. Overruns cause delays, short calls waste time. Video queue adapts dynamically so long calls.</p>
                    </div>

                    {{-- Challenge 2 --}}
                    <div class="glass-card p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100 transition-all hover:-translate-y-2">
                        <img src="https://qwaiting.com/frontimg/download-fatigue-kills-show-up-rates.svg" alt="Icon" class="w-16 h-16 mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-black">Download fatigue kills show-up rates</h3>
                        <p class="text-gray-800 text-sm leading-relaxed">Customers shouldn't need Zoom, Teams, or Meet for quick support. With Qwaiting, it's 100% browser-based. Tap the link, join instantly.</p>
                    </div>

                    {{-- Challenge 3 --}}
                     <div class="glass-card p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100 transition-all hover:-translate-y-2">
                         <img src="https://qwaiting.com/frontimg/poor-visibility-drives-abandonment.svg" alt="Icon" class="w-16 h-16 mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-black">Poor visibility drives abandonment</h3>
                        <p class="text-gray-800 text-sm leading-relaxed">When people can't see progress, they leave. Live queue and ETA keep customers engaged and reduce drop-offs.</p>
                    </div>

                     {{-- Challenge 4 --}}
                    <div class="glass-card p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100 transition-all hover:-translate-y-2">
                         <img src="https://qwaiting.com/frontimg/operational-complexity.svg" alt="Icon" class="w-16 h-16 mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-black">Operational complexity</h3>
                        <p class="text-gray-800 text-sm leading-relaxed">Multi-branch or multilingual? Video queue routes customers efficiently, balances workloads, and enforces SLAs — without requiring manual calendar juggling.</p>
                    </div>
                </div>
            </div>
        </section>


        {{-- Problem & Solution Split --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                {{-- Problem --}}
                <div class="mb-15 text-center">
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">The Problem with Traditional Video</h2>
                            <p class="text-gray-700 leading-relaxed text-lg">
                                Traditional video calls can be rigid. Meetings run late, leaving agents idle. Requiring app downloads adds friction, slowing down support.
                            </p>
                </div>

                {{-- Solution --}}
                 <div class="flex flex-col lg:flex-row items-center gap-16">
                     <div class="lg:w-1/2">
                         <img src="https://qwaiting.com/frontimg/connect-instantly.webp" class="rounded-3xl shadow-2xl w-full hover:scale-[1.02] transition-transform duration-500" alt="Connect Instantly">
                     </div>
                     <div class="lg:w-1/2 space-y-8">
                         <h2 class="text-4xl font-bold text-gray-900">Skip Scheduled Calls: <span class="text-primary">Connect Instantly</span></h2>
                         <p class="text-lg text-gray-600">Qwaiting's advanced video queue removes confusion by letting customers join in real time.</p>
                         
                         <ul class="space-y-4">
                             @foreach(['No app or downloads needed', 'Join calls instantly, no booking', 'Receive call links via email or SMS', 'Access from any browser', 'See real-time queue updates'] as $item)
                            <li class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs font-bold">✓</span>
                                <span class="text-gray-700 font-medium">{{ $item }}</span>
                            </li>
                            @endforeach
                         </ul>
                     </div>
                 </div>
            </div>
        </section>

        {{-- Key Features --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Key Features</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">01</div>
                        <div
                            class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-blue-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/no-appointments-required.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">No Appointments Required</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Walk-in style, 24/7/always-on or business-hours only.</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">02</div>
                        <div
                            class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-purple-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/instant-video-link.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Instant Video Link</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Secure, browser-based, single-tap access for customers.</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-green-100">03</div>
                        <div
                            class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-green-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/instant-video-link.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Live Queue Position</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Keep expectations clear, reduce uncertainty and drop-offs.</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-orange-100">04</div>
                        <div
                            class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-orange-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/no-downloads-needed.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">No Downloads Needed</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Works seamlessly on Chrome, Safari, Edge, Firefox across devices.</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-pink-50 to-white rounded-3xl border border-pink-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-pink-100">05</div>
                        <div
                            class="w-16 h-16 bg-pink-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-pink-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/smart-notifications.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Smart Notifications</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Email/SMS confirmations, live queue updates, and join prompts.</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-indigo-50 to-white rounded-3xl border border-indigo-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-indigo-100">06</div>
                        <div
                            class="w-16 h-16 bg-indigo-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-indigo-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/callbacks-and-hold-options.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Callbacks & Hold Options</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Let users keep their place or request a callback.</p>
                    </div>

                     <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">07</div>
                        <div
                            class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-blue-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/agent-tools.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Agent Tools</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Warm transfer, notes, tags, and quick replies for efficient handling.</p>
                    </div>

                    <div
                        class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                        <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">08</div>
                        <div
                            class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-6 text-primary group-hover:bg-purple-500 transition-colors">
                            <img src="https://qwaiting.com/frontimg/admin-controls.svg" alt="">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Admin Controls</h3>
                        <p class="text-gray-600 leading-relaxed relative z-10">Define hours, holidays, capacity caps, and SLA targets.</p>
                    </div>
                </div>
            </div>
        </section>

         {{-- Visualization Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto space-y-24">
                
                {{-- Agent View --}}
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-6">
                        <span class="text-primary font-semibold tracking-wide uppercase text-sm">Efficiency</span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">What the Agent Sees</h2>
                        <p class="text-lg text-gray-600">Agents stay focused, resolve faster, and deliver better service without juggling calendars.</p>
                        <div class="h-1 w-20 bg-primary/20 rounded-full"></div>
                    </div>
                     <div class="lg:w-1/2 relative">
                        <div class="absolute inset-0 bg-blue-100 rounded-3xl -rotate-2 transform scale-105"></div>
                        <img src="https://qwaiting.com/frontimg/what-the-agent-sees.png" class="relative rounded-3xl shadow-lg w-full" alt="Agent View">
                    </div>
                </div>

                {{-- Customer View --}}
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="lg:w-1/2 space-y-6">
                        <span class="text-primary font-semibold tracking-wide uppercase text-sm">User Experience</span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">What the Customer Sees</h2>
                        <p class="text-lg text-gray-600">Customers know exactly where they stand, how long it will take, and when to join, without apps, confusion, or frustration.</p>
                        <div class="h-1 w-20 bg-primary/20 rounded-full"></div>
                    </div>
                     <div class="lg:w-1/2 relative">
                        <div class="absolute inset-0 bg-green-100 rounded-3xl rotate-2 transform scale-105"></div>
                        <img src="https://qwaiting.com/frontimg/what-the-customer-sees.png" class="relative rounded-3xl shadow-lg w-full" alt="Customer View">
                    </div>
                </div>

            </div>
        </section>

        {{-- Why Choose Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">

                {{-- Heading --}}
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">How Video Queue Beats </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">
                           Scheduled Appointments 
                        </span>
                    </h2>
                </div>

                {{-- 2 Column Layout --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    {{-- LEFT COLUMN – Feature List --}}
                    <div class="space-y-6">

                    {{-- Smart Flow Management --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-blue-50 rounded-xl">
                            {{-- Icon: Arrows for flow --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.25 6.75L21 10.5l-3.75 3.75M3 6.75h14.25M6.75 17.25L3 13.5l3.75-3.75M21 17.25H6.75" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Customer Effort</h3>
                            <p class="text-gray-600 text-sm">Download apps, juggle calendars Open link, join instantly in browser</p>
                        </div>
                    </div>

                    {{-- Easy to Use --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-purple-50 rounded-xl">
                            {{-- Icon: Checkmark for ease --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Time Fit</h3>
                            <p class="text-gray-600 text-sm">Overruns/underruns disrupt the day adapts to actual conversation length</p>
                        </div>
                    </div>

                    {{-- Effortless Compatibility --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-green-50 rounded-xl">
                            {{-- Icon: Puzzle piece for compatibility --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M11 5.882A2.882 2.882 0 118.118 3 2.882 2.882 0 0111 5.882zm2 4.353h3.765a2.5 2.5 0 110 5H13v3.765a2.5 2.5 0 11-5 0V15H4.235a2.5 2.5 0 110-5H8V6.235a2.5 2.5 0 115 0V10.235z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Visibility</h3>
                            <p class="text-gray-600 text-sm">Delays unclear live position + ETA always visible</p>
                        </div>
                    </div>

                    {{-- Tailored to Your Style --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-amber-50 rounded-xl">
                            {{-- Icon: Adjustments for customization --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-amber-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M10.5 6h9m-9 12h9m-15-6h15M6 6v.01M6 18v.01M6 12v.01" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">No-Shows</h3>
                            <p class="text-gray-600 text-sm">High (due to friction) Low (instant browser link, no install)</p>
                        </div>
                    </div>

                    {{-- Works on Any Device --}}
                    <div class="flex gap-4 p-4 bg-white rounded-2xl shadow-md border border-gray-100">
                        <div class="flex items-center justify-center w-11 h-11 bg-teal-50 rounded-xl">
                            {{-- Icon: Devices --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-teal-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.75 17h4.5m-8.25 4.5h12a2.25 2.25 0 002.25-2.25V5.25A2.25 2.25 0 0018 3H6a2.25 2.25 0 00-2.25 2.25v14A2.25 2.25 0 006 21.5zM8.25 3v-.75A.75.75 0 019 1.5h6a.75.75 0 01.75.75V3" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Ops Control</h3>
                            <p class="text-gray-600 text-sm">Rigid scheduling flexible, dynamic routing & capacity.</p>
                        </div>
                    </div>

                </div>


                    {{-- RIGHT COLUMN – Hero Image --}}
                    <div class="flex justify-center">
                        <div class="rounded-3xl overflow-hidden shadow-lg border-4 border-blue-200">
                            <img src="https://qwaiting.com/frontimg/appointment-scheduling.png" class="w-full h-full object-cover" alt="Why Choose Us Image">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Use Cases --}}
       <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto text-center">
                
                <h2 class="text-4xl font-bold mb-16 text-gray-900">Use Cases</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Banking & Financial -->
                    <div class="flex flex-col items-center bg-white rounded-3xl p-8 hover:bg-white hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 mb-6">
                            <img src="https://qwaiting.com/images/industry-bank.png" alt="Banking & Financial" class="w-full h-full object-contain transition-all">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Banking & Financial</h3>
                        <p class="text-gray-600">Remote teller, loan desk, KYC checks.</p>
                    </div>

                    <!-- Healthcare & Insurance -->
                    <div class="flex flex-col items-center bg-white rounded-3xl p-8 hover:bg-white hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 mb-6">
                            <img src="https://qwaiting.com/images/hospital-icon.png" alt="Healthcare & Insurance" class="w-full h-full object-contain transition-all">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Healthcare & Insurance</h3>
                        <p class="text-gray-600">Member inquiries, pre-visit triage.</p>
                    </div>

                    <!-- Government -->
                    <div class="flex flex-col items-center bg-white rounded-3xl p-8 hover:bg-white hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 mb-6">
                            <img src="https://qwaiting.com/images/industry-icon8.png" alt="Government" class="w-full h-full object-contain transition-all">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Government</h3>
                        <p class="text-gray-600">Permits, compliance, helpdesks.</p>
                    </div>

                    <!-- Education -->
                    <div class="flex flex-col items-center bg-white rounded-3xl p-8 hover:bg-white hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 mb-6">
                            <img src="https://qwaiting.com/images/appointment-icon.png" alt="Education" class="w-full h-full object-contain transition-all">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Education</h3>
                        <p class="text-gray-600">Admissions, registrar support.</p>
                    </div>

                    <!-- Retail -->
                    <div class="flex flex-col items-center bg-white rounded-3xl p-8 hover:bg-white hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 mb-6">
                            <img src="https://qwaiting.com/images/retail-icon.png" alt="Retail" class="w-full h-full object-contain transition-all">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Retail</h3>
                        <p class="text-gray-600">Warranty verification, claims support.</p>
                    </div>

                    <!-- IT Helpdesks -->
                    <div class="flex flex-col items-center bg-white rounded-3xl p-8 hover:bg-white hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 mb-6">
                            <img src="https://qwaiting.com/images/cloud-based-img.png" alt="IT Helpdesks" class="w-full h-full object-contain transition-all">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">IT Helpdesks</h3>
                        <p class="text-gray-600">Instant troubleshooting, onboarding.</p>
                    </div>

                </div>

                <div class="mt-12">
                    <a href="/industries" class="text-primary font-semibold hover:underline">
                        See All Industries →
                    </a>
                </div>

            </div>
        </section>


       {{-- CTA / Go Live --}}
       <section class="py-20 px-6">
            <div class="mx-auto rounded-[3rem] text-black p-12 lg:p-20 relative overflow-hidden text-center">
                <div class="relative z-10">
                    
                    <h2 class="text-4xl lg:text-5xl font-bold mb-12">Go Live in Minutes, Not Months</h2>

                    <div class="grid lg:grid-cols-2 gap-6">
                        <img src="https://qwaiting.com/frontimg/go-live-in-minutes.png" alt="">
                        <!-- Cards Grid -->
                        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8 mb-16">

                            <!-- Card 1 -->
                            <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-lg border border-gray-100
                                        hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-left">
                                <h4 class="font-bold text-black mb-2 text-lg">Simple Setup</h4>
                                <p class="text-black/70 text-sm">Share a link or embed widget in minutes.</p>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-lg border border-gray-100
                                        hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-left">
                                <h4 class="font-bold text-black mb-2 text-lg">Custom Branding</h4>
                                <p class="text-black/70 text-sm">Add your logo and colors instantly.</p>
                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-lg border border-gray-100
                                        hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-left">
                                <h4 class="font-bold text-black mb-2 text-lg">Flexible Ops</h4>
                                <p class="text-black/70 text-sm">Define hours, capacity, and rules.</p>
                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-lg border border-gray-100
                                        hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-left">
                                <h4 class="font-bold text-black mb-2 text-lg">Integrations</h4>
                                <p class="text-black/70 text-sm">Connect with CRM & helpdesk.</p>
                            </div>

                        </div>
                    </div>
                    <!-- CTA Button -->
                    <a href="/signup" class="inline-block bg-primary text-white font-bold py-4 px-10 rounded-full hover:shadow-2xl hover:scale-105 transition-transform duration-300">
                        Get Started Now
                    </a>
                </div>

            </div>
        </section>


       {{-- FAQ --}}
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
                            <span class="text-lg font-semibold text-gray-900">Do customers need to install anything?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                           No. Qwaiting Video Queue runs entirely in the browser—on mobile or desktop. No apps, no downloads.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">How do customers know when it's their turn?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            They see their live queue position and estimated wait time on the queue page. When it's time, they get an email/SMS with a secure link to join instantly.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can we offer a callback instead of making customers wait?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Callbacks can be enabled so customers keep their place in line without staying online.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">What about bandwidth and device compatibility?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Video Queue adapts quality automatically based on network conditions. Any modern browser/device works seamlessly.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can we record sessions?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Recording is optional (and only where legally permitted). Admins can enable/disable it per service.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Does it integrate with our existing systems?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Absolutely. Use APIs/webhooks to sync tickets, notes, and analytics with your CRM, helpdesk, or EMR.
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl shadow-sm overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
                            <span class="text-lg font-semibold text-gray-900">Can we still use scheduled appointments?</span>
                            <svg class="w-6 h-6 text-purple-600 transform transition-transform duration-300"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. Many teams run both—using Video Queue for instant, walk-in style support and scheduled slots for planned consultations.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-primary text-white text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Give customers answers now—not next Day.</h2>
            <a href="/signup"
                class="inline-block bg-white text-primary font-bold py-4 px-10 rounded-lg hover:bg-primary/80 transition-all shadow-xl hover:-translate-y-1">Start Free Trial</a>
            
            <a href="/contact"
                class="inline-block bg-white text-primary font-bold py-4 px-10 rounded-lg hover:bg-primary/80 transition-all shadow-xl hover:-translate-y-1">Book a Demo</a>
        </div>
    </section>

    </div>
@endsection
