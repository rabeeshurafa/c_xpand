<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Daily_work;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Reporth extends Controller{
    public function index(){
        $type="reporth_view";
        return view('dashboard.reports.reporth',compact('type'));
    }
}