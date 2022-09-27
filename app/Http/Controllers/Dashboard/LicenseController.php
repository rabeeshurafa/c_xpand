<?php



namespace App\Http\Controllers\Dashboard;



use Illuminate\Http\Request;

use App\Models\LicenseExtention;

use App\Http\Controllers\Controller;

use App\Models\License;

use App\Http\Requests\LicenseRequest;

use Yajra\DataTables\DataTables;

use App\Models\User;
use App\Models\Constant;
use App\Models\Region;
use App\Models\Setting;


class LicenseController extends Controller

{

    public function index(){

        $type="license_view";
        $setting = Setting::first();
        $regions=Region::where('town_id',$setting->town_id)->get();
        $use_desc = Constant::where('parent',6214)->where('status',1)->get();
        return view('dashboard.license.licenseAdd',compact('type','regions','use_desc'));

    }



    public function store_license(Request $request){


         //dd($request->licenseId);
        $license = new License();
        if($request->licenseId == null){

            // $license->model = "App\Models\license";

            // $license->name = $request->customerName;
            $licNo = license::where('licNo',$request->licNo)->where('enabled','1')->first();
            // dd($licNo->all());
            $fileNo = license::where('fileNo',$request->fileNo)->where('enabled','1')->first();
            if($licNo!=null&&$request->licNo!=null){
                // dd($licNo);
                return response()->json(['status'=>false,'errors'=>array('licNo'=>array('رقم الرخصة مكرر'))]);
            }
            if($fileNo!=null&&$request->fileNo!=null){
                // dd($fileNo);
                return response()->json(['status'=>false,'errors'=>array('fileNo'=>array('رقم ملف الترخيص مكرر'))]);
            }
            
            
            $license->bSeatDateList = '';
            
            if($request->bSeatDateList!=null && $request->bSeatDateList!=''){

                $bSeatDateList = date_create(($request->bSeatDateList));

                $bSeatDateList = explode('/', ($request->bSeatDateList)); 

                $bSeatDateList = $bSeatDateList[2].'-'.$bSeatDateList[1].'-'.$bSeatDateList[0];

                $license->bSeatDateList = $bSeatDateList;
            }
            
            $license->license_date = '';
            
            if($request->license_date !=null && $request->license_date!=''){

                $from = date_create(($request->license_date));

                $from = explode('/', ($request->license_date)); 

                $from = $from[2].'-'.$from[1].'-'.$from[0];

                $license->license_date = $from;
            }
            
            $license->releas_date = '';
            
            if($request->releas_date !=null && $request->releas_date!=''){

                $releas_date = date_create(($request->releas_date));

                $releas_date = explode('/', ($request->releas_date)); 

                $releas_date = $releas_date[2].'-'.$releas_date[1].'-'.$releas_date[0];

                $license->releas_date = $releas_date;
            }

            $license->hodNo = $request->hodNo;

            $license->licenseArea = $request->licenseArea;

            $license->floorNo = $request->floorNo;

            $license->peiceNo =  $request->peiceNo;

            // $license->allArea = $request->allArea;

            $license->building_desc  = $request->building_desc;

            $license->licNo = $request->licNo;

            $license->fileNo = $request->fileNo;

            $license->notes  = $request->notes;

            $license->site  = $request->site;

            $license->bSeatNoList  = $request->bSeatNoList;

            $license->fees  = $request->fees;

            $license->paid_up  = $request->paid_up;

            $license->rest  = $request->rest;

            $license->user_id   = $request->customerId;

            $license->region   = $request->region;

            $license->use_desc   = $request->use_desc;

            $license->save();

         }else{

            $licNo = license::where('licNo',$request->licNo)->where('enabled','1')->where('id', '!=' , $request->licenseId)->first();
            $fileNo = license::where('fileNo',$request->fileNo)->where('enabled','1')->where('id', '!=' , $request->licenseId)->first();
            if($licNo!=null&&$request->licNo!=null){
                // if($request->licenseId!= $licNo->licenseId)
                return response()->json(['status'=>false,'errors'=>array('licNo'=>array('رقم الرخصة مكرر'))]);
            }
            if($fileNo!=null&&$request->fileNo!=null){
                // if($request->licenseId!= $licNo->licenseId)
                return response()->json(['status'=>false,'errors'=>array('fileNo'=>array('رقم ملف الترخيص مكرر'))]);
            }
            
            $license = License::find($request->licenseId);
            
            $license->bSeatDateList = '';
            
            if($request->bSeatDateList!=null && $request->bSeatDateList!=''){

                $bSeatDateList = date_create(($request->bSeatDateList));

                $bSeatDateList = explode('/', ($request->bSeatDateList)); 

                $bSeatDateList = $bSeatDateList[2].'-'.$bSeatDateList[1].'-'.$bSeatDateList[0];

                $license->bSeatDateList = $bSeatDateList;
            }
            
            $license->license_date = '';
            
            if($request->license_date !=null && $request->license_date!=''){

                $from = date_create(($request->license_date));

                $from = explode('/', ($request->license_date)); 

                $from = $from[2].'-'.$from[1].'-'.$from[0];

                $license->license_date = $from;
            }
            
            $license->releas_date = '';
            
            if($request->releas_date !=null && $request->releas_date!=''){

                $releas_date = date_create(($request->releas_date));

                $releas_date = explode('/', ($request->releas_date)); 

                $releas_date = $releas_date[2].'-'.$releas_date[1].'-'.$releas_date[0];

                $license->releas_date = $releas_date;
            }

            $license->peiceNo =  $request->peiceNo;

            $license->hodNo = $request->hodNo;

            $license->licenseArea = $request->licenseArea;

            $license->floorNo = $request->floorNo;

            // $license->allArea = $request->allArea;

            $license->building_desc  = $request->building_desc;

            $license->licNo = $request->licNo;

            $license->fileNo = $request->fileNo;

            $license->use_desc  = $request->use_desc;

            $license->notes  = $request->notes;

            $license->site  = $request->site;

            $license->bSeatNoList  = $request->bSeatNoList;

            $license->fees  = $request->fees;

            $license->paid_up  = $request->paid_up;

            $license->rest  = $request->rest;

            $license->user_id   = $request->customerId;

            $license->region   = $request->region;


            $license->save();

         }

         ///dd($license);

         if ($license) {

            //return response()->json(['success'=>trans('admin.subscriber_added')]);
            
            return response()->json(['status'=>true,'errors'=>array('fileNo'=>array('تمت الإضافة بنجاح'))]);

        }

     

         return response()->json(['errors'=>$validator->errors()->all()]);

    }

    

    public function license_info_all(Request $request)

    {

        $license= license::select('licenses.*','users.name')
        ->where('licenses.enabled',1)

        ->leftJoin('users','users.id','licenses.user_id')

        ->orderBy('licenses.id', 'DESC')

        ->get();

        return DataTables::of($license)

        ->addIndexColumn()

        ->make(true);

    }

    public function license_info(Request $request)

    {

        $license['info'] = license::find($request['license_id']);

        $license['user']=User::find($license['info']->user_id);

        // $license['info'] = license::find($request['license_id']);

        // ->select('licenses.*','license_extentions.name as use_desc_name','users.name')

        // ->leftJoin('license_extentions','license_extentions.id','licenses.use_desc')

        // ->leftJoin('users','users.id','licenses.user_id')

        // ->orderBy('licenses.id', 'DESC');

        return response()->json($license);



    }

    public function license_byFileNo(Request $request)

    {
        // dd($request->all);
        $license['info'] = license::where('fileNo',$request['license_id'])->first();
        // dd($license['info']);
        $license['user']=User::find($license['info']->user_id);

        // $license['info'] = license::find($request['license_id']);

        // ->select('licenses.*','license_extentions.name as use_desc_name','users.name')

        // ->leftJoin('license_extentions','license_extentions.id','licenses.use_desc')

        // ->leftJoin('users','users.id','licenses.user_id')

        // ->orderBy('licenses.id', 'DESC');

        return response()->json($license);



    }
    public function license_byId(Request $request)

    {
        // dd($request->all);
        $license['info'] = license::where('id',$request['license_id'])->first();
        // dd($license['info']);
        $license['user']=User::find($license['info']->user_id);

        // $license['info'] = license::find($request['license_id']);

        // ->select('licenses.*','license_extentions.name as use_desc_name','users.name')

        // ->leftJoin('license_extentions','license_extentions.id','licenses.use_desc')

        // ->leftJoin('users','users.id','licenses.user_id')

        // ->orderBy('licenses.id', 'DESC');

        return response()->json($license);



    }
    public function lic_delete(Request $request)

    {

          // dd($request->all());
          $lic= license::find($request['lic_id']);
          $lic->deleted_by = Auth()->user()->id;
          $lic->enabled=0;
          // dd($user->all());

          $lic->save();
          if ($lic) {
  
  
  
              return response()->json(['success'=>trans('admin.subscriber_added')]);
  
          }
  
  
  
          return response()->json(['error'=>$validator->errors()->all()]);
  



    }

    public function license_info_byUser(Request $request)

    {

        $license['info'] = license::where('user_id','=',$request['subscriber_id'])->where('licenses.enabled',1)->get();

        $license['user']=User::find($request['subscriber_id']);

        // $license['licenseEx'] = LicenseExtention::find($license['info']->use_desc);

        // $license['info'] = license::find($request['license_id']);

        // ->select('licenses.*','license_extentions.name as use_desc_name','users.name')

        // ->leftJoin('license_extentions','license_extentions.id','licenses.use_desc')

        // ->leftJoin('users','users.id','licenses.user_id')

        // ->orderBy('licenses.id', 'DESC');

        return response()->json($license);



    }



}

