<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display products page
     */
    public function index()
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

    /**
     * Display single product detail
     */
    public function show($slug)
    {
        // Find category by slug
        $category = ProductCategory::where('slug', $slug)
            ->where('is_active', true)
            ->with([
                'products' => function ($query) {
                    $query->where('is_active', true)->orderBy('order');
                }
            ])
            ->firstOrFail();

        return view('products.show', compact('category'));
    }
}