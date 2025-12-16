@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-white selection:bg-primary selection:text-white">

        {{-- Hero Section --}}
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-b from-gray-50 to-white">
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div
                    class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[1000px] bg-primary/5 rounded-full blur-3xl">
                </div>
                <div class="absolute top-1/2 left-0 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10 text-center">
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-8 tracking-tight text-gray-900">
                    Best Online Meeting <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Software</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto mb-10">
                    Our online meeting software allows your employees to easily and securely connect with customers online,
                    guaranteeing smooth interactions from any location worldwide.
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
                    <a href="https://qwaiting.com/contact-us"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-primary hover:text-primary transition-all hover:shadow-lg hover:-translate-y-1 w-full sm:w-auto">
                        Contact Us
                    </a>
                </div>

                <div class="relative mx-auto max-w-5xl">
                    <div
                        class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/50 backdrop-blur-sm bg-white">
                        <img src="https://qwaiting.com/frontimg/best-online-meeting-software.png" alt="Online Meeting Software"
                            class="w-full h-auto transform transition-transform hover:scale-[1.01] duration-700">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            <!-- Image Section -->
            <div class="relative">
                <div class="absolute -inset-4 bg-indigo-100 rounded-3xl blur-2xl opacity-50"></div>
                <img
                src="https://qwaiting.com/frontimg/replace-face-to-face-service-with-virtual-meetings.png"
                alt="Virtual Meetings"
                class="relative rounded-3xl shadow-2xl w-full object-cover"
                />
            </div>

            <!-- Content Section -->
            <div>
                <span class="inline-flex items-center px-4 py-1.5 mb-4 text-sm font-semibold text-indigo-600 bg-indigo-100 rounded-full">
                Virtual Service Solution
                </span>

                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                Replace Face-to-Face Service with
                <span class="text-indigo-600">Virtual Meetings</span>
                </h2>

                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                Our online meeting software facilitates virtual meetings and includes features for managing participants in a queue. You can easily integrate the solution with your preferred video chat tool like Microsoft Teams, Google Meet, or more. The participant doesn't need to download the video chat app. They can simply click on the provided link generated by the software and join the meeting to avail the services. Also, it has the ability to control the entry of participants into the online meeting, ensuring orderly joining. This can be especially useful in situations with a high volume of participants or when access needs to be managed systematically. Thus, this helps in avoiding overcrowding and ensuring a smooth flow of participants.
                </p>

                <!-- CTA -->
                <div class="flex flex-wrap gap-4">
                <a
                    href="#"
                    class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white bg-indigo-600 rounded-full shadow-lg hover:bg-indigo-700 transition-all duration-200"
                >
                    Get Free Trial
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                </div>
            </div>

            </div>
        </div>
        </section>


        {{-- How It Works Section (Steps) --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full border border-primary/20 mb-6">
                        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                        <span class="text-primary font-semibold text-sm">How It Works</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold leading-tight mb-4 text-gray-900">
                        Online Virtual Meeting Platforms-<span class="text-primary"> Connecting Through Video, Chat, and More.</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Connecting Through Video, Chat, and More.
                    </p>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-primary via-purple-400 to-primary hidden lg:block">
                    </div>
                    <div class="space-y-24">

                        {{-- Step 1 --}}
                        <div class="relative grid lg:grid-cols-2 gap-12 items-center" data-aos="fade-right">
                            <div class="lg:text-right lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-end mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            1</div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Schedule Appointments</h3>
                                    </div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4 hidden lg:block">Schedule Appointments</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        The client schedules an appointment and selects the video meeting option or slot as per their convenience.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div
                                    class="relative group bg-white rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all border border-gray-100">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/schedule-appointments.png" alt="Book Appointment"
                                        class="relative w-full rounded-2xl shadow-sm transition-transform group-hover:scale-[1.02]">
                                </div>
                            </div>
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-white rounded-full border-4 border-primary shadow-lg hidden lg:block z-10">
                            </div>
                        </div>

                        {{-- Step 2 --}}
                        <div class="relative grid lg:grid-cols-2 gap-12 items-center" data-aos="fade-left">
                            <div class="lg:order-2 lg:pl-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            2</div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Meeting Confirmations & Reminders</h3>
                                    </div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4 hidden lg:block">Meeting Confirmations & Reminders</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Clients will receive online Meet booking confirmation and appointment reminders through text messages and email on their smart devices.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div
                                    class="relative group bg-white rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all border border-gray-100">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-purple-50 to-pink-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/meeting-confirmations-and-reminders.png" alt="Get Notification"
                                        class="relative w-full rounded-2xl shadow-sm transition-transform group-hover:scale-[1.02]">
                                </div>
                            </div>
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-white rounded-full border-4 border-primary shadow-lg hidden lg:block z-10">
                            </div>
                        </div>

                        {{-- Step 3 --}}
                        <div class="relative grid lg:grid-cols-2 gap-12 items-center" data-aos="fade-right">
                            <div class="lg:text-right lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-end mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            3</div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Check-In</h3>
                                    </div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4 hidden lg:block">Check-In</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Clients holding confirmed appointments can check in by accessing the meeting link provided in the reminder message. Walk-in clients can use a QR code for check-in, select their desired service, and wait for the meeting in the virtual meeting room.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div
                                    class="relative group bg-white rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all border border-gray-100">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-green-50 to-teal-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/check-In.png" alt="Check In"
                                        class="relative w-full rounded-2xl shadow-sm transition-transform group-hover:scale-[1.02]">
                                </div>
                            </div>
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-white rounded-full border-4 border-primary shadow-lg hidden lg:block z-10">
                            </div>
                        </div>

                        {{-- Step 4 --}}
                        <div class="relative grid lg:grid-cols-2 gap-12 items-center" data-aos="fade-left">
                            <div class="lg:order-2 lg:pl-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            4</div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Online Service Delivery</h3>
                                    </div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4 hidden lg:block">Online Service
                                        Delivery</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Services are provided through a video meeting that brings a positive experience for your clients.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:order-1 lg:pr-16">
                                <div
                                    class="relative group bg-white rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all border border-gray-100">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-amber-50 to-orange-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/online-service-delivery.png"
                                        alt="Online Service Delivery"
                                        class="relative w-full rounded-2xl shadow-sm transition-transform group-hover:scale-[1.02]">
                                </div>
                            </div>
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-white rounded-full border-4 border-primary shadow-lg hidden lg:block z-10">
                            </div>
                        </div>

                        {{-- Step 5 --}}
                        <div class="relative grid lg:grid-cols-2 gap-12 items-center" data-aos="fade-right">
                            <div class="lg:text-right lg:pr-16">
                                <div class="inline-block lg:block">
                                    <div class="flex items-center gap-4 lg:justify-end mb-4">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                            5</div>
                                        <h3 class="text-2xl font-bold text-gray-900 lg:hidden">Gather Client Reviews</h3>
                                    </div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4 hidden lg:block">Gather Client Reviews</h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        After the meeting, the client will receive an online feedback form to rate your business services. So you can improve in future if required.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:pl-16">
                                <div
                                    class="relative group bg-white rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all border border-gray-100">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-teal-50 to-cyan-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                    <img src="https://qwaiting.com/frontimg/gather-client-reviews.png" alt="Take Feedback"
                                        class="relative w-full rounded-2xl shadow-sm transition-transform group-hover:scale-[1.02]">
                                </div>
                            </div>
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-white rounded-full border-4 border-primary shadow-lg hidden lg:block z-10">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

         {{-- CTA Section --}}
        <section class="py-24 bg-primary relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-primary to-purple-800 opacity-90"></div>
            <div class="absolute inset-0 bg-[url('https://qwaiting.com/frontimg/pattern.png')] opacity-10"></div>

            <div class="max-w-4xl mx-auto px-4 relative z-10 text-center text-white">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">#1 Cloud-Based Queue Management System</h2>
                <p class="text-xl opacity-90 mb-10 leading-relaxed">
                    Shorter your customer wait time with #1 Cloud-Based Queue Management Software Today!
                    Our queue management software helps businesses enhance your productivity and reputation by satisfying
                    your customers.
                </p>
                <a href="https://qwaiting.com/signup"
                    class="inline-flex items-center gap-2 bg-white text-primary px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transform hover:scale-105 transition-all shadow-xl">
                    Book a Free Demo
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        Features of <span
                            class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Virtual
                            Meeting Solutions</span>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    {{-- Feature 1 --}}
                    <div
                        class="group relative p-8 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100">
                        <div
                            class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/virtual-waiting-room.svg" alt="Virtual Waiting Room"
                                class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Virtual Waiting Room</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            A virtual waiting room allows participants to wait in line before entering the main meeting. This helps manage the flow of participants and ensures that the meeting starts on the exact time period.
                        </p>
                    </div>

                    {{-- Feature 2 --}}
                    <div
                        class="group relative p-8 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100">
                        <div
                            class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/set-and-customize-queuing-parameters.svg"
                                alt="Customize Parameters" class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Set & Customize Queuing Parameters</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Allow organizers to customize queue parameters, including maximum participants and entry criteria, to meet specific meeting needs.
                        </p>
                    </div>

                    {{-- Feature 3 --}}
                    <div
                        class="group relative p-8 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100">
                        <div
                            class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/queue-notifications.svg" alt="Queue Notifications"
                                class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Queue Notifications</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Send notifications to participants as they move up in the queue or when their turn is approaching. This helps keep participants informed while waiting anywhere.
                        </p>
                    </div>

                    {{-- Feature 4 --}}
                    <div
                        class="group relative p-8 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-100">
                        <div
                            class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <img src="https://qwaiting.com/frontimg/participant-identification.svg"
                                alt="Participant Identification" class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Participant Identification</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Organizers can identify participants in the queue as the solution displays participant profiles or other information in real time. This ability helps in prioritizing & managing the queue effectively.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Benefits Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto space-y-32">
                {{-- Benefit 1 --}}
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-6">
                        <h2 class="text-4xl font-bold text-gray-900">Ensure Secure <span class="text-primary">Controlled
                                Access</span></h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Organizers approve participants before joining the
                                    meeting, minimizing the risk of unauthorized access.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Meeting links generated by the virtual meeting solution
                                    are secure and unique to each session.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Our virtual meeting software provides a secure
                                    file-sharing feature that prevents unauthorized downloads.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="https://qwaiting.com/frontimg/ensure-secure-controlled-access.png" alt="Secure Access"
                                class="w-full">
                        </div>
                    </div>
                </div>

                {{-- Benefit 2 --}}
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="lg:w-1/2 space-y-6">
                        <h2 class="text-4xl font-bold text-gray-900">Integrate with Your <span
                                class="text-primary">Preferred Tool</span></h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Integrate with the online meeting platforms you already
                                    use like Microsoft Teams, Google Meet, Zoom, and more.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Meetings are automatically set up, queues are generated
                                    easily, and information is synchronized across different systems.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Virtual service is accessible on clients' smart devices,
                                    and clients don't even need to download the app.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="https://qwaiting.com/frontimg/integrate-with-your-preferred-tool.png"
                                alt="Integrate Tools" class="w-full">
                        </div>
                    </div>
                </div>

                {{-- Benefit 3 --}}
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-6">
                        <h2 class="text-4xl font-bold text-gray-900">Client Connect <span
                                class="text-primary">Anywhere</span></h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Allow clients to join queues or attend meetings remotely
                                    from any location on any device.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Create a hybrid workforce model that effectively
                                    addresses the needs of clients.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Clients & stakeholders from different geographical
                                    locations can participate in virtual meetings, catering to a broader audience.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="https://qwaiting.com/frontimg/client-connect-anywhere.png" alt="Client Connect"
                                class="w-full">
                        </div>
                    </div>
                </div>

                {{-- Benefit 4 --}}
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="lg:w-1/2 space-y-6">
                        <h2 class="text-4xl font-bold text-gray-900">Simplify the Process <span class="text-primary">For
                                All</span></h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">When a customer wants to video chat, a special link is
                                    sent to them when it's their turn. They aren't required to install the video chat
                                    app.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Staff don't have to ask for the customer's details, as
                                    it’s already mentioned in the e-ticket.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Easy to set up, simple to join: create virtual events in
                                    seconds. You can also manage them from any device.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="https://qwaiting.com/frontimg/simplify-the-process-for-all.png" alt="Simplify Process"
                                class="w-full">
                        </div>
                    </div>
                </div>

                {{-- Benefit 5 --}}
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 space-y-6">
                        <h2 class="text-4xl font-bold text-gray-900">Better <span class="text-primary">Communication</span>
                        </h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Our software provides real-time communication between
                                    staff & customers, which enables instant responses to customer inquiries.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Qwaiting facilitates easy collaboration among team
                                    members in virtual meetings, offering features like screen sharing to enhance
                                    teamwork.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm">✓</span>
                                <span class="text-gray-600 text-lg">Recurring meetings with calendar integration streamline
                                    coordination, ensuring maximum participation & improved communication for teams.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="https://qwaiting.com/frontimg/better-communication.png" alt="Better Communication"
                                class="w-full">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Reviews Section --}}
        <section class="py-20 bg-white">
            <div class="container px-4 mx-auto">
                <div class="max-w-4xl mx-auto mb-16 text-center">
                    <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                        Reviews
                    </h2>
                </div>

                <div class="flex flex-wrap justify-center gap-8 mb-16">
                    {{-- Review 1 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.5/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/capterra.png" alt="Capterra" class="h-20 w-30">
                    </div>

                    {{-- Review 2 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.5/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/Software.png" alt="GetApp" class="h-25 w-25">
                    </div>

                    {{-- Review 3 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.2/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/software_advice.png" alt="Software Advice" class="h-20 w-40">
                    </div>

                    {{-- Review 4 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.3/5</span>
                        </div>
                        <img src="https://qwaiting.com/images/finance.png" alt="G2" class="h-20 w-40">
                    </div>

                    {{-- Review 5 --}}
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-2xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-900">4.8/5</span>
                        </div>
                        <img src="https://assets.goodfirms.co/badges/normal-badge/salon-software.svg" alt="SourceForge" class="h-20 w-30">
                    </div>
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

        {{-- Why Qwaiting Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Why <span class="text-primary">Qwaiting?</span>
                    </h2>
                </div>

                <div class="max-w-4xl mx-auto">
                    <p class="text-xl text-gray-600 leading-relaxed mb-6">
                        Qwaiting is a solution that helps businesses to overcome various challenges such as long customer
                        wait times, managing crowded spaces, and inefficient queuing processes. This software is ideal for
                        queue management and reducing the overall customer wait time.
                    </p>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        We provide the most suitable queuing solution that helps you manage your business operations
                        effectively in every aspect. Improve customer experience, get satisfying outcomes, and control
                        workflow efficiently. You can take your business to the peak with us.
                    </p>
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

        {{-- Blog Section --}}
        <section class="py-20 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="max-w-4xl mx-auto mb-16 text-center">
                    <h2 class="mb-6 text-3xl font-bold leading-tight text-gray-900 md:text-4xl">
                        Latest Posts From the Blog
                    </h2>
                </div>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Blog Post 1 --}}
                    <a href="https://blog.qwaiting.com/online-appointment-booking-software-take-your-business-to-the-next-level/"
                        class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
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
                        class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
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
                        class="block p-6 transition-all duration-300 bg-white rounded-3xl hover:shadow-xl hover:-translate-y-1 group">
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