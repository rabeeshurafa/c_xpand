<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppTrans extends Model
{
    public function Admin(){

        return $this->belongsTo(Admin::class,'reciver_id');

    }
}
