<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //

    public function items(){
        return $this->hasMany(PurchasesItem::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
