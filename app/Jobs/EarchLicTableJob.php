<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\Earh_lic;
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

class EarchLicTableJob implements ShouldQueue
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
        $client=new Earh_lic();
        
        $sequareNo_2=array();
        if($obj['sequareNo_2']!=null && $obj['sequareNo_2']!=''){
            array_push($sequareNo_2, $obj['sequareNo_2']);
        }
        $peaceNo_2=array();
        if($obj['peaceNo_2']!=null && $obj['peaceNo_2']!=''){
            array_push($peaceNo_2, $obj['peaceNo_2']);
        }
        
        
        $client['id']               = @$obj['pk_i_id'];
        $client['cert_no']          = @$obj['certid'];
        $client['date']             = @$obj['certdate'];
        $client['wasl_no']          = @$obj['recept_no'];
        $client['area']             = @$obj['peacem'];
        $client['cert_cost']        = @$obj['fees'];
        $client['total']            = @$obj['finalPrice'];
        // $client['proj_id']          = @$obj['SubscriberID1'];
        $client['proj_name']        = @$obj['projectname'];
        $client['sponser_id']       = @$obj['sponserid'];
        // $client['sponser_model']    = @$obj['sponser'];
        $client['sponser_name']     = @$obj['sponser'];
        $client['sequareNo_2']      = @$obj['sequareNo_2'];
        $client['peaceNo_2']        = @$obj['peaceNo_2'];
        $client['user_name']        = '[]';
        $client['user_id']          = '[]';
        $client['hod_no']           = json_encode($sequareNo_2);
        $client['pice_no']          = json_encode($peaceNo_2);
        $client['notes1']           = '[]';
        $client['area_name']        = @$obj['areaname2'];
        $client['user_national']    = '[]';
        $client['notes2']           = '[]';
        // $client['enabled']          = $dept_id;
        $client['added_by']         = @$obj['fk_i_created_by'];
        $client['created_at']       =@$obj['dt_created_at'];
        

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
