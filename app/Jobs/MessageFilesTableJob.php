<?php

namespace App\Jobs;

use App\Models\Orgnization;
use App\Models\Constant;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Message;
use App\Models\File;

class MessageFilesTableJob implements ShouldQueue
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
        // $file=new Orgnization();
        $file=new File();
        $model='';
        $extension="";
        $AttachName= explode(".", @$obj['AttachName']); 
        if(sizeof($AttachName)>=2){
            $extension=$AttachName[(sizeof($AttachName)-1)];
        }
        $url="storage/".@$obj['AttachServerName'];
        $file['model_name']   = $model;
        $file['real_name']    = @$obj['AttachName'];
        $file['extension']    = $extension;
        $file['url']          = $url;
        // fk_i_ref_id
        // dd($file,$obj);
        try{
            \DB::beginTransaction();
            $file->save();
            $message=Message::where('id',intval($obj['fk_i_ref_id']))->first();
            if($message)
            {
                $messageFiels=json_decode($message['file_id']);
                        
                $attachID = $file->id;
                array_push($messageFiels, $attachID);
                
                $message->file_id=json_encode($messageFiels);
                $message->save();
            }

            \DB::commit();
            \Log::info('client : '.@$obj['pk_i_id']." created");

        }catch (\Exception $e){
            dd($obj,$e);
            \DB::rollBack();
//            \Log::channel('clients_fails_insert')->info($e->getMessage());
            \Log::error('client : '.@$obj['pk_i_id']." error");

        }


    }

}
