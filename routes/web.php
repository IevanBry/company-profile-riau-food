<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CareerController;

/*
|--------------------------------------------------------------------------
| Public Routes (Frontend)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/company', [CompanyController::class, 'index'])->name('company');

Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::post('/career/apply', [CareerController::class, 'apply'])->name('career.apply');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Guest Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Authenticated Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Home Content Management
    Route::get('/home/edit', [AdminController::class, 'editHome'])->name('home.edit');
    Route::put('/home/update', [AdminController::class, 'updateHome'])->name('home.update');

    // Company Content Management
    Route::get('/company/edit', [AdminController::class, 'editCompany'])->name('company.edit');
    Route::put('/company/update', [AdminController::class, 'updateCompany'])->name('company.update');

    // Product Categories Management
    Route::get('/products/categories', [AdminController::class, 'categories'])->name('products.categories');
    Route::get('/products/categories/create', [AdminController::class, 'createCategory'])->name('products.categories.create');
    Route::post('/products/categories/store', [AdminController::class, 'storeCategory'])->name('products.categories.store');
    Route::get('/products/categories/{id}/edit', [AdminController::class, 'editCategory'])->name('products.categories.edit');
    Route::put('/products/categories/{id}/update', [AdminController::class, 'updateCategory'])->name('products.categories.update');
    Route::delete('/products/categories/{id}/delete', [AdminController::class, 'deleteCategory'])->name('products.categories.delete');

    // Products Management
    Route::get('/products', [AdminController::class, 'products'])->name('products.index');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products/store', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}/update', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}/delete', [AdminController::class, 'deleteProduct'])->name('products.delete');

    // Blog Categories Management
    Route::get('/blog/categories', [AdminController::class, 'blogCategories'])->name('blog.categories');
    Route::get('/blog/categories/create', [AdminController::class, 'createBlogCategory'])->name('blog.categories.create');
    Route::post('/blog/categories/store', [AdminController::class, 'storeBlogCategory'])->name('blog.categories.store');
    Route::get('/blog/categories/{id}/edit', [AdminController::class, 'editBlogCategory'])->name('blog.categories.edit');
    Route::put('/blog/categories/{id}/update', [AdminController::class, 'updateBlogCategory'])->name('blog.categories.update');
    Route::delete('/blog/categories/{id}/delete', [AdminController::class, 'deleteBlogCategory'])->name('blog.categories.delete');

    // Blog Posts Management
    Route::get('/blog/posts', [AdminController::class, 'blogPosts'])->name('blog.posts');
    Route::get('/blog/posts/create', [AdminController::class, 'createBlogPost'])->name('blog.posts.create');
    Route::post('/blog/posts/store', [AdminController::class, 'storeBlogPost'])->name('blog.posts.store');
    Route::get('/blog/posts/{id}/edit', [AdminController::class, 'editBlogPost'])->name('blog.posts.edit');
    Route::put('/blog/posts/{id}/update', [AdminController::class, 'updateBlogPost'])->name('blog.posts.update');
    Route::delete('/blog/posts/{id}/delete', [AdminController::class, 'deleteBlogPost'])->name('blog.posts.delete');

    // Career Management - Jobs
    Route::prefix('career')->name('career.')->group(function () {
        // Jobs Management
        Route::get('/jobs', [AdminController::class, 'jobs'])->name('jobs');
        Route::get('/jobs/create', [AdminController::class, 'createJob'])->name('jobs.create');
        Route::post('/jobs', [AdminController::class, 'storeJob'])->name('jobs.store');
        Route::get('/jobs/{id}/edit', [AdminController::class, 'editJob'])->name('jobs.edit');
        Route::put('/jobs/{id}', [AdminController::class, 'updateJob'])->name('jobs.update');
        Route::delete('/jobs/{id}', [AdminController::class, 'deleteJob'])->name('jobs.delete');

        // Applications Management
        Route::get('/applications', [AdminController::class, 'applications'])->name('applications');
        Route::get('/applications/{id}', [AdminController::class, 'showApplication'])->name('applications.show');
        Route::put('/applications/{id}/status', [AdminController::class, 'updateApplicationStatus'])->name('applications.status');
        Route::delete('/applications/{id}', [AdminController::class, 'deleteApplication'])->name('applications.delete');
        Route::get('/applications/{id}/download-cv', [AdminController::class, 'downloadCV'])->name('applications.download');
    });
});