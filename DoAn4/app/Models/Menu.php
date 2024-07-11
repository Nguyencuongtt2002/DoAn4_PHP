<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'MaMenuCha',
        'TenMenu',
        'STT',
        'TrangThai',
        'link',
    ];
    protected $table ='menu';
}
