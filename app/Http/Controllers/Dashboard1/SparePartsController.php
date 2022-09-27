<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\sparePartsRequest;
use App\Models\Department;
use App\Models\Orgnization;
use App\Models\spare_part;
use App\Models\SpecialAsset;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SparePartsController extends Controller

{

    public function spareParts()
    {

        $type = 'spareParts';
        $departments = Department::where('enabled',1)->get();
        $Warehouses = SpecialAsset::where('type', 'warehouses')->where('enabled',1)->get();
        $suppliers = Orgnization::where('org_type', 'suppliers')->where('enabled',1)->get();

        return view('dashboard.spareParts.index', compact('type', 'departments', 'Warehouses', 'suppliers'));
    }
    public function store_spareParts(sparePartsRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        if ($request->sparePartID == 0) {
            $sparePart = new spare_part();

            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'sparePart_');
            } else {
                $path = '';
            }

            $sparePart->name = $request->ProductName;
            $sparePart->barcode = $request->Parcode;
            $sparePart->storehouse = $request->Warehouse;
            $sparePart->quantity = $request->Quantity;
            $sparePart->image = url($path);
            $sparePart->brand = $request->brand;
            $sparePart->dept_id = $request->Department;
            $sparePart->supp_id = $request->Supplier;
            $sparePart->purchasing_price = $request->Purechase;
            $sparePart->purchasing_cur = $request->PureCurrID;
            $sparePart->selling_price = $request->Sale;
            $sparePart->selling_cur = $request->SaleCurrID;
            $sparePart->url = 'sparePart';
            $sparePart->added_by = Auth()->user()->id;
            $sparePart->save();
        } else {
            $sparePart = spare_part::find($request->sparePartID);
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'sparePart_');
            } else {
                $path = '';
            }

            $sparePart->name = $request->ProductName;
            $sparePart->barcode = $request->Parcode;
            $sparePart->storehouse = $request->Warehouse;
            $sparePart->quantity = $request->Quantity;
            $sparePart->image = url($path);
            $sparePart->brand = $request->brand;
            $sparePart->dept_id = $request->Department;
            $sparePart->supp_id = $request->Supplier;
            $sparePart->purchasing_price = $request->Purechase;
            $sparePart->purchasing_cur = $request->PureCurrID;
            $sparePart->selling_price = $request->Sale;
            $sparePart->selling_cur = $request->SaleCurrID;
            $sparePart->url = 'sparePart';
            $sparePart->added_by = Auth()->user()->id;
            $sparePart->save();
        }

        DB::commit();
        if ($sparePart) {

            return response()->json(['success' => 'تم اضافة قطع الغيار بنجاح']);
        }

        return response()->json(['error' => $sparePart->errors()->all()]);
    }

    public function spare_delete(Request $request)
    {
        // dd($request->all());
        $spare= spare_part::find($request['spare_id']);
        $spare->deleted_by = Auth()->user()->id;
        $spare->enabled=0;
        // dd($user->all());
        $spare->save();
        if ($spare) {

            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function sparePart_auto_complete(Request $request)
    {
        $vol_data = $request['term'];
        $names = spare_part::where('name', 'like', '%' . $vol_data . '%')->where('enabled',1)->select('*', 'name as label')->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }

    public function sparePart_info(Request $request)
    {
        // dd($request->all());
        $sparepart['info'] = spare_part::find($request['sparePart_id']);
        $purchasing_cur = $sparepart['info']->purchasing_cur;
        if ($purchasing_cur == 1) {
            $sparepart['info']->purchasing_cur = 'شيكل';
        } elseif ($purchasing_cur == 2) {
            $sparepart['info']->purchasing_cur = 'دولار';
        } elseif ($purchasing_cur == 3) {
            $sparepart['info']->purchasing_cur = 'دينار';
        } elseif ($purchasing_cur == 4) {
            $sparepart['info']->purchasing_cur = 'يورو';
        }

        $selling_cur = $sparepart['info']->selling_cur;
        if ($selling_cur == 1) {
            $sparepart['info']->selling_cur = 'شيكل';
        } elseif ($selling_cur == 2) {
            $sparepart['info']->selling_cur = 'دولار';
        } elseif ($selling_cur == 3) {
            $sparepart['info']->selling_cur = 'دينار';
        } elseif ($selling_cur == 4) {
            $sparepart['info']->selling_cur = 'يورو';
        }

        $sparepart['info']->dept_name = Department::where('id', $sparepart['info']->dept_id)->first()->name ?? '';
        $sparepart['info']->supp_name = Orgnization::where('id', $sparepart['info']->supp_id)->first()->name ?? '';
        $sparepart['info']->storehouse_name = SpecialAsset::where('id', $sparepart['info']->storehouse)->first()->name ?? '';

        return response()->json($sparepart);
    }

    public function sparePart_info_all()
    {
        $sparepart = spare_part::select('spare_parts.*')
            ->orderBy('id', 'DESC')->where('enabled',1)->with('department')->with('storehouse')->with('supplier')->get();

        return DataTables::of($sparepart)
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
