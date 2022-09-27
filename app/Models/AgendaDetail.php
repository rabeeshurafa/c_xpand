<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaDetail extends Model
{
    //
    public function setAgendaDateAttribute($value)
    {   
        if($value){
        $from = explode('/', ($value));

        $from = $from[2] . '-' . $from[1] . '-' . $from[0];
        }
        else{
           $from="0000-00-00";
        }
        $this->attributes['agenda_date'] = $from;
    }
    public function getAgendaDateAttribute($value)
    {   
        $from = explode('-', ($value));

        $from = $from[2] . '/' . $from[1] . '/' . $from[0];
        return ($from);
    }
    public function AgendaTopic(){
        return $this->hasMany(AgendaTopic::class,'detail_id');
    }
    
    public function AgendaExtention(){
        return $this->belongsTo(AgendaExtention::class,'agenda_extention_id');
    }
}
