<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Constant;
use App\Models\Orgnization;
use App\Models\Region;
use DB;

class OutspreadTaskController extends Controller{



    var $fees=array();

    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
        
    }

    public function outspreadTasks()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $ticketTypeList = Constant::where('parent',6029)->where('status',1)->get();
        $region=Region::get();
        $type = 'outspreadTasks';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.outspreadTasks.outspreadTask',  compact('type','ticketTypeList','region','ticketInfo','department','fees'));
    }
    public function quittance()
    {
        $resonTypeList = Constant::where('parent',6033)->where('status',1)->get();
        $type = 'quittance';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.outspreadTasks.quittance',  compact('type','resonTypeList','ticketInfo','department','fees'));
    }
    public function publicComplaint()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'publicComplaint';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.outspreadTasks.publicComplaint', compact('type','ticketInfo','department','fees'));
    }
    public function citizenComplaint()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'citizenComplaint';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        $fees=$this->fees;
        return view('dashboard.outspreadTasks.citizenComplaint', compact('type','ticketInfo','department','fees'));
    }
}
