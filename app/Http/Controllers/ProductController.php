<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function products()
    {
        $products = Product::all();
        return view('front.products.products', compact("products"));
        
    }
}
