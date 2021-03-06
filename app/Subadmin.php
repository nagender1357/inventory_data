<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Subadmin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
