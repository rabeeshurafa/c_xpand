<?php



namespace App\Http\Controllers\Dashboard;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\EarchLicRequest;

use Yajra\DataTables\DataTables;

use App\Models\Earh_lic;


class EarchLicController extends Controller

{

    public function index(){
        $type = 'EarchLic';
        return view('dashboard.EarchLic.index',compact('type'));
    }

    public function saveEarchLic(EarchLicRequest $request){
        // dd($request->all());
        if($request->cer_pk_id&&$request->cer_pk_id!=0)
            {
                $earchLic=Earh_lic::where('id','=',$request->id)->first();
            }
        else
            {
                $earchLic = new Earh_lic();
            }
        // dd($earchLic);
          $earchLic->cert_no = $request->certid;
          $date = strtotime($request->certdate);
          $earchLic->date = date('Y-m-d', $date);
          $earchLic->wasl_no = $request->recept_no;
          $earchLic->area = $request->peacem;
          $earchLic->cert_cost = $request->fees;
          $earchLic->total = (intval($request->peacem*.2))+$request->peacem;
          $earchLic->proj_id = $request->projectid;
          $earchLic->proj_name = $request->projectname;
          $earchLic->sponser_id = $request->sponserid;
          $earchLic->sponser_model = $request->sponsermodel;
          $earchLic->sponser_name = $request->sponser;
          $earchLic->area_name = $request->areaname2;
          $earchLic->added_by =Auth()->user()->id;
          
          $user_name=array();
          $user_id=array();
          $hod_no=array();
          $pice_no=array();
          $notes1=array();
          $notes2=array();
          $user_national=array();
          
          for($i=0 ; $i<sizeof($request->NameARList) ; $i++ ){
              if($request->NameARList[$i]!=null){
                  array_push($user_name, $request->NameARList[$i]);
                  array_push($user_id, $request->id1[$i]);
                  array_push($user_national, $request->ssn[$i]);
              }
          }
          
          for($i=0 ; $i<sizeof($request->sequareNo) ; $i++ ){
              if($request->sequareNo[$i]!=null){
                  array_push($hod_no, $request->sequareNo[$i]);
              }
          }
          
          for($i=0 ; $i<sizeof($request->peaceNo) ; $i++ ){
              if($request->peaceNo[$i]!=null){
                  array_push($pice_no, $request->peaceNo[$i]);
              }
          }
          
          for($i=0 ; $i<sizeof($request->s_notes) ; $i++ ){
              if($request->s_notes[$i]!=null){
                  array_push($notes1, $request->s_notes[$i]);
              }
          }
          
          for($i=0 ; $i<sizeof($request->s_notes2) ; $i++ ){
              if($request->s_notes2[$i]!=null){
                  array_push($notes2, $request->s_notes2[$i]);
              }
          }
          
          
          $earchLic->user_name = json_encode($user_name);
          $earchLic->user_id = json_encode($user_id);
          $earchLic->hod_no = json_encode($hod_no);
          $earchLic->pice_no	=json_encode($pice_no);
          $earchLic->notes1	=json_encode($notes1);
          $earchLic->user_national = json_encode($user_national);
          $earchLic->notes2 =json_encode($notes2);
        //   $earchLic->save();

        if ($earchLic) {
            return response()->json(['status'=>trans('admin.extention_added')]);
        }else{
            return response()->json(['status'=>$validator->errors()->all()]);
        }
    }
    
    public function printLicEarth($appid=0)
	{
	    $res=Earh_lic::where('id','=',$appid)->first();
	    $res['user_name']=json_decode($res->user_name);
	    $res['hod_no']=json_decode($res->hod_no);
	    $res['pice_no']=json_decode($res->pice_no);
	    $res['user_national']=json_decode($res->user_national);
	    $res['notes1']=json_decode($res->notes1);
	    $res['notes2']=json_decode($res->notes2);
	   // dd($res);
        return view('dashboard.EarchLic.printLicEarth', compact('res'));
    }
    
    public function all_EarchLic(){
        $res=Earh_lic::where('enabled',1)->get();
        
        foreach($res as $row){
    	    $row['user_name']=json_decode($row->user_name);
    	    $row['hod_no']=json_decode($row->hod_no);
    	    $row['pice_no']=json_decode($row->pice_no);
    	    $row['user_national']=json_decode($row->user_national);
    	    $row['notes1']=json_decode($row->notes1);
    	    $row['notes2']=json_decode($row->notes2);
            
        }
	   // dd($res);
        return DataTables::of($res)->addIndexColumn()->make(true);
        
    }
    
    public function earchLic_info(Request $requset){
        $res=Earh_lic::where('id',$requset->id)->first();
        
	    $res['user_name']=json_decode($res->user_name);
	    $res['user_id']=json_decode($res->user_id);
	    $res['hod_no']=json_decode($res->hod_no);
	    $res['pice_no']=json_decode($res->pice_no);
	    $res['user_national']=json_decode($res->user_national);
	    $res['notes1']=json_decode($res->notes1);
	    $res['notes2']=json_decode($res->notes2);
         
	   // dd($res);
        return response()->json($res);
        
    }
    
    public function earchLic_delete(Request $request)
    {
        // dd($request->all());
        $res= Earh_lic::find($request['id']);
        $res->deleted_by = Auth()->user()->id;
        $res->enabled=0;
        $res->save();
        
        if ($res) {
            return response()->json(['success'=>trans('admin.subscriber_added')]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
       
    }

}

