<?php

namespace App\Jobs;

use App\Models\AppTicket1;
use App\Models\Constant;
use App\Models\Admin;

use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Tickt1TableJob implements ShouldQueue
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
        $client=new AppTicket1();
       
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
        
        $dept_id=0;
        
        
        $app_no=intval($obj['fk_i_dept_id'])==7?"1":"2";
        $client['id']                   = @$obj['pk_i_id'];
        $client['app_no']               = @$obj['pk_i_id'];
        $client['receipt_no']           = @$obj['ReciptNo'];
        $client['phase']                = @$obj['capacity'];
        $client['inAmper']              = @$obj['ampere'];
        $client['amount']               = @$obj['AmountInNIS'];
        $client['currency']             = 26;
        $client['subscription_type']    = 6051;
        $client['customer_id']          = @$obj['fk_i_customer_id'];
        $client['customer_name']        = @$obj['customer_name'];
        $client['customer_mobile']      = @$obj['s_mobile'];
        $client['region']               = 0;
        $client['address']              = @$obj['AddressDetailsAR'];
        $client['ownership_type']       = @$obj['ownership_type'];
        $client['owner_id']             = @$obj['owner_id'];
        $client['owner_name']           = @$obj['owner_name'];
        $client['LicenceNo']            = @$obj['licno'];
        $client['created_by']           = @intval($obj['fk_i_created_by']);
        $client['created_at']           = $obj['dt_created_at'];
        $client['dept_id']              = $dept_id;
        $client['app_type']             = $app_no;
        $client['b_enabled']             =1;
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
