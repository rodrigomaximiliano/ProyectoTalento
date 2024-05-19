<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){
        $producto = Product::find($request->id);
        if(empty($producto))
        return redirect ('/');
    Cart::add(
        $producto->id,
        $producto->name,
        1,
        $producto->price,
        ["image"=>$producto]
    );

    return redirect()->back()->with("success","Item agregado:  ".$producto->name);
    }
}
