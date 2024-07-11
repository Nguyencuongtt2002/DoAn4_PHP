<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'donhang_id',
        'sanpham_id',
        'SoLuong',
        'GiaTien',
    ];
    protected $table ='chitietdonhang';

    public function donhang()
    {
        return $this->belongsTo(DonHang::class, 'donhang_id');
    }

}
