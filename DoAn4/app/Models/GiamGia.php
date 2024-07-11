<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiamGia extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'sanpham_id',
        'PhanTramGiamGia',
        'ThoiGianBatDau',
        'ThoiGianKetThuc',
        'DonGia',
        'TrangThai',
    ];
    protected $table ='giamgia';
}
