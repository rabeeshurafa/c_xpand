<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopyTo extends Model
{
    public function archive(){
        return $this->belongsTo(Archive::class);
    }

    public function files(){
        return $this->hasMany(File::class,'archive_id');
    }
    
    public function Admin(){
        return $this->belongsTo(Admin::class,'add_by');
    }
    
    
    
    // public function modelname(){
    //     if($row->model_name)
    //     {
    //         $st=$row->model_name;
    //         $url = explode('\\', ($st));
    //         $url=Str::lower($url[2]);
    //         $url=$url."s";
    //         if($url=='specialassets'){
    //             $url='special_assets';
    //         }
    //         //$row->files[]=$temp;
    //         $uu = DB::select('select url,name from '.$url.' where id='.$row->model_id);
    //         if($uu!=[]){
    //             $uu=$uu[0];
    //         }
    //         $row->setAttribute('url',$uu);
    //     }
    //     else
    //     {
    //         $row->setAttribute('url',array());
    //     }
    //     return $this->belongsTo(Admin::class,'add_by');
    // }
    
    public function archiveType(){

        return $this->belongsTo(Constant::class,'type_id');

    }
}
