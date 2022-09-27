<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Constant;
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\SubscribertRequest;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
class ConstantController extends Controller
{
    
    public function index(){
        $orgInfo=Orgnization::get()->first();
        $city = City::get();
        $groups = Group::get();
        $jobTitle = JobTitle::get();
        $type="subscriber";
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $area = Area::get();
        $region = Region::get();
        return view('dashboard.subscriber.index',compact('city','groups','area','region',
        'jobTitle','type','setting','address','orgInfo'));    
    }

    public function store_subscriber (SubscribertRequest $request){

        if($request->subscriber_id == null){
            $address = new Address();
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $user = new User();
            $user->model = "App\Models\User";
            $user->name = $request->formDataNameAR;
            $user->url =  "subscribers";
            $user->add_by = Auth()->user()->id;
            $user->phone_one = $request->formDataMobileNo1;
            $user->phone_two = $request->formDataMobileNo2;
            $user->national_id = $request->formDataNationalID;
            $user->cutomer_num = $request->formDataCutomerNo;
            $user->bussniess_name = $request->formDataBussniessName;
            $user->email  = $request->formDataEmailAddress;
            $user->username = $request->username;
            $user->password = $request->password ? bcrypt($request->password) : null;
            $user->group_id  = $request->formDataIndustryID;
            $user->job_title_id  = $request->formDataProfessionID;
            $user->addresse_id   = $address->id;
            $user->save();
         }else{
            $user = User::find($request->subscriber_id);
            $address = new Address();//::where('id',$user->addresse_id)->first();
            //dd(sizeof());
            /*if(!isset($address->area_id))
             dd($request->area_data);*/
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $user->name = $request->formDataNameAR;
            $user->addresse_id = $address->id;
            $user->phone_one = $request->formDataMobileNo1;
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

            return response()->json(['success'=>trans('admin.subscriber_added')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function subscribe_auto_complete(Request $request){
        $subscriber_data = $request['term'];
        $names = User::where('name', 'like', '%' . $subscriber_data . '%')->select('*', 'name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        //dd($names);
        return response()->json($names);
    }

    public function getConstantByID(Request $request)
    {
        dd($request);
        $res=array(1,2,3);//Constant::get();
        return response()->json($res);

    }
    public function subscribe_info_all()
    {
        $users= User::select('users.*','addresses.notes','addresses.region_id','addresses.area_id',
        'addresses.city_id','addresses.details','regions.name as region_name','cities.name as city_name',
        'areas.name as area_name','job_titles.name as job_title_name','groups.name as group_name')
        ->leftJoin('job_titles','job_titles.id','users.job_title_id')
        ->leftJoin('groups','groups.id','users.group_id')
        ->leftJoin('addresses','addresses.id','users.addresse_id')
        ->leftJoin('regions','addresses.region_id','regions.id')
        ->leftJoin('cities','addresses.city_id','cities.id')
        ->leftJoin('areas','addresses.area_id','areas.id')->orderBy('users.id', 'DESC');
        return DataTables::of($users)
                            ->addIndexColumn()
                            ->make(true);
    }
    

    public function subscriber($id){
        $subscriber = User::find($id);
        $city = City::get();
        $groups = Group::get();
        $jobTitle = JobTitle::get();
        $type="subscriber";
        return view('dashboard.subscriber.show',compact('city','groups','jobTitle','type','subscriber')); 
    }




}
