@extends('layouts.app')

@section('title', 'Booking & Donations')

@section('content')
    <!-- Hero Section with Wallpaper and Donation Form -->
    <section class="relative bg-gray-100 dark:bg-gray-800 py-10 sm:py-12 md:pt-24 lg:pt-28">
        <div class="absolute inset-0">
            <img src="{{ url('img/booking.jpg') }}" alt="Hospital Wallpaper" class="w-full h-full object-cover opacity-40">
        </div>
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 z-10">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-6 text-center">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 text-red-800 p-4 rounded mb-6 text-center">{{ session('error') }}</div>
            @endif
            <div class="flex justify-center">
                <div class="w-full max-w-md sm:max-w-lg bg-white dark:bg-gray-900 rounded-xl shadow-xl p-6 sm:p-8 transform transition-all duration-300">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-white mb-2 text-center">Make a Partnership</h2>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 mb-6 sm:mb-8 text-center">Support our health projects initiatives with your donation.</p>
                    <form action="{{ route('booking.process') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Project Selection -->
                        <div>
                            <label for="project_id" class="block text-sm font-medium text-gray-700 dark:text-green-400 mb-2">Choose a Project</label>
                            <select name="project_id" id="project_id" class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Donation Options -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Select Donation Amount</label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <label class="relative bg-gray-100 dark:bg-gray-700 p-4 rounded-md cursor-pointer hover:bg-green-50 dark:hover:bg-green-400 transition duration-300 border border-gray-300 dark:border-gray-600">
                                    <input type="radio" name="amount" value="50" class="absolute opacity-0 peer" required>
                                    <div class="text-center">
                                        <span class="text-lg font-semibold text-gray-800 dark:text-white peer-checked:text-green-800">$50</span>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Basic Support</p>
                                    </div>
                                </label>
                                <label class="relative bg-gray-100 dark:bg-gray-700 p-4 rounded-md cursor-pointer hover:bg-green-50 dark:hover:bg-green-800 transition duration-300 border border-gray-300 dark:border-gray-600">
                                    <input type="radio" name="amount" value="100" class="absolute opacity-0 peer" required>
                                    <div class="text-center">
                                        <span class="text-lg font-semibold text-gray-800 dark:text-white peer-checked:text-green-800">$100</span>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Community Impact</p>
                                    </div>
                                </label>
                                <label class="relative bg-gray-100 dark:bg-gray-700 p-4 rounded-md cursor-pointer hover:bg-green-50 dark:hover:bg-green-400 transition duration-300 border border-gray-300 dark:border-gray-600">
                                    <input type="radio" name="amount" value="200" class="absolute opacity-0 peer" required>
                                    <div class="text-center">
                                        <span class="text-lg font-semibold text-gray-800 dark:text-white peer-checked:text-green-800">$200</span>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Major Contribution</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <!-- Custom Amount -->
                        <div>
                            <label for="custom-amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Or Enter Custom Amount</label>
                            <div class="flex items-center border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-green-500 focus-within:border-transparent">
                                <select name="currency" class="p-3 bg-transparent dark:bg-gray-800 dark:text-gray-300 border-r border-gray-300 dark:border-gray-600 rounded-l-md focus:outline-none">
                                    <option value="USD">USD</option>
                                    <option value="TSH">TSH</option>
                                </select>
                                <input type="number" id="custom-amount" name="amount" min="1" step="0.01" class="w-full p-3 bg-transparent dark:bg-gray-800 dark:text-white focus:outline-none rounded-r-md" placeholder="Enter amount">
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full px-6 py-3 bg-green-400 text-black rounded-md font-semibold hover:bg-blue-400 transition duration-300 shadow-md flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Donate Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Partnership with Us Section -->
    <section class="py-12 sm:py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 dark:text-white text-center mb-8 sm:mb-12">Why Partnership with Us?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach(\App\Models\PartnershipBenefit::all() as $benefit)
                    <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white mb-2">{{ $benefit->title }}</h3>
                        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">{{ $benefit->description }}</p>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8 sm:mt-12">
                <a href="#donate" class="inline-block px-6 sm:px-8 py-3 bg-green-400 text-black rounded-md font-semibold hover:bg-blue-400 transition duration-300 shadow-md text-sm sm:text-base">Learn More & Partner</a>
            </div>
        </div>
    </section>

    <!-- Dynamic Project Sections -->
    @foreach($projects as $index => $project)
        <section class="py-12 sm:py-16 {{ $index % 2 == 0 ? 'bg-gray-100 dark:bg-gray-800' : 'bg-white dark:bg-gray-900' }}">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-10 items-center">
                    @if($index % 2 == 0)
                        <!-- Left Image -->
                        <div class="max-w-full sm:max-w-md mx-auto md:mx-0 rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ $project->image ? Storage::url($project->image) : url('img/project' . ($index + 1) . '.jpg') }}" alt="{{ $project->title }}" class="w-full h-64 sm:h-80 object-cover">
                        </div>
                        <!-- Right Text and Button -->
                        <div class="text-center md:text-left mt-6 md:mt-0">
                            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-white mb-4">{{ $project->title }}</h3>
                            <div class="text-sm sm:text-base text-gray-600 dark:text-gray-300 mb-6">{!! $project->description !!}</div>
                            <form action="{{ route('booking.process') }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <input type="hidden" name="amount" value="100">
                                <input type="hidden" name="currency" value="USD">
                                <button type="submit" class="px-6 py-3 bg-green-400 text-black rounded-md font-semibold hover:bg-blue-400 transition duration-300 shadow-md text-sm sm:text-base">Donate Now</button>
                            </form>
                        </div>
                    @else
                        <!-- Left Text and Button -->
                        <div class="text-center md:text-left mt-6 md:mt-0">
                            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-white mb-4">{{ $project->title }}</h3>
                            <div class="text-sm sm:text-base text-gray-600 dark:text-gray-300 mb-6">{!! $project->description !!}</div>
                            <form action="{{ route('booking.process') }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <input type="hidden" name="amount" value="100">
                                <input type="hidden" name="currency" value="USD">
                                <button type="submit" class="px-6 py-3 bg-green-400 text-black rounded-md font-semibold hover:bg-blue-400 transition duration-300 shadow-md text-sm sm:text-base">Donate Now</button>
                            </form>
                        </div>
                        <!-- Right Image -->
                        <div class="max-w-full sm:max-w-md mx-auto md:mx-0 rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ $project->image ? Storage::url($project->image) : url('img/project' . ($index + 1) . '.jpg') }}" alt="{{ $project->title }}" class="w-full h-64 sm:h-80 object-cover">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endforeach
@endsection
