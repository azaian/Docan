<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_favorite extends Model
{
    //

    protected $table='product_favorite';

    public function products($id){
        return $this->hasMany('App\Products')->where('user_id', $id)->get();
    }
    
    
    public function prod(){
        return $this->belongsTo('App\Product', 'product_id' ,'id');
    }
}
