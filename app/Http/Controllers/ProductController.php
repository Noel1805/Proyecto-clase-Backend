<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $productuctlist=Product::all();

        //$product1 = $productuctlist[0];
        //dd($productuctlist[0]);
        //dd($product1);

        return view("product.index", [
            "milista"=>$productuctlist
        ]);
    }
    public function create(){
        return view("product.create");
    }
    public function show($id){
        return view("product.show");

    }
}
