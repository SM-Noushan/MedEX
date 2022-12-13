<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Doctor, Doctordetail, Queuelist, Userdetail, Prescription};
use Illuminate\Support\Facades\{File, Hash, Auth, DB};
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    //__Start_Admin_Doctor_Section__//
    public function form_add_doctor()
    {
        return view('admin.doctors.create');
    }

    public function add_doctor(Request $request)
    {
        $request->validate([
            'username'  => 'required|string|unique:doctors,username',
            'password'  => 'required|min:8|max:32',
            'email'     => 'required|email|unique:doctordetails,email',
            'name'      => 'required|string',
            'department'=> 'required|string',
            'degree'    => 'required|string',
            'phone1'    => 'required|numeric|regex:/^(01[3-9]\d{8})$/|digits:11|unique:doctordetails,phone1|unique:doctordetails,phone2',
            'phone2'    => 'sometimes|nullable|regex:/^(01[3-9]\d{8})$/|digits:11|unique:doctordetails,phone2|unique:doctordetails,phone2',
            'bloodgroup'=> 'required|notIn:Select',
            'gender'    => 'required',
            'religion'  => 'required|notIn:Select', 
            'imagefile' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'username.unique'    => 'Username already exists',
            'email.unique'       => 'Email already exists',
            'phone1.unique'      => 'Phone already exists',
            'phone2.unique'      => 'Phone already exists',
            'bloodgroup.not_in'  => 'Select Bloodgroup',
            'religion.not_in'    => 'Select Religion',
        ]);
        
        $doctor = new Doctor;
        $doctordetail = new Doctordetail;

        $doctor->username = $request->username;
        $doctor->password =Hash::make($request->password);
        $doctor->save();

        $doctor_id = Doctor::where('username', $request->username)->first();
        $doctordetail->name = $request->name;
        $doctordetail->degrees = $request->degree;
        $doctordetail->bloodgroup = $request->bloodgroup;
        $doctordetail->sex = $request->gender;
        $doctordetail->religion = $request->religion;
        $doctordetail->email = $request->email;
        $doctordetail->department = $request->department;
        $doctordetail->phone1 = $request->phone1;
        $doctordetail->phone2 = $request->phone2;
        $doctordetail->doctor_id = $doctor_id->id;
        $photo = $request->imagefile;

        $photoname = $request->username .'-'.$photo->getClientOriginalName();
        Image::make($photo)->resize(600, 400)->save('media/doctor' .'/'. $photoname);
        $doctordetail->image = 'media/doctor' .'/'. $photoname;
        $doctordetail->save();

        return redirect()->back()->with('message', 'Doctor Info Successfully Added');
    }

    public function view_doctor()
    {
        $doctors = Doctor::orderBy('id')->get();
        return view('admin.doctors.view', compact('doctors'));
    }

    public function form_edit_doctor($id)
    {
        $doctors = Doctor::find($id);
        return view('admin.doctors.edit', compact('doctors'));
    }

    public function edit_doctor(Request $request, $id)
    {
        $request->validate([
            'username'  => [
                            'required',
                            Rule::unique('doctors','username')->ignore($id)
                        ],
            'password'  => 'nullable|min:8|max:32',
            'email'     => [
                            'required','email',
                            Rule::unique('doctordetails','email')->ignore($id, 'doctor_id')
                        ],
            'name'      => 'required|string',
            'department'=> 'required|string',
            'degree'    => 'required|string',
            'phone1'    => [
                            'required','numeric','regex:/^(01[3-9]\d{8})$/','digits:11',
                            Rule::unique('doctordetails','phone1')->ignore($id, 'doctor_id'),
                            Rule::unique('doctordetails','phone2')->ignore($id, 'doctor_id')
                        ],
            'phone2'    => [
                            'nullable','numeric','regex:/^(01[3-9]\d{8})$/','digits:11',
                            Rule::unique('doctordetails','phone1')->ignore($id, 'doctor_id'),
                            Rule::unique('doctordetails','phone2')->ignore($id, 'doctor_id')
                        ], 
            'imagefile' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'username.unique'    => 'Username already exists',
            'email.unique'       => 'Email already exists',
            'phone1.unique'      => 'Phone already exists',
            'phone2.unique'      => 'Phone already exists',
        ]);
        
        $doctor = Doctor::find($id);
        $doctordetail = Doctordetail::where('doctor_id', $id)->first();

        $doctor->username = $request->username;
        if($request->password != null)
            $doctor->password = Hash::make($request->password);
        $doctor->save();

        $doctordetail->name = $request->name;
        $doctordetail->degrees = $request->degree;
        $doctordetail->bloodgroup = $request->bloodgroup;
        $doctordetail->sex = $request->gender;
        $doctordetail->religion = $request->religion;
        $doctordetail->email = $request->email;
        $doctordetail->department = $request->department;
        $doctordetail->phone1 = $request->phone1;
        $doctordetail->phone2 = $request->phone2;

        if($request->hasFile('imagefile')){
            if(File::exists($doctordetail->image))
                File::delete($doctordetail->image);

            $photo = $request->imagefile;
            $photoname = $request->username .'-'.$photo->getClientOriginalName();
            Image::make($photo)->resize(600, 400)->save('media/doctor' .'/'. $photoname);
            $doctordetail->image = 'media/doctor' .'/'. $photoname;
        }
        $doctordetail->save();
        return redirect()->back()->with('message', 'Doctor Info Successfully Updated');
    }

    public function delete_doctor($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        
        $doctordetail = Doctordetail::find($id);
        $doctordetail->delete();

        return redirect()->back()->with('message', 'Successfully Removed');
    }

    //__End_Admin_Doctor_Section__//



    //__Start_Doctor_as_an_user_Section__//
    public function index()
    {
        $queuelists = Queuelist::where('doctor_id', Auth::guard('doctor')->user()->id)->orderBy('created_at')->get();
        return view('doctor.dashboard', compact('queuelists'));
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();
        session()->flush();
        return redirect('/')->with('message', 'Signout Successful');
    }

    public function form_prescribe($id)
    {
        $user = Userdetail::where('user_id', $id)->first();
        return view('doctor.prescription', compact('user'));
    }

    public function store_prescribe(Request $request, $id)
    {
        $json_data = json_encode($request->all());
        $data = new Prescription;
        
        $data->prescription_data = $json_data;
        $data->user_id = $id;
        $data->doctor_id = Auth::guard('doctor')->user()->id;
        $data->save();

        $rmv_queue = Queuelist::where('user_id', $id)->where('doctor_id', Auth::guard('doctor')->user()->id)->first()->delete();
        return redirect()->route('doctor.dashboard')->with('message', 'Successfully Prescribed');
    }
    //__End_Doctor_as_an_user_Section__//
}
