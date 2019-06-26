<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'Ten'       => 'min:5|max:50|unique:loaitin'
        ];
    }

    public function messages()
    {
        return [
            'Ten.min'   => 'Tên loại tin tối thiểu 5 ký tự.',
            'Ten.max'   => 'Tên loại tin tối đa 50 ký tự.',
            'Ten.unique'=> 'Loại tin đã tồn tại.'
        ];
    }
}
