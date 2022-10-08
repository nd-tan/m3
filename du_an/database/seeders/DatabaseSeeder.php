<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Position;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importPositions();
        $this->importRoles();
        $this->importPositionRole();
        $this->importRole();
        $this->importUser();
        $this->importPositionRole_1();
        $this->importSupplier();
        $this->importCategory();
        $this->importProduct();
        $this->importCustomer();
        $this->importOrder();
        $this->importOrderDetail();
    }
    public function importRoles()
    {
        $groups = ['Category', 'User', 'Supplier','Product','Position'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'position_name' => $group,

                ]);
            }
        }
    }

    public function importRole()
    {
        $groups = ['Customer', 'Order'];
        $actions = ['viewAny', 'view'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'position_name' => $group,

                ]);
            }
        }
    }

    public function importPositionRole()
    {
        for ($i = 1; $i <= 35; $i++) {
            DB::table('position_role')->insert([
                'position_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
    public function importPositionRole_1()
    {
        for ($i = 36; $i <= 39; $i++) {
            DB::table('position_role')->insert([
                'position_id' => 1,
                'role_id' => $i,
            ]);
        }
    }

    public function importPositions()
    {
        $userGroup = new Position();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new Position();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new Position();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();


        $userGroup = new Position();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }

    public function importUser()
    {
        $user = new User();
        $user->name = 'Mai Xuân Cường';
        $user->email = 'cuong@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2002/09/24';
        $user->address = 'Quảng Trị';
        $user->image = 'cuong.jpg';
        $user->phone = '0935779035';
        $user->gender = 'Nam';
        $user->position_id = '2';
        $user->save();

        $user = new User();
        $user->name = 'Phùng Văn Phi';
        $user->email = 'phi@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2002/04/24';
        $user->address = 'Quảng Trị';
        $user->image = 'phi.jpg';
        $user->phone = '0777333274';
        $user->gender = 'Nam';
        $user->position_id = '3';
        $user->save();

        $user = new User();
        $user->name = 'Hoàng Thanh Hải';
        $user->email = 'hai@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->position_id = '3';
        $user->gender = 'Nam';
        $user->image = 'hai.jpg';
        $user->save();

        $user = new User();
        $user->name = 'Nguyễn Ngọc Dương';
        $user->email = 'duong@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2001/03/21';
        $user->phone = '0123456789';
        $user->address = 'Quảng Trị';
        $user->position_id = '4';
        $user->gender = 'Nam';
        $user->image = 'duong.jpg';
        $user->save();

        $user = new User();
        $user->name = 'Trần Ngọc Vinh';
        $user->email = 'vinh@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2003/11/11';
        $user->phone = '0123456788';
        $user->address = 'Quảng Trị';
        $user->position_id = '1';
        $user->gender = 'Nam';
        $user->image = 'vinh.jpg';
        $user->save();
    }

    public function importSupplier()
    {
        $sup = new Supplier();
        $sup->name = 'Jinquan';
        $sup->address = 'KCN Nam đông hà';
        $sup->phone = '0981237649';
        $sup->email = 'jinquan@gmail.com';
        $sup->save();

        $sup = new Supplier();
        $sup->name = 'Hoa Thọ';
        $sup->address = 'KCN Nam đông hà';
        $sup->phone = '09853734268';
        $sup->email = 'hoatho@gmail.com';
        $sup->save();
    }

    public function importCategory()
    {
        $cate = new Category();
        $cate->name = 'Chó Cỏ';
        $cate->save();

        $cate = new Category();
        $cate->name = 'Chó Tuyết';
        $cate->save();
    }

    public function importProduct()
    {
        $pro = new Product();
        $pro->name = 'Milu';
        $pro->age = '2 tuần';
        $pro->color = 'xám';
        $pro->gender = 'Đực';
        $pro->price = '2000000';
        $pro->quantity = '5';
        $pro->image = 'co.jpg';
        $pro->category_id = '1';
        $pro->supplier_id = '1';
        $pro->user_id = '1';
        $pro->save();

        $pro = new Product();
        $pro->name = 'Đôn Chề';
        $pro->age = '5 tuần';
        $pro->color = 'trắng';
        $pro->gender = 'Cái';
        $pro->price = '5000000';
        $pro->quantity = '5';
        $pro->image = 'tuyet.jpg';
        $pro->category_id = '2';
        $pro->supplier_id = '2';
        $pro->user_id = '1';
        $pro->save();

        $pro = new Product();
        $pro->name = 'Gu Chì';
        $pro->age = '3 tuần';
        $pro->color = 'đen';
        $pro->gender = 'Cái';
        $pro->price = '1000000';
        $pro->quantity = '5';
        $pro->image = 'guchi.jpg';
        $pro->category_id = '1';
        $pro->supplier_id = '1';
        $pro->user_id = '1';
        $pro->save();

        $pro = new Product();
        $pro->name = 'Đi Ò';
        $pro->age = '4 tuần';
        $pro->color = 'trắng';
        $pro->gender = 'Cái';
        $pro->price = '3000000';
        $pro->quantity = '5';
        $pro->image = 'dio.jpg';
        $pro->category_id = '2';
        $pro->supplier_id = '2';
        $pro->user_id = '1';
        $pro->save();

    }
    public function importCustomer()
    {
        $item = new Customer();
        $item->name = 'Phùng Văn Phi';
        $item->address = 'Gio Linh';
        $item->email = 'phi@gmailcom';
        $item->phone = '0912345678';
        $item->password = Hash::make('123456');
        $item->save();

        $item = new Customer();
        $item->name = 'Mai Xuân Cường';
        $item->address = 'Cam Lộ';
        $item->email = 'cuong@gmailcom';
        $item->phone = '0934678123';
        $item->password = Hash::make('123456');
        $item->save();

        $item = new Customer();
        $item->name = 'Trần Ngọc Linh';
        $item->address = 'Gio Linh';
        $item->email = 'linh@gmailcom';
        $item->phone = '0987654321';
        $item->password = Hash::make('123456');
        $item->save();
    }
    public function importOrder()
    {
        $item = new Order();
        $item->customer_id = 1;
        $item->total = 12000000;
        $item->date_at = date('Y-m-d H:i:s');
        $item->note = "giao buổi chiều";
        $item->save();

        $item = new Order();
        $item->customer_id = 2;
        $item->total = 1000000;
        $item->date_at = date('Y-m-d H:i:s');
        $item->note = "giao buổi sáng";
        $item->save();

        $item = new Order();
        $item->customer_id = 3;
        $item->total = 3000000;
        $item->date_at = date('Y-m-d H:i:s');
        $item->note = "giao buổi tối";
        $item->save();
    }
    public function importOrderDetail()
    {
        $item = new OrderDetail();
        $item->order_id = 1;
        $item->product_id = 1;
        $item->quantity = 1;
        $item->total = 2000000;
        $item->save();

        $item = new OrderDetail();
        $item->order_id = 1;
        $item->product_id = 2;
        $item->quantity = 2;
        $item->total = 10000000;
        $item->save();

        $item = new OrderDetail();
        $item->order_id = 2;
        $item->product_id = 3;
        $item->quantity = 1;
        $item->total = 1000000;
        $item->save();

        $item = new OrderDetail();
        $item->order_id = 3;
        $item->product_id = 4;
        $item->quantity = 1;
        $item->total = 3000000;
        $item->save();
    }
}
