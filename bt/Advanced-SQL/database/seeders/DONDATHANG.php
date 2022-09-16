<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DONDATHANG extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoa toan bo du lieu va reset ID ve 1
        DB::table('DONDATHANG')->truncate();
        $limit = 50;
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'MAKHACHHANG'   => rand(1,14),
                'MANHANVIEN'    => rand(1,50),
                'NGAYDATHANG'   => $this->randomOrderDay(),
                'NGAYGIAOHANG'  => $this->randomOrderDay(),
                'NGAYCHUYENHANG'=> $this->randomOrderDay(),
                'NOIGIAOHANG'   => $this->randomOrderDay()
            ];
            DB::table('DONDATHANG')->insert($data);
        }
    }

    private function randomOrderDay(){
        $min        = strtotime("23 years ago");
        $max        = strtotime("18 years ago");
        $rand_time  = rand($min, $max);
        $birth_date = date('Y-m-d', $rand_time);
        return $birth_date;
    }
}
