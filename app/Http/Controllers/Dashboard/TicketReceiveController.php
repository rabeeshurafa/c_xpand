<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


class TicketReceiveController extends Controller
{
    public function receive()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'receive';
        return view('dashboard.ticketRecive.index', compact('type'));
    }
}
