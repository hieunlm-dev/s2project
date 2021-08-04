<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required|unique:accounts,username',
            'password'=>'required',
            'confirm' => 'required_with:password|same:password',
            'email'=>'required|unique:accounts,email',
            'image' => 'file|image|mimes:jpeg,png,jpg|max:10240',
        ];
    }

    public function messages() {
        return [
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
        ];
    }
}
