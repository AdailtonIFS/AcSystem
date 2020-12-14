<?php

namespace App\Http\Controllers;

use App\Laboratory;
use App\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('laboratory:id,description')
            ->select('id', 'laboratory_id', 'day', 'start', 'end')
            ->orderBy('start', 'asc')
            ->get();

        return view('admin.schedules.schedules')->with('schedules', $schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $this->authorize('isAdmin');

        $laboratories = Laboratory::all();
        return view('admin.schedules.create')
            ->with('laboratories', $laboratories);
    }

    public function store(Request $request)
    {
        $this->authorize('isAdmin');

        $schedule = new Schedule();
        $schedule->laboratory_id = $request->laboratory_id;
        $schedule->day = $request->day;
        $schedule->start = $request->start;
        $schedule->end = $request->end;
        $schedule->save();
        return redirect()->route('schedules.index');
    }

    public function edit(Schedule $schedule)
    {
        $this->authorize('isAdmin');
        $labs = Laboratory::all();
        return view('admin.schedules.edit')->with('schedule', $schedule)->with('laboratories', $labs);
    }
    public function update(Request $request, Schedule $schedule)
    {
        $this->authorize('isAdmin');

        $request->validate([
            'laboratory_id' => 'required',
            'day' => 'required',
            'start' => 'required',
            'end' => 'required',
        ],[
            'laboratory_id.required' => 'A descrição é obrigatória',
            'day.required' => 'A descrição é obrigatória',
            'start.required' => 'A descrição é obrigatória',
            'end.required' => 'A descrição é obrigatória',
        ]);
        $schedule->start = $request->start;
        $schedule->end = $request->end;
        $schedule->laboratory_id = $request->laboratory_id;
        $schedule->day = $request->day;
        $schedule->save();
        return redirect()->route('schedules.index')->with('message', 'Laboratório Editado com Sucesso!');
    }
}
