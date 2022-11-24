<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Cookie};
use App\Models\{User, Userdetail};

class LoginController extends Controller
{
    public function form_login()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        $check = $request->all();
        $remember  = ( !empty( $check['remember']) )? TRUE : FALSE;

        if(Auth::attempt(['email' => $check['email'], 'password' => $check['password']])){
            Session()->put('Role', 'User');
            if($remember){
                Cookie::queue(Cookie()->forever('usermail', $check['email']));
                Cookie::queue(Cookie()->forever('userpass', $check['password']));
                Cookie::queue(Cookie()->forever('remember', 'true'));
            }
            else{
                Cookie::queue(Cookie()->forget('usermail'));
                Cookie::queue(Cookie()->forget('userpass'));
                Cookie::queue(Cookie()->forget('remember'));
            }
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

    public function form_register()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'brn_nid' => ['required', 'numeric', 'regex:/^(\d{10}|\d{17})$/', 'unique:userdetails,birthcertificate'],
            'password' => ['required', 'min:8', 'max:32', 'confirmed'],
        ],
        [
            'brn_nid' => 'Incorrect BRN/NID'
        ]);

        $user = New User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $userid = User::where('email', $request->email)->first('id');
        $userdetail = New Userdetail();
        $userdetail->name = $request->name;
        $userdetail->birthcertificate = $request->brn_nid;
        $userdetail->user_id = $userid->id;
        $userdetail->save();

        Auth::login($user);
        Session()->put('Role', 'User');
        $request->user()->sendEmailVerificationNotification();
        return redirect()->route('user.dashboard')->with('message', 'Signup in successful');

    }
}
