<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LandingPageSetting;
use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $settings = LandingPageSetting::getSettings();

        $featuredProducts = $settings->show_featured
            ? Product::where('status', 'active')
                ->latest()
                ->take($settings->featured_count)
                ->get()
            : collect();

        $categories = $settings->show_categories
            ? Category::all()
            : collect();

        return view('welcome', compact('settings', 'featuredProducts', 'categories'));
    }
}