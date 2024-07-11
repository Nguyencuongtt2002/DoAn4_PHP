<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Type;

class Loaisanpham extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'TenLoaiSanPham',
    ];
    protected $table ='loaisanpham';
}


