<?php

namespace App\Http\Controllers;

use App\Models\LandingPageSetting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function edit()
    {
        $settings = LandingPageSetting::getSettings();
        return view('admin.landing.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title'    => 'required|min:3|max:255',
            'hero_subtitle' => 'nullable|max:500',
            'cta_text'      => 'required|max:100',
            'featured_count'=> 'required|integer|min:1|max:20',
            'hero_image'    => 'nullable|image|max:2048',
        ]);

        $settings = LandingPageSetting::getSettings();

        $data = $request->only([
            'hero_title', 'hero_subtitle', 'cta_text',
            'featured_count', 'show_categories', 'show_featured',
        ]);

        $data['show_categories'] = $request->has('show_categories');
        $data['show_featured']   = $request->has('show_featured');

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')
                ->store('landing', 'public');
        }

        $settings->update($data);

        return redirect()->route('admin.landing.edit')
            ->with('success', 'Configuración guardada correctamente.');
    }
}