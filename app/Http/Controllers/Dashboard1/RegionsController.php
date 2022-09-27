<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\City;

use App\Models\Admin;

use App\Models\Town;

use App\Models\User;

use App\Models\Department;

use App\Models\Region;

use App\Models\Constant;



use App\Http\Requests\ExtentionRequest;



class RegionsController extends Controller

{
    public function store_city(Request $request)

    {

        if(!$request->city_id_p){

            $obj=new City();

            $obj->name=$request->AConstantName;

            $obj->save();

        }

        else{

            $obj=City::find($request->city_id_p);

            $obj->name=$request->AConstantName;

            $obj->save();

        }

        $res=City::where('status',1)->get();

        return response()->json($res);

    }
    public function getCityById(Request $request)

    {
        $res=City::where('id',$request->city_id_p)->where('status',1)->with('Town')->get();

        return response()->json($res);

    }
    public function getCity(Request $request)

    {
        $res=City::where('status',1)->get();

        return response()->json($res);

    }
    public function store_Town(Request $request)

    {

        if(!$request->town_id_p){

            $obj=new Town();
            $obj->name=$request->AConstantName;
            $obj->city_id=$request->city_id_p;
            $obj->save();

        }

        else{

            $obj=Town::find($request->town_id_p);
            $obj->city_id=$request->city_id_p;
            $obj->name=$request->AConstantName;

            $obj->save();

        }

        $res=Town::where('city_id',$request->city_id_p)->where('status',1)->get();

        return response()->json($res);

    }
    public function getTownById(Request $request)

    {
        $res=Town::where('city_id',$request->city_id)->where('status',1)->get();

        return response()->json($res);

    }
    public function getTown(Request $request)

    {
        $res=Town::where('city_id',$request->city_id)->where('status',1)->get();

        return response()->json($res);

    }
    public function store_Region(Request $request)

    {

        if(!$request->region_id_p){

            $obj=new Region();
            $obj->town_id=$request->town_id_p;
            $obj->name=$request->AConstantName;
            $obj->save();

        }

        else{

            $obj=Region::find($request->region_id_p);
            $obj->town_id=$request->town_id_p;
            $obj->name=$request->AConstantName;
            $obj->save();

        }

        $res=Region::where('town_id',$request->town_id_p)->where('status',1)->get();

        return response()->json($res);

    }
    public function getRegionById(Request $request)

    {
        $res=Region::where('town_id',$request->town_id)->where('status',1)->get();

        return response()->json($res);

    }
    public function getRegion(Request $request)

    {
        $res=Region::where('town_id',$request->town_id)->where('status',1)->get();

        return response()->json($res);

    }

    public function SaveConstant(Request $request)

    {

        if(!$request->constantID){

            $obj=new Constant();

            $obj->name=$request->AConstantName;

            $obj->parent=$request->constantParentID;

            $obj->save();

        }

        else{

            $obj=Constant::find($request->constantID);

            $obj->name=$request->AConstantName;

            $obj->save();

            

        }

        $res=Constant::where('parent',$request->constantParentID)->where('status',1)->get();

        return response()->json($res);

    }

    // public function deleteConstant(Request $request)

    // {

    //         $obj=Constant::find($request->constantID);

    //         $obj->status=0;

    //         $obj->save();

    //     $res=Constant::where('parent',$request->constantParentID)->where('status',1)->get();

    //     return response()->json($res);



    // }



}

