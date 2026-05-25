<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Diagnostic route for checking assets in production
Route::get('/debug-assets', function() {
    $manifestPath = public_path('build/manifest.json');
    $manifestExists = file_exists($manifestPath);
    
    $data = [
        'environment' => app()->environment(),
        'public_path' => public_path(),
        'base_path' => base_path(),
        'manifest_path' => $manifestPath,
        'manifest_exists' => $manifestExists,
        'manifest_readable' => $manifestExists && is_readable($manifestPath),
        'app_url' => config('app.url'),
        'asset_url' => config('app.asset_url'),
    ];
    
    if ($manifestExists) {
        $data['manifest_content'] = json_decode(file_get_contents($manifestPath), true);
        $cssFile = $data['manifest_content']['resources/css/app.css']['file'] ?? null;
        $jsFile = $data['manifest_content']['resources/js/app.js']['file'] ?? null;
        
        if ($cssFile) {
            $cssPath = public_path('build/' . $cssFile);
            $data['css_file'] = $cssFile;
            $data['css_path'] = $cssPath;
            $data['css_exists'] = file_exists($cssPath);
            $data['css_url'] = asset('build/' . $cssFile);
        }
        
        if ($jsFile) {
            $jsPath = public_path('build/' . $jsFile);
            $data['js_file'] = $jsFile;
            $data['js_path'] = $jsPath;
            $data['js_exists'] = file_exists($jsPath);
            $data['js_url'] = asset('build/' . $jsFile);
        }
    }
    
    // Check if build directory exists
    $buildPath = public_path('build');
    $data['build_dir_exists'] = is_dir($buildPath);
    if (is_dir($buildPath)) {
        $data['build_dir_contents'] = array_map(function($file) {
            return basename($file);
        }, glob($buildPath . '/*'));
    }
    
    return response()->json($data, 200, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{project:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::get('/store/{product:slug}', [StoreController::class, 'show'])->name('store.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Newsletter
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Reviews
Route::get('/reviews/submit', [App\Http\Controllers\ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/submit', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

// CV Download
Route::get('/cv/download', [AboutController::class, 'downloadCV'])->name('cv.download');
Route::get('/download/cv', [AboutController::class, 'downloadCV']);

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Projects
    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    
    // Products
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    
    // Services
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    
    // Skills
    Route::resource('skills', App\Http\Controllers\Admin\SkillController::class);
    
    // Experiences
    Route::resource('experiences', App\Http\Controllers\Admin\ExperienceController::class);
    
    // Messages
    Route::resource('messages', App\Http\Controllers\Admin\MessageController::class)->only(['index', 'show', 'destroy']);
    Route::patch('messages/{message}/mark-read', [App\Http\Controllers\Admin\MessageController::class, 'markRead'])->name('messages.mark-read');
    Route::patch('messages/{message}/mark-replied', [App\Http\Controllers\Admin\MessageController::class, 'markReplied'])->name('messages.mark-replied');
    
    // Settings
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class)->only(['index', 'update']);
    Route::post('settings/stats', [App\Http\Controllers\Admin\SettingController::class, 'updateStats'])->name('settings.stats');
    Route::post('settings/about', [App\Http\Controllers\Admin\SettingController::class, 'updateAbout'])->name('settings.about');
    
    // Categories
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

    // Reviews
    Route::get('reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
    Route::patch('reviews/{review}/approve', [App\Http\Controllers\Admin\ReviewController::class, 'approve'])->name('reviews.approve');
    Route::patch('reviews/{review}/reject', [App\Http\Controllers\Admin\ReviewController::class, 'reject'])->name('reviews.reject');
    Route::delete('reviews/{review}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('reviews.destroy');
    
    // Testimonials
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    
    // Newsletters
    Route::get('newsletters', [App\Http\Controllers\Admin\NewsletterController::class, 'index'])->name('newsletters.index');
    Route::delete('newsletters/{newsletter}', [App\Http\Controllers\Admin\NewsletterController::class, 'destroy'])->name('newsletters.destroy');
    Route::get('newsletters/export', [App\Http\Controllers\Admin\NewsletterController::class, 'export'])->name('newsletters.export');
    
    // Orders
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    
    // Transactions
    Route::get('transactions', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{transaction}', [App\Http\Controllers\Admin\TransactionController::class, 'show'])->name('transactions.show');
    
    // Education
    Route::resource('education', App\Http\Controllers\Admin\EducationController::class);
    
    // Files
    Route::resource('files', App\Http\Controllers\Admin\FileController::class);
    
    // Advertisements
    Route::resource('advertisements', App\Http\Controllers\Admin\AdvertisementController::class);
    Route::patch('advertisements/{advertisement}/toggle', [App\Http\Controllers\Admin\AdvertisementController::class, 'toggle'])->name('advertisements.toggle');
    
    // Pricing Tiers
    Route::resource('pricing-tiers', App\Http\Controllers\Admin\PricingTierController::class);
    
    // Hero Offers
    Route::resource('hero-offers', App\Http\Controllers\Admin\HeroOfferController::class);
});

// Profile Routes (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
