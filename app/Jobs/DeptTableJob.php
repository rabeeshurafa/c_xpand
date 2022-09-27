<?php

namespace App\Jobs;

use App\Models\Department;
use App\Models\Constant;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeptTableJob implements ShouldQueue
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
        $dept=new Department();
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

       

        $dept['id']                  = @$obj['pk_i_id'];
        $dept['name']                = @$obj['s_name_ar'];
        $dept['email']               = @$obj['deptemail'];
        $dept['extphone']            = @$obj['internalphone'];
        $dept['department_id']       = @$obj['fk_i_parent_id'];
        $dept['enabled']             = @$obj['b_enabled'];
        // dd($dept,$obj);
        try{
            \DB::beginTransaction();
            $dept->save();
            \DB::commit();
            \Log::info('employee : '.@$obj['pk_i_id']." created");

        }catch (\Exception $e){
            \DB::rollBack();
//            \Log::channel('clients_fails_insert')->info($e->getMessage());
            \Log::error('employee : '.@$obj['pk_i_id']." error");

        }


    }

}
