<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gioithieu extends Model
{
    use HasFactory;
    protected $fillable =[
        'MaGioiThieu',
        'TieuDe',
        'NoiDung',
        'Anh',
    ];
    protected $table ='gioithieu';
}
