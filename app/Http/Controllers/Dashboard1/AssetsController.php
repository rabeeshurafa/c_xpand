<?php



namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Department;

use App\Models\Admin;

use App\Models\Orgnization;

use App\Models\Brand;

use App\Models\Equpment;

use App\Models\EqupmentStatus;

use App\Models\EqupmentType;

use App\Http\Requests\EquipentRequest;

use Yajra\DataTables\DataTables;

use App\Models\Archive;

use App\Models\CopyTo;

use App\Models\linkedTo;

use App\Models\Constant;
use App\Models\AgendaTopic;

use function GuzzleHttp\Promise\all;

class AssetsController extends Controller

{

    public function dev_equp(){

        $admins = Admin::where('enabled',1)->get();

        $brand = Constant::where('parent',77)->where('status',1)->get();

        $equp_types = Constant::where('parent',78)->where('status',1)->get();

        $equp_status = Constant::where('parent',79)->where('status',1)->get();

        $departments = Department::where('enabled',1)->get();

        $sponsers = Orgnization::where('org_type','orginzation')->where('enabled',1)->get();

        $suppliers = Orgnization::where('org_type','suppliers')->where('enabled',1)->get();

        $type="equip";

        return view('dashboard.assets.index',compact('admins','brand','equp_types','equp_status','type',

        'departments','sponsers','suppliers'));    

    }

    public function equip_delete(Request $request)
    {
        // dd($request->all());
        $equip= Equpment::find($request['equip_id']);
        $equip->deleted_by = Auth()->user()->id;
        $equip->enabled=0;
        // dd($user->all());
        $equip->save();

        $archives=  Archive::where('model_id', $equip->id)->where('model_name', 'App\\Models\\Equpment')->get();
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

        $copyTo=CopyTo::where('model_id', $equip->id)->where('model_name', 'App\\Models\\Equpment')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }

        if ($equip) {
            return response()->json(['success'=>trans('admin.subscriber_added')]);
        }
    
        return response()->json(['error'=>$validator->errors()->all()]);
    
    }

    public function store_equpment(EquipentRequest $request){

        // dd($request->all());

        if($request->equpiment_id == null){

            $equpment = new Equpment();

            if ($request->file('imgPic')) {

                $path = upload_image($request->file('imgPic'), 'quipent_');

            }else{

                $path = '';

            }

            $equpment->name = $request->Equipment;

            $equpment->add_by = Auth()->user()->id;

            $equpment->url = "dev_equp";

            $equpment->model = "App\Models\Equpment";

            $equpment->serial_number = $request->SerialNo;

            $equpment->internal_number = $request->InternalNo;

            $equpment->count = $request->PiceCnt;

            $equpment->selling_date = $request->dateinput;

            $equpment->image  = url($path);

            $equpment->price   = $request->OrgSalary;

            $equpment->currency = $request->OrgCurrencyID;

            $equpment->notes   = $request->MantinanceNote;

            $equpment->address   = $request->AddressDetailsAR;

            $equpment->wdate_input    = $request->Wdateinput;

            $equpment->supply_phone   = $request->PHnum1;

            $equpment->sponsor_phone   = $request->PHnum2;

            $equpment->sponser    = $request->SponsorName;

            $equpment->supplyer    = $request->Supplier;

            $equpment->admin_id    = $request->pinc3;

            $equpment->department_id     = $request->Department;

            $equpment->brand_id     = $request->brand;

            $equpment->equpment_type_id     = $request->Eqtype;

            $equpment->equpment_status_id     = $request->EqtStatus;

            $equpment->save();

        }else{

            $equpment = Equpment::find($request->equpiment_id);

            if ($request->file('imgPic')) {

                $path = upload_image($request->file('imgPic'), 'quipent_');

            }else{

                $path = $equpment->image;

            }

            $equpment->name = $request->Equipment;

            $equpment->serial_number = $request->SerialNo;

            $equpment->internal_number = $request->InternalNo;

            $equpment->count = $request->PiceCnt;

            $equpment->selling_date = $request->dateinput;

            $equpment->image  = url($path);

            $equpment->price   = $request->OrgSalary;

            $equpment->currency = $request->OrgCurrencyID;

            $equpment->notes   = $request->MantinanceNote;

            $equpment->address   = $request->AddressDetailsAR;

            $equpment->wdate_input    = $request->Wdateinput;

            $equpment->supply_phone   = $request->PHnum1;

            $equpment->sponsor_phone   = $request->PHnum2;

            $equpment->sponser    = $request->SponsorName;

            $equpment->supplyer    = $request->Supplier;

            $equpment->admin_id    = $request->pinc3;

            $equpment->department_id     = $request->Department;

            $equpment->brand_id     = $request->brand;

            $equpment->equpment_type_id     = $request->Eqtype;

            $equpment->equpment_status_id     = $request->EqtStatus;

            $equpment->save();

        }

        if ($equpment) {

            return response()->json(['success'=>trans('admin.equpment_added')]);

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }



    public function equip_auto_complete(Request $request)

    {

        $emp_data = $request['term'];

        $names = Equpment::where('name', 'like', '%' . $emp_data . '%')->where('enabled',1)->select('*', 'name as label')->get();

        return response()->json($names);

    }  

    public function equip_info(Request $request)

    {

        $equipment['info'] = Equpment::find($request['equip_id']);

        $model = $equipment['info']->model;

        $ArchiveCount = count(Archive::where('model_id',$request['equip_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $CopyToCount = count(CopyTo::where('model_id',$request['equip_id'])->where('enabled',1)

        ->where('model_name',$model)->get());





        $equipment['copyToCount']  = count(CopyTo::where('model_id',$request['equip_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $equipment['linkToCount']  = count(AgendaTopic::where('connected_to',$request['equip_id'])

        ->where('model',$model)->get());

        $equipment['archiveCount'] = count(Archive::where('model_id',$request['equip_id'])->where('enabled',1)

        ->where('model_name',$model)->whereNotIn('type', ['contractArchive'])->get());

        $equipment['contractArchiveCount']  = count(Archive::where('model_id',$request['equip_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());





        // $Archive =Archive::where('model_id',$request['equip_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archiveType')->with('files')->with('admin')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        // $equipment['Archive'] = $Archive;

        // $CopyTo = CopyTo::where('model_id',$request['equip_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.archiveType')->with('archive','archive.Admin')->get();

        // $equipment['copyTo'] = $CopyTo;
        
        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['equip_id'])
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
        // $equipment['jalArchive'] = $jalArchive;

        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['equip_id'])

        ->where('model',$model)->get());
        
        
        $equipment['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;

        if($equipment['info']->admin_id){

            $equipment['admin'] = Admin::where('id',$equipment['info']->admin_id)->first()->name;

        }if($equipment['info']->department_id){

            $equipment['department'] = Department::where('id',$equipment['info']->department_id)->first()->name;

        }

        if($equipment['info']->sponser){

            $equipment['sponser'] = Orgnization::where('org_type','orginzation')

            ->where('id', $equipment['info']->sponser)->first()->name;

        }

        if($equipment['info']->supplyer){

            $equipment['supplyer'] = Orgnization::where('org_type','suppliers')->

            where('id', $equipment['info']->supplyer)->first()->name;

        }

        if($equipment['info']->brand_id){

            $equipment['brand'] = Constant::where('id',$equipment['info']->brand_id)->first()->name;

        }

        if($equipment['info']->equpment_type_id){

            $equipment['type'] = Constant::where('id',$equipment['info']->equpment_type_id)->first()->name;

        }

        if($equipment['info']->equpment_status_id){

            $equipment['status'] = Constant::where('id',$equipment['info']->equpment_status_id)->first()->name;

        }

        $equipment['Currency'] = trans('admin.'.$equipment['info']->currency);



        return response()->json($equipment);



    }
    
    public function equpArchive(Request $request){

         $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')->where('enabled',1)
        ->where('model_id',$request['equp_id'])
        ->whereNotIn('type', ['contractArchive'])
        ->where('model_name','App\\Models\\Equpment')
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

    public function equpCopyArchive(Request $request){
        
        $Archive = CopyTo::where('model_id',$request['equp_id'])->where('enabled',1)
        ->where('model_name','App\\Models\\Equpment')->with('archive','archive.Admin')->with('archive','archive.files')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function equpJalArchive(Request $request){

         $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['equp_id'])
        ->where('model','App\\Models\\Equpment')->get();
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

    public function equpContractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['equp_id'])
        ->where('model_name','App\\Models\\Equpment')
        ->where('type','contractArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function equip_info_all(Request $request)

    {

        $equipment= Equpment::select('equpments.*','admins.name as manager_name','departments.name as department_name','a.name as brand_name','b.name as type_name','c.name as status')
        ->where('equpments.enabled',1)
        ->leftJoin('admins','admins.id','equpments.admin_id')

        ->leftJoin('departments','departments.id','equpments.department_id')

        ->leftJoin('t_constant as a', 'a.id', 'equpments.brand_id')

        ->leftJoin('t_constant as b', 'b.id', 'equpments.equpment_type_id')

        ->leftJoin('t_constant as c', 'c.id', 'equpments.equpment_status_id')

        ->orderBy('id', 'DESC');

        

        return DataTables::of($equipment)

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

