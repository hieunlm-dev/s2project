<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.product.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->all();
        // kiểm tra file có tồn tại hay không?
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // lấy phần mở rộng (extension) của file để kiểm tra xem 
            // đây có phải là file hình
            $extension = $file->getClientOriginalExtension();            
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.product.create');
            }
            
            $imgName = $file->getClientOriginalName();
            // copy file vào thư mục public/images
            $file->move('images', $imgName);
            // tạo phần tử image trong mảng $product
            $product['image'] = $imgName;
        }

        if ($request->hasFile('img1')) {
            $file = $request->file('img1');
            // lấy phần mở rộng (extension) của file để kiểm tra xem 
            // đây có phải là file hình
            $extension = $file->getClientOriginalExtension();            
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.product.create');
            }
            
            $imgName = $file->getClientOriginalName();
            // copy file vào thư mục public/images
            $file->move('images', $imgName);
            // tạo phần tử image trong mảng $product
            $product['img1'] = $imgName;
        }

        if ($request->hasFile('img2')) {
            $file = $request->file('img2');
            // lấy phần mở rộng (extension) của file để kiểm tra xem 
            // đây có phải là file hình
            $extension = $file->getClientOriginalExtension();            
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.product.create');
            }
            
            $imgName = $file->getClientOriginalName();
            // copy file vào thư mục public/images
            $file->move('images', $imgName);
            // tạo phần tử image trong mảng $product
            $product['img2'] = $imgName;
        }

        if ($request->hasFile('img3')) {
            $file = $request->file('img3');
            // lấy phần mở rộng (extension) của file để kiểm tra xem 
            // đây có phải là file hình
            $extension = $file->getClientOriginalExtension();            
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.product.create');
            }
            
            $imgName = $file->getClientOriginalName();
            // copy file vào thư mục public/images
            $file->move('images', $imgName);
            // tạo phần tử image trong mảng $product
            $product['img3'] = $imgName;
        }

        if ($request->hasFile('img4')) {
            $file = $request->file('img4');
            // lấy phần mở rộng (extension) của file để kiểm tra xem 
            // đây có phải là file hình
            $extension = $file->getClientOriginalExtension();            
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.product.create');
            }
            
            $imgName = $file->getClientOriginalName();
            // copy file vào thư mục public/images
            $file->move('images', $imgName);
            // tạo phần tử image trong mảng $product
            $product['img4'] = $imgName;
        }
    
        Product::create($product);
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('admin.product.edit',compact('product','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        $brands = Brand::all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        if ($image = $request->file('img1')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img1'] = "$profileImage";
        }else{
            unset($input['img1']);
        }

        if ($image = $request->file('img2')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img2'] = "$profileImage";
        }else{
            unset($input['img2']);
        }

        if ($image = $request->file('img3')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img3'] = "$profileImage";
        }else{
            unset($input['img3']);
        }

        if ($image = $request->file('img4')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img4'] = "$profileImage";
        }else{
            unset($input['img4']);
        }

        $product->update($input);
    
        return redirect()->route('admin.product.index');
            // ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
     
        return redirect()->route('admin.product.index')
                        ->with('success','Product deleted successfully');
    }

}
