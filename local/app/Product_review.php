<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_review extends Model
{
    protected $table='product_review';
    
    protected $fillable=['product_id','review',];
    protected $hidden=['created_at','updated_at',];
    
  public function product(){
               return $this->belongsTo('App\Product');
  }
    
    
}
