<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('frontend.shop', compact('products'));

    }

    public function sortAsc($id, Request $request)
    {
        $query = Product::query();
        if ($request->sort) {
            $query = $query->orderBy('price', $request->sort);
        }
        $query = $query->get();
    }
}
