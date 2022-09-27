<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketConfig extends Model
{
    //
    
    public function Admin(){
        return $this->belongsTo(Admin::class,'emp_to_receive');
    }
}
