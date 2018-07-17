<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordershipping extends Model
{
  protected $table = "order_shipping";
  protected $fillable=['order_id','payment','city','governate','address','post_num','country','mark'];
  public function order(){
    return $this->belongsTo('App\Order');
    }

}
