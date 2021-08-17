<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Order;
use App\Models\Customer;
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
        $accounts = Account::all();
        $customers = Customer::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) <= 7')->get();
        $orders = Order::whereRaw('DATEDIFF(CURDATE(),DATE_FORMAT(created_at,"%Y-%m-%d")) <= 7')->get();
        return view('admin.dashboard',compact('orders','customers','accounts'));
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    return redirect()->route('admin.login');
    }

    
}
