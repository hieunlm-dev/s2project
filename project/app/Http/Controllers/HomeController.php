<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', '1')->orderBy('updated_at', 'desc')->get();
        $latestProducts = Product::orderBy('updated_at', 'desc')->limit(8)->get();
        if (session()->get('customer')) {
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.home', compact('featuredProducts', 'latestProducts', 'lists'));
        } else {
            return view('frontend.home', compact('featuredProducts', 'latestProducts'));
        }
    }

    public function contactus()
    {
        return view('frontend.contactus');
    }
    public function productDetails($id)
    {
        $cmts = Comment::where('pid', '=', $id)->get();
        $product = Product::find($id);
        $relatedProducts = Product::where('id', '!=', $id)->orderBy('updated_at', 'desc')->limit(8)->get();
        $featuredProducts = Product::where('featured', '1')->where('id', '!=', $id)->orderBy('updated_at', 'desc')->get();
        if (session()->get('customer')) {
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.product-details', compact(
                'product',
                'relatedProducts',
                'featuredProducts',
                'lists',
                'cmts',
            ));
        } else {
            return view('frontend.product-details', compact(
                'product',
                'relatedProducts',
                'featuredProducts',
                'cmts',
            ));
        }
    }
    public function store(Request $request)
    {
        if (session()->get('customer')) {
            $comment = new Comment();
            $comment->pid = $request->pid;
            $comment->rate = $request->rating;
            $comment->name = session()->get('customer')->email;
            $comment->contents = $request->contents;

            $comment->save();
            return redirect()->route('product-details', $request->pid);
        } else {
            if (session()->get('customer')) {
                $comment = new Comment();
                $comment->pid = $request->pid;
                $comment->rate = $request->rating;
                $comment->name = 'Guess';
                $comment->contents = $request->contents;
                $comment->save();
                return redirect()->route('product-details', $request->pid);
            }
        }
    }
    public function search(Request $request)
    {
        $key = $request->search;
        $products = Product::where('name', 'like', '%' . $key . '%')->paginate(6);
        return view('frontend.search', compact('products'));
    }

    public function viewCart()
    {
        if (session()->get('customer')) {
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.viewcart', compact('lists'));
        } else {
            return view('frontend.viewcart');
        }
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

    public function clearCart()
    {
        session()->forget('cart');
        return view('frontend.viewcart');
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
        if (session()->get('customer')) {
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.checkout', compact('lists'));
        }
        return view('frontend.checkout');
    }

    public function doCheckout(Request $request)
    {
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $phone = $request->phone;
        $add = $request->add;
        $cart_test = $request->session()->get('cart');
        $total = 0;
        $quantity = 0;
        foreach ($cart_test as $item) {
            $total += $item->quantity * $item->price;
            $quantity += $item->quantity;
        }
        $ocust = Customer::select('id')->get();
        $countCus = 1;
        foreach ($ocust as $it) {
            $countCus++;
        }
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            //tao order
            $ord = new Order();
            if (session()->get('customer')) {
                $ord->customer_id = session()->get('customer')->id;
            } else {
                $ord->customer_id = $countCus;
            }

            $ord->grand_total = $total;
            $ord->item_count = $quantity;
            $ord->first_name = $fname;
            $ord->last_name = $lname;
            $ord->email = $email;
            $ord->phone_number = $phone;
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
                if (session()->get('customer')) {
                    $detail->customer_id = session()->get('customer')->id;
                } else {
                    $detail->customer_id = $countCus;
                }

                $detail->save();
                //decrease quantity in product table
                $product = Product::find($item->id);
                $product->decrement('quantity', $item->quantity);
            }
        }

        if (isset($request->createAccount)) {
            $cust = new Customer();
            $cust->firstname = $fname;
            $cust->lastname = $lname;
            $cust->password = \md5('123456');
            $cust->email = $email;
            $cust->phone = $phone;
            $cust->address = $add;
            $cust->save();
        }
        //kiem tra payment method
        $payment = $request->input('payment-method');

        if ($payment == "cod") {
            session()->forget('cart');
            return redirect()->route('thankyou');
        }
        if ($payment == "paypal") {
            // session()->forget('cart');
            return redirect()->route('payment');
        }

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
        if ($customer->status == 1) {
            return redirect()->route('login')->with('alert', 'Your account has been blocked ');
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
        if (session()->get('customer')) {
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.about', compact('lists'));
        } else {

            return view('frontend.about');
        }
    }

    public function policy()
    {
        if (session()->get('customer')) {
            $lists = WishList::where('customer_id', session()->get('customer')->id)->get();
            return view('frontend.policy', compact('lists'));
        } else {

            return view('frontend.policy');
        }

    }
    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function faq()
    {
        return view('frontend.FAQ');
    }

    public function warranty()
    {
        return view('frontend.warranty');
    }

    public function exwarranty()
    {
        return view('frontend.exwarranty');
    }
}
