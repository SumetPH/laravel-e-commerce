<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.cart.index')->with('carts', $carts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->title = $request->title;
        $cart->image = $request->image;
        $cart->price = $request->price;
        $cart->quantity = $request->quantity;
        $cart->total = $request->quantity * $request->price;
        if ($cart->save()) {
            return redirect(route('cart.index'))->with('success', 'Added');
        } else {
            return redirect(route('cart.index'))->with('failure', 'Error');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if ($cart->delete()) {
            return redirect()->back()->with('success', 'Removed');
        } else {
            return redirect()->back()->with('failure', 'Error');
        }
    }
}
