<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ProductCertificationController;

/*
|--------------------------------------------------------------------------
| QR TEST ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/qr-test', function () {
    return QrCode::format('png')
        ->size(300)
        ->generate('Product Certificate');
});

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/{slug}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/certificate/{certification}', [ProductCertificationController::class, 'show'])
    ->name('certifications.show');

Route::get('/verify/{slug}', [ProductCertificationController::class, 'verify'])
    ->name('products.verify');

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (CLEAN SINGLE SOURCE OF TRUTH)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('banner-debug', function () {
            return 'ok';
        });

        /*
        |-------------------------
        | DASHBOARD
        |-------------------------
        */
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |-------------------------
        | BANNERS (FULL CRUD)
        |-------------------------
        */
        Route::get('banners', [BannerController::class, 'index'])
            ->name('banners.index');

        Route::post('banners', [BannerController::class, 'store'])
            ->name('banners.store');

        Route::get('banners/{banner}/edit', [BannerController::class, 'edit'])
            ->name('banners.edit');

        Route::put('banners/{banner}', [BannerController::class, 'update'])
            ->name('banners.update');

        Route::delete('banners/{banner}', [BannerController::class, 'destroy'])
            ->name('banners.destroy');

        /*
        |-------------------------
        | PRODUCTS
        |-------------------------
        */
        Route::resource('products', AdminProductController::class);

        Route::get('products/{product}/certificate', [ProductCertificationController::class, 'certificate'])
            ->name('products.certificate');

        Route::get('products/{product}/certifications', [ProductCertificationController::class, 'index'])
            ->name('products.certifications');

        Route::post('products/{product}/certifications', [ProductCertificationController::class, 'store'])
            ->name('products.certifications.store');

        Route::delete('certifications/{certification}', [ProductCertificationController::class, 'destroy'])
            ->name('certifications.destroy');

        Route::post('products/{product}/generate-certificate', [ProductCertificationController::class, 'generate'])
            ->name('products.generate-certificate');

        Route::get('products/{product}/preview-certificate', [ProductCertificationController::class, 'preview'])
            ->name('products.preview-certificate');

        Route::delete('products/{product}/delete-certificate', [ProductCertificationController::class, 'delete'])
            ->name('products.delete-certificate');

        /*
        |-------------------------
        | TESTIMONIALS
        |-------------------------
        */
        Route::resource('testimonials', AdminTestimonialController::class);

        /*
        |-------------------------
        | CONTACT MESSAGES
        |-------------------------
        */
        Route::get('messages', [ContactMessageController::class, 'index'])
            ->name('messages.index');

        Route::get('messages/{message}', [ContactMessageController::class, 'show'])
            ->name('messages.show');

        Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])
            ->name('messages.destroy');
    });