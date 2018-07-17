<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shops_products extends Model
{
    protected $table = 'product_shop';
    protected $hidden = ['created_at', 'updated_at',];
    protected $fillable = ['product_id', 'shop_id'];
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
