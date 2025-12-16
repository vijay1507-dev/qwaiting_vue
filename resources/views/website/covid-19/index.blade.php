@extends('website.index')

@section('title', 'Social Distancing Queue Management System - COVID-19')
@section('meta_description', 'Keep your business safely open in COVID-19 quarantine and help ‌enforce social distance with Qwaiting. No more waiting in long queues.')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-b from-gray-900 to-indigo-900 text-white">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[1000px] bg-primary/10 rounded-full blur-3xl">
            </div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10 flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2 text-center lg:text-left">
                <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight">
                    COVID-19: <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Qwaiting's
                        Commitment</span>
                </h1>
                <p class="text-xl lg:text-2xl text-gray-300 font-medium mb-6">
                    No more waiting in long queues with Qwaiting, A queue management software.
                </p>
                <p class="text-lg text-gray-400 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                    To get through COVID-19, Qwaiting is here with a unique COVID-19 plan. It is imperative for businesses
                    to assure the safety of their employees and customers. So, Qwaiting comes up with a contact-free and
                    powerful queue system to escalate safety. Hire us for secure planned visits, SMS queuing, and online
                    sign-ins.
                </p>

                <!-- CTA extracted from content: "Get a Free Trial" "We Simplify Your Queue" -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="inline-flex items-center justify-center px-8 py-4 bg-primary hover:bg-primary/90 text-white rounded-full font-semibold transition-all shadow-lg hover:shadow-primary/50">
                        Get a Free Trial
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-white/10 glass-effect">
                    <img src="https://qwaiting.com/images/covid-banner.png" alt="Covid Banner"
                        class="w-full h-auto transform hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-24 px-4 bg-white relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Why Choose Us</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We are committed to keeping your business safely open in COVID-19 quarantine and help to enforce social
                    distancing
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="group p-8 rounded-3xl bg-gray-50 hover:bg-white hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-bl-full opacity-50 transition-transform group-hover:scale-110">
                    </div>

                    <div class="relative z-10">
                        <div
                            class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition-transform duration-300">
                            <img src="https://qwaiting.com/images/img-1.png" alt="Book Remotely"
                                class="w-12 h-12 object-contain">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Book Remotely</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Use our Qwaiting App and slow down the spreading process. Omit the waiting queues and allow your
                            customers to book the appointments remotely.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group p-8 rounded-3xl bg-gray-50 hover:bg-white hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-purple-100 rounded-bl-full opacity-50 transition-transform group-hover:scale-110">
                    </div>

                    <div class="relative z-10">
                        <div
                            class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition-transform duration-300">
                            <img src="https://qwaiting.com/images/img-2.png" alt="Proscribing Impurities"
                                class="w-12 h-12 object-contain">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Proscribing Impurities</h3>
                        <p class="text-gray-600 leading-relaxed">
                            As now, customers are using the app from the mobile devices to schedule their appointments, so,
                            you are consolidating the touchless services. Their communication is only restricted with
                            printed papers, buttons, and public screens.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group p-8 rounded-3xl bg-gray-50 hover:bg-white hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-green-100 rounded-bl-full opacity-50 transition-transform group-hover:scale-110">
                    </div>

                    <div class="relative z-10">
                        <div
                            class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition-transform duration-300">
                            <img src="https://qwaiting.com/images/img-3.png" alt="Safety in 5 Mins"
                                class="w-12 h-12 object-contain">
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Safety in 5 Mins</h3>
                        <p class="text-gray-600 leading-relaxed">
                            You only have to get the best internet connection to use our solution. That's it!! Assure your
                            business safety without any hardware requirements.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-24 bg-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="text-primary font-semibold tracking-wider uppercase text-sm">Process</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">How It Works</h2>
            </div>

            <!-- Step 1 -->
            <div class="flex flex-col md:flex-row items-center gap-12 mb-24 last:mb-0">
                <div class="w-full md:w-1/2 flex justify-center md:justify-end relative">
                    <!-- Background decoration -->
                    <div class="absolute inset-0 bg-blue-100 rounded-full blur-3xl opacity-30 transform scale-75"></div>
                    <img src="https://qwaiting.com/images/Screen-2.png" alt="Download Our App"
                        class="relative z-10 max-h-[500px] drop-shadow-2xl transform hover:-translate-y-2 transition-transform duration-500">
                </div>
                <div class="w-full md:w-1/2 md:pl-10">
                    <div
                        class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 text-blue-600 font-bold text-xl mb-6 shadow-sm">
                        01
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Download Our App</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Customers can book their appointments without visiting at your branch/ location through app.
                    </p>
                </div>
            </div>

            <!-- Arrow separation visualization (optional/decorative) -->
            <div class="hidden md:flex justify-center -my-10 relative z-0 opacity-20">
                <img src="https://qwaiting.com/images/arrow.png" alt="Arrow" class="w-32 rotate-90 md:rotate-0">
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-12 mb-24 last:mb-0">
                <div class="w-full md:w-1/2 flex justify-center md:justify-start relative">
                    <div class="absolute inset-0 bg-purple-100 rounded-full blur-3xl opacity-30 transform scale-75"></div>
                    <img src="https://qwaiting.com/images/Screen-3.png" alt="Choose Vendor From List"
                        class="relative z-10 max-h-[500px] drop-shadow-2xl transform hover:-translate-y-2 transition-transform duration-500">
                </div>
                <div class="w-full md:w-1/2 md:pr-10">
                    <div
                        class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-purple-100 text-purple-600 font-bold text-xl mb-6 shadow-sm">
                        02
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Choose Vendor From List</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Allow your customers to choose the location or branch of their choice to get the services.
                    </p>
                </div>
            </div>

            <!-- Arrow separation visualization -->
            <div class="hidden md:flex justify-center -my-10 relative z-0 opacity-20">
                <img src="https://qwaiting.com/images/arrow.png" alt="Arrow" class="w-32 rotate-90 md:rotate-0">
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col md:flex-row items-center gap-12 mb-24 last:mb-0">
                <div class="w-full md:w-1/2 flex justify-center md:justify-end relative">
                    <div class="absolute inset-0 bg-green-100 rounded-full blur-3xl opacity-30 transform scale-75"></div>
                    <img src="https://qwaiting.com/images/Screen-4.png" alt="Book Available Time Slot"
                        class="relative z-10 max-h-[500px] drop-shadow-2xl transform hover:-translate-y-2 transition-transform duration-500">
                </div>
                <div class="w-full md:w-1/2 md:pl-10">
                    <div
                        class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-green-100 text-green-600 font-bold text-xl mb-6 shadow-sm">
                        03
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Book Available Time Slot</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Customers can schedule according to the available time-slots.
                    </p>
                </div>
            </div>

            <!-- Arrow separation visualization -->
            <div class="hidden md:flex justify-center -my-10 relative z-0 opacity-20">
                <img src="https://qwaiting.com/images/arrow-2.png" alt="Arrow" class="w-32 rotate-90 md:rotate-0">
            </div>

            <!-- Step 4 -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-12 mb-24 last:mb-0">
                <div class="w-full md:w-1/2 flex justify-center md:justify-start relative">
                    <div class="absolute inset-0 bg-yellow-100 rounded-full blur-3xl opacity-30 transform scale-75"></div>
                    <img src="https://qwaiting.com/images/Screen-5.png" alt="Manage Virtual Ticket"
                        class="relative z-10 max-h-[500px] drop-shadow-2xl transform hover:-translate-y-2 transition-transform duration-500">
                </div>
                <div class="w-full md:w-1/2 md:pr-10">
                    <div
                        class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-yellow-100 text-yellow-600 font-bold text-xl mb-6 shadow-sm">
                        04
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Manage Virtual Ticket</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        After booking, customers can cancel or update the virtual queue ticket as per their necessity.
                    </p>
                </div>
            </div>

            <!-- Arrow separation visualization -->
            <div class="hidden md:flex justify-center -my-10 relative z-0 opacity-20">
                <img src="https://qwaiting.com/images/arrow-3.png" alt="Arrow" class="w-32 rotate-90 md:rotate-0">
            </div>

            <!-- Step 5 -->
            <div class="flex flex-col md:flex-row items-center gap-12 mb-24 last:mb-0">
                <div class="w-full md:w-1/2 flex justify-center md:justify-end relative">
                    <div class="absolute inset-0 bg-red-100 rounded-full blur-3xl opacity-30 transform scale-75"></div>
                    <img src="https://qwaiting.com/images/Screen-6.png" alt="Token No"
                        class="relative z-10 max-h-[500px] drop-shadow-2xl transform hover:-translate-y-2 transition-transform duration-500">
                </div>
                <div class="w-full md:w-1/2 md:pl-10">
                    <div
                        class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-100 text-red-600 font-bold text-xl mb-6 shadow-sm">
                        05
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Instant Alerts on Mobile</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Customers will get alerts on their mobile with the guidelines regarding the further process.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted By Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Trusted by 65K+ Businesses Worldwide</h2>
            <p class="text-gray-600 mb-12 max-w-3xl mx-auto">
                Our advanced Face Recognition System helps Government organizations manage queues, enhance security, and
                streamline customer flow. Trusted in over 120 countries to create faster, safer, and smarter experiences.
            </p>

            <div
                class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center opacity-70 transition-all duration-500">
                <!-- I will use a subset of logos for cleaner look, or I typically would map them. I will manually add a few key ones or all if space permits. The user said keep all images. So I should try to include all logos or use the existing component if available? No, I will render them as a flex wrap or grid. -->
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/daleel_alzowar.jpg"
                        alt="daleel alzowar" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/hospital_at_maayo.jpg"
                        alt="hospital at maayo" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img
                        src="https://qwaiting.com/frontimg/clients/ministry_of_hajj_and_umrah.jpg"
                        alt="ministry of hajj and umrah" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/tatapwer_ddl.jpg"
                        alt="tatapwer ddl" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/PSB.png"
                        alt="PSB Academy" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/jtc.png" alt="JTC"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/stuffd.png"
                        alt="Stuff’d" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/a1-business.png"
                        alt="A1 Business PTE LTD" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/nus-logo.png" alt="NSU"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/dhl-logo.png" alt="DHL"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/wgs.png" alt="WGS"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/HDT_taxi_logo.jpg"
                        alt="HDT Taxi" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img
                        src="https://qwaiting.com/frontimg/clients/Singapore_Polytechnic_logo.png"
                        alt="Singapore Polytechnic" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/skechers-logo.png"
                        alt="Skechers" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/healthway-medical.png"
                        alt="Healthway Medical" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/Loreal.png"
                        alt="Loreal" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/Nirvana.png"
                        alt="Nirvana" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/NTUC_FairPrice.png"
                        alt="NTUC FairPrice" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img
                        src="https://qwaiting.com/frontimg/clients/Ministry_of_Education.png" alt="Ministry of Education"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/msq-logo.png" alt="MSQ"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/MND-singapore.png"
                        alt="MND Singapore" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img
                        src="https://qwaiting.com/frontimg/clients/current-corporate-signature.png"
                        alt="Current Corporate Signature" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/MOH.png" alt="MOH"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/cropped-BL.png"
                        alt="Ban Leong" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/logo-dark.png"
                        alt="Changi Airport" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/andy-cr-icon.png"
                        alt="Changi Recommends" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/cortinawatch.png"
                        alt="Cortina Watch" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/subway.png"
                        alt="Subway" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/TianPo.jpg"
                        alt="TianPo" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/grab.png" alt="Grab"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img
                        src="https://qwaiting.com/frontimg/clients/Inland-Revenue-Authority.png"
                        alt="Inland Revenue Authority" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img
                        src="https://qwaiting.com/frontimg/clients/Ministry-of-Manpower.png" alt="Ministry of Manpower"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/NLB.png" alt="NLB"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/ntuc-learning-hub.png"
                        alt="NTUC Learning Hub" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img
                        src="https://qwaiting.com/frontimg/clients/Raffles-Medical-Group.png" alt="Raffles Medical Group"
                        class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/service-SG.png"
                        alt="Service SG" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/SIM-SOC.png"
                        alt="SIM SOC" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/Singapore-Medical.png"
                        alt="Singapore Medical" class="max-h-12 w-auto"></div>
                <div class="p-4 flex justify-center"><img src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg"
                        alt="Apollo Hospitals" class="max-h-12 w-auto"></div>
            </div>
        </div>
    </section>

@endsection