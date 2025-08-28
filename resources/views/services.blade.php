@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <!-- Hero Section with Wallpaper and Text -->
    <section class="relative bg-gray-100 dark:bg-gray-800">
        <div class="relative">
            <img src="{{ $serviceHeader ? Storage::url($serviceHeader->background_image) : url('img/services.jpg') }}" 
                 alt="Services Wallpaper" 
                 class="w-full h-[500px] object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute top-1/2 transform -translate-y-1/2 left-4 md:left-16 text-white max-w-lg">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Our <span class="text-green-400">Services</span></h1>
                <p class="text-lg md:text-xl">
                    {{ $serviceHeader->description ?? 'Discover a comprehensive range of healthcare services tailored to meet your needs with excellence and compassion at MY DOCTOR.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Services We Offer -->
    <section class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Our <span class="text-blue-400">Services</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($services as $service)
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-400 dark:hover:bg-gray-800 group">
                    <img src="{{ $service->image ? Storage::url($service->image) : url('img/default-service.jpg') }}" 
                         alt="{{ $service->title }}" 
                         class="w-full h-56 object-cover mb-4 rounded group-hover:opacity-90">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-black">
                        {{ $service->title }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 group-hover:text-black">
                        {{ $service->description }}
                    </p>
                </div>
                
                @empty
                    <!-- Service 1 -->
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-400 dark:hover:bg-gray-800 group">
                        <img src="{{ url('img/default-service.jpg') }}" 
                             alt="Medical Education" 
                             class="w-full h-56 object-cover mb-4 rounded group-hover:opacity-90">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-black">Medical Education</h3>
                        <p class="text-gray-600 dark:text-gray-300 group-hover:text-black">Empowering our community with knowledge through health workshops and training programs.</p>
                    </div>
                    <!-- Service 2 -->
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-400 dark:hover:bg-gray-800 group">
                        <img src="{{ url('img/default-service.jpg') }}" 
                             alt="Emergency Care" 
                             class="w-full h-56 object-cover mb-4 rounded group-hover:opacity-90">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-black">Emergency Care</h3>
                        <p class="text-gray-600 dark:text-gray-300 group-hover:text-black">24/7 emergency services with rapid response and expert medical attention.</p>
                    </div>
                    <!-- Service 3 -->
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-400 dark:hover:bg-gray-800 group">
                        <img src="{{ url('img/default-service.jpg') }}" 
                             alt="Surgical Services" 
                             class="w-full h-56 object-cover mb-4 rounded group-hover:opacity-90">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-black">Surgical Services</h3>
                        <p class="text-gray-600 dark:text-gray-300 group-hover:text-black">Advanced surgical procedures performed by our skilled specialists.</p>
                    </div>
                    <!-- Service 4 -->
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-400 dark:hover:bg-gray-800 group">
                        <img src="{{ url('img/default-service.jpg') }}" 
                             alt="Pediatric Care" 
                             class="w-full h-56 object-cover mb-4 rounded group-hover:opacity-90">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-black">Pediatric Care</h3>
                        <p class="text-gray-600 dark:text-gray-300 group-hover:text-black">Specialized care for children, ensuring their health and well-being.</p>
                    </div>
                    <!-- Service 5 -->
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-400 dark:hover:bg-gray-800 group">
                        <img src="{{ url('img/default-service.jpg') }}" 
                             alt="Diagnostic Imaging" 
                             class="w-full h-56 object-cover mb-4 rounded group-hover:opacity-90">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-black">Diagnostic Imaging</h3>
                        <p class="text-gray-600 dark:text-gray-300 group-hover:text-black">State-of-the-art imaging services including MRI, CT, and X-rays.</p>
                    </div>
                    <!-- Service 6 -->
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-400 dark:hover:bg-gray-800 group">
                        <img src="{{ url('img/default-service.jpg') }}" 
                             alt="Rehabilitation Therapy" 
                             class="w-full h-56 object-cover mb-4 rounded group-hover:opacity-90">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-black">Rehabilitation Therapy</h3>
                        <p class="text-gray-600 dark:text-gray-300 group-hover:text-black">Comprehensive therapy programs to support recovery and mobility.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Our Latest Portfolio -->
    <section class="py-6 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Our <span class="text-blue-400">Portfolio</span></h2>
            <div class="overflow-hidden">
                <div class="flex animate-scroll whitespace-nowrap">
                    @forelse($portfolios as $portfolio)
                        <div class="relative group overflow-hidden rounded-lg shadow-lg flex-shrink-0 w-80 mx-2">
                            <img src="{{ Storage::url($portfolio->image) }}" 
                                 alt="{{ $portfolio->title }}" 
                                 class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-green-400 bg-opacity-0 group-hover:bg-opacity-75 flex items-center justify-center transition-all duration-300">
                                <div class="text-center text-black opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-xl font-semibold">{{ $portfolio->title }}</h3>
                                    <p class="text-sm">{{ $portfolio->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="relative group overflow-hidden rounded-lg shadow-lg flex-shrink-0 w-80 mx-2">
                            <img src="{{ url('img/pic1.jpg') }}" alt="New Hospital Wing" class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-green-400 bg-opacity-0 group-hover:bg-opacity-75 flex items-center justify-center transition-all duration-300">
                                <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-xl font-semibold">New Hospital Wing</h3>
                                    <p class="text-sm">Completed 2025</p>
                                </div>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-lg shadow-lg flex-shrink-0 w-80 mx-2">
                            <img src="{{ url('img/pic2.jpg') }}" alt="Advanced Surgery Unit" class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-green-400 bg-opacity-0 group-hover:bg-opacity-75 flex items-center justify-center transition-all duration-300">
                                <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-xl font-semibold">Advanced Surgery Unit</h3>
                                    <p class="text-sm">Launched 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-lg shadow-lg flex-shrink-0 w-80 mx-2">
                            <img src="{{ url('img/pic3.jpg') }}" alt="Community Health Center" class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-green-400 bg-opacity-0 group-hover:bg-opacity-75 flex items-center justify-center transition-all duration-300">
                                <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-xl font-semibold">Community Health Center</h3>
                                    <p class="text-sm">Opened 2023</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            
            <!-- View All Button -->
            <div class="mt-8 text-center">
                <a href="https://www.instagram.com/mydoctor.tz/" target="_blank" class="inline-block px-8 py-3 bg-green-400 text-black rounded-full font-semibold hover:bg-blue-400 transition duration-300 shadow-md">View All</a>
            </div>
        </div>
    </section>
@endsection