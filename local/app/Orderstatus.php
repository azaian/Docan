<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    protected $table = "order_status";
    protected $fillable=['order_id','status','notes'];
    public function order(){
    return $this->belongsTo('App\Order');
    }
}
