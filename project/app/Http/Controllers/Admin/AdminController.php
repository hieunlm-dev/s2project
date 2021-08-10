<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
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
        return view('admin.dashboard');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    return redirect()->route('admin.login');
    }

    
}
