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
       
        $ticket=$ticket1->merge($ticket2)->merge($ticket4)
        ->merge($ticket5)->merge($ticket6)->merge($ticket7)
        ->merge($ticket8)->merge($ticket9)->merge($ticket10)
        ->merge($ticket11)->merge($ticket12)->merge($ticket13)
        ->merge($ticket14)->merge($ticket15)->merge($ticket16)
        ->merge($ticket17)->merge($ticket18)->merge($ticket19)
        ->merge($ticket20)->merge($ticket21)->merge($ticket22)
        ->merge($ticket23)->merge($ticket24)->merge($ticket25)
        ->merge($ticket26)->merge($ticket27);      
        
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
       
        $ticket=$ticket1->merge($ticket2)->merge($ticket4)
        ->merge($ticket5)->merge($ticket6)->merge($ticket7)
        ->merge($ticket8)->merge($ticket9)->merge($ticket10)
        ->merge($ticket11)->merge($ticket12)->merge($ticket13)
        ->merge($ticket14)->merge($ticket15)->merge($ticket16)
        ->merge($ticket17)->merge($ticket18)->merge($ticket19)
        ->merge($ticket20)->merge($ticket21)->merge($ticket22)
        ->merge($ticket23)->merge($ticket24)->merge($ticket25)
        ->merge($ticket26)->merge($ticket27);      
        
       
        for($i=0 ; $i<count($ticket);$i++){
            $res= AppTrans::where('app_trans.id',$ticket[$i]['active_trans'])->join('ticket_configs', function($join)
                         {
                             $join->on('ticket_configs.app_type', '=', 'app_trans.ticket_type');
                             $join->on('ticket_configs.ticket_no','=','app_trans.related');
                         })->with('Admin')->first();
                        //  dd($res);
            for($c=0 ; $c < count($admins) ; $c++){
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
