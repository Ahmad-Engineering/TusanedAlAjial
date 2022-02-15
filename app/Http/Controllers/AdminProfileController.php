<?php

namespace App\Http\Controllers;

use App\Models\AdminSocial;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //

    public function showAdminProfile()
    {
        $posts = Post::where('admin_id', auth('admin')->user()->id)
        ->with('category')
        ->latest('created_at')
        ->get();
        $categories = Category::where('admin_id', auth('admin')->user()->id)
        ->where('status', true)
        ->get();
        $links = AdminSocial::where('admin_id', auth('admin')->user()->id)->first();
        return response()->view('cpanel.admin.admin-profile', [
            'links' => $links,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
