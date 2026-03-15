<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Product $product)
    {
        $existing = Favorite::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($existing) {
            $existing->delete();
        } else {
            Favorite::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
            ]);
        }

        return redirect()->back();
    }
}