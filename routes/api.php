<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\UiSettingController;
use App\Http\Controllers\Api\UserCartsController;
use App\Http\Controllers\Api\UserOrdersController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\StoreSettingController;
use App\Http\Controllers\Api\UserAddressesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('addresses', AddressController::class);

        Route::apiResource('banners', BannerController::class);

        Route::apiResource('carousels', CarouselController::class);

        Route::apiResource('carts', CartController::class);

        Route::apiResource('categories', CategoryController::class);

        Route::apiResource('contents', ContentController::class);

        Route::apiResource('invoices', InvoiceController::class);

        Route::apiResource('orders', OrderController::class);

        Route::apiResource('order-items', OrderItemController::class);

        Route::apiResource('products', ProductController::class);

        Route::apiResource('reviews', ReviewController::class);

        Route::apiResource('store-settings', StoreSettingController::class);

        Route::apiResource('ui-settings', UiSettingController::class);

        Route::apiResource('users', UserController::class);

        // User Carts
        Route::get('/users/{user}/carts', [
            UserCartsController::class,
            'index',
        ])->name('users.carts.index');
        Route::post('/users/{user}/carts', [
            UserCartsController::class,
            'store',
        ])->name('users.carts.store');

        // User Orders
        Route::get('/users/{user}/orders', [
            UserOrdersController::class,
            'index',
        ])->name('users.orders.index');
        Route::post('/users/{user}/orders', [
            UserOrdersController::class,
            'store',
        ])->name('users.orders.store');

        // User Addresses
        Route::get('/users/{user}/addresses', [
            UserAddressesController::class,
            'index',
        ])->name('users.addresses.index');
        Route::post('/users/{user}/addresses', [
            UserAddressesController::class,
            'store',
        ])->name('users.addresses.store');

        Route::apiResource('quotes', QuoteController::class);
    });
