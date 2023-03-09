<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required','unique:categories', 'min:3', 'max:20'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Danh mục không được để trống!',
            'name.unique' => 'Danh mục này đã tồn tại!',
            'name.min' => 'Tên danh mục phải có ít nhất 3 kí tự!',
            'name.max' => 'Tên danh mục không được vượt quá 20 kí tự!',
        ];
    }
}
