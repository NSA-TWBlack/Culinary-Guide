<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RecipesRequest extends FormRequest
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
            'txtCategories' => 'required',
            'txtIngredients' => 'required',
            'txtSteps' => 'required',
            'imageUpload' => 'required|max:1000000',
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required' => 'Tiêu đề không được để trống',
            'txtTitle.max' => 'Tiêu đề không được vượt quá 255 ký tự',
            'txtCategories.required' => 'Chưa chọn danh mục',
            'txtIngredients.required' => 'Thành phần không dược để trống',
            'txtSteps.required' => 'Các bước thực hiện không được để trống',
            'imageUpload.required' => 'Chưa chọn hình ảnh',
            'imageUpload.max' => 'Kích thước của hình ảnh không được vượt quá 1GB',
        ];
    }
}
