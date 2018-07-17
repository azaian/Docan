<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories_attributes extends Model
{
    protected $table = "category_attribute";
    protected $hidden = ['created_at','updated_at',];
    protected $fillable=['category_id','attribute_id'];
}
