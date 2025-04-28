<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::whereNotNull('published_at')->latest('published_at');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('introduction', 'like', "%{$search}%")
                  ->orWhere('body_content', 'like', "%{$search}%");
            });
        }

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        $posts = $query->paginate(4);
        return view('blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();

        // Get previous and next posts in the same category
        $previous = BlogPost::where('category', $post->category)
            ->where('published_at', '<', $post->published_at)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->first();

        $next = BlogPost::where('category', $post->category)
            ->where('published_at', '>', $post->published_at)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'asc')
            ->first();

        $view = $post->category === 'health-topics' ? 'health-topics' : 'health-news';
        return view($view, compact('post', 'previous', 'next'));
    }
}