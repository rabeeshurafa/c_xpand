<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function linkDept(){

        return $this->belongsTo(Department::class,'department_id');

    }
    public function deleted_by(){

        return $this->belongsTo(Admin::class,'deleted_by');

    }

}
