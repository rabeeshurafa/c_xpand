<?php

namespace App\Jobs;

use App\Models\File;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\AppTicket1;
use App\Models\AppTicket2;
use App\Models\AppTicket4;
use App\Models\AppTicket5;
use App\Models\AppTicket6;
use App\Models\AppTicket7;
use App\Models\AppTicket8;
use App\Models\AppTicket10;
use App\Models\AppTicket11;
use App\Models\AppTicket12;
use App\Models\AppTicket13;
use App\Models\AppTicket15;
use App\Models\AppTicket14;
use App\Models\AppTicket16;
use App\Models\AppTicket17;
use App\Models\AppTicket20;
use App\Models\AppTicket19;
use App\Models\AppTicket18;
use App\Models\AppTicket23;
use App\Models\AppTicket24;
use App\Models\AppTicket28;
use App\Models\Archive;
use App\Models\TicketConfig;

use App\Models\AppTrans;
use App\Models\AppResponse;

class AttachTableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
     
    function saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by){


                $archive = new Archive();
        
                $archive->model_id = $subscriber_id;
        
                $archive->type_id = '6046';
        
                $archive->name = $subscriber_name;
        
                $archive->model_name = 'App\\Models\\User';
        
                $date=date("Y/m/d");
                
                $from = explode('/', ($date));
    
                $from = $from[2] . '-' . $from[1] . '-' . $from[0];
                
                $archive->date = $from;
                
                $archive->task_name = $taskname;
                
                $archive->task_link = $tasklink;
                
                $archive->title = $attachName;
                
                $archive->type = 'taskArchive';  
                
                $archive->serisal = '';
                
                $archive->url =  'cit_archieve';
                
                $archive->add_by = $add_by;
                
                // dd($archive);
                $archive->save();
        
                return $archive->id;
                
    } 
     
    public function handle() {

        $obj = $this->request;
        
        $archive_id=0;
        
        // dd($obj);
        if(@$obj['s_table_name']!='t_obj_arch'&&@$obj['s_table_name']!='t_elec_ticket_respponse'&&@$obj['s_table_name']!='t_elec_ticket_trans'){
            
            $rest = substr($obj['s_table_name'], 13, (strlen($obj['s_table_name'])-1));

            $related=0;
            if(intval( $rest)==3){
                $ticket=AppTicket1::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',1)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/1';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
                
            }
            if(intval( $rest)==1){
                $ticket=AppTicket2::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',2)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/2';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==2){
                $ticket=AppTicket4::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',4)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/4';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==4){
                $ticket=AppTicket5::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',5)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/5';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==6){
                $ticket=AppTicket6::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',6)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/6';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==5){
                $ticket=AppTicket7::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',7)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/7';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==7){
                $ticket=AppTicket8::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',8)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/8';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==10){
                $ticket=AppTicket10::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',10)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/10';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==16){
                $ticket=AppTicket13::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',13)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/13';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==27){
                $ticket=AppTicket14::where('app_no',intval($obj['fk_i_ref_id']))->where('task_type',1)->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',14)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/14';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==28){
                $ticket=AppTicket14::where('app_no',intval($obj['fk_i_ref_id']))->where('task_type',2)->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',14)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/14';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==31){
                $ticket=AppTicket11::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',11)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/11';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==29){
                $ticket=AppTicket15::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',15)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/15';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==36){
                $ticket=AppTicket16::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',16)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/16';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
                
            }
            if(intval( $rest)==37){
                $ticket=AppTicket12::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',12)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/12';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==39){
                $ticket=AppTicket17::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',17)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/17';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==11){
                
                $ticket=AppTicket19::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',19)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/19';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==12){
                $ticket=AppTicket18::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',18)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/18';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==14){
                $ticket=AppTicket23::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',23)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/23';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==17){
                $ticket=AppTicket24::where('app_no',intval($obj['fk_i_ref_id']))->where('task_type',6284)->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',24)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/24';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval($rest)==21){
                $ticket=AppTicket24::where('app_no',intval($obj['fk_i_ref_id']))->where('task_type',6283)->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',24)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/24';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
            if(intval( $rest)==35){
                $ticket=AppTicket28::where('id',intval($obj['fk_i_ref_id']))->first();
                if($ticket){
                  if($ticket->file_ids){
                        $ticketFiels=json_decode($ticket->file_ids);
                        
                        $attachName=explode('.', $obj['AttachName'])[0];
                        $attachID= @$obj['ID'];
                        
                        $temp=array();
                        $temp['attachName']=trim($attachName);
                        $temp['attach_ids']=trim($attachID);
                        array_push($ticketFiels, $temp);
                        
                        $ticket->file_ids=json_encode($ticketFiels);
                        $ticket->save();
                        
                        $config=TicketConfig::where('ticket_no',28)->where('app_type',$ticket->app_type)->first();
        
                        $tasklink='viewTicket/'.$ticket->id.'/28';
                        $taskname=$config->ticket_name.'  ('.$ticket->app_no.')';
                        $subscriber_name=$ticket->customer_name;
                        $subscriber_id=$ticket->customer_id;
                        $attachName=$attachName;
                        $attachid=$attachID;
                        $add_by=$ticket->created_by;
                        $archive_id=$this->saveFilesArchieve($subscriber_name,$subscriber_id,$attachName,$taskname,$tasklink,$attachid,$add_by);
                  }
                   
                }
            }
    }          
        
        $client=new File();
        $model='';
        if($obj['s_table_name']=="t_elec_ticket_respponse"){
            $res=AppResponse::where('id',intval($obj['fk_i_ref_id']))->first();
            if($res)
            {
                if($res->file_ids){
                    $transFiels=json_decode($res->file_ids);
                    $attachName=explode('.', $obj['AttachName'])[0];
                    $attachID= @$obj['ID'];
                    $temp=array();
                    $temp['attachName']=trim($attachName);
                    $temp['attach_ids']=trim($attachID);
                    array_push($transFiels, $temp);
                    $res->file_ids=json_encode($transFiels);
                    $res->save();
                }
            }
        }
        if($obj['s_table_name']=="t_elec_ticket_trans"){
            $trans=AppTrans::where('id',intval($obj['fk_i_ref_id']))->first();
            if($trans)
            {
                if($trans->file_ids){
                    $transFiels=json_decode($trans->file_ids);
                    $attachName=explode('.', $obj['AttachName'])[0];
                    $attachID= @$obj['ID'];
                    $temp=array();
                    $temp['attachName']=trim($attachName);
                    $temp['attach_ids']=trim($attachID);
                    array_push($transFiels, $temp);
                    $trans->file_ids=json_encode($transFiels);
                    $trans->save();
                }
            }
        }
        if($obj['s_table_name']=="t_obj_arch"){
            $model='App\\Models\\Archive';
        }
        if($archive_id!=0){
            $model='App\\Models\\Archive';
        }
        $extension="";
        $AttachName= explode(".", @$obj['AttachName']); 
        if(sizeof($AttachName)>=2){
            $extension=$AttachName[(sizeof($AttachName)-1)];
        }
        $url="storage/".@$obj['AttachServerName'];
        $client['id']           = @$obj['ID'];
        $client['model_name']   = $model;
        $client['archive_id'] = ($archive_id==0?$obj['fk_i_ref_id']:$archive_id);
        $client['real_name']    = @$obj['AttachName'];
        $client['extension']    = $extension;
        $client['url']          = $url;
        
        
        // $client['type']         = @$obj['BussniessName'];


        // dd($client,$obj);
        try{
            \DB::beginTransaction();
            $client->save();
            \DB::commit();
            \Log::info('client : '.@$obj['pk_i_id']." created");

        }catch (\Exception $e){
            dd($obj,$e);
            \DB::rollBack();
//            \Log::channel('clients_fails_insert')->info($e->getMessage());
            \Log::error('client : '.@$obj['pk_i_id']." error");

        }


    }

}
