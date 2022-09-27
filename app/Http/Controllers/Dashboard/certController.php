<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Yajra\DataTables\DataTables;
use DB;
use App\Models\CertExtention;
use App\Models\Cert;
use App\Models\Setting;
use App\Models\File;
use App\Models\Archive;
use App\Models\User;
use Illuminate\Support\Str;
class certController extends Controller
{
    public function index()

    {
        $CertExtention = CertExtention::where('b_enabled','=','1')->where('e_type','=','1')->get();
        
        $CertCount = count(Cert::where('e_type','=','1')->get())+1;
        
        $type = 'cert';
        $e_type = 1;
        $url = "cert";
        
        $setting = Setting::first();

        return view('dashboard.cert.cert', compact('type', 'url','CertExtention','e_type','setting','CertCount'));

    }
    public function sendOut()

    {
        $CertExtention = CertExtention::where('b_enabled','=','1')->where('e_type','=','2')->get();
        
        $CertCount = count(Cert::where('e_type','=','2')->get())+1;
        
        $type = 'cert';
        $e_type = 2;
        $url = "sendOut";
        
        $setting = Setting::first();

        return view('dashboard.cert.sendOut', compact('type', 'url','CertExtention','e_type','setting','CertCount'));

    }
    public function saveCert(Request $request){
        if($request->pk_id)
            {
                $CertExtention=CertExtention::where('pk_i_id','=',$request->pk_id)->first();
            }
        else
          {
              $CertExtention = new CertExtention();
          }
        // dd($CertExtention);
          $CertExtention->s_name_ar = $request->s_name_ar1;
          $CertExtention->cercontent = json_encode($request->cercontent);
          $CertExtention->e_type = $request->e_type;
          $CertExtention->cost_cert = $request->cost_cert;
          $CertExtention->save();

        if ($CertExtention) {
            return response()->json(['status'=>trans('admin.extention_added')]);
        }else{
            return response()->json(['status'=>$validator->errors()->all()]);
        }
    }
    function prepearAttach(Request $request){
        $attach_ids=$request->attach_ids;
        $attachName=$request->attachName;
        $attachArr=array();
        if($attach_ids)
        for($i=0;$i<sizeof($attach_ids);$i++){
            $temp=array();
            $temp['attachName']=trim($attachName[$i]);
            $temp['attach_ids']=trim($attach_ids[$i]);
            $attachArr[]=$temp;
        }
        return $attachArr;
    }
    function prepeardebt(Request $request){
        $debtName=$request->debtname;
        $debtValue=$request->debtValue;
        $debtEmp=$request->debtEmp;
        $debtPayed=$request->debtPayed;
        $debtVoucher=$request->debtVoucher;
        $debtArr=array();
        if($debtName)
        for($i=0;$i<sizeof($debtName);$i++){
            if(trim($debtName[$i])!=''){
            $temp=array();
            $temp['debtName']=trim($debtName[$i]);
            $temp['debtValue']=trim($debtValue[$i]);
            $temp['debtEmp']=trim($debtEmp[$i]);
            $temp['debtPayed']=trim($debtPayed[$i]);
            $temp['debtVoucher']=trim($debtVoucher[$i]);
            $debtArr[]=$temp;
            }
        }
        $debtArr['debt_total']=$request->debt_total;
        $debtArr['payment']=$request->payment;
        $debtArr['rest']=$request->rest;
        // $debtArr['waslNo']=$request->waslNo;
        return $debtArr;
    }
    
    function saveCertFilesArchieve(Request $request,$taskname='',$tasklink='',$model='App\\Models\\User'){
        $files_ids = $request->attach_ids;

        if ($files_ids) {
            $i=0;
            foreach ($files_ids as $id) {
                $archive = new Archive();
                
                $archive->model_id = $request->citizen_id;
                
                $archive->type_id = '6046';
                
                $archive->name = $request->citizen_name;
                
                $archive->model_name = $model;
                
                $date=date("Y/m/d");
                
                $from = explode('/', ($date));
                
                $from = $from[2] . '-' . $from[1] . '-' . $from[0];
                
                $archive->date = $from;
                
                $archive->task_name = $taskname;
                
                $archive->task_link = $tasklink;
                
                $archive->title = $request->attachName[$i];
        
                $archive->type = 'certArchive';
        
                $archive->serisal = '';
        
                if($request->model=='App\\Models\\User')
                
                    $archive->url =  'cit_archieve';
                else
                    $archive->url =  'org_archieve';
        
                $archive->add_by = Auth()->user()->id;
        
                //dd( $request->customername=='0',$request->customername,$archive);
                $archive->save();
        
                $file = File::find($id);

                $file->archive_id = $archive->id;

                $file->model_name = "App\Models\Archive";

                $file->save();
                
                $i++;
            }

        }
    }
    
    function updateCNationalID($customer,$nationalID){
        $mystring = $nationalID;
        
        $user=User::find($customer);
		if(!$user)
			return;
		//dd($user);

	    $user->national_id=$nationalID;
		$user->save();
    }
    
    public function saveCertDetails(Request $request){
      
        if($request->cer_pk_id&&$request->cer_pk_id!=0)
            {
                $Cert=Cert::where('pk_i_id','=',$request->cer_pk_id)->first();
            }
        else
            {
                $Cert = new Cert();
            }
        // dd($Cert);
          $Cert->citizen_name = $request->citizen_name;
          $Cert->citizen_id = $request->citizen_id;
          $Cert->model = $request->model;
          $Cert->cercontent = json_encode($request->cercontent);
          $Cert->msg_content = json_encode($request->msg_content);
          $Cert->e_type = $request->e_type;
          $Cert->msgTitle = $request->msgTitle;
          $Cert->recept_no = $request->recept_no;
          $Cert->cost = $request->cost;
          $Cert->serial_per_year = $request->serial_per_year;
          $Cert->NationalID = $request->NationalID;
          $Cert->cer_date = $request->cer_date;
          $Cert->benefitS = $request->benefitS;
          $Cert->add_by = Auth()->user()->id;
          $Cert->debt_json	=$this->prepeardebt($request);
          $Cert->file_ids	=json_encode($this->prepearAttach($request));
          $Cert->sentDir = $request->sentDir;
          $Cert->sentId = $request->sentId;
          $Cert->sentModel =$request->sentModel;
          $Cert->save();

        if ($Cert) {
            
            if($request->NationalID!=null && $request->NationalID!=''){
                $this->updateCNationalID($request->citizen_id,$request->NationalID)  ; 
            }
            
           if($request->cer_pk_id==null&&$request->cer_pk_id==0){ 
                $link='';
                $name='شهادات / مراسات خارجية';
                $this->saveCertFilesArchieve($request,$name,$link,$request->model);
            }
            return response()->json(['status'=>trans('admin.extention_added')]);
        }else{
            return response()->json(['status'=>$validator->errors()->all()]);
        }
    }
    
    public function deleteCert(Request $request){
        if($request->pk_id)
            {
                $CertExtention=CertExtention::where('pk_i_id','=',$request->pk_id)->first();
            }
        else
            {
                return;
                // return response()->json(['status'=>$validator->errors()->all()]);
            }   
        // dd($CertExtention);
          $CertExtention->b_enabled = 0;
          $CertExtention->save();

        if ($CertExtention) {
            return response()->json(['status'=>trans('admin.extention_added')]);
        }else{
            return response()->json(['status'=>$validator->errors()->all()]);
        }
    }
    
    public function getCertifications(Request $request){

        $CertExtention=CertExtention::where('b_enabled','=','1')->where('e_type','=',$request->e_type)->get();
        return response()->json($CertExtention);
    }
    
    public function getCertificationsUser(Request $request){
        $Cert=Cert::where('t_farfromcenter.e_type','=',$request->e_type)->select('t_farfromcenter.*','t_certification.s_name_ar as cer_name')
        ->leftJoin('t_certification','t_certification.pk_i_id','t_farfromcenter.msgTitle')
        ->with('Admin')
        ->orderBy('t_farfromcenter.cer_date', 'DESC')
        ->get();
        
        foreach($Cert as $row){
                if($row->model && $row->citizen_id != null && $row->citizen_id != 0 && $row->citizen_id != '' )
                {
                    $st=$row->model;
                    $url = explode('\\', ($st));
                    $url=trim(Str::lower($url[2]));
                    $url=$url."s";
                    if($url=='specialassets'){
                        $url='special_assets';
                    }
                    //$row->files[]=$temp;
                    // if($url=='user')
                    // {
                    //     dd($row);
                    // }
                    $uu = DB::select('select url,name from '.$url.' where id='.$row->citizen_id);
                    if($uu!=[]){
                        $uu=$uu[0];
                    }
                    $row->setAttribute('url',$uu);
                }
                else
                {
                    $row->setAttribute('url',array());
                }
        }
        
        
        return DataTables::of($Cert)

                            ->addIndexColumn()

                            ->make(true);

    }
    function getAttach( $file_ids=array()){
        $attachArr=array();
        foreach($file_ids as $row){
            $row->Files=File::where('id',$row->attach_ids)->get();
        }
        return $file_ids;
    }
    public function getUserCertification(Request $request){
        //   dd($request->all());
        if($request->id&&$request->id!=0)
        {
            $Cert=Cert::find($request->id);
            
                $Cert->cercontent=json_decode($Cert->cercontent);
                
            if($Cert->file_ids!=null){
                $Cert->setAttribute('all_files',$this->getAttach($Cert->file_ids));
            }
            else
            {
                $Cert->setAttribute('all_files',array());
            }
            
        return response()->json($Cert);
        }
        else
        {
        return response()->json(array());
        }
    }
    public function getCertification(Request $request){
           // dd($_POST);
        if($request->id&&$request->id!=0)
        {
            $CertExtention=CertExtention::find($request->id);
            
                $CertExtention->cercontent=json_decode($CertExtention->cercontent);
            
        return response()->json($CertExtention);
        }
        else
        {
        return response()->json(array());
        }
    }
    // public function printDes(Request $request){
    //     ///dd($request);
    //     $res=AgendaTopic::with('AgendaDetail')->with('AgendaDetail.CertExtention')->with('AgendaDetail.CertExtention.Admin')->find($request->id);
    //     $type='printDes';
    //   return view('dashboard.archive.printDes',compact('res'));
        
    // }

}
