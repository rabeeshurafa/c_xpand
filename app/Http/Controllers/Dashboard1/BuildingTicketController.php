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
use DB;

class BuildingTicketController extends Controller{


    var $fees=array();

    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
        
    }
    public function straightening()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'straightening';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.building_ticket.straightening', compact('type','region','ticketInfo','department','fees'));
    }
    public function retrieveLic()
    {
        $region=Region::get();
        $type = 'retrieveLic';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.building_ticket.retrieve_lic', compact('type','region','ticketInfo','department','fees'));
    }
    public function licenseFile()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
        
        $type = 'licenseFile';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.building_ticket.licenseFile', compact('type','buildingTypeList','region','officeAreaList','ticketInfo','department','fees'));
    }
    public function buildingLicense()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $type = 'buildingLicense';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $buildingStatusList = Constant::where('parent',6014)->where('status',1)->get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
        $app_type=3;
        $fees=$this->fees;
        return view('dashboard.building_ticket.buildingLicense', compact('type','app_type','officeAreaList','buildingStatusList','buildingTypeList','region','ticketInfo','department','fees'));
    }
    public function sitePlan()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'sitePlan';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.building_ticket.sitePlan', compact('type','ticketInfo','department','fees'));
    }
    public function engineeringValidation()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $region=Region::get();
        $buildingTypeList = Constant::where('parent',6016)->where('status',1)->get();
        $officeAreaList = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
        $type = 'engineeringValidation';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.building_ticket.engineeringValidation', compact('type','region','officeAreaList','buildingTypeList','ticketInfo','department','fees'));
    }


}
