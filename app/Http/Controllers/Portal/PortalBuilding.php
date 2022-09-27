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
use DB;

class PortalBuilding extends Controller{


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
        // $department=Department::where('enabled',1)->get();
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=20;
        return view('dashboard.building_ticket.straightening', compact('type','region','app_no','ticketInfo'));
    }
    public function ownershipTransfer()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'ownershipTransfer';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=35;
        return view('dashboard.building_ticket.ownershipTransfer', compact('type','region','app_no','ticketInfo'));
    }
    public function retrieveLic()
    {
        $setting = Setting::first();         
        // $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'retrieveLic';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=26;
        return view('dashboard.building_ticket.retrieve_lic', compact('type','region','app_no','ticketInfo'));
    }
    public function licenseFile()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Constant::where('parent',6084)->where('status',1)->get();
        $type = 'licenseFile';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=19;
        return view('dashboard.building_ticket.licenseFile', compact('type','buildingTypeList','region','officeAreaList','ticketInfo','app_no','ticketInfo'));
    }
    public function buildingLicense()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'buildingLicense';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $buildingStatusList = Constant::where('parent',6014)->where('status',1)->get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Constant::where('parent',6084)->where('status',1)->get();
        $app_type=3;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=18;
        return view('dashboard.building_ticket.buildingLicense', compact('type','app_type','officeAreaList','buildingStatusList','buildingTypeList','region','app_no','ticketInfo'));
    }
    public function sitePlan()
    {
        $type = 'sitePlan';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=21;
        return view('dashboard.building_ticket.sitePlan', compact('type','app_no','ticketInfo'));
    }
    public function engineeringValidation()
    {
        $setting = Setting::first();         
        $region=Region::where('town_id',$setting->town_id)->get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Constant::where('parent',6084)->where('status',1)->get();
        $type = 'engineeringValidation';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=22;
        return view('dashboard.building_ticket.engineeringValidation', compact('type','region','officeAreaList','buildingTypeList','app_no','ticketInfo'));
    }


}
