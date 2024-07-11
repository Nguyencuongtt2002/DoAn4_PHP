<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'name',
        'email',
        'email_verified_at',
        'avatar',
        'phone',
        'password',
        'role',
        'status',
        'rememberToken',
    ];
    protected $table= 'users';
}
