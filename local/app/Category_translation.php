<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_translation extends Model
{
  protected $table='category_translations';
    protected $hidden = ['created_at','updated_at',];
    protected $fillable=['name','metatitle','lang','category_id'];
    
    public function category(){
        return $this->belongsTo("App\Category","category_id");
    }
}
