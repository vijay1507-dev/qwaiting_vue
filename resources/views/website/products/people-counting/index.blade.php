@extends('website.layout.website')

@section('content')

<div class="min-h-screen">

{{-- Hero Section --}}
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
                    people counting <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">People Counting System.</span>
                </h1>

                <p class="text-xl font-bold text-gray-600 leading-relaxed max-w-2xl mx-auto mb-7">Visitor Analytics for the Physical Spaces.</p>


                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="mailto:sales@stelleninfotech.com"
                        class="group relative inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-full font-semibold overflow-hidden transition-all hover:shadow-xl hover:shadow-primary/30 hover:-translate-y-1 w-full sm:w-auto">
                        <span class="relative z-10">Get a quote</span>
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

                {{-- Hero Image with Floating Effect --}}
                <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget6.jpg"
                            alt="Biometric Queue Dashboard"
                            class="w-full h-auto transform transition-transform hover:scale-105 duration-700">
                    </div>
                </div>
            </div>
        </section>

        <div class="mx-auto px-6 p-4 flex justify-center shadow-2xl">
    <div id="tabContainer"
        class="flex flex-col sm:flex-row gap-3 sm:gap-4 text-white px-4 py-2 rounded-full items-center justify-center">

        <button data-tab="overview"
            class="tab-btn active-tab bg-[#ffe57f] text-black px-5 py-2 rounded-full font-semibold transition-all">
            Overview
        </button>

        <button data-tab="products"
            class="tab-btn px-5 py-2 font-medium text-gray-300 hover:text-white rounded-full transition">
            Products
        </button>

        <button data-tab="software"
            class="tab-btn px-5 py-2 font-medium text-gray-300 hover:text-white rounded-full transition">
            Software
        </button>

        <button data-tab="package"
            class="tab-btn px-5 py-2 font-medium text-gray-300 hover:text-white rounded-full transition">
            Package
        </button>

        <button data-tab="usecases"
            class="tab-btn px-5 py-2 font-medium text-gray-300 hover:text-white rounded-full transition">
            Use Cases
        </button>

    </div>
</div>



        <!-- CONTENT WRAPPER -->
        <div class="max-w-7xl mx-auto px-6 space-y-16 pt-10">

            <!-- ================= OVERVIEW TAB ================= -->
            <section id="overview" class="tab-content">

                <!-- 3D Pro2 -->
                <div class="rounded-xl mb-16">
                    <div 
                    class="relative w-full bg-cover bg-center bg-no-repeat rounded-xl"
                    style="background-image: url('https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget1.jpg');"
                    >
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40"></div>

                        <!-- Content -->
                        <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32">

                            <div class="max-w-xl space-y-6">
                                <h2 class="text-5xl font-bold text-white drop-shadow-lg">3D Pro2™</h2>

                                <h3 class="text-2xl font-semibold text-gray-100 drop-shadow">
                                    World’s Top Selling People Counter Machine
                                </h3>

                                <p class="text-gray-200 text-lg leading-relaxed max-w-md">
                                    One counter at the door is all you need to handle everything effortlessly.
                                </p>

                                <button 
                                    class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow-md hover:bg-blue-700 transition linkToTabContent"
                                    data-tab="peoplecounting_3D_Pro2"
                                >
                                    Find out more
                                </button>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- One Device, 9 Business Metrics -->
                <div class="px-4 sm:px-6 lg:px-8 bg-white">
                    <div class="max-w-7xl mx-auto">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                                One Device, 
                                <span class="text-primary">9 Business Metrics</span>
                            </h2>
                            <p class="text-xl text-text-medium max-w-3xl mx-auto">
                                All the data you will ever need to understand customer behaviour. <span class="text-primary">Let's discover all metric features here</span>
                            </p>
                        </div>

                        {{-- Flowing Steps Container --}}
                        <div class="relative max-w-6xl mx-auto">

                            {{-- Step 1 - Top Left --}}
                            <div class="relative mb-32" style="margin-bottom: 150px;">
                                <div class="flex flex-col md:flex-row items-center gap-8">
                                    <div class="md-_w_2">
                                        <div
                                            class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                            <span class="text-3xl font-bold text-primary">01</span>
                                        </div>
                                        <h3 class="text-3xl font-bold text-text-dark mb-4">Visitor Count</h3>
                                        <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                            Our visitor counting system detects and measures the number of people visiting your store. It counts people both in and out simultaneously using 3D stereovision video counting and advanced tracking algorithms, ensuring an accuracy of 95% and above. Perfect for People Counting in Queue, it provides precise tracking of visitors at all times.
                                        </p>
                                    </div>
                                    <div class="md-_w_2">
                                        <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8">
                                            <div class="text-center">
                                                <img src="https://qwaiting.com/peoplecounting/Tabs_VisitorCount.jpg"
                                                    alt="Visitor Count" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- Step 2 - Top Right --}}
                            <div class="relative mb-32" style="margin-bottom: 150px;">
                                <div class="flex flex-col md:flex-row-reverse items-center gap-8">

                                    <div class="md-_w_2">
                                        <div
                                            class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                            <span class="text-3xl font-bold text-primary">02</span>
                                        </div>
                                        <h3 class="text-3xl font-bold text-text-dark mb-4">Outside Traffic</h3>
                                        <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                            Our People Counting Solution measures the number of people passing by your store by detecting smart devices via BLE and WiFi Counting. Gain insights into valuable metrics, such as missed sales opportunities during non-operating hours and the conversion rate from passers-by to in-store visitors.
                                        </p>
                                    </div>

                                    <div class="md-_w_2">
                                        <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                            <div class="text-center">
                                                <img src="https://qwaiting.com/peoplecounting/Tabs_OutsideTraffic.jpg"
                                                    alt="Cloud-Powered Infrastructure" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- Step 3 - Middle Left --}}
                            <div class="relative mb-32" style="margin-bottom: 150px;">
                                <div class="flex flex-col md:flex-row items-center gap-8">
                                    <div class="md-_w_2">
                                        <div
                                            class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                            <span class="text-3xl font-bold text-primary">03</span>
                                        </div>
                                        <h3 class="text-3xl font-bold text-text-dark mb-4">Visit Duration</h3>
                                        <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                            The visit duration, or visitor dwell time, is measured based on signals emitted from smart devices. This helps retailers estimate when visitors enter and exit the store, providing insights into the average length of customer stays. It analyses the dwell time and sales transactions and allows management to identify areas for improving store operations.
                                        </p>
                                    </div>
                                    <div class="md-_w_2">
                                        <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8 ">
                                            <div class="text-center">
                                                <img src="https://qwaiting.com/peoplecounting/Tabs_VisitDuration.jpg"
                                                    alt="Visit Duration" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Step 4 - Middle Right --}}
                            <div class="relative mb-32" style="margin-bottom: 150px;">
                                <div class="flex flex-col md:flex-row-reverse items-center gap-8">

                                    <div class="md-_w_2">
                                        <div
                                            class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                            <span class="text-3xl font-bold text-primary">04</span>
                                        </div>
                                        <h3 class="text-3xl font-bold text-text-dark mb-4">Turn-in Rate</h3>
                                        <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                        The turn-in rate shows how many people enter your store. You can calculate this percentage by combining outside traffic data with visitor counts. This helps you understand how effective your storefront is at attracting passersby. The turn-in rate is key to understanding the customer journey and improving conversions. It also provides valuable insights into store performance and highlights potential areas for growth.
                                        </p>
                                    </div>
                                    <div class="md-_w_2">
                                        <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                            <div class="text-center">
                                                <img src="https://qwaiting.com/peoplecounting/Tabs_TurnInRate.jpg"
                                                    alt="Cloud-Powered Infrastructure" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            {{-- Step 5 - Bottom Left --}}
                            <div class="relative mb-32" style="margin-bottom: 150px;">
                                <div class="flex flex-col md:flex-row items-center gap-8">
                                    <div class="md-_w_2">
                                        <div
                                            class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                                            <span class="text-3xl font-bold text-primary">05</span>
                                        </div>
                                        <h3 class="text-3xl font-bold text-text-dark mb-4">Returning Customer</h3>
                                        <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                            Returning customers are individuals who revisit your store within a specific timeframe. For example, it shows customers who have visited multiple times in the past three months. This data helps track customer loyalty and patterns in visit frequency. It provides insights into the shopping behaviors of returning clients. These patterns can help improve customer retention strategies.
                                        </p>
                                    </div>
                                    <div class="md-_w_2">
                                        <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8 ">
                                            <div class="text-center">
                                                <img src="https://qwaiting.com/peoplecounting/Tabs_ReturningCustomer.jpg"
                                                    alt="Cloud-Powered Infrastructure" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>

                        </div>
                    </div>
                </div>

                <div class="rounded-xl mb-16">
                    <div 
                    class="relative w-full bg-cover bg-center bg-no-repeat rounded-xl"
                    style="background-image: url('https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2.jpg');"
                    >
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40"></div>

                        <!-- Content -->
                        <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32">

                            <div class="max-w-xl space-y-6">
                                <h2 class="text-5xl font-bold text-white drop-shadow-lg">Key Performance Indicator (KPI)</h2>

                                <p class="text-gray-200 text-lg leading-relaxed max-w-md">
                                    Easily access all the performance metrics you need through a simple and intuitive interface, helping you make informed decisions at the right moment.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-white">Real-time store performance tracking</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-white">Actionable insights with recommended actions</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-white">Customisable dashboards to fit your needs</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-white">Complete executive reports for strategic decision-making</span>
                                    </li>
                                </ul>

                                <button 
                                    class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow-md hover:bg-blue-700 transition linkToTabContent"
                                    data-tab="peoplecounting_3D_Pro2"
                                >
                                    Learn more about data analytics
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Who Uses Customer Counting Data -->
                <div class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-16">
                        <h2 class="text-5xl font-bold mb-4">
                            <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Who Uses 
                            </span>
                            <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Customer Counting Data?</span>
                        </h2>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">01</div>
                            <img src="https://qwaiting.com/peoplecounting/CorporateDirector.png" alt="" class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Corporate Director</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">View the overall performance of retail stores, offer a holistic perspective on footfall trends, and review performance against company goals.</p>
                        </div>

                        <div
                            class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">02</div>
                            <img src="https://qwaiting.com/peoplecounting/RegionalManagers.png" alt="" class="mb-4">
                                <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Regional Managers</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Compare store performance against regional goals. Reward top performers and schedule visits to stores needing attention.</p>
                        </div>

                        <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-green-100">03</div>
                            <img src="https://qwaiting.com/peoplecounting/MarketingLeaders.png" alt="" class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Marketing Leaders</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Compare event ROI, identify patterns, and optimise marketing strategies by assessing the footfall pattern of individual events.</p>
                        </div>

                        <div
                            class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-orange-100">04</div>
                            <img src="https://qwaiting.com/peoplecounting/DataScientists.png" alt="" class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Data Scientists</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Offers analytical tools like pivot tables, empowering data scientists in their investigative analysis of footfall data.</p>
                        </div>

                        <div class="relative p-8 bg-gradient-to-br from-pink-50 to-white rounded-3xl border border-pink-100">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-pink-100">05</div>
                            <img src="https://qwaiting.com/peoplecounting/StoreManagers.png" alt="" class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Store Managers</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Monitor real-time sales and footfall performance on the go. Allocate staff according to store traffic forecasting to ensure adequate coverage.</p>
                        </div>

                        <div
                            class="relative p-8 bg-gradient-to-br from-indigo-50 to-white rounded-3xl border border-indigo-100">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-indigo-100">06</div>
                            <img src="https://qwaiting.com/peoplecounting/StoreEmployees.png" alt="" class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Store Employees</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Real-time sales dashboards provide actionable recommendations, motivating staff to achieve sales targets.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BI Integration -->
                <div class="rounded-xl mb-16">
                    <div 
                    class="relative w-full bg-cover bg-center bg-no-repeat rounded-xl"
                    style="background-image: url('https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget3R.png');"
                    >
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40"></div>

                        <!-- Content -->
                        <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32">

                            <div class="max-w-xl space-y-6">
                                <h2 class="text-5xl font-bold text-white drop-shadow-lg">Integrate with your BI Systems</h2>

                                <p class="text-gray-200 text-lg leading-relaxed max-w-md">
                                    Integrating footfall and other data metrics into third-party Business Intelligence (BI) systems like PowerBI enables businesses to create a centralised view of data analytics.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Empowering Users -->
                <div class="pt-10">
                    <div 
                    class="relative w-full bg-cover bg-center bg-no-repeat rounded-xl"
                    style="background-image: url('https://qwaiting.com/peoplecounting/Software.jpg');"
                    >
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40"></div>

                        <!-- Content -->
                        <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32">

                            <div class="max-w-xl space-y-6">
                                <h2 class="text-5xl font-bold text-white drop-shadow-lg">Empowering Users with Easy-to-Use Design and Robust Features</h2>

                                <p class="text-gray-200 text-lg leading-relaxed max-w-md">
                                    Our people counting software provides ready-made templates for easy use. It enables retailers to gain insights for optimising operations and boosting sales conversions.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Why Qwaiting -->
                <div class="mt-10 p-10 bg-gray-100 shadow-2xl rounded-2xl">
                    <h2 class="text-3xl font-bold mb-10">Choose Qwaiting for a comprehensive turnkey solution. No hidden fees.</h2>

                    <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-8">
                        <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                            <img src="https://qwaiting.com/peoplecounting/CorporateDirector.png" alt="" class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Equipment and software installation</h3>
                        </div>

                        <div
                            class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                            <img src="https://qwaiting.com/peoplecounting/solution_pages.png" alt="" class="mb-4">
                                <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Insightful comparative counting metrics</h3>
                        </div>

                        <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                            <img src="https://qwaiting.com/peoplecounting/solution_login.png" alt="" class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Easy integration with your internal systems</h3>
                        </div>

                        <div class="relative p-8 bg-gradient-to-br from-pink-50 to-white rounded-3xl border border-pink-100">
                            <img src="https://qwaiting.com/peoplecounting/solution_chatbubble.png" alt="" class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Customer support and training</h3>
                        </div>

                        <div
                            class="relative p-8 bg-gradient-to-br from-indigo-50 to-white rounded-3xl border border-indigo-100">
                            <img src="https://qwaiting.com/peoplecounting/solution_dashboard.png" alt="" class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Device monitoring & maintenance</h3>
                            </div>
                        </div>
                    </div>

                <!-- Pricing -->
                <div class="p-10 bg-primary max-w-7xl mx-auto mt-10 rounded-2xl">
                    <h2 class="text-3xl font-bold text-white text-center">Pricing & Plan</h2>

                    <div class="grid md:grid-cols-2 gap-8 mt-12 max-w-6xl mx-auto px-6">

                        <!-- Plan 1 -->
                        <div class="relative p-8 rounded-2xl bg-white shadow-xl hover:scale-105 transition-transform">
                            <h3 class="text-2xl font-semibold text-gray-900">In/Out Counting</h3>

                            <!-- Subtitle -->
                            <p class="text-gray-900 font-semibold mt-8">For Small Businesses:</p>

                            <ul class="mt-3 space-y-2 text-gray-700">
                                <li class="flex gap-2">
                                    <span class="text-blue-600">✔</span>
                                    Simple People Counting with 1x FoofallCam 3D Pro2
                                </li>
                                <li class="flex gap-2">
                                    <span class="text-blue-600">✔</span>
                                    Staff Exclusion with 1x Staff Exclusion Button
                                </li>
                                <li class="flex gap-2">
                                    <span class="text-blue-600">✔</span>
                                    Complimentary software access with limited dashboard and report
                                </li>
                            </ul>

                            <!-- Features -->
                            <p class="text-gray-900 font-semibold mt-8">Features you’ll have:</p>

                            <p class="text-gray-700 mt-3 leading-relaxed">
                                Visitor Count (In/Out), Visit Durations, Outside Traffic, Turn in rate, Returning Visitors, 
                                Purchasing Groups, Group Size, Staff Exclusion
                            </p>

                            <!-- Buy Button -->
                            <a href="#"
                            class="mt-6 inline-flex items-center justify-between w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition">
                                Buy now
                                <span>→</span>
                            </a>
                        </div>

                        <!-- Plan 2 -->
                        <div class="relative p-8 rounded-2xl bg-white shadow-xl hover:scale-105 transition-transform">
                             <h3 class="text-2xl font-semibold text-gray-900">In/Out Counting</h3>

                                <!-- Subtitle -->
                                <p class="text-gray-900 font-semibold mt-8">For Mid-Size to Large Businesses:</p>

                                <ul class="mt-3 space-y-2 text-gray-700">
                                    <li class="flex gap-2">
                                        <span class="text-blue-600">✔</span>
                                        Simple People Counting with 1x FoofallCam 3D Pro2
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="text-blue-600">✔</span>
                                        Staff Exclusion with 1x Staff Exclusion Button
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="text-blue-600">✔</span>
                                        Visitor Demographic with 1x FaceCam
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="text-blue-600">✔</span>
                                        Live Footfall and Sales Data with 1x Sales Ticker
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="text-blue-600">✔</span>
                                        Complimentary software access
                                    </li>
                                </ul>

                                <!-- Features -->
                                <p class="text-gray-900 font-semibold mt-8">Features you’ll have:</p>

                                <p class="text-gray-700 mt-3 leading-relaxed">
                                    Visitor Count (In/Out), Visit Durations, Outside Traffic, Turn in rate, Returning Visitors, 
                                    Purchasing Groups, Group Size, Staff Exclusion, Sales Target Tracking, Visitor Demographics 
                                    (Age, Gender, Mood)
                                </p>
                                <!-- Buy Button -->
                                <a href="#"
                                class="mt-6 inline-flex items-center justify-between w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition">
                                    Buy now
                                    <span>→</span>
                                </a>
                        </div>

                    </div>

                </div>

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

            </section>

            <!-- Products tab -->
            <section id="products" class="tab-content hidden">

                <!-- Title -->
                <div class="text-center max-w-3xl mx-auto py-16">
                    <h2 class="text-4xl font-bold text-gray-900">Accurate People Counting <span class="text-primary">for All Environment</span></h2>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        We provide powerful AI-driven people counting sensors designed to fit various environments — 
                        from small stores to large public spaces.
                    </p>
                </div>


                <!-- PRODUCT ICON GRID (modern floating style) -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mt-10 max-w-7xl mx-auto px-6">
                    <!-- ITEM -->
                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/3DPro2.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">3D Pro2™</h4>
                        <p class="text-gray-600 text-sm mt-2">3D People Counting for Door Entrances</p>
                    </div>

                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/3DProWave.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">3D ProWide™</h4>
                        <p class="text-gray-600 text-sm mt-2">Wide Entrance Sensor for Larger Areas</p>
                    </div>

                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/3DMini.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">3D Mini™</h4>
                        <p class="text-gray-600 text-sm mt-2">Mini Sensor for Small Entrances</p>
                    </div>

                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/MeshHub.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">Mesh Hub™</h4>
                        <p class="text-gray-600 text-sm mt-2">Networking Gateway for IoT Sensors</p>
                    </div>

                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/FaceCam.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">FaceCam™</h4>
                        <p class="text-gray-600 text-sm mt-2">AI-Powered Facial Recognition Sensor</p>
                    </div>

                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/Centroid.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">Centroid™</h4>
                        <p class="text-gray-600 text-sm mt-2">AI Video Analytics for Existing CCTV</p>
                    </div>

                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/SpaceSense.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">SpaceSense™</h4>
                        <p class="text-gray-600 text-sm mt-2">Activity Tracking Sensor for Large Areas</p>
                    </div>

                    <div class="group bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow hover:shadow-xl transition-all">
                        <img src="https://qwaiting.com/peoplecounting/SalesTicker.png" class="h-20 mx-auto" />
                        <h4 class="font-semibold mt-4 text-lg">Sales Ticker™</h4>
                        <p class="text-gray-600 text-sm mt-2">Live Store Data Reader</p>
                    </div>
                </div>


                <!-- ========================= FEATURE BLOCKS (Your backgrounds preserved) ========================== -->

                <!-- Standard Ceiling Height -->
                <div class="mt-20 rounded-2xl overflow-hidden shadow-lg bg-black text-white">
                    <div class="grid md:grid-cols-2">

                        <!-- LEFT CONTENT -->
                        <div class="p-10 flex flex-col justify-center">
                            <h3 class="text-3xl font-bold leading-tight">
                                3D People Counter for <br> Standard Ceiling Height
                            </h3>

                            <p class="text-gray-300 mt-4">
                                This flagship people counter, designed for entrance counting, with unparalleled accuracy of up to 99%.
                            </p>

                            <ul class="mt-6 space-y-3 text-gray-200 text-lg">
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    3D Stereo Vision and A.I. Analytics
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Mounting Heights: 2.1m – 4.5m
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Suitable for retail stores and shopping malls
                                </li>
                            </ul>
                        </div>

                        <!-- RIGHT IMAGE — FULLY VISIBLE -->
                        <div class="relative">
                            <img src="https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_Pro2.jpg" 
                                class="w-full h-full object-cover" />
                        </div>

                    </div>
                </div>


                <!-- LARGE AREA TRACKING -->
                <div class="mt-20 rounded-2xl overflow-hidden shadow-lg bg-white">
                    <div class="grid md:grid-cols-2">

                        <!-- LEFT CONTENT -->
                        <div class="p-10 flex flex-col justify-center bg-gray-50">
                            <h2 class="text-4xl font-bold text-gray-900 leading-tight">
                                Activity Tracking Sensor <br> for Larger Area
                            </h2>

                            <p class="mt-4 text-gray-600 text-lg">
                                The People Counter Sensor is designed to provide anonymous counting at the source. 
                                It ensures full privacy for people, with no video recording involved.
                            </p>

                            <ul class="mt-6 space-y-3 text-gray-700 text-lg">
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Millimetre Wave Sensor
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    120° super-wide coverage
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Can count people even in sitting position
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Suitable for larger areas (e.g., office collaboration areas)
                                </li>
                            </ul>
                        </div>

                        <!-- RIGHT SIDE FULL IMAGE -->
                        <div class="relative">
                            <img 
                                src="https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_ProWave.jpg" 
                                alt="Activity Tracking Sensor"
                                class="w-full h-full object-cover"
                            >
                        </div>

                    </div>
                </div>


                <!-- TOF SENSOR -->
                <div class="mt-20 rounded-2xl overflow-hidden shadow-lg bg-black text-white">
                    <div class="grid md:grid-cols-2">

                        <!-- LEFT CONTENT -->
                        <div class="p-10 flex flex-col justify-center">
                            <h3 class="text-3xl font-bold leading-tight">
                                ToF Sensor for <br> Single-Door Entrance
                            </h3>

                            <p class="text-gray-300 mt-4">
                                Cost effective people counter for single door, designed to count even under low light or complete darkness.
                            </p>

                            <ul class="mt-6 space-y-3 text-gray-200 text-lg">
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Time-of-Flight (ToF) Sensor
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Total privacy - No camera
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Mounting Heights: 1.9m - 3.0m
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Suitable for meeting rooms and washrooms
                                </li>
                            </ul>
                        </div>

                        <!-- RIGHT IMAGE — FULLY VISIBLE -->
                        <div class="relative">
                            <img src="https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_3DMini.jpg" 
                                class="w-full h-full object-cover" />
                        </div>

                    </div>
                </div>

                <!-- AI FACIAL SENSOR -->
                <div class="mt-20 rounded-2xl overflow-hidden shadow-lg bg-white">
                    <div class="grid md:grid-cols-2">

                        <!-- LEFT CONTENT -->
                        <div class="p-10 flex flex-col justify-center bg-gray-50">
                            <h2 class="text-4xl font-bold text-gray-900 leading-tight">
                                AI Video Analytics for <br>Existing CCTV System
                            </h2>

                            <p class="mt-4 text-gray-600 text-lg">
                                Integrate AI analytics into your CCTV system to enhance cost efficiency without any extra infrastructure costs.
                            </p>

                            <ul class="mt-6 space-y-3 text-gray-700 text-lg">
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    AI video analytics for people detection and tracking
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Works with any IP CCTV cameras
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Supports up to 8x areas of interest
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Suitable for retail, shopping malls and public venues
                                </li>
                            </ul>
                        </div>

                        <!-- RIGHT SIDE FULL IMAGE -->
                        <div class="relative">
                            <img 
                                src="https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_Centroid.jpg" 
                                alt="Activity Tracking Sensor"
                                class="w-full h-full object-cover"
                            >
                        </div>

                    </div>
                </div>

                <!-- AI FACIAL SENSOR -->
                <div class="mt-20 rounded-2xl overflow-hidden shadow-lg bg-white">
                    <div class="grid md:grid-cols-2">

                        <!-- LEFT CONTENT -->
                        <div class="p-10 flex flex-col justify-center bg-gray-50">
                            <h2 class="text-4xl font-bold text-gray-900 leading-tight">
                                AI-Powered Facial <br>Recognition Sensor
                            </h2>

                            <p class="mt-4 text-gray-600 text-lg">
                                Designed to capture faces at eye-level for higher accuracy on facial detection and analysis.
                            </p>

                            <ul class="mt-6 space-y-3 text-gray-700 text-lg">
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Adaptive AI Analytics Camera Sensor
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Lightweight, flexible mounting options
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    AI-based image processing
                                </li>
                                <li class="flex gap-3 items-start">
                                    <span class="text-blue-600 text-xl">•</span>
                                    Demographic analysis for customer profiling
                                </li>
                            </ul>
                        </div>

                        <!-- RIGHT SIDE FULL IMAGE -->
                        <div class="relative">
                            <img 
                                src="https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_FaceCam.png" 
                                alt="Activity Tracking Sensor"
                                class="w-full h-full object-cover"
                            >
                        </div>

                    </div>
                </div>

                <!-- BLUE GATEWAY SECTION -->
                 <div class="mt-20 rounded-2xl overflow-hidden shadow-lg bg-black text-white">
                    <div class="grid md:grid-cols-2">

                        <!-- LEFT CONTENT -->
                        <div class="p-10 flex flex-col justify-center">
                            <h3 class="text-3xl font-bold leading-tight">
                                Networking Gateway <br>for IoT Sensors
                            </h3>

                            <p class="text-gray-300 mt-4">
                                Designed primarily as a Network Gateway for our IoT devices, it also supports third-party sensors.
                            </p>

                            <ul class="mt-6 space-y-3 text-gray-200 text-lg">
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Multiple network variants available
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Connect up to 50 IoT devices
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Standalone Mesh Network with daisy-chaining
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-400 text-xl">•</span>
                                    Ultra low power consumption
                                </li>
                            </ul>
                        </div>

                        <!-- RIGHT IMAGE — FULLY VISIBLE -->
                        <div class="relative">
                            <img src="https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_Pro2.jpg" 
                                class="w-full h-full object-cover" />
                        </div>

                    </div>
                </div>


                <!-- KEY FEATURES -->
                <div class="mt-24 max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold">Key Features of People Counting System</h2>

                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                        <!-- 01 -->
                        <div class="relative p-8 bg-gradient-to-br from-blue-50 to-white rounded-3xl border border-blue-100">
                            <img src="https://qwaiting.com/peoplecounting/Feature_EntranceCounting.png" alt="" class="mb-4">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-blue-100">01</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Entrance Counting</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">The most essential people counting data all businesses need is to measure visitor numbers at entrance, helping in understanding traffic trends.</p>
                        </div>

                        <!-- 02 -->
                        <div class="relative p-8 bg-gradient-to-br from-purple-50 to-white rounded-3xl border border-purple-100">
                            <img src="https://qwaiting.com/peoplecounting/Feature_UTurn.png" alt="" class="mb-4">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-purple-100">02</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">U-Turn Filter</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">If a person doesn't fully enter your premise and leaves, their count won't be included, ensuring that the actual conversion rate is reflected.</p>
                        </div>

                        <!-- 03 -->
                        <div class="relative p-8 bg-gradient-to-br from-green-50 to-white rounded-3xl border border-green-100">
                            <img src="https://qwaiting.com/peoplecounting/Feature_ChildFilter.png" alt="" class="mb-4">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-green-100">03</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Child Filter</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Utilising the 3D depth map, our people counter can differentiate between adults and children, excluding children from the count.</p>
                        </div>

                        <!-- 04 -->
                        <div class="relative p-8 bg-gradient-to-br from-orange-50 to-white rounded-3xl border border-orange-100">
                            <img src="https://qwaiting.com/peoplecounting/Feature_GroupCount.png" alt="" class="mb-4">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-orange-100">04</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Group Count</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Identify “groups” by analysing the proximity and timing of individuals; “purchasing group” metric is often more relevant than individual counts.</p>
                        </div>

                        <!-- 05 -->
                        <div class="relative p-8 bg-gradient-to-br from-pink-50 to-white rounded-3xl border border-pink-100">
                            <img src="https://qwaiting.com/peoplecounting/Feature_StaffExclusion.png" alt="" class="mb-4">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-pink-100">05</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Employee Exclusion</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">Distinguish employees from visitors with staff exclusion methods, achieving a more accurate footfall count for realistic sales conversions.</p>
                        </div>

                        <!-- 06 -->
                        <div class="relative p-8 bg-gradient-to-br from-indigo-50 to-white rounded-3xl border border-indigo-100">
                            <img src="https://qwaiting.com/peoplecounting/Feature_PrivacyFilters.png" alt="" class="mb-4">
                            <div class="absolute top-6 right-6 text-6xl font-bold text-indigo-100">06</div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 relative z-10">Privacy Filters</h3>
                            <p class="text-gray-600 leading-relaxed relative z-10">We offer three levels of privacy filters to ensure no personally identifiable information is captured. Contact us to learn more.</p>
                        </div>

                    </div>

                </div>


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

            </section>


            <section id="software" class="tab-content hidden">
                <div class="max-w-7xl mx-auto">
                    
                    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
                        <div class="max-w-7xl mx-auto px-6">
                            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
                                <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                                    Complete People Counting Software
                                </span>
                                <span class="block bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                    with Powerful Features
                                </span>
                            </h2>

                            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">

                                <!-- Card 1 -->
                                <div class="p-8 bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all border border-gray-100">
                                    <div class="flex justify-center mb-6">
                                        <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-blue-50">
                                            <img src="https://qwaiting.com/peoplecounting/Software_ReportTemplates.png" alt="">
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Report Templates</h3>
                                    <p class="text-gray-600 text-center leading-relaxed">
                                        More than 60 reports available, catering to 10 industry use cases.
                                    </p>
                                </div>

                                <!-- Card 2 -->
                                <div class="p-8 bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all border border-gray-100">
                                    <div class="flex justify-center mb-6">
                                        <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-purple-50">
                                            <img src="https://qwaiting.com/peoplecounting/Software_CustomDashboards.png" alt="">
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Custom Dashboards</h3>
                                    <p class="text-gray-600 text-center leading-relaxed">
                                        Build your dashboard with your preferred metrics and data views.
                                    </p>
                                </div>

                                <!-- Card 3 -->
                                <div class="p-8 bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all border border-gray-100">
                                    <div class="flex justify-center mb-6">
                                        <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-green-50">
                                            <img src="https://qwaiting.com/peoplecounting/Software_UnlimitedUsers.png" alt="">
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Unlimited Users</h3>
                                    <p class="text-gray-600 text-center leading-relaxed">
                                        No extra cost for user access within the same enterprise.
                                    </p>
                                </div>

                                <!-- Card 4 -->
                                <div class="p-8 bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all border border-gray-100">
                                    <div class="flex justify-center mb-6">
                                        <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-orange-50">
                                            <img src="https://qwaiting.com/peoplecounting/Software_IntegrateSystems.png" alt="">
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">Integrate Systems</h3>
                                    <p class="text-gray-600 text-center leading-relaxed">
                                        Works with your existing BI and third-party systems.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </section>


                    <div class="relative max-w-6xl mx-auto">

                        {{-- Step 1 --}}
                        <div class="relative mb-32" style="margin-bottom: 150px;">
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="md-_w_2">
                                    <h3 class="text-3xl font-bold text-text-dark mb-4">Daily Footfall Trend</h3>
                                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    The most basic and essential data metrics for businesses:
                                    </p>
                                    <ul class="space-y-3">
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">“How many people visited my premise today?”</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">“How is this week’s traffic performance compared to last week?”</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">“Is the footfall pattern similar to last year’s trend?”</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="md-_w_2">
                                    <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8">
                                        <div class="text-center">
                                            <img src="https://qwaiting.com/peoplecounting/DailyFootfallTrend.png"
                                                alt="Cloud-Powered Infrastructure" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Step 2 --}}
                        <div class="relative mb-32" style="margin-bottom: 150px;">
                            <div class="flex flex-col md:flex-row-reverse items-center gap-8">

                                <div class="md-_w_2">
                                    <h3 class="text-3xl font-bold text-text-dark mb-4">Identify the Peak Hours</h3>
                                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                        Identifying peak and off-peak footfall patterns helps business owners and managers make actionable decisions based on traffic insights,
                                    </p>
                                    <ul class="space-y-3">
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Staff allocation</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Marketing event planning</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Operation optimisation based on predictions</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="md-_w_2">
                                    <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                        <div class="text-center">
                                            <img src="https://qwaiting.com/peoplecounting/IdentifythePeakHours.png"
                                                alt="Cloud-Powered Infrastructure" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Step 3 --}}
                        <div class="relative mb-32" style="margin-bottom: 150px;">
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="md-_w_2">
                                    <h3 class="text-3xl font-bold text-text-dark mb-4">Visitor Journey</h3>
                                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                        Analyse the user journey upon visiting your premises, utilising heatmaps and area polygons to identify the most and least popular areas. This includes:
                                    </p>
                                    <ul class="space-y-3">
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Identifying the most and least popular items based on engagement rate</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Optimising merchandise placement</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Making promotional planning decisions</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="md-_w_2">
                                    <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8 ">
                                        <div class="text-center">
                                            <img src="https://qwaiting.com/peoplecounting/VisitorJourney.png"
                                                alt="Cloud-Powered Infrastructure" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Step 4 --}}
                        <div class="relative mb-32" style="margin-bottom: 150px;">
                            <div class="flex flex-col md:flex-row-reverse items-center gap-8">

                                <div class="md-_w_2">
                                    <h3 class="text-3xl font-bold text-text-dark mb-4">Predictive Analytics</h3>
                                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                        AI predictive modeling utilises historical traffic data and other datasets (sales, store, staff, weather, demographics, etc.) to accurately forecast future data patterns and trends, enabling better planning.
                                    </p>
                                </div>
                                <div class="md-_w_2">
                                    <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                        <div class="text-center">
                                            <img src="https://qwaiting.com/peoplecounting/PredictiveAnalytics.png"
                                                alt="Cloud-Powered Infrastructure" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        {{-- Step 5 --}}
                        <div class="relative mb-32" style="margin-bottom: 150px;">
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="md-_w_2">
                                    <h3 class="text-3xl font-bold text-text-dark mb-4">Live Data Monitoring</h3>
                                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                        Provide real-time data insights, empowering businesses to take immediate actions based on footfall trends and configurable business rules. This includes:
                                    </p>
                                    <ul class="space-y-3">
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Instant notifications and alerts</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Action logs for tracking and review</span>
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-text-medium">Ensuring SLA compliance and enhancing operational efficiency.</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="md-_w_2">
                                    <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8 ">
                                        <div class="text-center">
                                            <img src="https://qwaiting.com/peoplecounting/LiveDataMonitoring.png"
                                                alt="Cloud-Powered Infrastructure" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                        {{-- Step 6 --}}
                        <div class="relative">
                            <div class="flex flex-col md:flex-row-reverse items-center gap-8">
                                <div class="md-_w_2">
                                    <h3 class="text-3xl font-bold text-text-dark mb-4">Enterprise SSO</h3>
                                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                        Seamlessly access multiple systems, including V9 Cloud, with a single login. V9 Cloud supports SSO integration and Active Directory, enabling seamless user authentication and access management across platforms.
                                    </p>
                                </div>

                                <div class="md-_w_2">
                                    <div class="relative bg-gradient-to-br from-purple-50 to-primary/10 rounded-3xl p-8 ">
                                        <div class="text-center">
                                            <img src="https://qwaiting.com/peoplecounting/EnterpriseSSO.png"
                                                alt="Cloud-Powered Infrastructure" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Step 7 --}}
                        <div class="relative mb-32" style="margin-bottom: 150px;">
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="md-_w_2">
                                    <h3 class="text-3xl font-bold text-text-dark mb-4">Integrate with your BI Systems</h3>
                                    <p class="text-lg text-text-medium mb-6 leading-relaxed">
                                    V9 Cloud integrates footfall data into customers' BI systems such as Tableau, PowerBI, and ERP systems, providing comprehensive visibility and streamlining integration management for centralised data viewing through a single platform.
                                    </p>
                                </div>
                                <div class="md-_w_2">
                                    <div class="relative bg-gradient-to-br from-primary/10 to-purple-100 rounded-3xl p-8">
                                        <div class="text-center">
                                            <img src="https://qwaiting.com/peoplecounting/IntegrateBISystems.png"
                                                alt="Cloud-Powered Infrastructure" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

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
            </section>


            <section id="package" class="tab-content hidden">
                <div class="">
                    <div class="rounded-xl mb-16">
                        <div 
                        class="relative w-full bg-cover bg-center bg-no-repeat rounded-xl"
                        style="background-image: url('https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_Package.jpg');"
                        >
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black/40"></div>

                            <!-- Content -->
                            <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32">

                                <div class="max-w-xl space-y-6">
                                    <h2 class="text-5xl font-bold text-white drop-shadow-lg">3D Pro2 People Counting System</h2>

                                    <p class="text-gray-200 text-lg leading-relaxed max-w-md">
                                        The 3D Pro2 People Counting System is manufactured in the U.K. It is the world’s best-selling people counter. Vertical integration and high production volumes significantly reduce costs. It offers exceptional pricing without sacrificing quality or performance. With a wide array of multifunctional features, this system provides a versatile and reliable solution for businesses of all sizes.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="pt-10 mb-16">
                        <div 
                        class="relative w-full bg-cover bg-center bg-no-repeat rounded-xl"
                        style="background-image: url('https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget2_Package2.jpg');"
                        >
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black/40"></div>

                            <!-- Content -->
                            <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32">

                                <div class="max-w-xl space-y-6">
                                    <h2 class="text-5xl font-bold text-white drop-shadow-lg">People Counting V9: Visitor Analytics for Physical Spaces</h2>

                                    <p class="text-gray-200 text-lg leading-relaxed max-w-md">
                                        People Counting V9 software allows you to extract data insights without requiring any technical training. It has helped thousands of store owners improve their revenue and operational efficiency.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl">
                        <div 
                        class="relative w-full bg-cover bg-center bg-no-repeat rounded-xl"
                        style="background-image: url('https://qwaiting.com/peoplecounting/BackgroundTemplate_Widget3R.png');"
                        >
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black/40"></div>

                            <!-- Content -->
                            <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32">

                                <div class="max-w-xl space-y-6">
                                    <h2 class="text-5xl font-bold text-white drop-shadow-lg">Integrate AI Analytics for Enhanced Efficiency</h2>

                                    <p class="text-gray-200 text-lg leading-relaxed max-w-md">
                                        Integrate AI analytics into your CCTV system to boost cost efficiency without any additional infrastructure costs.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
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
            </section>
            <section id="usecases" class="tab-content hidden">
                <section class="py-24 bg-white">
                    <div class="max-w-7xl mx-auto px-6">
                        
                        <!-- Section Header -->
                        <div class="text-center mb-16">
                            <h2 class="text-4xl font-bold text-gray-900">
                                People Counting Software for All Industries
                            </h2>
                            <p class="text-gray-600 mt-4 text-lg max-w-2xl mx-auto">
                                Powerful insights to optimize operations, enhance customer experience, and improve space utilization across every industry.
                            </p>
                        </div>

                        <!-- Modern Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/shopping-mall-foot-traffic.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Shopping Mall Foot Traffic</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Track shopper footfall to enhance operations and retail strategies. Use insights for mall leasing, marketing, and customer experience improvements.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/retail-store-analytics.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Retail Store Analytics</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Measure in-store foot traffic to boost customer engagement and refine product placement. Maximise sales conversion and retail efficiency potential.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/museum.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Museum Patron Counting</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Monitor visitor traffic and engagement within exhibits. Improve exhibit placement and enrich museum visitor experiences based on traffic data.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/library-patron-analytics.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Library Patron Analytics</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Count patrons and measure facility usage to justify funding and improve resource allocation. Enhance library services based on data insights.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/bus-service-planning.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Bus Service Planning</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Use passenger counting data to design bus routes, schedules, and improve transportation efficiency. Enhance urban planning with real-time data.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/washroom-efficiency-optimisation.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Washroom Efficiency</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Utilise footfall data to adjust cleaning schedules and maintenance. Improve hygiene standards and reduce operational costs with demand-based scheduling.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/street-traffic-counting.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Street Traffic Counting</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Track pedestrian and vehicle movement in urban areas. Use insights to improve city planning, pedestrian safety, and traffic management.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/food-establishment-queues.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Food Establishment Queues</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Refine queue management for quick service restaurants (QSR). Improve customer experience by reducing wait times and streamlining service flow.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/airport-passenger-monitoring.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Airport Passenger Monitoring</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Track passenger flow through various airport terminals. Enhance security processes, reduce wait times, and improve operational efficiency with real-time data.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/supermarket-traffic-analysis.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Supermarket Traffic</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Measure customer foot traffic to adjust supermarket layout and checkout queues. Improve shopper experience and reduce waiting times at checkout.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/university-campus-occupancy.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">University Campus Occupancy</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Monitor classroom and facility occupancy across campuses. Improve resource allocation, adjust scheduling, and enhance student experience based on data.
                                </p>
                            </div>

                            <!-- Card -->
                            <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-white transition-all duration-300 hover:shadow-xl border border-gray-200">
                                <div class="mb-6 text-primary text-4xl">
                                    <img src="https://qwaiting.com/peoplecounting/public-venue-monitoring.png" alt="">
                                </div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-900">Public Venue Monitoring</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Track occupancy in real-time to ensure crowd control and safety. Improve space usage and enhance visitor experiences during public events.
                                </p>
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
            </section>

        </div>

        




<!-- TAB SCRIPT -->
<script>
const btns = document.querySelectorAll('.tab-btn');
const tabs = document.querySelectorAll('.tab-content');

btns.forEach(btn => {
    btn.addEventListener('click', () => {

        // Remove active class from all buttons
        btns.forEach(b => b.classList.remove('active-tab', 'text-gray-300'));

        btn.classList.add('active-tab');
        btn.classList.remove('text-gray-300');

        tabs.forEach(tab => tab.classList.add('hidden'));

        document.getElementById(btn.dataset.tab).classList.remove('hidden');
    });
});
</script>

</div>

@endsection