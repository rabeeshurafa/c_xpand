<?php

namespace App\Jobs;

use App\Models\Admin;
use App\Models\Constant;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EmpTableJob implements ShouldQueue
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
        $emp=new Admin();
//        if ($obj['TypeMembership'] == 1) {
//            $emp['package_id'] = 1;
//
//        } elseif ($obj['TypeMembership'] == 5) {
//            $emp['package_id'] = 2;
//        } elseif ($obj['TypeMembership'] == 6) {
//            $emp['package_id'] = 3;
//
//        } else {
//            $emp['package_id'] = 1;
//        }

        $job_title_id=null;
        if($obj['pos_name']!=null && $obj['pos_name']!=''){
            $constant=Constant::where('name',$obj['pos_name'])->where('parent',65)->first();
            if($constant!=null){
                $job_title_id=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['pos_name'];
                $constant->parent=65;
                $constant->save();
                $job_title_id=$constant->id;
            }
        }
        if(intval($obj['pk_i_id']) != 74)
        $id = $obj['pk_i_id'];
        else
        $id= 0;
        $emp['id']                  = @$id;
        $emp['name']                = @$obj['NameAR'];
        $emp['email']               = @$obj['EmailAddress'];
        $emp['nick_name']           = @$obj['nickname'];
        $emp['identification']      = @$obj['NationalID'];
        $emp['image']               = 'https://t.expand.ps/expand_repov1/public/assets/images/ico/user.png';
        $emp['job_Number']          = @$obj['JobNumber'];
        $emp['phone_one']           = @$obj['MobileNo1'];
        $emp['phone_two']           = @$obj['MobileNo2'];
        $emp['InternalPhone']       = @$obj['InternalPhone'];
        $emp['salary']              = @$obj['Salary'];
        $emp['currency']            = @$obj['CurrencyID'];
        $emp['username']            = $obj['username'];
        $emp['start_date']          = @$obj['HiringDate'] ;
//        $emp['status']              = @$obj['is_active'];
        $emp['password']            = bcrypt(trim(@$obj['password']));
        $emp['admin_id']            = @$obj['DirectManager'];
        // $emp['role_id']             = 11;
        $emp['add_by']              = 0;
        $emp['status']             = 'on';
        $emp['curr_pass']           = @$obj['password'];
        $emp['job_title_id']        = $job_title_id;
        $emp['job_type_id']         = 70;
        $emp['department_id']       = @$obj['DepartmentID'];
        $emp['year']                = @$obj['vac_year'];
        $emp['balance']             = @$obj['vac_annual'];
        $emp['emergency']           = @$obj['vac_argent'];
        $emp['city_id']             = 6;
        $emp['town_id']             = 14;
        $emp['region_id']           = null;
        $emp['details']             = @$obj['AddressDetailsAR'];
        $emp['notes']               = @$obj['NoteAR'];

                // dd($emp,$obj);
        try{
            \DB::beginTransaction();
            $emp->save();
            \DB::commit();
            \Log::info('employee : '.@$obj['pk_i_id']." created");

        }catch (\Exception $e){
            \DB::rollBack();
//            \Log::channel('clients_fails_insert')->info($e->getMessage());
            \Log::error('employee : '.@$obj['pk_i_id']." error");

        }


    }

}
