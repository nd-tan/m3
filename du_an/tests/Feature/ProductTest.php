<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use WithFaker;//tao du lieu gia
    public function test_create_product_by_factory()
    {
        $product = Product::factory(Product::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($product);//kiem tra ket qua tra ve co NULL hay khong
    }

    public function test_create_product_by_fillable()
    {
        $product = new Product();
        $data = [
            'name' => $this->faker->name(),
            'age' => $this->faker->word,
            'color' => $this->faker->colorName(),
            'gender' => $this->faker->word,
            'price' => mt_rand(100,1000),
            'quantity' => mt_rand(1,100),
            'image' => $this->faker->image(),
            'category_id' => mt_rand(1,2),
            'supplier_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,4),
        ];
        $this->assertInstanceOf(Product::class, $product->create($data));//kiem tra ket qua tra ve co phai la doi tuong Level ko
    }

    public function test_create_product_by_save()
    {
        $product=new Product();
        $product->name=$this->faker->name();
        $product->age=$this->faker->word();
        $product->color=$this->faker->colorName();
        $product->gender=$this->faker->word;
        $product->price= mt_rand(1,100);
        $product->quantity=mt_rand(1,10);
        $product->image=$this->faker->image();
        $product->category_id=1;
        $product->supplier_id=1;
        $product->user_id=2;
        $this->assertTrue($product->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang cap nhat item
    public function test_update_product()
    {
        $product = Product::where('id','>',0)->first();//cap nhat ket qua dau tien
        $product->name=$this->faker->name();
        $product->age=$this->faker->word();
        $product->color=$this->faker->colorName();
        $product->gender=$this->faker->word;
        $product->price= mt_rand(1,100);
        $product->quantity=mt_rand(1,10);
        $product->image=$this->faker->image();
        $product->category_id=2;
        $product->supplier_id=2;
        $product->user_id=4;
        $this->assertTrue($product->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang xoa item
    public function test_delete_product()
    {
        $product = Product::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($product->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_restore_product()
    {
        $product = Product::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($product->restore());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_force_delete_product()
    {
        $product = Product::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($product->forceDelete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}
