<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shops_follower extends Model
{
    protected $table='shops_follower';
    protected $fillable=['shop_id','user_id'];
        protected $hidden=['created_at','updated_at',];

        public function shop(){
       return $this->belongsTo('App\Shop','shop_id','id');
    }
 
    
    
}
