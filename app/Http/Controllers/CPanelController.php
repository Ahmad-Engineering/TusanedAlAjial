<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CPanelController extends Controller
{
    //
    public function showDashbord () {
        return response()->view('cpanel.index');
    }
}
