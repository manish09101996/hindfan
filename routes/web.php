<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// SEO & Search Engine Crawlers
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us (supports /about and legacy /about-us)
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/about-us', [PageController::class, 'about']);

// Services & Products (supports /services and legacy /products)
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/products', [PageController::class, 'services'])->name('products');

// Portfolio (Dynamic Portfolio System)
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/gallery', function () {
    return redirect()->route('portfolio', [], 301);
});

// Brochure
Route::get('/brochure', [PageController::class, 'brochure'])->name('brochure');

// Contact Us (supports /contact and legacy /ask-us)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/ask-us', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    // Portfolio Management
    Route::get('/portfolio', [AdminPortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [AdminPortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio', [AdminPortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{project}/edit', [AdminPortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{project}', [AdminPortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{project}', [AdminPortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::post('/portfolio/{project}/toggle-status', [AdminPortfolioController::class, 'toggleStatus'])->name('portfolio.toggle-status');
    Route::post('/portfolio/{project}/toggle-featured', [AdminPortfolioController::class, 'toggleFeatured'])->name('portfolio.toggle-featured');
    Route::delete('/portfolio/images/{image}', [AdminPortfolioController::class, 'destroyImage'])->name('portfolio.image.destroy');

    // Category Management
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // Customer Inquiries
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

    // Website Settings (Contact & Social Profiles)
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
});
