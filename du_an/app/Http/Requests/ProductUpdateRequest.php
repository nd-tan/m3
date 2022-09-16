<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'age.required' => 'Tuổi không được để trống!',
            'color.required' => 'Màu sắc không được để trống!',
            'gender.required' => 'Giới không được để trống!',
            'price.required' => 'Giá không được để trống!',
            'quantity.required' => 'Số lượng không được để trống!',
        ];
    }
}
