<?php



namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Daily_work;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class Reporth extends Controller{
    public function index(){
        $type="reporth_view";
        return view('dashboard.reports.reporth',compact('type'));
    }
    public function searchReport(Request $request){
        
        $date1 = explode('/', $request->from);
        $from1 = $date1[2].'-'.$date1[1].'-'.$date1[0];
        
        $date2 = explode('/', $request->to);
        $to2 = $date2[2].'-'.$date2[1].'-'.$date2[0];

        $searched = Daily_work::whereBetween('date',[$from1, $to2]);
        $tempr = array();
        if(($request->name == null || $request->name == "")&&($request->mostt == null || $request->mostt == "")){
            $searched = $searched->get();
        }else if(($request->name != null || $request->name != "")&&($request->mostt == null || $request->mostt == "")){
            $searched = $searched->where('name',$request->name)->get();
        }else if(($request->name == null || $request->name == "")&&($request->mostt != null || $request->mostt != "")){
            $searched = $searched->whereJsonContains('most', strval($request->mostt))->get();
        }else{
            $searched = $searched->where('name',$request->name)->whereJsonContains('most', strval($request->mostt))->get();
        }
        
        foreach($searched as $sub){
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
}
