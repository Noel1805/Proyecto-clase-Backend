<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|min:2|max:255|unique:categories,name',
            'description' => 'nullable|max:1000',
        ]);

        Category::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Categoría creada exitosamente.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|min:2|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|max:1000',
        ]);

        $category->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Category $category)
    {
        // Evita eliminar si tiene productos asociados
        if ($category->products()->count() > 0) {
            return redirect()->route('category.index')
                ->with('error', 'No puedes eliminar una categoría que tiene productos.');
        }

        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Categoría eliminada exitosamente.');
    }
}