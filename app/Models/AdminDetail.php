<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminDetail extends Model
{
    public function depart(){
        return $this->belongsTo(Department::class);
    }
}
