<?php



namespace App\Models;



use App\Casts\Json;

use Illuminate\Database\Eloquent\Model;



class Archive extends Model

{

    public function copyTo(){

        return $this->hasMany(CopyTo::class);

    }

    public function relatedTo(){

        return $this->hasMany(linkedTo::class);

    }

    public function archiveFiles(){

        return $this->hasMany(File::class);

    }

 

    public function Admin(){

        return $this->belongsTo(Admin::class,'add_by');

    }

    public function deleted_by(){

        return $this->belongsTo(Admin::class,'deleted_by');

    }

    public function files() {

        return $this->archiveFiles()->where('model_name','App\Models\Archive');

    }

    
    public function archiveType(){

        return $this->belongsTo(Constant::class,'type_id');

    }
    
    // public function modelname(){
    //     dd($this);
    //     if($this->attributes['model_name'])
    //     {
    //         $st=$this->attributes['model_name'];
    //         $url = explode('\\', ($st));
    //         $url=Str::lower($url[2]);
    //         $url=$url."s";
    //         if($url=='specialassets'){
    //             $url='special_assets';
    //         }
    //         //$row->files[]=$temp;
    //         $uu = DB::select('select name from '.$url.' where id='.$this->attributes['model_id']);
    //         if($uu!=[]){
    //             $uu=$uu[0];
    //         }
    //         // $row->setAttribute('copy',$uu);
    //         return $uu;
    //     }
    //     // else
    //     // {
    //         // $row->setAttribute('url',array());
    //     // }
    //     // return $this->belongsTo(Admin::class,'add_by');
    // }



}

