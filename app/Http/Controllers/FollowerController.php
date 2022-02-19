<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'admin_follower' => 'required|integer|min:1|exists:admins,id',
            'admin_following' => 'required|integer|min:1|exists:admins,id',
        ]);
        //

        if (!$validator->fails()) {
            $follow = Follower::where('follower', $request->get('admin_follower'))
            ->where('following', $request->get('admin_following'))
            ->first();

            if (!is_null($follow)) {
                $isDeleted = $follow->delete();
                return response()->json([
                    'message' => $isDeleted ? 'Unfollowing' : 'Faild',
                ], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }else {
                $follow = new Follower();
                $follow->follower = $request->get('admin_follower');
                $follow->following = $request->get('admin_following');
    
                $isSaved = $follow->save();
    
                return response()->json([
                    'message' => $isSaved ? 'Success' : 'Faild',
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follower  $follower
     * @return \Illuminate\Http\Response
     */
    public function show(Follower $follower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Follower  $follower
     * @return \Illuminate\Http\Response
     */
    public function edit(Follower $follower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Follower  $follower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follower $follower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follower  $follower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follower $follower)
    {
        //
    }
}
