<?php

namespace App;
use Eloquence, Mappable, Mutable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
