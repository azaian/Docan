<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    protected $table='dropdowns';
    protected $fillable=['id', 'attribute_id','value'];

    public function attribute(){
        return $this->belongsTo('App\Attribute','attribute_id');
    }
    
     public function attribute_translation($lang){
          return $this->belongsTo("App\Attribute_translation",'attribute_id')->where('lang',$lang)->first();
      }  
}
