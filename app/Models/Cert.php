<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
    //
    protected $table = 't_farfromcenter';
    protected $primaryKey = 'pk_i_id';
    
    public function setcerDateAttribute($value)
    {
        if($value){
        $from = explode('/', ($value));

        $from = $from[2] . '-' . $from[1] . '-' . $from[0];
        }
        else{
           $from="0000-00-00";
        }
        $this->attributes['cer_date'] = $from;
    }
    public function Admin(){

        return $this->belongsTo(Admin::class,'add_by');

    }
    public function getCerDateAttribute($value)
    {   
        if($value){
        $from = explode('-', ($value));

        $from = $from[2] . '/' . $from[1] . '/' . $from[0];
        
        }
        else{
           $from="00/00/0000";
        }
        return ($from);
    }
    public function setDebtJsonAttribute($value)
    {   
        if($value){
        $after = json_encode($value);
        }
        else{
           $after="[]";
        }
        $this->attributes['debt_json'] = $after;
        
    }
    public function getDebtJsonAttribute($value)
    {   
        if($value){
        return json_decode($value);
        
        }
        else{
          return ([]);
        }
        
    }
    
    public function getFileIdsAttribute($value)
    {   
        if($value){
        return json_decode($value);
        
        }
        else{
          return ([]);
        }
        
    }
}
