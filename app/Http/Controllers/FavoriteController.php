<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    private function getFavoriteIds(): array
    {
        return Session::get('favorites', []);
    }

    public function index()
    {
        $favoriteIds = $this->getFavoriteIds();

        $favorites = collect();
        foreach ($favoriteIds as $productId) {
            $product = Product::find($productId);
            if ($product) {
                $favorites->push($product);
            }
        }

        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Product $product)
    {
        $favoriteIds = $this->getFavoriteIds();

        if (in_array($product->id, $favoriteIds)) {
            $favoriteIds = array_values(
                array_filter($favoriteIds, fn($id) => $id !== $product->id)
            );
        } else {
            $favoriteIds[] = $product->id;
        }

        Session::put('favorites', $favoriteIds);

        return redirect()->back();
    }

    public function clear()
    {
        Session::forget('favorites');
        return redirect()->route('favorites.index')
            ->with('success', 'Favoritos eliminados.');
    }

    public function addAllToCart()
    {
        $favoriteIds = $this->getFavoriteIds();
        $cart        = session('cart', []);

        foreach ($favoriteIds as $productId) {
            $cart[$productId] = ($cart[$productId] ?? 0) + 1;
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index')
            ->with('success', 'Todos los favoritos fueron agregados al carrito.');
    }
}