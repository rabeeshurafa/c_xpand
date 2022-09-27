<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Region;
use App\Models\Constant;
use DB;

class elecTicketController extends Controller
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
        $region=Region::get();
        $type = 'newTicket37';
        $ticketTypeList = Constant::where('parent',6011)->where('status',1)->get();
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.ticket37', compact('type','region','ticketInfo','ticketTypeList','department','app_type','fees'));
    }
    public function newTicket16()
    {
        $region=Region::get();
        $type = 'newTicket16';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.ticket16', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function newTicket27()
    {
        $region=Region::get();
        $type = 'newTicket27';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.ticket27', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function newTicket29()
    {
        $region=Region::get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'newTicket29';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.ticket29', compact('type','region','subsList','ticketInfo','department','app_type','fees'));
    }
    public function newTicket36()
    {
        $region=Region::get();
        $type = 'newTicket36';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.ticket36', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function newTicket39()
    {
        $region=Region::get();
        $type = 'newTicket39';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.ticket39', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function elecSubscription()
    {
        $region=Region::get();
        $subsList=Constant::where('parent',6032)->get();
        $type = 'elecSubscription';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.subscription', compact('type','region','ticketInfo','department','app_type','subsList','fees'));
    }
    public function elecLineDisconnect()
    {
        $region=Region::get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'elecLineDisconnect';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.disconnect', compact('type','region','ticketInfo','department','app_type','subsList','fees'));
    }
    public function globalelecMalfunction()
    {
        $region=Region::get();
        $type = 'globalelecMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.globalMalfunction', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function elecMalfunction()
    {
        $region=Region::get();
        $type = 'elecMalfunction';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.malfunction', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function elecMeterCheck()
    {
        $region=Region::get();
        $type = 'elecMeterCheck';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.meterCheck', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function elecMeterRead()
    {
        $region=Region::get();
        $type = 'elecMeterRead';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.meterRead', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function elecPermission()
    {
        $region=Region::get();
        $type = 'elecPermission';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.permission', compact('type','region','ticketInfo','department','app_type','fees'));
    }
    public function elecLineReconnect()
    {
        $region=Region::get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'elecLineReconnect';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.reconnect', compact('type','region','ticketInfo','department','app_type','subsList','fees'));
    }
    public function disconnect()
    {
        $region=Region::get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'reconnect';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.disconnect', compact('type','region','ticketInfo','department','app_type','subsList','fees'));
    }
    public function waiveelecSubscription()
    {
        $region=Region::get();
        $type = 'waiveelecSubscription';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.waiveSubscription', compact('type','region','department','ticketInfo','app_type','fees'));
    }
    public function elecMeterTransfer()
    {
        $region=Region::get();
        $subsList=Constant::where('parent',39)->get();
        $type = 'elecMeterTransfer';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.meterTransfer', compact('type','region','ticketInfo','department','app_type','subsList','fees'));
    }
    public function elecFinancialTransfer()
    {
        $region=Region::get();
        $type = 'elecFinancialTransfer';
        $ticketInfo=$this->loadDefaul($type);
        $department=Department::where('enabled','=','1')->get();
        $app_type=1;
        $fees=$this->fees;
        return view('dashboard.services.FinancialTransfer', compact('type','region','ticketInfo','department','app_type','fees'));
    }

}
