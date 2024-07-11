<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'TieuDe',
        'NoiDung',
        'AnhTinTuc',
        'users_id',
        
    ];
    protected $table ='tintuc';
}
