<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect; 
use App\Http\Requests\CustomerRequest;


class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', '1')->orderBy('updated_at', 'desc')->get();
        $latestProducts = Product::orderBy('updated_at', 'desc')->limit(8)->get();

        return view('frontend.home', compact('featuredProducts', 'latestProducts'));

    }

    public function contactus()
    {
        return view('frontend.contactus');
    }
    public function productDetails($id)
    {
        $product = Product::find($id);
        $relatedProducts = Product::where('id', '!=', $id)->orderBy('updated_at', 'desc')->limit(8)->get();
        return view('frontend.product-details', compact(
            'product',
            'relatedProducts'
        ));
    }

    public function search(Request $request)
    {
        $key = $request->search;
        $products = Product::where('name', 'like', '%' . $key . '%')->get();
        return view('frontend.shop', compact('products'));
    }

    public function viewCart()
    {
        return view('frontend.viewcart');
    }

    public function addCart(Request $request)
    {
        $id = $request->pid;
        $quantity = $request->quantity;
        $product = Product::find($id);
        //lay cart tu session, neu chua co thi tao moi
        //cart la 1 mang cac CartItem
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = [];
        }
        //xu ly them so luong item da co trong cart

        foreach ($cart as $elem) {
            if ($elem->id === $id) {
                $item = $elem;
                break;
            }
        }
        if (isset($item)) {
            $item->quantity += $quantity;
        } else { //chua co san pham, tao moi
            //tao doi tuong cart item
            $item = new CartItem($id, $product->name, $quantity, $product->price, $product->image);
            //them vao gio hang
            $cart[] = $item;
        }
        //luu vao session
        $request->session()->put('cart', $cart);
    }

    public function deleteCartItem(Request $request)
    {
        $id = $request->pid;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]->id == $id) {

                    break;
                }
            }
            \array_splice($cart, $i, 1);
            $request->session()->put('cart', $cart);
        }
    }

    public function changeCartQuantity(Request $request)
    {
        $id = $request->pid;
        $quantity = $request->quantity;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            foreach ($cart as $elem) {
                if ($elem->id === $id) {
                    $item = $elem;
                    break;
                }
            }
            if (isset($item)) {
                $item->quantity = $quantity;
            }
            $request->session()->put('cart', $cart);
        }

    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function doCheckout(Request $request)
    {
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $phone = $request->phone;
        $add = $request->add;

        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            //tao order
            $ord = new Order();
            $ord->firstname = $fname;
            $ord->lastname = $lname;
            $ord->email = $email;
            $ord->phone = $phone;
            $ord->address = $add;
            $ord->order_date = \Carbon\Carbon::now();
            //luu order
            $ord->save();

            foreach ($cart as $item) {
                $detail = new OrderDetail();
                $detail->order_id = $ord->id;
                $detail->product_id = $item->id;
                $detail->quantity = $item->quantity;
                $detail->price = $item->price;
                $detail->save();
            }
        }

        if (isset($request->createAccount)) {
            $cust = new Customer();
            $cust->firstname = $fname;
            $cust->lastname = $lname;
            $cust->username = $email;
            $cust->password = \md5('123456');
            $cust->email = $email;
            $cust->phone = $phone;
            $cust->address = $add;
            $cust->save();
        }
        session()->forget('cart');
        return redirect()->route('home');
    }

    public function registerSuccess()
    {
        return view('frontend.register-success');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function processLogin(Request $request)
    {
        $u = $request->email;
        $p = md5($request->password);

        $customer = Customer::where('email', $u)->first();
        // dd($account);
        if (!$customer) {
            return redirect()->route('login');
        }
        if ($p !== $customer->password) {
            return redirect()->route('login');
        }
        // lưu thông tin đăng nhập vào session
        $request->session()->put('customer', $customer);
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function policy()
    {
        return view('frontend.policy');
    }
}
