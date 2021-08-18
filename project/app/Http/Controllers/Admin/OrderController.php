<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(10);
        return view('admin.order.index',compact('orders'));
    }

    public function show($id)
    {
        $orderDetail= Order::select('orders.*', 'order_details.*','products.name','products.image')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products','products.id','=','order_details.product_id')
        ->where('order_id',$id)
        ->get();
        return view('admin.order.detail',
            compact('orderDetail'));
    }

    public function edit($id){
        $order = Order::find($id);
        if($order->status == 'pending'){
            $order->status = 'processing';
        } else {
            $order->status = 'completed';
        }
        $order->save();
        return redirect()->route('admin.order.index');
    }
    
    
}
