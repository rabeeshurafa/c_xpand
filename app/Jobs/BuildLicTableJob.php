<?php

namespace App\Jobs;

use App\Models\License;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BuildLicTableJob implements ShouldQueue
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
        $client=new License();
        
        $BuildingType='';
        if (@$obj['BuildingType']==50){
            $BuildingType='سكنية';
        }elseif(@$obj['BuildingType']==51){
            $BuildingType='تجاري';
        }else{
            $BuildingType='بلدية';
        }

        $client['id']                   = @$obj['pk_i_id'];
        $client['peiceNo']              = @$obj['PiceNo'];
        $client['hodNo']                = @$obj['sequareNo'];
        $client['bSeatDateList']        = @$obj['SeatDate'];
        $client['bSeatNoList']          = @$obj['SeatNo'];
        $client['releas_date']          = @$obj['generateDate'];
        $client['region']               = 0;
        $client['license_date']         = @$obj['OpenDate'];
        $client['building_desc']        = '';
        $client['licNo']                = @$obj['buldingLicNo'];
        $client['fileNo']               = @$obj['BuldingNo'];
        $client['enabled']              = @$obj['b_enabled'];
        $client['use_desc']             = $BuildingType;
        $client['notes']                = @$obj['snotes'];
        $client['site']                 = @$obj['balance'];
        $client['user_id']              = @$obj['fk_i_customer_id'];
        // $client['licenseArea']          = @$obj['NationalID'];
        // $client['floorNo']              = @$obj['CutomerNo'];
        // $client['allArea']              = @$obj['EmailAddress'];
        // $client['fileNo']               = @$obj['CityID'];

//                dd($client,$obj);
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
