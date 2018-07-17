<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table='shops';
    protected $fillable=['logo','phone','mobile','email','user_id'];
    protected $hidden=['created_at','updated_at',];
    public function product(){
        return $this->belongsToMany('App\Product');
    }
    public function shops_trans($lang){
        return $this->hasMany('App\Shops_translation','shop_id')->where('lang',$lang)->first();
    }
    public function user(){
       return $this->belongsTo('App\User');
    }
   public function category(){
       return $this->belongsToMany('App\Category', 'category_shop', 'shop_id','category_id');
   }
   public static function shops($id){
       return self::where('user_id',$id)->orderBy('id','DESC')->paginate('3');
   }
   public static function vipshop(){
       return self::where('vip','1')->orderBy('id','DESC')->get();
   }
   public function favorite($id){
       return $this->hasMany('App\Shops_favorite','shop_id')->where('user_id',$id)->first();
   }
   public function fallow($id){
         return $this->hasMany('App\Shops_follower','shop_id')->where('user_id',$id)->first();
   }

   public function followers()
   {
       return $this->hasMany('App\Shops_follower','shop_id','id');
   }
   
  

}
