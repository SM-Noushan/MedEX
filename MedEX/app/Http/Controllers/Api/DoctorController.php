<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Doctor, Doctordetail, Queuelist, Userdetail, Prescription};
use Illuminate\Support\Facades\{File, Hash, Auth, DB, Storage, Validator};
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    //admin part _start
    public function view_doctor(){
        $doctors = Doctor::orderBy('id')->with('doctordetail')->get();
        // foreach($doctors as $doctor){
        //     $doctor->doctordetail->image = Storage::url($doctor->doctordetail->image);
        // }
        return $doctors;
    }

    public function add_doctor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userid'  => 'required|string|unique:doctors,username',
            'password'  => 'required|min:6|max:32',
            'email'     => 'required|email|unique:doctordetails,email',
            'name'      => 'required|string',
            'department'=> 'required|string',
            'degree'    => 'required|string',
            'phone1'    => 'required|numeric|regex:/^(01[3-9]\d{8})$/|digits:11|unique:doctordetails,phone1|unique:doctordetails,phone2',
            // 'phone2'    => 'sometimes|nullable|regex:/^(01[3-9]\d{8})$/|digits:11|unique:doctordetails,phone2|unique:doctordetails,phone2',
            'bloodgroup'=> 'required|notIn:Select',
            'gender'    => 'required',
            'religion'  => 'required|notIn:Select', 
            // 'imagefile' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'userid.unique'    => 'Username already exists',
            'email.unique'       => 'Email already exists',
            'phone1.unique'      => 'Phone already exists',
            // 'phone2.unique'      => 'Phone already exists',
            'bloodgroup.not_in'  => 'Select Bloodgroup',
            'religion.not_in'    => 'Select Religion',
        ]);

        if($validator->fails()){
            return response(['errors'=> $validator->errors()]);
        }

        $doctor = new Doctor;
        $doctordetail = new Doctordetail;

        $doctor->username = $request->userid;
        $doctor->password =Hash::make($request->password);
        $doctor->save();

        $doctor_id = Doctor::where('username', $request->userid)->first();
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
        // $photo = 'No Image';
        $doctordetail->image = 'No Image';

        // $photoname = $request->username .'-'.$photo->getClientOriginalName();
        // Image::make($photo)->resize(600, 400)->save('media/doctor' .'/'. $photoname);
        // $doctordetail->image = 'media/doctor' .'/'. $photoname;
        $doctordetail->save();

        return ('Doctor Info Successfully Added');
    }

    public function delete_doctor($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        
        $doctordetail = Doctordetail::find($id);
        $doctordetail->delete();

        return ('Successfully Removed');
    }
    //admin part _end
}
