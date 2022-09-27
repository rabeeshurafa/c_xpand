<?php

namespace App\Jobs;

use App\Models\AppTicket6;
use App\Models\Constant;
use App\Models\Admin;
use App\Models\TicketJson;

use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Bra2aaTableJob implements ShouldQueue
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
        
        
        $client=new TicketJson();
        if(intval($obj['i_related_table'])==3){
            $client['related']          = 1;
        }else if(intval($obj['i_related_table'])==4){
            $client['related']          = 5;
        }else if(intval($obj['i_related_table'])==5){
            $client['related']          = 7;
        }else if(intval($obj['i_related_table'])==6){
            $client['related']          = 6;
        }else if(intval($obj['i_related_table'])==16){
            $client['related']          = 13;
        }else if(intval($obj['i_related_table'])==36){
            $client['related']          = 16;
        }else{
            return;
        }
        
        if(isset($obj['json_input'])&&$obj['json_input']){
            $ticketAllFees=array();
            $ticketFees=json_decode($obj['json_input']);
            foreach ($ticketFees as $key=>$value)
            {
                $temp=array();
                $ticketAllFees[trim($key)]=trim($value);
            }
            $client->data=json_encode($ticketAllFees);
        }else{
            $client->data='[]';
        }
        
        // dd($client->data,$obj);
        
        // $client['id']               = @$obj['pk_i_id'];
        $client['ticket_id']        = @$obj['fk_i_ticket_id'];
        // $client['related']          = 1;
        $client['print_type']       = 2;
        

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
