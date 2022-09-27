<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Setting;
use App\Models\Address;
use App\Models\City;
use App\Models\Region;
use App\Models\Area;
use Hash;
use Auth;
use App\Image;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Excel;
class UsersController extends Controller {

    /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
         $users = Admin::latest()->where('id', '<>', auth()->id())->get(); //use pagination here
         $setting = Setting::first();
         $address = Address::where('id',$setting->address_id)->first();
         $city = City::get();
         $area = Area::get();
         $region = Region::get();
        return view('dashboard.users.index', compact('users','city','area','region'));
    }
    public function export(Request $request)
    {
        $header = [
            'name',
        ];

       return \Maatwebsite\Excel\Facades\Excel::download(new UserExport(),
            'سجل المستخدمين' . now()->format('Y-m-d') . rand(111, 9999) . '.xlsx', null,$header);
    }
    public function import(Request $request)
    {
        Excel::import(new UserImport(), realpath('users.xlsx'));
        return true;
    }
    // public function import(Request $request)
    // {
    //     Excel::import(new UserImport(), $request->file('file'));
    //     return $this->response_api(true, __('messages.done_successfully'));
    // }
    public function create(){
        $roles = Role::get();
        return view('dashboard.users.create',compact('roles'));
    }


    public function store(AdminRequest $request) {
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);   // the best place on model
        $user->role_id = $request->role_id;

        // save the new user data
        if($user->save())
             return redirect()->route('admin.users.index')->with(['success' => 'تم التحديث بنجاح']);
        else
            return redirect()->route('admin.users.index')->with(['success' => 'حدث خطا ما']);

    }
}
