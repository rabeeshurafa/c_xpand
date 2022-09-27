<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobLic;
use App\Http\Requests\jobLicRequest;
use Yajra\DataTables\DataTables;
use App\Models\User;

class jobLicController extends Controller
{
    public function index()
    {
        $type='jobLic';
       return view('dashboard.jobLic.jobLic',compact('type'));
    }

    public function store_jobLic(Request $request){
        if($request->jobLicId == null){
            $jobLic = new jobLic();
            $jobLic->name =  $request->name;
            $jobLic->address = $request->address;
            $jobLic->street = $request->street;
            $jobLic->lic_cat = $request->lic_cat;
            $jobLic->nationalId = $request->nationalId;
            $jobLic->waselNo = $request->waselNo;
            
            $from = date_create(($request->start_date));
            $from = explode('/', ($request->start_date)); 
            $from = $from[2].'-'.$from[1].'-'.$from[0];
            $jobLic->start_date = $from;
            
            
            $from = date_create(($request->end_date));
            $from = explode('/', ($request->end_date)); 
            $from = $from[2].'-'.$from[1].'-'.$from[0];
            $jobLic->end_date = $from;
           
            $from = date_create(($request->wasel_date));
            $from = explode('/', ($request->wasel_date)); 
            $from = $from[2].'-'.$from[1].'-'.$from[0];
            $jobLic->wasel_date = $from;
          
            $jobLic->lic_type = $request->lic_type;
            $jobLic->hadNo  = $request->hadNo;
            $jobLic->lic_name = $request->lic_name;
            $jobLic->licNo = $request->licNo;
            $jobLic->user_id   = $request->customerId;

            $jobLic->save();
         }else{
            $jobLic = jobLic::find($request->jobLicId);
            $jobLic->name =  $request->name;
            $jobLic->address = $request->address;
            $jobLic->street = $request->street;
            $jobLic->lic_cat = $request->lic_cat;
            $jobLic->nationalId = $request->nationalId;
            $jobLic->waselNo = $request->waselNo;
            
            $from = date_create(($request->start_date));
            $from = explode('/', ($request->start_date)); 
            $from = $from[2].'-'.$from[1].'-'.$from[0];
            $jobLic->start_date = $from;
            
            
            $from = date_create(($request->end_date));
            $from = explode('/', ($request->end_date)); 
            $from = $from[2].'-'.$from[1].'-'.$from[0];
            $jobLic->end_date = $from;
           
            $from = date_create(($request->wasel_date));
            $from = explode('/', ($request->wasel_date)); 
            $from = $from[2].'-'.$from[1].'-'.$from[0];
            $jobLic->wasel_date = $from;
          
            $jobLic->lic_type = $request->lic_type;
            $jobLic->hadNo  = $request->hadNo;
            $jobLic->lic_name = $request->lic_name;
            $jobLic->licNo = $request->licNo;
            $jobLic->user_id   = $request->customerId;

            $jobLic->save();
         }
         if ($jobLic) {
            return response()->json(['success'=>trans('admin.subscriber_added')]);
        }
     
         return response()->json(['errors'=>$validator->errors()->all()]);
    }
    
    public function jobLic_info_all(Request $request)
    {
        $jobLic= jobLic::select('jobLic.*','users.name')
        ->leftJoin('users','users.id','jobLic.user_id')
        ->orderBy('jobLic.id', 'DESC')
        ->get();
        return DataTables::of($jobLic)
        ->addIndexColumn()
        ->make(true);
    }
    public function jobLic_info(Request $request)
    {
        $jobLic['info'] = jobLic::find($request['jobLic_id']);
        $jobLic['user']=User::find($jobLic['info']->user_id);
        // $jobLic['info'] = jobLic::find($request['jobLic_id']);
        // ->select('jobLic.*','jobLic_extentions.name as use_desc_name','users.name')
        // ->leftJoin('jobLic_extentions','jobLic_extentions.id','jobLic.use_desc')
        // ->leftJoin('users','users.id','jobLic.user_id')
        // ->orderBy('jobLic.id', 'DESC');
        return response()->json($jobLic);

    }
    public function jobLic_info_byUser(Request $request)
    {
        $jobLic['info'] = jobLic::where('user_id','=',$request['subscriber_id'])->get();
        $jobLic['user']=User::find($request['subscriber_id']);
        // $jobLic['jobLicEx'] = jobLicExtention::find($jobLic['info']->use_desc);
        // $jobLic['info'] = jobLic::find($request['jobLic_id']);
        // ->select('jobLic.*','jobLic_extentions.name as use_desc_name','users.name')
        // ->leftJoin('jobLic_extentions','jobLic_extentions.id','jobLic.use_desc')
        // ->leftJoin('users','users.id','jobLic.user_id')
        // ->orderBy('jobLic.id', 'DESC');
        return response()->json($jobLic);

    }
}
