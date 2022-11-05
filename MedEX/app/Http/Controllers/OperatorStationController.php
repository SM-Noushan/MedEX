<?php

namespace App\Http\Controllers;

use App\Models\OperatorStation;
use App\Http\Requests\StoreOperatorStationRequest;
use App\Http\Requests\UpdateOperatorStationRequest;

class OperatorStationController extends Controller
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
     * @param  \App\Http\Requests\StoreOperatorStationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatorStationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperatorStation  $operatorStation
     * @return \Illuminate\Http\Response
     */
    public function show(OperatorStation $operatorStation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperatorStation  $operatorStation
     * @return \Illuminate\Http\Response
     */
    public function edit(OperatorStation $operatorStation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperatorStationRequest  $request
     * @param  \App\Models\OperatorStation  $operatorStation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatorStationRequest $request, OperatorStation $operatorStation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperatorStation  $operatorStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperatorStation $operatorStation)
    {
        //
    }
}
