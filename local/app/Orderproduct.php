<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    protected $table = "order_products";
    protected $fillable=['product_id','order_id','quantity','price'];
    public function order(){
    return $this->belongsTo('App\Order');
    }

     public function products(){
    return $this->hasMany('App\Product');
    }

   
}
