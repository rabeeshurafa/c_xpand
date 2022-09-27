<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\AppTicket1;
use App\Models\AppTicket2;
use App\Models\AppTicket4;
use App\Models\AppTicket5;
use App\Models\AppTicket6;
use App\Models\AppTicket7;
use App\Models\AppTicket8;
use App\Models\AppTicket10;
use App\Models\AppTicket9;
use App\Models\AppTicket11;
use App\Models\AppTicket12;
use App\Models\AppTicket13;
use App\Models\AppTicket14;
use App\Models\AppTicket15;
use App\Models\AppTicket16;
use App\Models\AppTicket17;
use App\Models\AppTicket18;
use App\Models\AppTicket19;
use App\Models\AppTicket20;
use App\Models\AppTicket21;
use App\Models\AppTicket22;
use App\Models\AppTicket23;
use App\Models\AppTicket24;
use App\Models\AppTicket25;
use App\Models\AppTicket26;
use App\Models\AppTicket27;
use App\Models\AppTicket28;
use App\Models\AppTicket29;
use App\Models\AppTicket30;
use App\Models\AppTicket31;
use App\Models\AppTicket32;
use App\Models\AppTicket33;
use App\Models\AppTicket34;
use App\Models\AppTicket35;
use App\Models\Constant;
use App\Models\Admin;
use App\Models\User;
use App\Models\TicketConfig;
use App\Models\AppResponse;
use App\Models\AppTrans;
use Illuminate\Http\Request;

class AllDeptTicket extends Controller
{

    public function index()
    {
        // $city = City::get();
        // $admin = Volunteer::get();
        // $licenseType = LicenseType::where('type','drive_lic')->get();
        // $jobTitle = JobTitle::get();
        // $departments = Department::where('enabled',1)->get('name');
        $departments = $this->getAllDeptticket();
        // dd($departments);
        $type = 'allticket';
        return view('dashboard.all_dept_ticket.index', compact('type','departments'));
    }
    
    function getAllDeptticket(){
        $departments = Department::where('enabled',1)->get();
        for($l=0 ; $l < count($departments) ; $l++){
                
            $departments[$l]['tiketCount']=0;
            $departments[$l]['ticket']=array();

                
        }
        
        $ticket1=AppTicket1::where('ticket_status','!=',5003)->get();
        $ticket2= AppTicket2::where('ticket_status','!=',5003)->get();
        $ticket4= AppTicket4::where('ticket_status','!=',5003)->get();
        $ticket5= AppTicket5::where('ticket_status','!=',5003)->get();
        $ticket6= AppTicket6::where('ticket_status','!=',5003)->get();
        $ticket7= AppTicket7::where('ticket_status','!=',5003)->get();
        $ticket8= AppTicket8::where('ticket_status','!=',5003)->get();
        $ticket9= AppTicket9::where('ticket_status','!=',5003)->get();
        $ticket10= AppTicket10::where('ticket_status','!=',5003)->get();
        $ticket11= AppTicket11::where('ticket_status','!=',5003)->get();
        $ticket12= AppTicket12::where('ticket_status','!=',5003)->get();
        $ticket13= AppTicket13::where('ticket_status','!=',5003)->get();
        $ticket14= AppTicket14::where('ticket_status','!=',5003)->get();
        $ticket15= AppTicket15::where('ticket_status','!=',5003)->get();
        $ticket16= AppTicket16::where('ticket_status','!=',5003)->get();
        $ticket17= AppTicket17::where('ticket_status','!=',5003)->get();
        $ticket18= AppTicket18::where('ticket_status','!=',5003)->get();
        $ticket19= AppTicket19::where('ticket_status','!=',5003)->get();
        $ticket20= AppTicket20::where('ticket_status','!=',5003)->get();
        $ticket21= AppTicket21::where('ticket_status','!=',5003)->get();
        $ticket22= AppTicket22::where('ticket_status','!=',5003)->get();
        $ticket23= AppTicket23::where('ticket_status','!=',5003)->get();
        $ticket24= AppTicket24::where('ticket_status','!=',5003)->get();
        $ticket25= AppTicket25::where('ticket_status','!=',5003)->get();
        $ticket26= AppTicket26::where('ticket_status','!=',5003)->get();
        $ticket27= AppTicket27::where('ticket_status','!=',5003)->get();
        $ticket28= AppTicket28::where('ticket_status','!=',5003)->get();
        $ticket29= AppTicket29::where('ticket_status','!=',5003)->get();
        $ticket30= AppTicket30::where('ticket_status','!=',5003)->get();
        $ticket31= AppTicket31::where('ticket_status','!=',5003)->get();
        $ticket32= AppTicket32::where('ticket_status','!=',5003)->get();
        $ticket33= AppTicket33::where('ticket_status','!=',5003)->get();
        $ticket34= AppTicket34::where('ticket_status','!=',5003)->get();
        $ticket35= AppTicket35::where('ticket_status','!=',5003)->get();
        
        foreach($ticket23 as $temp){
            $type=Constant::where('id',$temp->task_type)->first();
            $temp->taskName=$type->name;
        }
       
        $ticket=$ticket1->mergeRecursive($ticket2)->mergeRecursive($ticket4)
        ->mergeRecursive($ticket5)->mergeRecursive($ticket6)->mergeRecursive($ticket7)
        ->mergeRecursive($ticket8)->mergeRecursive($ticket9)->mergeRecursive($ticket10)
        ->mergeRecursive($ticket11)->mergeRecursive($ticket12)->mergeRecursive($ticket13)
        ->mergeRecursive($ticket14)->mergeRecursive($ticket15)->mergeRecursive($ticket16)
        ->mergeRecursive($ticket17)->mergeRecursive($ticket18)->mergeRecursive($ticket19)
        ->mergeRecursive($ticket20)->mergeRecursive($ticket21)->mergeRecursive($ticket22)
        ->mergeRecursive($ticket23)->mergeRecursive($ticket24)->mergeRecursive($ticket25)
        ->mergeRecursive($ticket26)->mergeRecursive($ticket27)->mergeRecursive($ticket28)
        ->mergeRecursive($ticket29)->mergeRecursive($ticket30)->mergeRecursive($ticket31)
        ->mergeRecursive($ticket32)->mergeRecursive($ticket33)->mergeRecursive($ticket34)
        ->mergeRecursive($ticket35);      
        
        // dd(count($ticket));
        
        //  $ticket=AppTicket1::where('ticket_status','!=',5003)
        // ->leftJoin('app_trans', function($join)
        //                  {
        //                      $join->on('app_ticket1s.id', '=', 'app_trans.ticket_id');
        //                      $join->on('app_ticket1s.app_type','=','app_trans.ticket_type');
        //                  })->get();
        //   dd($ticket);           
        // dd($ticket[0]['id']);
        
        for($i=0 ; $i<count($ticket);$i++){
            $res= AppTrans::where('app_trans.id',$ticket[$i]['active_trans'])->join('ticket_configs', function($join)
                         {
                             $join->on('ticket_configs.app_type', '=', 'app_trans.ticket_type');
                             $join->on('ticket_configs.ticket_no','=','app_trans.related');
                         })->with('Admin')->first();
                        //  dd($res);
            for($c=0 ; $c < count($departments) ; $c++){
                if($res!=null)
                    if($res['curr_dept']==$departments[$c]['id']){
                        $ticket[$i]['Trans']=$res;
                        $ticketArray=$departments[$c]['ticket'];  
                        $ticketArray[]=$ticket[$i];
                        $departments[$c]['tiketCount']=count($ticketArray);
                        $departments[$c]['ticket']=$ticketArray;
                        break;
                    }
                
            }
        }
        return $departments;
    }
    
    function allEmpTicket(Request $request){
        // dd($request->id);
        $admins = Admin::where('department_id',$request->id)->where('enabled',1)->get();
        for($l=0 ; $l < count($admins) ; $l++){
                
            $admins[$l]['tiketCount']=0;
            $admins[$l]['ticket']=array();

                
        }
        
        $ticket1=AppTicket1::where('ticket_status','!=',5003)->get();
        $ticket2= AppTicket2::where('ticket_status','!=',5003)->get();
        $ticket4= AppTicket4::where('ticket_status','!=',5003)->get();
        $ticket5= AppTicket5::where('ticket_status','!=',5003)->get();
        $ticket6= AppTicket6::where('ticket_status','!=',5003)->get();
        $ticket7= AppTicket7::where('ticket_status','!=',5003)->get();
        $ticket8= AppTicket8::where('ticket_status','!=',5003)->get();
        $ticket9= AppTicket9::where('ticket_status','!=',5003)->get();
        $ticket10= AppTicket10::where('ticket_status','!=',5003)->get();
        $ticket11= AppTicket11::where('ticket_status','!=',5003)->get();
        $ticket12= AppTicket12::where('ticket_status','!=',5003)->get();
        $ticket13= AppTicket13::where('ticket_status','!=',5003)->get();
        $ticket14= AppTicket14::where('ticket_status','!=',5003)->get();
        $ticket15= AppTicket15::where('ticket_status','!=',5003)->get();
        $ticket16= AppTicket16::where('ticket_status','!=',5003)->get();
        $ticket17= AppTicket17::where('ticket_status','!=',5003)->get();
        $ticket18= AppTicket18::where('ticket_status','!=',5003)->get();
        $ticket19= AppTicket19::where('ticket_status','!=',5003)->get();
        $ticket20= AppTicket20::where('ticket_status','!=',5003)->get();
        $ticket21= AppTicket21::where('ticket_status','!=',5003)->get();
        $ticket22= AppTicket22::where('ticket_status','!=',5003)->get();
        $ticket23= AppTicket23::where('ticket_status','!=',5003)->get();
        $ticket24= AppTicket24::where('ticket_status','!=',5003)->get();
        $ticket25= AppTicket25::where('ticket_status','!=',5003)->get();
        $ticket26= AppTicket26::where('ticket_status','!=',5003)->get();
        $ticket27= AppTicket27::where('ticket_status','!=',5003)->get();
        $ticket28= AppTicket28::where('ticket_status','!=',5003)->get();
        $ticket29= AppTicket29::where('ticket_status','!=',5003)->get();
        $ticket30= AppTicket30::where('ticket_status','!=',5003)->get();
        $ticket31= AppTicket31::where('ticket_status','!=',5003)->get();
        $ticket32= AppTicket32::where('ticket_status','!=',5003)->get();
        $ticket33= AppTicket33::where('ticket_status','!=',5003)->get();
        $ticket34= AppTicket34::where('ticket_status','!=',5003)->get();
        $ticket35= AppTicket35::where('ticket_status','!=',5003)->get();
        
        foreach($ticket23 as $temp){
            $type=Constant::where('id',$temp->task_type)->first();
            $temp->taskName=$type->name;
        }
       
        $ticket=$ticket1->mergeRecursive($ticket2)->mergeRecursive($ticket4)
        ->mergeRecursive($ticket5)->mergeRecursive($ticket6)->mergeRecursive($ticket7)
        ->mergeRecursive($ticket8)->mergeRecursive($ticket9)->mergeRecursive($ticket10)
        ->mergeRecursive($ticket11)->mergeRecursive($ticket12)->mergeRecursive($ticket13)
        ->mergeRecursive($ticket14)->mergeRecursive($ticket15)->mergeRecursive($ticket16)
        ->mergeRecursive($ticket17)->mergeRecursive($ticket18)->mergeRecursive($ticket19)
        ->mergeRecursive($ticket20)->mergeRecursive($ticket21)->mergeRecursive($ticket22)
        ->mergeRecursive($ticket23)->mergeRecursive($ticket24)->mergeRecursive($ticket25)
        ->mergeRecursive($ticket26)->mergeRecursive($ticket27)->mergeRecursive($ticket28)
        ->mergeRecursive($ticket29)->mergeRecursive($ticket30)->mergeRecursive($ticket31)
        ->mergeRecursive($ticket32)->mergeRecursive($ticket33)->mergeRecursive($ticket34)
        ->mergeRecursive($ticket35);   
        
       
        for($i=0 ; $i<count($ticket);$i++){
            $res= AppTrans::where('app_trans.id',$ticket[$i]['active_trans'])->join('ticket_configs', function($join)
                         {
                             $join->on('ticket_configs.app_type', '=', 'app_trans.ticket_type');
                             $join->on('ticket_configs.ticket_no','=','app_trans.related');
                         })->with('Admin')->first();
                        //  dd($res);
            for($c=0 ; $c < count($admins) ; $c++){
                if($res!=null)
                    if($res['reciver_id']==$admins[$c]['id']){
                        $ticket[$i]['Trans']=$res;
                        $ticketArray=$admins[$c]['ticket'];  
                        $ticketArray[]=$ticket[$i];
                        $admins[$c]['tiketCount']=count($ticketArray);
                        $admins[$c]['ticket']=$ticketArray;
                        break;
                    }
                
            }
        }
        $type = 'allEmpTicket';
        return view('dashboard.all_dept_ticket.allEmpTicket', compact('type','admins'));
        // return $departments;
    }
}
