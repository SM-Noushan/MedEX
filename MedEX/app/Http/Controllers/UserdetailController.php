<?php

namespace App\Http\Controllers;

use App\Models\Userdetail;
use App\Http\Requests\StoreUserdetailRequest;
use App\Http\Requests\UpdateUserdetailRequest;

class UserdetailController extends Controller
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
     * @param  \App\Http\Requests\StoreUserdetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserdetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function show(Userdetail $userdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Userdetail $userdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserdetailRequest  $request
     * @param  \App\Models\Userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserdetailRequest $request, Userdetail $userdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userdetail  $userdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userdetail $userdetail)
    {
        //
    }
}
