<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Admin;
use App\Models\User;
use App\Models\TicketConfig;
use App\Models\Constant;
use App\Models\Region;
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
use App\Models\AppTrans;
use App\Models\water;
use App\Models\elec;
use App\Models\License;
use App\Models\Smslog;
use App\Models\AppResponse;
use App\Models\Department;
use DB;
use App\Models\Orgnization;
use App\Models\Setting;

class PrintTicket extends Controller
{
    var $user_name='';
    var $user_pass='';
    var $sender   ='';
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
    
    function prepearFees(Request $request){
        $feesValue=$request->feesValue;
        $feesText=$request->feesText;
        $attachArr=array();
        if($feesText)
        for($i=0;$i<sizeof($feesText);$i++){
            if(trim($feesText[$i])!=''){
            $temp=array();
            $temp['feesText']=trim($feesText[$i]);
            $temp['feesValue']=trim($feesValue[$i]);
            $attachArr[]=$temp;
            }
        }
        return $attachArr;
    }
    
    function prepeardebt(Request $request){
        $debtName=$request->debtname;
        $debtValue=$request->debtValue;
        $debtEmp=$request->debtEmp;
        $debtArr=array();
        if($debtName)
        for($i=0;$i<sizeof($debtName);$i++){
            if(trim($debtName[$i])!=''){
            $temp=array();
            $temp['debtName']=trim($debtName[$i]);
            $temp['debtValue']=trim($debtValue[$i]);
            $temp['debtEmp']=trim($debtEmp[$i]);
            $debtArr[]=$temp;
            }
        }
        return $debtArr;
    }
    
    function getAttach( $file_ids=array()){
        $attachArr=array();
        foreach($file_ids as $row){
            $row->Files=File::where('id',$row->attach_ids)->get();
        }
        return $file_ids;
    }
    
    function updateCMobile($customer,$mobile){
        $mystring = $mobile;
        $findme   = '056';
		
        $user=User::find($customer);
		if(!$user)
			return;
		//dd($user);
        $pri= substr($mystring, 0, 3);
        if ($pri == $findme) 
		    $user->phone_two=$mystring;
		else
		    $user->phone_one=$mystring;
		$user->save();
    }
    
    
    function sendSMS($mobile,$msg){
        //{"url":"http:\/\/hotsms.ps\/","sendSMS":1,"page":"sendbulksms.php","username":"Zababdeh M","password":"5873071","sender":"Zababdeh M"}
         $username=urlencode('Expand.ps');
         $password=urlencode('8096210');
         $sender  =urlencode('Expand.ps');
         $match=array();
        $message1=urlencode('$msg');
        $result= file_get_contents("http://hotsms.ps/sendbulksms.php?user_name=".$username."&user_pass=".$password."&sender=".$sender."&mobile=$mobile&type=2&text=".$message1);
    }
    
    function addSmsLog($sender,$txt,$s_mobile,$reciver_name,$app_id,$app_type,$status){
        
        $str1 = $mobile;
        $pattern = "/\d{10}/";
        $mob='';
        if( preg_match($pattern,$str1, $match) ){
            if(strlen($match[0])==10)
               $mob= substr ( $match[0] , 1,9);
            else
                return ;
        }
        else return ;
        $mob='972'.$mob;
        $smslog= new Smslog();
        $smslog->sender=$sender;
        $smslog->txt=$txt;
        $smslog->mob=$mob;
        $smslog->reciver_name=$reciver_name;
        $smslog->app_id=$app_id;
        $smslog->app_type=$app_type;
        $smslog->status=$this->sendSMS($mob,$txt);
        $smslog->save();
    }
    
    public function addReplay(Request $request){
        $appTrans=AppTrans::find($request->trans_id);
        if($appTrans){
            DB::update("update app_ticket".$appTrans->related."s set ticket_status=".$request->app_status1." where id=".$request->ticket_id );
        }
        $appResponse=new AppResponse();
        $appResponse->trans_id	=$request->trans_id;
        $appResponse->ticket_id=$request->ticket_id;
        $appResponse->app_type=$request->app_type;
        $appResponse->s_text=$request->details.(strlen(trim($request->details))>0?'<br />'.$request->details1:$request->details1);
        $appResponse->i_status=$request->app_status1;	
        $appResponse->trans_note='';	
        $appResponse->created_by=Auth()->user()->id;
        $appResponse->i_source=1;
        
        
        $attach_ids=$request->attach_ids;
        $attachName=$request->attachName1;
        $attachArr=array();
        if($attach_ids)
        for($i=0;$i<sizeof($attach_ids);$i++){
            $temp=array();
            $temp['attachName']=trim($attachName[$i]);
            $temp['attach_ids']=trim($attach_ids[$i]);
            $attachArr[]=$temp;
        }
        $appResponse->file_ids	=json_encode($attachArr);
        $appResponse->save();
            if ($appResponse) {
                return response()->json(['receiverid'=>$appTrans->reciver_id,'app_id'=>$appTrans->ticket_id,'app_type'=>$appTrans->related,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
    }
    public function addTrans(Request $request){
        //dd($request);
        $appTrans=new AppTrans();	
        $appTrans->ticket_id	=$request->ticket_id;
        $appTrans->ticket_type	=$request->app_type;	
        $appTrans->sender_id	=Auth()->user()->id;	
        $appTrans->reciver_id=	$request->AssignedToID;		
        $appTrans->s_note		=$request->s_response?$request->s_response."<br />".$request->note:'تم إرسال التحويلة'."<br />".$request->note;
        $appTrans->recive_type	=1	;
        $appTrans->is_seen		=0;
        $appTrans->curr_dept	=$request->AssDeptID;
        $appTrans->related	=$request->related;
        $appTrans->created_by	=Auth()->user()->id;
        $tag=$request->tags?$request->tags:array();
        $appTrans->tagged_users=json_encode($tag);
        $appTrans->save();
    		
            DB::update("update app_ticket".$request->related."s set active_trans=".$appTrans->id." where id=".$request->ticket_id );
            if ($appTrans) {
                return response()->json(['app_id'=>$request->ticket_id,'app_type'=>$request->related,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
    }
    public function getTicketHistory($ticket_id=0,$related=0){
       
        return DB::select("SELECT
    a.*,sender_tbl.nick_name sender_name,sender_tbl.image sender_image,receive_tbl.nick_name receive_name,receive_tbl.image receive_image
FROM
    (
    SELECT
        `id`,
        `ticket_id`,
        `related`,
        `sender_id`,
        `created_at`,
        '[]' `file_ids`,
        IFNULL(`s_note`, '') s_note,
        '' trans_note,
        `reciver_id`,
        `recive_type`,
        tagged_users
    FROM
        `app_trans`
    UNION
SELECT
    `trans_id`,
    `ticket_id`,
    `app_type`,
    `created_by`,
    `created_at`,
    `file_ids`,
    `s_text`,
    `trans_note`,
    `created_by`,
    0,'[]'tagged_users
FROM
    `app_responses`
) a join admins sender_tbl
on a.sender_id=sender_tbl.id
left join  admins receive_tbl
on a.sender_id=receive_tbl.id
WHERE `ticket_id`=".$ticket_id." 
and `related`=".$related."
order by created_at asc"); 

    }
    public function printTicket($ticket_id=0,$related=0)
	{
	    $ticket=array();
	    $helpers=array();
	    $config=array();
        $helpers['department']=Department::get();
        $helpers['appStatus']=Constant::where('parent',5001)->where('status',1)->get();
		if($related==1){
		    $ticket=AppTicket1::find($ticket_id);
            $helpers['subsList']=Constant::where('parent',39)->get();
            
		}
		if($related==2){
		    $ticket=AppTicket2::find($ticket_id);
		}
		if($related==4){
		    $ticket=AppTicket4::find($ticket_id);
            
		}
		if($related==5){
		    $ticket=AppTicket5::find($ticket_id);
		    
            
		}
		if($related==6){
		    $ticket=AppTicket6::find($ticket_id);
		    if($ticket->subs)
		    $subsId=json_decode($ticket->subs);
		    else
		    $subsId=["0"];
		    if($ticket->app_type==2)
            {
                $subs = water::where('waters.enabled',1)->whereIn('waters.id',$subsId)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs=elec::where('elecs.enabled',1)->whereIn('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            $ticket->setAttribute('subscription',$subs);
            
		}
		if($related==7){
		    $ticket=AppTicket7::find($ticket_id);
		    if($ticket->subs)
		    $subsId=json_decode($ticket->subs);
		    else
		    $subsId=["0"];
		    if($ticket->app_type==2)
            {
                $subs = water::where('waters.enabled',1)->whereIn('waters.id',$subsId)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs=elec::where('elecs.enabled',1)->whereIn('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            $ticket->setAttribute('subscription',$subs);
            
		}
		if($related==8){
		    $ticket=AppTicket8::find($ticket_id);
		    if($ticket->subs)
		    $subsId=json_decode($ticket->subs);
		    else
		    $subsId=["0"];
		    if($ticket->app_type==2)
            {
                $subs = water::where('waters.enabled',1)->whereIn('waters.id',$subsId)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs=elec::where('elecs.enabled',1)->whereIn('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            $ticket->setAttribute('subscription',$subs);
            
		}
		if($related==9){
		    $ticket=AppTicket9::find($ticket_id);
		    if($ticket->subs)
		    $subsId=($ticket->subs);
		    else
		    $subsId=0;
		    if($ticket->app_type==2)
            {
                $subs = water::where('waters.enabled',1)->where('waters.id',$subsId)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs=elec::where('elecs.enabled',1)->where('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            $ticket->setAttribute('subscription',$subs);
            $lic = License::where('id','=',$ticket->licNo)->first();
            $ticket->setAttribute('license',$lic);
            
		}
		if($related==10){
		    $ticket=AppTicket10::find($ticket_id);
		    if($ticket->subs)
		    $subsId=($ticket->subs);
		    else
		    $subsId=0;
		    if($ticket->app_type==2)
            {
                $subs = water::where('waters.enabled',1)->where('waters.id',$subsId)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs=elec::where('elecs.enabled',1)->where('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            $ticket->setAttribute('subscription',$subs);
            $lic = License::where('id','=',$ticket->licNo)->first();
            $ticket->setAttribute('license',$lic);
            
		}
		if($related==11){
		    $ticket=AppTicket11::find($ticket_id);
		    if($ticket->subs)
		    $subsId=($ticket->subs);
		    else
		    $subsId=0;
		    if($ticket->app_type==2)
            {
                $subs = water::where('waters.enabled',1)->where('waters.id',$subsId)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs=elec::where('elecs.enabled',1)->where('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            
            
            if($ticket->subs1)
		    $subsId1=($ticket->subs1);
		    else
		    $subsId1=0;
		    if($ticket->app_type==2)
            {
                $subs1 = water::where('waters.enabled',1)->where('waters.id',$subsId1)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs1=elec::where('elecs.enabled',1)->where('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            
            $ticket->setAttribute('subscription',$subs);
            $ticket->setAttribute('subscription1',$subs1);
            $lic = License::where('id','=',$ticket->licNo)->first();
            $ticket->setAttribute('license',$lic);
            
		}
		
		if($related==12){
		    $ticket=AppTicket12::find($ticket_id);
		    $helpers['ticketTypeList']=Constant::where('parent',6011)->where('status',1)->get();
            
		}
		
		if($related==13){
		    $ticket=AppTicket13::find($ticket_id);
		    if($ticket->subs)
		    $subsId=json_decode($ticket->subs);
		    else
		    $subsId=["0"];
		    if($ticket->app_type==2)
            {
                // $subs=water::whereIn('id',$subsId)->get();
                $subs = water::where('waters.enabled',1)->whereIn('waters.id',$subsId)->select('waters.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'waters.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'waters.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'waters.payType')
        
                ->leftJoin('users','users.id','waters.user_id')
                ->get();
            }
            else
            $subs=elec::where('elecs.enabled',1)->whereIn('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            $ticket->setAttribute('subscription',$subs);
            
		}
		if($related==14){
		    $ticket=AppTicket14::find($ticket_id);
            
		}
		if($related==15){
		    $ticket=AppTicket15::find($ticket_id);
		    if($ticket->subs)
		    $subsId=json_decode($ticket->subs);
		    else
		    $subsId=["0"];
            $subs=elec::where('elecs.enabled',1)->where('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            
            $ticket->setAttribute('subscription',$subs);
            $lic = License::where('id','=',$ticket->licNo)->first();
            $ticket->setAttribute('license',$lic);
            
		}
		if($related==16){
		    $ticket=AppTicket16::find($ticket_id);
		    
            
		}
		if($related==17){
		    $ticket=AppTicket17::find($ticket_id);
		    if($ticket->subs)
		    $subsId=$ticket->subs;
		    else
		    $subsId=0;
            $subs=elec::where('elecs.enabled',1)->where('elecs.id',$subsId)->select('elecs.*', 'users.name as user_name','a.name as subscription_Type_name','b.name as counter_Type_name','d.name as payType_name')
                ->leftJoin('t_constant as a', 'a.id', 'elecs.subscription_Type')
        
                ->leftJoin('t_constant as b', 'b.id', 'elecs.counter_Type')
        
                ->leftJoin('t_constant as d', 'd.id', 'elecs.payType')
        
                ->leftJoin('users','users.id','elecs.user_id')
                ->get();
            
            $ticket->setAttribute('subscription',$subs);
            $lic = License::where('id','=',$ticket->licNo)->first();
            $ticket->setAttribute('license',$lic);
            
	    }
	    if($related==18){
		    $ticket=AppTicket18::find($ticket_id);
		    $helpers['buildingStatusList'] = Constant::where('parent',6014)->where('status',1)->get();
            $helpers['buildingTypeList'] = Constant::where('parent',6016)->where('status',1)->get();
            $helpers['officeAreaList'] = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
            
            
	    }
	    if($related==19){
		    $ticket=AppTicket19::find($ticket_id);
            $helpers['buildingTypeList'] = Constant::where('parent',6016)->where('status',1)->get();
            $helpers['officeAreaList'] = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
            
            
	    }
	    if($related==20){
		    $ticket=AppTicket20::find($ticket_id);
            
	    }
	    if($related==21){
		    $ticket=AppTicket21::find($ticket_id);
            
	    }
	    if($related==22){
		    $ticket=AppTicket22::find($ticket_id);
            $helpers['buildingTypeList'] = Constant::where('parent',6016)->where('status',1)->get();
            $helpers['officeAreaList'] = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
            
            
	    }
	    if($related==23){
		    $ticket=AppTicket23::find($ticket_id);
            $helpers['ticketTypeList'] = Constant::where('parent',6029)->where('status',1)->get();
            
		}
		if($related==24){
		    $ticket=AppTicket24::find($ticket_id);
		}
		if($related==25){
		    $ticket=AppTicket25::find($ticket_id);
		}
		if($related==26){
		    $ticket=AppTicket26::find($ticket_id);
	    }
	    //dd($ticket);
        $config=TicketConfig::where('ticket_no',$related)->where('app_type',$ticket->app_type)->get();
        $res=$this->getTicketHistory($ticket_id,$related);
        foreach($res as $row){
            $row->Files=$this->getAttach(json_decode($row->file_ids));
            $arr=json_decode($row->tagged_users);
            $row->taged=array();
            if(sizeof($arr)>0)
                $row->taged= Admin::whereIn('id',$arr)->get();
        }
        $ticket->setAttribute('history',$res);
        $ticket->setAttribute('ticket_type',$related);
        
        if($ticket->file_ids!=null){
            $ticket->setAttribute('Files',$this->getAttach(json_decode($ticket->file_ids)));
        }
        else
        {
            $ticket->setAttribute('Files',array());
        }
        $region_name="";
        if($ticket->region!=null){
            $reg = Region::find($ticket->region)->first();
         $region_name=$reg->name;
            $ticket->setAttribute('region_name',$region_name);
        }
        else
        {
            $ticket->setAttribute('region_name',$region_name);
        }
        $national="";
        if($ticket->customer_id!=null){
            $reg = User::where('id','=',$ticket->customer_id)->first();
         $national=$reg->national_id;
            $ticket->setAttribute('national',$national);
        }
        else
        {
            $ticket->setAttribute('national',$national);
        }
        $helpers['region']=Region::get();
        $app_type=$ticket->app_type;
        $ticket->setAttribute('AppTrans',AppTrans::where('ticket_type',$related)->where('ticket_id',$ticket_id)->get());
        $type = 'receive';
        $setting = Setting::first();
        return view('dashboard.ticketPrint.index', compact('type','app_type','setting','ticket','related','config','helpers'));
	}
	
    public function editTicket($ticket_id=0,$related=0)
	{
	    $ticket=array();
	    $helpers=array();
	    $config=TicketConfig::where('ticket_no',$related)->get();
		if($related==1){
		    $ticket=AppTicket1::find($ticket_id);
            $helpers['subsList']=Constant::where('parent',39)->get();
            $helpers['region']=Region::get();
            $ticket->setAttribute('Files',$this->getAttach(json_decode($ticket->file_ids)));
            $ticket->setAttribute('ticket_type',1);
            $ticket->setAttribute('AppTrans',AppTrans::where('ticket_type',1)->where('ticket_id',$ticket_id)->get());
		}
	
        $type = 'receive';
        return view('dashboard.ticketRecive.index', compact('type','ticket','related','config','helpers'));
	}
	public function saveTrans($id=0,$ticket_type=1,$AssignedToID,$note,$AssDeptID,$type=1,$related,Request $request){
        $appTrans=new AppTrans();	
        $appTrans->ticket_id	=$id;
        $appTrans->ticket_type	=$ticket_type;	
        $appTrans->sender_id	=Auth()->user()->id;	
        $appTrans->reciver_id=	$AssignedToID;		
        $appTrans->s_note		=$note;
        $appTrans->recive_type	=$type	;
        $appTrans->is_seen		=0;
        $appTrans->curr_dept	=$AssDeptID;
        $appTrans->related	=$related;
        $appTrans->created_by	=Auth()->user()->id;
        $tag=$request->tags?$request->tags:array();
        $appTrans->tagged_users=json_encode($tag);
        $appTrans->save();
        return $appTrans->id;
    }
	
}