<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_translation extends Model
{
       protected $table="attribute_translations";
      protected $hidden = ['created_at','updated_at',];
      protected $fillable=['name' , 'id'];
      public function attribute(){
          return $this->belongsTo('App\Attribute','attribute_id');
      }
       public function attribute_value($lang){
          return $this->hasMany("App\Attribute_value",'attribute_id')->where('lang',$lang)->first();
      }
      
}
