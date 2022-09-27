<?php

namespace App\Providers;

use App\Support\Storage\Contracts\StorageInterface;
use App\Support\Storage\SessionStorage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\Message;
use App\Models\MessageReciver;
use App\Models\Admin;
use App\Models\Role;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         Schema::defaultStringLength(191);
         $this->app->bind(StorageInterface::class, function ($app) {
            return new SessionStorage('basket');
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {/*
        $admin=Admin::find(Auth()->user()->id);
        $roles=Role::find($admin->role_id);
        $list=json_decode($roles->permissions);
        
        $allPer=Menu::get();
        $SysPer=Menu::where('b_enabled',1)->get();
        $userPer=Menu::whereIn('s_function_url',$list)->get();*/
        
        view::composer('*' , function ($view){
            $id=0;
            $userPer=array();
        if(isset(Auth()->user()->id)) {    
            $id=Auth()->user()->id;
            $admin=Admin::find(Auth()->user()->id);
            $roles=Role::find($admin->role_id);
            $list=$roles->permissions;
        
            $userPer=Menu::whereIn('s_function_url',$list)->where('b_enabled',1)->get();
        }
        $allPer=Menu::get();
        $SysPer=Menu::where('b_enabled',1)->get();
        $employee=Admin::where('enabled',1)->get();
        //dd($userPer);
        $rMsgemp=Message::whereIn('id',MessageReciver::select('i_message_id')->where('i_receiver_id',$id)->where('is_seen',0)->get())->get();
        //dd($rMsgemp);
        //$sMsgemp=Message::where('created_by',Auth()->user()->id)->get();
        
            $setting = Setting::first();
            if($setting->city_id){
                $city_id = $setting->city_id;
            }else{
                $city_id =0;
            }
            if($setting->town_id){
                $town_id = $setting->town_id;
            }else{
                $town_id =0;
            }
            if($setting->region_id){
                $region_id = $setting->region_id;
            }else{
                $region_id =0;
            }
            $view-> with([
                  'setting'      => $setting,
                  'city_id'    => $city_id,
                  'town_id'    => $town_id,
                  'region_id'   => $region_id,
                  'allPer'       => $allPer,
                  'SysPer'       => $SysPer,
                  'userPer'      => $userPer,
                  'employees'      => $employee,
                  'rMsgemp'      => $rMsgemp,
                  //'sMsgemp'      => $sMsgemp,
                ]) ;
            });
     }
}
