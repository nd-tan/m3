<?php

namespace App\Http\Requests;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class ProductCreateRequest extends FormRequest
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
            'inputFile' => ['required', 'image', File::image()->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500)), 'mimes:jpg,bmp,png'],
            'category_id' => ['required', 'numeric', 'in:'.implode(',', $categories_id)],
            'brand_id' => ['required', 'numeric', 'in:'.implode(',', $brands_id)],
            'supplier_id' => ['required', 'numeric', 'in:'.implode(',', $suppliers_id)]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.min' => 'Tên phải có ít nhất 3 kí tự!',
            'name.max' => 'Tên tối đa 20 kí tự!',

            'age.required' => 'Tuổi không được để trống!',

            'color.required' => 'Màu sắc không được để trống!',

            'gender.required' => 'Giới tính không được để trống!',
            'gender.in' => 'Giới tính không đúng định dạng!',

            'price.required' => 'Giá không được để trống!',
            'price.min' => 'Giá tối thiểu là 100.000!',
            'price.max' => 'Giá không được vượt quá 100.000.000!',
            'price.numeric' => 'Giá phải là số!',

            'quantity.required' => 'Số lượng không được để trống!',
            'quantity.min' => 'Số lượng tố thiểu là 1!',
            'quantity.max' => 'Số lượng không được vượt quá 100!',
            'quantity.numeric' => 'Số lượng phải là số!',

            'inputFile.required' => 'Hình ảnh không được để trống!',
            'inputFile.image' => 'Dữ liệu phải có dạng hình ảnh!',
            'inputFile.mimes' => 'Hình ảnh phải có đuôi jpg, png hoặc bmp!',
            'inputFile.dimensions' => 'Kích thước hình ảnh không hợp lệ!',

            'category_id.in' => 'Danh mục không tồn tại',
            'brand_id.in' => 'Thương hiệu không tồn tại',
            'supplier_id.in' => 'Nhà cung cấp không tồn tại',
        ];
    }
}
