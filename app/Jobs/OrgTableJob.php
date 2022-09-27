<?php

namespace App\Jobs;

use App\Models\Orgnization;
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

class OrgTableJob implements ShouldQueue
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
        $org=new Orgnization();

        $job_title_id=null;
        if($obj['s_name_ar']!=null && $obj['s_name_ar']!=''){
            $constant=Constant::where('name',$obj['s_name_ar'])->where('parent',83)->first();
            if($constant!=null){
                $job_title_id=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['s_name_ar'];
                $constant->parent=83;
                $constant->save();
                $job_title_id=$constant->id;
            }
        }

        // $city_id=null;
        // if($obj['cityname']!=null && $obj['cityname']!=''){
        //     $city=City::where('name',$obj['cityname'])->first();
        //     if($city!=null){
        //         $city_id=$city->id;
        //     }else{
        //         $city=new City();
        //         $city->name=$obj['cityname'];
        //         $city->save();
        //         $city_id=$city->id;
        //     }
        // }

        // $town_id=null;
        // if($obj['townname']!=null && $obj['townname']!=''){
        //     $town=Town::where('name',$obj['townname'])->first();
        //     if($town!=null){
        //         $town_id=$town->id;
        //     }else{
        //         $town=new Town();
        //         $town->name=$obj['townname'];
        //         $town->city_id=$city_id;
        //         $town->save();
        //         $town_id=$town->id;
        //     }
        // }

        // $region_id=null;
        // if($obj['areaname']!=null && $obj['areaname']!=''){
        //     $region=Region::where('name',$obj['areaname'])->first();
        //     if($region!=null){
        //         $region_id=$region->id;
        //     }else{
        //         $region=new Region();
        //         $region->name=$obj['areaname'];
        //         $region->town_id=$town_id;
        //         $region->save();
        //         $region_id=$region->id;
        //     }
        // }

        $org['id']                   = @$obj['pk_i_id'];
        $org['name']                 = @$obj['SponsorName'];
        $org['phone_one']            = @$obj['MobileNo1'];
        $org['phone_two']            = @$obj['MobileNo2'];
        $org['zepe_code']            = @$obj['NationalID'];
        $org['manager_name']         = @$obj['personInCharge'];
        // $org['whatsapp_one']      = @$obj['BussniessName'];
        // $org['whatsapp_two']                = @$obj['EmailAddress'];
        $org['job_title_id']         = $job_title_id;
        $org['email']                = @$obj['EmailAddress'];
        $org['fax']                  = @$obj['faxNo'];
        $org['website']              = @$obj['website'];
        $org['city_id']              = null;
        $org['town_id']              = null;
        $org['region_id']            = null;
        $org['details']              = @$obj['AddressDetailsAR'];
        $org['notes']                = @$obj['NoteAR'];
        $org['add_by']               = @$obj['fk_i_created_by'];
        // $org['group_id']                = @$obj['fk_i_created_by'];
        $org['url']                  = 'orginzation';
        $org['org_type']             = 'orginzation';


        // dd($org,$obj);
        try{
            \DB::beginTransaction();
            $org->save();
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
