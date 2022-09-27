<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function Town(){
        return $this->belongsTo(Town::class);
    }
}
