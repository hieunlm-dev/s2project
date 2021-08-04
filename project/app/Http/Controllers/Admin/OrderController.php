<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }
    public function show()
    {
        $orders = Order::all();
        return view('admin.order.detail',compact('orders'));
    }
 
}
