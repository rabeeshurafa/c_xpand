<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function lincence()
    {
        return $this->belongsTo(LicenseType::class, 'license_types_id');
    }
    public function Volunteercourse(){
        return $this->hasMany(Volunteer_Courses::class);
    }

}
