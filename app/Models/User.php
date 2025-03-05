<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey(); // يُرجع المعرف الفريد للمستخدم (id)
    }

    public function getJWTCustomClaims()
    {
        return []; // يمكنك إضافة بيانات إضافية هنا إذا لزم الأمر
    }
}
