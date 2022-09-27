<?php



namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Daily_work;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class DailyReport extends Controller{

    public function index(){
        $type="dailyWork_view";
        return view('dashboard.reports.dailyWork',compact('type'));
    }

    public function saveReport(Request $request){
        $daily_work = new Daily_work();
        $daily_work->name = $request->formDataNameAR;
        
        $date = explode('/', $request->date);
        $daily_work->date = $date[2].'-'.$date[1].'-'.$date[0];
         
        
        $temp0 = array();
        for ($i=0;$i<sizeof($request->formDataaaorgIdList);$i++){
            if($request->formDataaaorgIdList[$i] == null){
                array_push($temp0,'');
            }else{
                array_push($temp0,$request->formDataaaorgIdList[$i]);
            }
        }
        $daily_work->rowId=json_encode($temp0);
        ///////////////////////////////////////////////
        $daily_work->day = $request->day;
        $temp = array();
        for ($i=0;$i<sizeof($request->work);$i++){
            if($request->work[$i] == null){
                array_push($temp,'');
            }else{
                array_push($temp,$request->work[$i]);
            }
        }
        $daily_work->work = json_encode($temp);
        ///////////////////////////////////////////////
        $temp1 = array();
        for ($i=0;$i<sizeof($request->from);$i++){
            if($request->from[$i] == null){
                array_push($temp1,'');
            }else{
                array_push($temp1,$request->from[$i]);
            }
        }
        $daily_work->timefrom = json_encode($temp1);
        ///////////////////////////////////////////////////
        $temp2 = array();
        for ($i=0;$i<sizeof($request->to);$i++){
            if($request->to[$i] == null){
                array_push($temp2,'');
            }else{
                array_push($temp2,$request->to[$i]);
            }
        }
        $daily_work->timeto = json_encode($temp2);
        /////////////////////////////////////////////////////
        $temp3 = array();
        for ($i=0;$i<sizeof($request->most);$i++){
            if($request->most[$i] == null){
                array_push($temp3,'');
            }else{
                array_push($temp3,$request->most[$i]);
            }
        }
        $daily_work->most = json_encode($temp3);
        //////////////////////////////////////////////////////
        $temp4 = array();
        for ($i=0;$i<sizeof($request->note);$i++){
            if($request->note[$i] == null){
                array_push($temp4,'');
            }else{
                array_push($temp4,$request->note[$i]);
            }
        }
        $daily_work->note = json_encode($temp4);
        $daily_work->save();
    }

    public function showReport(){
        $daily_work = Daily_work::get();
        $tempr = array();
            foreach($daily_work as $sub){
                $sub['work']=json_decode($sub->work);
                $sub['fromTime']=json_decode($sub->timefrom);
                $sub['toTime']=json_decode($sub->timeto);
                $sub['most']=json_decode($sub->most);
                $sub['note']=json_decode($sub->note);
                $sub['morf']=json_decode($sub->rowId);
                array_push($tempr,$sub);
            }
        return DataTables::of($tempr)->addIndexColumn()->make(true);
    }

    public function updateReport(Request $request){
        $empWork = Daily_work::where('id',$request->work_id)->first();
            $empWork['work']=json_decode($empWork->work);
            $empWork['fromTime']=json_decode($empWork->timefrom);
            $empWork['toTime']=json_decode($empWork->timeto);
            $empWork['most']=json_decode($empWork->most);
            $empWork['note']=json_decode($empWork->note);
            return response()->json($empWork);
        }
}