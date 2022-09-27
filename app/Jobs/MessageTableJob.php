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

class MessageTableJob implements ShouldQueue
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
        // $message=new Orgnization();
        $message=new Message();
        
        $message_text=$obj['message'];
        if(!$message_text){
            $message_text ="";
        }
        $message['id']                   = @$obj['msg_id'];
        $message['title']                 = @$obj['subject'];
        $message['content']            = $message_text;
        $message['file_id']            ="[]";
        $message['created_by']            = @$obj['SenderID'];
        $message['created_at']         = @$obj['send_time'];
        $message['is_sent']      = @$obj['read_status'];
        $message['replaied_to']                = $obj['msgID'];

        // dd($message,$obj);
        try{
            \DB::beginTransaction();
            $message->save();
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
