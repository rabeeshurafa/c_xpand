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
use App\Models\AppTicket28;
use App\Models\AppTicket29;
use App\Models\AppTicket30;
use App\Models\AppTicket31;
use App\Models\AppTicket32;
use App\Models\AppTicket33;
use App\Models\AppTicket34;
use App\Models\AppTicket35;
use App\Models\AppTicket36;
use App\Models\AppTicket37;
use App\Models\AppTicket38;

use App\Models\AppTrans;
use App\Models\water;
use App\Models\elec;
use App\Models\License;
use App\Models\Smslog;
use App\Models\AppResponse;
use App\Models\Department;
use App\Models\Order;
use DB;
use App\Models\Orgnization;
use App\Models\Archive;
use Yajra\DataTables\DataTables;
use App\Models\ArchiveRole;

class TasksTableController extends Controller
{
    public function getWaterTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket1::select('app_ticket1s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket1s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket1s.region')
                        ->orderBy('app_ticket1s.created_at', 'DESC');
                        
        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecSubscriptionTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket1::select('app_ticket1s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket1s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket1s.region')
                        ->orderBy('app_ticket1s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterMalfuncTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket2::select('app_ticket2s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket2s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket2s.region')
                        ->orderBy('app_ticket2s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecMalfuncTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket2::select('app_ticket2s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket2s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket2s.region')
                        ->orderBy('app_ticket2s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterDisconnectTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket6::select('app_ticket6s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket6s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket6s.region')
                        ->orderBy('app_ticket6s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecDisconnectTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket6::select('app_ticket6s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket6s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket6s.region')
                        ->orderBy('app_ticket6s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterFinancTransferTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket11::select('app_ticket11s.*','admins.nick_name as added_by')
                        ->where('app_ticket11s.app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket11s.created_by')
                        ->orderBy('app_ticket11s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecFinancTransferTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket11::select('app_ticket11s.*','admins.nick_name as added_by')
                        ->where('app_ticket11s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket11s.created_by')
                        ->orderBy('app_ticket11s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterGlblMulfuncTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket4::select('app_ticket4s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket4s.app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket4s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket4s.region')
                        ->orderBy('app_ticket4s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecGlblMulfuncTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket4::select('app_ticket4s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket4s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket4s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket4s.region')
                        ->orderBy('app_ticket4s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterMeterChekTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket5::select('app_ticket5s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket5s.app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket5s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket5s.region')
                        ->orderBy('app_ticket5s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecMeterChekTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket5::select('app_ticket5s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket5s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket5s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket5s.region')
                        ->orderBy('app_ticket5s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterMeterReadTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket9::select('app_ticket9s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket9s.app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket9s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket9s.region')
                        ->orderBy('app_ticket9s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecMeterReadTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket9::select('app_ticket9s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket9s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket9s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket9s.region')
                        ->orderBy('app_ticket9s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterMeterTransfrTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket10::select('app_ticket10s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket10s.app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket10s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket10s.region')
                        ->orderBy('app_ticket10s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecMeterTransfrTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket10::select('app_ticket10s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket10s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket10s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket10s.region')
                        ->orderBy('app_ticket10s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaterLineRecnctTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket7::select('app_ticket7s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket7s.app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket7s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket7s.region')
                        ->orderBy('app_ticket7s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElecLineRecnctTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket7::select('app_ticket7s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket7s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket7s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket7s.region')
                        ->orderBy('app_ticket7s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaiveWaterSubsTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket8::select('app_ticket8s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket8s.app_type',2)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket8s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket8s.region')
                        ->orderBy('app_ticket8s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getWaiveElecSubsTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket8::select('app_ticket8s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket8s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket8s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket8s.region')
                        ->orderBy('app_ticket8s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElec16Tickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket13::select('app_ticket13s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket13s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket13s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket13s.region')
                        ->orderBy('app_ticket13s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElec37Tickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket12::select('app_ticket12s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket12s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket12s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket12s.region')
                        ->orderBy('app_ticket12s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElec27Tickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket14::select('app_ticket14s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket14s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket14s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket14s.region')
                        ->orderBy('app_ticket14s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElec29Tickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket15::select('app_ticket15s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket15s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket15s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket15s.region')
                        ->orderBy('app_ticket15s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElec36Tickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket16::select('app_ticket16s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket16s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket16s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket16s.region')
                        ->orderBy('app_ticket16s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getElec39Tickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket17::select('app_ticket17s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket17s.app_type',1)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket17s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket17s.region')
                        ->orderBy('app_ticket17s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getBuildingLicTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket18::select('app_ticket18s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket18s.app_type',3)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket18s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket18s.region')
                        ->orderBy('app_ticket18s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getEngValedTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket22::select('app_ticket22s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket22s.app_type',3)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket22s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket22s.region')
                        ->orderBy('app_ticket22s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getLicFileTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket19::select('app_ticket19s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket19s.app_type',3)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket19s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket19s.region')
                        ->orderBy('app_ticket19s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getOwnershipTransferTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket35::select('app_ticket35s.*','admins.nick_name as added_by','regions.name as regionName')
                        // ->where('app_ticket35s.app_type',3)
                        ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket35s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket35s.region')
                        ->orderBy('app_ticket35s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getRetriveLicTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket26::select('app_ticket26s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket26s.app_type',3)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket26s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket26s.region')
                        ->orderBy('app_ticket26s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getSitePlanTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket21::select('app_ticket21s.*','admins.nick_name as added_by')
                        ->where('app_ticket21s.app_type',3)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket21s.created_by')
                        ->orderBy('app_ticket21s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getStraighteningTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket20::select('app_ticket20s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket20s.app_type',3)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket20s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket20s.region')
                        ->orderBy('app_ticket20s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getCollectingTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket29::select('app_ticket29s.*','admins.nick_name as added_by','regions.name as regionName')
                        ->where('app_ticket29s.app_type',5)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket29s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket29s.region')
                        ->orderBy('app_ticket29s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getLeaveTickets(Request $request){
        
        $type = $request['type'];
        $archive_config = ArchiveRole::where('type', $type)->get();
        $my_id=strval(Auth()->user()->id);
        $ids=[];
        $t=[];
            for($i=0 ; $i<count($archive_config);$i++)
            {
                $t=json_decode($archive_config[$i]->archiveroles);
                for($j=0 ; $j<count($t);$j++)
                {
                    if($t[$j] == $my_id)
                        {
                            array_push($ids,$archive_config[$i]->empid);
                        }
                }
            }
        array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket28::select('app_ticket28s.*','admins.nick_name as added_by','t_constant.name as leave_name')
                        ->where('app_ticket28s.app_type',5)
                        ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket28s.created_by')
                        ->leftJoin('t_constant','t_constant.id','app_ticket28s.leave_type')
                        ->orderBy('app_ticket28s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getVacationTickets(Request $request){
        
        $type = $request['type'];
        $archive_config = ArchiveRole::where('type', $type)->get();
        $my_id=strval(Auth()->user()->id);
        $ids=[];
        $t=[];
            for($i=0 ; $i<count($archive_config);$i++)
            {
                $t=json_decode($archive_config[$i]->archiveroles);
                for($j=0 ; $j<count($t);$j++)
                {
                    if($t[$j] == $my_id)
                        {
                            array_push($ids,$archive_config[$i]->empid);
                        }
                }
            }
        array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket32::select('app_ticket32s.*','admins.nick_name as added_by','t_constant.name as vac_name')
                        ->where('app_ticket32s.app_type',5)
                        ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket32s.created_by')
                        ->leftJoin('t_constant','t_constant.id','app_ticket32s.vac_type')
                        ->orderBy('app_ticket32s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getNetworkDevelopTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket30::select('app_ticket30s.*','admins.nick_name as added_by','t_constant.name as net_name','regions.name as regionName')
                        ->where('app_ticket30s.app_type',5)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket30s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket30s.region')
                        ->leftJoin('t_constant','t_constant.id','app_ticket30s.network_type')
                        ->orderBy('app_ticket30s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getPurchaseTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket31::select('app_ticket31s.*','admins.nick_name as added_by')
                        ->where('app_ticket31s.app_type',5)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket31s.created_by')
                        ->orderBy('app_ticket31s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getRequestSpareTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket33::select('app_ticket33s.*','admins.nick_name as added_by')
                        ->where('app_ticket33s.app_type',5)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket33s.created_by')
                        ->orderBy('app_ticket33s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getOutspreadTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket23::select('app_ticket23s.*','admins.nick_name as added_by','t_constant.name as task_name','regions.name as regionName')
                        ->where('app_ticket23s.app_type',4)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket23s.created_by')
                        ->leftJoin('regions','regions.id','app_ticket23s.region')
                        ->leftJoin('t_constant','t_constant.id','app_ticket23s.task_type')
                        ->orderBy('app_ticket23s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getPublicComplaintTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket24::select('app_ticket24s.*','admins.nick_name as added_by')
                        ->where('app_ticket24s.app_type',4)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket24s.created_by')
                        ->orderBy('app_ticket24s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getCitizenComplaintTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket25::select('app_ticket25s.*','admins.nick_name as added_by')
                        ->where('app_ticket25s.app_type',4)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket25s.created_by')
                        ->orderBy('app_ticket25s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getQuittanceTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket27::select('app_ticket27s.*','admins.nick_name as added_by','t_constant.name as reason_name')
                        ->where('app_ticket27s.app_type',4)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket27s.created_by')
                        ->leftJoin('t_constant','t_constant.id','app_ticket27s.reason')
                        ->orderBy('app_ticket27s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    public function getInnerQuittanceTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $waterTicket= AppTicket36::select('app_ticket36s.*','admins.nick_name as added_by')
                        ->where('app_ticket36s.app_type',4)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket36s.created_by')
                        ->orderBy('app_ticket36s.created_at', 'DESC');

        return DataTables::of($waterTicket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
    public function getVehicleMaintenanceTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $Ticket= AppTicket37::select('app_ticket37s.*','admins.nick_name as added_by')
                        ->where('app_ticket37s.app_type',5)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket37s.created_by')
                        ->orderBy('app_ticket37s.created_at', 'DESC');

        return DataTables::of($Ticket)

                            ->addIndexColumn()

                            ->make(true);
    }
    public function getRefuelingTickets(Request $request){
        
        $type = $request['type'];
        // $archive_config = ArchiveRole::where('type', $type)->get();
        // $my_id=strval(Auth()->user()->id);
        // $ids=[];
        // $t=[];
        //     for($i=0 ; $i<count($archive_config);$i++)
        //     {
        //         $t=json_decode($archive_config[$i]->archiveroles);
        //         for($j=0 ; $j<count($t);$j++)
        //         {
        //             if($t[$j] == $my_id)
        //                 {
        //                     array_push($ids,$archive_config[$i]->empid);
        //                 }
        //         }
        //     }
        // array_push($ids,(int)$my_id);
        
        
        $Ticket= AppTicket38::select('app_ticket38s.*','admins.nick_name as added_by')
                        ->where('app_ticket38s.app_type',5)
                        // ->whereIn('created_by',$ids)
                        ->leftJoin('admins','admins.id','app_ticket38s.created_by')
                        ->orderBy('app_ticket38s.created_at', 'DESC');

        return DataTables::of($Ticket)

                            ->addIndexColumn()

                            ->make(true);
    }
    
}