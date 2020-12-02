<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabsRequest;
use App\Laboratory;
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
        $laboratories = Laboratory::select('id', 'description', 'status')
            ->when(!empty(request()->get('name')), function ($query) {
                $data = request()->get('name');
                return $query->where('description', 'LIKE', "%$data%");
            })
            ->when(!is_null(request()->get('status')), function ($query) {
                return $query->where('status', '=', request()->get('status'));
            })
            ->orderBy('description', 'asc')
            ->get();

        return view('admin.laboratories.labs')->with('laboratories', $laboratories);
    }

    public function create()
    {
        return view('admin.laboratories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabsRequest $request)
    {
        $labs = new Laboratory();
        $labs->id = $request->id;
        $labs->description = $request->description;
        $labs->status = 0;
        $labs->save();

        return redirect()->route('labs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Laboratory $labs
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $labs)
    {
        try {
            $occurrences = $labs->occurrences()->get();
            if ($occurrences) {
                foreach ($occurrences as $occurrence) {
                    $user = $occurrence->user()->first();
                }
            }

            return view('admin.laboratories.show')
                ->with('laboratory', $labs)
                ->with('occurrences', $occurrences ?? '')
                ->with('user', $user);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Laboratory $labs)
    {
        try {
            return view('admin.laboratories.edit')
                ->with('laboratory', $labs);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Laboratory $labs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratory $labs)
    {
        $labs->description = $request->description;
        $labs->status = $request->status ?? 0;
        $labs->save();
        return redirect()->route('labs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Laboratory $labs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $labs)
    {
    }
}
