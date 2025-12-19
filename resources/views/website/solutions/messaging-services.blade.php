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
                    Customer Messaging <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Services</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto mb-10">
                    Send reliable and effective SMS messages that keep you connected with customers on a platform that’s
                    easy to set up and cost-efficient to run.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="https://qwaiting.com/signup"
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
                    <a href="https://qwaiting.com/contact"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-primary hover:text-primary transition-all hover:shadow-lg hover:-translate-y-1 w-full sm:w-auto">
                        Contact Us
                    </a>
                </div>

                {{-- Hero Image Placeholder (If needed, or just abstract) --}}
                {{-- Since no specific hero image was provided/found other than generic ones, we'll skip a large hero image
                to focus on content or use a decorative one --}}
                {{-- <div class="relative mx-auto max-w-4xl">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm">
                        <img src="https://qwaiting.com/frontimg/messaging-services-hero.png" alt="Messaging Services"
                            class="w-full h-auto">
                    </div>
                </div> --}}
            </div>
        </section>

        {{-- Customer Journey Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Stay connected at <span class="text-primary">every step</span> of the customer journey
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        From the moment they book to the moment they leave, every interaction matters. Keep them in the loop
                        with real-time updates, friendly reminders, and quick follow-ups. Make their experience smoother,
                        easier, and memorable so they’ll want to return.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Welcome Message --}}
                    <div
                        class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 text-blue-600 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Welcome Message</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            The first message sent to customers when they join a queue or check into a service. It includes
                            a greeting, token number, estimated wait time, and the number of people ahead.
                        </p>
                        <div class="bg-white p-4 rounded-xl border border-gray-400 text-sm text-gray-700 italic relative">
                            <div
                                class="absolute top-0 left-4 -mt-2 w-4 h-4 bg-white border-t border-l border-gray-400 transform rotate-45">
                            </div>
                            "Welcome! Your token number is W045. There are 10 people ahead of you. Your estimated wait time
                            is 30 minutes."
                        </div>
                    </div>

                    {{-- Reminder Message --}}
                    <div
                        class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 text-purple-600 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Reminder Message</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            Reminders keep customers updated about their upcoming turn, ensuring they are ready when their
                            service is about to begin.
                        </p>
                        <div class="bg-white p-4 rounded-xl border border-gray-400 text-sm text-gray-700 italic relative">
                            <div
                                class="absolute top-0 left-4 -mt-2 w-4 h-4 bg-white border-t border-l border-gray-400 transform rotate-45">
                            </div>
                            "Your token number W045 will be called shortly. Please return to the Customer Service Counter.
                            Thank you for your patience."
                        </div>
                    </div>

                    {{-- Next Call Message --}}
                    <div
                        class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-600 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Next Call Message</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            This notification lets customers know that their token number has been called and it is their
                            turn.
                        </p>
                        <div class="bg-white p-4 rounded-xl border border-gray-400 text-sm text-gray-700 italic relative">
                            <div
                                class="absolute top-0 left-4 -mt-2 w-4 h-4 bg-white border-t border-l border-gray-400 transform rotate-45">
                            </div>
                            "Token number W045 – it’s your turn now. Please proceed to the Customer Service Counter. We are
                            ready to assist you."
                        </div>
                    </div>

                    {{-- Call Skip Notification --}}
                    <div
                        class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center mb-6 text-orange-600 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Call Skip Notification</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            If a customer misses their turn, a notification is sent to inform them that their token has been
                            skipped and moved to the missed queue.
                        </p>
                        <div class="bg-white p-4 rounded-xl border border-gray-400 text-sm text-gray-700 italic relative">
                            <div
                                class="absolute top-0 left-4 -mt-2 w-4 h-4 bg-white border-t border-l border-gray-400 transform rotate-45">
                            </div>
                            "Your appointment with token number W045 was missed due to your absence. Please contact us to
                            reschedule."
                        </div>
                    </div>

                    {{-- Feedback Message --}}
                    <div
                        class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-14 h-14 bg-teal-100 rounded-2xl flex items-center justify-center mb-6 text-teal-600 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Feedback Message</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            Once the service is completed, a feedback message is sent to gather customer insights and
                            improve future experiences.
                        </p>
                        <div class="bg-white p-4 rounded-xl border border-gray-400 text-sm text-gray-700 italic relative">
                            <div
                                class="absolute top-0 left-4 -mt-2 w-4 h-4 bg-white border-t border-l border-gray-400 transform rotate-45">
                            </div>
                            "Hi Ali, thank you for visiting the Customer Service Counter. We’d love to hear your feedback;
                            it only takes a minute and helps us improve. Please leave us a review."
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SMS Auto-Texting Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-16 leading-tight text-center">
                            SMS : Auto-Texting with a <span class="text-primary">Personal Touch</span>
                </h2>
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 relative">
                        {{-- Visual representation of WhatsApp/SMS alerts --}}
                        <img src="https://qwaiting.com/frontimg/SMS-Auto-texting-with-a-personal-touch.png" alt="">
                    </div>
                    <div class="lg:w-1/2">

                        <div class="space-y-8">
                            {{-- Feature 1 --}}
                            <div class="flex gap-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Wide Accessibility</h3>
                                    <p class="text-gray-600">SMS works seamlessly on all mobile devices, iOS and Android, ensuring queue updates reach every customer, no matter what device they use.</p>
                                </div>
                            </div>

                            {{-- Feature 2 --}}
                            <div class="flex gap-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Automated Real-time Alerts</h3>
                                    <p class="text-gray-600">Keep customers informed with instant updates on wait times and queue status. Real-time alerts reduce uncertainty, ease frustration, and create a smoother service experience.</p>
                                </div>
                            </div>

                            {{-- Feature 3 --}}
                            <div class="flex gap-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Cost-Effective</h3>
                                    <p class="text-gray-600">SMS is a highly affordable alternative to phone calls, making it a smart, budget-friendly way to manage queues and keep customers informed.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        {{-- WhatsApp Alerts Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                            WhatsApp Alerts : <br> <span class="text-green-600">Attract & Retain More Clients</span>
                        </h2>

                        <div class="space-y-8">
                            {{-- Feature 1 --}}
                            <div class="flex gap-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Message Encryption</h3>
                                    <p class="text-gray-600">WhatsApp’s end-to-end encryption guarantees secure and private
                                        communication. With Qwaiting, you gain an added layer of protection to safeguard
                                        sensitive customer data.</p>
                                </div>
                            </div>

                            {{-- Feature 2 --}}
                            <div class="flex gap-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Build Long-Lasting Customer
                                        Relationships</h3>
                                    <p class="text-gray-600">Engage customers with timely updates, instant query handling,
                                        and personalized support through WhatsApp. This not only enhances their experience
                                        but also fosters trust and long-term loyalty.</p>
                                </div>
                            </div>

                            {{-- Feature 3 --}}
                            <div class="flex gap-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Minimize No-Show Rates</h3>
                                    <p class="text-gray-600">Send timely WhatsApp reminders so customers never miss an
                                        appointment. With simple options to confirm, cancel, or reschedule, you reduce
                                        no-shows while keeping operations running smoothly.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-1/2 relative">
                        {{-- Visual representation of WhatsApp/SMS alerts --}}
                        <img src="https://qwaiting.com/frontimg/whatsApp-alerts-attract-and-retain-more-clients.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="mt-10 p-10 bg-primary/90 rounded-2xl border border-primary max-w-7xl mx-auto items-center">
                            <p class="text-lg font-semibold text-white mb-6 text-center">
                                Turn waiting into a smooth experience and keep customers updated in real time with SMS
                                /WhatsApp alerts.
                            </p>
                            <div class="flex justify-center">
                                <a href="https://qwaiting.com/signup"
                                class="flex items-center justify-center px-8 py-3 bg-white text-primary font-semibold rounded-full hover:text-purple-700 transition-colors">
                                Try it for Free
                            </a>
                            </div>
                        </div>
        </section>

        {{-- Industries Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        Simplify Queue Management for <span class="text-primary">Every Sector!</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    <a href="https://qwaiting.com/industries/retail-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/retail.webp') }}" alt="Retail"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Retail</h3>
                        </div>
                    </a>

                    <a href="https://qwaiting.com/industries/healthcare"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/healthcare.jpg') }}" alt="Healthcare"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Healthcare</h3>
                        </div>
                    </a>

                    <a href="https://qwaiting.com/industries/banking-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/banking.jpg') }}" alt="Banking"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Banking</h3>
                        </div>
                    </a>

                    <a href="https://qwaiting.com/industries/public-sector-queue-system"
                        class="group relative overflow-hidden rounded-3xl aspect-[4/5] block">
                        <img src="{{ asset('website/asset/images/public.jpg') }}" alt="Public"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <h3 class="text-2xl font-bold text-white">Public</h3>
                            {{-- Specific text retention --}}
                        </div>
                    </a>
                </div>

                <div class="text-center max-w-3xl mx-auto">
                    <a href="/industries"
                        class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all mb-8">
                        See All Industries <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                </div>
            </div>
        </section>

         {{-- Blog Section --}}
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto mb-16 text-center">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                    Latest Posts From the Blog
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Blog Post 1 --}}
                <a href="https://blog.qwaiting.com/online-appointment-booking-software-take-your-business-to-the-next-level/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/08/Online-Appointment-Booking-Software_-Take-your-Business-to-the-Next-Level-2.jpg"
                        alt="Online Appointment Booking Software" class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Online Appointment Booking Software: Take your Business to the Next Level
                    </h3>
                    <p class="text-gray-600">
                        Businesses that rely on in-person appointment scheduling are lagging behind and facing various
                        problems...
                    </p>
                </a>

                {{-- Blog Post 2 --}}
                <a href="https://blog.qwaiting.com/qr-code-queue-management-system-a-game-changer-for-businesses/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/07/QR-Code-Queue-Management-System-A-Game-Changer-for-Businesses.jpg" alt="QR Code Queue Management System"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        QR Code Queue Management System: A Game-Changer for Businesses
                    </h3>
                    <p class="text-gray-600">
                        Imagine a world where waiting in line is a thing of the past & customers can effortlessly avail of
                        desired services without hassle...
                    </p>
                </a>

                {{-- Blog Post 3 --}}
                <a href="https://blog.qwaiting.com/customer-feedback-system-the-key-to-an-exceptional-customer-experience/"
                    class="block p-6 transition-all duration-300 bg-gray-50 rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
                    <img src="https://blog.qwaiting.com/wp-content/uploads/2023/06/Customer-Feedback-system.jpg" alt="Customer Feedback System"
                        class="w-full h-48 object-cover rounded-2xl mb-6">
                    <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        Customer Feedback System: The Key To An Exceptional Customer Experience
                    </h3>
                    <p class="text-gray-600">
                        Businesses often face the challenge of delivering outstanding customer experiences while efficiently
                        managing queues...
                    </p>
                </a>
            </div>
        </div>
    </section>

    </div>
@endsection