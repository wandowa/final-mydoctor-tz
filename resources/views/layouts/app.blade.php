<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="MY DOCTOR offers high-quality healthcare services with a focus on patient care. Explore our services, book appointments, and more.">
    <meta name="keywords" content="doctor, mydoctor.tz, healthcare, medical services, appointment, healthcare services, patient care">
    <meta name="author" content="MY DOCTOR">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="MY DOCTOR | Your Health, Our Priority">
    <meta property="og:description" content="MY DOCTOR provides professional healthcare services for your well-being. Located East Africa, Tanzania.">
    <meta property="og:image" content="{{ url('img/logo-dr.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MY DOCTOR | Your Health, Our Priority">
    <meta name="twitter:description" content="MY DOCTOR offers comprehensive healthcare services with easy online appointment booking.">
    <meta name="twitter:image" content="{{ url('img/logo-dr.png') }}">
    <title>MY DOCTOR | @yield('title')</title>
    <link rel="icon" href="{{ url('img/logo-dr.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Heartbeat Pulse Animation for Logo */
        @keyframes pulse-heart {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .animate-pulse-heart {
            animation: pulse-heart 1.5s infinite ease-in-out;
        }

        /* Bounce Animation for Dots */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce {
            animation: bounce 1s infinite;
        }
        .delay-0 { animation-delay: 0s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-400 { animation-delay: 0.4s; }

        /* Fade Out Transition */
        .fade-out {
            opacity: 0;
            transition: opacity 1s ease;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    @include('partials.header')

    <!-- Preloader Section -->
    <div id="preloader" class="fixed inset-0 z-[9999] bg-white flex flex-col items-center justify-center">
        <!-- Logo with Heartbeat -->
        <img src="{{ url('img/logo-dr.png') }}" alt="Logo" class="w-24 animate-pulse-heart z-10 mb-6" />

        <!-- Bouncing Dots -->
        <div class="flex space-x-2">
            <div class="w-3 h-3 bg-blue-500 rounded-full animate-bounce delay-0"></div>
            <div class="w-3 h-3 bg-blue-500 rounded-full animate-bounce delay-200"></div>
            <div class="w-3 h-3 bg-blue-500 rounded-full animate-bounce delay-400"></div>
        </div>
    </div>

    <main class="pt-5 md:pt-0 mt-18 flex-grow w-full overflow-x-hidden">
        @yield('content')
    </main>

    @include('partials.footer')

    <button id="topUpButton" class="fixed bottom-10 right-5 bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 transition-all transform hover:scale-110 focus:outline-none z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Preloader Logic
        document.addEventListener("DOMContentLoaded", function () {
            const preloader = document.getElementById('preloader');
            const currentRoute = window.location.pathname;
    
            // Check if we're on the home route
            if (currentRoute === '/' || currentRoute === '/home') {
                // First, wait for the page to fully load
                window.addEventListener('load', function() {
                    // Then wait for any potential async content to load
                    setTimeout(() => {
                        preloader.classList.add('fade-out');
                        
                        // Hide fully after transition completes
                        setTimeout(() => {
                            preloader.classList.add('hidden');
                        }, 1000); // Should match your CSS transition duration
                    }, 1000); // Additional buffer time after page load
                });
            } else {
                // For other routes, hide immediately
                preloader.classList.add('hidden');
            }
        });
    
        // Scroll to Top Button
        const topUpButton = document.getElementById('topUpButton');
        topUpButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

</body>

</html>
