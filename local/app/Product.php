<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $table = 'products';
protected $hidden = ['created_at', 'updated_at',];
protected $fillable = ['price', 'num', 'model', 'image'];

/*
  public function attribute(){
  return $this->belongsToMany('App\Attribute', 'product_attribute', 'product_id', 'attribute_id');
  }
 */

public static function products($id){
return self::where('id', $id)->get();
}

public function images(){
return $this->hasMany('App\Product_image');
}

public function review(){
return $this->hasMany('App\Product_review');
}

public function users(){
return $this->hasMany('App\User');
}


public function product_trans($lang)
{
return $this->hasMany('App\Products_translation')->where('lang', $lang)->first();
}

public function favorite()
{
return $this->hasOne('App\Product_favorite')->where('user_id', auth()->user()->id)->first();
}

public function category(){
return $this->belongsToMany('App\Category', 'souqs', 'product_id', 'cat_id');
}

public function user(){
return $this->belongsToMany('App\User', 'souqs', 'product_id', 'user_id');

}
public function shop(){
return $this->belongsToMany('App\Shop', 'product_shop', 'product_id', 'shop_id');
}


public static function product($id){
return self::orderBy('id', 'DESC')->where('id', $id)->get();

}

/////mallah code////

public function favo(){
   return $this->hasMany('App\Product_favorite', 'product_id', 'id');
}

public function p_attr($lang){
  return $this->hasMany('App\Products_attributes', 'product_id', 'id')->where('lang', $lang)->get();
}
public function productshop(){
    return $this->hasOne('App\Shops_peoducts','product_id');
}

}
