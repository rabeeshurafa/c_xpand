<?php
namespace App\Models;
use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;
class AppTicket31 extends Model
{
    public function setDateBuyAttribute($value)
    {
            if($value){
            $from = explode('/', ($value));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0];
            }
            else{
                $from=$value;
            }
        $this->attributes['date_buy'] = $from;
    }
    public function getDateBuyAttribute($value)
    {
        if($value){
            $from = explode('-', ($value));

            $from = $from[2] . '/' . $from[1] . '/' . $from[0];
            return $from;
        }
        else{
            return $value?$value:'';
        }
    }
    
    public function Admin(){

        return $this->belongsTo(Admin::class,'created_by');

    }
    
    public function ticketStatus(){

        return $this->belongsTo(Constant::class,'ticket_status');

    }
    
    public function activeTrans(){

        return $this->belongsTo(AppTrans::class,'active_trans');

    }

}

