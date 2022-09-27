<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    // public function department()
    // {
    //     return $this->belongsTo(Department::class, 'dept_id');
    // }

    // public function storehouse()
    // {
    //     return $this->belongsTo(SpecialAsset::class, 'storehouse');
    // }
    public function supplier()
    {
        return $this->belongsTo(Orgnization::class, 'supp_id');
    }
    
    public function dos()
    {
        return $this->belongsTo(Constant::class, 'dosage');
    }
    public function treatment()
    {
        return $this->belongsTo(Constant::class, 'treatment');
    }
    
    public function deleted_by(){

        return $this->belongsTo(Admin::class,'deleted_by');

    }
}
