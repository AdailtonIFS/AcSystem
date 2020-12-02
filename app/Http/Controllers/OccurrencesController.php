<?php

namespace App\Http\Controllers;

use App\Laboratory;
use App\Occurrence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OccurrencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occurrences = Occurrence::all();
        foreach ($occurrences as $occurrence){
            $user = $occurrence->user()->first();
            $laboratory = $occurrence->laboratory()->first();
            $occurrence->user_name = $user->name;
            $occurrence->user_registration = $user->registration;
            $occurrence->laboratory_id = $laboratory->id;
            $occurrence->laboratory_description = $laboratory->description;
        }
        return view('admin.occurrences.index')
            ->with('occurrences', $occurrences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $laboratories = Laboratory::all();
        return view('admin.occurrences.create')
            ->with('laboratories', $laboratories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $occurrence = new Occurrence();
        $occurrence->user_registration = Auth::user()->registration;
        $occurrence->laboratory_id = $request->laboratory_id;
        $occurrence->date = isset($request->date) ? $request->date : now()->format('Y-m-d');
        $occurrence->hour = isset($request->hour) ? $request->hour : now()->format('H:i:s');
        $occurrence->occurrence = $request->occurrence;
        $occurrence->observation = $request->observation;
        $occurrence->save();
        return redirect()->route('occurrences.index');
   }

    /**
     * Display the specified resource.
     *
     * @param \App\Occurrence $occurrence
     * @return \Illuminate\Http\Response
     */
    public function show(Occurrence $occurrence)
    {
        return view('admin.occurrences.index');
    }

    public function edit(Occurrence $occurrence)
    {
        try {
            $laboratories = Laboratory::all();
            $user = $occurrence->user()->first();
            return view('admin.occurrences.edit ')
                ->with('occurrence', $occurrence)
                ->with('laboratories', $laboratories)
                ->with('user', $user);
        }catch (\Exception $e){

        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Occurrence $occurrence
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Occurrence $occurrence)
    {
        $occurrence->laboratory_id = $request->laboratory_id;
        $occurrence->date = $request->date;
        $occurrence->hour = $request->hour;
        $occurrence->occurrence = $request->occurrence;
        $occurrence->observation = $request->observation;
        $occurrence->save();
        return redirect()->route('occurrences.index');
    }

}
