<?php



namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orgnization;
use App\Models\City;
use App\Models\Group;
use App\Models\JobTitle;
use App\Models\Address;
use App\Models\User;
use App\Models\Town;
use App\Models\Region;
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\SubscribertRequest;
use Yajra\DataTables\DataTables;
use App\Models\Archive;
use App\Models\ArchiveLicense;
use App\Models\Setting;
use App\Models\jobLicArchieve;
use App\Models\License;
use App\Models\CopyTo;
use App\Models\linkedTo;
use App\Models\elec;
use App\Models\File;
use App\Models\AgendaDetail;
use App\Models\AgendaTopic;
use App\Models\AgendaExtention;
use Yajra\DataTables\Services\DataTable;
use App\Models\water;
use App\Models\Constant;
use App\Models\Admin;
use App\Models\Cert;
use App\Models\CertExtention;
use App\Models\Citizen;
use DB;

class Civil extends Controller{

    public function index(){
        $orgInfo=Orgnization::get()->where('enabled',1)->first();
        $city = City::get();
        $admins = Admin::where('enabled',1)->get();       
        $groups = Constant::where('parent',75)->where('status',1)->get();
        $jobTitle = Constant::where('parent',74)->where('status',1)->get();
        $type="subscriber1";
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        return view('dashboard.subscriber.civil',compact('city','groups','town','region','jobTitle','type','setting','address','orgInfo','admins'));
    }

    public function store_citizen(Request $request){
        if($request->subscriber_id == null){           
            $national_id = Citizen::where('national_id',$request->formDataNationalID)->where('enabled','1')->first();
            if($national_id!=null&&$request->formDataNationalID!=null){
                return response()->json(['status'=>false,'errors'=>array('national_id'=>array('رقم الهوية مكرر'))]);
            }
            
        }else{
            
            $national_id = Citizen::where('national_id',$request->formDataNationalID)->where('enabled','1')->where('id', '!=' , $request->subscriber_id)->first();
            if($national_id!=null&&$request->formDataNationalID!=null){
                return response()->json(['status'=>false,'errors'=>array('national_id'=>array('رقم الهوية مكرر'))]);
            }
        }
          
        if($request->subscriber_id == null){
            
            $user = new Citizen();
            $user->model = "App\Models\User";
            $user->name = $request->formDataNameAR;
            $user->url =  "subscribers";
            $user->town_id = $request->town_id;
            $user->city_id = $request->city_id;
            $user->region_id = $request->region_id;
            $user->details = $request->AddressDetails;
            $user->notes = $request->Note;
            $user->add_by = Auth()->user()->id;
            $user->phone_one = $request->formDataMobileNo1;
            $user->phone_two = $request->formDataMobileNo2;
            $user->national_id = $request->formDataNationalID;
            $user->cutomer_num = $request->formDataCutomerNo;
            $user->bussniess_name = $request->formDataBussniessName;
            $user->email  = $request->formDataEmailAddress;
            
           
            $user->group_id  = $request->formDataIndustryID;
            $user->job_title_id  = $request->formDataProfessionID;
            // $user->addresse_id   = $address->id;           
            $user->allowed_emp   = json_encode($request->allowedEmp);
            $user->save();

         }else{
            $user = User::find($request->subscriber_id);
            $user->name = $request->formDataNameAR;
            $user->allowed_emp   = json_encode($request->allowedEmp);
            $user->phone_one = $request->formDataMobileNo1;
            $user->town_id = $request->town_id;
            $user->city_id = $request->city_id;
            $user->region_id = $request->region_id;
            $user->details = $request->AddressDetails;
            $user->notes = $request->Note;
            $user->phone_two = $request->formDataMobileNo2;
            $user->national_id = $request->formDataNationalID;
            $user->cutomer_num = $request->formDataCutomerNo;
            $user->bussniess_name = $request->formDataBussniessName;
            $user->email  = $request->formDataEmailAddress;
            $user->username = $request->username;
            if($request->password){
                $user->password = bcrypt($request->password);
            }else{
                $user->password = $user->password;
            }
            $user->group_id  = $request->formDataIndustryID;
            $user->job_title_id  = $request->formDataProfessionID;
            $user->save();
         }
         if ($user) {
            // return response()->json(['success'=>trans('admin.subscriber_added')]);
            return response()->json(['status'=>true,'errors'=>array('fileNo'=>array('تمت الإضافة بنجاح'))]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    
    }

    public function citizen_info_all(){
        $users= Citizen::select('citizens.*','regions.name as region_name','cities.name as city_name',
        'towns.name as town_name','b.name as job_title_name','a.name as group_name')
        
        ->leftJoin('t_constant as b', 'b.id', 'citizens.job_title_id')
        ->leftJoin('t_constant as a', 'a.id', 'citizens.group_id')
        ->leftJoin('regions','users.region_id','regions.id')
        ->leftJoin('cities','users.city_id','cities.id')
        ->leftJoin('towns','users.town_id','towns.id')->where('users.enabled','1')->orderBy('users.id', 'DESC');

        return DataTables::of($users)->addIndexColumn() ->make(true);
    }

}
