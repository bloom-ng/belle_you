<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\UiSettingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StoreSettingController;
use App\Http\Controllers\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('addresses', AddressController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('carousels', CarouselController::class);
        Route::resource('carts', CartController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('contents', ContentController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('order-items', OrderItemController::class);
        Route::resource('products', ProductController::class);
        Route::resource('product-categories', ProductCategoryController::class);
        Route::resource('reviews', ReviewController::class);
        Route::resource('store-settings', StoreSettingController::class);
        Route::resource('ui-settings', UiSettingController::class);
        Route::resource('users', UserController::class);
    });
