<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class LOAIHANG extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoa toan bo du lieu va reset ID ve 1
        DB::table('LOAIHANG')->truncate();

        $items = [
            'thực phẩm',
            'hải sản',
            'giải khát',
            'quần áo',
            'y tế',
            'điện thoại',
            'máy tính'
        ];

        foreach( $items as $item ){
            $data = [
                'TENLOAIHANG'     => $item,
            ];
            DB::table('LOAIHANG')->insert($data);
        }
    }
}
