<?php

namespace App\Http\Controllers\Portal;


use App\Models\Category;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\TicketConfig;

class PortalController extends Controller
{

    public function portal()
    {
        $ticket_config=TicketConfig::get();
        return view('portal.front.portal', compact('ticket_config'));
    }
}
