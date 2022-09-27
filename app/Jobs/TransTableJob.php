<?php

namespace App\Jobs;

use App\Models\AppTrans;
use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket14;
use App\Models\AppTicket24;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TransTableJob implements ShouldQueue
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
        if (!is_numeric($obj['related_ticket'])){
            return;
        }
        // if(intval($obj['related_ticket'])!=22){return ;}
        // if(intval($obj['related_ticket'])!=21&&intval($obj['related_ticket'])!=26&&intval($obj['related_ticket'])!=33&&intval($obj['related_ticket'])!=11&&intval($obj['related_ticket'])!=17&&intval($obj['related_ticket'])!=35&&intval($obj['related_ticket'])!=38&&intval($obj['related_ticket'])!=14&&intval($obj['related_ticket'])!=12&&intval($obj['related_ticket'])!=3&&intval($obj['related_ticket'])!=1&&intval($obj['related_ticket'])!=27&&intval($obj['related_ticket'])!=36&&intval($obj['related_ticket'])!=37&&intval($obj['related_ticket'])!=39&&intval($obj['related_ticket'])!=28&&intval($obj['related_ticket'])!=31&&intval($obj['related_ticket'])!=2&&intval($obj['related_ticket'])!=5&&intval($obj['related_ticket'])!=4&&intval($obj['related_ticket'])!=6&&intval($obj['related_ticket'])!=7&&intval($obj['related_ticket'])!=10 &&intval($obj['related_ticket'])!=16 &&intval($obj['related_ticket'])!=29){return;}
        $cc=AppTrans::where('id',intval($obj['pk_i_id']))->first();
        if($cc)
        {
            return;
        }
        $related=0;
        $ticket_id=$obj['fk_i_ticket_id'];
        if(intval($obj['related_ticket'])==3){
            $ticket_type=1;
            $related=1;
        }
        if(intval($obj['related_ticket'])==4){
            $ticket_type=1;
            $related=5;
        }
        if(intval($obj['related_ticket'])==6){
            $ticket_type=1;
            $related=6;
        }
        if(intval($obj['related_ticket'])==5){
            $ticket_type=1;
            $related=7;
        }
        if(intval($obj['related_ticket'])==2){
            $ticket_type=1;
            $related=4;
        }
        if(intval($obj['related_ticket'])==1){
            $ticket_type=1;
            $related=2;
        }
        if(intval($obj['related_ticket'])==7){
            $ticket_type=1;
            $related=8;
        }
        
        if(intval($obj['related_ticket'])==10){
            $ticket_type=1;
            $related=10;
        }
        if(intval($obj['related_ticket'])==16){
            $ticket_type=1;
            $related=13;
        }
        if(intval($obj['related_ticket'])==27){
            $ticket_type=1;
            $related=14;
            // dd($obj);
            $ticket=AppTicket14::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',2)->first();
            if($ticket)
            $ticket_id=$ticket->id;
            else
            return;
        }
        if(intval($obj['related_ticket'])==28){
            $ticket_type=1;
            $related=14;
            $ticket=AppTicket14::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',1)->first();
            $ticket_id=$ticket->id;
        }
        if(intval($obj['related_ticket'])==31){
            $ticket_type=1;
            $related=11;
        }
        if(intval($obj['related_ticket'])==29){
            $ticket_type=1;
            $related=15;
        }
        if(intval($obj['related_ticket'])==36){
            $ticket_type=1;
            $related=16;
        }
        if(intval($obj['related_ticket'])==37){
            $ticket_type=1;
            $related=36;
        }
        if(intval($obj['related_ticket'])==39){
            $ticket_type=1;
            $related=17;
        }
        if(intval($obj['related_ticket'])==11){
            $ticket_type=3;
            $related=19;
        }
        if(intval($obj['related_ticket'])==12){
            $ticket_type=3;
            $related=18;
        }
        if(intval($obj['related_ticket'])==14){
            $ticket_type=4;
            $related=23;
        }
        if(intval($obj['related_ticket'])==17){
            $ticket_type=4;
            $related=24;
            $ticket=AppTicket24::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',6284)->first();
            $ticket_id=$ticket->id;
        }
        if(intval($obj['related_ticket'])==35){
            $ticket_type=5;
            $related=28;
        }
        if(intval($obj['related_ticket'])==33){
            $ticket_type=5;
            $related=32;
        }
        if(intval($obj['related_ticket'])==38){
            $ticket_type=4;
            $related=12;
        }
        if(intval($obj['related_ticket'])==26){
            $ticket_type=5;
            $related=31;
        }
        if(intval($obj['related_ticket'])==22){
            $ticket_type=5;
            $related=37;
        }
        if(intval($obj['related_ticket'])==21){
            $ticket_type=4;
            $related=24;
            $ticket=AppTicket24::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',6283)->first();
            $ticket_id=$ticket->id;
        }
                // dd($obj);

        $client=new AppTrans();
        $dept_id=0;
        if($obj['fk_i_reciver_id']!=null && $obj['fk_i_reciver_id']!=''){
            $dept=Admin::where('id',$obj['fk_i_reciver_id'])->first();
            if($dept!=null){
                $dept_id=$dept->department_id;
            }
        }
        
        $s_note="";
        if($obj['s_response']!=null && $obj['s_response']!=''){
            $s_note.=@$obj['s_response'].'<\br>';
        }
        if($obj['s_note']!=null && $obj['s_note']!=''){
            $s_note.=$obj['s_note'];
        }
        
        $client['id']               = @$obj['pk_i_id'];
        $client['ticket_id']        = $ticket_id;
        $client['ticket_type']      = $ticket_type;
        $client['sender_id']        = @$obj['fk_i_sender_id'];
        $client['reciver_id']       = @$obj['fk_i_reciver_id'];
        $client['s_note']           = $s_note;
        $client['recive_type']      = 1;
        $client['is_seen']          = 1;
        $client['curr_dept']        = $dept_id;
        $client['created_by']       = @$obj['fk_i_created_by'];
        $client['created_at']       = @$obj['dt_created_at'];
        $client['tagged_users']     = "[]";
        $client['related']          = $related;
        $client['file_ids']         = "[]";


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
