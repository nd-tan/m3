<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
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

    public function rules()
    {
        return [
            'email' => ['required', 'min:10', 'max:100','email'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(2)],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 10 kí tự!',
            'password.letters' => 'Mật khẩu phải có ít nhất 1 chữ cái!',
            'password.mixedCase' => 'Mật khẩu phải có ít nhất 1 chữ cái viết hoa!',
            'password.numbers' => 'Mật khẩu phải có ít nhất 1 chữ số!',
            'password.symbols' => 'Mật khẩu phải có ít nhất 1 kí tự đặc biệt!',
        ];
    }
}
