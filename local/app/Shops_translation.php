<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Shops_translation extends Model
{
    protected $table='shops_translations';
    protected $fillable=['name','description','keyword','address','lang','shop_id'];
     protected $hidden=['created_at','updated_at',];
     public function shop(){
         return $this->belongsTo('App\Shop');
     }
}
