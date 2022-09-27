<?php

namespace App\Jobs;

use App\Models\User;
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

class UserTableJob implements ShouldQueue
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
        $client=new User();
//        if ($obj['TypeMembership'] == 1) {
//            $client['package_id'] = 1;
//
//        } elseif ($obj['TypeMembership'] == 5) {
//            $client['package_id'] = 2;
//        } elseif ($obj['TypeMembership'] == 6) {
//            $client['package_id'] = 3;
//
//        } else {
//            $client['package_id'] = 1;
//        }
        // dd($obj['prof_name']);
        $job_title_id=null;
        if($obj['prof_name']!=null && $obj['prof_name']!=''){
            $constant=Constant::where('name',$obj['prof_name'])->where('parent',74)->first();
            if($constant!=null){
                $job_title_id=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['prof_name'];
                $constant->parent=74;
                $constant->save();
                $job_title_id=$constant->id;
            }
        }

        $city_id=1;
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

        $town_id=1;
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

        $region_id=0;
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

        $client['id']                   = @$obj['pk_i_id'];
        $client['name']                 = @$obj['s_name_ar'];
        $client['phone_one']            = @$obj['MobileNo1'];
        $client['phone_two']            = @$obj['MobileNo2'];
        $client['national_id']          = @$obj['NationalID'];
        $client['cutomer_num']          = @$obj['CutomerNo'];
        $client['bussniess_name']       = @$obj['BussniessName'];
        $client['email']                = @$obj['EmailAddress'];
        $client['job_title_id']         = $job_title_id;
//        $client['addresse_id ']         = @$obj['LastName'];
        $client['enabled']              = @$obj['b_enabled'];
        $client['city_id']              = $city_id;
        $client['town_id']              = $town_id;
        $client['region_id']            = $region_id;
        $client['details']              = @$obj['AddressDetailsAR'];
        $client['notes']                = @$obj['NoteAR'];
        $client['add_by']                = @$obj['fk_i_created_by'];
        $client['url']                  = 'subscribers';


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
