<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Town;
use App\Models\User;
use App\Models\Department;
use App\Models\Region;
use App\Models\Project;
use App\Models\Orgnization;
use App\Http\Requests\ProjectRequest;
use Yajra\DataTables\DataTables;
use App\Models\Archive;
use App\Models\CopyTo;
use App\Models\linkedTo;
use App\Models\Setting;
use App\Models\File;
use App\Models\AgendaTopic;
class ProjectController extends Controller
{
    public function index(){
        $city = City::get();
        $admins = Admin::where('enabled',1)->get();
        $users = User::where('enabled',1)->get();
        $departments = Department::where('enabled',1)->get();
        $sponsers = Orgnization::where('org_type','orginzation')->where('enabled',1)->get();
        $Contractor = Orgnization::where('org_type','suppliers')->where('enabled',1)->get();
        
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::get();
        $region = Region::get();
        $type="project";
        return view('dashboard.project.index',compact('city','admins','users','Contractor','type',
        'departments','sponsers','address','region','town'));
    }
    
    public function projNotAllowed(){
        $type="project";
        return view('dashboard.notAllowed.index',compact('type'));
    }

    public function depart_manger_project(Request $request){
        //dump($request->all());
        $user = Admin::where('id',$request['val'])->first();
        if($user != null){
        $departId=$user->department_id;
        }
        else{
            $departId="0";
        }
        $department = Department::where('id',$departId)->first();
        if($department != null){
            $department=$department->name;
        }
        else{
            $department="empty";
        }
        return response()->json($department);
    }

    public function store_project (ProjectRequest $request){
        if($request->project_id == null){
            $project = new Project();
            // $address = new Address();
            // $address->town_id = $request->town_data;
            // $address->city_id = $request->CityID;
            // $address->region_id = $request->region_data;
            // $address->details = $request->AddressDetails;
            // $address->notes = $request->Note;
            // $address->save();
            $project->town_id = $request->town_id;

            $project->city_id = $request->city_id;

            $project->region_id = $request->region_id;

            $project->details = $request->AddressDetails;

            $project->notes = $request->Note;

            $project->model = "App\Models\Project";
            $project->add_by = Auth()->user()->id;
            $project->url = 'projects';
            $project->name = $request->ProjectName;
            $project->ProjectNo = $request->ProjectNo;
            $project->dateStart = $request->dateStart;
            $project->dateEnd = $request->dateEnd;
            $project->admin_id = $request->pinc6;
            $project->department_id  = $request->Department;
            $project->user_id    = json_encode($request->subscribers);
            $project->Projectcost   = $request->Projectcost;
            $project->currency = $request->CurrencyID;
            $project->sponser   = json_encode($request->orgnization);
            // $project->addresse_id   = $address->id;
            $project->contract    = json_encode($request->suppliers);
            $project->pinc8   = json_encode($request->fund);
            $project->cost1   = json_encode($request->contact);
            $project->allowed_emp   = json_encode($request->allowedEmp);
            $project->save();
         }else{
            $project = Project::find($request->project_id);
            // $address = Address::where('id',$project->addresse_id)->first();
            // $address->town_id = $request->town_data;
            // $address->city_id = $request->CityID;
            // $address->region_id = $request->region_data;
            // $address->details = $request->AddressDetails;
            // $address->notes = $request->Note;
            // $address->save();
            $project->town_id = $request->town_id;

            $project->city_id = $request->city_id;

            $project->region_id = $request->region_id;

            $project->details = $request->AddressDetails;

            $project->notes = $request->Note;
            
            $project->name = $request->ProjectName;
            $project->ProjectNo = $request->ProjectNo;
            $project->dateStart = $request->dateStart;
            $project->dateEnd = $request->dateEnd;
            $project->admin_id = $request->pinc6;
            $project->department_id  = $request->Department;
            $project->Projectcost   = $request->Projectcost;
            $project->currency = $request->CurrencyID;
            $project->user_id    = json_encode($request->subscribers);
            $project->sponser   = json_encode($request->orgnization);
            $project->contract    = json_encode($request->suppliers);
            $project->pinc8   = json_encode($request->fund);
            $project->cost1   = json_encode($request->contact);
            // $project->addresse_id   = $address->id;
            $project->allowed_emp   = json_encode($request->allowedEmp);
            // $project->pinc8   = $request->pinc8;
            // $project->cost1   = $request->cost1;
            $project->save();
         }
         if ($project) {

            return response()->json(['success'=>trans('admin.project_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function proj_delete(Request $request)
    {
        // dd($request->all());
        $proj= Project::find($request['proj_id']);
        $proj->deleted_by = Auth()->user()->id;
        $proj->enabled=0;
        // dd($user->all());
        $proj->save();

        $archives=  Archive::where('model_id', $proj->id)->where('model_name', 'App\\Models\\Project')->get();
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

        $copyTo=CopyTo::where('model_id', $proj->id)->where('model_name', 'App\\Models\\Project')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }

        if ($proj) {

            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }
    public function project_auto_complete(Request $request){
        $project_data = $request['term'];
        $names = Project::where('name', 'like', '%' . $project_data . '%')->where('enabled',1)->select('*','name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }
    
    public function getProjData (Request $request){
       $project['info'] = Project::find($request['project_id']); 
       $project['allowedEmp']=json_decode($project['info']->allowed_emp);
        $model = $project['info']->model;
        $project['copyToCount']  = count(CopyTo::where('model_id',$request['project_id'])->where('enabled',1)
        ->where('model_name',$model)->get());
        $project['linkToCount']  = count(AgendaTopic::where('connected_to',$request['project_id'])
        ->where('model',$model)->get());
        $project['archiveCount'] = count(Archive::where('model_id',$request['project_id'])->where('enabled',1)
        ->where('model_name',$model)->get());
        $project['otherArchiveCount']  = count(Archive::where('model_id',$request['project_id'])->where('enabled',1)
        ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive'])->get());
        
        $ArchiveCount = count(Archive::where('model_id',$request['project_id'])->where('enabled',1)
        ->where('model_name',$model)->get());
        
        // $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')->where('enabled',1)
        // ->where('model_id',$request['project_id'])
        // ->where('model_name',$model)->with('files')
        // ->where('model_name',$model)->with('archiveType')
        // ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        // ->orderBy('archives.date', 'DESC')
        // ->get();
        // $project['Archive'] = $Archive;
        
         $project['contractArchiveCount']  = count(Archive::where('model_id',$request['project_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());
        
        
        $CopyToCount = count(CopyTo::where('model_id',$request['project_id'])->where('enabled',1)
        ->where('model_name',$model)->get());
        
        // $CopyTo = CopyTo::where('model_id',$request['project_id'])->where('enabled',1)
        // ->where('model_name',$model)->with('archive','archive.Admin')->with('archive','archive.files')->get();
        // $project['copyTo'] = $CopyTo;

        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['project_id'])
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
        // $project['jalArchive'] = $jalArchive;
        
        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['project_id'])
        ->where('model',$model)->get());
        
        $project['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;
        
        if(Admin::where('id',$project['info']->admin_id)->first()!=null)
        $project['admin'] = Admin::where('id',$project['info']->admin_id)->first()->nick_name;
        $project['allAdmin'] =Admin::where('enabled','1')->get();
        if(Department::where('id',$project['info']->department_id)->first()!=null)
        $project['department'] = Department::where('id',$project['info']->department_id)->first()->name;
        
        // $project['address'] = Address::where('id', $project['info']['addresse_id'])->first();

        $project['sponsers']=array();
        if($project['info']->sponser != "null"){

            $sponser = json_decode($project['info']->sponser);
            $project['sponsers'] = Orgnization::whereIn('id', $sponser)->get();
        }
        $project['pinc8']=array();
        if($project['info']->pinc8 != "null"){
            $project['pinc8'] = json_decode($project['info']->pinc8);
        }

        $project['cost1']=array();
        if($project['info']->cost1 != "null"){
            $project['cost1'] = json_decode($project['info']->cost1);
        }

        $project['contract']=array();
        if($project['info']->contract != "null"){

            $contract = json_decode($project['info']->contract);
            $project['contract'] = Orgnization::whereIn('id', $contract)->get();
        }

        $project['users']=array();
        if($project['info']->user_id != "null"){

            $users = json_decode($project['info']->user_id);
            $project['users'] = User::whereIn('id', $users)->get();
        }
        
        $project['city']=array();
        if($project['info']->city_id){
            $project['city'] =City::where('id',$project['info']->city_id)->first()->name;
        }
        $project['town']=array();
        if($project['info']->town_id){
            $project['town'] =Town::where('id',$project['info']->town_id)->first()->name;
        }
        $project['region']=array();
        if($project['info']->region_id){
            $project['region'] =Region::where('id',$project['info']->region_id)->first()->name;
        }
        $project['Currency']=array();
        $project['Currency'] = trans('admin.'.$project['info']->currency);


        return response()->json($project);
        
    }

    public function project_info(Request $request)
    {
        
        
        $project['info'] = Project::find($request['project_id']);
        
        $project['allowedEmp']=json_decode($project['info']->allowed_emp);
        
        if($project['allowedEmp']!=null){
            for($i=0; $i < sizeof($project['allowedEmp']) ;$i++)
                if($project['allowedEmp'][$i] == Auth()->user()->id){
                    return $this->getProjData($request);
                    
                }
            
        }else{
            return $this->getProjData($request);
        }
        
        return response()->json(['status'=>false,'errors'=>array('not_allowed'=>array('ليس لديك صلاحية لعرض هذا المشروع'))]);

    }
    
    

    public function projArchive(Request $request){

         $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')->where('enabled',1)
        ->where('model_id',$request['project_id'])
        ->whereNotIn('type', ['contractArchive'])
        ->where('model_name','App\\Models\\Project')
        ->with('files')
        ->with('archiveType')
        ->with('Admin')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->orderBy('archives.date', 'DESC')
        ->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function projCopyArchive(Request $request){
        
        $Archive = CopyTo::where('model_id',$request['project_id'])->where('enabled',1)
        ->where('model_name','App\\Models\\Project')->with('archive','archive.Admin')->with('archive','archive.files')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function projJalArchive(Request $request){

         $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['project_id'])
        ->where('model','App\\Models\\Project')->get();
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
        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function projContractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['project_id'])
        ->where('model_name','App\\Models\\Project')
        ->where('type','contractArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function project_info_all(Request $request)
    {
        $project= Project::select('projects.*','regions.name as region_name','cities.name as city_name',
        'towns.name as town_name','admins.nick_name as manager_name','departments.name as department_name')
        ->where('projects.enabled',1)
        ->leftJoin('admins','admins.id','projects.admin_id')
        ->leftJoin('departments','departments.id','projects.department_id')
        ->leftJoin('regions','projects.region_id','regions.id')
        ->leftJoin('cities','projects.city_id','cities.id')
        ->leftJoin('towns','projects.town_id','towns.id')->orderBy('id', 'DESC');
        return DataTables::of($project)
                            ->addIndexColumn()
                            ->make(true);

    }





}
