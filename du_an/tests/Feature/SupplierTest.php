<?php

namespace Tests\Feature;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    use WithFaker;//tao du lieu gia
    public function test_create_supplier_by_factory()
    {
        $supplier = Supplier::factory(Supplier::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($supplier);//kiem tra ket qua tra ve co NULL hay khong
    }

    public function test_create_supplier_by_fillable()
    {
        $supplier = new Supplier();
        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
        ];
        $this->assertInstanceOf(Supplier::class, $supplier->create($data));//kiem tra ket qua tra ve co phai la doi tuong supplier ko
    }

    public function test_create_supplier_by_save()
    {
        $supplier=new Supplier();
        $supplier->name=$this->faker->name();
        $supplier->email=$this->faker->email();
        $supplier->address=$this->faker->address();
        $supplier->phone=$this->faker->phoneNumber();
        $this->assertTrue($supplier->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang cap nhat item
    public function test_update_supplier()
    {
        $supplier = Supplier::where('id','>',0)->first();//cap nhat ket qua dau tien
        $supplier->name = $this->faker->name();
        $supplier->email = $this->faker->email();
        $supplier->address =$this->faker->address();
        $supplier->phone = $this->faker->phoneNumber();
        $this->assertTrue($supplier->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang xoa item
    public function test_delete_supplier()
    {
        $supplier = Supplier::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($supplier->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_restore_supplier()
    {
        $supplier = Supplier::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($supplier->restore());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_force_delete_supplier()
    {
        $supplier = Supplier::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($supplier->forceDelete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}
