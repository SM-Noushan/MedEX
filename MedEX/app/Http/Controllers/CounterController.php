<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Counter;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

class CounterController extends Controller
{
    public function form_add_counter()
    {
        return view('admin.counter.create');
    }

    public function add_counter(Request $request)
    {
        $request->validate([
            'username'  => 'required|string|unique:counters,username',
            'password'  => 'required|min:8|max:32',
            'name'      => 'required|string|unique:counters,countername',
        ],
        [
            'username.unique'    => 'Username already exists',
        ]);
        
        $counter = new Counter;

        $counter->countername = $request->name;
        $counter->username = $request->username;
        $counter->password =Hash::make($request->password);
        $counter->save();

        return redirect()->back()->with('message', 'Counter Info Successfully Added');
    }

    public function view_counter()
    {
        $counters = Counter::orderBy('id')->get();
        return view('admin.counter.view', compact('counters'));
    }

    public function form_edit_counter($id)
    {
        $counters = Counter::find($id);
        return view('admin.counter.edit', compact('counters'));
    }

    public function edit_counter(Request $request, $id)
    {
        $request->validate([
            'username'  => [
                            'required',
                            Rule::unique('counters','username')->ignore($id)
                        ],
            'password'  => 'nullable|min:8|max:32',
            'name'      => [
                            'nullable','required','string',
                            Rule::unique('counters','countername')->ignore($id)
                        ],
        ],
        [
            'username.unique'    => 'Username already exists',
            'name.unique'    => 'Countername already exists',
        ]);
        
        $counter = Counter::find($id);

        $counter->countername = $request->name;
        $counter->username = $request->username;
        if($request->password != null)
            $counter->password = Hash::make($request->password);
        $counter->save();

        return redirect()->back()->with('message', 'Counter Info Successfully Updated');
    }

    public function delete_counter($id)
    {
        $counter = Counter::find($id);
        $counter->delete();

        return redirect()->back()->with('message', 'Successfully Removed');
    }
}
