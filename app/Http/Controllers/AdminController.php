<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\HomeContent;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Company;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman login admin
     */
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = ['email' => $request->email, 'password' => $request->password];
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user->role !== 'admin') {
                Auth::logout();
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke area admin!')->withInput();
            }

            $request->session()->regenerate();
            return redirect('/admin/dashboard')->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        return redirect()->back()->with('error', 'Email atau password salah!')->withInput();
    }

    /**
     * Dashboard admin
     */
    /**
     * Dashboard admin
     */
    public function dashboard()
    {
        // Statistics - 4 Cards Only
        $stats = [
            'products' => Product::count(),
            'blog_posts' => BlogPost::count(),
            'applications' => JobApplication::count(),
            'visitors' => 0, // Placeholder - bisa integrasikan dengan Google Analytics nanti
        ];

        // Recent Activities
        $recent_activities = [];

        // Recent Products
        $recentProducts = Product::latest()->take(2)->get();
        foreach ($recentProducts as $product) {
            $recent_activities[] = [
                'icon' => 'box',
                'color' => 'blue',
                'title' => 'Produk baru ditambahkan',
                'subtitle' => $product->name,
                'time' => $product->created_at->diffForHumans(),
                'timestamp' => $product->created_at->timestamp,
            ];
        }

        // Recent Blog Posts
        $recentPosts = BlogPost::latest()->take(2)->get();
        foreach ($recentPosts as $post) {
            $recent_activities[] = [
                'icon' => 'blog',
                'color' => 'purple',
                'title' => 'Artikel baru ' . ($post->is_published ? 'dipublikasikan' : 'dibuat'),
                'subtitle' => $post->title,
                'time' => $post->created_at->diffForHumans(),
                'timestamp' => $post->created_at->timestamp,
            ];
        }

        // Recent Applications
        $recentApplications = JobApplication::with('job')->latest()->take(2)->get();
        foreach ($recentApplications as $application) {
            $recent_activities[] = [
                'icon' => 'envelope',
                'color' => 'green',
                'title' => 'Lamaran baru masuk',
                'subtitle' => $application->name . ' - ' . $application->job->title,
                'time' => $application->created_at->diffForHumans(),
                'timestamp' => $application->created_at->timestamp,
            ];
        }

        // Sort by timestamp (newest first)
        usort($recent_activities, function ($a, $b) {
            return $b['timestamp'] - $a['timestamp'];
        });

        // Take only 6 most recent
        $recent_activities = array_slice($recent_activities, 0, 6);

        return view('admin.dashboard', compact('stats', 'recent_activities'));
    }

    /**
     * Edit home content
     */
    public function editHome()
    {
        $content = HomeContent::first();

        if (!$content) {
            $content = HomeContent::create([
                'hero_badge' => '✨ Importir & Distributor Terpercaya',
                'hero_title' => 'Distributor Produk Berkualitas Terpercaya',
                'hero_description' => 'PT. Riau Food Lestari adalah importir dan distributor berbagai produk kebutuhan sehari-hari berkualitas tinggi dari berbagai negara untuk seluruh Indonesia.',
            ]);
        }

        return view('admin.home-edit', compact('content'));
    }

    /**
     * Update home content
     */
    public function updateHome(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hero_badge' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_hero_image' => 'nullable',
            'about_title' => 'required|string|max:255',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_about_image' => 'nullable',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $content = HomeContent::first();
        if (!$content) {
            $content = new HomeContent();
        }

        $data = $request->except(['hero_image', 'about_image', 'remove_hero_image', 'remove_about_image']);

        // Handle Hero Image removal
        if ($request->has('remove_hero_image') && $content->hero_image) {
            if (Storage::disk('public')->exists($content->hero_image)) {
                Storage::disk('public')->delete($content->hero_image);
            }
            $data['hero_image'] = null;
        }

        // Handle Hero Image upload
        if ($request->hasFile('hero_image')) {
            if ($content->hero_image && Storage::disk('public')->exists($content->hero_image)) {
                Storage::disk('public')->delete($content->hero_image);
            }
            $heroImagePath = $request->file('hero_image')->store('home', 'public');
            $data['hero_image'] = $heroImagePath;
        }

        // Handle About Image removal
        if ($request->has('remove_about_image') && $content->about_image) {
            if (Storage::disk('public')->exists($content->about_image)) {
                Storage::disk('public')->delete($content->about_image);
            }
            $data['about_image'] = null;
        }

        // Handle About Image upload
        if ($request->hasFile('about_image')) {
            if ($content->about_image && Storage::disk('public')->exists($content->about_image)) {
                Storage::disk('public')->delete($content->about_image);
            }
            $aboutImagePath = $request->file('about_image')->store('home', 'public');
            $data['about_image'] = $aboutImagePath;
        }

        $content->update($data);

        return redirect()->route('admin.home.edit')->with('success', 'Konten halaman home berhasil diperbarui!');
    }

    // ==================== PRODUCT CATEGORIES ====================

    public function categories()
    {
        $categories = ProductCategory::withCount('products')->orderBy('order')->get();
        return view('admin.products.categories', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.products.category-create');
    }

    public function storeCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['name', 'description', 'featured', 'is_active', 'order']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $data['image'] = $imagePath;
        }

        ProductCategory::create($data);

        return redirect()->route('admin.products.categories')->with('success', 'Kategori produk berhasil ditambahkan!');
    }

    public function editCategory($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('admin.products.category-edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = ProductCategory::findOrFail($id);
        $data = $request->only(['name', 'description', 'featured', 'is_active', 'order']);

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $request->file('image')->store('categories', 'public');
            $data['image'] = $imagePath;
        }

        $category->update($data);

        return redirect()->route('admin.products.categories')->with('success', 'Kategori produk berhasil diperbarui!');
    }

    public function deleteCategory($id)
    {
        $category = ProductCategory::findOrFail($id);

        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.products.categories')->with('success', 'Kategori produk berhasil dihapus!');
    }

    // ==================== PRODUCTS ====================

    public function products()
    {
        $products = Product::with('category')->orderBy('order')->get();
        return view('admin.products.index', compact('products'));
    }

    public function createProduct()
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sizes' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['product_category_id', 'name', 'description', 'sizes', 'order', 'is_active']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        if ($request->sizes) {
            $sizesArray = array_map('trim', explode(',', $request->sizes));
            $data['sizes'] = json_encode($sizesArray);
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::where('is_active', true)->orderBy('name')->get();

        $product->sizes_string = is_string($product->sizes)
            ? implode(', ', json_decode($product->sizes, true) ?? [])
            : '';

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sizes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_image' => 'nullable',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::findOrFail($id);
        $data = $request->only(['product_category_id', 'name', 'description', 'sizes', 'order', 'is_active']);

        if ($request->has('remove_image') && $product->image) {
            if (Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        if ($request->sizes) {
            $sizesArray = array_map('trim', explode(',', $request->sizes));
            $data['sizes'] = json_encode($sizesArray);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }

    // ==================== BLOG CATEGORIES ====================

    public function blogCategories()
    {
        $categories = BlogCategory::withCount('posts')->orderBy('order')->get();
        return view('admin.blog.categories', compact('categories'));
    }

    public function createBlogCategory()
    {
        return view('admin.blog.categories-create');
    }

    public function storeBlogCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:10',
            'color' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        BlogCategory::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'color' => $request->color,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.blog.categories')->with('success', 'Kategori blog berhasil ditambahkan!');
    }

    public function editBlogCategory($id)
    {
        $category = BlogCategory::withCount('posts')->findOrFail($id);
        return view('admin.blog.categories-edit', compact('category'));
    }

    public function updateBlogCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:10',
            'color' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = BlogCategory::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'color' => $request->color,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.blog.categories')->with('success', 'Kategori blog berhasil diperbarui!');
    }

    public function deleteBlogCategory($id)
    {
        $category = BlogCategory::withCount('posts')->findOrFail($id);

        if ($category->posts_count > 0) {
            return redirect()->route('admin.blog.categories')
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki ' . $category->posts_count . ' artikel!');
        }

        $category->delete();

        return redirect()->route('admin.blog.categories')->with('success', 'Kategori blog berhasil dihapus!');
    }

    // ==================== BLOG POSTS ====================
    public function blogPosts()
    {
        $posts = BlogPost::with(['category', 'author'])->orderBy('created_at', 'desc')->get();
        return view('admin.blog.index', compact('posts')); // ✅ Ubah dari 'posts' ke 'index'
    }

    public function createBlogPost()
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();
        return view('admin.blog.post-create', compact('categories'));
    }

    public function storeBlogPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'reading_time' => 'nullable|string|max:50',
            'tags' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'blog_category_id' => $request->input('blog_category_id'),
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
            'reading_time' => $request->input('reading_time'),
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'is_published' => $request->has('is_published') ? 1 : 0,
            'published_at' => $request->has('is_published') ? ($request->input('published_at') ?? now()) : null,
        ];

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $data['featured_image'] = $imagePath;
        }

        if ($request->tags) {
            $tagsArray = array_map('trim', explode(',', $request->tags));
            $data['tags'] = json_encode($tagsArray);
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog.posts')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function editBlogPost($id)
    {
        $post = BlogPost::findOrFail($id);
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();

        if (is_array($post->tags)) {
            $post->tags_string = implode(', ', $post->tags);
        } elseif (is_string($post->tags)) {
            $tagsArray = json_decode($post->tags, true);
            $post->tags_string = is_array($tagsArray) ? implode(', ', $tagsArray) : '';
        } else {
            $post->tags_string = '';
        }

        return view('admin.blog.post-edit', compact('post', 'categories'));
    }

    public function updateBlogPost(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'reading_time' => 'nullable|string|max:50',
            'tags' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = BlogPost::findOrFail($id);

        $data = [
            'blog_category_id' => $request->input('blog_category_id'),
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
            'reading_time' => $request->input('reading_time'),
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'is_published' => $request->has('is_published') ? 1 : 0,
            'published_at' => $request->has('is_published') ? ($request->input('published_at') ?? $post->published_at ?? now()) : null,
        ];

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('blog', 'public');
            $data['featured_image'] = $imagePath;
        }

        if ($request->tags) {
            $tagsArray = array_map('trim', explode(',', $request->tags));
            $data['tags'] = json_encode($tagsArray);
        } else {
            $data['tags'] = null;
        }

        $post->update($data);

        return redirect()->route('admin.blog.posts')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function deleteBlogPost($id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.blog.posts')->with('success', 'Artikel berhasil dihapus!');
    }

    // ==================== JOBS ====================

    public function jobs()
    {
        $jobs = Job::withCount('applications', 'pendingApplications')
            ->ordered()
            ->get();
        return view('admin.career.jobs', compact('jobs'));
    }

    public function createJob()
    {
        return view('admin.career.job-create');
    }

    public function storeJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full_time,part_time,contract,internship',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'skills' => 'nullable|string',
            'salary_range' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only([
            'title',
            'location',
            'type',
            'description',
            'requirements',
            'responsibilities',
            'salary_range',
            'icon',
            'color',
            'order'
        ]);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

        if ($request->skills) {
            $skillsArray = array_map('trim', explode(',', $request->skills));
            $data['skills'] = $skillsArray;
        }

        Job::create($data);

        return redirect()->route('admin.career.jobs')->with('success', 'Lowongan kerja berhasil ditambahkan!');
    }

    public function editJob($id)
    {
        $job = Job::findOrFail($id);

        // Convert skills array to string
        $job->skills_string = is_array($job->skills) ? implode(', ', $job->skills) : '';

        return view('admin.career.job-edit', compact('job'));
    }

    public function updateJob(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full_time,part_time,contract,internship',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'skills' => 'nullable|string',
            'salary_range' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $job = Job::findOrFail($id);

        $data = $request->only([
            'title',
            'location',
            'type',
            'description',
            'requirements',
            'responsibilities',
            'salary_range',
            'icon',
            'color',
            'order'
        ]);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

        if ($request->skills) {
            $skillsArray = array_map('trim', explode(',', $request->skills));
            $data['skills'] = $skillsArray;
        } else {
            $data['skills'] = null;
        }

        $job->update($data);

        return redirect()->route('admin.career.jobs')->with('success', 'Lowongan kerja berhasil diperbarui!');
    }

    public function deleteJob($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.career.jobs')->with('success', 'Lowongan kerja berhasil dihapus!');
    }

    // ==================== APPLICATIONS ====================

    public function applications()
    {
        $applications = JobApplication::with('job')
            ->latest()
            ->paginate(20);

        $stats = [
            'total' => JobApplication::count(),
            'pending' => JobApplication::where('status', 'pending')->count(),
            'reviewed' => JobApplication::where('status', 'reviewed')->count(),
            'shortlisted' => JobApplication::where('status', 'shortlisted')->count(),
        ];

        return view('admin.career.applications', compact('applications', 'stats'));
    }

    public function showApplication($id)
    {
        $application = JobApplication::with('job')->findOrFail($id);
        return view('admin.career.application-detail', compact('application'));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,reviewed,shortlisted,rejected,accepted',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $application = JobApplication::findOrFail($id);
        $application->update([
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->back()->with('success', 'Status lamaran berhasil diperbarui!');
    }

    public function deleteApplication($id)
    {
        $application = JobApplication::findOrFail($id);

        // Delete CV file
        if ($application->cv_file && Storage::disk('public')->exists($application->cv_file)) {
            Storage::disk('public')->delete($application->cv_file);
        }

        $application->delete();

        return redirect()->route('admin.career.applications')->with('success', 'Lamaran berhasil dihapus!');
    }

    public function downloadCV($id)
    {
        $application = JobApplication::findOrFail($id);

        if ($application->cv_file && Storage::disk('public')->exists($application->cv_file)) {
            return Storage::disk('public')->download($application->cv_file, $application->name . '-CV.pdf');
        }

        return redirect()->back()->with('error', 'File CV tidak ditemukan!');
    }

    /**
     * Show edit company page form
     */
    public function editCompany()
    {
        $company = Company::first();

        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update company page content
     */
    public function updateCompany(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description_1' => 'required|string',
            'description_2' => 'required|string',
            'description_3' => 'required|string',
            'years_established' => 'required|string',
            'total_products' => 'required|string',
            'original_guarantee' => 'required|string',
            'vision' => 'required|string',
            'mission_1' => 'required|string',
            'mission_2' => 'required|string',
            'mission_3' => 'required|string',
            'mission_4' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'map_url' => 'nullable|url',
            'operating_hours' => 'required|string',
            'holiday_status' => 'required|string',
        ]);

        $company = Company::firstOrNew([]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($company->image && file_exists(public_path('storage/' . $company->image))) {
                unlink(public_path('storage/' . $company->image));
            }

            $imagePath = $request->file('image')->store('company', 'public');
            $company->image = $imagePath;
        }

        // Update all fields
        $company->description_1 = $request->description_1;
        $company->description_2 = $request->description_2;
        $company->description_3 = $request->description_3;
        $company->years_established = $request->years_established;
        $company->total_products = $request->total_products;
        $company->original_guarantee = $request->original_guarantee;
        $company->vision = $request->vision;
        $company->mission_1 = $request->mission_1;
        $company->mission_2 = $request->mission_2;
        $company->mission_3 = $request->mission_3;
        $company->mission_4 = $request->mission_4;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->map_url = $request->map_url;
        $company->operating_hours = $request->operating_hours;
        $company->holiday_status = $request->holiday_status;

        $company->save();

        return redirect()->route('admin.company.edit')
            ->with('success', 'Konten halaman perusahaan berhasil diperbarui!');
    }

    // ==================== LOGOUT ====================

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Anda telah berhasil logout');
    }
}