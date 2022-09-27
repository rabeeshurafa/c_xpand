<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\City;

use App\Models\Admin;

use App\Models\Town;

use App\Models\User;

use App\Models\Department;

use App\Models\TaboData;

use App\Models\TaboExcel;

use Yajra\DataTables\DataTables;

use App\Http\Requests\ExtentionRequest;



class TaboController extends Controller

{
    public function getTaboData(Request $request)
    {
        $tabo= TaboData::orderBy('id', 'DESC')->get();

        return DataTables::of($tabo)
                        ->addIndexColumn()
                        ->make(true);
    }
    public function taboDataIndex(Request $request)
    {
        $type = 'taboData';
        return view('dashboard.tabo.tabo_data', compact('type'));

    }
    public function taboExcelIndex(Request $request)
    {
                $type = 'taboExcel';

        return view('dashboard.tabo.tabo_excel', compact('type'));

    }
    public function saveNewData(Request $request)
    {
        
        $taboData=new TaboData();
        $taboData->excel_id =$request->hodId;
        $taboData->temp_no =$request->partTemp;
        $taboData->owner_name =$request->NameAR;
        $taboData->area =$request->area;
        $taboData->final_no =$request->partFinal;
        $taboData->phoneNo =$request->phone;
        $taboData->nationality =$request->nationality;
        $taboData->notes =$request->notes;
        $taboData->save();
        return $taboData->id;
        
    }

}

