<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gia extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'sanpham_id',
        'NgayBD',
        'NgayKT',
        'DonGia',
    ];
    protected $table ='gia';
}
