<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md transition-all duration-300">
    <!-- Top contact bar -->
    <div class="bg-gray-100 py-2 border-b border-gray-200">
        <div class="flex flex-wrap justify-between items-center text-sm text-gray-700 px-4 sm:px-8">
            <div class="flex items-center space-x-4 w-full sm:w-auto">
                <span class="flex items-center text-xs sm:text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    +255 759 042 291
                </span>
                <span class="flex items-center text-xs sm:text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    mydoctor.tz@gmail.com
                </span>
            </div>
        </div>
    </div>

    <!-- Main navbar -->
    <div class="flex items-center justify-between px-4 sm:px-8 py-4">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ url('img/logo-dr.png') }}" alt="Logo" class="h-12 w-auto object-cover">
            </a>
        </div>

        <!-- Navigation Centered -->
        <nav class="hidden md:flex space-x-10 mx-auto text-gray-700 font-medium">
            <a href="{{ route('home') }}" class="hover:text-green-600 transition duration-300">Home</a>
            <a href="{{ route('about-us') }}" class="hover:text-green-600 transition duration-300">About</a>
            <a href="{{ route('services') }}" class="hover:text-green-600 transition duration-300">Services</a>
            <a href="{{ route('blog.index') }}" class="hover:text-green-600 transition duration-300">Blog</a>
            <a href="{{ route('contact-us') }}" class="hover:text-green-600 transition duration-300">Contact</a>
        </nav>

        <!-- Book Button -->
        <div class="hidden md:block">
            <a href="{{ route('booking') }}"
               class="px-6 py-2 rounded-full bg-green-400 text-black hover:bg-blue-400 transition-all duration-300 shadow">
                Book Partnership
            </a>
        </div>

        <!-- Mobile menu toggle -->
        <div class="md:hidden">
            <button id="menu-toggle-btn">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile dropdown menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg px-4 py-4">
        <nav class="flex flex-col space-y-4 text-gray-700 font-medium">
            <a href="{{ route('home') }}" class="hover:text-green-600 transition duration-300">Home</a>
            <a href="{{ route('about-us') }}" class="hover:text-green-600 transition duration-300">About</a>
            <a href="{{ route('services') }}" class="hover:text-green-600 transition duration-300">Services</a>
            <a href="{{ route('blog.index') }}" class="hover:text-green-600 transition duration-300">Blog</a>
            <a href="{{ route('contact-us') }}" class="hover:text-green-600 transition duration-300">Contact</a>
            <a href="{{ route('booking') }}"
               class="mt-4 px-6 py-2 bg-green-400 text-black rounded-full hover:bg-blue-400 transition duration-300 text-center">
                Book Partnership
            </a>
        </nav>
    </div>

    <script>
        const toggleBtn = document.getElementById('menu-toggle-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</header>
