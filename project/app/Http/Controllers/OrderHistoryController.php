<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    //
    public function index()
    {   
        // $orders= Order::where('customer_id', '=', $id)->orderBy('updated_at', 'desc')->get();
        $orders= Order::where('customer_id',session()->get('customer')->id)->get();
        return view('frontend.order-history',
            compact('orders'));
    }
    public function edit($id){
        $order = Order::find($id);
        if($order->status == 'pending'){
            $order->status = 'decline';
            $order->save();
            $alert='You order has been cancel!';
            return redirect()->back()->with('alert',$alert);
        } else {
            $alert='You can not cancel this order!';
            return redirect()->back()->with('alert',$alert);   
        }  
    }
    public function show($id)
    {   
        $orderDetail= Order::select('orders.*', 'order_details.*','products.name')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products','products.id','=','order_details.product_id')
        ->where('order_id',$id)
        ->get();
        return view('frontend.order-detail',
            compact('orderDetail'));
    }

}
