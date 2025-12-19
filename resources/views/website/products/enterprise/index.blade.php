@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-slate-50 via-white to-slate-50">

        {{-- Hero Section with Image --}}
        <section class="relative pt-32 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-50 opacity-60"></div>
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/5 to-transparent"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-primary/10 to-purple-500/10 rounded-full border border-primary/20 backdrop-blur-sm">
                            <span class="relative flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                            </span>
                            <span class="text-primary font-semibold text-sm">Enterprise Solution</span>
                        </div>

                        <h1 class="text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight">
                            <span class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent">Queue Management and</span>
                            <br>
                            <span class="bg-gradient-to-r from-primary via-purple-600 to-primary bg-clip-text text-transparent">Customer Flow for Enterprises</span>
                        </h1>

                        <p class="text-xl text-gray-600 leading-relaxed">
                            Take control of customer flow with smart queue management. Empower your team with real-time dashboards, automate notifications and deliver fast, efficient experiences modern customers expect.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="/signup" class="group relative px-8 py-4 bg-gradient-to-r from-primary to-purple-600 text-white rounded-2xl font-semibold shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-0.5 transition-all duration-300">
                                <span class="flex items-center gap-2">
                                    Start Free Trial
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </span>
                            </a>
                            <a href="/solutions/queue-management-solution" class="px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:border-primary hover:text-primary hover:-translate-y-0.5 transition-all duration-300">
                                View Solutions
                            </a>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-primary/20">
                            <img src="{{ asset('website/asset/images/dashboard-screen.png') }}" alt="Enterprise Dashboard" class="w-full">
                        </div>
                        <div class="absolute -top-6 -right-6 w-40 h-40 bg-gradient-to-br from-primary/20 to-purple-600/20 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-6 -left-6 w-40 h-40 bg-gradient-to-br from-blue-400/20 to-primary/20 rounded-full blur-3xl"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Stats Grid --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Improve the customer </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">service process</span>
                    </h2>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['value' => '25%', 'label' => 'Reduction in wait times', 'color' => 'purple'],
                        ['value' => '90%', 'label' => 'Customer satisfaction rate', 'color' => 'purple'],
                        ['value' => '30%', 'label' => 'More customers served daily', 'color' => 'purple'],
                        ['value' => '40%', 'label' => 'Improvement in staff efficiency', 'color' => 'purple']
                    ] as $stat)
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-{{ $stat['color'] }}-500/10 to-{{ $stat['color'] }}-600/5 rounded-3xl transform group-hover:scale-105 transition-transform duration-300"></div>
                        <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-3xl border border-{{ $stat['color'] }}-100 hover:border-{{ $stat['color'] }}-200 transition-all">
                            <div class="text-5xl font-bold bg-gradient-to-r from-{{ $stat['color'] }}-600 to-{{ $stat['color'] }}-700 bg-clip-text text-transparent mb-2">{{ $stat['value'] }}</div>
                            <p class="text-gray-600 font-medium">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-slate-50 to-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Enterprise </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Features</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                    $features = [
                        ['title' => 'Making work easier for staff', 'icon' => 'https://qwaiting.com/frontimg/making-work-easier-for-staff.png', 'items' => ['Centralized queue oversight', 'Smart customer routing', 'Real-time service tracking', 'Performance analytics dashboard']],
                        ['title' => 'More insights for managers', 'icon' => 'https://qwaiting.com/frontimg/more-insights-for-managers.png', 'items' => ['Real-time operational dashboards', 'Peak hour and traffic analysis', 'Service efficiency reports', 'Customer behavior patterns']],
                        ['title' => 'Informing the queue', 'icon' => 'https://qwaiting.com/frontimg/Informing-the-queue.png', 'items' => ['Automated SMS and push alerts', 'Digital display board integration', 'Voice announcement systems', 'Multi-language support']],
                        ['title' => 'Service Analytics', 'icon' => 'https://qwaiting.com/frontimg/service-analytics.png', 'items' => ['Average wait time monitoring', 'Service efficiency tracking', 'Customer satisfaction scores', 'Queue abandonment analytics']],
                        ['title' => 'Enterprise-level security', 'icon' => 'https://qwaiting.com/frontimg/enterprise-level-security.png', 'items' => ['AES-256 Encryption', 'GDPR and HIPAA compliant', 'Role-based access control (RBAC)', 'SOC 2 Type II certified']],
                        ['title' => 'Supporting rollout', 'icon' => 'https://qwaiting.com/frontimg/supporting-rollout.png', 'items' => ['Quick setup in days', 'Personalized onboarding', '24/7 technical support', 'Dedicated account manager', 'Hardware integration', 'Custom branding']]
                    ];
                    @endphp

                    @foreach($features as $index => $feature)
                    <div class="group relative bg-white rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/30">
                        <div class="w-full h-60 bg-gradient-to-br from-primary to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg shadow-primary/20">
                            <img src="{{ $feature['icon'] }}" alt="{{ $feature['title'] }}" class="w-full h-full text-white">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $feature['title'] }}</h3>
                        <ul class="space-y-3">
                            @foreach($feature['items'] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Testimonials --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Trusted by </span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Industry Leaders</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-3xl transform group-hover:scale-105 transition-transform"></div>
                        <div class="relative bg-white border border-blue-100 rounded-3xl p-10 hover:shadow-2xl transition-all">
                            <div class="flex items-center gap-4 mb-6">
                                <img src="{{ asset('website/asset/images/apollo_hospitals.jpg') }}" alt="Apollo Hospitals" class="w-16 h-16 rounded-2xl object-cover">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">Healthcare</h3>
                                    <p class="text-sm text-gray-500">Apollo Hospitals</p>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed text-lg">
                                With Qwaiting, Apollo Hospitals has transformed patient flow management across all our branches. The integration with our HIS reduced staff workload significantly, and patients now enjoy shorter wait times and a smoother hospital journey.
                            </p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 rounded-3xl transform group-hover:scale-105 transition-transform"></div>
                        <div class="relative bg-white border border-purple-100 rounded-3xl p-10 hover:shadow-2xl transition-all">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">Education</h3>
                                    <p class="text-sm text-gray-500">University</p>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed text-lg">
                                Qwaiting has transformed how we manage student and staff visits across multiple teams. We can now see real-time metrics, allocate our resources efficiently, and offer a smooth experience to students.
                            </p>
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

        {{-- Trust Badges --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-slate-50 to-white">
            <div class="max-w-5xl mx-auto">
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach([
                        ['rating' => '4.8', 'platform' => 'Capterra'],
                        ['rating' => '4.8', 'platform' => 'GetApp'],
                        ['rating' => '4.7', 'platform' => 'G2']
                    ] as $badge)
                    <div class="bg-white rounded-3xl p-8 text-center hover:shadow-2xl transition-all border border-gray-100">
                        <div class="flex justify-center mb-4">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-6 h-6 {{ $i < 4 || ($badge['rating'] >= 4.5 && $i == 4) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @endfor
                        </div>
                        <div class="text-4xl font-bold text-gray-900 mb-2">{{ $badge['rating'] }}</div>
                        <div class="text-gray-600 font-medium">stars on {{ $badge['platform'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-primary via-purple-600 to-primary relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yLjIxLTEuNzktNC00LTRzLTQgMS43OS00IDQgMS43OSA0IDQgNCA0LTEuNzkgNC00em0wLTEwYzAtMi4yMS0xLjc5LTQtNC00cy00IDEuNzktNCA0IDEuNzkgNCA0IDQgNC0xLjc5IDQtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-10"></div>
            <div class="max-w-4xl mx-auto text-center relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Data-driven decisions to improve your customer service
                </h2>
                <p class="text-xl text-white/90 mb-8">
                    Join hundreds of organizations delivering exceptional service experiences with intelligent queue management
                </p>
                <a href="/signup" class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Start 14-Day Free Trial</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <p class="text-xl text-white/90 mt-8">No cedit card required</p>
            </div>
        </section>

    </div>
@endsection
