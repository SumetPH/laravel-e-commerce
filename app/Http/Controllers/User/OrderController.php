<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\OrderBill;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderBill::where('user_id', auth()->user()->id)->get();
        return view('user.order.index')->with('orders', $orders);
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
        $transfer_slip = Storage::putFile('transfer_slip', $request->file('transfer_slip'));
        $order_bill = OrderBill::find($id);
        $order_bill->transfer_slip = $transfer_slip;
        $order_bill->payment_completed = true;
        if ($order_bill->save()) {
            return redirect()->back()->with('success', 'Saved');
        } else {
            return redirect()->back()->with('failure', 'Error');
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
        if (OrderBill::find($id)->delete() && OrderProduct::where('order_bill_id', $id)->delete()) {
            return redirect()->back()->with('success', 'Canceled');
        } else {
            return redirect()->back()->with('failure', 'Error');
        }
    }
}
