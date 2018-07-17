<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
      protected $table="attributes";
      protected $hidden = ['created_at','updated_at',];
      protected $fillable=['id','type'];
      
      public function dropdown(){
          return $this->hasMany('App\Dropdown','attribute_id')->get();

      }

      public function attribute_translation($lang){
          return $this->hasMany("App\Attribute_translation",'attribute_id')->where('lang',$lang)->first();
      }


      
      
      public function p_attr(){
          return $this->hasMany('App\Products_attributes', 'attribute_id', 'id');
    }
    
    
    
    
    
    

    //    mn3m code
    public function attribute_trans(){
        return $this->hasMany("App\Attribute_translation",'attribute_id');
    }
}


