<?php

namespace App\Jobs;

use App\Models\Archive;
use App\Models\CopyTo;
use App\Models\Constant;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ArchTableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle() {
    
        $obj = $this->request;
        
        
        // dd($obj);
        if($obj['arch_type']!=2166){
            $client=new Archive();
            
            
            $type='';
            $url='';
            $type_id=0;
            
            $model_id=intval(substr($obj['receiver_id'],1));
            $model_type=substr($obj['receiver_id'],0,1);
            // dd($model_id,$model_type);
            $model_name='0';
            if($model_type=='m'){
                $model_name='App\\Models\\Admin';
                $url='emp_archieve';
                $type='empArchive';
                
            }else if($model_type=='i'){
                $model_name='App\\Models\\User';
                $url='cit_archieve';
                $type='citArchive';
                
            }else if($model_type=='t'){
                $model_name='App\\Models\\Department';
                $url='dep_archieve';
                $type='depArchieve';
                
            }else if($model_type=='b'){
                $model_name='App\\Models\\SpecialAsset';
                $url='assets_archieve';
                $type='assetsArchive';
            }else if($model_type=='v'){
                $model_name='App\\Models\\Vehicle';
                $url='assets_archieve';
                $type='assetsArchive';
            }else if($model_type=='e' || $model_type=='s' || $model_type=='p' || $model_type=='n' || $model_type=='k'){
                $model_name='App\\Models\\Orgnization';
                $url='mun_archieve';
                $type='munArchive';
            }else if($model_type=='q'){
                $model_name='App\\Models\\Equpment';
                $url='assets_archieve';
                $type='assetsArchive';
            }else if($model_type=='0'||$model_type=='o' ){
                $url='mun_archieve';
                $type='munArchive';
            }
      
            
            
            if($obj['arch_type']==2076)
            {
               $type= 'outArchive';
               $url='out_archieve';
               $type_id=1;
            }else if($obj['arch_type']==2077){
                $type= 'inArchive';
                $url='in_archieve';
                $type_id=2;
            }else{
                if($obj['s_name_ar']!=null && $obj['s_name_ar']!=''){
                    $constant=Constant::where('name',$obj['s_name_ar'])->where('parent',49)->first();
                    if($constant!=null){
                        $type_id=$constant->id;
                    }else{
                        $constant=new Constant();
                        $constant->name=$obj['s_name_ar'];
                        $constant->parent=49;
                        $constant->save();
                        $type_id=$constant->id;
                    }
                }
                
            }
            
            
            // $client['id']                   = @$obj['pk_i_id'];
            $client['name']                 = @$obj['receiver_name'];
            $client['type']                 = $type;
            $client['model_id']             = $model_id;
            $client['model_name']           = $model_name;
            $client['date']                 = @$obj['arch_date'];
            $client['title']                = @$obj['arch_title'];
            $client['serisal']              = @$obj['arch_no'];
            $client['type_id']              = $type_id;
            $client['add_by']               = @$obj['fk_i_created_by'];
            $client['url']                  = $url;
    
    
            // dd($client,$obj);
            try{
                \DB::beginTransaction();
                $client->save();
                \DB::commit();
                \Log::info('client : '.@$obj['pk_i_id']." created");
    
            }catch (\Exception $e){
    //            dd($obj,$e);
                \DB::rollBack();
    //            \Log::channel('clients_fails_insert')->info($e->getMessage());
                \Log::error('client : '.@$obj['pk_i_id']." error");
    
            }

        }
    }

}
