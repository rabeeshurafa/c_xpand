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

class CopyToTableJob implements ShouldQueue
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
        
        
        if($obj['arch_type']==2166){
                    // dd($obj);

            $client=new CopyTo();
            
            $model_id=intval(substr($obj['receiver_id'],1));
            $model_type=substr($obj['receiver_id'],0,1);
            $model_name='0';
            if($model_type=='m'){
                $model_name='App\\Models\\Admin';

            }else if($model_type=='i'){
                $model_name='App\\Models\\User';
            }else if($model_type=='t'){
                $model_name='App\\Models\\Department';

            }else if($model_type=='b'){
                $model_name='App\\Models\\SpecialAsset';
            }else if($model_type=='v'){
                $model_name='App\\Models\\Vehicle';
            }else if($model_type=='e' || $model_type=='s' || $model_type=='p' || $model_type=='n' || $model_type=='k'){
                $model_name='App\\Models\\Orgnization';
            }else if($model_type=='q'){
                $model_name='App\\Models\\Equpment';
            }
            // $obj['arch_no'];
            $archive_id=0;
            if($obj['arch_no']!=null && $obj['arch_no']!=''){
                $archive=Archive::where('serisal',$obj['arch_no'])->first();
                if($archive!=null){
                    $archive_id=$archive->id;
                }
            }
            // $client['id']                   = @$obj['pk_i_id'];
            $client['name']                 = @$obj['receiver_name'];
            $client['model_id']             = $model_id;
            $client['model_name']           = $model_name;
            $client['archive_id']           = $archive_id;
    
    
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
