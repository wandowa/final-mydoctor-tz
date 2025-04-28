<!-- Enhanced Footer Section -->
<footer class="bg-gradient-to-r from-green-800 to-blue-500 py-10 text-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start gap-8">
            <!-- Hospital Info -->
            <div class="md:max-w-xs">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <img src="{{ url('img/logo-dr.png') }}" alt="AFYA KWANZA Logo" class="w-full max-w-[140px]">
                </a>
                <p class="text-sm opacity-90 mb-4">
                    MY DOCTOR stands as a beacon of change in Tanzanian healthcare, dedicated to reshaping how individuals access and receive care. 
                </p>
                
                <!-- Social Media Icons -->
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-blue-800 transition-transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-blue-900 transition-transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-red-800 transition-transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.196-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-blue-800 transition-transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Links Columns -->
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <h3 class="font-bold text-lg mb-4">Quick Links</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-300 transition">Home</a></li>
                        <li><a href="{{ route('about-us') }}" class="hover:text-blue-300 transition">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-blue-300 transition">Services</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-blue-300 transition">Blog</a></li>
                        <li><a href="{{ route('contact-us') }}" class="hover:text-blue-300 transition">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Contact</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mt-1 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Dar es Salaam
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mt-1 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +255 759 042 291
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mt-1 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            mydoctor.tz@gmail.com
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-12 pt-6 border-t border-white/20 text-center text-sm opacity-80">
            <p>&copy; 2025 MY DOCTOR TZ. All rights reserved. <a href="#" class="hover:text-blue-300 transition">Privacy Policy</a> | <a href="#" class="hover:text-blue-300 transition">Terms of Service</a></p>
        </div>
    </div>
</footer>