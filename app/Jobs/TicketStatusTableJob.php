<?php

namespace App\Jobs;
use App\Models\AppTicket1;
use App\Models\AppTicket2;
use App\Models\AppTicket4;
use App\Models\AppTicket5;
use App\Models\AppTicket6;
use App\Models\AppTicket7;
use App\Models\AppTicket8;
use App\Models\AppTicket10;
use App\Models\AppTicket11;
use App\Models\AppTicket12;
use App\Models\AppTicket13;
use App\Models\AppTicket15;
use App\Models\AppTicket14;
use App\Models\AppTicket16;
use App\Models\AppTicket17;
use App\Models\AppTicket20;
use App\Models\AppTicket19;
use App\Models\AppTicket18;
use App\Models\AppTicket23;
use App\Models\AppTicket24;
use App\Models\AppTicket28;
use App\Models\AppTicket32;
use App\Models\AppTicket31;
// use App\Models\AppTicket37;

use App\Models\AppTrans;
use App\Models\Constant;
use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TicketStatusTableJob implements ShouldQueue
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
        if (!is_numeric($obj['i_related_table'])){
            return;
        }
        // dd($obj);
        if($obj['i_ticket_state']==null)
        {
            $obj['i_ticket_state']=9999;
        }

            // dd(intval($obj['AppState']));
        // if(intval($obj['AppState'])==2119||intval($obj['AppState'])==2108||intval($obj['AppState'])==2107||intval($obj['AppState'])==2109)
        // {
        //     return;
        // }
        // dd($obj);
                    
        // if(intval($obj['i_related_table'])>30){return;}
        if(intval($obj['i_related_table'])!=21&&intval($obj['i_related_table'])!=26&&intval($obj['i_related_table'])!=22&&intval($obj['i_related_table'])!=33&&intval($obj['i_related_table'])!=38&&intval($obj['i_related_table'])!=11&&intval($obj['i_related_table'])!=35&&intval($obj['i_related_table'])!=17&&intval($obj['i_related_table'])!=14&&intval($obj['i_related_table'])!=3&&intval($obj['i_related_table'])!=12&&intval($obj['i_related_table'])!=31&&intval($obj['i_related_table'])!=27&&intval($obj['i_related_table'])!=36&&intval($obj['i_related_table'])!=37&&intval($obj['i_related_table'])!=39&&intval($obj['i_related_table'])!=28&&intval($obj['i_related_table'])!=1&&intval($obj['i_related_table'])!=2&&intval($obj['i_related_table'])!=4&&intval($obj['i_related_table'])!=5&&intval($obj['i_related_table'])!=6&&intval($obj['i_related_table'])!=7 &&intval($obj['i_related_table'])!=10 &&intval($obj['i_related_table'])!=16 &&intval($obj['i_related_table'])!=29){return;}
        // if(intval($obj['i_related_table'])!=22){return;}
        $related=0;
        if(intval($obj['i_related_table'])==3){
            $related=1;
            $client=AppTicket1::where('id',intval($obj['fk_i_ticket_id']))->first();
        }
        if(intval($obj['i_related_table'])==1){
            $related=1;
            $client=AppTicket2::where('id',intval($obj['fk_i_ticket_id']))->first();
        }
        if(intval($obj['i_related_table'])==2){
            $related=4;
            $client=AppTicket4::where('id',intval($obj['fk_i_ticket_id']))->first();
        }
        if(intval($obj['i_related_table'])==4){
            $client=AppTicket5::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=5;
        }
        if(intval($obj['i_related_table'])==6){
            $client=AppTicket6::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=6;
        }
        if(intval($obj['i_related_table'])==5){
            $client=AppTicket7::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=7;
        }
        if(intval($obj['i_related_table'])==7){
            $client=AppTicket8::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=8;
        }
        if(intval($obj['i_related_table'])==10){
            $client=AppTicket10::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=10;
        }
        if(intval($obj['i_related_table'])==38){
            $client=AppTicket12::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=12;
        }
        if(intval($obj['i_related_table'])==16){
            $client=AppTicket13::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=13;
            // dd($obj,$status);
        }
        if(intval($obj['i_related_table'])==27){
            $client=AppTicket14::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',2)->first();
            $related=14;
            // dd($obj,$client);
        }
        if(intval($obj['i_related_table'])==28){
            $client=AppTicket14::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',1)->first();
            $related=14;
            // dd($obj,$status);
        }
        if(intval($obj['i_related_table'])==31){
            $client=AppTicket11::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=11;
            // dd($obj,$status);
        }
        if(intval($obj['i_related_table'])==29){
            $client=AppTicket15::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=15;
        }
        if(intval($obj['i_related_table'])==36){
            $client=AppTicket16::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=16;
            
        }
        if(intval($obj['i_related_table'])==37){
            $client=AppTicket12::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=12;
        }
        if(intval($obj['i_related_table'])==39){
            $client=AppTicket17::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=17;
        }
        if(intval($obj['i_related_table'])==11){
            $client=AppTicket19::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=19;
        }
        if(intval($obj['i_related_table'])==12){
            $client=AppTicket18::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=18;
        }
        if(intval($obj['i_related_table'])==14){
            $client=AppTicket23::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=23;
        }
        if(intval($obj['i_related_table'])==17){
            $client=AppTicket24::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',6284)->first();
            $related=24;
        }
        if(intval($obj['i_related_table'])==21){
            $client=AppTicket24::where('app_no',intval($obj['fk_i_ticket_id']))->where('task_type',6283)->first();
            $related=24;
        }
        if(intval($obj['i_related_table'])==35){
            $client=AppTicket28::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=28;
        }
        if(intval($obj['i_related_table'])==33){
            $client=AppTicket32::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=32;
        }
        if(intval($obj['i_related_table'])==26){
            $client=AppTicket31::where('id',intval($obj['fk_i_ticket_id']))->first();
            $related=31;
        }
        if(intval($obj['i_related_table'])==22){
            return;
        }
        
        if(!$client){return;}

        if(intval($obj['i_ticket_state'])==0)
            {$status=5002;}
        elseif(intval($obj['i_ticket_state'])==1)
        {
            $status=5003;
        }
        else
        {
            $status=6006;
        }
        // dd($obj,$status);
        // $client['id']               = @$obj['pk_i_id'];
        $client['ticket_status']    = $status;
        if($obj['trans_id'])
        {
            $trans=AppTrans::where('id',intval($obj['trans_id']))->first();
            if($trans)
            {
            $trans->ticket_type =$client['app_type'];
            }
        }
        
        // if(intval($obj['i_related_table'])==33||intval($obj['i_related_table'])==11||intval($obj['i_related_table'])==14||intval($obj['i_related_table'])==35||intval($obj['i_related_table'])==17||intval($obj['i_related_table'])==12||intval($obj['i_related_table'])==16||intval($obj['i_related_table'])==31||intval($obj['i_related_table'])==27||intval($obj['i_related_table'])==28||intval($obj['i_related_table'])==36||intval($obj['i_related_table'])==37||intval($obj['i_related_table'])==39){
            
            $client->active_trans=intval($obj['trans_id']);
            $client->dept_id=intval($obj['fk_i_last_dept_id']);
        // }
        // dd($client,$obj,$trans);
        try{
            \DB::beginTransaction();
            $client->save();
            if($obj['trans_id']&&$trans)
            {
                $trans->save();
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
