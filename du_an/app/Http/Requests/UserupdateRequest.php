<?php

namespace App\Http\Requests;

use App\Models\Position;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class UserUpdateRequest extends FormRequest
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
    // public function validate(){
    //     Validator::extend('departure_date_check', function ($attribute, $value, $parameters) {
    //         $result = true;
    //         if ($value == 'admin') {
    //             $result = false;
    //         }
    //         return $result;
    //     });
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $positons_id = Position::all()->pluck('id')->toArray();
        return [
            'name' => ['required','min:5', 'max:20', 'check_name'],
            'phone' =>  ['required', 'numeric', 'min:10', 'max:10', Rule::unique('users')->ignore($this->id),
                            function($attribute, $value, Closure $fail){
                                $pattern='/^012[0-9]*$/';
                                if(!preg_match($pattern,$value)){
                                    $fail("Số điện thoại phải là số và bắt đầu bằng 012");
                                }
                            },
                        ],
            'address' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($this->id), 'email', 'min:11', 'max:50'],
            'inputFile' => ['required', File::image()->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500)), 'mimes:jpg,bmp,png'],
            'birthday' => ['required', 'date', 'before:today', 'after:1900-01-01', 'date_format:Y-m-d'],
            'position_id' => ['required', 'in:'.implode(',', $positons_id)] ,
            'gender' => ['required', 'in:Nam,Nữ,Khác'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.check_name' => 'Tên không thể là admin!',
            'name.min' => 'Tên phải có ít nhất 5 kí tự!',
            'name.max' => 'Tên tối đa 20 kí tự!',

            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.numeric' => 'Số điện thoại sai định dạng!',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 số!',
            'phone.max' => 'Số điện thoại phải có nhiều nhất 10 số!',

            'address.required' => 'Địa chỉ không được để trống!',

            'email.required' => 'Email không được để trống!',
            'email.unique' => 'Email đã được sử dụng!',
            'email.min' => 'Email quá ngắn!',
            'email.max' => 'Email quá dài!',

            'inputFile.required' => 'Hình ảnh không được để trống!',
            'inputFile.image' => 'Dữ liệu phải có dạng hình ảnh!',
            'inputFile.mimes' => 'Hình ảnh phải có đuôi jpg, png hoặc bmp!',

            'birthday.required' => 'Ngày sinh không được để trống!',
            'birthday.date' => 'Ngày sinh chưa đúng định dạng!',
            'birthday.before' => 'Ngày sinh không hợp lệ!',
            'birthday.after' => 'Ngày sinh không hợp lệ!',
            'birthday.date_format' => 'Ngày sinh chưa đúng định dạng!',

            'position_id.required' => 'Chức vụ không được để trống!',
            'position_id.in' => 'Chức vụ không tồn tại!',

            'gender.required' => 'Giới tính không tồn tại!',
            'gender.in' => 'Giới tính không tồn tại!',
        ];
    }
}
