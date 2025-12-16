@extends('website.layout.website')

@section('title', 'About Qwaiting | Global Leader in Queue Management Solutions')
@section('meta_description', 'Discover Qwaiting — trusted by 65,000+ businesses and governments across 35+ countries. Our queue management solutions improve efficiency and deliver measurable ROI.')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-br from-primary-light via-white to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl lg:text-6xl font-bold text-text-dark mb-6">This Is Who We Are</h1>
            <p class="text-xl text-text-medium max-w-4xl mx-auto leading-relaxed">
                Qwaiting is a global leader in queue and customer journey management, trusted by 65,000+ organizations
                across 120+ countries.
            </p>
        </div>
    </section>


    <!-- Our Story -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="fade-in-up">
                    <h2 class="text-4xl font-bold text-text-dark mb-6">Our Story</h2>
                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                        Qwaiting is a global leader in queue and customer journey management, trusted by 65,000+
                        organizations across 120+ countries. Every year, we power over 30 million customer experiences -
                        helping businesses, governments, and institutions deliver faster service, reduce costs, and boost
                        satisfaction.
                    </p>
                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                        From virtual queues and WhatsApp notifications to self-service kiosks, face recognition, and
                        real-time analytics, we simplify complex journeys into seamless, measurable, and scalable
                        experiences.
                    </p>
                    <p class="text-lg text-text-medium font-semibold">
                        We don't just manage queues. We empower organizations to transform waiting into growth, loyalty, and
                        opportunity.
                    </p>
                </div>
                <div class="fade-in-up" style="animation-delay: 0.2s;">
                    <img src="{{ asset('website/asset/images/our_story.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- History Timeline -->
    <section class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <!-- Title Style matching the requested image header -->
                <h2 class="text-4xl font-bold text-text-dark mb-4">Our History</h2>
                    <p class="text-lg text-text-medium mb-2">A journey of innovation and growth</p>
                </div>

                <div class="relative">
                    <!-- Center Line (Desktop) -->
                    <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-gray-200"></div>

                    <div class="space-y-12 relative z-10">

                        <!-- 2018 (Left - Blue) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-2 md:order-1 transform transition-all duration-300 hover:-translate-y-1">
                                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-blue-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2018</h3>
                                            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm">1</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">Qwaiting founded, creating the online queue management solution.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-4 h-4 rounded-full bg-blue-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-3"></div>
                        </div>

                        <!-- 2019 (Right - Purple) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-3 md:order-1"></div>
                            <div class="w-4 h-4 rounded-full bg-purple-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-2 md:order-3 transform transition-all duration-300 hover:-translate-y-1">
                                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-purple-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-purple-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2019</h3>
                                            <div class="w-8 h-8 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold text-sm">2</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">Launch appointment booking and QR code queue system, providing significantly faster time-to-market in covid-19 pandemic.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2020 (Left - Green) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-2 md:order-1 transform transition-all duration-300 hover:-translate-y-1">
                                 <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-green-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-green-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2020</h3>
                                            <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm">3</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">Introduced a custom mobile app for staff.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-4 h-4 rounded-full bg-green-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-3"></div>
                        </div>

                        <!-- 2021 (Right - Orange) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-3 md:order-1"></div>
                            <div class="w-4 h-4 rounded-full bg-orange-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-2 md:order-3 transform transition-all duration-300 hover:-translate-y-1">
                                 <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-orange-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2021</h3>
                                            <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-sm">4</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">The solutions are sold to around 80+ countries and generate a high amount of revenue.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2022 (Left - Blue) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-2 md:order-1 transform transition-all duration-300 hover:-translate-y-1">
                                 <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-blue-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2022</h3>
                                            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm">5</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">Add on a new customer feedback feature.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-4 h-4 rounded-full bg-blue-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-3"></div>
                        </div>

                        <!-- 2023 (Right - Purple) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-3 md:order-1"></div>
                            <div class="w-4 h-4 rounded-full bg-purple-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-2 md:order-3 transform transition-all duration-300 hover:-translate-y-1">
                                 <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-purple-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-purple-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2023</h3>
                                            <div class="w-8 h-8 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold text-sm">6</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">Creates a new brand image and better communicates its values and offerings to its target audience.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2024 (Left - Green) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-2 md:order-1 transform transition-all duration-300 hover:-translate-y-1">
                                 <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-green-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-green-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2024</h3>
                                            <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm">7</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">Enhanced feedback system. Improved analytics and reporting for customer satisfaction and service quality.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-4 h-4 rounded-full bg-green-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-3"></div>
                        </div>

                         <!-- 2025 (Right - Orange) -->
                        <div class="flex flex-col md:flex-row items-center justify-between w-full group">
                            <div class="w-full md:w-5/12 order-3 md:order-1"></div>
                            <div class="w-4 h-4 rounded-full bg-orange-500 border-4 border-white shadow-md z-10 hidden md:flex items-center justify-center order-1 md:order-2 transform group-hover:scale-125 transition-transform"></div>
                            <div class="w-full md:w-5/12 order-2 md:order-3 transform transition-all duration-300 hover:-translate-y-1">
                                 <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-orange-500 relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <h3 class="text-2xl font-bold text-gray-800">2025</h3>
                                            <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-sm">8</div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">Face recognition introduced. Launched AI-powered face recognition for faster and secure queue check-in.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12">
                    <div class="bg-gradient-to-br from-primary-light to-white p-12 rounded-3xl shadow-lg fade-in-up">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-text-dark mb-6">Our Mission</h2>
                        <p class="text-lg text-text-medium leading-relaxed">
                            We empower organizations with intelligent, adaptable, and customer-centric queue management
                            solutions that enhance experiences, improve efficiency, and drive measurable ROI across industries
                            and regions worldwide.
                        </p>
                    </div>

                    <div class="bg-gradient-to-br from-accent-green/10 to-white p-12 rounded-3xl shadow-lg fade-in-up"
                        style="animation-delay: 0.2s;">
                        <div class="w-16 h-16 bg-accent-green rounded-2xl flex items-center justify-center text-white mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-text-dark mb-6">Our Vision</h2>
                        <p class="text-lg text-text-medium leading-relaxed">
                            To become the world's most trusted queue and customer journey management platform — enabling
                            businesses of every size to deliver extraordinary, seamless, and scalable service experiences.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Values -->
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-text-dark mb-4">Our Core Values</h2>
                    <p class="text-lg text-text-medium">The principles that guide everything we do</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="rounded-xl flex items-center justify-center text-primary mb-6">
                            <img src="{{ asset('website/asset/images/continuous-learning.svg') }}" alt="Continuous Learning">
                        </div>
                        <h3 class="text-xl font-bold text-text-dark mb-3">Continuous Learning</h3>
                        <p class="text-text-medium">Encourage curiosity, adaptability, and a passion for growth.</p>
                    </div>

                    <div class="value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class=" rounded-xl flex items-center justify-center text-primary mb-6">
                            <img src="{{ asset('website/asset/images/customer-satisfaction.svg') }}" alt="Customer Satisfaction">
                        </div>
                        <h3 class="text-xl font-bold text-text-dark mb-3">Customer Satisfaction</h3>
                        <p class="text-text-medium">We strive to exceed expectations at every point in time.</p>
                    </div>

                    <div class="value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="rounded-xl flex items-center justify-center text-accent-yellow mb-6">
                            <img src="{{ asset('website/asset/images/show-care-and-concern.svg') }}" alt="Customer Satisfaction">
                        </div>
                        <h3 class="text-xl font-bold text-text-dark mb-3">Show Care and Concern</h3>
                        <p class="text-text-medium">We may deal with advanced technologies, but our greatest asset is people.
                        </p>
                    </div>

                    <div class="value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="rounded-xl flex items-center justify-center text-primary mb-6">
                            <img src="{{ asset('website/asset/images/integrity.svg') }}" alt="Customer Satisfaction">
                        </div>
                        <h3 class="text-xl font-bold text-text-dark mb-3">Integrity</h3>
                        <p class="text-text-medium">We maintain honesty and clear communication in the workplace to build
                            lasting relationships.</p>
                    </div>

                    <div class="value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="rounded-xl flex items-center justify-center text-accent-green mb-6">
                            <img src="{{ asset('website/asset/images/confidentiality.svg') }}" alt="Customer Satisfaction">
                        </div>
                        <h3 class="text-xl font-bold text-text-dark mb-3">Confidentiality</h3>
                        <p class="text-text-medium">We maintain clients' confidence at all times.</p>
                    </div>

                    <div class="value-card bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="rounded-xl flex items-center justify-center text-accent-yellow mb-6">
                            <img src="{{ asset('website/asset/images/growth.svg') }}" alt="Customer Satisfaction">
                        </div>
                        <h3 class="text-xl font-bold text-text-dark mb-3">Growth</h3>
                        <p class="text-text-medium">We always pursue professional growth.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats -->
        <section class="py-16 bg-white border-y border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="fade-in-up">
                        <div class="text-5xl font-bold text-primary mb-2 counter" data-target="65000" data-suffix="K+">0</div>
                        <div class="text-sm text-text-medium uppercase tracking-wider">Organizations</div>
                    </div>
                    <div class="fade-in-up" style="animation-delay: 0.1s;">
                        <div class="text-5xl font-bold text-primary mb-2 counter" data-target="120" data-suffix="+">0</div>
                        <div class="text-sm text-text-medium uppercase tracking-wider">Countries</div>
                    </div>
                    <div class="fade-in-up" style="animation-delay: 0.2s;">
                        <div class="text-5xl font-bold text-primary mb-2 counter" data-target="30000000" data-suffix="M+">0
                        </div>
                        <div class="text-sm text-text-medium uppercase tracking-wider">Experiences/Year</div>
                    </div>
                    <div class="fade-in-up" style="animation-delay: 0.3s;">
                        <div class="text-5xl font-bold text-primary mb-2 counter" data-target="2018" data-suffix="">0</div>
                        <div class="text-sm text-text-medium uppercase tracking-wider">Founded</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Let's Get to Know Us -->
        <section class="py-24 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-text-dark mb-4">Let's Get to Know Us</h2>
                    <p class="text-lg text-text-medium max-w-3xl mx-auto">We provide a wide range of cloud-based solution
                        customized to your specific requirements.</p>
                </div>

                <!-- Swiper -->
                <div class="swiper solutionsSwiper pb-12">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden h-full flex flex-col group hover:shadow-xl transition-all duration-300">
                                <div class="h-56 overflow-hidden">
                                    <img src="https://qwaiting.com/frontimg/queue-management-solution.jpg"
                                        alt="Queue Management Solution"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="p-8 flex-1 flex flex-col">
                                    <h3 class="text-xl font-bold text-text-dark mb-3">Queue Management Solution</h3>
                                    <p class="text-text-medium mb-6 flex-1">Qwaiting automates the flow of customers and sends a
                                        customized notification when their turn arrives.</p>
                                    <a href="{{ url('/solutions/queue-management-solution') }}"
                                        class="inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors">
                                        Learn More <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden h-full flex flex-col group hover:shadow-xl transition-all duration-300">
                                <div class="h-56 overflow-hidden">
                                    <img src="https://qwaiting.com/frontimg/appointment-booking-solution.jpg"
                                        alt="Appointment Booking Solution"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="p-8 flex-1 flex flex-col">
                                    <h3 class="text-xl font-bold text-text-dark mb-3">Appointment Booking Solution</h3>
                                    <p class="text-text-medium mb-6 flex-1">Customers can easily book their tickets online for
                                        the services 24/7.</p>
                                    <a href="{{ url('/solutions/appointment-scheduling-software') }}"
                                        class="inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors">
                                        Learn More <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden h-full flex flex-col group hover:shadow-xl transition-all duration-300">
                                <div class="h-56 overflow-hidden">
                                    <img src="https://qwaiting.com/frontimg/virtual-queuing-solution.jpg"
                                        alt="Virtual Queuing Solution"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="p-8 flex-1 flex flex-col">
                                    <h3 class="text-xl font-bold text-text-dark mb-3">Virtual Queuing Solution</h3>
                                    <p class="text-text-medium mb-6 flex-1">Customers use the Qwaiting app on their mobile
                                        phones to join a virtual queue for a service.</p>
                                    <a href="{{ url('/solutions/virtual-queue-system') }}"
                                        class="inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors">
                                        Learn More <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden h-full flex flex-col group hover:shadow-xl transition-all duration-300">
                                <div class="h-56 overflow-hidden">
                                    <img src="https://qwaiting.com/frontimg/QR-code-queue-system.jpg"
                                        alt="QR Code Queue System"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="p-8 flex-1 flex flex-col">
                                    <h3 class="text-xl font-bold text-text-dark mb-3">QR Code Queue System</h3>
                                    <p class="text-text-medium mb-6 flex-1">Customers use their mobile to scan a QR code and
                                        then receive important information about the queue on a digital display.</p>
                                    <a href="{{ url('/solutions/qr-code-queue-system') }}"
                                        class="inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors">
                                        Learn More <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 5 -->
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden h-full flex flex-col group hover:shadow-xl transition-all duration-300">
                                <div class="h-56 overflow-hidden">
                                    <img src="https://qwaiting.com/frontimg/customer_feedback_system.jpg" alt="Customer Feedback System"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="p-8 flex-1 flex flex-col">
                                    <h3 class="text-xl font-bold text-text-dark mb-3">Customer Feedback System</h3>
                                    <p class="text-text-medium mb-6 flex-1">Qwaiting collects customers' reviews in real-time to
                                        improve services.</p>
                                    <a href="{{ url('/solutions/customer-feedback-system') }}"
                                        class="inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors">
                                        Learn More <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation Buttons -->
                    <div
                        class="swiper-button-next !w-10 !h-10 !bg-white !rounded-full !shadow-md !text-primary after:!text-lg hover:!bg-primary hover:!text-white transition-all">
                    </div>
                    <div
                        class="swiper-button-prev !w-10 !h-10 !bg-white !rounded-full !shadow-md !text-primary after:!text-lg hover:!bg-primary hover:!text-white transition-all">
                    </div>
                </div>
            </div>
        </section>

        <!-- Board of Directors -->
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-text-dark mb-4">Board of Directors</h2>
                    <p class="text-lg text-text-medium">Leadership driving our vision forward</p>
                </div>
                <div class="grid md:grid-cols-3 gap-12">
                    <div class="text-center fade-in-up">
                        <img src="{{ asset('website/asset/images/rohit-garg.png') }}" alt="Rohit Garg"
                            class="w-50 h-50 rounded-full mx-auto mb-6">
                        <h3 class="text-2xl font-bold text-text-dark mb-2">Rohit Garg</h3>
                        <p class="text-text-medium">Director</p>
                    </div>

                    <div class="text-center fade-in-up" style="animation-delay: 0.1s;">
                        <img src="{{ asset('website/asset/images/neeraj-gupta.png') }}" alt="Neeraj Gupta"
                            class="w-50 h-50 rounded-full mx-auto mb-6">
                        <h3 class="text-2xl font-bold text-text-dark mb-2">Neeraj Gupta</h3>
                        <p class="text-text-medium">Director</p>
                    </div>

                    <div class="text-center fade-in-up" style="animation-delay: 0.2s;">
                        <img src="{{ asset('website/asset/images/vinay-upadhyay.png') }}" alt="Vinay Upadhyay"
                            class="w-50 h-50 rounded-full mx-auto mb-6">
                        <h3 class="text-2xl font-bold text-text-dark mb-2">Vinay Upadhyay</h3>
                        <p class="text-text-medium">CFO</p>
                    </div>
        </section>

        <!-- Why Us Section -->
        <section class=" bg-white">
            <!-- Title -->
            <h2 class="text-center text-3xl font-bold text-gray-800 mb-12 mt-12">
                Why Choose Us?
            </h2>

            <!-- Main Container -->
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-14 grid md:grid-cols-2 gap-10 items-center">

                <!-- Left Feature List -->
                <div class="space-y-6">

                    <!-- Item 1 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-blue-100 rounded-lg text-blue-600 text-2xl">
                            ✔
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Global Trust</h3>
                            <p class="text-gray-600 text-sm">
                                6,5000+ deployments across 120+ countries, delivering 30M+ customer experiences annually.
                            </p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-purple-100 rounded-lg text-purple-600 text-2xl">
                            ✔
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Seamless Scalability</h3>
                            <p class="text-gray-600 text-sm">
                                Works effortlessly across industries, branches, and geographies.
                            </p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-red-100 rounded-lg text-red-500 text-2xl">
                            ✔
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Frictionless Integrations</h3>
                            <p class="text-gray-600 text-sm">
                                Easily connects with CRMs, APIs, and enterprise systems.
                            </p>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-green-100 rounded-lg text-green-600 text-2xl">
                            ✔
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Omnichannel Advantage</h3>
                            <p class="text-gray-600 text-sm">
                                The Only platform unifying Facial, WhatsApp, QR, Virtual, and On-Premise queues.
                            </p>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-yellow-100 rounded-lg text-yellow-600 text-2xl">
                            ✔
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Actionable Insights</h3>
                            <p class="text-gray-600 text-sm">
                                Real-time analytics to optimize operations, reduce costs, and boost ROI.
                            </p>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="flex items-start gap-4 p-3 mb-1 rounded-xl">
                        <div class="p-3 bg-blue-100 rounded-lg text-blue-600 text-2xl">
                            ✔
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Proven Impact</h3>
                            <p class="text-gray-600 text-sm">
                                Enterprises report up to 50% faster service and higher satisfaction scores.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Right Image -->
                <div class="rounded-3xl overflow-hidden shadow-lg">
                    <img src="{{ asset('website/asset/images/our_vision.jpg') }}" alt="Why Choose Us"
                        class="w-full h-full object-cover">
                </div>

            </div>
        </section>





        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper(".solutionsSwiper", {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 30,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                    },
                });
            });
        </script>
@endsection