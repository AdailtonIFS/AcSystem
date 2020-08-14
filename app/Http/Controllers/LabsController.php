<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabsRequest;
use App\Labs;

class LabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Labs::all();
        return view('labs')->with(compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\LabsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabsRequest $request)
    {
        $labs = new Labs();
        $labs->id = $request->id;
        $labs->description = $request->description;
        $labs->status = 0;
        $labs->save();
        return redirect()->route('labs.index');
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
        return view('edit', ['labs'=> $labs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\LabsRequest $request
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function update(LabsRequest $request, Labs $labs)
    {
        $labs->id = $request->id;
        $labs->description = $request->description;
        $labs->status = $request->status;
        $labs->save();
        return redirect()->route('labs.index');
    }

    public function delete(Labs $labs)
    {   
        return view('delete', ['labs'=> $labs]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labs $labs)
    {
        $labs -> delete();
        return redirect()->route('labs.index');
    }
}
