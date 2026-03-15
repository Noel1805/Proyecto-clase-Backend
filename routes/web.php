<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

// ── Página principal ──────────────────────────────────────────
Route::get('/', HomeController::class);

// ── Productos ─────────────────────────────────────────────────
Route::prefix('/product')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('produc.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/{product}/edit', 'edit')->name('product.edit');
    Route::put('/{product}', 'update')->name('product.update');
    Route::get('/{product}', 'show')->name('product.show');
    Route::delete('/{product}', 'destroy')->name('product.destroy');
});

// ── Categorías ────────────────────────────────────────────────
Route::resource('category', CategoryController::class)->except(['show']);

// ── Carrito ───────────────────────────────────────────────────
Route::prefix('/cart')->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name('cart.index');
    Route::post('/add/{product}', 'add')->name('cart.add');
    Route::put('/update/{itemId}', 'update')->name('cart.update');
    Route::delete('/remove/{itemId}', 'remove')->name('cart.remove');
    Route::delete('/clear', 'clear')->name('cart.clear');
});

// ── Favoritos ─────────────────────────────────────────────────
Route::prefix('/favorites')->controller(FavoriteController::class)->group(function () {
    Route::get('/', 'index')->name('favorites.index');
    Route::post('/toggle/{product}', 'toggle')->name('favorites.toggle');
    Route::delete('/clear', 'clear')->name('favorites.clear');
    Route::post('/add-all-to-cart', 'addAllToCart')->name('favorites.addAllToCart');
});

// ── Admin ─────────────────────────────────────────────────────
Route::prefix('/admin')->group(function () {
    Route::get('/landing', [LandingPageController::class, 'edit'])
        ->name('admin.landing.edit');
    Route::put('/landing', [LandingPageController::class, 'update'])
        ->name('admin.landing.update');
});