<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Equpment;
use App\Models\Admin;
use App\Models\Archive;
use App\Models\Department;
use App\Models\Orgnization;
use App\Models\Project;
use App\Models\SpecialAsset;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\spare_part;
use App\Models\Constant;
use App\Models\ArchiveLicense;
use DB;
use App\Models\LastTicket;
use App\Models\Cert;
use Illuminate\Support\Str;


class ReportController extends Controller{

    public function DailyReport()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'DailyReport';
        return view('dashboard.reports.dailyReport', compact('type'));
    }
    public function dailyTaskReport()
    {
        $type = 'dailyTaskReport';
        return view('dashboard.reports.dailyTaskReport', compact('type'));
    }
    public function messagesReport()
    {
        $type = 'messagesReport';
        return view('dashboard.reports.messagesReports', compact('type'));
    }
    public function deletedArchiveReport()
    {
        $type = 'DeletedArchiveReport';
        return view('dashboard.reports.deletedArchiveReport', compact('type'));
    }
    public function deletedDefinitionsReport()
    {
        $type = 'deletedDefinitionsReport';
        return view('dashboard.reports.deletedDefinitions', compact('type'));
    }
    public function customerReport()
    {
        $type = 'customerReport';
        return view('dashboard.reports.customerReport', compact('type'));
    }
    public function tasksReport()
    {
        $type = 'tasksReport';
        return view('dashboard.reports.tasksReport', compact('type'));
    }
    // where ticket_status in(1,5002)
    public function totalReport()
    {
        $departments = Department::where('enabled',1)->get();
        $admins = Admin::where('enabled',1)->get();
        $ticketStatuses = Constant::where('id',5003)->orwhere('parent',5001)->where('status',1)->get();
        $type = 'totalReport';
        return view('dashboard.reports.totalReport', compact('type','departments','ticketStatuses','admins'));
    }
    
    function masterQuery($where='',$ticketFiltter=''){
        $sql="";
        $lastTicket= LastTicket::find(1);
        for($i=1;$i<=$lastTicket->last_ticket;$i++){
            if($i==3) continue;
            if($i==1)
                $sql.=" SELECT `id`, 1 related, `active_trans`, `ticket_status` FROM `app_ticket".$i."s` $ticketFiltter";
            else
                $sql.=" UNION SELECT `id`, 2 related, `active_trans`, `ticket_status` FROM `app_ticket".$i."s` $ticketFiltter";
        }
        return "select * from (".$sql.") a ".$where;
    }
    
    function searchTasks(Request $request){
        // dd($request->all());
        $filters='';
        $ticketFiltter='where 1 ';
        $from='';
        $to='';
        if ($request->from && $request->to) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0].' '.'00:00:00';

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));

            $to = $to[2] . '-' . $to[1] . '-' . ($to[0]+1).' '.'00:00:00';

        }
        if($from!='' && $to!='')
        {
          $ticketFiltter.=  ' and created_at between  "'.$from.'"  and  "'.$to.'" ';
        }
        if($request->customerid!=0){
            $ticketFiltter.=' and customer_id='.$request->customerid;
        }
        if($request->taskState!=1 && $request->taskState!=null){
            // dd('hellllllllllo');
            $filters.=' and ticket_status ='.$request->taskState;
        }
        if($request->Deptid!=0){
            $ticketFiltter.=' and dept_id='.$request->Deptid;
        }
        // if($request->empid!=0){
        //      $filters+='where created_by='+$request->empid;
        // }
        
        // dd($filters);
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans ".$filters,$ticketFiltter);
        
        // dd($activeRec);
        
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.sender_id=admins.id WHERE  EXISTS ($activeRec) order by id desc");
        
        
        $arr=array();
        // dd($res);
        if(count($res)==0){
            $ticket['dept']=Department::where('id',$request->Deptid)->first();
            $ticket['taskState']=Constant::where('id',$request->taskState)->first();
            $arr[]=$ticket;
        }
        for($i=0;$i<count($res);$i++){
            
            $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where  id=".$res[$i]->ticket_id);
            if($i==0){
                $ticket['dept']=Department::where('id',$request->Deptid)->first();
                $ticket['taskState']=Constant::where('id',$request->taskState)->first();
            }
            if($ticket){
                $ticket['trans']=$res[$i];
                 $ticket['ticketState']=DB::select("SELECT
                                        a.*,sender_tbl.nick_name sender_name,sender_tbl.image sender_image,receive_tbl.nick_name receive_name,receive_tbl.image receive_image
                                    FROM
                                        (
                                        SELECT
                                            `id`,
                                            `ticket_id`,
                                            `related`,
                                            `sender_id`,
                                            `created_at`,
                                            '[]' `file_ids`,
                                            IFNULL(`s_note`, '') s_note,
                                            '' trans_note,
                                            `reciver_id`,
                                            `recive_type`,
                                            tagged_users
                                        FROM
                                            `app_trans`
                                        UNION
                                    SELECT
                                        `trans_id`,
                                        `ticket_id`,
                                        `app_type`,
                                        `created_by`,
                                        `created_at`,
                                        `file_ids`,
                                        `s_text`,
                                        `trans_note`,
                                        `created_by`,
                                        0,'[]'tagged_users
                                    FROM
                                        `app_responses`
                                    ) a join admins sender_tbl
                                    on a.sender_id=sender_tbl.id
                                    left join  admins receive_tbl
                                    on a.reciver_id=receive_tbl.id
                                    WHERE `ticket_id`=".$ticket['0']->id." 
                                    and `related`=".$ticket['trans']->related.'
                                     and a.`created_at` between "'. $from .'" and "' .$to.
                                    '" order by created_at asc'); 
                $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image,t_constant.name FROM `app_responses` join admins join t_constant on app_responses.created_by=admins.id and app_responses.i_status=t_constant.id  where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        return $arr;
    }
    
    function searchDailyTask(Request $request){
        
        if ($request->from && $request->to) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0];

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));

            $to = $to[2] . '-' . $to[1] . '-' . ($to[0]+1);

        }
        
        $Cert=Cert::whereRaw('CAST(t_farfromcenter.created_at AS DATE) between ? and ?', [$from, $to])->where('t_farfromcenter.e_type','=',1)->select('t_farfromcenter.*','t_certification.s_name_ar as cer_name')
        ->leftJoin('t_certification','t_certification.pk_i_id','t_farfromcenter.msgTitle')
        ->with('Admin')
        ->get();
        // dd($Cert);
        $arr=$this->searchTasks($request);
        // dd($arr);
        $result = array_merge($arr, $Cert->toArray());
        
        usort($result, function($a, $b) {
            if(count($a)<=7 && count($a)>1){
                $date1=strtotime($a[0]->created_at);
            }else{
                $date1=strtotime($a['created_at']);
            }
            
            if(count($b)<=7 && count($b)>1){
                $date2=strtotime($b[0]->created_at);
            }else{
                $date2=strtotime($b['created_at']);
            }
            return $date1 - $date2; // $v2 - $v1 to reverse direction
        });
        
        // dd($result);
        
        return $result;
    }
    
    

    public function deletedArchive(Request $request){

        if ($request->get('from') && $request->get('to')) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0];

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));

            $to = $to[2] . '-' . $to[1] . '-' . $to[0];

        }

        $archive = Archive::select('archives.*')->whereRaw('CAST(archives.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('archives.enabled', '0')->orderBy('id', 'DESC')->with('archiveType')->with('deleted_by')->with('Admin')->with('copyTo')->with('files')->get();
        // dd($archive->all());
        $licArchive= ArchiveLicense::select('archive_licenses.*')->whereRaw('CAST(archive_licenses.updated_at AS DATE) between ? and ?', [$from, $to])->where('archive_licenses.enabled', '0')->orderBy('id', 'DESC')->with('deleted_by')->with('Admin')->get();

        foreach($licArchive as $row){
            $attach=json_decode($row->json_feild);
            foreach($attach as $key=>$value){
                foreach((array) $value as $key=>$val){
                    $temp=array();
                    $temp['real_name']=$key;
                    $temp['url']=$val;
                }
                //dd($temp);
                $row->files[]=$temp;
            }
        }

        $archive=$archive->mergeRecursive($licArchive);
        $archive=$archive->sortByDesc('updated_at');
        foreach($archive as $row){
                if($row->model_name)
                {
                    $st=$row->model_name;
                    $url = explode('\\', ($st));
                    $url=Str::lower($url[2]);
                    $url=$url."s";
                    if($url=='specialassets'){
                        $url='special_assets';
                    }
                    //$row->files[]=$temp;
                    $uu = DB::select('select url from '.$url.' where id='.$row->model_id);
                    if($uu!=[]){
                        $uu=$uu[0];
                    }
                    $row->setAttribute('url',$uu);
                }
                else
                {
                    $row->setAttribute('url',array());
                }
        }
        
        return DataTables::of($archive)->addIndexColumn()
        ->editColumn('date', function ($archive) {
            if ($archive->date) {

                $actionBtn = " ";
                $from = explode('-', ($archive->date));

                $from = $from[2] . '/' . $from[1] . '/' . $from[0];
                $actionBtn=$from;
                return $actionBtn;

            } else {

                return '';

            }
            
        })
        ->addColumn('copyTo', function ($archive) {

            if ($archive->copyTo) {

                $actionBtn = " ";
               
                foreach ($archive->copyTo as $copyTo) {
                    if($copyTo->enabled==1)
                    $actionBtn .= ' ' . $copyTo->name . ', ';
                    
                }

                return $actionBtn;

            } else {

                return '';

            }

        })->make(true);
    }
    
    public function allArchive(Request $request){

        if ($request->get('from') && $request->get('to')) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0];

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));

            $to = $to[2] . '-' . $to[1] . '-' . $to[0];

        }
        
        if($request->get('arcType')==1){

            $archive = Archive::select('archives.*')->whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->orderBy('id', 'DESC')->with('archiveType')->with('Admin')->with('copyTo')->with('files')->get();
            // dd($archive->all());
            $licArchive= ArchiveLicense::select('archive_licenses.*')->whereRaw('CAST(archive_licenses.created_at AS DATE) between ? and ?', [$from, $to])->where('archive_licenses.enabled', '1')->orderBy('id', 'DESC')->with('Admin')->get();
            foreach($licArchive as $row){
                $attach=json_decode($row->json_feild);
                foreach($attach as $key=>$value){
                    foreach((array) $value as $key=>$val){
                        $temp=array();
                        $temp['real_name']=$key;
                        $temp['url']=$val;
                    }
                    //dd($temp);
                    $row->files[]=$temp;
                }
            }
            $archive=$archive->mergeRecursive($licArchive);
            $archive=$archive->sortByDesc('created_at');
            
            foreach($archive as $row){
                    if($row->model_name)
                    {
                        $st=$row->model_name;
                        $url = explode('\\', ($st));
                        $url=Str::lower($url[2]);
                        $url=$url."s";
                        if($url=='specialassets'){
                            $url='special_assets';
                        }
                        //$row->files[]=$temp;
                        $uu = DB::select('select url from '.$url.' where id='.$row->model_id);
                        if($uu!=[]){
                            $uu=$uu[0];
                        }
                        $row->setAttribute('url',$uu);
                    }
                    else
                    {
                        $row->setAttribute('url',array());
                    }
            }
            
            return DataTables::of($archive)->addIndexColumn()
            ->editColumn('date', function ($archive) {
                if ($archive->date) {
    
                    $actionBtn = " ";
                    $from = explode('-', ($archive->date));
    
                    $from = $from[2] . '/' . $from[1] . '/' . $from[0];
                    $actionBtn=$from;
                    return $actionBtn;
    
                } else {
    
                    return '';
    
                }
                
            })
            ->addColumn('copyTo', function ($archive) {
    
                if ($archive->copyTo) {
    
                    $actionBtn = " ";
                   
                    foreach ($archive->copyTo as $copyTo) {
                        if($copyTo->enabled==1)
                        $actionBtn .= ' ' . $copyTo->name . ', ';
                        
                    }
    
                    return $actionBtn;
    
                } else {
    
                    return '';
    
                }
    
            })->make(true);
            
        }else{
            $archive['type']=2;
            
            $archive['outArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','outArchive')->get());
            
            $archive['inArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','inArchive')->get());
            
            $archive['munArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','munArchive')->get());
            
            $archive['projArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','projArchive')->get());
            
            $archive['assetsArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','assetsArchive')->get());
            
            $archive['empArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','empArchive')->get());
            
            $archive['contractArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','contractArchive')->get());
            
            $archive['financeArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','financeArchive')->get());
            
            $archive['citArchiveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','citArchive')->get());
            
            $archive['lawArchieveCount'] = count(Archive::whereRaw('CAST(archives.created_at AS DATE) between ? and ?', [$from, $to])
            ->where('archives.enabled', '1')->where('type','lawArchieve')->get());
            
            $archive['licArchiveCount'] = count(ArchiveLicense::whereRaw('CAST(created_at AS DATE) between ? and ?', [$from, $to])
            ->where('enabled', '1')->where('type','licArchive')->get());
            
            return response()->json($archive);
        }
    }
    
    public function deletedDefinitions(Request $request){

        if ($request->get('from') && $request->get('to')) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0];

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));

            $to = $to[2] . '-' . $to[1] . '-' . $to[0];

        }
        
        
        
        $res = Admin::select('admins.*')->whereRaw('CAST(admins.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('admins.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();
        
        $dept = Department::select('departments.*')->whereRaw('CAST(departments.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('departments.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();
        
        $subscriber = User::select('users.*')->whereRaw('CAST(users.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('users.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();
        
        $assets = Equpment::whereRaw('CAST(equpments.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('equpments.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();
        
        $vehicle = Vehicle::select('vehicles.*')->whereRaw('CAST(vehicles.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('vehicles.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();
        
        $building = SpecialAsset::select('special_assets.*')->whereRaw('CAST(special_assets.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('special_assets.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();
        
        $spare_parts = spare_part::select('spare_parts.*')->whereRaw('CAST(spare_parts.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('spare_parts.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();
        
        $projects = Project::select('projects.*')->whereRaw('CAST(projects.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('projects.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();

        $orgnization = Orgnization::select('orgnizations.*')->whereRaw('CAST(orgnizations.updated_at AS DATE) between ? and ?', [$from, $to])
        ->where('orgnizations.enabled', '0')->orderBy('updated_at', 'DESC')->with('deleted_by')->get();

        $res=$res->mergeRecursive($dept);
        $res=$res->mergeRecursive($subscriber);
        $res=$res->mergeRecursive($assets);
        $res=$res->mergeRecursive($vehicle);
        $res=$res->mergeRecursive($building);
        $res=$res->mergeRecursive($spare_parts);
        $res=$res->mergeRecursive($projects);
        $res=$res->mergeRecursive($orgnization);
        
        $res=$res->sortByDesc('updated_at');
        
        return DataTables::of($res)->addIndexColumn()->make(true);
    }

    public function restoreAdmin(Request $request){
        $admin=Admin::find($request['id']);
        if($admin){
            $admin->enabled=1;
            $admin->deleted_by=0;
            $admin->save();
            if ($admin) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreDepartment(Request $request){
        $dept=Department::find($request['id']);
        if($dept){
            $dept->enabled=1;
            $dept->deleted_by=0;
            $dept->save();
            if ($dept) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreUser(Request $request){
        $user=User::find($request['id']);
        if($user){
            $user->enabled=1;
            $user->deleted_by=0;
            $user->save();
            if ($user) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreEqupment(Request $request){
        $equp=Equpment::find($request['id']);
        if($equp){
            $equp->enabled=1;
            $equp->deleted_by=0;
            $equp->save();
            if ($equp) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreVehicle(Request $request){
        $vehicle=Vehicle::find($request['id']);
        if($vehicle){
            $vehicle->enabled=1;
            $vehicle->deleted_by=0;
            $vehicle->save();
            if ($vehicle) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreSpecialAsset(Request $request){
        $building=SpecialAsset::find($request['id']);
        if($building){
            $building->enabled=1;
            $building->deleted_by=0;
            $building->save();
            if ($building) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreSparepart(Request $request){
        $spare_part=spare_part::find($request['id']);
        if($spare_part){
            $spare_part->enabled=1;
            $spare_part->deleted_by=0;
            $spare_part->save();
            if ($spare_part) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreProject(Request $request){
        $project=Project::find($request['id']);
        if($project){
            $project->enabled=1;
            $project->deleted_by=0;
            $project->save();
            if ($project) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function restoreOrgnization(Request $request){
        $orgnization=Orgnization::find($request['id']);
        if($orgnization){
            $orgnization->enabled=1;
            $orgnization->deleted_by=0;
            $orgnization->save();
            if ($orgnization) {

                return response()->json(['success'=>trans('admin.subscriber_added')]);
    
            }
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

}
