<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use Auth;
use App\Image;

use App\Jobs\ElecTableJob;


class ElecImportController extends Controller {

    public function transferElecTable() {


        $filename = asset('v_electricity_subscription.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

//            dd($list);
            foreach ($list as $obj) {

                dispatch(new ElecTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }


    }
}
