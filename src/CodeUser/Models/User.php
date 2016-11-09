<?php

namespace CodePress\CodeUser\Models;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Authorizable
{

    protected $table = 'codepress_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
