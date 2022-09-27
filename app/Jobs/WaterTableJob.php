<?php

namespace App\Jobs;

use App\Models\water;
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

class WaterTableJob implements ShouldQueue
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
        $client=new water();

        $subscription_Type=null;
        if($obj['subscription_Type_name']!=null && $obj['subscription_Type_name']!=''){
            $constant=Constant::where('name',$obj['subscription_Type_name'])->where('parent',39)->first();
            if($constant!=null){
                $subscription_Type=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['subscription_Type_name'];
                $constant->parent=39;
                $constant->save();
                $subscription_Type=$constant->id;
            }
        }
        
        $countertype=null;
        if($obj['counter_type_name']!=null && $obj['counter_type_name']!=''){
            $constant=Constant::where('name',$obj['counter_type_name'])->where('parent',40)->first();
            if($constant!=null){
                $countertype=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['counter_type_name'];
                $constant->parent=40;
                $constant->save();
                $countertype=$constant->id;
            }
        }
        
        $payType=null;
        if($obj['payment_type_name']!=null && $obj['payment_type_name']!=''){
            $constant=Constant::where('name',$obj['payment_type_name'])->where('parent',41)->first();
            if($constant!=null){
                $payType=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['payment_type_name'];
                $constant->parent=41;
                $constant->save();
                $payType=$constant->id;
            }
        }

        

        $client['id']                       = @$obj['pk_i_id'];
        $client['licNo']                    = @$obj['building_lic_no'];
        $client['subscription_no']          = @$obj['subscription_no'];
        $client['subscription_Type']        = $subscription_Type;
        $client['subscription_date']        = @$obj['NationalID'];
        // $client['app_no']                   = @$obj['subscription_no'];
        // $client['counter_no']               = @$obj['counter_no'];
        $client['counter_Type']             = $countertype;
        $client['placeDesc']                = @$obj['address'];
        $client['payType']                  = $payType;
        $client['user_id']                  = @$obj['fk_i_customer_id'];
        $client['notes']                    = @$obj['snotes'];
        $client['enabled']                  = @$obj['b_enabled'];


        // dd($client,$obj);
        try{
            \DB::beginTransaction();
            $client->save();
            \DB::commit();
            \Log::info('client : '.@$obj['pk_i_id']." created");

        }catch (\Exception $e){
            // dd($obj,$e);
            \DB::rollBack();
//            \Log::channel('clients_fails_insert')->info($e->getMessage());
            \Log::error('client : '.@$obj['pk_i_id']." error");

        }


    }

}
