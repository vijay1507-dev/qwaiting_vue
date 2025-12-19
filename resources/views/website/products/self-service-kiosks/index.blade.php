@extends('website.layout.website')

@section('content')

    <div class="min-h-screen">

        {{-- Hero Section --}}
        <section
            class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-purple-50 to-white">
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    {{-- Left Content --}}
                    <div>
                        <h1 class="text-5xl lg:text-6xl font-bold text-text-dark mb-6 leading-tight">
                            Interactive Self-Service Kiosk Solutions for
                            <span class="text-primary">Faster Check-ins</span>
                        </h1>
                        <p class="text-xl text-text-medium mb-8 leading-relaxed">
                            Enjoy quick, hassle-free check-ins with Qwaiting's interactive self-service kiosks. Reduce wait
                            times, streamline visitor flow, and deliver a seamless service experience, right at your
                            customers' fingertips.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="/signup"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-primary text-white rounded-xl font-semibold hover:bg-primary-dark transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                <span>Start Your Free Trial</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                            <a href="/contact"
                                class="px-8 py-4 bg-white border-2 border-primary text-primary rounded-xl font-semibold hover:bg-primary transition-all hover:-translate-y-1 shadow-md">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    {{-- Right Image --}}
                    <div class="relative">
                        <div class="relative rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                            <img src="{{ asset('website/asset/images/self-service-kiosks.png') }}" alt="Self-Service Kiosk"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Select Kiosk Type Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white" x-data="{ activeTab: 'tabletop' }">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Select Kiosk You Want to
                        <span class="text-primary">Buy</span>
                    </h2>
                </div>

                {{-- Tab Navigation --}}
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    <button @click="activeTab = 'tabletop'" :class="activeTab === 'tabletop'
                                    ? 'bg-primary text-white shadow-lg scale-105'
                                    : 'bg-white text-text-medium hover:bg-gray-50'" class="px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 
                                    border-2 border-transparent hover:border-primary/20">
                        Tabletop Kiosk
                    </button>

                    <button @click="activeTab = 'floor'"
                        :class="{ 'bg-primary text-white shadow-lg scale-105': activeTab === 'floor', 'bg-white text-text-medium hover:bg-gray-50': activeTab !== 'floor' }"
                        class="px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                        Floor-standing Kiosk
                    </button>
                    <button @click="activeTab = 'wall'"
                        :class="{ 'bg-primary text-white shadow-lg scale-105': activeTab === 'wall', 'bg-white text-text-medium hover:bg-gray-50': activeTab !== 'wall' }"
                        class="px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                        Wall-Mounted Kiosk
                    </button>
                </div>

                {{-- Tab Content --}}
                <div class="relative min-h-[600px]">
                    {{-- Tabletop Content --}}
                    <div x-show="activeTab === 'tabletop'" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0" class="grid md:grid-cols-2 gap-8">

                        {{-- D4-503 --}}
                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
                            <div
                                class="h-64 overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 p-8 flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/desktop-kiosk.png') }}" alt="D4-503"
                                    class="max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-text-dark mb-2">D4-503</h3>
                                <p class="text-text-medium mb-6 text-sm">Our tabletop kiosk is a durable, user-friendly
                                    solution equipped with a responsive touchscreen and high-speed thermal printer. Designed
                                    for continuous use in high-traffic environments, it offers customizable service options
                                    and an intuitive interface, allowing visitors to check in or access information with
                                    ease. Conveniently placed on a table, desk, or floor stand, it delivers flexibility
                                    without compromising performance.</p>
                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Display:</span>
                                        <span>15.6” (FHD) 1920x1080</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Processor:</span>
                                        <span>Quad-Core, Cortex-A55, up to 2.0GHz</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Operating System:</span>
                                        <span>Android 11, 32-bit</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Memory:</span>
                                        <span>GB RAM + 16GB ROM 4GB RAM + 32GB ROM</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Dimensions:</span>
                                        <span> 380 x 195 x 407mm</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Weight:</span>
                                        <span>6.3Kg</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Printer:</span>
                                        <span>High-speed printing, up to 250mm/s, With an automatic cutter, 58mm/80mm in
                                            width & 80mm in diameter</span>
                                    </div>
                                </div>
                                <a target="_blank" href="https://qwaiting.com/frontimg/D4-Kiosk.pdf"
                                    class="block w-full py-3 text-center border-2 border-primary text-primary rounded-xl font-bold hover:bg-primary hover:text-white transition-all">
                                    Download PDF
                                </a>
                            </div>
                        </div>

                        {{-- D1 (10.1") --}}
                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
                            <div
                                class="h-64 overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 p-8 flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/D1-Desktop-POS-Rendering-2-large 1.png') }}" alt="D1"
                                    class="max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-text-dark mb-2">D1 (10.1")</h3>
                                <p class="text-text-medium mb-6 text-sm">The D1 (10.1) is a compact, all-in-one POS kiosk
                                    designed for retail, beauty, and service-based businesses. Featuring a high-resolution
                                    display and fast-printing capability, it streamlines transactions and enhances customer
                                    engagement, delivering a seamless self-service experience.</p>
                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Display:</span>
                                        <span>10.1'' 1280x800 + 2.4'' LED</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Processor:</span>
                                        <span>1Dual-core ARM Cortex-A75, up to 1.8GHz Six-core ARM Cortex- A55, up to
                                            1.8GHz</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">OS:</span>
                                        <span>Android 11 series</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Dimensions:</span>
                                        <span>250 x 168 x 80mm</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Memory:</span>
                                        <span>2GB RAM+ 16GB ROM 2GB RAM+ 16GB ROM (NFC)</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Weight:</span>
                                        <span>900g</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Printer:</span>
                                        <span>High-speed (100mm/s), 58mm</span>
                                    </div>
                                </div>
                                <a href="https://qwaiting.com/frontimg/D1.pdf" target="_blank"
                                    class="block w-full py-3 text-center border-2 border-primary text-primary rounded-xl font-bold hover:bg-primary hover:text-white transition-all">
                                    Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Floor-standing Content --}}
                    <div x-show="activeTab === 'floor'" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0" class="grid md:grid-cols-3 gap-8"
                        style="display: none;">

                        {{-- Touch Mini (10.1") --}}
                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
                            <div
                                class="h-64 overflow-hidden bg-gradient-to-br from-purple-50 to-purple-100 p-8 flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/floorstanding-kiosk.png') }}" alt="Touch Mini 10.1"
                                    class="max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="p-8">
                                <h3 class="text-xl font-bold text-text-dark mb-2">Touch Mini (10.1")</h3>
                                <p class="text-text-medium mb-6 text-xs">The Touch Mini Floorstanding Kiosk combines sleek
                                    design with advanced functionality, making it a secure and versatile solution for modern
                                    service environments. Fixed securely to the floor to prevent unauthorized movement, it
                                    offers optional add-ons such as a self-checkout tablet, creating a personalized and
                                    efficient user experience</p>
                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Display:</span>
                                        <span>16:10 (Display scale); 305mmx229mm (Display area)</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Processor:</span>
                                        <span>J1900/i3/i5/i7 RK3288/RK3399</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">OS:</span>
                                        <span>Android 11 series</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Dimensions:</span>
                                        <span>600mm(L)*354mm(W)*1350mm(H)</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Memory:</span>
                                        <span>2GB/4GB/8GB</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Speaker:</span>
                                        <span>2 built-in speakers for playing video or voice announcements.</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Printer:</span>
                                        <span>With an automatic cutter, Support 58mm OD paper roll</span>
                                    </div>
                                </div>
                                <a href="https://qwaiting.com/frontimg/10.1-koiosk.pdf" target="_blank"
                                    class="block w-full py-3 text-center border-2 border-primary text-primary rounded-xl font-bold hover:bg-primary hover:text-white transition-all">
                                    Download PDF
                                </a>
                            </div>
                        </div>

                        {{-- Touch Mini (18.5") --}}
                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
                            <div
                                class="h-64 overflow-hidden bg-gradient-to-br from-purple-50 to-purple-100 p-8 flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/touch-mini-kiosk.png') }}" alt="Touch Mini 18.5"
                                    class="max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="p-8">
                                <h3 class="text-xl font-bold text-text-dark mb-2">Touch Mini (18.5")</h3>
                                <p class="text-text-medium mb-6 text-xs">Touch Mini Kiosks are compact and user-friendly
                                    kiosks that can be connected to a display screen, internal computer, or barcode scanner.
                                    These kiosks support multiple operating systems, making them easy to use and highly
                                    customizable. They are particularly useful in the retail, hospitality, and
                                    transportation industries.</p>
                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Display:</span>
                                        <span>16:9 (Display scale); 409mmx230mm (Display area)</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Processor:</span>
                                        <span>J1900/i3/i5/i7 RK3288/RK3399</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Operating System:</span>
                                        <span>Android Window</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Dimensions:</span>
                                        <span>600mm(L)*353.26mm(W)*1398.25mm(H)</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Memory:</span>
                                        <span>2GB/4GB/8GB ROM:8GB/32GB/64GB/128GB SSD</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Speaker:</span>
                                        <span>2 built-in speakers for playing video clips or voice broadcasts.</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Printer:</span>
                                        <span>With an automatic cutter, Support 58mm OD paper roll</span>
                                    </div>
                                </div>
                                <a href="https://qwaiting.com/frontimg/18.5-kiosk.pdf" target="_blank"
                                    class="block w-full py-3 text-center border-2 border-primary text-primary rounded-xl font-bold hover:bg-primary hover:text-white transition-all">
                                    Download PDF
                                </a>
                            </div>
                        </div>

                        {{-- S1-108 --}}
                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
                            <div
                                class="h-64 overflow-hidden bg-gradient-to-br from-purple-50 to-purple-100 p-8 flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/S1-108.png') }}" alt="S1-108"
                                    class="max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="p-8">
                                <h3 class="text-xl font-bold text-text-dark mb-2">S1-108</h3>
                                <p class="text-text-medium mb-6 text-xs">The S1-108 kiosk's main goal is to reduce long
                                    waiting times, lower labor costs, and maintain consistent service levels. It's easy
                                    installation makes it a convenient choice for businesses looking to improve customer
                                    experience. The self-checkout feature allows customers to complete transactions
                                    independently, transforming any business into a self-service automated system.</p>
                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Display:</span>
                                        <span>21.5" 1920x1080</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Processor:</span>
                                        <span>Quad-Core ARM, Cortex-A17, 32-bit 1.6GHz</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Operating System:</span>
                                        <span>Android 7.1</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Dimensions:</span>
                                        <span>Host:805.5x348x100mm Stand:625*500*1106mm</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Memory:</span>
                                        <span>2GB RAM + 16GB ROM 4GB RAM + 64GB ROM</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Speaker:</span>
                                        <span>3W Mono</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-text-medium">
                                        <span class="w-24 font-semibold text-text-dark">Printer:</span>
                                        <span>80mm printer scanner</span>
                                    </div>
                                </div>
                                <a href="https://qwaiting.com/frontimg/S1_108.pdf" target="_blank"
                                    class="block w-full py-3 text-center border-2 border-primary text-primary rounded-xl font-bold hover:bg-primary hover:text-white transition-all">
                                    Download PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Wall-Mounted Content --}}
                    <div x-show="activeTab === 'wall'" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0" class="justify-center" style="display: none;">

                        {{-- S1-701 --}}
                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group md:col-span-2 lg:col-span-1 lg:col-start-2">
                            <div
                                class="h-64 overflow-hidden bg-gradient-to-br from-green-50 to-green-100 p-8 flex items-center justify-center">
                                <img src="{{ asset('website/asset/images/wall-mounted-kiosk.png') }}" alt="S1-701"
                                    class="max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-text-dark mb-2">S1-701 Kiosk</h3>
                                <p class="text-text-medium mb-6 text-sm">The Wall-Mounted Kiosk combines a sleek,
                                    space-saving design with powerful functionality, making it ideal for locations with
                                    limited floor space. Customers can easily self-check in, generate queue tickets, and
                                    benefit from automatic barcode and QR code detection for a fast, intuitive experience.
                                    Equipped with dual built-in speakers, it also supports clear stereo sound, enhancing
                                    usability and engagement.</p>
                                <div class="grid grid-cols-2 gap-4 mb-8">
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-3 text-sm text-text-medium">
                                            <span class="w-24 font-semibold text-text-dark">Display:</span>
                                            <span>23.8"</span>
                                        </div>
                                        <div class="flex items-center gap-3 text-sm text-text-medium">
                                            <span class="w-24 font-semibold text-text-dark">Processor:</span>
                                            <span>J1900/i3/i5/i7 RK3288/RK3399</span>
                                        </div>
                                        <div class="flex items-center gap-3 text-sm text-text-medium">
                                            <span class="w-24 font-semibold text-text-dark">Operating System:</span>
                                            <span>Android / Windows</span>
                                        </div>
                                        <div class="flex items-center gap-3 text-sm text-text-medium">
                                            <span class="w-24 font-semibold text-text-dark">Dimensions:</span>
                                            <span>372mm(L)*90mm(W)*750mm(H)</span>
                                        </div>
                                        <div class="flex items-center gap-3 text-sm text-text-medium">
                                            <span class="w-24 font-semibold text-text-dark">Memory:</span>
                                            <span>RAM: 2G/4G/8G ROM: 32G/64G/128GB SSD</span>
                                        </div>
                                        <div class="flex items-center gap-3 text-sm text-text-medium">
                                            <span class="w-24 font-semibold text-text-dark">Printer:</span>
                                            <span>With automatic cutter, Support 58/80mm paper roll</span>
                                        </div>
                                        <div class="flex items-center gap-3 text-sm text-text-medium">
                                            <span class="w-24 font-semibold text-text-dark">Weight:</span>
                                            <span>18KG</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="https://qwaiting.com/frontimg/wall-mounted.pdf" target="_blank"
                                    class="block w-full py-3 text-center border-2 border-primary text-primary rounded-xl font-bold hover:bg-primary hover:text-white transition-all">
                                    Download PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Self-Service Kiosk System CTA --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden"
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="max-w-4xl mx-auto text-center relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Self-Service Kiosk System for Faster, Smarter Check-Ins
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Give customers the freedom to check in instantly while reducing wait times and streamlining operations.
                    Qwaiting's self-service kiosks create faster, smarter, and more seamless service experiences.
                </p>
                <a href="/signup"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:-translate-y-1 transition-all">
                    <span>Book a Free Demo</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

        {{-- Advantages Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Advantages of
                        <span class="text-primary">Self-Service Kiosks</span>
                    </h2>
                    <p class="text-xl text-text-medium max-w-3xl mx-auto">
                        Qwaiting's self-service kiosk series is designed for fast, efficient interactions in high-traffic
                        environments. From reducing wait times to enhancing customer satisfaction, our kiosks deliver
                        measurable benefits across industries.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Advantage 1 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <span class="text-3xl font-bold text-primary">01</span>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">24/7 Availability</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Give customers the freedom to access information, book appointments, or complete
                                transactions
                                anytime - enhancing convenience and accessibility.
                            </p>
                        </div>
                    </div>

                    {{-- Advantage 2 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <span class="text-3xl font-bold text-primary">02</span>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Boost Sales</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Display personalized promotions and offers directly on kiosks. Lower advertising costs while
                                driving upsells and increasing product or service adoption.
                            </p>
                        </div>
                    </div>

                    {{-- Advantage 3 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <span class="text-3xl font-bold text-primary">03</span>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Shorter Wait Times</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Enable fast, independent check-ins, registrations, and payments. Minimize queues and speed
                                up
                                service delivery.
                            </p>
                        </div>
                    </div>

                    {{-- Advantage 4 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <span class="text-3xl font-bold text-primary">04</span>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Fewer Errors</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Automated processes reduce manual entry mistakes, ensuring accurate transactions and
                                lowering
                                costly errors.
                            </p>
                        </div>
                    </div>

                    {{-- Advantage 5 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <span class="text-3xl font-bold text-primary">05</span>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Easy Customization</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Adapt kiosks to your business needs with custom menus, multiple languages, and flexible
                                payment options.
                            </p>
                        </div>
                    </div>

                    {{-- Advantage 6 --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-20 bg-primary rounded-xl hover:bg-primary-dark">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute top-4 left-4 w-2 h-2 bg-white rounded-full"></div>
                                <div class="absolute top-8 right-12 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-12 left-20 w-1.5 h-1.5 bg-white rounded-full"></div>
                                <div class="absolute top-6 right-6 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-16 left-8 w-1 h-1 bg-white rounded-full"></div>
                                <div class="absolute top-4 right-20 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="relative w-full flex justify-center -mt-10" style="z-index: 999;">
                            <div class="w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center">
                                <span class="text-3xl font-bold text-primary">06</span>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-8 text-center">
                            <h3 class="text-2xl font-bold text-text-dark mb-4">Higher Customer Satisfaction</h3>
                            <p class="text-text-medium leading-relaxed text-sm">
                                Empower customers to manage their journey at their own pace, creating a seamless,
                                personalized, and more satisfying experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Versatile Kiosks for Every Industry --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Versatile Self-Service Kiosks for
                        <span class="text-primary">Every Industry</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {{-- Retail Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Retail</h3>
                        </div>
                    </div>

                    {{-- Healthcare Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/healthcare.jpg') }}" alt="Healthcare"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Healthcare</h3>
                        </div>
                    </div>

                    {{-- Banking Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/banking.jpg') }}" alt="Banking"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Banking</h3>
                        </div>
                    </div>

                    {{-- Public Card --}}
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-primary">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('website/asset/images/public.jpg') }}" alt="Public"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-dark mb-3">Public</h3>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="/industries"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-primary text-white rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/30 hover:-translate-y-1 transition-all">
                        <span>See All Industries</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Frequently Asked
                        <span class="text-primary">Questions</span>
                    </h2>
                    <p class="text-xl text-text-medium">
                        Find answers to common questions about our self-service kiosks
                    </p>
                </div>

                <div class="space-y-4" x-data="{ activeAccordion: null }">
                    {{-- FAQ Item 1 --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <button @click="activeAccordion = activeAccordion === 1 ? null : 1"
                            class="w-full px-8 py-6 flex items-center justify-between text-left">
                            <span class="text-lg font-bold text-text-dark">How do self-service kiosks work?</span>
                            <svg class="w-6 h-6 text-primary transition-transform duration-300"
                                :class="{ 'rotate-180': activeAccordion === 1 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 1" x-collapse class="px-8 pb-6 text-text-medium leading-relaxed">
                            Self-service kiosks have a touchscreen interface or show a digital menu for users to select
                            their options. Also, it is equipped with a printer to issue tickets to customers, providing them
                            with a unique ID number. Customers can then match this number on the display screen when their
                            turn arrives.
                        </div>
                    </div>

                    {{-- FAQ Item 2 --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <button @click="activeAccordion = activeAccordion === 2 ? null : 2"
                            class="w-full px-8 py-6 flex items-center justify-between text-left">
                            <span class="text-lg font-bold text-text-dark">Are self-service kiosks secure?</span>
                            <svg class="w-6 h-6 text-primary transition-transform duration-300"
                                :class="{ 'rotate-180': activeAccordion === 2 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 2" x-collapse class="px-8 pb-6 text-text-medium leading-relaxed">
                            Yes, self-service kiosks have built-in security measures capabilities such as encryption, and
                            multi-factor authentication to protect the customer's personal and payment information.
                        </div>
                    </div>

                    {{-- FAQ Item 3 --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <button @click="activeAccordion = activeAccordion === 3 ? null : 3"
                            class="w-full px-8 py-6 flex items-center justify-between text-left">
                            <span class="text-lg font-bold text-text-dark">Do Qwaiting kiosks support multiple
                                languages?</span>
                            <svg class="w-6 h-6 text-primary transition-transform duration-300"
                                :class="{ 'rotate-180': activeAccordion === 3 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 3" x-collapse class="px-8 pb-6 text-text-medium leading-relaxed">
                            Yes. Our kiosks support multiple languages, allowing customers to choose their preferred
                            language at the start. This makes the experience accessible and user-friendly for diverse
                            audiences.
                        </div>
                    </div>

                    {{-- FAQ Item 4 --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <button @click="activeAccordion = activeAccordion === 4 ? null : 4"
                            class="w-full px-8 py-6 flex items-center justify-between text-left">
                            <span class="text-lg font-bold text-text-dark">Can customers complete payments directly through
                                the kiosk?</span>
                            <svg class="w-6 h-6 text-primary transition-transform duration-300"
                                :class="{ 'rotate-180': activeAccordion === 4 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 4" x-collapse class="px-8 pb-6 text-text-medium leading-relaxed">
                            Absolutely. Qwaiting kiosks support secure payments via credit/debit cards, mobile wallets, and
                            QR codes. This speeds up transactions and reduces the need for staff intervention.
                        </div>
                    </div>

                    {{-- FAQ Item 5 --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <button @click="activeAccordion = activeAccordion === 5 ? null : 5"
                            class="w-full px-8 py-6 flex items-center justify-between text-left">
                            <span class="text-lg font-bold text-text-dark">Can kiosks collect customer feedback or run
                                surveys?</span>
                            <svg class="w-6 h-6 text-primary transition-transform duration-300"
                                :class="{ 'rotate-180': activeAccordion === 5 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 5" x-collapse class="px-8 pb-6 text-text-medium leading-relaxed">
                            Yes. Our kiosks can instantly collect feedback and conduct quick surveys, giving you real-time
                            insights into customer satisfaction and service quality.
                        </div>
                    </div>

                    {{-- FAQ Item 6 --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <button @click="activeAccordion = activeAccordion === 6 ? null : 6"
                            class="w-full px-8 py-6 flex items-center justify-between text-left">
                            <span class="text-lg font-bold text-text-dark">How do self-service kiosks help reduce staffing
                                costs?</span>
                            <svg class="w-6 h-6 text-primary transition-transform duration-300"
                                :class="{ 'rotate-180': activeAccordion === 6 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 6" x-collapse class="px-8 pb-6 text-text-medium leading-relaxed">
                            By automating routine tasks like check-ins, bookings, and payments, kiosks reduce the dependency
                            on front-line staff—helping you lower staffing costs while maintaining efficiency.
                        </div>
                    </div>

                    {{-- FAQ Item 7 --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                        <button @click="activeAccordion = activeAccordion === 7 ? null : 7"
                            class="w-full px-8 py-6 flex items-center justify-between text-left">
                            <span class="text-lg font-bold text-text-dark">Are Qwaiting kiosks customizable for my business
                                needs?</span>
                            <svg class="w-6 h-6 text-primary transition-transform duration-300"
                                :class="{ 'rotate-180': activeAccordion === 7 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 7" x-collapse class="px-8 pb-6 text-text-medium leading-relaxed">
                            Yes. From menu options and service categories to branding and payment methods, kiosks can be
                            fully customized to match your business requirements.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Get in Touch Form --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-light">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl lg:text-5xl font-bold text-text-dark mb-6">
                        Get in touch with us today to start your
                        <span class="text-primary">path to excellence!</span>
                    </h2>
                    <p class="text-xl text-text-medium">
                        Fill the form below and our team will contact you shortly
                    </p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-text-dark">Fill the Form</h3>
                    </div>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <input type="text" name="name"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Your name*" required>
                            </div>

                            <div>
                                <input type="text" name="company_name"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Company Name">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <input type="email" name="email"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Company email*" required>
                            </div>

                            <div>
                                <input type="tel" name="phone"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder-gray-400"
                                    placeholder="Phone">
                            </div>
                        </div>

                        <div>
                            <select name="country"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-gray-500 bg-white"
                                required>
                                <option value="" disabled selected>Country*</option>
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="ca">Canada</option>
                                <option value="au">Australia</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <textarea name="message" rows="4"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all resize-none placeholder-gray-400"
                                placeholder="How can we best help you?"></textarea>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex items-center h-5">
                                <input id="privacy_policy" name="privacy_policy" type="checkbox"
                                    class="w-5 h-5 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary/30"
                                    required>
                            </div>
                            <label for="privacy_policy" class="text-sm text-gray-400 leading-tight">
                                By checking this box you are agreeing to our <a href="#"
                                    class="text-primary hover:underline font-medium">Privacy
                                    Policy</a> and Qwaiting can send me related information *
                            </label>
                        </div>

                        {{-- reCAPTCHA Placeholder --}}
                        <div
                            class="w-full max-w-[304px] h-[78px] bg-gray-50 border border-gray-200 rounded-md flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 flex items-center px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-6 h-6 border-2 border-gray-300 rounded-sm"></div>
                                    <span class="text-sm font-medium text-gray-700">I'm not a robot</span>
                                </div>
                            </div>
                            <div class="absolute right-2 flex flex-col items-center">
                                <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" class="w-8 h-8 opacity-50">
                                <span class="text-[10px] text-gray-500">reCAPTCHA</span>
                                <div class="text-[8px] text-gray-400">
                                    <a href="#" class="hover:underline">Privacy</a> - <a href="#"
                                        class="hover:underline">Terms</a>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="px-10 py-4 bg-primary text-white rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 uppercase">
                            Submit >
                        </button>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection