<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
Use App\Models\{Doctor, Counter, User, Token, Userdetail};
use DateTime;

class AdminController extends Controller
{
    public function state()
    {
        return 'Okay';
    }

    public function index()
    {
        $users_count = User::all()->count();
        $doctors_count = Doctor::all()->count();
        $counters_count = Counter::all()->count();
        return response()->json(['users'=>$users_count, 'doctors'=>$doctors_count, 'counters'=>$counters_count, 'operators'=>'0']);
    }

    public function signin(Request $request)
    {
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['username' => $check['username'], 'password' => $check['password']])){
            $api_token = Str::random(60);
            $token = new Token;
            $token->user_id = $request->username;
            $token->api_token = Hash('sha256', $api_token);
            $token->save();
            return response()->json(['username'=> $check['username'], 'token'=> $api_token]);
        }
        return 'Invalid Credentials';
    }

    public function signout(Request $request)
    {
        $token = $request->header('Authorization');
        $token = json_decode($token);
        $db_token = Token::where('api_token',  Hash('sha256', $token->access_token))->first();
        // $db_token->delete();
        if($db_token){
            $db_token->expired_at = new DateTime();
            $db_token->save();
            return 'Signout successfully';
        }
        return 'Unexpected Error';
    }

    public function view_user(){
        $users = User::orderBy('id')->with('userdetail')->get();
        return $users;
    }
}
