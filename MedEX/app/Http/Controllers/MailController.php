<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class MailController extends Controller
{
    // Email Verification for New User  __START

    public function index () {
        return view('user.dashboard');
    }

    public function verify (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }

    public function verify_confirm (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('user.dashboard');
    }

    // Email Verification for New User  __END
}
