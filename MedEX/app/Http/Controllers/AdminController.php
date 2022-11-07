<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

Use App\Models\Doctor;
// use Image;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

// use App\Http\Requests\StoreAdminRequest;
// use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    public function index()
    {
        $doctors_count = Doctor::all()->count();
        return view('admin.dashboard', compact('doctors_count'));
    }

    public function form_login()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['username' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.dashboard')->with('message', 'Sign in successful');
        }
        return redirect()->back()->withError('Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('message', 'Logout Successful');
    }
}
