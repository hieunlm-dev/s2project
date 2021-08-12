<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    //
    public function orderHistory()
    {   
        // $orders= Order::where('customer_id', '=', $id)->orderBy('updated_at', 'desc')->get();
        $orders= Order::all();
        return view('frontend.order-history',
            compact('orders'));
    }
    public function orderDetailHistory()
    {   
        $orders= Order::find($this->$order_id);
        return view('frontend.order-detail-history',
            compact('orders'));
    }

}
