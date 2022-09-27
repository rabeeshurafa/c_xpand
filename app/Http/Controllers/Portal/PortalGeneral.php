<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Constant;
use App\Models\Region;
use App\Models\ArchiveRole;
use App\Models\Setting;
use DB;
class PortalGeneral extends Controller{
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
        // $department=Department::where('enabled',1)->get();
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        // $fees=$this->fees;
        $app_no=32;
        return view('portal.generalRequest_Tickts.vacationRequest', compact('type','ticketInfo','vacTypes','app_no'));
    }
    public function leavePermission()
    {
        $type = 'leavePermission';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        $vacTypes=Constant::where('parent',6055)->where('status',1)->get();
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        // $fees=$this->fees;
        $app_no=28;
        return view('portal.generalRequest_Tickts.leavePermission', compact('type','ticketInfo','vacTypes','app_no'));
    }
    public function collecting()
    {
        $type = 'collecting';
        $setting = Setting::first();        
        $region=Region::where('town_id',$setting->town_id)->get();
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        // $fees=$this->fees;
        $app_no=29;
        return view('portal.generalRequest_Tickts.collecting', compact('type','ticketInfo','region','app_no'));
    }
    public function requestSpareParts()
    {
        $type = 'requestSpareParts';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        // $fees=$this->fees;
        $app_no=33;
        return view('portal.generalRequest_Tickts.requestSpareParts', compact('type','ticketInfo','app_no'));
    }
    public function PurchaseOrder()
    {
        $type = 'PurchaseOrder';
        $ticketInfo=$this->loadDefaul($type);
        // $department=Department::where('enabled',1)->get();
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        // $fees=$this->fees;
        $app_no=31;
        return view('portal.generalRequest_Tickts.purchaseOrder', compact('type','ticketInfo','app_no'));
    }
    public function networkDevelopment()
    {
        $type = 'networkDevelopment';
        $ticketInfo=$this->loadDefaul($type);
        $networkTypes=Constant::where('parent',6058)->where('status',1)->get();
        // $department=Department::where('enabled',1)->get();
        $setting = Setting::first();         $region=Region::where('town_id',$setting->town_id)->get();
        // $archive_config = ArchiveRole::where('empid', Auth()->user()->id)->where('type', $type)->get();
        // $fees=$this->fees;
        $app_no=30;
        return view('portal.generalRequest_Tickts.networkDevelopment', compact('type','ticketInfo','region','networkTypes','app_no'));
    }
}
