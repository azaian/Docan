<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souq extends Model
{
    protected $table='souqs';
    protected $fillable=['cat_id','product_id','user_id'];

    public static function souq($id){
         return self::orderBy('id','DESC')->where('user_id',$id)->paginate('3');
    
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public static function souqs(){
           return self::orderBy('id','DESC')->paginate('15');
    }
    public static function souqq($id){
         return self::orderBy('id','DESC')->where('cat_id',$id)->limit('5')->get();
    }
    public static function pro($id){
        return self::where('product_id',$id)->get();
    }
    
    public function prod(){
        return $this->belongsTo('App\Product', 'product_id' ,'id');
    }
}


