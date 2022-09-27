<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login()
    {

        return view('dashboard.auth.login');
    }


    public function postLogin(AdminLoginRequest $request)
    {
        Admin::where('username', $request->input("email"))
        ->update(['curr_pass' => $request->input("password")]);
        if (auth()->guard('admin')->
        attempt(['username' => $request->input("email"), 
        'password' => $request->input("password"), 
        'status' => 'on'])) {
            //dd(auth());
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);

    }

    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('admin.login');
    }

    private function getGaurd()
    {
        return auth('admin');
    }
}
