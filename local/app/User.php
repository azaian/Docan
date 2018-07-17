<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','country','address','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function shop(){
         return $this->hasMany('App\Shop','user_id')->where('user_id','$id')->get();
     }

     public function thisShop($id){
         return $this->hasOne('App\Shops_follower')->where('shop_id', $id)->first();
     }

     public function product(){
                 return $this->belongsToMany('App\Product','souqs','user_id','product_id');

     }
     public function souq(){
         return $this->hasMany('App\souq','user_id');
     }
}
