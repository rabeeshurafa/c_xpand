<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Smslog  extends  Model
{
    
    
    public function Admin(){

        return $this->belongsTo(Admin::class,'sender');

    }

}
