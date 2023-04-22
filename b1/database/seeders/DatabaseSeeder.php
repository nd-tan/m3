<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importUser();
    }
    public function importUser(){
        $user = new User();
        $user->id = 1;
        $user->name = 'viet';
        $user->email = 'viet@gmail.com';
        $user->password = Hash::make('12345');
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'thuan';
        $user->email = 'thuan@gmail.com';
        $user->password = Hash::make('12345');
        $user->save();

        $user = new User();
        $user->id = 3;
        $user->name = 'hai';
        $user->email = 'hai@gmail.com';
        $user->password = Hash::make('12345');
        $user->save();

        $user = new User();
        $user->id = 4;
        $user->name = 'cuong';
        $user->email = 'cuong@gmail.com';
        $user->password = Hash::make('12345');
        $user->save();

        $user = new User();
        $user->id = 5;
        $user->name = 'duong';
        $user->email = 'duong@gmail.com';
        $user->password = Hash::make('12345');
        $user->save();

        $user = new User();
        $user->id = 6;
        $user->name = 'nhan';
        $user->email = 'nhan@gmail.com';
        $user->password = Hash::make('12345');
        $user->save();
    }
}
