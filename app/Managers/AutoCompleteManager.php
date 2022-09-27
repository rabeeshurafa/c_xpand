<?php

namespace App\Managers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\water;
use App\Models\elec;
use App\Models\License;

class AutoCompleteManager
{

    public function portal_auto_complete(Request $request){

        $subscriber_data = $request['term'];

        $names = User::where('name', 'like', '%' . $subscriber_data . '%')->where('enabled',1)->select('*', 'name as label')->get();

        //$html = view('dashboard.component.auto_complete', compact('names'))->render();

        //dd($names);

        return response()->json($names);

    }
    
    public function appCustomer(Request $request){

        $subscriber_data = $request['id'];
        $valid=1;
        $errorList=array();
        $names = User::where('id',$request['id'] )->where('enabled',1 )->select('*')->with('jobLicArchieve')->with('License')->get();
        $msg='';
        
        foreach($names as $name)
        {
            foreach($name->jobLicArchieve as $row)
            {
                $parts=explode('/',$row->expiry_ate);
                $endDate=date('Y-m-d',strtotime($parts[2]."/".$parts[1]."/".$parts[0]));
                $currDate=date('Y-03-31');
                if($parts[2]>date('Y'))
                    $valid=1;
                else if($parts[2]==date('Y') && $parts[1]<3)
                    $valid=1;
                else if($parts[2]==date('Y') && $parts[1]>3){
                    $valid=0;
                    $errorList[]='المشترك لديه رخص حرف منتهية بتاريخ: '
                    .$row->expiry_ate;
                }
                else {
                    $valid=0;
                    $errorList[]='المشترك لديه رخص حرف منتهية بتاريخ: '
                    .$row->expiry_ate;
                }
            }
            $name->setAttribute("validLic",$valid);
            if($name->enabled==0)
                $errorList[]='حساب المستخدم معطل';
            $name->setAttribute("errorList",$errorList);
            $name->setAttribute("water",water::with('Counter')->where('user_id',$request['id'])->where('enabled',1 )->get());
            $name->setAttribute("elec",elec::with('Counter')->where('user_id',$request['id'])->where('enabled',1 )->get());
            $name->setAttribute("lic",license::where('user_id',$request['id'])->where('enabled',1 )->count());
        }
        
        if($names->isNotEmpty()){
            // $names[0]->setAttribute("archive",$this->getUserData($request));
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names[0]);
            
        }
        return response()->json([]);

    }

}