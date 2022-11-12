<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function form_login()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        $check = $request->all();
        // dd($check);
        if(Auth::attempt(['email' => $check['email'], 'password' => $check['password']])){
            Session()->put('Role', 'User');
            return redirect()->route('user.dashboard')->with('message', 'Sign in successful');
        }
        if(Auth::guard('counter')->attempt(['username' => $check['email'], 'password' => $check['password']])){
            Session()->put('Role', 'Counter');
            return redirect()->route('counter.dashboard')->with('message', 'Sign in successful');
        }
        if(Auth::guard('doctor')->attempt(['username' => $check['email'], 'password' => $check['password']])){
            Session()->put('Role', 'Doctor');
            return redirect()->route('doctor.dashboard')->with('message', 'Sign in successful');
        }

        
        return redirect()->back()->withError('Invalid Credentials');
    }
}
