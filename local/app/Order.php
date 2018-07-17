<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{ 
    protected $table = "orders";
    protected $fillable=['total','user_id'];
    public function users(){
    return $this->belongsTo('App\User' , 'user_id' , 'id');
    }

    public function orderproducts(){
    return $this->belongsToMany('App\Product' ,'order_products' , 'order_id','id');
    }

    public function orderstatus(){
    return $this->hasMany('App\Orderstatus' , 'order_id' , 'id');
    }

    public function ordershipping(){
    return $this->hasMany('App\Ordershipping' , 'order_id' , 'id');
    }
    
    public function returns(){
    return $this->hasMany('App\Return' , 'order_id' , 'id');
    } 

}
