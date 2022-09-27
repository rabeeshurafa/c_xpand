<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Admin;
use App\Models\Menu;
use App\Models\Address;
use App\Models\Role;
use App\Models\JobType;
use App\Models\JobTitle;
use App\Models\Town;
use App\Models\Region;
use App\Models\AdminDetail;
use App\Models\Department;
use App\Models\Archive;
use App\Models\CopyTo;
use App\Models\Setting;
use App\Http\Requests\EmployeeRequest;
use App\Models\linkedTo;
use App\Models\AgendaExtention;
use Yajra\DataTables\DataTables;
use DB;
use App\Models\Constant;
use App\Models\PortalTicket;
use App\Models\TicketConfig;
use App\Models\File;
use App\Models\AgendaTopic;
class EmployeeController extends Controller
{
    public function index(){
        $city = City::get();
        $admin = Admin::where('enabled', '1')->get();
        $jobType = Constant::where('parent',66)->where('status',1)->get();
        $jobTitle = Constant::where('parent',65)->where('status',1)->get();
        $departments = Department::where('enabled', '1')->get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $role = Role::where('id',$setting->role_id )->first();
        //dd($role);
        $local_permissions = isset($role->permissions)?$role->permissions:array();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'employee';
        return view('dashboard.employee.index',compact('local_permissions','type','city','admin','jobType','jobTitle','departments','address','town','region'));
    }

    public function password_index(){
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $city = City::get();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();

        $type = 'employee';
        return view('dashboard.employee.passChange',compact('type','city','address','town','region'));
        return view('dashboard.employee.index',compact('local_permissions','type','city','admin','jobType','jobTitle','departments','address','town','region'));
    }
    
    public function changePassword(Request $request){
        $res=0;
        DB::beginTransaction();
            $admin = Admin::find($request->employee_id);
            
            // $role = new Role();
            // $role->permissions = json_encode($request->my_multi_select2);
            // $role->save();
            
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'emp_');
            }else{
                $path = $admin->image;
            }
            $admin->town_id = $request->town_id;
            $admin->city_id = $request->city_id;
            $admin->region_id = $request->region_id;
            $admin->details = $request->AddressDetails;
            $admin->notes = $request->Note;
            //$admin->role_id = $role->id;
            $admin->image = url($path);
            $admin->username = $request->username;
            if($request->password){
                $admin->password = bcrypt(trim($request->password));
            }else{
                $admin->password = trim($admin->password);
            }
            $res=$admin->save();
        DB::commit();
        if ($res) {

            return response()->json(['success'=>trans('admin.employee_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function emp_delete(Request $request)
    {
        // dd($request->all());
        $user= Admin::find($request['emp_id']);
        $user->deleted_by = Auth()->user()->id;
        $user->enabled=0;
        $user->status='off';

        $archives=  Archive::where('model_id', $user->id)->where('model_name', 'App\\Models\\Admin')->get();
        foreach($archives as $archive){
            $copyTo=CopyTo::where('archive_id',$archive->id)->get();
            foreach($copyTo as $copy){
                $copy->deleted_by = Auth()->user()->id;
                $copy->enabled = 0;
                $copy->save();
            }

            $archive->deleted_by = Auth()->user()->id;
            $archive->enabled=0;
            $archive->save();
        }

        $copyTo=CopyTo::where('model_id', $user->id)->where('model_name', 'App\\Models\\Admin')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }
        
        // dd($user->all());
        $user->save();
        if ($user) {
            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }

        return response()->json(['error'=>$validator->errors()->all()]);
       
    }
    
    public function store_employee(EmployeeRequest $request){
        // dd($request->all());
        /*if($request->my_multi_select2){ 
            $setting = Setting::first();
            if($setting->role_id == 0 ){
                $role = new Role();
                $role->permissions = json_encode($request->my_multi_select2);
                $role->save();
                $setting->role_id = $role->id;
                $setting->save();
            }else{
                $role = Role::where('id',$setting->role_id )->first();
                $role->permissions = json_encode($request->my_multi_select2);
                $role->save();                
            }

        }
        */
        
        $res=0;
        DB::beginTransaction();
        
        if($request->employee_id == null){
            
            $national_id = Admin::where('identification',$request->NationalID)->where('enabled','1')->first();
            if($national_id!=null&&$request->NationalID!=null){
                return response()->json(['status'=>false,'errors'=>array('national_id'=>array('رقم الهوية مكرر'))]);
            }
            
            $jnum = Admin::where('phone_one',$request->MobileNo1)->where('enabled','1')->first();
            if($jnum!=null&&$request->MobileNo1!=null){
                return response()->json(['status'=>false,'errors'=>array('jnum'=>array('رقم الهاتف جوال مكرر'))]);
            }
            
            $wnum = Admin::where('phone_two',$request->MobileNo2)->where('enabled','1')->first();
            if($wnum!=null&&$request->MobileNo2!=null){
                return response()->json(['status'=>false,'errors'=>array('wnum'=>array('رقم الهاتف وريدو مكرر'))]);
            }
            
        }else{
            
            $national_id = Admin::where('identification',$request->NationalID)->where('enabled','1')->where('id', '!=' , $request->employee_id)->first();
            if($national_id!=null&&$request->NationalID!=null){
                return response()->json(['status'=>false,'errors'=>array('national_id'=>array('رقم الهوية مكرر'))]);
            }
            
            $jnum = Admin::where('phone_one',$request->MobileNo1)->where('enabled','1')->where('id', '!=' , $request->employee_id)->first();
            if($jnum!=null&&$request->MobileNo1!=null){
                return response()->json(['status'=>false,'errors'=>array('jnum'=>array('رقم الهاتف جوال مكرر'))]);
            }
            
            $wnum = Admin::where('phone_two',$request->MobileNo2)->where('enabled','1')->where('id', '!=' , $request->employee_id)->first();
            if($wnum!=null&&$request->MobileNo2!=null){
                return response()->json(['status'=>false,'errors'=>array('wnum'=>array('رقم الهاتف وريدو مكرر'))]);
            }
            
            // $national_id = Admin::where('national_id',$request->NationalID)->where('enabled','1')->where('id', '!=' , $request->subscriber_id)->first();
            // if($national_id!=null&&$request->NationalID!=null){
            //     return response()->json(['status'=>false,'errors'=>array('national_id'=>array('رقم الهوية مكرر'))]);
            // }
        }
        
        if($request->employee_id == null){
            $admin = new Admin();
            $role = new Role();
            $setting = Setting::first();
            $role->permissions = $setting->permissions;
            $role->save();
            $role_id=$role->id;
            /*
            $address = new Address();
            $address->town_id = $request->town_data;
            $address->city_id = $request->city_id;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();*/
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'emp_');
            }else{
                $path = 'assets/images/ico/user.png';
            }
            
            $admin->town_id = $request->town_id;
            $admin->city_id = $request->city_id;
            $admin->region_id = $request->region_id;
            $admin->details = $request->AddressDetails;
            $admin->notes = $request->Note;
            $admin->model = "App\Models\Admin";
            $admin->image  = url($path);
            $admin->name = $request->Name;
            $admin->identification = $request->NationalID;
            $admin->curr_pass = $request->NationalID;
            $admin->phone_one = $request->MobileNo1;
            $admin->phone_two = $request->MobileNo2;
            $admin->job_Number = $request->JobNumber;
            $admin->nick_name = $request->NickName;
            // $admin->salary = $request->Salary;
            // $admin->currency = $request->CurrencyID;
            $admin->username = $request->username;
            $admin->start_date = $request->HiringDate;
            $admin->add_by = Auth()->user()->id;
            $admin->url = 'employee';
            $admin->email  = $request->EmailAddress;
            $admin->password = bcrypt(trim($request->NationalID));
            $admin->InternalPhone = $request->InternalPhone;
            // $admin->admin_id  = isset($request->DirectManager)?$request->DirectManager:null;
            $admin->role_id = $role_id;
            if($request->customCheck){
                $admin->status = 'on';
            }else{
                $admin->status = 'off';
            }
            $admin->job_title_id =$request->Position;
            $admin->job_type_id =$request->JobType;
            $admin->department_id =$request->DepartmentID;
            $admin->year = $request->vac_year;
            $admin->balance = $request->vac_annual;
            $admin->emergency = $request->emr_blanace;
            
            $admin->allowed_emp   = json_encode($request->allowed_emp);
            
            $res=$admin->save();/*
            $AdminDetail = new AdminDetail();
            $AdminDetail->admin_id =$admin->id;
            $AdminDetail->address_id =$address->id;
            $AdminDetail->job_title_id =$request->Position;
            $AdminDetail->job_type_id =$request->JobType;
            $AdminDetail->department_id =$request->DepartmentID;
            $AdminDetail->year = $request->vac_year;
            $AdminDetail->balance = $request->vac_annual;
            $AdminDetail->emergency = $request->emr_blanace;
            $AdminDetail->save();*/
        }else{
            $admin = Admin::find($request->employee_id);
            // $role = Role::find($request->employee_id);
            // $role = new Role();
            // $role->permissions = json_encode($request->my_multi_select2);
            // $role->save();
            
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'emp_');
            }else{
                $path = $admin->image;
            }
            $admin->town_id = $request->town_id;
            $admin->city_id = $request->city_id;
            $admin->region_id = $request->region_id;
            $admin->details = $request->AddressDetails;
            $admin->notes = $request->Note;
            //$admin->role_id = $role->id;
            $admin->image = url($path);
            $admin->name = $request->Name;
            $admin->identification = $request->NationalID;
            $admin->phone_one = $request->MobileNo1;
            $admin->phone_two = $request->MobileNo2;
            $admin->job_Number = $request->JobNumber;
            $admin->nick_name = $request->NickName;
            // $admin->salary = $request->Salary;
            // $admin->currency = $request->CurrencyID;
            $admin->username = $request->username;
            $admin->start_date = $request->HiringDate;
            $admin->email  = $request->EmailAddress;
            
            $admin->allowed_emp   = json_encode($request->allowed_emp);
            
            if($request->customCheck){
                $admin->status = 'on';
            }else{
                $admin->status = 'off';
            }
            if($request->password){
                $admin->password = bcrypt(trim($request->password));
            }else{
                $admin->password = trim($admin->password);
            }
            $admin->curr_pass = $request->password;
            $admin->InternalPhone = $request->InternalPhone;
            // $admin->admin_id  = isset($request->DirectManager)?$request->DirectManager:null;
            $admin->job_title_id =$request->Position;
            $admin->job_type_id =$request->JobType;
            $admin->department_id =$request->DepartmentID;
            $admin->year = $request->vac_year;
            $admin->balance =(intval($admin->balance)+ intval($request->vac_annual));
            $admin->emergency = $request->emr_blanace;
            $res=$admin->save();/*
            $AdminDetail = AdminDetail::where('admin_id',$admin->id)->first();
            $address = Address::where('id',$AdminDetail->address_id)->first();
            $address->town_id = $request->town_id;
            $address->city_id = $request->city_id;
            $address->region_id = $request->town_id;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $AdminDetail->admin_id =$admin->id;
            $AdminDetail->job_title_id =$request->Position;
            $AdminDetail->job_type_id =$request->JobType;
            $AdminDetail->department_id =$request->DepartmentID;
            $AdminDetail->year = $request->vac_year;
            $AdminDetail->balance = $request->vac_annual;
            $AdminDetail->emergency = $request->emr_blanace;
            $AdminDetail->save();*/
        }

        DB::commit();/*
        $admin->address_id =$address->id;
        $admin->job_title_id =$request->Position;
        $admin->job_type_id =$request->JobType;
        $admin->department_id =$request->DepartmentID;
        $admin->year = $request->vac_year;
        $admin->balance = $request->vac_annual;
        $admin->emergency = $request->emr_blanace;*/
        if ($res) {

            // return response()->json(['success'=>trans('admin.employee_added')]);
            return response()->json(['status'=>true,'errors'=>array('fileNo'=>array('تمت الإضافة بنجاح'))]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }



    public function emp_auto_complete(Request $request)

    {

        $emp_data = $request['term'];

        $names = Admin::where('admins.id','!=','74')->where('name', 'like', '%' . $emp_data . '%')->orwhere('nick_name', 'like', '%' . $emp_data . '%')->where('enabled', '1')->select('*','nick_name as label')->get();

        //$html = view('dashboard.component.auto_complete', compact('names'))->render();

        return response()->json($names);

    }

    public function getData (Request $request){

        $admin['info'] = Admin::find($request['emp_id']);
        $admin['allowedEmp']=json_decode($admin['info']->allowed_emp);
        
        $admin['allAdmin'] =Admin::where('enabled','1')->get();
         //dd($admin['info']);

        $model = $admin['info']->model;
        $admin['outArchiveCount'] = count(Archive::where('model_id',$request['emp_id'])->where('enabled', '1')
        ->where('model_name',$model)->where('type','outArchive')->get());
        $admin['inArchiveCount']  = count(Archive::where('model_id',$request['emp_id'])->where('enabled', '1')
        ->where('model_name',$model)->where('type','inArchive')->get());
        $admin['otherArchiveCount']  = count(Archive::where('model_id',$request['emp_id'])->where('enabled', '1')
        ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive'])->get());
        $admin['licArchiveCount'] = 0;
        $admin['licFileArchiveCount'] = 0;
        $admin['copyToCount']  = count(CopyTo::where('model_id',$request['emp_id'])->where('enabled', '1')
        ->where('model_name',$model)->get());
        $admin['linkToCount']  = count(AgendaTopic::where('connected_to',$request['emp_id'])
        ->where('model',$model)->get());
        $ArchiveCount = count(Archive::where('model_id',$request['emp_id'])->where('enabled', '1')
        ->where('model_name',$model)->get());
        $CopyToCount = count(CopyTo::where('model_id',$request['emp_id'])->where('enabled', '1')
        ->where('model_name',$model)->get());
        // $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        // ->where('enabled', '1')
        // ->where('model_id',$request['emp_id'])
        // ->where('model_name',$model)
        // ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        // ->orderBy('archives.date', 'DESC')
        // ->with('files')->with('Admin')->with('archiveType')->with('copyTo')->get();
        
        // $CopyTo = CopyTo::where('model_id',$request['emp_id'])->where('enabled', '1')
        // ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.Admin')->get();
        
        // $admin['copyTo'] = $CopyTo;
        // $admin['Archive'] = $Archive;
        $currList1=array();
        
        $admin['contractArchiveCount']  = count(Archive::where('model_id',$request['asset_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());
        
        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['emp_id'])
        // ->where('model',$model)->get();
        // foreach($jalArchive as $row)
        //             {
        //                     if($row->file_ids!="null"){
        //                         $row->setAttribute('files',File::whereIn('id',json_decode($row->file_ids))->get());
        //                     }
        //                     else
        //                     {
        //                         $row->setAttribute('files',array());
        //                     }
        //             }
        // $admin['jalArchive'] = $jalArchive;
        
        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['emp_id'])
        ->where('model',$model)->get());
        
        $admin['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;
        $admin['details'] = AdminDetail::where('admin_id',$request['emp_id'])->first();
        if($admin['info']){
            $admin['info']->job_title_id!=null?$admin['job_title'] = Constant::where('id',$admin['info']->job_title_id )->first()->name:$admin['job_title']='';
            $admin['info']->job_type_id !=null?$admin['job_type'] = Constant::where('id',$admin['info']->job_type_id )->first()->name:$admin['job_type_id']='';
            $admin['info']->department_id!=null?$admin['department_id'] = Department::where('id',$admin['info']->department_id )->first()->name:$admin['department_id']='';
            $admin['info']->address_id!=null?$admin['address'] = Address::where('id',$admin['info']->address_id  )->first():$admin['address_id']='';
        }
        else{
            $admin['details']=array();
            $admin['job_title'] = '';
            $admin['job_type'] = '';
            $admin['department_id'] = '';
            $admin['address'] = array();
        }
        // if(isset($admin['info']->admin_id ))
        //     $admin['DirectManager'] = Admin::where('id',$admin['info']->admin_id  )->first()->name;
        // else
        //     $admin['DirectManager']=array();
        $roles=Role::where('id',$admin['info']->role_id  )->first();
        if($roles!=null){
            $per=($roles->permissions);
            
            $SysPer=Menu::where('b_enabled',1)->get();
            
            foreach($SysPer as $row){
                if($row->fk_i_type==1){
                    $temp=array();
                    $child=array();
                    $temp[]=$row;
                    $temp[0]->children=array();
                    foreach($SysPer as $row1)
                        if($row1->fk_i_parent_id==$row->pk_i_id){
                            if(in_array($row1->s_function_url,$per))
                                $row1->setAttribute('selected',"1");
                            else
                                $row1->setAttribute('selected',"0");
                            $child[]=$row1;
                        }
                    $row->setAttribute('children', $child);
                    $currList[]=$temp;
                }
            }
        }else{
           $per=array();
            
            $SysPer=Menu::where('b_enabled',1)->get();
            
            foreach($SysPer as $row){
                if($row->fk_i_type==1){
                    $temp=array();
                    $child=array();
                    $temp[]=$row;
                    $temp[0]->children=array();
                    foreach($SysPer as $row1)
                        if($row1->fk_i_parent_id==$row->pk_i_id){
                            if(in_array($row1->s_function_url,$per))
                                $row1->setAttribute('selected',"1");
                            else
                                $row1->setAttribute('selected',"0");
                            $child[]=$row1;
                        }
                    $row->setAttribute('children', $child);
                    $currList[]=$temp;
                }
            }
        }
            $option='<select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">';
              foreach($currList as $row){
			    $option.='<optgroup label="'.$row[0]->s_function_title.'">';
                foreach($row[0]->children as $row1)
				    $option.='<option value="'.$row1->s_function_url.'"'.(in_array($row1->s_function_url,$per)?"selected":"").'>'.$row1->s_function_title.'</option>';
                $option.='</optgroup>';
              }
			$option.='</select>';
        $admin['per']=$option;//(Role::where('id',$admin['info']->role_id  )->first()->permissions);

        // $admin['Currency'] = trans('admin.'.$admin['info']->currency);

        //dd($admin['address']);

        if(isset($admin['info']->city_id) ){

            $admin['city'] =City::where('id',$admin['info']->city_id)->first()->name;

        }
        else
        $admin['city']='';

        if(isset($admin['info']->city_id) ){
            
            $city =City::where('id',$admin['info']->city_id)->first();
            if($city!=null)
                $admin['city']=$city->name;
            else
                $admin['city']='';

        }
        else
        $admin['city']='';

        if(isset($admin['info']->town_id)){

            $town =Town::where('id',$admin['info']->town_id)->first();
            if($city!=null)
                $admin['town']=$town->name;
            else
                $admin['town']='';
        }
        else
        $admin['town']='';

        if(isset($admin['info']->region_id)){

            $region =Region::where('id',$admin['info']->region_id)->first();
            if($city!=null)
                $admin['region']=$region->name;
            else
                $admin['region']='';
        }
        else
        $admin['region']='';


        return response()->json($admin);



    }

    public function emp_info(Request $request)

    {

        $admin['info'] = Admin::find($request['emp_id']);
        $admin['allowedEmp']=json_decode($admin['info']->allowed_emp);
        
        if($admin['allowedEmp']!=null){
            for($i=0; $i < sizeof($admin['allowedEmp']) ;$i++)
                if($admin['allowedEmp'][$i] == Auth()->user()->id)
                    return $this->getData($request);
            
        }else{ 
            return $this->getData($request);
            
        }
            
        return response()->json(['status'=>false,'errors'=>array('not_allowed'=>array('ليس لديك صلاحية لعرض هذا الموظف'))]);

    }
    
    public function empOutArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['emp_id'])
        ->where('model_name','App\\Models\\Admin')
        ->where('type','outArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function empInArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['emp_id'])
        ->where('model_name','App\\Models\\Admin')
        ->where('type','inArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function empCopyArchive(Request $request){
        
        $Archive = CopyTo::where('model_id',$request['emp_id'])->where('enabled', '1')
        ->where('model_name','App\\Models\\Admin')->with('archive','archive.files')->with('archive','archive.Admin')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function empJalArchive(Request $request){

        
        $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['emp_id'])
        ->where('model','App\\Models\\Admin')->get();
        foreach($Archive as $row)
        {
            if($row->file_ids!="null"){
                $row->setAttribute('files',File::whereIn('id',json_decode($row->file_ids))->get());
            }
            else
            {
                $row->setAttribute('files',array());
            }
        }
        // dd($Archive->all());
        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function empOtherArchive(Request $request){

        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['emp_id'])
        ->where('model_name','App\\Models\\Admin')
        ->whereNotIn('type', ['outArchive','inArchive','contractArchive'])
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function empContractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['emp_id'])
        ->where('type','contractArchive')
        ->where('model_name','App\\Models\\Admin')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function get_noti(Request $request)

    {
        $id=Auth()->user()->id;
        $admin['info'] = Admin::find($id);
        $model = $admin['info']->model;
        
        $emp = Auth()->user()->id; ;
        // $emp = (string) json_encode($emp);
        // $emp = '"' . $emp . '"';
        // $emp = "'" . $emp . "'";
        // $portal_tickets = DB::select("SELECT * FROM `portal_tickets` where json_contains(`rec_id`,'".$emp."','$')=1");
        $portal_tickets = PortalTicket::whereJsonContains('rec_id', strval($emp))->where('is_seen',0)->get();
        
        foreach($portal_tickets as $portal_ticket){
            $ticket_config = TicketConfig::where('ticket_no',$portal_ticket->app_no)->where('app_type',$portal_ticket->app_type)->first();
            if($portal_ticket->app_no==23){
                $ticketTypeList = Constant::where('id',$portal_ticket->task_type)->first();
                $portal_ticket->taskName=$ticketTypeList->name;
            }
            $portal_ticket->ticket_config=$ticket_config;
        }                    
        
        $departments = Department::where('enabled', '1')->get();
        $dep=[];
        foreach($departments as $depart){
            if($depart->admin_id == $id)
            {
                array_push($dep,$depart->id);
            }
        }
        
        $depart_model="App\Models\Department";
        $CopyToD = CopyTo::whereIn('model_id',$dep)->where('enabled', '1')->where('is_deleted_noti', '0')->where('model_name',$depart_model)
        ->with('archive','archive.files')->with('archive','archive.Admin')->get();
        $CopyToCountD = count(CopyTo::whereIn('model_id',$dep)->where('enabled', '1')->where('is_deleted_noti', '0')->where('model_name',$depart_model)->get());
        
        $CopyToCount = count(CopyTo::where('model_id',$id)->where('enabled', '1')->where('is_deleted_noti', '0')
        ->where('model_name',$model)->get());
        $CopyTo = CopyTo::where('model_id',$id)->where('enabled', '1')->where('is_deleted_noti', '0')
        ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.Admin')->get();
        $CopyTo=$CopyTo->mergeRecursive($CopyToD)->mergeRecursive($portal_tickets)->toArray();
        
        // $CopyTo=$CopyTo->mergeRecursive($CopyToD)->mergeRecursive($portal_tickets)->toArray();
        
        usort($CopyTo, function($a, $b) {
            
                $date1=strtotime($a['created_at']);

                $date2=strtotime($b['created_at']);
            
            return $date2 - $date1; // $v2 - $v1 to reverse direction
        });
        
        $admin['copyTo'] = $CopyTo;
        $admin['CopyToCount'] = $CopyToCount+ $CopyToCountD+count($portal_tickets);
        return response()->json($admin);

    }
    public function noti_delete(Request $request)
    {
        if($request->c_id)
        {
        $id=$request->c_id;
        $CopyTo = CopyTo::where('id',$id)->first();
        $CopyTo->is_deleted_noti=1;
        $res=$CopyTo->save();
        if ($res) {

            return response()->json(['success'=>'deleted']);
        }
        }
        return response()->json(['error'=>'have error']);

    }
    public function noti_seen(Request $request)

    {
        if($request->c_id)
        {
        $id=$request->c_id;
        $CopyTo = CopyTo::where('id',$id)->first();
        $CopyTo->is_seen=1;
        $res=$CopyTo->save();
        if ($res) {

            return response()->json(['success'=>'deleted']);
        }
        }
        return response()->json(['error'=>'have error']);

    }
    public function emp_info_all()

    {

        $admin= Admin::where('admins.id','!=','74')->select('admins.*','regions.name as region_name','cities.name as city_name',

        'towns.name as town_name','b.name as job_type_name','a.name as job_title_name','departments.name as department_name')

        ->leftJoin('admin_details','admins.id','admin_details.admin_id')
        ->leftJoin('departments','departments.id','admins.department_id')
        ->leftJoin('t_constant as b', 'b.id', 'admins.job_type_id')
        ->leftJoin('t_constant as a', 'a.id', 'admins.job_title_id')
        ->leftJoin('regions','admins.region_id','regions.id')

        ->leftJoin('cities','admins.city_id','cities.id')

        ->leftJoin('towns','admins.town_id','towns.id')->where('admins.enabled','1')->with('adminDetails')->orderBy('id', 'DESC');

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
    
    
    function getEmpPer(Request $request){
        
        $admin['info'] = Admin::find($request['emp_id']);

        $per=(Role::where('id',$admin['info']->role_id  )->first()->permissions);
        $SysPer=Menu::where('b_enabled',1)->get();
        
            foreach($SysPer as $row){
                if($row->fk_i_type==1){
                    $temp=array();
                    $child=array();
                    $temp[]=$row;
                    $temp[0]->children=array();
                    foreach($SysPer as $row1)
                        if($row1->fk_i_parent_id==$row->pk_i_id){
                            if(in_array($row1->s_function_url,$per))
                                $row1->setAttribute('selected',"1");
                            else
                                $row1->setAttribute('selected',"0");
                            $child[]=$row1;
                        }
                    $row->setAttribute('children', $child);
                    $currList[]=$temp;
                }
            }
            $option='<select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">';
              foreach($currList as $row){
			    $option.='<optgroup label="'.$row[0]->s_function_title.'">';
                foreach($row[0]->children as $row1)
				    $option.='<option value="'.$row1->s_function_url.'"'.(in_array($row1->s_function_url,$per)?"selected":"").'>'.$row1->s_function_title.'</option>';
                $option.='</optgroup>';
              }
			$option.='</select>';
        $admin['per']=$option;
        return response()->json($admin);
    }


}

