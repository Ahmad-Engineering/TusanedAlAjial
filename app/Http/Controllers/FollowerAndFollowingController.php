<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerAndFollowingController extends Controller
{
    //
    public function showFollower($id)
    {
        $following_admin = Admin::where('id', $id)->first();
        $followers_id = Follower::where('following', $id)->get();
        $followers = [];
        foreach ($followers_id as $follower) {
            $admin = Admin::where('id', $follower->follower)->first();
            $admin->setAttribute('follower_no', Follower::where('following', $admin->id)->count());
            array_push($followers, $admin);
        }

        return response()->view('cpanel.follow.follower', [
            'followers' => $followers,
            'admin' => $following_admin,
        ]);
    }

    public function showFollowing($id)
    {
        $following_admin = Admin::where('id', $id)->first();
        $following_id = Follower::where('follower', $id)->get();
        $followings = [];
        foreach ($following_id as $following) {
            $admin = Admin::where('id', $following->following)->first();
            $admin->setAttribute('follower_no', Follower::where('following', $admin->id)->count());
            array_push($followings, $admin);
        }

        return response()->view('cpanel.follow.following', [
            'followings' => $followings,
            'admin' => $following_admin,
        ]);
    }
}
