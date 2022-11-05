<?php

namespace App\Http\Controllers;

use App\Models\Doctordetail;
use App\Http\Requests\StoreDoctordetailRequest;
use App\Http\Requests\UpdateDoctordetailRequest;

class DoctordetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctordetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctordetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctordetail  $doctordetail
     * @return \Illuminate\Http\Response
     */
    public function show(Doctordetail $doctordetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctordetail  $doctordetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctordetail $doctordetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctordetailRequest  $request
     * @param  \App\Models\Doctordetail  $doctordetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctordetailRequest $request, Doctordetail $doctordetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctordetail  $doctordetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctordetail $doctordetail)
    {
        //
    }
}
