<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class ArchiveLicense extends Model

{

    // public function files(){

    //     return $this->hasMany(File::class,'archive_id');

    // }

    public function Admin(){

        return $this->belongsTo(Admin::class,'add_by');

    }
    
    public function License(){

        return $this->belongsTo(License::class,'license_id');

    }

    public function deleted_by(){

        return $this->belongsTo(Admin::class,'deleted_by');

    }

    public function archiveFiles(){

        return $this->hasMany(File::class,'archive_id');    

    }

 

    public function files() {

        return $this->archiveFiles()->where('model_name','App\Models\ArchiveLicense');

    }

}
