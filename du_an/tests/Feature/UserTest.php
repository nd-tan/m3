<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;//tao du lieu gia
    public function test_create_user_by_factory()
    {
        $user = User::factory(User::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($user);//kiem tra ket qua tra ve co NULL hay khong
    }

    public function test_create_user_by_fillable()
    {
        $user = new User();
        $data = [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'image' => $this->faker->image(),
            'gender' => $this->faker->word(),
            'birthday' => $this->faker->date(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'position_id' => mt_rand(1,4),
        ];
        $this->assertInstanceOf(User::class, $user->create($data));//kiem tra ket qua tra ve co phai la doi tuong user ko
    }

    public function test_create_user_by_save()
    {
        $user=new User();
        $user->name=$this->faker->name();
        $user->address=$this->faker->address();
        $user->phone=$this->faker->phoneNumber();
        $user->image=$this->faker->image();
        $user->gender=$this->faker->word();
        $user->birthday=$this->faker->date();
        $user->email=$this->faker->email();
        $user->password=$this->faker->password();
        $user->position_id=mt_rand(1,4);
        $this->assertTrue($user->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang cap nhat item
    public function test_update_user()
    {
        $user = User::where('id','>',0)->first();//cap nhat ket qua dau tien
        $user->name=$this->faker->name();
        $user->address=$this->faker->address();
        $user->phone=$this->faker->phoneNumber();
        $user->image=$this->faker->image();
        $user->gender=$this->faker->word();
        $user->birthday=$this->faker->date();
        $user->email=$this->faker->email();
        $user->password=$this->faker->password();
        $user->position_id=mt_rand(1,4);
        $this->assertTrue($user->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang xoa item
    public function test_delete_user()
    {
        $user = User::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($user->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_restore_supplier()
    {
        $user = User::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($user->restore());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_force_delete_supplier()
    {
        $user = User::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($user->forceDelete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}
