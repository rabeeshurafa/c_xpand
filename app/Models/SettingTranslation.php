<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    protected $fillable = [
        'name','locale', 'setting_id'   // json field
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public $timestamps = false;


}
