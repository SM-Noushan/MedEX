<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use Illuminate\Support\Facades\{File, Hash};

Use App\Models\Doctordetail;
// use Image;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
// use App\Http\Requests\StoreDoctorRequest;
// use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    //doctor
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
}
