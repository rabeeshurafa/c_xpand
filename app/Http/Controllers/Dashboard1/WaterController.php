<?php



namespace App\Http\Controllers\Dashboard;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\water;

use App\Http\Requests\waterRequest;

use Yajra\DataTables\DataTables;

use App\Models\User;

use App\Models\Constant;



class WaterController extends Controller

{

    public function index(){

        $type="water_view";  

        $subscription_TypeData = Constant::where('parent',39)->where('status',1)->get();

        $counter_TypeData = Constant::where('parent',40)->where('status',1)->get();

        $payTypeData = Constant::where('parent',41)->where('status',1)->get();

        return view('dashboard.water.waterAdd',compact('type','counter_TypeData','payTypeData','subscription_TypeData'));  

    }



    public function store_water(Request $request){
        
        if($request->waterId == null){
            
            $water = water::where('subscription_no',$request->subscription_no)->where('enabled','1')->first();
            if($water!=null&&$request->subscription_no!=null){
                return response()->json(['status'=>false,'errors'=>array('subscription_no'=>array('رقم الإشتراك مكرر'))]);
            }
            
        }else{
            
            $water = water::where('subscription_no',$request->subscription_no)->where('enabled','1')->where('id', '!=' , $request->elecId)->first();
            if($water!=null && $request->subscription_no!=null){
                
                return response()->json(['status'=>false,'errors'=>array('subscription_no'=>array('رقم الإشتراك مكرر'))]);
            }
        }

        $water = new water();

        if($request->waterId == null){

            $water->licNo =  $request->licNo;

            $water->subscription_no = $request->subscription_no;

            $water->subscription_Type = $request->subscription_Type;
            
            if($request->subscription_date){
                
                $from = date_create(($request->subscription_date));
    
                $from = explode('/', ($request->subscription_date)); 
    
                $from = $from[2].'-'.$from[1].'-'.$from[0];
    
                $water->subscription_date = $from;
                
            }

            $water->counter_Type = $request->counter_Type;

            $water->payType = $request->payType;

            $water->placeDesc = $request->placeDesc;

            $water->user_id   = $request->customerId;

            $water->save();

         }else{

            $water = water::find($request->waterId);

            $water->licNo =  $request->licNo;

            $water->subscription_no = $request->subscription_no;

            $water->subscription_Type = $request->subscription_Type;
            
            if($request->subscription_date){
                
                $from = date_create(($request->subscription_date));
    
                $from = explode('/', ($request->subscription_date)); 
    
                $from = $from[2].'-'.$from[1].'-'.$from[0];
                
                $water->subscription_date = $from;
            }

            

            $water->counter_Type = $request->counter_Type;

            $water->payType = $request->payType;

            $water->placeDesc = $request->placeDesc;

            $water->user_id   = $request->customerId;

            $water->save();

         }

         ///dd($water);

         if ($water) {

            // return response()->json(['success'=>trans('admin.subscriber_added')]);
            return response()->json(['status'=>true,'errors'=>array('water'=>array('تمت الإضافة بنجاح'))]);
        }

     

         return response()->json(['errors'=>$validator->errors()->all()]);

    }

    public function water_delete(Request $request)

    {

          // dd($request->all());
          $water= water::find($request['water_id']);
          $water->deleted_by = Auth()->user()->id;
          $water->enabled=0;
          // dd($user->all());
          $water->save();
          if ($water) {
  
  
  
              return response()->json(['success'=>trans('admin.subscriber_added')]);
  
          }
  
  
  
          return response()->json(['error'=>$validator->errors()->all()]);
  



    }

    public function water_info_all(Request $request)

    {

        $water= water::select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')->where('waters.enabled',1)
        
        ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')

        ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')

        ->leftJoin('t_constant as d', 'd.id', 'waters.payType')

        ->leftJoin('users','users.id','waters.user_id')
        
        ->orderBy('waters.id', 'DESC')

        ->get();

        

        return DataTables::of($water)

        ->addIndexColumn()

        ->make(true);

    }

    public function water_info(Request $request)

    {

        $water['info']= water::select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')

        ->where('waters.id',$request['water_id'])

        ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')

        ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')

        ->leftJoin('t_constant as d', 'd.id', 'waters.payType')

        ->leftJoin('users','users.id','waters.user_id')

        ->first();

        // $water['info'] = water::find($request['water_id']);

        // $water['user']=User::find($water['info']->user_id);

        // $water['info'] = water::find($request['water_id']);

        // ->swatert('waters.*','water_extentions.name as use_desc_name','users.name')

        // ->leftJoin('water_extentions','water_extentions.id','waters.use_desc')

        // ->leftJoin('users','users.id','waters.user_id')

        // ->orderBy('waters.id', 'DESC');

        return response()->json($water);



    }

    public function water_info_byUser(Request $request)

    {

        $water['info']= water::select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
        ->where('waters.enabled',1)
        ->where('waters.user_id','=',$request['subscriber_id'])

        ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')

        ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')

        ->leftJoin('t_constant as d', 'd.id', 'waters.payType')

        ->leftJoin('users','users.id','waters.user_id')

        ->get();

        // $water['info'] = water::where('user_id','=',$request['subscriber_id'])->get();

        // $water['user']=User::find($request['subscriber_id']);

        // $water['waterEx'] = waterExtention::find($water['info']->use_desc);

        // $water['info'] = water::find($request['water_id']);

        // ->swatert('waters.*','water_extentions.name as use_desc_name','users.name')

        // ->leftJoin('water_extentions','water_extentions.id','waters.use_desc')

        // ->leftJoin('users','users.id','waters.user_id')

        // ->orderBy('waters.id', 'DESC');

        return response()->json($water);



    }



}

