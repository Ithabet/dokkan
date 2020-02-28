<?php

namespace App;
use Eloquence, Mappable, Mutable;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    public function category(){
        return $this->belongsTo(category::class);
    }

}
