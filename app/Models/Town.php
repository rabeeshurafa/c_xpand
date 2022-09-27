<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public function City(){
        return $this->belongsTo(City::class);
    }
    public function regions(){

        return $this->hasMany(Region::class);
    }
    
}