<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $task = new User();
        $task->name = "Tạo project";
        $task->email = "tan@gmail.com";
        $task->password = "1";
        $task->save();

        // $task = new User();
        // $task->id = 2;
        // $task->title = "Tạo migration";
        // $task->content = "Tạo migration cho bảng categories";
        // $task->due_date = "2018-09-26";
        // $task->image  = "";
        // $task->save();

        // $task = new User();
        // $task->id = 3;
        // $task->title = "Tạo seeder";
        // $task->content = "Tạo dữ liệu cho bảng categories";
        // $task->due_date = "2018-09-26";
        // $task->image  = "";
        // $task->save();

        // $task = new User();
        // $task->id = 4;
        // $task->title = "Câu lệnh if";
        // $task->content = "Câu lệnh if trong Laravel";
        // $task->due_date = "2018-09-26";
        // $task->image  = "";
        // $task->save();
    }
}
