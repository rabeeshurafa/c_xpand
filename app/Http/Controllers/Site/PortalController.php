<?php

namespace App\Http\Controllers\Site;


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
        return view('front.portal', compact('ticket_config'));
    }
}
