<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonnhap extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'nhacungcap_id',
        'users_id',
        
    ];
    protected $table ='hoadonnhap';
}
