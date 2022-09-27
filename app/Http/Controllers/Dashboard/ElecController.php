<?php



namespace App\Http\Controllers\Dashboard;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\elec;

use App\Http\Requests\elecRequest;

use Yajra\DataTables\DataTables;

use App\Models\User;
use App\Models\Region;
use App\Models\Constant;
use App\Models\Setting;



class ElecController extends Controller

{

    public function index(){

        $type="elec_view";  

        $subscription_TypeData = Constant::where('parent',6032)->where('status',1)->get();

        $counter_TypeData = Constant::where('parent',26)->where('status',1)->get();

        $vasTypeData = Constant::where('parent',29)->where('status',1)->get();

        $payTypeData = Constant::where('parent',32)->where('status',1)->get();
        
        $converterNos = Constant::where('parent',6208)->where('status',1)->get();

        $setting = Setting::first();
        $regions=Region::where('town_id',$setting->town_id)->get();

        return view('dashboard.elec.elecAdd',compact('type','counter_TypeData','vasTypeData','payTypeData','subscription_TypeData','regions' ,'converterNos'));

    }



    public function store_elec(elecRequest $request){
        
        if($request->elecId == null){
            $elec = elec::where('subscription_no',$request->subscription_no)->where('enabled','1')->first();
            if($elec!=null&&$request->subscription_no!=null){
                return response()->json(['status'=>false,'errors'=>array('subscription_no'=>array('رقم الإشتراك مكرر'))]);
            }
            
        }else{
            
            $elec = elec::where('subscription_no',$request->subscription_no)->where('enabled','1')->where('id', '!=' , $request->elecId)->first();
            // dd($request->elecId,$elec);
            if($elec!=null && $request->subscription_no!=null){
                
                return response()->json(['status'=>false,'errors'=>array('subscription_no'=>array('رقم الإشتراك مكرر'))]);
            }
        }

        $elec = new elec();

        if($request->elecId == null){

            $elec->licNo =  $request->licNo;

            $elec->subscription_no = $request->subscription_no;

            $elec->subscription_Type = $request->subscription_Type;

            $elec->vasType = $request->vasType;

            $elec->app_no = $request->app_no;
            
            if($request->subscription_date){
                $from = date_create(($request->subscription_date));
    
                $from = explode('/', ($request->subscription_date)); 
    
                $from = $from[2].'-'.$from[1].'-'.$from[0]; 
                
                $elec->subscription_date = $from;  
            }
            
            
            $elec->counter_no = $request->counter_no;

            $elec->counter_Type = $request->counter_Type;

            $elec->dataAmper  = $request->dataAmper;

            $elec->payType = $request->payType;

            $elec->placeDesc = $request->placeDesc;
            
            $elec->notes = $request->notes;
            
            $elec->poleNo = $request->poleNo;
            
            $elec->converterNo = $request->converterNo;

            $elec->user_id   = $request->customerId;

            $elec->region   = $request->region;

            $elec->save();

         }else{

            $elec = elec::find($request->elecId);

            $elec->licNo =  $request->licNo;

            $elec->subscription_no = $request->subscription_no;

            $elec->subscription_Type = $request->subscription_Type;

            $elec->vasType = $request->vasType;

            $elec->app_no = $request->app_no;
            
            if($request->subscription_date){
                $from = date_create(($request->subscription_date));
    
                $from = explode('/', ($request->subscription_date)); 
    
                $from = $from[2].'-'.$from[1].'-'.$from[0];
                
                $elec->subscription_date = $from;
            }

            

            $elec->counter_no = $request->counter_no;

            $elec->counter_Type = $request->counter_Type;

            $elec->dataAmper  = $request->dataAmper;

            $elec->payType = $request->payType;

            $elec->placeDesc = $request->placeDesc;
            
            $elec->poleNo = $request->poleNo;
            
            $elec->converterNo = $request->converterNo;
            
            $elec->notes = $request->notes;

            $elec->user_id   = $request->customerId;

            $elec->region   = $request->region;

            $elec->save();

         }

         ///dd($elec);

         if ($elec) {

            // return response()->json(['success'=>trans('admin.subscriber_added')]);
            return response()->json(['status'=>true,'errors'=>array('elec'=>array('تمت الإضافة بنجاح'))]);

        }

     

         return response()->json(['errors'=>$validator->errors()->all()]);

    }

    public function elec_delete(Request $request)

    {

          // dd($request->all());
          $elec= elec::find($request['elec_id']);
          $elec->deleted_by = Auth()->user()->id;
          $elec->enabled=0;
          // dd($user->all());
          $elec->save();

          if ($elec) {
  
  
  
              return response()->json(['success'=>trans('admin.subscriber_added')]);
  
          }
  
  
  
          return response()->json(['error'=>$validator->errors()->all()]);
  



    }


    public function elec_info_all(Request $request)

    {

        $elec = elec::select('elecs.*', 'users.name as user_name','licenses.licNo as licNo1','a.name as subscription_Type_name','b.name as counter_Type_name','c.name as vasType_name'

        ,'d.name as payType_name')

        ->where('elecs.enabled',1)
        
        ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')

        ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')

        ->leftJoin('t_constant as c', 'c.id', 'elecs.vasType')

        ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')

        ->leftJoin('users', 'users.id', 'elecs.user_id')
        
        ->leftJoin('licenses', 'licenses.id', 'elecs.licNo')

        ->where('users.enabled',1)

        ->orderBy('elecs.id', 'DESC')

        ->get();

        return DataTables::of($elec)

        ->addIndexColumn()

        ->make(true);

    }

    public function elec_info(Request $request)

    {

        $elec['info'] = elec::select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','c.name as vasType_name'

        ,'d.name as payType_name')

        ->where('elecs.id',$request['elec_id'])

        ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')

        ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')

        ->leftJoin('t_constant as c', 'c.id', 'elecs.vasType')

        ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')

        ->leftJoin('users', 'users.id', 'elecs.user_id')

        ->first();

        

        //$elec['user']=User::find($elec['info']->user_id);

        // $elec['info'] = elec::find($request['elec_id']);

        // ->select('elecs.*','elec_extentions.name as use_desc_name','users.name')

        // ->leftJoin('elec_extentions','elec_extentions.id','elecs.use_desc')

        // ->leftJoin('users','users.id','elecs.user_id')

        // ->orderBy('elecs.id', 'DESC');

        return response()->json($elec);



    }

    public function elec_info_byUser(Request $request)

    {

        $elec['info'] = elec::select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','c.name as vasType_name'

        ,'d.name as payType_name')
        ->where('elecs.enabled',1)
        ->where('elecs.user_id',$request['subscriber_id'])

        ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')

        ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')

        ->leftJoin('t_constant as c', 'c.id', 'elecs.vasType')

        ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')

        ->leftJoin('users', 'users.id', 'elecs.user_id')

        ->get();

        // $elec['info'] = elec::where('user_id','=',$request['subscriber_id'])->get();

        // $elec['user']=User::find($request['subscriber_id']);

        // // $elec['elecEx'] = elecExtention::find($elec['info']->use_desc);

        // // $elec['info'] = elec::find($request['elec_id']);

        // // ->select('elecs.*','elec_extentions.name as use_desc_name','users.name')

        // // ->leftJoin('elec_extentions','elec_extentions.id','elecs.use_desc')

        // // ->leftJoin('users','users.id','elecs.user_id')

        // // ->orderBy('elecs.id', 'DESC');

        return response()->json($elec);



    }



}

