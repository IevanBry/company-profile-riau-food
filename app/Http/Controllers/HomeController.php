<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeContent;
use App\Models\ProductCategory;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Get home content
        $content = HomeContent::first();

        // Get featured categories (max 4 for homepage)
        $featuredCategories = ProductCategory::where('is_active', true)
            ->where('featured', true)
            ->orderBy('order')
            ->take(4)
            ->withCount('products')
            ->get();

        // Get some featured products (optional - for product showcase)
        $featuredProducts = Product::where('is_active', true)
            ->with('category')
            ->orderBy('order')
            ->take(8)
            ->get();

        return view('home', compact('content', 'featuredCategories', 'featuredProducts'));
    }

    public function products()
    {
        // Get all active categories with their products
        $categories = ProductCategory::where('is_active', true)
            ->orderBy('order')
            ->with([
                'products' => function ($query) {
                    $query->where('is_active', true)->orderBy('order');
                }
            ])
            ->get();

        return view('products', compact('categories'));
    }
}