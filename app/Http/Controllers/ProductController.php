<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $productuctlist=Product::paginate(12);

        //$product1 = $productuctlist[0];
        //dd($productuctlist[0]);
        //dd($product1);

        return view("product.index", [
            "milista"=>$productuctlist
        ]);
    }

    public function create(){
        $category = Category::all();
        return view("product.create", [
            "myCategorias" => $category
        ]);
    }

    public function store(Request $request) {

        //Validaciones
        $request->validate([
            "nombre"=>"required|min:5|max:255",
            "description"=>"required",
            "precio"=>"required|numeric",
            "category_id"=>"required",
            "imagen"=>"required",

        ]);

        $newProduct = new Product();
        
        // Asignación de datos
        $newProduct->name = $request->input("nombre");
        $newProduct->description = $request->input("description");
        $newProduct->price = $request->input("precio");
        $newProduct->category_id = $request->input("category_id");

        // SOLUCIÓN: Capturar el status. 
        // Como los checkbox no envían nada si no están marcados, 
        // usamos 'inactive' como valor por defecto.
        $newProduct->status = $request->has('status') ? 'active' : 'inactive';

        // Lógica de la imagen (esto ya te funciona bien)
        if ($request->hasFile("imagen")) {
            $ruta = $request->file("imagen")->store("imagenes", "public");
            $newProduct->image = $ruta;
        } else {
            $newProduct->image = "no hay ruta";
        }

        // Ahora el guardado debería funcionar perfectamente
        $newProduct->save(); 

        return redirect()->route('produc.index')->with('success', 'Producto creado exitosamente');
    }

    public function show(Product $product){
        return view('product.show', [
            'product' => $product,
        ]);
    }

    // --- MÉTODOS AGREGADOS ---

    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.edit', [
            'product'      => $product,
            'myCategorias' => $category,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre'      => 'required|min:5|max:255',
            'description' => 'required',
            'precio'      => 'required|numeric',
            'category_id' => 'required',
        ]);

        $product->name        = $request->nombre;
        $product->description = $request->description;
        $product->price       = $request->precio;
        $product->category_id = $request->category_id;
        $product->status      = $request->has('status') ? 'active' : 'inactive';

        if ($request->hasFile('imagen')) {
            $ruta          = $request->file('imagen')->store('imagenes', 'public');
            $product->image = $ruta;
        }

        $product->save();

        return redirect()->route('produc.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    // -------------------------

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route("produc.index");
    }
    
}