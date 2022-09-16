<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class NHACUNGCAP extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoa toan bo du lieu va reset ID ve 1
        DB::table('NHACUNGCAP')->truncate();
        
        $providers = [
            'Việt Tiến',
            'VINAMILK',
            'NIKE',
            'ADIDAS'
        ];

        foreach( $providers as $provider ){
            $data = [
                'TENCONGTY'     => $provider,
                'TENGIAODICH'   => $provider,
                'DIACHI'        => $this->randomAdress(),
                'DIENTHOAI'     => $this->randomPhone(),
                'FAX'           => $this->randomPhone(),
                'EMAIL'         => $this->randomEmail(Str::slug($provider))
            ];
            DB::table('NHACUNGCAP')->insert($data);
        }
    }

    private function randomEmail($email = ''){
        return $email.'@gmail.com';
    }
    private function randomAdress(){
        $adress_arr = ['Ha Noi','Thanh Hoa','Nghe An','Ha Tinh','Quang Binh','Quang Tri','Hue','Da Nang'];
        return $adress_arr[array_rand($adress_arr)];
    }
    private function randomPhone(){
        $sequence = '';
        for ($i = 0; $i < 7; ++$i) {
            $sequence .= rand(0, 8);
        }

        $numberPrefixes = ['0812', '0813', '0814', '0815', '0816', '0817', '0818', '0819', '0909', '0908'];

        return $numberPrefixes[array_rand($numberPrefixes)].$sequence;
    }
}
