<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class KHACHHANG extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoa toan bo du lieu va reset ID ve 1
        DB::table('KHACHHANG')->truncate();
        
        $limit = 14;
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'TENCONGTY'         => $this->randomFirstName().' '.$this->randomLastName(),
                'DIACHI'            => $this->randomAdress(),
                'DIENTHOAI'         => $this->randomPhone(),
                'FAX'               => $this->randomPhone()
            ];

            $data['EMAIL']          = $this->randomEmail( Str::slug($data['TENCONGTY']) );
            $data['TENGIAODICH']    = 'Mr ' . $data['TENCONGTY'];
            $data['TENCONGTY']      = 'Công ty ' . $data['TENCONGTY'];
            
            
            DB::table('KHACHHANG')->insert($data);
        }
    }

    private function randomEmail($email = ''){
        return $email.'_'.time().'@gmail.com';
    }

    private function randomFirstName(){
        $first_name_str     = 'Nguyễn,Trần,Lê,Phạm,Phan,Võ,Hoàng,Đặng,Bùi,Đỗ,Hồ,Ngô,Dương,Lý';
        $first_name_arrs    = explode(',',$first_name_str);
        $rand_index         = rand(0,count($first_name_arrs)-1);
        return $first_name_arrs[$rand_index];
    }

    private function randomLastName(){
        $first_name_str     = 'Anh,Trang,Linh,Phương,Hương,Thảo,Hà,Huyền,Ngọc,Hằng,Giang,Nhung,Yến,Nga,Mai,Thu,Hạnh,Vân,Hoa,Hiền';
        $first_name_arrs    = explode(',',$first_name_str);
        $rand_index         = rand(0,count($first_name_arrs)-1);
        return $first_name_arrs[$rand_index];
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
