@extends('website.layout.website')

@section('title', 'Self Guided Demo | Qwaiting')
@section('meta_description', 'Take a tour to see how Qwaiting transforms customer journeys and optimizes business operations.')

@section('content')
    <div class="font-sans text-text-dark bg-white overflow-x-hidden">

        <!-- HERO / INTERACTIVE DEMO WRAPPER -->
        <section
            class="relative bg-gradient-to-br from-[#6C5CE7] to-[#4834d4] text-white min-h-[90vh] flex flex-col justify-center items-center py-20 px-4 sm:px-6 lg:px-8 overflow-hidden">

            <!-- Background Decor -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-20 -right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>

            <!-- Content Container -->
            <div class="relative z-10 max-w-7xl mx-auto w-full text-center">

                <!-- Heading -->
                <div class="mb-12 space-y-4">
                    <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight drop-shadow-sm">
                        Happier Customers
                    </h1>
                    <p class="text-xl md:text-2xl font-light text-white/90 max-w-3xl mx-auto">
                        Take a tour to see how Qwaiting transforms customer journeys and optimizes business operations.
                    </p>

                    <div class="flex justify-center gap-4 mt-8">
                        <a href="{{ url('/products/people-counting') }}"
                            class="px-8 py-3 bg-white text-[#6C5CE7] font-bold rounded-full shadow-lg hover:bg-gray-50 hover:scale-105 transition-all duration-300">
                            Book a Demo
                        </a>
                    </div>
                </div>

                <!-- INTERACTIVE DISPLAY AREA (IFRAME) -->
                <div class="relative w-full max-w-6xl mx-auto mt-8">
                    <!-- Container for Aspect Ratio -->
                    <!-- The iframe expects to fill the container. We use aspect-video (16:9) or a fixed height/responsive padding -->
                    <div
                        class="relative w-full aspect-video bg-white/5 rounded-xl shadow-2xl overflow-hidden border border-white/10 backdrop-blur-sm">
                        <iframe loading="lazy" class="sl-demo" src="https://qwaiting.com/self-guided" name="sl-embed"
                            allow="fullscreen" allowfullscreen=""
                            style="position:absolute;top:0;left:0;width:100%!important;height:100%!important;border:none;">
                        </iframe>
                    </div>

                    <!-- Decorative Elements behind/around iframe to "modernize layout" -->
                    <div
                        class="absolute -z-10 -inset-4 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-xl blur-xl opacity-30">
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection