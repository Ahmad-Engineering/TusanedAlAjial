<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteAccountController extends Controller
{
    //
    private string $email = 'az540546@gmail.com';
    public function deleteAdminAccount($id)
    {
        $admin = Admin::find($id);
        if ($admin->email == $this->email)
            return response()->json([
                'icon' => 'error',
                'title' => 'Can not delete.',
                'text' => 'You are trying to delete supper admin account',
            ], Response::HTTP_BAD_REQUEST);

        if (!is_null($admin)) {
            if ($admin->delete()) {
                return response()->json([
                    'icon' => 'success',
                    'title' => 'Deleted',
                    'text' => 'Account deleted successfully',
                ], Response::HTTP_OK);
            }else {
                return response()->json([
                    'icon' => 'error',
                    'title' => 'Faild',
                    'text' => 'Faild to delete your account',
                ], Response::HTTP_BAD_REQUEST);
            }
        }else {
            return redirect()->route('admin.dashbord');
        }
    }
}
