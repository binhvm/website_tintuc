<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
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
            'idTheLoai' => 'required',
            'idLoaiTin' => 'required',
            'TieuDe' => 'max:50|min:5',
            'TomTat' => 'max:300|min:10',
            'NoiDung' => 'required|max:1000|min:50'
        ];
    }

    public function messages()
    {
        return [
            'idTheLoai.required' => 'Bạn chưa chọn thể loại.',
            'idLoaiTin.required' => 'Bạn chưa chọn loại tin.',
            'TieuDe.max' => 'Tiêu đề tối đa 50 ký tự.',
            'TieuDe.min' => 'Tiêu đề tối thiểu 5 ký tự.',
            'TomTat.max' => 'Tóm tắt tối đa 300 ký tự.',
            'TomTat.min' => 'Tóm tắt tối thiểu 10 ký tự.',
            'NoiDung.required' => 'Bạn chưa nhập nội dung.',
            'NoiDung.max' => 'Nội dung tối đa 1000 ký tự.',
            'NoiDung.min' => 'Nội dung tối thiểu 50 ký tự.'

        ];
    }
}
