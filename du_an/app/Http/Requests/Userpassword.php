<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserPassword extends FormRequest
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
            'password' => ['required',
                                Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(2)
                        ],
            'newpassword' => ['required',
                                Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(2)
                        ],
            'renewpassword' => ['required',
                                Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(2)
                        ],
        ];
    }
    public function messages()
    {
        $required = 'Mật khẩu không được để trống!';
        $min = 'Mật khẩu phải có ít nhất 8 kí tự!';
        $letters = 'Mật khẩu phải có ít nhất 1 chữ cái!';
        $mixedCase = 'Mật khẩu phải có ít nhất 1 chữ cái viết hoa!';
        $numbers = 'Mật khẩu phải có ít nhất 1 chữ số!';
        $symbols = 'Mật khẩu phải có ít nhất 1 kí tự đặc biệt!';
        return [
            'password.required' => $required,
            'password.min' => $min,
            'password.letters' => $letters,
            'password.mixedCase' => $mixedCase,
            'password.numbers' => $numbers,
            'password.symbols' => $symbols,

            'newpassword.required' => $required,
            'newpassword.min' => $min,
            'newpassword.letters' => $letters,
            'newpassword.mixedCase' => $mixedCase,
            'newpassword.numbers' => $numbers,
            'newpassword.symbols' => $symbols,
            
            'renewpassword.required' => $required,
            'renewpassword.min' => $min,
            'renewpassword.letters' => $letters,
            'renewpassword.mixedCase' => $mixedCase,
            'renewpassword.numbers' => $numbers,
            'renewpassword.symbols' => $symbols,
        ];
    }
}
