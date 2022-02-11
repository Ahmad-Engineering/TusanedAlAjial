<?php

namespace App\Http\Controllers;

use App\Models\ApplyIdea;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ideas = ApplyIdea::where('done', 0)->get();
        return response()->view('cpanel.idea.index', [
            'ideas' => $ideas
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function doingIdea ($id) {
        $idea = ApplyIdea::find($id);

        if (!is_null($idea)) {
            $idea->done = 1;
            $isUpdated = $idea->save();

            return response()->json([
                'message' => $isUpdated ? 'Idea done successfully' : 'Faild to doing idea'
            ], $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'message' => 'You are try to edit un-existing idea',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
