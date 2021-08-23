<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Session;
class OrderHistoryController extends Controller
{
    //
    public function index()
    {   
        if(Session::has('customer') || !empty(Session::get('customer'))){
            $orders= Order::where('customer_id',session()->get('customer')->id)->orderBy('created_at','DESC')->paginate(10);;
        return view('frontend.order-history',
            compact('orders'));
        } else{
            return view('frontend.login');
        }
        
    }
    public function edit($id){
        $order = Order::find($id);
        $orderDetail = Order::select('orders.*', 'order_details.*','products.name')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products','products.id','=','order_details.product_id')
        ->where('order_id',$id)
        ->get();
        if($order->status == 'pending'){
            $order->status = 'decline';
            $order->save();
            $alert='You order has been cancel!';
            //increase quantity in product table
            foreach($orderDetail as $item){
                $product = Product::find($item->product_id);
                $product->increment('quantity', $item->quantity);

            }
            
            return redirect()->back()->with('alert',$alert);
        } else {
            $alert='You can not cancel this order!';
            return redirect()->back()->with('alert',$alert);   
        }  
    }
    public function show($id)
    {   
        $orderDetail= Order::select('orders.*', 'order_details.*','products.name','products.image')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products','products.id','=','order_details.product_id')
        ->where('order_id',$id)
        ->get();
        return view('frontend.order-detail',
            compact('orderDetail'));
    }

}
