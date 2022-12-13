<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Userdetail, Doctor, Doctordetail, Prescription, Token};
use DateTime;

class LoginController extends Controller
{
    public function signin(Request $request)
    {
        $check = $request->all();

        if(Auth::attempt(['email' => $check['username'], 'password' => $check['password']])){
            $api_token = Str::random(60);
            $token = new Token;
            $token->user_id = $request->username;
            $token->api_token = Hash('sha256', $api_token);
            $token->save();
            return response()->json(['type'=>'user', 'username'=> $check['username'], 'token'=> $api_token]);
        }
        if(Auth::guard('counter')->attempt(['username' => $check['username'], 'password' => $check['password']])){
            $api_token = Str::random(60);
            $token = new Token;
            $token->user_id = $request->username;
            $token->api_token = Hash('sha256', $api_token);
            $token->save();
            return response()->json(['type'=>'counter', 'username'=> $check['username'], 'token'=> $api_token]);
        }
        if(Auth::guard('doctor')->attempt(['username' => $check['username'], 'password' => $check['password']])){
            $api_token = Str::random(60);
            $token = new Token;
            $token->user_id = $request->username;
            $token->api_token = Hash('sha256', $api_token);
            $token->save();
            return response()->json(['type'=>'doctor', 'username'=> $check['username'], 'token'=> $api_token]);
        }

        return 'Invalid Credentials';
    }
    
    public function index(Request $request)
    {
        $token = $request->header('Authorization');
        $token = json_decode($token);
        $userName = Token::where('api_token',  Hash('sha256', $token->access_token))->where('expired_at', null)->first('user_id');
        $userId = User::where('email', $userName->user_id)->first('id');
        $prescription = Prescription::where('user_id', $userId->id)->orderBy('created_at', 'desc')->first();
        if($prescription)
            $data = json_decode($prescription->prescription_data);
        else
            $data = null;
        // return $data->name[0];
        $user = User::where('id', $prescription->user_id)->with('userdetail')->first();
        $doctor = Doctor::where('id', $prescription->doctor_id)->with('doctordetail')->first();
        return response()->json(['user' => $user, 'doctor' => $doctor, 'data' => $data]);
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
}
