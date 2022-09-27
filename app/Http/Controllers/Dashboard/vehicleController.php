<?php



namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Department;

use App\Models\Admin;

use App\Models\Orgnization;

use App\Models\VehicleBrand;

use App\Models\VehicleType;

use App\Models\Vehicle;

use App\Http\Requests\VehcileRequest;

use Yajra\DataTables\DataTables;

use App\Models\Archive;

use App\Models\CopyTo;

use App\Models\linkedTo;

use App\Models\Constant;
use App\Models\File;
use App\Models\AgendaTopic;


class vehicleController extends Controller

{

    public function index(){

        $departments = Department::get();

        $sponsers = Orgnization::where('org_type','orginzation')->get();

        $suppliers = Orgnization::where('org_type','suppliers')->get();

        $admins = Admin::get();

        $vehicleBrands = Constant::where('parent',80)->where('status',1)->get();

        $vehicleTypes = Constant::where('parent',81)->where('status',1)->get();
        
        $oilTypes = Constant::where('parent',6109)->where('status',1)->get();

        $type = 'vehicle';

        return view('dashboard.vehicle.index',compact('departments','sponsers','suppliers','type'

        ,'admins','vehicleBrands','vehicleTypes','oilTypes'));

    }

    public function vehicle_delete(Request $request)
    {
        // dd($request->all());
        $vehicle= Vehicle::find($request['vehicle_id']);
        $vehicle->deleted_by = Auth()->user()->id;
        $vehicle->enabled=0;
        // dd($user->all());
        $vehicle->save();

        $archives=  Archive::where('model_id', $vehicle->id)->where('model_name', 'App\\Models\\Vehicle')->get();
        foreach($archives as $archive){
            $copyTo=CopyTo::where('archive_id',$archive->id)->get();
            foreach($copyTo as $copy){
                $copy->deleted_by = Auth()->user()->id;
                $copy->enabled = 0;
                $copy->save();
            }

            $archive->deleted_by = Auth()->user()->id;
            $archive->enabled=0;
            $archive->save();
        }

        $copyTo=CopyTo::where('model_id', $vehicle->id)->where('model_name', 'App\\Models\\Vehicle')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }

        if ($vehicle) {
            return response()->json(['success'=>trans('admin.subscriber_added')]);
    
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    
    }

    public function store_vehcile(VehcileRequest $request){



        if($request->vehicle_id == null){

            $vehicle = new Vehicle();

            if ($request->file('imgPic')) {

                $path = upload_image($request->file('imgPic'), 'Vehicle_');

            }else{

                $path = '';

            }

            $vehicle->add_by = Auth()->user()->id;

            $vehicle->url = "vehicles";

            $vehicle->model = "App\Models\Vehicle";

            $vehicle->name = $request->Vehiclename;

            $vehicle->serial_number = $request->plateNo;

            $vehicle->selling_date = $request->dateinput21;

            $vehicle->image  = url($path);

            $vehicle->price = $request->OrgSalary;

            $vehicle->currency = $request->OrgCurrencyID3;

            $vehicle->supply_phone = $request->PHnum1;

            $vehicle->sponsor_phone = $request->PHnum2;

            $vehicle->licensedate = $request->licensedate;

            $vehicle->Inshurencedate = $request->Inshurencedate;

            $vehicle->oiltype = $request->oiltype;

            $vehicle->sponser  = $request->Sponsor;

            $vehicle->wdateinput = $request->Wdateinput22;

            $vehicle->supplyer = $request->Supplier;

            $vehicle->admin_id = $request->pinc2;

            $vehicle->admin_two  = $request->pinc3;

            $vehicle->department_id = $request->Department;

            $vehicle->brand_id = $request->vehiclebrand;

            $vehicle->type_id = $request->vehicletype;

            $vehicle->save();

         }else{

            $vehicle = Vehicle::find($request->vehicle_id);

            if ($request->file('imgPic')) {

                $path = upload_image($request->file('imgPic'), 'Vehicle_');

            }else{

                $path = $vehicle->image;

            }

            $vehicle->name = $request->Vehiclename;

            $vehicle->serial_number = $request->plateNo;

            $vehicle->selling_date = $request->dateinput21;

            $vehicle->image  = url($path);

            $vehicle->price = $request->OrgSalary;

            $vehicle->currency = $request->OrgCurrencyID3;

            $vehicle->supply_phone = $request->PHnum1;

            $vehicle->sponsor_phone = $request->PHnum2;

            $vehicle->licensedate = $request->licensedate;

            $vehicle->Inshurencedate = $request->Inshurencedate;

            $vehicle->oiltype = $request->oiltype;

            $vehicle->sponser  = $request->Sponsor;

            $vehicle->wdateinput = $request->Wdateinput22;

            $vehicle->supplyer = $request->Supplier;

            $vehicle->admin_id = $request->pinc2;

            $vehicle->admin_two  = $request->pinc3;

            $vehicle->department_id = $request->Department;

            $vehicle->brand_id = $request->vehiclebrand;

            $vehicle->type_id = $request->vehicletype;

            $vehicle->save();

         }

         if ($vehicle) {

            return response()->json(['success'=>trans('admin.vehicle_added')]);

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }



    public function vehicle_auto_complete(Request $request)

    {

        $vehicle_data = $request['term'];

        $names = Vehicle::where('name', 'like', '%' . $vehicle_data . '%')->where('enabled',1)->select('*', 'name as label')->get();

        //$html = view('dashboard.component.auto_complete', compact('names'))->render();

        return response()->json($names);

    } 

    public function vehcile_info(Request $request)

    {

        $vehicle['info'] = Vehicle::find($request['vehcile_id']);

        $model = $vehicle['info']->model;

        $vehicle['copyToCount']  = count(CopyTo::where('model_id',$request['vehcile_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $vehicle['linkToCount']  = count(AgendaTopic::where('connected_to',$request['vehcile_id'])
        ->where('model',$model)->get());

        $vehicle['archiveCount'] = count(Archive::where('model_id',$request['vehcile_id'])->where('enabled',1)

        ->where('model_name',$model)->whereNotIn('type', ['contractArchive'])->get());



        $ArchiveCount = count(Archive::where('model_id',$request['vehcile_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $CopyToCount = count(CopyTo::where('model_id',$request['vehcile_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        // $Archive =Archive::where('model_id',$request['vehcile_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archiveType')->with('Admin')->with('copyTo')->with('files')->orderBy('archives.date', 'DESC')->get();

        // $vehicle['Archive'] = $Archive;

        // $CopyTo = CopyTo::where('model_id',$request['vehcile_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.Admin')->get();

        // $vehicle['copyTo'] = $CopyTo;

        $vehicle['contractArchiveCount']  = count(Archive::where('model_id',$request['vehcile_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());


        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['vehcile_id'])
        // ->where('model',$model)->get();
        // foreach($jalArchive as $row)
        //             {
        //                     if($row->file_ids!="null"){
        //                         $row->setAttribute('files',File::whereIn('id',json_decode($row->file_ids))->get());
        //                     }
        //                     else
        //                     {
        //                         $row->setAttribute('files',array());
        //                     }
        //             }
        // $vehicle['jalArchive'] = $jalArchive;
        
        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['vehcile_id'])
        ->where('model',$model)->get());

        $vehicle['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;



        $vehicle['admin'] = Admin::where('id',$vehicle['info']->admin_id)->first()->name;

        $vehicle['admin_two'] = Admin::where('id',$vehicle['info']->admin_two)->first()->name;

        $vehicle['department'] = Department::where('id',$vehicle['info']->department_id)->first()->name;
        $vehicle['sponser']=array();
        if(isset($vehicle['info']->sponser)){
            $vehicle['sponser'] = Orgnization::where('org_type','orginzation')
            ->where('id', $vehicle['info']->sponser)->first()->name;
        }
        

        
        if(isset($vehicle['info']->supplyer)){
            $vehicle['supplyer'] = Orgnization::where('org_type','suppliers')->
        where('id', $vehicle['info']->supplyer)->first()->name;
        }
        $vehicle['brand'] = $vehicle['info']->brand_id==0?'':Constant::where('id',$vehicle['info']->brand_id )->first()->name;

        $vehicle['type'] = $vehicle['info']->type_id==0?'':Constant::where('id',$vehicle['info']->type_id)->first()->name;

        $vehicle['Currency'] = trans('admin.'.$vehicle['info']->currency);

        $vehicle['oiltype'] = trans('admin.'.$vehicle['info']->oiltype);



        return response()->json($vehicle);



    }
    
    public function vehcileArchive(Request $request){

         $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')->where('enabled',1)
        ->where('model_id',$request['vehcile_id'])
        ->whereNotIn('type', ['contractArchive'])
        ->where('model_name','App\\Models\\Vehicle')
        ->with('files')
        ->with('archiveType')
        ->with('Admin')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->orderBy('archives.date', 'DESC')
        ->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function vehcileCopyArchive(Request $request){
        
        $Archive = CopyTo::where('model_id',$request['vehcile_id'])->where('enabled',1)
        ->where('model_name','App\\Models\\Vehicle')->with('archive','archive.Admin')->with('archive','archive.files')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function vehcileJalArchive(Request $request){

         $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['vehcile_id'])
        ->where('model','App\\Models\\Vehicle')->get();
        foreach($Archive as $row)
        {
            if($row->file_ids!="null"){
                $row->setAttribute('files',File::whereIn('id',json_decode($row->file_ids))->get());
            }
            else
            {
                $row->setAttribute('files',array());
            }
        }
        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function vehcileContractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['vehcile_id'])
        ->where('model_name','App\\Models\\Vehicle')
        ->where('type','contractArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function vehcile_info_all(Request $request)

    {


        $vehicle= Vehicle::select('vehicles.*','admins.name as manager_name','departments.name as department_name','a.name as brand_name','b.name as type_name','o.name as oilname')
        ->where('vehicles.enabled',1)
        ->leftJoin('admins','admins.id','vehicles.admin_id')

        ->leftJoin('departments','departments.id','vehicles.department_id')

        ->leftJoin('t_constant as a', 'a.id', 'vehicles.brand_id')

        ->leftJoin('t_constant as b', 'b.id', 'vehicles.type_id')
        
        ->leftJoin('t_constant as o', 'o.id', 'vehicles.oiltype')

        ->orderBy('id', 'DESC');

        return DataTables::of($vehicle)

                            ->addIndexColumn()

                            ->make(true);



    }

    function upload_image($file, $prefix){

        if($file){

            $files = $file;

            $imageName = $prefix.rand(3,999).'-'.time().'.'.$files->extension();

            $image = "storage/".$imageName;

            $files->move(public_path('storage'), $imageName);

            $getValue = $image;

            return $getValue;

        }

    }   

}

