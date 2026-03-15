<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Inyecta el contador del carrito en todas las vistas
        View::composer('*', function ($view) {
            $cartCount     = 0;
            $favoritesCount = 0;

            if (Auth::check()) {
                $cartCount = CartItem::where('user_id', Auth::id())
                    ->sum('quantity');

                $favoritesCount = Favorite::where('user_id', Auth::id())
                    ->count();
            } else {
                // Carrito de sesión para invitados
                $sessionCart = session('cart', []);
                $cartCount   = array_sum($sessionCart);
            }

            $view->with([
                'cartCount'      => $cartCount,
                'favoritesCount' => $favoritesCount,
            ]);
        });
    }
}