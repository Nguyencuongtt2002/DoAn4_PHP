<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giamgia', function (Blueprint $table) {
            $table->id();
            $table->sanpham_id();
            $table->int('PhanTramGiamGia');
            $table->date('ThoiGianBatDau');
            $table->date('ThoiGianKetThuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giamgia');
    }
};
