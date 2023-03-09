<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandUpdateRequest extends FormRequest
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
            'name' => ['required', Rule::unique('brands')->ignore($this->id), 'min:3', 'max:20'],
            'address' => ['required', 'min:10', 'max:100'],
            'phone' => ['required', 'min:10', 'max:10', Rule::unique('brands')->ignore($this->id),
                        function($attribute, $value, Closure $fail){
                            $pattern='/^012[0-9]*$/';
                            if(!preg_match($pattern,$value)){
                                $fail("Số điện thoại phải là số và bắt đầu bằng 012");
                            }
                        }
                    ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống!',
            'name.unique' => 'Tên thương hiệu đã được sử dụng!',
            'name.min' => 'Tên thương hiệu phải có ít nhất 3 kí tự!',
            'name.max' => 'Tên thương hiệu không được vượt quá 20 kí tự!',

            'address.required' => 'Địa chỉ không được để trống!',
            'address.min' => 'Địa chỉ phải có ít nhất 10 kí tự!',
            'address.max' => 'Địa chỉ không được vượt quá 100 kí tự!',

            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.min' => 'Số điện thoại có ít nhất 10 số!',
            'phone.max' => 'Số điện thoại có nhiều nhất 10 số!',
            'phone.unique' => 'Số điện thoại đã được thương hiệu khác đăng kí!',
        ];
    }
}
