<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:customers,email',
            'password'=>'required',
            'confirm' => 'required_with:password|same:password',
        ];
    }

    public function messages() {
        return [

            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'confirm.required_with' => 'Bạn chưa nhập xác nhận mật khẩu',
            'confirm.same' => 'Xác nhận mật khẩu không giống mật khẩu',
          
        ];
    }
}
