<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Constant;
use App\Models\AppTicket34;
use Yajra\DataTables\DataTables;

class FinaicalRequestController extends Controller
{
    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        // dd($screen);
        $department=Department::where('enabled',1)->get();
        
        return TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        
    }

    public function index()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'finaicalRequest';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $fin_desc_list = Constant::where('parent',6073)->where('status',1)->get();
        $department=Department::where('enabled',1)->get();
        return view('dashboard.finaicalRequest.index', compact('type','fin_desc_list','ticketInfo','department'));
    }
    
    public function financial_info_all()
    {
        $financial = AppTicket34::select('app_ticket34s.*', 't_constant.name as fin_desc_name','admins.nick_name as created_by_name')
        ->leftJoin('t_constant', 't_constant.id', 'app_ticket34s.fin_desc')
        ->leftJoin('admins', 'admins.id', 'app_ticket34s.created_by')
        ->orderBy('id', 'DESC')->get();

        return DataTables::of($financial)->addIndexColumn()->make(true);

    }
    
    public function financialReport()
    {
        $type = 'financialReport';
        return view('dashboard.finaicalRequest.financialReport', compact('type'));
    }
}
