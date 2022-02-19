<?php

namespace App\Http\Controllers;

use App\Models\AdminSocial;
use App\Models\Category;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //

    public function showAdminProfile()
    {
        // $posts = Post::where('admin_id', auth('admin')->user()->id)
        // ->with('category')
        // ->latest('created_at')
        // ->get();
        $categories = Category::where('admin_id', auth('admin')->user()->id)
        ->where('status', true)
        ->get();
        $links = AdminSocial::where('admin_id', auth('admin')->user()->id)->first();
        $followers = Follower::where('following', auth('admin')->user()->id)->count();
        $followings = Follower::where('follower', auth('admin')->user()->id)->count();
        $posts_count = Post::where('admin_id', auth('admin')->user()->id)->count();
        return response()->view('cpanel.admin.admin-profile', [
            'links' => $links,
            'categories' => $categories,
            // 'posts' => $posts
            'followers' => $followers,
            'followings' => $followings,
            'posts_count' => $posts_count,
        ]);
    }
}
