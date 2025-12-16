@extends('website.index')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-violet-100 selection:text-violet-700">

        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 overflow-hidden bg-gradient-to-b from-violet-50/50 to-white lg:pt-40 lg:pb-32">
            <!-- Background Decorations -->
            <div
                class="absolute top-0 left-0 -ml-20 -mt-20 w-96 h-96 bg-gradient-to-br from-purple-100 to-violet-100 rounded-full blur-3xl opacity-50">
            </div>
            <div
                class="absolute bottom-0 right-0 -mr-20 -mb-20 w-80 h-80 bg-gradient-to-tr from-fuchsia-100 to-pink-100 rounded-full blur-3xl opacity-50">
            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                    <!-- Content Column -->
                    <div class="space-y-8 animate-fade-in-up">
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full border border-violet-100 bg-violet-50 text-violet-600 text-sm font-medium">
                            <span class="flex h-2 w-2 rounded-full bg-violet-600 mr-2"></span>
                            Essential Features Guide
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tight text-gray-900 leading-tight">
                            8 Queue Management <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-500">Features</span>
                            Your Business Requires
                        </h1>

                        <div class="space-y-6 text-lg text-gray-600">
                            <p class="leading-relaxed">
                                Queueing can be smooth if you’re using the right tools. Tools that allow you to control your
                                queue through a centralized dashboard. Enable you to handle staff, give you real-time
                                information on queue status and trends.
                            </p>
                            <p
                                class="leading-relaxed border-l-4 border-violet-500 pl-4 italic bg-violet-50/50 py-2 pr-2 rounded-r-lg">
                                So, are you currently looking for a new queue management system? If so, then this ebook from
                                Queue Management System Experts is for you.
                            </p>
                            <p class="text-base text-gray-500">
                                This free Ebook lists 8 features that you should look for while choosing a queuing software
                                that will best suit your needs.
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <a href="/asset/pdf/queue-waiting.pdf"
                                class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold text-white transition-all duration-200 bg-violet-600 border border-transparent rounded-full shadow-lg hover:bg-violet-700 hover:shadow-violet-500/30 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-600" download>
                                Download Free E-Book
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="relative lg:h-auto animate-fade-in-right">
                        <!-- Decorative Blob -->
                        <div
                            class="absolute -inset-4 bg-gradient-to-r from-violet-500 to-fuchsia-500 rounded-2xl opacity-20 blur-2xl">
                        </div>

                        <div
                            class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-100 bg-white transform transition-transform hover:scale-[1.02] duration-500">
                            <img src="https://qwaiting.com/images/qwaiting-management-ebook.png"
                                alt="8 Queue Management Features Ebook" class="w-full h-auto object-cover">

                            <!-- Overlay Content (Glass effect) -->
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-white/90 backdrop-blur-md p-6 border-t border-white/50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs font-semibold text-violet-600 uppercase tracking-wider">Feature
                                            Guide</p>
                                        <p class="text-sm font-medium text-gray-900">Expert Recommendations</p>
                                    </div>
                                </div>
                            </div>
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