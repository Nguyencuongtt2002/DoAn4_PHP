<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'khachhang_id',
        'TrangThai',
    ];
    protected $table ='donhang';
    public function chitietdonhangs()
    {
        return $this->hasMany(ChitietDonhang::class, 'donhang_id');
    }

}
