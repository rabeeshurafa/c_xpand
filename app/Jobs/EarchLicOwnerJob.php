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

class EarchLicOwnerJob implements ShouldQueue
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
        if($obj['fk_i_ref_id'] != null && $obj['fk_i_ref_id']!='')
            $client=Earh_lic::where('id',$obj['fk_i_ref_id'])->first();
        if($client != null){
            
            $user_name= json_decode($client->user_name);
            array_push($user_name, $obj['s_customer_name']);
            $client->user_name=json_encode($user_name);
            
            $user_id= json_decode($client->user_id);
            array_push($user_id, $obj['fk_i_customer_id']);
            $client->user_id=json_encode($user_id);
            
            $user_national= json_decode($client->user_national);
            array_push($user_national, $obj['ssn']);
            $client->user_national=json_encode($user_national);
            
            $notes2= json_decode($client->notes2);
            array_push($notes2, $obj['s_notes2']);
            $client->notes2=json_encode($notes2);
            
        }
        
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
