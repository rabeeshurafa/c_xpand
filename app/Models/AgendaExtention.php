<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaExtention extends Model
{
    //
    public function Admin(){
        return $this->belongsTo(Admin::class,'signature_emp');
    }
}
