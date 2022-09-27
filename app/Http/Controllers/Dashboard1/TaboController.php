<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


class TaboController extends Controller
{

    public function taboDataIndex()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'taboData';
        return view('dashboard.tabo.tabo_data', compact('type'));
    }
    public function taboExcelIndex()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::get();
        $type = 'taboExcel';
        return view('dashboard.tabo.tabo_excel', compact('type'));
    }
}