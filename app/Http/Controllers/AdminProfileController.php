<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //

    public function showAdminProfile()
    {
        return response()->view('cpanel.admin.admin-profile');
    }
}
