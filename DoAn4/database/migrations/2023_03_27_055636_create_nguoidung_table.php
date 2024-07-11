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
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->id();
            $table->string('TaiKhoan');
            $table->string('MatKhau');
            $table->string('Email');
            $table->string('HoTen');
            $table->string('NgaySinh');
            $table->string('DiaChi');
            $table->string('SoDienThoai');
            $table->string('GioiTinh');
            $table->string('AnhDaiDien');
            $table->boolean('TrangThai')->default(false);
            $table->string('VaiTro');
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
        Schema::dropIfExists('nguoidung');
    }
};
