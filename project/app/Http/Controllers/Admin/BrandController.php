<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Admin\ProductController;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = $request->all();
        Brand::create($brand);
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $input = $request->all();
        $brand->update($input);
    
        $success ="The brand has been updated successfully";
        return redirect()->route('admin.brand.index')->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $products = Product::all();
        foreach ($products as $item){
            if ($brand->id ==$item -> brand_id){
                $alert='You can not delete this Brand because this has at least product within!';
                return redirect()->back()->with('alert',$alert);  
                // return back();
                break;
            }
        } 
        $brand->delete();
        $success = 'The brand has been deleted successfully';
        return redirect()->route('admin.brand.index')
                        ->with('success',$success);
    }
}
