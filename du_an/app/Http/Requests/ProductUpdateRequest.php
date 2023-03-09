<?php

namespace App\Http\Requests;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

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
        $categories_id = Category::all()->pluck('id')->toArray();
        $brands_id = Brand::all()->pluck('id')->toArray();
        $suppliers_id = Supplier::all()->pluck('id')->toArray();
        return [
            'name' => ['required', 'min:3', 'max:20'],
            'age' => 'required',
            'color' => ['required'],
            'gender' => ['required', 'in:đực,cái'],
            'price' => ['required', 'min:100000', 'max:100000000', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1', 'max:100'],
            'inputFile' => ['image', File::image()->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500)), 'mimes:jpg,bmp,png'],
            'category_id' => ['required', 'numeric', 'in:'.implode(',', $categories_id)],
            'brand_id' => ['required', 'numeric', 'in:'.implode(',', $brands_id)],
            'supplier_id' => ['required', 'numeric', 'in:'.implode(',', $suppliers_id)]
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
            'price.numeric' => 'Giá không thể nhập khác kí tự số!',
            'quantity.required' => 'Số lượng không được để trống!',
            'inputFile.in' => 'Định dạng ảnh không đúng!',
        ];
    }
}
