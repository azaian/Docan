<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table="categories";
      protected $hidden = ['created_at','updated_at',];
      protected $fillable=['perant_id'];
    
      public static function maincategories(){
       
     	 return self::where("perant_id",0)->get();
      }
    
    public function cat_trans($lang){
		return $this->hasMany("App\Category_translation","category_id")->where('lang',$lang)->first();
	}
    public function maincat(){
      return $this->belongsTo("\App\Category","perant_id");
    }
    
    public function subcat(){
    	return $this->hasMany("App\Category","perant_id");
    }
    
    public function attribute(){
        return 
            $this->belongsToMany('App\Attribute','category_attribute','category_id','attribute_id');
    }
    public function shop(){

                return $this->belongsToMany('App\Shop', 'category_shop', 'category_id','shop_id');
    }
    public function shops($id){
                return $this->belongsToMany('App\Shop', 'category_shop', 'category_id','shop_id');
    }
    
    public function product(){
        return $this->belongsToMany('App\Product','souqs','cat_id','product_id');
    }

}
