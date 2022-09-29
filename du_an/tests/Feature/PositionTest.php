<?php

namespace Tests\Feature;

use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PositionTest extends TestCase
{
    use WithFaker;//tao du lieu gia
    public function test_create_position_by_factory()
    {
        $position = Position::factory(Position::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($position);//kiem tra ket qua tra ve co NULL hay khong
    }

    public function test_create_position_by_fillable()
    {
        $position = new Position();
        $data = [
            'name' => $this->faker->word
        ];
        $this->assertInstanceOf(Position::class, $position->create($data));//kiem tra ket qua tra ve co phai la doi tuong Level ko
    }

    public function test_create_position_by_save()
    {
        $position=new Position();
        $position->name=$this->faker->word;
        $this->assertTrue($position->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang cap nhat item
    public function test_update_position()
    {
        $position = Position::where('id','>',0)->first();//cap nhat ket qua dau tien
        $position->name = 'Trưởng phòng';
        $this->assertTrue($position->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    // // //kiem tra chuc nang xoa item
    public function test_delete_position()
    {
        $position = Position::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($position->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_restore_position()
    {
        $position = Position::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($position->restore());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
    public function test_force_delete_position()
    {
        $position = Position::withTrashed()->where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($position->forceDelete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}
