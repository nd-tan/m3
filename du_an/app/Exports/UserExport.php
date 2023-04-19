<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserExport implements FromCollection, WithHeadings, WithColumnFormatting, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users')->join('positions', 'users.position_id', '=', 'positions.id')
        ->select('users.name' ,'users.address','users.phone','users.gender','users.birthday','users.email','positions.name as posi_name')->get();
    }
	/**
	 * @return array
	 */
	public function headings(): array {
        return [['Tên người dùng', 'Địa chỉ', 'Số điện thoại', 'Giới tính', 'Ngày sinh', 'Email', 'Chức vụ']];
	}
	/**
	 * @return array
	 */
	public function columnFormats(): array {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
	}
	/**
	 * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet
	 * @return mixed
	 */
	public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet) {
        return [
            1 => ['font' => ['bold'=> true, 'size' => 15]],
            2 => ['font' => ['size' => 12]]
        ];
	}
}
