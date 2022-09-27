<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Constant;
use App\Models\Region;
use App\Models\ArchiveRole;
use App\Models\Setting;
use App\Models\Vehicle;
use DB;
class GeneralRequescontroller extends Controller{
    var $fees=array();
    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        // dd($screen);
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::where('enabled',1)->get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
        
    }

    public function vacationRequest()
    {
        $type = 'vacationRequest';
        $ticketInfo=$this->loadDefaul($type);
        $vacTypes=Constant::where('parent',6060)->where('status',1)->get();
        $department=Department::where('enabled',1)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $fees=$this->fees;
        $app_no=32;
        return view('dashboard.generalRequest_Tickts.vacationRequest', compact('type','ticketInfo','department','vacTypes','archive_config','app_no','fees'));
    }
    public function leavePermission()
    {
        $type = 'leavePermission';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $vacTypes=Constant::where('parent',6055)->where('status',1)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $fees=$this->fees;
        $app_no=28;
        return view('dashboard.generalRequest_Tickts.leavePermission', compact('type','ticketInfo','department','vacTypes','archive_config','app_no','fees'));
    }
    public function collecting()
    {
        $type = 'collecting';
        $setting = Setting::first();         $region=Region::where('town_id',$setting->town_id)->get();
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $fees=$this->fees;
        $app_no=29;
        return view('dashboard.generalRequest_Tickts.collecting', compact('type','ticketInfo','department','region','archive_config','app_no','fees'));
    }
    public function requestSpareParts()
    {
        $type = 'requestSpareParts';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $fees=$this->fees;
        $app_no=33;
        return view('dashboard.generalRequest_Tickts.requestSpareParts', compact('type','ticketInfo','department','archive_config','app_no','fees'));
    }
    public function PurchaseOrder()
    {
        $type = 'PurchaseOrder';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $fees=$this->fees;
        $app_no=31;
        return view('dashboard.generalRequest_Tickts.purchaseOrder', compact('type','ticketInfo','department','archive_config','app_no','fees'));
    }
    public function networkDevelopment()
    {
        $type = 'networkDevelopment';
        $ticketInfo=$this->loadDefaul($type);
        $networkTypes=Constant::where('parent',6058)->where('status',1)->get();
        $department=Department::where('enabled',1)->get();
        $setting = Setting::first();         $region=Region::where('town_id',$setting->town_id)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $fees=$this->fees;
        $app_no=30;
        return view('dashboard.generalRequest_Tickts.networkDevelopment', compact('type','ticketInfo','department','region','networkTypes','archive_config','app_no','fees'));
    }
    public function vehicleMaintenance()
    {
        $type = 'vehicleMaintenance';
        $ticketInfo=$this->loadDefaul($type);
        $vehicles=Vehicle::where('enabled',1)->get();
        $department=Department::where('enabled',1)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $fees=$this->fees;
        $app_no=37;
        return view('dashboard.generalRequest_Tickts.vehicleMaintenance', compact('type','ticketInfo','department','archive_config','app_no','fees','vehicles'));
    }
    public function refueling()
    {
        $type = 'refueling';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled',1)->get();
        $vehicles=Vehicle::where('enabled',1)->get();
        $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $oilTypes=Constant::where('parent',6109)->where('status',1)->get();
        $oilmetrecies=Constant::where('parent',6268)->where('status',1)->get();
        $fees=$this->fees;
        $app_no=38;
        return view('dashboard.generalRequest_Tickts.refueling', compact('type','ticketInfo','department','archive_config','app_no','fees','oilTypes','oilmetrecies','vehicles'));
    }
}
