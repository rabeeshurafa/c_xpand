<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket28;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Ticket28TableJob implements ShouldQueue
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
        $client=new AppTicket28();
        
        $leave_date=explode(' ', (@$obj['dt_back_date']))[0];
        
        $start=explode(' ', (@$obj['dt_leave_date']))[1];
        $end_dior=explode(' ', (@$obj['dt_back_date']))[1];
        
        $periodsec=(strtotime(@$obj['dt_back_date'])-strtotime(@$obj['dt_leave_date']));
        $period=intval($periodsec/(60*60));
        $period.=':'.intval(($periodsec%(60*60)));
        
        $client['id']                   = @$obj['pk_i_id'];
        $client['app_no']               = @$obj['pk_i_id'];
        $client['customer_id']          = @$obj['fk_i_emp_id'];
        $client['customer_name']        = @$obj['s_emp_name'];
        $client['leave_date']           = $leave_date;
        $client['start']                = $start;
        $client['end_dior']             = $end_dior;
        $client['period']             = $period;
        $client['leave_type']             = 6056;
        $client['created_at']           = @$obj['dt_created_at'];
        $client['malDesc']              = (@$obj['s_mnge_note']==null?'':$obj['s_mnge_note']);

        $client['created_by']           = @intval($obj['fk_i_created_by']);
        $client['dept_id']              = 0;
        $client['app_type']             = 5;
        $client['b_enabled']            = 1;
        $client['active_trans']         = 0;
        $client['file_ids']             = "[]";
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
