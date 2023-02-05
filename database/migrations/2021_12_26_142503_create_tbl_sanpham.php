<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->increments('id_sanpham');
            $table->string('tensanpham', 50)->nullable();
            $table->string('hinhanh',120)->nullable();
            $table->text('motangan', 200)->nullable();
            $table->text('motadai', 250)->nullable();
            $table->integer('id_danhmuc')->unsigned();
            $table->timestamps();
            $table->foreign('id_danhmuc')->references('id_prod')->on('tbl_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sanpham');
    }
}
