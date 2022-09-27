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

use App\Jobs\LicArchTableJob;


class LicArchImportController extends Controller {

    public function transferLicArchTable() {


        $filename = asset('t_licarch.json');

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

                dispatch(new LicArchTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }


    }
}
