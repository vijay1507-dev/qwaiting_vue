@extends('website.index')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-indigo-100 selection:text-indigo-700">

        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 overflow-hidden bg-gradient-to-b from-blue-50/50 to-white lg:pt-40 lg:pb-32">
            <!-- Background Decorations -->
            <div
                class="absolute top-0 left-0 -ml-20 -mt-20 w-96 h-96 bg-gradient-to-br from-indigo-100 to-blue-100 rounded-full blur-3xl opacity-50">
            </div>
            <div
                class="absolute bottom-0 right-0 -mr-20 -mb-20 w-80 h-80 bg-gradient-to-tr from-cyan-100 to-sky-100 rounded-full blur-3xl opacity-50">
            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                    <!-- Content Column -->
                    <div class="space-y-8 animate-fade-in-up">
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full border border-blue-100 bg-blue-50 text-blue-600 text-sm font-medium">
                            <span class="flex h-2 w-2 rounded-full bg-blue-600 mr-2"></span>
                            Industry Insights E-Book
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tight text-gray-900 leading-tight">
                            Queue Management System: <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Why it is
                                Necessary</span> for Every Industry?
                        </h1>

                        <div class="space-y-6 text-lg text-gray-600">
                            <p class="leading-relaxed">
                                Long queues are frustrating, no matter whether you're at the hospital, bank, or in a
                                shopping mall. They make it hard for your business to deliver a long-lasting customer
                                experience. It's time to change that!
                            </p>
                            <p
                                class="leading-relaxed border-l-4 border-blue-500 pl-4 italic bg-blue-50/50 py-2 pr-2 rounded-r-lg">
                                This ebook covers vital benefits of a Queue Management System to varied industries. Qwaiting
                                can be modified and customized as per the requirements and size of the business it serves.
                            </p>
                            <p class="text-base text-gray-500">
                                And if you still have uncertainties and concerns after reading this, then you may take our
                                free trial.
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <a href="/asset/pdf/queue-waiting.pdf"
                                class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full shadow-lg hover:bg-blue-700 hover:shadow-blue-500/30 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600" download>
                                Download Free E-Book
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="relative lg:h-auto animate-fade-in-right">
                        <!-- Decorative Blob -->
                        <div
                            class="absolute -inset-4 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl opacity-20 blur-2xl">
                        </div>

                        <div
                            class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-100 bg-white transform transition-transform hover:scale-[1.02] duration-500">
                            <img src="https://qwaiting.com/images/qwaiting-ebook.jpg"
                                alt="Queue Management System Necessary for Every Industry"
                                class="w-full h-auto object-cover">

                            <!-- Overlay Content (Glass effect) -->
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-white/90 backdrop-blur-md p-6 border-t border-white/50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs font-semibold text-blue-600 uppercase tracking-wider">Must Read
                                        </p>
                                        <p class="text-sm font-medium text-gray-900">Industry Standard Guide</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

    </div>

@endsection