@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-white selection:bg-primary selection:text-white">

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
                    Biometric Queue <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Management
                        System</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-10">
                    Built for high-demand environments. Automate check-ins, reduce bottlenecks, and drive operational
                    precision with our advanced biometric solution.
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
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </a>
                    <a href="https://qwaiting.com/contact"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-primary hover:text-primary transition-all hover:shadow-lg hover:-translate-y-1 w-full sm:w-auto">
                        Contact Sales
                    </a>
                </div>

                {{-- Hero Image with Floating Effect --}}
                <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/biometric_queue_management_system.png"
                            alt="Biometric Queue Dashboard"
                            class="w-full h-auto transform transition-transform hover:scale-105 duration-700">

                        {{-- Floating Badge 1 --}}
                        <div
                            class="absolute -left-12 top-1/4 bg-white p-4 rounded-xl shadow-xl border border-gray-100 hidden lg:block animate-bounce-slow">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Verification</p>
                                    <p class="text-sm font-bold text-gray-900">Instant & Secure</p>
                                </div>
                            </div>
                        </div>

                        {{-- Floating Badge 2 --}}
                        <div class="absolute -right-12 bottom-1/4 bg-white p-4 rounded-xl shadow-xl border border-gray-100 hidden lg:block animate-bounce-slow"
                            style="animation-delay: 1s;">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Wait Time</p>
                                    <p class="text-sm font-bold text-gray-900">Reduced by 40%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Optimize Your Business: Grid Layout --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                        Optimize Your BusinessEfficiency with <span class="text-primary">Biometric Software</span>
                    </h2>
                    <p class="text-lg text-gray-600">
                        Our advanced biometric queuing solution integrates RFID, facial recognition, and real-time authentication to streamline service delivery across all touchpoints. Scalable and enterprise-ready, it’s built to elevate efficiency, security, and customer satisfaction.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    {{-- Feature Cards --}}
                    <div class="lg:col-span-2 grid sm:grid-cols-2 gap-6">
                        <div
                            class="p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all border border-gray-100 group flex flex-row">
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition-transform mr-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-md">Better efficiency and cut down on wait times significantly.</p>
                        </div>

                        <div
                            class="p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all border border-gray-100 group flex flex-row">
                            <div
                                class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4 group-hover:scale-110 transition-transform mr-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-md">Improve identity verification and eliminate fraud risks.</p>
                        </div>

                        <div
                            class="p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all border border-gray-100 group flex flex-row">
                            <div
                                class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4 group-hover:scale-110 transition-transform mr-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-md">Gain real-time operational insights to make smarter decisions.
                            </p>
                        </div>

                        <div
                            class="p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all border border-gray-100 group flex flex-row">
                            <div
                                class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 mb-4 group-hover:scale-110 transition-transform mr-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-md">Create a modern and professional image for your brand.</p>
                        </div>

                        <div
                            class="p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all border border-gray-100 group flex flex-row items-center">
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition-transform mr-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-md">Integrate easily with your current systems</p>
                        </div>
                    </div>

                    {{-- Large Side Image --}}
                    <div class="relative h-full min-h-[400px] rounded-3xl overflow-hidden shadow-lg group">
                        <img src="https://qwaiting.com/frontimg/optimize_your_business.png" alt="Optimize Business"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-8">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Face Recognition CTA: Full Width Dark --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-900 relative overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-[url('https://qwaiting.com/images/pattern.png')] opacity-5"></div>
                <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/20 to-transparent"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="text-left md:w-2/3">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                        Face Recognition for <span class="text-primary">Faster, Safer Queues</span>
                    </h2>
                    <p class="text-xl text-gray-400 leading-relaxed max-w-2xl">
                        Enhance your biometric system with instant face recognition. Identify customers in seconds, prevent
                        fraud, and keep every queue fair and efficient.
                    </p>
                </div>
                <div class="md:w-1/3 text-right">
                    <a href="https://qwaiting.com/recognition" target="_blank"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-white text-gray-900 rounded-full font-bold text-lg shadow-lg hover:bg-primary hover:text-white transition-all transform hover:scale-105">
                        <span>See How It Works</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Features: Alternating with Cards --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">Smart, Secure, Scalable Biometric Authentication</h2>
                </div>

                <div class="space-y-32">
                    {{-- Feature Set 1 --}}
                    <div class="flex flex-col lg:flex-row items-center gap-16">
                        <div class="lg:w-1/2 relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-3xl transform rotate-3">
                            </div>
                            <img src="https://qwaiting.com/frontimg/biometric_authentication.png"
                                alt="Biometric Authentication"
                                class="relative rounded-3xl shadow-2xl w-full transform transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-8">
                            <h3 class="text-3xl font-bold text-gray-900">Biometric Authentication</h3>

                            <div class="flex gap-6">
                                <div
                                    class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.131A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Fingerprint Recognition</h4>
                                    <p class="text-gray-600 leading-relaxed">With our touchless biometric systems, you can be sure that consumers will be identified quickly and securely. Reduce fraud and boost user confidence by using unique biometric data.</p>
                                </div>
                            </div>

                            <div class="flex gap-6">
                                <div
                                    class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Facial Recognition</h4>
                                    <p class="text-gray-600 leading-relaxed">Use facial recognition to offer a wireless experience. Customers are quickly and precisely identified by our technology, providing a smooth and customized experience.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Feature Set 2 --}}
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                        <div class="lg:w-1/2 relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-tl from-green-100 to-teal-100 rounded-3xl transform -rotate-3">
                            </div>
                            <img src="https://qwaiting.com/frontimg/advanced_authentication.png"
                                alt="Advanced Authentication"
                                class="relative rounded-3xl shadow-2xl w-full transform transition-transform duration-500">
                        </div>
                        <div class="lg:w-1/2 space-y-8">
                            <h3 class="text-3xl font-bold text-gray-900">Advanced Security</h3>

                            <div class="flex gap-6">
                                <div
                                    class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Multi-factor Security</h4>
                                    <p class="text-gray-600 leading-relaxed">To increase security, combine biometric information with standard methods of verification like passwords or one-time passwords. Secure your system from illegal access and provide your clients piece of mind.</p>
                                </div>
                            </div>

                            <div class="flex gap-6">
                                <div
                                    class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">RFID Integration</h4>
                                    <p class="text-gray-600 leading-relaxed">Simplify the consumer journey by using RFID technology. Instantly track and manage customer flow, reducing wait times and enhancing service efficiency.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why It Matters: 3-Column Grid --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <span class="text-primary font-semibold tracking-wider uppercase">Benefits</span>
                    <h2 class="text-4xl font-bold text-gray-900 mt-2">Why It Matters</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    {{-- Card 1 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="h-48 rounded-2xl overflow-hidden mb-8 relative">
                            <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors z-10">
                            </div>
                            <img src="https://qwaiting.com/frontimg/security.png" alt="Security"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 text-primary">Enhanced Security</h3>
                        <ul class="space-y-3 text-gray-600 numbered">
                            <li class="flex items-start gap-2">
                                <div>
                                    <p> <span class="font-bold">Data Safety:</span> Biometric data is safely and digitally stored, ensuring that client information is kept private and protected from hacking.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-2">
                                <div>
                                    <p><span class="font-bold">Fraud Prevention:</span> The risk of identity theft and unauthorized access is drastically reduced by using unique biometric identifiers.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Card 2 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="h-48 rounded-2xl overflow-hidden mb-8 relative">
                            <div class="absolute inset-0 bg-blue-500/10 group-hover:bg-transparent transition-colors z-10">
                            </div>
                            <img src="https://qwaiting.com/frontimg/customer_experience.png" alt="Experience"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 text-primary">Improved Customer Experience</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <div>
                                    <p><span class=" font-bold">Decreased Waiting Times:</span> Use real-time data from RFID tags and biometric inputs to manage lines more effectively. Clients like your services more and spend less time waiting.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-2">
                                <div>
                                    <p><span class=" font-bold">Customized Service:</span> Identify regular clients and adjust services to suit their needs, resulting in a more interesting and fulfilling experience.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Card 3 --}}
                    <div
                        class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="rounded-2xl overflow-hidden mb-8 relative">
                            <div
                                class="absolute inset-0 bg-purple-500/10 group-hover:bg-transparent transition-colors z-10">
                            </div>
                            <img src="https://qwaiting.com/frontimg/operational_efficiency.png" alt="Efficiency"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 text-primary">Operational Efficiency</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <div>
                                    <p><span class="font-bold">Streamlined Processes</span> Automated identification and authentication reduce manual processing, allowing your staff to focus on delivering exceptional service.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-2">
                                <div>
                                    <p><span class="font-bold">Real-time Statistics:</span> Use real-time data analytics to understand consumer flow and service limitations. Make wise choices to enhance service delivery and improve processes.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Businesses Trust Qwaiting --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Why Businesses Trust Qwaiting</h2>
                    <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    {{-- Card 1 --}}
                    <div
                        class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div
                            class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center mb-6 text-purple-600">
                            <img src="https://qwaiting.com/frontimg/cutting_edge_technology.png" alt="Advanced Smart Tech"
                                class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Advanced Smart Tech</h3>
                        <p class="text-gray-600 mb-4 text-sm">Engineered for accuracy and speed, our system provides you
                            with:</p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-purple-500"></div>
                                Advanced RFID & biometric algorithms
                            </li>
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-purple-500"></div>
                                Fast and secure identity authentication
                            </li>
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-purple-500"></div>
                                Consistent performance everywhere
                            </li>
                        </ul>
                    </div>

                    {{-- Card 2 --}}
                    <div
                        class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 text-blue-600">
                            <img src="https://qwaiting.com/frontimg/scalable_solutions.png" alt="Scalable Solutions"
                                class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Scalable Solutions</h3>
                        <p class="text-gray-600 mb-4 text-sm">CCustomized features to match your business goals and expand effortlessly as your operations evolve.</p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                                Flexible architecture tailored to any business size
                            </li>
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                                Easy customization options to fit unique operational needs
                            </li>
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                                Future-proof design to support growth and innovation
                            </li>
                        </ul>
                    </div>

                    {{-- Card 3 --}}
                    <div
                        class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mb-6 text-green-600">
                            <img src="https://qwaiting.com/frontimg/exceptional_support.png" alt="Exceptional Support"
                                class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Exceptional Support</h3>
                        <p class="text-gray-600 mb-4 text-sm">From setup to scaling, we provide expert training and 24/7 technical help to keep your operations running without disruption.</p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div>
                                Personalized onboarding and deployment support
                            </li>
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div>
                                24/7 technical assistance across time zones
                            </li>
                            <li class="flex items-center gap-2 text-gray-600 text-sm">
                                <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div>
                                Ongoing system monitoring and issue resolution
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- Final CTA --}}
        <section
            class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-primary to-purple-800 relative overflow-hidden text-center">
            <div class="absolute inset-0 bg-[url('https://qwaiting.com/images/pattern.png')] opacity-10"></div>
            <div class="max-w-4xl mx-auto relative z-10">
                <h2 class="text-3xl lg:text-5xl font-bold text-white mb-8 leading-tight">
                    Ready for the future of queuing?
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Start your free trial now and see how biometric queue management transforms customer flow.
                </p>
                <a href="https://qwaiting.com/signup" target="_blank"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-white text-primary rounded-full font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all">
                    <span>Start Free Trial</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

    </div>
@endsection