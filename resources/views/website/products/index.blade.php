@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-gray-50">

        {{-- Modern Hero Section --}}
        <section class="relative pt-24 pb-32 px-4 sm:px-6 lg:px-8 overflow-hidden">
            {{-- Background Elements --}}
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-purple-200/30 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center space-y-8">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full border border-primary/20">
                        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                        <span class="text-primary font-semibold text-sm">PLUG & PLAY - ORDER NOW</span>
                    </div>

                    <h1 class="text-5xl lg:text-7xl font-bold leading-tight">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Select
                            Kiosk</span>
                        <br>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">You Want to
                            Buy</span>
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                        Kiosk means ticket dispensing machine. So you can select the machine you want according your
                        organization.
                    </p>
                </div>
            </div>
        </section>

        {{-- Kiosk Products Grid --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    {{-- Qwaiting Handy Q5 --}}
                    <div
                        class="group bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:border-primary/20 cursor-pointer"
                        data-product-id="qwaiting-handy-q5"
                        data-product-name="Qwaiting Handy Q5"
                        data-product-price="899"
                        onclick="addProductToCart(this)">
                        <div class="p-8">
                            <div
                                class="w-full h-70 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <img src="https://qwaiting.com/images/printing.png" alt="">
                            </div>

                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Qwaiting Handy Q5</h3>

                            <div class="space-y-3 mb-8">
                                <h4 class="text-sm font-semibold text-primary uppercase tracking-wide">Specification</h4>
                                <div class="space-y-2">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Processor:</span>
                                            Octa-Core 1.8GHz, Dual*A75 and Hexa*A55</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Operating
                                                system:</span> Android 11 series iMin UI</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Dimensions:</span>
                                            250 x 168 x 80mm</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Memory:</span> 2GB
                                            RAM + 16GB ROM</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Weight:</span> 900g
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-2xl font-bold text-gray-900">$899</span>
                                </div>
                                <button
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl"
                                    onclick="event.stopPropagation(); addProductToCart(this.closest('[data-product-id]'))">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Qwaiting Standard Q7 --}}
                    <div
                        class="group bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:border-primary/20 cursor-pointer"
                        data-product-id="qwaiting-standard-q7"
                        data-product-name="Qwaiting Standard Q7 (Printer)"
                        data-product-price="1299"
                        onclick="addProductToCart(this)">
                        <div class="p-8">
                            <div
                                class="w-full h-70 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <img src="https://qwaiting.com/images/di.png" alt="" class="w-full h-full object-contain">
                            </div>

                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Qwaiting Standard Q7 (Printer)</h3>

                            <div class="space-y-3 mb-8">
                                <h4 class="text-sm font-semibold text-primary uppercase tracking-wide">Specification</h4>
                                <div class="space-y-2">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Processor:</span>
                                            Quad-Core, Cortex - A55, up to 2.0GHz</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Operating
                                                system:</span> Android 11 series iMin UI</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Dimensions:</span>
                                            380 x 195 x 407mm</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Memory:</span> RAM:
                                            2GB / 4GB ROM: 8GB / 16GB / 32GB</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Weight:</span> 7Kg
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-2xl font-bold text-gray-900">$1,299</span>
                                </div>
                                <button
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl"
                                    onclick="event.stopPropagation(); addProductToCart(this.closest('[data-product-id]'))">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Qwaiting Pro Q9 --}}
                    <div
                        class="group bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-3xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:border-primary/20 cursor-pointer"
                        data-product-id="qwaiting-pro-q9"
                        data-product-name="Qwaiting Pro Q9"
                        data-product-price="1899"
                        onclick="addProductToCart(this)">
                        <div class="p-8">
                            <div
                                class="w-full h-70 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <img src="https://qwaiting.com/images/Kisok-2.png" alt=""
                                    class="w-full h-full object-contain">
                            </div>

                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Qwaiting Pro Q9</h3>

                            <div class="space-y-3 mb-8">
                                <h4 class="text-sm font-semibold text-primary uppercase tracking-wide">Specification</h4>
                                <div class="space-y-2">
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Processor:</span>
                                            Quad-Core, Cortex - A55, up to 2.0GHz</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Operating
                                                system:</span> Android 11 series iMin UI</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Dimensions:</span>
                                            Device: 805.5 x 348 x 100mm, Stand: 625 x 500 x1106mm</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Memory:</span> RAM:
                                            2GB / 4GB ROM: 8GB / 16GB / 32GB</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-primary rounded-full mt-2"></div>
                                        <p class="text-gray-600"><span class="font-medium text-gray-900">Weight:</span> 15Kg
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-2xl font-bold text-gray-900">$1,899</span>
                                </div>
                                <button
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl"
                                    onclick="event.stopPropagation(); addProductToCart(this.closest('[data-product-id]'))">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Keypads Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-100 rounded-3xl p-12 shadow-xl">
                    <div class="max-w-6xl mx-auto">
                        <div class="text-center mb-12">
                            <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                                <span
                                    class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Select
                                    how many keypads</span>
                                <br>
                                <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">you
                                    required for the staff to call the queues</span>
                            </h2>
                            <p class="text-xl text-gray-600 leading-relaxed">
                                Select number of devices as per the counters you have. If you don't want the keypad you can
                                use your current system to call the queues. It can be any computer and iPad.
                            </p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-12 items-center">
                            {{-- Device Image --}}
                            <div class="flex items-center justify-center">
                                <div class="relative">
                                    <img src="https://qwaiting.com/images/NUS-LED-Display3.png" alt="Keypad Device"
                                        class="w-full max-w-md h-auto object-contain">
                                </div>
                            </div>

                            {{-- Product Description --}}
                            <div class="space-y-6">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6">Product Description</h3>

                                {{-- Specifications Table --}}
                                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                                    <div class="divide-y divide-gray-200">
                                        <div
                                            class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors">
                                            <span class="text-gray-700 font-medium">Product Dimensions</span>
                                            <span class="text-gray-900 font-semibold text-right">16.8 x 24.2 x 0.81 cm; 490
                                                Grams</span>
                                        </div>
                                        <div
                                            class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors">
                                            <span class="text-gray-700 font-medium">Processor Speed</span>
                                            <span class="text-gray-900 font-semibold">2 GHz</span>
                                        </div>
                                        <div
                                            class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors">
                                            <span class="text-gray-700 font-medium">Operating system</span>
                                            <span class="text-gray-900 font-semibold">Android</span>
                                        </div>
                                        <div
                                            class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors">
                                            <span class="text-gray-700 font-medium">RAM Size</span>
                                            <span class="text-gray-900 font-semibold">2 GB</span>
                                        </div>
                                        <div
                                            class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors">
                                            <span class="text-gray-700 font-medium">Display size</span>
                                            <span class="text-gray-900 font-semibold">10.1 Inches</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Quantity Selector --}}
                                <div class="flex items-center justify-end gap-4 mt-8">
                                    <button onclick="decrementQuantity()"
                                        class="w-12 h-12 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center transition-colors group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4"></path>
                                        </svg>
                                    </button>

                                    <input type="number" id="keypadQuantity" value="0" min="0"
                                        class="w-24 h-12 text-center text-xl font-semibold border-2 border-gray-200 rounded-lg focus:outline-none focus:border-primary transition-colors">

                                    <button onclick="incrementQuantity()"
                                        class="w-12 h-12 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center transition-colors group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- TV Screen Selection Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Select
                            the</span>
                        <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">TV screen
                            you want</span>
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                        You can select the size of TV Screen you want to display the notifications. The Queue Notifications
                        will show on the TV device.
                    </p>
                </div>

                <div class="flex items-end justify-center gap-8">
                    {{-- Screen 32" - Small --}}
                    <div
                        class="group bg-gradient-to-br from-blue-50 to-white border border-blue-100 rounded-3xl p-6 hover:shadow-2xl transition-all duration-300 hover:border-primary/20 flex-shrink-0 cursor-pointer"
                        data-product-id="tv-screen-32"
                        data-product-name="TV Screen 32\""
                        data-product-price="499"
                        onclick="addProductToCart(this)">
                        <div class="text-center">
                            <div
                                class="w-48 h-auto rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-105 transition-transform">
                                <img src="https://qwaiting.com/images/screen-32.png" alt="32 inch screen"
                                    class="w-full h-auto object-contain">
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Screen 32"</h3>
                            <p class="text-gray-600 text-sm mb-4">Perfect for small to medium spaces</p>
                            <div class="mt-4">
                                <div class="text-xl font-bold text-gray-900 mb-3">$499</div>
                                <button
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2 text-sm"
                                    onclick="event.stopPropagation(); addProductToCart(this.closest('[data-product-id]'))">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Screen 42" - Medium --}}
                    <div
                        class="group bg-gradient-to-br from-purple-50 to-white border border-purple-100 rounded-3xl p-6 hover:shadow-2xl transition-all duration-300 hover:border-primary/20 flex-shrink-0 cursor-pointer"
                        data-product-id="tv-screen-42"
                        data-product-name="TV Screen 42\""
                        data-product-price="799"
                        onclick="addProductToCart(this)">
                        <div class="text-center">
                            <div
                                class="w-64 h-auto rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-105 transition-transform">
                                <img src="https://qwaiting.com/images/screen-42.png" alt="42 inch screen"
                                    class="w-full h-auto object-contain">
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Screen 42"</h3>
                            <p class="text-gray-600 text-sm mb-4">Ideal for medium to large areas</p>
                            <div class="mt-4">
                                <div class="text-xl font-bold text-gray-900 mb-3">$799</div>
                                <button
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2 text-sm"
                                    onclick="event.stopPropagation(); addProductToCart(this.closest('[data-product-id]'))">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Screen 52" - Large --}}
                    <div
                        class="group bg-gradient-to-br from-green-50 to-white border border-green-100 rounded-3xl p-6 hover:shadow-2xl transition-all duration-300 hover:border-primary/20 flex-shrink-0 cursor-pointer"
                        data-product-id="tv-screen-52"
                        data-product-name="TV Screen 52\""
                        data-product-price="1199"
                        onclick="addProductToCart(this)">
                        <div class="text-center">
                            <div
                                class="w-80 h-auto rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-105 transition-transform">
                                <img src="https://qwaiting.com/images/screen-52.png" alt="52 inch screen"
                                    class="w-full h-auto object-contain">
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Screen 52"</h3>
                            <p class="text-gray-600 text-sm mb-4">Best for large waiting areas</p>
                            <div class="mt-4">
                                <div class="text-xl font-bold text-gray-900 mb-3">$1,199</div>
                                <button
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2 text-sm"
                                    onclick="event.stopPropagation(); addProductToCart(this.closest('[data-product-id]'))">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Frequently
                            Asked</span>
                        <span
                            class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Questions</span>
                    </h2>
                </div>

                <div class="space-y-6">
                    {{-- FAQ 1 --}}
                    <div
                        class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <button onclick="toggleFaq('faq1')" class="w-full flex items-start justify-between gap-4 text-left">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">Can I plug & play the device? </h3>
                                <div id="faq1" class="text-gray-600 leading-relaxed">
                                    Yes, you can order either offline / online solution .Once you order you will get the
                                    devices within 7 to 8 working days .You can easily plug and play it.
                                </div>
                            </div>
                            <div class="flex-shrink-0 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                    </div>

                    {{-- FAQ 2 --}}
                    <div
                        class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <button onclick="toggleFaq('faq2')" class="w-full flex items-start justify-between gap-4 text-left">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">How Can i Order the solution ?</h3>
                                <div id="faq2" class="text-gray-600 leading-relaxed">
                                    It's very easy to do so. You can customize the selection of the products you want and
                                    then proceed next for the payment . Once you make the payment you will get payment
                                    confirmation and invoice details.
                                </div>
                            </div>
                            <div class="flex-shrink-0 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                    </div>

                    {{-- FAQ 3 --}}
                    <div
                        class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <button onclick="toggleFaq('faq3')" class="w-full flex items-start justify-between gap-4 text-left">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">How soon will I get the delivery?</h3>
                                <div id="faq3" class="text-gray-600 leading-relaxed">
                                    You will get your complete system delivered within 7 to 8 working days from the date of
                                    the payment
                                </div>
                            </div>
                            <div class="flex-shrink-0 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
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

        {{-- Shopping Cart Sidebar --}}
        <div id="cartSidebar"
            class="fixed right-0 top-0 h-full w-96 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50 overflow-y-auto">
            <div class="p-8">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-900">Your Selection</h3>
                    </div>
                    <button onclick="toggleCart()"
                        class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                {{-- Empty State --}}
                <div id="emptyCart" class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Your cart is empty</h4>
                    <p class="text-gray-600">Looks like you have not added anything to you cart. Go ahead & explore top
                        categories.</p>
                </div>

                {{-- Cart Items --}}
                <div id="cartItems" class="hidden space-y-4 mb-6">
                    {{-- Items will be added here dynamically --}}
                </div>

                {{-- Cart Summary --}}
                <div id="cartSummary" class="hidden">
                    <div class="border-t border-gray-200 pt-6 mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-lg font-semibold text-gray-900">Subtotal</span>
                            <span id="subtotalAmount" class="text-2xl font-bold text-gray-900">$0</span>
                        </div>
                        <p class="text-sm text-gray-500">Extra charges may apply</p>
                    </div>

                    <button onclick="checkout()"
                        class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl">
                        ORDER NOW
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Floating Cart Button --}}
        <button id="floatingCartBtn" onclick="toggleCart()" class="fixed right-0 top-1/2 -translate-y-1/2 bg-primary hover:bg-primary/90
                    text-white font-bold py-3 px-6 rounded-full shadow-2xl
                    transition-all duration-300 flex items-center gap-2
                    z-40 hover:scale-105 text-xl">
            ←
            <span id="cartCount" class="hidden bg-white text-primary rounded-full w-6 h-6
                        flex items-center justify-center text-xs font-bold">
                0
            </span>
        </button>


    </div>

    <script src="{{ asset('website/asset/js/cart.js') }}"></script>

@endsection