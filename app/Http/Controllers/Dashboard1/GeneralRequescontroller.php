<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;

class GeneralRequescontroller extends Controller{

    function loadDefaul($type=''){
        $screen=Menu::where('s_function_url','=',$type)->get()->first();
        // dd($screen);
        $department=Department::get();
        
        return TicketConfig::where('id','=',$screen->pk_i_id)->with('Admin')->get()->first();
        
    }

    public function vacationRequest()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'vacationRequest';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        return view('dashboard.generalRequest_Tickts.vacationRequest', compact('type','ticketInfo','department'));
    }
    public function leavePermission()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'leavePermission';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        return view('dashboard.generalRequest_Tickts.leavePermission', compact('type','ticketInfo','department'));
    }
    public function collecting()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'collecting';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        return view('dashboard.generalRequest_Tickts.collecting', compact('type','ticketInfo','department'));
    }
    public function requestSpareParts()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'requestSpareParts';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        return view('dashboard.generalRequest_Tickts.requestSpareParts', compact('type','ticketInfo','department'));
    }
    public function PurchaseOrder()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'PurchaseOrder';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        return view('dashboard.generalRequest_Tickts.purchaseOrder', compact('type','ticketInfo','department'));
    }
    public function networkDevelopment()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'networkDevelopment';
        $ticketInfo=$this->loadDefaul($type);
        // dd($ticketInfo);
        $department=Department::get();
        return view('dashboard.generalRequest_Tickts.networkDevelopment', compact('type','ticketInfo','department'));
    }
}
