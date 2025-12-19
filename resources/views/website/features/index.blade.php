@extends('website.layout.website')

@section('title', 'Features That Improve Customer Flow | Qwaiting')
@section('meta_description', 'Explore the powerful features that make Qwaiting the preferred queue management solution. Real Time Reports, Staff Feedback, Appointments, and more.')

@section('content')
    <div class="min-h-screen bg-white">

        {{-- Hero Section --}}
        <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
            {{-- Background Elements --}}
            <div class="absolute inset-0 -z-10">
                <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-50/50 rounded-bl-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-purple-50/50 rounded-tr-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 rounded-full border border-blue-100 mb-8 animate-fade-in-up">
                    <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                    <span class="text-blue-700 font-medium text-sm">Empowering Your Business</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-gray-900 leading-tight mb-8">
                    Features That Improve
                    <br class="hidden md:block">
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Customer Flow and Satisfaction
                    </span>
                </h1>

                <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-12 leading-relaxed">
                    Explore the essential features that make Qwaiting a smart and reliable queue management system. Trusted by leading banks, hospitals, and public service offices, Qwaiting helps organizations deliver smooth, fast, and efficient customer experiences every day.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/signup') }}"
                        class="w-full sm:w-auto px-8 py-4 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors shadow-lg shadow-blue-600/20">
                        Start Your Free Trial
                    </a>
                    <a href="{{ url('/pricing') }}"
                        class="w-full sm:w-auto px-8 py-4 bg-white text-gray-700 font-semibold rounded-xl border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-colors">
                        Compare Plans
                    </a>
                </div>
            </div>
        </section>

        {{-- Features Grid --}}
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Powerful Features That Drive
                        <span class="text-blue-600">Customer Satisfaction</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Explore the powerful features that make Qwaiting the preferred queue management solution for
                        banks, hospitals, government offices, and retail chains.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- 1. Real Time Reports --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-blue-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/features-icon1.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Real Time Reports</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Average waiting time, Average serving time, How many people in queue. Get analytics to make
                            better decisions.
                        </p>
                    </div>

                    {{-- 2. Staff Feedback --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-purple-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 transition-colors duration-300">
                            <img src="http://qwaiting.com/images/features-icon9.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Staff Feedback</h3>
                        <p class="text-gray-600 leading-relaxed">
                            User can provide feedback to staff on the queries they solved. Improve employee performance
                            with direct insights.
                        </p>
                    </div>

                    {{-- 3. Booking Appointment System --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-green-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/appointment.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Booking Appointment</h3>
                        <p class="text-gray-600 leading-relaxed">
                            User can book the appointment to save their waiting line time. Enable seamless scheduling
                            interactions.
                        </p>
                    </div>

                    {{-- 4. Staff Keypads --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-orange-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/keypad.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Staff Keypads</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Staff can call the queue using keypads or their desktops as well. So they will get the
                            notifications on both devices.
                        </p>
                    </div>

                    {{-- 5. Digital Signage --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-pink-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-pink-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/digital-signage.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Digital Signage</h3>
                        <p class="text-gray-600 leading-relaxed">
                            You can define the layout of your display yourself ie. (Play videos, Reports, PPT, Images,
                            Live TV).
                        </p>
                    </div>

                    {{-- 6. Kiosk App --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-indigo-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/features-icon10.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Kiosk App</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Our Token generation applications support all types of kiosks so the user can generate the
                            tickets from it.
                        </p>
                    </div>

                    {{-- 7. SSO (Lpad, Active Directories) --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-teal-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-teal-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/directory.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">SSO / Active Directory</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Single user can access different locations from one single sign-on only. Secure and centralized
                            access.
                        </p>
                    </div>

                    {{-- 8. Multilingual Backend --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-red-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/Multilingual.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Multilingual Backend</h3>
                        <p class="text-gray-600 leading-relaxed">
                            You can access the backend in different languages. Support for global teams and
                            operators.
                        </p>
                    </div>

                    {{-- 9. Multi Language Voice Over --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-yellow-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/translation.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Multi Language Voice</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Multiple language voice over with 30+ language selections. Announce queues in local
                            languages.
                        </p>
                    </div>

                    {{-- 10. Easy to Use --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-cyan-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-cyan-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/features-icon7.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Easy to Use</h3>
                        <p class="text-gray-600 leading-relaxed">
                            You can plug and play any compatible devices. Easily use Qwaiting without complex setup.
                        </p>
                    </div>

                    {{-- 11. Fully Customizable --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-violet-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-violet-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-violet-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/features-icon8.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Fully Customizable</h3>
                        <p class="text-gray-600 leading-relaxed">
                            You can easily change the backend colors, fonts, and upload your logos. Make it truly yours.
                        </p>
                    </div>

                    {{-- 12. PDPA Enabled --}}
                    <div
                        class="group p-8 bg-white rounded-3xl border border-gray-100 hover:border-emerald-100 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 transition-colors duration-300">
                            <img src="https://qwaiting.com/images/features-icon12.png" alt="" class="w-10 h-10">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">PDPA Enabled</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Qwaiting is PDPA enabled. Your data security is our responsibility. Compliant and secure.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- Testimonials Section --}}
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 rounded-full border border-blue-100 mb-8 animate-fade-in-up">
                        <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                        <span class="text-blue-700 font-medium text-sm">Client Testimonials</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        See What Our 
                        <span class="text-blue-600">Customers Are Saying</span>
                    </h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    {{-- Testimonial 1 --}}
                    <div class="bg-gray-50 rounded-2xl p-8 relative">
                        <div class="text-4xl text-blue-500 absolute top-4 left-4">"</div>
                        <p class="text-gray-600 relative z-10 mb-6 italic text-xl">
                            I've used Qwaiting for my business and it's been a great experience. It's helped me to save time and reduce my stress levels, while also improving the customer experience. I would recommend it to anyone who wants to streamline their operations and improve customer satisfaction.
                        </p>
                        <div class="flex items-center justify-center">
                            <img src="https://qwaiting.com/images/mnd-singapore.png" alt="">
                        </div>
                    </div>

                    {{-- Testimonial 2 --}}
                    <div class="bg-gray-50 rounded-2xl p-8 relative">
                        <div class="text-4xl text-purple-500 absolute top-4 left-4">"</div>
                        <p class="text-gray-600 relative z-10 mb-6 italic text-xl">
                            Qwaiting has made my life so much easier! It simplifies the waiting process, saving time and
                            reducing frustration. The overall experience is great and up to the mark. Thanks to the team!
                        </p>
                        <div class="flex items-center gap-4 justify-center">
                            <img src="https://qwaiting.com/images/singtel.png" alt="">
                        </div>
                    </div>

                    {{-- Testimonial 3 --}}
                    <div class="bg-gray-50 rounded-2xl p-8 relative">
                        <div class="text-4xl text-green-500 absolute top-4 left-4">"</div>
                        <p class="text-gray-600 relative z-10 mb-6 italic text-xl">
                            Thanks to Rohit and his team for making this wonderful software. Not only me but our customers
                            also loved it. As they are able to join a virtual queue and get updates on their wait time via
                            text message.
                        </p>
                        <div class="flex items-center gap-4 justify-center">
                            <img src="https://qwaiting.com/images/hdt.png" alt="">
                        </div>
                    </div>
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