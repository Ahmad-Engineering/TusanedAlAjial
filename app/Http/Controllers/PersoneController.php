<?php

namespace App\Http\Controllers;

use App\Models\Persone;
use Illuminate\Http\Request;

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
}
