<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminSocial;
use Dotenv\Validator;
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
        $validator = Validator($request->all(), [
            'facebook_link' => 'sometimes|nullable',
            'twitter_link' => 'sometimes|nullable',
            'skype_link' => 'sometimes|nullable',
            'linkedin_link' => 'sometimes|nullable',
        ]);
        //
        if (!$validator->fails()) {
            $adminSocial = AdminSocial::where('admin_id', auth('admin')->user()->id)->first();
            if (!is_null($adminSocial)) {
                if ($request->get('facebook_link') != "NULL") {
                    $adminSocial->facebook = $request->get('facebook_link');
                }else {
                    $adminSocial->facebook = '#';
                }
                if ($request->get('skype_link') != "NULL") {
                    $adminSocial->skype = $request->get('skype_link');
                }else {
                    $adminSocial->skype = '#';
                }
                if ($request->get('twitter_link') != "NULL") {
                    $adminSocial->twitter = $request->get('twitter_link');
                }else {
                    $adminSocial->twitter = '#';
                }
                if ($request->get('linkedin_link') != "NULL") {
                    $adminSocial->linkedin = $request->get('linkedin_link');
                }else {
                    $adminSocial->linkedin = '#';
                }
                $adminSocial->admin_id = auth('admin')->user()->id;

                $isSaved = $adminSocial->save();
                return response()->json([
                    'message' => $isSaved ? 'Admin social links is saved successfully' : 'Faild to save links',
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                $adminSocial = new AdminSocial();
                if ($request->get('facebook_link') != "NULL") {
                    $adminSocial->facebook = $request->get('facebook_link');
                }else {
                    $adminSocial->facebook = '#';
                }
                if ($request->get('skype_link') != "NULL") {
                    $adminSocial->skype = $request->get('skype_link');
                }else {
                    $adminSocial->skype = '#';
                }
                if ($request->get('twitter_link') != "NULL") {
                    $adminSocial->twitter = $request->get('twitter_link');
                }else {
                    $adminSocial->twitter = '#';
                }
                if ($request->get('linkedin_link') != "NULL") {
                    $adminSocial->linkedin = $request->get('linkedin_link');
                }else {
                    $adminSocial->linkedin = '#';
                }
                $adminSocial->admin_id = auth('admin')->user()->id;

                $isSaved = $adminSocial->save();
                return response()->json([
                    'message' => $isSaved ? 'Admin social links is saved successfully' : 'Faild to save links',
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
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
