<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Constant;
use App\Models\Orgnization;
use App\Models\Region;
use App\Models\ArchiveRole;
use DB;
use App\Models\Setting;
class OutspreadTaskController extends Controller{



    var $fees=array();

    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::where('enabled',1)->get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
    }

    public function outspreadTasks()
    {
        $ticketTypeList = Constant::where('parent',6029)->where('status',1)->get();
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'outspreadTasks';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=23;
        return view('dashboard.outspreadTasks.outspreadTask',  compact('type','ticketTypeList','region','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function quittance()
    {
        $resonTypeList = Constant::where('parent',6033)->where('status',1)->get();
        $type = 'quittance';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=27;
        return view('dashboard.outspreadTasks.quittance',  compact('type','resonTypeList','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function innerQuittance()
    {
        $resonTypeList = Constant::where('parent',6033)->where('status',1)->get();
        $type = 'innerQuittance';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=36;
        return view('dashboard.outspreadTasks.innerQuittance',  compact('type','resonTypeList','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function publicComplaint()
    {
        $type = 'publicComplaint';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=24;
        return view('dashboard.outspreadTasks.publicComplaint', compact('type','ticketInfo','department','fees','archive_config','app_no'));
    }
    public function citizenComplaint()
    {
        $type = 'citizenComplaint';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $fees=$this->fees;
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=25;
        return view('dashboard.outspreadTasks.citizenComplaint', compact('type','ticketInfo','department','fees','archive_config','app_no'));
    }
}
