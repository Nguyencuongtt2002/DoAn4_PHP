<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongSoKyThuat extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'TenThongSo',
        'MoTaThongTin',
        'sanpham_id',
        
    ];
    protected $table ='thongsosanpham';

    public function sanpham()
    {
        return $this->belongsTo(sanpham::class, 'id');
    }

}
