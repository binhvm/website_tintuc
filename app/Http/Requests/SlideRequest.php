<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'Ten' => 'unique:slide',
            'NoiDung' => 'unique:slide'
        ];
    }

    public function messages()
    {
        return [
            'Ten.unique' => 'Tên slide đã tồn tại.',
            'NoiDung.unique' => 'Nội dung đã tồn tại.'
        ];
    }
}
