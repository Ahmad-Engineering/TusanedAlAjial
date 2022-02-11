<?php

namespace App\Http\Controllers;

use App\Models\Persone;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persones = Persone::where('status', 1)->get();
        return response()->view('cpanel.persone.index', [
            'persones' => $persones,
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
     * @param  \App\Models\Persone  $persone
     * @return \Illuminate\Http\Response
     */
    public function show(Persone $persone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persone  $persone
     * @return \Illuminate\Http\Response
     */
    public function edit(Persone $persone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persone  $persone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persone $persone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persone  $persone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persone $persone)
    {
        //
    }

    public function blockPersone($id)
    {
        $persone = Persone::find($id);
        if (!is_null($persone)) {
            $persone->status = 0;
            $isUpdated = $persone->save();

            return response()->json([
                'message' => $isUpdated ? 'Persone blocked successfully' : 'Faild to block persone',
            ], $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => 'You are trying to access with no persone.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
