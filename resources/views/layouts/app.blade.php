<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="MY DOCTOR offers high-quality healthcare services with a focus on patient care. Explore our services, book appointments, and more.">
    <meta name="keywords" content="doctor, mydoctor.tz, healthcare, medical services, appointment, healthcare services, patient care">
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
    <link rel="icon" href="{{ url('img/logo-dr.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add this CSS to your main layout file (layouts/app.blade.php) in the head section -->
</head>

<body class="antialiased bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    @include('partials.header')

    <main class="pt-5 md:pt-0 mt-18 flex-grow w-full overflow-x-hidden">
        @yield('content')
    </main>

    @include('partials.footer')

    <button id="topUpButton" class="fixed bottom-10 right-5 bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 transition-all transform hover:scale-110 focus:outline-none z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Scroll to Top Button
        const topUpButton = document.getElementById('topUpButton');
        topUpButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

</body>

</html>