@extends('layouts.app')

@section('title', 'Health Blog')

@section('content')
    <div class="container mx-auto flex flex-wrap py-6 pt-24 md:pt-28"> <!-- Adjusted padding-top -->
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col px-3 mt-8 gap-6">
            <!-- Search Bar -->
            <div class="w-full mb-6">
                <form action="{{ route('blog.index') }}" method="GET" class="flex items-center">
                    <input name="search" 
                           value="{{ request('search') }}" 
                           class="w-full p-3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-green-700 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600" 
                           type="text" 
                           placeholder="Search blogs..." 
                           aria-label="Search">
                    <button type="submit" 
                            class="p-3 bg-green-400 text-white rounded-r-md hover:bg-blue-400 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Posts -->
            @forelse($posts as $post)
                <article class="flex flex-col md:flex-row shadow-lg rounded-lg overflow-hidden bg-white dark:bg-gray-900 transition hover:shadow-xl">
                    <a href="{{ route('blog.show', $post->slug) }}" class="md:w-1/3">
                        <img src="{{ $post->image ? url('storage/' . $post->image) : url('img/mama.jpg') }}" 
                             alt="{{ $post->title }}" 
                             class="w-full h-48 md:h-full object-cover">
                    </a>
                    <div class="flex flex-col justify-between p-6 md:w-2/3">
                        <div>
                            <a href="#" class="text-green-700 text-sm font-bold uppercase pb-2">{{ ucwords(str_replace('-', ' ', $post->category)) }}</a>
                            <a href="{{ route('blog.show', $post->slug) }}" 
                               class="text-2xl font-bold hover:text-gray-700 pb-3 dark:text-white dark:hover:text-gray-200">{{ $post->title }}</a>
                            <p class="text-sm pb-3 text-gray-600 dark:text-gray-300">
                                By <span class="font-semibold">{{ $post->author }}</span>, Published on {{ $post->published_at->format('F d, Y') }}
                            </p>
                            <p class="pb-4 text-gray-700 dark:text-gray-300">{!! Str::limit(strip_tags($post->introduction), 150) !!}</p>
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}" 
                           class="uppercase text-green-700 font-semibold hover:text-green-800 transition dark:text-green-500 dark:hover:text-green-400">
                            Continue Reading <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="text-center py-8 text-gray-600 dark:text-gray-400">
                    <p>No results found.</p>
                </div>
            @endforelse

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="flex justify-center items-center py-8">
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            @endif
        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col px-3 mt-8">
            <div class="w-full bg-white shadow-lg rounded-lg p-6 dark:bg-gray-900">
                <p class="text-xl font-semibold pb-5 text-gray-800 dark:text-white">All Categories</p>
                <a href="{{ route('blog.index', ['category' => 'health-topics']) }}" 
                   class="block text-gray-700 hover:text-green-700 pb-2 dark:text-gray-300 dark:hover:text-green-800 transition">Health Topics</a>
                <a href="{{ route('blog.index', ['category' => 'health-news']) }}" 
                   class="block text-gray-700 hover:text-green-700 pb-2 dark:text-gray-300 dark:hover:text-green-800 transition">Health News</a>
            </div>
        </aside>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
@endsection