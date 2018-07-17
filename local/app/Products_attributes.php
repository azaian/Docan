<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_attributes extends Model
{
    protected $table='product_attribute';
    protected $fillable=['lang','product_id','attribute_id','value'];
    
    
    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
    
    public function attribute(){
        return $this->belongsTo('App\Attribute','attribute_id','id');
    }
    
}
