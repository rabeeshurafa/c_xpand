<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function deleted_by(){

        return $this->belongsTo(Admin::class,'deleted_by');

    }
    
    
    public function jobLicArchieve() {

        return $this->hasMany(jobLicArchieve::class,'model_id');    

    }
    
    
    public function License() {

        return $this->hasMany(License::class,'user_id')->where('enabled',1);    

    }

}
