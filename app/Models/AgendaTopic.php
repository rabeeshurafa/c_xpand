<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaTopic extends Model
{
    //
    public function AgendaDetail(){
        return $this->belongsTo(AgendaDetail::class,'detail_id');
    }
    public function Admin(){
        return $this->belongsTo(Admin::class,'created_by');
    }
    
}
