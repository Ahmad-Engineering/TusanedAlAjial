<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = Admin::count();
        if ($count > 0) {
            $admins = Admin::all();
            return response()->view('cpanel.admin.index', [
                'admins' => $admins
            ]);
        }else {
            return redirect()->route('admin.dashbord');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $password = rand(50000, 10000000000);
        return response()->view('cpanel.admin.create', [
            'password' => $password,
        ]);
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
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|string|min:8|max:40',
            'pin' => 'required|string|min:9|max:20',
            'age' => 'required|integer|min:18|max:80',
            'status' => 'required|string|in:active,blocked',
            'password' => 'required|string|min:8|max:30',
        ]);
        //
        if (!$validator->fails()) {
            $admin = new Admin();

            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->pin = $request->get('pin');
            $admin->phone = $request->get('phone');
            $admin->age = $request->get('age');
            if ($request->get('status') == 'active') {
                $admin->status = 1;
            }else {
                $admin->status = 0;
            }
            $admin->password = Hash::make($request->get('password'));

            $isSaved = $admin->save();
            return response()->json([
                'message' => $isSaved ? 'Admin created successfully' : 'Faild to create admin'
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        return response()->view('cpanel.admin.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|string|min:8|max:40',
            'pin' => 'required|string|min:9|max:20',
            'age' => 'required|integer|min:18|max:80',
            'status' => 'required|string|in:active,blocked',
        ]);
        //
        if (!$validator->fails()) {
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->pin = $request->get('pin');
            $admin->phone = $request->get('phone');
            $admin->age = $request->get('age');
            if ($request->get('status') == 'active') {
                $admin->status = 1;
            }else {
                $admin->status = 0;
            }

            $isSaved = $admin->save();
            return response()->json([
                'message' => $isSaved ? 'Admin updated successfully' : 'Faild to update admin'
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        if ($admin->delete()) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Deleted',
                'text' => 'admin deleted successfully',
            ], Response::HTTP_OK);
        }else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild',
                'text' => 'faild to delete admin',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
