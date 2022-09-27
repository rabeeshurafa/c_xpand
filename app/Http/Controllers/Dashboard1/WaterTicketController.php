<?php

namespace App\Http\Controllers\Dashboard;

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
use DB;


class WaterTicketController extends Controller
{
    var $app_type=1;
    var $fees=array();

    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
        
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
        }

        //$html = view('dashboard.component.auto_complete', compact('names'))->render();

        //dd($names);

        return response()->json($names[0]);

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
            return response()->json($all_files);

        }

    }

    public function store_config(Request $request){
        $ticketConfig = TicketConfig::find($request->id);
        $ticketConfig->single_receive = $request->single_receive;
        $ticketConfig->show_receipt = $request->show_receipt;
        $ticketConfig->receipt_is_need = $request->receipt_is_need;
        $ticketConfig->has_price_list = $request->has_price_list;
        $ticketConfig->dept_id = $request->dept_id;
        $ticketConfig->send_sms = $request->send_sms;
        $ticketConfig->emp_to_receive = $request->reciver;
        $ticketConfig->time_to_close = $request->time_to_close;
        $ticketConfig->has_clearance = $request->has_clearance;
        $ticketConfig->has_attach = $request->has_attach;
        $ticketConfig->has_debt_list = $request->has_debt_list;
        $ticketConfig->force_attach = $request->force_attach;
        $ticketConfig->show_archive = $request->show_archive;
        $ticketConfig->apply_with_finished_license = $request->apply_with_finished_license;
        $ticketConfig->apply_for_band_customer = $request->apply_for_band_customer;
        $ticketConfig->public_app = $request->public_app;
        $ticketConfig->emp_to_close_json = json_encode(is_array($request->emp_to_close_json)?$request->emp_to_close_json:array());
        $ticketConfig->emp_to_revoke_json = json_encode(is_array($request->emp_to_revoke_json)?$request->emp_to_revoke_json:array());
        $ticketConfig->emp_to_update_json = json_encode(is_array($request->emp_to_update_json)?$request->emp_to_update_json:array());
        $ticketConfig->emp_to_reopen_ticket = json_encode(is_array($request->emp_to_reopen_ticket)?$request->emp_to_reopen_ticket:array());
        $ticketConfig->emp_to_report_ticket = json_encode(is_array($request->emp_to_report_ticket)?$request->emp_to_report_ticket:array());
        $ticketConfig->archive_btn = $request->archive_btn;
        $ticketConfig->joblic_btn = $request->joblic_btn;
        $ticketConfig->apps_btn = $request->apps_btn;
        $ticketConfig->id = $request->id;
        $ticketConfig->fk_i_updated_by = Auth()->user()->id;
        $res=$ticketConfig->save();
        if ($res) {

            return response()->json(['success'=>'تمت العملية بنجاح']);
        }

        return response()->json(['error'=>'حدث خطأ غير متوقع']);
    }
    
    public function WaterSubscription()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $subsList=Constant::where('parent',39)->where('status',1)->get();
        $region=Region::get();
        $type = 'WaterSubscription';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.subscription', compact('type','ticketInfo','department','subsList','region','app_type','fees'));
    }
    public function WaterNewTicket3()
    {
        $type = 'WaterSubscription';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.subscription', compact('type','ticketInfo','department','app_type','fees'));
    }
    public function waterLineDisconnect()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waterLineDisconnect';
        $ticketInfo=$this->loadDefaul($type);
        //dd($ticketInfo);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.disconnect', compact('type','ticketInfo','region','department','app_type','fees'));
    }
    public function globalWaterMalfunction()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'globalWaterMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.globalMalfunction', compact('type','ticketInfo','department','region','app_type','fees'));
    }
    public function waterMalfunction()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waterMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.malfunction', compact('type','ticketInfo','department','region','app_type','fees'));
    }
    public function meterCheck()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waterMeterCheck';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.meterCheck', compact('type','ticketInfo','region','department','app_type','fees'));
    }
    public function meterRead()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waterMeterRead';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.meterRead', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function waterPermission()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waterPermission';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.permission', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function waterLineReconnect()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waterLineReconnect';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.reconnect', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function disconnect()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'reconnect';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.disconnect', compact('type','ticketInfo','region','department','app_type','fees'));
    }
    public function waiveSubscription ()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waiveWaterSubscription';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.waiveSubscription', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function meterTransfer()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'waterMeterTransfer';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.meterTransfer', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function waterFinancialTransfer()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'waterFinancialTransfer';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $app_type=2;
        $fees=$this->fees;
        return view('dashboard.water_ticket.FinancialTransfer', compact('type','ticketInfo','department','app_type','fees'));
    }

}
