<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __invoke()
    {
        return view('auth.login');
    }
}
