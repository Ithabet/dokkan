<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SalesItem;

class Sales extends Model
{
    //
    public function items(){
        return $this->hasMany(SalesItem::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
