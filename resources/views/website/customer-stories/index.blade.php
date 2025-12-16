@extends('website.layout.website')

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

            <div class="max-w-7xl mx-auto relative z-10 text-center">

                <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-8 tracking-tight text-gray-900">
                    Customer <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Stories</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-4xl mx-auto mb-7">
                    Explore how Qwaiting is driving transformation across industries and continents. From streamlining
                    customer flow to scaling operations across locations, our platform empowers businesses to deliver
                    faster, smarter service.
                </p>

                <p class="text-xl text-gray-600 leading-relaxed max-w-4xl mx-auto mb-10">
                    These real-world stories showcase how leaders in retail, healthcare, aviation, and public services have
                    reduced wait times, improved efficiency, and elevated customer satisfaction—at scale. See what’s
                    possible when innovation meets execution.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
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

                    <a href="/solutions"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Explore Solutions</span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </a>
                </div>

            </div>
        </section>

        <!-- Customer Stories Grid -->
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 mb-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Category Filter -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Category</h3>
                            <div class="flex flex-wrap gap-3">
                                <button data-filter="category" data-value="all"
                                    class="filter-btn active px-4 py-2 rounded-full bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-all duration-300 border border-indigo-600">
                                    All
                                </button>
                                <button data-filter="category" data-value="Education"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    Education
                                </button>
                                <button data-filter="category" data-value="Healthcare"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    Healthcare
                                </button>
                                <button data-filter="category" data-value="Public"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    Public
                                </button>
                                <button data-filter="category" data-value="Retail"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    Retail
                                </button>
                                <button data-filter="category" data-value="Aviation"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    Aviation
                                </button>
                            </div>
                        </div>

                        <!-- Region Filter -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Region</h3>
                            <div class="flex flex-wrap gap-3">
                                <button data-filter="region" data-value="all"
                                    class="filter-btn active px-4 py-2 rounded-full bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-all duration-300 border border-indigo-600">
                                    All
                                </button>
                                <button data-filter="region" data-value="Asia"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    Asia
                                </button>
                                <button data-filter="region" data-value="North America"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    North America
                                </button>
                                <button data-filter="region" data-value="Middle East"
                                    class="filter-btn px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 font-medium hover:bg-indigo-600 hover:text-white transition-all duration-300 border border-indigo-200">
                                    Middle East
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="stories-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $stories = [
                            [
                                'title' => 'Ram Clinic Offers a Good Patient Flow Management With Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Healthcare',
                                'description' => 'Ram Clinics hold expertise providing best medical care and provide high quality services under one roof with the latest advanced technologies in all specialties (dental dermatology - medical).',
                                'link' => '/customer-stories/ram-clinics',
                                'linkText' => 'Ram Clinic Story',
                                'image' => 'https://qwaiting.com/images/clients/ram.png'
                            ],
                            [
                                'title' => 'PSB Academy provides a seamless interaction between staff and students through Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Education',
                                'description' => 'PSB Academy is a private education provider. It holds an excellent reputation for providing quality education to students. Additionally, it witnesses a huge rush of admissions, where students come across different nations.',
                                'link' => '/customer-stories/psb-academy',
                                'linkText' => 'PSB Story',
                                'image' => 'https://qwaiting.com/images/clients/PSB.png'
                            ],
                            [
                                'title' => 'NUS leverages the Qwaiting for a smoother hostel allotment procedure',
                                'region' => 'Asia',
                                'category' => 'Education',
                                'description' => 'However, the National University of Singapore is one of the oldest and a reliable education institutes. To dig deep into their history, they started to impart knowledge with just 23 students in the year 1905 but grew immensely with time.',
                                'link' => '/customer-stories/national-university-of-singapore',
                                'linkText' => 'NUS Story',
                                'image' => 'https://qwaiting.com/images/clients/nus-logo.png'
                            ],
                            [
                                'title' => 'Qwaiting offers intense and improved staff handling features to the People’s Association',
                                'region' => 'Asia',
                                'category' => 'Public',
                                'description' => 'Singapore faced a tough time during the 1950s and early 60s due to the riots in distinct races and political conflict. These circumstances gave rise to PA in 1960 to promote racial harmony. PA initiated many programs and successfully aligned the majority of people with them',
                                'link' => '/customer-stories/wisma',
                                'linkText' => 'Wisma Story',
                                'image' => 'https://qwaiting.com/images/clients/wgs.png'
                            ],
                            [
                                'title' => 'Nirvana simplified the burial process of the deceased ones through Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Public',
                                'description' => 'Nirvana was established in the year 2009 in Singapore to reintroduce the process of burying the deceased by looking at the issue of land scarcity. Additionally, they also made sure to keep the values of the customs intact and peaceful.',
                                'link' => '/customer-stories/nirvana',
                                'linkText' => 'Nirvana Story',
                                'image' => 'https://qwaiting.com/images/nirvana.png'
                            ],
                            [
                                'title' => 'Fair Price group remodels its operations with Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Retail',
                                'description' => 'The Fair Price group was established in 1973. It came into existence with the aim to help the people to balance the cost of living in Singapore. Fair Price Group is not just one supermarket, but one powerful and leading retailer in Singapore.',
                                'link' => '/customer-stories/fairprice-group',
                                'linkText' => 'FairPrice Story',
                                'image' => 'https://qwaiting.com/images/clients/NTUC_FairPrice.png'
                            ],
                            [
                                'title' => 'Marina Square boosted its customer service using the Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Retail',
                                'description' => 'Marina Square is a huge shopping mall built on the land of the marina center in 1980. It was the largest shopping mall in the county at that time.',
                                'link' => '/customer-stories/marina-square',
                                'linkText' => 'Marina Square Story',
                                'image' => 'https://qwaiting.com/images/clients/msq-logo.png'
                            ],
                            [
                                'title' => 'Changi Airport Group perfectly managed the restroom booking procedure through Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Aviation',
                                'description' => 'Changi Airport Group is into this business since 1981. It has won 649 awards and proved to be the best international airport in the world.',
                                'link' => '/customer-stories/changi-airport-group',
                                'linkText' => 'Changi Airport Story',
                                'image' => 'https://qwaiting.com/images/clients/logo-dark.png'
                            ],
                            [
                                'title' => 'How Apollo Hospitals Streamlined Patient Flow Across 77 Branches With Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Healthcare',
                                'description' => 'Apollo Hospital is one of the leading and most trusted healthcare brands in India. With over 77+ branches across the country, Apollo has been serving patients since 1983.',
                                'link' => '/customer-stories/apollo-hospital',
                                'linkText' => 'Apollo Story',
                                'image' => 'https://qwaiting.com/frontimg/apollo_hospitals.jpg'
                            ],
                            [
                                'title' => 'How Qwaiting Improved Staff Productivity by 20% at Holy Cross Medical Center',
                                'region' => 'North America',
                                'category' => 'Healthcare',
                                'description' => 'Holy Cross Medical Center has been known for its commitment to delivering high-quality care to its patients.',
                                'link' => '/customer-stories/holy-cross',
                                'linkText' => 'HolyCross Story',
                                'image' => 'https://qwaiting.com/frontimg/holy-cross.png'
                            ],
                            [
                                'title' => 'How HCG Hospitals Transformed Patient Flow with Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Healthcare',
                                'description' => 'HCG (Healthcare Global Enterprises Ltd.) was founded in 1989 with the aim of treating cancer and providing people with a happy and healthy life.',
                                'link' => '/customer-stories/hcg',
                                'linkText' => 'HCG Story',
                                'image' => 'https://qwaiting.com/frontimg/hcg.png'
                            ],
                            [
                                'title' => 'Healing Hospital Boosts Staff Efficiency by 40% with Qwaiting’s Virtual Queuing System',
                                'region' => 'Asia',
                                'category' => 'Healthcare',
                                'description' => 'Established in 2016, Healing Hospital is a multispeciality centre, serving 200 to 300 patients daily. With 20000+ successful surgeries and 50+ medical experts.',
                                'link' => '/customer-stories/healing-hospital',
                                'linkText' => 'Healing Story',
                                'image' => 'https://qwaiting.com/frontimg/healing.png'
                            ],
                            [
                                'title' => 'Fullerton Reduced Patient Wait Times by 40% With Qwaiting’s Smart Queue System',
                                'region' => 'Asia',
                                'category' => 'Healthcare',
                                'description' => 'Founded in 2010, Fullerton Health is a healthcare organization across 9 markets throughout Asia and 550+ owned branches.',
                                'link' => '/customer-stories/fullerton-health',
                                'linkText' => 'Fullerton Story',
                                'image' => 'https://qwaiting.com/frontimg/fullerton.png'
                            ],
                            [
                                'title' => 'How Farrer Park Hospital Transformed Patient Flow with Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Healthcare',
                                'description' => 'Farrer Park Hospital is Singapore\'s modern medical institution built to deliver patient-centric care, and provides a friendly environment for the patients.',
                                'link' => '/customer-stories/farrer-park-hospital',
                                'linkText' => 'Farrer Park Story',
                                'image' => 'https://qwaiting.com/frontimg/farrerpark.png'
                            ],
                            [
                                'title' => 'Miracles Healthcare Streamlined Patient Flow and Boosted Staff Efficiency with Qwaiting',
                                'region' => 'Asia',
                                'category' => 'Healthcare',
                                'description' => 'Gurugram\'s Miracles Healthcare is one of the most visited healthcare centers in the city. It has earned the trust of hundreds of patients over the years.',
                                'link' => '/customer-stories/miracles-healthcare',
                                'linkText' => 'Miracles Story',
                                'image' => 'https://qwaiting.com/frontimg/miracleshealth.png'
                            ],
                            [
                                'title' => 'How Saudia Airlines Took Off with Qwaiting to Improve Passenger Flow and Staff Performance',
                                'region' => 'Middle East',
                                'category' => 'Aviation',
                                'description' => 'Saudia is one of the world\'s busiest airlines, operates sales offices across 12 states, and handles between 5,000 to 6,000 visitors daily. With flights operating across major domestic and international routes',
                                'link' => '/customer-stories/saudia-airlines',
                                'linkText' => 'Saudia Airlines Story',
                                'image' => 'https://qwaiting.com/frontimg/saudia-airlines.png'
                            ]
                        ];
                    @endphp

                    @foreach($stories as $story)
                        <div class="story-card group bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100"
                            data-category="{{ $story['category'] }}" data-region="{{ $story['region'] }}">
                            <div class="relative mb-8 flex items-center justify-center h-30">
                                <img src="{{ $story['image'] }}" alt="" class="w-auto h-full object-contain">
                            </div>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-600">
                                    {{ $story['category'] }}
                                </span>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-600">
                                    {{ $story['region'] }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                                {{ $story['title'] }}
                            </h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                {{ $story['description'] }}
                            </p>
                            <a href="{{ $story['link'] }}"
                                class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500 transition-colors group-hover:gap-2 gap-1">
                                {{ $story['linkText'] }}
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-4">What Our Customers Say</h2>
                    <p class="text-lg text-gray-600">Hear from businesses that have transformed their operations with
                        Qwaiting</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php
                        $testimonials = [
                            [
                                'quote' => 'I\'ve used Qwaiting for my business and it\'s been a great experience. It\'s helped me to save time and reduce my stress levels, while also improving the customer experience. I would recommend it to anyone who wants to streamline their operations and improve customer satisfaction.',
                                'author' => 'Business Owner',
                                'image' => 'https://qwaiting.com/images/mnd-singapore.png'
                            ],
                            [
                                'quote' => 'Qwaiting has made my life so much easier! It simplifies the waiting process, saving time and reducing frustration. The overall experience is great and up to the mark. Thanks to the team!',
                                'author' => 'Healthcare Professional',
                                'image' => 'https://qwaiting.com/images/singtel.png'
                            ],
                            [
                                'quote' => 'Thanks to Rohit and his team for making this wonderful software. Not only me but our customers also loved it. As they are able to join a virtual queue and get updates on their wait time via text message.',
                                'author' => 'Retail Manager',
                                'image' => 'https://qwaiting.com/images/hdt.png'
                            ]
                        ];
                    @endphp

                    @foreach($testimonials as $testimonial)
                        <div
                            class="bg-gradient-to-br from-indigo-50 to-white p-8 rounded-2xl border border-indigo-100 shadow-md hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 mb-6 leading-relaxed italic">
                                "{{ $testimonial['quote'] }}"
                            </p>
                            <div class="flex items-center justify-center">
                                <div class="ml-3">
                                    <img src="{{ $testimonial['image'] }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Trusted By Section -->
        <div class="trusted-section bg-gray-50">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let activeCategory = 'all';
            let activeRegion = 'all';

            // Get all filter buttons
            const filterButtons = document.querySelectorAll('.filter-btn');
            const storyCards = document.querySelectorAll('.story-card');

            // Add click event to all filter buttons
            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const filterType = this.getAttribute('data-filter');
                    const filterValue = this.getAttribute('data-value');

                    // Update active filter
                    if (filterType === 'category') {
                        activeCategory = filterValue;
                        // Update active state for category buttons
                        document.querySelectorAll('[data-filter="category"]').forEach(btn => {
                            btn.classList.remove('active', 'bg-indigo-600', 'text-white');
                            btn.classList.add('bg-indigo-50', 'text-indigo-600');
                        });
                    } else if (filterType === 'region') {
                        activeRegion = filterValue;
                        // Update active state for region buttons
                        document.querySelectorAll('[data-filter="region"]').forEach(btn => {
                            btn.classList.remove('active', 'bg-indigo-600', 'text-white');
                            btn.classList.add('bg-indigo-50', 'text-indigo-600');
                        });
                    }

                    // Set active button style
                    this.classList.add('active', 'bg-indigo-600', 'text-white');
                    this.classList.remove('bg-indigo-50', 'text-indigo-600');

                    // Filter cards
                    filterCards();
                });
            });

            function filterCards() {
                storyCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    const cardRegion = card.getAttribute('data-region');

                    const categoryMatch = activeCategory === 'all' || cardCategory === activeCategory;
                    const regionMatch = activeRegion === 'all' || cardRegion === activeRegion;

                    if (categoryMatch && regionMatch) {
                        card.style.display = 'block';
                        // Add fade-in animation
                        card.style.animation = 'fadeIn 0.5s ease-in';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });
    </script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection