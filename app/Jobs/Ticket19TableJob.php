<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket19;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Ticket19TableJob implements ShouldQueue
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
        $client=new AppTicket19();
        
        $buildingType=0;
        if($obj['BuildingTypeName']!=null && $obj['BuildingTypeName']!=''){
            $constant=Constant::where('name',$obj['BuildingTypeName'])->where('parent',6016)->first();
            if($constant!=null){
                $buildingType=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['BuildingTypeName'];
                $constant->parent=6016;
                $constant->save();
                $buildingType=$constant->id;
            }
        }
        $engOffice=0;
        if($obj['SurveyorOfficeName']!=null && $obj['SurveyorOfficeName']!=''){
            $constant=Constant::where('name',$obj['SurveyorOfficeName'])->where('parent',6084)->first();
            if($constant!=null){
                $engOffice=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['SurveyorOfficeName'];
                $constant->parent=6084;
                $constant->save();
                $engOffice=$constant->id;
            }
        }
        
        $client['id']                   = @$obj['pk_i_id'];
        $client['app_no']               = @$obj['pk_i_id'];
        $client['customer_id']          = @$obj['fk_i_customer_id'];
        $client['customer_name']        = @$obj['customer_name'];
        $client['customer_mobile']      = @$obj['PHnum1'];
        $client['region']               = 0;
        $client['address']              = @$obj['AddressDetails'];
        $client['created_at']           = @$obj['dt_created_at'];
        $client['hodNo']                = @$obj['BasinNo'];
        $client['pieceNo']              = @$obj['PieceNo'];
        $client['fileNo']             = @$obj['file_num'];
        $client['buildingType']         = $buildingType;
        $client['engOffice']            = $engOffice;

        $client['created_by']           = @intval($obj['fk_i_created_by']);
        $client['dept_id']              = 0;
        $client['app_type']             = 3;
        $client['b_enabled']            = 1;
        $client['attatchName']          = '["\u0627\u062b\u0628\u0627\u062a \u0645\u0644\u0643\u064a\u0629","\u0628\u0631\u0623\u0629 \u0630\u0645\u0629","\u062a\u0639\u0647\u062f \u062d\u0641\u0627\u0638 \u0639\u0644\u0649 \u062d\u0635\u0629 \u0627\u0644\u0634\u0631\u0643\u0627\u0621","\u0635\u0648\u0631\u0629 \u0627\u0644\u0647\u0648\u064a\u0629 \u0627\u0644\u0634\u062e\u0635\u064a\u0629"]';
        // $client['malDesc']              = @$obj['malDesc'];
        $client['active_trans']         = 0;
        $client['debt_json']            = "[]";
        $client['file_ids']             = "[]";
        $client['hrs']                  = 0;
        $client['priority']             = 0;
        $client['ticket_status']        = 0;

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
