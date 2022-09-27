<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket7;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Ticket7TableJob implements ShouldQueue
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
        $client=new AppTicket7();
        
        $dept_id=0;
        // if($obj['fk_i_reciver_id']!=null && $obj['fk_i_reciver_id']!=''){
        //     $dept=Admin::where('id',$obj['fk_i_reciver_id'])->first();
        //     if($dept!=null){
        //         $dept_id=$dept->department_id;
        //     }
        // }
        
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
        
        // $address="";
        // if($obj['area_name'])
        // {
        //     $address=$obj['area_name'];
        // }
        
        $user=User::where('id',intval($obj['fk_i_customer_id']))->first();
        $name='';
        $phone='';
        if($user){
            $name=$user->name;
            $phone=$user->phone_one;
        }
        
        $app_no=intval($obj['fk_i_dept_id'])==7?"1":"2";
        $client['id']                   = @$obj['pk_i_id'];
        $client['app_no']               = @$obj['pk_i_id'];
        $client['customer_id']          = @$obj['fk_i_customer_id'];
        $client['customer_name']        = $name;
        $client['customer_mobile']      = $phone;
        $client['region']               = 0;
        $client['address']              = '';
        $client['created_by']           = @intval($obj['fk_i_created_by']);
        $client['created_at']           = $obj['dt_created_at'];
        $client['dept_id']              = $dept_id;
        $client['app_type']             = $app_no;
        $client['b_enabled']            =1;
        $client['malDesc']              = @$obj['malDesc'];
        $client['active_trans']         = 0;
        $client['subs']                 = "[]";
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
