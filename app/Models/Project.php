<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
     public function deleted_by(){

        return $this->belongsTo(Admin::class,'deleted_by');

    }
}
