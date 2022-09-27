<?php

namespace App\Http\Controllers\Site;


use App\Models\Category;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function home()
    {

        return view('front.home');
    }
}
