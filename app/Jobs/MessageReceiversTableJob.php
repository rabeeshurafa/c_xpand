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
use App\Models\MessageReciver;

class MessageReceiversTableJob implements ShouldQueue
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
        // $messageReciver=new Orgnization();
        $messageReciver=new MessageReciver();
        $message=Message::where('id',intval($obj['msgID']))->first();
        if($message)
        {
            $messageReciver['created_at'] = $message->created_at;
        }
        
        $messageReciver['id']                   = @$obj['pk_i_id'];
        $messageReciver['i_message_id']                 = @$obj['msgID'];
        $messageReciver['i_receiver_id']            = @$obj['empID'];
        $messageReciver['i_recive_type']            =1;
        $messageReciver['is_seen']            = 1;
        // $messageReciver['is_delete']         = @$obj['send_time'];
        // $messageReciver['i_folder']      = @$obj['read_status'];

        // dd($messageReciver,$obj);
        try{
            \DB::beginTransaction();
            $messageReciver->save();
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
