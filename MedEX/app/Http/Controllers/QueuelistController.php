<?php

namespace App\Http\Controllers;

use App\Models\Queuelist;
use App\Http\Requests\StoreQueuelistRequest;
use App\Http\Requests\UpdateQueuelistRequest;

class QueuelistController extends Controller
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
     * @param  \App\Http\Requests\StoreQueuelistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQueuelistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Queuelist  $queuelist
     * @return \Illuminate\Http\Response
     */
    public function show(Queuelist $queuelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Queuelist  $queuelist
     * @return \Illuminate\Http\Response
     */
    public function edit(Queuelist $queuelist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQueuelistRequest  $request
     * @param  \App\Models\Queuelist  $queuelist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQueuelistRequest $request, Queuelist $queuelist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Queuelist  $queuelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queuelist $queuelist)
    {
        //
    }
}
