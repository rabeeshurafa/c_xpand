<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daily_work extends Model{
    protected $table = 'daily_work';
    protected $fillable = ['work','timefrom','timeto','note','rowId'];
    public $timestamps = false;
}