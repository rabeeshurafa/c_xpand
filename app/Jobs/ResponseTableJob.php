<?php

namespace App\Jobs;

use App\Models\AppTrans;
use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket14;
use App\Models\AppResponse;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResponseTableJob implements ShouldQueue
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

        // if (!is_numeric($obj['related_ticket'])){
        //     return;
        // }
        // if(intval($obj['related_ticket'])!=33&&intval($obj['related_ticket'])!=11&&intval($obj['related_ticket'])!=17&&intval($obj['related_ticket'])!=35&&intval($obj['related_ticket'])!=14&&intval($obj['related_ticket'])!=12&&intval($obj['related_ticket'])!=3&&intval($obj['related_ticket'])!=1&&intval($obj['related_ticket'])!=27&&intval($obj['related_ticket'])!=36&&intval($obj['related_ticket'])!=37&&intval($obj['related_ticket'])!=39&&intval($obj['related_ticket'])!=28&&intval($obj['related_ticket'])!=31&&intval($obj['related_ticket'])!=2&&intval($obj['related_ticket'])!=5&&intval($obj['related_ticket'])!=4&&intval($obj['related_ticket'])!=6&&intval($obj['related_ticket'])!=7&&intval($obj['related_ticket'])!=10 &&intval($obj['related_ticket'])!=16 &&intval($obj['related_ticket'])!=29){return;}
        $client = AppResponse::where('id',intval($obj['pk_i_id']))->first();
        if($client){return;}
        $client=new AppResponse();
        // $dept_id=0;
        // if($obj['fk_i_reciver_id']!=null && $obj['fk_i_reciver_id']!=''){
        //     $dept=Admin::where('id',$obj['fk_i_reciver_id'])->first();
        //     if($dept!=null){
        //         $dept_id=$dept->department_id;
        //     }
        // }
        $trans=AppTrans::where('id',intval($obj['fk_i_trans_id']))->first();
        if(!$trans)
        {
            return;
        }
        
        $s_note="";
        if($obj['s_trans_note']!=null && $obj['s_trans_note']!=''){
            $s_note.=@$obj['s_trans_note'].'<\br>';
        }
        $s_text="";
        if($obj['s_text']!=null && $obj['s_text']!=''){
            $s_text.=$obj['s_text'];
        }
        
        $client['id']               = @$obj['pk_i_id'];
        $client['trans_id']        = @$obj['fk_i_trans_id'];
        $client['s_text']      = $s_text;
        $client['i_status']        = 5002;
        $client['trans_note']       = $s_note;
        $client['created_by']           =$obj['fk_i_created_by']==74?124:$obj['fk_i_created_by'];
        $client['created_at']      = @$obj['dt_created_at'];
        $client['i_source']          = 1;
        $client['ticket_id']        = $trans->ticket_id;
        $client['app_type']       = $trans->related;
        $client['file_ids']     = "[]";

        // dd($client,$obj);
        try{
            \DB::beginTransaction();
            $client->save();
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
