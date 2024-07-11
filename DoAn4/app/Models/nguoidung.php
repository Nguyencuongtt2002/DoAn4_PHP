<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'TaiKhoan',
        'MatKhau',
        'Email',
        'HoTen',
        'NgaySinh',
        'DiaChi',
        'SoDienThoai',
        'GioiTinh',
        'AnhDaiDien',
        'TrangThai',
        'VaiTro',
    ];
    protected $table ='nguoidung';
}
