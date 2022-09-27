<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;

class CounterReadReport extends Controller
{

    public function index()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'counterReadReport';

        return view('dashboard.archive.counterReadReport', compact('type'));
    }

}
