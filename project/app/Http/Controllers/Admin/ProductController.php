<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
//     $sort = $request->orderby;
//     $products = Product::select('products.*', 'brands.name')
//         ->join('brands', 'products.brand_id', '=', 'brands.id')
//         ->where('brands.name', $sort)
//         ->orderBy('created_at', 'DESC')
//         ->paginate(10);
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
        $orders = Order::all();
        if (isset($request->orderby)) {
            $sort = $request->orderby;
            $products = Product::select('products.*', 'brands.name')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->where('brands.name', $sort)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        }
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.product.create', compact('brands'));
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
        return view('admin.product.edit', compact('product', 'brands'));
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
        } else {
            unset($input['image']);
        }

        $product->update($input);

        $alert = "The product has been updated successfully";
        return redirect()->route('admin.product.index')->with('alert', $alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $comment= Comment::all();
        // $wishlist= WishList::all();
        // foreach ($comment as $item) {
        //     if ($product->id == $item->pid) {
        //         $item->delete();
        //         $product->delete();
        //         $alert ="The product has been deleted successfully";
        //         return redirect()->route('admin.product.index')->with('alert', $alert);
        //         break;
        //     }
        // }
        // foreach ($wishlist as $it) {
        //     if ($product->id  == $it->product_id) {
        //         $warning = 'You can not delete this product because customers has put it into their wishlist!';
        //         return redirect()->back()->with('warning', $warning);
        //         break;
        //     }
        // }
        // $product->delete();
        // $alert ="The product has been deleted successfully";
        // return redirect()->route('admin.product.index')->with('alert', $alert);
    }

    // public function productSort(Request $request)
    // {
    //     $brands = Brand::all();
    //     $sort = $request->orderby;
    //     $products = Product::select('products.*', 'brands.name')
    //         ->join('brands', 'products.brand_id', '=', 'brands.id')
    //         ->where('brands.name', $sort)
    //         ->orderBy('created_at', 'DESC')
    //         ->paginate(10);

    //     return view('admin.product.index', compact('products', 'brands'));
    // }
}
