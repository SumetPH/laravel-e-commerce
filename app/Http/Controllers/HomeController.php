<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home')->with('products', $products);
    }
}
