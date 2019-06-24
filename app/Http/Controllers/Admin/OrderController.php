<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OrderBill;
use App\PurchaseBill;
use App\PurchaseProduct;

class OrderController extends Controller
{
    public function payment_not_completed()
    {
        session()->put('admin-page', 'order');
        $orders = OrderBill::where('payment_completed', 0)->get();
        return view('admin.order.payment_not_completed')->with('orders', $orders);
    }

    public function payment_completed()
    {
        session()->put('admin-page', 'order');
        $orders = OrderBill::where('payment_completed', 1)->get();
        return view('admin.order.payment_completed')->with('orders', $orders);
    }

    public function payment_confirm($id)
    {
        $order = OrderBill::find($id);
        $purchase_bill = new PurchaseBill;
        $purchase_bill->user_id = $order->user_id;
        $purchase_bill->total = $order->total;
        $purchase_bill->save();

        foreach ($order->products as $product) {
            $purchase_product = new PurchaseProduct;
            $purchase_product->purchase_bill_id = $purchase_bill->id;
            $purchase_product->product_id = $product->product_id;
            $purchase_product->image = $product->image;
            $purchase_product->title = $product->title;
            $purchase_product->price = $product->price;
            $purchase_product->quantity = $product->quantity;
            $purchase_product->total = $product->total;
            if ($purchase_product->save()) {
                $product->delete();
            }
        }

        $order->delete();
        return redirect()->route('admin.order.payment_completed');
    }
}
