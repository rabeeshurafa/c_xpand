<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Constant;
use App\Models\Region;
use App\Models\Department;
use App\Models\User;
use App\Models\File;
use App\Models\water;
use App\Models\elec;
use App\Models\License;
use App\Models\Archive;
use App\Models\AgendaTopic;
use App\Models\CopyTo;
use App\Models\ArchiveLicense;
use DB;
use App\Models\ArchiveRole;
use App\Models\Setting;
class PortalWater extends Controller
{
    var $app_type=1;
    var $fees=array();

    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::where('enabled',1)->get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
        
    }
    
    // public function getUserData (Request $request){

    //     $user['info'] = User::find($request['id']);
    
    //     $model = $user['info']->model;

    //     $ArchiveCount = Archive::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->count();

    //     $user['outArchiveCount'] = Archive::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->where('type','outArchive')->count();

    //     $user['inArchiveCount']  = Archive::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->where('type','inArchive')->count();

    //     $user['otherArchiveCount']  = Archive::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive'])->count();

    //     $user['licArchiveCount'] = ArchiveLicense::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->where('type','licArchive')->count();

    //     $user['licFileArchiveCount'] = ArchiveLicense::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->where('type','licFileArchive')->count();

    //     $user['copyToCount']  = CopyTo::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->count();

    //     $user['linkToCount']  = AgendaTopic::where('connected_to',$request['id'])

    //     ->where('model',$model)->count();

    //     $jalArchiveCount = AgendaTopic::where('connected_to',$request['asset_id'])
    //     ->where('model',$model)->count();

    //     $user['contractArchiveCount']  = Archive::where('model_id',$request['asset_id'])->where('enabled',1)
    //     ->where('model_name',$model)->where('type', 'contractArchive')->count();

    //     $CopyToCount = CopyTo::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->count();
        
    //     $ArchiveLicCount =ArchiveLicense::where('model_id',$request['id'])->where('enabled',1)

    //     ->where('model_name',$model)->count();

    //     $user['ArchiveCount'] = $ArchiveCount + $CopyToCount +$ArchiveLicCount+$jalArchiveCount;
        
    //     return $user;

    // }
    public function portal_auto_complete(Request $request){
    
        $subscriber_data = $request['term'];

        $names = User::where('name', 'like', '%' . $subscriber_data . '%')->where('enabled',1)->select('*', 'name as label')->get();

        //$html = view('dashboard.component.auto_complete', compact('names'))->render();

        //dd($names);

        return response()->json($names);
    
    }
    public function appCustomer(Request $request){

        $subscriber_data = $request['id'];
        $valid=1;
        $errorList=array();
        $names = User::where('id',$request['id'] )->where('enabled',1 )->select('*')->with('jobLicArchieve')->with('License')->get();
        $msg='';
        
        foreach($names as $name)
        {
            foreach($name->jobLicArchieve as $row)
            {
                $parts=explode('/',$row->expiry_ate);
                $endDate=date('Y-m-d',strtotime($parts[2]."/".$parts[1]."/".$parts[0]));
                $currDate=date('Y-03-31');
                if($parts[2]>date('Y'))
                    $valid=1;
                else if($parts[2]==date('Y') && $parts[1]<3)
                    $valid=1;
                else if($parts[2]==date('Y') && $parts[1]>3){
                    $valid=0;
                    $errorList[]='المشترك لديه رخص حرف منتهية بتاريخ: '
                    .$row->expiry_ate;
                }
                else {
                    $valid=0;
                    $errorList[]='المشترك لديه رخص حرف منتهية بتاريخ: '
                    .$row->expiry_ate;
                }
            }
            $name->setAttribute("validLic",$valid);
            if($name->enabled==0)
                $errorList[]='حساب المستخدم معطل';
            $name->setAttribute("errorList",$errorList);
            $name->setAttribute("water",water::with('Counter')->where('user_id',$request['id'])->where('enabled',1 )->get());
            $name->setAttribute("elec",elec::with('Counter')->where('user_id',$request['id'])->where('enabled',1 )->get());
            $name->setAttribute("lic",license::where('user_id',$request['id'])->where('enabled',1 )->count());
        }
        
        if($names->isNotEmpty()){
            // $names[0]->setAttribute("archive",$this->getUserData($request));
        //$html = view('portal.component.auto_complete', compact('names'))->render();
        return response()->json($names[0]);
            
        }
        return response()->json([]);

    }
    
    function upload_image($file, $prefix)

    {

        if ($file) {

            $files = $file;

            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();

            $image = "storage/" . $imageName;

            $files->move(public_path('storage'), $imageName);

            $getValue = $image;

            return $getValue;

        }

    }
    
    // function saveFilesArchieve(Request $request,$taskname,$tasklink,$attachid){

    //         $i=count($request->attachName);
    //             $archive = new Archive();
        
    //             $archive->model_id = $request->subscriber_id;
        
    //             $archive->type_id = '6046';
        
    //             $archive->name = $request->subscriber_name;
        
    //             $archive->model_name = 'App\\Models\\User';
        
    //             $date=date("Y/m/d");
                
    //             $from = explode('/', ($date));
    
    //             $from = $from[2] . '-' . $from[1] . '-' . $from[0];
                
    //             $archive->date = $from;
                
    //             $archive->task_name = $taskname;
                
    //             $archive->task_link = $tasklink;
                
    //             $archive->title = $request->attachName[($i-1)];
                
    //             $archive->type = 'taskArchive';  
                
    //             $archive->serisal = '';
                
    //             $archive->url =  'cit_archieve';
                
    //             $archive->add_by = Auth()->user()->id;
        
    //             $archive->save();
        
    //             $file = File::find($attachid);
    //             $file->archive_id = $archive->id;

    //             $file->model_name = "App\Models\Archive";

    //             $file->save();
                
    // }
    
    // function saveResFilesArchieve(Request $request,$taskname,$tasklink,$attachid){

    //         $i=count($request->attachName1);
    //             $archive = new Archive();
        
    //             $archive->model_id = $request->subscriberId1;
        
    //             $archive->type_id = '6046';
        
    //             $archive->name = $request->subscriberName1;
        
    //             $archive->model_name = 'App\\Models\\User';
        
    //             $date=date("Y/m/d");
                
    //             $from = explode('/', ($date));
    
    //             $from = $from[2] . '-' . $from[1] . '-' . $from[0];
                
    //             $archive->date = $from;
                
    //             $archive->task_name = $taskname;
                
    //             $archive->task_link = $tasklink;
                
    //             $archive->title = $request->attachName1[($i-1)];
                
    //             $archive->type = 'taskArchive';  
                
    //             $archive->serisal = '';
                
    //             $archive->url =  'cit_archieve';
                
    //             $archive->add_by = Auth()->user()->id;
        
    //             $archive->save();
        
    //             $file = File::find($attachid);
    //             $file->archive_id = $archive->id;

    //             $file->model_name = "App\Models\Archive";

    //             $file->save();
                
    // }
    
    public function uploadTicketAttach(Request $request)
    {
        $data=array();
        $files_ids=array();
        $name=$request->attachfileName?$request->attachfileName:'attachfile';
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $url = $this->upload_image($file, 'quipent_');
            if ($url) {
                $uploaded_files['files'] = File::create(
                                                        [
                                                            'url' => $url,                        
                                                            'real_name' => $file->getClientOriginalName(),                        
                                                            'extension' => $file->getClientOriginalExtension(),]);
            }
            $data[] = $uploaded_files;
            
            foreach ($data as $row) {
                $files_ids[] = $row['files']->id;
            }
            $all_files['all_files'] = File::whereIn('id', $files_ids)->get();
            
            if($request->app_id!=null){
                
                $link='viewTicket/'.$request->app_id.'/'.$request->tiketrelated;
                $name=$request->tiketName.' '.$request->tiketAppNo;
                $attachid=$all_files['all_files'][0]->id;
                $this->saveFilesArchieve($request,$name,$link,$attachid);
                
            }else if($request->ticket_id!=null){
                
                $link='viewTicket/'.$request->ticket_id.'/'.$request->tiketrelated;
                $name=$request->tiketName.' '.$request->tiketAppNo;
                $attachid=$all_files['all_files'][0]->id;
                $this->saveResFilesArchieve($request,$name,$link,$attachid);
                
            }
            return response()->json($all_files);

        }

    }

    // public function store_config(Request $request){
    //     $ticketConfig = TicketConfig::find($request->id);
    //     $ticketConfig->single_receive = $request->single_receive;
    //     $ticketConfig->show_receipt = $request->show_receipt;
    //     $ticketConfig->receipt_is_need = $request->receipt_is_need;
    //     $ticketConfig->has_price_list = $request->has_price_list;
    //     $ticketConfig->dept_id = $request->dept_id;
    //     $ticketConfig->send_sms = $request->send_sms;
    //     $ticketConfig->emp_to_receive = $request->reciver;
    //     $ticketConfig->time_to_close = $request->time_to_close;
    //     $ticketConfig->has_clearance = $request->has_clearance;
    //     $ticketConfig->has_attach = $request->has_attach;
    //     $ticketConfig->has_debt_list = $request->has_debt_list;
    //     $ticketConfig->force_attach = $request->force_attach;
    //     $ticketConfig->show_archive = $request->show_archive;
    //     $ticketConfig->apply_with_finished_license = $request->apply_with_finished_license;
    //     $ticketConfig->apply_for_band_customer = $request->apply_for_band_customer;
    //     $ticketConfig->public_app = $request->public_app;
    //     $ticketConfig->emp_to_close_json = json_encode(is_array($request->emp_to_close_json)?$request->emp_to_close_json:array());
    //     $ticketConfig->emp_to_revoke_json = json_encode(is_array($request->emp_to_revoke_json)?$request->emp_to_revoke_json:array());
    //     $ticketConfig->emp_to_update_json = json_encode(is_array($request->emp_to_update_json)?$request->emp_to_update_json:array());
    //     $ticketConfig->emp_to_reopen_ticket = json_encode(is_array($request->emp_to_reopen_ticket)?$request->emp_to_reopen_ticket:array());
    //     $ticketConfig->emp_to_report_ticket = json_encode(is_array($request->emp_to_report_ticket)?$request->emp_to_report_ticket:array());
    //     $ticketConfig->emp_to_tag_ticket = json_encode(is_array($request->emp_to_tag_ticket)?$request->emp_to_tag_ticket:array());
    //     $ticketConfig->archive_btn = $request->archive_btn;
    //     $ticketConfig->joblic_btn = $request->joblic_btn;
    //     $ticketConfig->apps_btn = $request->apps_btn;
    //     $ticketConfig->id = $request->id;
    //     $ticketConfig->fk_i_updated_by = Auth()->user()->id;
    //     $res=$ticketConfig->save();
    //     if ($res) {

    //         return response()->json(['success'=>'تمت العملية بنجاح']);
    //     }

    //     return response()->json(['error'=>'حدث خطأ غير متوقع']);
    // }
    
    public function WaterSubscription()
    { 
        $subsList=Constant::where('parent',39)->where('status',1)->get();
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'WaterSubscription';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=1;
        return view('portal.water_ticket.subscription', compact('type','ticketInfo','subsList','region','app_type','app_no'));
    }
    public function WaterNewTicket3()
    {
        $type = 'WaterSubscription';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        return view('portal.water_ticket.subscription', compact('type','ticketInfo','app_type'));
    }
    public function waterLineDisconnect()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waterLineDisconnect';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=7;
        return view('portal.water_ticket.disconnect', compact('type','ticketInfo','region','app_type','app_no'));
    }
    public function globalWaterMalfunction()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'globalWaterMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=4;
        return view('portal.water_ticket.globalMalfunction', compact('type','ticketInfo','region','app_type','app_no'));
    }
    public function waterMalfunction()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waterMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=2;
        return view('portal.water_ticket.malfunction', compact('type','ticketInfo','region','app_type','app_no'));
    }
    public function meterCheck()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waterMeterCheck';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=5;
        return view('portal.water_ticket.meterCheck', compact('type','ticketInfo','region','app_type','app_no'));
    }
    public function meterRead()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waterMeterRead';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=9;
        return view('portal.water_ticket.meterRead', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function waterPermission()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waterPermission';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $app_type=2;
        $fees=$this->fees;
        return view('portal.water_ticket.permission', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function waterLineReconnect()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waterLineReconnect';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=7;
        return view('portal.water_ticket.reconnect', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function disconnect()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'reconnect';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.water_ticket.disconnect', compact('type','ticketInfo','region','app_type'));
    }
    public function waiveSubscription ()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waiveWaterSubscription';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=8;
        return view('portal.water_ticket.waiveSubscription', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function meterTransfer()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waterMeterTransfer';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=10;
        return view('portal.water_ticket.meterTransfer', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function waterFinancialTransfer()
    {
        $type = 'waterFinancialTransfer';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $app_type=2;
        // $fees=$this->fees;
        $app_no=11;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.water_ticket.FinancialTransfer', compact('type','ticketInfo','app_type','app_no'));
    }

}
