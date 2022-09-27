<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\sparePartsRequest;
use App\Models\Department;
use App\Models\Orgnization;
use App\Models\Medicine;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Constant;

class MedicineController extends Controller

{

    public function medicines()
    {

        $type = 'medicines';
        // $departments = Department::get();
        $suppliers = Orgnization::where('org_type', 'orginzation')->orWhere('org_type','hospital')->get();
        $treatment = Constant::where('parent',6026)->where('status',1)->get();
        $dosage = Constant::where('parent',6025)->where('status',1)->get();
        return view('dashboard.medicine.index', compact('type','suppliers','treatment','dosage'));
    }
    
    public function medicine_delete(Request $request)
    {
        // dd($request->all());
        $medicine= Medicine::find($request['med_id']);
        $medicine->deleted_by = Auth()->user()->id;
        $medicine->enabled=0;
        // dd($user->all());
        $medicine->save();
        if ($medicine) {

            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }
    
    public function store_medicines(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        if ($request->sparePartID == 0) {
            $medicine = new Medicine();

            $medicine->name = $request->ProductName;
            $medicine->scientific_name = $request->scientificName;
            $medicine->alternative_1 = $request->alternative1;
            $medicine->alternative_2 = $request->alternative2;
            $medicine->treatment = $request->treatment;
            $medicine->dosage = $request->dosage;
            $medicine->supp_id = $request->Supplier;
            $medicine->purchasing_price = $request->Purechase;
            $medicine->purchasing_cur = $request->PureCurrID;
            $medicine->url = 'medicines';
            $medicine->added_by = Auth()->user()->id;
            $medicine->save();
        } else {
            $medicine = Medicine::find($request->sparePartID);

            $medicine->name = $request->ProductName;
            $medicine->scientific_name = $request->scientificName;
            $medicine->alternative_1 = $request->alternative1;
            $medicine->alternative_2 = $request->alternative2;
            $medicine->treatment = $request->treatment;
            $medicine->dosage = $request->dosage;
            $medicine->supp_id = $request->Supplier;
            $medicine->purchasing_price = $request->Purechase;
            $medicine->purchasing_cur = $request->PureCurrID;
            $medicine->url = 'medicines';
            $medicine->added_by = Auth()->user()->id;
            $medicine->save();
        }

        DB::commit();
        if ($medicine) {

            return response()->json(['success' => 'تم اضافة قطع الغيار بنجاح']);
        }

        return response()->json(['error' => $medicine->errors()->all()]);
    }

    public function medicine_auto_complete(Request $request)
    {
        $vol_data = $request['term'];
        $names = Medicine::where('name', 'like', '%' . $vol_data . '%')->select('*', 'name as label')->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }

    public function medicine_info(Request $request)
    {
        // dd($request->all());
        $medicine['info'] = Medicine::where('id',$request['med_id'])->with('dos')->first();
        // dd($medicine['info']);
        $purchasing_cur = $medicine['info']->purchasing_cur;
        if ($purchasing_cur == 1) {
            $medicine['info']->purchasing_cur = 'شيكل';
        } elseif ($purchasing_cur == 2) {
            $medicine['info']->purchasing_cur = 'دولار';
        } elseif ($purchasing_cur == 3) {
            $medicine['info']->purchasing_cur = 'دينار';
        } elseif ($purchasing_cur == 4) {
            $medicine['info']->purchasing_cur = 'يورو';
        }


        // $medicine['info']->dept_name = Department::where('id', $medicine['info']->dept_id)->first()->name ?? '';
        $medicine['info']->supp_name = Orgnization::where('id', $medicine['info']->supp_id)->first()->name ?? '';
        // $medicine['info']->storehouse_name = SpecialAsset::where('id', $medicine['info']->storehouse)->first()->name ?? '';

        return response()->json($medicine);
    }

    public function medicine_info_all()
    {
        $medicine = Medicine::orderBy('id', 'DESC')->where('enabled',1)->with('supplier')->get();

        return DataTables::of($medicine)
            ->addIndexColumn()
            ->make(true);
    }

    function upload_image($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $image = "storage/" . $imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}
