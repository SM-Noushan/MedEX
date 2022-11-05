<?php

namespace App\Http\Controllers;

use App\Models\Patientlist;
use App\Http\Requests\StorePatientlistRequest;
use App\Http\Requests\UpdatePatientlistRequest;

class PatientlistController extends Controller
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
     * @param  \App\Http\Requests\StorePatientlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientlistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patientlist  $patientlist
     * @return \Illuminate\Http\Response
     */
    public function show(Patientlist $patientlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patientlist  $patientlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Patientlist $patientlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientlistRequest  $request
     * @param  \App\Models\Patientlist  $patientlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientlistRequest $request, Patientlist $patientlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patientlist  $patientlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patientlist $patientlist)
    {
        //
    }
}
