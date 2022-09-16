<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class MATHANG extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoa toan bo du lieu va reset ID ve 1
        DB::table('MATHANG')->truncate();
        $limit = 100;
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'TENHANG'       => $this->randProductName(),
                'MACONGTY'      => rand(1,4),
                'MALOAIHANG'    => rand(1,7),
                'SOLUONG'       => rand(1,100),
                'DONVITINH'     => 'cai',
                'GIAHANG'        => rand (10000*10, 50000*10),
            ];
            DB::table('MATHANG')->insert($data);
        }
    }

    public function randProductName(){
        $items = [
            'thực phẩm loại '.rand(1,200),
            'hải sản loại '.rand(1,200),
            'giải khát loại '.rand(1,200),
            'quần áo loại '.rand(1,200),
            'y tế loại '.rand(1,200),
            'điện thoại loại '.rand(1,200),
            'máy tính loại '.rand(1,200)
        ];

        return $items[ array_rand($items) ];
    }
}
