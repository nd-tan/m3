<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\Unique;

class SupplierUpdateRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'max:50'],
            'email' => ['required', Rule::unique('suppliers')->ignore($this->id), 'min:10', 'max:100', 'email',
                            function($attribute, $value, Closure $fail){
                                $pattern = '/^[A-Za-z]+[\w]*@[A-Za-z]+(\.[A-Za-z]+)$/';
                                if(!preg_match($pattern,$value)){
                                    $fail('email không đúng định dạng');
                                }
                            }
                        ],
            'address' => ['required'],
            'phone' => ['required', 'min:10', 'max:10', Rule::unique('suppliers')->ignore($this->id),
                        function($attribute, $value, Closure $fail){
                            $pattern='/^012[0-9]*$/';
                            if(!preg_match($pattern,$value)){
                                $fail("Số điện thoại phải là số và bắt đầu bằng 012");
                            }
                        },
                    ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.min' => 'Tên phải có ít nhất 3 kí tự!',
            'name.max' => 'Tên không được vượt quá 50 kí tự!',

            'email.required' => 'Email không được để trống!',
            'email.unique' => 'Email này đã được sử dụng!',
            'email.min' => 'Email phải có ít nhất 10 kí tự!',
            'email.max' => 'Email không được vượt quá 100 kí tự!',
            'email.email' => 'Email chưa đúng định dạng!',

            'address.required' => 'Địa chỉ không được để trống!',

            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.unique' => 'Số điện thoại không được để trống!',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 kí tự!',
            'phone.max' => 'Số điện thoại không được vượt quá 10 kí tự!',
        ];
    }
}
