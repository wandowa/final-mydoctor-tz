<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY DOCTOR | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ url('img/logo-dr.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 text-gray-900">
    {{-- ...........Including header part------------------ --}}
    @include('partials.header')

    {{-- ---------------------------------------Including Bodypart-------------------------- --}}
    <main class="pt-5 md:pt-0 mt-18">
        @yield('content')
    </main>


    {{-- -----------------------------Including Footer---------------------------- --}}
    @include('partials.footer')
</body>
</html>