<?php



namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Orgnization;

use App\Models\City;

use App\Models\Group;

use App\Models\JobTitle;

use App\Models\Address;

use App\Models\User;

use App\Models\Town;

use App\Models\Region;

use App\Http\Requests\DepartmentRequest;

use App\Http\Requests\SubscribertRequest;

use Yajra\DataTables\DataTables;

use App\Models\Archive;

use App\Models\ArchiveLicense;

use App\Models\Setting;

use App\Models\jobLicArchieve;

use App\Models\License;

use App\Models\CopyTo;

use App\Models\linkedTo;

use App\Models\elec;
use App\Models\File;
use App\Models\AgendaDetail;
use App\Models\AgendaTopic;
use App\Models\AgendaExtention;

use Yajra\DataTables\Services\DataTable;
use App\Models\water;
use App\Models\Constant;
use App\Models\Admin;

class SubscriberController extends Controller

{

    

    public function index(){

        $orgInfo=Orgnization::get()->where('enabled',1)->first();

        $city = City::get();
        
        $admins = Admin::where('enabled',1)->get();
        
        $groups = Constant::where('parent',75)->where('status',1)->get();

        $jobTitle = Constant::where('parent',74)->where('status',1)->get();

        $type="subscriber";

        $setting = Setting::first();

        $address = Address::where('id',$setting->address_id)->first();

        $town = Town::get();

        $region = Region::get();

        return view('dashboard.subscriber.index',compact('city','groups','town','region',

        'jobTitle','type','setting','address','orgInfo','admins'));    

    }



    public function store_subscriber (SubscribertRequest $request){

        if($request->subscriber_id == null){
            
            $national_id = User::where('national_id',$request->formDataNationalID)->where('enabled','1')->first();
            if($national_id!=null&&$request->formDataNationalID!=null){
                return response()->json(['status'=>false,'errors'=>array('national_id'=>array('رقم الهوية مكرر'))]);
            }
            
        }else{
            
            $national_id = User::where('national_id',$request->formDataNationalID)->where('enabled','1')->where('id', '!=' , $request->subscriber_id)->first();
            if($national_id!=null&&$request->formDataNationalID!=null){
                return response()->json(['status'=>false,'errors'=>array('national_id'=>array('رقم الهوية مكرر'))]);
            }
        }
        
        
        if($request->subscriber_id == null){
            
            $user = new User();

            $user->model = "App\Models\User";

            $user->name = $request->formDataNameAR;

            $user->url =  "subscribers";
            
            $user->town_id = $request->town_id;

            $user->city_id = $request->city_id;

            $user->region_id = $request->region_id;

            $user->details = $request->AddressDetails;

            $user->notes = $request->Note;


            $user->add_by = Auth()->user()->id;

            $user->phone_one = $request->formDataMobileNo1;

            $user->phone_two = $request->formDataMobileNo2;

            $user->national_id = $request->formDataNationalID;

            $user->cutomer_num = $request->formDataCutomerNo;

            $user->bussniess_name = $request->formDataBussniessName;

            $user->email  = $request->formDataEmailAddress;

            $user->username = $request->username;

            $user->password = $request->password ? bcrypt($request->password) : null;

            $user->group_id  = $request->formDataIndustryID;

            $user->job_title_id  = $request->formDataProfessionID;

            // $user->addresse_id   = $address->id;
            
            $user->allowed_emp   = json_encode($request->allowedEmp);

            $user->save();

         }else{

            $user = User::find($request->subscriber_id);

            // $address = Address::where('id',$user->addresse_id)->first();

            //dd(sizeof());

            /*if(!isset($address->town_id))

             dd($request->town_data);*/

            // $address->town_id = $request->town_id;

            // $address->city_id = $request->city_id;

            // $address->region_id = $request->region_id;

            // $address->details = $request->AddressDetails;

            // $address->notes = $request->Note;

            // $address->save();

            $user->name = $request->formDataNameAR;
            
            $user->allowed_emp   = json_encode($request->allowedEmp);
            
            $user->phone_one = $request->formDataMobileNo1;
            
            $user->town_id = $request->town_id;

            $user->city_id = $request->city_id;

            $user->region_id = $request->region_id;

            $user->details = $request->AddressDetails;

            $user->notes = $request->Note;


            $user->phone_two = $request->formDataMobileNo2;

            $user->national_id = $request->formDataNationalID;

            $user->cutomer_num = $request->formDataCutomerNo;

            $user->bussniess_name = $request->formDataBussniessName;

            $user->email  = $request->formDataEmailAddress;

            $user->username = $request->username;

            if($request->password){

                $user->password = bcrypt($request->password);

            }else{

                $user->password = $user->password;

            }

            $user->group_id  = $request->formDataIndustryID;

            $user->job_title_id  = $request->formDataProfessionID;

            $user->save();

         }

         if ($user) {



            // return response()->json(['success'=>trans('admin.subscriber_added')]);
            return response()->json(['status'=>true,'errors'=>array('fileNo'=>array('تمت الإضافة بنجاح'))]);

        }

     

        return response()->json(['error'=>$validator->errors()->all()]);

    }



    public function subscribe_auto_complete(Request $request){

        $subscriber_data = $request['term'];

        $names = User::where('name', 'like', '%' . $subscriber_data . '%')->where('enabled',1)->select('*', 'name as label')->get();

        //$html = view('dashboard.component.auto_complete', compact('names'))->render();

        //dd($names);

        return response()->json($names);

    }

    public function subscribe_delete(Request $request)
    {
        // dd($request->all());
        $user= User::find($request['subscribe_id']);
        $user->deleted_by = Auth()->user()->id;
        $user->enabled=0;
        // dd($user->all());
        $user->save();
        
        $licenses=  license::where('user_id', $user->id)->get();
        foreach($licenses as $license){
            $license->deleted_by = Auth()->user()->id;
            $license->enabled=0;
            $license->save();
        }
        $elecs=  elec::where('user_id', $user->id)->get();
        foreach($elecs as $elec){
            $elec->deleted_by = Auth()->user()->id;
            $elec->enabled=0;
            $elec->save();
        }
        $waters=  water::where('user_id', $user->id)->get();
        foreach($waters as $water){
            $water->deleted_by = Auth()->user()->id;
            $water->enabled=0;
            $water->save();
        }


        $licArchives=  ArchiveLicense::where('model_id', $user->id)->where('model_name', 'App\\Models\\User')->get();
        foreach($licArchives as $licArchive){
            $licArchive->deleted_by = Auth()->user()->id;
            $licArchive->enabled=0;
            $licArchive->save();
        }
        $jobLicArchieves=  jobLicArchieve::where('model_id', $user->id)->where('model_name', 'App\\Models\\User')->get();
        foreach($jobLicArchieves as $jobLicArchieve){
            $jobLicArchieve->deleted_by = Auth()->user()->id;
            $jobLicArchieve->enabled=0;
            $jobLicArchieve->save();
        }

        $archives=  Archive::where('model_id', $user->id)->where('model_name', 'App\\Models\\User')->get();
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

        $copyTo=CopyTo::where('model_id', $user->id)->where('model_name', 'App\\Models\\User')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }

        if ($user) {



            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }

     

        return response()->json(['error'=>$validator->errors()->all()]);
       
    }
    
    public function getDeptData (Request $request){

        $user['info'] = User::find($request['subscribe_id']);
        
        $user['allowedEmp']=json_decode($user['info']->allowed_emp);
        
        $user['allAdmin'] =Admin::where('enabled','1')->get();

        $model = $user['info']->model;

        $ArchiveCount = count(Archive::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        // $Archive =Archive::where('model_id',$request['subscribe_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('files')->with('archiveType')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        

        $user['outArchiveCount'] = count(Archive::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->where('type','outArchive')->get());

        $user['inArchiveCount']  = count(Archive::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->where('type','inArchive')->get());

        $user['otherArchiveCount']  = count(Archive::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive'])->get());

        $user['licArchiveCount'] = count(ArchiveLicense::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->where('type','licArchive')->get());

        $user['licFileArchiveCount'] = count(ArchiveLicense::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->where('type','licFileArchive')->get());

        $user['copyToCount']  = count(CopyTo::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $user['linkToCount']  = count(AgendaTopic::where('connected_to',$request['subscribe_id'])

        ->where('model',$model)->get());

        $user['licCount'] = count(license::where('user_id','=',$request['subscribe_id'])->where('enabled',1)->get());

        $user['waterCount'] = count(water::where('user_id','=',$request['subscribe_id'])->where('enabled',1)->get());

        $user['elecCount']= count(elec::where('user_id','=',$request['subscribe_id'])->where('enabled',1)->get());

        // $ArchiveLic =ArchiveLicense::where('model_id',$request['subscribe_id'])

        // ->where('model_name',$model)->with('files')->get();

        // $ArchiveLic = ArchiveLicense::where('model_id',$request['subscribe_id'])->where('enabled',1)

        // ->where('model_name',$model)->select('archive_licenses.*', 't_constant.name as license_type_name')

        // ->leftJoin('t_constant', 't_constant.id', 'archive_licenses.license_id')->get();

        // foreach($ArchiveLic as $row){

        //     $attach=json_decode($row->json_feild);

        //     foreach($attach as $key=>$value){

        //         foreach((array) $value as $key=>$val){

        //             $temp=array();

        //             $temp['real_name']=$key;

        //             $temp['url']=$val;

        //         }

        //         //dd($temp);

        //         $row->files[]=$temp;

        //     }

        // }

        // $user['ArchiveLic'] = $ArchiveLic;

        $ArchiveLicCount =count(ArchiveLicense::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $ArchiveJobLic =jobLicArchieve::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)

        ->select('job_lic_archieves.*')

        ->where('job_lic_archieves.enabled',1)

        ->with('craftType')
        
        ->with('licenseRating')

        ->with('files')->get();

        $user['ArchiveJobLic'] = $ArchiveJobLic;

        $ArchiveJobLicCount =count(jobLicArchieve::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $user['ArchiveJobLicCount'] = $ArchiveJobLicCount;

        // $user['Archive'] = $Archive;

        // $CopyTo = CopyTo::where('model_id',$request['subscribe_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.admin')->get();

        // $user['copyTo'] = $CopyTo;

        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['asset_id'])
        ->where('model',$model)->get());

        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['subscribe_id'])
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
        // $user['jalArchive'] = $jalArchive;

        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['subscribe_id'])

        ->where('model',$model)->get());

        $user['contractArchiveCount']  = count(Archive::where('model_id',$request['asset_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());

        $CopyToCount = count(CopyTo::where('model_id',$request['subscribe_id'])->where('enabled',1)

        ->where('model_name',$model)->get());



        if($user['info']->job_title_id){

            $user['job_title'] = Constant::where('id',$user['info']->job_title_id)->first()->name;

        }

        if($user['info']->group_id){

            $user['group'] = Constant::where('id',$user['info']->group_id)->first()->name;

        }

        // if($user['info']['addresse_id']){

        //     $user['address'] = Address::where('id', $user['info']['addresse_id'])->first();

        // }

        $user['ArchiveCount'] = $ArchiveCount + $CopyToCount +$ArchiveLicCount+$jalArchiveCount;

        // $user['job_title'] = JobTitle::where('id',$user['info']->job_title_id)->first()->name;

        // $user['group'] = Group::where('id',$user['info']->group_id)->first()->name;

        // $user['address'] = Address::where('id', $user['info']['addresse_id'])->first();

        if(isset($user['info']->city_id)){

            $user['city'] =City::where('id',$user['info']->city_id)->first()->name;
        }

        else{

        $user['city']= '';

        // $user['address']['details']='';

        // $user['address']['notes']='';

        }

        if(isset($user['info']->town_id)){

            $user['town'] =Town::where('id',$user['info']->town_id)->first()->name;

        }

        else
        $user['town']='';

        if(isset($user['info']->region_id)){

            $user['region'] =Region::where('id',$user['info']->region_id)->first()->name;
        }

        else{
        $user['region']='';
        }

        return response()->json($user);



    }
    
    public function subscribe_info(Request $request)
    {
        $user['info'] = User::find($request['subscribe_id']);
        $user['allowedEmp']=json_decode($user['info']->allowed_emp);
        
        if($user['allowedEmp']!=null){
            for($i=0; $i < sizeof($user['allowedEmp']) ;$i++)
                if($user['allowedEmp'][$i] == Auth()->user()->id)
                    return $this->getDeptData($request);
            
        }else{ 
            return $this->getDeptData($request);
            
        }
            
        return response()->json(['status'=>false,'errors'=>array('not_allowed'=>array('ليس لديك صلاحية لعرض هذا المواطن'))]);
        
    }
    
    public function subscriberOutArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['subscriber_id'])
        ->where('model_name','App\\Models\\User')
        ->where('type','outArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function subscriberInArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['subscriber_id'])
        ->where('model_name','App\\Models\\User')
        ->where('type','inArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }
    
    public function subscriberLicArchive(Request $request){
        
       $ArchiveLic = ArchiveLicense::where('model_id',$request['subscriber_id'])->where('enabled',1)

        ->where('model_name','App\\Models\\User')->with('License')->select('archive_licenses.*', 't_constant.name as license_type_name')

        ->leftJoin('t_constant', 't_constant.id', 'archive_licenses.license_id')->get();

        foreach($ArchiveLic as $row){

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

        return DataTables::of($ArchiveLic)

        ->addIndexColumn()

        ->make(true);

    }

    public function subscriberCopyArchive(Request $request){

        $Archive = CopyTo::where('model_id',$request['subscriber_id'])->where('enabled',1)
        ->where('model_name','App\\Models\\User')->with('archive','archive.files')->with('archive','archive.Admin')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function subscriberJalArchive(Request $request){

        
        $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['subscriber_id'])
        ->where('model','App\\Models\\User')->get();
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

    public function subscriberOtherArchive(Request $request){

        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['subscriber_id'])
        ->where('model_name','App\\Models\\User')
        ->whereNotIn('type', ['outArchive','inArchive','contractArchive'])
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->with('copyTo')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function subscribercontractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['subscriber_id'])
        ->where('type','contractArchive')
        ->where('model_name','App\\Models\\User')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function subscribe_info_all()

    {

        $users= User::select('users.*','regions.name as region_name','cities.name as city_name',

        'towns.name as town_name','b.name as job_title_name','a.name as group_name')
        
        ->leftJoin('t_constant as b', 'b.id', 'users.job_title_id')

        ->leftJoin('t_constant as a', 'a.id', 'users.group_id')

        ->leftJoin('regions','users.region_id','regions.id')

        ->leftJoin('cities','users.city_id','cities.id')

        ->leftJoin('towns','users.town_id','towns.id')->where('users.enabled','1')->orderBy('users.id', 'DESC');

        return DataTables::of($users)

                            ->addIndexColumn()

                            ->make(true);

    }

    



    public function subscriber($id){

        $subscriber = User::find($id);

        $city = City::get();

        $groups = Constant::where('parent',75)->where('status',1)->get();

        $jobTitle = Constant::where('parent',74)->where('status',1)->get();

        $type="subscriber";

        return view('dashboard.subscriber.show',compact('city','groups','jobTitle','type','subscriber')); 

    }









}

