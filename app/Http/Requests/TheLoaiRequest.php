<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'Ten' => 'max:50|min:5|unique:theloai'
        ];
    }

    public function messages()
    {
        return [
            'Ten.max'   => 'Tên thể loại tối đa 50 ký tự.',
            'Ten.min'   => 'Tên thể loại tối thiểu 5 ký tự.',
            'Ten.unique' => 'Tên thể loại đã tốn tại.'
        ];
    }
}
