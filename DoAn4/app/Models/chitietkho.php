<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietkho extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'kho_id',
        'sanpham_id',
        'SoLuong',
        
    ];
    protected $table ='chitietkho';
}