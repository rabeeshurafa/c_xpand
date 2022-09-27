<?php

namespace App\Jobs;

use App\Models\License;
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

class LicTableJob implements ShouldQueue
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

        $client['id']                       = @$obj['pk_i_id'];
        $client['user_id']                  = @$obj['fk_i_customer_id'];
        $client['peiceNo']                  = @$obj['PiceNo'];
        $client['bSeatDateList']            = @$obj['SeatDate'];
        $client['hodNo']                    = @$obj['sequareNo'];
        // $client['licenseArea']              = @$obj['NationalID'];
        // $client['floorNo']                  = @$obj['subscription_no'];
        $client['license_date']             = @$obj['OpenDate'];
        $client['releas_date']              = @$obj['generateDate'];
        $client['bSeatNoList']              = @$obj['SeatNo'];
        $client['building_desc']            = @$obj['address'];
        $client['licNo']                    = @$obj['buldingLicNo'];
        $client['fileNo']                   = @$obj['BuldingNo'];
        $client['use_desc']                 = @$obj['BuildingType_name'];
        $client['notes']                    = @$obj['snotes'];
        $client['site']                     = @$obj['areaName'];
        $client['enabled']                  = @$obj['b_enabled'];


        // dd($client,$obj);
        try{
            \DB::beginTransaction();
            $client->save();
            \DB::commit();
            \Log::info('client : '.@$obj['pk_i_id']." created");

        }catch (\Exception $e){
//            dd($obj,$e);
            \DB::rollBack();
//            \Log::channel('clients_fails_insert')->info($e->getMessage());
            \Log::error('client : '.@$obj['pk_i_id']." error");

        }


    }

}
