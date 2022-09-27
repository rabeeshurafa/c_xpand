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
use App\Models\Payment;
use App\Models\Illness;
use App\Models\Archive;
use App\Models\File;
use App\Managers\AttatchmentManager;
use App\Http\Requests\PaymentRequest;
use DB;


class SubscriberWarning extends Controller
{
    public function index(){
        $type = 'warning';
        $orgs=Constant::where('parent',211)->where('status',1)->get();
        return view('dashboard.subscribeWarning.index',compact('type','orgs'));
    }
    
    public function store_payment(Request $request){
        DB::beginTransaction();
        // dd($request->all());
        $payment=Payment::find($request->paymentId);
        
        if($payment!=null){
            
            if($request->date!=null&&$request->date!=''){
                $date = explode('/', ($request->date));
    
                $date = $date[2] . '-' . $date[1] . '-' . $date[0];
                $payment->date=$date;
            }else{
                $payment->date=null;
            }
            $payment->add_by=Auth()->user()->id;
            $payment->aged_name=$request->agedName;
            $payment->payment_val=$request->AmountInNIS;
            $payment->payment_cur=$request->CurrencyID;
            $payment->aged_id=$request->aged_id;
            $payment->emp_name=$request->empName;
            $payment->emp_id=$request->empId;
            $payment->payment=$request->payment;
            $payment->payment_no=$request->paymentNo;
            $payment->payment_org=$request->paymentOrg;
            $payment->org_id=0;
            $payment->rest=$request->rest;
            $payment->notes=$request->notes;
            $payment->file_ids=json_encode(AttatchmentManager::prepearAttach($request));
            
            $payment->save();
        }else{
            $payment=new Payment();

            if($request->date!=null&&$request->date!=''){
                $date = explode('/', ($request->date));
    
                $date = $date[2] . '-' . $date[1] . '-' . $date[0];
                $payment->date=$date;
            }else{
                $payment->date=null;
            }
            $payment->add_by=Auth()->user()->id;
            $payment->aged_name=$request->agedName;
            $payment->payment_val=$request->AmountInNIS;
            $payment->payment_cur=$request->CurrencyID;
            $payment->aged_id=$request->aged_id;
            $payment->emp_name=$request->empName;
            $payment->emp_id=$request->empId;
            $payment->payment=$request->payment;
            $payment->payment_no=$request->paymentNo;
            $payment->payment_org=$request->paymentOrg;
            $payment->org_id=0;
            $payment->rest=$request->rest;
            $payment->notes=$request->notes;
            $payment->file_ids=json_encode(AttatchmentManager::prepearAttach($request));
            
            $payment->save();
            
            $link='';
            $name='سند قبض';
            $this->savePaymentArchieve($request,$name,$link);
            
        }
        DB::commit();
        if ($payment) {

            return response()->json(['success'=>trans('admin.employee_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    function savePaymentArchieve(Request $request,$taskname='',$tasklink='',$model='App\\Models\\Aged'){
        $files_ids = $request->attach_ids;

        if ($files_ids) {
            $i=0;
            foreach ($files_ids as $id) {
                $archive = new Archive();
        
                $archive->model_id = $request->aged_id;
        
                $archive->type_id = '6046';
        
                $archive->name = $request->agedName;
        
                $archive->model_name = $model;
        
                $date=date("Y/m/d");
                
                $from = explode('/', ($date));
    
                $from = $from[0] . '-' . $from[1] . '-' . $from[2];
                
                $archive->date = $from;
                
                $archive->task_name = $taskname;
                
                $archive->task_link = $tasklink;
                
                $archive->title = $request->attachName1[$i];
        
                $archive->type = 'PaymentArchive';
        
                $archive->serisal = '';
        
                $archive->url =  'Payment_archieve';
        
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
    
    
    public function payment_info(Request $request)
    {
        // dd($request->all);

        $payment['info'] = Payment::where('id',$request['payment_id'])->first();
       if($payment['info']->file_ids!=null){
            $payment['info']->setAttribute('Files',AttatchmentManager::getAttach(json_decode($payment['info']->file_ids)));
        }
        return response()->json($payment);

    }

    public function payment_delete(Request $request)
    {
        // dd($request->all());
        $payment= Payment::find($request['payment_id']);
        $payment->deleted_by = Auth()->user()->id;
        $payment->enabled=0;
        $payment->save();
        
        if ($payment) {
            return response()->json(['success'=>trans('admin.subscriber_added')]);

        }
        return response()->json(['error'=>$validator->errors()->all()]);
       
    }

    public function payment_info_all()

    {
        $payment= Payment::select('payments.*')->where('payments.enabled','1')->orderBy('payments.id', 'DESC');

        return DataTables::of($payment)

                            ->addIndexColumn()

                            ->make(true);

    }

}

