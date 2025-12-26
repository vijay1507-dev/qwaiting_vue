<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex">
    <title>@yield('title', 'Qwaiting - Queue Management System')</title>
    <meta name="description"
        content="@yield('meta_description', 'Qwaiting is a cloud-based queue management system that helps businesses manage customer queues, appointments, and walk-ins efficiently.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Preload critical CSS to prevent FOUC -->
    <link rel="preload" href="{{ asset('website/asset/css/style.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('website/asset/css/style.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Prevent FOUC - hide body until CSS loads -->
    <style>
        body {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.1s ease-in;
        }

        body.loaded {
            visibility: visible;
            opacity: 1;
        }
    </style>

    <!-- Styles / Scripts -->
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/js/app.ts', 'resources/js/cookie-banner.ts'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="font-sans text-text-dark antialiased bg-white">
    <script>
        // Show body immediately after DOM loads to prevent FOUC
        document.addEventListener('DOMContentLoaded', function () {
            document.body.classList.add('loaded');
        });
        // Fallback: show body after a short delay even if DOMContentLoaded doesn't fire
        setTimeout(function () {
            document.body.classList.add('loaded');
        }, 100);
    </script>

    <div class="min-h-screen flex flex-col">
        @include('website.partials.header')

        <main class="flex-grow">
            @yield('content')
        </main>

        @include('website.partials.footer')

        <!-- Cookie Banner Container -->
        <div id="cookie-banner-container"></div>

        <script src="{{ asset('website/asset/js/script.js') }}"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                once: true
            });
        </script>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        <script>
            new Swiper(".testimonialSwiper", {
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                spaceBetween: 30,

                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },

                breakpoints: {
                    768: { slidesPerView: 1 },
                    1024: { slidesPerView: 1 }
                }
            });
        </script>
    </div>

</body>
</html>