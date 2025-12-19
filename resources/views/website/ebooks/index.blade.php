@extends('website.index')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-indigo-100 selection:text-indigo-700">

        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 overflow-hidden bg-gradient-to-b from-white to-gray-50 lg:pt-40 lg:pb-28">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
                <h1 class="mx-auto max-w-4xl text-4xl font-bold tracking-tight text-black sm:text-6xl mb-6">
                    The Digital Library: Explore Endless <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">E-Books</span>
                </h1>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-black">
                    Qwaiting's Ebooks are finally here!! And yes, it's completely free! Our ebook incorporates our best
                    ideas and opinions on queuing solutions. Enjoy reading and discovering new strategies to optimize your
                    in-store customer experience.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="https://qwaiting.com/signup"
                        class="rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                        Start Your Free Trial
                    </a>
                </div>
            </div>

            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]">
                </div>
            </div>
        </section>

        <!-- E-Books Grid Section -->
        <section class="py-24 sm:py-32 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $ebooks = [
                            [
                                'title' => 'Ultimate Guide of Qwaiting: Queue Management System',
                                'desc' => 'Here\'s everything you need to know about Queue Management System. What is it, How it works, and what are the benefits offered by this system? In this eBook, you\'ll also discover how Qwaiting software could be a profitable deal for your business.',
                                'link' => '/ebooks/Ultimate-Guide-of-Qwaiting-Queue-Management-System',
                                'img' => 'https://qwaiting.com/images/ultimate.jpg'
                            ],
                            [
                                'title' => 'Queue Management System: Why it is Necessary for Every Industry?',
                                'desc' => 'Long queues are frustrating, no matter whether you\'re at the hospital, bank, or in a shopping mall. They make it hard for your business to deliver a long-lasting customer experience. It\'s time to change that!',
                                'link' => '/ebooks/Queue-Management-System-Why-it-is-Necessary-for-Every-Industry',
                                'img' => 'https://qwaiting.com/images/industry.jpg'
                            ],
                            [
                                'title' => 'Try These 10 Tactics to Drive Traffic to Your Brick-and-Mortar Store',
                                'desc' => 'Foot Traffic is one of the most significant measures of your business success. Higher the traffic, higher would be the opportunities for sales and profit earning. Determining ways to encourage customers to shop from your store can be difficult.',
                                'link' => '/ebooks/Try-These-10-Tactics-to-Drive-Traffic-to-Your-Brick-and-Mortar-Store',
                                'img' => 'https://qwaiting.com/images/tactics.jpg'
                            ],
                            [
                                'title' => '8 Queue Management Features Your Business Requires',
                                'desc' => 'Queueing can be smooth if you\'re using the right tools. Tools that allow you to control your queue through a centralized dashboard. Enable you to handle staff, give you real-time information on queue status and trends.',
                                'link' => '/ebooks/eight-queue-management-features-your-business-requires',
                                'img' => 'https://qwaiting.com/images/qwaiting-management-cover.jpg'
                            ],
                            [
                                'title' => 'Self-Service Kiosks: Everything You Need to Know',
                                'desc' => 'If you are looking for an effective way to improve your customer service and keep your customers happy and coming back, this product is for you. Self-Service Kiosks have proven to be a robust and scalable solution for improving overall service.',
                                'link' => '/ebooks/Self-Service-Kiosks-Everything-You-Need-to-Know',
                                'img' => 'https://qwaiting.com/images/self-service-ebook-cover.jpg'
                            ],
                            [
                                'title' => '8 Proven Benefits of Using Digital Signage for Your Growing Business',
                                'desc' => 'Digital signage offers numerous benefits to your business such as automatic scheduling, scrolling text and graphics, and more. By using digital signage you will have the ability to engage with your customers directly.',
                                'link' => '/ebooks/8-Proven-Benefits-of-Using-Digital-Signage-for-Your-Growing-Business',
                                'img' => 'https://qwaiting.com/images/Proven-Benefits.jpg'
                            ],
                            [
                                'title' => 'Transforming Waiting into Growth - A CEO\'s Guide to Virtual Queue Management',
                                'desc' => 'Long queues drain time, frustrate customers, and hurt business performance across industries. This ebook explores how Virtual Queue Management can completely redefine customer experiences — making waiting seamless, efficient, and contactless.',
                                'link' => '/ebooks/a-ceo-guide-to-virtual-queue-management',
                                'img' => 'https://qwaiting.com/images/a-ceo-guide-to-virtual-queue-management.jpg'
                            ]
                        ];
                    @endphp

                    @foreach($ebooks as $ebook)
                        <div
                            class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                            <!-- E-Book Image -->
                            <div class="relative h-64 bg-gradient-to-br from-indigo-50 to-blue-50 overflow-hidden">
                                <div class="absolute inset-0 flex items-center justify-center">
                                   <img src="{{ $ebook['img'] }}" alt="" class="w-full h-full object-cover">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>

                            <!-- E-Book Content -->
                            <div class="p-6">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                    {{ $ebook['title'] }}
                                </h3>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ $ebook['desc'] }}
                                </p>
                                <a href="{{ $ebook['link'] }}"
                                    class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500 transition-colors group/link">
                                    Download E-Book
                                    <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
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
@endsection