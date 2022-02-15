<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    //
    public function showCommunity()
    {
        $community_posts = Post::with('admin')
            ->with('category')
            ->latest('created_at')
            ->get();
        return response()->view('cpanel.posts.comunity', [
            'community_posts' => $community_posts,
        ]);
    }

    public function showMyProfilePosts($id)
    {
        $posts = Post::where('admin_id', $id)->with('admin')->with('category')->get();
        $admin = Admin::where('id', $id)->first();
        return response()->view('cpanel.posts.profile-posts', [
            'posts' => $posts,
            'admin' => $admin
        ]);
    }
}
