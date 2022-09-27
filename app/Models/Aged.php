<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aged extends Model
{
    public function illness(){
        return $this->hasMany(Illness::class);
    }

}
