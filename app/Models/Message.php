<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public function MessageReciver(){

        return $this->hasMany(MessageReciver::class,'i_message_id');

    }
    public function Admin(){

        return $this->belongsTo(Admin::class,'created_by');

    }
    public function Replaied(){

        return $this->belongsTo(Message::class,'replaied_to');

    }
}
