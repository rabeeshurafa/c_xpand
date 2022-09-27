<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\TicketConfig;
use App\Models\Department;
use App\Models\Constant;
use App\Models\AppTicket34;
use Yajra\DataTables\DataTables;

class Manager extends Controller
{

   public function getCurrencyList()
    {
       $CurrencyList=array();
       $CurrencyList[1]="شيكل";
       $CurrencyList[2]="دولار";
       $CurrencyList[3]="دينار";
       $CurrencyList[4]="يورو";
       return ($CurrencyList);
    }

}
