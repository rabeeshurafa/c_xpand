<?php



namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Admin;

use App\Models\Department;

use App\Models\AdminDetail;

use App\Http\Requests\DepartmentRequest;

use App\Models\JobTitle;

use Yajra\DataTables\DataTables;

use App\Models\Archive;

use App\Models\CopyTo;

use App\Models\linkedTo;

use App\Models\ArchiveLicense;
use App\Models\File;
use App\Models\AgendaTopic;


class DepartmentController extends Controller

{

    public function index(){

        $admins = Admin::where('enabled',1)->get();

        $departments = Department::where('enabled',1)->get();

        $type='depart';

        return view('dashboard.department.index',compact('admins','departments','type'));    

    }

    public function deptNotAllowed(){
        $type="dept";
        return view('dashboard.notAllowed.index',compact('type'));
    }

    public function depart_manger(Request $request){

        $department = Department::where('id',$request['val'])->where('enabled',1)->first();

        $admin = Admin::where('id',$department->admin_id)->where('enabled',1)->first()->nick_name;

        return response()->json($admin);

    }



    public function store_department(DepartmentRequest $request){

        if($request->department_id == null){

            $department = new Department();

            $department->name = $request->departmentName;

            $department->model = "App\\Models\\Department";

            $department->add_by = Auth()->user()->id;

            $department->url = 'department';

            $department->phone = $request->phone;

            $department->extphone = $request->extphone;

            $department->email = $request->email;

            $department->admin_id = $request->Incharge;

            $department->department_id = $request->LinkDept;
            
            $department->allowed_emp   = json_encode($request->allowedEmp);

            $department->save();

         }else{

            $department = Department::find($request->department_id);

            $department->name = $request->departmentName;

            $department->phone = $request->phone;

            $department->extphone = $request->extphone;

            $department->email = $request->email;

            $department->admin_id = $request->Incharge;

            $department->department_id = $request->LinkDept;
            
            // dd($request->allowedEmp);
            
            $department->allowed_emp   = json_encode($request->allowedEmp);

            $department->save();

         }

         if ($department) {



            return response()->json(['success'=>trans('admin.department_added')]);

        }

     

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function dept_delete(Request $request)
    {
        // dd($request->all());
        $dept= Department::find($request['dept_id']);
        $dept->deleted_by = Auth()->user()->id;
        $dept->enabled=0;
        // dd($user->all());
        $dept->save();

        $archives=  Archive::where('model_id', $dept->id)->where('model_name', 'App\\Models\\Department')->get();
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

        $copyTo=CopyTo::where('model_id', $dept->id)->where('model_name', 'App\\Models\\Department')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }
        if ($dept) {
    
    
    
            return response()->json(['success'=>trans('admin.subscriber_added')]);
    
        }
    
    
    
        return response()->json(['error'=>$validator->errors()->all()]);
    
    }

    public function dept_auto_complete(Request $request)

    {

        $emp_data = $request['term'];

        $names = Department::where('name', 'like', '%' . $emp_data . '%')->where('enabled',1)->select('*','name as label')->get();

        //$html = view('dashboard.component.auto_complete', compact('names'))->render();

        return response()->json($names);

    }  

    public function getDeptData (Request $request){
        $depaertment['info'] = Department::find($request['dep_id']);
        
        $depaertment['allowedEmp']=json_decode($depaertment['info']->allowed_emp);
        
        $depaertment['allAdmin'] =Admin::where('enabled','1')->get();
        
        if($depaertment['info']->admin_id){
            if(Admin::where('id',$depaertment['info']->admin_id)->first())
            $depaertment['admin'] = Admin::where('id',$depaertment['info']->admin_id)->first()->nick_name;

        }

        

        if($depaertment['info']->department_id){

            $depaertment_info = Department::where('id',$depaertment['info']->department_id)->first();

            $depaertment['dep_parent'] = $depaertment_info->name;

            if(sizeof(Admin::where('id', $depaertment_info->admin_id)->get())==0)

                $depaertment['dep_parent_manager']=array();

            else

                $depaertment['dep_parent_manager'] = Admin::where('id', $depaertment_info->admin_id)->first()->nick_name;

        }

        $model = $depaertment['info']->model;



        $depaertment['outArchiveCount'] = count(Archive::where('model_id',$request['dep_id'])->where('enabled',1)

        ->where('model_name',$model)->where('type','outArchive')->get());

        $depaertment['lawArchieveCount'] = count(Archive::where('model_id',$request['dep_id'])->where('enabled',1)

        ->where('model_name',$model)->where('type','lawArchieve')->get());

        $depaertment['inArchiveCount']  = count(Archive::where('model_id',$request['dep_id'])->where('enabled',1)

        ->where('model_name',$model)->where('type','inArchive')->get());

        $depaertment['otherArchiveCount']  = count(Archive::where('model_id',$request['dep_id'])->where('enabled',1)

        ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive','lawArchieve'])->get());

        $depaertment['licArchiveCount'] = 0;

        $depaertment['licFileArchiveCount'] = 0;

        $depaertment['copyToCount']  = count(CopyTo::where('model_id',$request['dep_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $depaertment['linkToCount']  = count(AgendaTopic::where('connected_to',$request['dep_id'])

        ->where('model',$model)->get());



        $ArchiveCount = count(Archive::where('model_id',$request['dep_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $CopyToCount = count(CopyTo::where('model_id',$request['dep_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        // $Archive =Archive::where('model_id',$request['dep_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('files')->with('archiveType')->with('Admin')->with('copyTo')->get();

        // $CopyTo = CopyTo::where('model_id',$request['dep_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archiveType')->with('archive','archive.files')->with('archive','archive.admin')->get();

        // $depaertment['copyTo'] = $CopyTo;

        // $depaertment['Archive'] = $Archive;


        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['dep_id'])
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
        // $depaertment['jalArchive'] = $jalArchive;
        
        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['dep_id'])

        ->where('model',$model)->get());
        
        $depaertment['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;

        $depaertment['contractArchiveCount']  = count(Archive::where('model_id',$request['asset_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());

        $employees = AdminDetail::where('department_id',$request['dep_id'])->pluck('admin_id')->toArray();

        $employees_job_titles = AdminDetail::where('department_id',$request['dep_id'])->pluck('job_title_id')->toArray();

        $depaertment['employees'] = Admin::whereIn('id',$employees)->get();

        foreach($employees_job_titles as $title){

            $depaertment['job_title'][] = JobTitle::where('id',$title)->first()->name;

        }

        return response()->json($depaertment);
    
    
    
                
    }

    public function dep_info(Request $request)

    {

        $depaertment['info'] = Department::find($request['dep_id']);
        
        $depaertment['allowedEmp']=json_decode($depaertment['info']->allowed_emp);
        
        if($depaertment['allowedEmp']!=null){
            for($i=0; $i < sizeof($depaertment['allowedEmp']) ;$i++)
                if($depaertment['allowedEmp'][$i] == Auth()->user()->id)
                    return $this->getDeptData($request);
            
        }else{ 
            return $this->getDeptData($request);
            
        }
            
        return response()->json(['status'=>false,'errors'=>array('not_allowed'=>array('ليس لديك صلاحية لعرض هذا القسم'))]);
        
    }
    
     public function deptOutArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['dept_id'])
        ->where('model_name','App\\Models\\Department')
        ->where('type','outArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function deptInArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['dept_id'])
        ->where('model_name','App\\Models\\Department')
        ->where('type','inArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function deptCopyArchive(Request $request){
        
        $Archive = CopyTo::where('model_id',$request['dept_id'])->where('enabled', '1')
        ->where('model_name','App\\Models\\Department')->with('archive','archive.files')->with('archive','archive.Admin')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function deptJalArchive(Request $request){

        
        $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['dept_id'])
        ->where('model','App\\Models\\Department')->get();
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

    public function deptOtherArchive(Request $request){

        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['dept_id'])
        ->where('model_name','App\\Models\\Department')
        ->whereNotIn('type', ['outArchive','inArchive','contractArchive'])
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function deptContractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['dept_id'])
        ->where('type','contractArchive')
        ->where('model_name','App\\Models\\Department')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function dep_info_all(Request $request)

    {

        $depaertment = Department::select('departments.*','admins.name as manager_name')

        ->leftJoin('admins','admins.id','departments.admin_id')->with('linkDept')->where('departments.enabled',1);

        return DataTables::of($depaertment)

                            ->addIndexColumn()

                            ->make(true);





    }

}

