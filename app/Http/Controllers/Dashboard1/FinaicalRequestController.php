<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;

class FinaicalRequestController extends Controller
{
    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        // dd($screen);
        $department=Department::get();
        
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
        $department=Department::get();
        return view('dashboard.finaicalRequest.index', compact('type','ticketInfo','department'));
    }
    
    public function financialReport()
    {
        $type = 'financialReport';
        return view('dashboard.finaicalRequest.financialReport', compact('type'));
    }
}
