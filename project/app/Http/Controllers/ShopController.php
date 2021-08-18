<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();
        $products = Product::orderBy('created_at', 'desc')->get();
        $products = Product::paginate(6);
        if (isset($request->brand)) {
            $brand = $request->brand;
            // dd($brand);
            // $products = Product::where('name','like','%'.$brand.'%')->get();
            $products = Product::select('products.*', 'brands.name')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->where('brands.name', $brand)
                ->paginate(6);
        }
        if (session()->get('customer')) {
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.shop', compact('products', 'lists','brands'));
        } else {
            return view('frontend.shop', compact('products', 'brands'));

        }

    }
    
    public function sortProduct(Request $request)
    {
        $brands = Brand::all();
        $sort = $request->orderby;
        if ($sort == 'date') {
            $products = Product::orderBy('created_at', 'desc')->paginate(6);
            return view('frontend.shop', compact('products', 'brands'));
        } else if ($sort == 'price') {
            $products = Product::orderBy('price', 'asc')->paginate(6);
            return view('frontend.shop', compact('products', 'brands'));
        } else if ($sort == 'price-desc') {
            $products = Product::orderBy('price', 'desc')->paginate(6);
            return view('frontend.shop', compact('products', 'brands'));
        } else if ($sort == 5000000) {
            $products = Product::where('price', '<', $sort)->paginate(6);
            return view('frontend.shop', compact('products', 'brands'));
        } else if ($sort == 10000000) {
            $products = Product::where('price', '>=', 5000000)->where('price', '<', $sort)->paginate(6);
            return view('frontend.shop', compact('products', 'brands'));
        } else if ($sort == 20000000) {
            $products = Product::where('price', '>=', 10000000)->where('price', '<', $sort)->paginate(6);
            return view('frontend.shop', compact('products', 'brands'));
        }
    }
}
