<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $products= Product::paginate(6);
        if (isset($request->brand)){
            $brand = $request->brand;
            // dd($brand);
            $products = Product::where('name','like','%'.$brand.'%')->get();
        }
        if (session()->get('customer')){
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.shop', compact('products','lists'));
        } else {
            return view('frontend.shop', compact('products'));

        }
        
    }
    public function sortProduct(Request $request)
    {
        $sort = $request->orderby;

        if ($sort == 'date') {
            $products = Product::orderBy('created_at', 'desc')->paginate(6);
            return view('frontend.shop', compact('products'));
        } else if($sort == 'price'){
            $products = Product::orderBy('price', 'asc')->paginate(6);
            return view('frontend.shop', compact('products'));
        } else if($sort == 'price-desc'){
            $products = Product::orderBy('price', 'desc')->paginate(6);
            return view('frontend.shop', compact('products'));
        }
        
    }
}
