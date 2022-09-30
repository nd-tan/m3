<?php

namespace Tests\Feature;

use App\Models\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LevelTest extends TestCase
{
    use WithFaker;//tao du lieu gia
    public function test_route_level()
    {
        $this->get('/index')->assertStatus(200);//kiem tra URL /levels co ton tai voi method GET ko - xem tat ca
        $this->get('/add')->assertStatus(200);//kiem tra URL /levels/create co ton tai voi method GET ko - trang them moi
        $this->post('/store')->assertStatus(200);//kiem tra URL /levels co ton tai voi method POST ko - xu ly them moi
        // $this->get('/edit/1')->assertStatus(200);//kiem tra URL /levels/1 co ton tai voi method GET ko - trang xem chi tiet
        // // $this->get('/levels/1/edit')->assertStatus(200);//kiem tra URL /levels/1/edit co ton tai voi method GET ko - trang chinh sua
        // // $this->put('/levels/1')->assertStatus(200);//kiem tra URL /levels co ton tai voi method PUT ko - xu ly chinh sua
        // $this->delete('/destroy/1')->assertStatus(200);//kiem tra URL /levels co ton tai voi method GET ko - xu ly xoa
    }
     /*
    Kiem tra chuc nang them moi dung factory
    - Tao factory ( TenModelFactory ) bang lenh:
    php artisan make:factory LevelFactory
    - Xem file duoc tao ra trong database/factories
    - Trong ham definition return ve mang la cac truong trong CSDL, bo qua cac truong cho phep NULL, hoac de nguyen
        return [
            'name' => fake()->name(),
        ];
    */
    public function test_create_level_by_factory()
    {
        $level = Level::factory(Level::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($level);//kiem tra ket qua tra ve co NULL hay khong
    }
     /*
    Kiem tra chuc nang them moi dung fillable
    - Xem laravel doc: Mass Assignment
    - https://laravel.com/docs/9.x/eloquent#mass-assignment
    Trong Level model khai bao thuoc tinh fillable
    protected $fillable = ['title'];
    */
    public function test_create_level_by_fillable()
    {
        $level = new Level();
        $data = [
            'name' => $this->faker->word
        ];
        $this->assertInstanceOf(Level::class, $level->create($data));//kiem tra ket qua tra ve co phai la doi tuong Level ko
    }
    // //kiem tra chuc nang cap nhat item
    public function test_update_level()
    {
        $level = Level::where('id','>',0)->first();//cap nhat ket qua dau tien
        $level->name = 'name1';
        $this->assertTrue($level->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // //kiem tra chuc nang xoa item
    public function test_delete_level()
    {
        $level = Level::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($level->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }


}
