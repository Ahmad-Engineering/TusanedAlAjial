<?php

namespace App\Http\Controllers;

use App\Models\AdminSocial;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //

    public function showAdminProfile()
    {
        $categories = Category::where('admin_id', auth('admin')->user()->id)
        ->where('status', true)
        ->get();
        $links = AdminSocial::where('admin_id', auth('admin')->user()->id)->first();
        return response()->view('cpanel.admin.admin-profile', [
            'links' => $links,
            'categories' => $categories
        ]);
    }
}
