@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- About Us Section -->
    <section class="bg-gray-100 dark:bg-gray-800 py-12">
        <div class="container mx-auto px-10">
            <!-- Picture and Intro Text -->
            <div class="flex flex-col md:flex-row items-center md:space-x-8">
                <!-- Picture -->
                <div class="w-full md:w-1/2 mb-1 md:mb-0">
                    <img src="{{ $about ? Storage::url($about->image) : url('img/about-us.jpg') }}" alt="About Us Image" class="w-full rounded-lg shadow-lg object-cover">
                </div>
                <!-- Intro Text -->
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">{{ $about->title ?? 'About MY DOCTOR TZ' }}</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
                        {{ $about->description ?? 'At My Doctor, we are dedicated to providing exceptional healthcare services with compassion and excellence.' }}
                    </p>
                    <a href="{{ route('contact-us') }}" class="inline-block px-6 py-3 bg-green-400 text-black rounded-full font-semibold hover:bg-blue-400 transition duration-300 shadow-md">Contact Us</a>
                </div>
            </div>

            <!-- Our Mission Section -->
            <div class="mt-8">
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white text-center mb-8">{{ $mission->title ?? 'Our Mission' }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Mission Text -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-50 dark:hover:bg-gray-800">
                        <div class="flex items-center mb-4">
                            <svg class="w-8 h-8 text-green-400 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-2h2v2h-2zm1-10c-2.76 0-5 2.24-5 5h2c0-1.66 1.34-3 3-3s3 1.34 3 3h2c0-2.76-2.24-5-5-5z" />
                            </svg>
                            <h3 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $mission->title ?? 'Excellence in Healthcare Delivery' }}</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $mission->description ?? 'At Afya Kwanza, our mission is to deliver exceptional medical care...' }}
                        </p>
                    </div>
                    <!-- Mission Highlights -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-50 dark:hover:bg-gray-800">
                        <ul class="space-y-6 text-gray-600 dark:text-gray-300">
                            @forelse($mission->bullet_points ?? ['Advance patient care...', 'Enhance accessibility...', 'Elevate community health...'] as $point)
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ is_array($point) ? $point['point'] : $point }}</span>
                                </li>
                            @empty
                                <li>No bullet points available.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Our Vision Section -->
            <div class="mt-8">
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white text-center mb-8">{{ $vision->title ?? 'Vision' }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Vision Text -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-50 dark:hover:bg-gray-800">
                        <div class="flex items-center mb-4">
                            <svg class="w-8 h-8 text-green-400 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7 
   
5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                            </svg>
                            <h3 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $vision->title ?? 'A Healthier Tomorrow' }}</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $vision->description ?? 'We envision a future where healthcare transcends boundaries...' }}
                        </p>
                    </div>
                    <!-- Vision Highlights -->
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-green-50 dark:hover:bg-gray-800">
                        <ul class="space-y-6 text-gray-600 dark:text-gray-300">
                            @forelse($vision->bullet_points ?? ['Pioneer advancements...', 'Build a sustainable...', 'Foster a culture...'] as $point)
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ is_array($point) ? $point['point'] : $point }}</span>
                                </li>
                            @empty
                                <li>No bullet points available.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Our Team Section -->
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white text-center mb-8">Our Team</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @forelse($teamMembers as $member)
                        <div class="relative group overflow-hidden rounded-lg shadow-lg">
                            <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-green-400 bg-opacity-0 group-hover:bg-opacity-75 flex items-center justify-center transition-all duration-300">
                                <div class="text-center text-black opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-xl font-semibold">{{ $member->name }}</h3>
                                    <p class="text-sm">{{ $member->position }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600 dark:text-gray-300 text-center col-span-full">No team members available yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection