<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasesItem extends Model
{
    //
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
