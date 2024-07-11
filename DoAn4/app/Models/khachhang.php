<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'TenKhachHang',
        'DiaChi',
        'SoDienThoai',
        'Email',
    ];
    protected $table ='khachhang';
}
