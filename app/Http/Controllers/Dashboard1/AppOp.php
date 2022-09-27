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
use App\Models\AppTicket27;
use App\Http\Requests\TicketRequest;
use App\Http\Requests\TicketRequest2;
use App\Http\Requests\TicketRequest3;
use App\Http\Requests\TicketRequest4;
use App\Http\Requests\TicketRequest5;
use App\Http\Requests\TicketRequest6;
use App\Http\Requests\TicketRequest7;
use App\Http\Requests\TicketRequest8;
use App\Http\Requests\TicketRequest9;
use App\Models\AppTrans;
use App\Models\water;
use App\Models\elec;
use App\Models\License;
use App\Models\Smslog;
use App\Models\AppResponse;
use App\Models\Department;
use DB;
use App\Models\Orgnization;


class AppOp extends Controller
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
        // dd($request->all());
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
        
        if($request->s_response!=null)
            $str=$request->s_response;
        else 
        $str='تم تحويل الطلب';
        if($request->note!=null)
            $str.='<br/><b style="color:#5599FE">ملاحظات: </b>'.trim($request->note);
        
        $appResponse=new AppResponse();
        $appResponse->trans_id	=$request->trans_id;
        $appResponse->ticket_id=$request->ticket_id;
        $appResponse->app_type=$request->app_type;
        $appResponse->s_text=$request->details.$request->details1;//.(strlen(trim($request->details))>0?'<br /><b style="color:#5599FE">ملاحظات: </b>'.$request->details1:$request->details1);
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
        if($request->s_response!=null)
            $str=$request->s_response;
        else 
        $str='تم تحويل الطلب';
        if($request->note!=null)
            $str.='<br/><b style="color:#5599FE">ملاحظات: </b>'.trim($request->note);
        
        $appTrans=new AppTrans();	
        $appTrans->ticket_id	=$request->ticket_id;
        $appTrans->ticket_type	=$request->app_type;	
        $appTrans->sender_id	=Auth()->user()->id;	
        $appTrans->reciver_id=	$request->AssignedToID;	
        $appTrans->s_note		=$str;
        $appTrans->recive_type	=1	;
        $appTrans->is_seen		=0;
        $appTrans->curr_dept	=$request->AssDeptID;
        $appTrans->related	=$request->related;
        $appTrans->created_by	=Auth()->user()->id;
        $tag=$request->tags?$request->tags:array();
        $appTrans->tagged_users=json_encode($tag);
        
        //dd($str,$appTrans);
        $appTrans->save();
    // 		dd($appTrans);
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
on a.reciver_id=receive_tbl.id
WHERE `ticket_id`=".$ticket_id." 
and `related`=".$related."
order by created_at asc"); 

    }
    public function viewTicket($ticket_id=0,$related=0)
	{
	    DB::update("update app_trans set is_seen=1 where reciver_id=".Auth()->user()->id." and related=".$related." and ticket_id=".$ticket_id );
	    $ticket=array();
	    $helpers=array();
	    $config=array();
	    $helpers['region']=
        $helpers['department']=Department::where('enabled','=','1')->get();
        $helpers['appStatus']=Constant::where('parent',5001)->where('status',1)->get();
		if($related==1){
		    $ticket=AppTicket1::find($ticket_id);
            $helpers['subsList']=Constant::where('parent',39)->get();
            $helpers['region']=Region::get();
		}
		if($related==2){
		    $ticket=AppTicket2::find($ticket_id);
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
            $helpers['region']=Region::get();
		}
		if($related==4){
		    $ticket=AppTicket4::find($ticket_id);
            $helpers['region']=Region::get();
		}
		if($related==5){
		    $ticket=AppTicket5::find($ticket_id);
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
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
		}
		if($related==12){
		    $ticket=AppTicket12::find($ticket_id);
		    $helpers['ticketTypeList']=Constant::where('parent',6011)->where('status',1)->get();
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
		}
		if($related==14){
		    $ticket=AppTicket14::find($ticket_id);
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
		}
		if($related==16){
		    $ticket=AppTicket16::find($ticket_id);
		    
            $helpers['region']=Region::get();
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
            $helpers['region']=Region::get();
	    }
	    if($related==18){
		    $ticket=AppTicket18::find($ticket_id);
		    $helpers['buildingStatusList'] = Constant::where('parent',6014)->where('status',1)->get();
            $helpers['buildingTypeList'] = Constant::where('parent',6016)->where('status',1)->get();
            $helpers['officeAreaList'] = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
            
            $helpers['region']=Region::get();
	    }
	    if($related==19){
		    $ticket=AppTicket19::find($ticket_id);
            $helpers['buildingTypeList'] = Constant::where('parent',6016)->where('status',1)->get();
            $helpers['officeAreaList'] = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
            
            $helpers['region']=Region::get();
	    }
	    if($related==20){
		    $ticket=AppTicket20::find($ticket_id);
            $helpers['region']=Region::get();
	    }
	    if($related==21){
		    $ticket=AppTicket21::find($ticket_id);
            $helpers['region']=Region::get();
	    }
	    if($related==22){
		    $ticket=AppTicket22::find($ticket_id);
            $helpers['buildingTypeList'] = Constant::where('parent',6016)->where('status',1)->get();
            $helpers['officeAreaList'] = Orgnization::where('org_type','space')->select('orgnizations.*')->where('enabled',1)->get();
            
            $helpers['region']=Region::get();
	    }
	    if($related==23){
		    $ticket=AppTicket23::find($ticket_id);
		    $helpers['ticket_name']=Constant::select('name')->where('id',$ticket->task_type)->where('status',1)->first();
            $helpers['ticketTypeList'] = Constant::where('parent',6029)->where('status',1)->get();
            $helpers['region']=Region::get();
		}
		if($related==24){
		    $ticket=AppTicket24::find($ticket_id);
		}
		if($related==25){
		    $ticket=AppTicket25::find($ticket_id);
		}
		if($related==26){
		    $ticket=AppTicket26::find($ticket_id);
            $helpers['region']=Region::get();
	    }
		if($related==27){
		    $ticket=AppTicket27::find($ticket_id);
		    $helpers['resonTypeList']=Constant::where('parent',6033)->get();
            // $helpers['region']=Region::get();
	    }
	    //dd($ticket);
	    if($ticket==null)
	        return redirect()->route('admin.dashboard');
	    //dd($ticket);
        $config=TicketConfig::where('ticket_no',$related)->where('app_type',$ticket->app_type)->get();
        // dd($ticket->app_type);
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
        $app_type=$ticket->app_type;
        $ticket->setAttribute('AppTrans',AppTrans::where('ticket_type',$related)->where('ticket_id',$ticket_id)->get());
        $type = 'receive';
        return view('dashboard.ticketRecive.index', compact('type','app_type','ticket','related','config','helpers'));
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
	public function deleteTicket(Request $request)
	{
	    //dd($request);
	    $related = $request->related;
	    $ticket_id = $request->ticket_id;

	    $res=0;
	    $res = DB::update('DELETE FROM app_ticket'.$related.'s WHERE id='.$ticket_id);
	    $res = DB::update('DELETE FROM `app_trans` WHERE `ticket_id`='.$ticket_id.' and `related`='.$related );
		if($res!=0){
            return response()->json(['success'=>'تم الحذف بنجاح']);
		}
	
            return response()->json(['error'=>'error!!']);
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
	public function saveTicket1(TicketRequest $request){
	   // dd($this->prepeardebt($request));
        $app_id=$request->app_id;
        $ticket_type=1;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',1)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket1::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket1();
            $app->app_no=$max;	
            $app->receipt_no	=$request->ReciptNo;	
            $app->phase	        =$request->phase[0];	
            $app->inAmper	    =$request->inAmper;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->subscription_type	=$request->subscriptionType;	
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->app_type		=$request->app_type;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->ownership_type=$request->Ownership[0];		
            $app->owner_id		=$request->Ownership[0]==1?0:$request->SubscriberID1;
            $app->owner_name	=$request->Ownership[0]==1?'':$request->OwnerName;	
            $app->LicenceNo		=$request->LicenceNo;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            ////$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();/*
    		$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket1::find($app_id);
            $app->receipt_no	=$request->ReciptNo;
            $app->phase	        =$request->phase[0];	
            $app->inAmper	    =$request->inAmper;
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->subscription_type	=$request->subscriptionType;	
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->ownership_type=$request->Ownership[0];		
            $app->owner_id		=$request->Ownership[0]==1?0:$request->SubscriberID1;
            $app->owner_name	=$request->Ownership[0]==1?'':$request->OwnerName;	
            $app->LicenceNo		=$request->LicenceNo;
            $app->app_type		=$request->app_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            ////$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket2(TicketRequest2 $request){
        $app_id=$request->app_id;
        $ticket_type=2;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ;
        
        $config=TicketConfig::where('ticket_no',2)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket1::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket2();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->subs = json_encode($request->SubscribtionIdList);
            $app->app_type		=$request->app_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
            /*
    		$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket2::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket4(TicketRequest2 $request){
        $app_id=$request->app_id;
        $ticket_type=4;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo); 
        
        $config=TicketConfig::where('ticket_no',4)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket4::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket4();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->app_type		=$request->app_type;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->malDesc		=$request->malDesc; 
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket4::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->app_type		=$request->app_type;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket5(TicketRequest2 $request){
        $app_id=$request->app_id;
        $ticket_type=5;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',5)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket5::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket5();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->subs = json_encode($request->SubscribtionIdList);
            $app->app_type		=$request->app_type;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket5::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->created_by	=Auth()->user()->id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket6(TicketRequest2 $request){
        $app_id=$request->app_id;
        $ticket_type=6;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',6)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket6::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket6();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->subs = json_encode($request->SubscribtionIdList);
            $app->app_type		=$request->app_type;
            $app->b_enabled		=1;
            $app->phase	        =$request->phase[0];
            $app->created_by	=Auth()->user()->id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket6::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->phase	        =$request->phase[0];
            $app->app_type		=$request->app_type;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket7(TicketRequest2 $request){
        $app_id=$request->app_id;
        $ticket_type=7;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',7)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket7::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket7();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->subs = json_encode($request->SubscribtionIdList);
            $app->app_type		=$request->app_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->phase	        =$request->phase[0];
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket7::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->phase	        =$request->phase[0];
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket8(TicketRequest3 $request){
        $app_id=$request->app_id;
        $ticket_type=8;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',8)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        
        if(!$app_id){
            $maxRec=AppTicket8::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket8();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->subs = json_encode($request->SubscribtionIdList);
            
            $app->app_type		=$request->app_type;
            
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;		
            $app->region1		=$request->AreaID1;
            $app->address1		=isset($request->Address1)?$request->Address1:'';

            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket8::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;		
            $app->region1		=$request->AreaID1;
            $app->address1		=isset($request->Address1)?$request->Address1:'';
            $app->malDesc1		=$request->malDesc1;
            
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket9(TicketRequest5 $request){
        $app_id=$request->app_id;
        $ticket_type=9;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',9)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        
        if(!$app_id){
            $maxRec=AppTicket9::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket9();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->subs = $request->counters;
            $app->app_type		=$request->app_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket9::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->subs = $request->counters;
            $app->app_type		=$request->app_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }

    public function saveTicket10(TicketRequest4 $request){
        $app_id=$request->app_id;
        $ticket_type=10;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',10)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        
        if(!$app_id){
            $maxRec=AppTicket10::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket10();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->subs = $request->counters;
            
            $app->app_type		=$request->app_type;
            
            $app->licNo		=$request->licNo;
            $app->pos		=$request->pos;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->region1		=$request->AreaID1;
            $app->address1		=isset($request->Address1)?$request->Address1:'';

            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->phase	        =$request->phase[0];
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket10::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->subs = $request->counters;
            $app->app_type		=$request->app_type;
            
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
             $app->licNo		=$request->licNo;
            $app->pos		=$request->pos;
            
            $app->region1		=$request->AreaID1;
            $app->address1		=isset($request->Address1)?$request->Address1:'';

            
            $app->created_by	=Auth()->user()->id;
            $app->phase	        =$request->phase[0];
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket11(TicketRequest6 $request){
        $app_id=$request->app_id;
        $ticket_type=11;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',11)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket11::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket11();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->subs = $request->counters;
            $app->TransferAmount=$request->TransferAmount;		
            $app->app_type		=$request->app_type;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->subs1 = $request->counters1;
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;		

            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket11::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;	

            $app->TransferAmount=$request->TransferAmount;		
            $app->app_type		=$request->app_type;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->subs1 = json_encode($request->SubscribtionIdList1);
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;		

            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
}

    public function saveTicket12(TicketRequest7 $request){
        $app_id=$request->app_id;
        $ticket_type=12;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',12)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket12::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket12();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->task_type	    =$request->task_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket12::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->task_type	=$request->task_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket13(TicketRequest5 $request){
        $app_id=$request->app_id;
        $ticket_type=13;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',13)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket1::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket13();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->subs = json_encode($request->SubscribtionIdList);
            $app->app_type		=$request->app_type;
            $app->CurrVas		=$request->CurrVas;
            $app->CurrAmpere	=$request->CurrAmpere;
            $app->NewAmpere		=$request->NewAmpere;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket13::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->CurrVas		=$request->CurrVas;
            $app->CurrAmpere	=$request->CurrAmpere;
            $app->NewAmpere		=$request->NewAmpere;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket14(TicketRequest7 $request){
        $app_id=$request->app_id;
        $ticket_type=14;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ;
        
        $config=TicketConfig::where('ticket_no',14)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket14::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket14();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->task_type	=$request->task_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket14::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->task_type	=$request->task_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket15(TicketRequest5 $request){
        $app_id=$request->app_id;
        $ticket_type=15;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',15)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket15::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket15();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->phase	        =$request->phase[0];
            $app->kwatt	=$request->kwatt;
            $app->placement	=$request->placement;
            $app->licNo	=$request->licNo;
            $app->subs = json_encode($request->SubscribtionIdList);
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket15::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->phase	        =$request->phase[0];
            $app->kwatt	=$request->kwatt;
            $app->placement	=$request->placement;
            $app->licNo	=$request->licNo;
            $app->subs = json_encode($request->SubscribtionIdList);
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket16(TicketRequest5 $request){
        $app_id=$request->app_id;
        $ticket_type=16;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',16)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket15::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket16();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->phase	        =$request->phase[0];
            $app->inAmper	    =$request->inAmper;
            $app->i_days	=$request->i_days;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket16::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->phase	        =$request->phase[0];
            $app->inAmper	    =$request->inAmper;
            $app->i_days	=$request->i_days;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket17(TicketRequest5 $request){
        $app_id=$request->app_id;
        $ticket_type=17;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',17)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket17::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket17();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->phase	        =$request->phase[0];
            $app->licNo	=$request->licNo;
            $app->subs = $request->counters;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket17::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->licNo	=$request->licNo;
            $app->phase	        =$request->phase[0];
            $app->subs = $request->counters;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket18(TicketRequest9 $request){
        $app_id=$request->app_id;
        $ticket_type=18;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',18)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket18::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket18();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->buildingStatus		=$request->buildingStatus;
            $app->fileNo		=$request->fileNo;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->engOffice		=$request->engOffice;
            $app->buildingType	=$request->buildingType;
            $app->beforeMun		=$request->beforeMun[0];
            
            $app->docs1=json_encode($request->docs1);
            $app->attachReceive1=json_encode($request->attachReceive1);
            $app->docs2=json_encode($request->docs2);
            $app->attachReceive2=json_encode($request->attachReceive2);
            $app->docs3=json_encode($request->docs3);
            $app->attachReceive3=json_encode($request->attachReceive3);
            
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket18::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->buildingStatus		=$request->buildingStatus;
            $app->fileNo		=$request->fileNo;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->engOffice		=$request->engOffice;
            $app->buildingType	=$request->buildingType;
            $app->beforeMun		=$request->beforeMun[0];
            
            
            $app->docs1=json_encode($request->docs1);
            $app->attachReceive1=json_encode($request->attachReceive1);
            $app->docs2=json_encode($request->docs2);
            $app->attachReceive2=json_encode($request->attachReceive2);
            $app->docs3=json_encode($request->docs3);
            $app->attachReceive3=json_encode($request->attachReceive3);
            
            
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket19(TicketRequest9 $request){
        $app_id=$request->app_id;
        $ticket_type=19;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',19)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket19::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket19();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->fileNo		=$request->fileNo;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->engOffice		=$request->engOffice;
            $app->buildingType	=$request->buildingType;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));  
            $app->NameARList=json_encode($request->NameARList);
            $app->NationalIDList=json_encode($request->NationalIDList);
            $app->MobileNo1List=json_encode($request->MobileNo1List);
            $app->s_sideList=json_encode($request->s_sideList);
            $app->attatchName=json_encode($request->attatchName);
            $app->attachReceive=json_encode($request->attachReceive);
            
            
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket19::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->fileNo		=$request->fileNo;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->engOffice		=$request->engOffice;
            $app->buildingType	=$request->buildingType;

            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->NameARList=json_encode($request->NameARList);
            $app->NationalIDList=json_encode($request->NationalIDList);
            $app->MobileNo1List=json_encode($request->MobileNo1List);
            $app->s_sideList=json_encode($request->s_sideList);
            
            $app->attatchName=json_encode($request->attatchName);
            $app->attachReceive=json_encode($request->attachReceive);

            
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket20(TicketRequest8 $request){
        $app_id=$request->app_id;
        $ticket_type=20;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',20)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket20::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket20();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket20::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    public function saveTicket21(TicketRequest $request){
        $app_id=$request->app_id;
        $ticket_type=21;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',21)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket21::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket21();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->app_type		=$request->app_type;
            $app->Applicanttype	=$request->Applicanttype[0];    
            
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;
            
            $app->NameARList=json_encode($request->NameARList);
            $app->NationalIDList=json_encode($request->NationalIDList);
            $app->MobileNo1List=json_encode($request->MobileNo1List);
            $app->s_sideList=json_encode($request->s_sideList);
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->attatchName=json_encode($request->attatchName);
            $app->attachReceive=json_encode($request->attachReceive);
            
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket21::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;
            
            $app->app_type		=$request->app_type;
            $app->Applicanttype	=$request->Applicanttype[0];
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;
            
            $app->NameARList=json_encode($request->NameARList);
            $app->NationalIDList=json_encode($request->NationalIDList);
            $app->MobileNo1List=json_encode($request->MobileNo1List);
            $app->s_sideList=json_encode($request->s_sideList);
            
            $app->attatchName=json_encode($request->attatchName);
            $app->attachReceive=json_encode($request->attachReceive);
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }

    public function saveTicket22(TicketRequest $request){
        $app_id=$request->app_id;
        $ticket_type=22;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ; 
        
        $config=TicketConfig::where('ticket_no',22)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket22::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket22();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->engOffice		=$request->engOffice;
            $app->buildingType	=$request->buildingType;
            $app->siteName	=$request->siteName;
            $app->fileNo		=$request->fileNo;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket22::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->hodNo		=$request->hodNo;
            $app->pieceNo		=$request->pieceNo;
            $app->engOffice		=$request->engOffice;
            $app->buildingType	=$request->buildingType;
            $app->siteName	=$request->siteName;
            $app->fileNo		=$request->fileNo;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    public function saveTicket23(TicketRequest7 $request){
        $app_id=$request->app_id;
        $ticket_type=23;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ;
        
        $config=TicketConfig::where('ticket_no',23)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket23::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket23();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->task_type	=$request->task_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
            /*
    		$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket23::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->task_type	=$request->task_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    public function saveTicket24(TicketRequest $request){
        $app_id=$request->app_id;
        $ticket_type=24;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ;
        
        $config=TicketConfig::where('ticket_no',24)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }
        
        if(!$app_id){
            $maxRec=AppTicket24::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket24();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            // $app->region		=$request->AreaID;
            // $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
            /*
    		$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket24::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            // $app->region		=$request->AreaID;
            // $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->app_type		=$request->app_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    public function saveTicket25(TicketRequest $request){
        $app_id=$request->app_id;
        $ticket_type=25;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ;
        
        $config=TicketConfig::where('ticket_no',25)->where('app_type',$request->app_type)->first();
        // if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
        //     return response()->json(['error'=>'no_attatch']);
        // }
        
        if(!$app_id){
            $maxRec=AppTicket25::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;
            
            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket25();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            // $app->region		=$request->AreaID;
            // $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;		
            $app->app_type		=$request->app_type;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;	
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
            /*
    		$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket25::find($app_id);
            $app->receipt_no	=$request->ReciptNo;	
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;	
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;		
            // $app->region		=$request->AreaID;
            // $app->address		=isset($request->Address)?$request->Address:'';
            $app->malDesc		=$request->malDesc;
            $app->customer_id1	=$request->subscriber_id1;	
            $app->customer_name1	=$request->subscriber_name1;
            $app->customer_mobile1=$request->MobileNo1;	
            $app->app_type		=$request->app_type;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket26(Request $request){
        $app_id=$request->app_id;
        $ticket_type=26;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ;

        $config=TicketConfig::where('ticket_no',26)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }

        if(!$app_id){
            $maxRec=AppTicket26::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;

            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket26();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->orginNo		=$request->orginNo;
            $app->licNo		=$request->licNo;
        
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket26::find($app_id);
            $app->receipt_no	=$request->ReciptNo;
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;
            $app->region		=$request->AreaID;
            $app->address		=isset($request->Address)?$request->Address:'';
            $app->app_type		=$request->app_type;
            $app->orginNo		=$request->orginNo;
            $app->licNo		=$request->licNo;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
    
    public function saveTicket27(Request $request){
        $app_id=$request->app_id;
        $ticket_type=27;
        $this->updateCMobile($request->subscriber_id,$request->MobileNo)  ;

        $config=TicketConfig::where('ticket_no',27)->where('app_type',$request->app_type)->first();
        if($config->force_attach==1 && sizeof($this->prepearAttach($request))<1){
            return response()->json(['error'=>'no_attatch']);
        }

        if(!$app_id){
            $maxRec=AppTicket27::select('app_no')->where('app_type',$request->app_type)->orderBy('id','desc')->limit(1)->get();
            $max=1;

            if(sizeof($maxRec)>0)
                $max=$maxRec[0]->app_no+1;
            $app=new AppTicket27();
            $app->app_no=$max;
            $app->receipt_no	=$request->ReciptNo;
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;
            $app->app_type		=$request->app_type;
            $app->reason		=$request->reason;
            $app->b_enabled		=1;
            $app->created_by	=Auth()->user()->id;
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            $app->malDesc		=$request->malDesc;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->hrs		=$request->restHrs;
            $app->priority		=0;//$request->;
            $app->ticket_status =1;
            $app->active_trans	=1;
            $app->save();
            $app->active_trans=$this->saveTrans($app->id,$request->app_type,$request->AssignedToID,$request->note,$request->AssDeptID,1,$ticket_type,$request);
            $app->save();
    		/*$tag=$request->tags?$request->tags:array();
    		foreach($tag as $row)
    			$this->saveTrans($app->id,$ticket_type,$row,$request->note,$request->AssDeptID,2);*/
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
        else{
            $app=AppTicket27::find($app_id);
            $app->receipt_no	=$request->ReciptNo;
            $app->amount		=$request->AmountInNIS;
            $app->currency		=$request->CurrencyID;
            $app->customer_id	=$request->subscriber_id;
            $app->customer_name	=$request->subscriber_name;
            $app->customer_mobile=$request->MobileNo;
            $app->app_type		=$request->app_type;
            $app->reason		=$request->reason;
            $app->created_by	=Auth()->user()->id;
            $app->updated_at	=date('Y-m-d H:i:s');
            $app->dept_id		=$request->dept_id;
            $app->debt_total		=$request->debtTotal;
            $app->payment		=$request->payment;
            $app->rest		=$request->rest;
            $app->malDesc		=$request->malDesc;
            //$app->waslNo		=$request->waslNo;
            $app->debt_json	=json_encode($this->prepeardebt($request));
            $app->fees_json		=json_encode($this->prepearFees($request));
            $app->file_ids	=json_encode($this->prepearAttach($request));
            $app->save();
            if ($app) {
                return response()->json(['app_id'=>$app->id,'app_type'=>$ticket_type,'success'=>trans('تم الحفظ')]);
            }
            return response()->json(['app_id'=>0,'app_type'=>0,'error'=>'حدث خطأ']);
        }
    }
}