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

use App\Jobs\Tickt1TableJob;
use App\Jobs\Ticket2TableJob;
use App\Jobs\Ticket4TableJob;
use App\Jobs\Ticket5TableJob;
use App\Jobs\Ticket6TableJob;
use App\Jobs\Ticket7TableJob;
use App\Jobs\Ticket8TableJob;
use App\Jobs\Ticket10TableJob;
use App\Jobs\Ticket13TableJob;
use App\Jobs\Ticket11TableJob;
use App\Jobs\Ticket14TableJob;
use App\Jobs\Ticket14bTableJob;
use App\Jobs\Ticket15TableJob;
use App\Jobs\Ticket16TableJob;
use App\Jobs\Ticket12TableJob;
use App\Jobs\Ticket17TableJob;
use App\Jobs\Ticket19TableJob; 
use App\Jobs\Ticket18TableJob; 
use App\Jobs\Ticket23TableJob; 
use App\Jobs\Ticket28TableJob; 
use App\Jobs\Ticket32TableJob; 
use App\Jobs\Ticket36TableJob; 
use App\Jobs\Ticket31TableJob; 
use App\Jobs\Ticket24TableJob; 
use App\Jobs\Ticket24bTableJob; 
use App\Jobs\OrderTableJob; 
use App\Jobs\Ticket37TableJob; 

class TicketImportController extends Controller {

    public function transferTicket1Table() {


        $filename = asset('t_elec_ticket3.json');

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

                dispatch(new Tickt1TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }


    }

    public function transferTicket2Table() {


        $filename = asset('t_elec_ticket1.json');

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

                dispatch(new Ticket2TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }
    }
    
    public function transferTicket4Table() {


        $filename = asset('t_elec_ticket2.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket4TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }


    }
    
    public function transferTicket5Table() {


        $filename = asset('t_elec_ticket4.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket5TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');


            }
            $offset += $limit;
        }


    }
    
    public function transferTicket6Table() {


        $filename = asset('t_elec_ticket6.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket6TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket7Table() {


        $filename = asset('t_elec_ticket5.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket7TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket8Table() {


        $filename = asset('t_elec_ticket7.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket8TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket10Table() {


        $filename = asset('t_elec_ticket10.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket10TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket11Table() {


        $filename = asset('t_elec_ticket31.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket11TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket13Table() {


        $filename = asset('t_elec_ticket16.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket13TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket14Table() {


        $filename = asset('t_elec_ticket27.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket14TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket14bTable() {


        $filename = asset('t_elec_ticket28.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket14bTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket15Table() {


        $filename = asset('t_elec_ticket29.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket15TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket16Table() {


        $filename = asset('t_elec_ticket36.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket16TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket12Table() {


        $filename = asset('t_elec_ticket38.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket12TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket17Table() {


        $filename = asset('t_elec_ticket39.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket17TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket19Table() {


        $filename = asset('v_elec_ticket11.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket19TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket18Table() {


        $filename = asset('v_elec_ticket12.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket18TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket23Table() {


        $filename = asset('t_elec_ticket14.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket23TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket28Table() {


        $filename = asset('t_elec_ticket35.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket28TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket32Table() {


        $filename = asset('t_elec_ticket33.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket32TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    
    public function transferTicket36Table() {


        $filename = asset('t_elec_ticket38.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket36TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket31Table() {


        $filename = asset('t_elec_ticket26.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket31TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket37Table() {


        $filename = asset('t_elec_ticket22.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket37TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket24Table() {


        $filename = asset('t_elec_ticket21.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket24TableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferTicket24bTable() {


        $filename = asset('t_elec_ticket17.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new Ticket24bTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }
    public function transferOrdersTable() {


        $filename = asset('t_elec_ticket26_items.json');

        $items = json_decode(file_get_contents($filename), true);
        $items = collect($items);
        $count = $items->count();

        $offset = 0;
        $limit  = 1000;
        while ($count > $offset) {
            $list = $items->skip($offset)
                ->take($limit);

            foreach ($list as $obj) {

                dispatch(new OrderTableJob($obj));
                // dispatch(new ClientTableJob($obj))->onConnection('database');

            }
            $offset += $limit;
        }


    }

}
