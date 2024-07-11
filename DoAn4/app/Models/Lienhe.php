<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lienhe extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'ThongTinLienHe',
        'Email',
        'SoDienThoai',
        'CoSoLienHe',
    ];
    protected $table ='lienhe';
}
