<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', HomeController::class);

// Rutas de productos
Route::prefix('/product')->controller(ProductController::class)->group(function() {
    Route::get('/', 'index')->name('produc.index');
    Route::get('/create', 'create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/{product}', 'show')->name('product.show');   
    Route::delete('/{product}', 'destroy')->name('product.destroy');
});

// Rutas de administración
Route::prefix('/admin')->group(function () {
    Route::get('/landing', [LandingPageController::class, 'edit'])
        ->name('admin.landing.edit');
    Route::put('/landing', [LandingPageController::class, 'update'])
        ->name('admin.landing.update');
});