<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageReciver;
use App\Models\MessageFolder;
use App\Models\File;
use DB;
class mailController extends Controller
{
    
    
    public function mailPage()
    {
        $setting = Setting::first();
        
        $inbox=Message::whereIn('id',MessageReciver::select('i_message_id')->where('i_receiver_id',Auth()->user()->id)->where('is_delete','0')->get())->with('MessageReciver')->with('Admin')->orderBy('id', 'DESC')->get();
        
        $trash=Message::whereIn('id',MessageReciver::select('i_message_id')->where('i_receiver_id',Auth()->user()->id)->where('is_delete','1')->get())->with('MessageReciver')->with('Admin')->orderBy('id', 'DESC')->get();
        
        $star=Message::whereIn('id',MessageReciver::select('i_message_id')->where('i_receiver_id',Auth()->user()->id)->where('i_star','1')->where('is_delete','0')->get())->with('MessageReciver')->with('Admin')->orderBy('id', 'DESC')->get();
        $outbox=Message::where('is_sent',1)->where('created_by',Auth()->user()->id)->with('MessageReciver')->with('MessageReciver.Admin')->with('Admin')->orderBy('id', 'DESC')->get();
        $draft=Message::where('is_sent',0)->where('created_by',Auth()->user()->id)->with('MessageReciver')->with('MessageReciver.Admin')->with('Admin')->orderBy('id', 'DESC')->get();
        $folders=MessageFolder::where('created_by',Auth()->user()->id)->orderBy('name', 'ASC')->get();
        foreach($folders as $row)
            $row->setAttribute('msgs',Message::whereIn('id',
                                                                MessageReciver::select('i_message_id')->
                                                                where('i_receiver_id',Auth()->user()->id)->
                                                                where('i_folder',$row->id)->
                                                                where('is_delete','0')->get()
                                                        )->with('MessageReciver')->with('Admin')->get());
        
        $type = 'mailPage';
        return view('dashboard.includes.mailPage',compact('setting','type','inbox','trash','outbox','draft','folders','star')); 
    }
    
    public function getMessage(Request $request){
        //dd($request->val);
        $msg=Message::with('MessageReciver')->with('Replaied')->with('MessageReciver.Admin')->with('Admin')->where('id',$request->val)->get();
        
        foreach($msg as $row)
        {
            $attach=array();
            if(is_array(json_decode($row->file_id)) && count(json_decode($row->file_id))>0)
                $attach=File::whereIn('id',json_decode($row->file_id))->get();
            $row->setAttribute('files',$attach);
        }
        MessageReciver::where('i_message_id',$request->val)->where('i_receiver_id',Auth()->user()->id)-> update(['is_seen'=>1]);
        return response()->json($msg);
    }
    
    public function deleteMessage(Request $request){
        if($request->msg_type==1){
            MessageReciver::where('i_message_id',$request->val)->where('i_receiver_id',Auth()->user()->id)-> update(['is_delete'=>1]);
        }
        return response()->json(1);
    }
    public function setSend(Request $request){
            Message::where('id',$request->val)->where('created_by',Auth()->user()->id)-> update(['is_sent'=>1]);
        return response()->json(1);
    }
    public function storeMessage(Request $request){
        //dd($request);
        $message=new Message();
        $id=$request->modal_msg_id;
        if($request->modal_msg_id==0){
            $message->title=$request->subject;
            $message->content=$request->summaryCkeditor;
            $message->file_id=json_encode($request->formDataaaorgIdList);
            $message->created_by=Auth()->user()->id;
            $message->is_sent=$request->is_sent;
            $message->replaied_to=$request->modal_msg_related;
            $message->is_delete=0;
            $message->save();
            $id=$message->id;
        }
        else
        {
            $message=Message::find($request->modal_msg_id);
            $message->id=$request->modal_msg_id;
            $message->title=$request->subject;
            $message->content=$request->summaryCkeditor;
            $message->file_id=json_encode($request->formDataaaorgIdList);
            $message->created_by=Auth()->user()->id;
            $message->is_sent=1;
            $message->replaied_to=$request->modal_msg_related;
            $message->is_delete=0;
            $message->save();
        }
        $reiver=$request->to;
        $carbonCopy=$request->cc;
        if($reiver)
        foreach($reiver as $row){
            $messageReciver=new MessageReciver();
            $messageReciver->i_message_id=$id;
            $messageReciver->i_receiver_id=$row;
            $messageReciver->i_recive_type=1;
            $messageReciver->is_seen=0;
            $messageReciver->is_delete=0;
            $messageReciver->i_folder=0;
            $messageReciver->save();
        }
        if($carbonCopy)
        foreach($carbonCopy as $row){
            $messageReciver=new MessageReciver();
            $messageReciver->i_message_id=$id;
            $messageReciver->i_receiver_id=$row;
            $messageReciver->i_recive_type=2;
            $messageReciver->is_seen=0;
            $messageReciver->is_delete=0;
            $messageReciver->i_folder=0;
            $messageReciver->save();
        }
        return response()->json(1);
    }
    public function storeFolder(Request $request){
        //dd($request);
        $message=new MessageFolder();
            $message->name=$request->name;
            $message->created_by=Auth()->user()->id;
            $message->save();
            $id=$message->id;
        return response()->json(1);
    }
    public function moveFolder(Request $request){
        MessageReciver::where('i_message_id',$request->movFolderMsgID)->where('i_receiver_id',Auth()->user()->id)-> update(['i_folder'=>$request->i_folder]);
        return response()->json(1);
    }
    public function StarMsg(Request $request){
        MessageReciver::where('i_message_id',$request->val)->where('i_receiver_id',Auth()->user()->id)-> update(['i_star'=>1]);
        return response()->json(1);
    }
    public function getNextMessage(Request $request){
        //dd($request->val);
        $msg=Message::with('MessageReciver')->with('Replaied')->with('MessageReciver.Admin')->with('Admin')->where('id','>',$request->val)->
        whereIn('id',MessageReciver::select('i_message_id')->where('i_receiver_id',Auth()->user()->id)->where('is_delete','0')->get())
        ->orderBy('id', 'ASC')->limit(1)->get();
        
        foreach($msg as $row)
        {
            $attach=array();
            if(is_array(json_decode($row->file_id)) && count(json_decode($row->file_id))>0)
                $attach=File::whereIn('id',json_decode($row->file_id))->get();
            $row->setAttribute('files',$attach);
        }
        MessageReciver::where('i_message_id',$request->val)->where('i_receiver_id',Auth()->user()->id)-> update(['is_seen'=>1]);
        return response()->json($msg);
    }
    public function getPrevMessage(Request $request){
        //dd($request->val);
        $msg=Message::with('MessageReciver')->with('Replaied')->with('MessageReciver.Admin')->with('Admin')->where('id','<',$request->val)->
        whereIn('id',MessageReciver::select('i_message_id')->where('i_receiver_id',Auth()->user()->id)->where('is_delete','0')->get())
        ->orderBy('id', 'DESC')->limit(1)->get();
        
        foreach($msg as $row)
        {
            $attach=array();
            if(is_array(json_decode($row->file_id)) && count(json_decode($row->file_id))>0)
                $attach=File::whereIn('id',json_decode($row->file_id))->get();
            $row->setAttribute('files',$attach);
        }
        MessageReciver::where('i_message_id',$request->val)->where('i_receiver_id',Auth()->user()->id)-> update(['is_seen'=>1]);
        return response()->json($msg);
    }

}
