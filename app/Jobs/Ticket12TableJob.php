<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket12;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Ticket12TableJob implements ShouldQueue
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
        $client=new AppTicket12();
        
        // $dept_id=0;
        // if($obj['fk_i_reciver_id']!=null && $obj['fk_i_reciver_id']!=''){
        //     $dept=Admin::where('id',$obj['fk_i_reciver_id'])->first();
        //     if($dept!=null){
        //         $dept_id=$dept->department_id;
        //     }
        // }
        // $address="";
        // if($obj['area_name'])
        // {
        //     $address=$obj['area_name'];
        // }
        // $app_no=intval($obj['fk_i_dept_id'])==7?"1":"2";
        
        if(isset($obj['json_fees'])&&$obj['json_fees']){
            $ticketAllFees=array();
            $ticketFees=json_decode($obj['json_fees']);
            foreach ($ticketFees as $key=>$value)
            {
                $temp=array();
                $temp['feesText']=trim($key);
                $temp['feesValue']=trim($value);
                array_push($ticketAllFees, $temp);
            }
            $client->fees_json=json_encode($ticketAllFees);
        }else{
            $client->fees_json='[]';
        }
        
        $ticket_type="6012";
        if(isset($obj['ticket_type'])&&$obj['ticket_type']=='2342'){
            $ticket_type="6013";
        }
        
        $client['id']                   = @$obj['pk_i_id'];
        $client['app_no']               = @$obj['pk_i_id'];
        $client['customer_id']          = @$obj['fk_i_customer_id'];
        $client['customer_name']        = @$obj['customer_name'];
        $client['customer_mobile']      = @$obj['s_mobile'];
        $client['address']              = @$obj['s_address'];
        $client['region']               = 0;
        $client['task_type']             = $ticket_type;
        $client['malDesc']              = @$obj['s_reson'];
        $client['created_at']           = @$obj['dt_created_at'];
        $client['created_by']           = @intval($obj['fk_i_created_by']);
        $client['dept_id']              = 0;
        $client['app_type']             = 1;
        $client['b_enabled']            = 1;
        $client['active_trans']         = 0;
        $client['debt_json']            = "[]";
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
