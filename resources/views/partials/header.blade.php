<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md transition-all duration-300">

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

        if (toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!toggleBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });

            // Close mobile menu on window resize to desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }
    </script>
</header>

