<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function Town(){

        return $this->hasMany(Town::class);
    }
}
