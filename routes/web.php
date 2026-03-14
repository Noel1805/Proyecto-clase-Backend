<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', HomeController::class);

// Rutas de productos
Route::prefix('/product')->controller(ProductController::class)->group(function() {
    Route::get('/', 'index')->name('produc.index');
    Route::get('/create', 'create')->name('product.create'); // Te agregué el name por buenas prácticas
    Route::post('/store', 'store')->name('product.store');
    
    // --- SOLUCIÓN: Las rutas de edición van aquí adentro ---
    Route::get('/{product}/edit', 'edit')->name('product.edit');
    Route::put('/{product}', 'update')->name('product.update');

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

// Rutas de categorías
Route::resource('category', CategoryController::class)
    ->except(['show']);