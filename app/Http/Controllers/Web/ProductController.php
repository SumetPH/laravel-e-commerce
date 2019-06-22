<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        return view('web.product.show')->with('product', $product);
    }
}
