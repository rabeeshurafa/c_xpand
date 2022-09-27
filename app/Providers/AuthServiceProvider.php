<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Menu;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $id=0;
        $userPer=array();
        if(isset(Auth()->user()->id)) {    
            $id=Auth()->user()->id;
            $admin=Admin::find(Auth()->user()->id);
            $roles=Role::find($admin->role_id);
            $list=$roles->permissions;
        
            $userPer=Menu::whereIn('s_function_url',$list)->where('b_enabled',1)->get();
        }
        
        $SysPer=Menu::where('b_enabled',1)->get();
        $Per=array();
        foreach($SysPer as $row)
            $Per[$row->s_function_url]= $row->s_function_title_en;
            //dd($Per,config('global.permissions'));
        foreach ( /*config('global.permissions')*/$Per as $ability => $value) { 
            Gate::define($ability, function ($auth) use ($ability){

                return $auth->hasAbility($ability);
            });
        }
    }
}
