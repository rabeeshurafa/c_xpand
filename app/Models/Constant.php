<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    //
    protected $table = 't_constant';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
