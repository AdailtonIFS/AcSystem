<?php

namespace App\Http\Controllers;

use App\Labs;
use Illuminate\Http\Request;

class LabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('labs');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function show(Labs $labs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function edit(Labs $labs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Labs $labs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labs $labs)
    {
        //
    }
}
