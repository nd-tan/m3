<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MATHANG', function (Blueprint $table) {
            $table->increments('MAHANG');
            $table->string('TENHANG')->nullable();
            $table->integer('MACONGTY')->nullable();
            $table->integer('MALOAIHANG')->nullable();
            $table->integer('SOLUONG')->nullable();
            $table->string('DONVITINH')->nullable();
            $table->double('GIAHANG')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MATHANG');
    }
}
