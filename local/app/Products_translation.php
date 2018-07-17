<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_translation extends Model
{
    protected $table='products_translations';
            protected $hidden=['created_at','updated_at',];
            protected $fillable=['name','details','metatitle','meta_keywords','meta_desc','lang','product_id'];
            public function product(){
               return $this->belongsTo('App\Product');
            }
}
