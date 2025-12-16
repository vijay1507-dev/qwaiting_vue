@extends('website.index')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-indigo-100 selection:text-indigo-700">

        <!-- Hero Section -->
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
                    OUR VIDEOS - <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">QUEUE MANAGEMENT SYSTEM </span>
                </h1>

            </div>
        </section>

        <section class="py-16 px-4 sm:px-6 lg:px-6 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all overflow-hidden">
                    
                    <div class="grid lg:grid-cols-2">
                        
                        <!-- Left: Image -->
                        <div class="relative">
                            <img src="https://qwaiting.com/images/qwaiting-video.png" 
                                alt="Customer Story"
                                class="w-full h-full object-contain">
                            
                            <!-- Overlay Title -->
                            <div class="absolute inset-0 bg-black/40 flex items-start">
                                <h3 class="text-white text-lg sm:text-xl font-medium p-6">
                                    Introduction Queue management software
                                </h3>
                            </div>
                        </div>

                        <!-- Right: Content -->
                        <div class="p-10 lg:p-8 flex flex-col justify-center">
                            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                                Customer Stories About Qwaiting
                            </h2>

                            <p class="text-gray-600 text-lg leading-relaxed mb-4">
                                Qwaiting reduces wait times and frees customers from venue-bound queues. With real-time notifications, customers are updated about their turn—no need to wait on-site.
                            </p>

                            <p class="text-gray-600 text-lg leading-relaxed">
                                From hospitals to retail chains, organizations are using Qwaiting to serve smarter, faster, and better. Dive into stories that show how our solution helps clients enhance flow, boost efficiency, and elevate satisfaction.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </section>



        <!-- Case Studies Section -->
        <section class="py-24 px-6 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Case Studies</h2>
                </div>

                <!-- Video Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Video 1 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=kzmw9ijIaMM', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/hospital-queue.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                                Qwaiting :Smart Queue Management System for hospitals
                            </h3>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=DWLyTfSXMyE', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/hospital-queue.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                                Our Team Installing Qwaiting at NUS National University of Singapore | Education Queue System
                            </h3>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=FfAHPVCEyHY', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/data-driven.jpg"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               Qwaiting: Best queue management system for data-driven customer experience
                            </h3>
                        </div>
                    </div>

                    <!-- Video 4 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=I4JXh_vWKgI', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/qwaiting-qr.jpg"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How QR Queue System works? | Working of Queue Management
                            </h3>
                        </div>
                    </div>

                    <!-- Video 5 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=vMDjkbGoaio', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/appointments.jpg"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               No More Long Lines | Appointments Made Easy | How To Use?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 6 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=J1VBUpogM7w', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to view category and sub category report in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 7 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=8p3TkhyUWGI', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How queue management system works ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 8 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=_4RvnY0dssc', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to manage display setting
                            </h3>
                        </div>
                    </div>

                    <!-- Video 9 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=Qu1MBYT947k', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to view staff performance in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 10 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=n-BFNcvnpI0', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to manage call screen settings in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 11 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=fQmvZPzvNbk', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to give access to the staff in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 12 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=NApYzeNey9g', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to set minimum and maximum transaction time alert in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 13 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=i-Y3LZdq63g', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to change staff password in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 14 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=Y8rMEAtF3Q4', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to make account settings in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 15 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=DuCiWIC_bpY', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to edit or delete the counters in qwaiting ?
                            </h3>
                        </div>
                    </div>

                    <!-- Video 16 -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">

                        <!-- Thumbnail Wrapper -->
                        <div class="aspect-video relative cursor-pointer"
                            onclick="window.open('https://www.youtube.com/watch?v=QmP84bwByZ4', '_blank')">

                            <!-- Thumbnail Image -->
                            <img src="https://qwaiting.com/images/queue-university.png"
                                alt="Video Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Dark Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition">

                                    <!-- Play Icon -->
                                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6 4l12 6-12 6V4z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <!-- Text -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                               How to add counter in qwaiting ?
                            </h3>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="https://www.youtube.com/channel/UCscI30ia3ZzXSNYD5Z3fISQ/videos" target="_blank"
                                class="inline-flex items-center justify-center rounded-full bg-indigo-600 text-white px-8 py-4 text-base font-bold hover:bg-indigo-700 transition-colors shadow-lg">
                                More Videos
                                <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
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

    <!-- SEO Meta Tags -->
    @section('meta')
        <title>Videos About Qwaiting System | Qwaiting University</title>
        <meta name="description"
            content="Check out the Videos About Qwaiting System like How it works, how you can manage display setting, call setting, edit and delete counters and more">
        <meta property="og:title" content="Videos About Qwaiting System | Qwaiting University">
        <meta property="og:description"
            content="Check out the Videos About Qwaiting System like How it works, how you can manage display setting, call setting, edit and delete counters and more">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://qwaiting.com/videos">
    @endsection
@endsection