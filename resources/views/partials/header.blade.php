<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md transition-all duration-300">
    <div class="bg-gray-100 py-2 border-b border-gray-200">
        <div class="flex flex-wrap justify-between items-center text-sm text-gray-700 px-4 sm:px-8">
            <div class="flex items-center space-x-4 w-full sm:w-auto">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    +255 759 042 291
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    mydoctor.tz@gmail.com
                </span>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-between py-4 px-4 sm:px-8 w-full">
        <div class="w-1/2 md:w-auto flex-shrink-0">
            <a href="{{ route('home') }}" class="font-bold text-2xl flex items-center">
                <img src="{{ url('img/logo-dr.png') }}" alt="Logo" class="h-15 w-40 object-cover mr-2">
            </a>
        </div>
        <button id="menu-toggle-btn" class="md:hidden cursor-pointer focus:outline-none">
            <svg class="fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
        <div id="menu" class="hidden w-full absolute top-[84px] left-0 bg-white shadow-lg py-4 px-4 md:flex md:static md:bg-transparent md:shadow-none md:p-0">
            <nav class="w-full flex items-center justify-between">
                <div class="flex-1 flex justify-center">
                    <ul class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8">
                        <li><a href="{{ route('home') }}" class="block py-2 text-gray-700 font-medium hover:text-green-800 transition duration-300 text-center">Home</a></li>
                        <li><a href="{{ route('about-us') }}" class="block py-2 text-gray-700 font-medium hover:text-green-800 transition duration-300 text-center">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="block py-2 text-gray-700 font-medium hover:text-green-800 transition duration-300 text-center">Services</a></li>
                        <li><a href="{{ route('blog.index') }}" class="block py-2 text-gray-700 font-medium hover:text-green-800 transition duration-300 text-center">Blog</a></li>
                        <li><a href="{{ route('contact-us') }}" class="block py-2 text-gray-700 font-medium hover:text-green-800 transition duration-300 text-center">Contact Us</a></li>
                    </ul>
                </div>
                <div class="flex-shrink-0 mt-4 md:mt-0 md:mr-8">
                    <a href="{{ route('booking') }}" class="block px-6 py-2 bg-green-400 text-black rounded-full hover:bg-blue-400 transition duration-300 shadow-md text-center">Book Partnership</a>
                </div>
            </nav>
            <button id="menu-close-btn" class="md:hidden mt-4 w-full py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition duration-300">Close Menu</button>
        </div>
    </div>
</header>