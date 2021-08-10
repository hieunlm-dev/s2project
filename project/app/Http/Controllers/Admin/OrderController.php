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
        $orders= Order::find($id);
        return view('admin.order.detail',
            compact('orders'));
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
