<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredProducts = Product::where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::all();

        return view('welcome', [
            'featuredProducts' => $featuredProducts,
            'categories'       => $categories,
        ]);
    }
}