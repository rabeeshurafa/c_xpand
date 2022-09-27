<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Volunteer;
use App\Models\Address;
use App\Models\Role;
use App\Models\LicenseType;
use App\Models\JobTitle;
use App\Models\Area;
use App\Models\Region;
use App\Models\Volunteer_Courses;
use App\Models\Department;
use App\Models\Setting;
use App\Http\Requests\VolunteerRequest;
use App\Models\Archive;
use App\Models\CopyTo;
use App\Models\linkedTo;
use Yajra\DataTables\DataTables;
use DB;


class VolunteerController extends Controller
{
    public function index(){
        $city = City::get();
        $admin = Volunteer::get();
        $licenseType = LicenseType::where('type','drive_lic')->get();
        $jobTitle = JobTitle::get();
        $departments = Department::get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $area = Area::get();
        $region = Region::get();
        $type = 'volunteer';
        return view('dashboard.volunteer.index',compact('type','city','admin','jobTitle','departments','licenseType','address','area','region'));
    }

    public function store_volunteer(VolunteerRequest $request){
        // dd($request->all());
        // print_r();
        DB::beginTransaction();
        $role = new Role();
        $role->permissions = json_encode($request->my_multi_select3);
        $role->save();

        if($request->volunteer_id == null){
            $volunteer = new Volunteer();
            $address = new Address();
            $address->area_id = $request->TownID;
            $address->city_id = $request->CityID;
            $address->region_id = $request->AreaID;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'volunteer_');
            }else{
                $path = '';
            }
            $volunteer->model = "App\\Models\\volunteer";
            $volunteer->image  = url($path);
            $volunteer->name = $request->Name;
            $volunteer->identification = $request->NationalID;
            $volunteer->phone_one = $request->MobileNo1;
            $volunteer->phone_two = $request->MobileNo2;
            $volunteer->nick_name = $request->NickName;
            $volunteer->joining_date = $request->JoiningDate;
            $volunteer->status = '1';
            $volunteer->added_by = Auth()->user()->id;
            $volunteer->url = 'volunteer';
            $volunteer->email  = $request->EmailAddress;
            $volunteer->marital_status  = $request->MaritalStatus;
            $volunteer->address_id  = $address->id;
            $volunteer->job_title_id  = $request->Position;
            $volunteer->department_id  = $request->DepartmentID;
            $volunteer->license_types_id  = $request->DrivingLicense;
            $volunteer->birthdate  = $request->Birthdate;
            if($request->BloodType==0){
                $volunteer->blood_type  ="A+";
            }elseif ($request->BloodType==1) {
                $volunteer->blood_type  ="A-";
            }elseif ($request->BloodType==2) {
                $volunteer->blood_type  ="B+";
            }elseif ($request->BloodType==3) {
                $volunteer->blood_type  ="B-";
            }elseif ($request->BloodType==4) {
                $volunteer->blood_type  ="O+";
            }elseif ($request->BloodType==5) {
                $volunteer->blood_type  ="O-";
            }elseif ($request->BloodType==6) {
                $volunteer->blood_type  ="AB+";
            }elseif ($request->BloodType==7) {
                $volunteer->blood_type  ="AB-";
            }
            $volunteer->save();
            if(isset($request->courses)){
                for($i=0 ; $i< count($request->education) ; $i++){
                    // dd(count($request->education));
                    // print_r();
                    $VolunteerCourses = new Volunteer_Courses();
                    $VolunteerCourses->volunteer_id =$volunteer->id;
                    $VolunteerCourses->name =$request->education[$i];
                    $VolunteerCourses->institution =$request->institution1[$i];
                    $VolunteerCourses->type ='qulification';
                    $VolunteerCourses->completion_date = $request->graduation_date[$i];
                    $VolunteerCourses->save();
                }
            }
            if(isset($request->courses)){
                for($i=0 ; $i< count($request->courses) ; $i++){
                    $VolunteerCourses = new Volunteer_Courses();
                    $VolunteerCourses->volunteer_id =$volunteer->id;
                    $VolunteerCourses->name =$request->courses[$i];
                    $VolunteerCourses->institution =$request->institution2[$i];
                    $VolunteerCourses->type ='course';
                    $VolunteerCourses->completion_date = $request->completion_date[$i];
                    $VolunteerCourses->save();
                }
            }

        }else{
            // dd($request->all());
            $volunteer = Volunteer::find($request->volunteer_id);
            $address = Address::where('id', $volunteer->address_id)->first();
            $address->area_id = $request->TownID;
            $address->city_id = $request->CityID;
            $address->region_id = $request->AreaID;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();

            Volunteer_Courses::where('volunteer_id',$request->volunteer_id)->delete();
            if(isset($request->courses)){
                for($i=0 ; $i< count($request->education) ; $i++){
                    // dd(count($request->education));
                    // print_r();
                    $VolunteerCourses = new Volunteer_Courses();
                    $VolunteerCourses->volunteer_id =$request->volunteer_id;
                    $VolunteerCourses->name =$request->education[$i];
                    $VolunteerCourses->institution =$request->institution1[$i];
                    $VolunteerCourses->type ='qulification';
                    $VolunteerCourses->completion_date = $request->graduation_date[$i];
                    $VolunteerCourses->save();
                }
            }
            if(isset($request->courses)){
                for($i=0 ; $i< count($request->courses) ; $i++){
                    $VolunteerCourses = new Volunteer_Courses();
                    $VolunteerCourses->volunteer_id =$request->volunteer_id;
                    $VolunteerCourses->name =$request->courses[$i];
                    $VolunteerCourses->institution =$request->institution2[$i];
                    $VolunteerCourses->type ='course';
                    $VolunteerCourses->completion_date = $request->completion_date[$i];
                    $VolunteerCourses->save();
                }
            }
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'volunteer_');
            }else{
                $path = '';
            }
            $volunteer->image = url($path);
            $volunteer->name = $request->Name;
            $volunteer->identification = $request->NationalID;
            $volunteer->address_id = $address->id;
            $volunteer->phone_one = $request->MobileNo1;
            $volunteer->phone_two = $request->MobileNo2;
            $volunteer->nick_name = $request->NickName;
            $volunteer->joining_date = $request->JoiningDate;
            $volunteer->status = '1';
            $volunteer->email  = $request->EmailAddress;
            $volunteer->marital_status  = $request->MaritalStatus;
            $volunteer->address_id  = $address->id;
            $volunteer->job_title_id  = $request->Position;
            $volunteer->department_id  = $request->DepartmentID;
            $volunteer->license_types_id  = $request->DrivingLicense;
            $volunteer->birthdate  = $request->Birthdate;
            if($request->BloodType==0){
                $volunteer->blood_type  ="A+";
            }elseif ($request->BloodType==1) {
                $volunteer->blood_type  ="A-";
            }elseif ($request->BloodType==2) {
                $volunteer->blood_type  ="B+";
            }elseif ($request->BloodType==3) {
                $volunteer->blood_type  ="B-";
            }elseif ($request->BloodType==4) {
                $volunteer->blood_type  ="O+";
            }elseif ($request->BloodType==5) {
                $volunteer->blood_type  ="O-";
            }elseif ($request->BloodType==6) {
                $volunteer->blood_type  ="AB+";
            }elseif ($request->BloodType==7) {
                $volunteer->blood_type  ="AB-";
            }
            $volunteer->save();


        }

        DB::commit();
        $volunteer->address_id =$address->id;
        $volunteer->job_title_id =$request->Position;
        // $volunteer->job_type_id =$request->JobType;
        $volunteer->department_id =$request->DepartmentID;
        // $volunteer->year = $request->vac_year;
        // $volunteer->balance = $request->vac_annual;
        // $volunteer->emergency = $request->emr_blanace;
        if ($volunteer) {

            return response()->json(['success'=>trans('admin.employee_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function volunteer_auto_complete(Request $request)
    {
        $vol_data = $request['term'];
        $names = Volunteer::where('name', 'like', '%' . $vol_data . '%')->select('*','name as label')->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }

    public function volunteer_info(Request $request)
    {
        // dd($request->all);
        
            // dd($request->all);
        $volunteer['info'] = Volunteer::find($request['volunteer_id']);
        $maritalStatus=$volunteer['info']->marital_status;
        if($maritalStatus==1){
            $volunteer['info']->marital_status='اعزب';
        }elseif ($maritalStatus==2) {
            $volunteer['info']->marital_status='ارمل';
        }
        elseif ($maritalStatus==3) {
            $volunteer['info']->marital_status='مطلق';
        }
        elseif ($maritalStatus==0) {
            $volunteer['info']->marital_status='متزوج';
        }

        $volunteer['address'] = Address::where('id',$volunteer['info']->address_id)->first();
        $volunteer['info']->department_id=Department::where('id',$volunteer['info']->department_id )->first()->name;
        $volunteer['info']->job_title_id=JobTitle::where('id',$volunteer['info']->job_title_id )->first()->name;
        $volunteer['info']->license_types_id=LicenseType::where('id',$volunteer['info']->license_types_id )->first()->name;
        $volunteer['cources']=Volunteer_Courses::where('volunteer_id',$volunteer['info']->id)->get();
        if($volunteer['address']){
            $volunteer['city'] =City::where('id',$volunteer['address']->city_id)->first()->name??'';
            $volunteer['area'] =Area::where('id',$volunteer['address']->area_id)->first()->name??'';
            $volunteer['region'] =Region::where('id',$volunteer['address']->region_id)->first()->name??'';
        }
    
        $model=$volunteer['info']->model;

        $volunteer['outArchiveCount'] = count(Archive::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->where('type', 'outArchive')->get());

    $volunteer['inArchiveCount']  = count(Archive::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->where('type', 'inArchive')->get());

    $volunteer['otherArchiveCount']  = count(Archive::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->whereNotIn('type', ['outArchive', 'inArchive'])->get());

    $volunteer['licArchiveCount'] = 0;

    $volunteer['licFileArchiveCount'] = 0;

    $volunteer['copyToCount']  = count(CopyTo::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->get());

    $volunteer['linkToCount']  = count(linkedTo::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->get());

    $ArchiveCount = count(Archive::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->get());

    $CopyToCount = count(CopyTo::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->get());

    $Archive = Archive::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->with('files')->with('Admin')->with('archiveType')->get();

    $CopyTo = CopyTo::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->with('archive', 'archive.files')->with('archive', 'archive.Admin')->get();

    $volunteer['copyTo'] = $CopyTo;

    $volunteer['Archive'] = $Archive;



    $jalArchive = linkedTo::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->with('archive', 'archive.files')->with('archive', 'archive.Admin')->get();

    $volunteer['jalArchive'] = $jalArchive;

    $jalArchiveCount = count(linkedTo::where('model_id', $request['volunteer_id'])

        ->where('model_name', $model)->get());

    $volunteer['ArchiveCount'] = $ArchiveCount + $CopyToCount + $jalArchiveCount;

        return response()->json($volunteer);

    }

    public function volunteer_info_all()
    {
        $volunteer = Volunteer::select('volunteers.*')
        ->orderBy('id', 'DESC')->with('address.city')->with('lincence')->with('Volunteercourse')->get();
         // $volunteer= Volunteer::select('volunteers.*','addresses.notes','license_types.name',
        // 'addresses.region_id','addresses.area_id',
        // 'addresses.city_id','addresses.details','regions.name as region_name','cities.name as city_name',
        // 'areas.name as area_name')
        // ->leftJoin('addresses','addresses.id','volunteers.address_id')
        // ->leftJoin('license_types','license_types.id','volunteers.license_types_id')
        //  ->leftJoin('regions','addresses.region_id','regions.id')
        // ->leftJoin('cities','addresses.city_id','cities.id')
        // ->leftJoin('areas','addresses.area_id','areas.id')->orderBy('id', 'DESC')->get();
        return DataTables::of($volunteer)
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
