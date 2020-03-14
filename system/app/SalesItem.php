<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sales;
use App\Product;
class SalesItem extends Model
{
    //
    public function sales(){
        return $this->belongsTo(Sales::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
