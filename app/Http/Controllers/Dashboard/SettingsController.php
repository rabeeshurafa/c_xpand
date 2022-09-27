<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\City;
use App\Models\Town;
use App\Models\Region;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Role;
use App\Models\SettingTranslation;
use Illuminate\Http\Request;
use DB;
use App\Models\Archive;
use App\Models\CopyTo;
use Yajra\DataTables\DataTables;
use App\Models\File;

class SettingsController extends Controller
{
    
    
    public function permissions(){
        $type = 'employee';
        return view('dashboard.employee.permissions',compact('type'));
    }
    
    public function store_permission(Request $request){
        
        //dd($request->my_multi_select1);
        DB::table('t_system_function')
            ->where('fk_i_type',2)
                ->update(['b_enabled' => 0]);
        foreach($request->my_multi_select1 as $row){
            DB::table('t_system_function')
            ->where('s_function_url',$row)
                ->update(['b_enabled' => 1]);
        }
        
            return response()->json(['success'=>'تم تعديل الصلاحيات']);
    }
    
    public function userper(){
        $type = 'employee';
        $admin=Admin::where('enabled',1)->get();
        $local_permissions =array();
        return view('dashboard.employee.userper',compact('type','admin','local_permissions'));
    }
    
    public function store_usrpermission(Request $request){
        
        
            $admin = Admin::find($request->empList);
            if($admin){
                
            
            if($admin->role_id){
            $role = Role::find($admin->role_id);
            }
            else
            {
                $role = new Role();
                $role->permissions = json_encode($request->my_multi_select2);
                $role->save();
                $admin->role_id = $role->id;
                $res=$admin->save();
            }
            $role->permissions = json_encode($request->my_multi_select2);
            $role->save();
            return response()->json(['success'=>'تم تعديل الصلاحيات']);
            }
            else
            {
            return response()->json(['error'=>'لم يتم الحفظ']);
            }
    }
    public function updateOrganization()
    {
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $city = City::get();
        $town = Town::get();
        $region = Region::get();
        return view('dashboard.setting.index',compact('setting','city','address','town','region')); 
    }

    public function state(Request $request){
        $towns = Town::where('city_id',$request['val'])->get();
        $arr = [];
        $data=array();
        foreach($towns as $town){
            $arr['id'] = $town->id;
            $arr['name'] = $town->name;
            $data[] = $arr;
        }
        if($data)
        return response()->json($data);
    }

    public function town(Request $request){
        $regions = Region::where('town_id',$request['val'])->get();
        $arr = [];
        $data=array();
        foreach($regions as $region){
            $arr['id'] = $region->id;
            $arr['name'] = $region->name;
            $data[] = $arr;
        }
        return response()->json($data);
    }

    public function store_settings(Request $request){
        $setting = Setting::first();
        if($setting){
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'setting_');
            }else{
                $path = $setting->logo;
            }
            if ($request->file('header_img_file')) {
                $path1 = upload_image($request->file('header_img_file'), 'setting_');
            }else{
                $path1 = $setting->header_img;
            }
            if ($request->file('footer_img_file')) {
                $path2 = upload_image($request->file('footer_img_file'), 'setting_');
            }else{
                $path2 = $setting->footer_img;
            }
            $setting->footer_img = url($path2);
            // $address = Address::where('id',$setting->address_id)->first();
            // $address->town_id = $request->TownID;
            // $address->city_id = $request->CityID;
            // $address->region_id = $request->AreaID;
            // $address->details = $request->AddressDetails;
            // $address->notes = $request->Note;
            // $address->save();
            
            $setting->town_id = $request->town_id;
            $setting->city_id = $request->city_id;
            $setting->region_id = $request->region_id;
            $setting->header_img = url($path1);
            $setting->logo = url($path);
            $setting->phone_one = $request->phone_one;
            $setting->phone_two = $request->phone_two;
            $setting->email = $request->email;
            $setting->fax = $request->fax;
            $setting->website = $request->website;
            $setting->storage_path = $request->storage_path;
            $setting->max_upload = $request->max_upload;
            $setting->WorkinghoursFrom = $request->WorkinghoursFrom;
            $setting->WorkinghoursTo = $request->WorkinghoursTo;
            $setting->Holidays = $request->Holidays;
            $setting->from1 = $request->from1;
            $setting->to1 = $request->to1;
            $setting->from2 = $request->from2;
            $setting->to2 = $request->to2;        
            $setting->from3 = $request->from3;
            $setting->to3 = $request->to3;        
            $setting->from4 = $request->from4;
            $setting->to4 = $request->to4;        
            $setting->from5 = $request->from5;
            $setting->to5 = $request->to5;       
            $setting->from6 = $request->from6;
            $setting->to6 = $request->to6;
            $setting->from7 = $request->from7;
            $setting->to7 = $request->to7;
            // $setting->address_id  = $address->id;
            $setting->name_en = $request->name_en;
            $setting->name_ar  = $request->name_ar;
            $setting->save();

        }else{
            $setting =new Setting();
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'setting_');
            }else{
                $path = public_path('assets/images/ico/user.png');
            }
            $setting->town_id = $request->town_id;
            $setting->city_id = $request->city_id;
            $setting->region_id = $request->region_id;
            $setting->logo = url($path);
            $setting->phone_one = $request->phone_one;
            $setting->phone_two = $request->phone_two;
            $setting->email = $request->email;
            $setting->fax = $request->fax;
            $setting->website = $request->website;
            $setting->storage_path = $request->storage_path;
            $setting->max_upload = $request->max_upload;
            $setting->WorkinghoursFrom = $request->WorkinghoursFrom;
            $setting->WorkinghoursTo = $request->WorkinghoursTo;
            $setting->Holidays = $request->Holidays;
            $setting->from1 = $request->from1;
            $setting->to1 = $request->to1;
            $setting->from2 = $request->from2;
            $setting->to2 = $request->to2;        
            $setting->from3 = $request->from3;
            $setting->to3 = $request->to3;        
            $setting->from4 = $request->from4;
            $setting->to4 = $request->to4;        
            $setting->from5 = $request->from5;
            $setting->to5 = $request->to5;       
            $setting->from6 = $request->from6;
            $setting->to6 = $request->to6;
            $setting->from7 = $request->from7;
            $setting->to7 = $request->to7;
            // $setting->address_id  = $address->id;
            $setting->name_ar = $request->name_ar;
            $setting->name_en = $request->name_en;
            $setting->save();

        }
        return response()->json($setting);
    }
    
    public function Organization_info(Request $request)
    {
        // $ArchiveCount=0;
        // $ArchiveCount = count(Archive::where('enabled',1)->where('type','munArchive')->orwhere('name','')->where('enabled',1)->get());

        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('type','munArchive')
        // ->orwhere('archives.name','')
        ->where('enabled',1)
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

        // $Archivelist['Archive'] = $Archive;
        // $Archivelist['ArchiveCount'] = $ArchiveCount;
        // return response()->json($Archivelist);
    }



    public function Organization_law(Request $request)
    {
        // $ArchiveCount=0;
        // $ArchiveCount = count(Archive::where('enabled',1)->where('type','munArchive')->orwhere('name','')->where('enabled',1)->get());

        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('type','lawArchieve')
        ->where('archives.name',null)
        // ->orWhere('archives.name','')
        ->where('enabled',1)
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('files')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

        // $Archivelist['Archive'] = $Archive;
        // $Archivelist['ArchiveCount'] = $ArchiveCount;
        // return response()->json($Archivelist);
    }

    public function Organization_archive_count(Request $request)
    {
        $ArchiveCount  =0;
        $lawArchiveCount=0;
        $ArchiveCount = count(Archive::where('enabled',1)->where('type','munArchive')->where('enabled',1)->get());
        $lawArchiveCount = count(Archive::where('enabled',1)->where('type','lawArchieve')->where('archives.name',null)->where('enabled',1)->get());

        $allArchiveCount=0;
        $allArchiveCount=$ArchiveCount+$lawArchiveCount;

        $Archivelist['ArchiveCount'] = $ArchiveCount;
        $Archivelist['LawArchiveCount'] = $lawArchiveCount;
        $Archivelist['AllArchiveCount'] = $allArchiveCount;
        return response()->json($Archivelist);
    }

    public function uploadPic(Request $request){
        if ($request->hasFile('imgPic')) {
            $file=$request->file('imgPic');
          

                $url = upload_image($file, 'image_');
                if ($url) 
                {
                    $uploaded_files = File::create([
                        'url' => $url,
                        'real_name' => $file->getClientOriginalName(),
                        'extension' => $file->getClientOriginalExtension(),
                    ]);
                }
            return response()->json(['file'=>$uploaded_files,'Input'=>'imgPic']);
        }
        else if ($request->hasFile('header_img_file')) {
            $file=$request->file('header_img_file');
          

                $url = upload_image($file, 'image_');
                if ($url) 
                {
                    $uploaded_files = File::create([
                        'url' => $url,
                        'real_name' => $file->getClientOriginalName(),
                        'extension' => $file->getClientOriginalExtension(),
                    ]);
                }
            return response()->json(['file'=>$uploaded_files,'Input'=>'header_img']);
        }
        else if ($request->hasFile('footer_img_file')) {
            $file=$request->file('footer_img_file');
          

                $url = upload_image($file, 'image_');
                if ($url) 
                {
                    $uploaded_files = File::create([
                        'url' => $url,
                        'real_name' => $file->getClientOriginalName(),
                        'extension' => $file->getClientOriginalExtension(),
                    ]);
                }
            return response()->json(['file'=>$uploaded_files,'Input'=>'footer_img']);
        }
        
    }

}
