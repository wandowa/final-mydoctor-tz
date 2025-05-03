<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="MY DOCTOR offers high-quality healthcare services with a focus on patient care. Explore our services, book appointments, and more.">
    <meta name="keywords" content="doctor, healthcare, medical services, appointment, healthcare services, patient care">
    <meta name="author" content="MY DOCTOR">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="MY DOCTOR | Your Health, Your Pride">
    <meta property="og:description" content="MY DOCTOR provides professional healthcare services for your well-being. Located East Africa, Tanzania.">
    <meta property="og:image" content="{{ url('img/logo-dr.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MY DOCTOR | Your Health, Our Priority">
    <meta name="twitter:description" content="MY DOCTOR offers comprehensive healthcare services with easy online appointment booking.">
    <meta name="twitter:image" content="{{ url('img/logo-dr.png') }}">
    <title>MY DOCTOR | @yield('title')</title>
    
    <!-- Preload critical resources -->
    <link rel="preload" href="{{ url('img/logo-dr.png') }}" as="image">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="icon" href="{{ url('img/logo-dr.png') }}" type="image/x-icon">
    
    <!-- Non-blocking CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{ mix('resources/css/app.css') }}" media="print" onload="this.media='all'">

    <style>
        /* Critical CSS - Load immediately */
        #preloader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease;
        }
        
        /* Heartbeat Animation */
        @keyframes pulse-heart {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .animate-pulse-heart {
            animation: pulse-heart 1.5s infinite ease-in-out;
        }

        /* Bounce Animation */
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

        /* Progress Bar */
        .progress-container {
            width: 200px;
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            margin-top: 20px;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            background: #3b82f6;
            width: 0;
            transition: width 0.3s ease;
        }

        /* Content Visibility */
        body > *:not(#preloader) {
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        body.content-visible > *:not(#preloader) {
            opacity: 1;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 text-gray-900 min-h-screen flex flex-col">

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

        <!-- Progress Bar -->
        <div class="progress-container mt-6">
            <div id="progressBar" class="progress-bar"></div>
        </div>
    </div>

    @include('partials.header')

    <main class="pt-5 md:pt-0 mt-18 flex-grow w-full overflow-x-hidden">
        @yield('content')
    </main>

    @include('partials.footer')

    <button id="topUpButton" class="fixed bottom-10 right-5 bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 transition-all transform hover:scale-110 focus:outline-none z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Enhanced Loading System
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById('preloader');
            const progressBar = document.getElementById('progressBar');
            const currentRoute = window.location.pathname;
            
            // Skip preloader for non-home routes
            if (!['/', '/home'].includes(currentRoute)) {
                document.body.classList.add('content-visible');
                preloader.classList.add('hidden');
                return;
            }
            
            // Track loading progress
            let loaded = 0;
            const totalResources = 10; // Adjust based on your typical page resources
            
            // Simulate progressive loading
            const updateProgress = () => {
                loaded++;
                const progress = Math.min((loaded / totalResources) * 100, 100);
                progressBar.style.width = `${progress}%`;
                
                // Show content at 50% progress
                if (progress >= 50 && !document.body.classList.contains('content-visible')) {
                    document.body.classList.add('content-visible');
                }
                
                // Complete at 100%
                if (progress >= 100) {
                    setTimeout(() => {
                        preloader.style.opacity = '0';
                        setTimeout(() => {
                            preloader.classList.add('hidden');
                        }, 500);
                    }, 300);
                }
            };
            
            // Simulate resource loading (replace with actual load events if possible)
            const resources = [
                { type: 'image', src: "{{ url('img/logo-dr.png') }}" },
                { type: 'stylesheet', src: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" },
                { type: 'script', src: "{{ mix('resources/js/app.js') }}" }
            ];
            
            resources.forEach(resource => {
                const el = document.createElement(resource.type === 'image' ? 'img' : 'link');
                if (resource.type === 'image') {
                    el.src = resource.src;
                    el.onload = updateProgress;
                    el.onerror = updateProgress;
                } else {
                    el.href = resource.src;
                    el.rel = resource.type === 'stylesheet' ? 'stylesheet' : 'preload';
                    el.onload = updateProgress;
                }
                document.head.appendChild(el);
            });
            
            // Fallback in case loading stalls
            setTimeout(() => {
                progressBar.style.width = '100%';
                document.body.classList.add('content-visible');
                preloader.style.opacity = '0';
                setTimeout(() => preloader.classList.add('hidden'), 500);
            }, 4000);
            
            // Mark DOM loaded
            updateProgress();
        });
        
        // Scroll to Top Button
        document.getElementById('topUpButton').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    
    @vite(['resources/js/app.js'])
</body>
</html>