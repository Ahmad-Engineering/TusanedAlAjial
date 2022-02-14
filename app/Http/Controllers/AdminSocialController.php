<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminSocial;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $social_count = AdminSocial::where('admin_id', auth('admin')->user()->id)->count();
        $social = auth('admin')->user()->social;
        return response()->view('cpanel.admin.social-media.admin-socail-media', [
            'social' => $social,
            'social_count' => $social_count,
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
        return response()->json([
            'message' => $request->get('facebook_link'),
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSocial $adminSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSocial $adminSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminSocial $adminSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSocial $adminSocial)
    {
        //
    }
}
