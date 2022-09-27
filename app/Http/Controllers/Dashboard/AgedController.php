<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Address;
use App\Models\Area;
use App\Models\Setting;
use Yajra\DataTables\DataTables;
use App\Models\Constant;
use App\Models\Aged;
use App\Models\Illness;
use App\Http\Requests\AgedRequest;
use DB;


class AgedController extends Controller
{
    public function index(){
        $city = City::get();
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $area = Area::get();
        // $region = Region::get();
        $sponser=Constant::where('parent',107)->where('status',1)->get();
        // dd($sponser->all());
        $type = 'aged';
        return view('dashboard.aged.index',compact('type','city','area','address','sponser'));
    }
    public function store_aged(AgedRequest $request){
        dd($request->all());
        DB::beginTransaction();
        // dd($request->all());
        $aged=Aged::find($request->aged_id);
        
        if($aged!=null){
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'aged_');
            }else{
                $path = $aged->image;
            }
            
            if($request->Birthdate!=null&&$request->Birthdate!=''){
                $Birthdate = date('Y-m-d',strtotime($request->Birthdate));
                $aged->birth_date=$Birthdate;
            }else{
                $aged->birth_date=null;
            }

            if($request->JoiningDate!=null&&$request->JoiningDate!=''){
                $JoiningDate = date('Y-m-d',strtotime($request->JoiningDate));
                $aged->enter_date=$JoiningDate;
            }else{
                $aged->enter_date=null;
            }

            if($request->insuranceStart!=null&&$request->insuranceStart!=''){
                $insuranceStart = date('Y-m-d',strtotime($request->insuranceStart));
                $aged->insurance_start=$insuranceStart;
            }else{
                $aged->insurance_start=null;
            }

            if($request->insuranceEnd!=null&&$request->insuranceEnd!=''){
                $insuranceEnd = date('Y-m-d',strtotime($request->insuranceEnd));
                $aged->insurance_end=$insuranceEnd;
            }else{
                $aged->insurance_end=null;
            }

            $aged->add_by=Auth()->user()->id;
            $aged->name=$request->Name;
            $aged->national_id=$request->NationalID;
            $aged->image=url($path);
            $aged->phone=$request->MobileNo1;
            $aged->marital_status=$request->MaritalStatus;
            $aged->blood_type=$request->BloodType;
            $aged->city=$request->CityID;
            $aged->area=$request->TownID;
            $aged->cost=$request->AmountInNIS;
            $aged->curr=$request->CurrencyID;
            $aged->sponser=$request->sponser;
            $aged->kindred_name=json_encode($request->name);
            $aged->kindred_phone=json_encode($request->phone);
            $aged->kindred_kinderedType=json_encode($request->kinderedType);
            $aged->notes=$request->notes;
            $aged->issuer=$request->issuer;
            $aged->issuerNum=$request->issuerNum;
            $aged->model="App\\Models\\Aged";
            $aged->url="aged";
            
            $aged->save();
            
            Illness::where('aged_id',$aged->id)->delete();
            
            if(isset($request->DiseasesName)){
                for($i=0 ; $i< count($request->DiseasesName) ; $i++){
                    if($request->DiseasesName[$i]!=null){
                        $illness=new Illness();
                        $illness->name=$request->DiseasesName[$i];
                        $illness->since=$request->Diseasesfrom[$i];
                        $illness->doctor=$request->doctor1[$i];
                        $illness->medicine=$request->treatment1[$i];
                        $illness->type=1;
                        $illness->aged_id=$aged->id;
                        $illness->save();
                    }
                }
                
            }
            
            if(isset($request->mentalName)){
                for($i=0 ; $i< count($request->mentalName) ; $i++){
                    if($request->mentalName[$i]!=null){
                        $illness=new Illness();
                        $illness->name=$request->mentalName[$i];
                        $illness->since=$request->mentalfrom[$i];
                        $illness->doctor=$request->doctor2[$i];
                        $illness->medicine=$request->treatment2[$i];
                        $illness->type=2;
                        $illness->aged_id=$aged->id;
                        $illness->save();
                    }
                }
                
            }
            
        }else{
            $aged=new Aged();

            $aged->add_by=Auth()->user()->id;
            $aged->name=$request->Name;
            $aged->national_id=$request->NationalID;

            if($request->Birthdate!=null&&$request->Birthdate!=''){
                $Birthdate = date('Y-m-d',strtotime($request->Birthdate));
                $aged->birth_date=$Birthdate;
            }else{
                $aged->birth_date=null;
            }

            if($request->JoiningDate!=null&&$request->JoiningDate!=''){
                $JoiningDate = date('Y-m-d',strtotime($request->JoiningDate));
                $aged->enter_date=$JoiningDate;
            }else{
                $aged->enter_date=null;
            }

            if($request->insuranceStart!=null&&$request->insuranceStart!=''){
                $insuranceStart = date('Y-m-d',strtotime($request->insuranceStart));
                $aged->insurance_start=$insuranceStart;
            }else{
                $aged->insurance_start=null;
            }

            if($request->insuranceEnd!=null&&$request->insuranceEnd!=''){
                $insuranceEnd = date('Y-m-d',strtotime($request->insuranceEnd));
                $aged->insurance_end=$insuranceEnd;
            }else{
                $aged->insurance_end=null;
            }

            $aged->phone=$request->MobileNo1;
            $aged->marital_status=$request->MaritalStatus;
            $aged->blood_type=$request->BloodType;
            $aged->city=$request->CityID;
            $aged->area=$request->TownID;
            $aged->cost=$request->AmountInNIS;
            $aged->curr=$request->CurrencyID;
            $aged->sponser=$request->sponser;
            $aged->kindred_name=json_encode($request->name);
            $aged->kindred_phone=json_encode($request->phone);
            $aged->kindred_kinderedType=json_encode($request->kinderedType);
            $aged->notes=$request->notes;
            $aged->issuer=$request->issuer;
            $aged->issuerNum=$request->issuerNum;
            $aged->model="App\\Models\\Aged";
            $aged->url="aged";
            
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'volunteer_');
            }else{
                $path = '';
            }
            $aged->image=url($path);
            $aged->save();
            
            if(isset($request->DiseasesName)){
                for($i=0 ; $i< count($request->DiseasesName) ; $i++){
                    if($request->DiseasesName[$i]!=null){
                        $illness=new Illness();
                        $illness->name=$request->DiseasesName[$i];
                        $illness->since=$request->Diseasesfrom[$i];
                        $illness->doctor=$request->doctor1[$i];
                        $illness->medicine=$request->treatment1[$i];
                        $illness->type=1;
                        $illness->aged_id=$aged->id;
                        $illness->save();
                    }
                }
                
            }
            
            if(isset($request->mentalName)){
                for($i=0 ; $i< count($request->mentalName) ; $i++){
                    if($request->mentalName[$i]!=null){
                        $illness=new Illness();
                        $illness->name=$request->mentalName[$i];
                        $illness->since=$request->mentalfrom[$i];
                        $illness->doctor=$request->doctor2[$i];
                        $illness->medicine=$request->treatment2[$i];
                        $illness->type=2;
                        $illness->aged_id=$aged->id;
                        $illness->save();
                    }
                }
                
            }
            
            
            
        }
        DB::commit();
        if ($aged) {

            return response()->json(['success'=>trans('admin.employee_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    public function aged_auto_complete(Request $request)
    {
        $aged_data = $request['term'];
        $names = Aged::where('name', 'like', '%' . $aged_data . '%')->select('*','name as label')->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }
    
    public function aged_info(Request $request)
    {
        // dd($request->all);
        
            // dd($request->all);
        $aged['info'] = Aged::where('id',$request['aged_id'])->with('illness')->first();
        
        $maritalStatus=$aged['info']->marital_status;
        
        $aged['info']->kindred_kinderedType=json_decode($aged['info']->kindred_kinderedType);
        $aged['info']->kindred_name=json_decode($aged['info']->kindred_name);
        $aged['info']->kindred_phone=json_decode($aged['info']->kindred_phone);
        
        return response()->json($aged);

    }

    public function aged_delete(Request $request)
    {
        // dd($request->all());
        $aged= Aged::find($request['aged_id']);
        // dd(Auth()->user()->id);
        $aged->deleted_by = Auth()->user()->id;
        $aged->enabled=0;
        // dd($user->all());
        $aged->save();
        
        if ($aged) {



            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }

     

        return response()->json(['error'=>$validator->errors()->all()]);
       
    }

    public function aged_info_all()

    {
        $aged= Aged::select('ageds.*')->where('ageds.enabled','1')->orderBy('ageds.id', 'DESC');

        return DataTables::of($aged)

                            ->addIndexColumn()

                            ->make(true);

    }

    // function upload_image($file, $prefix){

    //     if($file){

    //         $files = $file;

    //         $imageName = $prefix.rand(3,999).'-'.time().'.'.$files->extension();

    //         $image = "storage/".$imageName;

    //         $files->move(public_path('storage'), $imageName);

    //         $getValue = $image;

    //         return $getValue;

    //     }

    // }
}

