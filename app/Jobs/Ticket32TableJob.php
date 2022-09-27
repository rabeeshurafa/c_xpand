<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket32;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Ticket32TableJob implements ShouldQueue
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
        $client=new AppTicket32();
        
        $vac_type=6061;
        if($obj['fk_i_vac_type']!=2024){
            $vac_type=6063;
        }
        
        $periodsec=(strtotime(@$obj['dt_end_at'])-strtotime(@$obj['dt_start_at'])) / (60*60*24);
        
        
        $from = explode('-', $obj['dt_start_at']);
        $from = $from[2] . '/' . $from[1] . '/' . $from[0];
        
        $to = explode('-', $obj['dt_end_at']);
        $to = $to[2] . '/' . $to[1] . '/' . $to[0];
        
        $client['id']                   = @$obj['pk_i_id'];
        $client['app_no']               = @$obj['pk_i_id'];
        $client['customer_id']          = @$obj['fk_i_emp_id'];
        $client['customer_name']        = @$obj['s_emp_name'];
        $client['vac_type']             = $vac_type;
        $client['start_date']           = $from;
        $client['end_date']             = $to;
        $client['vac_day']              = ($periodsec+1).' يوم';
        $client['vac_day_no']           = ($periodsec+1);
        $client['accepted']             = 1;
        $client['malDesc']              = @$obj['s_note'];
        
        $client['created_at']           = @$obj['dt_created_at'];
        $client['created_by']           = @intval($obj['fk_i_created_by']);
        $client['dept_id']              = 0;
        $client['app_type']             = 5;
        $client['b_enabled']            = 1;
        $client['active_trans']         = 0;
        $client['hrs']                  = 0;
        $client['priority']             = 0;
        $client['ticket_status']        = 0;

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
