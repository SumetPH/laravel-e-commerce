<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use App\OrderBill;
use App\OrderProduct;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index()
    {
        return view('user/dashboard');
    }

    public function checkout()
    {
        $total = Input::get('total', 0);
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $order_bill = new OrderBill;
        $order_bill->user_id = auth()->user()->id;
        $order_bill->total = $total;
        $order_bill->save();
        foreach ($carts as $cart) {
            $order_product = new OrderProduct;
            $order_product->order_bill_id = $order_bill->id;
            $order_product->product_id = $cart->product_id;
            $order_product->quantity = $cart->quantity;
            $order_product->image = $cart->product->image;
            $order_product->title = $cart->product->title;
            $order_product->price = $cart->product->price;
            if ($order_product->save()) {
                $cart->delete();
            }
        }
        return redirect('/');
    }
}
