<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login() {
        // dd(md5('1'));
        return view('admin.login');
    }

    public function processLogin(Request $request) {
        $u = $request->username;
        $p = md5($request->password);

        $account = Account::where('username', $u)->first();
        // dd($account);
        if (!$account) {
            return redirect()->route('admin.login');
        }
        if ($p !== $account->password) {
            return redirect()->route('admin.login');
        }
        // lưu thông tin đăng nhập vào session
        $request->session()->put('user', $account);
        return redirect()->route('admin.dashboard');
    }



    public function dashboard() {
        $cmts =Comment::select('comments.*','products.name', 'products.image')
        ->join('products','products.id', '=','comments.pid')
        ->orderBy('created_at','DESC')->limit(6)->get();
        $accounts = Account::all();
        $customers = Customer::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) <= 7')->get();
        $orders = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) <= 7')->get();
        $incomes1 = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) = 7')->where('status','=','completed')->sum('grand_total');
        $incomes2 = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) = 6')->where('status','=','completed')->sum('grand_total');
        $incomes3 = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) = 5')->where('status','=','completed')->sum('grand_total');
        $incomes4 = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) = 4')->where('status','=','completed')->sum('grand_total');
        $incomes5 = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) = 3')->where('status','=','completed')->sum('grand_total');
        $incomes6 = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) = 2')->where('status','=','completed')->sum('grand_total');
        $incomes7 = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) = 1')->where('status','=','completed')->sum('grand_total');
      
        return view('admin.dashboard',compact(
            'orders',
            'customers',
            'accounts',
            'incomes1',   
            'incomes2',   
            'incomes3',   
            'incomes4',   
            'incomes5',   
            'incomes6',   
            'incomes7',   
            'cmts',
    ));
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    return redirect()->route('admin.login');
    }

    
}
