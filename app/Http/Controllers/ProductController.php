<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return "Listado de productos";
    }
    public function create(){
        return "Crera un producto producto";
    }
    public function show($id, $categoria=null){
        if ($categoria == null){
        return "Producto: " . $id;
        } else{
        return "Producto: " . $id . " Categoria: " . $categoria;
        }
    }
}
