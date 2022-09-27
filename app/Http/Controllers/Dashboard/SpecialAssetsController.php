<?php



namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\City;

use App\Models\Town;

use App\Models\Region;

use App\Models\Admin;

use App\Models\AssetStatus;

use App\Models\SpecialAsset;

use App\Models\Address;

use App\Http\Requests\AssetRequest;

use Yajra\DataTables\DataTables;

use App\Models\Archive;

use App\Models\CopyTo;

use App\Models\linkedTo;

use App\Models\Setting;

use App\Models\Constant;
use App\Models\File;
use App\Models\AgendaTopic;


class SpecialAssetsController extends Controller

{

    public function buildings(){

        $city = City::get();

        $type = 'buildings';

        $assetStatus = Constant::where('parent',82)->where('status',1)->get();

        

        $setting = Setting::first();

        $address = Address::where('id',$setting->address_id)->first();

        $town = Town::where('city_id',$setting->city_id)->get();

        $region = Region::get();

        $admins = Admin::where('enabled',1)->get();

        return view('dashboard.specialAssets.index',compact('type','city','assetStatus','admins','address','region','town'));

    }

    public function building_delete(Request $request)
    {
        // dd($request->all());
        $building= SpecialAsset::find($request['building_id']);
        $building->deleted_by = Auth()->user()->id;
        $building->enabled=0;
        // dd($user->all());
        $building->save();

        $archives=  Archive::where('model_id', $building->id)->where('model_name', 'App\\Models\\SpecialAsset')->get();
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

        $copyTo=CopyTo::where('model_id', $building->id)->where('model_name', 'App\\Models\\SpecialAsset')->get();
        foreach($copyTo as $copy){
            $copy->deleted_by = Auth()->user()->id;
            $copy->enabled = 0;
            $copy->save();
        }

        if ($building) {

            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function Gardens_lands(){

        $city = City::get();

        $type = 'Gardens_lands';

        $assetStatus = Constant::where('parent',82)->where('status',1)->get();

        

        $setting = Setting::first();

        $address = Address::where('id',$setting->address_id)->first();

        $town = Town::where('city_id',$setting->city_id)->get();

        $region = Region::get();

        $admins = Admin::where('enabled',1)->get();

        return view('dashboard.specialAssets.index',compact('type','city','assetStatus','admins','address','region','town'));

    }

    public function warehouses(){

        $city = City::get();

        $type = 'warehouses';

        $assetStatus = Constant::where('parent',82)->where('status',1)->get();

        

        $setting = Setting::first();

        $address = Address::where('id',$setting->address_id)->first();

        $town = Town::where('city_id',$setting->city_id)->get();

        $region = Region::get();

        $admins = Admin::where('enabled',1)->get();

        return view('dashboard.specialAssets.index',compact('type','city','assetStatus','admins','address','region','town'));

    }



    public function store_assets(AssetRequest $request){
        // dd($request->all());
        if($request->special_id == null){

            $specialAsset = new SpecialAsset();

            // $address = new Address();

            // $address->town_id = $request->TownID;

            // $address->city_id = $request->CityID;

            // $address->region_id = $request->townID;

            // $address->details = $request->AddressDetails;

            // $address->notes = $request->Note;

            // $address->save();

            if ($request->file('imgPic')) {

                $path = upload_image($request->file('imgPic'), 'special_asset_');

            }else{

                $path = '';

            }

            $specialAsset->model = "App\Models\SpecialAsset";

            $specialAsset->name = $request->BName;

            $specialAsset->price = $request->OrgSalary;

            $specialAsset->notes = $request->NoteAR;
            
            $specialAsset->town_id = $request->town_id;

            $specialAsset->city_id = $request->city_id;

            $specialAsset->region_id = $request->region_id;

            $specialAsset->details = $request->AddressDetails;

            $specialAsset->notes1 = $request->Note;


            $specialAsset->currency = $request->OrgCurrencyID;

            $specialAsset->admin_id  = $request->pich;

            $specialAsset->asset_statuses_id = $request->ownType;

            // $specialAsset->addresse_id  = $address->id;

            $specialAsset->type = $request->type;

            $specialAsset->add_by = Auth()->user()->id;

            $specialAsset->url =  $request->type;

            $specialAsset->image  = url($path);

            if($request->type=='Gardens_lands'){
                $specialAsset->area_name1 =  $request->AreaName;
                $specialAsset->hod_No =  $request->HodNo;
                $specialAsset->pice_No =  $request->PiceNo;
            }

            $specialAsset->save();

         }else{

            $specialAsset = SpecialAsset::find($request->special_id);

            if ($request->file('imgPic')) {

                $path = upload_image($request->file('imgPic'), 'special_asset_');

            }else{

                $path = $specialAsset->image;

            }

            $specialAsset->name = $request->BName;

            $specialAsset->price = $request->OrgSalary;

            $specialAsset->notes = $request->NoteAR;
            
            $specialAsset->town_id = $request->town_id;

            $specialAsset->city_id = $request->city_id;

            $specialAsset->region_id = $request->region_id;

            $specialAsset->details = $request->AddressDetails;

            $specialAsset->notes1 = $request->Note;
            
            $specialAsset->currency = $request->OrgCurrencyID;

            $specialAsset->admin_id  = $request->pich;

            $specialAsset->asset_statuses_id = $request->ownType;

            $specialAsset->type = $request->type;

            $specialAsset->image  = url($path);

            if($request->type=='Gardens_lands'){
                $specialAsset->area_name1 =  $request->AreaName;
                $specialAsset->hod_No =  $request->HodNo;
                $specialAsset->pice_No =  $request->PiceNo;
            }

            $specialAsset->save();

         }

         if ($specialAsset) {

            return response()->json(['success'=>trans('admin.equpment_added')]);

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }



    public function asset_auto_complete(Request $request)

    {

        $asset_data = $request['request']['term'];

        $type = $request['type'];

        $names = SpecialAsset::where('name', 'like', '%' . $asset_data . '%')->where('enabled',1)->where('type',$type)->select('*','name as label')->get();

        return response()->json($names);

    } 

    public function asset_info(Request $request)

    {

        $special['info'] = SpecialAsset::find($request['asset_id']);

        $model = $special['info']->model;

        

        $special['copyToCount']  = count(CopyTo::where('model_id',$request['asset_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $special['linkToCount']  = count(AgendaTopic::where('connected_to',$request['asset_id'])
        ->where('model',$model)->get());

        $special['archiveCount'] = count(Archive::where('model_id',$request['asset_id'])->where('enabled',1)

        ->where('model_name',$model)->whereNotIn('type', ['contractArchive'])->get());



        $ArchiveCount = count(Archive::where('model_id',$request['asset_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        $CopyToCount = count(CopyTo::where('model_id',$request['asset_id'])->where('enabled',1)

        ->where('model_name',$model)->get());

        // $Archive =Archive::where('model_id',$request['asset_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archiveType')->with('Admin')->with('copyTo')->with('files')->orderBy('archives.date', 'DESC')->get();

        // $special['Archive'] = $Archive;

        $special['contractArchiveCount']  = count(Archive::where('model_id',$request['asset_id'])->where('enabled',1)
        ->where('model_name',$model)->where('type', 'contractArchive')->get());


        // $jalArchive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        // ->where('connected_to',$request['asset_id'])
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
        // $special['jalArchive'] = $jalArchive;
        
        $jalArchiveCount = count(AgendaTopic::where('connected_to',$request['asset_id'])
        ->where('model',$model)->get());
        

        $special['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;



        // $CopyTo = CopyTo::where('model_id',$request['asset_id'])->where('enabled',1)

        // ->where('model_name',$model)->with('archive','archive.files')->with('archive','archive.Admin')->get();

        // $special['copyTo'] = $CopyTo;



        $special['admin'] = Admin::where('id',$special['info']->admin_id)->first()->name;

        $asset_status= Constant::where('id',$special['info']->asset_statuses_id )->first();
        if($asset_status!=null)
            $special['asset_status'] = $asset_status->name;

        // $special['address'] = Address::where('id', $special['info']['addresse_id'])->first();

        //dd($special['address']);

        if($special['info']->city_id){

            $special['city'] =City::where('id',$special['info']->city_id)->first()->name;

        }
        else
        $special['city']= '';

        if($special['info']->town_id){

            $special['town'] =Town::where('id',$special['info']->town_id)->first()->name;

        }
        else
        $special['town']= '';

        if($special['info']->region_id){

            $special['region'] =Region::where('id',$special['info']->region_id)->first()->name;

        }
        else
        $special['region']= '';

        $special['Currency'] = trans('admin.'.$special['info']->currency);

        return response()->json($special);



    }

    public function assetsArchive(Request $request){

         $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')->where('enabled',1)
        ->where('model_id',$request['assets_id'])
        ->whereNotIn('type', ['contractArchive'])
        ->where('model_name','App\\Models\\SpecialAsset')
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

    public function assetsCopyArchive(Request $request){
        
        $Archive = CopyTo::where('model_id',$request['assets_id'])->where('enabled',1)
        ->where('model_name','App\\Models\\SpecialAsset')->with('archive','archive.Admin')->with('archive','archive.files')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }

    public function assetsJalArchive(Request $request){

         $Archive = AgendaTopic::with('AgendaDetail')->with('AgendaDetail.AgendaExtention')->with('AgendaDetail.AgendaExtention.Admin')
        ->where('connected_to',$request['assets_id'])
        ->where('model','App\\Models\\SpecialAsset')->get();
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

    public function assetsContractArchive(Request $request){
        $Archive =Archive::select('archives.*', 't_constant.name as type_id_name')
        ->where('enabled',1)
        ->where('model_id',$request['assets_id'])
        ->where('model_name','App\\Models\\SpecialAsset')
        ->where('type','contractArchive')
        ->leftJoin('t_constant', 't_constant.id', 'archives.type_id')
        ->with('archiveType')->with('copyTo')->with('files')->with('Admin')->orderBy('archives.date', 'DESC')->get();

        return DataTables::of($Archive)

        ->addIndexColumn()

        ->make(true);

    }


    public function asset_info_all(Request $request)

    {

        $type=$request['type'];

        $special = SpecialAsset::select('special_assets.*','regions.name as region_name','cities.name as city_name',

        'towns.name as town_name','admins.nick_name as manager_name')
        ->where('special_assets.enabled',1)
        ->leftJoin('admins','admins.id','special_assets.admin_id')

        ->leftJoin('regions','special_assets.region_id','regions.id')

        ->leftJoin('cities','special_assets.city_id','cities.id')

        ->leftJoin('towns','special_assets.town_id','towns.id')->where('type',$type)->orderBy('id', 'DESC');

        return DataTables::of($special)

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

