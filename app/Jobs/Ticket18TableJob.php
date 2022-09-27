<?php

namespace App\Jobs;

use App\Models\Constant;
use App\Models\Admin;
use App\Models\AppTicket18;
use App\Models\Town;
use App\Models\City;
use App\Models\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Ticket18TableJob implements ShouldQueue
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
        $client=new AppTicket18();
        
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
        if($obj['engOfficeName']!=null && $obj['engOfficeName']!=''){
            $constant=Constant::where('name',$obj['engOfficeName'])->where('parent',6084)->first();
            if($constant!=null){
                $engOffice=$constant->id;
            }else{
                $constant=new Constant();
                $constant->name=$obj['engOfficeName'];
                $constant->parent=6084;
                $constant->save();
                $engOffice=$constant->id;
            }
        }
        
        // $dept_id=0;
        // if($obj['fk_i_reciver_id']!=null && $obj['fk_i_reciver_id']!=''){
        //     $dept=Admin::where('id',$obj['fk_i_reciver_id'])->first();
        //     if($dept!=null){
        //         $dept_id=$dept->department_id;
        //     }
        // }
        // $address="";
        // if($obj['area_name'])
        // {
        //     $address=$obj['area_name'];
        // }
        // $app_no=intval($obj['fk_i_dept_id'])==7?"1":"2";
        
        $buildingStatus=6083;
        if(intval($obj['status'])==1){
            $buildingStatus=6015;
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
        $client['buildingType']         = $buildingType;
        $client['engOffice']            = $engOffice;
        $client['buildingStatus']       = $buildingStatus;
        $client['beforeMun']            = 1;

        $client['created_by']           = @intval($obj['fk_i_created_by']);
        $client['dept_id']              = 0;
        $client['app_type']             = 3;
        $client['b_enabled']            = 1;
        $client['docs1']                = '["\u0645\u062e\u0637\u0637 \u0645\u0639\u0645\u0627\u0631\u064a \u0645\u0639\u062a\u0645\u062f \u0645\u0646 \u0646\u0642\u0627\u0628\u0629 \u0627\u0644\u0645\u0647\u0646\u062f\u0633\u064a\u0646 3 \u0646\u0633\u062e \u062d\u062f \u0623\u062f\u0646\u0649 \u0648\u0645\u0635\u062f\u0642 \u0645\u0646 \u062f\u0627\u0626\u0631\u0629 \u0627\u0644\u0628\u064a\u0626\u0629","\u0645\u062e\u0637\u0637 \u0645\u0633\u0627\u062d\u0629 \u0645\u0635\u062f\u0642 \u0645\u0646 \u0633\u0644\u0637\u0629 \u0627\u0644\u0623\u0631\u0627\u0636\u064a \u0648\u062f\u0627\u0626\u0631\u0629 \u0627\u0644\u0627\u062b\u0627\u0631","\u062e\u062a\u0645 \u0648\u0632\u0627\u0631\u0629 \u0627\u0644\u0635\u062d\u0629","\u0627\u062b\u0628\u0627\u062a \u0645\u0644\u0643\u064a\u0629","\u062a\u0639\u0647\u062f \u062d\u0641\u0627\u0638 \u0639\u0644\u0649 \u062d\u0635\u0629 \u0627\u0644\u0634\u0631\u0643\u0627\u0621","\u0646\u0633\u062e\u0629 \u0627\u0644\u0643\u062a\u0631\u0648\u0646\u064a\u0629 \u0645\u0646 \u0627\u0644\u0645\u062e\u0637\u0637 \u0627\u0644\u0645\u0639\u0645\u0627\u0631\u064a CD","\u0635\u0648\u0631\u0629 \u0627\u0644\u0647\u0648\u064a\u0629 \u0627\u0644\u0634\u062e\u0635\u064a\u0629",null]';
        $client['docs2']                = '["\u0645\u0648\u0627\u0641\u0642\u0629 \u0627\u0644\u062f\u0641\u0627\u0639 \u0627\u0644\u0645\u062f\u0646\u064a",null]';
        $client['docs3']                = '["\u0645\u062e\u0637\u0637 \u0645\u0633\u0627\u062d\u0629 \u0645\u0635\u062f\u0642 \u0645\u0646 \u0645\u0633\u0627\u062d \u0645\u0631\u062e\u0635","\u0627\u062b\u0628\u0627\u062a \u0645\u0644\u0643\u064a\u0629","\u062a\u0639\u0647\u062f \u062d\u0641\u0627\u0638 \u0639\u0644\u0649 \u062d\u0635\u0629 \u0627\u0644\u0634\u0631\u0643\u0627\u0621","\u0635\u0648\u0631\u0629 \u0627\u0644\u0647\u0648\u064a\u0629 \u0627\u0644\u0634\u062e\u0635\u064a\u0629",null]';
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
