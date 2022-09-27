<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class spare_part extends Model
{
    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    public function storehouse()
    {
        return $this->belongsTo(SpecialAsset::class, 'storehouse');
    }
    public function supplier()
    {
        return $this->belongsTo(Orgnization::class, 'supp_id');
    }
    public function deleted_by(){

        return $this->belongsTo(Admin::class,'deleted_by');

    }
}
