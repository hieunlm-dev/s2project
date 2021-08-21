<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = WishList::where('customer_id',session()->get('customer')->id)->get();
        return view('frontend.wish-list',compact('lists')); 
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
        // $alreadyList = WishList::where('customer_id','=',session()->get('customer')->id)->where
     if (session()->get('customer')){
        $alreadyList = WishList::where('customer_id','=',session()->get('customer')->id)->where('product_id','=',$request->product_id)->first();
        $list = new WishList();
        $list->customer_id = session()->get('customer')->id;
        $list->product_id = $request->product_id;
        if (!$alreadyList){           
            $list->save();
            $alert1='Add this product into your wish list successfully';
            return redirect()->back()->with('alert1',$alert1);  
            // return redirect()->route('wish-list.index')->with('success', 'Your item was successfully moved to your wish-list');;
        } else {
            // return redirect()->route('shop')->with('error','This item has been already stored in your wish lists');
            $alert='This item has been already stored in your wish lists!';
            return redirect()->back()->with('alert',$alert);   
        }
        } else {
            return redirect()->route('login')->with('alert','You have to login first.' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function show(WishList $wishList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function edit(WishList $wishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WishList $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WishList $wishList)
    {
        $wishList->delete();
     
        return redirect()->route('wish-list.index')
                        ->with('success','Product has been removed successfully from your wishlist');
    }
}
