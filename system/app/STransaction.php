<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class STransaction extends Model
{
    //
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
