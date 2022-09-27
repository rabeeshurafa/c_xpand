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

use App\Jobs\ResponseTableJob;
use App\Jobs\TransTableJob;
use App\Jobs\TicketStatusTableJob;


class TransImportController extends Controller {

    public function transferTransTable() {
        $filename = asset('v_elec_ticket_trans.json');

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

                dispatch(new TransTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }
    }
    public function transferTicketStatusTable() {


        $filename = asset('t_elec_ticket_summary.json');

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

                dispatch(new TicketStatusTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }


    }
    public function transferResponseTable() {


        $filename = asset('t_elec_ticket_respponse.json');

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

                dispatch(new ResponseTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }


    }
}
