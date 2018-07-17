<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable=[
        'fullname','username','email','password','image','remember_token'
    ];
       protected $hidden = [
        'password', 'remember_token',
    ];
   
}
