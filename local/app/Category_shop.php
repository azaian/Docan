<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_shop extends Model
{
    protected $table='category_shop';
    protected $fillable=['category_id','shop_id'];
}
