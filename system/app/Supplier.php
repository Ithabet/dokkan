<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    public function transactions(){
        return $this->hasMany(STransaction::class);
    }
   
}
