<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Userdetail, Prescription};

class UserController extends Controller
{
    public function index()
    {
        $prescription = Prescription::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if($prescription)
            $data = json_decode($prescription->prescription_data);
        else
            $data = null;
        // return $data->name[0];
        return view('user.dashboard', compact('data', 'prescription'));
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        // return redirect('/')->with('message', 'Signout Successful');
        return redirect('/')->with('message', 'Signout Successful');
    }
}
