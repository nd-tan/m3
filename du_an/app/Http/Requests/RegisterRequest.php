<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users',
            'inputFile' => 'required',
            'birthday' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'phone.required' => 'Tuổi không được để trống!',
            'address.required' => 'Địa chỉ không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.unique' => 'Email đã tồn tại!',
            'inputFile.required' => 'Hình ảnh không được để trống!',
            'birthday.required' => 'Ngày sinh không được để trống!',
        ];
    }
}
