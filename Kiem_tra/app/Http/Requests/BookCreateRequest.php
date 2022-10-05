<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
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
            'ten_sach' => 'required',
            'isbn' => 'required|min:20|max:20',
            'so_trang' => 'required',
            'tac_gia' => 'required',
            'the_loai' => 'required',
            'nam_xuat_ban' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ten_sach.required' => 'Tên sách không được để trống!',
            'isbn.required' => 'ISNB không được để trống!',
            'isbn.min' => 'ISNB gồm 20 số!',
            'isbn.max' => 'ISNB không được quá 20 số!',
            'so_trang.required' => 'Số trang không được để trống!',
            'tac_gia.required' => 'Tác giả không được để trống!',
            'the_loai.required' => 'Thể loại không được để trống!',
            'nam_xuat_ban.required' => 'Năn xuất bản không được để trống!',
        ];
    }
}
