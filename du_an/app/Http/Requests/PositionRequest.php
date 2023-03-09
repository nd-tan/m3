<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'name' => ['required','unique:positions',
                        function($attribute, $value, Closure $fail){
                            $pattern = '/^[A-Za-z]+[A-Za-z]*$/';
                            if(!preg_match($pattern,$value)){
                                $fail('Tên chức vụ không đúng định dạng');
                            }
                            if($value == "admin"){
                                $fail('Tên chức vụ "admin" đã bị cấm');
                            }
                        }
                    ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Chức vụ không được để trống!',
            'name.unique' => 'Chức vụ này đã tồn tại!',
        ];
    }
}
