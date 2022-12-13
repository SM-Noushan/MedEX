<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;
use Illuminate\Support\Facades\{Hash, Auth, Validator};

class CounterController extends Controller
{
    public function view_counter()
    {
        $counters = Counter::orderBy('id')->get();
        return $counters;
    }

    public function add_counter(Request $request)
    {
        // $request->validate([
        //     
        // ],
        // [
        //     'userid.unique'    => 'Username already exists',
        // ]);
        $validator = Validator::make($request->all(), [
            'userid'  => 'required|string|unique:counters,username',
            'password'  => 'required|min:6|max:32',
            'name'      => 'required|string|unique:counters,countername|max:10',
        ]);
        if($validator->fails()){
            return response(['errors'=> $validator->errors()]);
        }

        $counter = new Counter;
        $counter->countername = $request->name;
        $counter->username = $request->userid;
        $counter->password =Hash::make($request->password);
        $counter->save();
        return ('Counter Info Successfully Added');
    }

    public function delete_counter($id)
    {
        $counter = Counter::find($id);
        $counter->delete();

        return ('Successfully Removed');
    }
}
