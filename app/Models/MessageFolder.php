<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageFolder extends Model
{
    public function Message(){
        return $this->belongsTo(Message::class);
    }
    public function Admin(){

        return $this->belongsTo(Admin::class,'i_receiver_id');

    }
}
