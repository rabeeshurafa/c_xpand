<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\water;
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
use App\Models\License;
use App\Models\elec;
use App\Models\AppTicket1;
use App\Models\AppTicket2;
use App\Models\AppTicket4;
use App\Models\AppTicket5;
use App\Models\AppTicket6;
use App\Models\AppTicket7;
use App\Models\AppTicket8;
use App\Models\AppTicket10;
use App\Models\AppTicket9;
use App\Models\AppTicket11;
use App\Models\AppTicket12;
use App\Models\AppTicket13;
use App\Models\AppTicket14;
use App\Models\AppTicket15;
use App\Models\AppTicket16;
use App\Models\AppTicket17;
use App\Models\AppTicket18;
use App\Models\AppTicket19;
use App\Models\AppTicket20;
use App\Models\AppTicket21;
use App\Models\AppTicket22;
use App\Models\AppTicket23;
use App\Models\AppTicket24;
use App\Models\AppTicket25;
use App\Models\AppTicket26;
use App\Models\AppTicket27;
use App\Models\AppTicket28;
use App\Models\AppTicket29;
use App\Models\AppTicket30;
use App\Models\AppTicket31;
use App\Models\AppTicket32;
use App\Models\AppTicket33;
use App\Models\AppTicket34;
use App\Models\AppTicket35;
use App\Models\AppTicket36;
use App\Models\AppTicket37;
use App\Models\AppTicket38;
use App\Models\Cert;
use App\Models\TicketConfig;
use App\Models\Smslog;
use App\Models\Region;
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
        $regions= Region::where('status',1)->get();
        $job = Constant::where('parent',74)->where('status',1)->get();
        $dept = Region::where('status',1)->get();
        $use_elec =Constant::where('parent',6032)->where('status',1)->get();
        $use_water =Constant::where('parent',6032)->where('status',1)->get();
        $use_desc=Constant::where('parent',6214)->where('status',1)->get();
        return view('dashboard.reports.customerReport', compact('type','regions','job','use_desc','use_elec','use_water'));
    }
    public function tasksReport()
    {
        $type = 'tasksReport';
        return view('dashboard.reports.tasksReport', compact('type'));
    }
    
    public function vacationReport()
    {
        $type = 'vacationReport';
        return view('dashboard.reports.vacationReport', compact('type'));
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
    public function taskArchiveReport(){
        $type= 'taskArchiveReport';
        return view('dashboard.reports.tasksArchiveReport',compact('type'));
    }
    
    public function subscriberReport(Request $request){
        
        if($request->region ==-1){
            $license= License::where('enabled','1')->with('User')->with('Region')->orderBy('licenses.user_id')->get();
            $elec= Elec::where('enabled','1')->with('User')->with('Region')->orderBy('elecs.user_id')->get();
            $water= Water::where('enabled','1')->with('User')->with('Region')->orderBy('waters.user_id')->get();
        }else{
            $license= License::where('enabled','1')->where('region',$request->region)->with('User')->with('Region')->orderBy('licenses.user_id')->get();
            $elec= Elec::where('enabled','1')->where('region',$request->region)->with('User')->with('Region')->orderBy('elecs.user_id')->get();
            $water= water::where('enabled','1')->where('region',$request->region)->with('User')->with('Region')->orderBy('waters.user_id')->get();
        }
        
        $res=array();
        $tempRes=array();
        $tempRes1=array();
        $tempRes2=array();

        if($request->dept ==0 || $request->dept ==3){
            foreach($license as $sub){
                if(sizeof($tempRes)!=0){
                    $used=0;
                    for($i=0 ; $i<sizeof($tempRes) ;$i++ ){
                        if($sub->user->id==$tempRes[$i]['user_id']){
                            $tempRes[$i]['lic_count']+=1;
                            $used=1;
                            break;
                        }
                    }
                    if($used==0){
                        $temp['user_id']=$sub->user->id;
                        $temp['user_name']=$sub->user->name;
                        $job= Constant::where('id',$sub->user->job_title_id)->first();
                        $temp['user_job']=$job;
                        $temp['lic_subType']=$sub;
                        $region= Region::where('id',$sub->user->region)->first();
                        $temp['user_region']=$region;
                        $temp['lic_count']=1;
                        $temp['elec_count']=0;
                        $temp['water_count']=0;
                        array_push($tempRes, $temp);
                    }
                }else{
                    $temp['user_id']=$sub->user->id;
                    $temp['user_name']=$sub->user->name;
                    $job= Constant::where('id',$sub->user->job_title_id)->first();
                    $temp['user_job']=$job;
                    $temp['lic_subType']=$sub;
                    $region= Region::where('id',$sub->user->region)->first();
                    $temp['user_region']=$region;
                    $temp['lic_count']=1;
                    $temp['elec_count']=0;
                    $temp['water_count']=0;
                    array_push($tempRes, $temp);
                }
            }
        }
        
        if($request->dept ==0 || $request->dept ==1){
            foreach($elec as $sub){
                if(sizeof($tempRes)!=0){
                    $used=0;
                    for($i=0 ; $i<sizeof($tempRes) ;$i++ ){
    
                        if($sub->user->id==$tempRes[$i]['user_id']){
                            $tempRes[$i]['elec_count']+=1;
                            $used=1;
                            break;
                        }
                    }
                    if($used==0){
                        $temp['user_id']=$sub->user->id;
                        $temp['user_name']=$sub->user->name;
                        $job= Constant::where('id',$sub->user->job_title_id)->first();
                        $temp['user_job']=$job;
                        $subType=Constant::where('id',$sub->subscription_Type)->first();
                        $temp['user_subType']=$subType;
                        $region= Region::where('id',$sub->user->region)->first();
                        $temp['user_region']=$region;
                        $temp['lic_count']=0;
                        $temp['elec_count']=1;
                        $temp['water_count']=0;
                        array_push($tempRes, $temp);
                    }
                }else{
                    $temp['user_id']=$sub->user->id;
                    $temp['user_name']=$sub->user->name;
                    $job= Constant::where('id',$sub->user->job_title_id)->first();
                    $temp['user_job']=$job;
                    $subType=Constant::where('id',$sub->subscription_Type)->first();
                    $temp['user_subType']=$subType;
                    $region= Region::where('id',$sub->user->region)->first();
                    $temp['user_region']=$region;
                    $temp['lic_count']=0;
                    $temp['elec_count']=1;
                    $temp['water_count']=0;
                    array_push($tempRes, $temp);
                }
            }
        }
        
        if($request->dept ==0 || $request->dept ==2){
            foreach($water as $sub){
                if(sizeof($tempRes)!=0){
                    $used=0;
                    for($i=0 ; $i<sizeof($tempRes) ;$i++ ){
    
                        if($sub->user->id==$tempRes[$i]['user_id']){
                            $tempRes[$i]['water_count']+=1;
                            $used=1;
                            break;
                        }
                    }
                    if($used==0){
                        $temp['user_id']=$sub->user->id;
                        $temp['user_name']=$sub->user->name;
                        $job= Constant::where('id',$sub->user->job_title_id)->first();
                        $temp['user_job']=$job;
                        $subType=Constant::where('id',$sub->subscription_Type)->first();
                        $temp['user_subType']=$subType;
                        $region= Region::where('id',$sub->user->region)->first();
                        $temp['user_region']=$region;
                        $temp['lic_count']=0;
                        $temp['elec_count']=0;
                        $temp['water_count']=1;
                        array_push($tempRes, $temp);
                    }
                }else{
                    $temp['user_id']=$sub->user->id;
                    $temp['user_name']=$sub->user->name;
                    $job= Constant::where('id',$sub->user->job_title_id)->first();
                    $temp['user_job']=$job;
                    $subType=Constant::where('id',$sub->subscription_Type)->first();
                    $temp['user_subType']=$subType;
                    $region= Region::where('id',$sub->user->region)->first();
                    $temp['user_region']=$region;
                    $temp['lic_count']=0;
                    $temp['elec_count']=0;
                    $temp['water_count']=1;
                    array_push($tempRes, $temp);
                }
            }
        }
        
        ////////////////////////////////--عدد الأشتراكات filter--///////////////////////////////////////////
        if($request->subsCount!= null && $request->subsCount!= 0){
            for($i=0 ; $i<sizeof($tempRes) ;$i++){
                
                if($tempRes[$i]['lic_count'] >=$request->subsCount || $tempRes[$i]['elec_count'] >=$request->subsCount || $tempRes[$i]['water_count'] >=$request->subsCount){
                    array_push($tempRes1, $tempRes[$i]);
                }
                
            }
        }else{
            $tempRes1=$tempRes;
        }
        ////////////////////////////////////--المهنة filter--///////////////////////////////////////////
        if($request->job!= 0){
            for($i=0 ; $i<sizeof($tempRes1) ;$i++){
                if($tempRes1[$i]['user_job']!=null){
                    if($tempRes1[$i]['user_job']->id ==$request->job)
                        array_push($tempRes2, $tempRes1[$i]);
                }
            }
        }else{
            $tempRes2=$tempRes1;
        }
        //////////////////////////////////--نوع الأشتراك filter--///////////////////////////////////////
        if($request->subType!=0){
            for($i=0;$i<sizeof($tempRes2);$i++) {
                // dd($tempRes2[$i]);
                // dd($tempRes2[$i]['user_subType']->id== $request->subType);
                if ($tempRes2[$i]['user_subType'] != null ) {
                    if ($tempRes2[$i]['user_subType']->id == $request->subType)
                        array_push($res, $tempRes2[$i]);

                }
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////
        
        if(($request->subsCount== null || $request->subsCount== 0) && $request->subType==0  ){
            $res=$tempRes;
        }
        
        
        return DataTables::of($res)->addIndexColumn()->make(true);

    }





    public function smsReport(Request $request){
        
        $from='';
        $to='';
        if ($request->from && $request->to) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0].' '.'00:00:00';

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));
            if($to[0]==31)
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]).' '.'00:00:00';
            else
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]+1).' '.'00:00:00';

        }
        
        $messages =Smslog::select('smslogs.*','admins.nick_name as nick_name')
                    ->whereBetween('smslogs.created_at',[$from,$to])
                    ->where('app_ticket','!=',null)
                    ->leftJoin('admins','admins.id','smslogs.sender')
                    ->orderBy('smslogs.created_at', 'DESC')->get();
        // dd($messages);
        foreach($messages as $message){
            $ticketname=  DB::select("SELECT `ticket_name` FROM `ticket_configs` where ticket_no = ".$message->app_ticket." and app_type = ".$message->app_type);
            $ticketNo  = DB::select("SELECT `app_no` FROM `app_ticket".$message->app_ticket."s` where id = ".$message->app_id);
            
            // dd($ticketname);
            // dd($ticketNo);
            // $temp=$ticketNo[0]->app_no;
            $message->ticket_name=$ticketname[0]->ticket_name;
            $message->ticket_No=$ticketNo;
        }

        // dd($messages);
        // return $messages;
        return DataTables::of($messages)->addIndexColumn()->make(true);
    }
    
    public function vacationsReport(Request $request){
        
        $from='01-01-1990 00:00:00';
        $to=date("Y-m-d h:i:sa");
        if ($request->from && $request->to) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0].' '.'00:00:00';

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));
            if($to[0]==31)
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]).' '.'00:00:00';
            else
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]+1).' '.'00:00:00';

        }
        $emp_id='0';
        if($request->emp_id!=null){
            $emp_id=$request->emp_id;
        }
        
        if($request->vacType==1){
            if($emp_id!=0){
               $vac= AppTicket32::select('app_ticket32s.*','t_constant.name as vac_name')
                    ->where('customer_id',$emp_id)
                    ->whereBetween('app_ticket32s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket32s.vac_type')
                    ->orderBy('app_ticket32s.created_at', 'DESC')->get();
                
               $leav= AppTicket28::select('app_ticket28s.*','t_constant.name as leave_name')
                    ->where('customer_id',$emp_id)
                    ->whereBetween('app_ticket28s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket28s.leave_type')
                    ->orderBy('app_ticket28s.created_at', 'DESC')->get();
               
               $res =$vac->mergeRecursive($leav);
               $res = $res->sortByDesc('created_at');
               return DataTables::of($res)->addIndexColumn()->make(true);
            }else{
                $vac= AppTicket32::select('app_ticket32s.*','t_constant.name as vac_name')
                    ->whereBetween('app_ticket32s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket32s.vac_type')
                    ->orderBy('app_ticket32s.created_at', 'DESC')->get();
                
                $leav= AppTicket28::select('app_ticket28s.*','t_constant.name as leave_name')
                    ->whereBetween('app_ticket28s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket28s.leave_type')
                    ->orderBy('app_ticket28s.created_at', 'DESC')->get();
               
                $res =$vac->mergeRecursive($leav);
                $res = $res->sortByDesc('created_at');
                return DataTables::of($res)->addIndexColumn()->make(true);
            }
        }elseif($request->vacType==2){
            if($emp_id!=0){
               $res= AppTicket32::select('app_ticket32s.*','t_constant.name as vac_name')
                    ->where('customer_id',$emp_id)
                    ->whereBetween('app_ticket32s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket32s.vac_type')
                    ->orderBy('app_ticket32s.created_at', 'DESC')->get();
               
               return DataTables::of($res)->addIndexColumn()->make(true);
            }else{
                $res= AppTicket32::select('app_ticket32s.*','t_constant.name as vac_name')
                    ->whereBetween('app_ticket32s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket32s.vac_type')
                    ->orderBy('app_ticket32s.created_at', 'DESC')->get();
               
                return DataTables::of($res)->addIndexColumn()->make(true);
            }
        }else{
            if($emp_id!=0){
               $res= AppTicket28::select('app_ticket28s.*','t_constant.name as leave_name')
                    ->where('customer_id',$emp_id)
                    ->whereBetween('app_ticket28s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket28s.leave_type')
                    ->orderBy('app_ticket28s.created_at', 'DESC')->get();
                    
               return DataTables::of($res)->addIndexColumn()->make(true);
            }else{
                $res= AppTicket28::select('app_ticket28s.*','t_constant.name as leave_name')
                    ->whereBetween('app_ticket28s.created_at',[$from,$to])
                    ->leftJoin('t_constant','t_constant.id','app_ticket28s.leave_type')
                    ->orderBy('app_ticket28s.created_at', 'DESC')->get();
               
                return DataTables::of($res)->addIndexColumn()->make(true);
            }
        }
        
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
    
    function masterAuthQuery($where='',$ticketFiltter='',$ticketConfigs=''){
        $sql="";
        $lastTicket= LastTicket::find(1);
        for($i=0;$i<sizeof($ticketConfigs);$i++){
            $rowticketFiltter=$ticketFiltter.' and app_type = '.$ticketConfigs[$i]->app_type;
            // if($i==3) continue;
            if($i==0)
                $sql.=" SELECT `id`, 1 related, `active_trans`, `ticket_status` FROM `app_ticket".$ticketConfigs[$i]->ticket_no."s` $rowticketFiltter";
            else
                $sql.=" UNION SELECT `id`, 2 related, `active_trans`, `ticket_status` FROM `app_ticket".$ticketConfigs[$i]->ticket_no."s` $rowticketFiltter";
        }
        return "select * from (".$sql.") a ".$where;
    }
    
    
    function newSearchTasks(Request $request){
        // dd($request->all());
        
        $ticket1=AppTicket1::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket2=AppTicket2::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket4=AppTicket4::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket5=AppTicket5::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket6=AppTicket6::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket7=AppTicket7::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket8=AppTicket8::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket9=AppTicket9::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket10=AppTicket10::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket11=AppTicket11::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket12=AppTicket12::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket13=AppTicket13::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket14=AppTicket14::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket15=AppTicket15::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket16=AppTicket16::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket17=AppTicket17::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket18=AppTicket18::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket19=AppTicket19::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket20=AppTicket20::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket21=AppTicket21::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket22=AppTicket22::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket23=AppTicket23::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket24=AppTicket24::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket25=AppTicket25::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket26=AppTicket26::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket27=AppTicket27::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket28=AppTicket28::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket29=AppTicket29::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket30=AppTicket30::select('id','dept_id','app_no','network_type','malDesc','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket31=AppTicket31::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket32=AppTicket32::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket33=AppTicket33::select('id','dept_id','app_no','amount','receipt_no','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket34=AppTicket34::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket35=AppTicket35::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket36=AppTicket36::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket37=AppTicket37::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        $ticket38=AppTicket38::select('id','dept_id','app_no','customer_name','customer_id','created_by','active_trans','ticket_status','created_at','updated_at')
        ->with('activeTrans')->with('ticketStatus')->with('Admin')->where('active_trans','!=',null);
        
        if($request->taskState!=1){
            $ticket1 =  $ticket1->where('ticket_status',$request->taskState);
            $ticket2 =  $ticket2->where('ticket_status',$request->taskState);
            $ticket4 =  $ticket4->where('ticket_status',$request->taskState);
            $ticket5 =  $ticket5->where('ticket_status',$request->taskState);
            $ticket6 =  $ticket6->where('ticket_status',$request->taskState);
            $ticket7 =  $ticket7->where('ticket_status',$request->taskState);
            $ticket8 =  $ticket8->where('ticket_status',$request->taskState);
            $ticket9 =  $ticket9->where('ticket_status',$request->taskState);
            $ticket10=  $ticket10->where('ticket_status',$request->taskState);
            $ticket11=  $ticket11->where('ticket_status',$request->taskState);
            $ticket12=  $ticket12->where('ticket_status',$request->taskState);
            $ticket13=  $ticket13->where('ticket_status',$request->taskState);
            $ticket14=  $ticket14->where('ticket_status',$request->taskState);
            $ticket15=  $ticket15->where('ticket_status',$request->taskState);
            $ticket16=  $ticket16->where('ticket_status',$request->taskState);
            $ticket17=  $ticket17->where('ticket_status',$request->taskState);
            $ticket18=  $ticket18->where('ticket_status',$request->taskState);
            $ticket19=  $ticket19->where('ticket_status',$request->taskState);
            $ticket20=  $ticket20->where('ticket_status',$request->taskState);
            $ticket21=  $ticket21->where('ticket_status',$request->taskState);
            $ticket22=  $ticket22->where('ticket_status',$request->taskState);
            $ticket23=  $ticket23->where('ticket_status',$request->taskState);
            $ticket24=  $ticket24->where('ticket_status',$request->taskState);
            $ticket25=  $ticket25->where('ticket_status',$request->taskState);
            $ticket26=  $ticket26->where('ticket_status',$request->taskState);
            $ticket27=  $ticket27->where('ticket_status',$request->taskState);
            $ticket28=  $ticket28->where('ticket_status',$request->taskState);
            $ticket29=  $ticket29->where('ticket_status',$request->taskState);
            $ticket30=  $ticket30->where('ticket_status',$request->taskState);
            $ticket31=  $ticket31->where('ticket_status',$request->taskState);
            $ticket32=  $ticket32->where('ticket_status',$request->taskState);
            $ticket33=  $ticket33->where('ticket_status',$request->taskState);
            $ticket34=  $ticket34->where('ticket_status',$request->taskState);
            $ticket35=  $ticket35->where('ticket_status',$request->taskState);
            $ticket36=  $ticket36->where('ticket_status',$request->taskState);
            $ticket37=  $ticket37->where('ticket_status',$request->taskState);
            $ticket38=  $ticket38->where('ticket_status',$request->taskState);
        }
        if($request->Deptid!=0){
            $ticket1 =  $ticket1->where('dept_id',$request->Deptid);
            $ticket2 =  $ticket2->where('dept_id',$request->Deptid);
            $ticket4 =  $ticket4->where('dept_id',$request->Deptid);
            $ticket5 =  $ticket5->where('dept_id',$request->Deptid);
            $ticket6 =  $ticket6->where('dept_id',$request->Deptid);
            $ticket7 =  $ticket7->where('dept_id',$request->Deptid);
            $ticket8 =  $ticket8->where('dept_id',$request->Deptid);
            $ticket9 =  $ticket9->where('dept_id',$request->Deptid);
            $ticket10=  $ticket10->where('dept_id',$request->Deptid);
            $ticket11=  $ticket11->where('dept_id',$request->Deptid);
            $ticket12=  $ticket12->where('dept_id',$request->Deptid);
            $ticket13=  $ticket13->where('dept_id',$request->Deptid);
            $ticket14=  $ticket14->where('dept_id',$request->Deptid);
            $ticket15=  $ticket15->where('dept_id',$request->Deptid);
            $ticket16=  $ticket16->where('dept_id',$request->Deptid);
            $ticket17=  $ticket17->where('dept_id',$request->Deptid);
            $ticket18=  $ticket18->where('dept_id',$request->Deptid);
            $ticket19=  $ticket19->where('dept_id',$request->Deptid);
            $ticket20=  $ticket20->where('dept_id',$request->Deptid);
            $ticket21=  $ticket21->where('dept_id',$request->Deptid);
            $ticket22=  $ticket22->where('dept_id',$request->Deptid);
            $ticket23=  $ticket23->where('dept_id',$request->Deptid);
            $ticket24=  $ticket24->where('dept_id',$request->Deptid);
            $ticket25=  $ticket25->where('dept_id',$request->Deptid);
            $ticket26=  $ticket26->where('dept_id',$request->Deptid);
            $ticket27=  $ticket27->where('dept_id',$request->Deptid);
            $ticket28=  $ticket28->where('dept_id',$request->Deptid);
            $ticket29=  $ticket29->where('dept_id',$request->Deptid);
            $ticket30=  $ticket30->where('dept_id',$request->Deptid);
            $ticket31=  $ticket31->where('dept_id',$request->Deptid);
            $ticket32=  $ticket32->where('dept_id',$request->Deptid);
            $ticket33=  $ticket33->where('dept_id',$request->Deptid);
            $ticket34=  $ticket34->where('dept_id',$request->Deptid);
            $ticket35=  $ticket35->where('dept_id',$request->Deptid);
            $ticket36=  $ticket36->where('dept_id',$request->Deptid);
            $ticket37=  $ticket37->where('dept_id',$request->Deptid);
            $ticket38=  $ticket38->where('dept_id',$request->Deptid);
        }
        if($request->customerid!=0){
            $ticket1 =  $ticket1->where('customer_id',$request->customerid);
            $ticket2 =  $ticket2->where('customer_id',$request->customerid);
            $ticket4 =  $ticket4->where('customer_id',$request->customerid);
            $ticket5 =  $ticket5->where('customer_id',$request->customerid);
            $ticket6 =  $ticket6->where('customer_id',$request->customerid);
            $ticket7 =  $ticket7->where('customer_id',$request->customerid);
            $ticket8 =  $ticket8->where('customer_id',$request->customerid);
            $ticket9 =  $ticket9->where('customer_id',$request->customerid);
            $ticket10=  $ticket10->where('customer_id',$request->customerid);
            $ticket11=  $ticket11->where('customer_id',$request->customerid);
            $ticket12=  $ticket12->where('customer_id',$request->customerid);
            $ticket13=  $ticket13->where('customer_id',$request->customerid);
            $ticket14=  $ticket14->where('customer_id',$request->customerid);
            $ticket15=  $ticket15->where('customer_id',$request->customerid);
            $ticket16=  $ticket16->where('customer_id',$request->customerid);
            $ticket17=  $ticket17->where('customer_id',$request->customerid);
            $ticket18=  $ticket18->where('customer_id',$request->customerid);
            $ticket19=  $ticket19->where('customer_id',$request->customerid);
            $ticket20=  $ticket20->where('customer_id',$request->customerid);
            $ticket21=  $ticket21->where('customer_id',$request->customerid);
            $ticket22=  $ticket22->where('customer_id',$request->customerid);
            $ticket23=  $ticket23->where('customer_id',$request->customerid);
            $ticket24=  $ticket24->where('customer_id',$request->customerid);
            $ticket25=  $ticket25->where('customer_id',$request->customerid);
            $ticket26=  $ticket26->where('customer_id',$request->customerid);
            $ticket27=  $ticket27->where('customer_id',$request->customerid);
            $ticket28=  $ticket28->where('customer_id',$request->customerid);
            $ticket29=  $ticket29->where('customer_id',$request->customerid);
            // $ticket30=  $ticket30->where('customer_id',$request->customerid);
            $ticket31=  $ticket31->where('customer_id',$request->customerid);
            $ticket32=  $ticket32->where('customer_id',$request->customerid);
            // $ticket33=  $ticket33->where('customer_id',$request->customerid);
            $ticket34=  $ticket34->where('customer_id',$request->customerid);
            $ticket35=  $ticket35->where('customer_id',$request->customerid);
            $ticket36=  $ticket36->where('customer_id',$request->customerid);
            $ticket37=  $ticket37->where('customer_id',$request->customerid);
            $ticket38=  $ticket38->where('customer_id',$request->customerid);
        }
        if($request->from!='' && $request->from!=null  && $request->to!='' && $request->to!=null){
            
            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0].' '.'00:00:00';

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));
            if($to[0]==31)
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]).' '.'00:00:00';
            else
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]+1).' '.'00:00:00';
            
            $ticket1 =  $ticket1->whereBetween('created_at', [$from, $to]);
            $ticket2 =  $ticket2->whereBetween('created_at', [$from, $to]);
            $ticket4 =  $ticket4->whereBetween('created_at', [$from, $to]);
            $ticket5 =  $ticket5->whereBetween('created_at', [$from, $to]);
            $ticket6 =  $ticket6->whereBetween('created_at', [$from, $to]);
            $ticket7 =  $ticket7->whereBetween('created_at', [$from, $to]);
            $ticket8 =  $ticket8->whereBetween('created_at', [$from, $to]);
            $ticket9 =  $ticket9->whereBetween('created_at', [$from, $to]);
            $ticket10=  $ticket10->whereBetween('created_at', [$from, $to]);
            $ticket11=  $ticket11->whereBetween('created_at', [$from, $to]);
            $ticket12=  $ticket12->whereBetween('created_at', [$from, $to]);
            $ticket13=  $ticket13->whereBetween('created_at', [$from, $to]);
            $ticket14=  $ticket14->whereBetween('created_at', [$from, $to]);
            $ticket15=  $ticket15->whereBetween('created_at', [$from, $to]);
            $ticket16=  $ticket16->whereBetween('created_at', [$from, $to]);
            $ticket17=  $ticket17->whereBetween('created_at', [$from, $to]);
            $ticket18=  $ticket18->whereBetween('created_at', [$from, $to]);
            $ticket19=  $ticket19->whereBetween('created_at', [$from, $to]);
            $ticket20=  $ticket20->whereBetween('created_at', [$from, $to]);
            $ticket21=  $ticket21->whereBetween('created_at', [$from, $to]);
            $ticket22=  $ticket22->whereBetween('created_at', [$from, $to]);
            $ticket23=  $ticket23->whereBetween('created_at', [$from, $to]);
            $ticket24=  $ticket24->whereBetween('created_at', [$from, $to]);
            $ticket25=  $ticket25->whereBetween('created_at', [$from, $to]);
            $ticket26=  $ticket26->whereBetween('created_at', [$from, $to]);
            $ticket27=  $ticket27->whereBetween('created_at', [$from, $to]);
            $ticket28=  $ticket28->whereBetween('created_at', [$from, $to]);
            $ticket29=  $ticket29->whereBetween('created_at', [$from, $to]);
            $ticket30=  $ticket30->whereBetween('created_at', [$from, $to]);
            $ticket31=  $ticket31->whereBetween('created_at', [$from, $to]);
            $ticket32=  $ticket32->whereBetween('created_at', [$from, $to]);
            $ticket33=  $ticket33->whereBetween('created_at', [$from, $to]);
            $ticket34=  $ticket34->whereBetween('created_at', [$from, $to]);
            $ticket35=  $ticket35->whereBetween('created_at', [$from, $to]);
            $ticket36=  $ticket36->whereBetween('created_at', [$from, $to]);
            $ticket37=  $ticket37->whereBetween('created_at', [$from, $to]);
            $ticket38=  $ticket38->whereBetween('created_at', [$from, $to]);
            
        }
        $tickets=$ticket1->unionAll($ticket2)->unionAll($ticket4)->unionAll($ticket5)->unionAll($ticket6)->unionAll($ticket7)->unionAll($ticket8)->unionAll($ticket9)->unionAll($ticket10)
        ->unionAll($ticket11)->unionAll($ticket12)->unionAll($ticket13)->unionAll($ticket14)->unionAll($ticket15)->unionAll($ticket16)->unionAll($ticket17)->unionAll($ticket18)->unionAll($ticket19)
        ->unionAll($ticket20)->unionAll($ticket21)->unionAll($ticket22)->unionAll($ticket23)->unionAll($ticket24)->unionAll($ticket25)->unionAll($ticket26)->unionAll($ticket27)->unionAll($ticket28)
        ->unionAll($ticket29)->unionAll($ticket30)->unionAll($ticket31)->unionAll($ticket32)->unionAll($ticket33)->unionAll($ticket34)->unionAll($ticket35)->unionAll($ticket36)->unionAll($ticket37)
        ->unionAll($ticket38);
        // dd($ticket);
        $tickets=$tickets->get();
        $res=array();
        foreach($tickets as $ticket){
            if($ticket->activeTrans!=null){
                // dd($ticket);
                $config=TicketConfig::where('app_type',$ticket->activeTrans->ticket_type)->where('ticket_no',$ticket->activeTrans->related)->first();
                $admin=Admin::where('id',$ticket->activeTrans->reciver_id)->first();
                $ticket['TicketConfig']=$config;
                $ticket->admin2=$admin;
                // if(intval($request->empid)!=0 && $request->empid!=null){
                //     if(intval($request->empid)==$admin->id){
                //         // dd($admin,$request->empid);
                //         array_push($res, $ticket);
                        
                //     }
                    
                // }else{
                    array_push($res, $ticket);
                // }
            }
            
        }
        return $res;
    }
    
    
    function searchTasks(Request $request,$all=false){
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
            if($to[0]==31)
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]).' '.'00:00:00';
            else
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
            $filters.=' and ticket_status ='.$request->taskState;
        }
        if($request->Deptid!=0){
            $ticketFiltter.=' and dept_id='.$request->Deptid;
        }
        
        $activeRec='';
        
        if($all==false){
            
            $emp = Auth()->user()->id; ;
            $emp = (string) json_encode($emp);
            $emp = '"' . $emp . '"';

            $ticketConfigs=DB::select("SELECT * FROM `ticket_configs` where json_contains(`emp_to_report_ticket`,'".$emp."','$')=1");
            $rowticketFiltter=$ticketFiltter;
            if(sizeof($ticketConfigs)>0){
                $activeRec=$this->masterAuthQuery(" where app_trans.id = a.active_trans ".$filters,$ticketFiltter,$ticketConfigs);
            }else{
                $arr=array();
                $arr=['false'];
                return  $arr;
            }
        }else{
        
            $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans ".$filters,$ticketFiltter);
        }
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
            $admin =Admin::where('id',intval($ticket->created_by))->first();
            if($admin)
            dd($admin);
            $ticket['emp_name'] = $admin->nick_name;
            if($ticket){
                
                $ticket['trans']=$res[$i];
                $ticket['ticketState']=DB::select("SELECT
                                        a.*,sender_tbl.nick_name sender_name,sender_tbl.image sender_image,receive_tbl.nick_name receive_name,receive_tbl.image receive_image,emp.name as emp_name
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
                
                if($res[$i]->related==23 && $res[$i]->ticket_type==4){
                    $ticket['tiketName']=Constant::where('id',$ticket['0']->task_type)->first();
                }
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
            
            if($to[0]==31)
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]);
            else
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]+1);

        }
        
        $Cert=Cert::whereRaw('CAST(t_farfromcenter.created_at AS DATE) between ? and ?', [$from, $to])->select('t_farfromcenter.*','t_certification.s_name_ar as cer_name')
        ->leftJoin('t_certification','t_certification.pk_i_id','t_farfromcenter.msgTitle')
        ->with('Admin')
        ->get();
        // dd($Cert);
        $arr=$this->searchTasks($request,true);
        // dd($arr);
        $result = array_merge($arr, $Cert->toArray());
        
        usort($result, function($a, $b) {
            if(count($a)<=8 && count($a)>1){
                $date1=strtotime($a[0]->created_at);
            }else{
                $date1=strtotime($a['created_at']);
            }
            
            if(count($b)<=8 && count($b)>1){
                $date2=strtotime($b[0]->created_at);
            }else{
                $date2=strtotime($b['created_at']);
            }
            return  $date2 - $date1; // $v2 - $v1 to reverse direction
        });
        
        // dd($result);
        
        return $result;
    }
    
    function selectMasterQuery($where='',$ticketFiltter='',$tickets=''){
        $sql="";

        $rawticketFiltter=$ticketFiltter;
        for($i=0;$i<sizeof($tickets);$i++){
            
            $ticketinfo=explode("_", $tickets[$i]);
            $ticketFiltter= $rawticketFiltter. ' and app_type =  '.$ticketinfo[0];
            if($ticketinfo[1]==3) continue;
            if($i==0)
                $sql.=" SELECT `id`, 1 related, `active_trans`, `ticket_status` FROM `app_ticket".$ticketinfo[1]."s` $ticketFiltter";
            else
                $sql.=" UNION SELECT `id`, 2 related, `active_trans`, `ticket_status` FROM `app_ticket".$ticketinfo[1]."s` $ticketFiltter";
        }
        return "select * from (".$sql.") a ".$where;
    }
    
    public function searchByTask(Request $request){
        $ticketFiltter='where 1 ';
        $from='';
        $to='';
        if ($request->from && $request->to) {

            $from = date_create(($request->get('from')));

            $from = explode('/', ($request->get('from')));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0].' '.'00:00:00';

            $to = date_create(($request->get('to')));

            $to = explode('/', ($request->get('to')));

            if($to[0]==31)
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]).' '.'00:00:00';
            else
                $to = $to[2] . '-' . $to[1] . '-' . ($to[0]+1).' '.'00:00:00';
        }
        if($from!='' && $to!='')
        {
            $ticketFiltter.=  ' and created_at between  "'.$from.'"  and  "'.$to.'" ';
        }
        $arr=array();
        $result=array();
        if($request->ticketType!=null){
            
            $emp = Auth()->user()->id; ;
            $emp = (string) json_encode($emp);
            $emp = '"' . $emp . '"';

            // $ticketConfigs=DB::select("SELECT * FROM `ticket_configs` where json_contains(`emp_to_report_ticket`,'".$emp."','$')=1");
            // $array = [0 => "a", 1 => "b", 2 => "c"];
            // unset($array[1]);
          // ↑ Key which you want to delete
            // for()
            
            $activeRec= $this->selectMasterQuery(" where app_trans.id = a.active_trans ",$ticketFiltter,$request->ticketType);
            // dd($activeRec);
            $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.reciver_id=admins.id WHERE  EXISTS ($activeRec) order by id desc");
            // dd($res);
            $arr=array();
            for($i=0;$i<count($res);$i++){
                
                $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where  id=".$res[$i]->ticket_id);
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
                    
                    if($res[$i]->related==23 && $res[$i]->ticket_type==4){
                        $ticket['tiketName']=Constant::where('id',$ticket['0']->task_type)->first();
                    }
                    $arr[]=$ticket;
                }
            }
            
            // dd($arr);
            
        }
        $result=$arr;
        if($request->cirtType1!=null){
                $Cert=Cert::whereRaw('CAST(t_farfromcenter.created_at AS DATE) between ? and ?', [$from, $to])->where('t_farfromcenter.e_type','=',1)->select('t_farfromcenter.*','t_certification.s_name_ar as cer_name')
                ->leftJoin('t_certification','t_certification.pk_i_id','t_farfromcenter.msgTitle')
                ->with('Admin')
                ->get();
                
            $result = array_merge($arr, $Cert->toArray());
        }
        if($request->cirtType2!=null){
                $Cert2=Cert::whereRaw('CAST(t_farfromcenter.created_at AS DATE) between ? and ?', [$from, $to])->where('t_farfromcenter.e_type','=',2)->select('t_farfromcenter.*','t_certification.s_name_ar as cer_name')
                ->leftJoin('t_certification','t_certification.pk_i_id','t_farfromcenter.msgTitle')
                ->with('Admin')
                ->get();
            $temp=  $result;  
            $result = array_merge($temp, $Cert2->toArray());
        }
        
        usort($result, function($a, $b) {
            if(count($a)<=8 && count($a)>1){
                $date1=strtotime($a[0]->created_at);
            }else{
                $date1=strtotime($a['created_at']);
            }
            
            if(count($b)<=8 && count($b)>1){
                $date2=strtotime($b[0]->created_at);
            }else{
                $date2=strtotime($b['created_at']);
            }
            return $date1 - $date2; // $v2 - $v1 to reverse direction
        });
        
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
