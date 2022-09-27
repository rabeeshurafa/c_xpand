<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Admin;
use App\Models\Address;
use App\Models\Role;
use App\Models\JobType;
use App\Models\JobTitle;
use App\Models\Area;
use App\Models\Region;
use App\Models\AdminDetail;
use App\Models\Department;
use App\Models\Archive;
use App\Models\CopyTo;
use App\Http\Requests\EmployeeRequest;
use App\Models\linkedTo;
use Yajra\DataTables\DataTables;
use DB;

class EmployeeController extends Controller
{
    public function index(){
        $city = City::get();
        $admin = Admin::get();
        $jobType = JobType::get();
        $jobTitle = JobTitle::get();
        $departments = Department::get();
        $type = 'employee';
        return view('dashboard.employee.index',compact('type','city','admin','jobType','jobTitle','departments'));
    }

    public function store_employee(EmployeeRequest $request){
        // dd($request->all());
        DB::beginTransaction();
        if($request->employee_id == null){
            $admin = new Admin();
            $role = new Role();
            $role->permissions = json_encode($request->my_multi_select3);
            $role->save();

            $address = new Address();
            $address->area_id = $request->TownID;
            $address->city_id = $request->CityID;
            $address->region_id = $request->AreaID;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'emp_');
            }else{
                $path = 'assets/images/ico/user.png';
            }
            $admin->model = "App\Models\Admin";
            $admin->image  = url($path);
            $admin->name = $request->Name;
            $admin->identification = $request->NationalID;
            $admin->phone_one = $request->MobileNo1;
            $admin->phone_two = $request->MobileNo2;
            $admin->job_Number = $request->JobNumber;
            $admin->nick_name = $request->NickName;
            $admin->salary = $request->Salary;
            $admin->currency = $request->CurrencyID;
            $admin->username = $request->username;
            $admin->start_date = $request->HiringDate;
            $admin->add_by = Auth()->user()->id;
            $admin->url = 'employee';
            $admin->email  = $request->EmailAddress;
            $admin->password = bcrypt($request->password);
            $admin->curr_pass = $request->password;
            $admin->InternalPhone = $request->InternalPhone;
            $admin->admin_id  = (isset($request->DirectManager)&&$request->DirectManager<>0) ?$request->DirectManager:null;
            $admin->role_id = $role->id;
            if($request->customCheck){
                $admin->status = 'on';
            }else{
                $admin->status = 'off';
            }
            $admin->save();
            $AdminDetail = new AdminDetail();
            $AdminDetail->admin_id =$admin->id;
            $AdminDetail->address_id =$address->id;
            $AdminDetail->job_title_id =$request->Position;
            $AdminDetail->job_type_id =$request->JobType;
            $AdminDetail->department_id =$request->DepartmentID;
            $AdminDetail->year = $request->vac_year;
            $AdminDetail->balance = $request->vac_annual;
            $AdminDetail->emergency = $request->emr_blanace;
            $AdminDetail->save();
        }else{
            $admin = Admin::find($request->employee_id);
            $role = Role::where('id',$admin->role_id)->first();
            $role->permissions = json_encode($request->my_multi_select3);
            $role->save();
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'emp_');
            }else{
                $path = $admin->image;
            }
            $admin->role_id = $role->id;
            $admin->image = url($path);
            $admin->name = $request->Name;
            $admin->identification = $request->NationalID;
            $admin->phone_one = $request->MobileNo1;
            $admin->phone_two = $request->MobileNo2;
            $admin->job_Number = $request->JobNumber;
            $admin->nick_name = $request->NickName;
            $admin->salary = $request->Salary;
            $admin->currency = $request->CurrencyID;
            $admin->username = $request->username;
            $admin->start_date = $request->HiringDate;
            $admin->email  = $request->EmailAddress;
            if($request->customCheck){
                $admin->status = 'on';
            }else{
                $admin->status = 'off';
            }/*
            if($request->password){
                $admin->password = bcrypt($request->password);
            }else{
                $admin->password = $admin->password;
            }*/
            
            $admin->password = bcrypt($request->password);
            $admin->curr_pass = $request->password;
            $admin->InternalPhone = $request->InternalPhone;
            //$admin->admin_id  = $request->DirectManager;
            $admin->admin_id  = (isset($request->DirectManager)&&$request->DirectManager<>0) ?$request->DirectManager:null;
            $admin->save();
            $AdminDetail = AdminDetail::where('admin_id',$admin->id)->first();
            if(isset($AdminDetail->address_id))
                $address = Address::where('id',$AdminDetail->address_id)->first();
            else
                $address=new Address();
            $address->area_id = $request->TownID;
            $address->city_id = $request->CityID;
            $address->region_id = $request->AreaID;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            //dd($address->id);
            
            AdminDetail::where('admin_id',$admin->id)->delete();
            $AdminDetail=new AdminDetail();
            $AdminDetail->admin_id =$admin->id;
            $AdminDetail->address_id =$address->id;
            $AdminDetail->job_title_id =$request->Position;
            $AdminDetail->job_type_id =$request->JobType;
            $AdminDetail->department_id =$request->DepartmentID;
            $AdminDetail->year = $request->vac_year;
            $AdminDetail->balance = $request->vac_annual;
            $AdminDetail->emergency = $request->emr_blanace;
            $AdminDetail->save ();
        }

        DB::commit();
        $admin->address_id =$address->id;
        $admin->job_title_id =$request->Position;
        $admin->job_type_id =$request->JobType;
        $admin->department_id =$request->DepartmentID;
        $admin->year = $request->vac_year;
        $admin->balance = $request->vac_annual;
        $admin->emergency = $request->emr_blanace;
        if ($AdminDetail) {

            return response()->json(['success'=>trans('admin.employee_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function emp_auto_complete(Request $request)
    {
        $emp_data = $request['term'];
        $names = Admin::where('name', 'like', '%' . $emp_data . '%')->select('*','name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }

    public function emp_info(Request $request)
    {
        $admin['info'] = Admin::find($request['emp_id']);
         //dd($admin['info']);
        $model = $admin['info']->model;
        

        $admin['outArchiveCount'] = count(Archive::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->where('type','outArchive')->get());
        $admin['inArchiveCount']  = count(Archive::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->where('type','inArchive')->get());
        $admin['otherArchiveCount']  = count(Archive::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive'])->get());
        $admin['licArchiveCount'] = 0;
        $admin['licFileArchiveCount'] = 0;
        $admin['copyToCount']  = count(CopyTo::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->get());
        $admin['linkToCount']  = count(linkedTo::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->get());
        $ArchiveCount = count(Archive::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->get());
        $CopyToCount = count(CopyTo::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->get());
        $Archive =Archive::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->with('files')->with('Admin')->get();
        $CopyTo = CopyTo::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.Admin')->get();
        $admin['copyTo'] = $CopyTo;
        $admin['Archive'] = $Archive;

        $jalArchive = linkedTo::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->with('archive','archive.files')->get();
        $admin['jalArchive'] = $jalArchive;
        $jalArchiveCount = count(linkedTo::where('model_id',$request['emp_id'])
        ->where('model_name',$model)->get());
        $admin['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;

        $admin['details'] = AdminDetail::where('admin_id',$request['emp_id'])->first();
        if($admin['details']){
            $admin['job_title'] = JobTitle::where('id',$admin['details']->job_title_id )->first()->name;
            $admin['job_type'] = JobType::where('id',$admin['details']->job_type_id )->first()->name;
            $admin['department_id'] = Department::where('id',$admin['details']->department_id )->first()->name;
            $admin['address'] = Address::where('id',$admin['details']->address_id  )->first();
        }
        else{
            $admin['details']=array();
            $admin['job_title'] = '';
            $admin['job_type'] = '';
            $admin['department_id'] = '';
            $admin['address'] = array();
        }
        if(isset($admin['info']->admin_id ))
            $admin['DirectManager'] = Admin::where('id',$admin['info']->admin_id  )->first()->name;
        else
            $admin['DirectManager']=array();

        $admin['per']=(Role::where('id',$admin['info']->role_id  )->first()->permissions);
        $admin['Currency'] = trans('admin.'.$admin['info']->currency);
        //dd($admin['address']);
        if(isset($admin['address']->city_id) ){
            $admin['city'] =City::where('id',$admin['address']->city_id)->first()->name;
        }
        if(isset($admin['address']->area_id)){
            $admin['area'] =Area::where('id',$admin['address']->area_id)->first()->name;
        }
        if(isset($admin['address']->region_id)){
            $admin['region'] =Region::where('id',$admin['address']->region_id)->first()->name;
        }

        return response()->json($admin);

    }

    public function emp_info_all()
    {
        $admin= Admin::select('admins.*','addresses.notes','addresses.region_id','addresses.area_id',
        'addresses.city_id','addresses.details','regions.name as region_name','cities.name as city_name',
        'areas.name as area_name','job_types.name as job_type_name','job_titles.name as job_title_name')
        ->leftJoin('admin_details','admins.id','admin_details.admin_id')
        ->leftJoin('job_types','job_types.id','admin_details.job_type_id')
        ->leftJoin('job_titles','job_titles.id','admin_details.job_title_id')
        ->leftJoin('addresses','addresses.id','admin_details.address_id')
        ->leftJoin('regions','addresses.region_id','regions.id')
        ->leftJoin('cities','addresses.city_id','cities.id')
        ->leftJoin('areas','addresses.area_id','areas.id')->with('adminDetails')->orderBy('id', 'DESC');
        return DataTables::of($admin)
                            ->addIndexColumn()
                            ->make(true);

    }
    function upload_image($file, $prefix){
        if($file){
            $files = $file;
            $imageName = $prefix.rand(3,999).'-'.time().'.'.$files->extension();
            $image = "storage/".$imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}
