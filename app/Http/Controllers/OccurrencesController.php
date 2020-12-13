<?php

namespace App\Http\Controllers;

use App\Laboratory;
use App\Occurrence;
use App\User;
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
        $users = User::select('registration', 'name')->get();
        if (request()->get('all') == 'true'){
            if ($this->authorize('isAdmin')){

            $occurrences =  Occurrence::with('user:registration,name', 'laboratory:id,description')
                ->select('id', 'user_registration', 'laboratory_id' ,'date', 'hour', 'occurrence')
                ->when(!empty(request()->get('name')), function ($query) {
                    $data = request()->get('name');
                    return $query->where('occurrence', 'LIKE', "%$data%");
                })
                ->when(!empty(request()->get('user')), function ($query) {
                    return $query->where('user_registration', '=', request()->get('user') );
                })
                ->when(!empty(request()->get('date')), function ($query) {
                    $data = request()->get('date');
                    return $query->whereDate('date', '=', request()->get('date') );
                })
                ->orderBy('id', 'asc')
                ->get();
            return view('admin.occurrences.index')
                ->with('occurrences', $occurrences)
                ->with('users', $users);

            }
        }
        $occurrences = Occurrence::with('user:registration,name', 'laboratory:id,description')
            ->select('id', 'user_registration', 'laboratory_id' ,'date', 'hour', 'occurrence')
            ->where('user_registration', '=' , \auth()->user()->registration)
            ->when(!empty(request()->get('name')), function ($query) {
                $data = request()->get('name');
                return $query->where('occurrence', 'LIKE', "%$data%");
            })
            ->when(!empty(request()->get('date')), function ($query) {
                $data = request()->get('date');
                return $query->whereDate('date', '=', request()->get('date') );
            })
            ->orderBy('id', 'asc')
            ->get();


        return view('admin.occurrences.index')
            ->with('occurrences', $occurrences)
            ->with('users', $users);
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
        return view('admin.occurrences.show')->with('occurrence', $occurrence);
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
        $this->authorize('update-occurrence', [$occurrence]);

        $occurrence->laboratory_id = $request->laboratory_id;
        $occurrence->date = $request->date;
        $occurrence->hour = $request->hour;
        $occurrence->occurrence = $request->occurrence;
        $occurrence->save();
        return redirect()->route('occurrences.index');
    }

}
