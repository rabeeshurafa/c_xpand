<?php

namespace App\Jobs;

use App\Models\elec;
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

class ElecTableJob implements ShouldQueue
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
        $client=new elec();

        $subscription_Type=null;
        if($obj['counter_type_name']!=null && $obj['counter_type_name']!=''){
            $constant=Constant::where('name',$obj['counter_type_name'])->where('parent',6032)->first();
            if($constant!=null){
                $subscription_Type=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['counter_type_name'];
                $constant->parent=6032;
                $constant->save();
                $subscription_Type=$constant->id;
            }
        }
        
        $countertype=null;
        if(isset($obj['countertype_name']) && $obj['countertype_name']!=null && $obj['countertype_name']!=''){
            $constant=Constant::where('name',$obj['countertype_name'])->where('parent',26)->first();
            if($constant!=null){
                $countertype=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['countertype_name'];
                $constant->parent=26;
                $constant->save();
                $countertype=$constant->id;
            }
        }
        $vasType=null;
        if($obj['capacity_type_name']!=null && $obj['capacity_type_name']!=''){
            $constant=Constant::where('name',$obj['capacity_type_name'])->where('parent',29)->first();
            if($constant!=null){
                $vasType=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['capacity_type_name'];
                $constant->parent=29;
                $constant->save();
                $vasType=$constant->id;
            }
        }
        $payType=null;
        if($obj['payment_type_name']!=null && $obj['payment_type_name']!=''){
            $constant=Constant::where('name',$obj['payment_type_name'])->where('parent',32)->first();
            if($constant!=null){
                $payType=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['payment_type_name'];
                $constant->parent=32;
                $constant->save();
                $payType=$constant->id;
            }
        }

        

        $client['id']                       = @$obj['pk_i_id'];
        $client['licNo']                    = @$obj['building_lic_no'];
        $client['subscription_no']          = @$obj['subscription_no'];
        $client['subscription_Type']        = $subscription_Type;
        $client['subscription_date']        = @$obj['NationalID'];
        $client['app_no']                   = @$obj['app_no'];
        $client['counter_no']               = @$obj['counter_no'];
        $client['counter_Type']             = $countertype;
        $client['dataAmper']                = @$obj['amper'];
        $client['placeDesc']                = @$obj['address'];
        $client['vasType']                  = $vasType;
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
            dd($obj,$e);
            \DB::rollBack();
//            \Log::channel('clients_fails_insert')->info($e->getMessage());
            \Log::error('client : '.@$obj['pk_i_id']." error");

        }


    }

}
