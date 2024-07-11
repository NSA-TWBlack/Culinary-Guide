<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'txtTitle' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Tiêu đề không được để trống',
            'max' => 'Tiêu đề không được vượt quá 255 ký tự',
        ];
    }
}
