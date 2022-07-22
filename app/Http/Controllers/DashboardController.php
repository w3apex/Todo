<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class DashboardController extends Controller
{
    public function __invoke()
    {   
        $data['title'] = __('Dashboard');
        return view("backend.pages.dashboard",$data);
    }

}
