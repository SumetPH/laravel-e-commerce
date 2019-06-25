<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('admin-page', 'product');
        $products = Product::all();
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = Storage::putFile('image', $request->file('image'));
        $file = Storage::putFile('file', $request->file('file'));
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->author = $request->author;
        $product->publisher = $request->publisher;
        $product->category = $request->category;
        $product->image = $image;
        $product->file = $file;
        $product->price = $request->price;
        if ($product->save()) {
            return redirect()->route('admin.product.index')->with('success', 'Saved');
        } else {
            return redirect()->route('admin.product.index')->with('failure', 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $data = [
            'product' => $product,
            'categories' => $categories,
        ];
        return view('admin.product.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $image = Storage::putFile('image', $request->file('image'));
            $product->image = $image;
            $product->save();
        }
        if ($request->hasFile('file')) {
            $file = Storage::putFile('file', $request->file('file'));
            $product->file = $file;
            $product->save();
        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->author = $request->author;
        $product->publisher = $request->publisher;
        $product->category = $request->category;
        $product->price = $request->price;
        if ($product->save()) {
            return redirect()->route('admin.product.index')->with('success', 'Updated');
        } else {
            return redirect()->route('admin.product.index')->with('failure', 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->delete()) {
            return redirect()->back()->with('success', 'Deleted');
        } else {
            return redirect()->back()->with('failure', 'Error');
        }
    }
}
