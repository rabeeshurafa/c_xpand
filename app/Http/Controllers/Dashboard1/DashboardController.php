<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\LastTicket;
use Yajra\DataTables\DataTables;
use App\Models\Constant;
class DashboardController extends Controller
{
    function masterQuery($where=''){
        $sql="";
        $lastTicket= LastTicket::find(1);
        for($i=1;$i<=$lastTicket->last_ticket;$i++){
            if($i==3) continue;
            if($i==1)
                $sql.=" SELECT `id`, 1 related, `active_trans`, `ticket_status` FROM `app_ticket".$i."s` where ticket_status in(1,5002)";
            else
                $sql.=" UNION SELECT `id`, 2 related, `active_trans`, `ticket_status` FROM `app_ticket".$i."s` where ticket_status in(1,5002)";
        }
        return "select * from (".$sql.") a ".$where;
    }
    function masterQuery2($where=''){
        $sql="";
        $lastTicket= LastTicket::find(1);
        for($i=1;$i<=$lastTicket->last_ticket;$i++){
            if($i==3) continue;
            if($i==1)
                $sql.=" SELECT `id`, 1 related, `active_trans`, `ticket_status` FROM `app_ticket".$i."s` ";
            else
                $sql.=" UNION SELECT `id`, 2 related, `active_trans`, `ticket_status` FROM `app_ticket".$i."s` ";
        }
        return "select * from (".$sql.") a ".$where;
    }
    function myTask(){
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.sender_id=admins.id WHERE `reciver_id`=".Auth()->user()->id." and EXISTS ($activeRec) order by id desc");
        $arr=array();
        // dd($res);
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where ticket_status in (1,5002) and id=".$res[$i]->ticket_id);
            if($ticket){
                // $ticket['trans']=$res[$i];
                // $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                // $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        //dd($arr);
        return $arr;
    }
    function sentTask(){
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.reciver_id=admins.id WHERE app_trans.id in(
                            SELECT max(app_trans.id) id FROM `app_trans` where `sender_id`=".Auth()->user()->id."  group by `ticket_id`,`related`
                        ) order by app_trans.id desc");
                        
        $arr=array();
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where ticket_status in (1,5002) and id=".$res[$i]->ticket_id);
            if($ticket){
                // $ticket['trans']=$res[$i];
                // $config=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type);
                // if(!$config){
                //     echo "SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type;
                //     exit;
                // }
                // $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                // $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        //dd($arr);
        return $arr;
    }
    function waittingTask(){
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.reciver_id=admins.id 
        WHERE app_trans.id in(
                            SELECT max(app_trans.id) id FROM `app_trans` where `reciver_id`=".
                            Auth()->user()->id."  group by `ticket_id`,`related` 
                        ) order by app_trans.id desc");
        $arr=array();
        
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT `app_ticket".$res[$i]->related."s`.*,ifnull(t_constant.name,'') tname 
            FROM `app_ticket".$res[$i]->related."s` left join t_constant
            on t_constant.id=`app_ticket".$res[$i]->related."s`.ticket_status 
            where ticket_status not in (1,5002,5003) and `app_ticket".$res[$i]->related."s`.id=".$res[$i]->ticket_id." and `app_ticket".$res[$i]->related."s`.active_trans = ".$res[$i]->id);
                        

            if($ticket){
                // $ticket['trans']=$res[$i];
                // $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                // $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        //dd($arr);
        return $arr;
    }
    function taggedTask(){
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.reciver_id=admins.id WHERE app_trans.id in(
                            SELECT max(app_trans.id) id FROM `app_trans` where json_contains(`tagged_users`,'\"".Auth()->user()->id."\"','$')=1   group by `ticket_id`,`related`
                        ) order by app_trans.id desc");
        $arr=array();
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where ticket_status in (1,5002) and id=".$res[$i]->ticket_id);
            if($ticket){
                // $ticket['trans']=$res[$i];
                // $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                // $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        //dd($arr);
        return $arr;
    }
    public function index()
    {
        $type='intro';
        $myTask= $this->myTask();
        $sentTask= $this->sentTask();
        $waittingTask= $this->waittingTask();
        $ticketTypeList = Constant::where('parent',6029)->where('status',1)->get();

        $taggedTask= $this->taggedTask();
       return view('dashboard.index',compact('type','myTask','sentTask','ticketTypeList','waittingTask','taggedTask'));
    }
    
    public function getMyTaskAjax(){
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.sender_id=admins.id WHERE `reciver_id`=".Auth()->user()->id." and EXISTS ($activeRec) order by id desc");
        $arr=array();
        // dd($res);
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where ticket_status in (1,5002) and id=".$res[$i]->ticket_id);
            if($ticket){
                $ticket['trans']=$res[$i];
                $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        return DataTables::of($arr)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWatingTaskAjax(){
       $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.reciver_id=admins.id 
        WHERE app_trans.id in(
                            SELECT max(app_trans.id) id FROM `app_trans` where `reciver_id`=".
                            Auth()->user()->id."  group by `ticket_id`,`related` 
                        ) order by app_trans.id desc");
        $arr=array();
        
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT `app_ticket".$res[$i]->related."s`.*,ifnull(t_constant.name,'') tname 
            FROM `app_ticket".$res[$i]->related."s` left join t_constant
            on t_constant.id=`app_ticket".$res[$i]->related."s`.ticket_status 
            where ticket_status not in (1,5002,5003) and `app_ticket".$res[$i]->related."s`.id=".$res[$i]->ticket_id." and `app_ticket".$res[$i]->related."s`.active_trans = ".$res[$i]->id);
                        

            if($ticket){
                $ticket['trans']=$res[$i];
                $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        //dd($arr);
        // return $arr;
        return DataTables::of($arr)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    function getTaggedTaskAjax(){
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.reciver_id=admins.id WHERE app_trans.id in(
                            SELECT max(app_trans.id) id FROM `app_trans` where json_contains(`tagged_users`,'\"".Auth()->user()->id."\"','$')=1   group by `ticket_id`,`related`
                        ) order by app_trans.id desc");
        $arr=array();
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where ticket_status in (1,5002) and id=".$res[$i]->ticket_id);
            if($ticket){
                $ticket['trans']=$res[$i];
                $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        //dd($arr);
        return DataTables::of($arr)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    function getSenTTaskAjax(){
        $activeRec= $this->masterQuery(" where app_trans.id = a.active_trans");
        $res=DB::select("SELECT app_trans.*,admins.nick_name,admins.image FROM `app_trans` join admins on app_trans.reciver_id=admins.id WHERE app_trans.id in(
                            SELECT max(app_trans.id) id FROM `app_trans` where `sender_id`=".Auth()->user()->id."  group by `ticket_id`,`related`
                        ) order by app_trans.id desc");
                        
        $arr=array();
        for($i=0;$i<count($res);$i++){
            $ticket=DB::select("SELECT * FROM `app_ticket".$res[$i]->related."s` where ticket_status in (1,5002) and id=".$res[$i]->ticket_id);
            if($ticket){
                $ticket['trans']=$res[$i];
                $config=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type);
                if(!$config){
                    echo "SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type;
                    exit;
                }
                $ticket['config']=DB::select("SELECT * FROM `ticket_configs` where ticket_no=".$res[$i]->related." and app_type=".$res[$i]->ticket_type)[0];
                $ticket['response']=DB::select("SELECT app_responses.*,admins.nick_name,admins.image FROM `app_responses` join admins on app_responses.created_by=admins.id where trans_id=".$res[$i]->id." order by id desc limit 1");
                $arr[]=$ticket;
            }
        }
        //dd($arr);
        return DataTables::of($arr)

                            ->addIndexColumn()

                            ->make(true);
    }

}
