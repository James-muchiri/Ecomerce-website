<?php

namespace App;
use Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;

class Eshopusers extends  Authenticatable
{
    
    protected $fillable = [
        'first_name','middle_name','last_name','phone_no', 'address', 'email','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
