@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ url('img/booking.jpg') }}" alt="Hospital Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/70"></div>
        </div>
        <div class="container mx-auto px-4 z-10 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 text-white leading-tight">
                Welcome to <span class="text-blue-400">MY DOCTOR</span>
            </h1>
            <p class="text-lg md:text-xl lg:text-2xl font-bold mb-10 text-green-400 max-w-2xl mx-auto">
                Your Health Your Pride
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('booking') }}" class="btn-secondary px-8 py-3 bg-transparent border-2 hover:bg-green-400 text-black font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Book Partnership
                </a>
                <a href="{{ route('services') }}" class="btn-secondary px-8 py-3 bg-transparent border-2 border-white hover:bg-white/10 text-white font-semibold rounded-lg transition-all duration-300">
                    Our Services
                </a>
            </div>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Health News -->
    <div class="bg-gray-100 dark:bg-gray-700 py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Health <span class="text-blue-400">News</span></h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Stay updated with the latest in health news.
            </p>
        </div>
    </div>
    <section class="pt-[20px] pb-[7px]">
        <div class="container mx-auto px-4">
            <div class="-mx-4 flex flex-wrap justify-center">
                @foreach(\App\Models\BlogPost::where('category', 'health-news')->whereNotNull('published_at')->latest('published_at')->take(3)->get() as $news)
                    <div class="w-full px-4 md:w-2/3 lg:w-1/2 xl:w-1/3 mb-8">
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-50 dark:hover:bg-gray-800">
                            <img src="{{ $news->image ? Storage::url($news->image) : url('img/mama.jpg') }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $news->title }}</h2>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{!! Str::limit(strip_tags($news->introduction), 100) !!}</p>
                                <a href="{{ route('blog.show', $news->slug) }}" class="mt-4 inline-block text-green-800 hover:underline">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Read More Button for Health News -->
            <div class="text-center mt-3">
                <a href="{{ route('blog.index', ['category' => 'health-news']) }}" 
                   class="inline-block px-6 py-2 bg-green-400 text-black font-semibold rounded-lg hover:bg-blue-400 transition duration-300 shadow-md">
                    Read More Health News
                </a>
            </div>
        </div>
    </section>

    <!-- Health Topics -->
    <div class="bg-gray-100 dark:bg-gray-700 py-6">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Health <span class="text-blue-400">Topics</span></h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Explore key health topics for your well-being.
            </p>
        </div>
    </div>
    <section class="pt-[20px] pb-[20px]">
        <div class="container mx-auto px-4">
            <div class="-mx-4 flex flex-wrap justify-center">
                @foreach(\App\Models\BlogPost::where('category', 'health-topics')->whereNotNull('published_at')->latest('published_at')->take(3)->get() as $topic)
                    <div class="w-full px-4 md:w-2/3 lg:w-1/2 xl:w-1/3 mb-8">
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-50 dark:hover:bg-gray-800">
                            <img src="{{ $topic->image ? Storage::url($topic->image) : url('img/mama.jpg') }}" alt="{{ $topic->title }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $topic->title }}</h2>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{!! Str::limit(strip_tags($topic->introduction), 100) !!}</p>
                                <a href="{{ route('blog.show', $topic->slug) }}" class="mt-4 inline-block text-green-800 hover:underline">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Read More Button for Health Topics -->
            <div class="text-center mt-3">
                <a href="{{ route('blog.index', ['category' => 'health-topics']) }}" 
                   class="inline-block px-6 py-2 bg-green-400 text-black font-semibold rounded-lg hover:bg-blue-400 transition duration-300 shadow-md">
                    Read More Health Topics
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Videos -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="text mb-3">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Project <span class="text-blue-400">Videos</span></h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Stay informed with our latest health education videos.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach(\App\Models\Video::latest()->take(3)->get() as $video)
                    <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:scale-105">
                        <div class="relative" style="padding-top: 56.25%;">
                            <iframe class="absolute top-0 left-0 w-full h-full" src="{{ $video->url }}" title="{{ $video->title }}"
                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $video->title }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ $video->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Read More Button for Health Topics -->
            <div class="text-center mt-6">
                <a href="http://www.youtube.com/@mydoctor.tz20" target="_blank" 
                   class="inline-block px-6 py-2 bg-green-400 text-black font-semibold rounded-lg hover:bg-red-600 transition duration-300 shadow-md">
                    Watch More on Youtube
                </a>
            </div>
        </div>
    </section>

    <!-- Achievements -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text mb-4">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Our <span class="text-blue-400">Achievements</span></h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    We take pride in our numbers, reflecting our dedication and success.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @php $achievement = \App\Models\Achievement::first(); @endphp
                <div class="text-center">
                    <i class="fas fa-user-graduate text-3xl text-green-400 mb-2"></i>
                    <h3 class="text-4xl font-bold text-black counter" data-target="{{ $achievement->trainees ?? 0 }}">0</h3>
                    <p class="mt-2 text-lg font-medium text-gray-700">Trainees</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-users text-3xl text-green-400 mb-2"></i>
                    <h3 class="text-4xl font-bold text-black counter" data-target="{{ $achievement->clients ?? 0 }}">0</h3>
                    <p class="mt-2 text-lg font-medium text-gray-700">Clients</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-briefcase text-3xl text-green-400 mb-2"></i>
                    <h3 class="text-4xl font-bold text-black counter" data-target="{{ $achievement->projects ?? 0 }}">0</h3>
                    <p class="mt-2 text-lg font-medium text-gray-700">Projects</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-trophy text-3xl text-green-400 mb-2"></i>
                    <h3 class="text-4xl font-bold text-black counter" data-target="{{ $achievement->awards ?? 0 }}">0</h3>
                    <p class="mt-2 text-lg font-medium text-gray-700">Awards</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 mb-0.5">
            <div class="text mb-0.5">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Our <span class="text-blue-400">Partners</span></h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    We collaborate with industry leaders to deliver exceptional value.
                </p>
            </div>
            <div class="overflow-hidden relative">
                <div class="flex animate-infinite-slide whitespace-nowrap">
                    <div class="flex space-x-20">
                        @foreach(\App\Models\Partner::all() as $partner)
                            <a href="#" target="_blank" class="flex-shrink-0 mx-4">
                                <img src="{{ Storage::url($partner->image) }}" alt="Partner" class="h-20 w-auto filter grayscale hover:grayscale-0 transition duration-300">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection