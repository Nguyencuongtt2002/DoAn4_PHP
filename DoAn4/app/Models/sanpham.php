<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'TenSP',
        'MoTa',
        'NgayTao',
        'Size',
        'loaisanpham_id',
        'thuonghieu_id',
        'AnhDaiDien',
    ];
    protected $table= 'sanpham';

    public function thongSoSanPham()
    {
        return $this->hasMany(ThongSoKyThuat::class, 'sanpham_id');
    }
}
