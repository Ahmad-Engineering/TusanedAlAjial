<?php

namespace App\Http\Controllers;

use App\Models\AdminSocial;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //

    public function showAdminProfile()
    {
        $links = AdminSocial::where('admin_id', auth('admin')->user()->id)->first();
        return response()->view('cpanel.admin.admin-profile', [
            'links' => $links,
        ]);
    }
}
