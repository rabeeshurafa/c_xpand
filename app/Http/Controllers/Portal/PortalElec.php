<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Region;
use App\Models\Constant;
use DB;
use App\Models\ArchiveRole;

class PortalElec extends Controller
{
    
    var $fees=array();
    
    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        $ticket=TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        $department=Department::where('enabled','=','1')->get();
        $this->fees=DB::select("select fees_json from app_ticket".$ticket->ticket_no."s where app_type=".$ticket->app_type." order by id desc limit 1");
        return $ticket;
        
    }
    public function newTicket37()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'newTicket37';
        $ticketTypeList = Constant::where('parent',6011)->where('status',1)->get();
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=12;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.ticket37', compact('type','region','ticketInfo','ticketTypeList','app_type','app_no'));
    }
    public function newTicket16()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'newTicket16';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=13;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.ticket16', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function newTicket27()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'newTicket27';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $fixTypeList = Constant::where('parent',6064)->where('status',1)->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=14;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.ticket27', compact('type','region','ticketInfo','app_type','fixTypeList','app_no'));
    }
    public function newTicket29()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'newTicket29';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=15;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.ticket29', compact('type','region','subsList','ticketInfo','app_type','app_no'));
    }
    public function newTicket36()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'newTicket36';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=16;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.ticket36', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function newTicket39()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'newTicket39';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=17;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.ticket39', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function elecSubscription()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $subsList=Constant::where('parent',6032)->get();
        $type = 'elecSubscription';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        $app_no=1;
        return view('portal.services.subscription', compact('type','region','ticketInfo','app_type','subsList','app_no'));
    }
    public function elecLineDisconnect()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'elecLineDisconnect';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=6;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.disconnect', compact('type','region','ticketInfo','app_type','subsList','app_no'));
    }
    public function globalelecMalfunction()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'globalelecMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=4;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.globalMalfunction', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function elecMalfunction()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'elecMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=2;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.malfunction', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function elecMeterCheck()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'elecMeterCheck';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=5;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.meterCheck', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function elecMeterRead()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'elecMeterRead';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=9;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.meterRead', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function elecPermission()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'elecPermission';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        return view('portal.services.permission', compact('type','region','ticketInfo','app_type'));
    }
    public function elecLineReconnect()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'elecLineReconnect';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=7;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.reconnect', compact('type','region','ticketInfo','app_type','subsList','app_no'));
    }
    public function disconnect()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'reconnect';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        return view('portal.services.disconnect', compact('type','region','ticketInfo','app_type','subsList'));
    }
    public function waiveelecSubscription()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'waiveelecSubscription';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=8;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.waiveSubscription', compact('type','region','ticketInfo','app_type','app_no'));
    }
    public function elecMeterTransfer()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'elecMeterTransfer';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=10;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.meterTransfer', compact('type','region','ticketInfo','app_type','subsList','app_no'));
    }
    public function elecFinancialTransfer()
    {
        $setting = Setting::first();
        $region=Region::where('town_id',$setting->town_id)->get();
        $type = 'elecFinancialTransfer';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        // $fees=$this->fees;
        $app_no=11;
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        return view('portal.services.FinancialTransfer', compact('type','region','ticketInfo','app_type','app_no'));
    }

}
