<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminChangePasswordController extends Controller
{
    //

    public function showChangePassword ($id) {
        $admin = Admin::find($id);

        if (!is_null($admin)) {
            return response()->view('cpanel.admin.change-password', [
                'admin' => $admin
            ]);
        }else {
            return redirect()->route('admin.index');
        }
    }

    public function changePassword (Request $request, $id) {
        $validator = Validator($request->all(), [
            'new_password' => 'required|string|min:8|max:40',
            're_password' => 'required|string|min:8|max:40',
        ]);
        if (!$validator->fails()) {
            if ($request->get('new_password') == $request->get('re_password')) {

                $admin = Admin::find($id);
                if (!is_null($admin)) {
                    $admin->password = Hash::make($request->get('new_password'));
                    $isChanged = $admin->save();

                    return response()->json([
                        'message' => $isChanged ? 'Password changed successfully' : 'Faild to change password',
                    ], $isChanged ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                }else {
                    return redirect()->route('admin.index');
                }
            }else {
                return response()->json([
                    'message' => 'Password doesn\'t maches.'
                ], Response::HTTP_BAD_REQUEST);
            }
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
