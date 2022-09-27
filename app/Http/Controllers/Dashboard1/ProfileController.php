<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile()
    {

        $admin = Admin::find(auth('admin')->user()->id);
        $users = User::get();
        return view('dashboard.profile.edit', compact('admin','users'));

    }

    public function updateProfile(ProfileRequest $request)
    {
        //validate
        // db

        try {

            $admin = Admin::find(auth('admin')->user()->id);


            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }

            unset($request['id']);
            unset($request['password_confirmation']);

            $admin->update($request->all());

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }

    }


}
