<?php

namespace App\Jobs;

use App\Models\ArchiveLicense;
use App\Models\Constant;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LicArchTableJob implements ShouldQueue
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
        $client=new ArchiveLicense();
       
        $client['id']                   = @$obj['pk_i_id'];
        $client['name']                 = @$obj['customer_name'];
        $client['type']                 = "licArchive";
        $client['model_id']             = @$obj['fk_i_customer_id'];
        $client['model_name']           = "App\\Models\\User";
        $client['model']                = "App\\Models\\ArchiveLicense";
        $client['use_desc']             = "سكني";
        $client['json_feild']           = @$obj['json_feild'];
        $client['add_by']               = @$obj['fk_i_created_by'];
        $client['licNo']                = @$obj['lic_no'];
        $client['url']                  = "lic_archieve";


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
