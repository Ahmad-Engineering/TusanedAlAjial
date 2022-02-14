<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminSocial;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    private string $email = 'az540546@gmail.com';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($this->checkAdminStatus()) {
            if (auth('admin')->user()->email == $this->email) {
                $admins = Admin::all();
                return response()->view('cpanel.admin.index', [
                    'admins' => $admins
                ]);
            } else {
                $count = Admin::where('email', '!=', $this->email)->count();
                if ($count > 0) {
                    $admins = Admin::where('email', '!=', $this->email)->get();
                    return response()->view('cpanel.admin.index', [
                        'admins' => $admins
                    ]);
                } else {
                    return redirect()->route('admin.dashbord');
                }
            }
        } else {
            return redirect()->route('admin.logout');
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
        if ($this->checkAdminStatus()) {
            $password = rand(50000, 10000000000);
            return response()->view('cpanel.admin.create', [
                'password' => $password,
            ]);
        } else {
            return redirect()->route('admin.logout');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($this->checkAdminStatus()) {
            $validator = Validator($request->all(), [
                'name' => 'required|string|min:5|max:30',
                'email' => 'required|string|min:8|max:40',
                'pin' => 'required|string|min:9|max:20',
                'age' => 'required|integer|min:18|max:80',
                'status' => 'required|string|in:active,blocked',
                'password' => 'required|string|min:8|max:30',
                'admin_image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
            ]);
            //
            if (!$validator->fails()) {
                $admin = new Admin();
                $socialAdmin = new AdminSocial();

                $admin->name = $request->get('name');
                $admin->email = $request->get('email');
                $admin->pin = $request->get('pin');
                $admin->phone = $request->get('phone');
                $admin->age = $request->get('age');
                $admin->bio = $request->get('bio');
                $admin_image = $request->file('admin_image');
                $admin_image_name = time() . '_admin_' . '.' . $admin_image->getClientOriginalExtension();
                $admin_image->move(public_path('images\admins'), $admin_image_name);
                $admin->image = $admin_image_name;

                if ($request->get('status') == 'active') {
                    $admin->status = 1;
                } else {
                    $admin->status = 0;
                }
                $admin->password = Hash::make($request->get('password'));

                $isSaved = $admin->save();
                // TO ADD SOCIAL ADMIN
                $socialAdmin->admin_id = $admin->id;
                $socialAdmin->save();

                return response()->json([
                    'message' => $isSaved ? 'Admin created successfully' : 'Faild to create admin'
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'message' => $validator->getMessageBag()->first()
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return redirect()->route('admin.logout');
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
        if ($this->checkAdminStatus()) {
            if (auth('admin')->user()->email == $this->email) {
                return response()->view('cpanel.admin.edit', [
                    'admin' => $admin,
                ]);
            } else {
                $super_admin_count = Admin::where('email', $admin->email)
                    ->where('email', $this->email)
                    ->count();

                if ($super_admin_count > 0) {
                    return redirect()->route('admin.index');
                } else {
                    return response()->view('cpanel.admin.edit', [
                        'admin' => $admin
                    ]);
                }
            }
        } else {
            return redirect()->route('admin.logout');
        }
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
        if ($this->checkAdminStatus()) {
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
                $admin->bio = $request->get('bio');
                if ($request->get('email') == auth('admin')->user()->email) {
                    $admin->status = 1;
                    if ($request->get('email') == $this->email) {
                        $admin->email = $this->email;
                    }
                } else {
                    if ($request->get('status') == 'active') {
                        $admin->status = 1;
                    } else {
                        $admin->status = 0;
                    }
                }

                $isSaved = $admin->save();
                return response()->json([
                    'message' => $isSaved ? 'Admin updated successfully' : 'Faild to update admin'
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'message' => $validator->getMessageBag()->first()
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return redirect()->route('admin.logout');
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
        if ($this->checkAdminStatus()) {
            if (auth('admin')->user()->email == $this->email) {
                if ($admin->delete()) {
                    return response()->json([
                        'icon' => 'success',
                        'title' => 'Deleted',
                        'text' => 'admin deleted successfully',
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'icon' => 'error',
                        'title' => 'Faild',
                        'text' => 'faild to delete admin',
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                return response()->json([
                    'icon' => 'error',
                    'title' => 'Faild',
                    'text' => 'Unotheriztion access',
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return redirect()->route('admin.logout');
        }
    }

    private function checkAdminStatus()
    {
        if (auth('admin')->user()->status) {
            return true;
        } else {
            return false;
        }
    }
}
