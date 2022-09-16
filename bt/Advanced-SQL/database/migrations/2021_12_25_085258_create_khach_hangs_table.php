<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KHACHHANG', function (Blueprint $table) {
            $table->increments('MAKHACHHANG');
            $table->string('TENCONGTY')->nullable();
            $table->string('TENGIAODICH')->nullable();
            $table->string('DIACHI')->nullable();
            $table->string('EMAIL')->unique();
            $table->string('DIENTHOAI')->nullable();
            $table->string('FAX')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('KHACHHANG');
    }
}
