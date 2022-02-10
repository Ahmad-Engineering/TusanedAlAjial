<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //

    public function showLogin (){
        return response()->view('cpanel.auth.signin');
    }

    public function login (Request $request) {
        $validator = Validator($request->all(), [
            'email' => 'required|string|min:5|max:40|exists:admins,email',
            'password' => 'required|string|min:8|max:30',
            'remember' => 'required|boolean'
        ]);

        if (!$validator->fails()) {
            $credintials = [
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ];

            if (Auth::guard('admin')->attempt($credintials, $request->get('remember'))) {
                return response()->json([
                    'message' => 'Login successfully',
                ], Response::HTTP_OK);
            }else {
                return response()->json([
                    'message' => 'Faild to login',
                ], Response::HTTP_BAD_REQUEST);
            }
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout (Request $request) {
        if (auth('admin')->check()) {
            auth('admin')->user()->logout;
            $request->session()->invalidate();
            return redirect()->route('login');
        }
    }

}
