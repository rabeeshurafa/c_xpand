<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Archive;
use App\Models\File;
use App\Models\linkedTo;

class JalArchieveController extends Controller
{
    // public function store_jal_archive(Request $request){
    //     $archive = new Archive();
    //     $archive->model_id =$request->customerid;
    //     $archive->type_id =$request->archive_type   ;
    //     $archive->name =$request->customername;
    //     $archive->model_name =$request->customerType;
    //     $archive->date =$request->msgDate;
    //     $archive->title =$request->msgTitle;
    //     $archive->type =$request->msgType;
    //     $archive->serisal =$request->msgid;
    //     $archive->url =  $request->url;
    //     $archive->add_by = Auth()->user()->id;
    //     $archive->save();

    //     $files_ids = $request->formDataaaorgIdList;
    //     if($files_ids ){
    //     foreach($files_ids as $id){
    //         $file = File::find($id);
    //         $file->archive_id = $archive->id;
    //         $file->model_name = "App\Models\Archive";
    //         $file->save();
    //     }
    //     }
    //     if($request->copyToText[0] != null){
    //         for($i= 0 ; $i< count($request->copyToText) ; $i++){
    //             $copyTo = new linkedTo();
    //             $copyTo->archive_id =  $archive->id;
    //             $copyTo->model_id =  $request->copyToID[$i];
    //             $copyTo->name =  $request->copyToCustomer[$i];    
    //             $copyTo->model_name =  $request->copyToType[$i];   
    //             $copyTo->save();         
    //         }
    //     }
    //     if ($archive) {
    //         return response()->json(['success'=>trans('admin.archive_added')]);
    //     }
    //         return response()->json(['error'=>$validator->errors()->all()]);
    // }
    public function store_jal_archive(Request $request)

    {
        $archive = Archive::where('id', $request->ArchiveID)->first();
        if ($archive) {

            $archive->model_id = $request->customerid;

            $archive->type_id = $request->archive_type;

            $archive->name = $request->customername=='0'?'':$request->customername;

            $archive->model_name = $request->customerType;
            
            if($request->msgDate){
            $from = explode('/', ($request->msgDate));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0];
            }
            else{
               $from="0000-00-00";
            }
            $archive->date = $from;

            $archive->title = $request->msgTitle;

            $archive->type = $request->msgType;

            $archive->serisal = $request->msgid;
            
            $archive->url =  $request->url;

            $archive->save();

            $files_ids = $request->formDataaaorgIdList;
            File::where('archive_id', $request->ArchiveID)
            ->update(['archive_id' => 0,'model_name'=>'']);
            if ($files_ids) {

                foreach ($files_ids as $id) {

                    $file = File::find($id);

                    $file->archive_id = $archive->id;

                    $file->model_name = "App\Models\Archive";

                    $file->save();

                }

            }
            linkedTo::where('archive_id',$archive->id)->delete();
            if ($request->copyToText[0] != null) {

                for ($i = 0; $i < count($request->copyToText); $i++) {

                    $copyTo = new linkedTo();

                    $copyTo->archive_id =  $archive->id;

                    $copyTo->model_id =  $request->copyToID[$i];

                    $copyTo->name =  $request->copyToCustomer[$i];

                    $copyTo->model_name =  $request->copyToType[$i];

                    $copyTo->save();

                }

            }

        } else {

            $archive = new Archive();

            $archive->model_id = $request->customerid;

            $archive->type_id = $request->archive_type;

            $archive->name = $request->customername=='0'?'':$request->customername;

            $archive->model_name = $request->customerType;

            if($request->msgDate){
            $from = explode('/', ($request->msgDate));

            $from = $from[2] . '-' . $from[1] . '-' . $from[0];
            }
            else{
               $from="0000-00-00";
            }
            $archive->date = $from;
            
            $archive->title = $request->msgTitle;

            $archive->type = $request->msgType;

            $archive->serisal = $request->msgid;

            $archive->url =  $request->url;

            $archive->add_by = Auth()->user()->id;

            //dd( $request->customername=='0',$request->customername,$archive);
            $archive->save();

            $files_ids = $request->formDataaaorgIdList;

            if ($files_ids) {

                foreach ($files_ids as $id) {

                    $file = File::find($id);

                    $file->archive_id = $archive->id;

                    $file->model_name = "App\Models\Archive";

                    $file->save();

                }

            }

            if ($request->copyToText[0] != null) {

                for ($i = 0; $i < count($request->copyToText); $i++) {

                    $copyTo = new linkedTo();

                    $copyTo->archive_id =  $archive->id;

                    $copyTo->model_id =  $request->copyToID[$i];

                    $copyTo->name =  $request->copyToCustomer[$i];

                    $copyTo->model_name =  $request->copyToType[$i];

                    $copyTo->save();

                }

            }

        }

        if ($archive) {

            return response()->json(['success' => trans('admin.archive_added')]);

        }

        return response()->json(['error' => $validator->errors()->all()]);

    }
    public function archieve_info(Request $request)

    {

        $archive['info'] = Archive::find($request['archive_id']);

        $archive['files'] = File::where('archive_id', '=', $request['archive_id'])->where('model_name', 'App\Models\Archive')->get();
        $archive['CopyTo'] = linkedTo::where('archive_id', '=', $request['archive_id'])->get();

        return response()->json($archive);

    }
}
