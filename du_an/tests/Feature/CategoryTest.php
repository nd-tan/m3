<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use WithFaker;//tao du lieu gia

    // public function test_route_category()
    // {
    //     $this->get('/categories')->assertStatus(200);//kiem tra URL /levels co ton tai voi method GET ko - xem tat ca
    //     $this->get('/categories/add')->assertStatus(200);//kiem tra URL /levels/create co ton tai voi method GET ko - trang them moi
    //     // $this->post('/categories/store')->assertStatus(200);//kiem tra URL /levels co ton tai voi method POST ko - xu ly them moi
    //     $this->get('/categories/edit/2')->assertStatus(200);//kiem tra URL /levels/1 co ton tai voi method GET ko - trang xem chi tiet
    //     // $this->put('/categories/update/1')->assertStatus(200);//kiem tra URL /levels/1 co ton tai voi method GET ko - trang xem chi tiet
    //     // $this->delete('/categories/destroy/5')->assertStatus(200);//kiem tra URL /levels co ton tai voi method GET ko - xu ly xoa
    //     $this->get('/categories/softdelete')->assertStatus(200);//kiem tra URL /levels/1/edit co ton tai voi method GET ko - trang chinh sua
    //     // $this->get('/categories/restore/1')->assertStatus(200);//kiem tra URL /levels co ton tai voi method PUT ko - xu ly chinh sua
    //     // $this->delete('/categories/deleted/5')->assertStatus(200);//kiem tra URL /levels co ton tai voi method GET ko - xu ly xoa
    // }

    public function test_create_category_by_factory()
    {
        $category = Category::factory(Category::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($category);//kiem tra ket qua tra ve co NULL hay khong
    }

    public function test_create_category_by_fillable()
    {
        $category = new Category();
        $data = [
            'name' => $this->faker->word
        ];
        $this->assertInstanceOf(Category::class, $category->create($data));//kiem tra ket qua tra ve co phai la doi tuong Level ko
    }

    public function test_create_category_by_save()
    {
        $category=new Category();
        $category->name=$this->faker->word;
        $this->assertTrue($category->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang cap nhat item
    public function test_update_category()
    {
        $category = Category::where('id','>',0)->first();//cap nhat ket qua dau tien
        $category->name = 'Chó Fox';
        $this->assertTrue($category->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang xoa item
    public function test_delete_category()
    {
        $category = Category::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($category->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_restore_category()
    {
        $category = Category::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($category->restore());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_force_delete_category()
    {
        $category = Category::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($category->forceDelete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}
