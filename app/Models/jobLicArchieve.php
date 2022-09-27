<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class jobLicArchieve extends Model

{

    public function archiveFiles(){

        return $this->hasMany(File::class,'archive_id');    

    }

    public function craftType(){

        return $this->belongsTo(Constant::class,'craft_type_id');

    }
    public function licenseRating(){

        return $this->belongsTo(Constant::class,'license_rating_id');

    }
    
    public function regions(){

        return $this->belongsTo(Constant::class,'region');

    }

    public function files() {

        return $this->archiveFiles()->where('model_name','App\Models\jobLicArchieve');

    }

}

