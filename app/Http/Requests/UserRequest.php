<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            'name' => 'min:5',
            'email' => 'email|unique:users',
            'password' => 'min:8|max:32',
            'repassword' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Tên người dùng tối thiểu 5 ký tự.',
            'email.email' => 'Không đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại.',
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
            'password.max' => 'Mật khẩu tối đa 32 ký tự.',
            'repassword.same' => "Xác nhận mật khẩu không đúng."
        ];
    }
}
