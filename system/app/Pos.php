<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
