<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietDatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHITIETDATHANG', function (Blueprint $table) {
            $table->integer('SOHOADON')->nullable();
            $table->integer('MAHANG')->nullable();
            $table->double('GIABAN')->nullable();
            $table->integer('SOLUONG')->nullable();
            $table->double('MUCGIAMGIA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CHITIETDATHANG');
    }
}
