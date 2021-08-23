<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        return view('admin.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        /*
        $this->validate($request,
        [
        'username'=>'required|unique:accounts,username',
        'password'=>'required',
        'confirm' => 'required_with:password|same:password',
        'email'=>'required|unique:accounts,email',
        'image' => 'file|image|mimes:jpeg,png,jpg|max:10240',
        ],
        [
        'username.required' => 'Bạn chưa nhập tài khoản',
        'username.unique' => 'Tài khoản này đã tồn tại',
        'password.required' => 'Bạn chưa nhập mật khẩu',
        'confirm.required_with' => 'Bạn chưa nhập xác nhận mật khẩu',
        'confirm.same' => 'Xác nhận mật khẩu không giống mật khẩu',
        'email.required' => 'Bạn chưa nhập email',
        'email.unique' => 'Email này đã tồn tại',
        'image.image' => 'Bạn phải upload tập tin hình ảnh',
        'image.mimes' => 'Bạn chỉ có thể upload tập tin có đuôi jpg, jpeg, png',
        'image.max' => 'Kích thước tối đa của tập tin hình ảnh là 10Mb',
        ]);
         */
        $account = $request->all();
        // kiểm tra file có tồn tại hay không?
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // lấy phần mở rộng (extension) của file để kiểm tra xem
            // đây có phải là file hình
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.account.create');
            }

            $imgName = $file->getClientOriginalName();
            // copy file vào thư mục public/images
            $file->move('images', $imgName);
            // tạo phần tử image trong mảng $account
            $account['image'] = $imgName;
        }
        // $accountModel = new Account($account);
        // $accountModel->save();
        // mã hóa password trước khi lưu vào db
        $account['password'] = md5($account['password']);
        Account::create($account);
        return redirect()->route('admin.account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('admin.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        if (isset($request->username)) {

            $account->username = $request->username;
        }
        if (isset($request->email)) {

            $account->email = $request->email;
        }
        if (isset($request->password)) {
            $account->password = md5($request->password);
        }
        if (isset($request->role)){
            $account->role = $request->role;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // lấy phần mở rộng (extension) của file để kiểm tra xem
            // đây có phải là file hình
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                return redirect()->route('admin.account.create');
            }

            $imgName = $file->getClientOriginalName();
            // copy file vào thư mục public/images
            $file->move('images', $imgName);
            // tạo phần tử image trong mảng $account
            $account['image'] = $imgName;
        }
        $account->save();
        // $account->update($input);

        return redirect()->route('admin.account.index');
        // ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        // dd(asset('/images/' . $account->image));
        // xóa hình trước khi xóa account
        // hiện tại phần này chỉ chạy trên server LINUX
        if ($account->image != null) {
            if (file_exists('images/' . $account->image)) {
                unlink('images/' . $account->image);
            }
        }
        $account->delete();
        return redirect()->route('admin.account.index');
    }
}
