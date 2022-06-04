<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'full_name',
        'login',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
