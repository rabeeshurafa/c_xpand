<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class OrderTableJob implements ShouldQueue
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
        $client=new Order();
        
        $related = 0;
        if(intval($obj['related_ticket'])==26)
            $related=31;
        $client['id']                   = @$obj['pk_i_id'];
        $client['ticket_id']          = @intval($obj['fk_i_ticket_id']);
        $client['itemname']        = @$obj['itemname'];
        $client['quantity']       = @$obj['quantity'] ;
        $client['types']       = @$obj['types'];
        $client['price']       = @$obj['price'] ;
        $client['total']           = @$obj['total'];
        $client['related_ticket']           = $related;

        // $client['created_at']           = @$obj['dt_created_at'];
        // $client['created_by']           = @intval($obj['fk_i_created_by']);
        // $client['dept_id']              = 0;
        // $client['app_type']             = 5;
        // $client['b_enabled']            = 1;
        // $client['active_trans']         = 0;
        // $client['hrs']                  = 0;
        // $client['priority']             = 0;
        // $client['ticket_status']        = 0;

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
