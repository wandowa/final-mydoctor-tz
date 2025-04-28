@extends('layouts.app')

@section('title', 'Post - Health News')

@section('content')
    <div class="container mx-auto flex flex-wrap py-6 pt-24 md:pt-28">
        <section class="w-full md:w-2/3 flex flex-col items-center px-3 mt-8">
            <article class="flex flex-col shadow my-4 bg-white dark:bg-gray-900">
                <a href="#">
                    <img src="{{ $post->image ? url('storage/' . $post->image) : url('img/mama.jpg') }}" alt="{{ $post->title }}" class="w-full h-100 object-cover">
                </a>
                <div class="flex flex-col justify-start p-6">
                    <a href="#" class="text-green-700 text-sm font-bold uppercase pb-4">{{ ucwords(str_replace('-', ' ', $post->category)) }}</a>
                    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4 dark:text-white">{{ $post->title }}</h1>
                    <p class="text-sm pb-8 text-gray-600 dark:text-gray-300">
                        By <a href="#" class="font-semibold hover:text-gray-800 dark:hover:text-gray-200">{{ $post->author }}</a>, Published on {{ $post->published_at->format('F d, Y') }}
                    </p>
                    
                    <h2 class="text-2xl font-bold pb-3">Introduction</h2>
                    <div class="pb-3 text-gray-700 dark:text-gray-300">{!! $post->introduction !!}</div>
                    
                    <h2 class="text-2xl font-bold pb-3">Main Content</h2>
                    <div class="pb-3 text-gray-700 dark:text-gray-300">{!! $post->body_content !!}</div>
                    @if($post->image2)
                        <img src="{{ url('storage/' . $post->image2) }}" alt="Image 2" class="w-full h-auto pb-3">
                    @endif
                    <div class="pb-3 text-gray-700 dark:text-gray-300">{!! $post->another_content !!}</div>
                    @if($post->image3)
                        <img src="{{ url('storage/' . $post->image3) }}" alt="Image 3" class="w-full h-auto pb-3">
                    @endif
                    
                    <h2 class="text-2xl font-bold pb-3">Conclusion</h2>
                    <div class="pb-6 text-gray-700 dark:text-gray-300">{!! $post->conclusion !!}</div>

                    <!-- Pagination Links -->
                    <div class="flex justify-between items-center mt-6">
                        @if($previous)
                            <a href="{{ route('blog.show', $previous->slug) }}" 
                               class="flex items-center text-green-700 hover:text-green-800 font-semibold dark:text-green-500 dark:hover:text-green-400">
                                <i class="fas fa-arrow-left mr-2"></i> Previous
                            </a>
                        @else
                            <span class="text-gray-400 dark:text-gray-600">Previous</span>
                        @endif

                        @if($next)
                            <a href="{{ route('blog.show', $next->slug) }}" 
                               class="flex items-center text-green-700 hover:text-green-800 font-semibold dark:text-green-500 dark:hover:text-green-400">
                                Next <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        @else
                            <span class="text-gray-400 dark:text-gray-600">Next</span>
                        @endif
                    </div>
                </div>
            </article>
        </section>

        <aside class="w-full md:w-1/3 flex flex-col px-3 mt-8">
            <div class="w-full px-3 mb-4">
                <form action="{{ route('blog.index') }}" method="GET" class="flex items-center">
                    <input name="search" 
                           value="{{ request('search') }}" 
                           class="w-full p-3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-green-700 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600" 
                           type="text" 
                           placeholder="Search blogs..." 
                           aria-label="Search">
                    <button type="submit" 
                            class="p-3 bg-green-700 text-white rounded-r-md hover:bg-green-600 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="w-full bg-white shadow flex flex-col my-4 p-6 dark:bg-gray-900">
                <p class="text-xl font-semibold pb-5 text-gray-800 dark:text-white">All Categories</p>
                <a href="{{ route('blog.index', ['category' => 'health-topics']) }}" 
                   class="block text-gray-700 hover:text-green-700 pb-2 dark:text-gray-300 dark:hover:text-green-500 transition">Health Topics</a>
                <a href="{{ route('blog.index', ['category' => 'health-news']) }}" 
                   class="block text-gray-700 hover:text-green-700 pb-2 dark:text-gray-300 dark:hover:text-green-500 transition">Health News</a>
            </div>
        </aside>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
@endsection