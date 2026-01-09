@extends('website.layout.website')

@section('title', 'Pricing - Qwaiting')
@section('meta_description', 'Choose the right plan for your business. Flexible pricing for queue management and appointment booking systems.')

@section('content')
<div class="font-sans antialiased text-gray-900 bg-white selection:bg-primary selection:text-white">

    {{-- Hero Header --}}
    <div class="pt-32 pb-16 text-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl lg:text-7xl font-bold tracking-tight text-gray-900 mb-6">
            Enterprise-Ready Plans <span class="text-primary">Built for Every Business Need</span>
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Whether you're scaling across locations or optimizing a single branch, Qwaiting offers flexible, cost-effective plans that grow with you.
        </p>
        <div class="flex justify-center items-center gap-4 mt-10">
            <a href="/signup"><button
                    class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition cursor-pointer p-6">
                    Start Your Free Trial
                </button></a>
            <a href="/contact"><button
                    class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition cursor-pointer p-6">
                    Contact Us
                </button></a>
        </div>
    </div>

    {{-- Main Pricing Grid --}}
    <section class="py-20 bg-gray-50" x-data="{ annual: true }">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-4">Pricing Plans</h2>
            <p class="text-center text-gray-600 mb-12">Choose the plan that fits your organisation</p>
            {{-- Billing Toggle --}}
            <div class="mt-10 flex justify-center items-center space-x-4 mb-4">
                <span class="text-base font-medium"
                    :class="{ 'text-gray-900': !annual, 'text-gray-500': annual }">Monthly</span>
                <button class="relative rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                    @click="annual = !annual">
                    <div class="w-16 h-8 transition bg-primary rounded-full shadow-md outline-none"></div>
                    <div class="absolute inline-flex items-center justify-center w-5 h-5 transition-all duration-200 ease-in-out transform bg-white rounded-full shadow-sm top-1 left-1"
                        :class="{ 'translate-x-8': annual, 'translate-x-0': !annual }"></div>
                </button>
                <span class="text-base font-medium" :class="{ 'text-gray-900': annual, 'text-gray-500': !annual }">
                    Yearly
                </span>
            </div>
            <p class="text-center text-gray-600 mb-12 font-bold">Bill monthly / Bill annually and get 2 months free!</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach($packages as $package)
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all border border-gray-200 {{ $package['is_most_popular'] ? 'relative border-2 border-purple-500 shadow-xl hover:shadow-2xl' : '' }}">
                    @if($package['is_most_popular'])
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-purple-600 text-white text-xs font-semibold py-1 px-4 rounded-full shadow">
                        Popular Choice
                    </span>
                    @endif

                    <h3 class="text-2xl font-semibold mb-6 text-gray-800 text-center">{{ $package['name'] }}</h3>

                    @if($package['subtitle'])
                    <p class="text-center text-gray-600 mb-4">{{ $package['subtitle'] }}</p>
                    @endif

                    @if($package['trial_days'] && $package['trial_days'] > 0)
                    <div class="mb-4 text-center">
                        <span class="inline-flex items-center gap-2 bg-green-50 text-green-700 px-4 py-2 rounded-full text-sm font-semibold border border-green-200">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $package['trial_days'] }} Day{{ $package['trial_days'] > 1 ? 's' : '' }} Free Trial
                        </span>
                    </div>
                    @endif

                    <div class="mb-6 text-center">
                        @if($package['monthly_price'] || $package['annual_price'])
                        <div x-show="!annual" class="text-3xl font-bold text-gray-900">
                            @if($package['monthly_price'])
                            {{ $currency }} {{ number_format($package['monthly_price'], 2) }}
                            @else
                            <span class="text-gray-400">N/A</span>
                            @endif
                        </div>
                        <div x-show="annual" class="text-3xl font-bold text-gray-900">
                            @if($package['annual_price'])
                            {{ $currency }} {{ number_format($package['annual_price'], 2) }}
                            @else
                            <span class="text-gray-400">N/A</span>
                            @endif
                        </div>
                        @else
                        <div class="text-3xl font-bold text-gray-900">Contact Us</div>
                        @endif
                    </div>

                    <ul class="space-y-4 text-gray-700 mb-8">
                        @foreach($package['features'] as $feature)
                        @if($feature['included'])
                        <li class="flex items-center gap-2">
                            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-primary">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>
                                {{ $feature['name'] }}
                                @if($feature['limit_type'] === 'limited' && $feature['data_type'] === 'Number' && is_numeric($feature['limit_value']) && $feature['limit_value'] > 0)
                                upto {{ $feature['limit_value'] }}
                                @elseif($feature['limit_type'] === 'limited' && $feature['data_type'] === 'Text' && !empty($feature['limit_value']))
                                {{ $feature['limit_value'] }}
                                @endif
                            </span>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                    @if($package['is_enquiry'])
                    <a href="/contact">
                        <button class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition cursor-pointer">
                            Enquiry
                        </button>
                    </a>
                    @else

                    <a :href="'/signup?package_id={{ $package['id'] }}&billing_cycle=' + (annual ? 'annual' : 'monthly')">
                        <button class="w-full bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition cursor-pointer">
                            Sign Up
                        </button>
                    </a>
                    @endif
                    <a href="#compare_plans">
                        <p class="text-sm text-center text-purple-600 mt-3 cursor-pointer hover:underline">or See features ↓</p>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>


    {{-- Plan Comparison - Modern Layout --}}
    <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-purple-50" id="compare_plans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Compare Plans</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Choose the perfect plan with all the features you
                    need</p>
            </div>

            {{-- Feature Categories --}}
            <div class="space-y-8">
                {{-- Plan Headers (Sticky on scroll) --}}
                <div
                    class="top-20 z-10 bg-white/95 backdrop-blur-sm rounded-2xl p-6 border border-gray-200" style="margin-bottom: 0px;">
                    <div class="grid gap-4 items-center" style="grid-template-columns: 1fr repeat({{ count($packages) }}, 1fr);">
                        <div>
                            <span class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Plans</span>
                        </div>

                        @foreach($packages as $index => $package)
                        @php
                        $colors = [
                        ['bg-purple-50', 'border-purple-200', 'text-purple-900'],
                        ['bg-orange-50', 'border-orange-200', 'text-orange-900'],
                        ['bg-purple-100', 'border-purple-300', 'text-purple-900'],
                        ['bg-green-50', 'border-green-200', 'text-green-900'],
                        ];
                        $colorIndex = $index % count($colors);
                        $isPopular = $package['is_most_popular'];
                        @endphp
                        <div class="text-center">
                            <div class="inline-block {{ $colors[$colorIndex][0] }} rounded-xl px-4 py-3 border-2 {{ $colors[$colorIndex][1] }} {{ $isPopular ? 'shadow-md' : '' }}">
                                <h4 class="text-lg font-bold {{ $colors[$colorIndex][2] }}">{{ $package['name'] }}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if(!empty($comparisonData))
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="divide-y divide-gray-100">
                        @foreach($comparisonData as $feature)
                        <div class="grid gap-4 p-4 hover:bg-gray-50 transition-colors" style="grid-template-columns: 1fr repeat({{ count($packages) }}, 1fr);">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $feature[0] }}</span>
                            </div>

                            @for($i = 1; $i <= count($packages); $i++)
                                <div class="flex items-center justify-center">
                                @if(isset($feature[$i]))
                                @if($feature[$i] === true)
                                <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                @elseif($feature[$i] === false)
                                <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                @elseif(is_string($feature[$i]) && is_numeric($feature[$i]))
                                <span class="text-sm font-bold text-purple-600">{{ $feature[$i] }}</span>
                                @else
                                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">{{ $feature[$i] }}</span>
                                @endif
                                @else
                                <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                @endif
                        </div>
                        @endfor
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

</div>
</section>


{{-- FAQ Section --}}
<section class="py-24 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-500">Everything you need to know about our pricing and plans.</p>
        </div>

        <div class="space-y-4">
            {{-- FAQ Item --}}
            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">Do I need to enter credit card details? </span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    No. Scheduling your 14-day demo doesn’t require a credit card. It’s commitment-free and built to help you evaluate Qwaiting without friction.
                </div>
            </div>

            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">What hardware or OS does Qwaiting support?</span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    Qwaiting is fully platform-agnostic. It runs seamlessly on Windows, macOS, Android, iOS, Linux, and major cloud ecosystems like AWS and Azure. We support all enterprise-grade hardware.
                </div>
            </div>

            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">Is software installation required? </span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    Not at all. Qwaiting is a 100% web-based SaaS solution. No downloads or installations needed, for you or your customers. Manage queues securely via browser or integrate via our robust APIs.
                </div>
            </div>

            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">Which plan is right for my business?</span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    It depends on your use case. Growing businesses typically choose the Business plan for its advanced control and integrations. Large enterprises benefit most from the Enterprise plan with full customization, multi-location support, and SSO. Our team is happy to help assess your needs and recommend the best fit.
                </div>
            </div>

            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">Can I cancel or change plans later? </span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    Yes. You can cancel, upgrade, or downgrade your plan anytime via your admin dashboard. For personalized guidance, our support team is always here to assist.
                </div>
            </div>

            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">What payment methods are accepted?</span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    We support secure multi-channel payments via credit cards, Stripe, PayPal, and direct bank transfers. Select the method that suits your enterprise best.
                </div>
            </div>

            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">What kind of support do I receive?</span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    All plans include 24/7 enterprise support with access to a dedicated account manager, live chat, email, and priority SLA-based assistance.
                </div>
            </div>

            <div x-data="{ open: false }" class="border-b border-gray-200 pb-4 pt-4">
                <button class="flex items-center justify-between w-full text-left focus:outline-none"
                    @click="open = !open">
                    <span class="text-lg font-medium text-gray-900">Are product updates included in my plan? </span>
                    <span class="ml-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div x-show="open" x-collapse style="display: none;" class="mt-4 text-gray-600 leading-relaxed">
                    Yes. Every plan comes with automatic product updates, feature enhancements, and security improvements, at no extra cost. Stay current without lifting a finger.
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