<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Address;
use App\Models\JobTitle;
use App\Models\Town;
use App\Models\Region;
use App\Models\Orgnization;
use App\Models\CopyTo;
use App\Models\Archive;
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\OrgnizationRequest;
use App\Models\linkedTo;
use App\Models\Setting;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\Constant;
use App\Models\File;
use App\Models\AgendaTopic;
use App\Models\Cert;
use App\Models\CertExtention;
use App\Models\Admin;

class orginzationsController extends Controller
{
    public function index(){
        $city = City::get();
        $jobTitle = Constant::where('parent',83)->where('status',1)->get();
        $admins = Admin::where('enabled',1)->get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'orginzation';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type','address','region','town','admins'));
    }
    
    public function doctor(){
        $city = City::get();
        $jobTitle = Constant::where('parent',6068)->where('status',1)->get();
        
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'doctor';
        return view('dashboard.DoctorsAndHospitals.index',compact('city','jobTitle','type','address','region','town'));
    }

    public function hospital(){
        $city = City::get();
        $jobTitle = Constant::where('parent',65)->where('status',1)->get();
        
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'hospital';
        return view('dashboard.DoctorsAndHospitals.index',compact('city','jobTitle','town','type','address','region'));
    }

    public function enginering(){
        $city = City::get();
        $jobTitle = Constant::where('parent',65)->where('status',1)->get();
        $admins = Admin::where('enabled',1)->get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'enginering';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type','town','address','region','admins'));
    }

    public function space(){
        $city = City::get();
        $jobTitle = Constant::where('parent',65)->where('status',1)->get();
        $admins = Admin::where('enabled',1)->get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'space';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type','town','address','region','admins'));
    }
    
    public function banks(){
        $city = City::get();
        $jobTitle = Constant::where('parent',65)->where('status',1)->get();
        $admins = Admin::where('enabled',1)->get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'banks';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type','town','address','region','admins'));
    }

    public function suppliers(){
        $city = City::get();
        $jobTitle = Constant::where('parent',65)->where('status',1)->get();
        $admins = Admin::where('enabled',1)->get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $town = Town::where('city_id',$setting->city_id)->get();
        $region = Region::get();
        $type = 'suppliers';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type','address','region','town','admins'));
    }
    
    public function store_orginzation (OrgnizationRequest $request){
        // $address = new Address();
        // $address->town_id = $request->town_data;
        // $address->city_id = $request->CityID;
        // $address->region_id = $request->region_data;
        // $address->details = $request->AddressDetails;
        // $address->notes = $request->Note;
        // $address->save();
        if($request->orgnization_id == null){
            $orgnization = new Orgnization();
            $orgnization->add_by = Auth()->user()->id;
            $orgnization->url = $request->type;
            $orgnization->name = $request->SponsorName;
            $orgnization->town_id = $request->town_id;

            $orgnization->city_id = $request->city_id;

            $orgnization->region_id = $request->region_id;

            $orgnization->details = $request->AddressDetails;

            $orgnization->notes = $request->Note;
            $orgnization->model = "App\Models\Orgnization";
            $orgnization->phone_one = $request->MobileNo1;
            $orgnization->phone_two = $request->MobileNo2;
            $orgnization->zepe_code = $request->LisenceNo;
            $orgnization->manager_name = $request->personInCharge;
            $orgnization->job_title_id  = $request->PositionID;
            $orgnization->fax  = $request->faxNo;
            $orgnization->email = $request->EmailAddress;
            $orgnization->whatsapp_one = $request->phone1;
            $orgnization->whatsapp_two  = $request->phone2;
            $orgnization->website  = $request->website;
            $orgnization->org_type  = $request->type;
            // $orgnization->addresse_id   = $address->id;
            $orgnization->allowed_emp   = json_encode($request->allowedEmp);
            $orgnization->save();
        }else{
            $orgnization = Orgnization::where('org_type',$request->type)->
            where('id',$request->orgnization_id)->first();
            if($orgnization->name != $request->SponsorName){
                Archive::where('name', $orgnization->name)->where('model_name','App\Models\Orgnization')->update(['name' => $request->SponsorName]);
            }
            $orgnization->name = $request->SponsorName;
            $orgnization->phone_one = $request->MobileNo1;
            $orgnization->phone_two = $request->MobileNo2;
            $orgnization->zepe_code = $request->LisenceNo;
            $orgnization->manager_name = $request->personInCharge;
            $orgnization->town_id = $request->town_id;

            $orgnization->city_id = $request->city_id;

            $orgnization->region_id = $request->region_id;

            $orgnization->details = $request->AddressDetails;

            $orgnization->notes = $request->Note;

            $orgnization->job_title_id  = $request->PositionID;
            $orgnization->fax  = $request->faxNo;
            $orgnization->email = $request->EmailAddress;
            $orgnization->whatsapp_one = $request->phone1;
            $orgnization->whatsapp_two  = $request->phone2;
            $orgnization->website  = $request->website;
            $orgnization->org_type  = $request->type;
            // $orgnization->addresse_id   = $address->id;
            $orgnization->allowed_emp   = json_encode($request->allowedEmp);
            $orgnization->save();

        }
        if ($orgnization) {

            return response()->json(['success'=>trans('admin.orgnization_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    public function org_delete(Request $request)
    {
        // dd($request->all());
        $org= Orgnization::find($request['org_id']);
        $org->deleted_by = Auth()->user()->id;
        $org->enabled=0;
        // dd($user->all());
        $org->save();

        $archives=  Archive::where('model_id', $org->id)->where('model_name', 'App\\Models\\Orgnization')->get();
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

        $copyTo=CopyTo::where('model_id', $org->id)->where('model_name', 'App\\Models\\Orgnization')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }


        if ($org) {

            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function orginzation_auto_complete(Request $request){
        
        if(isset( $request['request'])){
            $orginzation_data = $request['request']['term'];
        }else{
            $orginzation_data = $request['term'];
        }

        $type='orginzation';

        if (isset($request['type'])){
                $type = $request['type'];
        }else{
            $type ='orginzation';
        }

        $names = Orgnization::where('name', 'like', '%' . $orginzation_data . '%')->where('enabled',1)->where('org_type',$type)->select('*','name as label')->get();
        return response()->json($names);
    }

    public function supplier_auto_complete(Request $request){

        $orginzation_data = $request['term'];

        $names = Orgnization::where('name', 'like', '%' . $orginzation_data . '%')->where('enabled',1)->where('org_type','suppliers')->select('*','name as label')->get();
        return response()->json($names);
    }
    
    public function hospital_auto_complete(Request $request){

        $orginzation_data = $request['term'];

        $names = Orgnization::where('name', 'like', '%' . $orginzation_data . '%')->where('enabled',1)->where('org_type','hospital')->select('*','name as label')->get();
        return response()->json($names);
    }
    
    public function getData (Request $request){
        
        $orginzation['info'] = Orgnization::find($request['orginzation_id']);
        
        $orginzation['allowedEmp']=json_decode($orginzation['info']->allowed_emp);
        
        $orginzation['allAdmin'] =Admin::where('enabled','1')->get();
        
        $model = $orginzation['info']->model;
        $ArchiveCount = count(Archive::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->get());
        $CopyToCount = count(CopyTo::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->get());
        
        // $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')->where('archives.enabled',1)
        // ->where('model_id',$request['orginzation_id'])
        // ->where('model_name',$model)
        // ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        // ->with('files')->with('archiveType')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')
        // ->get();

        $orginzation['copyToCount']  = count(CopyTo::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->get());
        $orginzation['linkToCount']  = count(AgendaTopic::where('connected_to',$request['orginzation_id'])
        ->where('model',$model)->get());
        $orginzation['outArchiveCount'] = count(Archive::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type','outArchive')->get());
        $orginzation['inArchiveCount']  = count(Archive::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type','inArchive')->get());
        
        $orginzation['otherArchiveCount']  = count(Archive::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive','contractArchive','financeArchive'])->get());

        $orginzation['contractArchiveCount']  = count(Archive::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());
        
        $orginzation['financeArchiveCount']  = count(Archive::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'financeArchive')->get());

        $orginzation['licFileArchiveCount'] = 0;
        $orginzation['licArchiveCount'] = 0;


        // $CopyTo = CopyTo::where('model_id',$request['orginzation_id'])->where('enabled',1)
        // ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.Admin')->get();
        // $orginzation['copyTo'] = $CopyTo;
        // $orginzation['Archive'] = $Archive;
        if($orginzation['info']->job_title_id){

        $orginzation['job_title'] = Constant::where('id',$orginzation['info']->job_title_id)->first()->name;

        }
        // $orginzation['address'] = Address::where('id', $orginzation['info']['addresse_id'])->first();

        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['orginzation_id'])
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
        // $orginzation['jalArchive'] = $jalArchive;
        
        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['orginzation_id'])
        ->where('model',$model)->get());

        $orginzation['jalArchiveCount']=$jalArchiveCount;
        
        $orginzation['certCount'] =Cert::where('sentId',$request['orginzation_id'])->count();
        
        $orginzation['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount+$orginzation['certCount'];

        if($orginzation['info']->city_id){
            $orginzation['city'] =City::where('id',$orginzation['info']->city_id)->first()->name;
        }
        if($orginzation['info']->town_id){
            $orginzation['town'] =Town::where('id',$orginzation['info']->town_id)->first()->name;
        }
        if($orginzation['info']->region_id){
            $orginzation['region'] =Region::where('id',$orginzation['info']->region_id)->first()->name;
        }
        return response()->json($orginzation);

    }

    public function orgnization_info(Request $request)
    {
        $orginzation['info'] = Orgnization::find($request['orginzation_id']);
        
        $orginzation['allowedEmp']=json_decode($orginzation['info']->allowed_emp);
        
        if($orginzation['allowedEmp']!=null){
            for($i=0; $i < sizeof($orginzation['allowedEmp']) ;$i++)
                if($orginzation['allowedEmp'][$i] == Auth()->user()->id)
                    return $this->getData($request);
            
        }else{ 
            return $this->getData($request);
            
        }
            
        return response()->json(['status'=>false,'errors'=>array('not_allowed'=>array('ليس لديك صلاحية لعرض هذه المؤسسة '))]);
        

    }
    
    public function orgCert(Request $request){
        $cert =Cert::select('t_farfromcenter.*', 't_certification.s_name_ar as type_id_name')
        ->where('sentId',$request['orginzation_id'])
        ->leftJoin('t_certification', 't_certification.pk_i_id', 't_farfromcenter.msgTitle')->with('Admin')->orderBy('t_farfromcenter.cer_date', 'DESC')->get();
        
        // $outcert =Cert::select('t_farfromcenter.*', 't_certification.s_name_ar as type_id_name')
        // ->where('citizen_id',$request['orginzation_id'])
        // ->where('model','App\\Models\\Orgnization')
        // ->leftJoin('t_certification', 't_certification.pk_i_id', 't_farfromcenter.msgTitle')->with('Admin')->orderBy('t_farfromcenter.cer_date', 'DESC')->get();
        
        

        return DataTables::of($cert)

        ->addIndexColumn()

        ->make(true);

    }

    public function orgOutArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['orginzation_id'])
        ->where('model_name','App\\Models\\Orgnization')
        ->where('type','outArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function orgInArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['orginzation_id'])
        ->where('model_name','App\\Models\\Orgnization')
        ->where('type','inArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function orgCopyArchive(Request $request){

        $Archive = CopyTo::where('model_id',$request['orginzation_id'])->where('enabled',1)
        ->where('model_name','App\\Models\\Orgnization')->with('archive','archive.files')->with('archive','archive.Admin')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function orgJalArchive(Request $request){

        
        $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['orginzation_id'])
        ->where('model','App\\Models\\Orgnization')->get();
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
        // dd($Archive->all());
        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function orgOtherArchive(Request $request){

        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['orginzation_id'])
        ->where('model_name','App\\Models\\Orgnization')
        ->whereNotIn('type', ['outArchive','inArchive','contractArchive','financeArchive'])
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function contractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['orginzation_id'])
        ->where('type','contractArchive')
        ->where('model_name','App\\Models\\Orgnization')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }
    
    public function finaceArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['orginzation_id'])
        ->where('type','financeArchive')
        ->where('model_name','App\\Models\\Orgnization')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('Admin')->orderBy('archives.created_at', 'DESC')->get();
        
        foreach($Archive as $row){

            $attach=json_decode($row->json_feild);

            foreach($attach as $key=>$value){

                foreach((array) $value as $key=>$val){

                    $temp=array();

                    $temp['real_name']=$key;

                    $temp['url']=$val;

                }

                //dd($temp);

                $row->files[]=$temp;

            }

        }

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function orgnization_info_all(Request $request)
    {
        $type=$request['type'];
        $orginzation= Orgnization::select('orgnizations.*','regions.name as region_name','cities.name as city_name',
        'towns.name as town_name','t_constant.name as job_title_name')
        ->where('orgnizations.enabled',1)
        ->leftJoin('t_constant', 't_constant.id', 'orgnizations.job_title_id')
        ->leftJoin('regions','orgnizations.region_id','regions.id')
        ->leftJoin('cities','orgnizations.city_id','cities.id')
        ->leftJoin('towns','orgnizations.town_id','towns.id')->where('org_type',$type)->orderBy('id', 'DESC');
        return DataTables::of($orginzation)
                            ->addIndexColumn()
                            ->make(true);
    }




}
