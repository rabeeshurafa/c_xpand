<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Region;
use App\Models\Constant;
use App\Models\Orgnization;
use App\Models\ArchiveRole;
use App\Models\Setting;
use App\Models\AppTicket19;
use App\Models\AppTicket18;
use App\Models\AppTicket21;
use DB;

class BuildingTicketController extends Controller{


    var $fees=array();

    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::where('enabled',1)->get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
        
    }
    public function straightening()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'straightening';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=20;
        return view('dashboard.building_ticket.straightening', compact('type','region','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function ownershipTransfer()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'ownershipTransfer';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=35;
        return view('dashboard.building_ticket.ownershipTransfer', compact('type','region','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function retrieveLic()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'retrieveLic';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=26;
        return view('dashboard.building_ticket.retrieve_lic', compact('type','region','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function licenseFile()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Constant::where('parent',6084)->where('status',1)->get();
        $type = 'licenseFile';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        
        $tickettemp=AppTicket19::orderBy('id', 'desc')->first();
        if($tickettemp!=null){
            $attatches=json_decode($tickettemp->attatchName);
        }else{
            $attatches=array();
        }
        $attachesCount=sizeof($attatches);
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=19;
        return view('dashboard.building_ticket.licenseFile', compact('type','buildingTypeList','region','officeAreaList','ticketInfo','department','fees','archive_config','app_no','attatches','attachesCount'));
    }
    public function buildingLicense()
    {
        $setting = Setting::first();        
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'buildingLicense';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $buildingStatusList = Constant::where('parent',6014)->where('status',1)->get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Constant::where('parent',6084)->where('status',1)->get();
        $app_type=3;
        $fees=$this->fees;
        $allAttatches=AppTicket18::orderBy('id', 'desc')->first();
        if($allAttatches!=null){
            $docs1=json_decode($allAttatches->docs1);
            $docs2=json_decode($allAttatches->docs2);
            $docs3=json_decode($allAttatches->docs3);
        }else{
            $docs1=array();
            $docs2=array();
            $docs3=array();
        }
        $docs1Count=sizeof($docs1);
        $docs2Count=sizeof($docs2);
        $docs3Count=sizeof($docs3);
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=18;
        return view('dashboard.building_ticket.buildingLicense', compact('docs1Count','docs2Count','docs3Count','docs1','docs2','docs3','type','app_type','officeAreaList','buildingStatusList'
        ,'buildingTypeList','region','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function sitePlan()
    {
        $type = 'sitePlan';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $ticketTemp=AppTicket21::orderBy('id', 'desc')->first();
        if($ticketTemp!=null){
            $attatches=json_decode($ticketTemp->attatchName);
        }else{
            $attatches=array();
        }
        $attachesCount=sizeof($attatches);
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=21;
        return view('dashboard.building_ticket.sitePlan', compact('type','ticketInfo','department','fees','archive_config','app_no','attatches','attachesCount'));
    }
    public function engineeringValidation()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Constant::where('parent',6084)->where('status',1)->get();
        $type = 'engineeringValidation';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=22;
        return view('dashboard.building_ticket.engineeringValidation', compact('type','region','officeAreaList','buildingTypeList','ticketInfo','department','fees','archive_config','app_no'));
    }


}
