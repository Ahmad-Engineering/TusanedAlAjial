<?php

namespace App\Http\Controllers;

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
        $posts = Post::where('admin_id', auth('admin')->user()->id)->get();
        return response()->view('cpanel.posts.profile-posts', [
            'posts' => $posts,
        ]);
    }
}
