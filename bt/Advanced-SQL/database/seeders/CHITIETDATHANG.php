<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CHITIETDATHANG extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoa toan bo du lieu va reset ID ve 1
        DB::table('CHITIETDATHANG')->truncate();
        $limit = 50;
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'SOHOADON'      => rand(1,50),
                'MAHANG'        => rand(1,100),
                'GIABAN'        => rand (10000*10, 50000*10),
                'SOLUONG'       => rand(1,3),
                'MUCGIAMGIA'    => rand (100*10, 500*10)
            ];
            DB::table('CHITIETDATHANG')->insert($data);
        }
    }
}
