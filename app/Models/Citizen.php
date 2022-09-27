<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Citizen extends Model{
    use Notifiable;
    protected $table = 'citizens';
    protected $fillable=[ 'name', 'password','mobile',];
    public $timestamps = false;
}