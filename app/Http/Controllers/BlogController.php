<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts
     */
    public function index()
    {
        // Get all active categories
        $categories = BlogCategory::where('is_active', true)
            ->ordered()
            ->get();

        // Get featured post (latest featured and published)
        $featuredPost = BlogPost::published()
            ->featured()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->first();

        // Get all published posts with pagination
        $posts = BlogPost::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->when($featuredPost, function ($query) use ($featuredPost) {
                // Exclude featured post from main listing
                return $query->where('id', '!=', $featuredPost->id);
            })
            ->paginate(9);

        return view('blog.index', compact('categories', 'featuredPost', 'posts'));
    }

    /**
     * Display posts by category
     */
    public function category($slug)
    {
        // Find category by slug
        $currentCategory = BlogCategory::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Get all active categories for filter
        $categories = BlogCategory::where('is_active', true)
            ->ordered()
            ->get();

        // Get featured post from this category (if any)
        $featuredPost = BlogPost::published()
            ->featured()
            ->where('blog_category_id', $currentCategory->id)
            ->with(['category', 'author'])
            ->latest('published_at')
            ->first();

        // Get posts by category with pagination
        $posts = BlogPost::published()
            ->where('blog_category_id', $currentCategory->id)
            ->with(['category', 'author'])
            ->latest('published_at')
            ->when($featuredPost, function ($query) use ($featuredPost) {
                return $query->where('id', '!=', $featuredPost->id);
            })
            ->paginate(9);

        return view('blog.index', compact('categories', 'featuredPost', 'posts', 'currentCategory'));
    }

    /**
     * Display a single blog post
     */
    public function show($slug)
    {
        // Find post by slug
        $post = BlogPost::published()
            ->with(['category', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment views count
        $post->incrementViews();

        // Get related posts (same category, excluding current post)
        $relatedPosts = BlogPost::published()
            ->where('blog_category_id', $post->blog_category_id)
            ->where('id', '!=', $post->id)
            ->with(['category', 'author'])
            ->latest('published_at')
            ->limit(3)
            ->get();

        // If not enough related posts from same category, get from other categories
        if ($relatedPosts->count() < 3) {
            $additionalPosts = BlogPost::published()
                ->where('id', '!=', $post->id)
                ->whereNotIn('id', $relatedPosts->pluck('id'))
                ->with(['category', 'author'])
                ->latest('published_at')
                ->limit(3 - $relatedPosts->count())
                ->get();

            $relatedPosts = $relatedPosts->merge($additionalPosts);
        }

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    /**
     * Search blog posts
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Get all active categories
        $categories = BlogCategory::where('is_active', true)
            ->ordered()
            ->get();

        $featuredPost = null;

        // Search posts
        $posts = BlogPost::published()
            ->with(['category', 'author'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('excerpt', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            })
            ->latest('published_at')
            ->paginate(9);

        return view('blog.index', compact('categories', 'featuredPost', 'posts', 'query'));
    }
}